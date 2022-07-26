{{-- Lưu các file css trong thư mục public\template\admin --}}

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ $title }}</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet" />
<link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- vue css --}}
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<!-- Toastr -->
<link rel="stylesheet" href="/template/admin/plugins/toastr/toastr.min.css">
<style>
    /* toastr */
    #toast-container>.toast {
        background-image: none !important;
    }

    #toast-container>.toast:before {
        position: fixed;
        font-family: FontAwesome;
        font-size: 24px;
        line-height: 18px;
        float: left;
        color: #FFF;
        padding-right: 0.5em;
        margin: auto 0.5em auto -1.5em;
    }

    #toast-container>.toast-warning:before {
        content: "\f003";
    }

    #toast-container>.toast-error:before {
        content: "\f001";
    }

    #toast-container>.toast-info:before {
        content: "\f005";
    }

    #toast-container>.toast-success:before {
        content: "\f002";
    }
</style>

{{-- Bootstrap toogle --}}
<link rel="stylesheet" href="/template/admin/plugins/bootstrap-toggle/bootstrap-toggle.min.css">
<style>
    /*!
                                                     * Bootstrap v3.3.7 (http://getbootstrap.com)
                                                     * Copyright 2011-2016 Twitter, Inc.
                                                     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
                                                     */
    /*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */
    .btn-default {
        color: #333;
        background-color: #fff;
        border-color: #ccc
    }

    .btn-default.focus,
    .btn-default:focus {
        color: #333;
        background-color: #e6e6e6;
        border-color: #8c8c8c
    }

    .btn-default:hover {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad
    }

    .btn-default.active,
    .btn-default:active,
    .open>.dropdown-toggle.btn-default {
        color: #333;
        background-color: #e6e6e6;
        border-color: #adadad
    }

    .btn-default.active.focus,
    .btn-default.active:focus,
    .btn-default.active:hover,
    .btn-default:active.focus,
    .btn-default:active:focus,
    .btn-default:active:hover,
    .open>.dropdown-toggle.btn-default.focus,
    .open>.dropdown-toggle.btn-default:focus,
    .open>.dropdown-toggle.btn-default:hover {
        color: #333;
        background-color: #d4d4d4;
        border-color: #8c8c8c
    }

    .btn-default.active,
    .btn-default:active,
    .open>.dropdown-toggle.btn-default {
        background-image: none
    }

    .btn-default.disabled.focus,
    .btn-default.disabled:focus,
    .btn-default.disabled:hover,
    .btn-default[disabled].focus,
    .btn-default[disabled]:focus,
    .btn-default[disabled]:hover,
    fieldset[disabled] .btn-default.focus,
    fieldset[disabled] .btn-default:focus,
    fieldset[disabled] .btn-default:hover {
        background-color: #fff;
        border-color: #ccc
    }

    .btn-default .badge {
        color: #fff;
        background-color: #333
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c
    }

    .btn-success.focus,
    .btn-success:focus {
        color: #fff;
        background-color: #449d44;
        border-color: #255625
    }

    .btn-success:hover {
        color: #fff;
        background-color: #449d44;
        border-color: #398439
    }

    .btn-success.active,
    .btn-success:active,
    .open>.dropdown-toggle.btn-success {
        color: #fff;
        background-color: #449d44;
        border-color: #398439
    }

    .btn-success.active.focus,
    .btn-success.active:focus,
    .btn-success.active:hover,
    .btn-success:active.focus,
    .btn-success:active:focus,
    .btn-success:active:hover,
    .open>.dropdown-toggle.btn-success.focus,
    .open>.dropdown-toggle.btn-success:focus,
    .open>.dropdown-toggle.btn-success:hover {
        color: #fff;
        background-color: #398439;
        border-color: #255625
    }

    .btn-success.active,
    .btn-success:active,
    .open>.dropdown-toggle.btn-success {
        background-image: none
    }

    .btn-success.disabled.focus,
    .btn-success.disabled:focus,
    .btn-success.disabled:hover,
    .btn-success[disabled].focus,
    .btn-success[disabled]:focus,
    .btn-success[disabled]:hover,
    fieldset[disabled] .btn-success.focus,
    fieldset[disabled] .btn-success:focus,
    fieldset[disabled] .btn-success:hover {
        background-color: #5cb85c;
        border-color: #4cae4c
    }

    .btn-success .badge {
        color: #5cb85c;
        background-color: #fff
    }
</style>

@yield('head')
