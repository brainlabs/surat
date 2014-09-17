<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of dropdowns
 * 
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class dropdowns extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }

    function jenis_surat()
    {
        $q = $this->db->get('surat_jenis')->result();
        
        $select [''] = 'Pilih Jenis Surat';
        if($q > 0)
        {
            foreach ($q as $key)
            {
                $select[$key->jenis_id] = $key->nama_jenis;
            }
        }
        
        return $select;
    }

    
    function disposisi()
    {
        $q = $this->db->get('ref_disposisi')->result();
        
        $select [''] = 'Pilih Disposisi';
        if($q > 0)
        {
            foreach ($q as $key)
            {
                $select[$key->disposisi_id] = $key->disposisi;
            }
        }
        
        return $select;
    }
    
    
    
    function perihal()
    {
        $q = $this->db->get('ref_perihal')->result();
        
        $select [''] = 'Pilih Perihal';
        if($q > 0)
        {
            foreach ($q as $key)
            {
                $select[$key->perihal_id] = $key->perihal;
            }
        }
        
        return $select;
    }
    
    
    function pegawai()
    {
        $q = $this->db->get('pegawai')->result();
        
        $select [''] = 'Pilih Nama Pegawai';
        if($q > 0)
        {
            foreach ($q as $key)
            {
                $select[$key->pegawai_id] = $key->nama_pegawai;
            }
        }
        
        return $select;
    }
    
    
    
    
    function group()
    {
        if($this->session->userdata('group_id') == 3)
        {
            $this->db->where('group_id',$this->session->userdata('group_id'));
        }
        $q = $this->db->get('user_group')->result();
        
        $select [''] = 'Pilih Akses Level';
        if($q > 0)
        {
            foreach ($q as $key)
            {
                $select[$key->group_id] = $key->group;
            }
        }
        
        return $select;
    }
 

}
