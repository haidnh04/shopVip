@extends('main')

@section('content')
    <link href="/template/tintuc/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    {{-- <link href="/template/tintuc/css/shop-homepage.css" rel="stylesheet"> --}}
    <link href="/template/tintuc/css/my.css" rel="stylesheet">

    <div class="container">
        <div class="space20"></div>

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $news->name }}</h1>

                <!-- Author -->
                {{-- <p class="lead">
                    by <a href="#">Start Bootstrap</a>
                </p> --}}

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ $news->file }}" alt="" width="100%">
                <br />
                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Ngày đăng: {{ $news->created_at }}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">{!! $news->content !!}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    {{-- <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4> --}}
                    <form role="form" action="/comment/{{ $news->id }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên: </label>
                            <input type="text" name="name" />
                            <label>Nội dug bình luận: </label>
                            <textarea class="form-control" rows="3" name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                @foreach ($news->comment as $cm)
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="{{ $cm->file }}" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Người đăng: {{ $cm->name }}
                                <small>{{ $cm->created_at }}</small>
                            </h4>
                            {!! $cm->content !!}
                        </div>
                    </div>
                @endforeach
                <br>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        @foreach ($highlightNews as $hn)
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="/news/{{ $hn->id }}">
                                        <img class="img-responsive" src="{{ $hn->file }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="/news/{{ $hn->id }}"><b>{{ $hn->name }}</b></a>
                                </div>
                                <span style="padding: 15px;">{!! $hn->summary !!}</span>
                                <div class="break"></div>
                            </div>
                            <!-- end item -->
                        @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                        @foreach ($moreNews as $mn)
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="/news/{{ $hn->id }}">
                                        <img class="img-responsive" src="{{ $mn->file }}" alt="">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="/news/{{ $hn->id }}">
                                        <b>{{ $mn->name }}</b>
                                    </a>
                                </div>
                                <span style="padding: 15px;">{!! $mn->summary !!}</span>
                                <div class="break"></div>
                            </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <script src="/template/tintuc/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    {{-- <script src="/template/tintuc/js/bootstrap.min.js"></script> --}}
    <script src="/template/tintuc/js/my.js"></script>
@endsection
