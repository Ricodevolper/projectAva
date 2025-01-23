<?php 
 $id_cliente = $_POST['id_cliente']; 
 $num_contrato = $_POST['num_contrato']; 
 $fecha_mov = $_POST['fecha_mov']; 


 



$fecha_act = date('Y-m-d'); 
$ultimo_dia_mes = date('Y-m-t', strtotime('last month')); 
$dia_semana = date('N', strtotime($ultimo_dia_mes)); 
if ($dia_semana == 6) { 
    $fecha_ant = date('Y-m-d', strtotime($ultimo_dia_mes . ' -1 day')); 
} elseif ($dia_semana == 7) { 
    $fecha_ant = date('Y-m-d', strtotime($ultimo_dia_mes . ' -2 days')); 
} else {
    $fecha_ant = $ultimo_dia_mes; 
}


if (isset($_POST['consulta'])) {
   $ultimo_dia_mes = $_POST['fecha_inicio'] ;
   $fecha_act = $_POST['fecha_final'] ;
}



 $datosInversion = ControladorDepositos::ctrRendimientoSp($id_cliente, $num_contrato, $fecha_mov);
 $datosCliente = ControladorClientes::ctrBuscarClienteId($id_cliente);



 foreach ($datosInversion as $detalle ) {
   if ($detalle['fecha_rendimiento'] == $fecha_ant) {
    $saldo_anterior =  $detalle['nuevo_saldo'];
   }
   if ($detalle['fecha_rendimiento'] == $fecha_act) {
    $saldo_actual =  $detalle['nuevo_saldo'];
   }
 }
?>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      

      <style>
                    .account-details {
                display: flex; /* Flexbox para alinear horizontalmente */
                justify-content: space-between; /* Espacio entre los elementos */
                gap: 20px; /* Espaciado opcional entre elementos */
            }

            .account-value {
                display: inline-block;
            }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .header {
            background-color: #f7f7f7;
            padding: 20px;
        }
        .header img {
            max-width: 125px;
        }
        .header .info {
            text-align: right;
        }
        .summary {
            padding: 20px;
        }
        .summary h2 {
            margin: 0;
        }
        .content-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .col-6 {
            flex: 0 0 48%; /* Ajusta el ancho al 48% con un pequeño espacio entre columnas */
            box-sizing: border-box;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 0.9em;
            background-color: #f7f7f7;
        }
      </style>

      <?php
    // Datos fijos simulados
    $account_holder = "ANTONIO GARDUNO VACA";
    $account_number = "6297-1650";
    $statement_period = "October 1-31, 2024";
    $beginning_value = 379552.08;
    $ending_value = 376386.66;
    $deposits = 0.00;
    $withdrawals = -23300.00;
    $dividends = 4125.30;
    $transfers = 0.00;
    $market_appreciation = 16140.60;
    $expenses = -131.32;
    ?>
       <form action="#" method="POST">
    <div class="row align-items-center g-3">
        <!-- Primer input Fecha Inicio -->
        <div class="col-auto">
            <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
            <input
                type="date"
                class="form-control"
                name="fecha_inicio"
                id="fecha_inicio"
                placeholder="dd/mm/yyyy"
            />
            <small class="form-text text-muted">Inicio de Estado de cuenta</small>
        </div>

        <!-- Input Fecha Final -->
        <div class="col-auto">
            <label for="fecha_final" class="form-label">Fecha Final:</label>
            <input
                type="date"
                class="form-control"
                name="fecha_final"
                id="fecha_final"
                placeholder="dd/mm/yyyy"
            />
            <small class="form-text text-muted">Fin de Estado de cuenta</small>
        </div>

        <!-- Tres inputs hidden -->
        <div class="col-auto">
            <input type="hidden" name="id_cliente" value="<?=$id_cliente?>">
            <input type="hidden" name="num_contrato" value="<?=$num_contrato?>">
            <input type="hidden" name="fecha_mov" value="<?=$fecha_mov?>">
            <input type="hidden" name="consulta" value="1">
        </div>

        <!-- Botón submit -->
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>




</div>

     
    <div id="statement-content">
        <div class="header">
            <div style="display: flex; justify-content: space-between;">
                <img src="images/default2.png" alt="Schwab Logo">
                <div class="info">
                    <p><strong>Nombre Cliente:</strong> <?=$datosCliente[0]['nombre_clte'].' '.$datosCliente[0]['apaterno_clte'].' '.$datosCliente[0]['amaterno_clte']  ?> 
                    <br>
                    <strong> Numero de Contrato: </strong> <?= $num_contrato ?><br>
                   <strong>RFC: </strong> <?= $datosCliente[0]['rfc'] ?></p>
                </div>
            </div>
        </div>

        <div class="summary">
            <h2>Account Summary</h2>
            <hr>
            <div class="account-details">
                    <div class="account-value">
                        <strong>Ending Account Value as of <?=$ultimo_dia_mes?>:</strong> $<?= number_format( $saldo_anterior, 2) ?>
                    </div>
                    <div class="account-value">
                        <strong>Beginning Account Value as of <?=$fecha_act?>:</strong> $<?= number_format( $saldo_actual, 2) ?>
                    </div>
                </div>
                <br>
               

            <div class="content-row">
                <div class="col-6">
                    <h3>Account Value Chart</h3>
                    <div id="chart"></div>
                </div>
                <div class="col-6">
                    <h3>Account Details</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>This Statement</th>
                                <th>YTD</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Beginning Value</td>
                                <td>$<?= number_format($beginning_value, 2) ?></td>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <td>Deposits</td>
                                <td>$<?= number_format($deposits, 2) ?></td>
                                <td>$396,596.80</td>
                            </tr>
                            <tr>
                                <td>Withdrawals</td>
                                <td>($<?= number_format(abs($withdrawals), 2) ?>)</td>
                                <td>($372,800.00)</td>
                            </tr>
                            <tr>
                                <td>Dividends and Interest</td>
                                <td>$<?= number_format($dividends, 2) ?></td>
                                <td>$10,739.78</td>
                            </tr>
                            <tr>
                                <td>Transfer of Securities</td>
                                <td>$<?= number_format($transfers, 2) ?></td>
                                <td>$444,430.18</td>
                            </tr>
                            <tr>
                                <td>Market Appreciation/(Depreciation)</td>
                                <td>$<?= number_format($market_appreciation, 2) ?></td>
                                <td>($102,448.78)</td>
                            </tr>
                            <tr>
                                <td>Expenses</td>
                                <td>($<?= number_format(abs($expenses), 2) ?>)</td>
                                <td>($131.32)</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Ending Value</th>
                                <th>$<?= number_format($ending_value, 2) ?></th>
                                <th>$<?= number_format($ending_value, 2) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="second-page" style="page-break-before: always;">
        <div class="header">
        <div class="header">
            <div style="display: flex; justify-content: space-between;">
                <img src="images/default2.png" alt="Schwab Logo">
                <div class="info">
                    <p><strong>Nombre Cliente:</strong> <?=$datosCliente[0]['nombre_clte'].' '.$datosCliente[0]['apaterno_clte'].' '.$datosCliente[0]['amaterno_clte']  ?> 
                    <br>
                    <strong> Numero de Contrato: </strong> <?= $num_contrato ?><br>
                   <strong>RFC: </strong> <?= $datosCliente[0]['rfc'] ?></p>
                </div>
            </div>
        </div>
        </div>
        <div class="content">
       
    
    <hr>
    <div class="content-row">
    <!-- Top Account Holdings -->
    <div class="col-3">
        <h3>Top Account Holdings This Period</h3>
        <table>
            <thead>
                <tr>
                    <th>Symbol</th>
                    <th>Description</th>
                    <th>Market Value</th>
                    <th>% of Account</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>SPXS</td>
                    <td>DIREXION DAILY S&P 500</td>
                    <td>$242,652.02</td>
                    <td>64%</td>
                </tr>
                <tr>
                    <td>SQQQ</td>
                    <td>PROSHARES ULTRAPRO SHORT</td>
                    <td>$125,498.80</td>
                    <td>33%</td>
                </tr>
                <tr>
                    <td>Cash</td>
                    <td></td>
                    <td>$8,235.84</td>
                    <td>2%</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Gain or Loss Summary -->
    <div class="col-4">
        <h3>Gain or (Loss) Summary</h3>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Gain</th>
                    <th>(Loss)</th>
                    <th>Net</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Short-Term (ST)</td>
                    <td>$1,704.42</td>
                    <td>($26,948.24)</td>
                    <td>($25,243.82)</td>
                </tr>
                <tr>
                    <td>Long-Term (LT)</td>
                    <td>$0.00</td>
                    <td>$0.00</td>
                    <td>$0.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Unrealized</th>
                    <td colspan="3">($65,084.50)</td>
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Margin Loan Information -->
    <div class="col-4">
        <h3>Margin Loan Information</h3>
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>This Period</th>
                    <th>YTD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Opening Margin Loan Balance</td>
                    <td>$0.00</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Closing Margin Loan Balance</td>
                    <td>$0.00</td>
                    <td>$0.00</td>
                </tr>
                <tr>
                    <td>Interest Paid on Margin Loan</td>
                    <td>$0.00</td>
                    <td>($131.32)</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


</div>
    </div>

    <div class="footer">
        <p>Account Ending Value reflects the market value of your cash and investments. It does not include pending transactions, unpriced securities or assets held outside Schwab's custody.</p>
    </div>

    <button id="download-pdf" style="margin: 20px; padding: 10px; background-color: #008CBA; color: white; border: none; cursor: pointer;">Download PDF</button>

    <script>
        // Configuración de ApexCharts
        var options = {
            chart: {
                type: 'line',
                height: 300
            },
            series: [{
                name: 'Account Value',
                data: [380000, 390000, 370000, 376386] // Valores simulados
            }],
            xaxis: {
                categories: ['May', 'Jun', 'Sep', 'Oct'] // Meses simulados
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        document.getElementById("download-pdf").addEventListener("click", function () {
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF({ orientation: "landscape" });

    html2canvas(document.querySelector("#statement-content")).then(canvas => {
        const imgData = canvas.toDataURL("image/png");
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        // Escalar la imagen para llenar la página
        const canvasWidth = canvas.width;
        const canvasHeight = canvas.height;
        const ratio = Math.min(pdfWidth / canvasWidth, pdfHeight / canvasHeight);

        const imgWidth = canvasWidth * ratio;
        const imgHeight = canvasHeight * ratio;

        pdf.addImage(imgData, "PNG", 0, 0, imgWidth, imgHeight);

        html2canvas(document.querySelector("#second-page")).then(secondCanvas => {
            const secondImgData = secondCanvas.toDataURL("image/png");
            pdf.addPage();
            pdf.addImage(secondImgData, "PNG", 0, 0, imgWidth, imgHeight);
            pdf.save("account_statement.pdf");
        });
    });
});

    </script>
