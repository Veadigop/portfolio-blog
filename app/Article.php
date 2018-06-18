<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function article_images()
    {
        return $this->hasMany(Article_image::class);
    }

    public function category_articles()
    {
        return $this->hasMany(Category_article::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
