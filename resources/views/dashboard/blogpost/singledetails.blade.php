@extends('layouts.dashboardmaster')

@section('content')

  <!--**********************************
            Content body start
    ***********************************-->

    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('blogpost') }}">Blog Index</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog Inventory Post</a></li>
                </ol>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="{{ asset('blog_images') }}/{{ $only_this_id_details->blog_title_image }}" alt="">
                                    </div>
                                </div>

                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        {{-- <h4>{{ $only_this_id_details->blog_title }}</h4> --}}
                                        {{-- <div class="comment-review star-rating">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                            </ul>
                                            <span class="review-text">(34 reviews) / </span><a class="product-review" href="" data-toggle="modal" data-target="#reviewModal">Write a review?</a>
                                        </div> --}}
                                        <div class="d-table mb-2">
                                            <p class="price float-left d-block">{{ $only_this_id_details->blog_title }}</p>
                                        </div>
                                        <h4>Category : {{ $only_this_id_details->RelationWithCategory->category_name }}</h4>
                                        <p>Publish Date : <span class="item">{{ $only_this_id_details->blog_publish_date }}</span>
                                        </p>
                                        <p>Blog tags :&nbsp;&nbsp;
                                            @forelse ($related_tags as $tag)
                                                <span class="badge badge-success light">{{ $tag->RelationWithTag->tag_name }}</span>
                                            @empty

                                            @endforelse
                                        </p>
                                        <p>Short Description : <span class="item"></span>
                                        </p>
                                        <p class="text-content"> <?php echo $only_this_id_details->blog_short_description ?> </p>
                                        <p>Long Description : <span class="item"></span>
                                        </p>
                                        <p class="text-content"> <?php echo $only_this_id_details->blog_long_description ?> </p>
                                        {{-- <div class="filtaring-area my-3">
                                            <div class="size-filter">
                                                <h4 class="m-b-15">Select size</h4>

                                                <div class="btn-group" data-toggle="buttons">
                                                    <label class="btn btn-outline-primary light btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option5"> XS</label>
                                                    <label class="btn btn-outline-primary light btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option1" checked="">SM</label>
                                                    <label class="btn btn-outline-primary light btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option2"> MD</label>
                                                    <label class="btn btn-outline-primary light btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option3"> LG</label>
                                                    <label class="btn btn-outline-primary light btn-sm"><input type="radio" class="position-absolute invisible" name="options" id="option4"> XL</label>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- review -->
            {{-- <div class="modal fade" id="reviewModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Review</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="text-center mb-4">
                                    <img class="img-fluid rounded" src="./images/avatar/1.jpg" alt="DexignZone" width="78">
                                </div>
                                <div class="form-group">
                                    <div class="rating-widget mb-4 text-center">
                                        <!-- Rating Stars Box -->
                                        <div class="rating-stars">
                                            <ul id="stars">
                                                <li class="star" title="Poor" data-value="1">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Fair" data-value="2">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Good" data-value="3">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Excellent" data-value="4">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="WOW!!!" data-value="5">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                </div>
                                <button class="btn btn-success btn-block">RATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>


        </div>
    </div>

@endsection
