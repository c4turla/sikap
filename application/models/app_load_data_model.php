<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class app_load_data_model extends CI_Model {

		public function index_table_user(){

				//pr($this->session->userdata->Role);exit;

					$tot_hal = $this->db->query("select * from user");
					$hasil = '
				<div class="page-content"> <!-- page content start -->

				<div class="page-subheading page-subheading-md">
					<ol class="breadcrumb">
						<li><a href="javascript:;">Dashboard</a></li>
						<li><a href="javascript:;">User</a></li>
						<li class="active"><a href="javascript:;">Members</a></li>
					</ol>
				</div>
				<div class="page-subheading page-subheading-md bg-white">
					<div class="row">
						<div class="col-sm-4 col-xs-5">
							<a href="#" class="btn btn-round btn-primary" title="Members"><strong>'.$tot_hal->num_rows().' Members</a>
						</div>
						<div class="col-sm-7 col-sm-push-1 col-xs-6 col-xs-push-1">
							<a href="'. base_url() . 'user/AddProfile" class="btn btn-success pull-right" title="Update"><i class="fa fa-lg fa-fw fa-plus"></i> Add Users</a>
						</div>
					</div>
				</div>

				<div class="container-fluid-md">
					<div class="row"> ';

				$get = $this->db->query("select * from user where 1=1 ");

				foreach($get->result() as $g)
					{
						$hasil.=' <div class="col-sm-6 col-md-4 col-lg-3">
									<div class="panel panel-default panel-member">
										<div class="panel-body">
											<a href="'. base_url() . 'user/viewprofile/'.$g->id.'">
												<div class="text-center">
													<img src="'. base_url() . 'files/'.$g->FilesName.'"  width="150px" height="150px" class="img-circle" alt="image">

													<h4 class="thin">
														'.$g->NamaLengkap.'
													</h4>
												</div>
											</a>
										</div>
									</div>
								</div>';


					}

					 $hasil .= '</div>
								</div>
								</div> <!-- page content end -->
								';

					return $hasil;


		}

		public function menu_rolenya()
		{

			$_SQL2="SELECT
						menu.id as menu_id,
						menu.nama_menu as nama_menu,
						parent_id as parent_id,
						menu.icon as icon,
						modul_action
					FROM
					s_pps_menu menu";

			$q_cek_menu = $this->db->query($_SQL2);
			$res['arraymenu']   = array();
			$res['arraytmp']  = array();
			foreach($q_cek_menu->result() as $key => $value)
			{
				$res['arraytmp'][$key]['menu_id'] = $value->menu_id;
				$res['arraytmp'][$key]['icon'] = $value->icon;
				$res['arraytmp'][$key]['parent_id'] = $value->parent_id;
				$res['arraytmp'][$key]['nama_menu'] = $value->nama_menu;
				$res['arraytmp'][$key]['modul_action'] = $value->modul_action;
			}
			foreach($res['arraytmp'] as $val){
			   if($val['parent_id'] != 0){
			       $res['arraymenu'][$val['parent_id']]['childnya'][] = $val;
			   }
			   else{
			       $res['arraymenu'][$val['menu_id']] = $val;
			   }
			}
			return $res['arraymenu'];

		}

		public function listmenu(){

			$_SQL2="SELECT
						bgp.NamaRole AS GroupNames,
						(
							CASE
							WHEN(bgp.`Level` = 0)THEN
								'-ALL-'
							ELSE
								GROUP_CONCAT(sm.nama_menu)
							END
						)AS GroupProfile
					FROM
						s_pps_group_profile bgp
					LEFT JOIN s_pps_akses_menu bm ON bgp.IdRole = bm.group_id
					LEFT JOIN s_pps_menu sm ON bm.menu_id = sm.id
					WHERE
						1 = 1
					GROUP BY
						bgp.NamaRole ASC";

			$listmenu = $this->db->query($_SQL2);

			return $listmenu->result();

		}



		public function insertGroupName($GroupName,$RoleUser){

				if($RoleUser=="admin"){$RoleUser=0;}else{$RoleUser=1;}
				$dt['Level'] = $RoleUser;
				$dt['NamaRole'] = $GroupName;
				$this->db->insert('s_pps_group_profile', $dt);
			    $insert_id = $this->db->insert_id();
			    return $insert_id;


		}

		public function insertparentandself($POST,$lastId){
			foreach ($POST['check_list'] as $item) {

				//KONDISI PARENT (cek parent dulu dapet parentnya baru di kondisi)

				$ResCekPrn=$this->cekparent($item);
				if($ResCekPrn){
					$cekapakahsudahada=$this->cekapakahsudahada($ResCekPrn,$lastId);
					if($cekapakahsudahada==0){
						$ResultFaktur = $this->db->query("insert into s_pps_akses_menu values (".$lastId.",".$ResCekPrn.");");
					}
				}

				//INPUT DIRINYA SENDIRI
				$ResultFaktur2 = $this->db->query("insert into s_pps_akses_menu values (".$lastId.",".$item.");");

			}

			//pr($_POST);exit;

		}

		public function cekapakahsudahada($ResCekPrn,$group){
			$ResultFaktur = $this->db->query("select count(*) as total from s_pps_akses_menu where group_id=".$group." AND menu_id=".$ResCekPrn."");
			$data = $ResultFaktur->result();
			return $data[0]->total;

		}

		public function CekRoleApakahSudahAda($lastId){
			$ResultFaktur = $this->db->query("select count(*) as total from s_pps_akses_menu where group_id=".$lastId."");
			$data = $ResultFaktur->result();
			return $data[0]->total;

		}

		public function cekparent($item){
			$ResultFaktur = $this->db->query("select parent_id from s_pps_menu where id=".$item."");
			$data = $ResultFaktur->result();
			return $data[0]->parent_id;

		}

		public function indexs_table_user($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table class="table table-striped">
                <thead>
                    <tr>
                        <th width="20%">No</th>
                        <th width="20%">Nama Lengkap</th>
                        <th width="15%">Posisi</th>
                        <th width="15%">Role</th>
                        <th width="15%">Email</th>
						<th width="15%">Action</th>
                    </tr>
                </thead>';

			$tot_hal = $this->db->query("select * from user");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			$get = $this->db->query("select * from user where 1=1 LIMIT ".$offset.",".$limit."");
			$i = $offset+1;
			foreach($get->result() as $g)
			{


              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->NamaLengkap.'</td>
                        <td>'.$g->Position.'</td>
                        <td>'.$g->Role.'</td>
						<td>'.$g->Email.'</td>
                        <td class="center">
                            <a class="btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Print Preview"><i class="fa fa-print"></i></a>
                            <div class="btn-group" data-toggle="tooltip" data-placement="top" title="Actions">
								<a class="btn-sm btn-danger dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-eye"></i> <span class="caret"></span><span class="sr-only"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#" id="button-pop-a1"><i class="fa fa-edit"></i> Edit</a></li>
									<li><a href="#" id="button-pop-a2"><i class="fa fa-ban"></i> Delete</a></li>
								</ul>
							</div>
						</td>
                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
                        <th width="20%">No</th>
                        <th width="20%">Nama Lengkap</th>
                        <th width="15%">Posisi</th>
                        <th width="15%">Role</th>
                        <th width="15%">Email</th>
						<th width="15%"><!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div></th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";

			$hasil .= $this->pagination->create_links();
			return $hasil;
		}

		public function load_data_kapal($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Pemilik</th>
                        <th>No Izin</th>
						<th>Tanda Selar</th>
						<th>GT</th>
						<th>Tipe Kapal</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_kapal where 1=1");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->nama_kapal.'</td>
                        <td>'.$g->pemilik.'</td>
                        <td>'.$g->no_izin.'</td>
						<td>'.$g->tanda_selar.'</td>
						<td>'.$g->gt.'</td>
						<td>'.$g->tipe_kapal.'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditKapal/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusKapal/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Pemilik</th>
                        <th>No Izin</th>
						<th>Tanda Selar</th>
						<th>GT</th>
						<th>Tipe Kapal</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";

			//$hasil .= $this->pagination->create_links();
			return $hasil;
		}

		public function load_data_ikan($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Ikan</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_ikan where 1=1");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->nama_ikan.'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditIkan/'.$g->id_ikan.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusIkan/'.$g->id_ikan.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>

                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Nama Ikan</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";

			//$hasil .= $this->pagination->create_links();
			return $hasil;
		}

		public function load_data_pnbp($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Nominal PNBP</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='pnbp' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditPnbp/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusPnbp/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Nominal PNBP</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_tenaga($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Jumlah Tenaga Kerja</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='TENAGA KERJA' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditTenaga/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusTenaga/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Jumlah Tenaga Kerja</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_produksi($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Jumlah Produksi</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='PRODUKSI' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditProduksi/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusProduksi/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Jumlah Produksi</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_bbm($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Jumlah BBM</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='BBM' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditBBM/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusBBM/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Jumlah BBM</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_air($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Jumlah AIR</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='AIR' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditAir/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusAir/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Jumlah Air</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_es($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Jumlah Es</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='ES' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditEs/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusEs/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Jumlah Es</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_bongkar($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
                <thead>
                    <tr>
						<th>No</th>
						<th>Jenis</th>
						<th>Bulan/Tahun</th>
						<th>Jumlah Bongkar</th>
                        <th>Actions</th>
                    </tr>
                </thead>';
			$get = $this->db->query("select * from data_bulanan where nama_kategori='BONGKAR' AND tahun=YEAR(CURDATE()) ORDER BY bulan ASC");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
						<td>'.$g->nama_kategori.'</td>
						<td>'.$g->bulan.'/'.$g->tahun.'</td>
						<td class="right">'.number_format($g->nominal).'</td>
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditBongkar/'.$g->id.'"  class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusBongkar/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-times"></i></a>
						</td>
                    </tr>';
				$i++;
			}
			 $hasil .= '<tfoot>
                    <tr>
					<th>No</th>
					<th>Jenis</th>
					<th>Bulan/Tahun</th>
					<th>Jumlah Bongkar</th>
					<th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}





		public function load_data_kedatangan($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
				 <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Asal</th>
						 <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Total</th>
						<th>Mutu</th>
						<th>Produk</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                </thead>';

			$tot_hal = $this->db->query("select * from data_kedatangan order by tanggal desc");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			//pr($offset);exit;
			$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id order by tanggal desc");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->nama_kapal.'</td>
						<td>'.$g->asal.'</td>
						<td>'.$g->tanggal.'</td>
                        <td>'.$g->waktu.'</td>
						<td class="right">'.number_format($g->total).'</td>
						<td class="center">'.$g->mutu.'</td>
						<td>'.$g->produk.'</td>
						<td>'.$g->status.'</td>';
				$hasil .='
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditKedatangan/'.$g->id.'"  class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusKedatangan/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-ban"></i></a>
						</td>

                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Asal</th>
						 <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Total</th>
						<th>Mutu</th>
						<th>Produk</th>
						<th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}


		public function load_data_kedatangan2($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
				 <thead>
										<tr>
						<th>No</th>
												<th>Nama Kapal</th>
												<th>Asal</th>
						 <th>Tanggal</th>
												<th>Waktu</th>
												<th>Total</th>
						<th>Mutu</th>
						<th>Produk</th>
						<th>Status</th>
										</tr>
								</thead>';

			$tot_hal = $this->db->query("select * from data_kedatangan order by tanggal desc");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			//pr($offset);exit;
			$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id order by tanggal desc");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
						$hasil .= '<tr class="">
						<td>'.$i.'</td>
						<td>'.$g->nama_kapal.'</td>
						<td>'.$g->asal.'</td>
						<td>'.$g->tanggal.'</td>
						<td>'.$g->waktu.'</td>
						<td class="right">'.number_format($g->total).'</td>
						<td class="center">'.$g->mutu.'</td>
						<td>'.$g->produk.'</td>
						<td>'.$g->status.'</td>';
				$hasil .='

										</tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
										<tr>
						<th>No</th>
												<th>Nama Kapal</th>
												<th>Asal</th>
						 <th>Tanggal</th>
												<th>Waktu</th>
												<th>Total</th>
						<th>Mutu</th>
						<th>Produk</th>
						<th>Status</th>
										</tr>
								</tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}



		public function load_data_ajaxkedatangan($limit,$offset, $filter_date)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
				 <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Asal</th>
						 <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Total</th>
						<th>Mutu</th>
						<th>Produk</th>
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                </thead>';

			$tot_hal = $this->db->query("select * from data_kedatangan order by tanggal desc");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			//pr($offset);exit;
			$date     = explode("--",$filter_date);
			$awal 		= $date[0];
			$akhir   	= $date[1];
			$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>="."'".$awal."'".' AND tanggal<='."'".$akhir."'"." order by tanggal desc");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->nama_kapal.'</td>
						<td>'.$g->asal.'</td>
						<td>'.$g->tanggal.'</td>
                        <td>'.$g->waktu.'</td>
						<td class="right">'.number_format($g->total).'</td>
						<td class="center">'.$g->mutu.'</td>
						<td>'.$g->produk.'</td>
						<td>'.$g->status.'</td>';
				$hasil .='
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditKedatangan/'.$g->id.'"  class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusKedatangan/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-ban"></i></a>
						</td>

                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Asal</th>
						 <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Total</th>
						<th>Mutu</th>
						<th>Produk</th>
						<th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function grafik_kedatangan()
		{

		  $tahun=date('Y');
		  $sql= $this->db->query("SELECT
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=1)AND (YEAR(tanggal)='$tahun'))),0) AS `Januari`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=2)AND (YEAR(tanggal)='$tahun'))),0) AS `Februari`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=3)AND (YEAR(tanggal)='$tahun'))),0) AS `Maret`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=4)AND (YEAR(tanggal)='$tahun'))),0) AS `April`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=5)AND (YEAR(tanggal)='$tahun'))),0) AS `Mei`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=6)AND (YEAR(tanggal)='$tahun'))),0) AS `Juni`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=7)AND (YEAR(tanggal)='$tahun'))),0) AS `Juli`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=8)AND (YEAR(tanggal)='$tahun'))),0) AS `Agustus`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=9)AND (YEAR(tanggal)='$tahun'))),0) AS `September`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=10)AND (YEAR(tanggal)='$tahun'))),0) AS `Oktober`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=11)AND (YEAR(tanggal)='$tahun'))),0) AS `November`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_kedatangan)WHERE((MONTH(tanggal)=12)AND (YEAR(tanggal)='$tahun'))),0) AS `Desember`
		  FROM data_kedatangan GROUP BY YEAR(tanggal) LIMIT 1");
		  return $sql;

		}

		public function grafik_keberangkatan()
		{

		  $tahun=date('Y');
		  $sql= $this->db->query(" SELECT
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=1)AND (YEAR(tanggal)='$tahun'))),0) AS `Januari`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=2)AND (YEAR(tanggal)='$tahun'))),0) AS `Februari`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=3)AND (YEAR(tanggal)='$tahun'))),0) AS `Maret`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=4)AND (YEAR(tanggal)='$tahun'))),0) AS `April`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=5)AND (YEAR(tanggal)='$tahun'))),0) AS `Mei`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=6)AND (YEAR(tanggal)='$tahun'))),0) AS `Juni`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=7)AND (YEAR(tanggal)='$tahun'))),0) AS `Juli`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=8)AND (YEAR(tanggal)='$tahun'))),0) AS `Agustus`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=9)AND (YEAR(tanggal)='$tahun'))),0) AS `September`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=10)AND (YEAR(tanggal)='$tahun'))),0) AS `Oktober`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=11)AND (YEAR(tanggal)='$tahun'))),0) AS `November`,
		  IFNULL((SELECT COUNT(id_kapal) FROM (data_keberangkatan)WHERE((MONTH(tanggal)=12)AND (YEAR(tanggal)='$tahun'))),0) AS `Desember`
		 FROM data_keberangkatan GROUP BY YEAR(tanggal) LIMIT 1");
		  return $sql;

		}


		public function load_data_keberangkatan($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
				 <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Tujuan</th>
						<th>Tanggal</th>
                        <th>Waktu</th>
						<th>Jumlah ABK</th>
						<th>Dermaga</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>';

			$tot_hal = $this->db->query("select * from data_keberangkatan");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			//pr($offset);exit;
			$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id where 1=1 order by tanggal desc");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->nama_kapal.'</td>
                        <td>'.$g->tujuan.'</td>
						<td>'.$g->tanggal.'</td>
                        <td>'.$g->waktu.'</td>
						<td>'.$g->abk.'</td>
						<td>'.$g->dermaga.'</td>
						<td class="center">';

				if($g->status=='Sesuai Jadwal'){
					$hasil .='<span class="label label-info">Sesuai Jadwal</span>';
				}else if($g->status=='Terlambat'){
					$hasil .='<span class="label label-warning">Terlambat</span>';
				}else if($g->status=='Pembatalan'){
					$hasil .='<span class="label label-danger">Pembatalan</span></td>';
				}

				$hasil .='
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditKeberangkatan/'.$g->id.'"  class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
							<a href="'. base_url() . 'data/HapusKeberangkatan/'.$g->id.'" onclick="return confirm (\'Anda yakin akan menghapus data ini?\')" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-ban"></i></a>
						</td>
                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Tujuan</th>
						<th>Tanggal</th>
                        <th>Waktu</th>
						<th>Jumlah ABK</th>
						<th>Dermaga</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_keberangkatan2($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table table-striped">
				 <thead>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Tujuan</th>
						<th>Tanggal</th>
                        <th>Waktu</th>
						<th>Jumlah ABK</th>
						<th>Dermaga</th>
                        <th>Status</th>
                    </tr>
                </thead>';

			$tot_hal = $this->db->query("select * from data_keberangkatan");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			//pr($offset);exit;
			$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id where 1=1");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->nama_kapal.'</td>
                        <td>'.$g->tujuan.'</td>
						<td>'.$g->tanggal.'</td>
                        <td>'.$g->waktu.'</td>
						<td>'.$g->abk.'</td>
						<td>'.$g->dermaga.'</td>
						<td class="center">';

				if($g->status=='Sesuai Jadwal'){
					$hasil .='<span class="label label-info">Sesuai Jadwal</span>';
				}else if($g->status=='Terlambat'){
					$hasil .='<span class="label label-warning">Terlambat</span>';
				}else if($g->status=='Pembatalan'){
					$hasil .='<span class="label label-danger">Pembatalan</span></td>';
				}

				$hasil .='
                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Nama Kapal</th>
                        <th>Tujuan</th>
						<th>Tanggal</th>
                        <th>Waktu</th>
						<th>Jumlah ABK</th>
						<th>Dermaga</th>
                        <th>Status</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function load_data_himbauan($limit,$offset)
		{
			$hasil = "";
			$hasil .= '
				<table id="table-basic" class="table">
				 <thead>
                    <tr>
						<th>No</th>
                        <th>Isi Dashboard</th>
                        <th>Keterangan</th>
						<th>Action</th>
                    </tr>
                </thead>';

			$tot_hal = $this->db->query("select * from himbauan");

			$config['base_url'] = base_url() . 'dashboard/managementuser/page/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = '<ul class="pagination pull-right" >';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo Prev';
			$config['prev_tag_open'] = '<li class="prev">';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next &raquo';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config);
			//pr($offset);exit;
			$get = $this->db->query("select * from himbauan");
			$i = $offset+1;
			foreach($get->result() as $g)
			{
              $hasil .= '<tr class="">
                        <td>'.$i.'</td>
                        <td>'.$g->isi.'</td>
                        <td>'.$g->ket.'</td>';
				$hasil .='
						<td class="center" width="10%">
							<a href="'. base_url() . 'data/EditHimbauan/'.$g->id.'"  class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
						</td>
                    </tr>';

				$i++;
			}

			 $hasil .= '<tfoot>
                    <tr>
						<th>No</th>
                        <th>Isi Dashboard</th>
                        <th>Keterangan</th>
						<th>Action</th>
                    </tr>
                </tfoot>';
			$hasil .= "</table>";
			return $hasil;
		}

		public function jadwal_keberangkatan()
		{
			$hasil = "";
			$hasil .= '
				<table class="table table-striped" id="tblatas">
					<thead style="background-color:#ffffc6;color:#000;font-size:x-small;">
					<tr>
						<th>NAMA KAPAL</th>
						<th>TUJUAN</th>
						<th>ALAT TANGKAP</th>
						<th>GT</th>
						<th>ABK</th>
						<th>WAKTU</th>
						<th>DERMAGA</th>
						<th>STATUS</th>
					</tr>
					</thead>
					<tbody>';
					$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal,a.alat_tangkap,a.gt,b.*,DATE_FORMAT(waktu, '%H:%i') AS waktu FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal=DATE(NOW())");
					foreach($get->result() as $g)
					{
					  $hasil .= '<tr class="tbl-row sembunyi" id="tblatas" style="display: none;">
								<td>'.$g->nama_kapal.'</td>
								<td>'.$g->tujuan.'</td>
								<td>'.$g->alat_tangkap.'</td>
								<td>'.$g->gt.'</td>
								<td>'.$g->abk.'</td>
								<td>'.$g->waktu.'</td>
								<td>'.$g->dermaga.'</td>
								<td>'.$g->status.'</td>
								</tr>';
						}

					$hasil .= '</tbody>
					<tfoot id="foot_tbl_cabang">
					<tr>
						<td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td>
					</tr>
					</tfoot>';
				  $hasil .= "</table>";


			return $hasil;
		}
		public function jadwal_kedatangan()
		{
			$hasil = "";
			$hasil .= '
				<table class="table table-striped" id="tblatas">
					<thead style="background-color:#ffffc6;color:#000;font-size:x-small;">
					  <tr>
						<th>NAMA KAPAL</th>
						<th>ASAL</th>
						<th>ALAT TANGKAP</th>
						<th>GT</th>
						<th>WAKTU</th>
						<th>DERMAGA</th>
						<th>IKAN DOMINAN</th>
						<th>TOTAL</th>
						<th>MUTU</th>
						<th>HARGA RATA2</th>
						<th>PRODUK</th>
						<th>ANTRIAN</th>
						<th>STATUS</th>
					  </tr>
					</thead>
					<tbody>';
					$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal,a.alat_tangkap,a.gt,b.*,
					DATE_FORMAT(waktu, '%H:%i') AS jam, (berat1+berat2+berat3+berat4+berat5+berat6) AS total,
						CASE WHEN berat1>berat2 AND berat1>berat3 AND berat1>berat4 AND berat1>berat5 AND berat1>berat6 THEN ikan1
						WHEN berat2>berat1 AND berat2>berat3 AND berat2>berat4 AND berat2>berat5 AND berat2>berat6 THEN ikan2
						WHEN berat3>berat1 AND berat3>berat2 AND berat3>berat4 AND berat3>berat5 AND berat3>berat6 THEN ikan3
						WHEN berat4>berat1 AND berat4>berat2 AND berat4>berat3 AND berat4>berat5 AND berat4>berat6 THEN ikan4
						WHEN berat5>berat1 AND berat5>berat2 AND berat5>berat3 AND berat5>berat4 AND berat5>berat6 THEN ikan5
						ELSE ikan6 END AS dominan
					FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal=DATE(NOW())");
					foreach($get->result() as $g)
					{
					  $hasil .= '<tr class="tbl-row sembunyi" id="tblatas" style="display: none;">
								<td>'.$g->nama_kapal.'</td>
								<td>'.$g->asal.'</td>
								<td>'.$g->alat_tangkap.'</td>
								<td>'.$g->gt.'</td>
								<td>'.$g->jam.'</td>
								<td>'.$g->dermaga.'</td>
								<td>'.$g->dominan.'</td>
								<td>'.number_format($g->total,0,",",".").'</td>
								<td>'.$g->mutu.'</td>
								<td>'.$g->harga.'</td>
								<td>'.$g->produk.'</td>
								<td>'.$g->no_antrian.'</td>
								<td>'.$g->status.'</td>
								</tr>';

						}

					$hasil .= '</tbody>
					<tfoot id="foot_tbl_cabang">
					<tr>
						<td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td>
					</tr>
					</tfoot>';
				  $hasil .= "</table>";


			return $hasil;
		}

	public function gabung_keberangkatan()
		{
			$hasil = "";
			$hasil .= '
				<table class="table table-striped" id="tblbawah">
					<thead style="background-color:#ffffc6;color:#000;font-size:x-small;">
					<tr>
						<th>NAMA KAPAL</th>
						<th>TUJUAN</th>
						<th>ALAT TANGKAP</th>
						<th>GT</th>
						<th>ABK</th>
						<th>WAKTU</th>
						<th>DERMAGA</th>
						<th>STATUS</th>
					</tr>
					</thead>
					<tbody>';
					$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal,a.alat_tangkap,a.gt,b.*,DATE_FORMAT(waktu, '%H:%i') AS waktu FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal=DATE(NOW())");
					foreach($get->result() as $g)
					{
					  $hasil .= '<tr class="tbl-row sembunyi" id="tblatas" style="display: none;">
								<td>'.$g->nama_kapal.'</td>
								<td>'.$g->tujuan.'</td>
								<td>'.$g->alat_tangkap.'</td>
								<td>'.$g->gt.'</td>
								<td>'.$g->abk.'</td>
								<td>'.$g->waktu.'</td>
								<td>'.$g->dermaga.'</td>
								<td>'.$g->status.'</td>
								</tr>';
						}

					$hasil .= '</tbody>
					<tfoot id="foot_tbl_cabang">
					<tr>
						<td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td>
					</tr>
					</tfoot>';
				  $hasil .= "</table>";


			return $hasil;
		}
		public function gabung_kedatangan()
		{
			$hasil = "";
			$hasil .= '
				<table class="table table-striped" id="tblatas">
					<thead style="background-color:#ffffc6;color:#000;font-size:x-small;">
					  <tr>
						<th>NAMA KAPAL</th>
						<th>ASAL</th>
						<th>ALAT TANGKAP</th>
						<th>GT</th>
						<th>WAKTU</th>
						<th>DERMAGA</th>
						<th>IKAN DOMINAN</th>
						<th>TOTAL</th>
						<th>MUTU</th>
						<th>HARGA RATA2</th>
						<th>PRODUK</th>
						<th>ANTRIAN</th>
						<th>STATUS</th>
					  </tr>
					</thead>
					<tbody>';
					$get = $this->db->query("SELECT a.id AS id_kapal,a.nama_kapal,a.alat_tangkap,a.gt,b.*,
						DATE_FORMAT(waktu, '%H:%i') AS jam, (berat1+berat2+berat3+berat4+berat5+berat6) AS total,
						CASE WHEN berat1>berat2 AND berat1>berat3 THEN ikan1
						WHEN berat2>berat1 AND berat2>berat3 THEN ikan2
						ELSE ikan3 END AS dominan
						FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal=DATE(NOW())");
					foreach($get->result() as $g)
					{
					  $hasil .= '<tr class="tbl-row sembunyi" id="tblatas" style="display: none;">
								<td>'.$g->nama_kapal.'</td>
								<td>'.$g->asal.'</td>
								<td>'.$g->alat_tangkap.'</td>
								<td>'.$g->gt.'</td>
								<td>'.$g->jam.'</td>
								<td>'.$g->dermaga.'</td>
								<td>'.$g->dominan.'</td>
								<td>'.number_format($g->total,0,",",".").'</td>
								<td>'.$g->mutu.'</td>
								<td>'.$g->harga.'</td>
								<td>'.$g->produk.'</td>
								<td>'.$g->no_antrian.'</td>
								<td>'.$g->status.'</td>
								</tr>';

						}

					$hasil .= '</tbody>
					<tfoot id="foot_tbl_cabang">
					<tr>
						<td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td>
						<td></td><td></td><td></td><td></td>
						<td></td>
					</tr>
					</tfoot>';
				  $hasil .= "</table>";


			return $hasil;
		}

	function himbauan(){
		return $this->db->query('select * from himbauan where id=1');
	}

}

/* End of file app_user_login_model.php */
/* Location: ./application/models/app_user_login_model.php */
