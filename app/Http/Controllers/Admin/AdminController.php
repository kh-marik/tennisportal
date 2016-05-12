<?php
    namespace tennisportal\Http\Controllers\Admin;

    use tennisportal\Http\Controllers\Controller;
    use tennisportal\Http\Requests;

    class AdminController extends Controller {
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index()
        {
            return view('admin.index');
        }
    }
