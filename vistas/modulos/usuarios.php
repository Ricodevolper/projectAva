<?php

if (isset($_POST['Nombre_Completo'])) {
 $crearUsuario = new ControladorUsuarios();
 $crearUsuario->ctrCrearUsuario();
}
if (isset($_POST['Editar_Nombre'])) {
 $crearUsuario = new ControladorUsuarios();
 $crearUsuario->ctrEditarUsuario();
}
 $usuarios = ControladorUsuarios::ctrUsuarios();

//  print_r($usuarios)

if ($_SESSION['perfil'] == 'administrador') {


 ?>
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
   
      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
             
              <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
             
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
              <div class="btn-group">
              <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Agregar_Usuario">
              <i class="fadeIn animated bx bx-user-plus"></i>
             </button>
                
              </div>
            </div>
      </div>

      <h6 class="mb-0 text-uppercase">Tabla Usuarios</h6>
        <hr>
        <div class="card">
          <div class="card-body">
            <table class="table mb-0 table-hover">
              <thead>
                <tr>
                      <th scope="col" >Id de Usuario</th>
                      <th scope="col" >Nombre de Usuario</th>
                      <th scope="col" >Perfil de Usuario</th>
                      <th scope="col" >Usuario Sistema</th>
                      <th scope="col" >Fecha de Alta</th>
                      <th scope="col" >Estatus</th>
                      <th scope="col" >Acciones</th>
                      <th scope="col" >Bloqueo</th>
                      <th scope="col" >Permisos</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  
                  foreach ($usuarios as $usuario) {
                   
                  
                  
                  ?>
                  <tr scope = "row" >
                  <td><?=$usuario["Id_usuario"]?></td>
                  <td><?=$usuario["Nombre_Usuario"]?></td>
                  <td><?=$usuario["Perfil_usuario"]?></td>
                  <td><?=$usuario["Email_usuario"]?></td>
                  <td><?=$usuario["Fecha_alta"]?></td>
                  <td>
                  <?php
              if ($usuario['Estatus_Usuario'] == 0) {
                  echo '<button class="btn btn-success btn-sm btn-status" data-id="' . $usuario['Email_usuario'] . '">Activo</button>';
              } else {
                  echo '<button class="btn btn-danger btn-sm btn-status" data-id="' . $usuario['Email_usuario'] . '">Inactivo</button>';
              }
                  ?>
                  </td>
                  <td>
                  <button type="button" class="btn btn-info btn-sm editar-contraseña-button " id = "Contraseña"  data-toggle="modal" data-target="#Actualizar_Contrasena_Usuario" ><i class="fadeIn animated bx bx-key"></i></button>
                  <button type="button" class="btn btn-warning btn-sm edit-button" data-id="<?=$usuario['Email_usuario']?>" 
                  data-toggle="modal" data-target="#Editar_Usuario"><i class="fadeIn animated bx bx-id-card"></i></button>
                  <button type="button" class="btn btn-danger btn-sm eliminar-button" id = "Eliminar"data-id="<?=$usuario['Email_usuario']?>" 
                  data-toggle="modal" data-target="#Eliminar_Usuario"> <i class="fadeIn animated bx bx-user-minus"></i></button>
                  
                  </td>
                  <td>
                    <?php 
                    
                    if ($usuario['Bloqueo_Usuario'] == 0) {
                      echo '<button class="btn btn-success btn-sm btn-block"data-id="' . $usuario['Email_usuario'] . '" >Inactivo</button>';
                    }else{
                      echo '<button class="btn btn-danger btn-sm btn-block" data-id="' . $usuario['Email_usuario'] . '">Bloqueado</button>';
                    }
                    ?>
                  </td>
                  <td>
                    <form action="editarPermiso" method="POST">
                    <input type="hidden" id="emailPermisos" name="emailPermisos" value="<?=$usuario['Email_usuario']?>" >
                 <button  type="submit" class="btn btn-primary  radius-30">Editar</button>
                 </form>
                       
                
                  </td> 
                  </tr>
                    <?php
                    
                   }
                    
                    ?>
                 

                  </tbody>
            </table>
          </div>
        </div>


<!-- Modal -->
<div class="modal fade" id="Agregar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" inert>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        <form id="form_Usuario" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Nombre_Completo">Nombre Completo <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="Nombre_Completo" required="required" class="form-control">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="mail">Email <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="email"  required="required" class="form-control" name="mail">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Perfil">Perfil <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <select name="perfil" class="form-select mb-3">>
                <option value=""></option>
                <option value="administrador">Admin</option>
                <option value="gerente">Gerente</option>
                <option value="reportes">Analisis</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Contraseña</label>
            <div class="col-md-6 col-sm-6">
              <input  class="form-control" type="password" name="password">
            </div>
          </div>
          <div id="message"></div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="editar-button">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="Editar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" inert>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" style="color:black" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_Editar_Usuario" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Nombre_Completo">Nombre Completo <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <input type="text" name="Editar_Nombre" id="Nombre_Completo" required="required" class="form-control">
            <input type="hidden" name="Id_Usuario" id="Id_Usuario" required="required" class="form-control">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="mail">Email <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <input type="email" id="mail" required="required" class="form-control" name="Editar_mail">
            </div>
          </div>

          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Perfil">Perfil <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <select name="editar_perfil" id="Perfil" class="form-select mb-3">
                <option value=""></option>
                <option value="administrador">Admin</option>
                <option value="gerente">Gerente</option>
                <option value="reportes">Analisis</option>
              </select>
            </div>
          </div>
          
          <div id="message1"></div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-warning" id="editar-button1">Editar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="Eliminar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" inert>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title " style="color:white" id="">Eliminar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_Eliminar_Usuario" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Nombre_Completo_Eliminar">Nombre Completo <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <input type="text" name="Nombre_Completo_Eliminar" id="Nombre_Completo_Eliminar" required="required" class="form-control" disabled>
            <input type="hidden" name="Id_Usuario_Eliminar" id="Id_Usuario_Eliminar" required="required" class="form-control">
            </div>
          </div>

         
         
          

         

         
          
       
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger" id="editar-button1">Eliminar</button>
      </div>
      </form>
    </div>
  </div>
</div>






<div class="modal fade" id="Actualizar_Contrasena_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" inert>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title " style="color:white">Actualizar Contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>




      <div class="modal-body">
        <form id="form_Actualizar_Contrasena_Usuario" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="#">
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Nombre_Completo_Contraseña">Nombre Completo <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="text" name="Nombre_Completo_Contraseña" id="Nombre_Completo_Contraseña" required="required" class="form-control" disabled >
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Nueva_Contrasena">Nueva Contraseña <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="password" name="Nueva_Contrasena" id="Nueva_Contrasena" required="required" class="form-control">
            </div>
          </div>
          <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="Confirmar_Contrasena">Confirmar Contraseña <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
              <input type="password" name="Confirmar_Contrasena" id="Confirmar_Contrasena" required="required" class="form-control">
            </div>
          </div>
          <input type="hidden" name="Id_Usuario_Actualizar_Contrasena" id="Id_Usuario_Actualizar_Contrasena" required="required" class="form-control">
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary "  id="editar-contraseña">Actualizar Contraseña</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
   document.getElementById("password").addEventListener("keyup", function() {
       var password = this.value;
       var hasUpperCase = /[A-Z]/.test(password);
       var hasLowerCase = /[a-z]/.test(password);
       var hasNumbers = /\d/.test(password);
       var hasSpecialCharacters = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\"\'\-=]/.test(password);

       if (hasUpperCase && hasLowerCase && hasNumbers && !hasSpecialCharacters) {
           document.getElementById("message").innerHTML = "Contraseña válida";
           document.getElementById("message").style.color = "green";
       } else {
           document.getElementById("message").innerHTML = "La contraseña debe contener números, letras mayúsculas y minúsculas, y no debe contener caracteres especiales.";
           document.getElementById("message").style.color = "red";
       }
   });
   document.getElementById("password1").addEventListener("keyup", function() {
       var password = this.value;
       var hasUpperCase = /[A-Z]/.test(password);
       var hasLowerCase = /[a-z]/.test(password);
       var hasNumbers = /\d/.test(password);
       var hasSpecialCharacters = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/\"\'\-=]/.test(password);

       if (hasUpperCase && hasLowerCase && hasNumbers && !hasSpecialCharacters) {
           document.getElementById("message1").innerHTML = "Contraseña válida";
           document.getElementById("message1").style.color = "green";
       } else {
           document.getElementById("message1").innerHTML = "La contraseña debe contener números, letras mayúsculas y minúsculas, y no debe contener caracteres especiales.";
           document.getElementById("message1").style.color = "red";
       }
   });
</script>




<script src="js/usuarios.js" ></script>


<?php
}else{

  // Redirigir a otra URL después de 5 segundos
$url = 'sinpermiso';
$tiempo_espera = 5; // en segundos

// Utilizamos la función header() para enviar la cabecera de redirección
header("refresh:5;url=inicio");

// Mostramos un mensaje mientras espera
echo "Redireccionando a $url en $tiempo_espera segundos...";
}


?>