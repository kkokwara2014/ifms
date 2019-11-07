@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('purchases.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Purchases
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('purchases.update',$purchases->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div>
                                <label for="">Order</label>
                                <select name="order_id" class="form-control">
                                    <option selected="disabled">Select order</option>
                                    @foreach ($orders as $order)
                                    <option value="{{$order->id}}" {{$order->id==$purchases->order_id ? 'selected':''}}>
                                        {{$order->stock->item.' - '.$order->qty}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Department</label>
                                <select name="department_id" class="form-control">
                                    <option selected="disabled">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}"
                                        {{$department->id==$purchases->department_id ? 'selected':''}}>
                                        {{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="name" value="{{$purchases->amount}}"
                                    maxlength="8">
                            </div>
                            <div>
                                <label for="">Purchase Date</label>
                                <input type="text" class="form-control" id="datepicker" name="acquisitiondate"
                                    placeholder="Purchase Date" value="{{$purchases->procdate}}">
                            </div>
                            <div>
                                <label for="">Narration</label>
                                <textarea class="form-control" name="narration" id="" cols="30" rows="3"
                                    placeholder="Narration">{{$purchases->narration}}</textarea>

                            </div>


                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('purchases.index') }}" class="btn btn-default">Cancel</a>

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