$(function() {
    $('#s-product-view .s-product-skus tr').each(function() {
        var sku_id = $(this).data('id');
        var td = $('<td class="s-fororder">' + $('.fororder div[data-id="' + sku_id + '"] .s-fororder').html() + '</td>');
        $(this).find('td.s-stock').after(td);
    });

    $('#s-product-view .s-product-skus .s-fororder input[type="checkbox"]').change(function() {
        if ($(this).prop('checked')) {
            $(this).closest('.s-fororder').find('input[type="text"]').removeAttr('disabled');
        } else {
            $(this).closest('.s-fororder').find('input[type="text"]').prop('disabled', true);
        }
    });
    
    $('#s-product-view .s-product-skus .s-fororder input[type="checkbox"]').each(function() {
        if ($(this).prop('checked')) {
            $(this).closest('.s-fororder').find('input[type="text"]').removeAttr('disabled');
        } else {
            $(this).closest('.s-fororder').find('input[type="text"]').prop('disabled', true);
        }
    });
    

    $('#shop-productprofile #s-edit-product').after('<span><a id="s-fororder-save-product" class="button green s-product-edit-link" href="#">Сохранить</a><i style="display: none;" id="fororder-loading" class="icon16 loading"></i></span>');

    $('#s-fororder-save-product').click(function() {
        $('#fororder-loading').show();
        var data = {};
        $('#s-product-view .s-product-skus .fororder-input').each(function() {
            if (($(this).prop('type') == 'checkbox' && $(this).prop('checked')) || $(this).prop('type') != 'checkbox') {
                data[$(this).attr('name')] = $(this).val();
            }

        });

        $.ajax({
            type: 'POST',
            url: '?plugin=fororder&action=saveProduct',
            dataType: 'json',
            data: data,
            success: function(data, textStatus, jqXHR) {
                console.log(data);
                if (data.status == 'ok') {

                } else {

                }
                $('#fororder-loading').hide();
            }
        });
        return false;
    });
});