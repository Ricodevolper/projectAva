<?php 





?>


<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
      <div class="toggle-icon">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
     
      <form class="searchbar">
        <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
          <ion-icon name="search-outline"></ion-icon>
        </div>
        <input class="form-control" type="text" placeholder="Search for anything">
        <div class="position-absolute top-50 translate-middle-y search-close-icon">
          <ion-icon name="close-outline"></ion-icon>
        </div>
      </form>
      <div class="top-navbar-right ms-auto">

        <ul class="navbar-nav align-items-center">
          <li class="nav-item">
            <a class="nav-link mobile-search-button" href="javascript:;">
              <div class="">
                <ion-icon name="search-outline"></ion-icon>
              </div>
            </a>
          </li>
         
          <li class="nav-item dropdown dropdown-large dropdown-apps">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="">
                <ion-icon name="apps-outline"></ion-icon>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
              <div class="row row-cols-3 g-3 p-3">
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-purple text-white">
                    <ion-icon name="cart-outline"></ion-icon>
                  </div>
                  <div class="app-title">Orders</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-info text-white">
                    <ion-icon name="people-outline"></ion-icon>
                  </div>
                  <div class="app-title">Teams</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-success text-white">
                    <ion-icon name="shield-checkmark-outline"></ion-icon>
                  </div>
                  <div class="app-title">Tasks</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-danger text-white">
                    <ion-icon name="videocam-outline"></ion-icon>
                  </div>
                  <div class="app-title">Media</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-warning text-white">
                    <ion-icon name="file-tray-outline"></ion-icon>
                  </div>
                  <div class="app-title">Files</div>
                </div>
                <div class="col text-center">
                  <div class="app-box mx-auto bg-gradient-branding text-white">
                    <ion-icon name="notifications-outline"></ion-icon>
                  </div>
                  <div class="app-title">Alerts</div>
                </div>
              </div>
            </div>
          </li>
        <?php
        include 'paneles/notificaciones.php';
        ?>
          <li class="nav-item dropdown dropdown-user-setting">
            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
              <div class="user-setting">
                <img src="assets/images/avatars/06.png" class="user-img" alt="">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <!-- <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex flex-row align-items-center gap-2">
                    <img src="assets/images/avatars/06.png" alt="" class="rounded-circle" width="54" height="54">
                    <div class="">
                      <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                      <small class="mb-0 dropdown-user-designation text-secondary">UI Developer</small>
                    </div>
                  </div>
                </a>
              </li> -->
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Perfil</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="settings-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Setting</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="speedometer-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Dashboard</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="wallet-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Earnings</span></div>
                  </div>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="javascript:;">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="cloud-download-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Downloads</span></div>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="salir">
                  <div class="d-flex align-items-center">
                    <div class="">
                      <ion-icon name="log-out-outline"></ion-icon>
                    </div>
                    <div class="ms-3"><span>Logout</span></div>
                  </div>
                </a>
              </li>
            </ul>
          </li>

        </ul>

      </div>
    </nav>
  </header>
  <!--end top header-->