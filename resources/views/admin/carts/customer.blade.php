@extends('admin.users.main')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Tên Khách Hàng</th>
                <th>Số Điện Thoại</th>
                <th>Email</th>
                <th>Ngày Đặt hàng</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @php
                $lastid = null;
                $rowclass = 'grey';
            @endphp
            @foreach ($customers as $key => $customer)
                @php
                    //if userid changed from last iteration, store new userid and change color
                    if ($lastid !== $customer->id) {
                        $lastid = $customer->id;
                        if ($rowclass == '#f2f7f2') {
                            $rowclass = 'white';
                        } else {
                            $rowclass = '#f2f7f2';
                        }
                    }
                @endphp
                <tr style="background-color: {{ $rowclass }}">
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($customer->created_at) !!}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                            <i class="fas fa-eye"></i>
                        </a>
                        {{-- @if (!empty($customer->id))
                            <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow({{ $customer->id }}, '/admin/customers/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        @if (!empty($customers->links))
            {!! $customers->links() !!}
        @endif

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
            Khung xuất Excel
        </button>
    </div>

    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{ route('exportCart') }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class='row'>
                            <div class='col-sm-6'>
                                <label for='linkedPickers1Input' class='form-label'>Từ ngày</label>
                                <div class='input-group log-event' id='linkedPickers1' data-td-target-input='nearest'
                                    data-td-target-toggle='nearest'>
                                    <input id='linkedPickers1Input' type='text' class='form-control'
                                        data-td-target='#linkedPickers1' name="start" />
                                    <span class='input-group-text' data-td-target='#linkedPickers1'
                                        data-td-toggle='datetimepicker'>
                                        <span class='fa-solid fa-calendar'></span>
                                    </span>
                                </div>
                            </div>
                            <div class='col-sm-6'>
                                <label for='linkedPickers2Input' class='form-label'>Đến ngày</label>
                                <div class='input-group log-event' id='linkedPickers2' data-td-target-input='nearest'
                                    data-td-target-toggle='nearest'>
                                    <input id='linkedPickers2Input' type='text' class='form-control'
                                        data-td-target='#linkedPickers2' name="end" />
                                    <span class='input-group-text' data-td-target='#linkedPickers2'
                                        data-td-toggle='datetimepicker'>
                                        <span class='fa-solid fa-calendar'></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xuất Excel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
