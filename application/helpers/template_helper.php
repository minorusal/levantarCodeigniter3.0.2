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

    if(!function_exists('plantilla_table_tpl')){
        function set_table_tpl(){
           return  array (
                            'table_open'          => '<table class="table table-bordered responsive dataTable" >',

                            'heading_row_start'   => '<tr>',
                            'heading_row_end'     => '</tr>',
                            'heading_cell_start'  => '<th>',
                            'heading_cell_end'    => '</th>',

                            'row_start'           => '<tr>',
                            'row_end'             => '</tr>',
                            'cell_start'          => '<td style="max-width:80px;text-align:left;word-wrap:break-word;"><p style="white-space: pre">',
                            'cell_end'            => '</p></td>',

                            'row_alt_start'       => '<tr>',
                            'row_alt_end'         => '</tr>',
                            'cell_alt_start'      => '<td style="max-width:80px;text-align:left;word-wrap:break-word;background: #eee;"><p style="white-space: pre">',
                            'cell_alt_end'        => '</p></td>',

                            'table_close'         => '</table>'
                      );
                
        }
    }
}
?>