<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *  Copyright 2013
 * 
 */

/**
 * Description of import
 *
 * @author Daud Simbolon <daud.simbolon@gmail.com>
 */
class import extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        echo anchor(site_url('import/perihal'),'Import Perihal') . '<br/>';
      
    }

    public function perihal()
    {
        $this->load->library('excel');
        
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load('./Dokumen/Book1.xlsx'); // relative path to .xls that was uploaded earlier
        
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $counter = 1;
        
        foreach ($sheetData as $data) 
        {
            //echo $data['AB'] . '<br />';
           if($data['B'])
           {
            $this->db->set('perihal',$data['B']);
            $this->db->set('diterbitkan_kepada',$data['C']);
            $this->db->set('pengelola_surat',$data['D']);
            
            
            $this->db->insert('ref_perihal');
           }
            $counter++;
            
        }
        
        echo " Berhasil : " . $counter;

    }  
    
    public function pegawai()
    {
        $this->load->library('excel');
        
        
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load('./db/guru_2013.xlsx'); // relative path to .xls that was uploaded earlier
        
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        $counter = 1;
        
        foreach ($sheetData as $data) 
        {
               
           if($counter > 5 )
           {
              if(!empty($data['C']))
              {
                $this->db->set('nama_pegawai',$data['C']);
                $this->db->set('nomor_ktp',$data['G']);
                $this->db->set('tempat_lahir',$data['I']);
                if($data['J'])
                {
                    $tgl = $data['L'] . '-' . $data['K'] . '-' . $data['J'];
                    $this->db->set('tanggal_lahir',$tgl);
                }

                $this->db->set('jenis_kelamin',$data['F']);
                $this->db->set('nama_ibu_kandung',$data['M']);

                switch (trim($data['N']))
                {
                    case 'Islam' :
                        $this->db->set('agama_id',1);
                        break;
                    case 'Katolik' :
                        $this->db->set('agama_id',2);
                        break;
                    case 'Kristen' :
                        $this->db->set('agama_id',3);
                        break;
                    case 'Budha' :
                        $this->db->set('agama_id',4);
                        break;
                    case 'Hindu' :
                        $this->db->set('agama_id',5);
                        break;
                    default  :                    
                        break;                
                }

                $this->db->set('jabatan_id',  $this->_jabatan($data['D']));
                $this->db->set('status_perkawinan',$data['Q']);
                $this->db->set('alamat',$data['O']);
                $this->db->set('telepon',$data['S']);
                $this->db->set('email',$data['BA']);
                $this->db->set('jumlah_anak',$data['R']);
                $this->db->set('nuptk',$data['U']);
                $this->db->set('tmt_pegawai',$data['V']);
                $this->db->set('tmt_sekolah',$data['W']);
                $this->db->set('pendidikan_terakhir',7);
                $this->db->set('tahun_lulus',$data['AH']);
                $this->db->set('nama_lembaga',$data['AG']);
                $this->db->insert('pegawai');
                
                $pegawai_id = $this->db->insert_id();
                
                
                $profesi = array(
                    'pegawai_id'            => $pegawai_id,
                    'golongan'              => $data['AN'],
                    'masa_kerja_tahun'      => $data['AO'],
                    'masa_kerja_bulan'      => $data['AP'],
                    'nomor_sk_inpassing'    => $data['AQ'],
                    'tanggal_sk_inpassing'  => $data['AR']
                );
                
                $sertifikasi = array(
                    'pegawai_id'            => $pegawai_id,
                    'nomor_peserta'         => $data['AT'],
                    'bidang_studi'          => $data['AU'],
                    'penyelenggara'         => $data['AV'],
                    'nomor_sertifikat'      => $data['AW'],
                    'nomor_registrasi_guru' => $data['AX'],
                    'tanggal_sertifikat'    => $data['AY']
                );
                
                if(!empty($data['AN']))
                {
                    $this->db->insert('pegawai_profesi',$profesi);
                }
                if(!empty($data['AT']))
                {
                    $this->db->insert('pegawai_sertifikasi',$sertifikasi);
                }
              }
            }
            $counter++;
        }
        
        echo " Berhasil : " . $counter;
    }
    
    
    function _jabatan($jabatan = '')
    {
        switch (trim($jabatan))
        {
            case 'Kepala Sekolah':
                $id = 1;
                break;
            case 'Wakasek' :
                $id = 2;
                break;
            case 'Guru':
                $id = 3;
                break;
            case 'Tata Usaha' :
                $id = 4;
                break;
            case 'Pustakawati' :
                $id = 5;
                break;
            case 'Pesuruh' :
                $id = 6;
                break;
            case 'Satpam' :
                $id = 7;
                break;
            default :
                $id = 99;
                break;
        }
        
        return $id;
    }

}

?>
