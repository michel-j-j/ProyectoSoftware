$(document).ready(function () {
    $('#modificarPerfil').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        Swal.fire({
            title: "Estas seguro de la modificaciones?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, estoy seguro",
            cancelButtonText: "No, no estoy seguro"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "modificar",
                    method: "POST",
                    data: formData,
                    success: function (data) {
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
            }
        });
    });

    $('#modificarContra').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        Swal.fire({
            title: "Estas seguro de modificar su contraseña?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, estoy seguro",
            cancelButtonText: "No, no estoy seguro"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "modificarContra",
                    method: "POST",
                    data: formData,
                    success: function (data) {
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
                        else
                        {
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
            }

        });
    });
});