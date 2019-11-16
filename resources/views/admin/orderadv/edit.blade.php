@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('orderadvs.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Order Advances
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('orderadvs.update',$orderadvs->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}"
                                        {{$ledger->id==$orderadvs->ledger_id ? 'selected':''}}>
                                        {{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Supplier</label>
                                <select name="supplier_id" class="form-control">
                                    <option selected="disabled">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}"
                                        {{$supplier->id==$orderadvs->supplier_id ? 'selected':''}}>
                                        {{$supplier->fullname .' - '.$supplier->supnumber}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Stock</label>
                                <select name="stock_id" class="form-control">
                                    <option selected="disabled">Select Stock</option>
                                    @foreach ($stocks as $stock)
                                    <option value="{{$stock->id}}" {{$stock->id==$orderadvs->stock_id ? 'selected':''}}>
                                        {{$stock->item}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$orderadvs->amount}}">
                            </div>
                            <div>
                                <label for="">Quantity <strong style="color:red">*</strong></label>
                                <input type="number" class="form-control" name="qty" placeholder="Quantity" min="0"
                                    oninput="validity.valid||(value='');" value="{{$orderadvs->qty}}">
                            </div>
                            <div>
                                <label for="">Description </label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"
                                    placeholder="description">{{$orderadvs->description}}</textarea>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('orderadvs.index') }}" class="btn btn-default">Cancel</a>

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