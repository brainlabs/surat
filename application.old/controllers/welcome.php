<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $nourut = 'F-001';
            
            for ($i=10;$i> 0;$i--)
            {
                
                echo sprintf("%05s", $nourut) . "<br/>";
		//$this->load->view('welcome_message');
                $nourut++;
            }
           
                
	}
        
   // Nomor transaksi
   // Author : Daud Valenntino Simbolon     
   function nomor_transakasi()
   { // Membuat Nomor Transaksi
  	 $str="F-";
         $this->db->select('salesnumber');
         $this->db->order_by('salesnumber','desc');
         $this->db->limit(1);
         $query = $this->db->get('sales');
         if($query->num_rows() > 0) {
             $row = $query->row();
             $row=substr($row->salesnumber,-3);
             $row = $row + 1;
             $row= $str. str_pad($row,3,0,STR_PAD_LEFT);
            
             //echo $row;
             return $row;
         }
         else 
         {
           // echo $str.'001';
            return ($str . 001);
         }
    }
    
    
  
        
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */