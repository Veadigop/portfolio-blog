<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Portfolio_image;
use App\Category;
use App\Category_portfolio;
use App\Image;


class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin_or_moderator']);
    }

    public function index()
    {
        $portfolios = Portfolio::orderBy('id')->where('deleted', '0')->paginate(5);
        return view('admin.portfolios.index',   compact('portfolios'));
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show',   compact('portfolio'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.portfolios.create',compact('categories'));
    }

    public function edit(Portfolio $portfolio)
    {
        $categories = Category::all();
        $category_portfolios = Category_portfolio::where('portfolio_id', $portfolio->id)->get();
        $category_portfolio_names = [];
        foreach ($category_portfolios as $category_portfolio){
            $category_portfolio_names[] = $category_portfolio->category->name;
        }
        return view('admin.portfolios.edit',   compact('portfolio','category_portfolio_names', 'categories'));
    }

    public function store(Request $request)
    {

        if($image = Input::file('image')) {
            $image->move(public_path() . '/images/', $image->getClientOriginalName());
            $image_path='/images/' . $image->getClientOriginalName();

            $image = new Image;
            $image->link = $image_path;
            $image->save();
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|string',
            'full_text' => 'required',
            'author' => 'required|nullable'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $portfolio = new Portfolio;
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->full_text = $request->full_text;
        $portfolio->author = $request->author;
        $portfolio->save();

        if($request->category_id != null){
            $category_ids = $request->category_id;
            if(is_array($category_ids)){
                foreach ($category_ids as $category_id) {
                    $category_portfolio = new Category_portfolio;
                    $category_portfolio->category_id = $category_id;
                    $category_portfolio->portfolio_id = $portfolio->id;
                    $category_portfolio->save();
                }
            }else{
                $category_portfolio = new Category_portfolio;
                $category_portfolio->category_id = $request->category_id;
                $category_portfolio->portfolio_id = $portfolio->id;
                $category_portfolio->save();

            }
        }
        if($image){
            $portfolio_image = new Portfolio_image;
            $portfolio_image->portfolio_id = $portfolio->id;
            $portfolio_image->image_id= $image->id;
            $portfolio_image->tag= 'header';
            $portfolio_image->save();
        }

        session()->flash('message_success','New portfolio ' . $portfolio->title . ' was added');

        return back();
    }

    public function update(Request $request)
    {

        if($image = Input::file('image'))
        {
            $image->move(public_path() . '/images/', $image->getClientOriginalName());
            $image_path='/images/' . $image->getClientOriginalName();
        }
        $portfolio_id = request('portfolio_id');

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required|string',
            'full_text' => 'required',
            'author' => 'required|nullable'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $portfolio = Portfolio::find($portfolio_id);
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        $portfolio->full_text = $request->full_text;
        $portfolio->author = $request->author;
        $portfolio->save();

        if($request->category_id != null){
            $category_portfolios = Category_portfolio::where('portfolio_id',$portfolio->id );
            $category_portfolios->delete();

            $category_ids = $request->category_id;
            if(is_array($category_ids)){
                foreach ($category_ids as $category_id) {
                    $category_portfolio = new Category_portfolio;
                    $category_portfolio->category_id = $category_id;
                    $category_portfolio->portfolio_id = $portfolio->id;
                    $category_portfolio->save();
                }
            }else{
                $category_portfolio = new Category_portfolio;
                $category_portfolio->category_id = $request->category_id;
                $category_portfolio->portfolio_id = $portfolio->id;
                $category_portfolio->save();

            }
        }

        if($image != null) {
            $image = new Image;
            $image->link = $image_path;
            $image->save();

            $portfolio_image = Portfolio_image::where('portfolio_id', $portfolio->id)->where('tag', 'header')->first();
            $portfolio_image->image_id = $image->id;
            $portfolio_image->save();
        }

        session()->flash('message_success','Portfolio ' . $portfolio->title . ' was updated');

        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $portfolio = Portfolio::find(request('portfolio_id'));
            $portfolio->deleted=1;
            $portfolio->save();
            $response = 'Portfolio Item' . $portfolio->title . ' was deleted!';
            return response(array('success' => "true", 'response'=>$response), 200);
        }

        $portfolio = Portfolio::find(request('portfolio_id'));
        $portfolio->deleted = 1;
        $portfolio->save();

        session()->flash('message_alert','Portfolio Item "' . $portfolio->title . '" was deleted.');
    }


}