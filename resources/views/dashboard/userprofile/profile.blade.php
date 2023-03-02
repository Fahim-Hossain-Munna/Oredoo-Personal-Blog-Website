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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">

                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">About Me</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">

                                            <div id="about-me" class="tab-pane fade active show">
                                                <div class="profile-about-me">
                                                    <div class="pt-4 border-bottom-1 pb-3">
                                                        <h4 class="text-primary">About Me</h4>
                                                        <p class="mb-2">{{ auth()->user()->about_user }}</p>

                                                    </div>
                                                </div>
                                                <div class="profile-skills mb-5">
                                                    <h4 class="text-primary mb-2">Skills</h4>
                                                    @forelse ($my_skills as $skill)
                                                        <a href="https://github.com/Fahim-Hossain-Munna" class="btn btn-primary light btn-xs mb-1">{{ Str::title($skill->skills) }}</a>
                                                    @empty

                                                    @endforelse
                                                </div>
                                                {{-- <div class="profile-lang  mb-5">
                                                    <h4 class="text-primary mb-2">Language</h4>
													<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-us"></i> English</a>
													<a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-fr"></i> French</a>
                                                    <a href="javascript:void()" class="text-muted pr-3 f-s-16"><i class="flag-icon flag-icon-bd"></i> Bangla</a>
                                                </div> --}}
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->name }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->email }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Contact Number <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->contact }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Age <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->age }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Gender <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->gender }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Religion <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->religion }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Marital Status <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->marital_status }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Blood Group <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->blood_group }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Height <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->height }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Location/Address <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->address }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Role <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{ auth()->user()->role }}</span>
                                                        </div>
                                                    </div>

                                                    <a href="{{ route('profile.settings') }}" class="btn btn-info btn-sm">Edit Bio Data</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
												</div>
												<div class="modal-body">
													<form>
														<textarea class="form-control" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary">Reply</button>
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
