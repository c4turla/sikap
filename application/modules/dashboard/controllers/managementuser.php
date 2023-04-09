<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class managementuser extends CI_Controller {

	function index($uri=0)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
		    $session['Username']=$this->session->userdata['NamaLengkap'];
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_table_user(1,$uri);
			//pr($d);exit;
			$this->load->view($GLOBALS['site_theme']."/bg_header",$session);
 			$this->load->view($GLOBALS['site_theme']."/bg_left");
 			$this->load->view($GLOBALS['site_theme']."/magementuser/bg_home",$d);
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}
	function page($uri=0)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			 $session['Username']=$this->session->userdata['NamaLengkap'];
			$d['dt_retrieve'] = $this->app_load_data_model->indexs_table_user($GLOBALS['site_limit_medium'],$uri);
			//pr($d);exit;
			$this->load->view($GLOBALS['site_theme']."/bg_header",$session);
 			$this->load->view($GLOBALS['site_theme']."/bg_left");
 			$this->load->view($GLOBALS['site_theme']."/magementuser/bg_home",$d);
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}
	
}
