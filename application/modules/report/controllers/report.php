<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->library('excel');
    }

    function ajaxKedatangan($uri=0)
    {

      if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
      {
        $session['session']=array();
        $session['session']=$this->session->userdata;
        $date = $this->input->post('filter_date');
        $d['dt_retrieve'] = $this->app_load_data_model->load_data_ajaxkedatangan($GLOBALS['site_limit_medium'],$uri, $date);

        $this->load->template($GLOBALS['site_theme']."/data/report-kedatangan",$d);
      }
      else
      {
        redirect("login");
      }
    }

    //kedatangan
    function kedatangan($uri=0)
    {

      if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
      {
        $session['session']=array();
        $session['session']=$this->session->userdata;
        $d['dt_retrieve'] = $this->app_load_data_model->load_data_kedatangan2($GLOBALS['site_limit_medium'],$uri);

        $this->load->template($GLOBALS['site_theme']."/data/report-kedatangan",$d);
      }
      else
      {
        redirect("login");
      }
    }

    //keberangkatan
    function keberangkatan($uri=0)
    {


      //pr($this->session->userdata);exit;
      if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
      {
        $session['session']=array();
        $session['session']=$this->session->userdata;
        $d['dt_retrieve'] = $this->app_load_data_model->load_data_keberangkatan2($GLOBALS['site_limit_medium'],$uri);


      $this->load->template($GLOBALS['site_theme']."/data/report-keberangkatan",$d);

      }
      else
      {
        redirect("login");
      }
    }

   //Harian
   function harian($uri=0)
       {
   
   
         //pr($this->session->userdata);exit;
         if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
         {
           $session['session']=array();
           $session['session']=$this->session->userdata;
           $d['dt_retrieve'] = $this->app_load_data_model->load_data_keberangkatan2($GLOBALS['site_limit_medium'],$uri);
   
   
         $this->load->template($GLOBALS['site_theme']."/data/report-harian",$d);
   
         }
         else
         {
           redirect("login");
         }
       }

    function ExportKedatangan()
    {

      if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
      {

        $start = $this->input->post('tgl1');
        $akhir   = $this->input->post('tgl2');
        $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal,b.*,
        DATE_FORMAT(waktu, "%H:%i") AS jam, (berat1+berat2+berat3) AS total,
        CASE WHEN berat1>berat2 AND berat1>berat3 THEN ikan1
        WHEN berat2>berat1 AND berat2>berat3 THEN ikan2
        ELSE ikan3 END AS dominan
        FROM data_kedatangan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC LIMIT 20');

        $data['tgl1'] = $start;
        $data['tgl2'] = $akhir;
        $data['data'] = $select;
        $this->load->view("/pps/data/previewKedatangan",$data);
      }
      else
      {
        redirect("login");
      }
    }


    function ExportKeberangkatan2()
    {

      if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
      {
        $start = $this->input->post('tgl1');
        $akhir   = $this->input->post('tgl2');
        // $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
        //               JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC');
        $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' AND 1=1  limit 20' );

        $data['tgl1'] = $start;
        $data['tgl2'] = $akhir;
        $data['data'] = $select;
        $this->load->view("/pps/data/previewKeberangkatan",$data);
      }
      else
      {
        redirect("login");
      }
    }

    function ExportHarian()
    {

      if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")
      {
        $start = $this->input->post('tgl1');
        $akhir   = $this->input->post('tgl2');
        // $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
        //               JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC');
        $select = $this->db->query('SELECT b.tanggal,a.nama_kapal,a.tanda_selar,a.pemilik,a.gt,a.alat_tangkap,b.asal,a.no_siup
        FROM data_kedatangan b JOIN data_kapal a ON b.`id_kapal`=a.id  WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' AND 1=1  limit 20' );

        $data['tgl1'] = $start;
        $data['tgl2'] = $akhir;
        $data['data'] = $select;
        $this->load->view("/pps/data/previewHarian",$data);
      }
      else
      {
        redirect("login");
      }
    }

    function ExportKedatanganExcel()
  	{


    		//pr( $this->db->escape($this->security->xss_clean($_POST)));exit;
    		if($this->session->userdata("logged_in")=="yesGetMeLoginBaby")

    		{
    			$session['session']=array();
    			$session['session']=$this->session->userdata;
          $filter_date  = $this->input->post('filter_date');
          $date     = explode("--",$filter_date);
          $start = $date[0];
          $akhir   = $date[1];

    			//pr($_FILES);exit;
    		$select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
    									JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC')->result();

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
                ->setCellValue('A1', 'REKAP DATA KEDATANGAN KAPAL PELABUHAN PPS KENDARI TANGGAL ' . $start . "sampai" . $akhir)
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

      function Export(){
        if($this->input->post('byPdf') == 1){
          // load dompdf
          $this->load->helper('gen_pdf');
          $start = $this->input->post('tgl1');
          $akhir   = $this->input->post('tgl2');
          $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
                        JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC');
          //load content html
          $data['tglAwal']    = $start;
          $data['tglAkhir']   = $akhir;
          $data['kedatangan'] = $select;
          $html = $this->load->view('pps/report/reportKedatanganPdf', $data, true);
          // create pdf using dompdf
          $filename = 'EXPORT DATA KEDATANGAN PERIODE' . $start . " - ". $akhir;
          $paper = 'A4';
          $orientation = 'landscape';
          pdf_create($html, $filename, $paper, $orientation);
          }
        if($this->input->post('byExcel') == 2){
          $session['session']=array();
          $session['session']=$this->session->userdata;
          $start = $this->input->post('tgl1');
          $akhir   = $this->input->post('tgl2');


          //pr($_FILES);exit;
        $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
                      JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC')->result();

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
                ->setCellValue('A1', 'REKAP DATA KEDATANGAN KAPAL PELABUHAN PPS KENDARI TANGGAL ' . $start . " sampai " . $akhir)
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
          if($this->input->post('byDoc') == 3){
            $this->load->library('word');
            $start = $this->input->post('tgl1');
            $akhir   = $this->input->post('tgl2');
            $PHPWord = $this->word; // New Word Document
            //landscape
            $section = $PHPWord->createSection(array('orientation'=>'landscape', 'marginLeft'=>200, 'marginRight'=>200, 'marginTop'=>200, 'marginBottom'=>200));
            // Add text elements
            // Define table style arrays
            $styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>5);
            $styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'EAEAEA', 'bgColor'=>'EAEAEA');
            // Define cell style arrays
            $styleCell = array('valign'=>'center');
            $styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
            // Define font style for first row
            $fontStyle = array('bold'=>true, 'align'=>'center', 'size'=>8);

            $section->addText('Laporan Kedatangan Kapal Periode : ' . $start . " - ". $akhir);
            $section->addTextBreak(1);
            // Add table style
            $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
            // Add table
            $table = $section->addTable('myOwnTableStyle');
            // Add row
            $table->addRow(900);
            // Add cells
            $table->addCell(1000, $styleCell)->addText('NO', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('NAMA KAPAL', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('ASAL', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('TANGGAL', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('JAM', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('STATUS', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('DERMAGA', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('MUTU', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('PRODUK', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('HARGA', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('TOTAL', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('SUHU IKAN', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('SUHU PALKA', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('IKAN1', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BERAT1', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('IKAN2', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BERAT2', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('IKAN3', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BERAT3', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('IKAN4', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BERAT4', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('IKAN5', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BERAT5', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('IKAN6', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BERAT6', $fontStyle);

            $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.*,(berat1+berat2+berat3+berat4+berat5+berat6) AS total FROM data_kedatangan b
                          JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' ORDER BY tanggal DESC');

            // Add more rows / cells
            $i = 1;
            foreach ($select->result() as $key => $value) {
              $table->addRow();
            	$table->addCell(1000)->addText("$i");
            	$table->addCell(1000)->addText($value->nama_kapal);
            	$table->addCell(1000)->addText($value->asal);
            	$table->addCell(1000)->addText($value->tanggal);
              $table->addCell(1000)->addText($value->waktu);
              $table->addCell(1000)->addText($value->status);
            	$table->addCell(1000)->addText($value->dermaga);
            	$table->addCell(1000)->addText($value->mutu);
            	$table->addCell(1000)->addText($value->produk);
              $table->addCell(1000)->addText($value->harga);
              $table->addCell(1000)->addText($value->total);
              $table->addCell(1000)->addText($value->suhu_ikan);
              $table->addCell(1000)->addText($value->suhu_palka);
              $table->addCell(1000)->addText($value->ikan1);
              $table->addCell(1000)->addText($value->berat1);
              $table->addCell(1000)->addText($value->ikan2);
              $table->addCell(1000)->addText($value->berat2);
              $table->addCell(1000)->addText($value->ikan3);
              $table->addCell(1000)->addText($value->berat3);
              $table->addCell(1000)->addText($value->ikan4);
              $table->addCell(1000)->addText($value->berat5);
              $table->addCell(1000)->addText($value->ikan5);
              $table->addCell(1000)->addText($value->berat5);
              $table->addCell(1000)->addText($value->ikan6);
              $table->addCell(1000)->addText($value->berat6);

              $i++;
            }
            // for($i = 1; $i <= 10; $i++) {
            //
            // }
            $filename='Data_kedatangan.docx'; //save our document as this file name
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
            $objWriter->save('php://output');
          }
      }

      function ExportHarian2(){

        if($this->input->post('byExcel') == 2){
          $session['session']=array();
          $session['session']=$this->session->userdata;

          $start = $this->input->post('tgl1');
          $akhir   = $this->input->post('tgl2');

          //pr($_FILES);exit;
          $select = $this->db->query('SELECT b.tanggal,a.nama_kapal,a.tanda_selar,a.pemilik,a.gt,a.alat_tangkap,b.dermaga,b.asal,a.no_siup
          FROM data_kedatangan b JOIN data_kapal a ON b.`id_kapal`=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' AND 1=1 ORDER BY tanggal')->result();

            $objPHPExcel    = new PHPExcel();
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(29);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(6);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(7);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(34);

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

            $objPHPExcel->getActiveSheet()->getStyle("A1:I1")
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
        $objPHPExcel->getActiveSheet()->mergeCells('A1:I1');
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
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Monitoring Harian Pendaratan Ikan di Pelabuhan Perikanan Samudera Kendari')
                ->setCellValue('A2', 'NO.')
                ->setCellValue('B2', 'Tgl')
                ->setCellValue('C2', 'Nama Kapal Yang Mendaratkan')
                ->setCellValue('D2', 'Tanda Selar')
                ->setCellValue('E2', 'Nama Pemilik')
                ->setCellValue('F2', 'GT')
                ->setCellValue('G2', 'Alat TNGKp')
                ->setCellValue('H2', 'PPS/PPI')
                ->setCellValue('I2', 'LOKASI PNKPAN.')
                ->setCellValue('J2', 'SIPI');

            $ex = $objPHPExcel->setActiveSheetIndex(0);
            $no = 1;
            $counter = 4;
            foreach ($select as $row):
                $ex->setCellValue('A'.$counter, $no++);
                $ex->setCellValue('B'.$counter, $row->tanggal);
                $ex->setCellValue('C'.$counter, $row->nama_kapal);
                $ex->setCellValue('D'.$counter, $row->tanda_selar);
                $ex->setCellValue('E'.$counter, $row->pemilik);
                $ex->setCellValue('F'.$counter, $row->gt);
                $ex->setCellValue('G'.$counter, $row->alat_tangkap);
                $ex->setCellValue('H'.$counter, $row->dermaga);
                $ex->setCellValue('I'.$counter, $row->asal);
                $ex->setCellValue('J'.$counter, $row->no_siup);


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


                $counter = $counter+1;
            endforeach;

            $objPHPExcel->getProperties()->setCreator("SIKAP")
                ->setLastModifiedBy("SIKAP")
                ->setTitle("Monitoring Harian Pendaratan Ikan")
                ->setSubject("Monitoring Harian Pendaratan Ikan")
                ->setDescription("Monitoring Harian Pendaratan Ikan, generated by SIKAP.")
                ->setKeywords("office 2007 openxml php")
                ->setCategory("Monitoring Harian Pendaratan Ikan");
            $objPHPExcel->getActiveSheet()->setTitle('Monitoring');

            $objWriter  = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="Monitoring Harian Pendaratan Ikan '. date('Ymd') .'.xlsx"');
            $objWriter->save('php://output');
        }
      }
         
      


      function ExportKeberangkatan(){
        if($this->input->post('byPdf') == 1){
          // load dompdf
          $this->load->helper('gen_pdf');
          $start = $this->input->post('tgl1');
          $akhir   = $this->input->post('tgl2');

          $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' AND 1=1');
          //load content html
          $data['tglAwal']    = $start;
          $data['tglAkhir']   = $akhir;
          $data['kedatangan'] = $select;
          $html = $this->load->view('pps/report/reportKeberangkatanPdf', $data, true);
          // create pdf using dompdf
          $filename = 'EXPORT DATA KEDATANGAN PERIODE' . $start . " - ". $akhir;
          $paper = 'A4';
          $orientation = 'landscape';
          pdf_create($html, $filename, $paper, $orientation);
          }
        if($this->input->post('byExcel') == 2){
          $session['session']=array();
          $session['session']=$this->session->userdata;

          $start = $this->input->post('tgl1');
          $akhir   = $this->input->post('tgl2');

          //pr($_FILES);exit;
          $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' AND 1=1')->result();

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
          if($this->input->post('byDoc') == 3){
            $this->load->library('word');
            $start = $this->input->post('tgl1');
            $akhir   = $this->input->post('tgl2');
            $PHPWord = $this->word; // New Word Document
            //landscape
            $section = $PHPWord->createSection(array('orientation'=>'landscape', 'marginLeft'=>200, 'marginRight'=>200, 'marginTop'=>200, 'marginBottom'=>200));
            // Add text elements
            // Define table style arrays
            $styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>20);
            $styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'EAEAEA', 'bgColor'=>'EAEAEA');
            // Define cell style arrays
            $styleCell = array('valign'=>'center');
            $styleCellBTLR = array('valign'=>'center', 'textDirection'=>PHPWord_Style_Cell::TEXT_DIR_BTLR);
            // Define font style for first row
            $fontStyle = array('bold'=>true, 'align'=>'center', 'size'=>8);

            $section->addText('Laporan Kedatangan Kapal Periode : ' . $start . " - ". $akhir);
            $section->addTextBreak(1);
            // Add table style
            $PHPWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
            // Add table
            $table = $section->addTable('myOwnTableStyle');
            // Add row
            $table->addRow(900);
            // Add cells
            $table->addCell(1000, $styleCell)->addText('NO', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('NAMA KAPAL', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('TUJUAN', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('TANGGAL', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('JAM', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('ABK', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('DERMAGA', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('STATUS', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('ES', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('AIR', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('SOLAR', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('OLIE', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('BENSIN', $fontStyle);
            $table->addCell(1000, $styleCell)->addText('LAINNYA', $fontStyle);

            $select = $this->db->query('SELECT a.id AS id_kapal,a.nama_kapal, b.* FROM data_keberangkatan b JOIN data_kapal a ON b.id_kapal=a.id WHERE tanggal>='."'".$start."'".' AND tanggal<='."'".$akhir."'".' AND 1=1');

            // Add more rows / cells
            $i = 1;
            foreach ($select->result() as $key => $value) {
              $table->addRow();
              $table->addCell(1000)->addText("$i");
              $table->addCell(1000)->addText($value->nama_kapal);
              $table->addCell(1000)->addText($value->tujuan);
              $table->addCell(1000)->addText($value->tanggal);
              $table->addCell(1000)->addText($value->waktu);
              $table->addCell(1000)->addText($value->abk);
              $table->addCell(1000)->addText($value->dermaga);
              $table->addCell(1000)->addText($value->status);
              $table->addCell(1000)->addText($value->es);
              $table->addCell(1000)->addText($value->air);
              $table->addCell(1000)->addText($value->solar);
              $table->addCell(1000)->addText($value->olie);
              $table->addCell(1000)->addText($value->bensin);
              $table->addCell(1000)->addText($value->lainnya);
              $i++;
            }
            // for($i = 1; $i <= 10; $i++) {
            //
            // }
            $filename='Data_kedatangan.docx'; //save our document as this file name
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
            header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
            header('Cache-Control: max-age=0'); //no cache
            $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
            $objWriter->save('php://output');
          }
      }

}
