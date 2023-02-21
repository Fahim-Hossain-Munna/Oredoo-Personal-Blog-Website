@extends('layouts.frontendmaster')


@section('content')

    <!-- blog-slider-->
    <section class="blog blog-home4 d-flex align-items-center justify-content-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel">
                        <!--post1-->
                        @forelse ($blogposts as $post)
                            <div class="blog-item" style="background-image: url('{{ asset('blog_images') }}/{{ $post->blog_title_image }}')">
                                <div class="blog-banner">
                                    <div class="post-overly">
                                        <div class="post-overly-content">
                                            <div class="entry-cat">
                                                <a href="{{ route('web.category',[$post->RelationWithCategory->category_slug,$post->RelationWithCategory->id]) }}" class="category-style-2">{{ $post->RelationWithCategory->category_name }}</a>
                                            </div>
                                            <h2 class="entry-title">
                                                <a href="{{ route('web.single.post',$post->id) }}">{{ $post->blog_title }}</a>
                                            </h2>
                                            <ul class="entry-meta">
                                                <li class="post-author"> <a href="#">{{ $post->RelationWithUser->name }}</a></li>
                                                <li class="post-date"> <span class="line"></span>Publsh Date , {{ $post->blog_publish_date }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- top categories-->
    <div class="categories">
        <div class="container-fluid">
            <div class="categories-area">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="categories-items">
                            @forelse ($categories as $category)
                                <a class="category-item" href="{{ route('web.category',[ $category->category_slug , $category->id]) }}">
                                    <div class="image">
                                        <img src="{{ asset('category_images') }}/{{ $category->category_image }}" alt="">
                                    </div>
                                    <p>{{ $category->category_name }} <span>{{ $category->RelationWithBlog()->count() }}</span> </p>
                                </a>
                            @empty
                            <a class="category-item" href="#">
                                <div class="image">
                                    <img src="{{ asset('blog_assets') }}/assets/img/categories/1.jpg" alt="">
                                </div>
                                <p>No Category Found <span>0</span> </p>
                            </a>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent articles-->
    <section class="section-feature-1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 oredoo-content">
                    <div class="theiaStickySidebar">
                        <div class="section-title">
                            <h3>recent Articles </h3>
                            <p>Discover the most outstanding articles in all topics of life.</p>
                        </div>

                        <!--post1-->
                        @forelse ($all_blogs as $blog)
                            <div class="post-list post-list-style4">
                                <div class="post-list-image">
                                    <a href="{{ route('web.single.post',$blog->id) }}">
                                        <img src="{{ asset('blog_images') }}/{{ $blog->blog_title_image }}" alt="">
                                    </a>
                                </div>
                                <div class="post-list-content">
                                    <ul class="entry-meta">
                                        <li class="entry-cat">
                                            <a href="{{ route('web.category',[ $blog->RelationWithCategory->category_slug , $blog->RelationWithCategory->id]) }}" class="category-style-1">{{ $blog->RelationWithCategory->category_name }}</a>
                                        </li>
                                        <li class="post-date"> <span class="line"></span>Publish Date : {{ $blog->blog_publish_date }}</li>
                                    </ul>
                                    <h5 class="entry-title">
                                        <a href="{{ route('web.single.post',$blog->id) }}">
                                            <?php
                                                $blog_des = strip_tags($blog->blog_short_description);
                                                $blog_id = $blog->id;
                                                if(strlen($blog_des > 80)):
                                                    $blog_cut = substr($blog_des,0,80);
                                                    $endpoint = strrpos($blog_cut, " ");
                                                    $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                                                    $blog_des .=".....  <span class='text-info fw-bold'>Read More</span>";
                                                endif;
                                                echo $blog_des;
                                            ?></p>
                                    </h5>

                                    <div class="post-btn">
                                        <a href="{{ route('web.single.post',$blog->id) }}" class="btn-read-more">Continue Reading <i
                                                class="las la-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>

                        @empty
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="#">
                                    <img src="" alt="no image">
                                </a>
                            </div>
                                <h5 class="entry-title">
                                    <a href="post-single.html">No Post Found</a>
                                </h5>
                            </div>
                        </div>
                        @endforelse
                        <!--pagination-->
                        <div class="pagination">
                            <div class="pagination-area">
                                {{$all_blogs->links()}}
                            </div>
                        </div>
                    </div>
                </div>

                <!--Sidebar-->
                <div class="col-lg-4 oredoo-sidebar">
                    <div class="theiaStickySidebar">
                        <div class="sidebar">
                            <!--search-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Search</h5>
                                </div>
                                <div class=" widget-search">
                                    <form action="{{ route('web.search') }}">
                                        <input type="search" id="gsearch" name="websearch" placeholder="Search ....">
                                        <button type="submit" class="btn-submit"><i class="las la-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <!--popular-posts-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Random Posts</h5>
                                </div>

                                <ul class="widget-popular-posts">
                                    <!--post1-->
                                    @forelse ($latest_posts as $post)
                                        <li class="small-post">
                                            <div class="small-post-image">
                                                <a href="post-single.html">
                                                    <img src="{{ asset('blog_images') }}/{{ $post->blog_title_image }}" alt="">
                                                    <small class="nb">{{ $loop->index+1 }}</small>
                                                </a>
                                            </div>
                                            <div class="small-post-content">
                                                <p>
                                                    <a href="{{ route('web.single.post',$post->id) }}">
                                                        <?php
                                                            $blog_des = strip_tags($post->blog_short_description);
                                                            if(strlen($blog_des > 50)):
                                                                $blog_cut = substr($blog_des,0,50);
                                                                $endpoint = strrpos($blog_cut, " ");
                                                                $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                                                                $blog_des .=".....";
                                                            endif;
                                                            echo $blog_des;
                                                        ?>
                                                    </a>
                                                </p>
                                                <small> <span class="slash"></span>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                                            </div>
                                        </li>
                                    @empty

                                    @endforelse
                                </ul>
                            </div>

                            <!--newslatter-->
                            <div class="widget widget-newsletter">
                                <h5>Subscribe To Our Newsletter</h5>
                                <p>No spam, notifications only about new products, updates.</p>
                                <form action="{{ route('subscriber') }}" class="newslettre-form" method="POST">
                                    @csrf
                                    <div class="form-flex">
                                        <div class="form-group">
                                            <input type="email" name="email_newslatter" class="form-control @error('email_newslatter') is-invalid @enderror" placeholder="Your Email Adress" >
                                        </div>
                                        @error('email_newslatter')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <button class="btn-custom" type="submit">Subscribe now</button>
                                    </div>
                                </form>
                            </div>

                            <!--stay connected-->
                            <div class="widget ">
                                <div class="widget-title">
                                    <h5>Stay connected</h5>
                                </div>

                                <div class="widget-stay-connected">
                                    <div class="list">
                                        <div class="item color-facebook">
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <p>Facebook</p>
                                        </div>

                                        <div class="item color-instagram">
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <p>instagram</p>
                                        </div>

                                        <div class="item color-twitter">
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <p>twitter</p>
                                        </div>

                                        <div class="item color-youtube">
                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                            <p>Youtube</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--Tags-->
                            <div class="widget">
                                <div class="widget-title">
                                    <h5>Tags</h5>
                                </div>
                                <div class="widget-tags">
                                    <ul class="list-inline">
                                        <li>
                                            <a href="#">Travel</a>
                                        </li>
                                        <li>
                                            <a href="#">Nature</a>
                                        </li>
                                        <li>
                                            <a href="#">tips</a>
                                        </li>
                                        <li>
                                            <a href="#">forest</a>
                                        </li>
                                        <li>
                                            <a href="#">beach</a>
                                        </li>
                                        <li>
                                            <a href="#">fashion</a>
                                        </li>
                                        <li>
                                            <a href="#">livestyle</a>
                                        </li>
                                        <li>
                                            <a href="#">healty</a>
                                        </li>
                                        <li>
                                            <a href="#">food</a>
                                        </li>
                                        <li>
                                            <a href="#">interior</a>
                                        </li>
                                        <li>
                                            <a href="#">branding</a>
                                        </li>
                                        <li>
                                            <a href="#">web</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </section>


    @endsection
