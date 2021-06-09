<?php
/*
 * Model/EventType.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class QueueEmail extends AppModel {
	var $name = 'QueueEmail';
	var $displayField = 'email_type';
	
	public function create_email_queue($email_type = "", $subject = "", $config = "", $view_vars = "", $reply_to = "", 
		$template = "", $from = "", $to = "", $bcc = "", $attachments = ""){

		date_default_timezone_set("UTC");

		$this->create();
		$this->save(array('QueueEmail'=>array(
			'email_type'=>$email_type,
			'subject'=>$subject,
			'config'=>$config,
			'view_vars'=>$view_vars,
			'reply_to'=>$reply_to,
			'template'=>$template,
			'from'=>$from,
			'to'=>$to,
			'bcc'=>$bcc,
			'attachments' => $attachments
		)));
		return true;

	}






}
?>
