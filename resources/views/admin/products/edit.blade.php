@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js">
    </script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên sản phẩm</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                            placeholder="Tên sản phẩm">
                        @error('name')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="menu_id" class="form-control">
                            {{-- Lấy ra các danh mục cha --}}
                            {{-- <option value="0">Danh mục cha</option> --}}
                            @foreach ($menus as $menu)
                                <option value="{{ $menu->id }}"
                                    {{ $product->menu_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Số lượng</label>
                        <input type="number" name="amount" class="form-control" placeholder="Số lượng sản phẩm"
                            value="{{ $product->amount }}">
                        @error('amount')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Cân nặng</label>
                        <input type="number" name="weight" class="form-control" placeholder="gram.."
                            value="{{ $product->weight }}">
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
                            value="{{ $product->price }}">
                        @error('price')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá giảm</label>
                        <input type="number" name="price_sale" class="form-control" placeholder="Giá giảm"
                            value="{{ $product->price_sale }}">
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
                            value="{{ $product->dimensions }}">
                        @error('dimensions')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">chất liệu</label>
                        <input type="text" name="materials" class="form-control" placeholder=""
                            value="{{ $product->materials }}">
                        @error('materials')
                            <span style="color:red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="menu">Màu</label>
                <input type="text" name="color" class="form-control" placeholder="" value="{{ $product->color }}">
                @error('color')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="menu">Kích cỡ</label>
                <input type="text" name="size" class="form-control" placeholder="" value="{{ $product->size }}">
                @error('size')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh sản phẩm</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $product->file }}" target="_blank">
                        <img src="{{ $product->file }}" width="200px">
                    </a>
                </div>
                <input type="hidden" name="file" id="file" value="{{ $product->file }}">
                @error('file')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>


            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $product->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $product->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật sản phẩm</button>
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
