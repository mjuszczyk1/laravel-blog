<div class="comments">
    @if (count($post->comments))
        <h2>Comments</h2>
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <p class="mb-0">
                        <strong>{{$comment->created_at->diffForHumans()}}: </strong>
                        {{$comment->body}}
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <h2>No comments yet</h2>
    @endif
    <div class="card">
        <div class="card-block pb-0">
            <h3>Add Comment</h3>
        </div>
        @include ('partials.errors')
        <div class="card-block">
            <form method="POST" action="/posts/{{$post->id}}/comments">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" class="form-control" required></textarea>      
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>