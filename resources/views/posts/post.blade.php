<div class="blog-post">
    <h2><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by {{$post->user->name}}</p>
    {{$post->body}}
</div>