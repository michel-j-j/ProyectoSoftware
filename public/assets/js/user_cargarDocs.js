$(document).ready(function(){

 
    $('#agregarDocumentacion').submit(function (e) {
        e.preventDefault();

        Swal.fire({
            title: "¿Desea enviar el documento?",
            //text: ,
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
            url: "/user/cargarDocumentacion", // destino
            method: "POST",
            data: formData,
            success: function (data) {
                //console.log(data);

                if (data['exito']==='ok') {
                    Swal.fire({
                        icon: 'success',
                        title: data.msj,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {

                        Swal.fire({
                            title: "¿Desea agregar otro documento?",
                            //text: ,
                            icon: "info",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Sí, enviar",
                            cancelButtonText: "Cancelar"
                        }).then((result)=>{
                            if(result.isConfirmed){
                            location.reload();}
                            else
                            window.location.href = data.url;
                        })

                        
                    })
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: data.msj,
                        showConfirmButton: false,
                        timer: 1500
                        
                    }).then((result) =>{
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