<article class="blog-post">
    <h2 class="font-weight-bold"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
    <p class="blog-post-meta">{{$post->created_at->format('F j, Y')}} by {{$post->user->name}}</p>
    {{str_limit($post->body, 149)}}
    <hr>
</article>