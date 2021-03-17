<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
	public function index()
	{
		$data['controller'] = $this;
		$data['menu'] = "reports";
		$data['page'] = "reports/index";
		$data['items'] = json_decode(json_encode(array(
			array(
				'date' => '1 January 2021',
				'month' => 'January 2021',
				'hours' => 'Night Time',
				'region' => 'Papua',
				'sls_area' => 'Papua & West Papua',
				'province' => 'Papua Province',
				'district' => 'Mimika',
				'specific_location' => 'Banti Helmet in Tembagapura',
				'threat' => 'Armed Conflict'
			),
			array(
				'date' => '1 January 2021',
				'month' => 'January 2021',
				'hours' => 'Night Time',
				'region' => 'Papua',
				'sls_area' => 'Papua & West Papua',
				'province' => 'Papua Province',
				'district' => 'Mimika',
				'specific_location' => 'Banti Helmet in Tembagapura',
				'threat' => 'Armed Conflict'
			),
			array(
				'date' => '1 January 2021',
				'month' => 'January 2021',
				'hours' => 'Night Time',
				'region' => 'Papua',
				'sls_area' => 'Papua & West Papua',
				'province' => 'Papua Province',
				'district' => 'Mimika',
				'specific_location' => 'Banti Helmet in Tembagapura',
				'threat' => 'Armed Conflict'
			),
			array(
				'date' => '1 January 2021',
				'month' => 'January 2021',
				'hours' => 'Night Time',
				'region' => 'Papua',
				'sls_area' => 'Papua & West Papua',
				'province' => 'Papua Province',
				'district' => 'Mimika',
				'specific_location' => 'Banti Helmet in Tembagapura',
				'threat' => 'Armed Conflict'
			),
			array(
				'date' => '1 January 2021',
				'month' => 'January 2021',
				'hours' => 'Night Time',
				'region' => 'Papua',
				'sls_area' => 'Papua & West Papua',
				'province' => 'Papua Province',
				'district' => 'Mimika',
				'specific_location' => 'Banti Helmet in Tembagapura',
				'threat' => 'Armed Conflict'
			),
		), FALSE));

		$this->load->view('layout', $data);
	}
}
