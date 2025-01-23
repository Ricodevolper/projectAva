<?php
$id = $_SESSION['id'];
$solicitudRetiroSp = ControladorRetiros::ctrretiroSpSolicitudActiva();

$countSolicitud = count($solicitudRetiroSp);
$detalleNotificacion = new ControladorNotificaciones();

$detalleBticoinActualizado = $detalleNotificacion->ctrobtenerNotificacionesNoVistas($id);
$countdetalleBticoin = count($detalleBticoinActualizado);


$notificaciones = $countSolicitud + $countdetalleBticoin ;


?>


<li class="nav-item dropdown dropdown-large">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="position-relative">
                <?php
                
                if ($notificaciones != 0) {
                  # code...
             
                ?>
                <span class="notify-badge"><?=$notificaciones?></span>
                <?php
                
              }
                ?>
                <ion-icon name="notifications-outline"></ion-icon>
              
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a href="javascript:;">
                <div class="msg-header">
                  <p class="msg-header-title">Notificaciones</p>
                  <p class="msg-header-clear ms-auto">Marks all as read</p>
                </div>
              </a>
              <div class="header-notifications-list">
                <!-- <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify text-primary">
                      <ion-icon name="cart-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Nuevos Depositos <span class="msg-time float-end">2 min
                          ago</span></h6>
                      <p class="msg-info">You have recived new orders</p>
                    </div>
                  </div>
                </a> -->
                <!-- <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify text-danger">
                      <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Nuevo Clientes<span class="msg-time float-end">14 Sec
                          ago</span></h6>
                      <p class="msg-info">5 new user registered</p>
                    </div>
                  </div>
                </a> -->
                <?php    if ($countSolicitud != 0) {
  
  ?>
                <a class="dropdown-item" href="notificacionesview">
                  <div class="d-flex align-items-center">
                    <div class="notify text-success">
                      <ion-icon name="document-outline"></ion-icon>
                    </div>
             
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Retiros Solicitud<span class="msg-time float-end"><?=$countSolicitud?></span></h6>
                      <p class="msg-info">Tienes Solicitudes por revisar</p>
                    </div>
                 
                  </div>
                </a>
                <?php } ?>
                <?php    if ($countdetalleBticoin != 0) {
  
  ?>
                <a class="dropdown-item" href="notificacionesview">
                  <div class="d-flex align-items-center">
                    <div class="notify text-success">
                      <ion-icon name="document-outline"></ion-icon>
                    </div>
             
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Cupones Bitcoin Aplicados<span class="msg-time float-end"><?=$countdetalleBticoin?></span></h6>
                      <p class="msg-info ">Se han Aplicado <?=$countdetalleBticoin?> <br>cupones de Pago de Bitcoin </p>
                    </div>
                 
                  </div>
                </a>
                <?php } ?>
                <!-- <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify text-info">
                      <ion-icon name="checkmark-done-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Pagos de interes<span class="msg-time float-end">2 hrs ago</span></h6>
                      <p class="msg-info">Your new product has approved</p>
                    </div>
                  </div>
                </a>
              
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify text-danger">
                      <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Nuevos Comentarios <span class="msg-time float-end">4 hrs
                          ago</span></h6>
                      <p class="msg-info">New customer comments recived</p>
                    </div>
                  </div>
                </a> -->
                <!-- <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify text-primary">
                      <ion-icon name="albums-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                          ago</span></h6>
                      <p class="msg-info">24 new authors joined last week</p>
                    </div>
                  </div>
                </a> -->
              
                <!-- <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="notify text-warning">
                      <ion-icon name="cafe-outline"></ion-icon>
                    </div>
                    <div class="flex-grow-1">
                      <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                          ago</span></h6>
                      <p class="msg-info">45% less alerts last 4 weeks</p>
                    </div>
                  </div>
                </a> -->
              </div>
              <a href="javascript:;">
                <div class="text-center msg-footer">Mostrar todas la notificaciones</div>
              </a>
            </div>
          </li>