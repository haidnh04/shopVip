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

<!-- Toastr modal (popup)-->
<script src="/template/admin/plugins/toastr/toastr.min.js"></script>
<script>
    function removeRow(id, url) {
        if (confirm('Xóa mà không thể khôi phục lại')) {
            $.ajax({
                type: 'delete',
                datatype: 'JSON',
                data: {
                    id
                },
                url: url,
                success: function(result) {
                    if (result.error == false) {
                        delayToasts();
                    } else {
                        alert('Xóa lỗi vui lòng thử lại');
                    }
                }
            })
        }
    }

    function Toast(type, css, msg) {
        this.type = type;
        this.css = css;
        this.msg = 'Xóa thành công';
    }

    var toasts = [
        new Toast('success', 'toast-top-right', 'top right'),
        // new Toast('error', 'toast-bottom-full-width',
        //     'This is positioned in the bottom full width. You can also style the icon any way you like.'
        // ),
        // new Toast('info', 'toast-top-full-width', 'top full width'),
        // new Toast('warning', 'toast-top-left',
        //     'This is positioned in the top left. You can also style the icon any way you like.'),
        // new Toast('warning', 'toast-bottom-right', 'bottom right'),
        // new Toast('error', 'toast-bottom-left', 'bottom left')
    ];

    toastr.options.positionClass = 'toast-top-full-width';
    toastr.options.extendedTimeOut = 1000; //1000;
    toastr.options.timeOut = 2000;
    toastr.options.fadeOut = 250;
    toastr.options.fadeIn = 250;

    var i = 0;

    function delayToasts() {
        if (i === toasts.length) {
            return;
        }
        var delay = i === 0 ? 0 : 2100;
        window.setTimeout(function() {
            showToast();
        }, delay);

        // re-enable the button        
        if (i === toasts.length - 1) {
            window.setTimeout(function() {
                $('#tryMe').prop('disabled', false);
                i = 0;
            }, delay + 1000);
        }
        location.reload();
    }

    function showToast() {
        var t = toasts[i];
        toastr.options.positionClass = t.css;
        toastr[t.type](t.msg);
        i++;
        delayToasts();
    }
</script>

{{-- Bootstrap toogle (button slide) --}}
<script src="/template/admin/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script>
{{-- nút button slider nằm ở template/admin/js/main.js --}}

{{-- Datetimepicker --}}
<script src="//momentjs.com/downloads/moment.min.js"></script>
<script src="/template/admin/plugins/dateTimePicker/popper.min.js"
    integrity="sha512-8jeQKzUKh/0pqnK24AfqZYxlQ8JdQjl9gGONwGwKbJiEaAPkD3eoIjz3IuX4IrP+dnxkchGUeWdXLazLHin+UQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/template/admin/plugins/dateTimePicker/solid.min.js"
    integrity="sha512-C92U8X5fKxCN7C6A/AttDsqXQiB7gxwvg/9JCxcqR6KV+F0nvMBwL4wuQc+PwCfQGfazIe7Cm5g0VaHaoZ/BOQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="/template/admin/plugins/dateTimePicker/fontawesome.min.js"
    integrity="sha512-5qbIAL4qJ/FSsWfIq5Pd0qbqoZpk5NcUVeAAREV2Li4EKzyJDEGlADHhHOSSCw0tHP7z3Q4hNHJXa81P92borQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/template/admin/plugins/dateTimePicker/tempus-dominus.js"></script>
<script>
    const linkedPicker1Element = document.getElementById('linkedPickers1');
    const linked1 = new tempusDominus.TempusDominus(linkedPicker1Element, {});
    linked1.dates.formatInput = function(date) {
        {
            return moment(date).format('YYYY-MM-DD')
        }
    }
    const linked2 = new tempusDominus.TempusDominus(document.getElementById('linkedPickers2'), {
        useCurrent: true
    });
    linked2.dates.formatInput = function(date) {
        {
            return moment(date).format('YYYY-MM-DD')
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
</script>

@yield('footer')
