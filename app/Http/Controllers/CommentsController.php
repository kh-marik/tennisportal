<?php
    namespace tennisportal\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;
    use tennisportal\Comments;
    use tennisportal\Http\Requests;
    use tennisportal\News;

    class CommentsController extends Controller {

        public function store($news_id, Request $request)
        {
            if (empty($request->input('comment'))){
                return redirect('news/' . $news_id)->with('message', 'Please, wright your comment text before adding it.');
            }
            $comment = [
                'comment' => $request->comment,
                'news_id' => $news_id,
                'user_id' => Auth::user()->id
            ];
            if (!config('portal.comments_approving')) {
                $comment['approved'] = 1;
            };
            $post = News::findOrFail($news_id);
            $post->comments()->create($comment);
            Cache::forget('comments_for_record_' . $news_id);
            $message = config('portal.comments_approving') ? 'Comment added, after approving it will be shown on site' : 'Comment added';
            return redirect('news/' . $news_id)->with('message', $message);
        }

        public function destroy($news_id, $id)
        {
            $comment = Comments::findOrFail($id);
            $comment->delete();
            Cache::forget('comments_for_record_' . $news_id);
            return redirect("news/$news_id")->with('message', 'Comment deleted');
        }
    }
