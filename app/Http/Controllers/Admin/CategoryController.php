<?php


namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Category_article;
use App\Category_portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin_or_moderator']);
    }

    public function index()
    {
        $categories = Category::orderBy('id')->where('deleted', '0')->paginate(4);
        return view('admin.categories.index',   compact('categories'));
    }

    
    public function show_articles_by_category(Category $category)
    {
        $category_articles = Category_article::where('category_id', $category->id)->get();

        $article_ids = [];
        foreach ($category_articles as $category_article) {
            $article_ids []= $category_article->article_id;
        }

        $articles = Article::whereIn('id',$article_ids)->paginate(4);

        return view('admin.articles.show_by_category',   compact('category','articles'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit',   compact('category'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        session()->flash('message_success','Category '. $category->name . ' was added');

        return back();
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|max:255',
            'email' => 'nullable|string|email|max:255',
        ]);

        $category_id = request('category_id');
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $category = Category::find($category_id);
        $category->name = $request->name;
        $category->save();

        session()->flash('message_success','Category ' .  $category->name . ' was updated');

        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $category = Category::find(request('category_id'));
            $category->deleted=1;
            $category->save();
            $response = 'Category ' . $category->name . ' was deleted!';

            $category_articles = Category_article::where('category_id', $category->id);
            $category_articles->delete();

            $category_portfolios = Category_portfolio::where('category_id', $category->id);
            $category_portfolios->delete();

            return response(array('success' => "true", 'response'=>$response), 200);
        }

    }


}