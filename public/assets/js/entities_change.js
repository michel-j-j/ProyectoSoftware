
    $(document).ready(function() {


        document.getElementById("modificarEntidad").addEventListener("submit", function(e) {
            e.preventDefault();

            Swal.fire({
                title: "¿Desea modificar la entidad ?",
                text: "¡Esta accion generara cambios permanentes en el sistema!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, enviar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Envía el formulario si el usuario confirma
                    this.submit();

                    // Muestra el mensaje de éxito después de enviar el formulario
                    const successMessage = session('success');

                    if (successMessage) {
                        Swal.fire({
                            title: "¡Éxito!",
                            text: successMessage,
                            icon: "success",
                            //timer: 10000, // Cambia el valor del temporizador a la duración que desees (en milisegundos)
                            showConfirmButton: false // Evita que se muestre el botón "OK"
                        });
                    }
                }
            });
        });
    });
