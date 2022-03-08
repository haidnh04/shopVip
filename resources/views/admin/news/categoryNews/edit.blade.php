@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf

            <div class="form-group">
                <label>Tên thể loại tin tức</label>
                <input type="text" name="name" value="{{ $categorynew->name }}" class="form-control"
                    placeholder="Tên sản phẩm">
                @error('name')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $categorynew->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $categorynew->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật thể loại tin</button>
                </div>
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
