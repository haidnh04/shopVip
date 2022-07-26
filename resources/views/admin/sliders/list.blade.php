@extends('admin.users.main')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.1/umd/popper.min.js"
        integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Font awesome is not required provided you change the icon options -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/solid.min.js"
        integrity="sha512-C92U8X5fKxCN7C6A/AttDsqXQiB7gxwvg/9JCxcqR6KV+F0nvMBwL4wuQc+PwCfQGfazIe7Cm5g0VaHaoZ/BOQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/fontawesome.min.js"
        integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- end FA -->

    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"></script>

    <link href="
  https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" />

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT: </th>
                <th>Tên Slider: </th>
                <th>URL: </th>
                <th>Ảnh slider: </th>
                <th>Sắp xếp: </th>
                <th>Trạng thái: </th>
                <th>Thêm mới: </th>
                <th>Cập nhật: </th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sliders as $key => $slider)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $slider->name }}</td>
                    <td>{{ $slider->url }}</td>
                    <td>
                        <a href="{{ $slider->file }}" target="_blank">
                            <img src="{{ $slider->file }}" height="50px">
                        </a>
                    </td>
                    <td>{{ $slider->sort_by }}</td>
                    {{-- <td>{!! \App\Helpers\Helper::active($slider->active) !!}</td> --}}
                    <td><input data-id="{{ $slider->id }}" class="toggle-class-slider" type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle" data-on="Có" data-off="Không"
                            {{ $slider->active ? 'checked' : '' }}></td>

                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($slider->created_at) !!}</td>
                    <td>{!! \App\Helpers\Helper::convertDatetimeUpdate($slider->updated_at) !!}</td>
                    <td>
                        @if (!empty($slider->id))
                            <a class="btn btn-primary btn-sm" href="/admin/sliders/edit/{{ $slider->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            {{-- <a class="btn btn-primary btn-sm" data-toggle="modal" data-target='#exampleModalLongUpdate' data-id="/admin/sliders/list/{{ $slider->id }}">
                                <i class="fas fa-edit"></i>
                            </a> --}}
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-sm"
                            onclick="removeRow({{ $slider->id }}, '/admin/sliders/destroy')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (!empty($slider->link))
        {!! $slider->link !!}
    @endif

    <div class="card-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            Thêm mới Sliders
        </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong1">
            PopUp datetime
        </button>
    </div>

    <!-- Modal dạng popup -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="{{ route('storeSlider') }}" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới Sliders</h5>
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
                                        <label>Tên slide <span style="color: red">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" placeholder="Tên sản phẩm">
                                        @error('name')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="menu">URL</label>
                                        <input type="text" name="url" class="form-control" placeholder="URL"
                                            value="{{ old('url') }}">
                                        @error('url')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="menu">Ảnh sản phẩm <span style="color: red">*</span></label>
                                <input type="file" name="file" class="form-control" id="upload">
                                <div id="image_show">

                                </div>
                                <input type="hidden" name="file" id="file">
                                @error('file')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="menu">Sắp xếp <span style="color: red">*</span></label>
                                <input type="number" name="sort_by" class="form-control" placeholder="sắp xếp"
                                    value="{{ old('sort_by') }}">
                                @error('sort_by')
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
                        <button type="submit" class="btn btn-primary">Tạo slide</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal dạng popup export file -->
    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class='row'>
                        <div class='col-sm-6'>
                            <label for='linkedPickers1Input' class='form-label'>Từ ngày</label>
                            <div class='input-group log-event' id='linkedPickers1' data-td-target-input='nearest'
                                data-td-target-toggle='nearest'>
                                <input id='linkedPickers1Input' type='text' class='form-control'
                                    data-td-target='#linkedPickers1' />
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
                                    data-td-target='#linkedPickers2' />
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
                    <button type="submit" class="btn btn-primary">Tạo slide</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        const linkedPicker1Element = document.getElementById('linkedPickers1');
        const linked1 = new tempusDominus.TempusDominus(linkedPicker1Element);
        linked1.dates.formatInput = function(date) {
            {
                return moment(date).format('DD-MM-YYYY')
            }
        }
        const linked2 = new tempusDominus.TempusDominus(document.getElementById('linkedPickers2'), {
            useCurrent: true
        });
        linked2.dates.formatInput = function(date) {
            {
                return moment(date).format('DD-MM-YYYY')
            }
        }

        //using event listeners
        linkedPicker1Element.addEventListener(tempusDominus.Namespace.events.change, (e) => {
            linked2.updateOptions({
                restrictions: {
                    minDate: e.detail.date
                }
            });
        });

        //using subscribe method
        const subscription = linked2.subscribe(tempusDominus.Namespace.events.change, (e) => {
            linked1.updateOptions({
                restrictions: {
                    maxDate: e.date
                }
            });
        });


        // event listener can be unsubscribed to:
        // subscription.unsubscribe();
    </script>
@endsection
