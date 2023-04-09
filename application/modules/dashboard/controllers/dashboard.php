<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	
	

	function index()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;
			//pr($session);exit;
			foreach($this->app_load_data_model->grafik_kedatangan()->result_array() as $row)
		   {
			$data['grafik'][]=(float)$row['Januari'];
			$data['grafik'][]=(float)$row['Februari'];
			$data['grafik'][]=(float)$row['Maret'];
			$data['grafik'][]=(float)$row['April'];
			$data['grafik'][]=(float)$row['Mei'];
			$data['grafik'][]=(float)$row['Juni'];
			$data['grafik'][]=(float)$row['Juli'];
			$data['grafik'][]=(float)$row['Agustus'];
			$data['grafik'][]=(float)$row['September'];
			$data['grafik'][]=(float)$row['Oktober'];
			$data['grafik'][]=(float)$row['November'];
			$data['grafik'][]=(float)$row['Desember'];
		   }
		   
			foreach($this->app_load_data_model->grafik_keberangkatan()->result_array() as $row)
		   {
			$data['berangkat'][]=(float)$row['Januari'];
			$data['berangkat'][]=(float)$row['Februari'];
			$data['berangkat'][]=(float)$row['Maret'];
			$data['berangkat'][]=(float)$row['April'];
			$data['berangkat'][]=(float)$row['Mei'];
			$data['berangkat'][]=(float)$row['Juni'];
			$data['berangkat'][]=(float)$row['Juli'];
			$data['berangkat'][]=(float)$row['Agustus'];
			$data['berangkat'][]=(float)$row['September'];
			$data['berangkat'][]=(float)$row['Oktober'];
			$data['berangkat'][]=(float)$row['November'];
			$data['berangkat'][]=(float)$row['Desember'];
		   }
			
			$this->load->template($GLOBALS['site_theme']."/bg_home",$data);
		
		}
		else
		{
			redirect("login");
		}
	}

	function logout()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$this->session->sess_destroy();
			redirect("dashboard");
		}
		else
		{
			redirect("login");
		}
	}
}
