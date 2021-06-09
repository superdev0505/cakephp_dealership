<?php

class Reports3Controller extends AppController {

    public $uses = array('Contact');
    public $components = array('RequestHandler');

    public function index() {
        
    }

    public function getMainLeads() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'Contact.created_date_short, COUNT(Contact.created_date_short) as count',
            'group' => 'Contact.created_date_short'
        );
        $leads = $this->Contact->find('all', $params);
        $months = array(
            '01' => 'Jan',
            '02' => 'Feb',
            '03' => 'Mar',
            '04' => 'Apr',
            '05' => 'May',
            '06' => 'Jun',
            '07' => 'Jul',
            '08' => 'Aug',
            '09' => 'Sep',
            '10' => 'Oct',
            '11' => 'Nov',
            '12' => 'Dec'
        );
        $final_data = array();
        foreach ($leads as $lead) {
            $month = $months[substr($lead['Contact']['created_date_short'], 0, 2)];
            $day = substr($lead['Contact']['created_date_short'], 2, 2);
            $year = substr($lead['Contact']['created_date_short'], 6, 4);

            $final_data[] = array(
                $day . '-' . $month . '-' . $year,
                (int) $lead[0]['count'],
            );
        }

        $leads = array($final_data);
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getConditionPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getYearPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getMakePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
            'fields' => 'COUNT(Contact.make) as count, Contact.make',
            'group' => 'Contact.make'
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

    public function getModelPieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getConditionTradePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getYearTradePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getMakeTradePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

    public function getModelTradePieData() {
        $this->layout = null;
        $group_id = $this->Auth->user('group_id');
        if ($group_id == 3) {
            $conditions = array(
                'Contact.company_id' => $this->Auth->user('dealer_id')
            );
        } elseif ($group_id == 1) {
            $conditions = array(
                '1=1'
            );
        }
        $params = array(
            'conditions' => $conditions,
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
        $this->set('json_data', $leads);
        $this->render('/Elements/ajaxreturn');
    }

}

?>