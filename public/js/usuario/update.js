
$(document).on("click", ".edit", function () {
    const id = $(this).data('id');
    reset();
    $.ajax({
        type: "GET",
        url: `${base_url}/usuario/edit/${id}`,
        dataType: "json",
        success: function (response) {
            //console.log(response.data);
            $('#usuario_id').val(id);
            $('#ci').val(response.data.ci);
            $('#nombre').val(response.data.nombre);
            $('#apellido').val(response.data.apellido);
            $('#nacionalidad').val(response.data.nacionalidad);
            $('#edad').val(response.data.edad);
            $('#email').val(response.data.email);
            $('#celular').val(response.data.celular);
            $('#dirrecion').val(response.data.dirrecion);

            $("#usuario").modal("show");
        },
        error: function (request, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Ocurrio un error',
                html: $alert,
            });
        }
    });
    $('#title_modal_usuario').text('Editar usuario')
    $('#save').removeClass('store update');
    $('#save').addClass('update');
});
$(document).on("click", ".update", function () {
    $.ajax({
        type: "PUT",
        url: `${base_url}/usuario/update/${ $('#usuario_id').val()}`,
        data: $('#form_usuario').serialize(),
        dataType: "json",
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
    });
    $('#title_modal_usuario').text('Editar usuario')
    $("#usuario").modal("show");
});