<?php
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php'; 
require APPPATH . 'libraries/Format.php';

class Api extends RestController{
  	
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->database();
		$this->load->library('Session'); 
		$this->load->helper('url'); 		
		$this->load->model('Productos_m');		
		
    }	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function test_get(){
    echo "HOLA";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function cursos_get() 
{
    $consulta = $this->Productos_m->getCursos();
    $consulta_array = $consulta->result_array();        
    
    if($consulta->num_rows() > 0) { 
        $this->response($consulta_array, 200);
    } else {            
        $this->response(array('mensaje' => 'No se encontraron cursos disponibles'), 404);
    }         
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function comprarCurso_post() 
{
    $posted = file_get_contents("php://input");
    $obj = json_decode($posted);
    
    // Verificar datos obligatorios
    if(!isset($obj->nombre) || !isset($obj->email) || !isset($obj->celular) || !isset($obj->idCurso)) {
        $this->response(array('error' => 'Datos incompletos'), 400);
        return;
    }
    
    // Sanitizar entradas
    $nombre = strip_tags($obj->nombre);
    $email = strip_tags($obj->email);
    $celular = strip_tags($obj->celular);
    $idCurso = intval($obj->idCurso);
    
    // Verificar que el curso exista
    $consulta_curso = $this->Productos_m->getCursoById($idCurso);
    if($consulta_curso->num_rows() == 0) {
        $this->response(array('error' => 'El curso solicitado no existe'), 404);
        return;
    }
    $curso = $consulta_curso->row_array();
    
    // Verificar si el cliente ya existe
    $consulta_cliente = $this->Productos_m->getClienteByEmail($email);
    
    if($consulta_cliente->num_rows() > 0) {
        // Cliente existente
        $cliente = $consulta_cliente->row_array();
        $idCliente = $cliente['idCliente'];
    } else {
        // Nuevo cliente - registrarlo
        $data_cliente = array(
            'nombre' => $nombre,
            'email' => $email,
            'celular' => $celular
        );
        $idCliente = $this->Productos_m->insert($data_cliente, 'clientes');
        
        if($idCliente === false) {
            $this->response(array('error' => 'Error al registrar cliente'), 500);
            return;
        }
    }
    
    // Registrar la compra
    $data_compra = array(
        'idCliente' => $idCliente,
        'idCurso' => $idCurso
    );
    $idCompra = $this->Productos_m->insert($data_compra, 'compras');
    
    if($idCompra === false) {
        $this->response(array('error' => 'Error al registrar la compra'), 500);
        return;
    }    
    
    // Responder con éxito
    $this->response(array('mensaje' => 'Compra realizada con éxito', 'idCompra' => $idCompra), 200);
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function comprasCliente_post() 
{
    $posted = file_get_contents("php://input");
    $obj = json_decode($posted);
    
    if(!isset($obj->email)) {
        $this->response(array('error' => 'Email del cliente no proporcionado'), 400);
        return;
    }
    
    $email = strip_tags($obj->email);
    
    // Obtener el cliente por email
    $consulta_cliente = $this->Productos_m->getClienteByEmail($email);
    
    if($consulta_cliente->num_rows() == 0) {
        $this->response(array('mensaje' => 'No se encontraron compras para este cliente'), 404);
        return;
    }
    
    $cliente = $consulta_cliente->row_array();
    $idCliente = $cliente['idCliente'];
    
    // Obtener las compras del cliente
    $consulta_compras = $this->Productos_m->getComprasCliente($idCliente);
    $compras_array = $consulta_compras->result_array();
    
    if($consulta_compras->num_rows() > 0) {
        $this->response($compras_array, 200);
    } else {
        $this->response(array('mensaje' => 'No se encontraron compras para este cliente'), 404);
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function estadisticasCompras_post() 
{
    // Verificar si es administrador (aquí deberías implementar tu lógica de autenticación)
    // Por simplificación, asumimos que el administrador está autenticado
    
    $consulta = $this->Productos_m->getEstadisticasCompras();
    $estadisticas_array = $consulta->result_array();
    
    if($consulta->num_rows() > 0) {
        $this->response($estadisticas_array, 200);
    } else {
        $this->response(array('mensaje' => 'No hay datos de compras disponibles'), 404);
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}