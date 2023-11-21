$(document).ready(function(){
    $('#agregarDocumentacion').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: "¿Desea enviar el documento?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, enviar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = $(this).serialize();
              

                $.ajax({
                    url:"cargarDoc",
                    method: "POST",
                    data: formData,
                    success: function (data) {
                        if (data['exito'] === 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: data.msj,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // Después de mostrar el éxito, preguntar si desea agregar otro documento
                                Swal.fire({
                                    title: "¿Desea agregar otro documento?",
                                    icon: "info",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Sí, agregar",
                                    cancelButtonText: "No, gracias"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        // Si elige agregar otro documento, recargar la página
                                        location.reload();
                                    } else {
                                        // Si no, redirigir al inicio
                                        window.location.href = data.url;
                                    }
                                });
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: data.msj,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                // En caso de error, redirigir al inicio
                                window.location.href = data.url;
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(formData);
                        console.log("Error: " + error + status + xhr);
                        // En caso de error de comunicación, mostrar mensaje y redirigir al inicio
                        Swal.fire({
                            icon: 'error',
                            title: 'Hubo un error al procesar su solicitud. Por favor, inténtelo de nuevo más tarde.',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            window.location.reload();
                        });
                    }
                });
            }
        });
    });
});
