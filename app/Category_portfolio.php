<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_portfolio extends Model
{
    protected $guarded= [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

}
