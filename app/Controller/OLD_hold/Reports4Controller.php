<?php

class Reports4Controller extends AppController {
    public $uses = array('Contact','User','Events','EventTypes','Events_users');
    public $components = array('RequestHandler');

    public function index() {
        
    }

    public function getEventStatusPieData() {
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
            'fields' => 'COUNT(Events.status) as count, Events.status',
            'group' => 'Events.status DESC LIMIT 5'
        );
        $leads = $this->Event->find('all', $params);
        $final_data = array();
        foreach ($leads as $lead) {
            $final_data[] = array(
                $lead['Events']['status'],
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

}

?>