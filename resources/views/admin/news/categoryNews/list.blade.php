@extends('admin.users.main')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên thể loại: </th>
                <th>Trạng thái: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categoryNews as $key => $categoryNew)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $categoryNew->name }}</td>
                    <td>{!! \App\Helpers\Helper::active($categoryNew->active) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/categorynew/edit/{{ $categoryNew->id }}">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $categoryNew->id }}, '/admin/categorynew/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $categoryNew->link !!}
@endsection
