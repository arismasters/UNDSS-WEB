<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['base'] = true;
		$data['page'] = "login/index";
		
		$this->load->view('layout', $data);
	}
}
