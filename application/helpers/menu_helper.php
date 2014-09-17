<?php if (!defined('BASEPATH'))     exit('No direct script access allowed');
/*
 *  Copyright 2014
 * 
 */

/**
 * menu Helper
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */


if(!function_exists('menu_status'))
{
    function menu_status($menu = array(),$segment =1)
    {
        $ci = & get_instance();
        
        $class = '';
        if(is_array($menu))
        {
           if(in_array($ci->uri->segment($segment), $menu))
           {
               $class = "active";
           }
        }
        
        return $class;
    }
}