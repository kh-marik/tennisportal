<?php

namespace tennisportal\Http\Controllers\Admin;

use Illuminate\Http\Request;
use tennisportal\Config;
use tennisportal\Http\Requests;
use tennisportal\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function getConfig()
    {
        $config = Config::findOrFail(1)->toArray();
        config(['settings'=> $config]);
        dd(config());
    }
}
