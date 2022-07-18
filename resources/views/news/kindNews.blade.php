@extends('main')

@section('content')
    <link href="/template/tintuc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link href="/template/tintuc/css/shop-homepage.css" rel="stylesheet"> --}}
    <link href="/template/tintuc/css/my.css" rel="stylesheet">

    <div class="container">
        <div class="space20"></div>
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item MenuUsers active">
                        Menu
                    </li>

                    <li href="#" class="list-group-item MenuUsers">
                        Level 1
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                    </ul>

                    <li href="#" class="list-group-item MenuUsers">
                        <a href="#">Level 1</a>
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                    </ul>


                    <li href="#" class="list-group-item MenuUsers">
                        <a href="#">Level 1</a>
                    </li>

                    <ul>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                    </ul>


                    <li href="#" class="list-group-item MenuUsers">
                        <a href="#">Level 1</a>
                    </li>
                    <ul>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#">Level2</a>
                        </li>
                    </ul>

                    <li href="#" class="list-group-item MenuUsers">
                        <a href="#">Level 1</a>
                    </li>
                    <li href="#" class="list-group-item MenuUsers">
                        <a href="#">Level 1</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        @if (!empty($kindNews->name))
                            <h4><b>{{ $kindNews->name }}</b></h4>
                        @endif
                    </div>
                    @if (!empty($news))
                        @foreach ($news as $new)
                            <div class="row-item row">
                                <div class="col-md-3">

                                    <a href="/news/{{ $new->id }}">
                                        <br>
                                        <img width="200px" class="img-responsive" src="{{ $new->file }}" alt="">
                                    </a>
                                </div>

                                <div class="col-md-9">
                                    <h3>{{ $new->name }}</h3>
                                    <p>{!! $new->summary !!}</p>
                                    <a class="btn btn-primary" href="/news/{{ $new->id }}">Chi tiết<span
                                            class="glyphicon glyphicon-chevron-right"></span></a>
                                </div>
                                <div class="break"></div>
                            </div>
                        @endforeach
                    @endif
                    @if (!empty($new->link))
                        {!! $new->link !!}
                    @endif

                </div>
            </div>

        </div>

    </div>
    <script src="/template/tintuc/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    {{-- <script src="/template/tintuc/js/bootstrap.min.js"></script> --}}
    <script src="/template/tintuc/js/my.js"></script>
@endsection
