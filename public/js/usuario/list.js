$("#ordenar").change(function () {
    console.log('order')
    table.ajax.url(`${base_url}/usuario/data-table?orden=${$(this).val()}`).load();
});
$("#view_pdf").on('click', function(evt) {
    var options = {
        url: `${base_url}/usuario/report`,
        title: 'Preview',
        size: eModal.size.lg,
        buttons: [{
            text: 'ok',
            style: 'info',
            close: true,
            size: 'lg',
        }],
    };
    eModal.iframe(options);
});