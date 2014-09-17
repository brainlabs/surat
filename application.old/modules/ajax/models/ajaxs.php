<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Model ajaxs
 * @created on : 04-06-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class ajaxs extends CI_Model
{
    
    function __construct() 
    {
        parent::__construct();
    }




    /*
     * Ambil data disposisi detail
     * 
     */
    
    public function get_disposisi_detail($id =0)
    {
        $this->db->select('deskripsi');
        $this->db->where('disposisi_id', $id);
        
        $result = $this->db->get('ref_disposisi_detail');

        if ($result->num_rows()> 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }
    
    
    /**
    *  Get One ref_perihal
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_perihal($id) 
    {
        $this->db->where('perihal_id', $id);
        $result = $this->db->get('ref_perihal');

        if ($result->num_rows() == 1) 
        {
            return $result->row_array();
        } 
        else 
        {
            return array();
        }
    }
    
    
}