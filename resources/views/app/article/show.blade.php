@extends('layouts.app1')
@section('content')
    <div id="app">
        <article-component></article-component>
        <hr>
        <comment-component></comment-component>
    </div>

@endsection
@section('vue')
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection