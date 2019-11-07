@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('budgets.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Budgets
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('budgets.update',$budgets->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Department</label>
                                <select name="department_id" class="form-control">
                                    <option selected="disabled">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}"
                                        {{$department->id==$budgets->department_id ? 'selected':''}}>
                                        {{$department->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Category</label>
                                <select name="budgetcategory_id" class="form-control">
                                    <option selected="disabled">Select budgetcategory</option>
                                    @foreach ($budgetCategories as $budgetcategory)
                                    <option value="{{$budgetcategory->id}}"
                                        {{$budgetcategory->id==$budgets->budgetcategory_id ? 'selected':''}}>
                                        {{$budgetcategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$budgets->amount}}"
                                    maxlength="10">
                            </div>

                            <div>
                                <label for="">Reason</label>
                                <textarea class="form-control" name="reason" id="" cols="30" rows="3"
                                    placeholder="Reason">{{$budgets->reason}}</textarea>

                            </div>

                            <div>
                                    <label for="">Ledger</label>
                                    <select name="ledger_id" class="form-control">
                                        <option selected="disabled">Select Ledger</option>
                                        @foreach ($ledgers as $ledger)
                                        <option value="{{$ledger->id}}"
                                            {{$ledger->id==$budgets->ledger_id ? 'selected':''}}>
                                            {{$ledger->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('budgets.index') }}" class="btn btn-default">Cancel</a>

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