<?php

namespace App\Http\Controllers;

use App\Article;
use App\Article_image;
use App\Category;
use App\Portfolio;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //get latest articles & portfolios

        $latest_articles = Article::orderBy('created_at','desc')->where('deleted', '0')->limit(4)->get();
        $latest_portfolios = Portfolio::orderBy('created_at','desc')->where('deleted', '0')->limit(4)->get();


        $article_images = Article_image::all();


//        foreach ($latest_articles as $latest_article) {
//           $link = $latest_article->article_images->where('tag','header')->first()->image->link);
//        }


        //        foreach ($latest_portfolios as $latest_portfolio) {
//            dump($latest_portfolio->title);
//        }

        return view('home.index', compact('latest_articles','latest_portfolios', 'article_images'));
    }
}
