<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "master";
		$data['page'] = "master/index";
		
		$this->load->view('layout', $data);
	}

	public function region()
	{
		$data['controller'] = $this;
		$data['menu'] = "master";
		$data['page'] = "master/region/index";
		
		$this->load->view('layout', $data);
	}

	public function sls_area()
	{
		$data['controller'] = $this;
		$data['menu'] = "master";
		$data['page'] = "master/sls_area/index";
		
		$this->load->view('layout', $data);
	}

	public function province_district()
	{
		$data['controller'] = $this;
		$data['menu'] = "master";
		$data['page'] = "master/province_district/index";
		
		$this->load->view('layout', $data);
	}

	public function threat()
	{
		$data['controller'] = $this;
		$data['menu'] = "master";
		$data['page'] = "master/threat/index";
		
		$this->load->view('layout', $data);
	}
}
