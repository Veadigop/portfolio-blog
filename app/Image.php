<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded= [];

    public function article_images()
    {
        return $this->hasMany(Article_image::class);
    }

    public function portfolio_images()
    {
        return $this->hasMany(Portfolio_image::class);
    }
}
