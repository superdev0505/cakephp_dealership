<p>
	Lead Pushed to: <?php echo ucwords(strtolower( $username )); ?> <br>
	Pushed From: <?php echo ucwords(strtolower( $pusher)); ?>
</p>



<p><?php echo $emailData; ?></p><br />

<?php if($start != ''){ ?>

<p>Event Set: <?php echo $title; ?> - <?php echo date('m/d/Y g:i A', strtotime($start)); ?> <?php echo $status; ?> </p>

<?php } ?>