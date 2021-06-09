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


<a href="#" style="display:none;" id="prev_l_sort" data-id="<?php echo $l_sort; ?>"></a>
<?php 
$selected_lead_type = "";
if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
	$selected_lead_type = $this->request->params['named']['selected_lead_type'];
}
?>

<div class="wizard">
	<div class="widget widget-tabs widget-tabs-responsive">
		<!-- Widget heading -->
		<div class="widget-head" style="padding:0;">
									<ul style="font-weight:bold;">
										<li class="active"><a href="#tab-new"  data-toggle="tab" style="padding:0 3px;"><i></i>New(<?php echo count($contacts['new']); ?>)</a></li>
                                        <li><a href="#tab-callback"  data-toggle="tab" style="padding:0 3px;"><i></i>CBK(<?php echo count($contacts['call_back']); ?>)</a></li>
                                        <li><a href="#tab-no-contact"  data-toggle="tab" style="padding:0 3px;"><i></i>No Contact(<?php echo count($contacts['no_contact']); ?>)</a></li>
                                         <li><a href="#tab-voicemail"  data-toggle="tab" style="padding:0 3px;"><i></i>VM(<?php echo count($contacts['voicemail']); ?>)</a></li>
                                        <li><a href="#tab-contact"  data-toggle="tab" style="padding:0 3px;"><i></i>Contact(<?php echo count($contacts['contact']); ?>)</a></li>
										
										<li><a href="#tab-bad-number"  data-toggle="tab" style="padding:0 3px;"><i></i>Bad(<?php echo count($contacts['bad_number']); ?>)</a></li>
                                       
                                        
									</ul>
                               
				</div>
                <div class="widget-body"> 
									<div class="tab-content">
										
										<div class="tab-pane active" id="tab-new">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php 
//New contact list

$count = 0;	foreach ($contacts['new'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['BdcLead']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['BdcLead']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></u></font>
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
					?>&nbsp; #<?php echo $contact['BdcLead']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['BdcLead']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['BdcLead']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['BdcLead']['condition']; ?> &nbsp; <?php echo $contact['BdcLead']['year']; ?>  &nbsp;<?php echo $contact['BdcLead']['make']; ?> &nbsp;<?php echo $contact['BdcLead']['model']; ?>
			</span>
			 <span><strong>Type:</strong><?php echo $contact['BdcLead']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['BdcLead']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				//echo $numberDays
				echo $contact[0]['days'];
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['BdcLead']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['BdcLead']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['BdcLead']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?>
            <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['BdcLead']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Comment:</strong>&nbsp;<?php echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['BdcLead']['id'].'" >Read more</a>'));	 ?>&nbsp;</span> 
                
			
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>
<?php // contact leads  ?>

<div class="tab-pane" id="tab-contact">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['contact'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['BdcLead']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['BdcLead']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></u></font>
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
					?>&nbsp; #<?php echo $contact['BdcLead']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['BdcLead']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['BdcLead']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['BdcLead']['condition']; ?> &nbsp; <?php echo $contact['BdcLead']['year']; ?>  &nbsp;<?php echo $contact['BdcLead']['make']; ?> &nbsp;<?php echo $contact['BdcLead']['model']; ?></span>
			 <span><strong>Type:</strong><?php echo $contact['BdcLead']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['BdcLead']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				//echo $numberDays
				echo $contact[0]['days'];
				?> Day(s)&nbsp;</strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['BdcLead']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['BdcLead']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['BdcLead']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?> 
			 <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['BdcLead']['sperson'] ?>&nbsp;</span><br/>
															<span><strong>Comment:</strong>&nbsp;<?php echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['BdcLead']['id'].'" >Read more</a>'));	 ?>&nbsp;</span>
              <span><strong>BDC CSR Status:</strong>&nbsp; Contact &nbsp;</span><br/>
              <?php if (isset($bdc_status_leads[$contact['BdcLead']['id']])){
					$bdc_status_arr =   explode('###',$bdc_status_leads[$contact['BdcLead']['id']]); 
				?>
                <span><strong>BDC Customer Status:</strong>&nbsp;<?php echo $bdc_status_arr[0]; ?>&nbsp;</span><br/>
                <span><strong>Last BDC Contact Date:</strong>&nbsp;<?php echo date('m/d/Y h:i A',strtotime($bdc_status_arr[1])); ?>&nbsp;</span><br/>
			   <?php } ?>  
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // call back leads tab ?>

<div class="tab-pane" id="tab-callback">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['call_back'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['BdcLead']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['BdcLead']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></u></font>
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
					?>&nbsp; #<?php echo $contact['BdcLead']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['BdcLead']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['BdcLead']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['BdcLead']['condition']; ?> &nbsp; <?php echo $contact['BdcLead']['year']; ?>  &nbsp;<?php echo $contact['BdcLead']['make']; ?> &nbsp;<?php echo $contact['BdcLead']['model']; ?></span>
			 <span><strong>Type:</strong>
			<?php echo $contact['BdcLead']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['BdcLead']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				//echo $numberDays
				
				echo $contact[0]['days'];
				?> Day(s)&nbsp;<?php //echo $contact[0]['days']; ?></strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['BdcLead']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['BdcLead']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['BdcLead']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?> 
			 <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['BdcLead']['sperson'] ?>&nbsp;</span><br />
															<span><strong>Comment:</strong>&nbsp;<?php echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['BdcLead']['id'].'" >Read more</a>'));	 ?>&nbsp;</span> <br />
                  <span><strong>BDC CSR Status:</strong>&nbsp; Call Back &nbsp;</span><br/>
         <?php if (isset($bdc_status_leads[$contact['BdcLead']['id']])){
					$bdc_status_arr =   explode('###',$bdc_status_leads[$contact['BdcLead']['id']]); 
				?>
                <span><strong>BDC Customer Status:</strong>&nbsp;<?php echo $bdc_status_arr[0]; ?>&nbsp;</span><br/>
                <span><strong>Last BDC Contact Date:</strong>&nbsp;<?php echo date('m/d/Y h:i A',strtotime($bdc_status_arr[1])); ?>&nbsp;</span><br/>
			   <?php } ?>      
    <?php if(!empty($contact['BdcSurvey']['call_back_date'])) {?>
	 <span><strong>CallBack Date: </strong>&nbsp;<?php echo date('D - M d,Y',strtotime($contact['BdcSurvey']['call_back_date'])); ?>&nbsp;</span>
<?php }
if(!empty($contact['BdcSurvey']['call_back_msg'])) {
?> 
 <span><strong>Message: </strong>&nbsp;<?php echo $contact['BdcSurvey']['call_back_msg']; ?>&nbsp;</span>
<?php } ?>                                                      
                                                            
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // No Contact Leads ?>

<div class="tab-pane" id="tab-no-contact">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['no_contact'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['BdcLead']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['BdcLead']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></u></font>
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
					?>&nbsp; #<?php echo $contact['BdcLead']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['BdcLead']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['BdcLead']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['BdcLead']['condition']; ?> &nbsp; <?php echo $contact['BdcLead']['year']; ?>  &nbsp;<?php echo $contact['BdcLead']['make']; ?> &nbsp;<?php echo $contact['BdcLead']['model']; ?>
			</span>
			 <span><strong>Type:</strong><?php echo $contact['BdcLead']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['BdcLead']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				//echo $numberDays
				echo $contact[0]['days'];
				?> Day(s)&nbsp;</strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['BdcLead']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['BdcLead']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['BdcLead']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?> 
			 <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['BdcLead']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Comment:</strong>&nbsp;<?php echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['BdcLead']['id'].'" >Read more</a>'));	 ?>&nbsp;</span><br/> 
                <span><strong>BDC CSR Status:</strong>&nbsp; No Contact &nbsp;</span><br/>
                 <?php if (isset($bdc_status_leads[$contact['BdcLead']['id']])){
					$bdc_status_arr =   explode('###',$bdc_status_leads[$contact['BdcLead']['id']]); 
				?>
                <span><strong>BDC Customer Status:</strong>&nbsp;<?php echo $bdc_status_arr[0]; ?>&nbsp;</span><br/>
                <span><strong>Last BDC Contact Date:</strong>&nbsp;<?php echo date('m/d/Y h:i A',strtotime($bdc_status_arr[1])); ?>&nbsp;</span><br/>
			   <?php } ?>  
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // Bad Number leads   ?>

<div class="tab-pane" id="tab-bad-number">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['bad_number'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['BdcLead']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['BdcLead']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></u></font>
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
					?>&nbsp; #<?php echo $contact['BdcLead']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['BdcLead']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['BdcLead']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['BdcLead']['condition']; ?> &nbsp; <?php echo $contact['BdcLead']['year']; ?>  &nbsp;<?php echo $contact['BdcLead']['make']; ?> &nbsp;<?php echo $contact['BdcLead']['model']; ?>
			</span>
			 <span><strong>Type:</strong><?php echo $contact['BdcLead']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['BdcLead']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				//echo $numberDays
				echo $contact[0]['days'];
				?> Day(s)&nbsp;</strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['BdcLead']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['BdcLead']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['BdcLead']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?> 
			 <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['BdcLead']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Comment:</strong>&nbsp;<?php echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['BdcLead']['id'].'" >Read more</a>'));	 ?>&nbsp;</span> 
                <br/> <span><strong>BDC CSR Status:</strong>&nbsp; Bad Number &nbsp;</span><br/>
                 <?php if (isset($bdc_status_leads[$contact['BdcLead']['id']])){
					$bdc_status_arr =   explode('###',$bdc_status_leads[$contact['BdcLead']['id']]); 
				?>
                <span><strong>BDC Customer Status:</strong>&nbsp;<?php echo $bdc_status_arr[0]; ?>&nbsp;</span><br/>
                <span><strong>Last BDC Contact Date:</strong>&nbsp;<?php echo date('m/d/Y h:i A',strtotime($bdc_status_arr[1])); ?>&nbsp;</span><br/>
			   <?php } ?>  
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // Voicemail Leads  ?>

<div class="tab-pane" id="tab-voicemail">
										
											<div class=" unstyled"  style="max-height: 500px; overflow: auto">
<?php $count = 0;	foreach ($contacts['voicemail'] as $contact): 	?>
	<div class="col-app  list_search_result border-bottom"  lead_row_id = "<?php echo $contact['BdcLead']['id'];  ?>" style="cursor: pointer">
	
		<div class="media innerAll">
			<div class="media-object pull-left thumb">
				<?php if($contact['BdcLead']['lead_status'] == 'Closed'){ ?>
				<i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
				<?php } ?>
				
				<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" style="width: 32px" alt="Image" />
			</div>
			<div class="media-body">
				<span class="strong muted">
					<font color="blue"><u><?php echo $contact['BdcLead']['first_name'] . "&nbsp;" . $contact['BdcLead']['last_name'];  ?></u></font>
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
					?>&nbsp; #<?php echo $contact['BdcLead']['id']; ?>
				</span>
			</div>
		
			<span class="muted">
				<i class="fa fa-mobile"></i>
					<?php $phone = $contact['BdcLead']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['BdcLead']['city']; ?> 
			</span>	

			<span class="muted">
				<?php echo $contact['BdcLead']['condition']; ?> &nbsp; <?php echo $contact['BdcLead']['year']; ?>  &nbsp;<?php echo $contact['BdcLead']['make']; ?> &nbsp;<?php echo $contact['BdcLead']['model']; ?>
			</span>
			 <span><strong>Type:</strong><?php echo $contact['BdcLead']['type']; ?></span>
			<span>
			<strong>Dormant: <?php 
				$startTimeStamp = strtotime($contact['BdcLead']['created']);
				$endTimeStamp = strtotime("now");
				$timeDiff = abs($endTimeStamp - $startTimeStamp);
				$numberDays = $timeDiff/86400;  // 86400 seconds in one day
				$numberDays = intval($numberDays);
				//echo $numberDays
				echo $contact[0]['days'];
				?> Day(s)&nbsp;</strong>
			
			</span>
			
			<span class="muted">
				<i class="fa fa-calendar"></i> <?php echo $contact['BdcLead']['modified_full_date']; ?>
			</span>
			<span class="muted">
				<?php if($contact['BdcLead']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['BdcLead']['email']; ?></span> <?php } ?>	
			</span> 
			
			<?php if(isset($rds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
			<?php } ?> 
			<?php if(isset($yds[$contact['BdcLead']['id']])){ ?>
			 <a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $contact['BdcLead']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
			<?php } ?> 
			 <span><strong>Sales Person:</strong>&nbsp;<?php echo $contact['BdcLead']['sperson'] ?>&nbsp;</span>
															<br /><span><strong>Comment:</strong>&nbsp;<?php echo $this->Text->truncate( strip_tags($contact['BdcLead']['notes']),200,array('html'=>true,
				'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
				$contact['BdcLead']['id'].'" >Read more</a>'));	 ?>&nbsp;</span>
                     <br/> <span><strong>BDC CSR Status:</strong>&nbsp; Voicemail &nbsp;</span><br/>                                       
                <?php if (isset($bdc_status_leads[$contact['BdcLead']['id']])){
					$bdc_status_arr =   explode('###',$bdc_status_leads[$contact['BdcLead']['id']]); 
				?>
                <span><strong>BDC Customer Status:</strong>&nbsp;<?php echo $bdc_status_arr[0]; ?>&nbsp;</span><br/>
                <span><strong>Last BDC Contact Date:</strong>&nbsp;<?php echo date('m/d/Y h:i A',strtotime($bdc_status_arr[1])); ?>&nbsp;</span><br/>
			   <?php } ?>                                             
		</div>
</div>
<?php $count++; endforeach; ?>

</div>
</div>

<?php // End leads ?>
</div>
</div>
</div>
</div>
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
	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		$url = $(this).attr('href');
		if(!$(this).hasClass('sortLeads')){
		if(!$url.match(/page:/))
		{
		position = $url.indexOf("equity_search_result"); 	
		position += 18;
		$url = [$url.slice(0, position), 'page:1/', $url.slice(position)].join('');
		

		}
		}
		//$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $url,
			type: "get",
			cache: false,
			success: function(results){ 
				$('#search-result-content').html(results);
			}
		});
	});
	
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
	
	
	<?php if(isset($this->request->params['named']['search_all'])&& in_array($this->request->params['named']['search_all'],array('today_callback','sold_today_callback'))){?>
	$('a[href="#tab-callback"]').trigger('click');
	<?php } ?>
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
				});			
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
				});			
			}
		});
	});
	

	<?php 
	//Load First Lead
	$id='';
		if(!empty($contacts['new']))
		{
			$id=$contacts['new'][0]['BdcLead']['id'];
		}
		elseif(!empty($contacts['contact']))
		 {
			 $id=$contacts['contact'][0]['BdcLead']['id'];  
		 }
		 elseif(!empty($contacts['no_contact']))
		 {
			 $id=$contacts['no_contact'][0]['BdcLead']['id'];  
		 }
		 elseif(!empty($contacts['bad_number']))
		 {
			 $id=$contacts['bad_number'][0]['BdcLead']['id'];  
		 }
		 elseif(!empty($contacts['voicemail']))
		 {
			 $id=$contacts['voicemail'][0]['BdcLead']['id'];  
		 }
		 elseif(!empty($contacts['call_back']))
		 {
			 $id=$contacts['call_back'][0]['BdcLead']['id'];  
		 }
	if(isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'load_first' && !empty($contacts)&& $id!=''){
	?>
	$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
	$.ajax({
		type: "GET",
		cache: false,
		url:  "<?php 
		
		echo $this->Html->url(array('action' => 'lead_details','event_solds' => $event_lead_type,$id)); ?>",
		success: function(data){
			$("#lead_details_content").html(data);
			$("#lead_details_content").prev('.ajax-loading').addClass('hide');
		}
	});
	<?php } ?>

    $(".list_search_result").click(function() {

		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('action' => 'lead_details', 'selected_lead_type'=>$selected_lead_type,'event_solds' => $event_lead_type)); ?>/"+$(this).attr('lead_row_id'),
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		
		
    });
});



</script>
	