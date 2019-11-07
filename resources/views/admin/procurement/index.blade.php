@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Purchase
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Department</th>
                                    <th>Amount</th>
                                    <th>Purchase Date</th>
                                    <th>Narration</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>

                                    <td>{{$purchase->order->qty}}</td>
                                    <td>{{$purchase->department->name}}</td>
                                    <td>&#8358;{{$purchase->amount}}</td>
                                    <td>{{$purchase->procdate}}</td>
                                    <td>{{$purchase->narration}}</td>


                                    <td><a href="{{ route('purchases.edit',$purchase->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$purchase->id}}" style="display: none"
                                            action="{{ route('purchases.destroy',$purchase->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$purchase->id}}').submit();
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
                                    <th>Order</th>
                                    <th>Department</th>
                                    <th>Amount</th>
                                    <th>Purchase Date</th>
                                    <th>Narration</th>
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

                <form action="{{ route('purchases.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New Purchase</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Order <strong style="color:red">*</strong></label>
                                <select name="order_id" class="form-control">
                                    <option selected="disabled">Select Order</option>
                                    @foreach ($orders as $order)
                                    <option value="{{$order->id}}">{{$order->stock->item.' - '.$order->qty}}</option>
                                    @endforeach
                                </select>
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
                                <label for="">Amount <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount" maxlength="8">
                            </div>
                            <div>
                                <label for="">Purchase Date <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" id="datepicker" name="procdate"
                                    placeholder="Purchase Date">
                            </div>
                            <div>
                                <label for="">Narration </label>
                                <textarea class="form-control" name="narration" id="" cols="30" rows="3"
                                    placeholder="Narration"></textarea>
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