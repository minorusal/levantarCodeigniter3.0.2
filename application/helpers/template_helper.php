<?php
if(!function_exists('text_format_tpl')){
    function text_format_tpl($string, $format = "f"){
        if($string==''){
            return $string;
        }
        if($format=="f"){
            return ucfirst(strtolower($string));
        }else{
            return ucwords(strtolower($string));
        }
    }
}
?>