@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Revenue
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
                                    <th>Rev. ID</th>
                                    <th>MDA</th>
                                    <th>Amount</th>
                                    <th>Narration</th>
                                    <th>Rev. Type</th>
                                    <th>Paid By</th>
                                    <th>Collector</th>
                                    <th>Phone</th>
                                    <th>Found In</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($revenues as $revenue)
                                <tr>

                                    <td>{{$revenue->revnumber}}</td>
                                    <td>{{$revenue->mda->name}}</td>
                                    <td>&#8358;{{$revenue->amount}}</td>

                                    <td>{{$revenue->narration}}</td>
                                    <td>{{$revenue->revtype}}</td>
                                    <td>{{$revenue->paidby}}</td>
                                    <td>{{$revenue->collectorname}}</td>
                                    <td>{{$revenue->collectorphone}}</td>
                                    <td>{{$revenue->ledger->name}}</td>


                                    <td><a href="{{ route('revenues.edit',$revenue->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$revenue->id}}" style="display: none"
                                            action="{{ route('revenues.destroy',$revenue->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$revenue->id}}').submit();
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
                                    <th>Rev. ID</th>
                                    <th>MDA</th>
                                    <th>Amount</th>
                                    <th>Narration</th>
                                    <th>Rev. Type</th>
                                    <th>Paid By</th>
                                    <th>Collector</th>
                                    <th>Phone</th>
                                    <th>Found In</th>
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

                <form action="{{ route('revenues.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add New Revenue</h4>
                        </div>
                        <div class="modal-body">

                            <input type="hidden" name="revnumber" value="{{'RV'.rand(955,1295)*100}}">

                            <div>
                                <label for="">MDA <strong style="color:red">*</strong></label>
                                <select name="mda_id" class="form-control">
                                    <option selected="disabled">Select MDA</option>
                                    @foreach ($mdas as $mda)
                                    <option value="{{$mda->id}}">{{$mda->name}}</option>
                                    @endforeach
                                </select>
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
                            <div>
                                <label for="">Revenue Type <strong style="color:red">*</strong></label>
                                <select name="revtype" class="form-control">
                                    <option selected="disabled">Select Revenue Type</option>
                                    <option>Capitation Rate</option>
                                    <option>Property/Tenement Rate</option>
                                    <option>License Fees</option>
                                    <option>Wheel Barrow</option>
                                    <option>Trucks</option>
                                    <option>CHarges on Abattoirs</option>
                                    <option>Impounding on Strayed Animals</option>
                                </select>
                            </div>
                            <div>
                                <label for="">Paid By <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="paidby"
                                    placeholder="Paid By">
                            </div>
                            <div>
                                <label for="">Collector's Full Name <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="collectorname"
                                    placeholder="Collector's Full Name">
                            </div>
                            <div>
                                <label for="">Collector's Phone <strong style="color:red">*</strong></label>
                                <input type="tel" class="form-control" name="collectorphone"
                                    placeholder="Collector's Phone Number">
                            </div>
                            <div>
                                <label for="">Ledger <strong style="color:red">*</strong></label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}">{{$ledger->name}}</option>
                                    @endforeach
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