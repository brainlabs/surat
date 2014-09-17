<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $surat_jenis
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class surat_jeniss extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data surat_jenis
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $result = $this->db->get('surat_jenis', $limit, $offset);

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
     *  Count All surat_jenis
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->from('surat_jenis');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All surat_jenis
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
                
        $this->db->like('nama_jenis', $keyword);  
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get('surat_jenis');

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
    * Search All surat_jenis
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search()
    {
        
        $keyword = $this->session->userdata('keyword');
        
        $this->db->from('surat_jenis');        
                
        $this->db->like('nama_jenis', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One surat_jenis
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('jenis_id', $id);
        $result = $this->db->get('surat_jenis');

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
    *  Default form data surat_jenis
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nama_jenis' => '',
            
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
        
            'nama_jenis' => $this->input->post('nama_jenis', TRUE),
        
        );
        
        
        $this->db->insert('surat_jenis', $data);
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
        
                'nama_jenis' => $this->input->post('nama_jenis', TRUE),
        
        );
        
        
        $this->db->where('jenis_id', $id);
        $this->db->update('surat_jenis', $data);
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
        $this->db->where('jenis_id', $id);
        $this->db->delete('surat_jenis');
        
    }

}
