<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $surat_masuk
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class surat_masuks extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    /**
     *  Get All data surat_masuk
     *
     *  @param limit  : Integer
     *  @param offset : Integer
     *
     *  @return array
     *
     */
    public function get_all($limit, $offset) 
    {
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id','left');
        
        $this->db->limit($limit, $offset);
        $result = $this->db->get( );

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
     *  Count All surat_masuk
     *    
     *  @return Integer
     *
     */
    public function count_all()
    {
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id','left');
        return $this->db->count_all_results();
    }
    

    /**
    * Search All surat_masuk
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
        
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id','left');
                
        $this->db->like('sm.skpd_pengirim', $keyword);  
                
        $this->db->or_like('sm.nomor_surat', $keyword);  
                
        $this->db->or_like('sm.nomor_agenda', $keyword);  
                
        $this->db->or_like('sm.tanggal_diterima', $keyword);  
                
        $this->db->or_like('d.disposisi', $keyword);  
                
        $this->db->or_like('sm.catatan', $keyword);  
        
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
    * Search All surat_masuk
    *  @param keyword : mixed
    *
    *  @return Integer
    *
    */
    public function count_all_search()
    {
        $keyword = $this->session->userdata('keyword');
        
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id','left');
                
        $this->db->like('sm.skpd_pengirim', $keyword);  
                
        $this->db->or_like('sm.nomor_surat', $keyword);  
                
        $this->db->or_like('sm.nomor_agenda', $keyword);  
                
        $this->db->or_like('sm.tanggal_diterima', $keyword);  
                
        $this->db->or_like('d.disposisi', $keyword);  
                
        $this->db->or_like('sm.catatan', $keyword);  
        
        return $this->db->count_all_results();
    }


    
    
    
    /**
    *  Get One surat_masuk
    *
    *  @param id : Integer
    *
    *  @return array
    *
    */
    public function get_one($id) 
    {
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id');
        $this->db->where('sm.surat_masuk_id', $id);
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
    *  Default form data surat_masuk
    *  @return array
    *
    */
    public function add()
    {
        $data = array(
            
                'skpd_pengirim' => '',
            
                'tanggal_surat' => '',
            
                'nomor_surat' => '',
            
                'perihal_id' => '',
            
                'nomor_agenda' => '',
            
                'tanggal_diterima' => '',
            
                'disposisi_id' => '',
            
                'catatan' => '',
                
                'file_surat' => ''
            
        );

        return $data;
    }

    
    
    
    
    /**
    *  Save data Post
    *
    *  @return void
    *
    */
    public function save($filename='') 
    {
        $data = array(
        
            'skpd_pengirim' => strip_tags($this->input->post('skpd_pengirim', TRUE)),
        
            'tanggal_surat' => strip_tags($this->input->post('tanggal_surat', TRUE)),
        
            'nomor_surat' => strip_tags($this->input->post('nomor_surat', TRUE)),
        
            'perihal_id' => strip_tags($this->input->post('perihal_id', TRUE)),
        
            'nomor_agenda' => strip_tags($this->input->post('nomor_agenda', TRUE)),
        
            'tanggal_diterima' => strip_tags($this->input->post('tanggal_diterima', TRUE)),
        
            'disposisi_id' => $this->input->post('disposisi_id', TRUE),
        
            'catatan' => strip_tags($this->input->post('catatan', TRUE)),
            
            'file_surat'      => $filename
        
        );
        
        
        $this->db->insert('surat_masuk', $data);
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
        
                'skpd_pengirim' => strip_tags($this->input->post('skpd_pengirim', TRUE)),
        
                'tanggal_surat' => strip_tags($this->input->post('tanggal_surat', TRUE)),

                'nomor_surat' => strip_tags($this->input->post('nomor_surat', TRUE)),

                'perihal_id' => strip_tags($this->input->post('perihal_id', TRUE)),

                'nomor_agenda' => strip_tags($this->input->post('nomor_agenda', TRUE)),

                'tanggal_diterima' => strip_tags($this->input->post('tanggal_diterima', TRUE)),

                'disposisi_id' => $this->input->post('disposisi_id', TRUE),

                'catatan' => strip_tags($this->input->post('catatan', TRUE)),
            
                'file_surat'      => $file_name
        
        );
        
        
        $this->db->where('surat_masuk_id', $id);
        $this->db->update('surat_masuk', $data);
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
        
        $this->db->select('file_surat');
        $this->db->where('surat_masuk_id',$id);
        $q = $this->db->get('surat_masuk')->row();
        if($q)
        {
            @unlink('./file/surat_masuk/' . $q->file_surat);
        }
        
        $this->db->where('surat_masuk_id', $id);
        $this->db->delete('surat_masuk');
        
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
