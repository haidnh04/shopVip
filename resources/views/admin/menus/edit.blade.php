@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên danh mục <span style="color: red">*</span></label>
                        <input type="text" name="name" value="{{ $menu->name }}" class="form-control"
                            placeholder="Tên danh mục">
                        @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh mục <span style="color: red">*</span></label>
                        <select name="parent_id" class="form-control">
                            {{-- Lấy ra các danh mục cha --}}
                            <option value="0" {{ $menu->parent_id == 0 ? 'selected' : '' }}>Danh mục cha</option>

                            @foreach ($menus as $menuParent)
                                <option value="{{ $menuParent->id }}"
                                    {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                                    {{ $menuParent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" class="form-control">{{ $menu->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh danh mục<span style="color: red">*</span></label>
                <input type="file" name="img" class="form-control" id="upload10">
                <div id="image_show10">
                    <a href="{{ $menu->img }}" target="_blank">
                        <img src="{{ $menu->img }}" width="200px">
                    </a>
                </div>
                <input type="hidden" name="img" id="img" value="{{ $menu->img }}">
                @error('file')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Kích hoạt <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $menu->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $menu->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
            <a href="{{ route('listMenu') }}" class="btn btn-primary" style="width:80px; text-align:center; height: 37px">
                <p>Quay lại</p>
            </a>
        </div>
    </form>
@endsection

@section('footer')
    <script>
        var editor = CKEDITOR.replace('content', {
            filebrowserUploadUrl: '{{ route('ck.upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form',
        });
        var editor = CKEDITOR.replace('description', {
            filebrowserUploadUrl: '{{ route('ck.upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form',
        });
    </script>
@endsection
