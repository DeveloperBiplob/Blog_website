@extends('frontend.layouts.frontend_app')
@section('app-content')
<div class="container">
    <div class="row">
      <!-- Latest Posts -->
      <main class="post blog-post col-lg-8"> 
        <div class="container">
          <div class="post-single">
            <div class="post-thumbnail"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></div>
            <div class="post-details">
              <div class="post-meta d-flex justify-content-between">
                <div class="category"><a href="#">{{ $post->category->name }}</a><a href="#">{{ $post->sub_category->name }}</a></div>
              </div>
              <h1>{{ $post->name }}<a href="{{ route('bookmark', $post->slug) }}"><i class="fa fa-bookmark-o"></i></a></h1>
              <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                  <div class="avatar"><img src="{{ asset($post->author->image) }}" alt="..." class="img-fluid"></div>
                  <div class="title"><span>{{ $post->author->name }}</span></div></a>
                <div class="d-flex align-items-center flex-wrap">       
                  <div class="date"><i class="icon-clock"></i>{{ $post->created_at->diffForHumans() }}</div>
                  <div class="views"><i class="icon-eye"></i>{{ $post->view }}</div>
                  <div class="comments meta-last"><i class="icon-comment"></i>{{ $post->comments->count() }}</div>
                </div>
              </div>
              <div class="post-body">
                <p class="lead">{{ $post->long_des }}</p>
              </div>
                <div class="post-tags">
                  @foreach($post->tags as $tag)
                  <a href="#" class="tag">{{ $tag->name }}</a> 
                  @endforeach
                </div>
              <div class="post-comments">
                <header>
                  <h3 class="h4">Post Comments<span class="no-of-comments">({{ $post->comments->count() }})</span></h3>
                </header>
                <div class="comment">
                  @foreach($post->comments as $comment)
                  <div class="comment-header d-flex justify-content-between">
                    <div class="user d-flex align-items-center">
                      <div class="image"><img src="{{ asset($comment->user->image) }}" alt="{{ $comment->user->name }}" class="img-fluid rounded-circle"></div>
                      <div class="title"><strong>{{ $comment->user->name }}</strong><span class="date">{{ $comment->created_at->format('d M | Y') }}</span></div>
                    </div>
                  </div>
                  <div class="comment-body">
                    <p>{{ $comment->comment }}</p>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="add-comment">
                <header>
                  <h3 class="h6">Leave a reply</h3>
                </header>
                <form action="{{ route('post-comments', $post->slug) }}" method="POST" class="commenting-form">
                  @csrf
                  <div class="row">
                    <div class="form-group col-md-6">
                      <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ Auth('user')->user() ? Auth('user')->user()->name : '' }}">
                    </div>
                    @error('name')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-6">
                      <input type="email" name="email" id="email" placeholder="Email Address (will not be published)" class="form-control" value="{{ Auth('user')->user() ? Auth('user')->user()->email : '' }}">
                    </div>
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                      <textarea name="comment" id="comment" placeholder="Type your comment" class="form-control"></textarea>
                    </div>
                    @error('comment')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                      <button type="submit" class="btn btn-secondary">Submit Comment</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
      <aside class="col-lg-4">
        <!-- Widget [Search Bar Widget]-->
        <div class="widget search">
          <header>
            <h3 class="h6">Search the blog</h3>
          </header>
          <form action="#" class="search-form">
            <div class="form-group">
              <input type="search" placeholder="What are you looking for?">
              <button type="submit" class="submit"><i class="icon-search"></i></button>
            </div>
          </form>
        </div>
        <!-- Component e Variable er maje Underscore Support kore na. Camel Case use korte hoy -->
        <x-Pertial.widget-component :latestPosts="$latestPosts" :categories="$categories" :tags="$tags" />
      </aside>
    </div>
  </div>
@endsection