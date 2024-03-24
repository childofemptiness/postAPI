
@extends('layouts/layout')

@section('title')
    
    Изменение поста

@endsection

@section('styles')
    
    <link rel="stylesheet" href="{{ asset('css/posts/styles.css') }}">

@endsection

@section('content')
    
    <div id="formContainer">

        <form id="myForm">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            
            <input type="text" name="title" value="{{ $post->title }}">

            <textarea name="content">{{ $post->content }}</textarea>
            
            <button type="submit" id="updatePostButton">Обновить пост</button>

            <button id="cancelPostChangesButton" onclick="window.history.back();">Назад</button>

        </form>

    </div>

@endsection

@section('scripts')
    
    <script>

        let postId = {{ $post->id }};
    
    </script>

    <script src="{{ asset('js/posts/post.js') }}"></script>

@endsection