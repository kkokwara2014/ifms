@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')

@section('content')
{{-- @include('admin.layout.statboard') --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Employee Details
            <small>Employee Information</small>
          </h1>
          {{-- <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol> --}}
        </section>
      
        <!-- Main content -->
        <section class="content">
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div>
            <a href="{{ route('supervisor.index') }}" class="btn btn-primary btn-sm">
                Back</a>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <img style="display: block;
                                margin-left: auto;
                                margin-right: auto;
                                width: 50%;" src="{{url('user_images',$supervisor->userimage)}}" alt=""
                                    class="img-responsive img-circle" width="180" height="180">

                                <p>
                                    <h3>{{$supervisor->title.' '.$supervisor->lastname.' '.$supervisor->firstname}}</h3>
                                </p>
                                <hr>
                                <div>Staff Number : {{$supervisor->identitynumber}} </div>
                                <div>Gender : {{$supervisor->gender}} </div>
                                <div>Email : {{$supervisor->email}} </div>
                                <div>Phone : {{$supervisor->phone}}</div>
                                <div>Department : {{$supervisor->department->name.' - '.$supervisor->department->code}}
                                </div>
                                <hr>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            <div class="col-md-8">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12">
                                <h3>Allocated Projects</h3>
                                <ul class="list-group">
                                    @forelse ($supervisor_projects as $sup_proj)
                                    {{-- <a href="{{route('chapter.show',$sup_proj->id)}}"> --}}
                                        <li class="list-group-item">{{$sup_proj->project->title}}</li>
                                    {{-- </a> --}}
                                    @empty
                                    <li class="list-group-item alert alert-warning"><strong>No Project has been
                                            allocated to you!</strong>
                                    </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
</div>



</section>
<!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
{{-- <section class="col-lg-5 connectedSortable"> --}}


{{-- </section> --}}
<!-- right col -->
</div>
<!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection