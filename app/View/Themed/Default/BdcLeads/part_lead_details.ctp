<style>
.midWidth {
    margin: 0 auto;
    width: 700px;
}
.maxWidth {
    margin: 0 auto;
    width: 850px;
}
</style>
<?php 
$group_id = AuthComponent::user('group_id');
//echo $timezone;

$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div class="innerAll">
	<div class="title">
		<div class="row">
			<div class="col-md-7">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 30px;" src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /> </div>
					<h3 class="text-primary margin-none pull-left innerR" style="word-break: break-all;"><?php echo $contact['PartLeadsDms']['name'];  ?></h3>
                 
						<?php
				
						echo '<span class="label label-info label-stroke">Part Lead</span>';
					?>
                
				</div>
				<ul class="list-unstyled list-group-1">
					<li><i class="fa fa-home"></i> <?php echo $contact['PartLeadsDms']['address']; ?>&nbsp;<?php echo $contact['PartLeadsDms']['city']; ?>&nbsp;<?php echo $contact['PartLeadsDms']['state']; ?>&nbsp;<?php echo $contact['PartLeadsDms']['zip']; ?>
						<div class="row"></div>
						<i class="fa fa-mobile"></i>
						<?php $phone = $contact['PartLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;?>
						&nbsp; <i class="fa fa-phone"></i>
						<?php $phone1 = $contact['PartLeadsDms']['work_phone'];
$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
echo $cleaned1;?>
						&nbsp; <i class="fa fa-envelope"></i> <span style="word-break: break-all;">
							
						</span></li>
				</ul>
			</div>
			<div class="col-md-5 "> 

				
							<?php //echo $this->Html->link('<i class="fa fa-plus"></i> In-Bound', array('controller'=>'bdc_leads','action'=>'bdc_input_in_bound', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'1'));  ?>
                  
				
				
				<?php echo $this->Html->link('<i class="fa fa-plus"></i> Parts Survey', array('controller'=>'bdc_leads','action'=>'bdc_parts_survey', $contact['PartLeadsDms']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey pull-right",'escape'=>false,'survey-id'=>'11'));  ?>
				<?php //echo $this->Html->link('<i class="fa fa-plus"></i> Safety', array('controller'=>'bdc_leads','action'=>'bdc_input_safety_course', $contact['BdcLead']['id']), array('class'=>"btn btn-warning no-ajaxify btn-load-survey",'escape'=>false,'survey-id'=>'6'));  ?>
				 <a href="#" class="btn btn-inverse BdcInvalidLead pull-right no-ajaxify" data-id="<?php echo $contact['PartLeadsDms']['id']; ?>" style="margin-right:5px;">Invalid Lead</a> 
				
				
				
			 </div>
		</div>
	</div>
	<hr/>
	<div class="body">
		<div class="row">
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Dealer:</span> <?php echo AuthComponent::user('dealer'); ?></li>
					<li><span class="strong">Sales Person:</span> <?php echo $contact['PartLeadsDms']['sperson']; ?></li>
                    <li><span class="strong">Cashier:</span> <?php echo $contact['PartLeadsDms']['cashier']; ?></li>
                    <li><span class="strong">Stock Id:</span> <?php echo $contact['PartLeadsDms']['stock_id']; ?></li>
                   <li><span class="strong">Repair Id:</span> <?php echo $contact['PartLeadsDms']['repair_id']; ?></li>

                <li><span class="strong">Address:</span> <?php echo $contact['PartLeadsDms']['address']; ?></li>
                <li><span class="strong">City:</span> <?php echo $contact['PartLeadsDms']['city']; ?></li>
                <li><span class="strong">Zip:</span> <?php echo $contact['PartLeadsDms']['zip']; ?></li>
                <li><span class="strong">Created:</span><?php echo $this->Time->format('n/j/Y g:i A', $contact['PartLeadsDms']['created']); ?> </li>
					<li><span class="strong">Modified:</span> <?php echo $this->Time->format('n/j/Y g:i A', $contact['PartLeadsDms']['modified']); ?></li>



				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
					<li><span class="strong">Invoice No:</span> <?php echo $contact['PartLeadsDms']['invoice_no']; ?></li>
					 <li><span class="strong">Invoice Date:</span> <?php  echo $this->Time->format('n/j/Y', $contact['PartLeadsDms']['invoice_date']); ?></li>
					
                   
					<li><span class="strong">Picked-up taxable sales:</span> $<?php echo $contact['PartLeadsDms']['	taxable_sales']; ?></li>
					<li><span class="strong">  Picked-up non-taxable sales:</span> $<?php echo $contact['PartLeadsDms']['non_taxable_sales']; ?></li>
					<li><span class="strong">    Picked-up discount amount taken:</span> $<?php echo $contact['PartLeadsDms']['discount_amount']; ?></li>
					<li><span class="strong"> Picked-up before tax total :</span> $<?php echo $contact['PartLeadsDms']['before_tax_total']; ?></li>
                    <li><span class="strong">Over-the-counter taxable sales:</span> $<?php echo $contact['PartLeadsDms']['counter_taxable_sales']; ?></li>
					
				</ul>
				<div class="separator bottom"></div>
			</div>
			<div class="col-md-4">
				<ul class="list-unstyled list-group-1">
                <li><span class="strong">  Over-the-counter non-taxable sales:</span> $<?php echo $contact['PartLeadsDms']['counter_non_taxable_sales']; ?></li>
                    <li><span class="strong">  Over-the-counter discount amount taken:</span> $<?php echo $contact['PartLeadsDms']['	counter_discount_taken']; ?></li>
					 <li><span class="strong">Over-the-counter before tax total:</span> $<?php echo $contact['PartLeadsDms']['counter_before_tax_total']; ?></li>
                      <li><span class="strong">Special order taxable sales:</span> $<?php echo $contact['PartLeadsDms']['special_taxable_sales']; ?></li>
                       <li><span class="strong">  Special order non-taxable sales:</span> $<?php echo $contact['PartLeadsDms']['special_non_taxable_sales']; ?></li>
                        <li><span class="strong"> Special order discount amount taken:</span> $<?php echo $contact['PartLeadsDms']['special_amount_taken']; ?></li>
                         <li><span class="strong"> Special order before tax total:</span> $<?php echo $contact['PartLeadsDms']['special_before_tax_total']; ?></li>
                          <li><span class="strong">Tax Category ID:</span> <?php echo $contact['PartLeadsDms']['tax_category_id']; ?></li>
					
					


				</ul>
				<div class="separator bottom"></div>
			</div>
			
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<!-- Table -->
		
                
                <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
					<!-- Table heading -->
					<thead>
						<tr>
							<th>History</th>
							<th>Salesperson</th>
							<th>Invoice No</th>
							<th>Invoice Date</th>
							<th>Details</th>
							<th>Notes</th>
							<th style="width:150px;" >Date</th>
						</tr>
					</thead>
					<!-- // Table heading END -->
					<!-- Table body -->
					<tbody>
						<!-- Table row -->
						<?php foreach ($history as $entry) { ?>
						<tr class="text-primary">
							<td><?php echo $entry['PartHistoryLead']['h_type']; ?>&nbsp;</td>
							<td><?php echo ($entry['PartHistoryLead']['sperson'] != '')?  $entry['PartHistoryLead']['sperson'] : "Sales Manager" ; ?>&nbsp;</td>
							<td><?php echo $entry['PartHistoryLead']['invoice_no']; ?>&nbsp;</td>
							<td><?php echo $entry['PartHistoryLead']['invoice_date']; ?>&nbsp;</td>
							<td><?php  
							if($entry['PartHistoryLead']['h_type']=='BDC Survey'&& !empty($entry['PartHistoryLead']['invoice_no'])&& $entry['PartHistoryLead']['cashier']=='contact')
							{
								echo $this->Html->link("<i class='fa fa-fw icon-checkmark-thick'></i> ".$entry['PartHistoryLead']['stock_id'],array('controller'=>'bdc_leads','action'=>'survey_response',$entry['PartHistoryLead']['invoice_no']),array('class'=>'show_survey_response no-ajaxify','style'=>"text-decoration:underline",'escape'=>false));
							}else{						
							echo $entry['PartHistoryLead']['cashier'];
							}
							
							?></td>
							<td style="word-break:break-all;"><?php 
							if($entry['History']['h_type']=='BDC Survey'&& !empty($entry['History']['event_id'])&&$entry['History']['status']=='contact' && !in_array($entry['History']['condition'],array('6','29','15')))
							{
								echo $this->Html->link("<i class='fa fa-fw icon-checkmark-thick'></i> ".$entry['History']['comment'],array('controller'=>'bdc_leads','action'=>'survey_response',$entry['History']['event_id']),array('class'=>'show_survey_response no-ajaxify','style'=>"text-decoration:underline",'escape'=>false));
							}
							echo $entry['PartHistoryLead']['comment'];
							?>&nbsp;
                            </td>
                            <td><?php echo $this->Time->format('n/j/Y g:i A', $entry['PartHistoryLead']['modified']); ?>&nbsp;</td>
						</tr>
						<?php } ?>
						<!-- // Table row END -->
					</tbody>
					<!-- // Table body END -->
				</table>
				<!-- // Table END -->
			</div>
		</div>
	</div>
</div>
<?php //debug($contact);   ?>
<script>
var scr_mode;
$(function(){
	var survey={};
	survey[1]='<?php echo (in_array(1,$recipients))?'yes':'no'; ?>';
	survey[2]='<?php echo (in_array(2,$recipients))?'yes':'no'; ?>';
	survey[3]='<?php echo (in_array(3,$recipients))?'yes':'no'; ?>';
	survey[4]='<?php echo (in_array(4,$recipients))?'yes':'no'; ?>';
	survey[5]='<?php echo (in_array(5,$recipients))?'yes':'no'; ?>';
	survey[6]='<?php echo (in_array(6,$recipients))?'yes':'no'; ?>';
	survey[7]='<?php echo (in_array(7,$recipients))?'yes':'no'; ?>';
	survey[8]='<?php echo (in_array(8,$recipients))?'yes':'no'; ?>';
	survey[9]='<?php echo (in_array(9,$recipients))?'yes':'no'; ?>';
	survey[10]='<?php echo (in_array(10,$recipients))?'yes':'no'; ?>';
	$(".btn-load-survey").click(function(event){
		event.preventDefault();
		$survey_id=$(this).attr('survey-id');
		//alert(survey[$survey_id]);
		//alert($survey_id);
		
		if(survey[$survey_id]=='no')
		{
			alert('Please have Sales Manager add Emails to the SURVEY GROUP LIST for this survey. It is located in the "Settings" section and then try again.');
			return false;
		}
		
		scr_mode=$("#surveyViewToggle").attr('data-id');
		survey_title=$(this).attr('survey-title');
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(scr_mode=='full_screen'){
				$("#lead_details_content").html(data);
				}else
				{
					
					
					bootbox.dialog({
					message: data,
					title: survey_title,
					animate: false
				}).find("div.modal-dialog").addClass("maxWidth");
					var percentageToScroll = 100;
					var percentage = percentageToScroll/100;
					var height = $(document).scrollTop();
					var scrollAmount = height * (1 - percentage);
						//alert(scrollAmount);	
							$('div.maxWidth').parent().animate({ scrollTop: scrollAmount}, 'fast', function () {
												    });
				}
			}
		});
		
	});
	
	
	
		$(".BdcInvalidLead").on('click',function(e){
		e.preventDefault();
		
		lead_id=$(this).attr('data-id');
		//$(this).parent().parent().remove();
		
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/bdc_leads/part_invalid_lead/"+lead_id,
			success: function(data){
				next_id=$("div[lead_row_id="+lead_id+"]").next().attr('lead_row_id');
				$("div[lead_row_id="+lead_id+"]").remove();
				$("#lead_details_content").html('');
				
				if(next_id){
				$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'part_lead_details')); ?>/"+next_id,
				success: function(data){
						$("#lead_details_content").html(data);
							}
						});
				}
			}
		});
		
		});

	//instant message
	
	$("#send_manager_message").click(function(event){
		event.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "Instance Message",
					buttons: {
						success: {
							label: "Ok",
							className: "btn-success",
							callback: function() {
								
								if( $("#ManagerMessageMessage").val() != '' ){

									$("#message_eror").html('');
									$.ajax({
										type: "POST",
										data: $("#ManagerMessageComposeForm").serialize(),
										url: "/manager_messages/send/",
										success: function(data){ 
											return true;
										}
									});
									
								}else{
									 $("#message_eror").html('Please enter message');
									 return false;
								}
							}
						},
					}
				});
				
				
			}
		});
		
		
	});
	
	
$(".show_survey_response").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "BDC Survey",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});
		
	});

$(".view_lead_score").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Score Lead - <?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'].' '.$cleaned.'  Sperson:'.$contact['BdcLead']['sperson'];  ?>",
				}).find("div.modal-dialog").addClass("midWidth");
				}
			}
		});
		
	});
	
});
</script>