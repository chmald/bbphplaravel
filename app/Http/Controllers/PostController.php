<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $count = $request->query('count') ?? 100;

        $posts_all = DB::select('select * from posts');
        //$posts_all = DB::select('select * from posts limit ?', [intval($count)]);

        $posts = array();
        for($i = 0; $i >= $count; $i++)
        {
            array_push($posts, $posts_all[$i]);
        }

        if(intval($count) > 50)
        {
            return View::make('debug', ['data' => "{redacted}"]);
        } else {
            return View::make('debug', ['data' => json_encode($posts)]);
        }
    }
}
