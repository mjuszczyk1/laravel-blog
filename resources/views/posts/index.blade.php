@extends('main') 

@section('content')
    <div class="col-sm-8">
        @include('posts.header')
        <hr>
        @foreach($posts as $post)
            @include('posts.post')
        @endforeach
        
    </div>
@endsection
