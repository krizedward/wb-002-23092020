  <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('adminlte/dist/img/user.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Admin</li>
          <li>
            <a href="{{ route('home') }}">
              <i class="fa fa-circle-o"></i> <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="{{ route('products.index') }}">
              <i class="fa fa-circle-o"></i> <span>Produk</span>
            </a>
          </li>
        <li class="header">Other</li>
          <li>
            <a href="{{ url('/keluar') }}">
              <i class="fa fa-circle-o"></i> <span>Logout</span>
            </a>
          </li>
      </ul>
    </section>
    <!-- /.sidebar -->