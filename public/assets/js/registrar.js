$(document).ready(function () {
    $('#formularioRegistro').submit(function (e) {
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url: "registrar/registrarse", // URL de ejemplo
            method: "POST",
            data: formData,
            success: function (data) {
                console.log(data);
                if (data.estado == 'ok') {
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
                    })
                }

            },
            error: function (xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: error.msj,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });
});