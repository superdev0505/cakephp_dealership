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
									
							<!-- // Other Search END -->
							<!-- Quick Search -->
							<div class="form-group col-md-3 padding-none">
								<div class="col-md-8 padding-none">	
								</div>
							</div>
							<!-- // Quick Search END -->
							<div class="pull-right">
								<a id="btn_create_template" href="<?php echo $this->Html->url(array('action'=>'/templates_create')); ?>" class="btn btn label-success no-ajaxify">
									<font color="white">+ADD NEW</font>
								</a>
							</div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
						</form>
					</div>
					<!-- // Filters END -->
					<!-- Products table -->
					<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th style="width: 1%;" class="center">
									<?php echo $this->Paginator->sort('template_id','Ref#',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th>Preview</th>
								<th>
									<?php echo $this->Paginator->sort('template_title','Title',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th>
									<?php echo $this->Paginator->sort('created_date','Created On',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th>
									<?php echo $this->Paginator->sort('template_category_app_id','Category',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th>
									<?php echo $this->Paginator->sort('template_type','Type',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th class="center" style="width: 100px;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            foreach($Templates as $template) : 
							?>
							<tr class="selectable" style="">
								<td class="center" style="width: 41px;"><?php echo $template['TemplateApp']['template_id'];?></td>
								<td class="important" style="width: 130px;">
                                	<?php if($template['TemplateApp']['template_image'] != ''){ ?>
									<span class="important" style="width: 130px;">
										<?php echo $this->Html->image("template-thumbs/".$template['TemplateApp']['template_image'], array('width'=>"50",'height'=>"30")); ?>
									</span>
									<?php } ?>
                                </td>
								<td class="important" style="width: 130px;"><?php echo $template['TemplateApp']['template_title']; ?></td>
								<td><?php echo $this->Time->format('M d, Y', $template['TemplateApp']['created_date']); ?></td>
								<td><?php echo $template['TemplatesCategoryApp']['category_name']; ?></td>
								<td><?php echo $template_type[$template['TemplateApp']['template_type']]; ?></td>
								<td class="center" style="width: 187px;">
									<a href="<?php echo $this->Html->url(array('action'=>'templates_create', $template['TemplateApp']['template_id'])); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"> </i></a>

									<a href="<?php echo $this->Html->url(array('action'=>'templates_duplicate', $template['TemplateApp']['template_id'])); ?>" class="btn btn-sm btn-primary duplicate_template no-ajaxify"><i class="fa fa-plus-square"></i> Duplicate</a>
									<a class="btn btn-sm btn-primary btn_template_delete" data-toggle="modal" href="#modal_delete_account"
									style="float:right;" template_delete_id='<?php echo $template['TemplateApp']['template_id']; ?>'><i class="fa fa-times"></i></a>
                                </td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					
	        <!-- // Products table END -->
					<!-- Options -->
					<div class=""><a href="<?php echo $this->Html->url(array('controller'=>'marketing', 'action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
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
<div class="modal fade" id="modal_delete_account" tabindex="-1" role="dialog" 
	aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
        <div class="modal-content">
          	<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Template</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
          	</div>
          	<div class="modal-body">
               <p style="font-size:18px;font-weight:600;">Do you want to delete the template?</p>
          	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
		        <button type="button" class="btn btn-info deltem">yes</button>
	      	</div>
        </div>
  	</div>
</div>


<?php echo $this->element("sql_dump"); ?>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".duplicate_template").click(function(event){
		if(!confirm("Do you want to make a duplicate copy?")){
			event.preventDefault();
		}
	});
	
	
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
	
	
	$(".btn_template_delete").click(function(event){
		event.preventDefault();
		var del_id = $(this).attr("template_delete_id");
			$(".deltem").click(function(){
			$.ajax({
				type: "GET",
				cache: false,
				url: "/marketing_apps/templates_delete",
				data: {'contact_template_id':del_id },
				success: function(data){
				 	window.location = '/marketing_apps/templates_list';
				}
			});
			$('#modal_delete_account').modal('hide');
		});	
	});
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
