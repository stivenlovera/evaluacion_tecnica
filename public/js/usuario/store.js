$(document).on("click", "#new", function () {

    $("#usuario").modal("show");
    $('#title_modal_usuario').text('Crear usuario');
    $('#save').removeClass('store update');
    $('#save').addClass('store');
    reset();
});
$(document).on("click", ".store", function () {
    $.ajax({
        type: "POST",
        url: `${base_url}/usuario/store`,
        dataType: "json",
        data: $('#form_usuario').serialize(),
        success: function (response) {
            if (response.status == 'ok') {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2000
                });
                table.draw();
                $("#usuario").modal("hide");
            } else {
                $alert = "";
                response.message.forEach(function (error) {
                    $alert += `* ${error}<br>`;
                });
                Swal.fire({
                    icon: 'error',
                    title: 'complete the following fields to continue:',
                    html: $alert,
                });
            }
        },
        error: function (request, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Ocurrio un error',
                html: '',
            });
        }
    });
});

function reset() {
    $('#usuario_id').val('');
    $('#ci').val('');
    $('#nombre').val('');
    $('#apellido').val('');
    $('#nacionalidad').val('');
    $('#edad').val('');
    $('#email').val('');
    $('#celular').val('');
    $('#dirrecion').val('');
}