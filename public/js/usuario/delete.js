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
            Swal.fire(
                'Borrado correctamente!',
                'Elimiando correctamente',
                'success'
            );
            table.draw();
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
            if (data.success) {
                html = `<div class="alert alert-success">${data.success}</div>`;
                table.draw();
                $("#status_crud").html(html);
                $("#status_crud").addClass("visible").removeClass("invisible");
                $("#deleteModal").modal("hide");
            }
        },
    });
}