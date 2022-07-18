@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf
            <div class="form-group">
                <label for="menu">Tên thành viên <span style="color: red">*</span></label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                    placeholder="Tên thành viên">
                @error('name')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Email <span style="color: red">*</span></label>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                @error('email')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Mật khẩu</label>
                <input type="password" name="password"  class="form-control"
                    placeholder="Mật khẩu">
                @error('password')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Xác nhận mật khẩu</label>
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Xác nhận mật khẩu">
                @error('password')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Vai trò <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="role"
                        {{ $user->role == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Admin</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="role"
                        {{ $user->role == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Nhân viên</label>
                </div>
            </div>

            <div class="form-group">
                <label>Kích hoạt <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active1" name="status"
                        {{ $user->status == 1 ? 'checked=""' : '' }}>
                    <label for="active1" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active1" name="status"
                        {{ $user->status == 0 ? 'checked=""' : '' }}>
                    <label for="no_active1" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật thành viên</button>
            <a href="{{ route('listUser') }}" class="btn btn-primary" style="width:80px; text-align:center; height: 37px">
                <p>Quay lại</p>
            </a>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('content');
    </script>
@endsection
