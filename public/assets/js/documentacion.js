$(document).ready(function () {
    $('#eliminarDocumentacion').click(function (e) {
        
        var formData = $(this).val();
        console.log(formData);

        $.ajax({
            url: "eliminarDocumentacion", // URL de ejemplo
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
    
});