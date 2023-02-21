@extends('layouts.frontendmaster')

@section('content')
<section class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="login-content">
                    <h4>Sign up</h4>
                    <!--form-->
                    <form  action="{{ route('web.register.post') }}" class="sign-form widget-form " method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username*" name="name" value="">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email*" name="email" value="">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" name="password" value="">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="sign-controls form-group">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input @error('condition') is-invalid @enderror" id="rememberMe" name="condition">
                            @error('condition')
                            <p class="invalid-feedback">
                                {{ $message }}
                            </p>
                            @enderror
                                <label class="custom-control-label" for="rememberMe">Agree to our terms & conditions</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn-custom">Register</button>
                        </div>
                        <p class="form-group text-center">already have an account? <a href="{{ route('web.login') }}" class="btn-link">sign in</a> </p>
                    </form>
                    <!--/-->
                </div>
            </div>
         </div>
    </div>
</section>

@endsection

@section('footer_script')
@if (session('register_success'))

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
title: '{{ session('register_success') }}'
})
</script>

@endif
@endsection
