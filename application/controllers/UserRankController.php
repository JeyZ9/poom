<?php
define('BASEPATH') OR exit('No direct script access allowed');
class UserRankController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserRank');
	}

	public function index(){
		$data['query'] = $this->UserRank->findAll();
		echo json_encode($data);
	}

	public function getById($id){
		$data['query'] = $this->UserRank->findById($id);
		echo json_encode($data);
	}

	public function create(){
		$inputJSON = file_get_contents('php://input');
		$input = json_decode($inputJSON, true);

		$userId = $input['user_id'];
		$activityId = $input['activity_id'];
		$rankId = $input['rank_id'];

		$user = $this->User->find($userId);
		$activity = $this->Activity->findById($activityId);
		$rank = $this->UserRank->findById($rankId);

		if ($user == null || $activity == null || $rank == null){
			echo json_encode(['status' => 404, 'response' => ['message' => 'UserId or ActivityId or RankId not found']]);
			return;
		}else{
			$user_activity_data = [
				'user_id' => $userId,
				'activity_id' => $activityId,
				'rank_id' => $rankId
			];

			if($this->UserRank->create($user_activity_data)){
				echo json_encode(['status' => 200, 'response' => ['message' => 'Added UserRank Successfully']]);
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
		$rankId = $input['rank_id'];

		$user = $this->User->find($userId);
		$activity = $this->Activity->findById($activityId);
		$rank = $this->Activity->findById($rankId);

		if ($user == null || $activity == null || $rank == null){
			echo json_encode(['status' => 404, 'response' => ['message' => 'User or Activity or Rank not found']]);
			return;
		}else {
			$user_activity_data = [
				'user_id' => $userId,
				'activity_id' => $activityId,
				'rank_id' => $rankId
			];

			$this->UserRank->update($id, $user_activity_data);
			echo json_encode(['status' => 200, 'response' => ['message' => 'Updated UserRank Successfully']]);
		}
		// redirect('/')
	}

	public function delete($id){
		$this->UserRank->delete($id);
		echo json_encode(['status' => 200, 'response' => ['message' => 'Delete UserRank Successfully']]);
	}

}
