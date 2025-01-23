<?php
class ModeloAutomatico {

static public function mdlRevisonFecha($fecha_pago)
{
    try {
        $stmt = Conexion::conectar()->prepare("SELECT 
           fecha_ejec
        FROM 
            tbl_automatico 
        WHERE 
            fecha_ejec = :fecha;");

        $stmt->bindParam(':fecha', $fecha_pago, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($resultado != '') {
            return 'ejecutado';
        }else{
            return 'go';
        }




          $stmt->closeCursor();

            
    } catch (PDOException $e) {
          error_log('Error en tbl_automatico: ' . $e->getMessage());
        return []; 
    }
}
static public function mdlDetalleBitcoinmxn($fecha_pago)
{
    try {
        $stmt = Conexion::conectar()->prepare("SELECT 
           *
        FROM 
            tbl_detalle_bitcoin 
        WHERE 
            fecha_pago <= :fecha
            
            AND status_pago = 0
            AND t_moneda = 'MXN'
            
            ;");

        $stmt->bindParam(':fecha', $fecha_pago, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


         return $resultado;
      



          $stmt->closeCursor();

            
    } catch (PDOException $e) {
          error_log('Error en tbl_automatico: ' . $e->getMessage());
        return []; 
    }
}
static public function mdlDetalleBitcoinUsd($fecha_pago)
{
    try {
        $stmt = Conexion::conectar()->prepare("SELECT 
           *
        FROM 
            tbl_detalle_bitcoin 
        WHERE 
            fecha_pago <= :fecha
            
            AND status_pago = 0
            AND t_moneda = 'USD'
            
            ;");

        $stmt->bindParam(':fecha', $fecha_pago, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);


         return $resultado;
      



          $stmt->closeCursor();

            
    } catch (PDOException $e) {
          error_log('Error en tbl_automatico: ' . $e->getMessage());
        return []; 
    }
}
static public function mdlSaldoBtc($id_mov_bitcoin)
{
    try {
        $stmt = Conexion::conectar()->prepare("SELECT 
           monto_btc AS saldo_btc
        FROM 
            tbl_clientes_bitcoin 
        WHERE 
            id_mov_bitcoin = :id_mov_bitcoin
            
            
            
            ;");

        $stmt->bindParam(':id_mov_bitcoin', $id_mov_bitcoin, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);


         return $resultado;
      



          $stmt->closeCursor();

            
    } catch (PDOException $e) {
          error_log('Error en tbl_automatico: ' . $e->getMessage());
        return []; 
    }
}
static public function mdlactuLiquidoDetalleBitcoin($id_mov_bitcoin, $cupon, $precioActualBtc)
{
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta
        $stmt = $conn->prepare("UPDATE `tbl_detalle_bitcoin`
            SET 
                `status_pago` = '1', 
                `strike` =  '1', 
                `valor_mxn` = :cupon,
                `valor_btc_aplicado` = :precioActualBtc
            WHERE 
                `id_mov_dbit` = :id_mov;
        ");

        // Vincular parámetros
        $stmt->bindParam(':cupon', $cupon, PDO::PARAM_STR);
        $stmt->bindParam(':id_mov', $id_mov_bitcoin, PDO::PARAM_STR);
        $stmt->bindParam(':precioActualBtc', $precioActualBtc, PDO::PARAM_STR);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            return 'Completados los movimientos detalle de Bitcoin';
        } else {
            return 'Error';
            
        }
    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}
static public function mdlNotificaciones($tema, $texto, $tblorigen, $ident_mov)
{
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO `tbl_notificaions` 
            (`tema_notificacion`, `texto_notificacion`, `tbl_origen`,`ident_mov`) 
            VALUES (:tema, :texto, :tblorigen, :ident_mov)");

        // Vincular parámetros
        $stmt->bindParam(':tema', $tema, PDO::PARAM_STR);
        $stmt->bindParam(':texto', $texto, PDO::PARAM_STR);
        $stmt->bindParam(':tblorigen', $tblorigen, PDO::PARAM_STR);
        $stmt->bindParam(':ident_mov', $ident_mov, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar éxito
        return json_encode([
            'success' => true,
            'message' => 'Notificación insertada correctamente'
        ]);

    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}
static public function mdlInsertFechaAutomatico($fecha)
{
    try {
        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta
        $stmt = $conn->prepare("INSERT INTO `tbl_automatico` (`fecha_ejec`, `ejecutado`, `notas_mov`) 
        VALUES (:fecha, '1', '');");

        // Vincular parámetros
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
       
        // Ejecutar la consulta
        $stmt->execute();

        // Retornar éxito
        return json_encode([
            'success' => true,
            'message' => 'Notificación insertada correctamente'
        ]);

    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}
static public function mdlInsertPrecioBitcoin($fecha)
{
    try {
        // Configuración de la fecha objetivo
        
        $targetDate = date('Y-m-d', strtotime('-1 day', strtotime($fecha)));
        $targetTime = "16:00:00";

        // Convertir la fecha objetivo a timestamp Unix
        $startTimestamp = strtotime("$targetDate $targetTime") * 1000; // En milisegundos
        $endTimestamp = $startTimestamp + (60 * 60 * 1000); // Una hora después

        // Endpoint de Binance para obtener velas históricas
        $symbol = "BTCMXN"; // Par de intercambio
        $apiUrl = "https://api.binance.com/api/v3/klines?symbol=$symbol&interval=1h&startTime=$startTimestamp&endTime=$endTimestamp";

        // Iniciar cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Validar si se obtuvieron datos
        if (empty($data)) {
            return json_encode([
                'success' => false,
                'message' => 'No se encontraron datos para la fecha especificada.'
            ]);
        }

        // Extraer los datos de la primera vela
        $candle = $data[0];
        $openTime = date("Y-m-d H:i:s", $candle[0] / 1000); // Convertir a formato legible
        $openPrice = $candle[1]; // Precio de apertura

        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta para insertar en la tabla bitcoin_historico
        $stmt = $conn->prepare("INSERT INTO `bitcoin_historico` (`fecha`, `precio`) 
                                VALUES (:fecha, :precio);");

        // Vincular parámetros
        $stmt->bindParam(':fecha', $openTime, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $openPrice, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar éxito
        return json_encode([
            'success' => true,
            'message' => 'Precio de Bitcoin insertado correctamente.',
            'data' => [
                'fecha' => $openTime,
                'precio' => $openPrice
            ]
        ]);
    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}
static public function mdlInsertPrecioBitcoinUsd($fecha)
{
    try {
        // Configuración de la fecha objetivo
        $targetDate = date('Y-m-d', strtotime('-1 day', strtotime($fecha)));
        $targetTime = "10:00:00";

        // Convertir la fecha objetivo a timestamp Unix
        $startTimestamp = strtotime("$targetDate $targetTime") * 1000; // En milisegundos
        $endTimestamp = $startTimestamp + (60 * 60 * 1000); // Una hora después

        // Endpoint de Binance para obtener velas históricas
        $symbol = "BTCUSDT"; // Par de intercambio
        $apiUrl = "https://api.binance.com/api/v3/klines?symbol=$symbol&interval=1h&startTime=$startTimestamp&endTime=$endTimestamp";

        // Iniciar cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Validar si se obtuvieron datos
        if (empty($data)) {
            return json_encode([
                'success' => false,
                'message' => 'No se encontraron datos para la fecha especificada.'
            ]);
        }

        // Extraer los datos de la primera vela
        $candle = $data[0];
        $openTime = date("Y-m-d H:i:s", $candle[0] / 1000); // Convertir a formato legible
        $openPrice = $candle[1]; // Precio de apertura

        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta para insertar en la tabla bitcoin_historico
        $stmt = $conn->prepare("INSERT INTO `bitcoin_historico_usd` (`fecha`, `precio`) 
                                VALUES (:fecha, :precio);");

        // Vincular parámetros
        $stmt->bindParam(':fecha', $openTime, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $openPrice, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        // Retornar éxito
        return json_encode([
            'success' => true,
            'message' => 'Precio de Bitcoin insertado correctamente.',
            'data' => [
                'fecha' => $openTime,
                'precio' => $openPrice
            ]
        ]);
    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}
static public function mdlInsertTipoCambioAnual($fecha)
{
    try {
        // Configuración de la fecha objetivo (año actual)
        $targetYear = date('Y', strtotime($fecha));
        $startDate = "$targetYear-01-01";
        $endDate = "$targetYear-12-31";

        // Token y URL para la API de Banxico
        $token = 'a14ef39527884fb354f2f9c6dae886784ead0a6769b1c57838557f09393e7e06'; // Reemplaza con tu token
        $url = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/$startDate/$endDate";

        // Iniciar cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Bmx-Token: $token"
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Validar si se obtuvieron datos
        if (empty($data['bmx']['series'][0]['datos'])) {
            return json_encode([
                'success' => false,
                'message' => 'No se encontraron datos para el año especificado.'
            ]);
        }

        // Conectar a la base de datos
        $conn = Conexion::conectar();

        // Preparar la consulta para insertar en la tabla tipo_cambio
        $stmt = $conn->prepare("INSERT INTO `tbl_cambio_banxico` (`fecha`, `precio`) 
                                VALUES (:fecha, :precio);");

        // Recorrer los datos obtenidos de Banxico
        foreach ($data['bmx']['series'][0]['datos'] as $dato) {
            // Convertir la fecha de formato dd/mm/yyyy a yyyy-mm-dd
            $fecha = $dato['fecha']; // Fecha de tipo de cambio, ejemplo: "01/01/2024"
            $formattedFecha = DateTime::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'); // Formato adecuado

            $precio = $dato['dato']; // Precio de tipo de cambio

            // Vincular parámetros
            $stmt->bindParam(':fecha', $formattedFecha, PDO::PARAM_STR);
            $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);

            // Ejecutar la consulta
            $stmt->execute();
        }

        // Retornar éxito
        return json_encode([
            'success' => true,
            'message' => 'Tipo de cambio del año insertado correctamente.'
        ]);
    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}
static public function mdlInsertarTipoCambioFaltante($fecha)
{
    try {
        // Obtener la última fecha guardada en la base de datos
        $conn = Conexion::conectar();
        $stmt = $conn->prepare("SELECT MAX(`fecha`) AS ultima_fecha FROM `tbl_cambio_banxico`");
        $stmt->execute();
        $ultimaFecha = $stmt->fetch(PDO::FETCH_ASSOC)['ultima_fecha'];

        // Si no hay datos en la base de datos, comenzamos desde la fecha proporcionada
        if (!$ultimaFecha) {
            $ultimaFecha = $fecha; // Fecha proporcionada como punto de partida
        }

        // Convertir la última fecha guardada y la fecha actual a objetos DateTime
        $ultimaFechaObj = new DateTime($ultimaFecha);
        $fechaObj = new DateTime($fecha);
        
        // Verificar si ya es la fecha actual o si necesitamos insertar días faltantes
        if ($fechaObj <= $ultimaFechaObj) {
            return json_encode([
                'success' => false,
                'message' => 'La fecha proporcionada es anterior o igual a la última fecha registrada.'
            ]);
        }

        // Token y URL para la API de Banxico
        $token = 'a14ef39527884fb354f2f9c6dae886784ead0a6769b1c57838557f09393e7e06'; // Reemplaza con tu token
        $url = "https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/".$ultimaFechaObj->format('Y-m-d')."/".$fechaObj->format('Y-m-d');

        // Iniciar cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Bmx-Token: $token"
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta JSON
        $data = json_decode($response, true);

        // Validar si se obtuvieron datos
        if (empty($data['bmx']['series'][0]['datos'])) {
            return json_encode([
                'success' => false,
                'message' => 'No se encontraron datos para las fechas faltantes.'
            ]);
        }

        // Preparar la consulta para insertar en la tabla tipo_cambio
        $stmt = $conn->prepare("INSERT INTO `tbl_cambio_banxico` (`fecha`, `precio`) 
                                VALUES (:fecha, :precio);");

        // Recorrer los datos obtenidos de Banxico
        foreach ($data['bmx']['series'][0]['datos'] as $dato) {
            // Convertir la fecha de formato dd/mm/yyyy a yyyy-mm-dd
            $fecha = $dato['fecha']; // Fecha de tipo de cambio, ejemplo: "01/01/2024"
            $formattedFecha = DateTime::createFromFormat('d/m/Y', $fecha)->format('Y-m-d'); // Formato adecuado

            // Solo insertar si es un día hábil (lunes a viernes)
            $fechaObj = new DateTime($formattedFecha);
            if ($fechaObj->format('N') >= 1 && $fechaObj->format('N') <= 5) {
                // Vincular parámetros
                $stmt->bindParam(':fecha', $formattedFecha, PDO::PARAM_STR);
                $stmt->bindParam(':precio', $dato['dato'], PDO::PARAM_STR);
                
                // Ejecutar la consulta
                $stmt->execute();
            }
        }

        // Retornar éxito
        return json_encode([
            'success' => true,
            'message' => 'Fechas faltantes de tipo de cambio insertadas correctamente.'
        ]);
    } catch (Exception $e) {
        // Manejo de errores
        return json_encode([
            'success' => false,
            'message' => 'Excepción: ' . $e->getMessage()
        ]);
    }
}






    

}