@extends('frontend.layouts.frontend_app')
@section('app-content')
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <main class="posts-listing col-lg-8"> 
          <div class="container">
            <div class="row">
              <!-- post -->
            @foreach($posts as $post)
              @if ($post->status == 1)
                <div class="post col-xl-6">
                  <div class="post-thumbnail"><a href="{{ route('single-post', $post->slug) }}"><img src="{{ asset($post->image) }}" alt="..." class="img-fluid"></a></div>
                  <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                      <div class="date meta-last">{{ $post->created_at->format('d M | Y') }}</div>
                      <div class="category"><a href="{{ route('category-post', $post->category->slug) }}">{{ $post->category->name }}</a></div>
                    </div><a href="{{ route('single-post', $post->slug) }}">
                      <h3 class="h4">{{ $post->name }}</h3></a>
                    <p class="text-muted">{!! $post->short_des !!}</p>
                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                        <div class="avatar"><img src="{{ asset($post->author->image) }}" alt="..." class="img-fluid"></div>
                        <div class="title"><span>{{ $post->author->name }}</span></div></a>
                      <div class="date"><i class="icon-clock"></i>{{ $post->created_at->diffForHumans() }}</div>
                      <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                    </footer>
                  </div>
                </div>    
              @endif
            @endforeach
            </div>
              {{-- Customizing The Pagination View
              // Ai comand run korte hobe  - php artisan vendor:publish --tag=laravel-pagination
              // view er modde vendor/pagination akta folder provide kore se kane onek gulo Pagination dewa thake.
              // And chaile amara o cusotm vabe create korte pari.
              // 
               --}}
            {{ $posts->links('vendor.pagination.custom-pagination') }}
            <!-- Pagination -->
            {{-- <nav aria-label="Page navigation example">
              <ul class="pagination pagination-template d-flex justify-content-center">
                <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
                <li class="page-item"><a href="#" class="page-link active">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
              </ul>
            </nav> --}}
          </div>
        </main>
        <aside class="col-lg-4">
          <!-- Widget [Search Bar Widget]-->
          <div class="widget search">
            <header>
              <h3 class="h6">Search the blog <span id="postCount" class="badge badge-success"></span></h3>
            </header>
            <form action="#" class="search-form" id="searchForm">
              <div class="form-group">
                <input id="searchInput" type="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search"></i></button>
              </div>
            </form>
            <img width="250px" src="{{ asset('loader.gif') }}" alt="" id="loader">
            <div id="searchData">
              <ul style="list-style: none">
                {{-- <li id="li">Biplob</li> --}}
              </ul>
            </div>
          </div>
          {{-- {{ $categories->count() }} --}}
          <!-- Component e Variable er maje Underscore Support kore na. Camel Case use korte hoy -->
          <x-Pertial.widget-component :latestPosts="$latestPosts" :categories="$categories" :tags="$tags" />
        </aside>
      </div>
    </div>
@endsection

@push('script')
  {{-- <script>
    const select = (el) => document.querySelector(el);


    // Normal Wayte---//

    // let searchInput = select('#searchInput');  
    // searchInput.addEventListener('keyup', function(e){

    //   // console.log(e.target.value);
    //   let query = e.target.value;
    //   let url = `${window.location.origin}/search-post/${query}`;

    //   if(searchInput.value){
    //     // axios er Past peramiter URL, second peramiter request e jodi kono value send korte chai seta dite pari.
    //     axios.get(url)
    //     .then(res => {
    //         console.log(res)
    //     }).catch(err => {
    //         console.log(err);
    //     })
    //   }



    // async await wayte -----//
    // ata use korel ata ke try catch bolck e use korte hobe. jemon age then catch use korchi.

    let searchInput = select('#searchInput');  
    let loader = select('#loader');
    // Inisialy display none thakbe
    loader.style.display = 'none'; 

    searchInput.addEventListener('keyup', async function(e){
      e.preventDefault();
      let query = e.target.value;
      let url = `${window.location.origin}/search-post/${query}`;

      if(searchInput.value){
        // let response = await axios.get(url)
        // console.log(response)

        try{
          // jehetoh request e data aste kicho ta time lagbe ti ai kane loader ta show korabo.
          loader.style.display = 'block';

          // let response = await axios.get(url)
          // // console.log(response)
          // console.log(response.data)

          // ata ke distructor korte pari.
          // sora sori data gulo access korte parbo.
          // Ai kane chaile amara custom name use korte pari. seta korar jonno data:customName dite hobe.

          // let {data} = await axios.get(url)
          // console.log(data)

          let {data:posts} = await axios.get(url)
          // console.log(posts)

          // function e data ta pass kore dilam.
          displayPosts(posts)


        }catch(err){

          // catch block e ase loading image er display none kore dibo.
          loader.style.display = 'none';
          // console.log(err)

        }finally{

          // Kono kicho default use korte chai ta hole ata use korbo.

          // final block e ase loading image er display none kore dibo.
          loader.style.display = 'none';

        }
      }

    });

    // akta arry function define korci data gulo show koranor jonno.

    const displayPosts = (posts) => {
        // post count kore show
        let postCount = select('#postCount');
        postCount.innerHTML = Object.keys(posts).length;

      let searchData = select('#searchData > ul')
      // console.log(searchData)
      let li = null ;

      if(Object.keys(posts).length === 0){
        li = `<li style="list-style:none;text-align:center;background:#ccc" class="p-2 text-danger">No Post Found!!</li>`;
      }else{
        
      li = posts.map(post => {

        // let base_url = window.location.origin;
        // return `<li><a href="${base_url}/post/${post.slug}">${post.name}</a></li>`;

        // base url na dile o hoy. jodi kokhono problem kore ta hole bole dibo----//
        return `<li><a href="/post/${post.slug}">${post.name} | ${post.author.name}</a></li>`;
          });
          li = li.join(" "); // javascript er bulding method. jeta li gulo maje akta spase or gape dei.

      }

      // console.log(li)
      searchData.innerHTML = li;

    }

  </script> --}}

  {{-- Finall Code --------------------------------}}

  <script>
    const select = (el) => document.querySelector(el);

    let searchInput = select('#searchInput');
    let loader = select('#loader');
    loader.style.display = 'none';
    searchInput.addEventListener('keyup',async function(e){
        let query = e.target.value;
        let url = `${window.location.origin}/search-post/${query}`;

        if(searchInput.value){
            // axios.get(url)
            // .then(res => {
            //     log(res)
            // }).catch(err => {
            //     console.log(res);
            // })

            try{
                loader.style.display = 'block';
                // let response = await axios.get(url);
                let {data:posts} = await axios.get(url);
                displayPost(posts);
            }catch(err){
                loader.style.display = 'none';
                log(err)
            }finally{
                loader.style.display = 'none';
            }
        }
    });

    const displayPost = (posts) => {
        let postCount = select('#postCount');
        postCount.innerHTML = Object.keys(posts).length;
        let searchData = select('#searchData > ul');
        let li = null ;
        if(Object.keys(posts).length === 0){
            li = `<li style="list-style:none;text-align:center;background:#ccc" class="p-2 text-danger">No Post Found!!</li>`;
        }else{
            li = posts.map(post => {
                return `<li><a href="/post/${post.slug}">${post.name} | ${post.author.name}</a></li>`;
            });
            li = li.join(" ")
        }


        searchData.innerHTML = li;
    }
</script>

@endpush