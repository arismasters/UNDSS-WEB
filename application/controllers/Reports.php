<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "reports";
		$data['page'] = "reports/index";
		
		$this->load->view('layout', $data);
	}
}