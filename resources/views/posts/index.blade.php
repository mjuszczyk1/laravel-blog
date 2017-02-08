@extends('main') 

@section('content')
    <section class="col-sm-8">
        @include('posts.header')
        <hr>
        @foreach($posts as $post)
            @include('posts.post')
        @endforeach
        
    </section>
@endsection
