<?php

class Reports2Controller extends AppController {

    public $uses = array('Contact');
    public $components = array('RequestHandler');

    public function beforeFilter() {

		parent::beforeFilter();
	}
	
	public function index() {
        
    }
// Condition
    public function getConditionPieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_conditionPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	 public function crmreport_getConditionPieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_conditionPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _conditionPieData($show_group=null)
	{
		
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
      
        $conditions = array(
            'Contact.company_id' => $user_id,
			'Contact.modified >=' => $first_day_this_month,
			'Contact.modified <=' => $last_day_this_month
        );
       
        
        
        
        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.condition) as count, Contact.condition',
            'group' => 'Contact.condition'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['condition'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
    
// Year
    public function getYearPieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_yearPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getYearPieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_yearPieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _yearPieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
       
            $conditions = array(
                'Contact.company_id' =>$user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.year <>' => '0',
            );
       
        
        
        
        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.year) as count, Contact.year',
            'group' => 'Contact.year'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['year'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
    
// Make
    public function getMakePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_makePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getMakePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_makePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _makePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
      
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
            );
       
            
        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
              ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.make) as count, Contact.make',
            'group' => 'Contact.make DESC'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['make'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
    
// Model
    public function getModelPieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_modelPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getModelPieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_modelPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _modelPieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        
      
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
       
            
        $params = array(
            'conditions' => $conditions,
            'order' => array(
                    'count' => 'DESC'
             ),
            'limit' => 5,
            'fields' => 'COUNT(Contact.model) as count, Contact.model',
            'group' => 'Contact.model'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['model'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
    
// Condition Trade
    public function getConditionTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_conditionTradePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	 public function crmreport_getConditionTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_conditionTradePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _conditionTradePieData($show_group=null){
	
	
	$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
	$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		$group_id = $this->Auth->user('group_id');
        
		
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.condition_trade !=' => "", 'Contact.condition_trade <>' => null,
            );
        
            
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.condition_trade) as count, Contact.condition_trade',
            'group' => 'Contact.condition_trade'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['condition_trade'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	
	}
    
// Year Trade
    public function getYearTradePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_yearTradePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getYearTradePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_yearTradePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _yearTradePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.year_trade !=' => "", 'Contact.year_trade <>' => null , 'Contact.year_trade <>' => '0'  ,
            );
        
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.year_trade) as count, Contact.year_trade',
            'group' => 'Contact.year_trade'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['year_trade'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}

// Make Trade
    public function getMakeTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_makeTradePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	 public function crmreport_getMakeTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_makeTradePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
 	private function _makeTradePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
       
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.make_trade !=' => "", 'Contact.make_trade <>' => null,
            );
       
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.make_trade) as count, Contact.make_trade',
            'group' => 'Contact.make_trade'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['make_trade'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
 // Model Trade
    public function getModelTradePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_modelTradePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getModelTradePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_modelTradePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
    private function _modelTradePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.model_trade !=' => "", 'Contact.model_trade <>' => null, 'Contact.model_trade <>' => 'Any Model'    ,
            );
            
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.model_trade) as count, Contact.model_trade',
            'group' => 'Contact.model_trade'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['model_trade'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
	
// Unit Type
    public function getTypePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_typePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	 public function crmreport_getTypePieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_typePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _typePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
       
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.type !=' => "Any", 'Contact.type <>' => 'Any Category',
            );
        
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.type) as count, Contact.type',
            'group' => 'Contact.type'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['type'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
    
// Type Trade
    public function getTypeTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_typeTradePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getTypeTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_typeTradePieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	private function _typeTradePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
        $group_id = $this->Auth->user('group_id');
      
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'AND' => array(
					array('Contact.type_trade <>' =>  " "), 
					array('Contact.type_trade <>' => NULL),
					array('Contact.type_trade <>' => 'Any Category'), 
					array('Contact.type_trade <>' => "Any")
				),
            );
       
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.type_trade) as count, Contact.type_trade',
            'group' => 'Contact.type_trade'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['type_trade'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
    
// Unit Stock Number
    public function getStockNumPieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_stockNumPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getStockNumPieData($show_group=null) {
        $this->layout = null;
		$leads=$this->_stockNumPieData($show_group);
		$this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
	private function _stockNumPieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
       
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.stock_num <>' => "",
            );
      
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.stock_num) as count, Contact.stock_num',
            'group' => 'Contact.stock_num'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['stock_num'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
// Stock Number Trade
    public function getStockNumTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_stockNumTradePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	public function crmreport_getStockNumTradePieData($show_group=null) {
        $this->layout = null;
		
		$leads=$this->_stockNumTradePieData($show_group);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
	
	
	private function _stockNumTradePieData($show_group=null)
	{
		$user_id= $this->Auth->user('dealer_id');
		if(!is_null($show_group)&& $show_group=='all_builds'){
			$this->loadModel('DealerName');
			$dealer_info = $this->DealerName->findByDealer_id($user_id);
			$user_id=$this->DealerName->find('list',array('fields'=>'id,dealer_id','conditions'=>array('dealer_group'=>$dealer_info['DealerName']['dealer_group'])));
			
		
		}elseif(!is_null($show_group)&& is_numeric($show_group))
		{
			$user_id=$show_group;
		}
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
        $group_id = $this->Auth->user('group_id');
      
            $conditions = array(
                'Contact.company_id' => $user_id,
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month,
				'Contact.stock_num_trade !=' => "", 'Contact.stock_num_trade <>' => null,
            );
       
        $params = array(
            'conditions' => $conditions,
             'order' => array(
                    'count' => 'DESC'
             ),
        	'limit' => 5,
            'fields' => 'COUNT(Contact.stock_num_trade) as count, Contact.stock_num_trade',
            'group' => 'Contact.stock_num_trade'
        );
        $leads = $this->Contact->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Contact']['stock_num_trade'],
                (int) $lead[0]['count']
            );
        }
        $leads = array($final_data);
		return $leads;
	}
}
?>