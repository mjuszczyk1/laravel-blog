@extends('main')

@section('content')
    <div class="col-sm-8">
        <div class="post-info">
            <h1 class="font-weight-bold d-inline-block">{{$post->title}}</h1>
            @if(Session::has('flash_message'))
                <div class="alert alert-danger">
                    {{Session::get('flash_message')}}
                </div>
            @endif
            @if(!empty(Auth::user()->name) && $post->user->name == Auth::user()->name)
                <div class="post-controls d-inline-block pull-right mt-1">
                    <form method="GET" action="/posts/{{$post->id}}/edit" class="d-inline">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>
                    <form method="GET" action="/posts/{{$post->id}}/delete" class="d-inline">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endif
            @if(!empty($post->subtitle))
                <h2>{{$post->subtitle}}</h2>
            @endif
            <aside class="post-byline">
                <p>By {{$post->user->name}}, {{$post->created_at->format('F j, Y \a\t g:ia')}}</p>
            </aside>
        </div>
        <hr>
        <p>{{$post->body}}</p>
        <hr>
        @include ('posts.comments')
    </div>
@endsection

