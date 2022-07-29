@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên loại tin tức: </th>
                <th>Tên thể loại: </th>
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
            @foreach ($kindNews as $key => $kindNew)
                @php
                    //if userid changed from last iteration, store new userid and change color
                    if ($lastid !== $kindNew->id) {
                        $lastid = $kindNew->id;
                        if ($rowclass == '#f2f7f2') {
                            $rowclass = 'white';
                        } else {
                            $rowclass = '#f2f7f2';
                        }
                    }
                @endphp
                <tr style="background-color: {{ $rowclass }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kindNew->name }}</td>
                    <td>{{ $kindNew->categoryNews->name }}</td>
                    <td><input data-id="{{ $kindNew->id }}" class="toggle-class-kindNew" type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Bật" data-off="Tắt"
                            {{ $kindNew->active ? 'checked' : '' }}></td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($kindNew->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($kindNew->updated_at) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/kindnew/edit/{{ $kindNew->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        @if (!empty($kindNew->id))
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow({{ $kindNew->id }}, '/admin/kindnew/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($kindNew->link))
        {!! $kindNew->link !!}
    @endif

    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới loại tin
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('storeKindNew') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới loại tin</h5>
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
                                        <label for="menu">Tên loại tin tức <span style="color: red">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" placeholder="Tên loại tin tức">
                                        @error('name')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Danh mục <span style="color: red">*</span></label>
                                        <select name="category_id" class="form-control">
                                            {{-- Lấy ra các danh mục cha --}}
                                            {{-- <option value="0">Danh mục cha</option> --}}
                                            @foreach ($categoryNews as $categoryNew)
                                                <option value="{{ $categoryNew->id }}">{{ $categoryNew->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
                        <button type="submit" class="btn btn-primary">Tạo loại tin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="card-footer">
        <a href="{{ route('createKindNew') }}" class="btn btn-primary" style="width:140px; text-align:center; height: 40px">
            <p>Thêm loại tin</p>
        </a>
    </div> --}}
@endsection
