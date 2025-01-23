<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../../modelos/conexion.php';


class ClientesAjax{
  static public function mdlMunicipios($id_estado)
  {
      try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM cat_municipio WHERE  fk_estado = :id ");
          
          $stmt->bindParam(':id', $id_estado, PDO::PARAM_INT);

          $stmt->execute();

          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $stmt->closeCursor();

          return $resultado;
      } catch (PDOException $e) {
          error_log('Error en mdlCuentasContablesCliente: ' . $e->getMessage());
          return [];
      }
  }
  static public function mdllocalidad($id_municipio )
  {
      try {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM cat_localidad WHERE  fk_municipio = :id  ");
          
          $stmt->bindParam(':id', $id_municipio, PDO::PARAM_INT);

          $stmt->execute();

          $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $stmt->closeCursor();

          return $resultado;
      } catch (PDOException $e) {
          error_log('Error en mdlCuentasContablesCliente: ' . $e->getMessage());
          return [];
      }
  }
}
if (isset($_POST['id_estado'])) {
  header('Content-Type: application/json');
  $id_estado = $_POST['id_estado'];
// Obtener municipios del controlador
$municipios = ClientesAjax::mdlMunicipios($id_estado);

// Devolver municipios como JSON
echo json_encode($municipios);
}
if (isset($_POST['id_municipio'])) {
  header('Content-Type: application/json');
  $id_municipio = $_POST['id_municipio'];
// Obtener municipios del controlador
$localidades = ClientesAjax::mdllocalidad($id_municipio);

// Devolver localidades como JSON
echo json_encode($localidades);
}




  