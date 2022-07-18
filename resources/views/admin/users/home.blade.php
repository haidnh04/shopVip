@extends('admin.users.main')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $cartsToday }}</h3>
                    <p>Đơn hàng hôm nay</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $cartsBeforeDate }}</h3>
                    <p>Đơn hàng hôm qua</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $moneyToday }}</h3>
                    <p>Số tiền trong ngày</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $moneyBeforeDate }}</h3>
                    <p>Số tiền hôm qua</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $cartsWeek }}</h3>
                    <p>Đơn hàng trong tuần</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $cartsMonth }}</h3>
                    <p>Đơn hàng trong tháng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $moneyWeek }}</h3>
                    <p>Số tiền trong tuần</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $moneyMonth }}</h3>
                    <p>Số tiền trong tháng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $cartsYear }}</h3>
                    <p>Đơn hàng trong năm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $resultAllCarts }}</h3>
                    <p>Tổng số đơn hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $moneyYear }}</h3>
                    <p>Số tiền trong năm</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $moneyAllCarts }}</h3>
                    <p>Tổng số tiền</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    {{-- todo list --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                Lịch cần làm
            </h3>
            {{-- <div class="card-tools">
                <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                </ul>
            </div> --}}
        </div>

        <div class="card-body">
            <ul class="todo-list ui-sortable" data-widget="todo-list">
                @if ($todoLists)
                    @foreach ($todoLists as $todoList)
                        <li>
                            <span class="handle ui-sortable-handle">
                                <i class="fas fa-ellipsis-v"></i>
                                <i class="fas fa-ellipsis-v"></i>
                            </span>

                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" value="" name="todo1" id="{{ $todoList->id }}">
                                <label for="{{ $todoList->id }}"></label>
                            </div>

                            <span class="text">{{ $todoList->content }}</span>
                            @if ($todoList->created_at->diffinminutes(\Carbon\Carbon::now()) < 60)
                                <small class="badge badge-danger"><i class="far fa-clock"></i>
                                    {{ $todoList->created_at->diffinMinutes(\Carbon\Carbon::now()) }} phút</small>
                            @elseif ($todoList->created_at->diffinminutes(\Carbon\Carbon::now()) > 60 &&
                                $todoList->created_at->diffinminutes(\Carbon\Carbon::now()) < 1440)
                                <small class="badge badge-info"><i class="far fa-clock"></i>
                                    {{ $todoList->created_at->diffinHours(\Carbon\Carbon::now()) }} giờ</small>
                            @else
                                <small class="badge badge-warning"><i class="far fa-clock"></i>
                                    {{ $todoList->created_at->diffinDays(\Carbon\Carbon::now()) }} ngày</small>
                            @endif
                            <div class="tools">
                                <i class="fas fa-edit-o"></i>
                                <a href="#" class="btn btn-danger btn-sm"
                                    onclick="removeRow({{ $todoList->id }}, '/admin/destroyTodoList')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div class="card-footer clearfix">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                data-target="#exampleModalLong">
                <i class="fas fa-plus"></i>Thêm mới</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <form action="{{ route('storeTodoList') }}" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới công việc</h5>
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
                                            <label for="menu">Tên công việc<span style="color: red">*</span></label>
                                            <input type="text" name="content" value="{{ old('content') }}"
                                                class="form-control" placeholder="Tên sản phẩm">
                                            @error('content')
                                                <span style="color:red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary">Tạo công việc</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
