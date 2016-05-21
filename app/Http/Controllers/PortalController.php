<?php
    namespace tennisportal\Http\Controllers;

    use Illuminate\Support\Facades\Cache;
    use tennisportal\Comments;
    use tennisportal\Http\Requests;
    use tennisportal\Interviews;
    use tennisportal\News;
    use tennisportal\NewsCategory;

    class PortalController extends Controller {

        public function __construct()
        {
            $newscategories = Cache::remember('newscategories', 10, function() {
                return NewsCategory::with('news')->get();
            });
            view()->share('newscategories', $newscategories);
            view()->share('articlecategories', $newscategories);
        }

        public function index()
        {
            $mannews = Cache::remember('mannews', 60, function() {
                return News::where('sex', 'male')->orderBy('id', 'desc')->take(5)->get();
            });

            $womannews = Cache::remember('womannews', 60, function() {
                return News::where('sex', 'female')->orderBy('id', 'desc')->take(5)->get();
            });

            $interviews = Cache::remember('interviews', 60, function() {
                return Interviews::orderBy('id', 'desc')->get();
            });

            return view('portal.index', ['mannews' => $mannews,
                                         'womannews' => $womannews,
                                         'interviews' => $interviews]);
        }

        public function newscategory($id){

            $newscategory = Cache::remember('newscategory_'.$id, 60, function() use ($id) {
                return NewsCategory::with(['news' => function ($query){$query->orderBy('id', 'desc');}])->findOrFail($id);
            });

            return view('portal.newscategory', ['newscategory' => $newscategory]);
        }

        public function showallnews(){
            $news = News::orderBy('id', 'desc')->with('users')->with('newscategories')->paginate(config('portal.posts_per_page'));
            return view('portal.allnews', ['news' => $news]);
        }

        public function shownewsrecord($id){

            $record = Cache::remember('record_'.$id, 60, function() use ($id) {
                return News::with('users')->with('newscategories')->findOrFail($id);
            });
            $record->comments = Cache::remember('comments_for_record_'.$id, 60, function() use ($id) {
                return Comments::with('user')->where('news_id', $id)->where('approved', 1)->orderBy('created_at', 'desc')->get();
            });
            return view('portal.shownews', compact('record'));
        }

        public function showallinterviews()
        {
            $interviews = Cache::remember('allinterviews', 60, function() {
                return Interviews::orderBy('id', 'desc')->with('users')->paginate(config('portal.posts_per_page'));
            });
            return view('portal.allinterviews', ['interviews' => $interviews]);
        }

        public function showinterview($id)
        {
            $interview = Cache::remember('interview_'.$id, 60, function() use ($id) {
                return Interviews::with('users')->findOrFail($id);
            });
            return view('portal.showinterview', ['interview' => $interview]);
        }
    }