<!-- Widget [Latest Posts Widget]        -->
<div class="widget latest-posts">
    <header>
      <h3 class="h6">Latest Posts</h3>
    </header>
    <div class="blog-posts">
    @foreach($latestPosts as $post)
    <a href="{{ route('single-post', $post->slug) }}">
        <div class="item d-flex align-items-center">
            <div class="image"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></div>
            <div class="title"><strong>{{ $post->name }}</strong>
                <div class="d-flex align-items-center">
                    <div class="views"><i class="icon-eye"></i>{{ $post->view }}</div>
                    <div class="comments"><i class="icon-comment"></i>{{ $post->comments->count() }}</div>
                </div>
            </div>
        </div>
    </a>
    @endforeach
  </div>
  <!-- Widget [Categories Widget]-->
  <div class="widget categories">
    <header>
      <h3 class="h6">Categories</h3>
    </header>
    @foreach($categories as $category)
    <div class="item d-flex justify-content-between"><a href="{{ route('category-post', $category->slug) }}">{{ $category->name }}</a><span>{{ $category->posts->count() }}</span></div>
    @endforeach
  </div>
  <!-- Widget [Tags Cloud Widget]-->
  <div class="widget tags">       
    <header>
      <h3 class="h6">Tags</h3>
    </header>
    <ul class="list-inline">
        @foreach($tags as $tag)
        <li class="list-inline-item"><a href="{{ route('tag-post', $tag->slug) }}" class="tag">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
  </div>