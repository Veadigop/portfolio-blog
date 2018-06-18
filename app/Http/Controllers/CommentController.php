<?php
/**
 * Created by PhpStorm.
 * User: veadigop
 * Date: 01/05/2018
 * Time: 15:42
 */

namespace App\Http\Controllers;


use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'text' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }


        $comment = new Comment;
        $comment->text = $request->text;
        $comment->article_id = $request->article_id;
        $comment->user_id = $request->user_id;
        $comment->save();

        session()->flash('message_success','Your comment was successfully added!');

        return back();
    }

}