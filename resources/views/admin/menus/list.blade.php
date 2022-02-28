@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID: </th>
                <th>Tên danh mục: </th>
                <th>Trạng thái: </th>
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>
@endsection

