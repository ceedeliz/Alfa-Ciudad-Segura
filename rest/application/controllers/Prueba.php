<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."/libraries/REST_controller.php");
use Restserver\libraries\REST_controller;

class Prueba extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");
    }
public function index(){
    echo "hola mundo";
}
public function obtener_arreglo_get($index){
    $arreglo=array("manza", "pera", "piña");
    $this->response($arreglo[$index]);
}
public function obtener_producto_get($id){

    $query = $this->db->query("SELECT * FROM `registro` WHERE id_registro='$id'");
//$query->result();
    $this->response($query->result());
}

}

?>