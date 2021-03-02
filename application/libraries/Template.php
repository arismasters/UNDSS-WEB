<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Template {
    protected $_ci;
    var $token;
    var $role = null;
    var $site_name = null;
    var $site_title = null;
    var $site_logo = null;
    var $meta_keywords = null;
    var $meta_description = null;
    var $phone = null;
    var $sosmed = null;
    var $with_side_menu = null;
    function __construct()
    {
      $this->_ci =&get_instance();
    }
    
    function admin($view_page, $data=null)
    {
      // $this->_ci->my_lib->cekAuth();
      // $this->token = $this->_ci->my_lib->validate_token($this->_ci->session->userdata('token'));
      // $this->user_bidang = $this->_ci->my_lib->user_bidang($this->token->id);
      // $url_api = base_url().'setting/api_setting';
      // $site = curl( $url_api);
      // if ($site->status_code == 200) {
      //   $this->site_title = $site->data[0]->title;
      //   $this->meta_keywords = $site->data[0]->meta_keywords;
      //   $this->meta_description = $site->data[0]->meta_description;
      //   $this->site_logo = base_url().$site->data[0]->icon_url.'/'.$site->data[0]->icon;
      // }
      $data['_header']=$this->_ci->load->view('adm/header', $data, true);
      $data['_side_menu']=$this->_ci->load->view('adm/side_menu', $data, true);
      $data['_content'] = $this->_ci->load->view($view_page, $data, true);
      $this->_ci->load->view('adm/index', $data);
    }

    public function site($view_page, $data=null)
    {
      $url_api = base_url().'setting/api_setting';
      // $site = curl( $url_api);
      // if ($site->status_code == 200) {
      //   $this->site_title = $site->data[0]->title;
      //   $this->meta_keywords = $site->data[0]->meta_keywords;
      //   $this->meta_description = $site->data[0]->meta_description;
      //   $this->phone = $site->data[0]->phone;
      //   $this->site_logo = base_url().$site->data[0]->icon_url.'/'.$site->data[0]->icon;
      // }
      
      // $url_api = base_url().'sosmed/api_sosmed';
      // $medsos = curl( $url_api);
      // if ($medsos->status_code == 200) {
      //   $this->sosmed = $medsos->data;
      // }
      
      $data['_header']=$this->_ci->load->view('site/header', $data, true);
      $data['_content'] = $this->_ci->load->view($view_page, $data, true);
      $data['_footer'] = $this->_ci->load->view('site/footer', $data, true);
      $this->_ci->load->view('site/index', $data);
    }
  }