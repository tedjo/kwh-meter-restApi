<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DBApi_model', 'dbApi');
	}

	public function index()
	{
		$this->dbApi->updateStatus();
		sleep(1);
		$data['kwhmeter'] = $this->dbApi->getKwhMeter();
		$data['rekapdate'] = $this->dbApi->getRekapDate();

		$this->load->helper('url');

		$this->load->view('welcome_message', $data);
	}
}
