<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class data extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('excel');
    }

	function index($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_kapal($GLOBALS['site_limit_medium'],$uri);
			$this->load->template($GLOBALS['site_theme']."/data/data-kapal",$d);
		}
		else
		{
			redirect("login");
		}
	}

	//Start Kapal
	function kapal($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_kapal($GLOBALS['site_limit_medium'],$uri);
			$this->load->template($GLOBALS['site_theme']."/data/data-kapal",$d);
		}
		else
		{
			redirect("login");
		}
	}

	
	function AddKapal()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$this->load->template($GLOBALS['site_theme']."/data/data-create-kapal");

		}
		else
		{
			redirect("login");
		}
	}

	function EditKapal($idkapal)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id'] = $idkapal;
			//pr($id);exit;

			$get = $this->db->get_where("data_kapal",$id)->row();


			$d['nama_kapal'] = $get->nama_kapal;
			$d['pemilik'] = $get->pemilik;
			$d['no_izin'] = $get->no_izin;
			$d['gt'] = $get->gt;
			$d['alat_tangkap'] = $get->alat_tangkap;
			$d['tanda_selar'] = $get->tanda_selar;
			$d['tipe_kapal'] = $get->tipe_kapal;
			$d['tanggal_sipi'] = $get->tanggal_sipi;
			$d['tanggal_akhir_sipi'] = $get->tanggal_akhir_sipi;
			$d['no_siup'] = $get->no_siup;
			$d['panjang'] = $get->panjang;
			$d['foto_kapal'] = $get->foto_kapal;
			$d['id'] = $get->id;

			//pr($d);exit;

 			$this->load->template($GLOBALS['site_theme']."/data/data-edit-kapal",$d);

		}
		else
		{
			redirect("login");
		}
	}


	function TambahKapal($idkapal)
	{
		//pr($_FILES);
		//pr($_POST);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{


			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$id['id'] = $idkapal;
			if($_FILES['uploadPhoto']['name']!="")
			{
			$config['image_library'] = 'gd2';
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/files/foto_kapal" ;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '51200';
			$config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 600;
            $config['height']= 400;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			
			$this->load->library('upload', $config);
			$this->upload->do_upload('uploadPhoto');
			}
			$dt['foto_kapal'] =$_FILES['uploadPhoto']['name'];
			//pr($_FILES);exit;
			if(isset($_POST['nama_kapal'])){$dt['nama_kapal'] = $this->security->xss_clean($this->input->post('nama_kapal'));}
			if(isset($_POST['pemilik'])){$dt['pemilik'] = $this->security->xss_clean($this->input->post('pemilik'));}
			if(isset($_POST['no_izin'])){$dt['no_izin'] = $this->security->xss_clean($_POST['no_izin']);}
			if(isset($_POST['gt'])){$dt['gt'] = $this->security->xss_clean($_POST['gt']);}
			if(isset($_POST['alat_tangkap'])){$dt['alat_tangkap'] = $this->security->xss_clean($_POST['alat_tangkap']);}
			if(isset($_POST['tanda_selar'])){$dt['tanda_selar'] = $this->security->xss_clean($_POST['tanda_selar']);}
			if(isset($_POST['tipe_kapal'])){$dt['tipe_kapal'] = $this->security->xss_clean($_POST['tipe_kapal']);}
			if(isset($_POST['tanggal_sipi'])){$dt['tanggal_sipi'] = $this->security->xss_clean($_POST['tanggal_sipi']);}
			if(isset($_POST['tanggal_akhir_sipi'])){$dt['tanggal_akhir_sipi'] = $this->security->xss_clean($_POST['tanggal_akhir_sipi']);}
			if(isset($_POST['panjang'])){$dt['panjang'] = $this->security->xss_clean($_POST['panjang']);}
			if(isset($_POST['no_siup'])){$dt['no_siup'] = $this->security->xss_clean($_POST['no_siup']);}

			//pr($dt);exit;
			$this->db->insert("data_kapal",$dt);
			redirect("data");


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
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$id['id'] = $idkapal;
			//pr($_FILES);exit;
			if($_FILES['FilesName']['name']!="")
			{
			$config['image_library'] = 'gd2';
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/files/foto_kapal/" ;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '51200';
			$config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '50%';
            $config['width']= 600;
            $config['height']= 400;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$config['new_image'] = './files/foto_kapal/'.$dt["foto_kapal"];
			$this->load->library('upload', $config);
			$this->upload->do_upload('FilesName');
			
			//exit;
			$dt['foto_kapal'] =$_FILES['FilesName']['name'];
			}


			if(isset($_POST['nama_kapal'])){$dt['nama_kapal'] = $this->security->xss_clean($_POST['nama_kapal']);}
			if(isset($_POST['pemilik'])){$dt['pemilik'] = $this->security->xss_clean($_POST['pemilik']);}
			if(isset($_POST['no_izin'])){$dt['no_izin'] = $this->security->xss_clean($_POST['no_izin']);}
			if(isset($_POST['gt'])){$dt['gt'] = $this->security->xss_clean($_POST['gt']);}
			if(isset($_POST['alat_tangkap'])){$dt['alat_tangkap'] = $this->security->xss_clean($_POST['alat_tangkap']);}
			if(isset($_POST['tanda_selar'])){$dt['tanda_selar'] = $this->security->xss_clean($_POST['tanda_selar']);}
			if(isset($_POST['tipe_kapal'])){$dt['tipe_kapal'] = $this->security->xss_clean($_POST['tipe_kapal']);}
			if(isset($_POST['tanggal_sipi'])){$dt['tanggal_sipi'] = $this->security->xss_clean($_POST['tanggal_sipi']);}
			if(isset($_POST['tanggal_akhir_sipi'])){$dt['tanggal_akhir_sipi'] = $this->security->xss_clean($_POST['tanggal_akhir_sipi']);}
			if(isset($_POST['panjang'])){$dt['panjang'] = $this->security->xss_clean($_POST['panjang']);}
			if(isset($_POST['no_siup'])){$dt['no_siup'] = $this->security->xss_clean($_POST['no_siup']);}
			if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
			//pr($dt);exit;
			//Kalo ada Inputan Baru
			$get = $this->db->get_where("data_kapal",$dt)->row();
			//pr($dt);exit;
			$this->db->where('id', $dt['id']);
			$this->db->update("data_kapal",$dt);

			redirect("data");


		}
		else
		{
			redirect("login");
		}
	}


	function HapusKapal($id_param)
	{
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$id['id'] = $id_param;
			$get = $this->db->delete("data_kapal",$id);
			redirect("data");
		}
		else
		{
			redirect("login");
		}
	}


	//End Kapal

	//Start Ikan
		function ikan($uri=0)
		{
	
	
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$session['session']=array();
				$session['session']=$this->session->userdata;
				$d['dt_retrieve'] = $this->app_load_data_model->load_data_ikan($GLOBALS['site_limit_medium'],$uri);
				$this->load->template($GLOBALS['site_theme']."/data/data-ikan",$d);
			}
			else
			{
				redirect("login");
			}
		}

	function AddIkan()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$this->load->template($GLOBALS['site_theme']."/data/data-tambahikan");

		}
		else
		{
			redirect("login");
		}
	}

	function TambahIkan()
	{

		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			if(isset($_POST['nama_ikan'])){$dt['nama_ikan'] = $this->security->xss_clean($this->input->post('nama_ikan'));}

			$this->db->insert("data_ikan",$dt);
			redirect("data/ikan");
		}
		else
		{
			redirect("login");
		}
	}

	function EditIkan($idkapal)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id_ikan'] = $idkapal;
			//pr($id);exit;

			$get = $this->db->get_where("data_ikan",$id)->row();


			$d['nama_ikan'] = $get->nama_ikan;
			$d['id_ikan'] = $get->id_ikan;

			//pr($d);exit;

 			$this->load->template($GLOBALS['site_theme']."/data/data-edit-ikan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function simpanikan()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$id['id_ikan'] = $id_ikan;

			if(isset($_POST['nama_ikan'])){$dt['nama_ikan'] = $this->security->xss_clean($_POST['nama_ikan']);}
			if(isset($_POST['id_ikan'])){$dt['id_ikan'] = $this->security->xss_clean($_POST['id_ikan']);}
			//pr($dt);exit;
			//Kalo ada Inputan Baru
			$get = $this->db->get_where("data_ikan",$dt)->row();
			//pr($dt);exit;
			$this->db->where('id_ikan', $dt['id_ikan']);
			$this->db->update("data_ikan",$dt);

			redirect("data/ikan");


		}
		else
		{
			redirect("login");
		}
	}


	function HapusIkan($id_param)
	{
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$id['id_ikan'] = $id_param;
			$get = $this->db->delete("data_ikan",$id);
			redirect("data/ikan");
		}
		else
		{
			redirect("login");
		}
	}
	

		//Start PNBP
		function pnbp($uri=0)
		{
	
	
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$session['session']=array();
				$session['session']=$this->session->userdata;
				$d['dt_retrieve'] = $this->app_load_data_model->load_data_pnbp($GLOBALS['site_limit_medium'],$uri);
				$this->load->template($GLOBALS['site_theme']."/data/data-pnbp",$d);
			}
			else
			{
				redirect("login");
			}
		}

		function AddPNBP()
		{
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;
	
				$this->load->template($GLOBALS['site_theme']."/data/data-create-pnbp");
	
			}
			else
			{
				redirect("login");
			}
		}

		function TambahPNBP()
		{	
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;
				if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
				if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
				if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
				if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
	
				$this->db->insert("data_bulanan",$dt);
				redirect("data/pnbp");
			}
			else
			{
				redirect("login");
			}
		}

		function EditPnbp($idkapal)
			{
				//pr($this->session->userdata);exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					//session TO view
					$session['session']=array();
					$session['session']=$this->session->userdata;

					//pr($this->session->userdata['Id']);exit;
					$id['id'] = $idkapal;
					//pr($id);exit;

					$get = $this->db->get_where("data_bulanan",$id)->row();


					$d['bulan'] = $get->bulan;
					$d['tahun'] = $get->tahun;
					$d['nominal'] = $get->nominal;
					$d['id'] = $get->id;

					//pr($d);exit;

					$this->load->template($GLOBALS['site_theme']."/data/data-edit-pnbp",$d);

				}
				else
				{
					redirect("login");
				}
			}

			function simpanpnbp()
			{
		
				//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		
				{
					$session['session']=array();
					$session['session']=$this->session->userdata;
		
					$id['id'] = $id;
		
					if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
					if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
					if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
					if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
					//pr($dt);exit;
					//Kalo ada Inputan Baru
					$get = $this->db->get_where("data_bulanan",$dt)->row();
					//pr($dt);exit;
					$this->db->where('id', $dt['id']);
					$this->db->update("data_bulanan",$dt);		
					redirect("data/pnbp");		
				}
				else
				{
					redirect("login");
				}
			}
		

		function HapusPnbp($id_param)
		{
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$id['id'] = $id_param;
				$get = $this->db->delete("data_bulanan",$id);
				redirect("data/pnbp");
			}
			else
			{
				redirect("login");
			}
		}

		//Start Tenaga Kerja
		function tenaga($uri=0)
				{
			
			
					//pr($this->session->userdata);exit;
					if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
					{
						$session['session']=array();
						$session['session']=$this->session->userdata;
						$d['dt_retrieve'] = $this->app_load_data_model->load_data_tenaga($GLOBALS['site_limit_medium'],$uri);
						$this->load->template($GLOBALS['site_theme']."/data/data-tenaga",$d);
					}
					else
					{
						redirect("login");
					}
		}

		function AddTenaga()
		{
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;
	
				$this->load->template($GLOBALS['site_theme']."/data/data-create-tenaga");
	
			}
			else
			{
				redirect("login");
			}
		}

		function TambahTenaga()
		{	
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;
				if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
				if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
				if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
				if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
	
				$this->db->insert("data_bulanan",$dt);
				redirect("data/tenaga");
			}
			else
			{
				redirect("login");
			}
		}

		function EditTenaga($idkapal)
			{
				//pr($this->session->userdata);exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					//session TO view
					$session['session']=array();
					$session['session']=$this->session->userdata;

					//pr($this->session->userdata['Id']);exit;
					$id['id'] = $idkapal;
					//pr($id);exit;

					$get = $this->db->get_where("data_bulanan",$id)->row();


					$d['bulan'] = $get->bulan;
					$d['tahun'] = $get->tahun;
					$d['nominal'] = $get->nominal;
					$d['id'] = $get->id;

					//pr($d);exit;

					$this->load->template($GLOBALS['site_theme']."/data/data-edit-tenaga",$d);

				}
				else
				{
					redirect("login");
				}
			}

			function simpantenaga()
			{
		
				//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		
				{
					$session['session']=array();
					$session['session']=$this->session->userdata;
		
					$id['id'] = $id;
		
					if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
					if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
					if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
					if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
					//pr($dt);exit;
					//Kalo ada Inputan Baru
					$get = $this->db->get_where("data_bulanan",$dt)->row();
					//pr($dt);exit;
					$this->db->where('id', $dt['id']);
					$this->db->update("data_bulanan",$dt);		
					redirect("data/tenaga");		
				}
				else
				{
					redirect("login");
				}
			}

		function HapusTenaga($id_param)
		{
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$id['id'] = $id_param;
				$get = $this->db->delete("data_bulanan",$id);
				redirect("data/tenaga");
			}
			else
			{
				redirect("login");
			}
		}
		
			//Start Produksi
			function produksi($uri=0)
			{
		
		
				//pr($this->session->userdata);exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					$session['session']=array();
					$session['session']=$this->session->userdata;
					$d['dt_retrieve'] = $this->app_load_data_model->load_data_produksi($GLOBALS['site_limit_medium'],$uri);
					$this->load->template($GLOBALS['site_theme']."/data/data-produksi",$d);
				}
				else
				{
					redirect("login");
				}
			}
	
			function AddProduksi()
			{
				//pr($this->session->userdata);exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					//session TO view
					$session['session']=array();
					$session['session']=$this->session->userdata;
		
					$this->load->template($GLOBALS['site_theme']."/data/data-create-produksi");
		
				}
				else
				{
					redirect("login");
				}
			}
	
			function TambahProduksi()
			{	
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					//session TO view
					$session['session']=array();
					$session['session']=$this->session->userdata;
					if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
					if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
					if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
					if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
		
					$this->db->insert("data_bulanan",$dt);
					redirect("data/produksi");
				}
				else
				{
					redirect("login");
				}
			}
	
			function EditProduksi($idkapal)
				{
					//pr($this->session->userdata);exit;
					if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
					{
						//session TO view
						$session['session']=array();
						$session['session']=$this->session->userdata;
	
						//pr($this->session->userdata['Id']);exit;
						$id['id'] = $idkapal;
						//pr($id);exit;
	
						$get = $this->db->get_where("data_bulanan",$id)->row();
	
	
						$d['bulan'] = $get->bulan;
						$d['tahun'] = $get->tahun;
						$d['nominal'] = $get->nominal;
						$d['id'] = $get->id;
	
						//pr($d);exit;
	
						$this->load->template($GLOBALS['site_theme']."/data/data-edit-produksi",$d);
	
					}
					else
					{
						redirect("login");
					}
				}
	
				function simpanproduksi()
				{
			
					//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
					if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			
					{
						$session['session']=array();
						$session['session']=$this->session->userdata;
			
						$id['id'] = $id;
			
						if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
						if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
						if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
						if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
						//pr($dt);exit;
						//Kalo ada Inputan Baru
						$get = $this->db->get_where("data_bulanan",$dt)->row();
						//pr($dt);exit;
						$this->db->where('id', $dt['id']);
						$this->db->update("data_bulanan",$dt);		
						redirect("data/produksi");		
					}
					else
					{
						redirect("login");
					}
				}
			
	
			function HapusProduksi($id_param)
			{
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					$id['id'] = $id_param;
					$get = $this->db->delete("data_bulanan",$id);
					redirect("data/produksi");
				}
				else
				{
					redirect("login");
				}
			}
	
		//Start BBM
		function bbm($uri=0)
		{


			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$session['session']=array();
				$session['session']=$this->session->userdata;
				$d['dt_retrieve'] = $this->app_load_data_model->load_data_bbm($GLOBALS['site_limit_medium'],$uri);
				$this->load->template($GLOBALS['site_theme']."/data/data-bbm",$d);
			}
			else
			{
				redirect("login");
			}
		}

		function AddBBM()
		{
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;

				$this->load->template($GLOBALS['site_theme']."/data/data-create-bbm");

			}
			else
			{
				redirect("login");
			}
		}

		function TambahBBM()
		{	
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;
				if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
				if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
				if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
				if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
				$this->db->insert("data_bulanan",$dt);
				redirect("data/bbm");
			}
			else
			{
				redirect("login");
			}
		}

		function EditBBM($idkapal)
			{
				//pr($this->session->userdata);exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					//session TO view
					$session['session']=array();
					$session['session']=$this->session->userdata;

					//pr($this->session->userdata['Id']);exit;
					$id['id'] = $idkapal;
					//pr($id);exit;
					$get = $this->db->get_where("data_bulanan",$id)->row();
					$d['bulan'] = $get->bulan;
					$d['tahun'] = $get->tahun;
					$d['nominal'] = $get->nominal;
					$d['id'] = $get->id;

					//pr($d);exit;
					$this->load->template($GLOBALS['site_theme']."/data/data-edit-bbm",$d);

				}
				else
				{
					redirect("login");
				}
			}

			function simpanbbm()
			{

				//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

				{
					$session['session']=array();
					$session['session']=$this->session->userdata;

					$id['id'] = $id;

					if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
					if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
					if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
					if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
					//pr($dt);exit;
					//Kalo ada Inputan Baru
					$get = $this->db->get_where("data_bulanan",$dt)->row();
					//pr($dt);exit;
					$this->db->where('id', $dt['id']);
					$this->db->update("data_bulanan",$dt);		
					redirect("data/bbm");		
				}
				else
				{
					redirect("login");
				}
			}


		function HapusBBM($id_param)
		{
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$id['id'] = $id_param;
				$get = $this->db->delete("data_bulanan",$id);
				redirect("data/bbm");
			}
			else
			{
				redirect("login");
			}
		}

		//Start Air
		function air($uri=0)
		{


			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$session['session']=array();
				$session['session']=$this->session->userdata;
				$d['dt_retrieve'] = $this->app_load_data_model->load_data_air($GLOBALS['site_limit_medium'],$uri);
				$this->load->template($GLOBALS['site_theme']."/data/data-air",$d);
			}
			else
			{
				redirect("login");
			}
		}

		function AddAir()
		{
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;

				$this->load->template($GLOBALS['site_theme']."/data/data-create-air");

			}
			else
			{
				redirect("login");
			}
		}

		function TambahAir()
		{	
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;
				if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
				if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
				if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
				if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
				$this->db->insert("data_bulanan",$dt);
				redirect("data/air");
			}
			else
			{
				redirect("login");
			}
		}

		function EditAir($idkapal)
			{
				//pr($this->session->userdata);exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
				{
					//session TO view
					$session['session']=array();
					$session['session']=$this->session->userdata;

					//pr($this->session->userdata['Id']);exit;
					$id['id'] = $idkapal;
					//pr($id);exit;
					$get = $this->db->get_where("data_bulanan",$id)->row();
					$d['bulan'] = $get->bulan;
					$d['tahun'] = $get->tahun;
					$d['nominal'] = $get->nominal;
					$d['id'] = $get->id;

					//pr($d);exit;
					$this->load->template($GLOBALS['site_theme']."/data/data-edit-air",$d);

				}
				else
				{
					redirect("login");
				}
			}

			function simpanair()
			{

				//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
				if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

				{
					$session['session']=array();
					$session['session']=$this->session->userdata;

					$id['id'] = $id;

					if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
					if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
					if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
					if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
					//pr($dt);exit;
					//Kalo ada Inputan Baru
					$get = $this->db->get_where("data_bulanan",$dt)->row();
					//pr($dt);exit;
					$this->db->where('id', $dt['id']);
					$this->db->update("data_bulanan",$dt);		
					redirect("data/air");		
				}
				else
				{
					redirect("login");
				}
			}


		function HapusAir($id_param)
		{
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				$id['id'] = $id_param;
				$get = $this->db->delete("data_bulanan",$id);
				redirect("data/air");
			}
			else
			{
				redirect("login");
			}
		}
	
	//Start Es
	function es($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_es($GLOBALS['site_limit_medium'],$uri);
			$this->load->template($GLOBALS['site_theme']."/data/data-es",$d);
		}
		else
		{
			redirect("login");
		}
	}

	function AddEs()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$this->load->template($GLOBALS['site_theme']."/data/data-create-es");

		}
		else
		{
			redirect("login");
		}
	}

	function TambahEs()
	{	
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;
			if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
			if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
			if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
			if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
			$this->db->insert("data_bulanan",$dt);
			redirect("data/es");
		}
		else
		{
			redirect("login");
		}
	}

	function EditEs($idkapal)
		{
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;

				//pr($this->session->userdata['Id']);exit;
				$id['id'] = $idkapal;
				//pr($id);exit;
				$get = $this->db->get_where("data_bulanan",$id)->row();
				$d['bulan'] = $get->bulan;
				$d['tahun'] = $get->tahun;
				$d['nominal'] = $get->nominal;
				$d['id'] = $get->id;

				//pr($d);exit;
				$this->load->template($GLOBALS['site_theme']."/data/data-edit-es",$d);

			}
			else
			{
				redirect("login");
			}
		}

		function simpanes()
		{

			//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

			{
				$session['session']=array();
				$session['session']=$this->session->userdata;

				$id['id'] = $id;

				if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
				if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
				if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
				if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
				//pr($dt);exit;
				//Kalo ada Inputan Baru
				$get = $this->db->get_where("data_bulanan",$dt)->row();
				//pr($dt);exit;
				$this->db->where('id', $dt['id']);
				$this->db->update("data_bulanan",$dt);		
				redirect("data/es");		
			}
			else
			{
				redirect("login");
			}
		}


	function HapusEs($id_param)
	{
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$id['id'] = $id_param;
			$get = $this->db->delete("data_bulanan",$id);
			redirect("data/es");
		}
		else
		{
			redirect("login");
		}
	}

	//Start Bongkar
	function bongkar($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_bongkar($GLOBALS['site_limit_medium'],$uri);
			$this->load->template($GLOBALS['site_theme']."/data/data-bongkar",$d);
		}
		else
		{
			redirect("login");
		}
	}

	function AddBongkar()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$this->load->template($GLOBALS['site_theme']."/data/data-create-bongkar");

		}
		else
		{
			redirect("login");
		}
	}

	function TambahBongkar()
	{	
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;
			if(isset($_POST['nama_kategori'])){$dt['nama_kategori'] = $this->security->xss_clean($this->input->post('nama_kategori'));}
			if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($this->input->post('bulan'));}
			if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($this->input->post('tahun'));}
			if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($this->input->post('nominal'));}
			$this->db->insert("data_bulanan",$dt);
			redirect("data/bongkar");
		}
		else
		{
			redirect("login");
		}
	}

	function EditBongkar($idkapal)
		{
			//pr($this->session->userdata);exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
			{
				//session TO view
				$session['session']=array();
				$session['session']=$this->session->userdata;

				//pr($this->session->userdata['Id']);exit;
				$id['id'] = $idkapal;
				//pr($id);exit;
				$get = $this->db->get_where("data_bulanan",$id)->row();
				$d['bulan'] = $get->bulan;
				$d['tahun'] = $get->tahun;
				$d['nominal'] = $get->nominal;
				$d['id'] = $get->id;

				//pr($d);exit;
				$this->load->template($GLOBALS['site_theme']."/data/data-edit-bongkar",$d);

			}
			else
			{
				redirect("login");
			}
		}

		function simpanbongkar()
		{

			//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
			if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

			{
				$session['session']=array();
				$session['session']=$this->session->userdata;

				$id['id'] = $id;

				if(isset($_POST['bulan'])){$dt['bulan'] = $this->security->xss_clean($_POST['bulan']);}
				if(isset($_POST['tahun'])){$dt['tahun'] = $this->security->xss_clean($_POST['tahun']);}
				if(isset($_POST['nominal'])){$dt['nominal'] = $this->security->xss_clean($_POST['nominal']);}
				if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}
				//pr($dt);exit;
				//Kalo ada Inputan Baru
				$get = $this->db->get_where("data_bulanan",$dt)->row();
				//pr($dt);exit;
				$this->db->where('id', $dt['id']);
				$this->db->update("data_bulanan",$dt);		
				redirect("data/bongkar");		
			}
			else
			{
				redirect("login");
			}
		}


	function HapusBongkar($id_param)
	{
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$id['id'] = $id_param;
			$get = $this->db->delete("data_bulanan",$id);
			redirect("data/bongkar");
		}
		else
		{
			redirect("login");
		}
	}


	//Start Kedatangan
	function kedatangan($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_kedatangan($GLOBALS['site_limit_medium'],$uri);

 			$this->load->template($GLOBALS['site_theme']."/data/data-kedatangan",$d);
		}
		else
		{
			redirect("login");
		}
	}

	function create_kedatangan()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$get = $this->db->get("data_kapal")->result();;
			$d['data']= $get;
			$ikan = $this->db->get("data_ikan")->result();;
			$d['data2']= $ikan;
			$d['datecreate']=date('Y-m-d');
			$d['timecreate']=date('h:i:s');
 			$this->load->template($GLOBALS['site_theme']."/data/data-create-kedatangan",$d);

		}
		else
		{
			redirect("login");
		}
	}


	function simpan_kedatangan()
	{
		//pr($_FILES);
		//pr($_POST);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;
			//pr($_FILES);exit;
			$tanggaldatang = new DateTime($_POST['tanggal']);
			$tanggal = $tanggaldatang->format('Y-m-d');
			if(isset($_POST['id_kapal'])){$dt['id_kapal'] = $this->security->xss_clean($this->input->post('id_kapal'));}
			if(isset($_POST['asal'])){$dt['asal'] = $this->security->xss_clean($this->input->post('asal'));}
			if(isset($_POST['tanggal'])){$dt['tanggal']=$tanggal; }
			if(isset($_POST['waktu'])){$dt['waktu'] = $this->security->xss_clean($_POST['waktu']);}
			if(isset($_POST['dermaga'])){$dt['dermaga'] = $this->security->xss_clean($_POST['dermaga']);}
			if(isset($_POST['ikan1'])){$dt['ikan1'] = $this->security->xss_clean($_POST['ikan1']);}
			if(isset($_POST['ikan2'])){$dt['ikan2'] = $this->security->xss_clean($_POST['ikan2']);}
			if(isset($_POST['ikan3'])){$dt['ikan3'] = $this->security->xss_clean($_POST['ikan3']);}
			if(isset($_POST['ikan4'])){$dt['ikan4'] = $this->security->xss_clean($_POST['ikan4']);}
			if(isset($_POST['ikan5'])){$dt['ikan5'] = $this->security->xss_clean($_POST['ikan5']);}
			if(isset($_POST['ikan6'])){$dt['ikan6'] = $this->security->xss_clean($_POST['ikan6']);}

			if(isset($_POST['berat1'])){$dt['berat1'] = $this->security->xss_clean($_POST['berat1']);}
			if(isset($_POST['berat2'])){$dt['berat2'] = $this->security->xss_clean($_POST['berat2']);}
			if(isset($_POST['berat3'])){$dt['berat3'] = $this->security->xss_clean($_POST['berat3']);}
			if(isset($_POST['berat4'])){$dt['berat4'] = $this->security->xss_clean($_POST['berat4']);}
			if(isset($_POST['berat5'])){$dt['berat5'] = $this->security->xss_clean($_POST['berat5']);}
			if(isset($_POST['berat6'])){$dt['berat6'] = $this->security->xss_clean($_POST['berat6']);}

			if(isset($_POST['harga'])){$dt['harga'] = $this->security->xss_clean($_POST['harga']);}
			if(isset($_POST['mutu'])){$dt['mutu'] = $this->security->xss_clean($_POST['mutu']);}
			if(isset($_POST['suhu_ikan'])){$dt['suhu_ikan'] = $this->security->xss_clean($_POST['suhu_ikan']);}
			if(isset($_POST['suhu_palka'])){$dt['suhu_palka'] = $this->security->xss_clean($_POST['suhu_palka']);}
			if(isset($_POST['produk'])){$dt['produk'] = $this->security->xss_clean($_POST['produk']);}
			if(isset($_POST['status'])){$dt['status'] = $this->security->xss_clean($_POST['status']);}
			if(isset($_POST['no_antrian'])){$dt['no_antrian'] = $this->security->xss_clean($_POST['no_antrian']);}
			if(isset($_POST['datecreate'])){$dt['datecreate'] = $this->security->xss_clean($_POST['datecreate']);}
			if(isset($_POST['timecreate'])){$dt['timecreate'] = $this->security->xss_clean($_POST['timecreate']);}
			$dt['input_by']=$this->session->userdata['Username'];

			//pr($dt);exit;
			$this->db->insert("data_kedatangan",$dt);
			redirect("data/kedatangan");


		}
		else
		{
			redirect("login");
		}
	}

	function EditKedatangan($idclient)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id'] = $idclient;
			//pr($id);exit;

			$geting = $this->db->get("data_kapal")->result();;
			$ikan = $this->db->get("data_ikan")->result();;
			$d['data']= $geting;
			$d['data2']= $ikan;


			$get = $this->db->get_where("data_kedatangan",$id)->row();

			$d['id_kapal'] = $get->id_kapal;
			$d['asal'] = $get->asal;
			$d['tanggal'] = $get->tanggal;
			$d['waktu'] = $get->waktu;
			$d['dermaga'] = $get->dermaga;
			$d['ikan1'] = $get->ikan1;
			$d['ikan2'] = $get->ikan2;
			$d['ikan3'] = $get->ikan3;
			$d['ikan4'] = $get->ikan4;
			$d['ikan5'] = $get->ikan5;
			$d['ikan6'] = $get->ikan6;

			$d['berat1'] = $get->berat1;
			$d['berat2'] = $get->berat2;
			$d['berat3'] = $get->berat3;
			$d['berat4'] = $get->berat4;
			$d['berat5'] = $get->berat5;
			$d['berat6'] = $get->berat6;

			$d['harga'] = $get->harga;
			$d['suhu_ikan'] = $get->suhu_ikan;
			$d['suhu_palka'] = $get->suhu_palka;
			$d['mutu'] = $get->mutu;
			$d['produk'] = $get->produk;
			$d['status'] = $get->status;
			$d['no_antrian'] = $get->no_antrian;
			$d['id'] = $get->id;

		    $this->load->template($GLOBALS['site_theme']."/data/data-edit-kedatangan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function editsimpan()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$id['id'] = $idclient;
			//pr($_FILES);exit;
			$tanggaldatang = new DateTime($_POST['tanggal']);
			$tanggal = $tanggaldatang->format('Y-m-d');
			if(isset($_POST['id_kapal'])){$dt['id_kapal'] = $this->security->xss_clean($this->input->post('id_kapal'));}
			if(isset($_POST['asal'])){$dt['asal'] = $this->security->xss_clean($this->input->post('asal'));}
			if(isset($_POST['tanggal'])){$dt['tanggal']=$tanggal; }
			if(isset($_POST['waktu'])){$dt['waktu'] = $this->security->xss_clean($_POST['waktu']);}
			if(isset($_POST['dermaga'])){$dt['dermaga'] = $this->security->xss_clean($_POST['dermaga']);}
			if(isset($_POST['ikan1'])){$dt['ikan1'] = $this->security->xss_clean($_POST['ikan1']);}
			if(isset($_POST['ikan2'])){$dt['ikan2'] = $this->security->xss_clean($_POST['ikan2']);}
			if(isset($_POST['ikan3'])){$dt['ikan3'] = $this->security->xss_clean($_POST['ikan3']);}
			if(isset($_POST['ikan4'])){$dt['ikan4'] = $this->security->xss_clean($_POST['ikan4']);}
			if(isset($_POST['ikan5'])){$dt['ikan5'] = $this->security->xss_clean($_POST['ikan5']);}
			if(isset($_POST['ikan6'])){$dt['ikan6'] = $this->security->xss_clean($_POST['ikan6']);}

			if(isset($_POST['berat1'])){$dt['berat1'] = $this->security->xss_clean($_POST['berat1']);}
			if(isset($_POST['berat2'])){$dt['berat2'] = $this->security->xss_clean($_POST['berat2']);}
			if(isset($_POST['berat3'])){$dt['berat3'] = $this->security->xss_clean($_POST['berat3']);}
			if(isset($_POST['berat4'])){$dt['berat4'] = $this->security->xss_clean($_POST['berat4']);}
			if(isset($_POST['berat5'])){$dt['berat5'] = $this->security->xss_clean($_POST['berat5']);}
			if(isset($_POST['berat6'])){$dt['berat6'] = $this->security->xss_clean($_POST['berat6']);}

			if(isset($_POST['harga'])){$dt['harga'] = $this->security->xss_clean($_POST['harga']);}
			if(isset($_POST['suhu_ikan'])){$dt['suhu_ikan'] = $this->security->xss_clean($_POST['suhu_ikan']);}
			if(isset($_POST['suhu_palka'])){$dt['suhu_palka'] = $this->security->xss_clean($_POST['suhu_palka']);}
			if(isset($_POST['mutu'])){$dt['mutu'] = $this->security->xss_clean($_POST['mutu']);}
			if(isset($_POST['produk'])){$dt['produk'] = $this->security->xss_clean($_POST['produk']);}
			if(isset($_POST['status'])){$dt['status'] = $this->security->xss_clean($_POST['status']);}
			if(isset($_POST['no_antrian'])){$dt['no_antrian'] = $this->security->xss_clean($_POST['no_antrian']);}
			if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}

			//pr($dt);exit;
			$this->db->where('id', $dt['id']);
			$this->db->update("data_kedatangan",$dt);

			redirect("data/kedatangan");


		}
		else
		{
			redirect("login");
		}
	}

	function HapusKedatangan($id_param)
	{
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$id['id'] = $id_param;
			$get = $this->db->delete("data_kedatangan",$id);
			redirect("data/kedatangan");
		}
		else
		{
			redirect("login");
		}
	}
	//End Vendor


	function keberangkatan($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_keberangkatan($GLOBALS['site_limit_medium'],$uri);


		$this->load->template($GLOBALS['site_theme']."/data/data-keberangkatan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function create_keberangkatan()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$get = $this->db->get("data_kapal")->result();;

			//pr($get);exit;
			//View Profile
			$d['data']= $get;
			$d['datecreate']=date('Y-m-d');
			$d['timecreate']=date('h:i:s');

			$this->load->template($GLOBALS['site_theme']."/data/data-create-keberangkatan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function simpan_keberangkatan()
	{
		//pr($_FILES);
		//pr($_POST);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;
			//pr($_FILES);exit;

			if(isset($_POST['id_kapal'])){$dt['id_kapal'] = $this->security->xss_clean($this->input->post('id_kapal'));}
			if(isset($_POST['tujuan'])){$dt['tujuan'] = $this->security->xss_clean($this->input->post('tujuan'));}
			if(isset($_POST['abk'])){$dt['abk'] = $this->security->xss_clean($this->input->post('abk'));}
			if(isset($_POST['tanggal'])){$dt['tanggal'] = $this->security->xss_clean($_POST['tanggal']);}
			if(isset($_POST['waktu'])){$dt['waktu'] = $this->security->xss_clean($_POST['waktu']);}
			if(isset($_POST['dermaga'])){$dt['dermaga'] = $this->security->xss_clean($_POST['dermaga']);}
			if(isset($_POST['status'])){$dt['status'] = $this->security->xss_clean($_POST['status']);}
			if(isset($_POST['es'])){$dt['es'] = $this->security->xss_clean($_POST['es']);}
			if(isset($_POST['air'])){$dt['air'] = $this->security->xss_clean($_POST['air']);}
			if(isset($_POST['solar'])){$dt['solar'] = $this->security->xss_clean($_POST['solar']);}
			if(isset($_POST['olie'])){$dt['olie'] = $this->security->xss_clean($_POST['olie']);}
			if(isset($_POST['lainnya'])){$dt['lainnya'] = $this->security->xss_clean($_POST['lainnya']);}
			if(isset($_POST['keterangan'])){$dt['keterangan'] = $this->security->xss_clean($_POST['keterangan']);}
			if(isset($_POST['datecreate'])){$dt['datecreate'] = $this->security->xss_clean($_POST['datecreate']);}
			if(isset($_POST['timecreate'])){$dt['timecreate'] = $this->security->xss_clean($_POST['timecreate']);}

			//pr($dt);exit;
			$this->db->insert("data_keberangkatan",$dt);
			redirect("data/keberangkatan");
		}
		else
		{
			redirect("login");
		}
	}

	function EditKeberangkatan($idclient)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id'] = $idclient;
			//pr($id);exit;

			$geting = $this->db->get("data_kapal")->result();;
			$d['data']= $geting;


			$get = $this->db->get_where("data_keberangkatan",$id)->row();

			$d['id_kapal'] = $get->id_kapal;
			$d['tujuan'] = $get->tujuan;
			$d['abk'] = $get->abk;
			$d['tanggal'] = $get->tanggal;
			$d['waktu'] = $get->waktu;
			$d['dermaga'] = $get->dermaga;
			$d['status'] = $get->status;
			$d['es'] = $get->es;
			$d['air'] = $get->air;
			$d['solar'] = $get->solar;
			$d['olie'] = $get->olie;
			$d['bensin'] = $get->bensin;
			$d['lainnya'] = $get->lainnya;
			$d['keterangan'] = $get->keterangan;
			$d['id'] = $get->id;

		    $this->load->template($GLOBALS['site_theme']."/data/data-edit-keberangkatan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function editsimpankeberangkatan()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			$id['id'] = $idclient;
			//pr($_FILES);exit;
			$tanggalberangkat = new DateTime($_POST['tanggal']);
			$tanggal = $tanggalberangkat->format('Y-m-d');
			if(isset($_POST['id_kapal'])){$dt['id_kapal'] = $this->security->xss_clean($this->input->post('id_kapal'));}
			if(isset($_POST['tujuan'])){$dt['tujuan'] = $this->security->xss_clean($this->input->post('tujuan'));}
			if(isset($_POST['tanggal'])){$dt['tanggal']=$tanggal; }
			if(isset($_POST['abk'])){$dt['abk'] = $this->security->xss_clean($this->input->post('abk'));}
			if(isset($_POST['waktu'])){$dt['waktu'] = $this->security->xss_clean($_POST['waktu']);}
			if(isset($_POST['dermaga'])){$dt['dermaga'] = $this->security->xss_clean($_POST['dermaga']);}
			if(isset($_POST['status'])){$dt['status'] = $this->security->xss_clean($_POST['status']);}
			if(isset($_POST['es'])){$dt['es'] = $this->security->xss_clean($_POST['es']);}
			if(isset($_POST['air'])){$dt['air'] = $this->security->xss_clean($_POST['air']);}
			if(isset($_POST['solar'])){$dt['solar'] = $this->security->xss_clean($_POST['solar']);}
			if(isset($_POST['olie'])){$dt['olie'] = $this->security->xss_clean($_POST['olie']);}
			if(isset($_POST['lainnya'])){$dt['lainnya'] = $this->security->xss_clean($_POST['lainnya']);}
			if(isset($_POST['keterangan'])){$dt['keterangan'] = $this->security->xss_clean($_POST['keterangan']);}
			if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}

			//pr($dt);exit;
			$this->db->where('id', $dt['id']);
			$this->db->update("data_keberangkatan",$dt);

			redirect("data/keberangkatan");


		}
		else
		{
			redirect("login");
		}
	}

	function HapusKeberangkatan($id_param)
	{
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$id['id'] = $id_param;
			$get = $this->db->delete("data_keberangkatan",$id);
			redirect("data/keberangkatan");
		}
		else
		{
			redirect("login");
		}
	}

	function Himbauan($uri=0)
	{


		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_himbauan($GLOBALS['site_limit_medium'],$uri);


		$this->load->template($GLOBALS['site_theme']."/data/data-himbauan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function EditHimbauan($idpesan)
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id'] = $idpesan;
			//pr($id);exit;

			$get = $this->db->get_where("himbauan",$id)->row();


			$d['isi'] = $get->isi;
			$d['id'] = $get->id;

			//pr($d);exit;

 			$this->load->template($GLOBALS['site_theme']."/data/data-edit-himbauan",$d);

		}
		else
		{
			redirect("login");
		}
	}

	function simpanhimbauan()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($_FILES);exit;
			if(isset($_POST['isi'])){$dt['isi'] = $this->security->xss_clean($_POST['isi']);}
			if(isset($_POST['id'])){$dt['id'] = $this->security->xss_clean($_POST['id']);}

			//pr($dt);exit;
			$this->db->where('id', $dt['id']);
			$this->db->update("himbauan",$dt);

			redirect("data/himbauan");


		}
		else
		{
			redirect("login");
		}
	}

	function ExportKapal()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($_FILES);exit;
		$select = $this->db->query('SELECT nama_kapal,pemilik,no_izin,gt,alat_tangkap,tanda_selar,tipe_kapal FROM data_kapal WHERE 1=1')->result();
		$select = $this->db->get('data_kapal')->result();

        $objPHPExcel    = new PHPExcel();
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(34);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(33);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(26);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

		$objPHPExcel->getActiveSheet()->getStyle('A2:D2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(2)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(3)->getFont()->setBold(true);

        $header = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'name' => 'Verdana'
            )
        );

		$tengah = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
            ),
			  'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'babdc1'),
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
        );
		$isi = array(
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
        );

        $objPHPExcel->getActiveSheet()->getStyle("A1:H2")
                ->applyFromArray($header)
                ->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle("A3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("B3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("C3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("D3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("E3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("F3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("G3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("H3")->applyFromArray($tengah);
        $objPHPExcel->getActiveSheet()->mergeCells('A1:H2');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REKAP DATA KAPAL PELABUHAN PPS KENDARI')
            ->setCellValue('A3', 'NO.')
            ->setCellValue('B3', 'NAMA KAPAL')
            ->setCellValue('C3', 'NAMA PEMILIK')
            ->setCellValue('D3', 'NOMOR IZIN')
			->setCellValue('E3', 'GT')
			->setCellValue('F3', 'TIPE KAPAL')
			->setCellValue('G3', 'ALAT TANGKAP')
			->setCellValue('H3', 'TANDA SELAR');

        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no = 1;
        $counter = 4;
        foreach ($select as $row):
            $ex->setCellValue('A'.$counter, $no++);
            $ex->setCellValue('B'.$counter, $row->nama_kapal);
            $ex->setCellValue('C'.$counter, $row->pemilik);
            $ex->setCellValue('D'.$counter, $row->no_izin);
			$ex->setCellValue('E'.$counter, $row->gt);
			$ex->setCellValue('F'.$counter, $row->tipe_kapal);
			$ex->setCellValue('G'.$counter, $row->alat_tangkap);
			$ex->setCellValue('H'.$counter, $row->tanda_selar);

			 $objPHPExcel->getActiveSheet()->getStyle('A'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('B'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('C'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('D'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('E'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('F'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('G'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('H'.$counter)->applyFromArray($isi);

            $counter = $counter+1;
        endforeach;
        
        
        $objPHPExcel->getProperties()->setCreator("SIKAP")
                ->setLastModifiedBy("SIKAP")
                ->setTitle("Rekap Data KAPAL")
                ->setSubject("Rekap Data KAPAL")
                ->setDescription("Rekap Data KAPAL, generated by SIKAP.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("DATA KAPAL");
            $objPHPExcel->getActiveSheet()->setTitle('DATAKAPAL');

            $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Export Data Kapal '. date('Ymd') .'.xlsx"');


        $objWriter->save('php://output');
		}
		else
		{
			redirect("login");
		}
	}

	function ExportKeberangkatan()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($_FILES);exit;
		$select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE 1=1')->result();

        $objPHPExcel    = new PHPExcel();
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(19);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(6);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(14);

        $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(2)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(3)->getFont()->setBold(true);

        $header = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'name' => 'Verdana'
            )
        );

		$tengah = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
            ),
			  'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'babdc1'),
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
        );
		$isi = array(
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
        );

        $objPHPExcel->getActiveSheet()->getStyle("A1:N1")
                ->applyFromArray($header)
                ->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle("A2:A3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("B2:B3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("C2:C3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("D2:D3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("E2:E3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("F2:F3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("G2:G3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("H2:H3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("I2:N2")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("I3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("J3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("K3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("L3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("M3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("N3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->mergeCells('A1:N1');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:A3');
		$objPHPExcel->getActiveSheet()->mergeCells('B2:B3');
		$objPHPExcel->getActiveSheet()->mergeCells('C2:C3');
		$objPHPExcel->getActiveSheet()->mergeCells('D2:D3');
		$objPHPExcel->getActiveSheet()->mergeCells('E2:E3');
		$objPHPExcel->getActiveSheet()->mergeCells('F2:F3');
		$objPHPExcel->getActiveSheet()->mergeCells('G2:G3');
		$objPHPExcel->getActiveSheet()->mergeCells('H2:H3');
		$objPHPExcel->getActiveSheet()->mergeCells('I2:N2');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REKAP DATA KEBERANGKATAN KAPAL PELABUHAN PPS KENDARI')
            ->setCellValue('A2', 'NO.')
            ->setCellValue('B2', 'NAMA KAPAL')
            ->setCellValue('C2', 'TUJUAN')
            ->setCellValue('D2', 'TANGGAL')
			->setCellValue('E2', 'JAM')
			->setCellValue('F2', 'ABK')
			->setCellValue('G2', 'DERMAGA')
			->setCellValue('H2', 'STATUS')
			->setCellValue('I2', 'INFO LOGISTIK')
			->setCellValue('I3', 'ES')
			->setCellValue('J3', 'AIR')
			->setCellValue('K3', 'SOLAR')
			->setCellValue('L3', 'OLIE')
			->setCellValue('M3', 'BENSIN')
			->setCellValue('N3', 'LAINNYA');

        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no = 1;
        $counter = 4;
        foreach ($select as $row):
            $ex->setCellValue('A'.$counter, $no++);
            $ex->setCellValue('B'.$counter, $row->nama_kapal);
            $ex->setCellValue('C'.$counter, $row->tujuan);
            $ex->setCellValue('D'.$counter, $row->tanggal);
			$ex->setCellValue('E'.$counter, $row->waktu);
			$ex->setCellValue('F'.$counter, $row->abk);
			$ex->setCellValue('G'.$counter, $row->dermaga);
			$ex->setCellValue('H'.$counter, $row->status);
			$ex->setCellValue('I'.$counter, $row->es);
			$ex->setCellValue('J'.$counter, $row->air);
			$ex->setCellValue('K'.$counter, $row->solar);
			$ex->setCellValue('L'.$counter, $row->olie);
			$ex->setCellValue('M'.$counter, $row->bensin);
			$ex->setCellValue('N'.$counter, $row->lainnya);

			 $objPHPExcel->getActiveSheet()->getStyle('A'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('B'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('C'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('D'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('E'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('F'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('G'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('H'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('I'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('J'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('K'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('L'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('M'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('N'.$counter)->applyFromArray($isi);

            $counter = $counter+1;
        endforeach;

        $objPHPExcel->getProperties()->setCreator("SIKAP")
            ->setLastModifiedBy("SIKAP")
            ->setTitle("Rekap Data KEBERANGKATAN")
            ->setSubject("Export Data KEBERANGKATAN")
            ->setDescription("Rekap Data KEBERANGKATAN, generated by SIKAP.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("DATA KEBERANGKATAN");
        $objPHPExcel->getActiveSheet()->setTitle('DATAKEBERANGKATAN');

        $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Chace-Control: no-store, no-cache, must-revalation');
        header('Chace-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Export Data Keberangkatan '. date('Ymd') .'.xlsx"');

        $objWriter->save('php://output');
		}
		else
		{
			redirect("login");
		}
	}

	function ExportKedatangan()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

		{
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($_FILES);exit;
		$select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
									JOIN data_kapal a ON b.id_kapal=a.id ORDER BY tanggal DESC')->result();

        $objPHPExcel    = new PHPExcel();
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(19);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(9);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(6);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(11);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(13);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(13);
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(13);

        $objPHPExcel->getActiveSheet()->getStyle(1)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(2)->getFont()->setBold(true);
        $objPHPExcel->getActiveSheet()->getStyle(3)->getFont()->setBold(true);

        $header = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'name' => 'Verdana'
            )
        );

		$tengah = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'bold' => true,
            ),
			  'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'babdc1'),
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
        );
		$isi = array(
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
        );

        $objPHPExcel->getActiveSheet()->getStyle("A1:Y1")
                ->applyFromArray($header)
                ->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle("A2:A3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("B2:B3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("C2:C3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("D2:D3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("E2:E3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("F2:F3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("G2:G3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("H2:H3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("I2:I3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("J2:J3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("K2:K3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("L2:L3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("M2:M3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("N2:Y2")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("N3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("O3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("P3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("Q3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("R3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("S3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("T3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("U3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("V3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("W3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("X3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->getStyle("Y3")->applyFromArray($tengah);
		$objPHPExcel->getActiveSheet()->mergeCells('A1:Y1');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:A3');
		$objPHPExcel->getActiveSheet()->mergeCells('B2:B3');
		$objPHPExcel->getActiveSheet()->mergeCells('C2:C3');
		$objPHPExcel->getActiveSheet()->mergeCells('D2:D3');
		$objPHPExcel->getActiveSheet()->mergeCells('E2:E3');
		$objPHPExcel->getActiveSheet()->mergeCells('F2:F3');
		$objPHPExcel->getActiveSheet()->mergeCells('G2:G3');
		$objPHPExcel->getActiveSheet()->mergeCells('H2:H3');
		$objPHPExcel->getActiveSheet()->mergeCells('I2:I3');
		$objPHPExcel->getActiveSheet()->mergeCells('J2:J3');
		$objPHPExcel->getActiveSheet()->mergeCells('K2:K3');
		$objPHPExcel->getActiveSheet()->mergeCells('L2:L3');
		$objPHPExcel->getActiveSheet()->mergeCells('M2:M3');
		$objPHPExcel->getActiveSheet()->mergeCells('N2:Y2');
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'REKAP DATA KEDATANGAN KAPAL PELABUHAN PPS KENDARI')
            ->setCellValue('A2', 'NO.')
            ->setCellValue('B2', 'NAMA KAPAL')
            ->setCellValue('C2', 'ASAL')
            ->setCellValue('D2', 'TANGGAL')
			->setCellValue('E2', 'JAM')
			->setCellValue('F2', 'STATUS')
			->setCellValue('G2', 'DERMAGA')
			->setCellValue('H2', 'MUTU')
			->setCellValue('I2', 'PRODUK')
			->setCellValue('J2', 'HARGA')
			->setCellValue('K2', 'TOTAL')
			->setCellValue('L2', 'SUHU IKAN')
			->setCellValue('M2', 'SUHU PALKA')
			->setCellValue('N2', 'JENIS IKAN')
			->setCellValue('N3', 'IKAN 1')
			->setCellValue('O3', 'BERAT 1')
			->setCellValue('P3', 'IKAN 2')
			->setCellValue('Q3', 'BERAT 2')
			->setCellValue('R3', 'IKAN 3')
			->setCellValue('S3', 'BERAT 3')
			->setCellValue('T3', 'IKAN 4')
			->setCellValue('U3', 'BERAT 4')
			->setCellValue('V3', 'IKAN 5')
			->setCellValue('W3', 'BERAT 5')
			->setCellValue('X3', 'IKAN 6')
			->setCellValue('Y3', 'BERAT 6');


        $ex = $objPHPExcel->setActiveSheetIndex(0);
        $no = 1;
        $counter = 4;
        foreach ($select as $row):
            $ex->setCellValue('A'.$counter, $no++);
            $ex->setCellValue('B'.$counter, $row->nama_kapal);
            $ex->setCellValue('C'.$counter, $row->asal);
            $ex->setCellValue('D'.$counter, $row->tanggal);
			$ex->setCellValue('E'.$counter, $row->waktu);
			$ex->setCellValue('F'.$counter, $row->status);
			$ex->setCellValue('G'.$counter, $row->dermaga);
			$ex->setCellValue('H'.$counter, $row->mutu);
			$ex->setCellValue('I'.$counter, $row->produk);
			$ex->setCellValue('J'.$counter, $row->harga);
			$ex->setCellValue('K'.$counter, $row->total);
			$ex->setCellValue('L'.$counter, $row->suhu_ikan);
			$ex->setCellValue('M'.$counter, $row->suhu_palka);
			$ex->setCellValue('N'.$counter, $row->ikan1);
			$ex->setCellValue('O'.$counter, $row->berat1);
			$ex->setCellValue('P'.$counter, $row->ikan2);
			$ex->setCellValue('Q'.$counter, $row->berat2);
			$ex->setCellValue('R'.$counter, $row->ikan3);
			$ex->setCellValue('S'.$counter, $row->berat3);
			$ex->setCellValue('T'.$counter, $row->ikan4);
			$ex->setCellValue('U'.$counter, $row->berat4);
			$ex->setCellValue('V'.$counter, $row->ikan5);
			$ex->setCellValue('W'.$counter, $row->berat5);
			$ex->setCellValue('X'.$counter, $row->ikan6);
			$ex->setCellValue('Y'.$counter, $row->berat6);

			 $objPHPExcel->getActiveSheet()->getStyle('A'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('B'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('C'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('D'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('E'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('F'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('G'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('H'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('I'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('J'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('K'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('L'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('M'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('N'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('O'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('P'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('Q'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('R'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('S'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('T'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('U'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('V'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('W'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('X'.$counter)->applyFromArray($isi);
			 $objPHPExcel->getActiveSheet()->getStyle('Y'.$counter)->applyFromArray($isi);


            $counter = $counter+1;
        endforeach;

        $objPHPExcel->getProperties()->setCreator("SIKAP")
            ->setLastModifiedBy("SIKAP")
            ->setTitle("Rekap Data KEDATANGAN")
            ->setSubject("Export Data KEDATANGAN")
            ->setDescription("Rekap Data KEDATANGAN, generated by SIKAP.")
            ->setKeywords("office 2007 openxml php")
            ->setCategory("DATA KEDATANGAN");
        $objPHPExcel->getActiveSheet()->setTitle('DATAKEDATANGAN');

        $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
        header('Chace-Control: no-store, no-cache, must-revalation');
        header('Chace-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Export Data Kedatangan '. date('Ymd') .'.xlsx"');

        $objWriter->save('php://output');
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
			$session['session']=array();
			$session['session']=$this->session->userdata;
			$d['dt_retrieve'] = $this->app_load_data_model->load_data_client($GLOBALS['site_limit_medium'],$uri);
		 	$this->load->template($GLOBALS['site_theme']."/data/data-client",$d);


		}
		else
		{
			redirect("login");
		}
	}





	function viewprofile($id_param)
	{
		//pr($id_param);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id'] = $id_param;
			$get = $this->db->get_where("user",$id)->row();

			//View Profile
			$d['NamaLengkap'] = $get->NamaLengkap;
			$d['Position'] = $get->Position;
			$d['Email'] = $get->Email;
			$d['Phone'] = $get->Phone;
			$d['City'] = $get->City;
			$d['Province'] = $get->Province;
			$d['Country'] = $get->Country;
			$d['BBMAccount'] = $get->BBMAccount;
			$d['YMAccount'] = $get->YMAccount;
			$d['Address'] = $get->Address;
			$d['Username'] = $get->Username;
			$d['Password'] = $get->Password;
			$d['FilesName'] = $get->FilesName;
			$d['id'] = $get->id;

			//Get Group Id
			$idgroup['IdRole'] = $get->Role;;
			$getProfile = $this->db->get_where("group_profile",$idgroup)->row();
			$d['Role'] = $getProfile->NamaRole;

			$this->load->template($GLOBALS['site_theme']."/user/pages-profile",$d);

		}
		else
		{
			redirect("login");
		}
	}





	function EditProfile()
	{
		//pr($this->session->userdata);exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//session TO view
			$session['session']=array();
			$session['session']=$this->session->userdata;

			//pr($this->session->userdata['Id']);exit;
			$id['id'] = $this->session->userdata['id'];
			$get = $this->db->get_where("user",$id)->row();


			//View Profile
			$d['NamaLengkap'] = $get->NamaLengkap;
			$d['Position'] = $get->Position;
			$d['Role'] = $get->Role;
			$d['Email'] = $get->Email;
			$d['Phone'] = $get->Phone;
			$d['City'] = $get->City;
			$d['Province'] = $get->Province;
			$d['Country'] = $get->Country;
			$d['BBMAccount'] = $get->BBMAccount;
			$d['YMAccount'] = $get->YMAccount;
			$d['Address'] = $get->Address;
			$d['Username'] = $get->Username;
			$d['Password'] = $get->Password;
			$d['id'] = $get->id;

			$d['Password'] = $get->Password;
			$d['FilesName'] = $get->FilesName;
			$d['FilesName'] = $get->FilesName;
			$this->load->view($GLOBALS['site_theme']."/bg_header",$session);
 			$this->load->view($GLOBALS['site_theme']."/bg_left");
 			$this->load->view($GLOBALS['site_theme']."/user/edit-profile",$d);
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}




	function tambah()
	{

		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
			//pr($_FILES);exit;
			if($_FILES['uploadPhoto']['name']!="")
			{
			$config['upload_path'] = dirname($_SERVER["SCRIPT_FILENAME"])."/files/" ;
			$config['upload_url']	= base_url()."files/";
			$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|xml';
			$config['max_size']	= '100';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);
			$this->upload->do_upload();

			//exit;
			$dt['FilesName'] =$_FILES['uploadPhoto']['name'];
			}


			if(isset($_POST['NamaLengkap'])){$dt['NamaLengkap'] = $this->security->xss_clean($_POST['NamaLengkap']);}
			if(isset($_POST['Position'])){$dt['Position'] = $this->security->xss_clean($_POST['Position']);}
			if(isset($_POST['Role'])){$dt['Role'] = $this->security->xss_clean($_POST['Role']);}
			if(isset($_POST['Email'])){$dt['Email'] = $this->security->xss_clean($_POST['Email']);}
			if(isset($_POST['Username'])){$dt['Username'] = $this->security->xss_clean($_POST['Username']);}
			//$this->load->library('encrypt');
			if(isset($_POST['Password'])){$dt['Password'] = md5($this->security->xss_clean($_POST['Password']));}
			if(isset($_POST['Address'])){$dt['Address'] = $this->security->xss_clean($_POST['Address']);}
			if(isset($_POST['City'])){$dt['City'] = $this->security->xss_clean($_POST['City']);}
			if(isset($_POST['Province'])){$dt['Province'] = $this->security->xss_clean($_POST['Province']);}
			if(isset($_POST['Country'])){$dt['Country'] = $this->security->xss_clean($_POST['Country']);}
			if(isset($_POST['Phone'])){$dt['Phone'] = $this->security->xss_clean($_POST['Phone']);}
			if(isset($_POST['BBMAccount'])){$dt['BBMAccount'] = $this->security->xss_clean($_POST['BBMAccount']);}
			if(isset($_POST['YMAccount'])){$dt['YMAccount'] = $this->security->xss_clean($_POST['YMAccount']);}

			//pr($dt);exit;
			$this->db->insert("user",$dt);
			redirect("user/member");


		}
		else
		{
			redirect("login");
		}
	}

	function member(){

		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
		{
		    $session['session']=array();
			$session['session']=$this->session->userdata;

			$d['dt_retrieve'] = $this->app_load_data_model->index_table_user();
			//pr($d);exit;
			$this->load->view($GLOBALS['site_theme']."/bg_header",$session);
 			$this->load->view($GLOBALS['site_theme']."/bg_left");
 			$this->load->view($GLOBALS['site_theme']."/user/member-profile",$d);
 			$this->load->view($GLOBALS['site_theme']."/bg_footer");
		}
		else
		{
			redirect("login");
		}
	}


}
