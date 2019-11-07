@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Order
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
                                    <th>Stock</th>
                                    <th>Supplier</th>
                                    <th>Quantity</th>
                                    <th>Comment</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>

                                    <td>{{$order->stock->item}}</td>
                                    <td>{{$order->supplier->fullname.' - '.$order->supplier->supnumber}}</td>
                                    <td>{{$order->qty}}</td>
                                    <td>{{$order->comment}}</td>

                                    <td><a href="{{ route('orders.edit',$order->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$order->id}}" style="display: none"
                                            action="{{ route('orders.destroy',$order->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$order->id}}').submit();
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
                                    <th>Stock</th>
                                    <th>Supplier</th>
                                    <th>Quantity</th>
                                    <th>Comment</th>
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

                <form action="{{ route('orders.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New Order</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Stock <strong style="color:red">*</strong></label>
                                <select name="stock_id" class="form-control">
                                    <option selected="disabled">Select Stock</option>
                                    @foreach ($stocks as $stock)
                                    <option value="{{$stock->id}}">{{$stock->item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Supplier <strong style="color:red">*</strong></label>
                                <select name="supplier_id" class="form-control">
                                    <option selected="disabled">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">{{$supplier->fullname.' - '.$supplier->supnumber}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label for="">Quantity <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="qty" placeholder="Order Quantity" maxlength="4">
                            </div>
                            <div>
                                <label for="">Comment </label>
                                <textarea class="form-control" name="comment" id="" cols="30" rows="3"
                                    placeholder="Comment"></textarea>
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