$(document).ready(function () {


    $('.cancelarDenuncia').click(function (e) {
        e.preventDefault();

        Swal.fire({
            title: "¿Desea cancelar la denuncia ?",
            text: "¡Esta accion no podra deshacerse!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, enviar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {

                var formData = $(this).serialize();

                $.ajax({
                    url: "cancelarDenuncia", // destino
                    method: "POST",
                    data: formData,
                    success: function (data) {
                        //console.log(data);

                        if (data['exito'] === 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: data.msj,
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                window.location.href = data.url;
                            })
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                title: data.msj,
                                showConfirmButton: false,
                                timer: 1500

                            }).then((result) => {
                                window.location.href = data.url;
                            })
                        }

                    },
                    error: function (xhr, status, error) {
                        console.log("Error: " + error + status + xhr);
                    }
                });
            }
        });
    });
});