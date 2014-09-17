<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of $instansi
 * @created on : {tanggal}
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class instansis extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }



    
    
    
    /**
    *  Get One instansi
    *  @return array
    *
    */
    public function get_one() 
    {
        $this->db->limit(1);
        $result = $this->db->get('instansi');

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
    *  Update modify data  
    *
    *  @return void
    *
    */
    public function update($filename ='')
    {
        $data = array(
        
                'nama_instansi' => $this->input->post('nama_instansi', TRUE),
        
                'alamat_instansi' => $this->input->post('alamat_instansi', TRUE),
        
                'nama_pimpinan' => $this->input->post('nama_pimpinan', TRUE),
        
                'email' => $this->input->post('email', TRUE),
        
                'website' => $this->input->post('website', TRUE),
        
                'logo' => $filename,
        
        ); 
        
        $this->db->update('instansi', $data);
    }


    
    
   

}
