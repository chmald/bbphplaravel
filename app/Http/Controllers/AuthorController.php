<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    //
    public function index(Request $request)
    {
        $count = $request->query('count') ?? 100;

        $authors = DB::select('select * from authors limit ?', [intval($count)]);

        return View::make('debug', ['data' => json_encode($authors)]);
    }
}
