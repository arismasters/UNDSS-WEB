<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Region extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->template->with_side_menu = 1;
    }

    public function index()
    {
        $data['region'] = null;
        $this->template->admin('region/index', $data);
    }
}