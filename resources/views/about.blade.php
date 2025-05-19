@extends('layouts.main')
@section('content')
    <h1>WELCOME TO ABOUT</h1>
    <h3>{{ $nama }}</h3>
    <p>{{ $email }}</p>
    <img src="Foto/{{ $gambar }}" alt="{{ $nama }}" width="200px" height="200px" class="img-thumbnail rounded-circle">

@endsection

