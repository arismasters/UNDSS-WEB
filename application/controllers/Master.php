<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "master";
		$data['page'] = "master/index";
		
		$this->load->view('layout', $data);
	}
}
