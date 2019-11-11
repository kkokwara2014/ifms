@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('accountpayables.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Account Payables
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('accountpayables.update',$accountpayables->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}"
                                        {{$ledger->id==$accountpayables->ledger_id ? 'selected':''}}>
                                        {{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Creditor</label>
                                <input type="text" class="form-control" name="creditorname" value="{{$accountpayables->creditorname}}">
                            </div>
                            <div>
                                <label for="">Phone</label>
                                <input type="tel" class="form-control" name="phone" value="{{$accountpayables->phone}}" maxlength="11">
                            </div>
                            <div>
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$accountpayables->email}}">
                            </div>
                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$accountpayables->amount}}">
                            </div>
                            <div>
                                <label for="">Narration</label>
                                <textarea class="form-control" name="narration" id="" cols="30" rows="3"
                                    placeholder="Narration">{{$accountpayables->narration}}</textarea>

                            </div>
                            
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('accountpayables.index') }}" class="btn btn-default">Cancel</a>

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