$("#email").on("blur", function () {
    let email = $(this).val();
    let url = $(this).data('route').replace(':EMAIL', email);
    $.ajax({
        url: url,
        method: "GET",
        dataType: 'json'
    }).done(data => {
        if (data.flag) {
            $(':input[type="submit"]').attr("disabled", false);
            $(this).removeClass("is-invalid").addClass("is-valid");
        } else {
            $(':input[type="submit"]').attr("disabled", true);
            $("#email-error").attr("hidden", true);
            $("#email-not-found").attr("hidden", false);
            $(this).removeClass("is-valid").addClass("is-invalid");
        }
    }).fail(() => {
        $(':input[type="submit"]').attr("disabled", true);
        $("#email-not-found").attr("hidden", true);
        $("#email-error").attr("hidden", false);
        $(this).removeClass('is-valid').addClass('is-invalid');
    });
});

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