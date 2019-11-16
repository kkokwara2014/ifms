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
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            {{-- <i class="fa fa-angle-left pull-right"></i> --}}
          </span>
        </a>

      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Accounts</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('accountpayables.index') }}"><i class="fa fa-circle-o"></i> Payable</a></li>
          <li><a href="{{ route('accountreceivables.index') }}"><i class="fa fa-circle-o"></i> Receivable</a></li>
          <li><a href="{{ route('ledger.index') }}"><i class="fa fa-circle-o"></i> Ledger</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Finance</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('budgets.index') }}"><i class="fa fa-circle-o"></i> Budget</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Fund Retirement</a></li>
          <li><a href="{{ route('grants.index') }}"><i class="fa fa-circle-o"></i> Grant</a></li>
        </ul>
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
          <li><a href="{{ route('mda.index') }}"><i class="fa fa-circle-o"></i> MDA</a></li>
          <li><a href="{{ route('department.index') }}"><i class="fa fa-circle-o"></i> Department</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Employee</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Appraisal</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Procurement</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('assets.index') }}"><i class="fa fa-circle-o"></i> Assets</a></li>
          <li><a href="{{ route('orders.index') }}"><i class="fa fa-circle-o"></i> Order</a></li>
          <li><a href="{{ route('stocks.index') }}"><i class="fa fa-circle-o"></i> Stock</a></li>
          <li><a href="{{ route('inventory.index') }}"><i class="fa fa-circle-o"></i> Inventory</a></li>
          <li><a href="{{ route('purchases.index') }}"><i class="fa fa-circle-o"></i> Purchases</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Expenditure</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Employee</a></li>
          <li><a href="{{ route('salarypayments.index') }}"><i class="fa fa-circle-o"></i> Salary Payment</a></li>
          <li><a href="{{ route('expenditures.index') }}"><i class="fa fa-circle-o"></i> Expenses</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i>
          <span>Revenue</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('revenues.index') }}"><i class="fa fa-circle-o"></i> MDA</a></li>
          <li><a href="{{ route('healthcares.index') }}"><i class="fa fa-circle-o"></i> Healthcare</a></li>
          {{-- <li><a href="#"><i class="fa fa-circle-o"></i> Morris</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Flot</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Inline charts</a></li> --}}
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Advances</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Employee Advance</a></li>
        <li><a href="{{route('contractoradvs.index')}}"><i class="fa fa-circle-o"></i> Contractor Advance</a></li>
          <li><a href="{{route('orderadvs.index')}}"><i class="fa fa-circle-o"></i> Order Advance</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Supplier Advance</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Tour Advance</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Third Party</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('contractor.index') }}"><i class="fa fa-circle-o"></i> Contractor</a></li>
          <li><a href="{{ route('supplier.index') }}"><i class="fa fa-circle-o"></i> Supplier</a></li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>