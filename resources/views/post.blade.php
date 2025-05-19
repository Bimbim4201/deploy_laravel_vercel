
@extends('layouts.main')

@section('content')
    <article>
        <h2>{{ $post['username'] }}</h2>
        <h5>{{ $post['password'] }}</h5>
        <h5>{{ $post['email'] }}</h5>
    </article>

    <a href="/posts">Back to Posts</a>
@endsection