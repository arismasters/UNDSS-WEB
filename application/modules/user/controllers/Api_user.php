<?php
// use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/My_Rest_Controller.php';

class Api_user extends My_Rest_Controller
{
    var $token;
    public function __construct()
    {
        parent::__construct();
        // $this->token = $this->validate_token($this->input->get_request_header('Authorization'));
        $this->load->model('user/users_model', 'user');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index_get()
    {
        if ((int) $this->get('id') > 0)
        {
            $kondisi = array('user_id' => $this->get('id'));
            $q = $this->user->get($kondisi);
        }
        else
        {
            $q = $this->user->get();
        }

        if ($q->num_rows() <= 0)
        {
            $data = array(
                'status_code' => REST_Controller::HTTP_NOT_FOUND,
                'message' => 'data_not_found',
                'data' => null
            );
        } 
        else 
        {
            if ((int) $this->get('id') > 0) 
            {
               $result = $q->row();
            }
            else
            {
                $result = $q->result();
            }
            $data = array(
                'status_code' => REST_Controller::HTTP_OK,
                'message' => 'data_found',
                'data' => $result
            );
        }

        return $this->response($data);
    }

    public function index_post()
    {
        $this->form_validation->set_rules('user_name', 'nama user', 'trim|required');
        $this->form_validation->set_rules('name', 'nama user', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'konfirmansi password', 'trim|required|matches[password]');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        $this->form_validation->set_message('matches', '{field} tidak sama!');
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
            $req_data = array(
                'user_name' => $this->post('user_name'),
                'name' => $this->post('name'),
                'password' => md5($this->post('password')),
                'created_at' => date('Y-m-d H:i:s')
            );
            try {
                $this->user->insert($req_data);
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_OK,
                    'message' => 'create_user_success',
                    'data' => $req_data
                );
            } catch (Exception $e) {
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => null
                );
            }
            return $this->response($res_data);
        }
    }

    public function index_put()
    {
        $request = $this->put(null, true);
        
        $this->form_validation->set_data($request);
        $this->form_validation->set_rules('user_name', 'nama user', 'trim|required');
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
            $kondisi = array('user_id' => $this->put('id'));
            $req_data = array(
                'user_name' => $this->put('user_name'),
                'name' => $this->put('name'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            try {
                $this->user->update($kondisi, $req_data);
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_OK,
                    'message' => 'update_data_success',
                    'data' => null
                );
                return $this->response($res_data);
            } catch (Exception $e) {
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => $this->put()
                );
                return $this->response($res_data);
            }
        }
    }

    public function index_delete()
    {
        if ((int) $this->input->get('id', true) > 0)
        {
            try {
                $kondisi = array('user_id' => $this->input->get('id', true));
                $req_data = array(
                    'deleted_at' => date('Y-m-d H:i:s')
                );
                $this->user->update($kondisi, $req_data);
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_OK,
                    'message' => 'delete_data_success',
                    'data' => null
                );
                return $this->response($res_data);
            } catch (Exception $e) {
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => null
                );
                return $this->response($res_data);
            }
        }
        else
        {
            $res_data = array(
                'status_code' => REST_Controller::HTTP_BAD_REQUEST,
                'message' => 'data_not_found',
                'data' => null
            );
            return $this->response($res_data);
        }
    }

    public function password_put()
    {
        $request = $this->put(null, true);
        $this->form_validation->set_data($request);
        
        $this->form_validation->set_rules('password_lama', 'password lama', 'trim|required');
        $this->form_validation->set_rules('password_baru', 'password baru', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'konfirmansi password', 'trim|required|matches[password_baru]');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong!');
        $this->form_validation->set_message('matches', '{field} tidak sama!');

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
            
            try {
                // cek password lama
                $kondisi = array('password' => md5($this->put('password_lama')), 'user_id'=>$this->put('id'));
                $q = $this->user->get($kondisi);
                if ($q->num_rows() <= 0)
                {
                    $res_data = array(
                        'status_code' => REST_Controller::HTTP_NOT_FOUND,
                        'message' => 'password_salah',
                        'data' => null
                    );
                    return $this->response($res_data);
                }
                else
                {
                    $kondisi = array('user_id' => $this->put('id'));
                    $req_data = array(
                        'password' => md5($this->put('password_baru')),
                        'updated_at' => date('Y-m-d H:i:s')
                    );
                    $this->user->update($kondisi, $req_data);
                    
                    $res_data = array(
                        'status_code' => REST_Controller::HTTP_OK,
                        'message' => 'update_password_success',
                        'data' => null
                    );
                    return $this->response($res_data);
                }
            } catch (Exception $e) {
                $res_data = array(
                    'status_code' => REST_Controller::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => $e->getMessage(),
                    'data' => $this->put()
                );
                return $this->response($res_data);
            }
        }        
    }
}