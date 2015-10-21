<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pi_Controller extends CI_Controller {

    public $sites_availables;

    public function __construct(){
        parent::__construct();
        $this->removeCache();
        $this->lang_load("system","es_ES");
        $this->lang_load("navigate");
        if($this->session->userdata('is_logged')){
            $this->sites                 = $this->sites_privilege_navigate();
            $this->sites_availables      = $this->sites['sites'];
            $this->sites_panel           = $this->sites['modules'];
            $this->sucursales_availables = $this->sites['sucursales'];
        }
    }
	/**
    * carga el archivo Lang de idioma
    * @param string $name
    * @param string $lang
    * @return void
    */

    public function lang_load($name, $lang = "es_ES"){
    	$this->lang->load(trim($name,'/'),$lang);
    }

    /**
    * Carga la vista de login
    * @return void
    */
	public function load_view_login(){
		$att_fopen = array('id' => 'login');
		$att_hiden = array(
                            'name'    => 'id_user',
                            'id'      => 'id_user',
                            'type'    => 'hidden'
                        );  
		$att_user = array(
                            'name'    => 'user',
                            'id'      => 'user',
                            'class'   => 'form-control'
                        );  
		$att_pwd = array(
                            'name'    => 'pwd',
                            'id'      => 'pwd',
                            'class'   =>'form-control'
                        ); 
		$att_btn = array(
                            'name'    => 'button',
                            'id'      => 'button_login',
                            'value'   => 'true',
                            'class'   => 'btn btn-primary btn-block btn-flat',
                            'content' => $this->lang_item('login_inicio_into')
                        );
		$data['base_url']          = base_url();
		$data['login_inicio']      = $this->lang_item('login_inicio');
		$data['forgot_pwd']        = $this->lang_item('forgot_pwd');
		$data['form_open']         = form_open('', $att_fopen);
		$data['form_input_hidden'] = form_input($att_hiden);
		$data['form_input_user']   = form_input($att_user, '', 'placeholder="'.$this->lang_item('ph_user').'"');
		$data['form_input_pwd']    = form_password($att_pwd, '', 'placeholder="'.$this->lang_item('ph_pwd').'"');
		$data['form_button']       = form_button($att_btn);
		$data['form_close']        = form_close();
		$data['site_title']        = $this->lang_item('site_title');
		
		$this->parser->parse('login.html', $data);
	}

    /**
    * Evalua si el perfil usuario corresponde al root
    * del sistema
    * @return void
    */

    public function root_available(){
        
        return (md5(strtolower($this->session->userdata('perfil')))=='63a9f0ea7bb98050796b649e85481845') ? true : false;
    }

	/**
    * Devuelve el item de idioma con respecto al indice $index
    * @param int $index
    * @return string
    */

    public function lang_item($index, $format = true){
    	$index = strtolower(str_replace('lang_', '', trim($index)));
    	$lang_item = ($this->lang->line($index)) ? $this->lang->line($index) : 'lang_'.$index;
    	
    	if($format==true){
    		$lang_item = text_format_tpl($lang_item);
    	}
    	return $lang_item;
    }

    /**
    * Finalizar la sesion activa
    * @return void
    */
    public function logout($redirect = true){
        $this->load_database('global_system');
        $this->session->sess_destroy();
        if($redirect){
            redirect('login');  
        }
    }

    /**
    * Si $post es false devuleve un arreglo con el total de items 
    * recibidos por el metodo POST[]
    * de lo contrario devolvera el item con respecto al index $post
    * @param int $post
    * @return array
    */
    public function ajax_post($post){
        if($post===false){
            return $this->input->post();
        }
        return $this->input->post($post);
    }

    /**
    * Carga la base de datos de acuerdo al pais de origen
    * del usuario (mx,cr,etc)
    * @param string $db
    * @return void
    */
    public function load_database($bd){
        if($bd!=""){
            $load = $this->load->database($bd,TRUE);
            if(!$load){
                return true;
            }
        }
    }

    /**
    * elimina el cache almacenado
    * @return void
    */
    public function removeCache(){
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
} 
?>