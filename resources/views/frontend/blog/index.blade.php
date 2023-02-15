@extends('layouts.frontendmaster')

@section('content')

<!--section-heading-->
<div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h2>The first step in blogging is not writing them but reading them.</h2>
                         {{-- <h5 class="text-uppercase text-info mb-2">- Jeff Jarvis</h5> --}}
                         <p class="links"><a href="{{ route('index') }}">Home <i class="las la-angle-right"></i></a> Blog</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>


 <!-- Blog Layout-2-->
 <section class="blog-layout-2">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-12">
                 <!--post 1-->
                 @forelse ($all_blogs as $blog)
                    <div class="post-list post-list-style2">
                        <div class="post-list-image">
                            <a href="{{ route('web.single.post',$blog->id) }}">
                                <img src="{{ asset('blog_images') }}/{{ $blog->blog_title_image }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <h3 class="entry-title">
                                <a href="{{ route('web.single.post',$blog->id) }}">{{ $blog->blog_title }}</a>
                            </h3>
                            <ul class="entry-meta">
                                <li class="post-author-img"><img src="{{ asset('profile_image_user') }}/{{ $blog->RelationWithUser->user_photo }}" alt=""></li>
                                <li class="post-author"> <a href="#">{{ $blog->RelationWithUser->name }}</a></li>
                                <li class="entry-cat"> <a href="{{ route('web.category',[ $blog->RelationWithCategory->category_slug , $blog->RelationWithCategory->id]) }}" class="category-style-1 "> <span class="line"></span> {{ $blog->RelationWithCategory->category_name }}</a></li>
                                <li class="post-date"> <span class="line"></span>Publish Date : {{ $blog->blog_publish_date }}</li>
                            </ul>
                            <div class="post-list-content">
                                <div class="post-exerpt">
                                    <p>
                                    <?php
                                        $blog_des = strip_tags($blog->blog_short_description);
                                        $blog_id = $blog->id;
                                        if(strlen($blog_des > 250)):
                                            $blog_cut = substr($blog_des,0,250);
                                            $endpoint = strrpos($blog_cut, " ");
                                            $blog_des = $endpoint?substr($blog_cut,0,$endpoint):substr($blog_cut,0);
                                            $blog_des .=".....  <a href='#' class='text-info fw-bold'>Read More</a>";
                                        endif;
                                        echo $blog_des;
                                    ?></p>
                                </div>
                            </div>
                            <div class="post-btn">
                                <a href="{{ route('web.single.post',$blog->id) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                 @empty
                 <div class="post-list post-list-style2">
                    <div class="post-list-image">
                        <a href="post-single.html">
                            <img src="" alt="NO IMAGE">
                        </a>
                    </div>
                    <div class="post-list-content">
                        <div class="post-exerpt">
                            <p>No Blog Found!</p>
                        </div>
                    </div>
                </div>

                 @endforelse

             </div>
         </div>
     </div>
 </section>


<!--pagination-->
<div class="pagination">
     <div class="container-fluid">
         <div class="pagination-area">
             <div class="row">
                 <div class="col-lg-12">
                        {{$all_blogs->links()}}
                 </div>
             </div>
         </div>
     </div>
 </div>


@endsection
