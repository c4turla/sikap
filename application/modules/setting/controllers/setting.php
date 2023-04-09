<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends CI_Controller {
	
	
	function index()
	{
		
	
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;
			//pr($this->session->userdata['NamaLengkap']);exit;
			$id['id'] = 1;
			$get = $this->db->get_where("company_information",$id)->row();
			
			//View Setting 1		
			$d['CompanyName'] = $get->CompanyName;
			$d['CompanyAddress'] = $get->CompanyAddress;
			$d['CompanyPhone'] = $get->CompanyPhone;
			$d['companyPhone02'] = $get->CompanyPhone2;
			$d['companyFax'] = $get->CompanyFax;
			$d['companyEmail'] = $get->CompanyEmail;
			$d['companyEmail02'] = $get->CompanyEmail2;
			$d['CompanyWebsite'] = $get->CompanyWebsite;
			
			//View Setting 2		
			$d['bankName01'] = $get->BankName;
			$d['accountNo01'] = $get->AccountNumber;
			$d['accountName01'] = $get->AccountName;
			$d['bankName02'] = $get->BankName2;
			$d['accountNo02'] = $get->AccountNumber2;
			$d['accountName02'] = $get->AccountName2;
			$d['bankName03'] = $get->BankName3;
			$d['accountNo03'] = $get->AccountNumber3;
			$d['accountName03'] = $get->AccountName3;
			$d['npwpNo'] = $get->NPWP;
			$d['npwpName'] = $get->NPWPName;
		
			//View Setting 3
			$this->load->library('encrypt');
			$d['SecurityPassword'] = $this->encrypt->decode($get->SecurityPassword);
			
			
			
			//pr($d);exit;
			$this->load->template($GLOBALS['site_theme']."/sistem/setting",$d);
			
		}
		else
		{
			redirect("login");
		}
	}
	
	function simpan()
	{
		
		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			
			//Update Profile 1 
			if(isset($_POST['CompanyName'])){$dt['CompanyName'] = $this->security->xss_clean($_POST['CompanyName']);}
			if(isset($_POST['CompanyAddress'])){$dt['CompanyAddress'] = $this->security->xss_clean($_POST['CompanyAddress']);}
			if(isset($_POST['companyPhone'])){$dt['CompanyPhone'] = $this->security->xss_clean($_POST['companyPhone']);}
			if(isset($_POST['companyPhone02'])){$dt['CompanyPhone2'] = $this->security->xss_clean($_POST['companyPhone02']);}
			if(isset($_POST['companyFax'])){$dt['CompanyFax'] = $this->security->xss_clean($_POST['companyFax']);}
			if(isset($_POST['companyEmail'])){$dt['CompanyEmail'] = $this->security->xss_clean($_POST['companyEmail']);}
			if(isset($_POST['companyEmail02'])){$dt['CompanyEmail2'] = $this->security->xss_clean($_POST['companyEmail02']);}
			if(isset($_POST['companyWebsite'])){$dt['CompanyWebsite'] = $this->security->xss_clean($_POST['companyWebsite']);}
			
			
			//Update Profile 2
			if(isset($_POST['bankName01'])){$dt['BankName'] = $this->security->xss_clean($_POST['bankName01']);}
			if(isset($_POST['accountNo01'])){$dt['AccountNumber'] = $this->security->xss_clean($_POST['accountNo01']);}
			if(isset($_POST['accountName01'])){$dt['AccountName'] = $this->security->xss_clean($_POST['accountName01']);}
			if(isset($_POST['bankName02'])){$dt['BankName2'] = $this->security->xss_clean($_POST['bankName02']);}
			if(isset($_POST['accountNo02'])){$dt['AccountNumber2'] = $this->security->xss_clean($_POST['accountNo02']);}
			if(isset($_POST['accountName02'])){$dt['AccountName2'] = $this->security->xss_clean($_POST['accountName02']);}
			if(isset($_POST['bankName03'])){$dt['BankName3'] = $this->security->xss_clean($_POST['bankName03']);}
			if(isset($_POST['accountNo03'])){$dt['AccountNumber3'] = $this->security->xss_clean($_POST['accountNo03']);}
			if(isset($_POST['accountName03'])){$dt['AccountName3'] = $this->security->xss_clean($_POST['accountName03']);}
			if(isset($_POST['npwpNo'])){$dt['NPWP'] = $this->security->xss_clean($_POST['npwpNo']);}
			if(isset($_POST['npwpName'])){$dt['NPWPName'] = $this->security->xss_clean($_POST['npwpName']);}
		
			//Update Profile 3
			$this->load->library('encrypt');
			if(isset($_POST['SecurityPassword'])){$dt['SecurityPassword'] = $this->encrypt->encode($this->security->xss_clean($_POST['SecurityPassword']));}
			
			//$TheId = $this->security->xss_clean($_POST['TheId']);
			//pr($this->security->xss_clean($_POST['TheId']));exit;
			//pr($dt);exit;
			$this->db->where('id', 1);
			$this->db->update("company_information",$dt);
			redirect("setting");
			
		}
		else
		{
			redirect("login");
		}
	}
	
}
