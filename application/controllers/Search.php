<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "search";
		$data['page'] = "search/index";
		
		$this->load->view('layout', $data);
	}
}
