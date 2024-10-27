<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserActivityController extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->model('UserActivity');
		$this->load->model('User');
		$this->load->model('Activity');
	}

	public function index(){
		$data['query'] = $this->UserActivity->findAll();
		echo json_encode($data);
	}

	public function getById($id){
		$data['query'] = $this->UserActivity->findById($id);
		echo json_encode($data);
	}

	public function create(){
		$inputJSON = file_get_contents('php://input');
		$input = json_decode($inputJSON, true);

		$userId = $input['user_id'];
		$activityId = $input['activity_id'];

		$user = $this->User->find($userId);
		$activity = $this->Activity->findById($activityId);

		if ($user == null || $activity == null){
			echo json_encode(['status' => 404, 'response' => ['message' => 'User or activity not found']]);
			return;
		}else{
			$user_activity_data = [
				'user_id' => $userId,
				'activity_id' => $activityId,
				'is_allowed' => $input['is_allowed'],
				'is_joined' => $input['is_joined']
			];

			if($this->UserActivity->create($user_activity_data)){
				echo json_encode(['status' => 200, 'response' => ['message' => 'Added UserActivity Successfully']]);
				return;
			}
		}



		echo json_encode(['status' => 409, 'response' => ['message' => 'error']]);
	}

	public function update($id){
		$inputJSON = file_get_contents('php://input');
		$input = json_decode($inputJSON, true);

		$userId = $input['user_id'];
		$activityId = $input['activity_id'];

		$user = $this->User->find($userId);
		$activity = $this->Activity->findById($activityId);

		if ($user == null || $activity == null){
			echo json_encode(['status' => 404, 'response' => ['message' => 'User or activity not found']]);
			return;
		}else {
			$user_activity_data = [
				'user_id' => $userId,
				'activity_id' => $activityId,
				'is_allowed' => $input['is_allowed'],
				'is_joined' => $input['is_joined']
			];

			$this->UserActivity->update($id, $user_activity_data);
			echo json_encode(['status' => 200, 'response' => ['message' => 'Updated UserActivity Successfully']]);
		}
		// redirect('/')
	}

	public function delete($id){
		$this->UserActivity->delete($id);
		echo json_encode(['status' => 200, 'response' => ['message' => 'Delete UserActivity Successfully']]);
	}
}
