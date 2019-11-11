@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
            <span class="fa fa-plus"></span> Add Grant
        </button>
        <br><br>

        <div class="row">
            <div class="col-md-10">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Comment</th>
                                    <th>Donor</th>

                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grants as $grant)
                                <tr>

                                    <td>&#8358;{{$grant->amount}}</td>
                                    <td>{{$grant->comment}}</td>
                                    <td>{{$grant->fromwho->name}}</td>


                                    <td><a href="{{ route('grants.edit',$grant->id) }}"><span
                                                class="fa fa-edit fa-2x text-primary"></span></a></td>
                                    <td>
                                        <form id="delete-form-{{$grant->id}}" style="display: none"
                                            action="{{ route('grants.destroy',$grant->id) }}" method="post">
                                            {{ csrf_field() }}
                                            {{method_field('DELETE')}}
                                        </form>
                                        <a href="" onclick="
                                                            if (confirm('Are you sure you want to delete this?')) {
                                                                event.preventDefault();
                                                            document.getElementById('delete-form-{{$grant->id}}').submit();
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
                                    <th>Amount</th>
                                    <th>Comment</th>
                                    <th>Donor</th>

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

                <form action="{{ route('grants.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Add Grant</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="">Amount <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="amount" placeholder="Amount"
                                    maxlength="10">
                            </div>
                            <div>
                                <label for="">Comment </label>
                                <textarea class="form-control" name="comment" id="" cols="30" rows="3"
                                    placeholder="Comment"></textarea>
                            </div>
                            <div>
                                <label for="">Donor <strong style="color:red">*</strong></label>
                                <select name="fromwho_id" class="form-control">
                                    <option selected="disabled">Select Donor</option>
                                    @foreach ($fromwhos as $fromwho)
                                    <option value="{{$fromwho->id}}">{{$fromwho->name}}</option>
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