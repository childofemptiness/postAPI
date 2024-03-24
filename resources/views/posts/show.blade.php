
@extends('layouts/layout')

@section('title')
    
    Страница поста

@endsection

@section('styles')
    
    <link rel="stylesheet" href="{{ asset('css/posts/styles.css') }}">

@endsection

@section('content')

    <div class="post">

        <h1>{{ $post->title }}</h1>

        <div class="post-content">

            {!! nl2br(e($post->content)) !!}

        </div>
    
        <div class="post-buttons">

            <button id="deletePostButton" class="delete-post-button" type="button"">Удалить</button>

            <button class="edit-post-button">

                <a id="editLink" href="{{ route('posts.edit', $post->id) }}">Изменить</a>

            </button>

        </div>

    </div>

@endsection

@section('scripts')

    <script>

        let postId = {{ $post->id }};

    </script>
    
    <script src="{{ asset('js/posts/post.js') }}"></script>

@endsection