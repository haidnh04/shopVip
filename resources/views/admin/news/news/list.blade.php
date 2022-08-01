@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tiêu đề: </th>
                <th>Ảnh: </th>
                <th>Thể loại: </th>
                <th>Loại tin: </th>
                <th>Nổi bật: </th>
                <th>Lượt xem: </th>
                <th>Trạng thái: </th>
                <th>Thêm mới: </th>
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @php
                $lastid = null;
                $rowclass = 'grey';
            @endphp
            @foreach ($news as $key => $new)
                @php
                    //if userid changed from last iteration, store new userid and change color
                    if ($lastid !== $new->id) {
                        $lastid = $new->id;
                        if ($rowclass == '#f2f7f2') {
                            $rowclass = 'white';
                        } else {
                            $rowclass = '#f2f7f2';
                        }
                    }
                @endphp
                <tr style="background-color: {{ $rowclass }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $new->name }}</td>
                    <td>
                        <a href="{{ $new->file }}" target="_blank">
                            <img src="{{ $new->file }}" height="50px">
                        </a>
                    </td>
                    <td>{{ $new->kindNews->categoryNews->name }}</td>
                    <td>{{ $new->kindNews->name }}</td>
                    <td><input data-id="{{ $new->id }}" class="toggle-class-news" type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Có" data-off="Không"
                            {{ $new->hightlight ? 'checked' : '' }}></td>
                    <td>{{ $new->view }}</td>
                    <td><input data-id="{{ $new->id }}" class="toggle-class-news" type="checkbox"
                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Bật" data-off="Tắt"
                            {{ $new->active ? 'checked' : '' }}></td>

                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($new->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($new->updated_at) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/new/edit/{{ $new->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        @if (!empty($new->id))
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow({{ $new->id }}, '/admin/new/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($new->link))
        {!! $new->link !!}
    @endif


    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới tin tức
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{ route('storeNew') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới tin tức</h5>
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
                                        <label>Thể loại <span style="color: red">*</span></label>
                                        <select name="category_id" class="form-control" id="category">
                                            {{-- Lấy ra các danh mục cha --}}
                                            {{-- <option value="0">Danh mục cha</option> --}}
                                            @foreach ($categoryNews as $categoryNew)
                                                <option value="{{ $categoryNew->id }}">{{ $categoryNew->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại tin <span style="color: red">*</span></label>
                                        <select name="kind_id" class="form-control" id="kind">
                                            {{-- Lấy ra các danh mục cha --}}
                                            {{-- <option value="0">Danh mục cha</option> --}}
                                            {{-- @foreach ($kindNews as $kindNew)
                                            <option value="{{ $kindNew->id }}">{{ $kindNew->name }}</option>
                                        @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="menu">Tiêu đề <span style="color: red">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="Tiêu đề tin tức">
                                @error('name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea name="summary" class="form-control" id="sumary">{{ old('summary') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Chi tiết bài viết</label>
                                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="menu">Ảnh tin tức <span style="color: red">*</span></label>
                                <input type="file" name="file" class="form-control" id="upload">
                                <div id="image_show">

                                </div>
                                <input type="hidden" name="file" id="file">
                                @error('file')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Nổi bật <span style="color: red">*</span></label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="1" type="radio" id="active1"
                                        name="hightlight" checked="">
                                    <label for="active1" class="custom-control-label">Có</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" value="0" type="radio" id="no_active1"
                                        name="hightlight">
                                    <label for="no_active1" class="custom-control-label">Không</label>
                                </div>
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
                        <button type="submit" class="btn btn-primary">Tạo tin tức</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        var editor = CKEDITOR.replace('content', {
            filebrowserUploadUrl: '{{ route('ck.upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form',
        });
        var editor = CKEDITOR.replace('sumary', {
            filebrowserUploadUrl: '{{ route('ck.upload', ['_token' => csrf_token()]) }}',
            filebrowserUploadMethod: 'form',
        });
    </script>
@endsection

@section('script11')
    <script>
        // $(document).ready(function() {
        //     $("#category").change(function() {
        //         var category_id = $(this).val();
        //         $.get("/admin/ajax/kind/" + category_id, function(data) {
        //             //alert(data);
        //             $("#kind").html(data);
        //         });
        //     });
        // });

        $(document).ready(function() {
            var category_id = $('#category').val();
            $.get("/admin/ajax/kind/" + category_id, function(data) {
                $("#kind").html(data);
            });

            $("#category").change(function() {
                var category_id = $(this).val();
                $.get("/admin/ajax/kind/" + category_id, function(data) {
                    $("#kind").html(data);
                });
            });
        });
    </script>
@endsection
