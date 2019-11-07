@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('assets.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Assets
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('assets.update',$assets->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}


                            <div>
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$assets->name}}">
                            </div>
                            <div>
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description" >{{$assets->description}}</textarea>
                               
                            </div>
                            <div>
                                <label for="">Acquired On</label>
                                <input type="text" class="form-control" id="datepicker" name="acquisitiondate"
                                            placeholder="Acquired On" value="{{$assets->acquisitiondate}}">
                            </div>
                            <div>
                                <label for="">Department</label>
                                <select name="department_id" class="form-control">
                                    <option selected="disabled">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}" {{$department->id==$assets->department_id ? 'selected':''}}>
                                        {{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Inventory</label>
                                <select name="inventory_id" class="form-control">
                                    <option selected="disabled">Select Inventory</option>
                                    @foreach ($inventories as $inventory)
                                    <option value="{{$inventory->id}}" {{$inventory->id==$assets->inventory_id ? 'selected':''}}>
                                        {{$inventory->name}}</option>
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