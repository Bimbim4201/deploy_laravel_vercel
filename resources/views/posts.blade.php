

@extends('layouts.main')
@section('content')
    @foreach ($posts as $post)
        <article class="mb-5">
        <h2>
            <a href="/posts/{{ $post["slug"] }}">{{ $post["username"] }}</a>
        </h2>
            <h5>{{ $post["password"] }}</h5>
            <h5>{{ $post["email"] }}</h5>
        </article>
    @endforeach
@endsection
