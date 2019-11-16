@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('contractoradvs.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Contractor Advances
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('contractoradvs.update',$contractoradvs->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}"
                                        {{$ledger->id==$contractoradvs->ledger_id ? 'selected':''}}>
                                        {{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Contractor</label>
                                <select name="contractor_id" class="form-control">
                                    <option selected="disabled">Select contractor</option>
                                    @foreach ($contractors as $contractor)
                                    <option value="{{$contractor->id}}"
                                        {{$contractor->id==$contractoradvs->contractor_id ? 'selected':''}}>
                                        {{$contractor->fullname .' - '.$contractor->contnumber}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount"
                                    value="{{$contractoradvs->amount}}">
                            </div>
                            <div>
                                <label for="">Purpose</label>
                                <textarea class="form-control" name="purpose" id="" cols="30" rows="3"
                                    placeholder="purpose">{{$contractoradvs->purpose}}</textarea>
                            </div>
                            <div>
                                <label for="">Awarded By <strong style="color:red">*</strong></label>
                                <select name="awardedby" class="form-control">
                                    <option selected="disabled">Select Awarding Body</option>
                                    <option>Federal Government (FG)</option>
                                    <option>State Government</option>
                                    <option>World Bank</option>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('contractoradvs.index') }}" class="btn btn-default">Cancel</a>

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