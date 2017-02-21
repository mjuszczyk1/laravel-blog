@extends('main')

@section('content')
    <div class="col-sm-8">
        <h1>Edit post: <br>
            {{$post->title}}
        </h1>
        @if(Session::has('flash_message'))
            <div class="alert alert-danger">
                {{Session::get('flash_message')}}
            </div>
        @endif
        @include ('partials.errors')
        <form method="POST" action="/posts/{{$post->id}}/edit">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}" required>
            </div>
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" required>{{$post->body}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
@endsection