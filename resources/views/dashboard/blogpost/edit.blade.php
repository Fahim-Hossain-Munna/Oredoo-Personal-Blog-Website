@extends('layouts.dashboardmaster')

@section('content')

  <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('home') }}">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Category</a></li>
					</ol>
            </div>


            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Blog-Post Update</h4>
                        </div>
                        <div class="card-body bg-bg-body">
                            <div class="basic-form">
                                <form method="POST" action="{{ route('blogpost.update',$my_blogs->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Title</label>
                                        <input type="text" class="col-sm-9 form-control input-default mb-3 @error('blog_title') is-invalid @enderror"  name="blog_title" value="{{ $my_blogs->blog_title }}">
                                        @error('blog_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Category</label>
                                        <select class="col-sm-9 form-control input-default mb-3" name="blog_category_id">
                                            <option class="d-none">Choose Category of Blogs</option>
                                            @forelse ($categories as $category)
                                            <option value="{{ $category->id }}" {{$category->id == $my_blogs->blog_category_id ? 'selected' : ''}} >{{ $category->category_name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Tags</label>
                                        <div class="col-sm-4 col-6">
                                            @foreach ($tags as $tag)
                                                <div class="custom-control custom-checkbox mb-3 checkbox-info">
                                                    <input type="checkbox" class="custom-control-input" id="tags{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                                                    @foreach ($my_blogs->RelationWithTags as $t)
                                                    @if ($tag->id == $t->id)
                                                    checked
                                                    @endif
                                                    @endforeach
                                                    >
                                                    <label class="custom-control-label" for="tags{{ $tag->id }}">{{ $tag->tag_name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Short Description</label>
                                        <textarea id="summernoteshort" name="blog_short_description" class="@error('blog_short_description') is-invalid @enderror">{{ $my_blogs->blog_short_description }}</textarea>
                                        @error('blog_short_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Full Description</label>
                                        <textarea id="summernotefull" name="blog_long_description" class="@error('blog_long_description') is-invalid @enderror">{{ $my_blogs->blog_long_description }}</textarea>
                                        @error('blog_long_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Current Image</label>
                                        <img src="{{ asset('blog_images') }}/{{ $my_blogs->blog_title_image }}" style="width: 300px; height:300px;" >
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog Title Picture</label>
                                        <input type="file" class="col-sm-9 form-control input-default mb-3 @error('blog_title_image') is-invalid @enderror" name="blog_title_image">
                                        @error('blog_title_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Blog publish Date</label>
                                        <input type="date" class="col-sm-9 form-control input-default mb-3 @error('blog_publish_date') is-invalid @enderror"  name="blog_publish_date" value="{{ $my_blogs->blog_publish_date }}">
                                        @error('blog_publish_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
        </div>
    <!--**********************************
            Content body end
        ***********************************-->


@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('#summernoteshort').summernote({
            inheritPlaceholder: true
        });
    });
  </script>
<script>
    $(document).ready(function() {
        $('#summernotefull').summernote({
            inheritPlaceholder: true
        });
    });
  </script>


@if (session('blog_success'))

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
title: '{{ session('blog_success') }}'
})
</script>

@endif


@endsection
