@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
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
            @foreach ($categoryNews as $key => $categoryNew)
                @php
                    //if userid changed from last iteration, store new userid and change color
                    if ($lastid !== $categoryNew->id) {
                        $lastid = $categoryNew->id;
                        if ($rowclass == '#f2f7f2') {
                            $rowclass = 'white';
                        } else {
                            $rowclass = '#f2f7f2';
                        }
                    }
                @endphp
                <tr style="background-color: {{ $rowclass }}">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $categoryNew->name }}</td>
                    <td><input data-id="{{ $categoryNew->id }}" class="toggle-class-categoryNew" type="checkbox"
                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Bật" data-off="Tắt"
                            {{ $categoryNew->active ? 'checked' : '' }}></td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($categoryNew->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($categoryNew->updated_at) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/categorynew/edit/{{ $categoryNew->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        @if (!empty($categoryNew->id))
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow({{ $categoryNew->id }}, '/admin/categorynew/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($categoryNew->link))
        {!! $categoryNew->link !!}
    @endif


    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới thể loại
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('storeCategoryNew') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới thể loại tin tức</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            @csrf

                            <div class="form-group">
                                <label>Tên thể loại tin tức <span style="color: red">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                    placeholder="Thể loại tin tức">
                                @error('name')
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
                        <button type="submit" class="btn btn-primary">Tạo thể loại</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div class="card-footer">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrolling-long-content">
            Thêm mới thể loại
        </button>
    </div> --}}
    {{-- <x-modal id="scrolling-long-content" title="Thêm mới thể loại">
        <x-slot name="body">
            <form action="{{route('storeCategoryNew')}}" method="POST">
                <div class="card-body">
                    @csrf
        
                    <div class="form-group">
                        <label>Tên thể loại tin tức <span style="color: red">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Thể loại tin tức">
                        @error('name')
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
        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tạo thể loại tin</button>
                            <a href="{{ route('listCategoryNew') }}" class="btn btn-primary" style="width:80px; text-align:center; height: 37px">
                                <p>Quay lại</p>
                            </a>
                        </div>
                    </div>
            </form>
        </x-slot>
    </x-modal> --}}

    {{-- <div class="card-footer">
        <a href="{{ route('createCategoryNew') }}" class="btn btn-primary" style="width:140px; text-align:center; height: 40px">
            <p>Thêm thể loại</p>
        </a>
    </div> --}}
@endsection
