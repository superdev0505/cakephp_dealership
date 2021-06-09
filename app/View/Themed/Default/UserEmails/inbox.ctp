<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}

</style>
<script>
	function setHeight(column, offset) {
	   var y = $(window).height();
	   h = y-offset;
	   $(column).css('max-height', h+'px');
	   $("#mail-container").getNiceScroll().resize();

	}
$script.ready('bundle', function() {



	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	$(".alert").delay(3000).fadeOut("slow");

	$(".email_subject").click(function(){

		$(".email_subject").removeClass('success');
		$(this).addClass('success');
		$("#email_details").html("");
		//$("#e_s_"+$(this).attr('messageid')).removeClass('strong');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/user_emails/email_details/"+$(this).attr('messageid'),
			success: function(data){
				$("#email_details").html(data);

			}
		});
	});


	$(".draft_messages").click(function(){
		var contact_id = $(this).attr('draft_contact_id');
		if(contact_id != ''){
			location.href = "/contacts/leads_main/view/"+contact_id;
		}else{
			location.href = "/user_templates/add/customer";
		}

		//console.log( contact_id );
	});



	$(".btn_delete_draft").click(function(event){
		event.preventDefault();
		event.stopPropagation();
		var url = $(this).attr('href');
		if(confirm("Do you want to delete draft?")){
			location.href = url;
		}
		//console.log( url );
	});





	setTimeout(function(){
  		setHeight('#mail-container', 140);

	  	var numberof_message =  $( ".email_subject" ).length;
		if(numberof_message != 0){
			var first_message = $( ".email_subject" ).first().attr('messageid');
			$(".email_subject" ).first().addClass('success');
			$("#email_details").html("");
			$.ajax({
				type: "GET",
				cache: false,
				url:  "/user_emails/email_details/"+first_message,
				success: function(data){
					$("#email_details").html(data);
				}
			});
		};
	}, 1000);







	//Email Sync Modal
	$("#btn-email-sync-modal").click(function(){
		$.ajax({
			type: "GET",
			cache: false,
			url: "<?php echo $this->Html->url(array('controller'=>'user_emails', 'action'=>'sync_modal')); ?>",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Email Sync",
				});
			}
		});
	});




	setHeight('#mail-container', 140);
	window.onresize=function(){ setHeight('#mail-container', 140); };

	setTimeout(function(){
  		setHeight('#mail-container', 140);
	}, 500);





	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
<style type="text/css">

#mail-container{
	 overflow: auto;
}

HEADER {

    border-bottom: 1px solid #ddd;
}
HEADER .super {
    background-color: #2D2D2D;
    padding-left: 16px;
}
HEADER .super a {
    display: inline-block;
    padding: 2px 8px;
    font-weight: bold;
    color: #aaa;
}
#logo {
    margin:0 32px 0 16px;
}
HEADER .search {
    padding: 4px;
    border-bottom: 1px solid #ddd;
    background-color: #f3f3f3;
}
HEADER .controls {
    padding: 8px 16px;
}
HEADER .controls .icon-email {
    margin: 0;
    font-weight: normal;
    color: #fff;
    display: inline-block;
    width: 163px;
    padding-left: 35px;
    font-size: 18px;
    float: left;
}
#side {
    padding: 8px;
    width: 164px;
    background-color: #f5f5f5;

}
#content2 {
    position: absolute;
    top: 82px;
    left: 196px;
    bottom: 0;
    right: 25px;

}


#content2 h2{
    font-size: 16px;
    font-weight: normal;
}

.btn .caret {
    margin-left: 16px;
}
.unread-message {
    text-align: center;
    margin: 1em;
}
#compose-button {
    width: 120px;
    margin-bottom: 2em;
}

#email_details{
	min-height: 400px;
}


.nav-list>.active>a, .nav-list>.active>a:hover, .nav-list>.active>a:focus {
color: #FFF;
text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.2);
background-color: #08C;
}

.table tbody tr.success>td {
	background-color: #D9EAFF;
}

.table tbody tr:hover>td {
	background-color: #D9EAFF;
}




</style>


<div class="layout-app" style='margin-top: 44px;'>
	<div class="row row-app innerAll">

		<header class='bg-inverse'>
		    <div class="controls">

				<div class='icon-email hidden-xs hidden-sm'><i class="fa fa-envelope-o fa-2x"></i></div>

				<?php echo $this->Form->create('UserEmail', array('url'=>array('controller'=>'user_emails','action'=>'inbox',$type),'type' => 'get', 'class' => 'apply-nolazy','style'=>'display: inline;')); ?>
		            <input value = "<?php echo (!empty($this->request->query['src']))? $this->request->query['src']  : ""  ?>"  class="input-xlarge form-control" id="appendedDropdownButton" name='src' type="text" style='width: 28%; display: inline' />
		            <div class="btn-group">
		                <button class="btn btn-primary" type="submit">Search <span class="caret"></span></button>
		            </div>
	            <?php echo $this->Form->end(); ?>

	            <button id='btn-email-sync-modal' class="btn pull-right">
					<i class="fa fa-refresh"></i> Email Sync
				</button>
				<span class="label label-strock">Last Sync: <?php echo  date('D - M d, Y g:i A',strtotime($last_run)); ?></span>

		    </div>
		</header>

		<div id="side">
		    <a class="btn btn-danger" id="compose-button" href='<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'compose')); ?>'>Compose</a>
		    <ul class="nav nav-list">
		        <li class="<?php echo  (!isset($this->request->params['pass']['0']))? "active" : "" ?>">

		        	<a <?php echo ($unread[0] != 0)? 'style="font-weight: bold;"' : "" ?> href="<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox')); ?>">
		        		Inbox <span id='inbox_read_cnt'><?php echo ($unread[0] != 0)? "(".$unread[0].")" : "" ?></span>
		        	</a>

		        </li>
		        <li class="<?php echo  (isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'replies')? "active" : "" ?>">
		        	<a href='<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox','replies')); ?>'>Leads-Sent</a>
		        </li>
		        <li <?php echo ($unread[1] != 0)? 'style="font-weight: bold;"' : "" ?>  class='<?php echo  (isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'staff_in')? "active" : "" ?>'>
		        	<a href='<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox','staff_in')); ?>' >
		        		Staff - In <span id='staff_read_cnt'><?php echo ($unread[1] != 0)? "(".$unread[1].")" : "" ?></span>
		        	</a>
		        </li>
		         <li class='<?php echo  (isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'staff_sent')? "active" : "" ?>'>
		        	<a href='<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox','staff_sent')); ?>' > Staff- Sent</a>
		        </li>

		        <li class='<?php echo  (isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'draft')? "active" : "" ?>'>
		        	<a href='<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox','draft')); ?>' > Draft</a>
		        </li>

		        <li class='<?php echo  (isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'failed')? "active" : "" ?>'>
		        	<a href='<?php echo $this->Html->url(array('controller'=>'user_emails','action'=>'inbox','failed')); ?>' > Failed Send</a>
		        </li>

		    </ul>

		</div>
		<div id="content2">

			<div class='row'>
				<div class='col-md-6'>

					<div class="col-app col-unscrollable">

						<div class="col-app" id='mail-container'>


							<?php if( isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'draft' ){ ?>

								<table class="table table-striped">
								<?php foreach($drafts as $draft){ ?>

									<tr class="draft_messages"  style="cursor: pointer" draft_contact_id="<?php echo $draft['Draft']['contact_id']; ?>">
							            <td width='35'><i class="fa fa-envelope-o"></i></td>
							            <td width='190'>
							            	<h5 class="text-muted-darker">

												<?php if( $draft['Draft']['contact_id'] != ''){ ?>
													<?php echo $draft['Draft']['subject']; ?> #<?php echo $draft['Draft']['contact_id']; ?>
												<?php }else{ ?>
													Template
												<?php } ?>




											</h5>
							            </td>
							            <td>
							            	<div id='draft_e_s_<?php echo $draft['Draft']['id']; ?>'  >
							            		<?php echo $draft['Draft']['message_body']; ?>
							            	</div>
							            </td>
							            <td class='text-right' style='font-size: 12px;' width='120'>
							            	<?php echo date('M d, g:i A',strtotime($draft['Draft']['modified'])); ?>

							            	<a class="btn btn-danger btn-xs no-ajaxify btn_delete_draft"   href="/user_emails/delete_draft/<?php echo $draft['Draft']['id']; ?>">
							            		<i class="fa fa-times"></i>
							            	</a>

							            </td>
							        </tr>


								<?php } ?>
								</table>

							<?php }else{ ?>



								<?php if(!empty($data)) { ?>


								<div class="paging">
									<ul class="pagination margin-none">
										<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
										<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
										<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
									</ul>
								</div>



								<table class="table table-striped">
							        <?php foreach($data as $email){ ?>
							        <tr class="email_subject"  style="cursor: pointer" messageid="<?php echo $email['UserEmail']['id']; ?>">
							            <td width='35'><i class="fa fa-envelope-o"></i></td>
							            <td width='375'>

													<h5 class="text-muted-dark text-weight-normal" style="text-align:left;">
														From: <?php echo $email['UserEmail']['sender_name']; ?>
														<?php echo ($email['UserEmail']['sender_id'] == $current_user_id)? '<span class="text-weight-regular" sytle="font-size:12px;">(Me)</span>' : '<span class="text-weight-regular" sytle="font-size:12px;">('.$email["UserEmail"]["email_from"].')</span>'; ?>
													</h5>
													<h5 class="text-muted-dark text-weight-normal"  style="text-align:left;">
														To: <?php echo $email['UserEmail']['receiver_name']; ?>
														<?php echo ($email['UserEmail']['receiver_id'] == $current_user_id)? '<span class="text-weight-regular" sytle="font-size:12px;">(Me)</span>' : ""; ?>
													</h5>

							            </td>
							            <td>
							            	<div id='e_s_<?php echo $email['UserEmail']['id']; ?>' <?php echo ($email['UserEmail']['read'] == '0')? 'class="strong"' : "" ; ?> >
							            		<?php echo $email['UserEmail']['subject']; ?> -
							            		<span style='color: #c2c2c2; font-size: 12px;'>
							            			<?php echo $this->Text->truncate( strip_tags($email['UserEmail']['message']),30,array('html'=>true));	?>
							            		</pan>
							            	</div>
							            </td>
							            <td class='text-right' style='font-size: 12px;' width='120'><?php echo date('M d, g:i A',strtotime($email['UserEmail']['received_date'])); ?></td>
							        </tr>
							        <?php } ?>
							    </table>

							    <?php }else{ ?>
							    	<div class='panel innerAll'>Empty</div>
							    <?php } ?>


							<?php } ?>



						</div>


					</div>

				</div>
				<div class='col-md-6 panel' id='email_details'>	</div>


			</div>

			<div class='row'>
				<div class='col-md-12'>
					<?php echo $this->element('sql_dump');  ?>
				</div>
			</div>





		</div>



















	</div>
</div>
