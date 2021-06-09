<?php
class ManageTeamsController extends AppController {



	public function delete_team($team_id) {

		$this->ManageTeam->id = $team_id;
		$this->ManageTeam->delete();
		$this->redirect(array('action' => 'index'));
	}


	public function index() {

		$this->layout = "default_new";

		$this->ManageTeam->bindModel(array(
			'belongsTo'=>array('User'=>array(
				'foreignKey'=>false,
				'conditions'=> array("ManageTeam.floor_manager_id = User.id"),
				'fields' => array("User.id","User.first_name","User.last_name")
			)),
		));
		$ManageTeams = $this->ManageTeam->find('all',array('conditions'=>array(
			'ManageTeam.dealer_id'=> $this->Auth->user('dealer_id')
		)));
		//debug($ManageTeams);
		$this->set('ManageTeams',$ManageTeams);

		$this->loadModel("User");
		$users = $this->User->find('all',array(
			"order" => "User.first_name",
			'conditions'=>array(
			'User.dealer_id'=> $this->Auth->user('dealer_id'),
			'User.active'=> 1
		)));
		$user_list = array();
		$user_list_floor = array();
		$user_list_employee = array();
		foreach($users as $user){
			$user_list[ $user['User']['id'] ] = $user['User']['first_name']. " " .$user['User']['last_name'];
			if($user['User']['group_id'] == '4' || $user['User']['group_id'] == '2' || $user['User']['group_id'] == '12'){
				$user_list_floor[ $user['User']['id'] ] = $user['User']['first_name']. " " .$user['User']['last_name'];
			}
			if($user['User']['group_id'] == '3' || $user['User']['group_id'] == '10' || $user['User']['group_id'] == '11'){
				$user_list_employee[ $user['User']['id'] ] = $user['User']['first_name']. " " .$user['User']['last_name'];
			}

		}
		//debug($user_list);
		$this->set('user_list',$user_list);
		$this->set('user_list_floor',$user_list_floor);
		$this->set('user_list_employee',$user_list_employee);

		if ($this->request->is('post')) {
			//debug($this->request->data);
			$this->request->data['ManageTeam']['dealer_id'] = $this->Auth->user('dealer_id');
			$this->request->data['ManageTeam']['team_members']	= implode(",", $this->request->data['ManageTeam']['team_member']);

			if($this->request->data['ManageTeam']['id'] == ''){
				unset($this->request->data['ManageTeam']['id']);
				$this->ManageTeam->create();
				if($this->ManageTeam->save($this->request->data)){
					$this->redirect(array('action' => 'index'));
				}
			}else{
				if($this->ManageTeam->save($this->request->data)){
					$this->redirect(array('action' => 'index'));
				}
			}
		}else{

			if(isset(  $this->request->query['team_id'])){
				$ManageTeams_data = $this->ManageTeam->find('first',array('conditions'=>array(
					'ManageTeam.dealer_id'=> $this->Auth->user('dealer_id'),
					'ManageTeam.id'=> $this->request->query['team_id'],
				)));
				$this->request->data= $ManageTeams_data;
				$this->request->data['ManageTeam']['team_member'] = explode(",", $this->request->data['ManageTeam']['team_members']);

			}




		}




	}

}
