<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $ref_perihal
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class ref_perihals extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data ref_perihal
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('ref_perihal', $limit, $offset);

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    

    /**
     *  Count All ref_perihal
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('ref_perihal');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All ref_perihal
    *
    *  @param limit   : Integer
    *  @param offset  : Integer
    *  @param keyword : mixed
    *
    *  @return array
    *
    */
    public function get_search($limit, $offset) 
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->like('perihal', $keyword);  
                
        $this->db->like('diterbitkan_kepada', $keyword);  
                
        $this->db->like('pengelola_surat', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('ref_perihal');

        if ($result->num_rows() > 0) 
        {
            return $result->result_array();
        } 
        else 
        {
            return array();
        }
    }

    
    
    
    
    
    /**
    * Search All ref_perihal
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->from('ref_perihal');        
                
        $this->db->like('perihal', $keyword);  
                
        $this->db->like('diterbitkan_kepada', $keyword);  
                
        $this->db->like('pengelola_surat', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One ref_perihal
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
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

    
    
    
    /**
    *  Default form data ref_perihal
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'perihal' => '',
            
                'diterbitkan_kepada' => '',
            
                'pengelola_surat' => '',
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save() 
    {
        $data = array(
        
            'perihal' => $this->input->post('perihal', TRUE),
        
            'diterbitkan_kepada' => $this->input->post('diterbitkan_kepada', TRUE),
        
            'pengelola_surat' => $this->input->post('pengelola_surat', TRUE),
        
        );
        
        
        $this->db->insert('ref_perihal', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id)
    {
        $data = array(
        
                'perihal' => $this->input->post('perihal', TRUE),
        
                'diterbitkan_kepada' => $this->input->post('diterbitkan_kepada', TRUE),
        
                'pengelola_surat' => $this->input->post('pengelola_surat', TRUE),
        
        );
        
        
        $this->db->where('perihal_id', $id);
        $this->db->update('ref_perihal', $data);
    }


    
    
    
    /**
    *  Delete data by id
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function delete($id)
    {       
        $this->db->where('perihal_id', $id);
        $this->db->delete('ref_perihal');
        
    }

}
