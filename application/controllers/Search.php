<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "search";
		$data['page'] = "search/index";

		$data['items'] = json_decode(json_encode(array(
			array(
				'title' => 'Shooting Inncident',
				'description' => 'Description of this incindent, Lorem ipsum dolor sit amet, Description of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit amet.',
				'number' => 'Act /UU-01-1970',
				'status' => 'Available'
			),
			array(
				'title' => 'Shooting Inncident',
				'description' => 'Description of this incindent, Lorem ipsum dolor sit amet, Description of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit amet.',
				'number' => 'Act /UU-01-1970',
				'status' => 'Available'
			),
			array(
				'title' => 'Shooting Inncident',
				'description' => 'Description of this incindent, Lorem ipsum dolor sit amet, Description of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit amet.',
				'number' => 'Act /UU-01-1970',
				'status' => 'Obsolete'
			),
			array(
				'title' => 'Shooting Inncident',
				'description' => 'Description of this incindent, Lorem ipsum dolor sit amet, Description of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit ametDescription of this incindent, Lorem ipsum dolor sit amet.',
				'number' => 'Act /UU-01-1970',
				'status' => 'Obsolete'
			),
		), FALSE));
		
		$this->load->view('layout', $data);
	}
}
