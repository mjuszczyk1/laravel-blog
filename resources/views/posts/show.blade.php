@extends('main')

@section('content')
    <div class="col-sm-8">
        <h1>{{$post->title}}</h1>

        <p>{{$post->body}}</p>
        <hr>
        @include ('posts.comments')
    </div>
@endsection

