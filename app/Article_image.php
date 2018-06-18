<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article_image extends Model
{
    protected $guarded= [];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

}
