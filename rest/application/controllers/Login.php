<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."/libraries/REST_Controller.php");
use Restserver\libraries\REST_controller;

class Login extends REST_Controller {
    public function __construct(){

        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");

        parent::__construct();
        $this->load->database();
    }
public function index_post(){
   $data = $this->$post();
    if(!isset($data["correo"]) OR !isset($data["contrasena"])) {
        $respuesta=array(
            "error"=>TRUE,
            "mensaje"=>"la información no es válida"
        );
        $this->response($respuesta, REST_Controller::HTTP_BAD_REQUEST);
    }
}
    
}

?>