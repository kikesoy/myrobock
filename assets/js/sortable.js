$('#categories-sort').sortable({
    update: function (event, ui) {
        $(this).children().each(function (index) {
            if ($(this).attr('data-position') != (index + 1)) {
                $(this).attr('data-position', (index + 1)).addClass('updated');
            }
        });

        saveNewPositions();
    }
});

function saveNewPositions() {
    var positions = [];
    var _token = $("input[name='_token']").val();
    var _method = $("input[name='_method']").val();
    $('.updated').each(function () {
        positions.push([$(this).attr('data-index'), $(this).attr('data-position')]);
        $(this).find(".position").html('<i class="fas fa-arrows-alt-v"></i> '+$(this).attr('data-position'));
        $(this).removeClass('updated');
    });

    $.ajax({
        url: $("#categories-sort").data('route'),
        type: 'POST',
        dataType: 'json',
        data: {
            _token: _token,
            _method: _method,
            positions: positions,
        }
    }).done(function() {
        $("#success-alert").show('slow').delay(2000).hide('slow');
    }).fail(function () {
        $("#fail-alert").show('slow').delay(2000).hide('slow');
    });
}