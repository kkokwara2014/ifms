@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Assets
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-11">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Acquired On</th>
                                    <th>Department</th>
                                    <th>Inventory</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assets as $asset)
                                <tr>

                                    <td>{{$asset->name}}</td>
                                    <td>{{$asset->description}}</td>
                                    <td>{{$asset->acquisitiondate}}</td>
                                    <td>{{$asset->department->name}}</td>
                                    <td>{{$asset->inventory->name}}</td>
                                  

                                    <td><a href="{{ route('assets.edit',$asset->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$asset->id}}" style="display: none"
                                            action="{{ route('assets.destroy',$asset->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$asset->id}}').submit();
                                                            } else {
                                                                event.preventDefault();
                                                            }
                                                        "><span class="fa fa-trash fa-2x text-danger"></span>
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Acquired On</th>
                                    <th>Department</th>
                                    <th>Inventory</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


        {{-- Data input modal area --}}
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">

                <form action="{{ route('assets.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Assets</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Name <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="name" placeholder="Asset Name">
                            </div>
                            <div>
                                <label for="">Description </label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Description"></textarea>
                            </div>
                            <div>
                                <label for="">Acquired On <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" id="datepicker" name="acquisitiondate"
                                            placeholder="Acquired On">
                            </div>

                            <div>
                                <label for="">Department <strong style="color:red">*</strong></label>
                                <select name="department_id" class="form-control">
                                    <option selected="disabled">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Inventory <strong style="color:red">*</strong></label>
                                <select name="inventory_id" class="form-control">
                                    <option selected="disabled">Select Inventory</option>
                                    @foreach ($inventories as $inventory)
                                    <option value="{{$inventory->id}}">{{$inventory->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->

                </form>
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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