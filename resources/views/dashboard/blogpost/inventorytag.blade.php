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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Inventory Of Blog Tags</a></li>
					</ol>
            </div>

            @livewire('bloginventorytag.inventorytag', ['my_blog' => $my_blogs])

      </div>
        </div>

  <!--**********************************
            Content body start
    ***********************************-->

@endsection
