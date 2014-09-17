<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $pegawai
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class pegawais extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data pegawai
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {
        $this->db->select('p.*,u.group');
        $this->db->from('pegawai p');
        $this->db->join('user_group u', 'u.group_id=p.group_id','left');
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
     *  Count All pegawai
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->select('p.*,u.group');
        $this->db->from('pegawai p');
        $this->db->join('user_group u', 'u.group_id=p.group_id','left');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All pegawai
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
        
        $this->db->select('p.*,u.group');
        $this->db->from('pegawai p');
        $this->db->join('user_group u', 'u.group_id=p.group_id','left');
                
        $this->db->like('p.nip', $keyword);  
                
        $this->db->or_like('p.nama_pegawai', $keyword);  
                
        $this->db->or_like('p.jabatan', $keyword);  
                
        $this->db->or_like('p.email', $keyword);  
        
        $this->db->or_like('u.group', $keyword);   
        
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
    * Search All pegawai
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->select('p.*,u.group');
        
        $this->db->from('pegawai p');
        
        $this->db->join('user_group u', 'u.group_id=p.group_id','left');
                
        $this->db->like('p.nip', $keyword);  
                
        $this->db->or_like('p.nama_pegawai', $keyword);  
                
        $this->db->or_like('p.jabatan', $keyword);  
                
        $this->db->or_like('p.email', $keyword);  
        
        $this->db->or_like('u.group', $keyword);
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One pegawai
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->where('p.id', $id);
        
        $this->db->select('p.*,u.group');
        
        $this->db->from('pegawai p');
        
        $this->db->join('user_group u', 'u.group_id=p.group_id','left');                
       
        $result = $this->db->get();

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
    *  Default form data pegawai
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'nip' => '',
            
                'nama_pegawai' => '',
            
                'jabatan' => '',
            
                'group_id' => '',
            
                'email' => '',
            
                'passwd' => '',
            
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
        
        $key  = sha1($this->config->item('encryption_key'));
        $data = array(
        
            'nip' => $this->input->post('nip', TRUE),
        
            'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
        
            'jabatan' => $this->input->post('jabatan', TRUE),
            
            'group_id' => $this->input->post('group_id', TRUE),
        
            'email' => $this->input->post('email', TRUE),
        
            'passwd' => md5(sha1( $this->input->post('passwd', TRUE)) . $key),
        
        );
        
        
        $this->db->insert('pegawai', $data);
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
        
                'nip' => $this->input->post('nip', TRUE),
        
                'nama_pegawai' => $this->input->post('nama_pegawai', TRUE),
        
                'jabatan' => $this->input->post('jabatan', TRUE),
            
                'group_id' => $this->input->post('group_id', TRUE),
        
                'email' => $this->input->post('email', TRUE),
        
                //'passwd' => $this->input->post('passwd', TRUE),
        
        );
        
        
        $this->db->where('id', $id);
        $this->db->update('pegawai', $data);
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
        $this->db->where('id', $id);
        $this->db->delete('pegawai');
        
    }

}
