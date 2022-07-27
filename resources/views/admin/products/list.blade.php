@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên sản phẩm: </th>
                <th>Danh mục: </th>
                <th>Số lượng: </th>
                <th>Giá: </th>
                <th>Giá giảm: </th>
                <th>Trạng thái: </th>
                <th>Thêm mới: </th>
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->menu->name }}</td>
                    <td>{!! \App\Helpers\Helper::amountProduct($product->amount) !!}</td>
                    <td>{!! \App\Helpers\Helper::priceAdminProduct($product->price) !!}</td>
                    <td>{!! \App\Helpers\Helper::salePriceAdminProduct($product->price_sale) !!}</td>
                    <td><input data-id="{{ $product->id }}" class="toggle-class-product" type="checkbox" data-onstyle="success"
                        data-offstyle="danger" data-toggle="toggle" data-on="Bật" data-off="Tắt"
                        {{ $product->active ? 'checked' : '' }}></td>
                    {{-- <td>{!! \App\Helpers\Helper::active($product->active) !!}</td> --}}
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($product->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($product->updated_at) !!}</td>
                    {{-- <td>{{ $product->updated_at }}</td> --}}
                    <td>
                        @if (!empty($product->id))
                            <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{ $product->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $product->id }}, '/admin/products/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (!empty($product->link))
        {!! $product->link !!}
    @endif

    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới sản phẩm
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{ route('storeProduct') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">Tên sản phẩm <span style="color: red">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" placeholder="Tên sản phẩm">
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
                                        <input type="number" name="amount" class="form-control"
                                            placeholder="Số lượng sản phẩm" value="{{ old('amount') }}">
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
                                <input type="text" name="color" class="form-control" placeholder=""
                                    value="{{ old('color') }}">
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
                                    <input class="custom-control-input" value="1" type="radio" id="active"
                                        name="active" checked="">
                                    <label for="active" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_active"
                                        name="active">
                                    <label for="no_active" class="custom-control-label">Không</label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="card-footer">
        <a href="{{ route('createProduct') }}" class="btn btn-primary" style="width:140px; text-align:center; height: 40px">
            <p>Thêm sản phẩm</p>
        </a>
    </div> --}}
@endsection
