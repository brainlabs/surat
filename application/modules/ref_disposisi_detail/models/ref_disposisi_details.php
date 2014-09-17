<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $ref_disposisi_detail
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class ref_disposisi_details extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data ref_disposisi_detail
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $this->db->select('dd.*,d.disposisi');
        $this->db->from('ref_disposisi_detail dd');
        $this->db->join('ref_disposisi d','dd.disposisi_id=d.disposisi_id','left');
        $this->db->limit($limit, $offset);
        $result = $this->db->get();

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
     *  Count All ref_disposisi_detail
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
         $this->db->select('dd.*,d.disposisi');
        $this->db->from('ref_disposisi_detail dd');
        $this->db->join('ref_disposisi d','dd.disposisi_id=d.disposisi_id','left');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All ref_disposisi_detail
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
        $this->db->select('dd.*,d.disposisi');
        $this->db->from('ref_disposisi_detail dd');
        $this->db->join('ref_disposisi d','dd.disposisi_id=d.disposisi_id','left');  
        $this->db->like('dd.deskripsi', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get();

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
    * Search All ref_disposisi_detail
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        $this->db->select('dd.*,d.disposisi');
        $this->db->from('ref_disposisi_detail dd');
        $this->db->join('ref_disposisi d','dd.disposisi_id=d.disposisi_id','left');        
        $this->db->like('dd.deskripsi', $keyword);  
               
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One ref_disposisi_detail
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('detail_id', $id);
        $result = $this->db->get('ref_disposisi_detail');

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
    *  Default form data ref_disposisi_detail
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'disposisi_id' => '',
            
                'deskripsi' => '',
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save($id = NULL) 
    {
        $data = array(
        
            'disposisi_id' => $this->input->post('disposisi_id', TRUE),
        
            'deskripsi' => $this->input->post('deskripsi', TRUE),
        
        );
        
        
        $this->db->insert('ref_disposisi_detail', $data);
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
        
                'disposisi_id' => $this->input->post('disposisi_id', TRUE),
        
                'deskripsi' => $this->input->post('deskripsi', TRUE),
        
        );
        
        
        $this->db->where('detail_id', $id);
        $this->db->update('ref_disposisi_detail', $data);
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
        $this->db->where('detail_id', $id);
        $this->db->delete('ref_disposisi_detail');
        
    }

}
