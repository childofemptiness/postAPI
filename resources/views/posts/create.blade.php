
@extends('layouts/layout')

@section('title')
    
    Создание нового поста

@endsection

@section('styles')

    <link href="{{ asset('css/posts/styles.css') }}" rel="stylesheet">
    
@endsection

@section('content')

        <!-- Контейнер для формы -->

        <div id="formContainer">
               
            <form id="myForm">
        
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
                <input type="text" name="title" placeholder="Название поста" />
        
                <textarea name="content" placeholder="Контент поста" rows="5"></textarea>
        
                <input type="submit" value="Опубликовать" id="postPublishButton"/>
        
                <button type="button" id="cleanButton">Очистить</button>
        
            </form>

        </div>

@endsection

@section('scripts')
    
    <script src="{{ asset('js/posts/store.js') }}"></script>

@endsection