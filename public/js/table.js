$(document).ready(function() {
    
    $('#business_unit').change(function() {
        let bu_id = $(this).val();
        $.ajax({
            url: '/items/getData/' + bu_id,
            type: 'get',
            dataType: 'json',
            success: function(response) {
                let len = response['data'].length;

                
                // $('#clickToShow').hide();
                $('#clickToShow').addClass('d-none');
                if (len > 0) {
                   
                    $('#item_table tbody').empty();

                  
                            
                    for (let i = 0; i < len; i++) {
                        let item = response['data'][i];
                        let row = $('<tr>');
                        row.append($('<td>').text(item.bu_id));
                        row.append($('<td>').text(item.item_code || 'N/A'));
                        row.append($('<td>').text(item.description || 'N/A'));
                        row.append($('<td>').text(item.base_uom || 'N/A'));
                        row.append($('<td>').text(item.category || 'N/A'));
                        row.append($('<td>').text(item.sub_category || 'N/A'));
                        row.append($('<td>').text(""));
                        // let editCell = $('<td>');
                        // let editButton = $('<button type="button"  class="btn btn-sm btn-warning edit-item" data-bs-toggle="modal" data-bs-target="#">Edit</button>');
                        // editButton.data('itemId', item.item_id);
                        // editCell.append(editButton);
                        // row.append(editCell);
                        $('table tbody').append(row);
                    }
                } else {
                    
                    let row = $('<tr>');
                    row.append($('<td colspan="7" class="text-center">').text('No data found'));
                    $('table tbody').append(row);
                }
            }
        });
    });
});