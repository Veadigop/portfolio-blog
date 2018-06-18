<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $guarded= [];

    public function portfolio_images()
    {
        return $this->hasMany(Portfolio_image::class);
    }

    public function category_portfolios()
    {
        return $this->hasMany(Category_portfolio::class);
    }


}
