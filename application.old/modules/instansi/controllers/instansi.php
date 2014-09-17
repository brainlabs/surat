<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller instansi
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class instansi extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('instansis');
    }
    

    /**
    * List all data instansi
    *
    */
    public function index() 
    {
        $this->edit();
	      
    }

    

   

    

    /**
    * Call Form to Modify instansi
    *
    */
    public function edit() 
    {
        
            $data['instansi'] = $this->instansis->get_one();
            $data['action']       = 'instansi/save/';           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_instansi").parsley();
                                    });','embed');
            
            $this->template->render('instansi/form',$data);
            
       
           // $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
           // redirect(site_url('instansi'));
        
    }


    
    /**
    * Save & Update data  instansi
    *
    */
    public function save() 
    {          
        if($this->session->userdata('group_id')==3)
        {
             $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
        }
        
        if ($this->input->post()) 
        {
            $this->instansis->update($this->_do_upload());
            $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
        } 
        
        redirect('instansi');
    }
    
    
    
    
    function _do_upload()
    {           
                
		$config['upload_path']      = './assets/logo/';
                $config['overwrite']        = TRUE;
                $config['file_name']        =  'logo';
		$config['allowed_types']    = 'jpg|jpeg|png|bmp';
		
		$this->load->library('upload', $config);
                $ext = @get_extension($_FILES['logo']["name"]) ;
                if($this->upload->do_upload('logo'))
                {
                    $resize = array(
                                    'width'         => 100,
                                    'height'        => 100,
                                    'quality'       => '100%',
                                    'create_thumb'  => false,
                                    'source_image'  => './assets/logo/' . $config['file_name'] .$ext,
                                  //  'new_image'     =>  '/assets/logo/' . $config['file_name'] .$ext 
                                );
                    $this->load->library('image_lib',$resize);
                    //$this->image_lib->initialize();
                    $this->image_lib->resize();
                    $this->image_lib->clear();                   
                    return 'logo' . $ext;
                }
                
                  return null; 
    }
    

    
   
}

?>
