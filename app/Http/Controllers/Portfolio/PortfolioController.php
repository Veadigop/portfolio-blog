<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Category;
use App\Category_portfolio;
use App\Portfolio_image;


class PortfolioController extends Controller
{
    public function index(Category $category)
    {
        if($category->exists){
            $category_portfolios_by_category = $category->category_portfolios;
            $portfolio_ids= [];
            foreach ($category_portfolios_by_category as $category_portfolio){
                $portfolio_ids [] = $category_portfolio->article->id;
            };
            $portfolios = Portfolio::whereIn('id',$portfolio_ids)->where('deleted', '0')->paginate(3);
        }else{
            $portfolios = Portfolio::orderBy('id')->where('deleted', '0')->paginate(3);
        }
        $portfolio_images = Portfolio_image::all();
        $portfolio_categories = Category_portfolio::all();

        return view('portfolio.index', compact('portfolios','portfolio_images','portfolio_categories'));
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show', compact('portfolio'));
    }

    public function show_by_category(Category_portfolio $category_portfolio)
    {
        return view('blog.show', compact('category_portfolio'));
    }
}