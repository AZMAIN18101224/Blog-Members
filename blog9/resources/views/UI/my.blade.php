@extends('layouts.main')


@section('main-layout')
    <title>{{ $title = 'Profile' }}</title>
    <div class="container">
        <h1>Profile Page</h1> <br>
        @if (session('username'))
            <h3 style="color: rgb(6, 112, 135)">Logged in successfully!</h3>
        @endif
        <h2>Hello, {{ session('username') }}</h2><br>
    </div>
@endsection
