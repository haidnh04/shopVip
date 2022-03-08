@extends('admin.users.main')

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
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($new1s as $key => $new1)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $new1->name }}</td>
                    <td>
                        <a href="{{ $new1->file }}" target="_blank">
                            <img src="{{ $new1->file }}" height="50px">
                        </a>
                    </td>
                    <td>{{ $new1->kindNews->categoryNews->name }}</td>
                    <td>{{ $new1->kindNews->name }}</td>
                    <td>{!! \App\Helpers\Helper::active($new1->hightlight) !!}</td>
                    <td>{{ $new1->view }}</td>
                    <td>{!! \App\Helpers\Helper::active($new1->active) !!}</td>
                    <td>{{ $new1->created_at }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/new/edit/{{ $new1->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $new1->id }}, '/admin/new/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $new1->link !!}
@endsection
