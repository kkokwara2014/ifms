@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('expenditures.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Expenditures
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('expenditures.update',$expenditures->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}"
                                        {{$ledger->id==$expenditures->ledger_id ? 'selected':''}}>
                                        {{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Budget</label>
                                <select name="budget_id" class="form-control">
                                    <option selected="disabled">Select Budget</option>
                                    @foreach ($budgets as $budget)
                                    <option value="{{$budget->id}}"
                                        {{$budget->id==$expenditures->budget_id ? 'selected':''}}>
                                        {{$budget->budgetcategory->name.' - '}}
                                        &#8358;{{$budget->amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Procurement</label>
                                <select name="procurement_id" class="form-control">
                                    <option selected="disabled">Select Procurement</option>
                                    @foreach ($procurements as $procurement)
                                    <option value="{{$procurement->id}}"
                                        {{$procurement->id==$expenditures->procurement_id ? 'selected':''}}>
                                        {{$procurement->department->name.' - '}}&#8358;{{$procurement->amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Salary Payment</label>
                                <select name="salarypayment_id" class="form-control">
                                    <option selected="disabled">Select Salary Payment</option>
                                    @foreach ($salarypayments as $salarypayment)
                                    <option value="{{$salarypayment->id}}"
                                        {{$salarypayment->id==$expenditures->salarypayment_id ? 'selected':''}}>
                                        {{$salarypayment->mda->name.' - '}}&#8358;{{$salarypayment->amount}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Paid On</label>
                                <input type="text" class="form-control" id="datepicker" name="datecaptured"
                                    placeholder="Paid On" value="{{$expenditures->datecaptured}}">
                            </div>

                            <div>
                                <label for="">Expenditure Type</label>
                                <select name="expendtype" class="form-control">
                                    <option selected="disabled">Select Expenditure Type</option>
                                    <option>Capital Expenditure</option>
                                    <option>Deferred Revenue Expenditure</option>
                                    <option>Revenue Expenditure</option>
                                </select>
                            </div>


                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('expenditures.index') }}" class="btn btn-default">Cancel</a>

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