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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    {{-- <div class="cover-photo"></div> --}}
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
                                        @if (auth()->user()->user_photo == 'default.jpg')
										<img src="{{ asset('user_default_picture') }}/{{ auth()->user()->user_photo }}" class="img-fluid rounded-circle" alt="">
                                        @else
                                        <img src="{{ asset('profile_image_user') }}/{{ auth()->user()->user_photo }}" class="img-fluid rounded-circle" alt="">
                                        @endif
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{ auth()->user()->name }}</h4>
											<p>{{ auth()->user()->role }}</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{ auth()->user()->email }}</h4>
											<p>Email</p>
										</div>

									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">About Setting</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="profile-settings" class="tab-pane fade active show">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h2 class="text-primary mb-5">BIO-Information Settings</h2>
                                                        <h4 class="text-success">Change Your Picture,</h4>
                                                        <form action="{{ route('profile.picture', auth()->id()) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Change Picture</label>
                                                                    <input type="file" placeholder="New Username" class="form-control @error('user_photo') is-invalid @enderror" name="user_photo">
                                                                    @error('user_photo')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-success" type="submit">change</button>
                                                        </form>
                                                        <hr>
                                                        <h4 class="text-success">Change About Details,</h4>
                                                        <form action="{{ route('profile.biodata',auth()->id()) }}" method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label>About Yourself</label>
                                                                    <textarea rows="4" class="form-control @error('about_user') is-invalid @enderror" name="about_user">{{ auth()->user()->about_user }}</textarea>
                                                                    @error('about_user')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Contact Number</label>
                                                                    <input type="tel" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ auth()->user()->contact }}" >
                                                                    @error('contact')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Gender</label>
                                                                    <select class="form-control  @error('gender') is-invalid @enderror" name="gender" >
                                                                        <option >choose gender</option>
                                                                        <option value="male" {{ auth()->user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                                        <option value="female" {{ auth()->user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                                                                        <option value="other" {{ auth()->user()->gender == 'other' ? 'selected' : '' }}>Other</option>
                                                                    </select>
                                                                    @error('gender')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Age</label>
                                                                    <input type="number" class="form-control @error('age') is-invalid @enderror" name="age" value='{{ auth()->user()->age }}'>
                                                                    @error('age')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Religion</label>
                                                                    <select class="form-control  @error('religion') is-invalid @enderror" name="religion">
                                                                        <option>choose religion</option>
                                                                        <option value="muslim" {{ auth()->user()->religion == 'muslim' ? 'selected' : '' }}>Muslims</option>
                                                                        <option value="hindu" {{ auth()->user()->religion == 'hindu' ? 'selected' : '' }}>Hindus</option>
                                                                        <option value="buddho" {{ auth()->user()->religion == 'buddho' ? 'selected' : '' }}>Buddhistsr</option>
                                                                        <option value="cristian" {{ auth()->user()->religion == 'cristian' ? 'selected' : '' }}>Christians</option>
                                                                        <option value="other" {{ auth()->user()->religion == 'other' ? 'selected' : '' }}>Other</option>
                                                                    </select>
                                                                    @error('religion')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Marital Status</label>
                                                                    <select class="form-control  @error('marital_status') is-invalid @enderror" name="marital_status">
                                                                        <option >choose your marital status</option>
                                                                        <option value="single" {{ auth()->user()->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                                                                        <option value="married" {{ auth()->user()->marital_status == 'married' ? 'selected' : '' }}>Married</option>
                                                                    </select>
                                                                    @error('marital_status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label>Height</label>
                                                                    <input type="text" class="form-control @error('height') is-invalid @enderror" name="height" value='{{ auth()->user()->height }}'>
                                                                    @error('height')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Blood Group</label>
                                                                    <input type="text" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group" value='{{ auth()->user()->blood_group }}'>
                                                                    @error('blood_group')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>NID NO</label>
                                                                    <input type="number" class="form-control @error('nid_no') is-invalid @enderror" name="nid_no" value='{{ auth()->user()->nid_no }}'>
                                                                    <small class="text-danger">if you have please input/don't need must</small>
                                                                    @error('nid_no')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Address</label>
                                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value='{{ auth()->user()->address }}'>
                                                                    @error('address')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>

                                                            </div>
                                                            <button class="btn btn-success" type="submit">update</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link active show">Setting</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="profile-settings" class="tab-pane fade active show">
                                                <div class="pt-3">
                                                    <div class="settings-form">
                                                        <h2 class="text-primary mb-5">Account Settings</h2>
                                                        <h4 class="text-success">Change Your Username,</h4>
                                                        <form action="{{ route('profile.name', auth()->id()) }}" method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Current Name</label>
                                                                    <input type="text" placeholder="{{ auth()->user()->name }}" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Change Name</label>
                                                                    <input type="text" placeholder="New Username" class="form-control @error('name') is-invalid @enderror" name="name">
                                                                    @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-success" type="submit">change</button>
                                                        </form>
                                                        <hr>
                                                        <h4 class="text-success">Change Your Mail,</h4>
                                                        <form action="{{ route('profile.email', auth()->id()) }}" method="POST">
                                                            @csrf
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Current Email</label>
                                                                    <input type="email" placeholder="{{ auth()->user()->email }}" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Change Email</label>
                                                                    <input type="email" placeholder="New Email" class="form-control @error('email') is-invalid @enderror" name="email">
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-success" type="submit">change</button>
                                                        </form>
                                                        <hr>
                                                        <h4 class="text-success">Change Your Password,</h4>
                                                        <form action="{{ route('profile.password', auth()->id()) }}" method="POST">
                                                            @csrf
                                                            <div class="form-row">

                                                                <div class="form-group col-md-6">
                                                                    <label>Current Password</label>
                                                                    <input type="password" placeholder="Current Password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                                                                    @error('current_password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>New Password</label>
                                                                    <input type="password" placeholder="New Password" class="form-control @error('password') is-invalid @enderror" name="password">
                                                                    @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Confirm Password</label>
                                                                    <input type="password" placeholder="Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                                                    @error('password_confirmation')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <button class="btn btn-success" type="submit">change</button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
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

{{-- section for session --}}

@if (session('name_success'))

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
title: '{{ session('name_success') }}'
})
</script>

@endif

@if (session('mail_success'))

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
title: '{{ session('mail_success') }}'
})
</script>

@endif

@if (session('picture_success'))

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
title: '{{ session('picture_success') }}'
})
</script>

@endif

@if (session('password_success'))

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
title: '{{ session('password_success') }}'
})
</script>

@endif

@if (session('old_password_not_match'))

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
title: '{{ session('old_password_not_match') }}'
})
</script>

@endif

@if (session('biodata_update'))

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
title: '{{ session('biodata_update') }}'
})
</script>

@endif

@endsection

