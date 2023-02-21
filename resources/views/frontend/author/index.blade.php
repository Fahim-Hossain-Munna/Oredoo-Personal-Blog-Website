@extends('layouts.frontendmaster')

@section('content')

 <!--author-->
 <section class="authors">
    <div class="container-fluid">
        <div class="row">
            <!--author-image-->
            <div class="col-lg-12 col-md-12 ">
                    <div class="authors-info">
                    <div class="image">
                        <a href="#" class="image">
                            @if (auth()->user()->user_photo == 'default.jpg')
                            <img src="{{ asset('user_default_picture') }}/{{ auth()->user()->user_photo }}" alt="">
                            @else

                            <img src="{{ asset('profile_image_user') }}/{{ auth()->user()->user_photo }}" alt="">
                            @endif
                        </a>
                    </div>
                    <div class="content">
                        <h4 >{{ auth()->user()->name }}</h4>
                        <p>
                            {{ auth()->user()->email }}
                        </p>
                        <p>
                            {{ auth()->user()->about_user }}
                        </p>
                        <div class="social-media">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" >
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" >
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/-->
            </div>
        </div>
    </div>
</section>

<!-- blog-author-->
<section class="blog-author mt-30">
    <div class="container-fluid">
        <div class="row">
            <!--content-->
            <div class="col-lg-8 oredoo-content">
                <div class="theiaStickySidebar">
                    <!--post1-->
                  @forelse ($blogs as $blog)
                      <div class="post-list post-list-style4 pt-0">
                          <div class="post-list-image">
                              <a href="{{ route('web.single.post',$blog->id) }}">
                                  <img src="{{ asset('blog_images') }}/{{ $blog->blog_title_image }}" alt="">
                              </a>
                          </div>
                          <div class="post-list-content">
                              <ul class="entry-meta">
                                  <li class="entry-cat">
                                      <a href="blog-layout-1.html" class="category-style-1">{{ $blog->RelationWithCategory->category_name }}</a>
                                  </li>
                                  <li class="post-date"> <span class="line"></span>Publish Date - {{ $blog->blog_publish_date }}</li>
                              </ul>
                              <h5 class="entry-title">
                                  <a href="{{ route('web.single.post',$blog->id) }}">
                                    <?php
                                        $blog_des = strip_tags($blog->blog_short_description);
                                        $blog_id = $blog->id;
                                        if(strlen($blog_des > 90)):
                                            $blog_cut = substr($blog_des,0,90);
                                            $endpoint = strrpos($blog_cut, " ");
                                            $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                                            $blog_des .="........ <span class='text-info fw-bold'>Read More</span>";
                                        endif;
                                        echo $blog_des;
                                    ?>
                                  </a>
                              </h5>
                              <div class="post-btn">
                                  <a href="{{ route('web.single.post',$blog->id) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                              </div>
                          </div>
                      </div>
                  @empty
                  <div class="post-list post-list-style4 pt-0">
                    <div class="post-list-image">
                        <a href="post-single.html">
                            <img src="assets/img/blog/24.jpg" alt="no images">
                        </a>
                    </div>
                    <div class="post-list-content">
                        <h5 class="entry-title">
                            <a href="#" class="text-danger">There Are No Post Under This User!!</a>
                        </h5>
                    </div>
                </div>
                  @endforelse
                    <!--/-->
                    <!--pagination-->
                    <div class="pagination">
                        <div class="pagination-area text-left">
                           {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->

            <!--Sidebar-->
            <div class="col-lg-4 oredoo-sidebar">
                <div class="theiaStickySidebar">
                    <div class="sidebar">

                        <!--categories-->
                        <div class="widget ">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-categories">
                               @forelse ($categories as $category)
                                 <a class="category-item" href="{{ route('web.category',[ $category->category_slug , $category->id]) }}">
                                     <div class="image">
                                         <img src="{{ asset('category_images') }}/{{ $category->category_image }}" alt="">
                                     </div>

                                     <p>{{ $category->category_name }}</p>
                                 </a>
                               @empty

                               @endforelse
                            </div>
                        </div>

                         <!--Tags-->
                         <div class="widget">
                             <div class="widget-title">
                                 <h5>Tags</h5>
                             </div>
                             <div class="tags">
                                <ul class="list-inline">
                                     @forelse ($tags as $tag)
                                        <li>
                                            <a href="{{ route('web.tag',$tag->id) }}">{{ $tag->tag_name }}</a>
                                        </li>
                                     @empty
                                     <li>
                                        <a href="#">No Tags</a>
                                    </li>
                                     @endforelse
                                </ul>
                             </div>
                         </div>

                         <!--/-->
                     </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>
</section>

@endsection
