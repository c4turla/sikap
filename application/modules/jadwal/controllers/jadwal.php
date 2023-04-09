<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('app_load_data_model');
    }

	public function keberangkatan()
	{
		$d['himbauan'] = $this->app_load_data_model->himbauan()->result();
		$d['dt_retrieve'] = $this->app_load_data_model->jadwal_keberangkatan();
		$this->load->view('pps/jadwal/vkeberangkatan',$d);
	}
	public function kedatangan()
	{
		$d['himbauan'] = $this->app_load_data_model->himbauan()->result();
		$d['dt_retrieve'] = $this->app_load_data_model->jadwal_kedatangan();
		$this->load->view('pps/jadwal/vkedatangan',$d);
	}
	public function gabung()
	{
		//Himbauan
		$d['himbauan'] = $this->app_load_data_model->himbauan()->result();
		$d['dt_keberangkatan'] = $this->app_load_data_model->gabung_keberangkatan();
		$d['dt_kedatangan'] = $this->app_load_data_model->gabung_kedatangan();
		$this->load->view('pps/jadwal/jadwal',$d);
	}
}
