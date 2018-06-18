@extends('layouts.admin-layout')

@section('content')

    <div class="row mb-4">
        <div class="col-12">
            <div id="flashs" class="alert alert-danger"></div>
        </div>
        <div class="col-6"><h3>All Comments</h3></div>
    </div>

    <table class="table table-bordered table-striped text-center">
        <thead>
            <tr>
                <th>Comment id</th>
                <th>Comment user</th>
                <th>Comment text</th>
                <th>Approve</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($comments as  $comment)
                <tr id="{{$comment->id}}">
                    <td><h5>{{$comment->id}}</h5></td>
                    <td> {{$comment->user->name}} </td>
                    <td> {{$comment->text}}</td>
                    <td>
                        <form action="/admin/comment/approve" method="POST">
                            {{ csrf_field() }}
                            @if ($comment->approved == 1)
                                <input name="approved" type="hidden" value="0">Approved
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <button class="button" type="submit mt-5">Block Comment</button>
                            @else
                                <input name="approved" type="hidden" value="1">Not approved
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <button class="button" type="submit mt-5">Approve Comment</button>
                            @endif

                        </form>
                    </td>
                    <td>
                        <a  href="/admin/comments/{{$comment->id}}/edit/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <span class="comment del" data-comment_id="{{$comment->id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>No Comments</td>
                </tr>
            @endforelse
        </tbody>

    </table>

    <div class="row mb-5 mt-5 text-center">
        <div class="col-md-12 mb-5"> {{ $comments->links('pagination.custom-pagination') }}</div>
    </div>

@endsection


