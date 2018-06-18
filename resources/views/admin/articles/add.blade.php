@extends('layouts.admin-layout')
Add New Post
@section('content')

    <form action="" method="POST">

        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <label for="title">Short Description</label>
        <input type="text" name="short_description">

        <label for="title">Article Text</label>
        <input type="text">

        <label for="title">Author</label>
        <input type="text">

        <button type="submit">Add</button>
    </form>

@endsection