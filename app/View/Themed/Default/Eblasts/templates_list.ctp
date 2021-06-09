<?php
$zone = AuthComponent::user('zone');
//echo $zone;

$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;

$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');
//echo $uname;

if ($step_procces === "lemco_steps") {
    $options = array('Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}

$date = new DateTime();
date_default_timezone_set($zone);

$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;

$template_type = array ('M' => 'Eblast', 'N' => 'Newsletter', 'A' => 'Autoresponder','T'=>'Mail Template');

?>

<br>
<br>
<br>
<br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div class="row">
		<div class="col-md-12">
			<!-- Widget -->
			<div class="widget widget-body-white">
				<!-- Widget heading -->
				
		    <!-- // Widget heading END -->
				<div class="widget-body">
					<div class="separator bottom"></div>
					<!-- Filters -->
					<div class="filter-bar">
						<form class="margin-none form-inline">
									<!-- Other Search -->
							<div class="form-group col-md-2 padding-none">
								<div class="input-group">
									<?php 
									echo $this->Form->input('search_all2', array(
									'div' => false,
									'class' => 'form-control',
									'label' => false,
									'placeholder' => 'Other Search'), array('div' => false, 'id' => 'ContactSearchAll2'));
									?>
									<span class="input-group-addon"><i class="fa fa-search"></i></span> </div>
							</div>
							<!-- // Other Search END -->
							<!-- Quick Search -->
							<div class="form-group col-md-3 padding-none">
								<div class="col-md-8 padding-none">
								<?php
								echo $this->Form->select('search_all', array(
									'Open' => 'Open',
									'Closed' => 'Closed',
									$datetimeshort => 'Today',
									$yesterday => 'Yesterday',
									$month => 'This Month',
									$lastmonth => 'Last Month',
									'Web Lead' => 'Web Lead',
									'Phone Lead' => 'Phone Lead',
									'Showroom' => 'Showroom',
									$options
								), array('div' => false,   'class' => 'form-control', 'empty' => 'Quick Search', 'id' => 'ContactSearchAll'));
								//keep the state of Quick Search
								echo $this->Form->hidden("search_all_value");
								?>
									
								</div>
							</div>
							<!-- // Quick Search END --><div class="pull-right"><a id="btn_create_template" href="<?php echo $this->Html->url(array('action'=>'/templates_create')); ?>" class="btn btn label-success no-ajaxify"><font color="white">+ADD NEW</font></a></div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
						</form>
					</div>
					<!-- // Filters END -->
					<!-- Products table -->
					<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th style="width: 1%;" class="center">Ref#</th>
								<th>Preview</th>
								<th>Title</th>
								<th>Created On</th>
								<th>Type</th>
								<th class="center" style="width: 100px;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            foreach($Templates as $template) : 
							?>
							<tr class="selectable" style="">
								<td class="center" style="width: 41px;"><?php echo $template['Template']['template_id'];?></td>
								<td class="important" style="width: 130px;">
                                	<?php if($template['Template']['template_image'] != ''){ ?>
									<span class="important" style="width: 130px;">
										<?php echo $this->Html->image("template-thumbs/".$template['Template']['template_image'], array('width'=>"50",'height'=>"30")); ?>
									</span>
									<?php } ?>
                                </td>
								<td class="important" style="width: 130px;"><?php echo $template['Template']['template_title']; ?></td>
								<td><?php echo $this->Time->format('M d, Y', $template['Template']['created_date']); ?></td>
								<td><?php echo $template_type[$template['Template']['template_type']]; ?></td>
								<td class="center" style="width: 100px;">

									<a  href="<?php echo $this->Html->url(array('action'=>'templates_create', $template['Template']['template_id'])); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"> </i></a>
									&nbsp;
                                    <?php 
									$manager_group_ids =array(2,4,6,7,12);
									if(AuthComponent::user('id') == $template['Template']['template_user_id'] || in_array(AuthComponent::user('group_id'),$manager_group_ids)){
									?>
									<a href="<?php echo $this->Html->url(array('action'=>'delete_template', $template['Template']['template_id'])); ?>" class="btn btn-sm btn-danger no-ajaxify"  ><i class="fa fa-times"> </i></a>
                                    <?php } ?>

                                </td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					
	        <!-- // Products table END -->
					<!-- Options -->
					<div class=""><a href="<?php echo $this->Html->url(array('action'=>'/')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
						<div class="pull-right">
							<ul class="pagination margin-none">
						        <?php echo $this->Paginator->prev('<<'); ?>
								<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
								<?php echo $this->Paginator->next('>>'); ?>
							</ul>
						</div>
						<div class="clearfix"></div>
						<!-- // Pagination END -->
					</div>
					<!-- // Options END -->
				</div>
			</div>
			<!-- // Widget END -->
		
				<!-- // Widget heading END -->
			</div>
			<!-- // Widget END -->
		</div>
	</div>
</div>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	

	// $(document).on("click",".template_delete_btn",function() {
	
	// 	if(confirm("Do you want to delete this template?")){

	// 		$.ajax({
	// 			type: "GET",
	// 			context: this,
	// 			url:  "/eblasts/delete_template/"+$(this).attr("template_id"),
	// 			success: function(data){
	// 				if(data.trim() == 'used'){
	// 					alert("This template is in use");
	// 					$(this).attr("disabled", false);

	// 				}else{
	// 					location.href = "/eblasts/templates_list";
	// 				}
	// 			}
	// 		});

	// 	}        

			


 //    });
	

	$("#btn_create_template").click(function(event){
		event.preventDefault();

		var can_spam_message = '<div style="padding: 0 20px 0 20px">' +
		'<h3>About Can-Spam</h3>'+
		'<p>Each separate email in violation of the CAN-SPAM Act is subject to penalties of up to $16,000, so non-compliance can be costly. But following the law isn’t complicated. Here’s a rundown of CAN-SPAM’s main requirements:</p>'+
		'<ul>'+
			'<li>'+
				'Don’t use false or misleading header information. Your “From,” “To,” “Reply-To,” and routing information – including the originating domain name and email address – must be accurate and identify the person or business who initiated the message.'+
			'</li>	'+
			'<li>Don’t use deceptive subject lines. The subject line must accurately reflect the content of the message.</li>'+
			'<li>Identify the message as an ad. The law gives you a lot of leeway in how to do this, but you must disclose clearly and conspicuously that your message is an advertisement.</li>'+
			'<li>Tell recipients where you’re located. Your message must include your valid physical postal address. This can be your current street address, a post office box you’ve registered with the U.S. Postal Service, or a private mailbox you’ve registered with a commercial mail receiving agency established under Postal Service regulations.</li>'+
			'<li>Tell recipients how to opt out of receiving future email from you. Your message must include a clear and conspicuous explanation of how the recipient can opt out of getting email from you in the future. Craft the notice in a way that’s easy for an ordinary person to recognize, read, and understand. Creative use of type size, color, and location can improve clarity. Give a return email address or another easy Internet-based way to allow people to communicate their choice to you. You may create a menu to allow a recipient to opt out of certain types of messages, but you must include the option to stop all commercial messages from you. Make sure your spam filter doesn’t block these opt-out requests.</li>'+
			'<li>Honor opt-out requests promptly. Any opt-out mechanism you offer must be able to process opt-out requests for at least 30 days after you send your message. You must honor a recipient’s opt-out request within 10 business days. You can’t charge a fee, require the recipient to give you any personally identifying information beyond an email address, or make the recipient take any step other than sending a reply email or visiting a single page on an Internet website as a condition for honoring an opt-out request. Once people have told you they don’t want to receive more messages from you, you can’t sell or transfer their email addresses, even in the form of a mailing list. The only exception is that you may transfer the addresses to a company you’ve hired to help you comply with the CAN-SPAM Act.</li>'+
			'<li>Monitor what others are doing on your behalf. The law makes clear that even if you hire another company to handle your email marketing, you can’t contract away your legal responsibility to comply with the law. Both the company whose product is promoted in the message and the company that actually sends the message may be held legally responsible.</li>'+
		'</ul>'+
		'Source:  <a class="no-ajaxify" target="_blank" href="https://www.ftc.gov/tips-advice/business-center/guidance/can-spam-act-compliance-guide-business">https://www.ftc.gov/tips-advice/business-center/guidance/can-spam-act-compliance-guide-business</a> </div>';


		bootbox.dialog({
			message: can_spam_message,
			title: "Can-Spam",
			buttons: {
				success: {
					label: "Cancel",
					className: "btn-danger",
					callback: function() {
						
					}
				},
				danger: {
					label: "Agree",
					className: "btn-success",
					callback: function() {
						location.href= $("#btn_create_template").attr('href');
					}
				}
			}
		});	

	});

	
	

	$(".alert").delay(3000).fadeOut("slow");

	$(".edit-contact").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			url:  $(this).attr('href'),
			success: function(data){
				$("#action-container").html(data);
			}
		});
		//return false;
	});
	
	
		
		
		
		
		
		
		
	
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
