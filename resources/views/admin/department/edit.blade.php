@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('department.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Departments
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('department.update',$departments->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            
                            <div>
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$departments->name}}">
                            </div>
                            <div>
                                <label for="">MDA</label>
                                <select name="mda_id" class="form-control">
                                    <option selected="disabled">Select MDA</option>
                                    @foreach ($mdas as $mda)
                                    <option value="{{$mda->id}}" {{$mda->id==}}>{{$mda->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('department.index') }}" class="btn btn-default">Cancel</a>

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