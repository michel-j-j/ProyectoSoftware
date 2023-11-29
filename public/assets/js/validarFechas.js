
function validarFechas() {
    var fechaEmision = document.getElementById("fecha_emision").value;
    var fechaVencimiento = document.getElementById("fecha_vencimiento").value;

    // Convertir las fechas a objetos Date para facilitar la comparación
    var fechaEmisionObj = new Date(fechaEmision);
    var fechaVencimientoObj = new Date(fechaVencimiento);

    // Comparar las fechas
    if (fechaEmisionObj >= fechaVencimientoObj) {
        alert("La fecha de emisión debe ser anterior a la fecha de vencimiento");
        return false; // Evitar el envío del formulario
    }

    return true; // Permitir el envío del formulario si las fechas son válidas
}