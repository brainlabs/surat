<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Description of MY_Controller
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */
class MY_Controller extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();
        $this->form_validation->set_error_delimiters('<p class="surat-error-text">', '</p>');
        
		
        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }
		
    }

}

?>
