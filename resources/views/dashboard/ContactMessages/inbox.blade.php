@extends('layouts.dashboardmaster')


@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Inbox</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            @forelse ($messages as $message)
                    <div class="col-12">
                        <div class="right-box-padding">

                            <div class="read-content">
                                <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                    <div class="clearfix mb-3 d-flex">
                                        <img class="mr-3 rounded" width="50" alt="image" src="{{ Avatar::create( $message->name)->toBase64() }}" />
                                        <div class="media-body mr-2">
                                            <h5 class="text-primary mb-0 mt-1">{{ $message->name }}</h5>
                                            <p class="mb-0">{{ \Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('contact.inbox.mail.delete',$message->id) }}" method="POST">
                                        @csrf
                                        <div class="clearfix mb-3">
                                            <button class="btn btn-primary px-3 light ml-2"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </form>

                                </div>
                                <hr>
                                <div class="media mb-2 mt-3">
                                        <h4 class="my-1 text-primary">Subject : {{ $message->subject }}</h4>
                                    </div>
                                    <h5 class="read-content-email">To: Me, {{ $message->email }}</h5>
                                </div>
                                <div class="read-content-body">
                                    <p class="mb-2"><strong>{{ $message->message }}</strong></p>
                                    <hr>
                                </div>
                              <form action="{{ route('contact.inbox.mail',$message->id) }}" method="POST">
                                @csrf
                                <div class="form-group pt-3">
                                    <textarea name="message" id="write-email" cols="30" rows="3" class="form-control" placeholder="It's really an amazing.I want to know more about it..!"></textarea>
                                </div>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary " type="submit">Send</button>
                            </div>
                              </form>
                        </div>
                    </div>
                    @empty
                    <div class="form-group pt-3">
                        <p class="text-danger text-center">No Message Exists!!</p>
                    </div>
                    @endforelse

                </div>
    </div>
</div>
@endsection

@section('footer_script')

@if (session('mail_send'))

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
title: '{{ session('mail_send') }}'
})
</script>

@endif

@if (session('delete_msg'))

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
title: '{{ session('delete_msg') }}'
})
</script>

@endif

@endsection
