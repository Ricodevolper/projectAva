<?php 


class ControladorClientes {

    static public function ctrBuscarCliente($nombre, $perfil){
        // Sanitizar la entrada del usuario para evitar inyección SQL
        $nombre = htmlspecialchars(strip_tags($nombre));
    
        // Verificar que la entrada solo contiene caracteres alfanuméricos y espacios
        if (preg_match('/^[a-zA-Z0-9 ]+$/', $nombre)) {
            try {
                $cliente = ModeloClientes::mdlBuscarCliente($nombre, $perfil);
    
                // Verificar que la consulta devolvió resultados
                if ($cliente) {
                    return $cliente;
                } else {
                    // Manejar el caso cuando no se encuentran clientes
                    return "No se encontraron clientes con ese nombre.";
                }
            } catch (Exception $e) {
                // Manejar posibles errores de la base de datos
                error_log("Error en ctrBuscarCliente: " . $e->getMessage());
                return "Ocurrió un error al buscar el cliente.";
            }
        } else {
            // Manejar la entrada no válida
            return "El nombre del cliente contiene caracteres no permitidos.";
        }
    }
    
    static public function ctrBuscarClienteId($Id){
        $Id = htmlspecialchars(strip_tags($Id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$Id)){
           $cliente =  ModeloClientes::mdlBuscarClienteId($Id);

           return $cliente;

        }



    }

    static public function ctrDatosClientes($nombre){
        $nombre = htmlspecialchars(strip_tags($nombre));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$nombre)){
           $cliente =  ModeloClientes::mdlDatosClientes($nombre);

           return $cliente;

        }



    }
    static public function ctrDatosCotitular($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $cotitular =  ModeloClientes::mdlDatosCotitular($id);

           return $cotitular;

        }



    }
    static public function ctrDatosEconomicosClientes($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $cotitular =  ModeloClientes::mdlDatosEconomicosClientes($id);

           return $cotitular;

        }



    }
    static public function ctrallbeneficiarioId($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $beneficiaros =  ModeloClientes::mdlallbeneficiarioId($id);

           return $beneficiaros;

        }



    }
    static public function ctrconsultarTransaccionalidadCliente($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlconsultarTransaccionalidadCliente($id);

           return $respuesta;

        }



    }
    static public function ctrCuentasContablesCliente($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlCuentasContablesCliente($id);

           return $respuesta;

        }



    }
    static public function ctrAsesorAsignado($id){
        $id = htmlspecialchars(strip_tags($id));
   
        if(preg_match('/^[a-zA-Z0-9 ]+$/',$id)){
           $respuesta =  ModeloClientes::mdlAsesorAsignado($id);

           return $respuesta;

        }



    }

    static public function ctrDatosClientesId($id) 
   
    {
        $id = htmlspecialchars(strip_tags($id));
        if(preg_match('/^[0-9 ]+$/',$id)){
            $respuesta =  ModeloClientes::mdlDatosClientes($id);
 
            return $respuesta;
    }



}
    static public function ctrContratosActivos($id,$perfil) 
   
    {
         
            $respuesta =  ModeloClientes::mdlContratosActivos($id,$perfil);
 
            return $respuesta;
    



}
    static public function ctrEstados() 
   
    {
         
            $respuesta =  ModeloClientes::mdlEstados();
 
            return $respuesta;
    



}
    static public function ctrMunicipios($id_estado) 
   
    {
         
            $respuesta =  ModeloClientes::mdlMunicipios($id_estado);
 
            return $respuesta;
    



}


}