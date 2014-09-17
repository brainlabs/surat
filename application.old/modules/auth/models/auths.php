<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of auths
 * @created on : 04-June-2014
 * @author DAUD D. SIMBOLON <daud.simbolon@gmail.com>
 */
 
 
class auths extends CI_Model 
{

    public function __construct() 
    {
        parent::__construct();
    }


    
    function do_login($username ='',$passwd ='')
    {
        $key  = sha1($this->config->item('encryption_key'));
        $this->db->where('nip',$username);
        $this->db->where('passwd',md5(sha1($passwd) . $key));
        $q = $this->db->get('pegawai');
        $msg = array (
            'msg' => 'Username atau Password anda salah',
            'reload' => false
            );
        if($q->num_rows()  == 1)
        {
            $row = $q->row();
            
            if($row->nip == trim($username) && $row->passwd == md5(sha1($passwd). $key))
            {
                $sess = array(
                    'nip'          => $row->nip,
                    'nama_pegawai' => $row->nama_pegawai,
                    'group_id'     => $row->group_id,
                    'login'        => true                
                );
                
                $this->session->set_userdata($sess);
                
                $msg = array (
                    'msg' => '',
                    'reload' => true
                    );
            }
        }
       
        
        return $msg;
    }

    
}