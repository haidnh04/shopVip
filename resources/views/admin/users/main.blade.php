<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.users.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <form action="{{ route('logout1') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-block">Đăng xuất</button>
            </form>
            {{-- <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul> --}}
        </nav>
        <!-- /.navbar -->
        @include('admin.users.sidebar')


        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    @include('admin.users.alert')

                    @if (session('msg'))
                        <div class="alert alert-success">{{ session('msg') }}</div>
                    @endif

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $title }}</h3>
                                </div>
                                <!-- /.card-header -->
                                @yield('content')
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

    </div>
    <!-- ./wrapper -->
    @include('admin.users.footer')
</body>

</html>
