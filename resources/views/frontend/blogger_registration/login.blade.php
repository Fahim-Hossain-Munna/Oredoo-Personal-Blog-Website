@extends('layouts.frontendmaster')

@section('content')
    <!--Login-->
    <section class="login">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="mb-4 d-flex justify-content-end">
                        <ul class="list-inline">

                            <li>
                                <p class="text-dark fw-bolder fs-1">
                                    Login With :
                                </p>
                            </li>
                            <li>
                                <a href="{{ route('github.redirect') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="fab fa-github"></i>
                                    Github
                                </a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-outline-info btn-sm">
                                    <i class="fab fa-linkedin"></i>
                                    linkedin
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="login-content">
                        <h4>Login</h4>
                        <p></p>
                        <form  action="{{ route('web.login.post') }}" class="sign-form widget-form " method="post">
                            @csrf
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
                                <input type="checkbox" class="custom-control-input  @error('condition') is-invalid @enderror" id="remember" name="condition">
                                @error('condition')
                                <p class="invalid-feedback">
                                    {{ $message }}
                                </p>
                                @enderror
                                    <label class="custom-control-label" for="remember">Agree to our terms & conditions</label>
                                </div>
                                <a href="#" class="btn-link ">Forgot Password?</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-custom">Login in</button>
                            </div>
                            <p class="form-group text-center">Don't have an account? <a href="{{ route('web.register') }}" class="btn-link">Create One</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('footer_script')
@if (session('log_failed_error'))

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
icon: 'error',
title: '{{ session('log_failed_error') }}'
})
</script>

@endif
@endsection
