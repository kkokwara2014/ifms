@extends('admin.layout.app')


@section('content')
{{-- @include('admin.layout.statboard') --}}
@include('admin.layout.statboardcontainer')
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
        <a href="{{ route('grants.index') }}" class="btn btn-success">
            <span class="fa fa-eye"></span> All Grants
        </a>
        <br><br>

        <div class="row">
            <div class="col-md-6">

                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('grants.update',$grants->id) }}" method="post">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}

                            <div>
                                <label for="">Amount</label>
                                <input type="text" class="form-control" name="amount" value="{{$grants->amount}}">
                            </div>
                            <div>
                                <label for="">Comment</label>
                                <textarea class="form-control" name="comment" id="" cols="30" rows="3"
                                    placeholder="Comment">{{$grants->comment}}</textarea>
                            </div>

                            <div>
                                <label for="">Donor</label>
                                <select name="fromwho_id" class="form-control">
                                    <option selected="disabled">Select Donor</option>
                                    @foreach ($fromwhos as $fromwho)
                                    <option value="{{$fromwho->id}}"
                                        {{$fromwho->id==$grants->fromwho_id ? 'selected':''}}>
                                        {{$fromwho->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('grants.index') }}" class="btn btn-default">Cancel</a>

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