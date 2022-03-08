@extends('main1')

@section('content')
    {{-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""> --}}
    <!-- Bootstrap Core CSS -->
    <link href="/template/tintuc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link href="/template/tintuc/css/shop-homepage.css" rel="stylesheet"> --}}
    <link href="/template/tintuc/css/my.css" rel="stylesheet">


    <!-- Page Content -->
    <div class="container">

        <div class="space20"></div>


        <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>

                    <li href="#" class="list-group-item menu1">
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

                    <li href="#" class="list-group-item menu1">
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


                    <li href="#" class="list-group-item menu1">
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


                    <li href="#" class="list-group-item menu1">
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

                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>
                    <li href="#" class="list-group-item menu1">
                        <a href="#">Level 1</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h2 style="margin-top:0px; margin-bottom:0px;">Tin Tức</h2>
                    </div>

                    <div class="panel-body">
                        @foreach ($categoryNews as $categoryNew)
                            @if (count($categoryNew->kindNews) > 0)
                                <div class="row-item row">
                                    <h3>
                                        <a href="category.html">{{ $categoryNew->name }}</a> |
                                        @foreach ($categoryNew->kindNews as $kindNew)
                                            <small><a
                                                    href="kindnews/{{ $kindNew->id }}"><i>{{ $kindNew->name }}</i></a>/</small>
                                        @endforeach
                                    </h3>

                                    <?php $data = $categoryNew->news
                                        ->where('hightlight')
                                        ->sortByDesc('created_at')
                                        ->take(5);
                                    $tin1 = $data->shift(); ?>

                                    @if (isset($tin1))
                                        <div class="col-md-8 border-right">
                                            <div class="col-md-5">
                                                <a href="/news/{{ $tin1['id'] }}">

                                                    <img class="img-responsive" src="{{ $tin1['file'] }}" alt="">

                                                </a>
                                            </div>

                                            <div class="col-md-7">

                                                <h3>{{ $tin1['name'] }}</h3>
                                                <p>{!! $tin1['summary'] !!}</p>
                                                <a class="btn btn-primary" href="/news/{{ $tin1['id'] }}">Chi tiết <span
                                                        class="glyphicon glyphicon-chevron-right"></span></a>
                                            </div>

                                        </div>


                                        <div class="col-md-4">
                                            @foreach ($data->all() as $new)
                                                <a href="/news/{{ $new['id'] }}">
                                                    <h4>
                                                        <span class="glyphicon glyphicon-list-alt"></span>
                                                        {{ $new->name }}
                                                    </h4>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="break"></div>
                                </div>
                            @endif
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- jQuery -->
    <script src="/template/tintuc/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    {{-- <script src="/template/tintuc/js/bootstrap.min.js"></script> --}}
    <script src="/template/tintuc/js/my.js"></script>
@endsection
