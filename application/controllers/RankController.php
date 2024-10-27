<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RankController extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Rank');
    }

    public function index(){
        $data['query'] = $this->Rank->findAll();
        echo json_encode($data);
    }

    public function getById($id){
        $data['query'] = $this->Rank->findById($id);
        echo json_encode($data);
    }

    public function create(){
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

        $rank_data = [
            'rank_name' => $input['rank_name'],
            'coin_name' => $input['coin_name']
        ];

        if($this->Rank->create($rank_data)){
            echo json_encode(['status' => 200, 'response' => ['message' => 'Added Rank Successfully']]);
            return;
        }

        echo json_encode(['status' => 409, 'response' => ['message' => 'error']]);


        

    }

    public function update($id){
        $inputJSON = file_get_contents('php://input');
        $input = json_decode($inputJSON, true);

		$rank_data = [
			'rank_name' => $input['rank_name'],
			'coin_name' => $input['coin_name']
		];

        $this->Rank->update($id, $rank_data);
        echo json_encode(['status' => 200, 'response' => ['message' => 'Updated Rank Successfully']]);

        // redirect('/')
    }

    public function delete($id){
        $this->Rank->delete($id);
        echo json_encode(['status' => 200, 'response' => ['message' => 'Delete Rank Successfully']]);
    }


}
