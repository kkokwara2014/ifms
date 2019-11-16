@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Employee
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
                                    <th>Staff ID.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Designation</th>

                                    <th>View Details</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>

                                    <td>{{$employee->empnumber}}</td>
                                    <td>{{$employee->fullname}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->department->name}}</td>
                                    <td>{{$employee->designation}}</td>

                                    <td>
                                        <a href="{{ route('employees.show',$employee->id) }}"><span
                                                class="fa fa-eye fa-2x text-primary"></span></a>
                                    </td>
                                    <td><a href="{{ route('employees.edit',$employee->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$employee->id}}" style="display: none"
                                            action="{{ route('employees.destroy',$employee->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$employee->id}}').submit();
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
                                    <th>Staff ID.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Designation</th>

                                    <th>View Details</th>
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
            <div class="modal-dialog modal-lg">

                <form action="{{ route('employees.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Employee</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div>
                                        <label for="">Staff ID. <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="empnumber"
                                            placeholder="Staff Identity" maxlength="8">
                                    </div>
                                    <div>
                                        <label for="">Full Name. <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                                    </div>
                                    <div>
                                        <label for="">Company Name. <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="compname"
                                            placeholder="Company Name">
                                    </div>
                                    <div>
                                        <label for="">Address </label>
                                        <textarea class="form-control" name="address" id="" cols="30" rows="2"
                                            placeholder="Contact Address"></textarea>
                                    </div>
                                    <div>
                                        <label for="">Phone <strong style="color:red">*</strong></label>
                                        <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                                            maxlength="11">
                                    </div>
                                    <div>
                                        <label for="">Email Address <strong style="color:red">*</strong></label>
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Address">
                                    </div>
                                    <div>
                                        <label for="">Designation <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="designation"
                                            placeholder="Designation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="">Date of Birth <strong style="color:red">*</strong></label>
                                        <input type="date" class="form-control" name="dob">
                                    </div>
                                    <div>
                                        <label for="">Gender <strong style="color:red">*</strong></label>
                                        <select name="gender" class="form-control">
                                            <option selected="disabled">Select Gender</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Marital Status <strong style="color:red">*</strong></label>
                                        <select name="maritalstatus" class="form-control">
                                            <option selected="disabled">Select Marital Status</option>
                                            <option>Single</option>
                                            <option>Married</option>
                                            <option>Divorced</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Appointment Date <strong style="color:red">*</strong></label>
                                        <input type="date" class="form-control" name="appointmentdate">
                                    </div>
                                    <div>
                                        <label for="">Name of Bank <strong style="color:red">*</strong></label>
                                        <select name="bank_id" class="form-control">
                                            <option selected="disabled">Select Bank</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{$bank->id}}">{{$bank->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Bank Account <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="bankaccount"
                                            placeholder="Bank Account" maxlength="10">
                                    </div>
                                    <div>
                                        <label for="">Basic Salary <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="basicsalary"
                                            placeholder="Basic Salary" maxlength="10">
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="">Net Pay <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="netpay" placeholder="Net Pay"
                                            maxlength="10">
                                    </div>
                                    <div>
                                        <label for="">Total Allowance <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="totalallow"
                                            placeholder="Total Allowance" maxlength="10">
                                    </div>
                                    <div>
                                        <label for="">Deductions <strong style="color:red">*</strong></label>
                                        <input type="text" class="form-control" name="deductions"
                                            placeholder="Deductions" maxlength="10">
                                    </div>
                                    <div>
                                        <label for="">Department <strong style="color:red">*</strong></label>
                                        <select name="department_id" class="form-control">
                                            <option selected="disabled">Select Department</option>
                                            @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Union <strong style="color:red">*</strong></label>
                                        <select name="empunion_id" class="form-control">
                                            <option selected="disabled">Select Union</option>
                                            @foreach ($empunions as $empunion)
                                            <option value="{{$empunion->id}}">{{$empunion->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Rank <strong style="color:red">*</strong></label>
                                        <select name="rank_id" class="form-control">
                                            <option selected="disabled">Select Rank</option>
                                            @foreach ($ranks as $rank)
                                            <option value="{{$rank->id}}">{{$rank->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="">Qualification <strong style="color:red">*</strong></label>
                                        <select name="qualification_id" class="form-control">
                                            <option selected="disabled">Select Qualification</option>
                                            @foreach ($qualifications as $qualification)
                                            <option value="{{$qualification->id}}">{{$qualification->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>

                            {{-- <div>
                                <label for="">Ledger <strong style="color:red">*</strong></label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}">{{$ledger->name}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        {{-- <div>
                                <label for="">Contractor <strong style="color:red">*</strong></label>
                                <select name="contractor_id" class="form-control">
                                    <option selected="disabled">Select Contractor</option>
                                    @foreach ($contractors as $contractor)
                                    <option value="{{$contractor->id}}">
                        {{$contractor->fullname .' - '.$contractor->contnumber}}</option>
                        @endforeach
                        </select>
                    </div> --}}


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