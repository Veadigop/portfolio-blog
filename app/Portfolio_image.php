<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio_image extends Model
{
    protected $guarded= [];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
