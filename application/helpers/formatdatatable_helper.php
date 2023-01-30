<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 	
if (!function_exists('encode')) {

    function encode($data) {
        $CI = & get_instance();
        $data_encoded = $CI->converter->encode($data);
        return $data_encoded;
    }

}
    
?>