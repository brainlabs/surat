<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of laporan
 * @created on : 03-Juni-2014
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class laporans extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }
    
    // Filter Surat Keluar
    function filter_surat_keluar($limit, $offset)
    {
        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        $this->db->from('surat_keluar sk');
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
        $this->db->where('sk.tanggal_surat >=', $this->session->userdata('start'));
        $this->db->where('sk.tanggal_surat <=', $this->session->userdata('end'));
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
    
    
    // Count all get by date range
    public function filter_count_surat_keluar()
    {
        $this->db->select('sk.*,j.nama_jenis,rp.perihal');
        $this->db->from('surat_keluar sk');
        $this->db->join('surat_jenis j','j.jenis_id = sk.jenis_surat_id','left');
        $this->db->join('ref_perihal rp','rp.perihal_id = sk.perihal_id','left');
        $this->db->where('sk.tanggal_surat >=', $this->session->userdata('start'));
        $this->db->where('sk.tanggal_surat <=', $this->session->userdata('end'));
        return $this->db->count_all_results();
    }
    
    
    // Surat Masuk
    //-------------------------------------------------------------------------------------------------------
    
    
    function filter_surat_masuk($limit, $offset)
    {
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id','left');
        $this->db->where('sm.tanggal_surat >=', $this->session->userdata('_start'));
        $this->db->where('sm.tanggal_surat <=', $this->session->userdata('_end'));
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
    
    
    
    function filter_count_surat_masuk()
    {
        $this->db->select('sm.*,p.perihal,p.diterbitkan_kepada,p.pengelola_surat');
        $this->db->select('d.disposisi');
        $this->db->from('surat_masuk sm');
        $this->db->join('ref_perihal p', 'p.perihal_id = sm.perihal_id','left');
        $this->db->join('ref_disposisi d', 'd.disposisi_id=sm.disposisi_id','left');
        $this->db->where('sm.tanggal_surat >=', $this->session->userdata('_start'));
        $this->db->where('sm.tanggal_surat <=', $this->session->userdata('_end'));
        return $this->db->count_all_results();
    }



}
