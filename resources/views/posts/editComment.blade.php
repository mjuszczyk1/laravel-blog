@extends('main')

@section('content')
    <div class="col-sm-8">
        <h1>Edit comment:</h1>
        @include ('partials.errors')
        <form method="POST" action="/comments/{{$comment->id}}/edit">
            {{csrf_field()}}
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea class="form-control" id="body" name="body" required>{{$comment->body}}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Submit</button>
            </div>
        </form>
    </div>
@endsection