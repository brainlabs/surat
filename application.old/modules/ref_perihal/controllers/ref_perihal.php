<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller ref_perihal
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class ref_perihal extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('ref_perihals');
    }
    

    /**
    * List all data ref_perihal
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('ref_perihal/index/'),
            'total_rows'        => $this->ref_perihals->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['ref_perihals']   = $this->ref_perihals->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('ref_perihal/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New ref_perihal
    *
    */
    public function add() 
    {       
        $data['ref_perihal'] = $this->ref_perihals->add();
        $data['action']  = 'ref_perihal/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_ref_perihal").parsley();
                        });','embed');
      
        $this->template->render('ref_perihal/form',$data);

    }

    

    /**
    * Call Form to Modify ref_perihal
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['ref_perihal'] = $this->ref_perihals->get_one($id);
            $data['action']       = 'ref_perihal/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_ref_perihal").parsley();
                                    });','embed');
            
            $this->template->render('ref_perihal/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('ref_perihal'));
        }
    }


    
    /**
    * Save & Update data  ref_perihal
    *
    */
    public function save($id =NULL) 
    {
        // validation config
            if($this->session->userdata('group_id') == 3)
            {
                $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
                redirect('ref_perihal');
            }
        
        $config = array(
                  
                    array(
                        'field' => 'perihal',
                        'label' => 'Perihal',
                        'rules' => 'trim|required|xss_clean|is_uniquie[ref_perihal.perihal]'
                        ),
                    
                    array(
                        'field' => 'diterbitkan_kepada',
                        'label' => 'Diterbitkan Kepada',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'pengelola_surat',
                        'label' => 'Pengelola Surat',
                        'rules' => 'trim|required|xss_clean'
                        ),
                               
                  );
            
        // if id NULL then add new data
        if(!$id)
        {    
                  $this->form_validation->set_rules($config);

                  if ($this->form_validation->run() == TRUE) 
                  {
                      if ($this->input->post('perihal')) 
                      {
                          
                          $this->ref_perihals->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('ref_perihal');
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
                        $this->ref_perihals->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('ref_perihal');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search ref_perihal like ""
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
            'base_url'          => site_url('ref_perihal/search/'),
            'total_rows'        => $this->ref_perihals->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['ref_perihals']   = $this->ref_perihals->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('ref_perihal/view',$data);
    }
    
    
    /**
    * Delete ref_perihal by ID
    *
    */
    public function delete($id) 
    {    
        if($this->session->userdata('group_id') == 3)
            {
                $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah!','danger','Perhatian'));
                redirect('ref_perihal');
            }
        if ($id) 
        {
            $this->ref_perihals->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('ref_perihal');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('ref_perihal');
        }       
    }

}


