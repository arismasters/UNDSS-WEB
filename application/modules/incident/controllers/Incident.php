<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Incident extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->template->with_side_menu = 1;
    }

    public function index()
    {
        $data['incidences'] = null;
        $this->template->admin('incident/index', $data);
    }
}