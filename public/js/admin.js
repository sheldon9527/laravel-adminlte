require.config({
    baseUrl: "/js/",
    paths: {
        jquery: "../bower/jquery/dist/jquery.min",
        bootstrap: '../bower/bootstrap/dist/js/bootstrap.min',
        bselect: '../bower/bootstrap-select/dist/js/bootstrap-select.min',
        datatables: '../bower/AdminLTE/plugins/datatables/jquery.dataTables.min',
        bootbox: '../bower/bootbox.js/bootbox',
        adminLTE: '../bower/AdminLTE/dist/js/app.min',
        slimscroll: '../bower/AdminLTE/plugins/slimScroll/jquery.slimscroll.min',
        morris: '../bower/AdminLTE/plugins/morris/morris.min',
        raphael: '../bower/raphael/raphael-min',
        datepicker: '../bower/AdminLTE/plugins/datepicker/bootstrap-datepicker',
        timepicker: '../bower/AdminLTE/plugins/timepicker/bootstrap-timepicker.min',
        datetimepicker: '../bower/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker',
        moment: '../bower/moment/min/moment.min',
        dropzone: '/js/dropzone.min',
        cropit: '../bower/cropit/dist/jquery.cropit',
        wysiwyg: '../bower/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min',
        hotkeys: '../bower/jquery.hotkeys/jquery.hotkeys',
        distpicker: '../bower/distpicker/dist/distpicker.min',
        countrypickerData: '/js/distpicker.data.min',
    },
    shim: {
        'datatables': ['jquery'],
        'adminLTE': ['bootstrap', 'slimscroll'],
        'morris': ['jquery', 'raphael'],
        'bootbox': {
            deps: ['jquery', 'bootstrap']
        },
        'bootstrap': {
            deps: ['jquery'],
            exports: 'jQuery'
        },
        'bselect': {
            deps: ['bootstrap']
        },
        'datepicker': ['jquery'],
        'dropzone': ['jquery'],
        'wysiwyg': {
            deps: ['jquery', 'bootstrap']
        },
        'slimscroll': ['jquery']
    }
});

require(['jquery', 'datatables', 'datepicker', 'dropzone', 'bselect'], function($, DataTable, datepicker, Dropzone, selectpicker) {
    // dropdown  start
    $('.selectpicker').selectpicker({
        style: 'btn-default',
    });
    $('.btn-search').click(function() {
        var $search = $(this).next('.dropdown-search');

        $search.toggle();

        //if ($search.is(':visible')) {
        ////  打开的时候给body绑定一次hide
        //var hideSearch = function() {
        //$search.hide();
        //};
        //$('body').one('click', hideSearch);
        //}
        //else {
        //// 清除hide，不清楚其他的click事件
        //$('body').unbind('click', hideSearch);
        //}
        return false;
    });
    // dropdown end

    $('table.default-table').DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true
    });

    // input 时间选择
    $('input.datetime').datepicker({
        title: false,
        todayBtn: 'linked',
        todayHighlight: 'true',
        autoclose: true,
        format: "yyyy-mm-dd",
    });

    var photoDiv = '';

    Dropzone.autoDiscover = false;

    Dropzone.options.dropzone = {
        url: "/manager/attachments",
        paramName: "file",
        init: function() {
            this.on("sending", function(file, xhr, formData) {
                var parent = $(file.previewElement)[0].parentNode;
                var type = $(parent).data().type;
                var tag = $(parent).data().tag;
                formData.append("type", type);
                formData.append("tag", tag);
            });
            this.on("addedfile", function(file) {});
            this.on("success", function(file, response) {
                photoDiv = $(file.previewElement).append(
                    '<input name="attachment_ids[]" class="attachment-id" type="hidden" value="' + response.attachmentId + '">'
                );
            });
            this.on("removedfile", function(file) {
                var attachmentId = $(file.previewElement).find('.attachment-id').val();
                var url = '/manager/attachments/' + attachmentId;

                $.ajax({
                    type: "delete",
                    url: url,
                    dataType: "json",
                    success: function(data) {
                        if (data.data == 0) {
                            alert('删除失败!');
                            $('#dropzone').append(photoDiv);
                        }
                    }
                });
            });
        }
    };

    $('#dropzone').dropzone();

    // 编辑时, 删除旧的附件图片
    $('a.dz-remove').click(function() {
        var parent = $(this).parent();
        var attachmentId = $(this).data().id;
        var url = '/manager/attachments/' + attachmentId;
        $.ajax({
            type: "delete",
            url: url,
            dataType: "json",
            success: function(data) {
                if (data.data == 1) {
                    parent.remove();
                } else {
                    alert('删除失败!');
                }
            }
        });
    });

    $('a.status').click(function() {
        var userId = $(this).data().id;
        $.ajax({
            url: '/manager/users/' + userId + '/status',
            type: 'put',
            dataType: 'json',
            success: function(response) {
                window.location.reload();
            }
        });
    });

    // input 图片预览
    $(document).on('change', '.btn-file :file', function() {

        var preview = $(this).data('image-preview');

        if (preview) {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(preview).attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        }
    });

});

require(['laravel', 'adminLTE']);
