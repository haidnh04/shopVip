@extends('admin.users.main')
@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection
@section('content')
    <div class="container" id="app">
        <khachhang-edit scope="{{ $scope }}" :id="{{ $id ?? 0 }}">

        </khachhang-edit>
    </div>
@endsection
