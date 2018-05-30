@extends('layouts.admin-layout')

@section('content')

@foreach( $articles as  $article)
    {{$article->title}}

@endforeach

@endsection