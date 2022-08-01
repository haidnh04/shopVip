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
                        <label>Thể loại <span style="color: red">*</span></label>
                        <select name="category_id" class="form-control" id="category">
                            {{-- Lấy ra các danh mục cha --}}
                            {{-- <option value="0">Danh mục cha</option> --}}
                            @foreach ($categoryNews as $categoryNew)
                                <option @if ($new->kindNews->categoryNews->id == $categoryNew->id) {{ 'selected' }} @endif
                                    value="{{ $categoryNew->id }}">
                                    {{ $categoryNew->name }}
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
                <input type="text" name="name" value="{{ $new->name }}" class="form-control"
                    placeholder="Tiêu đề tin tức">
                @error('name')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Tóm tắt</label>
                <textarea name="summary" class="form-control" id="sumary">{{ $new->summary }}</textarea>
            </div>

            <div class="form-group">
                <label>Chi tiết bài viết</label>
                <textarea name="content" id="content" class="form-control">{{ $new->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh tin tức <span style="color: red">*</span></label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $new->file }}" target="_blank">
                        <img src="{{ $new->file }}" width="200px">
                    </a>
                </div>
                <input type="hidden" name="file" id="file" value="{{ $new->file }}">
                @error('file')
                    <span style="color:red;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Nổi bật <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active1" name="hightlight"
                        {{ $new->hightlight == 1 ? 'checked=""' : '' }}>
                    <label for="active1" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active1" name="hightlight"
                        {{ $new->hightlight == 0 ? 'checked=""' : '' }}>
                    <label for="no_active1" class="custom-control-label">Không</label>
                </div>
            </div>

            <div class="form-group">
                <label>Kích hoạt <span style="color: red">*</span></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $new->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $new->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo tin tức</button>
            <a href="{{ route('listNew') }}" class="btn btn-primary" style="width:80px; text-align:center; height: 37px">
                <p>Quay lại</p>
            </a>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên người comment</th>
                <th>Nội dung: </th>
                <th>Trạng thái: </th>
                <th>ngày đăng: </th>
                {{-- <th>&nbsp;</th> --}}
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($new->comment as $key => $cm)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $cm->name }}</td>
                    <td>{{ $cm->content }}</td>
                    <td>{!! \App\Helpers\Helper::active($cm->active) !!}</td>
                    <td>{{ $cm->created_at }}</td>
                    {{-- <td>
                        <a class="btn btn-primary btn-sm" href="/admin/new/edit/{{ $cm->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td> --}}
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $cm->id }}/{{ $news->id }}, '/admin/new/destroy1')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
                $("#kind").val('{{ $new->kindNews->id }}');
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
