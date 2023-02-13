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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Blog</a></li>
            </ol>
    </div>


<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">My Blogs</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-responsive-md">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Blog Name</th>
                            <th>Blog Category</th>
                            {{-- <th>Blog Description</th> --}}
                            <th>Publish Date</th>
                            <th>Inventory Tag</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @forelse ($my_blogs as $blog)
                         <tr>
                             <td><strong>{{ $my_blogs->firstItem() + $loop->index }}</strong></td>
                             <td><div class="d-flex align-items-center"><img src="{{ asset('blog_images') }}/{{ $blog->blog_title_image }}" class="rounded-lg mr-2" width="24" alt=""> <span class="w-space-no">{{ $blog->blog_title }}</span></div></td>
                             <td>{{ $blog->RelationWithCategory->category_name}}</td>
                             {{-- <td>
                                <?php echo $blog->blog_short_description ?>
                             </td> --}}
                             <td>{{ $blog->blog_publish_date }}</td>
                             <td><div class="d-flex align-items-center"> <a href="{{ route('blogpost.inventory.tag' , $blog->id) }}" class="btn btn-info btn-sm">add tag</a> </div></td>
                             <td>
                                 <div class="d-flex">
                                     <a href="{{ route('blogpost.details',$blog->id) }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="fa fa-eye"></i></a>
                                     <a href="{{ route('blogpost.edit',$blog->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                     <form action="{{ route('blogpost.delete',$blog->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                     </form>
                                 </div>
                             </td>
                         </tr>
                       @empty

                       <tr>
                        <td colspan="5" class="text-danger">No Post Found</td>
                       </tr>

                       @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

  <!--**********************************
            Content body start
     ***********************************-->

@endsection

@section('footer_script')

@if (session('blog_update_success'))

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
title: '{{ session('blog_update_success') }}'
})
</script>

@endif

@if (session('blog_delete'))

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
title: '{{ session('blog_delete') }}'
})
</script>

@endif

@endsection
