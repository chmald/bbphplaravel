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

        //$posts = DB::select('select * from posts limit ?', [intval($count)]);

        $posts = array();
        foreach($posts_all as $post)
        {
            array_push($posts, $post);
        }

        return View::make('debug', ['data' => json_encode($posts)]);
    }
}
