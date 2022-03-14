@extends('admin.users.main')

@section('content')
    {{-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên: </th>
                <th>Email: </th>
                <th>Vai trò: </th>
                <th>Trạng thái: </th>
                <th>Ngày tạo: </th>
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
                    <td>{!! \App\Helpers\Helper::active($user->role) !!}</td>
                    <td>{!! \App\Helpers\Helper::active($user->status) !!}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->update_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/users/edit/{{ $user->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $user->id }}, '/admin/users/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {!! $user->link !!} --}}
    <div class="container" id="app">
        <users-component />
    </div>
@endsection
