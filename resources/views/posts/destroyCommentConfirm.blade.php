@extends ('main')

@section('content')
    <div class="col-sm-8">
        <h1>Are you sure you would like to this comment?</h1>
        <div class="card mb-3">
            <p class="mb-0 p-3">{{$comment->body}}</p>
        </div>
        <form method="GET" action="/posts/{{$comment->post_id}}" class="d-inline-block">
            <div class="form-group">
                <button type="submit" class="btn btn-info">Never mind!</button>
            </div>
        </form>
        <form method="POST" action="/comments/{{$comment->id}}/delete" class="d-inline-block">
            {{csrf_field()}}
            <div class="form-group">
                <button type="submit" class="btn btn-danger">I'm sure, delete!</button>
            </div>
        </form>
    </div>
@endsection