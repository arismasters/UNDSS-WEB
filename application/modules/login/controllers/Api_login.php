<?php
// use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/My_Rest_Controller.php';

class Api_login extends My_Rest_Controller
{
    var $token;
    public function __construct()
    {
        parent::__construct();
        // $this->token = $this->validate_token($this->input->get_request_header('Authorization'));
        $this->load->model('user/users_model', 'user');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index_post()
    {
        $this->form_validation->set_rules('user_name', 'nama user', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        if ($this->form_validation->run() == false)
        {
            $res_data = array(
                'status_code' => REST_Controller::HTTP_BAD_REQUEST,
                'message' => $this->form_validation->error_string(),
                'data' => null
            );
            return $this->response($res_data);
        }
        else 
        {
            $password = md5($this->post('password'));
            $kondisi = array('user_name' => $this->post('user_name'));
            $q = $this->user->get($kondisi);
            if ($q->num_rows() > 0) {
                $user = $q->row();
                if ($user->password == $password)
                {
                    $res_data = array(
                        'status_code' => REST_Controller::HTTP_OK,
                        'message' => 'data found',
                        'data' => $user
                    );
                }
                else
                {
                    $res_data = array(
                        'status_code' => REST_Controller::HTTP_BAD_REQUEST,
                        'message' => 'wrong password',
                        'data' => null
                    );
                }

                return $this->response($res_data);
            }
            else 
            {
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_NOT_FOUND,
                    'message' => 'data not found',
                    'data' => null
                );
                return $this->response($res_data);
            }
        }
    }
}