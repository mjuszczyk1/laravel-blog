<article class="blog-post">
    <h2 class="font-weight-bold"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h2>
    <p class="blog-post-meta">{{$post->created_at->format('F j, Y \a\t g:ia')}} by <a href="/authors/{{$post->user->name_slug}}">{{$post->user->name}}</a></p>
    <p class="blog-post-teaser">{{str_limit($post->body, 149)}}</p>
    <hr>
</article>