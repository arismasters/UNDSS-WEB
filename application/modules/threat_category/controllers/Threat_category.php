<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Threat_category extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->template->with_side_menu = 1;
    }

    public function index()
    {
        $data['threat_categories'] = null;
        $this->template->admin('threat_category/index', $data);
    }
}