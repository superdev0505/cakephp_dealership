<script>


	<?php if($unread[0] != 0){ ?>
		$("#inbox_read_cnt").html("(<?php echo $unread[0] ?>)");
	<?php }else{ ?>
		$("#inbox_read_cnt").html("");
	<?php } ?>

	<?php if($unread[1] != 0){ ?>
		$("#staff_read_cnt").html("(<?php echo $unread[1] ?>)");
	<?php }else{ ?>
		$("#staff_read_cnt").html("");
	<?php } ?>


	$("#e_s_<?php echo $userEmails[0]['UserEmail']['id']; ?>").removeClass('strong');


</script>

<?php
	function get_filename($fname){
		//$fname = "10341_549bf6a99ad79_photodune-1949987-male-portrait-s.jpg";
		$name1 = substr($fname, strpos($fname, "_")+1   );
		$filename = substr($name1, strpos($name1, "_")+1   );
		return $filename;
	}
	function file_size($size){
		return number_format($size/1024, 1, '.', '')."KB" ;
	}
	//debug($files);
?>



<?php foreach($userEmails as $email ){ ?>

<?php	$id = $email['UserEmail']['id']; ?>

<div class="innerAll border-bottom  text-center">
	<div class="btn-group btn-group">

		<?php if($email['UserEmail']['sender_id'] != $current_user_id){ ?>
		<a href="/user_emails/compose/<?php echo $email['UserEmail']['email_type']; ?>/<?php echo $email['UserEmail']['sender_id']; ?>/?reply=<?php echo $id; ?>" class="btn btn-success">
			<i class="fa fa-reply"></i>&nbsp;REPLY
		</a>
		<?php }else{ ?>
			<a href="/user_emails/compose/<?php echo $email['UserEmail']['email_type']; ?>/<?php echo $email['UserEmail']['receiver_id']; ?>/?reply=<?php echo $id; ?>" class="btn btn-success">
			<i class="fa fa-reply"></i>&nbsp;REPLY
			</a>
		<?php } ?>
		<?php //</div>&nbsp;&nbsp;<a href="javascript:void(0)"  class="btn btn-warning">&nbsp;&nbsp;<i class="fa fa-trash-o"></i>&nbsp;DELETE</a>	</div> ?>


</div>
<div class="col-table-row">
	<div class="col-app col-unscrollable">
		<div class="col-app">
			<div class="innerAll border-bottom inner-2x" >
				<div class="media innerB">
					<img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="" width="50" class="pull-left" />

					<div class="media-body innerT half">
						<small class="text-muted pull-right"><?php echo date('M d, Y h:i A',strtotime($email['UserEmail']['received_date'])); ?></small>
						<!-- <h5 class="text-muted-darker"> -->
						<h5 class="text-muted-dark text-weight-normal" style="text-align:left;">
							From: <?php echo $email['UserEmail']['sender_name']; ?>
							<?php echo ($email['UserEmail']['sender_id'] == $current_user_id)? '<span class="text-weight-regular" sytle="font-size:12px;">(Me)</span>' : '<span class="text-weight-regular" sytle="font-size:12px;">('.$email["UserEmail"]["email_from"].')</span>'; ?>
						</h5>
						<h5 class="text-muted-dark text-weight-normal"  style="text-align:left;">
							To: <?php echo $email['UserEmail']['receiver_name']; ?>
							<?php echo ($email['UserEmail']['receiver_id'] == $current_user_id)? '<span class="text-weight-regular" sytle="font-size:12px;">(Me)</span>' : ""; ?>
						</h5>
					</div>

					<div class="clearfix"></div>
				</div>
				<h4 class="innerT margin-none"><i class="fa fa-envelope-o text-success"></i> <?php echo $email['UserEmail']['subject']; ?></h4>
			</div>
			<div class="innerAll">
				<div class="innerAll" style="text-align:left;">
					<p style="overflow: auto;max-height: 194px;"><?php
					$emailbody =  nl2br($email['UserEmail']['message']);
					 //echo preg_replace('/(<base[^>]*>)/', '', $emailbody);
					 echo $email['UserEmail']['message'];
					?></p>
					<script>
						$('p').each(function() {
						var $this = $(this);
						if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
						$this.remove(); }); 
					</script>
					<?php if($email['UserEmail']['attachments'] != '' && !empty( json_decode($email['UserEmail']['attachments']) )){ ?>
						<strong>Attachment</strong>
						<hr>
						<?php foreach(json_decode($email['UserEmail']['attachments']) as $files){ ?>
							<div style="margin: 5px;">
								<?php echo get_filename($files); ?>
								<?php echo $this->Html->link('<i class="fa fa-download"></i>',array('controller'=>'contact_s3', 'action'=> 'download_attachment',"?"=>array('filename'=> $files )), array('escape'=>false, 'class'=>"btn  btn-xs no-ajaxify")); ?>
							</div>
						<?php }?>
					<?php }?>


				</div>
			</div>

			<div class="clearfix"></div>
		</div>
	</div>
</div>


<?php } ?>