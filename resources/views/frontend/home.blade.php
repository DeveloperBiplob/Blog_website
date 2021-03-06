@extends('frontend.layouts.frontend_app')
@section('app-content')
    <!-- Hero Section-->
    <div class="owl-carousel hero_slider">
        @foreach($sliders as $slider)
        <section style="background: url({{ asset($slider->image) }}); background-size: cover; background-position: center center; height:70vh" class="hero wow animate__animated animate__fadeInTopLeft">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <h1 class="bg-dark p-3">{{ $slider->title }}</h1><a href="#" class="hero-link">Discover More</a>
                    </div>
                </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
            </div>
        </section>
        @endforeach
    </div>
    <!-- Intro Section-->
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="h3">About Us</h2>
                    <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-posts no-padding-top">
        <div class="container">
            <!-- Post-->
            @foreach($randPosts as $post)
                <div class="row d-flex align-items-stretch my-3">
                    @if($loop->index  % 2 !== 0)
                    <div class="image col-lg-5"><img src="{{ asset($post->image) }}" alt="..."></div>
                    @endif
                    <div class="text col-lg-7">
                        <div class="text-inner d-flex align-items-center">
                            <div class="content">
                                <header class="post-header">
                                    <div class="category"><a href="">{{ $post->category->name }}</a><a href="">{{ $post->sub_category->name }}</a></div><a href="{{ route('single-post', $post->slug) }}">
                                    <h2 class="h4">{{ $post->name }}</h2></a>
                                </header>
                                <p>{!! $post->short_des !!}</p>
                                <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ asset($post->author->image) }}" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>{{ $post->author->name }}</span></div></a>
                                    <div class="date"><i class="icon-clock"></i>{{ $post->created_at->diffForHumans() }}</div>
                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                </footer>
                            </div>
                        </div>
                    </div>
                   @if($loop->index  % 2 === 0)
                   <div class="image col-lg-5"><img src="{{ asset($post->image) }}" alt="..."></div>
                   @endif
                </div>

            @endforeach
        </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url({{ asset('frontend') }}/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts"> 
        <div class="container">
            <header> 
                <h2>Latest from the blog</h2>
                <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </header>
            <div class="row">
                @foreach($latestPosts as $post)
                <div class="post col-md-4">
                    <div class="post-thumbnail"><a  href="post.html"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></a></div>
                    <div class="post-details">
                        <div class="post-meta d-flex justify-content-between">
                            <div class="date">{{ $post->created_at->format('d M | Y') }}</div>
                            <div class="category"><a href="{{ route('category-post', $post->category->slug) }}">{{ $post->category->name }}</a></div>
                        </div><a href="{{ route('single-post', $post->slug) }}">
                        <h3 class="h4">{{ $post->name }}</h3></a>
                        <p class="text-muted">{!! $post->short_des !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top">    
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Subscribe to Newsletter</h2>
                    <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-8">
                    <div class="form-holder">
                        <form action="#" id="subscriberForm">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Type your email address">
                                <button type="submit" class="submit">Subscribe</button>
                            </div>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span id="notificatin" class="text-danger"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section-->
    <section class="gallery no-padding">    
        <div class="row">
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('frontend') }}/img/gallery-1.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('frontend') }}/img/gallery-2.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('frontend') }}/img/gallery-3.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="{{ asset('frontend') }}/img/gallery-4.jpg" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        const select = (el) => document.querySelector(el);
        let subscriberForm = select('#subscriberForm');
        let email = select('#email');
        let notificatin = select('#notificatin');
        let url = `${window.location.origin}/subscriber`;

        subscriberForm.addEventListener('submit', async function(e){
            e.preventDefault();
            // console.log(email.value)
            if(email.value){
                try{
                    const response = await axios.post(url,{
                    email : email.value
                    });
                    notificatin.innerHTML = 'Thanks For Subscribe our blog!';
                    email.value = ''
                }catch(err){
                    if(err.response.data.errors.email){
                        notificatin.innerHTML = err.response.data.errors.email[0]
                    }
                }
            }else{
                notificatin.innerHTML = 'Please Enter a Valid Email Address!'
            }
        })
    </script>
@endpush