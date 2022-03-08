@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf
            <div class="form-group">
                <label for="menu">Tên thành viên</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                    placeholder="Tên thành viên">
                @error('name')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                @error('email')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Mật khẩu</label>
                <input type="password" name="password" value="" class="form-control" placeholder="mật khẩu">
                @error('password')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <fieldset id="group1">
                    <label>Vai trò</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active" name="role" checked="">
                        <label for="active" class="custom-control-label">Admin</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active" name="role">
                        <label for="no_active" class="custom-control-label">Nhân viên</label>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset id="group2">
                    <label>Kích hoạt</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="1" type="radio" id="active1" name="status" checked="">
                        <label for="active1" class="custom-control-label">Có</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" value="0" type="radio" id="no_active1" name="status">
                        <label for="no_active1" class="custom-control-label">Không</label>
                    </div>
                </fieldset>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo thành viên</button>
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
