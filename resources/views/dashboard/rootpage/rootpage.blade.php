@extends('layouts.dashboardmaster')

@section('content')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('home') }}">DashBoard</a></li>
            </ol>
</div>

<div class="col-xl-12">
    <div class="row">
        <div class="col-xl-12">
            <h1 class="mb-5"># Chart.js Area</h1>
            <canvas id="myChart" height="100px"></canvas>
        </div>
        <div class="col-xl-12">
           <div class="row mt-5">
            <div class="col-sm-4">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3 d-flex justify-content-center align-items-center">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 40px; color:#2bc155"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Total Users</p>
                                <span class="title text-black font-w600">{{ $users->count() }} People</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: {{ $users->count() }}%; height:5px;" role="progressbar">
                                {{-- <span class="sr-only">42% Complete</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success" style="top: 384px; left: 130px;"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3 d-flex justify-content-center align-items-center">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 40px; color:#f94687"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Total Messages</p>
                                <span class="title text-black font-w600">{{ $messages->count() }} Messages</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-danger" style="width: {{ $messages->count() }}%; height:5px;" role="progressbar">
                                {{-- <span class="sr-only">42% Complete</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-danger" style="top: 384px; left: 130px;"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3 d-flex justify-content-center align-items-center">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 40px; color:#2bc155"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Total Posts</p>
                                <span class="title text-black font-w600">{{ $blogs->count() }} Posts</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: {{ $blogs->count() }}%; height:5px;" role="progressbar">
                                {{-- <span class="sr-only">42% Complete</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success" style="top: 384px; left: 130px;"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3 d-flex justify-content-center align-items-center">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 40px; color:#f94687"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Total Categories</p>
                                <span class="title text-black font-w600">{{ $categories->count() }} Category</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-danger" style="width: {{ $categories->count() }}%; height:5px;" role="progressbar">
                                {{-- <span class="sr-only">42% Complete</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-danger" style="top: 384px; left: 130px;"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3 d-flex justify-content-center align-items-center">
                                <i class="fa fa-users" aria-hidden="true" style="font-size: 40px; color:#2bc155"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Total Tags</p>
                                <span class="title text-black font-w600">{{ $tags->count() }} Tags</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: {{ $tags->count() }}%; height:5px;" role="progressbar">
                                {{-- <span class="sr-only">42% Complete</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success" style="top: 384px; left: 130px;"></div>
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
<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Users', 'Messages', 'Blogs', 'Categories','Tags'],
        datasets: [{
          label: '# Chart Of Total Count',
          data: [{{ $users->count() }}, {{ $messages->count() }}, {{ $blogs->count() }}, {{ $categories->count() }},{{ $tags->count() }}],
          backgroundColor: [
            "rgb(230, 57, 70,0.2)",
            "rgb(52, 78, 65,0.2)",
            "rgb(0, 109, 119,0.2)",
            "rgb(20, 33, 61,0.2)",
            "rgb(15, 163, 177,0.2)",
          ],
          borderColor: [
            "rgb(230, 57, 70,1)",
            "rgb(52, 78, 65,1)",
            "rgb(0, 109, 119,1)",
            "rgb(20, 33, 61,1)",
            "rgb(15, 163, 177,1)",
          ],
          borderWidth: 1
        }]
      },
      options: {}
    });
  </script>
@endsection




