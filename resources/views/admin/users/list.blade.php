@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên: </th>
                <th>Email: </th>
                <th>Vai trò: </th>
                <th>Trạng thái: </th>
                <th>Thêm mới: </th>
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><input data-id="{{ $user->id }}" class="toggle-class-user-role" type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="QTV" data-off="NV"
                            {{ $user->role ? 'checked' : '' }}></td>
                    <td><input data-id="{{ $user->id }}" class="toggle-class-user" type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Có" data-off="Không"
                            {{ $user->status ? 'checked' : '' }}></td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($user->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($user->updated_at) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        @if (!empty($user->id))
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow({{ $user->id }}, '/admin/users/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (!empty($user->link))
        {!! $user->link !!}
    @endif

    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới thành viên
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form action="{{ route('storeUser') }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới thành viên</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <label for="menu">Tên thành viên <span style="color: red">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                        placeholder="Tên thành viên">
                                    @error('name')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="menu">Email <span style="color: red">*</span></label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control"
                                        placeholder="Email">
                                    @error('email')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="menu">Mật khẩu <span style="color: red">*</span></label>
                                    <input type="password" name="password" value="" class="form-control"
                                        placeholder="Mật khẩu">
                                    @error('password')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="menu">Xác nhận mật khẩu <span style="color: red">*</span></label>
                                    <input type="password" name="password_confirmation" value="" class="form-control"
                                        placeholder="Xác nhận mật khẩu">
                                    @error('password')
                                        <span style="color:red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <fieldset id="group1">
                                        <label>Vai trò <span style="color: red">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio" id="active"
                                                name="role" checked="">
                                            <label for="active" class="custom-control-label">Admin</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio"
                                                id="no_active" name="role">
                                            <label for="no_active" class="custom-control-label">Nhân viên</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="form-group">
                                    <fieldset id="group2">
                                        <label>Kích hoạt <span style="color: red">*</span></label>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="1" type="radio"
                                                id="active1" name="status" checked="">
                                            <label for="active1" class="custom-control-label">Có</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" value="0" type="radio"
                                                id="no_active1" name="status">
                                            <label for="no_active1" class="custom-control-label">Không</label>
                                        </div>
                                    </fieldset>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Tạo thành viên</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- <a href="{{ route('createUser') }}" class="btn btn-primary" style="width:140px; text-align:center; height: 40px">
            <p>Thêm thành viên</p>
        </a> --}}
        <a href="{{ route('exportUser') }}" class="btn btn-primary"
            style="width:140px; text-align:center; height: 38px">
            <span><i class="fas fa-solid fa-download"></i></span> <span>Xuất Excel</span>
        </a>
        </a>
    </div>
    <!-- date-range-picker -->
@endsection
