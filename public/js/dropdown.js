$(document).ready(function () {
    $('#business_unit').change(function () {
        let bu_id = $(this).val();
        // alert(id);
        // $('#item_code').find('option').not(':first').remove();
        $.ajax({
            url: '/items/getItemCode/' + bu_id,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                let maxLen = Math.max(
                    response.data.item_code.length,
                    response.data.description.length,
                    response.data.base_uom.length,
                    response.data.category.length,
                    response.data.sub_category.length
                );
                console.log(response.data);
                for (let i = 0; i < maxLen; i++) {
                    if (response.data.item_code[i]) {
                        $('#listItem').append("<option value='" + response.data.item_code[i] + "'>" + response.data.item_code[i] + "</option>");
                    }
                    if (response.data.description[i]) {
                        $('#listDescription').append("<option value='" + response.data.description[i] + "'>" + response.data.description[i] + "</option>");
                    }
                    if (response.data.base_uom[i]) {
                        $('#base_uom').append("<option value='" + response.data.base_uom[i] + "'>" + response.data.base_uom[i] + "</option>");
                    }
                    if (response.data.category[i]) {
                        $('#category').append("<option value='" + response.data.category[i] + "'>" + response.data.category[i] + "</option>");
                    }
                    if (response.data.sub_category[i]) {
                        $('#sub_category').append("<option value='" + response.data.sub_category[i] + "'>" + response.data.sub_category[i] + "</option>");
                    }
                }
            }
        });
    });
});