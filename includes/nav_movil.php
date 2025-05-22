<nav class="navbar navbar-dark bg_grisoscuro shadow-sm navbar-expand-lg" style="background-color:#ffffff;"> <!-- Nav-->
  <div class="container"> <a class="logo_header" href="<?php echo base_url();?>">
  <img src="<?php echo $urlAdmin;?>images/logo_top_new.png" alt="Logo institucional" height="50"></a>
  
     
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuDesplegable" aria-controls="menuDesplegable" aria-expanded="false" aria-label="Barra de Navegación"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="menuDesplegable"> 
      <ul class="navbar-nav ml-md-auto">
	  <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle menu_btnlogin" href="#" id="submenu" role="button" 
data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color:#ffffff;">Iniciar sesión</a>
          <div class="dropdown-menu text-center" aria-labelledby="submenu">
            <form class="" method="post" action="<?php echo 'https://www.libreviaje.com/';?>index.php/LoginPilotos/validar_form" id="formlogin">
              <input class="form_login boxshadow" name="txtUsuario" type="email" id="txtUsuario" placeholder="Email es su nombre de usuario">
              <input class="form_login boxshadow" type="password" name="txtPassword" id="txtPassword" placeholder="Contraseña">
              <input class="btn_login btn_principal boxshadow bg_theme" type="submit" name="btSubmit" value="Iniciar sesión">
			  <input type="hidden" name="txtSesLimite" value="120">
            </form>
            <div class="status" style="display: none;">
              <div class="error_login boxshadow"><small>Se ha generado un error. Vuelve a intentarlo más tarde.</small></div>
              <div class="aprobado_login boxshadow"><small>¡Tu cuenta se creó correctamente! Te hemos enviado un email de confirmación</small></div>
            </div>
            <div class="opciones"> <small><a href="<?php echo 'https://www.libreviaje.com/';?>index.php/Olvido">¿Olvidaste tu contrase&ntilde;a?</a><br>
              </small> <small>¿No t&eacute;nes cuenta? <a href="<?php echo 'https://www.libreviaje.com/';?>index.php/RegistroPilotos">Registrate</a></small> </div>
          </div>
        </li> 
		<li class="nav-item"><a class="nav-link" href="<?php echo 'https://www.libreviaje.com/';?>faqs">&nbsp;&nbsp;FAQs</a></li> 
        <li class="nav-item"><a class="nav-link" href="<?php echo 'https://www.libreviaje.com/';?>contacto"><i class="fas fa-envelope"></i>&nbsp;&nbsp;Contacto</a></li> 
		
      </ul>
    </div>
  </div>
</nav>

<!-- END Nav-->
