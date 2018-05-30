<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
       return view('admin.index', compact('dashbord') );
    }

    public function viewAllArticle()
    {
        $articles = Article::orderBy('id')->paginate(5);
        return view('admin.articles.articles', ['articles'=>$articles]);
    }

    public function addArticle()
    {
        $users = User::orderBy('id')->paginate(5);
        return view('admin.users', ['users'=>$users]);
    }

}