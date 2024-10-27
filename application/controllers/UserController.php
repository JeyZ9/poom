<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use Firebase\JWT\JWT;

class UserController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('UserRole');
        $this->load->model('Role');
        $this->load->helper('jwt_helper');
        $this->load->library('session');
    }

    // private $jwt_key = "00f8c32d772955d4f790f0f67eb3ea16916a07e4d21e4cb2553cd317225b32e5";

    public function index()
    {
        $data['query'] = $this->User->findAll();

        echo json_encode($data);
    }

    public function register()
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $student_id = $input['student_id'];
        $name = $input['name'];
        $email = $input['email'];
        $password = $input['password'];
        $confirm_password = $input['confirm_password'];
        $role_id = $input['role_id'];


        if ($password != $confirm_password) {
            $response = [
                'errors' => 409,
                'message' => 'Password is not match'
            ];
            echo json_encode(['status' => 409, 'response' => $response]);
            return;
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $role = $this->Role->find($role_id);
        if (!$role) {
            echo json_encode(['status' => 400, 'response' => ['message' => 'Invalid Role ID']]);
            return;
        }

        $user_data = [
            'student_id' => $student_id,
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password
        ];

        $userId = $this->User->save($user_data);
        if (!$userId) {
            echo json_encode(['status' => 500, 'response' => ['message' => 'User registration failed']]);
            return;
        }

        $this->UserRole->assignRole($userId, $role_id);

        
    }

    public function login()
    {
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        if (!isset($input['email']) || !isset($input['password'])) {
            echo json_encode(['status' => 400, 'response' => ['message' => 'Email and password are required']]);
            return;
        }

        $email = $input['email'];
        $password = $input['password'];

        $user = $this->User->findByEmail($email);
        if (!$user) {
            echo json_encode(['status' => 401, 'response' => ['message' => 'User not found']]);
            return;
        }

        if (!password_verify($password, $user['password'])) {
            echo json_encode(['status' => 401, 'response' => ['message' => 'Invalid password']]);
            return;
        }

        $iat = time();
        $exp = $iat + 3600;

        $payload = [
            "iss" => "YourIssuer",
            "aud" => "YourAudience",
            "sub" => $user['id'],
            "iat" => $iat,
            "exp" => $exp,
            "email" => $user['email'],
        ];

        $token = JwtHelper::generate_jwt($payload);

        echo json_encode(['status' => 200, 'response' => ['message' => 'Login Successful', 'token' => $token]]);
    }

    public function update($id){
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $student_id = $input['student_id'];
        $name = $input['name'];
        $email = $input['email'];
        $password = $input['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $existingUser = $this->User->findByEmail($email);

        if ($existingUser && $existingUser->id != $id) {
            $this->session->set_flashdata('error', 'Email already in use. Please choose a different one.');
            redirect('UserController/edit/' . $id);
        } else {
            $user_data = [
                'student_id' => $student_id,
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password,
            ];

            $this->User->updateUser($id, $user_data);
            redirect('UserController'); 
        }
    }
    
    

}
