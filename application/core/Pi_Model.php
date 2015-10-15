<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pi_Model extends CI_Model {
	private $vars, $db1,$db2; #dbmodel
	public $tbl; #dbmodel

	public function __construct(){
		parent::__construct();

		$this->db1 = 'pi_system';
		$this->tbl['claves']       = $this->db1.'.sys_claves'; 
		$this->tbl['empresas']     = $this->db1.'.sys_empresas';  		
		$this->tbl['menu1']        = $this->db1.'.sys_menu_n1'; 
		$this->tbl['menu2']        = $this->db1.'.sys_menu_n2'; 
		$this->tbl['menu3']        = $this->db1.'.sys_menu_n3'; 
		$this->tbl['paises']       = $this->db1.'.sys_paises'; 
		$this->tbl['perfiles']     = $this->db1.'.sys_perfiles'; 
		$this->tbl['personales']   = $this->db1.'.sys_personales';  
		$this->tbl['sucursales']   = $this->db1.'.sys_sucursales'; 
		$this->tbl['usuarios']     = $this->db1.'.sys_usuarios';

		$this->db2 = 'pi_mx';
		$this->tbl['administracion_areas']       = $this->db2.'.av_administracion_areas'; 
		$this->tbl['administracion_puestos']     = $this->db2.'.av_administracion_puestos';   
	}
}