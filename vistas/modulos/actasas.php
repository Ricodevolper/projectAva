<?php

if (isset($_POST['tasasact'])) {
    // Ejecutar la función para actualizar las tasas
    $resultado = ControladorPmercado::ctrActualizarTasas();



 
    
    // Dependiendo del resultado, definir el tipo de alerta
    if ($resultado == 'ok') {
        $alertType = 'success';
        $alertTitle = 'Tasas Actualizadas';
        $alertText = 'Los datos se han actualizado correctamente.';
    } elseif($resultado == 'actualizadas'){
        $alertType = 'warning';
        $alertTitle = 'No ahi cambios';
        $alertText = 'Los datos ya  han sido actualizados';
    }else{
        $alertType = 'error';
        $alertTitle = 'Error';
        $alertText = 'Hubo un problema al actualizar las tasas. Inténtalo de nuevo.';
       
    }

    echo '<script>
    Swal.fire({
        title: "Actualizando Tasas...",
        text: "Por favor, espera mientras se actualizan los datos.",
        icon: "info",
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        Swal.fire({
            title: "'.$alertTitle.'",
            text: "'.$alertText.'",
            icon: "'.$alertType.'",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "tasas"; 
            }
        });
    }, 1500); // Puedes ajustar el tiempo de espera según lo necesites
</script>';
}
