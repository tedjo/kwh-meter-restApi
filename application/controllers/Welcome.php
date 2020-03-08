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
		$data['kwhmeter'] = $this->dbApi->getKwhMeter();

		$this->load->helper('url');

		$this->load->view('welcome_message', $data);
	}
}
