<?php

namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CommentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'admin_or_moderator']);
    }


    public function index()
    {
        $comments = Comment::where('deleted', 0)->paginate(3);
        return view('admin.comments.index',   compact('comments'));
    }

    public function edit(Comment $comment)
    {
        return view('admin.comments.edit',   compact('comment'));
    }

    public function approve(Request $request)
    {
        $comment = Comment::where('id', request('comment_id'))->first();

        if(request('approved') != 0){
            $comment->approved = 1;
        }else{
            $comment->approved = 0;
        }

        $comment->save();

        return back();

    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required'
        ]);

        $comment_id = request('comment_id');
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $comment = Comment::find($comment_id);
        $comment->text = $request->text;
        $comment->save();

        session()->flash('message_success','Comment was updated');

        return back();
    }

    public function delete(Request $request)
    {
        if($request->ajax()){
            $comment = Comment::find(request('comment_id'));
            $comment->deleted=1;
            $comment->save();
            $response = 'Comment was deleted!';
            return response(array('success' => "true", 'response'=>$response), 200);
        }

        return back();
    }

}