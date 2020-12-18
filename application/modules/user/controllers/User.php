<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array('user/users_model'));
        $this->template->with_side_menu = 1;
    }

    public function index()
    {
        $data['users'] = null;
        // $users = $this->users_model->get();
        // if ($users->num_rows() != 0) {
        //     $data['users'] = $users->result();
        // }
        $this->template->admin('user/index', $data);
    }

    // public function add()
    // {
    //     $data['base_api'] = base_url().'user/api_user';
    //     $data['method'] = "POST";
    //     $this->template->admin('user/form', $data);
    // }
    
    // public function edit($id=null)
    // {
    //     $data['base_api'] = base_url().'user/api_user';
    //     $data['method'] = "PUT";
    //     $data['user'] = null;
    //     $user = $this->users_model->get(array('user_id'=>$id));
    //     if ($user->num_rows() != 0) {
    //         $data['user'] = $user->row();
    //     }
    //     $this->template->admin('user/form_edit', $data);
    // }
    
    // public function password($id=null)
    // {
    //     $data['base_api'] = base_url().'user/api_user/password';
    //     $data['method'] = "PUT";
    //     $data['user'] = null;
    //     $user = $this->users_model->get(array('user_id'=>$id));
    //     if ($user->num_rows() != 0) {
    //         $data['user'] = $user->row();
    //     }
    //     $this->template->admin('user/form_password', $data);
    // }

}