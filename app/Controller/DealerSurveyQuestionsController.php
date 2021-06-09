<?php
class DealerSurveyQuestionsController extends AppController {
	
	
	public $uses = array('Survey', 'Question','DealerSurveyQuestion');   	
	
	
	public function beforeFilter()
	{
		parent::beforeFilter();	
	}
	
	public function index()
	{
		$this->layout = 'default_new';
		$dealer_id = $this->Auth->user('dealer_id');
		$survey_ids = array(2,3);
		$this->Survey->bindModel(array('hasMany' => array('Question' => array('conidtions' => array('Question.del_status' =>'no')))));
		$surveys = $this->Survey->find('all',array('conditions' => array('Survey.id' =>$survey_ids)));
		$this->set(compact('surveys'));
		$dealer_survey_questions = $this->DealerSurveyQuestion->find('list',array('fields' =>'id,question_id','conditions' => array('dealer_id' => $dealer_id)));
		$this->set(compact('dealer_survey_questions'));
		$question_sequence = $this->DealerSurveyQuestion->find('list',array('fields' =>'question_id,q_order','conditions' => array('dealer_id' => $dealer_id)));
		$this->set(compact('question_sequence'));
	}
	
	public function survey_question_action()
	{
		$this->layout = 'ajax';
		if($this->request->is('post')){
			$dealer_id = $this->Auth->user('dealer_id');
			$data = $this->request->data;
			$data['dealer_id'] = $dealer_id;
			$action = $data['action'];                                                          
			if($action =='delete'){
				$this->DealerSurveyQuestion->deleteAll(array('question_id' => $data['question_id'],'dealer_id' => $dealer_id));
			}elseif($action == 'add'){
				$this->DealerSurveyQuestion->save($data);
				echo $this->DealerSurveyQuestion->id;
			}
			
		}
		die;
	}
	

}