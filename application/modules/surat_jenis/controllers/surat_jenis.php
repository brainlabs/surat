<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller surat_jenis
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class surat_jenis extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('surat_jeniss');
    }
    

    /**
    * List all data surat_jenis
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('surat_jenis/index/'),
            'total_rows'        => $this->surat_jeniss->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_jeniss']       = $this->surat_jeniss->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('surat_jenis/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New surat_jenis
    *
    */
    public function add() 
    {       
        $data['surat_jenis'] = $this->surat_jeniss->add();
        $data['action']  = 'surat_jenis/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_surat_jenis").parsley();
                        });','embed');
      
        $this->template->render('surat_jenis/form',$data);

    }

    

    /**
    * Call Form to Modify surat_jenis
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['surat_jenis'] = $this->surat_jeniss->get_one($id);
            $data['action']       = 'surat_jenis/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_surat_jenis").parsley();
                                    });','embed');
            
            $this->template->render('surat_jenis/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('surat_jenis'));
        }
    }


    
    /**
    * Save & Update data  surat_jenis
    *
    */
    public function save($id =NULL) 
    {
        
        if($this->session->userdata('group_id') == 3)
            {
                $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
                redirect('surat_jenis');
            }
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'nama_jenis',
                        'label' => 'Nama Jenis',
                        'rules' => 'trim|required|xss_clean'
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
                          
                          $this->surat_jeniss->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('surat_jenis');
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
                        $this->surat_jeniss->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('surat_jenis');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search surat_jenis like ""
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
            'base_url'          => site_url('surat_jenis/search/' . $keyword),
            'total_rows'        => $this->surat_jeniss->count_all_search($keyword),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['surat_jeniss']       = $this->surat_jeniss->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('surat_jenis/view',$data);
    }
    
    
    /**
    * Delete surat_jenis by ID
    *
    */
    public function delete($id) 
    {    
        if($this->session->userdata('group_id') == 3)
            {
                $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
                redirect('surat_jenis');
            }
        
        if ($id) 
        {
            $this->surat_jeniss->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('surat_jenis');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('surat_jenis');
        }       
    }

}

?>
