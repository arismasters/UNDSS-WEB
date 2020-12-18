<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['base_api'] = base_url().'login/auth';
        $data['method'] = "POST";
        $this->template->site('login/index', $data);
    }

    public function auth()
    {
        $user_name = $this->input->post('user_name');
        $password = $this->input->post('password');
        
        $params=['user_name'=>$user_name, 'password'=>$password];
        $url_api = base_url().'login/api_login';
        $user = curl($url_api, "POST", $this->input->post());
        if ($user->status_code == 200) {
            // set session
            $session_data = array(
                'user_id' => $user->data->user_id,
                'user_name' => $user->data->user_name);
            $this->session->set_userdata($session_data);
        }
        echo json_encode($user);
    }

    public function out(){
        $this->session->sess_destroy();
        redirect();
    }
}