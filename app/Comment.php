<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function article()//$comment->post->body  KG
    {
        return $this->belongsTo(Article::class);
    }


    public function user() //$comment->user->name
    {
        return $this->belongsTo(User::class);
    }
}
