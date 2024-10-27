<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActivityController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Activity');
        $this->load->model('User');
    }

    public function index(){
        $data['query'] = $this->Activity->findAll();
        echo json_encode($data);
    }

    public function getById($id){
        $data['query'] = $this->Activity->findById($id);
        echo json_encode($data);
    }

    public function create(){
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $userId = $input['user_id'];
        $user = $this->User->find($userId);
//		echo json_encode($user != null);
        
        if($user == null){
            echo json_encode(['status' => 404, 'response' => ['message' => 'UserId is not undefind']]);
            return;
        }else{
            $activity_data = [
                'name' => $input['name'],
                'description' => $input['description'],
                'count' => $input['count'],
                'date_time' => $input['date_time'],
                'is_closed' => $input['is_closed'],
                'major' => $input['major'],
                'user_id' => $userId
            ];

            if($this->Activity->create($activity_data)){
                echo json_encode(['status' => 200, 'response' => ['message' => 'Added Activity Successfully']]);
                return;
            }
        }
		echo json_encode(['status' => 409, 'response' => ['message' => 'error']]);
		return;
    }

    public function update($id){
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $activity_data = [
            'name' => $input['name'],
            'description' => $input['description'],
            'count' => $input['count'],
            'date_time' => $input['date_time'],
            'is_closed' => $input['is_closed'],
            'major' => $input['major'],
        ];

        $this->Activity->update($id, $activity_data);
        echo json_encode(['status' => 200, 'response' => ['message' => 'Updated Activity Successfully']]);

        // redirect('/')
    }

    public function delete($id){
        $this->Activity->delete($id);
        echo json_encode(['status' => 200, 'response' => ['message' => 'Delete Activity Successfully']]);
    }


}
