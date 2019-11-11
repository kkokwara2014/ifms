@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Account Receivable
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
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Narration</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accountreceivables as $accountreceivable)
                                <tr>

                                    <td>{{$accountreceivable->ledger->name}}</td>
                                    <td>{{$accountreceivable->customername}}</td>
                                    <td>{{$accountreceivable->phone}}</td>
                                    <td>{{$accountreceivable->email}}</td>
                                    <td>&#8358;{{$accountreceivable->amount}}</td>
                                    <td>{{$accountreceivable->narration}}</td>


                                    <td><a href="{{ route('accountreceivables.edit',$accountreceivable->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$accountreceivable->id}}" style="display: none"
                                            action="{{ route('accountreceivables.destroy',$accountreceivable->id) }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$accountreceivable->id}}').submit();
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
                                    <th>Creditor</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Amount</th>
                                    <th>Narration</th>
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

                <form action="{{ route('accountreceivables.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Account Receivable</h4>
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
                                <label for="">Customer <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="customername"
                                    placeholder="Customer's Full Name">
                            </div>
                            <div>
                                <label for="">Phone <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" maxlength="11">
                            </div>
                            <div>
                                <label for="">Email Address <strong style="color:red">*</strong></label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>
                            <div>
                                <label for="">Amount <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount"
                                    maxlength="10">
                            </div>
                            <div>
                                <label for="">Narration </label>
                                <textarea class="form-control" name="narration" id="" cols="30" rows="3"
                                    placeholder="Narration"></textarea>
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