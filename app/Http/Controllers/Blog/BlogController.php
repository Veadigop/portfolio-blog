<?php

namespace App\Http\Controllers\Blog;

use App\Article;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id')->paginate(5);

        return view('blog.index', ['articles' => $articles]);
    }
}