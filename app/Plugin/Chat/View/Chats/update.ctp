<?php
/*
 * CakePHP Ajax Chat Plugin (using jQuery);
 * Copyright (c) 2008 Matt Curry
 * www.PseudoCoder.com
 * http://github.com/mcurry/cakephp/tree/master/plugins/chat
 * http://sandbox2.pseudocoder.com/demo/chat
 *
 * @author      Matt Curry <matt@pseudocoder.com>
 * @license     MIT
 *
 */

	//flip the order
	date_default_timezone_set('America/Los_Angeles');
	if (isset($messages) && !empty($messages)) {
		$user_logged_id = AuthComponent::user('id');
		$SupportStaffChatId=Configure::read('SupportStaffChatId');
		foreach($messages as $i => $message) { 
		
		$class = 'left';
		 $avatar_img = FULL_BASE_URL.'/app/webroot/img/chat_user.png';
		if($user_logged_id == $message['Chat']['from_id'])
		{
		 $class= 'right';
		 $avatar_img = FULL_BASE_URL.'/app/webroot/img/chat_user.png';
		}
		if($SupportStaffChatId == $message['Chat']['from_id'])
		$avatar_img = FULL_BASE_URL.'/app/webroot/img/small-logo1.jpg';
		
		
		?>
        <li class="<?php echo $class; ?> clearfix"><span class="chat-img pull-<?php echo $class; ?>">
                            <img src="<?php echo $avatar_img; ?>" alt="User Avatar" class="img-circle">
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo $message['Chat']['name']; ?></strong> <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span><?php  echo  $this->Time->timeAgoInWords($message['Chat']['created']); ?></small>
                                </div>
                                <p>
                                    <?php echo $message['Chat']['message']; ?>
                                </p>
                            </div>
            </li>
			<?php  
		}
	
}
?>
