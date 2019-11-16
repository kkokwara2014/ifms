@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Order Advance
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
                                    <th>Ledger</th>
                                    <th>Supplier</th>
                                    <th>Stock</th>
                                    <th>Amount</th>
                                    <th>Qty.</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderadvs as $orderadv)
                                <tr>

                                    <td>{{$orderadv->ledger->name}}</td>
                                    <td>{{$orderadv->supplier->fullname.' - '.$orderadv->supplier->supnumber}}</td>
                                    <td>{{$orderadv->stock->item}}</td>
                                    <td>&#8358;{{$orderadv->amount}}</td>
                                    <td>{{$orderadv->qty}}</td>
                                    {{-- <td>{{$orderadv->awardedby}}</td> --}}


                                    <td><a href="{{ route('orderadvs.edit',$orderadv->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$orderadv->id}}" style="display: none"
                                            action="{{ route('orderadvs.destroy',$orderadv->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$orderadv->id}}').submit();
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
                                    <th>Ledger</th>
                                    <th>Supplier</th>
                                    <th>Stock</th>
                                    <th>Amount</th>
                                    <th>Qty.</th>

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

                <form action="{{ route('orderadvs.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Order Advance</h4>
                        </div>
                        <div class="modal-body">

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
                                <label for="">Supplier <strong style="color:red">*</strong></label>
                                <select name="supplier_id" class="form-control">
                                    <option selected="disabled">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}">
                                        {{$supplier->fullname .' - '.$supplier->supnumber}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Stock <strong style="color:red">*</strong></label>
                                <select name="stock_id" class="form-control">
                                    <option selected="disabled">Select Stock</option>
                                    @foreach ($stocks as $stock)
                                    <option value="{{$stock->id}}">
                                        {{$stock->item}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Amount <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount"
                                    maxlength="10">
                            </div>
                            <div>
                                <label for="">Quantity <strong style="color:red">*</strong></label>
                                <input type="number" class="form-control" name="qty" placeholder="Quantity"
                                    min="0" oninput="validity.valid||(value='');">
                            </div>
                            <div>
                                <label for="">Description </label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"
                                    placeholder="description"></textarea>
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