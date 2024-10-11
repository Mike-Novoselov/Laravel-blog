<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts')); // передаем аргумент $posts во вьюшку posts
    }

}
