<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller surat_keluar
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class surat_keluar extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('surat_keluars');
        $this->load->model('dropdowns');
    }
    

    /**
    * List all data surat_keluar
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('surat_keluar/index/'),
            'total_rows'        => $this->surat_keluars->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_keluars']       = $this->surat_keluars->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('surat_keluar/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New surat_keluar
    *
    */
    public function add() 
    {       
        $data['surat_keluar'] = $this->surat_keluars->add();
        $data['action']  = 'surat_keluar/save';
        $data['jenis_surat'] = $this->dropdowns->jenis_surat();
        $data['perihal'] = $this->dropdowns->perihal();
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_surat_keluar").parsley();
                        });','embed');
      
        $this->template->render('surat_keluar/form',$data);

    }

    

    /**
    * Call Form to Modify surat_keluar
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['surat_keluar']   = $this->surat_keluars->get_one($id);
            $data['action']         = 'surat_keluar/save/' . $id;
            $data['jenis_surat']    = $this->dropdowns->jenis_surat();
            $data['perihal']        = $this->dropdowns->perihal();
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_surat_keluar").parsley();
                                    });','embed');
            
            $this->template->render('surat_keluar/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('surat_keluar'));
        }
    }


    
    /**
    * Save & Update data  surat_keluar
    *
    */
    public function save($id =NULL) 
    {
        if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('surat_keluar');
        }
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'jenis_surat_id',
                        'label' => 'Jenis Surat',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nomor_surat',
                        'label' => 'Nomor Surat',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tanggal_surat',
                        'label' => 'Tanggal Surat',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'perihal_id',
                        'label' => 'Perihal',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tujuan',
                        'label' => 'Tujuan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'penanda_tangan',
                        'label' => 'Penanda Tangan',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'catatan',
                        'label' => 'Catatan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'file_surat',
                        'label' => 'File Surat',
                        'rules' => 'trim|xss_clean'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post()) 
                      {
                          $name = $this->_do_upload('file_surat');
                          $this->surat_keluars->save($name);
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('surat_keluar');
                          
                      }
                  } 
                  else // If validation incorrect 
                  {
                      $this->add();
                  }
         }
         else // Update data if Form Edit send Post and ID available
         {               
                $this->form_validation->set_rules($config);

                if ($this->form_validation->run() == TRUE) 
                {
                    if ($this->input->post()) 
                    {
                        if (!empty($_FILES['file_surat']['name']))
                        {
                            $file_name = $this->_do_upload('file_surat');
                            @unlink('./file/surat_keluar/' . $this->input->post('file_old'));
                        }
                        else
                        {
                            $file_name = $this->input->post('file_old');
                        }
                        $this->surat_keluars->update($id,$file_name);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('surat_keluar');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search surat_keluar like ""
    *
    */   
    public function search()
    {
       if($this->input->post('q'))
        {
            $keyword = $this->input->post('q');
            
            $this->session->set_userdata(
                        array('keyword' => $this->input->post('q',TRUE))
                    );
        }
        
         $config = array(
            'base_url'          => site_url('surat_keluar/search/'),
            'total_rows'        => $this->surat_keluars->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['surat_keluars']       = $this->surat_keluars->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('surat_keluar/view',$data);
    }
    
    
    /**
    * Delete surat_keluar by ID
    *
    */
    public function delete($id) 
    {   
        if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('surat_keluar');
        }
        
        if ($id) 
        {
            $this->surat_keluars->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('surat_keluar');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('surat_keluar');
        }       
    }
    
    
    
    // Upload file
    
    function _do_upload($user_file_name)
    {           
                
		$config['upload_path'] = './file/surat_keluar/';
                $file_name = 'surat_keluar_' . date('Ymd_His');
                $config['file_name'] =  $file_name;
		$config['allowed_types'] = 'jpg|png|doc|docx|zip|rar|pdf|bmp';
		
                $ext = @get_extension($_FILES[$user_file_name]["name"]) ;
		$this->load->library('upload', $config);
              
                $this->upload->do_upload($user_file_name);
                
                return $file_name . $ext;                
                
    }
    
    
    
    function ambil_perihal()
    {
        if($this->input->post('perihal'))
        {
           $data  = $this->surat_keluars->get_perihal($this->input->post('perihal'));
           
            echo json_encode($data);
        }
    }

}

?>
