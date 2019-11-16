@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('healthcares.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Healthcare Revenues
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('healthcares.update',$healthcares->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Institution Type</label>
                                <select name="institutype_id" class="form-control">
                                    <option selected="disabled">Select Institution Type</option>
                                    @foreach ($institutypes as $institutype)
                                    <option value="{{$institutype->id}}"
                                        {{$institutype->id==$healthcares->institutype_id ? 'selected':''}}>
                                        {{$institutype->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Ledger</label>
                                <select name="ledger_id" class="form-control">
                                    <option selected="disabled">Select Ledger</option>
                                    @foreach ($ledgers as $ledger)
                                    <option value="{{$ledger->id}}"
                                        {{$ledger->id==$healthcares->ledger_id ? 'selected':''}}>
                                        {{$ledger->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Healthcare Code</label>
                                <input type="text" class="form-control" name="hccode" value="{{$healthcares->hccode}}">
                            </div>
                            <div>
                                <label for="">Healthcare Name</label>
                                <input type="text" class="form-control" name="hcname" value="{{$healthcares->hcname}}">
                            </div>

                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$healthcares->amount}}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('healthcares.index') }}" class="btn btn-default">Cancel</a>

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