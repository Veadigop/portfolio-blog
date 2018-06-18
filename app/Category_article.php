<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_article extends Model
{
    protected $guarded= [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    
}
