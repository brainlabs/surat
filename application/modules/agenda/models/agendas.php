<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller agendas
 * @created on : 05-06-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class agendas extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    
    function save()
    {
        $data = array(
            'title' => $this->input->post('title',true),
            'start' => $this->input->post('start',true),
            'end' => $this->input->post('end',true),
            'url' => $this->input->post('url',true)            
        );
                
        $this->db->insert('agenda',$data);
    }
    
    
    function update()
    {
        $data = array(
            'title' => $this->input->post('title',true),
            'start' => $this->input->post('start',true),
            'end' => $this->input->post('end',true),
            'url' => $this->input->post('url',true)            
        );
        
        $this->db->where('id', $this->input->post('id',true));
        $this->db->update('agenda',$data);
    }
    
    
    
    function delete()
    {
        $this->db->where('id', $this->input->post('id',true));
        $this->db->delete('agenda');
    }
    
    
    
    function get_all()
    {
       return $this->db->get('agenda')->result_array();
    }
}