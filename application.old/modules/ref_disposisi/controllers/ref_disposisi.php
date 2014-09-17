<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller ref_disposisi
 * @created on : {tanggal}
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class ref_disposisi extends MY_Controller
{

    public function __construct() 
    {
        parent::__construct();         
        $this->load->model('ref_disposisis');
    }
    

    /**
    * List all data ref_disposisi
    *
    */
    public function index() 
    {
        $config = array(
            'base_url'          => site_url('ref_disposisi/index/'),
            'total_rows'        => $this->ref_disposisis->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['ref_disposisis']       = $this->ref_disposisis->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('ref_disposisi/view',$data);
	      
    }

    

    /**
    * Call Form to Add  New ref_disposisi
    *
    */
    public function add() 
    {       
        $data['ref_disposisi'] = $this->ref_disposisis->add();
        $data['action']  = 'ref_disposisi/save';
        
        $this->template->js_add('
                $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#form_ref_disposisi").parsley();
                        });','embed');
      
        $this->template->render('ref_disposisi/form',$data);

    }

    

    /**
    * Call Form to Modify ref_disposisi
    *
    */
    public function edit($id='') 
    {
        if ($id != '') 
        {

            $data['ref_disposisi'] = $this->ref_disposisis->get_one($id);
            $data['action']       = 'ref_disposisi/save/' . $id;           
            
           
            $this->template->js_add('
                     $(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    $("#form_ref_disposisi").parsley();
                                    });','embed');
            
            $this->template->render('ref_disposisi/form',$data);
            
        }
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','info'));
            redirect(site_url('ref_disposisi'));
        }
    }


    
    /**
    * Save & Update data  ref_disposisi
    *
    */
    public function save($id =NULL) 
    {
        if($this->session->userdata('group_id') == 3)
        {
            $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah data!','danger','Perhatian'));
            redirect('ref_disposisi');
        }
        // validation config
        $config = array(
                  
                    array(
                        'field' => 'disposisi',
                        'label' => 'Disposisi',
                        'rules' => 'trim|required|xss_clean|is_unique[ref_disposisi.disposisi]'
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
                          
                            $this->ref_disposisis->save();
                            $this->session->set_flashdata('notif', notify('Data berhasil di simpan','success'));
                            redirect('ref_disposisi');
                         
                          
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
                        
                        $this->ref_disposisis->update($id);
                        $this->session->set_flashdata('notif', notify('Data berhasil di update','success'));
                        redirect('ref_disposisi');
                    }
                } 
                else // If validation incorrect 
                {
                    $this->edit($id);
                }
         }
    }

    
    /**
    * Search ref_disposisi like ""
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
            'base_url'          => site_url('ref_disposisi/search/' . $keyword),
            'total_rows'        => $this->ref_disposisis->count_all_search($keyword),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
        );
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['pagination']     = $this->pagination->create_links();
        $data['ref_disposisis'] = $this->ref_disposisis->get_search($config['per_page'], $this->uri->segment(3));
       
        $this->template->render('ref_disposisi/view',$data);
    }
    
    
    /**
    * Delete ref_disposisi by ID
    *
    */
    public function delete($id) 
    {  
        
        if($this->session->userdata('group_id') == 3)
        {
             $this->session->set_flashdata('notif', notify('Maaf untuk User Demo tidak diperkenankan menambah, menghapus atau mengubah!','danger','Perhatian'));
             redirect('ref_disposisi');
        }
        if ($id) 
        {
             $this->ref_disposisis->delete($id);           
             $this->session->set_flashdata('notif', notify('Data berhasil di hapus','success'));
             redirect('ref_disposisi');
           
        } 
        else 
        {
            $this->session->set_flashdata('notif', notify('Data tidak ditemukan','warning'));
            redirect('ref_disposisi');
        }       
    }

}

?>
