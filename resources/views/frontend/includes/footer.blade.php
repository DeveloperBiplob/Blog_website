<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <h6 class="text-white">Bootstrap Blog</h6>
                </div>
                <div class="contact-details">
                    <p>{{ $website->address }}</p>
                    <p>Phone: {{ $website->phone }}</p>
                    <p>Email: <a href="mailto:{{ $website->email }}">{{ $website->email }}</a></p>
                    <ul class="social-menu">
                        <li class="list-inline-item"><a target="_blank" href="{{ $website->facebook }}"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="{{ $website->twitter }}"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="{{ $website->instagram }}"><i class="fa fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a target="_blank" href="{{ $website->behance }}"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menus d-flex">
                    <ul class="list-unstyled">
                        <li> <a href="#">My Account</a></li>
                        <li> <a href="#">Add Listing</a></li>
                        <li> <a href="#">Pricing</a></li>
                        <li> <a href="#">Privacy &amp; Policy</a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li> <a href="#">Our Partners</a></li>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">How It Works</a></li>
                        <li> <a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="latest-posts">
                    @foreach($latest_posts as $post)
                    <a href="{{ route('single-post', $post->slug) }}" class="d-block my-3">
                        <div class="post d-flex align-items-center">
                            <div class="image"><img src="{{ asset($post->image) }}" alt="" class="img-fluid"></div>
                            <div class="title"><strong>{{ $post->name }}</strong><span class="date last-meta">{{ $post->created_at->format('M d, Y') }}</span></div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <p class="d-inline-block m-auto">&copy; {{ $website->footer_1 }}</p>
            </div>
        </div>
    </div>
</footer>