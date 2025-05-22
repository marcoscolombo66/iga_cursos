<?php
				
				
				
				
				
				
				
				include ("database.php");
				$errors = [];
$data = [];

if (empty($_POST['nombre'])) {
    $errors['nombre'] = 'Nombre requerido.';
}

if (empty($_POST['apellido'])) {
    $errors['apellido'] = 'Apellido requerido required.';
}

if (empty($_POST['username'])) {
    $errors['username'] = 'Usuario requerido.';
}

if (empty($_POST['password'])) {
    $errors['password'] = 'Password requerido.';
}

if (empty($_POST['fecha'])) {
    $errors['fecha'] = 'Fecha requerida.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
	$clientes= new Database();					
	$vector = array(
    "nombre" => $clientes->sanitize($_POST['nombre']),
    "apellido" => $clientes->sanitize($_POST['apellido']),
    "username" => $clientes->sanitize($_POST['username']),
    "password" => md5($clientes->sanitize($_POST['password'])),
    "provincia" => $clientes->sanitize($_POST['provincia']),
    "fecha" => $clientes->sanitize($_POST['fecha']),
    "numero" => $clientes->sanitize($_POST['numero']));
	$res = $clientes->update($vector);
    if ($res==false){
		
		$data['success'] = false;
    $data['message'] = "Error!";
	}
	
	else
	{
		$data['success'] = true;
    $data['message'] = 'Success!';
	}
	
}

echo json_encode($data);
				
				
				
				
				
	
					 
					?>
				 
					 