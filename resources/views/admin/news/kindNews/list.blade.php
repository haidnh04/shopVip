@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên loại tin tức: </th>
                <th>Tên thể loại: </th>
                <th>Trạng thái: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kindNews as $key => $kindNew)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kindNew->name }}</td>
                    <td>{{ $kindNew->categoryNews->name }}</td>
                    <td>{!! \App\Helpers\Helper::active($kindNew->active) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/kindnew/edit/{{ $kindNew->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $kindNew->id }}, '/admin/kindnew/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $kindNew->link !!}
@endsection
