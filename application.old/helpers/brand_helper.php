<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');
/*
 *  Copyright 2014
 * 
 */

/**
 * Brand Helper
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */


if(!function_exists('get_instansi'))
{
    function get_instansi()
    {
        
        $ci = &get_instance();
        $ci->db->limit(1);
        $result = $ci->db->get('instansi');

       $nama = $result->row_array();
       return $nama['nama_instansi'];
        
    }
}