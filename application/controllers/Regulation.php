<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Regulation extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "regulation";
		$data['page'] = "regulation/index";
		
		$this->load->view('layout', $data);
	}
}
