@extends('layouts.frontendmaster')

@section('content')
 <!--section-heading-->
 <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>{{ $single_post->blog_title }}</h1>
                         <p class="links"><a href="{{ route('index') }}">Home <i class="las la-angle-right"></i></a> Blog</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>
    <!--post-single-->
    <section class="post-single">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-lg-12">
                    <!--post-single-image-->
                        <div class="post-single-image">
                            <img src="{{ asset('blog_images') }}/{{ $single_post->blog_title_image }}" alt="">
                        </div>

                        <div class="post-single-body">
                            <!--post-single-title-->
                            <div class="post-single-title">
                                <h2>{{ $single_post->blog_title }}</h2>
                                <ul class="entry-meta">
                                    <li class="post-author-img">
                                        @if ($single_post->RelationWithUser->user_photo == 'default.jpg')
                                            <img src="{{ asset('user_default_picture') }}/{{ $single_post->RelationWithUser->user_photo }}" alt="">
                                        @else
                                            <img src="{{ asset('profile_image_user') }}/{{ $single_post->RelationWithUser->user_photo }}" alt="">
                                        @endif
                                    </li>
                                    <li class="post-author"> <a href="author.html">{{ $single_post->RelationWithUser->name }}</a></li>
                                    <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span> {{ $single_post->RelationWithCategory->category_name }}</a></li>
                                    <li class="post-date"> <span class="line"></span> publish date, {{ $single_post->blog_publish_date }}</li>
                                </ul>

                            </div>

                            <!--post-single-content-->
                            <div class="post-single-content">
                                <p>
                                    <?php echo $single_post->blog_short_description ?>
                                </p>
                                <p>
                                    <?php echo $single_post->blog_long_description ?>
                                </p>
                            </div>

                            <!--post-single-bottom-->
                            <div class="post-single-bottom">
                                <div class="tags">
                                    <p>Tags:</p>
                                    <ul class="list-inline">
                                        @forelse ($single_post->RelationWithTags as $tag)
                                            <li >
                                                <a href="{{ route('web.tag',$tag->id) }}">{{ $tag->tag_name }}</a>
                                            </li>
                                        @empty
                                        <li >
                                            <a href="#">No tag under this post!</a>
                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <div class="social-media">
                                    <p>Share on :</p>
                                    <ul class="list-inline">
                                        <li>
                                            <a id="facebook_shere">
                                                <i class="fab fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" id="twit_shere">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="linkedin_shere">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a id="pinterest_shere">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                            <!--post-single-author-->
                            <div class="post-single-author ">
                                <div class="authors-info">
                                    <div class="image">
                                        <a href="#" class="image">
                                            @if ($single_post->RelationWithUser->user_photo == 'default.jpg')
                                            <img src="{{ asset('user_default_picture') }}/{{ $single_post->RelationWithUser->user_photo }}" alt="">
                                            @else
                                            <img src="{{ asset('profile_image_user') }}/{{ $single_post->RelationWithUser->user_photo }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4>{{ $single_post->RelationWithUser->name }}</h4>
                                        <p> {{ $single_post->RelationWithUser->about_user }} </p>
                                        <div class="social-media">
                                            {{-- <ul class="list-inline">
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
                                                        <i class="fab fa-linkedin"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" >
                                                        <i class="fab fa-pinterest"></i>
                                                    </a>
                                                </li>
                                            </ul> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--post-single-comments-->
                            <div class="post-single-comments">
                                <!--Comments-->
                                <h4 >{{ $show_comments->count() }} Comments</h4>
                                <ul class="comments">
                                    <!--comment1-->
                                    @forelse ($show_comments as $comment)
                                        <li class="comment-item pt-3 pb-3">
                                            <img src="{{ Avatar::create( $comment->name)->toBase64() }}" />
                                            <div class="content">
                                                <div class="meta">
                                                    <ul class="list-inline">
                                                        <li><a href="#">{{ $comment->name }}</a> </li>
                                                        <li class="slash"></li>
                                                        <li>{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</li>
                                                    </ul>
                                                </div>
                                                <p>
                                                    {{ $comment->comment }}
                                                </p>
                                                <form action="{{ route('web.single.post.comment.delete',$comment->id) }}" method="POST">
                                                    @csrf
                                                <i class="las la-reply"></i><button class="btn-reply" style="background: transparent;">Delete</button>
                                                </form>
                                            </div>

                                        </li>
                                    @empty

                                    @endforelse

                                </ul>
                                <!--Leave-comments-->
                                <div class="comments-form">
                                    <h4 >Leave a Reply</h4>
                                    <!--form-->
                                    <form class="form" action="{{ route('web.single.post.comment',$single_post->id) }}" method="POST" id="main_contact_form">
                                        @csrf
                                        <p>Your email adress will not be published ,Requied fileds are marked*.</p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name*">
                                                    @error('name')
                                                         <div class="invalid-feedback">
                                                            {{ $message }}
                                                          </div>
                                                     @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email*">
                                                    @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                      </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="comment" id="message" cols="30" rows="5" class="form-control @error('comment') is-invalid @enderror" placeholder="Message*"></textarea>
                                                    @error('comment')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                      </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- <div class="col-lg-12">
                                                <div class="mb-20">
                                                    <input type="checkbox" value="1" required="required">
                                                    <label for="name"><span>i agree what i write</span></label>
                                                </div> --}}

                                                <button type="submit" class="btn-custom">
                                                    Send Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/-->
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('footer_script')

@if (session('comment_done_msg'))

<script>
    const Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000,
timerProgressBar: true,
didOpen: (toast) => {
  toast.addEventListener('mouseenter', Swal.stopTimer)
  toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})

Toast.fire({
icon: 'success',
title: '{{ session('comment_done_msg') }}'
})
</script>

@endif
@if (session('comment_delete'))

<script>
    const Toast = Swal.mixin({
toast: true,
position: 'top-end',
showConfirmButton: false,
timer: 3000,
timerProgressBar: true,
didOpen: (toast) => {
  toast.addEventListener('mouseenter', Swal.stopTimer)
  toast.addEventListener('mouseleave', Swal.resumeTimer)
}
})

Toast.fire({
icon: 'success',
title: '{{ session('comment_delete') }}'
})
</script>

@endif


{{-- for social share --}}
<script>

    const facebook_shere = document.getElementById('facebook_shere');
    const twiter_shere = document.getElementById('twit_shere');
    const linkedin_shere = document.getElementById('linkedin_shere');
    const pinterest_shere = document.getElementById('pinterest_shere');

    let postUrl= encodeURI(document.location.href);
    let postTitle = encodeURI('{{ $single_post->blog_title }}');

    facebook_shere.setAttribute('href',`https://www.facebook.com/sharer.php?u=${postUrl}`);
    twiter_shere.setAttribute('href',`https://twitter.com/share?url=${postUrl}&text=${postTitle}`);
    linkedin_shere.setAttribute('href',`https://www.linkedin.com/shareArticle?url=${postUrl}&title=${postTitle}`);
    pinterest_shere.setAttribute('href',`https://pinterest.com/pin/create/bookmarklet/?url=${postUrl}&description=${postTitle}`);
</script>

@endsection
