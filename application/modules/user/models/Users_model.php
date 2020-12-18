<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model
{
    var $tbl_name = "users";
    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }

    public function get($kondisi=null, $order_col=null, $order_type=null, $limit=null, $start=null, $all=null) // kondisi = array()
    {
        $this->db->select('*');
        $this->db->from($this->tbl_name);
        if (is_null($all)){
            $this->db->where(array('deleted_at'=> NULL));
        }
        if (!is_null($kondisi)){
            $this->db->where($kondisi);
        }
        if (!is_null($order_col)){
            $this->db->order_by($order_col, $order_type);
        }

        if (!is_null($limit)){
            $this->db->limit($limit, $start);
        }
        return $this->db->get();
    }

    public function insert($data){
        $this->db->insert($this->tbl_name, $data);
    }
 
    public function get_insert_id($data){
       $this->db->insert($this->tbl_name, $data);
       return $this->db->insert_id();
    }

    public function update($kondisi, $data){
        $this->db->where($kondisi);
        $this->db->update($this->tbl_name, $data);
    }
 
    public function delete($kondisi){
      $this->db->where($kondisi);
      $this->db->delete($this->tbl_name);
    }
}