$(document).on("click", ".delete", function () {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Este proceso no se podra revertir!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar esto!'
    }).then((result) => {
        if (result.isConfirmed) {
            eliminar(id)
        }
    })
});
function eliminar(id) {
    $.ajax({
        type: "DELETE",
        url: `${base_url}/usuario/delete/${id}`,
        dataType: "json",
        success: function (data) {
            var html = "";
            if (data.status=='ok') {
                html = `<div class="alert alert-success">${data.success}</div>`;
           
                Swal.fire(
                    'Borrado correctamente!',
                    'Elimiando correctamente',
                    'success'
                );

                table.draw();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error servidor',
                    html: '',
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
}