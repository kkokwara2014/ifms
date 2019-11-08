@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Expenditure
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
                                    <th>Budget</th>
                                    <th>Procurement</th>
                                    <th>Salary</th>
                                    <th>Captured On</th>
                                    <th>Expenditure Type</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenditures as $expenditure)
                                <tr>

                                    <td>{{$expenditure->ledger->name}}</td>
                                    <td>&#8358;{{$expenditure->budget->amount}}</td>
                                    <td>&#8358;{{$expenditure->procurement->amount}}</td>
                                    <td>&#8358;{{$expenditure->salarypayment->amount}}</td>
                                    <td>{{$expenditure->datecaptured}}</td>
                                    <td>{{$expenditure->expendtype}}</td>


                                    <td><a href="{{ route('expenditures.edit',$expenditure->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$expenditure->id}}" style="display: none"
                                            action="{{ route('expenditures.destroy',$expenditure->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$expenditure->id}}').submit();
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
                                    <th>Budget</th>
                                    <th>Procurement</th>
                                    <th>Salary</th>
                                    <th>Captured On</th>
                                    <th>Expenditure Type</th>

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

                <form action="{{ route('expenditures.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Expenditure</h4>
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
                                <label for="">Budget <strong style="color:red">*</strong></label>
                                <select name="budget_id" class="form-control">
                                    <option selected="disabled">Select Budget</option>
                                    @foreach ($budgets as $budget)
                                    <option value="{{$budget->id}}">{{$budget->budgetcategory->name.' - '}}
                                        &#8358;{{$budget->amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Procurement <strong style="color:red">*</strong></label>
                                <select name="procurement_id" class="form-control">
                                    <option selected="disabled">Select Procurement</option>
                                    @foreach ($procurements as $procurement)
                                    <option value="{{$procurement->id}}">
                                        {{$procurement->department->name.' - '}}&#8358;{{$procurement->amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Salary Payment <strong style="color:red">*</strong></label>
                                <select name="salarypayment_id" class="form-control">
                                    <option selected="disabled">Select Salary Payment</option>
                                    @foreach ($salarypayments as $salarypayment)
                                    <option value="{{$salarypayment->id}}">
                                        {{$salarypayment->mda->name.' - '}}&#8358;{{$salarypayment->amount}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Captured On <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" id="datepicker" name="datecaptured"
                                    placeholder="Captured On">
                            </div>
                            <div>
                                <label for="">Expenditure Type <strong style="color:red">*</strong></label>
                                <select name="expendtype" class="form-control">
                                    <option selected="disabled">Select Expenditure Type</option>

                                    <option>Capital Expenditure</option>
                                    <option>Deferred Revenue Expenditure</option>
                                    <option>Revenue Expenditure</option>

                                </select>
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