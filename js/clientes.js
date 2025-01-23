// $(document).ready(function() {
//     // Captura el clic en el botón
//     $('#perfilCliente').on('click', function() {
//         // Obtiene el valor del atributo data-id
//         var clienteId = $(this).data('id');
        
//         // Realiza la solicitud AJAX
//         $.ajax({
//             type: 'POST',
//             url: 'ajax/clientes/perfil_cliente.php',
//             data: { id: clienteId },
//             dataType: 'json',  // Especifica que esperas datos en formato JSON
//             success: function(response) {
//                 // Imprime la respuesta en la consola
//                 console.log(response);


//                 function asignarValor(elementoId, valor) {
//                     $('#' + elementoId).text(valor);
//                 }

//             $('#Fk_estado_nac').val(response.Fk_estado_nac);
//             $('#calle').val(response.calle);
//             $('#ciudad').val(response.ciudad);
//             $('#clave_elector').val(response.clave_elector);
//             $('#cod_postal').val(response.cod_postal);
//             $('#colonia').val(response.colonia);
//             $('#cuestionario_inver_img').val(response.cuestionario_inver_img);
//             $('#curp').val(response.curp);
//             $('#curp_cotitular_img').val(response.curp_cotitular_img);
//             $('#curp_img').val(response.curp_img);
//             $('#desc_municipio').val(response.desc_municipio);
//             $('#domicilio_img').val(response.domicilio_img);
//             $('#edo_cuenta_img').val(response.edo_cuenta_img);
//             $('#email').val(response.email);
//             $('#email2').val(response.email2);
//             $('#estado_civil').val(response.estado_civil);
//             $('#estado_nac').val(response.estado_nac);
//             $('#fecha_nacimiento').val(response.fecha_nacimiento);
//             $('#id_cliente').val(response.id_cliente);
//             $('#ine_anverso').val(response.ine_anverso);
//             $('#ine_anverso_cotitutar').val(response.ine_anverso_cotitutar);
//             $('#ine_reverso').val(response.ine_reverso);
//             $('#ine_reverso_cotitular').val(response.ine_reverso_cotitular);
//             $('#nacionalidad').val(response.nacionalidad);
//             $('#nom_estado').val(response.nom_estado);
//             $('#nom_localidad').val(response.nom_localidad);
//             $('#nombre_cliente').val(response.nombre_cliente);
//             $('#nombre_conyugue').val(response.nombre_conyugue);
//             $('#num_dep_eco').val(response.num_dep_eco);
//             $('#num_ext').val(response.num_ext);
//             $('#num_hijos').val(response.num_hijos);
//             $('#num_int').val(response.num_int);
//             $('#pais_nac').val(response.pais_nac);
//             $('#religion').val(response.religion);
//             $('#rfc').val(response.rfc);
//             $('#sexo').val(response.sexo);
//             $('#situacion_fiscal_cotitular_img').val(response.situacion_fiscal_cotitular_img);
//             $('#situacion_fiscal_img').val(response.situacion_fiscal_img);
//             $('#tel_casa').val(response.tel_casa);
//             $('#tel_celular').val(response.tel_celular);
//             $('#tel_oficina').val(response.tel_oficina);
//             $('#tel_otro').val(response.tel_otro);
//             $('#tipo_cliente').val(response.tipo_cliente);
//             $('#tipo_identificacion').val(response.tipo_identificacion);
                
//                 // // Por ejemplo, puedes mostrar los datos en el modal
//                 // $('#modal-body').html('Nombre: ' + response.nombre + '<br>Email: ' + response.email);
//                 $('#exampleFullScreenModal').modal('show');
//             },
//             error: function(xhr, status, error) {
//                 console.log("Error al enviar la solicitud POST");
//                 console.log(xhr.responseText); // Muestra detalles del error en la consola
//             }  // Aquí estaba el error en tu código
//         });
//     });
// });
