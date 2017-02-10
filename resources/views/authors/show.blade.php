@extends('main')

@section('content')
    <div class="col-sm-8">
        <h1>{{$author[0]->name}}</h1>
        <hr>
        <div class="list-group">
            @foreach($posts as $post)
                @include('posts.post')
            @endforeach
        </div>
    </div>
@endsection