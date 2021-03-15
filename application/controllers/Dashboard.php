<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "dashboard";
		$data['menu_collapsed'] = true;
		$data['page'] = "dashboard/index";
		
		$this->load->view('layout', $data);
	}
}
