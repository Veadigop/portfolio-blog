<?php

namespace App\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryPost
{
    protected $category;

    /**
     * Create a new categories composer.
     *
     * @param  CategoryRepository $categories
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('category', $this->category->all());
    }
}