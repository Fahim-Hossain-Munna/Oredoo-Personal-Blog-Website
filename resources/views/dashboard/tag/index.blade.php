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
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Tag</a></li>
					</ol>
        </div>


            @livewire('tag.index')

    </div>
        </div>
    <!--**********************************
            Content body end
     ***********************************-->

@endsection

@section('footer_script')
<script>
    window.addEventListener('close_modal' , event=>{
    $("#TagEditModal").modal('hide');
});
</script>

@endsection
