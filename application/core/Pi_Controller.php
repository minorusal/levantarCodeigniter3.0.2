<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pi_Controller extends CI_Controller {
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
} 
?>