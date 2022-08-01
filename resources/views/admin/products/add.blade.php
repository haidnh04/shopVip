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
                        <label for="menu">Tên sản phẩm <span style="color: red">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Tên sản phẩm">
                        @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh mục <span style="color: red">*</span></label>
                        <select name="menu_id" class="form-control">
                            {{-- Lấy ra các danh mục cha --}}
                            {{-- <option value="0">Danh mục cha</option> --}}
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Số lượng <span style="color: red">*</span></label>
                        <input type="number" name="amount" class="form-control" placeholder="Số lượng sản phẩm"
                            value="{{ old('amount') }}">
                        @error('amount')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Cân nặng</label>
                        <input type="number" name="weight" class="form-control" placeholder="gram.."
                            value="{{ old('weight') }}">
                        @error('weight')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá sản phẩm</label>
                        <input type="number" name="price" class="form-control" placeholder="Giá sản phẩm"
                            value="{{ old('price') }}">
                        @error('price')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá giảm</label>
                        <input type="number" name="price_sale" class="form-control" placeholder="Giá giảm"
                            value="{{ old('price_sale') }}">
                        @error('price_sale')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Thể tích</label>
                        <input type="text" name="dimensions" class="form-control" placeholder="cm.."
                            value="{{ old('dimensions') }}">
                        @error('dimensions')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Chất liệu</label>
                        <input type="text" name="materials" class="form-control" placeholder=""
                            value="{{ old('materials') }}">
                        @error('materials')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Màu</label>
                <input type="text" name="color" class="form-control" placeholder="" value="{{ old('color') }}">
                @error('color')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label for="menu">Kích cỡ</label>
                <input type="text" name="size" class="form-control" placeholder="" value="{{ old('size') }}">
                @error('size')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>



            <div class="form-group">
                <label for="menu">Ảnh sản phẩm <span style="color: red">*</span></label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="file" id="file">
                @error('file')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Ảnh bổ xung 1 <span style="color: red">*</span></label>
                <input type="file" name="file_num2" class="form-control" id="upload1">
                <div id="image_show1">

                </div>
                <input type="hidden" name="file_num2" id="file_num2">
                @error('file_num2')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Ảnh bổ xung 2 <span style="color: red">*</span></label>
                <input type="file" name="file_num3" class="form-control" id="upload2">
                <div id="image_show2">

                </div>
                <input type="hidden" name="file_num3" id="file_num3">
                @error('file_num3')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Ảnh bổ xung 3 <span style="color: red">*</span></label>
                <input type="file" name="file_num4" class="form-control" id="upload3">
                <div id="image_show3">

                </div>
                <input type="hidden" name="file_num4" id="file_num4">
                @error('file_num4')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Kích hoạt <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
            <a href="{{ route('listProduct') }}" class="btn btn-primary"
                style="width:80px; text-align:center; height: 37px">
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
