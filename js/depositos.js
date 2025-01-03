function llenarCampos(idBanco) {
    // Buscar el banco seleccionado por su ID
    const bancoSeleccionado = bancosData.find(banco => banco.id_asignado === parseInt(idBanco));

    if (!bancoSeleccionado) {
        console.error('Banco no encontrado');
        return;
    }

    var moneda = bancoSeleccionado.tipo_moneda;
    var txtmoneda;

    if (moneda == '1') {
        txtmoneda = 'USD'; // Definir las monedas como strings
    } else {
        txtmoneda = 'MXN';
    }
    
    // Llenar los campos automáticamente
    document.getElementById('numeroCuenta').value = bancoSeleccionado.num_cta;
    document.getElementById('titularCuenta').value = bancoSeleccionado.nombre_cta;
    document.getElementById('clave_interbanc').value = bancoSeleccionado.clave_interbanc;
    document.getElementById('tipo_moneda').value = txtmoneda;
    // Agregar más campos según sea necesario
}
function llenarCamposEvent(idBanco) {
    // Buscar el banco seleccionado por su ID
    const bancoSeleccionado = bancosData.find(banco => banco.id_asignado === parseInt(idBanco));

    if (!bancoSeleccionado) {
        console.error('Banco no encontrado');
        return;
    }

    var moneda = bancoSeleccionado.tipo_moneda;
    var txtmoneda;

    if (moneda == '1') {
        txtmoneda = 'USD'; // Definir las monedas como strings
    } else {
        txtmoneda = 'MXN';
    }
    
    // Llenar los campos automáticamente
    document.getElementById('numeroCuentaEvent').value = bancoSeleccionado.num_cta;
    document.getElementById('titularCuentaEvent').value = bancoSeleccionado.nombre_cta;
    document.getElementById('clave_interbancEvent').value = bancoSeleccionado.clave_interbanc;
    document.getElementById('tipo_monedaEvent').value = txtmoneda;
    // Agregar más campos según sea necesario
}



function calcularTitulos() {
    const montoMxn = parseFloat($('#monto_mxn').val().replace(/,/g, ''));
    const fkFondo = $('#fondo').val();
    const fkSerie = $('#serie').val();
    const fecha_mov = $('#fecha_mov').val();
    console.log(montoMxn,' ',fkFondo, ' ',fkSerie, ' ',fecha_mov);

  $.ajax({
    url: 'ajax/depositos/depositos.ajax.php', // Cambia esta URL por la ruta a tu servidor PHP
    method: 'POST',
    data: {
        fk_fondo: fkFondo,
        fk_serie: fkSerie,
        fecha_mov: fecha_mov
    },
    dataType: 'json',
    success: function(response) {
        console.log(response);
        if (response.error) {
            console.error('Error del servidor:', response.error);
            Swal.fire({
                title: "Sin precio?",
                text: " No se encuentra el precio de Merado en esta fecha, revisa o actualiza los precios",
                icon: "question"
              });
            return;
        }

        // Asegúrate de que pmActual es un número
        const pmActual = parseFloat(response.pm_actual);
        $('#pm_actual').val(pmActual);

        if (!isNaN(pmActual) && pmActual > 0) {
            // Redondear el número de títulos a entero
            const titulos = Math.floor(montoMxn / pmActual);
            $('#titulos').val(titulos);

            // Calcular el total de inversión y redondear a dos decimales
            const totalInversion = (titulos * pmActual).toFixed(2);
            $('#monto_inversion').val(totalInversion);
        } else {
            $('#titulos').val(0);
            $('#monto_inversion').val('0.00'); // Asegúrate de mostrar dos decimales
            Swal.fire({
                title: "Sin precio?",
                text: "That thing is still around?",
                icon: "question"
              });
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.error('Error al obtener el precio de mercado:', textStatus, errorThrown);
        console.log(jqXHR.responseText);
        Swal.fire({
            title: "Sin precio?",
            text: " No se encuentra el precio de Merado en esta fecha, revisa o actualiza los precios",
            icon: "question"
          });
    }
});
}

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function handleInput(event) {
    const input = event.target;
    const value = input.value.replace(/,/g, ''); // Eliminar comas existentes
    const formattedValue = formatNumber(value);
    input.value = formattedValue;
}

$(document).ready(function() {
    $('#monto_mxn').on('input', handleInput);
});
$(document).ready(function() {
    $('#monto_mxn, #fondo, #id_serie').on('input', function() {
        calcularTitulos();
    });
});

//     $('#f_deposito_sp').on('submit', function(event) {
//         event.preventDefault(); // Evitar el envío normal del formulario

//         const titulos = parseInt($('#titulos').val());
        
//         // Verificar si el número de títulos es mayor que uno
//         if (titulos > 1) {
//             // Obtener todos los datos del formulario
//             const formData = $(this).serialize();
//             console.log(formData);

//             $.ajax({
//                 url: 'ajax/depositos/depositos.ajax.php', // Cambia esta URL por la ruta a tu servidor PHP
//                 method: 'POST',
//                 data: formData,
//                 dataType: 'json',
//                 success: function(response) {
//                     if (response.success) {
//                         alert('Depósito realizado con éxito');
//                         // Opcional: Puedes agregar lógica adicional aquí, como limpiar el formulario o redirigir al usuario
//                     } else {
//                         alert('Error al realizar el depósito: ' + response.message);
//                     }
//                 },
//                 error: function(jqXHR, textStatus, errorThrown) {
//                     console.error('Error al enviar los datos:', textStatus, errorThrown);
//                     console.log(jqXHR.responseText);
//                     alert('Ocurrió un error al intentar realizar el depósito.');
//                 }
//             });
//         } else {
//             Swal.fire({
//                 icon: "error",
//                 title: "Numero de Titulos en 0",
//                 text: "El numero no es correcto verifica la inversión",
//                 footer: ''
//               });
//         }
//     });
// });

$(document).ready(function() {
    $('#fecha_mov_event').change(function() {
        // Obtener los valores seleccionados
        const fondo = $('#fondoEvent').val();
        const serie = $('#serieEvent').val();
        const fechaMovEvent = $('#fecha_mov_event').val();

        console.log(fondo, serie, fechaMovEvent);

        // Hacer la solicitud AJAX
        $.ajax({
            url: 'ajax/depositos/depositos.ajax.php',  // Cambia esto a tu endpoint real
            method: 'POST',
            data: {
                fondo: fondo,
                serie: serie,
                fecha_mov_event: fechaMovEvent
            },
            dataType: 'json', // Asegurarse de que la respuesta sea tratada como JSON
            success: function(response) {
                // Imprimir la respuesta del servidor en la consola
                console.log('Respuesta del servidor:', response);

                if (response.error) {
                     Swal.fire({
            title: "Sin precio?",
            text: " No se encuentra el precio de Merado en esta fecha, revisa o actualiza los precios",
            icon: "question"
          });
                } else {
                    // Asumiendo que el precio viene en response.pm_actual
                    const pmActual = parseFloat(response.pm_actual);
                    const porcentaje = parseFloat(response.porcentaje);
                    $('#pm_actualEvent').val(pmActual);
                    $('#porcentaje_comision').val(porcentaje);
                    console.log(pmActual);
                    console.log(porcentaje);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el precio:', error);
                console.error('Estado:', xhr.status);
                console.error('Texto del estado:', xhr.statusText);
                console.error('Respuesta del servidor:', xhr.responseText);
                
                // Captura la respuesta completa del servidor para diagnóstico
                console.log('Respuesta completa del servidor:', xhr.responseText);
                
                $('#precio').text('Error al obtener el precio');
            }
        });
    });
});






$(document).ready(function() {
    // Función para realizar la petición AJAX y actualizar la tasa
    function actualizarTasa() {
        // Obtener los valores de los campos
        var fechaSolicitud = $('#fechaSolicitud').val();
        var plazo = $('#plazo').val();
        var tipoInversion = $('#tipoInversion').val();
        var tipoTasa = $('#tipoTasa').val();
        
       

        // Realizar la petición AJAX
        $.ajax({
            url: 'ajax/depositos/depositos.ajax.php', // Cambia esto por la ruta a tu script PHP
            type: 'POST',
            data: {
                fechaSolicitud: fechaSolicitud,
                plazo: plazo,
                tipoInversion: tipoInversion,
                tipoTasa: tipoTasa
            },
            success: function(response) {
                console.log(response);

                // Obtener y asignar la tasa al input
                const tasa = parseFloat(response.resultado);
                $('#tasaBanxico').val(tasa);

                // Mostrar el badge "New" con la fecha del response
                const fecha = response.fecha;
                $('.badge').text(fecha);
                $('.badge').show(); // Mostrar el badge si estaba oculto
            },
            error: function(xhr, status, error) {
                // Imprimir un error en la consola en caso de fallo
                console.error('Error en la petición AJAX:', error);
                console.error('Respuesta del servidor:', xhr.responseText);
            }
        });
    }

    // Evento para cambiar la tasa al cambiar cualquiera de los campos
    $('#tipoTasa').change(actualizarTasa);
});





	