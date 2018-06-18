<?php

namespace App\Http\Controllers\Blog;

use App\Article;
use App\Article_image;
use App\Category;
use App\Category_article;
use App\Comment;
use App\Http\Controllers\Controller;


class BlogController extends Controller
{
    public function index(Category $category)
    {
        if($category->exists){
            $category_articles_by_category = $category->category_articles;
            $article_ids= [];
            foreach ($category_articles_by_category as $category_article){
                $article_ids [] = $category_article->article->id;
            };
            $articles = Article::whereIn('id',$article_ids)->where('deleted','0')->paginate(3);
        }else{
            $articles = Article::orderBy('id')->where('deleted','0')->paginate(3);
        }
        $article_images = Article_image::all();
        $article_categories = Category_article::all();

        return view('blog.index', compact('articles','article_images','article_categories'));
    }

    public function show(Article $article)
    {
        $comments = Comment::where('article_id',$article->id)->where('approved', 1)->where('deleted', 0)->get();

        return view('blog.show', compact('article','comments'));
    }

    public function show_articles(Category $category)
    {
        $category_articles = Category_article::where('category_id', $category->id)->get();

        $article_ids = [];
        foreach ($category_articles as $category_article) {
            $article_ids []= $category_article->article_id;
        }

        $articles = Article::whereIn('id',$article_ids)->paginate(4);

        return view('blog.show_by_category',   compact('category','articles'));
    }



}