<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $surat_keluar
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class surat_keluars extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data surat_keluar
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {

        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        $this->db->from('surat_keluar sk');
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
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
     *  Count All surat_keluar
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        $this->db->from('surat_keluar sk');
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All surat_keluar
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
        
        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        
        $this->db->from('surat_keluar sk');
        
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
        
        $this->db->like('sk.nomor_surat', $keyword);  
                
        $this->db->or_like('sk.tujuan', $keyword);  
                
        $this->db->or_like('sk.penanda_tangan', $keyword);  
                
        $this->db->or_like('sk.catatan', $keyword);  
                
        $this->db->or_like('rp.perihal', $keyword);  
        
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
    * Search All surat_keluar
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        
        $this->db->from('surat_keluar sk');
        
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
        
        $this->db->like('sk.nomor_surat', $keyword);  
                
        $this->db->or_like('sk.tujuan', $keyword);  
                
        $this->db->or_like('sk.penanda_tangan', $keyword);  
                
        $this->db->or_like('sk.catatan', $keyword);  
                
        $this->db->or_like('rp.perihal', $keyword);  
        
       
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One surat_keluar
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        $this->db->from('surat_keluar sk');
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
        $this->db->where('sk.surat_keluar_id', $id);
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
    *  Default form data surat_keluar
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'jenis_surat_id' => '',
            
                'nomor_surat' => '',
            
                'tanggal_surat' => '',
            
                'perihal_id' => '',
            
                'tujuan' => '',
            
                'penanda_tangan' => '',
            
                'catatan' => '',
            
                'file_surat' => '',
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save($name) 
    {
        $data = array(
        
            'jenis_surat_id' => $this->input->post('jenis_surat_id', TRUE),
        
            'nomor_surat' => strip_tags($this->input->post('nomor_surat', TRUE)),
        
            'tanggal_surat' => strip_tags($this->input->post('tanggal_surat', TRUE)),
        
            'perihal_id' => strip_tags($this->input->post('perihal_id', TRUE)),
        
            'tujuan' => strip_tags($this->input->post('tujuan', TRUE)),
        
            'penanda_tangan' => strip_tags($this->input->post('penanda_tangan', TRUE)),
        
            'catatan' => strip_tags($this->input->post('catatan', TRUE)),
        
            'file_surat' => $name,
        
        );
        
        
        $this->db->insert('surat_keluar', $data);
    }
    
    
    

    
    /**
    *  Update modify data
    *
    *  @param id : Integer
    *
    *  @return void
    *
    */
    public function update($id,$file_name)
    {
        $data = array(
        
            'jenis_surat_id' => $this->input->post('jenis_surat_id', TRUE),
        
            'nomor_surat' => strip_tags($this->input->post('nomor_surat', TRUE)),
        
            'tanggal_surat' => strip_tags($this->input->post('tanggal_surat', TRUE)),
        
            'perihal_id' => strip_tags($this->input->post('perihal_id', TRUE)),
        
            'tujuan' => strip_tags($this->input->post('tujuan', TRUE)),
        
            'penanda_tangan' => strip_tags($this->input->post('penanda_tangan', TRUE)),
        
            'catatan' => strip_tags($this->input->post('catatan', TRUE)),
        
            'file_surat' => $file_name
        
        );
        
        
        $this->db->where('surat_keluar_id', $id);
        $this->db->update('surat_keluar', $data);
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
        $this->delete_file($id);
        
        $this->db->where('surat_keluar_id', $id);
        $this->db->delete('surat_keluar');
        
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
    
    
    // Delete File
    function delete_file($id =0)
    {
        $this->db->select('file_surat');
        $this->db->where('surat_keluar_id',$id);
        $q = $this->db->get('surat_keluar')->row();
        if($q)
        {
            @unlink('./file/surat_keluar/' . $q->file_surat);
        }
    }

}
