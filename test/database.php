<?php
class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="librevia_marcos";
		private $dbpass="30700971Marcos";
		private $dbname="librevia_libreviaje";
		function __construct(){
			$this->connect_db();
		}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function create($vector){


if(!isset($vector['numero']) || empty($vector['numero'])){
$vector['numero']=0;
}	

if(!isset($vector['provincia']) || empty($vector['provincia'])){
$vector['provincia']=0; 
}

	$sql = "INSERT INTO `usuariostest` (NOMBRE, APELLIDO, USUARIO, PASSWORD, idPROVINCIA, FECHA,NUMERO) 
	VALUES ('".$vector['nombre']."', '".$vector['apellido']."', '".$vector['username']."','".$vector['password']."', 
	".$vector['provincia'].", '".$vector['fecha']."',".$vector['numero'].")";
	$res = mysqli_query($this->con, $sql);
	 
	if($res){
	  return $res;
	}else{
	return false;
 }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function update($vector){


if(!isset($vector['numero']) || empty($vector['numero'])){
$vector['numero']=0;
}	

if(!isset($vector['provincia']) || empty($vector['provincia'])){
$vector['provincia']=0; 
}

	$sql = "UPDATE `usuariostest` 
	SET NOMBRE='".$vector['nombre']."', 
	APELLIDO='".$vector['apellido']."', 
	PASSWORD='".$vector['password']."', 
	idPROVINCIA=".$vector['provincia'].", 
	FECHA='".$vector['fecha']."',
	NUMERO=".$vector['numero']."
	 WHERE USUARIO='".$vector['username']."'";
	
	 
	$res = mysqli_query($this->con, $sql);
	 
	if($res){
	  return $res;
	}else{
	return false;
 }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function existeUsuario($usuario){ 
$sql = "SELECT USUARIO FROM usuariostest
	 WHERE USUARIO='".$usuario."'";
	
	 
	$res = mysqli_query($this->con, $sql);
	$row_cnt = mysqli_num_rows($res);
	 
	 
	 
	 
	if($row_cnt>0){  
	  return true;
	}else{
	return false;
 }
 
 
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}
?>