<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller Laporan
 * @created on : 03-Juni-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class laporan extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('laporans');
        $this->load->model('surat_keluar/surat_keluars');
        $this->load->model('surat_masuk/surat_masuks');
    }
    
    
    function index()
    {
        
    }
    
    
    function surat_keluar()
    {
        $config = array(
            'base_url'          => site_url('laporan/surat_keluar/'),
            'total_rows'        => $this->surat_keluars->count_all(),
            
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        $this->template->js_add('
                $(document).ready(function(){
                        // binds form submission and fields to the validation engine
                        $("#filter").parsley();
                 });','embed');
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_keluars']  = $this->surat_keluars->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('laporan/surat_keluar',$data);
    }
    
    
    
    
    
    function filter_surat_keluar()
    {
        $config = array(
            'base_url'          => site_url('laporan/display_surat_keluar/'),
            'total_rows'        => $this->laporans->filter_count_surat_keluar(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        if($this->input->post('start'))
        {            
        
            $sess = $this->session->set_userdata(
                    array(
                        'start' => $this->input->post('start',TRUE),
                        'end' => $this->input->post('end',TRUE)
                        )
                );
        }
        $this->template->js_add('
                $(document).ready(function(){
                        // binds form submission and fields to the validation engine
                        $("#filter").parsley();
                 });','embed');
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_keluars']  = $this->laporans->filter_surat_keluar($config['per_page'], $this->uri->segment(3));
        $this->template->render('laporan/surat_keluar',$data);
    }
    
    
    // surat masuk
    // --------------------------------------------------------------------------------
 
    
    function surat_masuk()
    {
        $config = array(
            'base_url'          => site_url('laporan/surat_masuk/'),
            'total_rows'        => $this->surat_masuks->count_all(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        $this->template->js_add('
                $(document).ready(function(){
                        // binds form submission and fields to the validation engine
                        $("#filter").parsley();
                 });','embed');
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_masuks']   = $this->surat_masuks->get_all($config['per_page'], $this->uri->segment(3));
        $this->template->render('surat_masuk',$data);
    }
    
    
    
    function filter_surat_masuk()
    {
        $config = array(
            'base_url'          => site_url('laporan/filter_surat_masuk/'),
            'total_rows'        => $this->laporans->filter_count_surat_masuk(),
            'per_page'          => $this->config->item('per_page'),
            'uri_segment'       => 3,
            'num_links'         => 9,
            'use_page_numbers'  => FALSE
            
        );
        
        if($this->input->post('start'))
        {            
        
            $sess = $this->session->set_userdata(
                    array(
                        '_start' => $this->input->post('start',TRUE),
                        '_end' => $this->input->post('end',TRUE)
                        )
                );
        }
        
        $this->template->js_add('
                $(document).ready(function(){
                        // binds form submission and fields to the validation engine
                        $("#filter").parsley();
                 });','embed');
        
        $this->pagination->initialize($config);
        $data['total']          = $config['total_rows'];
        $data['pagination']     = $this->pagination->create_links();
        $data['number']         = (int)$this->uri->segment(3) +1;
        $data['surat_masuks']   = $this->laporans->filter_surat_masuk($config['per_page'], $this->uri->segment(3));
        $this->template->render('surat_masuk',$data);
    }
    
}