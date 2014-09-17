<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller auth
 * @created on : 16-05-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class auth extends CI_Controller
{

    public function __construct() 
    {
        parent::__construct();   
        $this->load->model('auths');
    }
    

    /**
    * List all data pegawai
    *
    */
    public function index() 
    { 
        //$this->session->sess_destroy();
        if($this->session->userdata('login')==true)
        {
            redirect('dashboard');
        }
        
        if($this->input->post())
        {
           echo json_encode($this->auths->do_login($this->input->post('username'),$this->input->post('passwd')));
        }
        else 
        {
            $this->load->view('logins');
        }
	      
    }
    
    
    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }

    

    
}