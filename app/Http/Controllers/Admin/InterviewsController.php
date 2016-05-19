<?php

namespace tennisportal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use tennisportal\Http\Requests;
use tennisportal\Http\Controllers\Controller;
use tennisportal\Interviews;

class InterviewsController extends Controller
{
    public function index()
    {
        $interviews = Interviews::with('users')->orderBy('id', 'desc')->get();
        return view('admin.interviews.index', ['interviews' => $interviews]);
    }

    public function create()
    {
        return view('admin.interviews.create');
    }

    public function store(Request $request)
    {
        $this->validateRecord($request);
        $this->uploadPicture($request);
        $request->user()->interviews()->create($this->getFields($request));
        Cache::flush();
        return redirect('admin/interviews')->with('message', 'Interview created');
    }

    public function show($id)
    {
        $interview = Interviews::with('users')->findOrFail($id);
        return view('admin.interviews.show', ['interview' => $interview]);
    }

    public function edit($id)
    {
        $interview = Interviews::findOrFail($id);
        return view('admin.interviews.edit', ['interview' => $interview]);
    }

    public function update(Request $request, $id)
    {
        $interview = Interviews::findOrFail($id);
        $this->validateRecord($request);
        $this->uploadPicture($request, $interview);
        $request->user()->interviews()->where('id', '=', $id)->update($this->getFields($request));
        Cache::flush();
        return redirect('admin/interviews')->with('message', 'Interview updated');
    }

    public function destroy($id)
    {
        $interview = Interviews::findOrFail($id);
        $interview->delete();
        return redirect('admin/interviews/')->with('message', 'Interview deleted');
    }


    private function validateRecord(Request $request)
    {
        return $this->validate($request, [
            'title'       => 'required|min:5|max:255',
            'description' => 'required|min:10|max:255',
            'body'        => 'required|min:50|max:5000',
            'picture'     => 'required_without:pic|image|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:1024'
        ], [
            'required_without' => 'Picture field is required'
        ]);
    }

    private function getFields(Request $request)
    {
        return [
            'title'           => $request->title,
            'description'     => $request->description,
            'body'            => $request->body,
            'picture'         => $request->picture
        ];
    }

    private function uploadPicture(Request $request, $record = null)
    {
        if ($request->hasFile('picture')) {
            $request->picture = strtolower(date('YmdHis') . '_' . $request->file('picture')->getClientOriginalName());
            $request->file('picture')->move(base_path() . '/public/images/interviews/', $request->picture);
            return true;
        }
        $request->picture = $record->picture;
        return true;
    }
}
