<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Setting extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->template->with_side_menu = 1;
    }

    public function index()
    {
        $data['settings'] = null;
        $this->template->admin('setting/index', $data);
    }
}