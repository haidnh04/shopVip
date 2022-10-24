$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// function removeRow(id, url) {
//     if (confirm('Xóa mà không thể khôi phục lại')) {
//         $.ajax({
//             type: 'delete',
//             datatype: 'JSON',
//             data: { id },
//             url: url,
//             success: function (result) {
//                 if (result.error == false) {
//                     alert(result.message);
//                     location.reload();
//                 } else {
//                     alert('Xóa lỗi vui lòng thử lại');
//                 }
//             }
//         })
//     }
// }

//updaload img menu (category)
$('#upload10').change(function () {
    const form = new FormData();
    form.append('img', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error == false) {
                $('#image_show10').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="200px"></a>');

                $('#img').val(results.url);
            } else {
                alert('Upload file lỗi');
            }
        }
    });
});

//updaload img
$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error == false) {
                $('#image_show').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="200px"></a>');

                $('#file').val(results.url);
            } else {
                alert('Upload file lỗi');
            }
        }
    });
});


//updaload img more 1
$('#upload1').change(function () {
    const form = new FormData();
    form.append('file_num2', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error == false) {
                $('#image_show1').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="200px"></a>');

                $('#file_num2').val(results.url);
            } else {
                alert('Upload file_num2 lỗi');
            }
        }
    });
});


//updaload img more 2
$('#upload2').change(function () {
    const form = new FormData();
    form.append('file_num3', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error == false) {
                $('#image_show2').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="200px"></a>');

                $('#file_num3').val(results.url);
            } else {
                alert('Upload file_num2 lỗi');
            }
        }
    });
});


//updaload img more 3
$('#upload3').change(function () {
    const form = new FormData();
    form.append('file_num4', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results) {
            if (results.error == false) {
                $('#image_show3').html('<a href="' + results.url + '" target="_blank">' +
                    '<img src="' + results.url + '" width="200px"></a>');

                $('#file_num4').val(results.url);
            } else {
                alert('Upload file_num2 lỗi');
            }
        }
    });
});


//active slide
$(function() {
    $('.toggle-class-slider').change(function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var slider_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/sliders/changeActive',
            data: {
                'active': active,
                'slider_id': slider_id
            },
            success: function(data) {
                console.log(data.success)
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                
            }
        });
    })
})

//active products
$(function() {
    $('.toggle-class-product').change(function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var product_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/products/changeActive',
            data: {
                'active': active,
                'product_id': product_id
            },
            success: function(data) {
                console.log(data.success)
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('fail rồi')
            }
        });
    })
})

//active News category
$(function() {
    $('.toggle-class-categoryNew').change(function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var categoryNew_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/categorynew/changeActive',
            data: {
                'active': active,
                'categoryNew_id': categoryNew_id
            },
            success: function(data) {
                console.log(data.success)
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('fail rồi')
            }
        });
    })
})

//active Kind News
$(function() {
    $('.toggle-class-kindNew').change(function() {
        var active = $(this).prop('checked') == true ? 1 : 0;
        var kindNew_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/kindnew/changeActive',
            data: {
                'active': active,
                'kindNew_id': kindNew_id
            },
            success: function(data) {
                console.log(data.success)
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('fail rồi')
            }
        });
    })
})

//active News
$(function() {
    $('.toggle-class-news').change(function() {
        var hightlight = $(this).prop('checked') == true ? 1 : 0;
        var news_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/new/changeHightlight',
            data: {
                'hightlight': hightlight,
                'news_id': news_id
            },
            success: function(data) {
                console.log(data.success)
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('fail rồi')
            }
        });
    })
})

//active menu
// $(function() {
//     $('.toggle-class-menu').change(function() {
//         var active = $(this).prop('checked') == true ? 1 : 0;
//         var menu_id = $(this).data('id');

//         $.ajax({
//             type: "GET",
//             dataType: "json",
//             url: '/admin/menus/changeActive',
//             data: {
//                 'active': active,
//                 'menu_id': menu_id
//             },
//             success: function(data) {
//                 console.log(data.success)
                
//             },
//             error: function(jqXHR, textStatus, errorThrown) {
//                 console.log('fail rồi')
//             }
//         });
//     })
// })

//role users
$(function() {
    $('.toggle-class-user-role').change(function() {
        var role = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/users/changeRoles',
            data: {
                'role': role,
                'user_id': user_id
            },
            success: function(data) {
                console.log(data.success)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('fail rồi')
            }
        });
    })
})

//status users
$(function() {
    $('.toggle-class-user').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var user_id = $(this).data('id');

        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/admin/users/changeStatus',
            data: {
                'status': status,
                'user_id': user_id
            },
            success: function(data) {
                console.log(data.success)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('fail rồi')
            }
        });
    })
})