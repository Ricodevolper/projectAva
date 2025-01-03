$(document).ready(function () {
    // Escuchar el clic en los botones
    $('button[data-id].btn-status').on('click', function () {
        var button = $(this);
        var id = button.data('id');
        var newStatus = 0; // Por defecto, queremos activar el usuario

        if (button.hasClass('btn-success')) {
            newStatus = 1; // Si el botón actual es Activo, entonces queremos inactivarlo.
        }

        // Utilizar SweetAlert2 para mostrar una alerta de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: newStatus === 1 ? '¿Deseas inactivar este usuario?' : '¿Deseas activar este usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud AJAX para actualizar el estado en la base de datos
                $.ajax({
                    url: 'ajax/usuarios/actualizar_estado.php', // Ruta al archivo PHP que maneja la actualización
                    method: 'POST',
                    data: { id: id, newStatus: newStatus },
                    success: function (response) {
                        // Actualizar el botón y su texto en función de la respuesta
                        if (newStatus === 1) {
                            button.removeClass('btn-success').addClass('btn-danger').text('Inactivo');
                        } else {
                            button.removeClass('btn-danger').addClass('btn-success').text('Activo');
                        }
                        console.log("Solicitud POST enviada con éxito");
                        console.log(response); // Muestra la respuesta del servidor en la consola
                    },
                    error: function (xhr, status, error) {
                        console.log("Error al enviar la solicitud POST");
                        console.log(xhr.responseText); // Muestra detalles del error en la consola
                    }
                });
            }
        });
    });
});





$(document).ready(function () {
    // Escuchar el clic en los botones para cambiar el estado de bloqueo
    $('button[data-id].btn-block').on('click', function () {
        var button = $(this);
        var id = button.data('id');
        var newBlockStatus = 1; // Por defecto, queremos bloquear el usuario

        if (button.hasClass('btn-danger')) {
            newBlockStatus = 0; // Si el botón actual es Bloqueado, entonces queremos desbloquearlo.
        }

        // Utilizar SweetAlert2 para mostrar una alerta de confirmación
        Swal.fire({
            title: '¿Estás seguro?',
            text: '¿Deseas cambiar el estado de bloqueo del usuario?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud AJAX para actualizar el estado de bloqueo en la base de datos
                $.ajax({
                    url: 'ajax/usuarios/actualizar_bloqueo.php',
                    method: 'POST',
                    data: { id: id, newBlockStatus: newBlockStatus },
                    success: function (response) {
                        // Actualizar el botón y su texto en función de la respuesta
                        if (newBlockStatus === 0) {
                            button.removeClass('btn-danger').addClass('btn-success').text('No Bloqueado');
                        } else {
                            button.removeClass('btn-success').addClass('btn-danger').text('Bloqueado');
                        }
                        console.log("Solicitud POST enviada con éxito");
                        console.log(response); // Muestra la respuesta del servidor en la consola
                    },
                    error: function (xhr, status, error) {
                        console.log("Error al enviar la solicitud POST");
                        console.log(xhr.responseText); // Muestra detalles del error en la consola
                    }
                });
            }
        });
    });
});
$(document).ready(function() {
    $('.edit-button').click(function() {
      // Obtén los datos del usuario de la fila de la tabla
      var $row = $(this).closest('tr');
      var idUsuario = $row.find('td:eq(0)').text();
      var nombreCompleto = $row.find('td:eq(1)').text();
      var perfil = $row.find('td:eq(2)').text();
      var email = $row.find('td:eq(3)').text();
      var fechaAlta = $row.find('td:eq(4)').text();
  
      // Llena los campos del formulario en el modal con los datos del usuario
      $('#Id_Usuario').val(idUsuario);
      $('#Nombre_Completo').val(nombreCompleto);
      $('#mail').val(email);
      $('#Perfil').val(perfil);
      $('#password').val(""); // Deja la contraseña en blanco o implementa tu lógica para manejarla
  
      // Abre el modal
      $('#Editar_Usuario').modal('show');
    });
  });
  

  $(document).ready(function() {
    // Presentar el formulario utilizando Ajax
    $("#form_Editar_Usuario").submit(function(e) {
      e.preventDefault(); // Evita la presentación de formulario por defecto

      // Muestra una advertencia de confirmación con SweetAlert2
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Se actualizarán los datos.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, actualizar',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
          // Si se confirma, obten los datos del formulario y envía la solicitud Ajax
          var formData = $(this).serialize();

          $.ajax({
            type: "POST",
            url: "ajax/usuarios/editar_usuario.php", // Reemplaza con tu endpoint real de actualización
            data: formData,
            success: function(response) {
              // Maneja la respuesta del servidor (si es necesario)
              console.log("Respuesta del servidor:", response);
            //   console.log(response);

              // Cierra el modal o realiza cualquier otra acción
              $("#Editar_Usuario").modal("hide");
              if (response == 'ok') {
                // Muestra una alerta de éxito con SweetAlert2
                Swal.fire({
                    title: '¡Datos actualizados!',
                    text: 'Los datos se han actualizado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    // Recarga la página después de hacer clic en 'Ok'
                    if (result.isConfirmed || result.isDismissed) {
                      location.reload();
                    }
                  });
                }else {
                // Muestra una alerta de error con SweetAlert2
                Swal.fire({
                  title: 'Error',
                  text: 'Hubo un error al actualizar los datos.',
                  icon: 'error',
                });
              }
            },
            error: function(error) {
              // Maneja errores (si es necesario)
              console.error("Error en la solicitud Ajax:", error);
            }
          });
        }
      });
    });
  });


  $(document).ready(function() {
    $('.eliminar-button').click(function() {
      // Obtén los datos del usuario de la fila de la tabla
      var $row = $(this).closest('tr');
      var idUsuarioEliminar = $row.find('td:eq(0)').text();
      var nombreCompletoEliminar = $row.find('td:eq(1)').text();
      
  
      // Llena los campos del formulario en el modal con los datos del usuario
      $('#Id_Usuario_Eliminar').val(idUsuarioEliminar);
      $('#Nombre_Completo_Eliminar').val(nombreCompletoEliminar);
     
  
      // Abre el modal
      $('#Eliminar_Usuario').modal('show');
    });
  });
  

  $(document).ready(function() {
    // Presentar el formulario utilizando Ajax
    $("#form_Eliminar_Usuario").submit(function(e) {
      e.preventDefault(); // Evita la presentación de formulario por defecto

      // Muestra una advertencia de confirmación con SweetAlert2
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Se Eliminara este Usuario.',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Sí, Eliminar',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.isConfirmed) {
          // Si se confirma, obten los datos del formulario y envía la solicitud Ajax
          var formData = $(this).serialize();

          $.ajax({
            type: "POST",
            url: "ajax/usuarios/eliminar_usuario.php", // Reemplaza con tu endpoint real de actualización
            data: formData,
            success: function(response) {
              // Maneja la respuesta del servidor (si es necesario)
              console.log("Respuesta del servidor:", response);
            //   console.log(response);

              // Cierra el modal o realiza cualquier otra acción
              $("#Eliminar_Usuario").modal("hide");
              if (response == 'ok') {
                // Muestra una alerta de éxito con SweetAlert2
                Swal.fire({
                    title: '¡Usuario Eliminado!',
                    text: 'Los datos se han Eliminado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    // Recarga la página después de hacer clic en 'Ok'
                    if (result.isConfirmed || result.isDismissed) {
                      location.reload();
                    }
                  });
                }else {
                // Muestra una alerta de error con SweetAlert2
                Swal.fire({
                  title: 'Error',
                  text: 'Hubo un error al actualizar los datos.',
                  icon: 'error',
                });
              }
            },
            error: function(error) {
              // Maneja errores (si es necesario)
              console.error("Error en la solicitud Ajax:", error);
            }
          });
        }
      });
    });
  });



  $(document).ready(function() {
    $('.editar-contraseña-button').click(function() {
      // Obtén los datos del usuario de la fila de la tabla
      var $row = $(this).closest('tr');
      var idUsuarioContraseña = $row.find('td:eq(0)').text();
      var nombreCompletoContraseña = $row.find('td:eq(1)').text();
      
  
      // Llena los campos del formulario en el modal con los datos del usuario
      $('#Id_Usuario_Actualizar_Contrasena').val(idUsuarioContraseña);
      $('#Nombre_Completo_Contraseña').val(nombreCompletoContraseña);
     
  
      // Abre el modal
      $('#Actualizar_Contrasena_Usuario').modal('show');
    });
  });


   // Función para verificar si las contraseñas coinciden
   function verificarContrasenas() {
    var nuevaContrasena = document.getElementById('Nueva_Contrasena').value;
    var confirmarContrasena = document.getElementById('Confirmar_Contrasena').value;

    if (nuevaContrasena !== confirmarContrasena) {
      // Muestra un mensaje de error
      Swal.fire({
        title: 'Error',
        text: 'Las contraseñas no coinciden. Por favor, verifícalas.',
        icon: 'error',
      });

      // Devuelve falso para evitar enviar el formulario
      return false;
    }

    // Las contraseñas coinciden
    return true;
  }




function verificarContrasenas() {
    var nuevaContrasena = document.getElementById('Nueva_Contrasena').value;
    var confirmarContrasena = document.getElementById('Confirmar_Contrasena').value;

    if (nuevaContrasena !== confirmarContrasena) {
      // Muestra un mensaje de error
      Swal.fire({
        title: 'Error',
        text: 'Las contraseñas no coinciden. Por favor, verifícalas.',
        icon: 'error',
      });

      // Devuelve falso para evitar enviar el formulario
      return false;
    }else{

    // Las contraseñas coinciden
    return true;
}
  }



  $(document).ready(function() {
    $("#form_Actualizar_Contrasena_Usuario").submit(function(e) {
      e.preventDefault(); // Evita la presentación de formulario por defecto
  
      // Verifica las contraseñas antes de enviar el formulario
      if (verificarContrasenas() == true) {
        Swal.fire({
          title: '¿Estás seguro?',
          text: 'Se actualizara la contraseña.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, actualizar',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.isConfirmed) {
            // Si se confirma, obten los datos del formulario y envía la solicitud Ajax
            var formData = $(this).serialize();
  
            $.ajax({
              type: "POST",
              url: "ajax/usuarios/Actualizar_contraseña_usuario.php", // Reemplaza con tu endpoint real de actualización
              data: formData,
              success: function(response) {
                // Maneja la respuesta del servidor (si es necesario)
                console.log("Respuesta del servidor:", response);
  
                // Cierra el modal o realiza cualquier otra acción
                $("#Actualizar_Contrasena_Usuario").modal("hide");
                if (response == 'ok') {
                  // Muestra una alerta de éxito con SweetAlert2
                  Swal.fire({
                    title: '¡Datos actualizados!',
                    text: 'Los datos se han actualizado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                  }).then((result) => {
                    // Recarga la página después de hacer clic en 'Ok'
                    if (result.isConfirmed || result.isDismissed) {
                      location.reload();
                    }
                  });
                } else {
                  // Muestra una alerta de error con SweetAlert2
                  Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al actualizar los datos.',
                    icon: 'error',
                  });
                }
              },
              error: function(error) {
                // Maneja errores (si es necesario)
                console.error("Error en la solicitud Ajax:", error);
              }
            });
          }
        });
      }
    });
  });
  