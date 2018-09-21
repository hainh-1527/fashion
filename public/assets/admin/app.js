$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.fashion-delete-item').on('confirmed.bs.confirmation', function () {
        let id = $(this).attr('data-id');

        document.getElementById('delete-item-' + id).submit();
    });

    // Soft delete item
    $('.fashion-soft-delete-item').on('confirmed.bs.confirmation', function () {
        let url = $(this).attr('data-url');
        let message = $(this).attr('data-message');

        let data = {
            _method: 'delete'
        };

        let item = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                },
                200: function () {
                    $('#sample_1').DataTable().row(item.parents('tr')).remove().draw();
                    item.parents('tr').remove();
                    grow(message, 'success');
                }
            }
        });
    });

    function grow(message, type) {
        $.bootstrapGrowl(message, {
            ele: 'body', // which element to append to
            type: type, // (null, 'info', 'danger', 'success', 'warning')
            offset: {
                from: 'top',
                amount: 100
            }, // 'top', or 'bottom'
            align: 'center', // ('left', 'right', or 'center')
            width: 'auto', // (integer, or 'auto')
            delay: 700, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: 0, // If true then will display a cross to close the popup.
            stackup_spacing: 0 // spacing between consecutively stacked growls.
        });
    }

    // Restore item
    $('.fashion-restore-item').click(function () {
        let url = $(this).attr('data-url');
        let message = $(this).attr('data-message');

        let data = {
            _method: 'put'
        };

        let item = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    alert('error');
                },
                200: function () {
                    $('#sample_2').DataTable().row(item.parents('tr')).remove().draw();
                    grow(message, 'success');
                }
            }
        });
    });

    // Force delete item
    $('.fashion-force-delete-item').on('confirmed.bs.confirmation', function () {
        let url = $(this).attr('data-url');
        let message = $(this).attr('data-message');

        let data = {
            _method: 'delete'
        };

        let item = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                },
                200: function () {
                    $('#sample_2').DataTable().row(item.parents('tr')).remove().draw();
                    grow(message, 'success');
                },
                201: function (data) {
                    alert(data);
                }
            }
        });
    });

    // Change status
    $('.fashion-change-status').change(function () {
        $('.fashion-change-status').attr('disabled', 'disabled');
        let message = $(this).attr('data-message');

        let url = $(this).attr('data-url');
        let status = $(this).val();
        let user_id = $('.fashion-ajax').attr('data-user-id');

        let data = {
            user_id: user_id,
            status: status,
            _method: 'put'
        };

        let item = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                },
                200: function (result) {
                    $('.fashion-change-status').removeAttr('disabled');

                    grow(message, 'success');

                    item.parents('tr')
                        .children('.fashion-time')
                        .css('color', 'green')
                        .css('font-weight', 'bold')
                        .html(result.time);

                    item.parents('tr')
                        .children('.fashion-user')
                        .css('color', 'green')
                        .css('font-weight', 'bold')
                        .html(result.user_name);
                }
            }
        });
    });

    // Change brand_id
    $('.fashion-change-brand').change(function () {
        $('.fashion-change-brand').attr('disabled', 'disabled');
        let message = $(this).attr('data-message');

        let url = $(this).attr('data-url');
        let brand_id = $(this).val();
        let user_id = $('.fashion-ajax').attr('data-user-id');

        let data = {
            user_id: user_id,
            brand_id: brand_id,
            _method: 'put'
        };

        let item = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                },
                200: function (result) {
                    $('.fashion-change-brand').removeAttr('disabled');

                    grow(message, 'success');

                    item.parents('tr')
                        .children('.fashion-time')
                        .css('color', 'green')
                        .css('font-weight', 'bold')
                        .html(result.time);

                    item.parents('tr')
                        .children('.fashion-user')
                        .css('color', 'green')
                        .css('font-weight', 'bold')
                        .html(result.user_name);
                }
            }
        });
    });

    // Change feature
    $('.fashion-change-feature').click(function () {
        let feature = $(this).attr('data-feature') == 1 ? 0 : 1;

        let message = $(this).attr('data-message');
        let url = $(this).attr('data-url');

        let user_id = $('.fashion-ajax').attr('data-user-id');

        let data = {
            user_id: user_id,
            feature: feature,
            _method: 'put'
        };

        let item = $(this);

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                },
                200: function (result) {
                    grow(message, 'success');

                    if (item.hasClass('fa-star')) {
                        item.removeClass('fa-star')
                            .removeClass('feature-color')
                            .addClass('fa-star-o');
                    } else {
                        item.removeClass('fa-star-o')
                            .addClass('fa-star')
                            .addClass('feature-color');
                    }

                    item.parents('tr')
                        .children('.fashion-time')
                        .css('color', 'green')
                        .css('font-weight', 'bold')
                        .html(result.time);

                    item.parents('tr')
                        .children('.fashion-user')
                        .css('color', 'green')
                        .css('font-weight', 'bold')
                        .html(result.user_name);
                }
            }
        });
    });

    $('.read-notification').click(function () {
        let url = $(this).attr('data-url');
        let data = {
            '_method': 'patch'
        };

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                }
            }
        });
    });

    // Upload file
    $('.fashion-upload-file').change(function (e) {
        let file = e.target.files || e.dataTransfer.files;
        let reader = new FileReader();

        reader.onload = (e) => {
            $('.fashion-image-upload img').attr('src', e.target.result);
        };

        reader.readAsDataURL(file[0]);
    });

    let sort_order;

    let updateOutput = function (e) {
        let list = e.length ? e : $(e.target);

        if (window.JSON) {
            sort_order = list.nestable('serialize');
        } else {
            grow('JSON browser support required for this demo.', 'danger');
        }
    };

    let nestable_list_1 = $('#nestable_list_1');
    let maxDepth = parseInt($('.fashion-nestable').attr('data-max-depth'));

    nestable_list_1.nestable({group: 1, maxDepth: maxDepth}).change(updateOutput);

    updateOutput(nestable_list_1);
    
    $('.fashion-save-sort-order').click(function () {
        let url = $(this).attr('data-url');
        let message = $(this).attr('data-message');

        let data = {
            _method: 'put',
            sort_order: sort_order
        };

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            dataType: 'json',
            statusCode: {
                404: function () {
                    grow('error', 'danger');
                },
                200: function () {
                    grow(message, 'success');
                }
            }
        });
    });

    $("#price").TouchSpin({
        buttondown_class: 'btn green',
        buttonup_class: 'btn green',
        min: 0,
        max: 1000000000,
        step: 5000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        postfix: 'đ'
    });

    $("#sale").TouchSpin({
        buttondown_class: 'btn green',
        buttonup_class: 'btn green',
        min: 0,
        max: 100,
        step: 5,
        stepinterval: 50,
        maxboostedstep: 10000000,
        postfix: '%'
    });

});