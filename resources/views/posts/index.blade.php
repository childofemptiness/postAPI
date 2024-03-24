
@extends('layouts/layout')

@section('title')

    Список всех постов

@endsection

@section('styles')

    <link href="{{ asset('css/posts/styles.css') }}" rel="stylesheet">

@endsection

@section('content')
    
    <div class="container">

        <div class="half" id="posts">

            <h2 id="listTitle">Список постов</h2>

            @foreach ($posts as $post)

                <a href="/posts/{{ $post->id }}" class="post-link">{{ $post->title }}</a>

            @endforeach

        </div>

        <div class="half">

            <div id="buttonContainer">

                <button id="createPostButton">

                    <a href="{{ route('posts.create') }}">Создать пост</a>

                </button>

            </div>

        </div>

    </div>

@endsection
