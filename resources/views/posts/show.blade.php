@extends('main')

@section('content')
    <div class="col-sm-8">
        <h1 class="font-weight-bold">{{$post->title}}</h1>

        <p>{{$post->body}}</p>
        <hr>
        @include ('posts.comments')
    </div>
@endsection

