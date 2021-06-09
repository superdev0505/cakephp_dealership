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
<span class="results"><?php echo $this->Paginator->counter('{:count}');?> Leads Found <i class="icon-circle-arrow-down"></i></span>

<?php
$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>
<div style="text-align:center;margin-top:10px;margin-bottom:5px;">
<?php $old_session_exist=CakeSession::check('c_leads.old_url');
$new_session_exist=CakeSession::check('c_leads.new_url');
if($old_session_exist && $new_session_exist)
{
	//CakeSession::write('c_leads.old_url',$this->here);
	$old_url=CakeSession::read('c_leads.old_url');
	$new_url=CakeSession::read('c_leads.new_url');

	//echo 'not set';
	?>
    <?php  if($this->here!=$old_url){?>
    <a class="label label-inverse no-ajaxify  prevUrlLeads"  href="<?php echo $old_url; ?>">Lead Results View</a>
	<?php }else { ?>

     <a class="label label-inverse no-ajaxify  prevUrlLeads" href="<?php echo $new_url; ?>">Completed Lead View</a>
	<?php } ?>
    <?php
		CakeSession::write('c_leads.new_url',$this->here);
}elseif($old_session_exist && !$new_session_exist){
	CakeSession::write('c_leads.new_url',$this->here);
	$old_url=CakeSession::read('c_leads.old_url');?>
	<a class="label label-inverse no-ajaxify  prevUrlLeads"  href="<?php echo $old_url; ?>">Lead Results View</a>
	<?php
}else
{
	CakeSession::write('c_leads.old_url',$this->here);
}
$label='Old Leads';

if($this->request->params['named']['direction']=='asc')
{
	$label='New Leads';
}
echo $this->Paginator->sort('Contact.modified',$label,array('class'=>'label label-info  no-ajaxify sortLeads'));
?></div>

		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>

<?php

//debug($contacts);

$alert_new_lead  = "0";

$count = 0;	foreach ($contacts as $contact):

	$current_time = strtotime("now");
	$last_modified = strtotime($contact['Contact']['modified']);
	$diff = $current_time - $last_modified;
	if( ($diff/86400) < 30  && $contact['Contact']['lead_status'] == 'Open'){

		if(isset($new_lead_alert_condition) && !empty($new_lead_alert_condition)){
			if( !empty($new_lead_alert_condition['phone']) && $new_lead_alert_condition['phone'] != ''  &&
				in_array($new_lead_alert_condition['phone'], array($contact['Contact']['mobile'], $contact['Contact']['phone'], $contact['Contact']['work_number'])
			)){
				$alert_new_lead = '1';
			}
			if( !empty($new_lead_alert_condition['email']) && $new_lead_alert_condition['email'] != '' &&  $new_lead_alert_condition['email'] =  $contact['Contact']['email']){
				$alert_new_lead = '1';
			}
            if( !empty($new_lead_alert_condition['first_name'])
                && $new_lead_alert_condition['first_name'] != ''
                &&  $new_lead_alert_condition['first_name'] =  $contact['Contact']['first_name']
                && !empty($new_lead_alert_condition['last_name'])
                && $new_lead_alert_condition['last_name'] != ''
                &&  $new_lead_alert_condition['last_name'] =  $contact['Contact']['last_name']){
				$alert_new_lead = '1';
			}
		}
	}

?>



	<div class="col-app  list_search_result border-bottom" alert_new_lead='<?php echo $alert_new_lead;  ?>'  lead_row_id = "<?php echo $contact['Contact']['id'];  ?>" style="cursor: pointer">

		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['Contact']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>

				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><span id='<?php echo $contact['Contact']['id']; ?>_lead_full_name'><?php echo ucwords(strtolower($contact['Contact']['first_name'])) . "&nbsp;" . ucwords(strtolower($contact['Contact']['last_name']));  ?></span></u></font>
					<?php
					if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
	                                } else if ($contact['ContactStatus']['name'] == 'Web Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
                                        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
						echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Showroom') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Parts') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Service') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Call Center') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Rental') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					}
					?>&nbsp; #<?php echo $contact['Contact']['id']; ?>
				</span>
			</div>

			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['Contact']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					//echo $cleaned;

					echo $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$contact['Contact']['dnc_status'],
						$cleaned,
						$contact['Contact']['modified'],
					 	$contact['Contact']['sales_step']);


					if($contact['Contact']['dnc_status'] == 'not_call' || $contact['Contact']['dnc_status'] == 'no_call_email'){
						echo " <i style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
					}
					?>





					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['Contact']['city']; ?>
			</span>

			<span class="muted">
				<?php echo $contact['Contact']['condition']; ?> &nbsp; <?php echo $contact['Contact']['year']; ?>  &nbsp;<?php echo $contact['Contact']['make']; ?> &nbsp;<?php echo $contact['Contact']['model']; ?>
			<?php echo $contact['Contact']['type']; ?></span>
			<span>
			<strong>Dormant: <?php

				//debug($contact);

				$event_start = 0;
				if($contact['Event']['start'] != ''){
					$event_start = strtotime($contact['Event']['start']);
				}
				$startTimeStamp = strtotime($contact['Contact']['modified']);
				if($event_start > $startTimeStamp){
					$startTimeStamp = $event_start;
				}
				$endTimeStamp = strtotime("now");

				if($startTimeStamp > $endTimeStamp){
					$numberDays = 0;
				}else{
					$timeDiff = abs($endTimeStamp - $startTimeStamp);
					$numberDays = $timeDiff/86400;  // 86400 seconds in one day
					$numberDays = intval($numberDays);
				}
				echo $numberDays
				?> Day(s)&nbsp;</strong>

			</span>

			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['Contact']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['Contact']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['Contact']['email']; ?></span> <?php

					if($contact['Contact']['dnc_status'] == 'not_email' || $contact['Contact']['dnc_status'] == 'no_call_email'){
						echo " <i style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
					}

				 } ?>
			</span>

			<?php if(isset($rds[$contact['Contact']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['Contact']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?>
			<?php if(isset($yds[$contact['Contact']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['Contact']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?>
			 <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['Contact']['sperson'] ?>&nbsp;</span>
			<span><strong>Comment:</strong>&nbsp;
			<?php

				echo $this->Text->truncate( strip_tags($contact['Contact']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['Contact']['id'].'" >Read more</a>'));

			?>&nbsp;</span>
			<br>

				<?php if($contact['Contact']['lead_status'] =='Open'){ ?>
				<span class="strong">This Lead is:
					<i class="fa fa-folder-open-o"></i>
					<?php echo $contact['Contact']['lead_status']; ?>
				</span>

				<?php }else if($contact['Contact']['lead_status'] =='Closed'){ ?>

					<?php if($contact['Contact']['sales_step'] == '10'){ ?>
						<span class="strong text-danger" >This Lead is:
							<i class="fa fa-dollar text-success"></i>
							<span class="text-success"><?php echo $contact['Contact']['lead_status']; ?></span>
						</span>
					<?php }else{ ?>
					<span class="strong text-danger">This Lead is:
						<i class="fa fa-times-circle"></i>
						<?php echo $contact['Contact']['lead_status']; ?>
					</span>
					<?php } ?>

				<?php } ?>




		</div>

</div>
<?php $count++; endforeach; ?>


<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>




<?php //echo $this->element('sql_dump'); ?>
<script>


$(function() {

	$(".read_more_contact_note_search_result").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});


	});



	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		//$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){
				$('#search-result-content').html(results);
			}
		});
	});



	$(".lnk_merge_all_matched").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "List of possible duplicate contacts",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
	});


	$(".lnk_merge_partial_matched").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id'),
			success: function(data){

				bootbox.dialog({
					message: data,
					title: "List of possible duplicate contacts",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
	});


	<?php
	//Load First Lead
	if(isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'load_first' && !empty($contacts)){
	?>

	setTimeout(function(){
		//$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'lead_details',$contacts[0]['Contact']['id'])); ?>",
			success: function(data){
				$("#lead_details_content").html(data);
				//$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			},
			error: function (xhr, ajaxOptions, thrownError) {
				ajax_fails_alert();
			}
		});
	}, 1000);


	<?php } ?>







	<?php if($alert_new_lead == '1'){ ?>
		$("#start_new_lead, #lnk_add_new_lead").attr('alert_new_lead', "1");
	<?php } ?>






    $(".list_search_result").click(function() {



    	if( $("#ContactSearchAll2").val() != ''){
    		$("#start_new_lead, #lnk_add_new_lead").attr('lead-id',$(this).attr('lead_row_id'));
    		$("#start_new_lead, #lnk_add_new_lead").attr('alert_new_lead',$(this).attr('alert_new_lead'));


    		$("#new_lead_selected").html( " For " + $("#"+$(this).attr('lead_row_id')+"_lead_full_name").html() );
    	}


    	$("#lead_details_content").html("");
		//$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'lead_details', 'selected_lead_type'=>$selected_lead_type)); ?>/"+$(this).attr('lead_row_id'),
			success: function(data){
				$("#lead_details_content").html(data);
				//$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			},
			error: function (xhr, ajaxOptions, thrownError) {
				ajax_fails_alert();
			}
		});


    });


	$(".prevUrlLeads").on('click',function(e){
		e.preventDefault();
		url_search_data = {};
		search_url=$(this).attr('href');
		//alert('123');
		$('.ajax-loading').removeClass('hide');
		search_all_view(search_url, url_search_data);

		});
});



</script>
