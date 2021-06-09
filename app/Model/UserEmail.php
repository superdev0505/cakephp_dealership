<?php
class UserEmail extends AppModel {



	public function get_setting($type=null, $current_user_id = null){
		//$current_user_id = $this->Auth->User('id');
		//$this->loadModel('EmailSetting');
		App::import('model','EmailSetting');
        $this->EmailSetting = new EmailSetting;


        $cache_key_current_settings = $current_user_id."_"."email_setting";
		Cache::set(array('duration' => '+12 hours'));
		if (($current_settings = Cache::read($cache_key_current_settings)) === false) {

			$current_settings = $this->EmailSetting->find('first', array('conditions'=>array('EmailSetting.user_id'=>$current_user_id)));
			
			Cache::set(array('duration' => '+12 hours'));
			Cache::write($cache_key_current_settings, $current_settings);
		}

		//debug( $current_settings );

		

		if(!empty($current_settings)){

			if($type == 'imap'){
				$imap_settings = array();
				if( $current_settings['EmailSetting']['imap_server'] != '' && $current_settings['EmailSetting']['smtp_username'] != '' &&  $current_settings['EmailSetting']['smtp_pwd']  ){
					
					$mailbox = $current_settings['EmailSetting']['imap_server'];
					//{imap.mail.yahoo.com:993/imap/ssl}INBOX

					if($current_settings['EmailSetting']['imap_port'] != ''){
						$mailbox  .= ":".$current_settings['EmailSetting']['imap_port'];
					}
					$mailbox .= "/imap";
					if($current_settings['EmailSetting']['imap_ssl_tls'] != ''){
						$mailbox .= "/".$current_settings['EmailSetting']['imap_ssl_tls'];
					}
					$mailbox = "{".$mailbox."}INBOX";
					$imap_settings['mailbox'] = $mailbox;
					$imap_settings['username'] = $current_settings['EmailSetting']['smtp_username'];
					$imap_settings['password'] = $current_settings['EmailSetting']['smtp_pwd'];
				}
				return $imap_settings;
			}

			if($type == 'smtp'){
				$smtp_settings = array();
				if($current_settings['EmailSetting']['ext1'] != 'Off' && $current_settings['EmailSetting']['smtp_host'] != '' && $current_settings['EmailSetting']['smtp_username'] != ''  && $current_settings['EmailSetting']['emailaddress'] != ''){

					if($current_settings['EmailSetting']['smtp_ssl_tls'] != ''){
						$smtp_settings['smtp']['host'] = $current_settings['EmailSetting']['smtp_ssl_tls']."://".$current_settings['EmailSetting']['smtp_host'];
					}else{
						$smtp_settings['smtp']['host'] = $current_settings['EmailSetting']['smtp_host'];	
					}

					if($current_settings['EmailSetting']['smtp_port'] != ''){
						$smtp_settings['smtp']['port'] = $current_settings['EmailSetting']['smtp_port'];					
					}else{
						$smtp_settings['smtp']['port'] = 25;
					}

					$smtp_settings['smtp']['username'] = $current_settings['EmailSetting']['smtp_username'];
					$smtp_settings['smtp']['password'] = $current_settings['EmailSetting']['smtp_pwd'];
					$smtp_settings['smtp']['timeout'] = '30';
					if($current_settings['EmailSetting']['smtp_tls'] == '1'){
						$smtp_settings['smtp']['tls'] = true;
					}
					$smtp_settings['smtp']['transport'] = 'Smtp';
					$smtp_settings['emailaddress'] = $current_settings['EmailSetting']['emailaddress'];

				}
				return $smtp_settings;
			}


		}else{
			return array();
		}
		
		//$imap = imap_open($current_mailbox['mailbox'], $current_mailbox['username'], $current_mailbox['password']);
		
			


	}










}