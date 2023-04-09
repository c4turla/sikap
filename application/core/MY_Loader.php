<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

	 public function template($template_name, $vars = array(), $return = FALSE)
	    {

	    	$session['session']=array();
			$session['session']=$this->session->userdata;

			//Total Kapal
			$CountKapal = $this->db->query("select count(*) as total from data_kapal");
			$totalKapal = $CountKapal->result();
			$res['totalKapal']  = $totalKapal[0]->total;

			//Total Kedatangan
			$CountCars = $this->db->query("SELECT a.id AS total,a.nama_kapal, b.* FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id where year(tanggal)=YEAR(CURDATE())");
			$totalCars = $CountCars->num_rows();
			$res['Kedatangan']  = $totalCars;

			//Total Keberangkatan
			$CountDrivers = $this->db->query("SELECT a.id AS total,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id where year(tanggal)=YEAR(CURDATE())");
			$totalDrivers = $CountDrivers->num_rows;
			$res['totalKeberangkatan']  = $totalDrivers;
			
			

			
			//Total Ikan Bulan Ini
			$CountIkan= $this->db->query("SELECT SUM(berat1+berat2+berat3+berat4+berat5) AS total_ikan FROM data_kedatangan WHERE
										 (MONTH(tanggal) = MONTH(NOW()) AND YEAR(tanggal) = YEAR(NOW()))");
			$totalIkan = $CountIkan->result();
			$res['totalIkan']  = $totalIkan[0]->total_ikan;


	 		$res['arraymenu']   = array();         
			foreach($session['session']['menu'] as $val){
			   if($val['parent_id'] != 0){
			       $res['arraymenu'][$val['parent_id']]['childnya'][] = $val;
			   }
			   else{
			       $res['arraymenu'][$val['menu_id']] = $val;
			   }
			}
			//pr($res['arraymenu']);exit;
	        $content  = $this->view($GLOBALS['site_theme']."/bg_header",$session);
	        $content  = $this->view($GLOBALS['site_theme']."/bg_left",$res);
	        $content .= $this->view($template_name, $vars, $return);
	        $content .= $this->view($GLOBALS['site_theme']."/bg_footer");
	        if ($return)
	        {
	            return $content;
	        }
	    }
		
}