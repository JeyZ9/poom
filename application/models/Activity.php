<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Model{
    private $table = 'activity';

    public function __construct(){
        parent::__construct();
    }

    public function findAll(){
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function findById($id = null){
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row_array();
    }

    public function create($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}