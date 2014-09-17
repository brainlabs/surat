<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $ref_disposisi
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class ref_disposisis extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data ref_disposisi
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('ref_disposisi', $limit, $offset);

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
     *  Count All ref_disposisi
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('ref_disposisi');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All ref_disposisi
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
        $this->db->like('disposisi', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('ref_disposisi');

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
    * Search All ref_disposisi
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search($keyword)
    {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->from('ref_disposisi');        
                
        $this->db->like('disposisi', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One ref_disposisi
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('disposisi_id', $id);
        $result = $this->db->get('ref_disposisi');

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
    *  Default form data ref_disposisi
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'disposisi' => '',
            
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
        
            'disposisi' => $this->input->post('disposisi', TRUE),        
        );
        
        
        $this->db->insert('ref_disposisi', $data);
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
        
                'disposisi' => $this->input->post('disposisi', TRUE),
        
        );
        
        
        $this->db->where('disposisi_id', $id);
        $this->db->update('ref_disposisi', $data);
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
        $this->db->where('disposisi_id', $id);
        $this->db->delete('ref_disposisi');
        
    }

}
