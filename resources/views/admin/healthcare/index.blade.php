@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Healthcare Revenue
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
                                    <th>Type</th>
                                    <th>Ledger</th>
                                    <th>Healthcare Code</th>
                                    <th>Healthcare Name</th>

                                    <th>Amount</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($healthcares as $healthcare)
                                <tr>

                                    <td>{{$healthcare->institutype->name}}</td>
                                    <td>{{$healthcare->ledger->name}}</td>
                                    <td>{{$healthcare->hccode}}</td>
                                    <td>{{$healthcare->hcname}}</td>
                                   
                                    <td>&#8358;{{$healthcare->amount}}</td>
                                    


                                    <td><a href="{{ route('healthcares.edit',$healthcare->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$healthcare->id}}" style="display: none"
                                            action="{{ route('healthcares.destroy',$healthcare->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$healthcare->id}}').submit();
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
                                    <th>Type</th>
                                    <th>Ledger</th>
                                    <th>Healthcare Code</th>
                                    <th>Healthcare Name</th>

                                    <th>Amount</th>

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

                <form action="{{ route('healthcares.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Healthcare Revenue</h4>
                        </div>
                        <div class="modal-body">

                            <div>
                                <label for="">Institution Type <strong style="color:red">*</strong></label>
                                <select name="institutype_id" class="form-control">
                                    <option selected="disabled">Select Institution Type</option>
                                    @foreach ($institutypes as $institutype)
                                    <option value="{{$institutype->id}}">{{$institutype->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Ledger <strong style="color:red">*</strong></label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}">{{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Healthcare Code <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="hccode" placeholder="Healthcare Code">
                            </div>
                            <div>
                                <label for="">Healthcare Name <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="hcname" placeholder="Healthcare Name">
                            </div>

                            <div>
                                <label for="">Amount <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount"
                                    maxlength="10">
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