@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('orders.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Orders
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('orders.update',$orders->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Stock</label>
                                <select name="stock_id" class="form-control">
                                    <option selected="disabled">Select Stock</option>
                                    @foreach ($stocks as $stock)
                                    <option value="{{$stock->id}}"
                                        {{$stock->id==$orders->stock_id ? 'selected':''}}>
                                        {{$stock->item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Supplier</label>
                                <select name="supplier_id" class="form-control">
                                    <option selected="disabled">Select Supplier</option>
                                    @foreach ($suppliers as $supplier)
                                    <option value="{{$supplier->id}}"
                                        {{$supplier->id==$orders->supplier_id ? 'selected':''}}>
                                        {{$supplier->fullname.' - '.$supplier->supnumber}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" name="qty" value="{{$orders->qty}}">
                            </div>
                            <div>
                                <label for="">Comment</label>
                                <textarea class="form-control" name="comment" id="" cols="30" rows="3"
                                    placeholder="Comment">{{$orders->comment}}</textarea>

                            </div>
                           
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('orders.index') }}" class="btn btn-default">Cancel</a>

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