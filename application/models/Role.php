<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Model {

    private $table = 'roles';

    public function __construct() {
        parent::__construct();
    }

    // Find role by ID
    public function find($role_id) {
        $query = $this->db->get_where($this->table, ['id' => $role_id]);
        return $query->row_array(); // Returns the role as an associative array if found, otherwise null
    }
}
