@extends('layouts.frontendmaster')

@section('content')
 <!--section-heading-->
 <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>{{ $category_name->category_name }}</h1>
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
                 @forelse ($posts as $post)
                    <div class="post-list post-list-style2">
                        <div class="post-list-image">
                            <a href="{{ route('web.single.post',$post->id) }}">
                                <img src="{{ asset('blog_images') }}/{{ $post->blog_title_image }}" alt="">
                            </a>
                        </div>
                        <div class="post-list-content">
                            <h3 class="entry-title">
                                <a href="{{ route('web.single.post',$post->id) }}">{{ $post->blog_title }}</a>
                            </h3>
                            <ul class="entry-meta">
                                <li class="post-author-img"><img src="{{ asset('profile_image_user') }}/{{ $post->RelationWithUser->user_photo }}" alt=""></li>
                                <li class="post-author"> <a href="#">{{ $post->RelationWithUser->name }}</a></li>
                                <li class="entry-cat"> <a href="#" class="category-style-1 "> <span class="line"></span> {{ $post->RelationWithUser->role }}</a></li>
                                <li class="post-date"> <span class="line"></span> publish date, {{ $post->blog_publish_date }}</li>
                            </ul>
                            <div class="post-exerpt">
                                <p><?php echo $post->blog_short_description ?></p>
                            </div>
                            <div class="post-btn">
                                <a href="{{ route('web.single.post',$post->id) }}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                 @empty
                 <div class="post-list post-list-style2">
                    <div class="post-list-image">
                        <a href="{{ route('index') }}">
                            <img src="" alt="No Image Found">
                        </a>
                    </div>
                    <div class="post-list-content">
                        <h3 class="entry-title">
                            <a href="{{ route('index') }}">None Can Post Under this Category!</a>
                        </h3>
                        <div class="post-btn">
                            <a href="{{ route('index') }}" class="btn-read-more">Return Back <i class="las la-long-arrow-alt-right"></i></a>
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
                    {{$posts->links()}}
                 </div>
             </div>
         </div>
     </div>
 </div>


@endsection
