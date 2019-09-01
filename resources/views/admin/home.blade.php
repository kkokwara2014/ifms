@extends('admin.layout.app')

@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-2">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>35</h3>

              <p>Contacts</p>
            </div>
            <div class="icon">
              <i class="ion ion-email"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3>15</h3>

              <p>Committee Members</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3>25</h3>

              <p>Admins</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2">
          <!-- small box -->
          <div class="small-box bg-fuchsia">
            <div class="inner">
            <h3>30</h3>

              <p>Abstracts</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <div class="col-lg-2">
          <!-- small box -->
          <div class="small-box bg-blue-active">
            <div class="inner">
            <h3>10</h3>

              <p>Full Papers</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <div class="col-lg-2">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3>20</h3>

              <p>Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-people"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

    </section>
    <!-- /.Left col -->

    <section class="col-lg-5 connectedSortable">

    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection