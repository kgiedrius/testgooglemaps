/**
 * Api test form
 */
$('#geoDataProcessForm').on('submit', function () {
    var form = $(this);
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData(form[0]);
    }

    $('#api-result').text('Loading...');
    $.ajax({
        url: form.attr('action'),
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            $('#api-result').text(JSON.stringify(data));
        }
    });
});

/**
 * Show map form
 */
$('#showMapForm').on('submit', function () {
    var form = $(this);
    var formdata = false;
    if (window.FormData) {
        formdata = new FormData(form[0]);
    }

    $.ajax({
        url: form.attr('action'),
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            routeData = data;
            $('.bs-example-modal-lg').modal();
        }
    });
});

/**
 * Modal open event
 */
$('.bs-example-modal-lg').on('shown.bs.modal', function (e) {
    initMap({lat: 55.2881309, lng: 23.9577279});
});
