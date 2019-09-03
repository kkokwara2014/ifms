<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('bootstrap_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ ucfirst(Auth::user()->name) }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      {{-- <li class="header">MAIN NAVIGATION</li> --}}
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
     
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Personnel</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="#l"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>MDA</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Advances</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> ChartJS</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Third Party</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Contractor</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Supplier</a></li>
          
        </ul>
      </li>
      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>