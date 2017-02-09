<div class="post-comments">
    @if (count($post->comments))
        <h2>Comments</h2>
        <div class="list-group comments-list">
            @foreach($post->comments as $comment)
                <div class="list-group-item d-block border-bottom-0 comments-comment">
                    <p class="mb-0 font-weight-bold">{{ $comment->body }}</p>
                    <p class="mb-0 ml-4">comment by {{$comment->user->name}}, {{$comment->created_at->diffForHumans()}}</p>
                    @if(!empty(Auth::user()->name) && $comment->user->id == Auth::user()->id)
                        <div class="comments-actions">
                            <a href="/comments/{{ $comment->id }}/edit" class="comments-edit">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-pencil fa-stack-1x" aria-hidden="true"></i>
                                </span>
                            </a>
                            <a href="/comments/{{ $comment->id}}/delete" class="comments-delete">
                                <span class="fa-stack">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-close fa-stack-1x" aria-hidden="true"></i>
                                </span>
                            </a>
                        </div>
                    @endif
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
    <script>
        $(function() {
            $('a.comments-edit').on('click', function(e) {
                // e.preventDefault();
                // // console.log();
                // const searchParams = {id: $(this).attr('href').split('/')[2]};
                // $.get($(this).attr('href'), searchParams, function(data) {
                //     console.log(data);
                // });
            });
        });
    </script>
</div>