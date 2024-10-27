<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserRole extends CI_Model {

    private $table = 'user_role';

    public function __construct() {
        parent::__construct();
    }

    // Assign a role to a user
    public function assignRole($user_id, $role_id) {
        $data = [
            'user_id' => $user_id,
            'role_id' => $role_id
        ];
        return $this->db->insert($this->table, $data); // Returns true on success
    }
}
