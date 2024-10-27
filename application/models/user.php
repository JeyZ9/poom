<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    private $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function findAll(){
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id(); 
    }

    public function find($user_id) {
        $query = $this->db->get_where($this->table, ['id' => $user_id]);
        return $query->row_array(); 
    }

    public function findByEmail($email){
        $query = $this->db->get_where($this->table, ['email' => $email]);
        return $query->row_array();
    }

    public function updateUser($userId, $data){
        $this->db->where('id', $userId);
        return $this->db->update($this->table, $data);
    }
}
