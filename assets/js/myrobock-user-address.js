$('#id-country').on('change', function () {
    let idCountry = $(this).val();
    let url = $(this).closest("div").data('route').replace(':ID_COUNTRY', idCountry);
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'json'
    }).done(data => {
        $(this).removeClass('is-invalid');
        let options = "<option selected='selected' value='' disabled>Choose a state...</option>";
        for (let idState in data.states) {
            options += "<option value='" + idState + "'>" + data.states[idState] + "</option>";
        }
        $('#id-state').html(options).prop('disabled', false);
    }).fail(() => {
        $(this).addClass('is-invalid');
    });
});