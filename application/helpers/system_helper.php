<?php
/**
	* imprime un arreglo formateado para debug
	* y detiene la ejecucion del script
	* @return array $array
	*/
	if(!function_exists('print_debug')){
		function print_debug($array, $die = true){
			echo '<pre>';
			print_r($array);
			echo '</pre>';
			if($die){
				die();	
			}
		}
	}
?>