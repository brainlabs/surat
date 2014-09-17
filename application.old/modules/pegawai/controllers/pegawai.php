<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller pegawai
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class pegawai extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('pegawais');
        $this->load->model('dropdowns');
    }
    

    /**
    * List all data pegawai
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('pegawai/index/'),
            'total_rows'        => $this->pegawais->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pegawais']       = $this->pegawais->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('pegawai/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New pegawai
    *
    */
    public function add() 
    {       
        $data['pegawai'] = $this->pegawais->add();
        $data['group'] = $this->dropdowns->group();
        $data['action']  = 'pegawai/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_pegawai").parsley();
                        });','embed');
      
        $this->template->render('pegawai/form',$data);

    }

    

    /**
    * Call Form to Modify pegawai
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['pegawai'] = $this->pegawais->get_one($id);
            $data['group'] = $this->dropdowns->group();
            $data['action']       = 'pegawai/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_pegawai").parsley();
                                    });','embed');
            
            $this->template->render('pegawai/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('pegawai'));
        }
    }


    
    /**
    * Save & Update data  pegawai
    *
    */
    public function save($id =NULL) 
    {
        if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('pegawai');
        }
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'nip',
                        'label' => 'Nip',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'nama_pegawai',
                        'label' => 'Nama Pegawai',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'jabatan',
                        'label' => 'Jabatan',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|xss_clean'
                        ),
                    
                    array(
                        'field' => 'passwd',
                        'label' => 'Passwd',
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
                          
                          $this->pegawais->save();
                          $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                          redirect('pegawai');
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
                        $this->pegawais->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('pegawai');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search pegawai like ""
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
            'base_url'          => site_url('pegawai/search/'),
            'total_rows'        => $this->pegawais->count_all_search(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['pegawais']       = $this->pegawais->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('pegawai/view',$data);
    }
    
    
    /**
    * Delete pegawai by ID
    *
    */
    
    public function delete($id) 
    {        
        if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('pegawai');
        }
        if ($id) 
        {
            
             $this->pegawais->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('pegawai');
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('pegawai');
        }       
    }

}

?>
