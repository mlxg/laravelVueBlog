{{--<html>
<head>
    <title>{{ config('blog.title') }}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>{{config('blog.title1')}}</h1>
    <h5>Page {{$posts->currentPage()}} of {{$posts->lastPage()}}</h5>
    <hr>
    <ul>
        @foreach($posts as $post)
            <li>
                <h2><a href="/blog/{{$post->slug}}">{{$post->title}}</a></h2>
                <p>
                    正文：{{str_limit($post->content)}}
                </p>
                <h6>发表于{{$post->published_at}}</h6>
                <hr>
            </li>
        @endforeach
    </ul>
    <nav style="text-align: center">
    {!! $posts->render() !!}
    </nav>
</div>
</body>
</html>--}}

@extends('layouts.app')
@section('til')
    <title>{{ config('blog.title1') }}</title>
@endsection
@section('css')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <h1>{{config('blog.title1')}}</h1>
        <h5>Page {{$posts->currentPage()}} of {{$posts->lastPage()}}</h5>
        <hr>
        <ul>
            @foreach($posts as $post)

                <li>
                    <h2><a href="/blog/{{$post->slug}}">{{$post->title}}</a></h2>
                    <p>
                        正文：{{str_limit($post->content)}}
                    </p>
                    <h6>发表于{{$post->published_at}}</h6>
                    <hr>
                </li>
            @endforeach
        </ul>
        <nav style="text-align: center">
            {!! $posts->render() !!}
        </nav>
    </div>
@endsection

@section('js')
@endsection