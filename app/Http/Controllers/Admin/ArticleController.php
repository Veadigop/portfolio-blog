<?php


namespace App\Http\Controllers\Admin;

use App\Article;
use App\Article_image;
use App\Category;
use App\Category_article;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin_or_moderator']);
    }

    public function index()
    {
        $articles = Article::orderBy('id')->where('deleted', '0')->paginate(5);
        $article_images = Article_image::all();

        return view('admin.articles.index',   compact('articles','article_images'));
    }

    public function show(Article $article)
    {
        return view('admin.articles.show',   compact('article'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.articles.create', compact('categories'));
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $category_articles = Category_article::where('article_id', $article->id)->get();
        $category_article_names = [];
        foreach ($category_articles as $category_article){
            $category_article_names [] = $category_article->category->name;
        }

        return view('admin.articles.edit',   compact('article','categories', 'category_article_names'));
    }

    public function store(Request $request)
    {

        if($image = Input::file('image'))
        {
            $image->move(public_path() . '/images/', $image->getClientOriginalName());
            $image_path='/images/' . $image->getClientOriginalName();

            $image = new Image;
            $image->link = $image_path;
            $image->save();
        }
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'short_description' => 'required|string|max:255',
            'full_text' => 'nullable',
            'author' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }


        $article = new Article;
        $article->title = $request->title;
        $article->short_description = $request->short_description;
        $article->full_text = $request->full_text;
        $article->author = $request->author;
        $article->save();


        if($request->category_id != null){
            $category_ids = $request->category_id;
            if(is_array($category_ids)){
                foreach ($category_ids as $category_id) {
                    $category_article = new Category_article;
                    $category_article->category_id = $category_id;
                    $category_article->article_id = $article->id;
                    $category_article->save();
                }
            }else{
                $category_article = new Category_article;
                $category_article->category_id = $request->category_id;
                $category_article->article_id = $article->id;
                $category_article->save();

            }
        }
        if($image){
            $article_image = new Article_image;
            $article_image->article_id = $article->id;
            $article_image->image_id= $image->id;
            $article_image->tag= 'header';
            $article_image->save();
        }

        session()->flash('message_success','New article added');

        return back();
    }

    public function update(Request $request)
    {

        if($image = Input::file('image'))
        {
            $image->move(public_path() . '/images/', $image->getClientOriginalName());
            $image_path='/images/' . $image->getClientOriginalName();
        }
        $article_id = request('article_id');
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'short_description' => 'required|string|max:255',
            'full_text' => 'nullable',
            'author' => 'nullable'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $article = Article::find($article_id);
        $article->title = $request->title;
        $article->short_description = $request->short_description;
        $article->full_text = $request->full_text;
        $article->author = $request->author;
        $article->save();


        if($request->category_id != null){
            $category_articles = Category_article::where('article_id',$article->id );
            $category_articles->delete();

            $category_ids = $request->category_id;
            if(is_array($category_ids)){
                foreach ($category_ids as $category_id) {
                    $category_article = new Category_article;
                    $category_article->category_id = $category_id;
                    $category_article->article_id = $article->id;
                    $category_article->save();
                }
            }else{
                $category_article = new Category_article;
                $category_article->category_id = $request->category_id;
                $category_article->article_id = $article->id;
                $category_article->save();

            }
        }

        if($image != null) {
            $image = new Image;
            $image->link = $image_path;
            $image->save();

            $article_image = Article_image::where('article_id', $article->id)->where('tag', 'header')->first();
            $article_image->image_id = $image->id;
            $article_image->save();
        }

        session()->flash('message_success', 'Article ' .  $article->title . ' was updated');

        return back();
    }

    public function delete(Request $request)
    {

        if($request->ajax()){
            $article = Article::find(request('article_id'));
            $article->deleted=1;
            $article->save();
            $response = 'Article ' . $article->title . ' was deleted!';
            return response(array('success' => "true", 'response'=>$response), 200);
        }

        $article = Article::find(request('article_id'));
        $article->deleted = 1;
        $article->save();

        session()->flash('message_success','Article ' .  $article->title . ' was updated');

    }


}