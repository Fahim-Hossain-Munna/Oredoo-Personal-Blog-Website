@extends('layouts.frontendmaster')


@section('content')


    <!--section-heading-->
    <div class="section-heading " >
        <div class="container-fluid">
             <div class="section-heading-2">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="section-heading-2-title">
                             <h1>Contact us</h1>
                             <p class="links"><a href="{{ route('index') }}">Home <i class="las la-angle-right"></i></a> pages</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
    </div>

    <!--contact-->
    <section class="contact">
        <div class="container-fluid">
            <div class="contact-area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-image">
                            <img src="{{ asset('blog_assets') }}/assets/img/other/contact.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="{{ route('web.contact.insert') }}" method="POST">
                            @csrf
                            <div class="contact-info">
                                <h3>feel free to contact us</h3>
                                <p>If you have a question about anything related to blog business or have something else on your mind, send us an email or send an inquiry through our contact form.</p>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="John Doe" name="name">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="exampleFormControlInput1" placeholder="subject" name="subject">
                                @error('subject')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="Message"></textarea>
                                @error('message')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <button type="submit" class="btn btn-outline-dark">send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('footer_script')

@if (session('message_send'))

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
title: '{{ session('message_send') }}'
})
</script>

@endif

@endsection
