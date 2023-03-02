@extends('layouts.dashboardmaster')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users') }}">All Users</a></li>
            </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3 d-flex justify-content-end">
            {{-- <div class="one">
                   <button type="button" data-toggle="modal" data-target="#staticBackdrop" style="border:1px solid transparent; background:transparent; color:#a71930;">
                    <i class="material-symbols-outlined" style="font-size: 40px">
                        auto_delete
                    </i>
                    Recycle Users
                </button>

                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Recycle Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              @forelse ($users as $user)
                                                <tr>
                                                  <th scope="row">{{ $users->firstItem()+$loop->index }}</th>
                                                  <td>{{ $user->name }}</td>
                                                  <td>{{ $user->email }}</td>
                                                  <td>{{ $user->role }}</td>
                                                <td> <form action="{{ route('users.delete',$user->id) }}" method="POST">
                                                    @csrf
                                                     <button class="btn btn-danger btn-sm">Block</button>
                                                     </form>
                                                </td>
                                                </tr>
                                              @empty
                                              <tr>
                                                <td colspan="5" class="text-center text-danger">No Data Found</td>
                                              </tr>
                                              @endforelse

                                            </tbody>
                                          </table>

                                          {{ $users->links() }}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            </div>
                        </div>
            </div> --}}
            <div class="one">
                <form action="{{ route('users.search') }}" method="POST">
                    @csrf
                    <input type="text" style="padding: 10px; border-radius:8px border:1px solid #123962" placeholder="search here ..." aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                    <button class="btn btn-outline-dark btn-sm ml-3" type="submit" id="button-addon2">click</button>
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($users as $user)
                <tr>
                  <th scope="row">{{ $users->firstItem()+$loop->index }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role }}</td>
                <td> <form action="{{ route('users.delete',$user->id) }}" method="POST">
                    @csrf
                     <button class="btn btn-danger btn-sm">Block</button>
                     </form>
                </td>
                </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center text-danger">No Data Found</td>
              </tr>
              @endforelse

            </tbody>
          </table>

          {{ $users->links() }}
    </div>
</div>


</div>
</div>

@endsection

@section('footer_script')

@if (session('block'))

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
title: '{{ session('block') }}'
})
</script>

@endif

@endsection
