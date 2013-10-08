$(function() {
    
    function loadItems(controller, id) {
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
    var id = $('#id').attr('value');
    var controller = $('#controller').val();
    var listController = $('#list-controller').val();
    if ( id && controller )
        loadItems(controller, id);
    else
        $('#related-items-list').hide();
    
    
    
    // Validation des formulaires
    $('#item-edit-send').click(function() {
        
        var validate = true;
        $('#item-edit-form input.mandatory').each(function() {
            val = $.trim($('#item-edit-form input.mandatory').val());
            if (val === "") {
                validate = false;
                $('#item-edit-form input.mandatory').addClass('error');
            }
        });
        if (validate) {
            // Envoi
            var dataStr = 'ajax=1';
            $('#item-edit-form input').each(function() {
                dataStr = dataStr + '&' + $('#item-edit-form input').attr('id') + 
                                    '=' + $('#item-edit-form input').val();
            });
            $.ajax({
                type: 'POST',
                url: '/' + controller + '/new',
                data: dataStr,
                success: function() {
                    // Retour au contrôleur appelant
                    var back = '';
                    if (id)
                        back = '/' + controller + '/' + id;
                    else
                        back = '/' + listController;
                    window.location.href = back;
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Erreur: ' + textStatus + '\n' + errorThrown);
                }
            });
        } else
            alert("Des champs obligatoires n'ont pas été remplis !");
    });
    
    
    
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
