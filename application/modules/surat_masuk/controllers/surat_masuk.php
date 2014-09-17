<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller surat_masuk
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class surat_masuk extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('surat_masuks');
        $this->load->model('dropdowns');
     
    }
    

    /**
    * List all data surat_masuk
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('surat_masuk/index/'),
            'total_rows'        => $this->surat_masuks->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_masuks']   = $this->surat_masuks->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('surat_masuk/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New surat_masuk
    *
    */
    public function add() 
    {       
        $data['surat_masuk'] = $this->surat_masuks->add();
        $data['action']  = 'surat_masuk/save';
        $data['perihal']        = $this->dropdowns->perihal();
        $data['disposisi']        = $this->dropdowns->disposisi();
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_surat_masuk").parsley();
                        });','embed');
      
        $this->template->render('surat_masuk/form',$data);

    }

    

    /**
    * Call Form to Modify surat_masuk
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['surat_masuk'] = $this->surat_masuks->get_one($id);
            $data['action']       = 'surat_masuk/save/' . $id;           
            $data['perihal']        = $this->dropdowns->perihal();
            $data['disposisi']        = $this->dropdowns->disposisi();
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_surat_masuk").parsley();
                                    });','embed');
            
            $this->template->render('surat_masuk/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('surat_masuk'));
        }
    }


    
    /**
    * Save & Update data  surat_masuk
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
                        'field' => 'skpd_pengirim',
                        'label' => 'Skpd Pengirim',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tanggal_surat',
                        'label' => 'Tanggal Surat',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nomor_surat',
                        'label' => 'Nomor Surat',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'perihal_id',
                        'label' => 'Perihal',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nomor_agenda',
                        'label' => 'Nomor Agenda',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'tanggal_diterima',
                        'label' => 'Tanggal Diterima',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'disposisi_id',
                        'label' => 'Disposisi',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'catatan',
                        'label' => 'Catatan',
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
                          $this->surat_masuks->save($name);
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('surat_masuk');
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
                    if ($this->input->post() )
                    {
                        if (!empty($_FILES['file_surat']['name']))
                        {
                            $file_name = $this->_do_upload('file_surat');
                            @unlink('./file/surat_masuk/' . $this->input->post('file_old'));
                        }
                        else
                        {
                            $file_name = $this->input->post('file_old');
                        }
                        
                        $this->surat_masuks->update($id,$file_name);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('surat_masuk');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search surat_masuk like ""
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
            'base_url'          => site_url('surat_masuk/search/' ),
            'total_rows'        => $this->surat_masuks->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['surat_masuks']   = $this->surat_masuks->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('surat_masuk/view',$data);
    }
    
    
    
    
    
    
    /**
    * Delete surat_masuk by ID
    *
    */
    public function delete($id) 
    {   if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('surat_masuk');
        }     
        if ($id) 
        {
            $this->surat_masuks->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('surat_masuk');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('surat_masuk');
        }       
    }
    
    
    
    function _do_upload($user_file_name)
    {           
                
		$config['upload_path'] = './file/surat_masuk/';
                $file_name = 'surat_masuk_' . date('Ymd_His');
                $config['file_name'] =  $file_name;
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|zip|rar|pdf|bmp';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1024';
		//$config['max_height']  = '768';
                $ext = get_extension($_FILES[$user_file_name]["name"]) ;
		$this->load->library('upload', $config);
              
                $this->upload->do_upload($user_file_name);
                
                return $file_name . $ext;
               
    }
    
    
    

}

?>
