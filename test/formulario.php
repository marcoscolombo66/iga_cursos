<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<title>Test - Infocontrol.</title>

	<base href="">

	<!-- CSS Tema -->
	<link rel="stylesheet" type="text/css" href="https://www.libreviaje.com/css/main.css" media="screen">
	<link rel="stylesheet" type="text/css" href="https://www.libreviaje.com/css/responsive.css" media="screen">
	<link rel="stylesheet" type="text/css" href="https://www.libreviaje.com/css/print.css" media="print">

	<!-- Iconos -->
	<link href="https://www.libreviaje.com//iconos/stroke/pe-icon-7-stroke.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" 
	integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	 
	
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="https://www.libreviaje.com//bootstrap/css/bootstrap.css">

	<!-- Favicon / Opengraph -->
	<link rel="icon" type="image/x-icon" href="https://libreviaje.com/admin/images/favicon.ico" sizes="96x96">
	<link rel="icon" type="image/png" href="https://libreviaje.com/admin/images/favicon.png" sizes="96x96">	<!-- Open Graph -->
	<meta property="og:title" content="Libreviaje" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://libreviaje.com/admin/" />
    <meta property="og:image" content="https://libreviaje.com/admin/images/screen_image_opengraph.jpg" />
    <meta property="og:site_name" content="Libreviaje" />
 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 <script type="text/javascript" src="https://www.libreviaje.com/bootstrap/js/bootstrap.min.js"></script> 




</head>
 

	 
<body class="bg-dark">
   
  <div class="container" >
    <div class="card card-register mx-auto mt-5">
      <div class="card-header" style="text-align:center;">Nuevo usuario</div>
      <div class="card-body">
        <form class="needs-validation"   id="form" 	method="post">
          <fieldset>
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="exampleInputName"><strong>Nombre (*)</strong></label>
                <input class="form-control" id="nombre" name="nombre" type="text" aria-describedby="nameHelp" 
				placeholder="Ingrese su nombre" required>
              </div>
              <div class="col-md-4">
                <label for="exampleInputLastName"><strong>Apellido (*)</strong></label>
                <input class="form-control" id="apellido" name="apellido" type="text" aria-describedby="nameHelp" 
				placeholder="Ingrese su apellido" required>
              </div>
			  
			  <div class="col-md-4">
			  <label for="username"><strong>Username (*)</strong></label>
           <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input type="email" class="form-control" id="username" name="username" placeholder="example@example" 
  aria-label="Username" aria-describedby="basic-addon1" required>
</div>
               </div>
            </div>
          </div>
          <div class="form-group">
		  <div class="form-row">
              <div class="col-md-6">
                <label for="password_"><strong>Contrase&ntilde;a (*)</strong></label>
                <input title="Password debe tener  como minimo 8 caracteres, almenos una letra y un numero" 
				type="password" class="form-control" name="password" id="password" autofocus="autofocus" 
				required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" placeholder="Escriba la contraseña" required>
              </div>
		  
		 <div class="col-md-6">
                <label for="provincias"><strong>Provincia</strong></label>
                <select class="form-control" id="provincias" name="provincias">
				
				</select>
				</div>
		  
		  </div>
		  </div>
		  
		  <div class="form-group">
		  <div class="form-row">
              <div class="col-md-6">
                <label for="password_"><strong>Fecha</strong></label>
                <input type="date" class="form-control" name="fecha" id="fecha" autofocus="autofocus" 
				placeholder="Escriba la fecha" max="<?php echo  date("Y-m-d");?>" required>
              </div>
		  
		 <div class="col-md-6">
                <label for="number"><strong>Numero</strong></label>
                <input type="number" class="form-control" id="numero" name="numero" min="1" max="100">
				
				</select>
				</div>
		   
		  </div>
		  </div>
		  
		  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <input type="checkbox" required>
				<label for="terminos">Acepta terminos y condiciones</label>
                 </div>
              
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                 <button name="enviar" class="btn btn-primary btn-lg" 
		  id="btnRegistrar" >
		  Enviar</button>
		  </form>
		   <button name="btnEditar" class="btn btn-primary btn-lg" 
		  id="btnEditar" style="display:none;">
		  Editar</button>
		   </div>
		  <div class="col-md-6">
		  <span style="width:60px;height:60px;" id="upload_mensaje"></span>
		  <span  id="error_mensaje"></span>
                 </div>
				 
				 
              
            </div>
          </div>
		   
         
        
		
		
        </fieldset>
		 
      </div>
    </div>
  </div>
     
  <script>
$(function () { 
	   
	   $.ajax({
    url: "https://libreviaje.com/admin/test/filedata.json",
    type: "get",
    //data: send,
    dataType: 'json',
    success: function(data){
        console.log(data);
        var datos  = [];
			var out='';		
					
   
  for (const property in data['provincias']) {
	  var provincia=(`${data['provincias'][property]['nombre']}`);
	  var idprovincia=(`${data['provincias'][property]['id']}`);
 out=out+'<option value="'+idprovincia+'">'+provincia+'<option>';
	}
     
    $('#provincias').append(out);
	}
	
	
	   });
});
</script>
   
   <script>
   
   
    
   
   $(document).ready(function () {
  $("form").submit(function (event) {
	  $("#upload_mensaje").append('<img src="https://libreviaje.com/images/cargando.gif">');
    var formData = {
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      username: $("#username").val(),
      password: $("#password").val(),
      provincia: $("#provincia").val(),
      fecha: $("#fecha").val(),
      numero: $("#numero").val(),
    };

    $.ajax({
      type: "POST",
      url: "create.php",
      data: formData,
      dataType: "json",
      encode: true,
	  
    }).done(function (data) {
      console.log(data);

      if (!data.success) {
         
           ;
          $("#error_mensaje").append(
           '<div class="alert alert-danger">Error, vuelva a intentar! '+data.message+'</div>'
          );
		  
		  $("#upload_mensaje").hide();
         
  
      } else {
        $("#error_mensaje").html(
          '<div class="alert alert-success">Se cargo correctamente!</div>'
        );
		 $("#username").prop("disabled", true); 
		 $("#upload_mensaje").hide();
		 $("#btnRegistrar").hide();
		  $("#btnEditar").show();
      }

    });

    event.preventDefault();
  });
  //END SUBMIT
  
  
   $("#btnEditar").click(function (event) {
	  $("#upload_mensaje").append('<img src="https://libreviaje.com/images/cargando.gif">');
    var formData = {
      nombre: $("#nombre").val(),
      apellido: $("#apellido").val(),
      username: $("#username").val(),
      password: $("#password").val(),
      provincia: $("#provincia").val(),
      fecha: $("#fecha").val(),
      numero: $("#numero").val(),
    };

    $.ajax({
      type: "POST",
      url: "update.php",
      data: formData,
      dataType: "json",
      encode: true,
	  
    }).done(function (data) {
      console.log(data);

      if (!data.success) {
         
           
          $("#error_mensaje").append(
           '<div class="alert alert-danger">Error, vuelva a intentar!</div>'
          );
		  
		  $("#upload_mensaje").hide();
         
  
      } else {
        $("#error_mensaje").html(
          '<div class="alert alert-success">Se actualizo correctamente!</div>'
        );
		 $("#upload_mensaje").hide();
		 
      }

    });

    event.preventDefault();
  });
  
  
  
  
  });
    
 

   
   </script>
   </body>

</html>