<?php
    namespace tennisportal\Http\Controllers\Admin;

    use Illuminate\Http\Request;
    use tennisportal\Http\Controllers\Controller;
    use tennisportal\Http\Requests;
    use tennisportal\News;
    use tennisportal\NewsCategory;

    class NewsController extends Controller {

        private $cats = [];


        public function __construct()
        {
            $this->middleware('auth');
            $this->cats = $this->getCategories();
        }

        public function index()
        {
            $news = News::with('newscategories')->with('users')->orderBy('id', 'desc')->get();
            return view('admin.news.index', ['news' => $news]);
        }

        public function show($id)
        {
            $record = News::findOrFail($id);
            return view('admin.news.show', ['record' => $record]);
        }

        public function create()
        {
            if (count($this->cats) == 0) {
                return redirect('admin/newscategories')->with('message',
                    'You dont have any category, add at least one first');
            }
            return view('admin.news.create', ['cats' => $this->cats]);
        }

        public function store(Request $request)
        {
            $this->validateRecord($request);
            $this->uploadPicture($request);
            $request->user()->news()->create($this->getFields($request));
            return redirect('admin/news')->with('message', 'Record created');
        }

        public function edit($id)
        {
            $record = News::findOrFail($id);
            return view('admin.news.edit', ['record' => $record, 'cats' => $this->cats]);
        }

        public function update(Request $request, $id)
        {
            $record = News::findOrFail($id);
            $this->validateRecord($request);
            $this->uploadPicture($request, $record);
            $request->user()->news()->where('id', '=', $id)->update($this->getFields($request));
            return redirect('admin/news')->with('message', 'Record updated');
        }

        public function destroy($id)
        {
            $record = News::findOrFail($id);
            $record->delete();
            return redirect('/admin/news')->with('message', 'Record deleted');
        }


        private function getCategories()
        {
            $categories = NewsCategory::all();
            $cats = [];
            foreach ($categories as $category) {
                $cats[$category->id] = $category->name;
            }
            return $cats;
        }

        private function validateRecord(Request $request)
        {
            return $this->validate($request, [
                'title'       => 'required|min:5|max:255',
                'description' => 'required|min:10|max:255',
                'body'        => 'required|min:50|max:5000',
                'sex'         => 'required',
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
                'sex'             => $request->sex,
                'newscategory_id' => $request->newscategory_id,
                'picture'         => $request->picture
            ];
        }

        private function uploadPicture(Request $request, $record = null)
        {
            if ($request->hasFile('picture')) {
                $request->picture = strtolower(date('YmdHis') . '_' . $request->file('picture')->getClientOriginalName());
                $request->file('picture')->move(base_path() . '/public/images/news/', $request->picture);
                return true;
            }
            $request->picture = $record->picture;
            return true;
        }
    }
