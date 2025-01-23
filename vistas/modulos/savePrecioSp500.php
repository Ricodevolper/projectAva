<?php









if (isset($_POST['fecha'])&& isset($_POST['data'])) {

    $fecha = $_POST['fecha']; 

    $fechas = ControladorPmercado::ctrfechasActivasSp($fecha);

 


  
    if ($fechas[0]['fecha_precio'] == '1') {
        echo '<script>
        Swal.fire({
            title: "Fecha con precio.",
            text: "Esta fecha ya tiene precio. ¿Estás intentando actualizarla nuevamente?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Sí, actualizar",
            cancelButtonText: "No, cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Acción si el usuario confirma
                console.log("Actualizar fecha");
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Acción si el usuario cancela
                console.log("Cancelado");
            }
        });
    </script>';
    
    }else{
        $fechaAnterior = ControladorPmercado::ctrPrecioAnteriorSp500($fecha);

        $precioAnterior = $fechaAnterior[0]['precio'];
        $precioActual = $_POST['data'];

     
        $diferencia = $precioActual - $precioAnterior;
        $porcentaje = ($diferencia / $precioAnterior) * 100;

        $porcentaje = number_format($porcentaje,2).'%';


       

                
         $actualizarPrecio = ControladorPmercado::ctrInsertarPmercadoSp500($fecha,$precioActual,$porcentaje);

        if ($actualizarPrecio == 'ok') {


            echo '<script>
            Swal.fire({
                title: "Precio Actualizado",
                text: "Precio Actual",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir a la página pmercado
                    window.location.href = "pmercado";
                }
            });
        </script>';
        
        }
    }


    






   
}