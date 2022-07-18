@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên Slider: </th>
                <th>URL: </th>
                <th>Ảnh slider: </th>
                <th>Sắp xếp: </th>
                <th>Trạng thái: </th>
                <th>Thêm mới: </th>
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->url }}</td>
                    <td>
                        <a href="{{ $slider->file }}" target="_blank">
                            <img src="{{ $slider->file }}" height="50px">
                        </a>
                    </td>
                    <td>{{ $slider->sort_by }}</td>
                    <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($slider->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($slider->updated_at) !!}</td>
                    <td>
                        @if (!empty($slider->id))
                            <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            {{-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target='#exampleModalLongUpdate' data-id="/admin/sliders/list/{{ $slider->id }}">
                                <i class="fas fa-edit"></i>
                            </a> --}}
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($slider->link))
        {!! $slider->link !!}
    @endif

    <!-- Modal update -->
    {{-- <div class="modal fade" id="exampleModalLongUpdate" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{ route('updateSlider') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Cập nhật Sliders</h5>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Cập nhật slide</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới Sliders
        </button>
    </div>

    <!-- Modal create -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{ route('storeSlider') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới Sliders</h5>
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
                                        <label>Tên slide <span style="color: red">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                            placeholder="Tên sản phẩm">
                                        @error('name')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">URL</label>
                                        <input type="text" name="url" class="form-control" placeholder="URL" value="{{ old('url') }}">
                                        @error('url')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
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
                                <label for="menu">Sắp xếp <span style="color: red">*</span></label>
                                <input type="number" name="sort_by" class="form-control" placeholder="sắp xếp"
                                    value="{{ old('sort_by') }}">
                                @error('sort_by')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                
                            <div class="form-group">
                                <label>Kích hoạt <span style="color: red">*</span></label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                                    <label for="active" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active">
                                    <label for="no_active" class="custom-control-label">Không</label>
                                </div>
                            </div>
                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Tạo slide</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="card-footer">
        <a href="{{ route('createSlider') }}" class="btn btn-primary" style="width:100px; text-align:center; height: 40px">
            <p>Thêm slide</p>
        </a>
    </div> --}}

@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('content');
    </script>
@endsection
