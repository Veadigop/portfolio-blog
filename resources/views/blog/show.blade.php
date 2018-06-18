@extends('layouts.main-layout')


@section('content')

    <div class="container blog">
        <div class="row">
            <div class="col-12">
                <div class="article text-center">

                    @if($article->article_images->where('tag','header')->first() != null)
                        <img class="rounded" src="{{$article->article_images->where('tag','header')->first()->image->link}}" alt="Article Image">
                    @endif

                    <h2 class="article-title mt-4">{{$article->title}}</h2>
                        <p><b>Author</b> : {{$article->author}}</p>
                    <p>{!!$article->full_text!!}</p>

                    <p class="mb-5"><b>Categories</b>:
                        @foreach($article->category_articles as $article_category)
                            {{$article_category->category->name}}@if (!$loop->last) , @else. @endif
                        @endforeach
                    </p>

                    @if(!\Auth::check())
                        <div class="message">
                            <h3 class="mb-4">You must be login for creating comment!</h3>
                        </div>
                    @endif

                    @if(\Auth::check())
                        <div class="form-group commentarea">
                            <form action="/comment/store" method="POST">
                                {!! csrf_field() !!}
                                <h3>Comment Here</h3>
                                <label for="text"></label>
                                <textarea class="form-control mb-5" rows="5" id="text" name="text"></textarea>
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <button class="button" type="submit mt-5">Add Comment</button>
                            </form>
                        </div>
                    @endif
                    <div class="wrapper-comment">
                        <h3 class="mb-4">Comments:</h3>
                        @foreach($comments as $comment)
                            <div class="border mb-4 p-3">
                                <p>User <b>{{$comment->user->name}}</b> left comment on <b>{{$comment->created_at}}</b></p>
                                <h5>Comment text</h5>
                                <p>{!! $comment->text !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

