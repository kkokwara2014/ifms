@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('stocks.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Stocks
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('stocks.update',$stocks->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Inventory</label>
                                <select name="inventory_id" class="form-control">
                                    <option selected="disabled">Select Inventory</option>
                                    @foreach ($inventories as $inventory)
                                    <option value="{{$inventory->id}}"
                                        {{$inventory->id==$stocks->inventory_id ? 'selected':''}}>
                                        {{$inventory->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Item</label>
                                <input type="text" class="form-control" name="item" value="{{$stocks->item}}">
                            </div>
                            <div>
                                <label for="">Quantity</label>
                                <input type="text" class="form-control" name="qtyavailable" value="{{$stocks->qtyavailable}}">
                            </div>
                            <div>
                                <label for="">Unit Price</label>
                                <input type="text" class="form-control" name="unitprice" value="{{$stocks->unitprice}}">
                            </div>
                            
                            <div>
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="3"
                                    placeholder="Description">{{$stocks->description}}</textarea>

                            </div>
                            <div>
                                <label for="">Acquired On</label>
                                <input type="text" class="form-control" id="datepicker" name="datebought"
                                    placeholder="Acquired On" value="{{$stocks->datebought}}">
                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('stocks.index') }}" class="btn btn-default">Cancel</a>

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