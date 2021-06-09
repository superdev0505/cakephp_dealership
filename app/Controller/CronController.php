<?php
class CronController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->layout=null;
	}

	public function SendDailyRecapReport() {
		// Check the action is being invoked by the cron dispatcher 
		if (!defined('CRON_DISPATCHER')) { $this->redirect('/'); exit(); } 

		//no view
		$this->autoRender = false;
		$this->loadModel('RecapCronEmail');
		$recap_emails = $this->RecapCronEmail->find('all',array('order'=>'RecapCronEmail.email','conditions'=>array('RecapCronEmail.dealer_id'=>$this->Auth->user('dealer_id'))));

		App::import('Controller', 'DailyRecaps'); // mention at top
		$DailyRecaps = new DailyRecapsController;
		// Call a method from
		$DailyRecaps->all('','','','yes'); //create attachment

		return;
	}
}
?>