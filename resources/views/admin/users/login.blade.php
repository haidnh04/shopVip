<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Gọi css bên admin\users/head.blade.php sang --}}
    @include('admin.users.head')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Đăng nhập quản trị</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (session('msg'))
                    <div class="alert alert-danger">{{ session('msg') }}</div>
                @endif

                {{-- Gọi form báo lỗi bên admin\users/alert.blade.php sang --}}
                {{-- @include('admin.users.alert') --}}

                {{-- Truyền vào route post có tên login và ở controller có method là store --}}
                <form action="{{ route('login1') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email1" placeholder="Email">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        {{-- @error('email1')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password1" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        {{-- @error('password1')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror --}}
                    </div>

                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember1" id="remember">
                                <label for="remember">
                                    Nhớ tôi?
                                </label>
                            </div>
                        </div>

                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    {{-- Gọi js bên admin\users/head.blade.php sang --}}
    @include('admin.users.footer')
</body>

</html>
