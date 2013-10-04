$(function() {
    
    function chargerItems(controller, id) {
        $.ajax({
            type: 'GET',
            url: '/items/',
            data: { ajax: 1, controller: controller, id: id },
            success: function(data) {
                $('#related-items-list').append(data);
            }
        });
    }
    
    $('#item-edit').hide();
    id = $('#id').attr('value');
    controller = $('#controller').attr('value');
    if ( id && controller )
        chargerItems(controller, id);
    else
        $('#related-items-list').hide();
    
    // Affichage du formulaire sur le bouton "Modifier..."
    $('#item-view-edit').click(function() {
        $('#item-edit').show();
        $('#item-view').hide();
    });
    
    // Disparition du formulaire sur le bouton "Annuler"
    $('#item-edit-cancel').click(function() {
        $('#item-edit').hide();
        $('#item-view').show();
    });
    
});
