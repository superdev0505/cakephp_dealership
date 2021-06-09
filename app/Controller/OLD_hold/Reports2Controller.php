<?php

class Reports2Controller extends AppController {

    public $uses = array('Contact');
    public $components = array('RequestHandler');

    public function index() {
        
    }
// Condition
    public function getConditionPieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.condition) as count, Contact.condition',
            'group' => 'Contact.condition DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Year
    public function getYearPieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.year) as count, Contact.year',
            'group' => 'Contact.year DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Make
    public function getMakePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                 'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.make) as count, Contact.make',
            'group' => 'Contact.make DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Model
    public function getModelPieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.model) as count, Contact.model',
            'group' => 'Contact.model DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Condition Trade
    public function getConditionTradePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		$group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.condition_trade) as count, Contact.condition_trade',
            'group' => 'Contact.condition_trade DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Year Trade
    public function getYearTradePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.year_trade) as count, Contact.year_trade',
            'group' => 'Contact.year_trade DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

// Make Trade
    public function getMakeTradePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
               'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.make_trade) as count, Contact.make_trade',
            'group' => 'Contact.make_trade DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
 
 // Model Trade
    public function getModelTradePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.model_trade) as count, Contact.model_trade',
            'group' => 'Contact.model_trade DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Unit Type
    public function getTypePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.type) as count, Contact.type',
            'group' => 'Contact.type DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Type Trade
    public function getTypeTradePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.type_trade) as count, Contact.type_trade',
            'group' => 'Contact.type_trade DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Unit Stock Number
    public function getStockNumPieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.stock_num) as count, Contact.stock_num',
            'group' => 'Contact.stock_num DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
    
// Stock Number Trade
    public function getStockNumTradePieData() {
        $this->layout = null;
		
		$stats_month = date('m');
		if( $this->Session->check("stats_month") ){
			$stats_month = $this->Session->read("stats_month");
		}
		$first_day_this_month = date('Y-m-01 00:00:00', strtotime(date("Y")."-".$stats_month."-01")); 
		$last_day_this_month  = date('Y-m-t 23:59:59', strtotime(date("Y")."-".$stats_month."-01"));
		
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id'),
				'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                'Contact.modified >=' => $first_day_this_month,
				'Contact.modified <=' => $last_day_this_month
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.stock_num_trade) as count, Contact.stock_num_trade',
            'group' => 'Contact.stock_num_trade DESC LIMIT 5'
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }
}
?>