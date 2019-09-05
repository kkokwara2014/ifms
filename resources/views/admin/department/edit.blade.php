@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('contractor.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Contractors
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('contractor.update',$contractors->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Contractor's Ref. Number</label>
                            <input type="text" class="form-control" name="contnumber" value="{{$contractors->contnumber}}">
                            </div>

                            <div>
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="{{$contractors->fullname}}">
                            </div>
                            <div>
                                <label for="">Company Name</label>
                                <input type="text" class="form-control" name="compname" value="{{$contractors->compname}}">
                            </div>
                            <div>
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" value="{{$contractors->address}}">
                            </div>
                            <div>
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{$contractors->phone}}">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" value="{{$contractors->email}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('mda.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    </form>
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