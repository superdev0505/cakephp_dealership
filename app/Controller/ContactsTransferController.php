<?php

class ContactsTransferController extends AppController {

    public $uses = array('Contact', 'History', 'ContactStatus', 'Deal', 'User', 'Event', 'EventType','Inventory','InventoryOem');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('lead_push', 'lead_push_success');
    }


    public function ower_change($contact_id) {
        $this->layout = 'ajax';

        $contact = $this->Contact->find('first', array('recursive' => -1, 'conditions' => array('Contact.id'=>$contact_id)));
        $this->set('contact', $contact);

        //debug($contact);

        $users = $this->User->find('list', array('recursive'=>-1, 'order' =>'User.first_name', 'conditions'=>array('User.id !=' =>  $contact['Contact']['owner_id'] ,'User.group_id <>'=>array(6,7,8),  'User.active'=>1, 'User.dealer_id'=> $this->Auth->user('dealer_id') )));
        $this->set('users', $users);
        //debug($spersons);

        $group = $this->Auth->user('group_id');
        $this->set('group', $group);

        if ($this->request->is('post')) {


			$this->Contact->saveFirstModified($contact);
            //debug($this->request->data);
            $users = $this->User->find("first", array('recursive' => -1,'conditions'=>array('User.id'=> $this->request->data['Contact']['user_id'] )));
            //debug($users);
            //Update Contact
            $this->Contact->updateAll(
                array(
                    'Contact.notes' => "'".$this->request->data['Contact']['note']."'",
                    'Contact.owner' => "'".$users['User']['first_name']." ".$users['User']['last_name']."'",
                    'Contact.owner_id' => "'".$users['User']['id']."'",
                ),
                array('Contact.id' => $this->request->data['Contact']['contact_id'])
            );

            //Adding history

            $history_data['user_id'] = $contact['Contact']['user_id']; // for change log
            $history_data['changed_by'] = $this->Auth->user('id'); // for change log

            $history_data['contact_id'] = $contact['Contact']['id'];
            $history_data['sperson'] = $contact['Contact']['sperson'];
            $history_data['cond'] = $contact['Contact']['condition'];
            $history_data['year'] = $contact['Contact']['year'];
            $history_data['make'] = $contact['Contact']['make'];
            $history_data['model'] = $contact['Contact']['model'];
            $history_data['type'] = $contact['Contact']['type'];
            $history_data['sales_step'] = $contact['Contact']['sales_step'];
            $history_data['status'] = $contact['Contact']['status'];
            $history_data['modified'] = date('D - M d, Y g:i A', strtotime($contact['Contact']['modified']) );
            $history_data['created'] = $contact['Contact']['modified'];
            $history_data['comment'] = $contact['Contact']['notes']." <br> - Originator: ".$contact['Contact']['owner']." - ".$contact['Contact']['owner_id'];
            $history_data['form_used'] = $contact['Contact']['form_used'];

            $history_data['h_type'] = "Originator Change";
            $history = array(
                'History' => $history_data
            );
            $this->History->create();
            $this->History->save($history);




            $this->requestAction('manage_cache/clear_contact_cache/'.$this->request->data['Contact']['contact_id']);



        }



    }




    public function lead_push_success() {
        $this->layout='default_mobile';
    }

    public function send_email_alert_leadpush($pusher, $contact_id, $user_details){

        $contact_info = $this->Contact->find('first', array('recursive' => -1,'conditions' => array('Contact.id' => $contact_id )));

        //Send Email Alert
        try {
            $emailData = "Dealer Name: ".$contact_info['Contact']['company']." <br>";
            $emailData .= "Source: ".$contact_info['Contact']['source']." <br>";
            $emailData .= "Dealer ID: ".$contact_info['Contact']['company_id']." <br>";
            $emailData .= "ID: ".$contact_info['Contact']['id']." <a href='https://app.dealershipperformancecrm.com/contacts/leads_main/view/".$contact_info['Contact']['id']."' target='_blank' >(Open)</a><br>";
            $emailData .= "Name: ".$contact_info['Contact']['first_name']." ".$contact_info['Contact']['last_name']." <br>";
            $emailData .= "Address: ".$contact_info['Contact']['address'].", ".$contact_info['Contact']['city'].", ".$contact_info['Contact']['state'].", ".$contact_info['Contact']['zip']." <br>";
            $emailData .= "Mobile: ".$contact_info['Contact']['mobile']." <br>";
            $emailData .= "Phone: ".$contact_info['Contact']['phone']." <br>";
            $emailData .= "Work number: ".$contact_info['Contact']['work_number']." <br>";

            $emailData .= "Email: ".$contact_info['Contact']['email']." <br>";
            $emailData .= "Year: ".$contact_info['Contact']['year']." <br>";
            $emailData .= "Make: ".$contact_info['Contact']['make']." <br>";
            $emailData .= "Model: ".$contact_info['Contact']['model']." <br>";


            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail();
            $email->config('sender');
            $email->viewVars(array(
                'emailData'=>$emailData,
                'username'=>$user_details['User']['full_name'],
                'pusher' =>  $pusher,
                'contact_id'=>$contact_info['Contact']['id'],
                'title'=>"",
                'start'=>"",
                'status'=>""
            ));


            $email->replyTo("sender@dp360crm.com");

            // debug($pusher);
            // debug($contact_info);
            // debug($user_details);

            $email->template('move_lead_message')
                ->emailFormat('html')
                ->subject("New Lead pushed to ".$user_details['User']['full_name'])
                ->from("sender@dp360crm.com")
                ->to($user_details['User']['email'])
                //->to("russel@dp360crm.com")
                ->bcc(array('andrew@dp360crm.com','russel@dp360crm.com'))
                //->bcc(array('russel@dp360crm.com'))
                ->send();

        }catch (Exception $e) {

        }
    }

    public function lead_push()
    {
        $this->layout = 'default_mobile';

        $key = $this->request->query['key'];
        $ref = $this->request->query['ref'];
        $contact_id = base64_decode($key);

        $location_transfer = $this->requestAction("dealer_settings/get_settings/location_transfer");
        $this->set('location_transfer', $location_transfer);

        $dealer_ids = $this->get_dealer_ids();
        $this->set('dealer_ids', $dealer_ids);

        $this->loadModel('LeadpushHotlink');
        //Hot link validation
        $hotlink = $this->LeadpushHotlink->find('first', array('conditions' => array('LeadpushHotlink.ref'=>$ref) ));

        //debug($hotlink);
        $this->set('hotlink', $hotlink);

        if(empty($hotlink)){

            $this->Contact->unbindModel(array(
                'hasMany'=>array('Deal'),
            ));
            $contact = $this->Contact->find('first', array('recursive' => -1,'conditions' => array('Contact.id' => $contact_id )));
            $this->set('contact',$contact);

            $current_dealer_id = $contact['Contact']['company_id'];

            //Check the Dealer Setting for pushing leads to Managers
            $this->loadModel('DealerSetting');
            $add_mgr_group_to_lead_push_options = $this->DealerSetting->get_settings('add_mgr_group_to_lead_push_options', $this->Auth->user('dealer_id'));

            if($add_mgr_group_to_lead_push_options == 'On'){
                $group_ids = array(8);
            }else{
                $group_ids = array(6,7,8);
            }

            $users = $this->User->find("list", array('conditions'=>array(
                'User.dealer_id'=>$current_dealer_id,
                'User.group_id <> '=> $group_ids,
                'User.active'=>1,
                'User.id <>'=>$contact['Contact']['user_id'],
            )));
            $this->set('users',$users);

            $all_users = $this->User->find("list", array('conditions'=>array(
                'User.dealer_id'=>$current_dealer_id,
                'User.active'=>1
            )));
            $this->set('all_users',$all_users);

            if ($this->request->is('post')) {

                $this->loadModel("User");
                $user_details = $this->User->find('first',array('recursive' => -1,'conditions'=>array('User.id'=> $this->request->data['Contact']['user_id'] )));

                $this->_move_contact_to_user_hotlink($user_details, $contact_id,  $this->request->data['Contact']['notes']);

                $this->LeadpushHotlink->create();
                $this->LeadpushHotlink->save(array('LeadpushHotlink'=>array(
                    'ref'=>$ref
                )));

                //get pusher
                $pusher = $contact['Contact']['sperson'];
                if( isset($this->request->data['Contact']['user_id_from']) ){
                    $pusher_user_details = $this->User->find('first',array('recursive' => -1,'conditions'=>array('User.id'=> $this->request->data['Contact']['user_id_from'] )));
                    $pusher = $pusher_user_details['User']['full_name'];
                }

                //Send Email alert
                $this->send_email_alert_leadpush($pusher, $contact_id , $user_details);

                // CLEAR CACHE ON EDIT LEAD
                $this->requestAction('manage_cache/refresh/'.$user_details['User']['dealer_id']);
                $this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);

                $this->redirect(array('action' => 'lead_push_success'));
            }

        }

    }

    private function _move_contact_to_user_hotlink($user_details, $contact_id, $note){

        //History Variable
        $timezone = $user_details['User']['zone'];
        date_default_timezone_set($timezone);
        $datetimetext = date('Y-m-d H:i:s');

        //Save history for user move
        $c_d =  $this->Contact->find('first',array('recursive'=>-1,'fields'=>array(),'conditions' => array(
            'Contact.id'=>$contact_id
        )));

		$this->Contact->saveFirstModified($c_d);

        $old_data = $c_d;
        $history_data = array();
        $history_data['user_id'] = $user_details['User']['id']; // for change log
        $history_data['changed_by'] = $user_details['User']['id'];
        $history_data['contact_id'] = $old_data['Contact']['id'];
        $history_data['sperson'] = $old_data['Contact']['sperson'];
        $history_data['cond'] = $old_data['Contact']['condition'];
        $history_data['year'] = $old_data['Contact']['year'];
        $history_data['make'] = $old_data['Contact']['make'];
        $history_data['model'] = $old_data['Contact']['model'];
        $history_data['type'] = $old_data['Contact']['type'];
        $history_data['sales_step'] = $old_data['Contact']['sales_step'];
        $history_data['status'] = $old_data['Contact']['status'];
        $history_data['modified'] = date('D - M d, Y g:i A');
        $history_data['created'] = $datetimetext;
        $history_data['comment'] = "Leads Pushed to ".$user_details['User']['full_name']." #".$user_details['User']['id']." from ".$old_data['Contact']['sperson']." #".$old_data['Contact']['user_id']." - ".$note;
        $history_data['h_type'] = "Staff Transfer";
        $history = array(
            'History' => $history_data
        );
        $this->History->create();
        $this->History->save($history);

        $is_gsm =0;


        if($old_data['Contact']['owner'] == ''){

            //Update Contact
            $owner_match = $this->_find_originator($user_details,$old_data); //Look for originator in the other location so we can keep originator
            $this->Contact->updateAll(
                array(
                    'Contact.user_id' => "'".$user_details['User']['id']."'",
                    'Contact.owner_id' => "'".$owner_match['User']['id']."'",

                    'Contact.owner' =>   "'".$owner_match['User']['full_name']."'",
                    'Contact.sperson' => "'".$user_details['User']['full_name']."'",

                    'Contact.staff_transfer' => "'1'",
                    'Contact.location_modified' => "'".$old_data['Contact']['modified']."'",
                    'Contact.is_gsm' => "'".$is_gsm."'"
                ),
                array('Contact.id' => $contact_id)
            );

        }else{

            //Update Contact
            $this->Contact->updateAll(
                array(
                    'Contact.user_id' => "'".$user_details['User']['id']."'",
                    'Contact.sperson' => "'".$user_details['User']['full_name']."'",
                    'Contact.staff_transfer' => "'1'",
                    'Contact.location_modified' => "'".$old_data['Contact']['modified']."'",
                    'Contact.is_gsm' => "'".$is_gsm."'"
                ),
                array('Contact.id' => $contact_id)
            );

        }



        App::uses('Sanitize', 'Utility');




        //Update event
        $this->Event->updateAll(
            array(
                'Event.user_id' => "'".$user_details['User']['id']."'",
            ),
            array('Event.contact_id' => $contact_id)
        );

        //Update Deal
        $this->Deal->updateAll(
            array(
                'Deal.user_id' => "'".$user_details['User']['id']."'",
                'Deal.sperson' => "'".$user_details['User']['full_name']."'",
                'Deal.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
                'Deal.company_id' => "'".$user_details['User']['dealer_id']."'"
            ),
            array('Deal.contact_id' => $contact_id)
        );



        //Update lead sold table
        $this->loadModel('LeadSold');
        $sold_leads_count = $this->LeadSold->find('count', array('conditions' => array('LeadSold.contact_id'=>$contact_id)));
        if($sold_leads_count != 0){

            $this->LeadSold->updateAll(
                array(
                    'LeadSold.user_id' => "'".$user_details['User']['id']."'",
                //    'LeadSold.owner' => "'".$user_details['User']['full_name']."'",
                    'LeadSold.sperson' => "'".$user_details['User']['full_name']."'",
                    'LeadSold.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
                    'LeadSold.company_id' => "'".$user_details['User']['dealer_id']."'",
                ),
                array('LeadSold.contact_id' => $contact_id)
            );

        }




    }




    public function transfer_report() {

        $this->layout='default_new';

        $dealer_id = $this->Auth->user('dealer_id');
        $zone = $this->Auth->User('zone');
        date_default_timezone_set($zone);

        //$s_date = '2014-07-09';
        //$e_date = '2014-07-09';
        if($s_date == null && $e_date == null){
            $s_date = date("Y-m-d");
            $e_date = date("Y-m-d");
        }
        $this->set('s_date', $s_date);
        $this->set('e_date', $e_date);
    }

    public function transfer_result($s_date = null, $e_date = null) {

        $dealer_id = $this->Auth->user('dealer_id');

        //Location Transfer Out Going
        $location_out_going = $this->Contact->query('
         SELECT
         Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,  Contact.modified, Contact.created,
         Contact.dealer_transfer_date, Contact.owner, Contact.sperson, Contact.first_name, Contact.last_name, Contact.sales_step, Contact.lead_status, Contact.notes, D.name
        FROM `contacts` AS `Contact`
        LEFT JOIN users as User ON (Contact.user_id = User.id)
        LEFT JOIN dealer_names as D ON (Contact.company_id = D.dealer_id)

        WHERE  `Contact`.`status` <> \'Duplicate-Closed\'
        AND `Contact`.`dealer_transfer_from` = :dealer_id
        AND dealer_transfer = 1
        AND date_format(`Contact`.`dealer_transfer_date`,\'%Y-%m-%d\') between :s_date and :e_date',
        array('dealer_id'=>$dealer_id, 's_date'=> $s_date, 'e_date'=> $e_date   ));

        $this->set('location_out_going', $location_out_going);
        //debug($location_out_going);

        //Location Transfer Incoming
        $location_incoming = $this->Contact->query('
         SELECT Contact.id, Contact.contact_status_id,  Contact.user_id, Contact.sperson, Contact.sales_step, Contact.`status`,  Contact.modified, Contact.created,
         Contact.dealer_transfer_date, Contact.owner, Contact.sperson, Contact.first_name, Contact.last_name, Contact.sales_step, Contact.lead_status, Contact.notes, D.name
        FROM `contacts` AS `Contact`
        LEFT JOIN users as User ON (Contact.user_id = User.id)
        LEFT JOIN dealer_names as D ON (Contact.dealer_transfer_from = D.dealer_id)
        WHERE  `Contact`.`status` <> \'Duplicate-Closed\'
        AND `Contact`.`company_id` = :dealer_id
        AND dealer_transfer = 1
        AND date_format(`Contact`.`dealer_transfer_date`,\'%Y-%m-%d\') between :s_date and :e_date',
        array('dealer_id'=>$dealer_id, 's_date'=> $s_date, 'e_date'=> $e_date   ));

        $this->set('location_incoming', $location_incoming);
        //debug($location_incoming);


        $custom_step_map = $this->ContactStatus->get_dealer_steps($this->Auth->User('dealer_id'), $this->Auth->User('step_procces'));
        //debug( $custom_step_map );
        $this->set('custom_step_map', $custom_step_map);



    }






    public function get_dealer_ids(){
        $current_dealer_id = $this->Auth->User('dealer_id');
        $other_locations = $this->Auth->User('other_locations');
        $other_locations_ar = explode(",", $other_locations);

        if(array_search($current_dealer_id, $other_locations_ar) === false){
            $other_locations_ar[] = $current_dealer_id;
        }

        $dconditions = array('User.dealer_id' => $other_locations_ar );
        $user_active = $this->User->find('list', array('fields' => array('dealer_id', 'dealer'),
                'conditions' => $dconditions ));

        return $user_active;
    }

    public function get_user_list(){
        $dealer_id = $this->request->query['dealer_id'];
        $users = $this->User->find('all', array('fields' => array('User.id', 'User.first_name','User.last_name'),
                'conditions' => array('User.group_id <>'=>array(6,7,8), 'User.active' => '1',  'User.dealer_id' => $dealer_id )));

        //debug($users);
        $options = "<option value=''>Select</option>";
        foreach($users as $user){
            $options .= "<option value='".$user['User']['id']."'>".$user['User']['first_name']." ".$user['User']['last_name']."</option>";
        }
        echo $options;
        $this->autoRender = false;
    }


    //Transfer leads
    public function lead_transfer_location($contact_id){
        $group = $this->Auth->user('group_id');
        $movelead_allowed_group = $this->get_dealer_settings(array('move_lead_allowed_group'),AuthComponent::user('dealer_id'));
        $movelead_group = array(1,2,3, 4,6,9,10,11,12,13);

        $contact =  $this->Contact->find('first',array('recursive'=>-1,'fields'=>array('Contact.id','Contact.user_id'),'conditions' => array(
            'Contact.id'=>$contact_id
        )));

        if(!empty($movelead_allowed_group['move_lead_allowed_group'])){
            $movelead_group = explode(',',$movelead_allowed_group['move_lead_allowed_group']);
        }

        if(in_array($group,$movelead_group)){
            $timezone = $this->Auth->user('zone');
            $current_user_id = $this->Auth->user('id');
            $current_dealer_id = $this->Auth->user('dealer_id');

            $users = $this->User->find("list", array('conditions'=>array(
                'User.dealer_id'=>$current_dealer_id,
                'User.group_id <> '=>array(6,7,8),
                'User.active'=>1,
                'User.id <>'=>$contact['Contact']['user_id'],
            )));
            $this->set('users',$users);
        }
        $this->set('group',$group);
        $this->set('movelead_group', $movelead_group);
        $this->set('contact_id',$contact_id);

        //Current Event

        $follow_up_24 = $this->requestAction("dealer_settings/get_settings/24-follow-up");
        $this->set('follow_up_24',$follow_up_24);

        $eventinfo = $this->Event->find('first', array('recursive' => 0,'order'=>'Event.id DESC', 'conditions'=>array('Event.status <>' => array('Completed','Canceled'),'Event.contact_id' => $contact_id)));
        if(!empty($eventinfo)){

            $this->request->data['Event']['id'] = $eventinfo['Event']['id'];
            $this->request->data['Event']['event_type_id'] = $eventinfo['Event']['event_type_id'];
            $this->request->data['Event']['status'] = $eventinfo['Event']['status'];
            $this->request->data['Event']['title'] = $eventinfo['Event']['title'];
            $this->request->data['Event']['details'] = $eventinfo['Event']['details'];

            $this->request->data['Event']['start_date'] = date('Y-m-d', strtotime($eventinfo['Event']['start']));
            $this->request->data['Event']['start_time'] = date('h:i A', strtotime($eventinfo['Event']['start']));
            $this->request->data['Event']['end_date'] = date('Y-m-d', strtotime($eventinfo['Event']['end']));
            $this->request->data['Event']['end_time'] = date('h:i A', strtotime($eventinfo['Event']['end']));
        }

        $this->loadModel('DealerSetting');
        $auto_event_start_time = $this->DealerSetting->get_settings('auto_event_time', $this->Auth->user('dealer_id') );
        $auto_event_end_time =  date("h:i A",strtotime("+15 minute",  strtotime($auto_event_start_time)));

        $this->request->data['Newevent']['start_time'] = $auto_event_start_time;
        $this->request->data['Newevent']['end_time'] = $auto_event_end_time;

        if($follow_up_24 == 'On'){


            $this->request->data['Newevent']['start_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));
            $this->request->data['Newevent']['end_date'] = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d 10:00:00'))));


            $this->request->data['Newevent']['status'] = "Scheduled";
            $this->request->data['Newevent']['event_type_id'] = "13";
            $this->request->data['Newevent']['title'] = " Call Out to Customer";
            $this->request->data['Newevent']['details'] = "Call Out to Customer- ";
        }
        $this->request->data['Newevent']['details'] = "Call Out to Customer- ";




        //Event Details
        $appointment = $this->Event->find('first', array('recursive'=>-1,'order' => array('Event.modified DESC'),'conditions'=>array(
        'Event.contact_id'=>$contact_id,
        //'Event.user_id'=>$current_user_id,
        'Event.status <>' => array('Completed','Canceled'))));
        $this->set('appointment', $appointment);

           $this->set('eventTypes', $this->EventType->find('list', array('conditions'=>['OR' => ['EventType.dealer_id IS NULL', 'EventType.dealer_id'=>$this->Auth->user('dealer_id')]] , 'order'=>"EventType.id ASC")));


           $dealer_ids = $this->get_dealer_ids();
        $this->set('dealer_ids', $dealer_ids);


    }



    private function _move_contact_to_user($user_details, $contact_id, $note){

        //History Variable
        $timezone = $user_details['User']['zone'];
        date_default_timezone_set($timezone);
        $datetimetext = date('Y-m-d H:i:s');

        //Save history for user move
        $c_d =  $this->Contact->find('first',array('recursive'=>-1,'fields'=>array(),'conditions' => array(
            'Contact.id'=>$contact_id
        )));

		$this->Contact->saveFirstModified($c_d);

        $old_data = $c_d;
        $history_data = array();
        $history_data['user_id'] = $user_details['User']['id']; // for change log
        $history_data['changed_by'] = $user_details['User']['id'];
        $history_data['contact_id'] = $old_data['Contact']['id'];
        $history_data['sperson'] = $old_data['Contact']['sperson'];
        $history_data['cond'] = $old_data['Contact']['condition'];
        $history_data['year'] = $old_data['Contact']['year'];
        $history_data['make'] = $old_data['Contact']['make'];
        $history_data['model'] = $old_data['Contact']['model'];
        $history_data['type'] = $old_data['Contact']['type'];
        $history_data['sales_step'] = $old_data['Contact']['sales_step'];
        $history_data['status'] = $old_data['Contact']['status'];
        $history_data['modified'] = date('D - M d, Y g:i A');
        $history_data['created'] = $datetimetext;
        $history_data['comment'] = "Leads Pushed to ".$user_details['User']['full_name']." #".$user_details['User']['id']." from ".$old_data['Contact']['sperson']
        ." #".$old_data['Contact']['user_id']
        ." - <br> "
        ." Location From: {$old_data['Contact']['company']} ({$old_data['Contact']['company_id']}) To  {$user_details['User']['dealer']} ({$user_details['User']['dealer_id']}) - <br> "
        ." Transferred By: {$this->Auth->User('first_name')} {$this->Auth->User('last_name')} ({$this->Auth->User('id')}) -"
        .$note;

        $history_data['h_type'] = "Location Transfer";
        $history = array(
            'History' => $history_data
        );
        $this->History->create();
        $this->History->save($history);

        $is_gsm =0;
        if( $this->Auth->user('group_id') == 2 ){
            $is_gsm =1;
        }

        App::uses('Sanitize', 'Utility');


        //Update Contact
        $owner_match = $this->_find_originator($user_details,$old_data); //Look for originator in the other location so we can keep originator
        $this->Contact->updateAll(
            array(
                'Contact.user_id' => "'".$user_details['User']['id']."'",
                'Contact.sperson' => "'".$user_details['User']['full_name']."'",

                'Contact.owner_id' => "'".$owner_match['User']['id']."'",
                'Contact.owner' => "'".$owner_match['User']['full_name']."'",
                /*'Contact.owner_id' => "'".$user_details['User']['id']."'",
                'Contact.owner' => "'".$user_details['User']['full_name']."'",*/

                'Contact.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
                'Contact.company_id' => "'".$user_details['User']['dealer_id']."'",

                'Contact.dealer_transfer' => "'1'",
                'Contact.is_gsm' => "'".$is_gsm."'",
                'Contact.dealer_transfer_date' => "'{$datetimetext}'",
                'Contact.dealer_transfer_from' => "'{$old_data['Contact']['company_id']}'",
                'Contact.dealer_transfer_by' => "'{$this->Auth->User('id')}'",

                'Contact.staff_transfer' => "'1'",
                'Contact.location_modified' => "'".$old_data['Contact']['modified']."'",

                //add transfer location comments as notes in contact
                //'Contact.notes' => "'".$history_data['comment']."'",
            ),
            array('Contact.id' => $contact_id)
        );

        //Update event
        $this->Event->updateAll(
            array(
                'Event.user_id' => "'".$user_details['User']['id']."'",
            ),
            array('Event.contact_id' => $contact_id)
        );

        //Update Deal
        $this->Deal->updateAll(
            array(
                'Deal.user_id' => "'".$user_details['User']['id']."'",
                'Deal.sperson' => "'".$user_details['User']['full_name']."'",
                'Deal.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
                'Deal.company_id' => "'".$user_details['User']['dealer_id']."'"
            ),
            array('Deal.contact_id' => $contact_id)
        );

        //Update lead sold table
        $this->loadModel('LeadSold');
        $sold_leads_count = $this->LeadSold->find('count', array('conditions' => array('LeadSold.contact_id'=>$contact_id)));
        if($sold_leads_count != 0){

            $this->LeadSold->updateAll(
                array(
                    'LeadSold.user_id' => "'".$user_details['User']['id']."'",
                //    'LeadSold.owner' => "'".$user_details['User']['full_name']."'",
                    'LeadSold.sperson' => "'".$user_details['User']['full_name']."'",
                    'LeadSold.company' => "'".Sanitize::escape($user_details['User']['dealer'])."'",
                    'LeadSold.company_id' => "'".$user_details['User']['dealer_id']."'",
                ),
                array('LeadSold.contact_id' => $contact_id)
            );

        }


		// No need to update survey contact for Freedom Marketing location
        //Update bdc survey
		if($this->Auth->user('dealer_id') != 40013){
			$this->loadModel("BdcSurvey");
			$this->BdcSurvey->updateAll(
				array(
					'BdcSurvey.dealer_id' => "'".$user_details['User']['dealer_id']."'",
				),
				array('BdcSurvey.bdc_lead_id' => $contact_id)
			);
		}



        $this->requestAction('manage_cache/clear_contact_cache/'.$contact_id);

    }

    public function _find_originator($user_to,$old_cnt_data) {
      $user_from_name = explode(" ", $old_cnt_data['Contact']['owner']);
      $user_match = $this->User->find('first',array(
        'conditions' => array(
          'User.active' => 1,
          'User.first_name' => $user_from_name[0],
          'User.last_name' => $user_from_name[1],
          'User.dealer_id' => $user_to['User']['dealer_id']
        )
      ));
      if(!empty($user_match)) return $user_match;
      else return $user_to;
    }

    public function move_contact() {
        //debug($this->request->query);

        $dealer_id = $this->request->data['Contact']['dealer_id'];
        $contact_id = $this->request->data['Contact']['contact_id'];
        $user_id = $this->request->data['Contact']['user_id'];

        //History Variable
        $timezone = $this->Auth->user('zone');
        date_default_timezone_set($timezone);
        $datetimetext = date('Y-m-d H:i:s');

        $this->User->recursive = -1;
        $user_details = $this->User->findById($user_id);
        //debug($user_details);

        $this->_move_contact_to_user($user_details, $contact_id,  $this->request->data['Contact']['note']);

        // CLEAR CACHE ON EDIT LEAD
        $this->requestAction('manage_cache/refresh/'.$user_details['User']['dealer_id']);
        $this->requestAction('manage_cache/refresh/'.$this->Auth->User('dealer_id'));


        //Save Event Start
        //debug($this->request->data);

        $contact_info = $this->Contact->find('first', array('recursive'=>-1,'conditions'=>array('Contact.id'=>$contact_id)));
           $this->set('contact_info',$contact_info);

        //Existing evetn udpate
        if(isset($this->request->data['Event']['id']) && $this->request->data['Event']['id'] != '' && $this->request->data['Event']['editevent'] == 'yes'){

            $this->request->data['Event']['start'] = '';
            if($this->request->data['Event']['start_date'] != '' && $this->request->data['Event']['start_time'] != ''){
                $this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Event']['start_date']." ".$this->request->data['Event']['start_time']));
                $this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
            }

            $this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
            $this->request->data['Event']['form_used'] = 'short';

            $this->Event->save($this->request->data);


            ////////////////////////////////History entry for events/////////////
            $old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $this->Event->id)));
            $history_data = array();
            $history_data['contact_id'] =             $old_data['Event']['contact_id'];
            $history_data['event_id'] =             $old_data['Event']['id'];
            $history_data['customer_name'] =         $old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
            $history_data['make'] =                 $old_data['EventType']['name'];
            $history_data['model'] =                 date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
            $history_data['status'] =                 $old_data['Event']['status'];
            $history_data['comment'] =                 $old_data['Event']['details'];
            $history_data['notes'] =                 $old_data['Event']['title'];
            $history_data['modified'] =             date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
            $history_data['created'] =                 $old_data['Event']['modified'];
            $history_data['start_date'] =             $old_data['Event']['start'];
            $history_data['end_date'] =             $old_data['Event']['end'];
            $history_data['form_used'] =             $old_data['Event']['form_used'];

            $history_data['h_type'] =                 "Event";
            $history_data['sales_step'] =             "Event";
            $history_data['sperson']     =            $old_data['Event']['sperson'];

            $history = array(
                'History' => $history_data
            );
            $this->History->create();
            $this->History->save($history);

        }

        //New evetn Insert

        $ntitle = "";
        $nstart = "";
        $nstatus = "";

        if(isset($this->request->data['Newevent']['create']) && $this->request->data['Newevent']['create'] == 'yes'){

            //save event
            $this->request->data['Event'] = array();
            $this->request->data['Event']['user_id'] = $this->Auth->user('id');
            $this->request->data['Event']['dealer_id'] = $this->Auth->user('dealer_id');
            $this->request->data['Event']['contact_id'] = $contact_id ;
            $this->request->data['Event']['sperson'] =  $contact_info['Contact']['sperson'];
            $this->request->data['Event']['first_name'] = $contact_info['Contact']['first_name'];
            $this->request->data['Event']['last_name'] = $contact_info['Contact']['last_name'];
            $this->request->data['Event']['email'] = $contact_info['Contact']['email'];
            $this->request->data['Event']['mobile'] = $contact_info['Contact']['mobile'];
            $this->request->data['Event']['phone'] = $contact_info['Contact']['phone'];

            $this->request->data['Event']['event_type_id'] = $this->request->data['Newevent']['event_type_id'];
            $this->request->data['Event']['title'] = $this->request->data['Newevent']['title'];
            $this->request->data['Event']['status'] = $this->request->data['Newevent']['status'];
            $this->request->data['Event']['details'] = $this->request->data['Newevent']['details'];

            $this->request->data['Event']['start'] = '';
            $this->request->data['Event']['end'] = '';
            if($this->request->data['Newevent']['start_date'] != '' && $this->request->data['Newevent']['start_time'] != ''){
                $this->request->data['Event']['start'] = date("Y-m-d H:i:s", strtotime($this->request->data['Newevent']['start_date']." ".$this->request->data['Newevent']['start_time']));
                $this->request->data['Event']['end'] = date("Y-m-d H:i:s", strtotime("+15 minute",strtotime($this->request->data['Event']['start'])));
            }
            $this->request->data['Event']['form_used'] = 'short';

            //debug($this->request->data);
            $this->Event->create();
            $this->Event->save($this->request->data);

            $ntitle = $this->request->data['Newevent']['title'];
            $nstart = $this->request->data['Event']['start'];
            $nstatus = $this->request->data['Newevent']['status'];


            ////////////////////////////////History entry for events/////////////
            $old_data = $this->Event->find('first', array('recursive' =>0, 'conditions'=>array('Event.id' => $this->Event->id)));
            $history_data = array();
            $history_data['contact_id'] =             $old_data['Event']['contact_id'];
            $history_data['event_id'] =             $old_data['Event']['id'];
            $history_data['customer_name'] =         $old_data['Event']['first_name']." ".$old_data['Event']['last_name'];
            $history_data['make'] =                 $old_data['EventType']['name'];
            $history_data['model'] =                 date('D - M d, Y g:i A',strtotime($old_data['Event']['start']));
            $history_data['status'] =                 $old_data['Event']['status'];
            $history_data['comment'] =                 $old_data['Event']['details'];
            $history_data['notes'] =                 $old_data['Event']['title'];
            $history_data['modified'] =             date('D - M d, Y g:i A',strtotime($old_data['Event']['modified']));
            $history_data['created'] =                 $old_data['Event']['modified'];
            $history_data['start_date'] =             $old_data['Event']['start'];
            $history_data['end_date'] =             $old_data['Event']['end'];
            $history_data['form_used'] =             $old_data['Event']['form_used'];
            $history_data['h_type'] =                 "Event";
            $history_data['sales_step'] =             "Event";
            $history_data['sperson']     =            $old_data['Event']['sperson'];

            $history = array(
                'History' => $history_data
            );
            $this->History->create();
            $this->History->save($history);


        }
        //Save Event Ends






        // //Send Email Alert
        try {
            $emailData = "Dealer Name: ".$contact_info['Contact']['company']." <br>";
            $emailData .= "Location From: ". $this->Auth->User('dealer') ." To  ". $contact_info['Contact']['company']  ." <br>";
            $emailData .= "Source: ".$contact_info['Contact']['source']." <br>";
            $emailData .= "Dealer ID: ".$contact_info['Contact']['company_id']." <br>";
            $emailData .= "ID: ".$contact_info['Contact']['id']." <a href='https://app.dealershipperformancecrm.com/contacts/leads_main/view/".$contact_info['Contact']['id']."' target='_blank' >(Open)</a><br>";
            $emailData .= "Name: ".$contact_info['Contact']['first_name']." ".$contact_info['Contact']['last_name']." <br>";
            $emailData .= "Address: ".$contact_info['Contact']['address'].", ".$contact_info['Contact']['city'].", ".$contact_info['Contact']['state'].", ".$contact_info['Contact']['zip']." <br>";
            $emailData .= "Mobile: ".$contact_info['Contact']['mobile']." <br>";
            $emailData .= "Phone: ".$contact_info['Contact']['phone']." <br>";
            $emailData .= "Work number: ".$contact_info['Contact']['work_number']." <br>";

            $emailData .= "Email: ".$contact_info['Contact']['email']." <br>";
            $emailData .= "Year: ".$contact_info['Contact']['year']." <br>";
            $emailData .= "Make: ".$contact_info['Contact']['make']." <br>";
            $emailData .= "Model: ".$contact_info['Contact']['model']." <br>";


            $pusher_email = $this->Auth->User('email');

            App::uses('CakeEmail', 'Network/Email');
            $email = new CakeEmail();
            $email->config('sender');
            $email->viewVars(array(
                'emailData'=>$emailData,
                'username'=>$user_details['User']['full_name'],
                'pusher' =>  $this->Auth->User('first_name') ." ". $this->Auth->User('last_name'),
                'contact_id'=>$contact_id,
                'title'=>$ntitle,
                'start'=>$nstart,
                'status'=>$nstatus
            ));

            if($pusher_email != ''){
                $email->replyTo($pusher_email);
            }else{
                $email->replyTo("sender@dp360crm.com");
            }

            $email->template('move_lead_message')
                ->emailFormat('html')
                ->subject("New Lead pushed to ".$user_details['User']['full_name'])
                ->from("sender@dp360crm.com")
                ->to($user_details['User']['email'])
                ->bcc(array('andrew@dp360crm.com','russel@dp360crm.com'))
                //->bcc(array('russel@dp360crm.com'))
                ->send();

        }catch (Exception $e) {

        }



        $this->autoRender = false;
        $this->Session->setFlash(__('Contact Moved'), 'alert');
        echo json_encode(array('status'=>'ok'));
    }



    // function update_history_dealer_id(){

    //     $histories = $this->Contact->query( "select id, contact_id from histories where step_chage_date is not null;" );
    //     //debug( $histories );
    //     foreach($histories as $his){

    //         if($his['histories']['contact_id'] != ''){

    //             $dealer_id = $this->Contact->query( "select id, company_id from contacts where id = :id", array("id"=>$his['histories']['contact_id']) );
    //             //debug($dealer_id);
    //             if(!empty($dealer_id)){

    //                 $did = $dealer_id['0']['contacts']['company_id'];
    //                 $this->Contact->query( " update histories set dealer_id = :dealer_id where id = :id", array('dealer_id' =>  $did, "id"=>$his['histories']['id']) );
    //                 //debug( $his['histories']['id'] );
    //             }

    //         }

    //     }

    // }
























}
