<?php


require_once '../../modelos/conexion.php';
require_once '../../modelos/clientes.modelo.php';






  $datosCliente = ModeloClientes::consultarDatosClientes($_POST['id']);

echo json_encode($datosCliente);
// $stmt = Conexion::conectar()->prepare("SELECT
//         id_cliente, clave_elector, tipo_cliente, 
//         CONCAT_WS(' ', nombre_clte, apaterno_clte, amaterno_clte) AS nombre_cliente, curp, rfc, fecha_nacimiento, religion, Fk_estado_nac, tipo_identificacion, clave_elector, nom_localidad,
//         sexo, tel_celular, tel_casa, tel_oficina, tel_otro,  email, email2 , calle, colonia, ciudad, num_int, num_ext, cod_postal, nacimi.nom_pais as pais_nac, nac.nom_estado as estado_nac, nacionali.nom_pais as nacionalidad,
//         CONCAT_WS(' ', nombre_cony, apaterno_cony, amaterno_cony) AS nombre_conyugue, num_hijos, num_dep_eco, estado_civil,
//         nom_localidad, desc_municipio, c.nom_estado, ine_anverso, ine_reverso, domicilio_img, curp_img, edo_cuenta_img, situacion_fiscal_img, cuestionario_inver_img, ine_anverso_cotitutar, ine_reverso_cotitular, curp_cotitular_img, situacion_fiscal_cotitular_img
//     FROM 
//         tbl_clientes
    
//     INNER JOIN  
//         cat_localidad ON cat_localidad.clave_localidad = tbl_clientes.fk_localidad
//         AND cat_localidad.fk_pais = tbl_clientes.fk_pais
//         AND cat_localidad.fk_estado = tbl_clientes.fk_estado
//         AND cat_localidad.fk_municipio = tbl_clientes.fk_municipio
//     INNER JOIN 
//         cat_municipio ON cat_municipio.fk_pais = cat_localidad.fk_pais
//         AND cat_municipio.fk_estado = cat_localidad.fk_estado
//         AND cat_localidad.fk_municipio = cat_municipio.clave_municipio
//     INNER JOIN 
//         cat_estado as c ON c.id_estado = cat_municipio.fk_estado
//         AND c.fk_pais = cat_municipio.fk_pais
        
//     INNER JOIN 
//         cat_nacionalidad as nacimi ON nacimi.id_nacion = tbl_clientes.Fk_pais_nac
       
//     LEFT JOIN 
//         cat_estado AS nac ON nac.id_estado = tbl_clientes.Fk_estado_nac
        
//     INNER JOIN 
//         cat_nacionalidad as nacionali ON nacionali.id_nacion = tbl_clientes.nacionalidad
        
//     LEFT JOIN 
//         tbl_docs_personales ON tbl_docs_personales.fk_cliente = tbl_clientes.id_cliente
//     WHERE 
//         id_cliente = :id");  // Uso de marcador de posición

// $id = $_POST['id'];  // Asegúrate de obtener el valor de la solicitud POST de manera segura
// $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Vincula la variable $id al marcador de posición

// $stmt->execute();

// $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Obtén el resultado como un array asociativo
// $stmt->closeCursor();

// echo json_encode($resultado);  // Devuelve el resultado en formato JSON
