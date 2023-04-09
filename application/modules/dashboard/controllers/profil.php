<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profil extends CI_Controller {

	function index()
	{
		//pr("s");exit;
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['Username']=$this->session->userdata['NamaLengkap'];
			$this->load->view($GLOBALS['site_theme']."/bg_header",$session);
 			$this->load->view($GLOBALS['site_theme']."/bg_left");
 			$this->load->view($GLOBALS['site_theme']."/profile/profile");
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
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
