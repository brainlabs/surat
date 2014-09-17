<?php if (!defined('BASEPATH'))  exit('No direct script access allowed');

/**
 * Controller ajax
 * @created on : 04-06-2014
 * @author Daud D. Simbolon <daud.simbolon@gmail.com>
 * Copyright 2014
 *
 *
 */


class ajax extends MY_Controller
{
    function __construct() 
    {
        parent::__construct();
        
        $this->load->model('ajaxs');
    }
    
    
    function ambil_perihal()
    {
        if($this->input->post('perihal'))
        {
           $data  = $this->ajaxs->get_perihal($this->input->post('perihal'));
           
            echo json_encode($data);
        }
    }
    
    
    function ambil_disposisi()
    {
        if($this->input->post('disposisi'))
        {
           $data  = $this->ajaxs->get_disposisi_detail($this->input->post('disposisi'));
           
           $tpl ='';
           if($data)
           {
               $no = 1;
               $tpl = '<table class="table table-condensed">';
               foreach ($data as $key => $val)
               {
                   $tpl .= '<tr>'
                           . '<td>'. $no++ .'</td>'
                           . '<td>'. $val['deskripsi'] .'</td>'
                           . '</tr>';
               }
               
               $tpl .='</teble>';
           }
           
          // echo json_encode($data);
           
           echo $tpl;
        }
    }
    
    
    
    function detail_surat_keluar()
    {
         $this->load->model('surat_keluar/surat_keluars');
        if($this->input->post('nilai'))
        {
          $data =  $this->surat_keluars->get_one($this->input->post('nilai'));
          
          if($data)
          {
              $table     = '<h4>Surat Keluar</h4><br/>';
              $table    .= '<table class="table table-condensed table-striped">';
              $table    .= '<tr><td width="200">Jenis Surat</td><td>' .$data['nama_jenis']. '</td></tr>';              
              $table    .= '<tr><td>Nomor Surat</td><td>' . $data['nomor_surat']. '</td></tr>';
              $table    .= '<tr><td>Tanggal Surat</td><td>' . format_tanggal($data['tanggal_surat']). '</td></tr>';
              $table    .= '<tr><td>Perihal</td><td>' . $data['perihal']. '</td></tr>';
              $table    .= '<tr><td>Tujuan</td><td>' . $data['tujuan']. '</td></tr>';              
              $table    .= '<tr><td>Penandatangan</td><td>' . $data['penanda_tangan']. '</td></tr>';
              
              $file     = ($data['file_surat'] ? anchor(base_url('file/surat_keluar/' . $data['file_surat']), $data['file_surat'],'target="_blank"') :'..');
             // $file     = (file_exists($file) ? $file : '..');
              
              $table    .= '<tr><td>Catatan</td><td>' . $data['catatan']. '</td></tr>';
              $table    .= '<tr><td>File Surat</td><td>' . $file . '</td></tr>';
              $table    .= '</table>';
              echo $table;
          }
        }
    }
    
    
    function detail_surat_masuk()
    {
        $this->load->model('surat_masuk/surat_masuks');
        if($this->input->post('nilai'))
        {
          $data =  $this->surat_masuks->get_one($this->input->post('nilai'));
          $disposisi = $this->surat_masuks->get_disposisi_detail($data['disposisi_id']);
          if($data)
          {
              $table     = '<h4>Surat Masuk</h4><br/>';
              $table    .= '<table class="table table-condensed table-striped">';
              $table    .= '<tr><td width="200">SKPD Pengirim</td><td>' .$data['skpd_pengirim']. '</td></tr>';
              $table    .= '<tr><td>Tanggal Surat</td><td>' . format_tanggal($data['tanggal_surat']). '</td></tr>';
              $table    .= '<tr><td>Nomor Surat</td><td>' . $data['nomor_surat']. '</td></tr>';
              $table    .= '<tr><td>Perihal</td><td>' . $data['perihal']. '</td></tr>';
              $table    .= '<tr><td>Nomor Agenda</td><td>' . $data['nomor_agenda']. '</td></tr>';
              $table    .= '<tr><td>Tanggal diterima</td><td>' . format_tanggal($data['tanggal_diterima']). '</td></tr>';
              $table    .= '<tr><td>Disposisi</td><td>' . $data['disposisi']. '</td></tr>';
              if($disposisi)
              {
                  $no = 1;
                  foreach ($disposisi as $key => $val)
                  {
                      $table    .= '<tr><td></td><td> &nbsp;&nbsp&nbsp;&nbsp;'. $no++ .'. ' . $val['deskripsi']. '</td></tr>';
                  }
              }
              
              $file     = ($data['file_surat'] ? anchor(base_url('file/surat_masuk/' . $data['file_surat']), $data['file_surat'],'target="_blank"') :'..');
              //$file     = (file_exists($file) ? $file : '..');
              
              $table    .= '<tr><td>Catatan</td><td>' . $data['catatan']. '</td></tr>';
              $table    .= '<tr><td>File Surat</td><td>' . $file . '</td></tr>';
              $table    .= '</table>';
              echo $table;
          }
        }
        
        
    }
}