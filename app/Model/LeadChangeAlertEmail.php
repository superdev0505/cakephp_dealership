<?php
class LeadChangeAlertEmail extends AppModel {

	public function send_log_change_notification($user_id = null, $contact_info = null, $log_by = null){
		App::import("Model","User");
		$this->User = new User();
		$userinfo = $this->User->find('first', array('fields'=>array('User.id','User.email'), 'conditions' => array( 'User.id'=> $user_id)));

		if(!empty($userinfo) && strpos($userinfo['User']['email'], "unknown") === false ){

			//Send Email Alert Start
			$emailData = "<p>Log Added By: {$log_by} <br></p>";
			$emailData .= "Dealer Name: ".$contact_info['Contact']['company']." <br>";
			$emailData .= "Source: ".$contact_info['Contact']['source']." <br>";
			$emailData .= "Dealer ID: ".$contact_info['Contact']['company_id']." <br>";
			$emailData .= "ID: ".$contact_info['Contact']['id']." <a href='https://app.dealershipperformancecrm.com/contacts/leads_main/view/".$contact_info['Contact']['id']."' target='_blank' >(Open)</a> <br>";
			$emailData .= "Name: ".$contact_info['Contact']['first_name']." ".$contact_info['Contact']['last_name']." <br>";
			$emailData .= "Address: ".$contact_info['Contact']['address'].", ".$contact_info['Contact']['city'].", ".$contact_info['Contact']['state'].", ".$contact_info['Contact']['zip']." <br>";
			$emailData .= "Mobile: ".$contact_info['Contact']['mobile']." <br>";
			$emailData .= "Phone: ".$contact_info['Contact']['phone']." <br>";
			$emailData .= "Work number: ".$contact_info['Contact']['work_number']." <br>";

			$emailData .= "Email: ".$contact_info['Contact']['email']." <br>";
			$emailData .= "Year: ".$contact_info['Contact']['year']." <br>";
			$emailData .= "Make: ".$contact_info['Contact']['make']." <br>";
			$emailData .= "Model: ".$contact_info['Contact']['model']." <br>";

			$to_emails = array($userinfo['User']['email']);
			$template = "internal_message";
			$reply_to = "support@dp360crm.com";
			$from_email = "support@dp360crm.com";
			$subject = "New Log on Lead {$contact_info['Contact']['first_name']} {$contact_info['Contact']['last_name']} #{$contact_info['Contact']['id']}";

			/**  
			* Add email queue
			* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
			* template = "", $from = "", $to = "", $bcc = "")
			**/
			App::import("Model","QueueEmail");
			$this->QueueEmail = new QueueEmail();
			$this->QueueEmail->create_email_queue(
				"log_change_noti",
				$subject,
				"sender",
				serialize(array(
					'email_content'=>$emailData
				)),
				$reply_to,
				$template,
				$from_email,
				serialize($to_emails),
				serialize(array())
			);

		}
		
			

	}
	
	public function send_lead_change_report($dealer_id, $timezone, $modified_date, $contact_id) {
		
		date_default_timezone_set($timezone);

		App::import("Model","DealerSetting");
		$this->DealerSetting = new DealerSetting();
		$lead_change_report = $this->DealerSetting->get_settings('lead_change_report', $dealer_id);
		$lead_change_report_range = $this->DealerSetting->get_settings('lead_change_report_range', $dealer_id);

		// debug($timezone);
		// debug($lead_change_report);
		// debug($lead_change_report_range);

		$range_start = strtotime("-".$lead_change_report_range." days");
		$modified_range = strtotime($modified_date);
		// debug($range_start);
		// debug($modified_range);

		if($modified_range > $range_start){

			App::import("Model","LeadChangeAlertEmail");
			$this->LeadChangeAlertEmail = new LeadChangeAlertEmail();
			$lead_change_alert_emails = $this->LeadChangeAlertEmail->find('all', array('conditions' => array( 'LeadChangeAlertEmail.dealer_id'=> $dealer_id)));
			
			if(!empty($lead_change_alert_emails)){
		
				App::import("Model","Contact");
				$this->Contact = new Contact();
				$contactinfo = $this->Contact->find("first", array('recursive'=>-1, 'fields'=>array("Contact.sperson","Contact.owner","Contact.modified","Contact.id"), 'conditions' => array( 'Contact.id'=> $contact_id)));
				// debug($contactinfo);

				//debug("send report");
				$to_emails = array();
				foreach($lead_change_alert_emails as $lead_change_alert_email){
					$to_emails[] = $lead_change_alert_email['LeadChangeAlertEmail']['email'];
				}

				$modified_time = date('m/d/Y g:i A', strtotime($contactinfo['Contact']['modified']));

				$template = "lead_change_notification";
				$reply_to = "support@dp360crm.com";
				$from_email = "support@dp360crm.com";

				/**  
				* Add email queue
				* create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
				* template = "", $from = "", $to = "", $bcc = "")
				**/
				App::import("Model","QueueEmail");
				$this->QueueEmail = new QueueEmail();
				$this->QueueEmail->create_email_queue(
					"lead_change",
					"Lead Change Notification #".$contact_id,
					"sender",
					serialize(array(
						'sperson'=>$contactinfo['Contact']['sperson'],
						'modified_time'=>$modified_time,
						'owner' =>$contactinfo['Contact']['owner'],
						'dealer_id'=>$dealer_id,
						'contact_id'=>$contact_id
					)),
					$reply_to,
					$template,
					$from_email,
					serialize($to_emails),
					serialize(array())
				);


			}


		}


		
	}
}