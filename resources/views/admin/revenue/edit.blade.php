@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('revenues.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All revenues
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">
                <div>
                    <label for="">Revenue ID: {{$revenues->revnumber}}</label>
                </div>
                
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('revenues.update',$revenues->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <input type="hidden" name="revnumber" value="{{$revenues->revnumber}}">
                            </div>

                            <div>
                                <label for="">MDA</label>
                                <select name="mda_id" class="form-control">
                                    <option selected="disabled">Select MDA</option>
                                    @foreach ($mdas as $mda)
                                    <option value="{{$mda->id}}" {{$mda->id==$revenues->mda_id ? 'selected':''}}>
                                        {{$mda->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$revenues->amount}}"
                                    maxlength="10">
                            </div>

                            <div>
                                <label for="">Narration</label>
                                <textarea class="form-control" name="narration" id="" cols="30" rows="3"
                                    placeholder="Narration">{{$revenues->narration}}</textarea>
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
                                <input type="text" class="form-control" name="paidby" placeholder="Paid By" value="{{$revenues->paidby}}">
                            </div>
                            <div>
                                <label for="">Collector's Full Name <strong style="color:red">*</strong></label>
                                <input type="text" class="form-control" name="collectorname"
                                    placeholder="Collector's Full Name" value="{{$revenues->collectorname}}">
                            </div>
                            <div>
                                <label for="">Collector's Phone <strong style="color:red">*</strong></label>
                                <input type="tel" class="form-control" name="collectorphone"
                                    placeholder="Collector's Phone Number" value="{{$revenues->collectorphone}}">
                            </div>

                            <div>
                                <label for="">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}"
                                        {{$ledger->id==$revenues->ledger_id ? 'selected':''}}>
                                        {{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>



                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('revenues.index') }}" class="btn btn-default">Cancel</a>

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