<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>{{ config('blog.title') }} </h1>
    <h5>Page {{ $posts->currentPage() }} of {{$posts->lastPage()}}</h5>
    <hr>
    <ul>
        @foreach($posts as $post)
            <li>
            <a href="{{ route('blog.detail',['slug'=>$post->slug])}}">{{$post->title}}</a>
                <em>({{ $post->published_at}})</em>
                <p>
                    {{ str_limit($post->content) }}
                </p>
        @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
</div>
</body>
</html>