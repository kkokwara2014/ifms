@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <div>
            <a href="{{ route('employees.index') }}" class="btn btn-primary btn-sm">
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
                                                width: 50%;" src="{{url('user_images',$employees->empimage)}}" alt=""
                                    class="img-responsive img-circle" width="180" height="180">

                                <p>
                                    <h3>{{$employees->fullname}}</h3>
                                </p>

                                <!-- /.box-body -->
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="col-md-7">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">

                                <hr>
                                <div>Staff Number : {{$employees->empnumber}} </div>
                                <div>Gender : {{$employees->gender}} </div>
                                <div>Email : {{$employees->email}} </div>
                                <div>Phone : {{$employees->phone}}</div>
                                <div>Department : {{$employees->department->name}}
                                    <div>Address : {{$employees->address}}
                                        <div>Marital Status : {{$employees->maritalstatus}}
                                            <div>Date of Birth : {{$employees->dob}}
                                                <div>Appointment Date : {{$employees->appointmentdate}}
                                                </div>
                                                <div>Bank : {{$employees->bank->name}}
                                                </div>
                                                <div>Bank Account : {{$employees->bankaccount}}
                                                </div>
                                                <div>Basic Salary : {{$employees->basicsalary}}
                                                </div>
                                                <hr>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- /.box-body -->
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