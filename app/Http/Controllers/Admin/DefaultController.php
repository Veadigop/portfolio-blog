<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\User;
use Illuminate\Http\Request;


class DefaultController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin_or_moderator']);
    }

    public function index()
    {
        $articles_count = Article::all()->where('deleted', '0')->count();
        $portfolios_count = Portfolio::all()->where('deleted', '0')->count();
        $user_count = User::all()->count();
        $categories_count = Category::all()->where('deleted', '0')->count();

        $latest_articles = Article::orderBy('created_at', 'desc')->where('deleted', '0')->take(4)->get();
        $latest_portfolios = Portfolio::orderBy('created_at', 'desc')->where('deleted', '0')->take(4)->get();

       return view('admin.index', compact('articles_count','portfolios_count','user_count','categories_count', 'latest_articles','latest_portfolios'));
    }

    public function viewAllArticle()
    {
        $articles = Article::orderBy('id')->paginate(5);
        return view('admin.articles.articles', ['articles'=>$articles]);
    }

    public function addArticle(Request $request)
    {
        if($request->isMethod('post')){

        }
        return view('admin.articles.add' );
    }

}