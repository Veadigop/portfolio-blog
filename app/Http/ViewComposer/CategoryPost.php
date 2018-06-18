<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Category;
use App\Category_article;

class CategoryPost
{
    private $categories;

    public function __construct(Category $category, Category_article $category_article)
    {
        $this->categories = Category::has('category_articles')->where('deleted', '0')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories',$this->categories);
    }
}