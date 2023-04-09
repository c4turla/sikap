<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_user_login_model extends CI_Model {

	public function cekUserLogin($data)
	{
	
	
		

		$d['username'] 	= mysql_real_escape_string($data['username']);
		$d['Password'] = md5(mysql_real_escape_string($data['password']));
	
		//pr($d['Password']);exit;
		$_SQL="SELECT * FROM `user` us LEFT JOIN `s_pps_group_profile` gp 
		on us.Role=gp.IdRole WHERE us.username='".$d['username']."' 
		AND us.password='".$d['Password']."'";
		//pr($_SQL);exit;
		$q_cek_login = $this->db->query($_SQL);

		//Menu Session
		$_SQL2="SELECT
				menu.id,
				menu.nama_menu,
				menu.parent_id,
				menu.icon,
				modul_action
				FROM
				`user` us
				LEFT JOIN `s_pps_group_profile` gp ON us.Role = gp.IdRole
				RIGHT JOIN s_pps_akses_menu akses ON akses.group_id = gp.IdRole
				LEFT JOIN s_pps_menu menu ON akses.menu_id = menu.id
				WHERE us.username='".$d['username']."' AND us.password='".$d['Password']."' AND menu.status_aktif=1";
		//pr($_SQL2);exit;
		$q_cek_menu = $this->db->query($_SQL2);
		

		/* BUAT KONDISI MANAGER UPDATE SJ DAN USER UPDATE SJ*/ 
		$_SQL3="select sbam.group_id,sbam.menu_id,sbm.nama_menu from user  us 
LEFT JOIN s_pps_group_profile sgp on us.Role= sgp.IdRole
LEFT JOIN s_pps_akses_menu  sbam on us.Role=sbam.group_id 
LEFT JOIN s_pps_menu sbm on sbam.menu_id=sbm.id
WHERE us.username='".$d['username']."' AND us.password='".$d['Password']."' AND sbm.status_aktif=4 ";
	$q_cek_menu2 = $this->db->query($_SQL3)->result();
	//pr($q_cek_menu2);exit;

		if(count($q_cek_login->result())>0)
		{
			//pr('masuk');exit;
			foreach($q_cek_login->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['id'] = $qad->id;
				$sess_data['NamaLengkap'] = $qad->NamaLengkap;
				$sess_data['Position'] = $qad->Position;
				$sess_data['Role'] = $qad->Role;
				$sess_data['FilesName'] = $qad->FilesName;
				$sess_data['Email'] = $qad->Email;
				$sess_data['Username'] = $qad->Username;
				$sess_data['Password'] = $qad->Password;
				$sess_data['Address'] = $qad->Address;
				$sess_data['City'] = $qad->City;
				$sess_data['Province'] = $qad->Province;
				$sess_data['Country'] = $qad->Country;
				$sess_data['Phone'] = $qad->Phone;
				$sess_data['BBMAccount'] = $qad->BBMAccount;
				$sess_data['YMAccount'] = $qad->YMAccount;
				$sess_data['IdRole'] = $qad->IdRole;
				$sess_data['NamaRole'] = $qad->NamaRole;
				$sess_data['UserProfile'] = $qad->UserProfile;
			}

			//pr('masuk');exit;
			foreach($q_cek_menu->result() as $key => $value)
			{
				$sess_data['menu'][$key]['menu_id'] = $value->id;
				$sess_data['menu'][$key]['icon'] = $value->icon;
				$sess_data['menu'][$key]['parent_id'] = $value->parent_id;
				$sess_data['menu'][$key]['nama_menu'] = $value->nama_menu;
				$sess_data['menu'][$key]['modul_action'] = $value->modul_action;
				
			}

			//pr($sess_data);exit;
			$this->session->set_userdata($sess_data);
			

			redirect("dashboard");
		}
		else
		{
			//print_r('ss');exit;
			echo '<script language="javascript">alert("Username atau Password Anda Salah, Silahkan Ulangi!"); window.history.back();</script>';
		}
		
	}
}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */