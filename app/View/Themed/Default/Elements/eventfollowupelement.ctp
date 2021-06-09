<?php echo $this->element('table_header_followup_report',array('event'=>'yes')); ?>
	<?php
if($export){
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
}else{
	$style = '';
	}
	
	$group_id = AuthComponent::user('group_id');
	
	$TotalContainerId = $Tab."Total_".$SecId;
	$dealer_settings = $this->App->getDealerSettings(array('move_lead_allowed_group'),AuthComponent::user('dealer_id'));

?>
	<?php
		if(is_array($arrResults) && count($arrResults)>0){
			$i = 1;
			foreach($arrResults as $details){
				$histories = $details['Histories'];
				$details = $details['C'];
				if($details['id']==71134){
					//prx($histories);
				}
				
				if($i%2==0){
					$style  = 'style="background-color:#f7f7f7"';
				}else{
						$style  = '';
				}
			?>
			<tr class="gradeA <?php if($checked){ echo 'tr_checked'; }else{ echo 'tr_unchecked';} ?>">
				<td rowspan="1" <?php echo $style;?>><?php echo $details['contact_id'];?>
				<?php
					if(date("Y-m-d",strtotime($details['modified']))==date("Y-m-d")){
				?>
					<img src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/img/icon_quality.png" width="30" height="30" />
				<?php
				}
				?>
				</td>
				<td <?php echo $style;?> ><?php echo date("m/d/Y",strtotime($details['end']));?><br><?php echo date("g:i A",strtotime($details['end']));?></td>
				<td <?php echo $style;?> ><?php echo date("m/d/Y",strtotime($details['modified']));?><br><?php echo date("g:i A",strtotime($details['modified']));?></td>
				<td <?php echo $style;?> ><?php echo $details['fullname'];?></td>
				<td <?php echo $style;?> ><?php echo "<b>Phone#:</b> ".$this->Dncprocess->show_phone($dnc_manual_uplaod_process,$details['dnc_status'], $details['phone'],$details['modified'],$details['salestep']);?><br/><?php echo "<b>Mobile#:</b> ".$this->Dncprocess->show_phone($dnc_manual_uplaod_process,$details['dnc_status'], $details['mobile'],$details['modified'],$details['salestep']);?><br/><?php echo "<b>Email:</b> ".$details['email'];?><br/><?php echo "<b>Work Number:</b> ".$this->Dncprocess->show_phone($dnc_manual_uplaod_process,$details['dnc_status'], $details['work_number'],$details['modified'],$details['salestep']);?></td>
				<td <?php echo $style;?> ><?php echo $details['vehicle'];?></td>

				<td <?php echo $style;?> >
					<?php echo $details['title'];?>, <br>
					<?php echo $details['details'];?>, <br>
					<?php echo $details['status'];?>
				</td> 

				<td <?php echo $style;?> >
				<?php 
					/* Check for BDC Survey */
					/*
					if(isset($histories['last'])){
						$entry = $histories['last'];
						//foreach($histories['all'] as $entry){
							if($entry['History']['h_type']=='BDC Survey'&& !empty($entry['History']['event_id']))
							{
								 
								  $comment = "<a href='javascript:void(0)' onclick='return ShowSurveyResponse(".$entry['History']['event_id'].")' >".$entry['History']['comment']."</a>";
								 
								//break;
								//break;
							}
							else
							{
								$comment = $details['comment'];
							} 
						//}
						echo $comment;
					}else{
						echo $details['comment'];
					}
					*/
				//	echo $details['comment'];

					echo $this->Text->truncate( strip_tags($details['comment']),200,array('html'=>true,
					'ellipsis'=>'<br><a onclick="read_more_workload('.$details['contact_id'].')"  href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_workload no-ajaxify" contact_id = "'.
					$details['id'].'" >Read more</a>'));


				?>
				
				</td>
				<td <?php echo $style;?> ><?php echo $details['salesperson'];?></td>
                <td <?php echo $style;?> >
				
				<div class="btn-group pull-right" >
				
					<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown" onclick="InitFuncs()">
						Actions
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">
						
						
						<?php if($details['salestep'] != 'Sold'){ ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['contact_id'],'workload'=>'workload', '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Email Update (All)</a>
						</li>
						<?php } ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['contact_id'],'workload'=>'workload', '?'=> array('update_type'=>'Outbound Call Update') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Outbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['contact_id'],'workload'=>'workload', '?'=> array('update_type'=>'Inbound Call Update') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Inbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['contact_id'],'workload'=>'workload', '?'=> array('update_type'=>'Showroom Visit Update') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Step Update</a>
						</li>
						<?php if($details['salestep'] != 'Sold'){ ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['contact_id'],'workload'=>'workload', '?'=> array('update_type'=>'Dead Lead (Closed)') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Dead Lead (Closed)</a>
						</li>
						
						<li>
							<a id="work_lead_link2" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input_edit', $details['contact_id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="no-ajaxify work_lead_link" user_id="<?php echo $details['user_id'];?>" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Sold Update - Floor</a>
						</li>
						<?php } ?>

						<li><a   href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['contact_id'], 'workload'=>'workload', '?'=> array('update_type'=>'Set Appointment') ));

						 ?>" class='no-ajaxify status_note_update' user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-plus"></i> New Event</a></li>

						<?php if(in_array($group_id, explode(',', $dealer_settings['move_lead_allowed_group']))) {  ?>
						<li>
							<a id="transfer_lead_link" href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_transfer', $details['contact_id'],'workload'=>'workload')); ?>" class="no-ajaxify transfer_lead_link" user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-user"></i> Move Lead</a>
						</li>
						<?php } ?>
						
						<?php if($group_id == 1 || $group_id == 2 || $group_id == 4){  ?>
						<li>
							<a id="send_manager_message" href="<?php echo $this->Html->url(array('controller'=>'manager_messages','action'=>'compose', $details['contact_id'],'workload'=>'workload')); ?>" class="no-ajaxify send_manager_message" user_id="<?php echo $details['user_id'];?>"  >
								MGR <i class="fa fa-comment"></i>
							</a>
						</li>
						<?php }  ?>

						<li>
							<a id="work_lead_link" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input_edit', $details['contact_id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="no-ajaxify work_lead_link"  user_id="<?php echo $details['user_id'];?>" ><i class="fa fa-pencil"></i> Edit Lead</a>
						</li>
						
						
					</ul>
				
				</div>
				<div class="separator"></div>
				<div class="pull-right" >
					<button <?php if(!isset($histories['all']) || count($histories['all'])<=0){ echo 'disabled="disabled"'; } ?>  type="button" class="btn  btn-inverse     show_history" style="float:right;width:87px;margin-top:10px;" onclick="ShowHistory(<?php echo $details['id'];?>)" toggleId="<?php echo $details['id'];?>"><?php if(isset($histories['SuccessfulSurvey']) && $histories['SuccessfulSurvey']==true){ echo "Survey"; }else{ echo "History"; } ?>
						
					</button>
				<div>
				</td>
			</tr>

			
			<!-- Show history as toggle -->
			<tr  style="display: none"  id="history_<?php echo $details['id'];?>" >
				<td colspan="12" >
				
					<div class="row">
					<div class="col-md-12">


						<?php 

						//History tab
					        $history_types = array(
					        	'Lead'=>'user',
					        	'Event'=>'alarm',
					        	'Lead Arrived'=>'cloud',
					        	'New CRM Move'=>'list',
					        	'BDC REP Web Lead'=>'cogwheel',
					        	'BDC Survey'=>'list',
					        	'BDC Survey Call Back'=>'list',
					        	'Deal'=>'list',
					        	'DNC Status '=>'list',
					        	'Email'=>'envelope',
					        	'Lead Score'=>'list',
					        	'Lead_duplicate'=>'list',
					        	'Location Transfer'=>'list',
					        	'MMS'=>'list',
					        	'Note Update'=>'list',
					        	'Source Changed'=>'list',
					        	'Staff Transfer'=>'list',
					        	'Merge'=>'list',
					        );

						//process history
					 	$history_ar = array();
				        foreach ($histories['all'] as $his) {
				        	$duplicate_key = check_duplicate_status($history_ar[ trim($his['History']['h_type']) ],  $his  );
				        	if( $duplicate_key === false  ){
				        		$history_ar[ trim($his['History']['h_type']) ][] = $his;
				        	}
				        }
						//debug($history_ar);

						 ?>





						 <?php if(!empty($history_ar)){ ?>

<!-- Widget -->
<div class="widget widget-tabs widget-tabs-responsive history_tabs">

	<!-- Widget heading -->
	<div class="widget-head ">
		<ul>
			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) { 
				if(!empty($history_ar[$key])){
			?>
			<li  <?php echo ($cnt == 1)? 'class="active"' : '' ;  ?>         >
				<a class="glyphicons <?php echo $value;  ?>" href="#content_<?php echo str_replace(" ", "_", $key);  ?>_<?php echo $details['id'];?>" data-toggle="tab">
					<i></i><span><?php echo $key;  ?> (<?php echo count($history_ar[$key]);  ?>) </span>
				</a>
			</li>	
			<?php $cnt++; } }  ?>

			<?php
			$history_others = array(); 
			foreach ($history_ar as $key => $value) { 
				if(!isset($history_types[$key])){
					foreach($value as $v){
						$history_others[] = $v;	
					}
			 	}
			 }

			 if(!empty($history_others)){
			?>
			<li >
				<a class="glyphicons log_book" href="#content_others_<?php echo $details['id'];?>" data-toggle="tab">
					<i></i><span>Others (<?php echo count($history_others);  ?>) </span>
				</a>
			</li>

			<?php  } ?>


			<li>

				<span style="float:right;"><a href="javascript:void();" onclick="$('#history_<?php echo $details['id'];?>').hide();" style="">( X )</a></span>
				
			</li>



		</ul>
	</div>
	<!-- // Widget heading END -->
	
	<div class="widget-body">
		<div class="tab-content">
		
				

			<?php
			$cnt = 1;
			 foreach ($history_types as $key => $value) { 
				if(!empty($history_ar[$key])){
			?>	
			<div id="content_<?php echo str_replace(" ", "_", $key);  ?>_<?php echo $details['id'];?>" class="tab-pane <?php echo ($cnt == 1)? 'active' : '' ;  ?>">
				<?php echo $this->element('history_content_recap', array('htype' => $key,'history'=>$history_ar[$key])); ?>
			</div>
			<?php $cnt++; } }  ?>

			<?php
			 if(!empty($history_others)){
			?>
			<div id="content_others_<?php echo $details['id'];?>" class="tab-pane">
				<?php echo $this->element('history_content_recap', array('htype' => '','history'=>$history_others)); ?>
			</div>
			<?php  } ?>
			
		</div>
	</div>
</div>
<!-- // Widget END -->
<?php  }else{ ?>

<h3>History not available</h3>
<?php  } ?>







					</div>
				</div>
				
				</td>
			</tr>
			
			
			
			
			<?php
			$i++;
			}
		}
		?>
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->
			
			<?php
			$Fraction = 4;
			$RecordsPerSecOpt = "";
			$SelectId = "SelRecSize".$Tab."_".$SecId;
			$OptionsShown = array();
			for($i=$Fraction;$i<=$TotalCount;$i=($i+$Fraction)){
				if($RecordsPerSec==$i){
					$RecordsPerSecOpt .= "<option value='$i' selected='selected'>$i</option>";
				}else{
					$RecordsPerSecOpt .= "<option value='$i'>$i</option>";
				}
				if($i>$TotalCount){
					$i = $TotalCount;
				}
				$OptionsShown[] = $i;
			}
			
			if(!in_array($TotalCount,$OptionsShown) && $TotalCount>0){
				if($RecordsPerSec==$TotalCount){
					$RecordsPerSecOpt .= "<option value='$TotalCount' selected='selected'>$TotalCount</option>";
				}else{
					$RecordsPerSecOpt .= "<option value='$TotalCount'>$TotalCount</option>";
				}
			}
			?>
			
			<script>
			
				$("#<?php echo $TotalContainerId;?>").text("(Total Records - <?php echo $TotalCount;?>)");
				// $("#<?php echo $SelectId;?>").empty();
				// $("#<?php echo $SelectId;?>").append("<?php echo $RecordsPerSecOpt;?>");
				ShowCompleted();
			</script>