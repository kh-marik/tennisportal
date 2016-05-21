<?php
    namespace tennisportal\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;
    use tennisportal\Http\Requests;
    use tennisportal\News;

    class CommentsController extends Controller {

        public function store($news_id, Request $request)
        {
            $post = News::findOrFail($news_id);
            $post->comments()->create([
                'comment' => $request->comment,
                'news_id' => $news_id,
                'user_id' => Auth::user()->id
            ]);
            Cache::forget('comments_for_record_' . $news_id);
            return redirect('news/' . $news_id)->with('message', 'Commentary added, after approving it will be shown on site');
        }

        public function delete($id)
        {}
    }
