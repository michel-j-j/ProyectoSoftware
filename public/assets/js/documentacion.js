$(document).ready(function () {
    $('#eliminarDocumentacion').click(function (e) {
        Swal.fire({
            title: "¿Desea eliminar este documento?",
            text: "¡Esta accion no podra deshacerse!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si",
            cancelButtonText: "No, no estoy seguro"
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = $(this).val();
                formData = "eliminar_id=" + formData;
                $.ajax({
                    url: '/TrabajoFinalProyecto/public/eliminarDocumentacion', // URL de ejemplo
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
                                location.reload();
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
                        console.log("Error: " + error + status + xhr);
                    }
                });
            }
        });
    });

    $('#insertarTipoDocumentacion').submit(function (e) {

        //Agregado
        e.preventDefault();
        
                var formData = $(this).serialize();
                $.ajax({
                    url: '/TrabajoFinalProyecto/public/administrarTipoDocumentacion', // URL de ejemplo
                    method: "POST",
                    data: formData,
                    success: function (data) {
                        if (data.estado == 'ok') {
                            Swal.fire({
                                icon: 'success',
                                //Cambiado
                                title: "Tipo de documento agregado correctamente",
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                location.reload();
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
                        console.log("Error: " + error + status + xhr);
                    }
                });
    });

    //Cambiado por clase
    $('.eliminarTipoDocumentacion').submit(function (e) {

        //Agregado
        e.preventDefault();

        var formData = $(this).serialize();
        $.ajax({
            url: '/TrabajoFinalProyecto/public/eliminarTipoDocumentacion', // URL de ejemplo
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
                        location.reload();
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
                console.log("Error: " + error + status + xhr);
            }
        });
});
    

    $('.box').change(function (e) {
        console.log('oka');
          $('.box').change(function () {
              if ($(this).is(':checked')) {
                  $('#denunciar').prop('disabled', false);
              } else {
                  $('#denunciar').prop('disabled', true);
              }
          });
      });
});