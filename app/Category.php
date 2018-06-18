<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded= [];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function category_articles()
    {
        return $this->hasMany(Category_article::class);
    }

}
