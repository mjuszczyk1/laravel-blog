@extends ('main')

@section('content')
    <div class="col-sm-8">
        <h1>Are you sure you would like to delete <span class="text-danger">{{$post->title}}</span>?</h1>
        <form method="GET" action="/posts/{{$post->id}}" class="d-inline-block">
            <div class="form-group">
                <button type="submit" class="btn btn-info">Never mind!</button>
            </div>
        </form>
        <form method="POST" action="/posts/{{$post->id}}/delete" class="d-inline-block">
            {{csrf_field()}}
            <div class="form-group">
                <button type="submit" class="btn btn-danger">I'm sure, delete!</button>
            </div>
        </form>
    </div>
@endsection