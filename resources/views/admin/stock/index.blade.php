@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Stock
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
                                    <th>Found In</th>
                                    <th>Item</th>
                                    <th>Qty.</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Acquired On</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                <tr>

                                    <td>{{$stock->inventory->name}}</td>
                                    <td>{{$stock->item}}</td>
                                    <td>{{$stock->qtyavailable}}</td>
                                    <td>&#8358;{{$stock->unitprice}}</td>
                                    <td>{{$stock->description}}</td>
                                    <td>{{$stock->datebought}}</td>


                                    <td><a href="{{ route('stocks.edit',$stock->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$stock->id}}" style="display: none"
                                            action="{{ route('stocks.destroy',$stock->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$stock->id}}').submit();
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
                                    <th>Found In</th>
                                    <th>Item</th>
                                    <th>Qty.</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Acquired On</th>
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

                <form action="{{ route('stocks.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Stock</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Inventory <strong style="color:red">*</strong></label>
                                <select name="inventory_id" class="form-control">
                                    <option selected="disabled">Select Inventory</option>
                                    @foreach ($inventories as $inventory)
                                    <option value="{{$inventory->id}}">{{$inventory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Item <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="item" placeholder="Item Name">
                            </div>
                            <div>
                                <label for="">Quantity <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="qtyavailable"
                                    placeholder="Quantity Available" maxlength="4">
                            </div>
                            <div>
                                <label for="">Unit Price <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="unitprice" placeholder="Unit Price"
                                    maxlength="7">
                            </div>
                            <div>
                                <label for="">Description </label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"
                                    placeholder="Description"></textarea>
                            </div>
                            <div>
                                <label for="">Acquired On <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" id="datepicker" name="datebought"
                                    placeholder="Acquired On">
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