<div class="comments">
    @if (count($post->comments))
        <h2>Comments</h2>
        <div class="list-group unstyled">
            @foreach($post->comments as $comment)
                <div class="list-group-item d-block border-bottom-0">
                    <p class="mb-0"><strong>{{ $comment->body }}</strong></p>
                    <p class="mb-0">comment by {{$comment->user_id}}, {{$comment->created_at->diffForHumans()}}</p>
                </div>
            @endforeach
        </div>
    @else
        <h2>No comments yet</h2>
    @endif
    <div class="card rounded-0">
        <div class="card-block pb-0">
            @if (Auth::guest())
                <p><a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> to post a comment!</p>
            @else
                <h3>Add Comment</h3>
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
            @endif
        </div>
        
    </div>
</div>