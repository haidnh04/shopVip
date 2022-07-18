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
                        <label>Tên slide <span style="color: red">*</span></label>
                        <input type="text" name="name" value="{{ $slider->name }}" class="form-control"
                            placeholder="Tên sản phẩm">
                        @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="menu">URL</label>
                        <input type="text" name="url" class="form-control" placeholder="URL" value="{{ $slider->url }}">
                        @error('url')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Slide <span style="color: red">*</span></label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $slider->file }}" target="_blank">
                        <img src="{{ $slider->file }}" width="200px" style="margin-top: 10px;">
                    </a>
                </div>
                <input type="hidden" name="file" id="file" value="{{ $slider->file }}">
                @error('file')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Sắp xếp <span style="color: red">*</span></label>
                <input type="number" name="sort_by" class="form-control" placeholder="sắp xếp"
                    value="{{ $slider->sort_by }}">
                @error('sort_by')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Kích hoạt <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $slider->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $slider->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo slider</button>
            <a href="{{ route('listSlider') }}" class="btn btn-primary" style="width:80px; text-align:center; height: 37px">
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
