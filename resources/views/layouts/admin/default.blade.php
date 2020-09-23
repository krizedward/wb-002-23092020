<!DOCTYPE html>
<html>
<head>
  @include('layouts.admin._head')
</head>
@if (!Auth::user())
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><b>Majoo </b>Teknologi Indonesia</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('login') }}">Login</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          @yield('content')
        </div>
        <!-- /.container -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container text-center">
          <strong>2020 © <a href="#">PT.Majoo Teknologi Indonesia</a></strong> 
        </div>
        <!-- /.container -->
      </footer>
    </div>
    <!-- ./wrapper -->
    @stack('script')
  </body>
@else
  <body class="hold-transition {{ (Auth::user()->level == 'member') ? 'skin-red' : 'skin-blue' }} sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      @include('layouts.admin.header')
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      @include('layouts.admin.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        @yield('content-header')
      </section>

      <section class="content">
        @include('layouts.admin.flash_massage')

        @yield('content')
      </section>

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2020 <a href="https://hehe.co.id">Community Service Binus@Malang</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  @stack('script')
  </body>
@endif
</html>

