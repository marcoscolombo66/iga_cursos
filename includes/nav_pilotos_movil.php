<SCRIPT>
function codifica(link)
{
link.href=<?php $arrSesion = $this->session->userdata('ses_usuario');  $idUSUARIO=$arrSesion['id_usuario'];
echo "'".base_url()."Pilotos/perfil/edit/".$idUSUARIO."'" ?>;
link.onmousedown = "";
return true;
}
</SCRIPT>
<nav class="navbar navbar-dark bg_grisoscuro shadow-sm navbar-expand-lg" style="background-color:#ffffff;"> <!-- Nav-->
  <div class="container"> <a class="logo_header" href="<?php echo base_url();?>">
  <img src="<?php echo $urlAdmin;?>images/logo_top_new.png" alt="Logo institucional" height="50"></a>
  
     
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuDesplegable" aria-controls="menuDesplegable" aria-expanded="false" aria-label="Barra de Navegación"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="menuDesplegable"> 
      <ul class="navbar-nav ml-md-auto">
	  <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."Pilotos"; ?>"><strong>Inicio</strong></a></li>
               		  
        
       <?php		
	 if ($arrSesion==true){
		 
		
	 }else  {$idUSUARIO="";}
echo '<li class="nav-item"><a class="nav-link" href="'.base_url().'Pilotos/aviones"><strong>Aviones</strong></a></li>       
        <li class="nav-item"><a   class="nav-link" href="'.base_url().'Pilotos/misdestinos"><strong>Mis Destinos</strong></a></li>       
        <li class="nav-item"><a onMouseDown="return codifica(this);" class="nav-link" href="StateOk"><strong>Mi Perfil</strong></a></li>       
       '; 	    
?>
		 <li class="nav-item"><a class="nav-link" href="<?php echo base_url()."Pilotos/cerrar_sesion"; ?>"><strong>Salir</strong></a></li>
		 
        
      </ul>
    </div>
  </div>
</nav>

<!-- END Nav-->
