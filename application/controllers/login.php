<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Pi_Controller {
	public function __construct(){
		parent::__construct();
        $this->lang_load("login");
	}
	/**
    * Index del Controllador
    * @return void
    */
	public function index(){
		//print_debug('entro a index/login');
		if($this->session->userdata('is_logged')){
			redirect('inicio');
        }else{
        	$this->load_view_login();
        }
	}

	/**
    * funcion principal de login
    * @return boolean
    */
	function authentication(){
		print_debug('llega a autenficar');
	}
}
