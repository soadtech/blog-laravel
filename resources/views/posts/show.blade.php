@extends('layout')

@section('meta-title', $post->title)

@section('content')
<article class="post image-w-text container">
    <div class="content-post">
        <header class="container-flex space-between">
            <div class="date">
            <span class="c-gris">{{$post->published_at->format('M d')}}</span>
            </div>
            <div class="post-category">
            <span class="category">{{$post->category->name}}</span>
            </div>
        </header>
        <h1>{{$post->title}}</h1>
            <div class="divider"></div>
            <div class="image-w-text">
                {!! $post->body !!}
            </div>

       

        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://mariserje.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    
        </div><!-- .comments -->
    </div>
  </article>
@endsection

@push('scripts')
<script id="dsq-count-scr" src="//mariserje.disqus.com/count.js" async></script>
@endpush