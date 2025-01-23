<!--start sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
        <img src="images/default2.png" class="logo-icon" alt="logo icon">
      </div>
      <div>
        <h4 class="logo-text"  >Ava Wealth</h4>
      </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
      
     
    <?php      if ($_SESSION['perfil'] == 'administrador' || $_SESSION['perfil'] == 'DirectorAvawm' ) {
           ?>
      <!-- <li>
        <a href="panelUsuario">
          <div class="parent-icon">
            <ion-icon name="home-outline"></ion-icon>
          </div>
          <div class="menu-title">Panel Usuario</div>
        </a>
      </li> -->
     
        <li>
        <a href="inicio">
          <div class="parent-icon">
          <i class="lni lni-money-location"></i>
          </div>
          <div class="menu-title">Dashboard</div>
        </a>
      </li>
      <?php
      
    }
      
      ?>
        <?php      if ($_SESSION['perfil'] == 'administrador'  || $_SESSION['perfil'] == 'Gerente Administrativo' || $_SESSION['perfil'] == 'Analisis'  ) {
           ?>
      <li>
          <a href="javascript:;" class="has-arrow">
            <div class="parent-icon">
              <ion-icon name="briefcase-outline"></ion-icon>
            </div>
            <div class="menu-title">Administrativo</div>
          </a>
          <ul>
          <li>
        <a href="pmercado">
        <div class="parent-icon">
        <i class="lni lni-offer"></i>
          </div>
          <div class="menu-title">Precio Mercado</div>
        </a>
      </li>
          <li>
        <a href="hmercado">
        <div class="parent-icon">
        <i class="lni lni-archive"></i>
          </div>
          <div class="menu-title">Historico Mercado</div>
        </a>
      </li>
          <li>
        <a href="tasas">
        <div class="parent-icon">
        <i class="lni lni-archive"></i>
          </div>
          <div class="menu-title">Tasas Banxico</div>
        </a>
      </li>
          <li>
        <a href="pagosPendientes">
        <div class="parent-icon">
        <i class="lni lni-archive"></i>
          </div>
          <div class="menu-title">Pagos de Pendientes</div>
        </a>
      </li>
          <!-- <li>
        <a href="depositos">
        <div class="parent-icon">
        <i class="lni lni-archive"></i>
          </div>
          <div class="menu-title">Depositos</div>
        </a>
      </li> -->
           
          </ul>
        </li>
        <?php
      
    }
      
      ?>
       <?php      if ($_SESSION['perfil'] == 'administrador') {
           ?>
     
        <li>
        <a href="usuarios">
          <div class="parent-icon">
          <i class="lni lni-users"></i>
          </div>
          <div class="menu-title">Usuarios</div>
        </a>
        <?php
      
    }
      
      ?>
      </li>
        <li>
        <a href="clientes">
          <div class="parent-icon">
          <i class="fadeIn animated bx bx-notepad"></i>
          </div>
          <div class="menu-title">Clientes</div>
        </a>
      </li>
<!--        
        <li>
        <a href="poo">
          <div class="parent-icon">
          <i class="lni lni-calculator"></i>
          </div>
          <div class="menu-title">Simulador</div>
        </a>
      </li> -->
        <li>
        <a href="solicitudes">
          <div class="parent-icon">
          <i class="lni lni-calendar"></i>
          </div>
          <div class="menu-title">Solicitudes</div>
        </a>
      </li>
    

     
     
    </ul>
    <!--end navigation-->
  </aside>