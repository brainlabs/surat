<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller agenda
 * @created on : 05-06-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class agenda extends MY_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('agendas');
    }
    
    function index()
    {
         $this->template->render('agenda/view');
    }
    
    
    function create()
    {
        if($this->input->post())
        {
            $this->agendas->save();
        }
    }
    
    
    function edit()
    {
        if($this->input->post('id'))
        {
            $this->agendas->update();
        }
    }
    
    function delete()
    {
        if($this->input->post('id'))
        {
            $this->agendas->delete();
        }
    }
    
    
    function get_events()
    {
        $q = $this->agendas->get_all();
        
        echo json_encode($q);
    }
}