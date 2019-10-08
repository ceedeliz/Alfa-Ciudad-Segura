<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."/libraries/REST_controller.php");
use Restserver\libraries\REST_controller;

class Productos extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header("Access-Control-Allow-Origin: *");
    }
    public function index_get(){
        $query = $this->db->query("SELECT * FROM `registro`");
        
        $respuesta = array(
                    'error'=> FALSE,
                    'sucesos'=> $query -> result_array()
                    );
        $this->response($respuesta);

    }
    public function todos_get($pagina= 0){
        //$pagina= $pagina * 10;
        $query = $this->db->query("SELECT * FROM `registro` limit $pagina, 2");
        
        $respuesta = array(
                    'error'=> FALSE,
                    'sucesos'=> $query -> result_array()
                    );
        $this->response($respuesta);

    }
}
?>