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

                    <li href="#" class="list-group-item menu1">
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


                    <li href="#" class="list-group-item menu1">
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


                    <li href="#" class="list-group-item menu1">
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
                        <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                    </div>

                    <div class="panel-body">
                        <!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>

                        <div class="break"></div>
                        <h4><span class="glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Khương Đình - Thanh Xuân - Hà Nội</p>

                        <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                        <p>abc@gmail.com </p>

                        <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                        <p>09080000000 </p>



                        <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14900.426523991473!2d105.8115899211649!3d20.988362360457884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8cdf11145b%3A0x2f7150555d1086b4!2zS2jGsMahbmcgxJDDrG5oLCBUaGFuaCBYdcOibiwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1646708918254!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

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
