@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Contractor
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-12">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Contractor Ref.</th>
                                    <th>Full Name</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contractors as $cont)
                                <tr>
                                    <td>{{$cont->contnumber}}</td>
                                    <td>{{$cont->fullname}}</td>
                                    <td>{{$cont->compname}}</td>
                                    <td>{{$cont->address}}</td>
                                    <td>{{$cont->phone}}</td>
                                    <td>{{$cont->email}}</td>
                                    <td><a href="{{ route('contractor.edit',$cont->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$cont->id}}" style="display: none"
                                            action="{{ route('contractor.destroy',$cont->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$cont->id}}').submit();
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
                                    <th>Contractor Ref.</th>
                                    <th>Full Name</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
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

                <form action="{{ route('contractor.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Contractor</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Contractor's Ref. Number</label>
                                <input type="text" class="form-control" name="contnumber" placeholder="Ref. Number">
                            </div>
                            
                            <div>
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                            </div>
                            <div>
                                <label for="">Company Name</label>
                                <input type="text" class="form-control" name="compname" placeholder="Company Name">
                            </div>
                            <div>
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Company Address">
                            </div>
                            <div>
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email Address">
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