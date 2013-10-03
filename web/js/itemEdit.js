$(function() {
    
    function chargerItems(idShelf) {
        $.ajax({
            type: 'GET',
            url: '/items/' + idShelf,
            data: { ajax: 1 },
            success: function(data) {
                $('#related-items-list').append(data);
            }
        });
    }
    
    $('#item-edit').hide();
    idShelf = $('#id').attr('value');
    if ( idShelf )
        chargerItems(idShelf);
    else
        $('#related-items-list').hide();
    
    
});