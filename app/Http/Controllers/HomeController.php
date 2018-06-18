<?php

namespace App\Http\Controllers;

use App\Article;
use App\Article_image;
use App\Portfolio;


class HomeController extends Controller
{

    public function index()
    {
        //get latest articles & portfolios

        $latest_articles = Article::orderBy('created_at','desc')->where('deleted', '0')->limit(4)->get();
        $latest_portfolios = Portfolio::orderBy('created_at','desc')->where('deleted', '0')->limit(4)->get();

        $article_images = Article_image::all();


        return view('home.index', compact('latest_articles','latest_portfolios', 'article_images'));
    }
}
