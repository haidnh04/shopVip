@extends('main')

@section('content')
    {{-- @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp --}}
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

    <div class="container">

        <div class="space20"></div>


        <div class="row main-left">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    {{-- {!! $menusHtml !!} --}}
                    {{-- <li href="#" class="list-group-item MenuUsers active">
                        Menu
                    </li>

                    <li href="#" class="list-group-item MenuUsers">
                        Level 1
                    </li>
                    <ul style="display: none;">
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
                    <ul style="display: none;">
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

                    <ul style="display: none;">
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
                    <ul style="display: none;">
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
                    </li> --}}
                </ul>
            </div>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <p>
                            Lorem ipLorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
                            ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
                            ipsum dolor sit amet, consectetur adipisicing elit.sum dolor sit amet, consectetur adipisicing
                            elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
                            ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet,
                            consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem
                            ipsum dolor sit amet, consectetur adipisicing elit.


                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- jQuery -->
    <script src="/template/tintuc/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    {{-- <script src="/template/tintuc/js/bootstrap.min.js"></script> --}}
    <script src="/template/tintuc/js/my.js"></script>
@endsection
