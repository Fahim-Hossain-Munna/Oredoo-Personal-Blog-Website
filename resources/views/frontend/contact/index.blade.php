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
                        <div class="contact-info">
                            <h3>feel free to contact us</h3>
                            <p>If you have a question about anything related to blog business or have something else on your mind, send us an email or send an inquiry through our contact form.</p>
                        </div>
                        <!--form-->
                        <form action="{{ route('web.contact.insert') }}" method="POST" class="form contact_form">
                            @csrf
                            {{-- <div class="alert alert-success contact_msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div> --}}
                            <div class="form-group">
                                <input type="text" name="name"  class="form-control" placeholder="Name*">
                            </div>

                            <div class="form-group">
                                <input type="email" name="email"  class="form-control" placeholder="Email*">
                            </div>

                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject*">
                            </div>

                            <div class="form-group">
                                <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Message*"></textarea>
                            </div>

                            <button type="button" class="btn-custom">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
