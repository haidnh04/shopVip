{{-- Lưu các file css trong thư mục public\template\admin --}}

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }}</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- vue css --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

{{-- date time picker --}}
{{-- <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/daterangepicker/daterangepicker.css" >
<link rel="stylesheet" href="/template/admin/plugins/daterangepicker/daterangepicker.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet"/> --}}

{{-- Bootstrap --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: white;
    }

    .dropdown-menu {
        top: 60px;
        right: 0px;
        left: unset;
        width: 460px;
        box-shadow: 0px 5px 7px -1px #c1c1c1;
        padding-bottom: 0px;
        padding: 0px;
    }

    .dropdown-menu:before {
        content: "";
        position: absolute;
        top: -20px;
        right: 12px;
        border: 10px solid #343A40;
        border-color: transparent transparent #343A40 transparent;
    }

    .head {
        padding: 5px 15px;
        border-radius: 3px 3px 0px 0px;
    }

    .footer {
        padding: 5px 15px;
        border-radius: 0px 0px 3px 3px;
    }

    .notification-box {
        padding: 10px 0px;
    }

    .bg-gray {
        background-color: #eee;
    }

    @media (max-width: 640px) {
        .dropdown-menu {
            top: 50px;
            left: -16px;
            width: 290px;
        }

        .nav {
            display: block;
        }

        .nav .nav-item,
        .nav .nav-item a {
            padding-left: 0px;
        }

        .message {
            font-size: 13px;
        }
    }
</style> --}}
@yield('head')
