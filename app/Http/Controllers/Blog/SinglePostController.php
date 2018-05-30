<?php
/**
 * Created by PhpStorm.
 * User: veadigop
 * Date: 01/05/2018
 * Time: 16:06
 */

namespace App\Http\Controllers\Blog;

use App\Article;
use App\Http\Controllers\Controller;

class SinglePostController extends Controller
{
    public function index(Article $article)
    {
        //var_dump($article);
        //$single_article = Article::where('id', $article)->get();

        return view('blog.single', ['single_article'=>$article]);
    }
}