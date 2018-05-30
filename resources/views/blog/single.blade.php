@extends('layouts.main-layout')


@section('content')
    <h1>{{$single_article->title}}</h1>
{{$single_article->full_text}}


    @if(!\Auth::check())
    <div class="message">
        You musr be login for creating comment!
    </div>
    @endif

    @if(\Auth::check())
    <div class="commentarea">
        <form action="" method="POST">
            {!! !csrf_field() !!}
            <p>COMMENT HERE</p>
            <label for=""></label>
            <input type="text">
<button type="submit">Add Comment</button>
        </form>
    </div>
    @endif
@endsection

