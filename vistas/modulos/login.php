
<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

// Define el número máximo de intentos de inicio de sesión fallidos permitidos
$maxIntentosFallidos = 3;

if (isset($_POST['ingUsuario']) && isset($_POST['ingPassword'])) {
    
  // Verificación de token CSRF en el procesamiento del formulario
  if (!verificarTokenCSRF($_POST['token'])) {
    die('Error de CSRF.');
  }
                  $login = new ControladorUsuarios();
                  $login -> ctrIngresoUsuario();
}

function generarTokenCSRF()
				{
					if (empty($_SESSION['token'])) {
						$_SESSION['token'] = bin2hex(random_bytes(32));
					}
					return $_SESSION['token'];
				}

				function verificarTokenCSRF($token)
				{
					if (isset($_SESSION['token']) && hash_equals($_SESSION['token'], $token)) {
						unset($_SESSION['token']);
						return true;
					}
					return false;
				}

?>
    
    <!--start wrapper-->
  <div class="wrapper">
    <div class="">
      <div class="row g-0 m-0">
        <div class="col-xl-6 col-lg-12">
          <div class="login-cover-wrapper">
          
            <div class="card shadow-none">
          
              <div class="card-body">
              
                <div class="text-center">
                <img src="images/default2.png" alt="..." style="width: 200px">
                 
                  <p>Iniciar Sesión</p>
                </div>
                <form class="form-body row g-3" method="POST">
                <input type="hidden" name="token" value="<?= generarTokenCSRF() ?>">
                 
                  <div class="col-12">
                    <label for="inputEmail" class="form-label">Email</label>
                    <input type="email" placeholder="Ingresa Email" class="form-control" id="inputEmail" name="ingUsuario">
                  </div>
                  <div class="col-12">
                    <label for="inputPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="ingPassword" placeholder="Ingresa Password">
                  </div>
                  <div class="col-12 col-lg-12">
                        <?php
                
                    if ($_SESSION['cuentabloqueda']== 0) {
                    echo ' <button type="submit" class="btn btn-primary btn-block btn-lg">Iniciar</button>';
                    }else{
                      echo ' <button type="submit" class="btn btn-danger btn-block btn-lg" disabled >Cuenta Bloqueada</button>';
                    }
                    ?>   
                  </div>
                
                 
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-12">
          <div class="position-fixed top-0 h-100 d-xl-block d-none register-cover-img">
          </div>
        </div>
      </div>
      <!--end row-->
    </div>
  </div>
  <!--end wrapper-->
  </body>
