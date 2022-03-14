{{-- Lưu các file js trong thư mục public\template\admin --}}
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>

<script src="/template/admin/js/main.js"></script>

{{-- Vue js --}}
<script src="{{ asset('js/app.js') }}" defer></script>


@yield('footer')
