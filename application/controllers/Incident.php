<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Incident extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "incident";
		$data['page'] = "incident/index";
		
		$this->load->view('layout', $data);
	}
}