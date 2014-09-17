<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller ref_disposisi_detail
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class ref_disposisi_detail extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('ref_disposisi_details');
        $this->load->model('dropdowns');
    }
    

    /**
    * List all data ref_disposisi_detail
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('ref_disposisi_detail/index/'),
            'total_rows'        => $this->ref_disposisi_details->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['ref_disposisi_details']       = $this->ref_disposisi_details->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('ref_disposisi_detail/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New ref_disposisi_detail
    *
    */
    public function add() 
    {       
        $data['ref_disposisi_detail'] = $this->ref_disposisi_details->add();
        $data['action']  = 'ref_disposisi_detail/save';
        $data['disposisi'] = $this->dropdowns->disposisi();
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_ref_disposisi_detail").parsley();
                        });','embed');
      
        $this->template->render('ref_disposisi_detail/form',$data);

    }

    

    /**
    * Call Form to Modify ref_disposisi_detail
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['ref_disposisi_detail'] = $this->ref_disposisi_details->get_one($id);
            $data['action']       = 'ref_disposisi_detail/save/' . $id;           
            $data['disposisi']    = $this->dropdowns->disposisi();
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_ref_disposisi_detail").parsley();
                                    });','embed');
            
            $this->template->render('ref_disposisi_detail/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('ref_disposisi_detail'));
        }
    }


    
    /**
    * Save & Update data  ref_disposisi_detail
    *
    */
    public function save($id =NULL) 
    {
        if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('ref_disposisi_detail');
        }
        
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'disposisi_id',
                        'label' => 'Disposisi',
                        'rules' => 'trim|required|xss_clean'
                        ),
                    
                    array(
                        'field' => 'deskripsi',
                        'label' => 'Deskripsi',
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
                          
                          $this->ref_disposisi_details->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('ref_disposisi_detail');
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
                        $this->ref_disposisi_details->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('ref_disposisi_detail');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search ref_disposisi_detail like ""
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
            'base_url'          => site_url('ref_disposisi_detail/search/' ),
            'total_rows'        => $this->ref_disposisi_details->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['ref_disposisi_details']       = $this->ref_disposisi_details->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('ref_disposisi_detail/view',$data);
    }
    
    
    /**
    * Delete ref_disposisi_detail by ID
    *
    */
    public function delete($id) 
    {     
        
         if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('ref_disposisi_detail');
        }
        
        if ($id) 
        {
            $this->ref_disposisi_details->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('ref_disposisi_detail');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('ref_disposisi_detail');
        }       
    }

}

?>
