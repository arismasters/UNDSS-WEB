<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "settings";
		$data['page'] = "settings/index";
		
		$this->load->view('layout', $data);
	}

	public function users()
	{
		$data['controller'] = $this;
		$data['menu'] = "settings";
		$data['page'] = "settings/users/index";
		
		$this->load->view('layout', $data);
	}

	public function profile()
	{
		$data['controller'] = $this;
		$data['menu'] = "settings";
		$data['page'] = "settings/profile/index";
		
		$this->load->view('layout', $data);
	}
}
