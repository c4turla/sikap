<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Author : Ismo Broto : git @ismo1106
 */
class Import extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('excel');
    }
    function index() {
        $msg    = $this->uri->segment(3);
        $alert  = '';
        if($msg == 'success'){
            $alert  = 'Data Berhasil Di Upload!!';
        }
        $data['_alert'] = $alert;
        $this->load->view('upload-kapal',$data);
    }
    function upload() {
        $fileName = time() . $_FILES['fileImport']['name'];                     // Sesuai dengan nama Tag Input/Upload
        $config['upload_path'] = './files/';                                // Buat folder dengan nama "fileExcel" di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('fileImport'))
            $this->upload->display_errors();
        $media = $this->upload->data('fileImport');
        $inputFileName = './files/' . $media['file_name'];
        try {
            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
        } catch (Exception $e) {
            die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
        }
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        for ($row = 2; $row <= $highestRow; $row++) {                           // Read a row of data into an array
            $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

            $excel_date = $rowData[0][7];
            $unix_date = ($excel_date - 25569) * 86400;
            $excel_date = 25569 + ($unix_date / 86400);
            $unix_date = ($excel_date - 25569) * 86400;
            $tanggal_sipii =  gmdate("Y-m-d", $unix_date);

            $excel_date2 = $rowData[0][8];
            $unix_date2 = ($excel_date2 - 25569) * 86400;
            $excel_date3 = 25569 + ($unix_date2 / 86400);
            $unix_date3 = ($excel_date3 - 25569) * 86400;
            $tanggal_sipiii =  gmdate("Y-m-d", $unix_date3);
            
            $data = array(                                                      // Sesuaikan sama nama kolom tabel di database
                "nama_kapal" => $rowData[0][0],
                "pemilik" => $rowData[0][1],
                "no_izin" => $rowData[0][2],
				"gt" => $rowData[0][3],
				"alat_tangkap" => $rowData[0][4],
				"tanda_selar" => $rowData[0][5],
                "tipe_kapal" => $rowData[0][6],
                "tanggal_sipi" => $tanggal_sipii,
                "tanggal_akhir_sipi" => $tanggal_sipiii,
                "panjang" => $rowData[0][9],
                "no_siup" => $rowData[0][10]);


            $insert = $this->db->insert("data_kapal", $data);                   // Sesuaikan nama dengan nama tabel untuk melakukan insert data
        }

        redirect(base_url('data/kapal'));
    }
}
