<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array('user/users_model'));
        $this->template->with_side_menu = 0;
    }

    public function index()
    {
        $data['users'] = null;
        // $users = $this->users_model->get();
        // if ($users->num_rows() != 0) {
        //     $data['users'] = $users->result();
        // }
        $this->template->admin('dashboard/index', $data);
    }
}