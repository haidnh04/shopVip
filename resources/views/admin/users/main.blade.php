<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.users.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img src="/template/admin/dist/img/logoHm1.png" alt="AdminLTELogo" height="120" width="120">
        </div>
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
            {{-- <form action="{{ route('logout1') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary btn-block">Đăng xuất</button>
            </form> --}}
            {{-- <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-sm-10 col-12 offset-lg-1 offset-sm-1">
                        <nav class="navbar navbar-expand-lg bg-info rounded">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent"
                                style="display: unset !important;"> --}}
            <div style="float:right;">
                <ul class="nav nav-pills mr-auto justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell" style="color:#007bff;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="head text-light bg-dark">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12">
                                        <span>Thông báo (3)</span>
                                        <a href="" class="float-right text-light">Đánh dấu đã đọc tất cả</a>
                                    </div>
                            </li>
                            <li class="notification-box">
                                <div class="row">
                                    {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Notification<span class="caret"></span>
                                </a> --}}
                                    <div class="col-lg-8 col-sm-8 col-8">
                                        @foreach (Auth::user()->notifications as $notification)
                                            <a class="dropdown-item" href="#">
                                                <span>{{ $notification->data['title'] }}</span><br>
                                                <small>{{ $notification->data['content'] }}</small>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li class="footer bg-dark text-center">
                                <a href="" class="text-light">Xem tất cả</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            {{-- </div>
                        </nav>
                    </div>
                </div>
            </div> --}}
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
                            <div class="card mt-3">
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
            {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved. --}}
        </footer>

    </div>
    <!-- ./wrapper -->
    @include('admin.users.footer')
    @yield('script11')
</body>

</html>
