<?php
class LeadSourcesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
	}

	public function save_settings(){

		if ($this->request->is('post')) {
			$dealer_id = $this->Auth->user('dealer_id');
			$lead_sources = $this->LeadSource->find('first',array('conditions'=>array(
				'LeadSource.id'=> $this->request->data['source_id']
			)));
			$this->loadModel("LeadSourcesHide");

			if( $this->request->data['value'] == 'false' ){

				$hidden_sources_cnt = $this->LeadSourcesHide->find('count',array(
					'conditions'=>array('LeadSourcesHide.dealer_id'=>$dealer_id, 'LeadSourcesHide.name'=> $lead_sources['LeadSource']['name'])
				));
				if($hidden_sources_cnt == 0){
					$this->LeadSourcesHide->create();
					$this->LeadSourcesHide->save(array('LeadSourcesHide'=>array(
						'dealer_id' => $dealer_id,
						'name' => $lead_sources['LeadSource']['name']
					)));
				}
			}else{
				$this->LeadSourcesHide->deleteAll(array('LeadSourcesHide.dealer_id'=>$dealer_id, 'LeadSourcesHide.name'=> $lead_sources['LeadSource']['name'] ));
			}
		}
		$this->autoRender = false;
	}

	public function index(){
		$this->layout = "default_new";

		$lead_sources = $this->LeadSource->find('all',array('conditions'=>array(
			'LeadSource.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
		)));

		$this->set('lead_sources',$lead_sources);

		$this->loadModel("LeadSourcesHide");
		$hidden_sources = $this->LeadSourcesHide->find('list',array(
			'fields' => array("LeadSourcesHide.name", "LeadSourcesHide.name"),
			'conditions'=>array(
				'LeadSourcesHide.dealer_id'=> array($this->Auth->user('dealer_id'), 0),
			)
		));
		$this->set('hidden_sources',$hidden_sources);

		if ($this->request->is('post')) {
			$this->request->data['LeadSource']['dealer_id'] = $this->Auth->user('dealer_id');
			$this->LeadSource->create();
			if ($this->LeadSource->save($this->request->data)) {
				$this->Session->setFlash(__('The source has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
			 	$this->Session->setFlash(__('Unable to save source'), 'alert', array('class' => 'alert-error'));
			}
		}
	}
}
