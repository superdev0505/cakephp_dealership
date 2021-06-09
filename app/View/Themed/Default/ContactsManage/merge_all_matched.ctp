<?php
	function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
?>
<div class="row">
	<div class="col-md-12">

		<div class='clearfix'>
			<?php echo $this->Form->select('last_one_month', array('yes'=>'Current Month ( '.$dup_count['yes'].' )','no'=>' Show All ('.$dup_count['no'].') '), array('value'=>$last_one_month,'class'=>"form-control input-sm pull-right", 'style'=>"width: 190px; display: inline-block")); ?>
			<div class="separator bottom"></div>
		</div>
		<div class="separator bottom"></div>

		<!-- Table -->
		<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
			<!-- Table heading -->
			<thead>
				<tr>
					<th>Id</th>
					<th width="200">Contact</th>
					<th width="20%">Vehicle</th>
					<th>Status</th>
					<th width="20%">Sales Person</th>
					<th width="15%" >Comment</th>
					<th width="130" style="text-align: center;">Lead to merge with</th>
				</tr>
			</thead>
			<!-- // Table heading END -->
			<!-- Table body -->
			<tbody>
				<!-- Table row -->
				<?php $cnt = 1; foreach ($list_by_modified_contact_id as $cnt_id) {
					$contact = $contact_list[ $cnt_id ];
				?>
				<tr class="text-primary">
					<td><?php echo $contact['Contact']['id']; ?>&nbsp;</td>
					<td>
						<div class="media-body">
							<span class="strong muted">
								<font color="blue"><u><?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'];  ?></u></font>
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


					<i class="fa fa-mobile"></i> Mobile:
					<?php
					echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", preg_replace('/[^0-9]+/', '', $contact['Contact']['mobile'])   ); //Re Format it
					?>
					<br>
					<i class="fa fa-mobile"></i> Phone:
					<?php
					echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", preg_replace('/[^0-9]+/', '', $contact['Contact']['phone'])   ) ;
					?>
					<br>
					<i class="fa fa-mobile"></i> Work:
					<?php
					echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", preg_replace('/[^0-9]+/', '', $contact['Contact']['work_number'])   );
					?>
					<br>



								&nbsp;<i class="fa fa-home"></i>&nbsp;<?php echo $contact['Contact']['city']; ?>
						</span>
					</td>
					<td>

						<span class="muted">
							<?php echo $contact['Contact']['condition']; ?> &nbsp; <?php echo $contact['Contact']['year']; ?>  &nbsp;<?php echo $contact['Contact']['make']; ?> &nbsp;<?php echo $contact['Contact']['model']; ?>
						<?php echo $contact['Contact']['type']; ?></span>
						<span>
						<div>
							<strong>Dormant: <?php
								$startTimeStamp = strtotime($contact['Contact']['modified']);
								$endTimeStamp = strtotime("now");
								$timeDiff = abs($endTimeStamp - $startTimeStamp);
								$numberDays = $timeDiff/86400;  // 86400 seconds in one day
								$numberDays = intval($numberDays);
								echo $numberDays
								?> Day(s)&nbsp;</strong>

							</span>
							<span class="muted">
								<i class="fa fa-calendar"></i> <?php echo date("m/d/Y g:i A", strtotime($contact['Contact']['modified'])); ?>
							</span>
							<span class="muted">
								<?php if($contact['Contact']['email'] != ''){ ?> <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $contact['Contact']['email']; ?></span> <?php } ?>
							</span>
						</div>
					</td>
					<td><?php echo $contact['Contact']['status']; ?></td>
					<td>
						<strong>Originator:</strong> <?php echo $contact['Contact']['owner']; ?><br>
						<strong>Sperson:</strong> <?php echo $contact['Contact']['sperson']; ?><br>
						<strong>Source:</strong> <?php echo $contact['Contact']['source']; ?><br>
						<strong>This Lead is:</strong> <?php echo $contact['Contact']['lead_status']; ?><br>
						<strong>Step:</strong> <?php echo $sales_step_options[ $contact['Contact']['sales_step'] ]; ?>



					</td>
					<td>
						<?php
						//echo 	$contact['Contact']['notes'];

						//echo $cnt_id;




						echo $this->Text->truncate( strip_tags($contact['Contact']['notes']),200,array('html'=>true,
						'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_details no-ajaxify" contact_id = "'.
						$contact['Contact']['id'].'" >Read more</a>'));




						 ?>
						</br></br>
						<hr>
						<i><strong>Last comment:</strong> <?php
						//echo $contact['0']['last_comment'];
						echo $this->Text->truncate( strip_tags($contact['0']['last_comment']),200);


						?></i>

					</td>
					<td align="center">

						 <?php if($cnt == 1){ ?>

						 <input type="radio" name="merge_lead" checked="checked"  id="merge_lead_<?php echo $contact['Contact']['id']; ?>"
						 value="<?php echo $contact['Contact']['id']; ?>"  />
						 <br>
						 	<span class="label label-primary label-stroke">Most Recent Contact</span>
						 <?php }else{ ?>
							 <input type="radio" name="merge_lead"   id="merge_lead_<?php echo $contact['Contact']['id']; ?>"
  						 value="<?php echo $contact['Contact']['id']; ?>"  />
						 	<!--<span class="label label-warning label-stroke">Leads Merge to Above</span>
						 	<span class="duplicate_lead_ides" style="display: none"><?php echo $contact['Contact']['id']; ?></span> -->

						 <?php } ?>


					</td>
				</tr>
				<?php $cnt++; } ?>
				<!-- // Table row END -->
			</tbody>
			<!-- // Table body END -->
		</table>
		<!-- // Table END -->
		Do you want to merge contact ? &nbsp;
			<button id="btn_merge_contact_yes" type="button">Yes</button> &nbsp;
			<button id="btn_merge_contact_no" type="button">No</button>

		<div class="separator"></div>

		<div id="merge_comment" style="display: none;">
			<label for="duplicate_note">Comment:</label>
			<textarea name="duplicate_note" id="duplicate_note"></textarea>
			<button id="btn_merge_contact" type="button">Merge</button>
		</div>

		<!-- Commenting out for Removal.  This feature is not used and is confusing.  Cutting it out. -->
		<!--<div id="remove_duplicate_mark" style="display: none;">
			<label for="duplicate_note_remove">Comment:</label>
			<textarea name="duplicate_note_remove" id="duplicate_note_remove"></textarea>
			<button contact_id = "<?php echo $merge_step; ?>" id="btn_remove_duplicate_mark" type="button">Remove Duplicate Mark</button>
		</div>-->



	</div>
</div>
<script>
	$(function(){
		$("#btn_merge_contact_yes").click(function(event){
			merge_step = $('input:radio[name=merge_lead]:checked').val();
			if(!merge_step){
				alert('Please select lead to merge with');
			}else{
				$("#merge_comment").show();
				$("#remove_duplicate_mark").hide();
			}
		});
		$("#btn_merge_contact_no").click(function(event){
			merge_step = $('input:radio[name=merge_lead]:checked').val();
			//$("#remove_duplicate_mark").show(); Removing becuase this feature is confusing and unused.
			$("#merge_comment").hide();
			bootbox.hideAll();
		});

		//last 30 days toggle
		$("#last_one_month").change(function(event){
			$.ajax({
				type: "GET",
				cache: false,
				<?php if(isset($this->request->query['return_type']) && $this->request->query['return_type'] == 'equity_result'){ ?>
				data: {'return_type':'equity_result'},	
				<?php } ?>	
				url:  "/contacts_manage/merge_all_matched/<?php echo $this->params->pass['0']; ?>/"+$(this).val(),
				success: function(data){
					$(".bootbox-body").html(data);
				}
			});
		});

		//Merge
		$("#btn_merge_contact").click(function(event){

			var duplicate_lead_ids = [];
			$('input[name=merge_lead]').each(function(){
			if(this.checked==false) duplicate_lead_ids.push(this.value);
			});
			/* Removeing to replace with more dynamic option
			var duplicate_lead_ids = [];
			$( ".duplicate_lead_ides").each(function( index ) {
  				duplicate_lead_ids[index] = $( this ).text();
			});
			*/
			//console.log(duplicate_lead_ids);

			merge_step = $('input:radio[name=merge_lead]:checked').val();
			if(!merge_step){
				alert('Please select lead to merge with');
			}else{

				$("#btn_merge_contact").html("Merging...");
				$("#btn_merge_contact").attr("disabled", true);

				$.ajax({
					type: "GET",
					cache: false,
					url:  "/contacts_manage/merge_contact/"+$("#last_one_month").val(),
					data: {'contact_id':merge_step, 'duplicates' : duplicate_lead_ids,  'comment':$('#duplicate_note').val()},
					success: function(data){

						<?php if(isset($this->request->query['return_type']) && $this->request->query['return_type'] == 'equity_result'){ ?>
							
							reload_equity_result();

						<?php }else{ ?>
							location.href = "/contacts/leads_main/view/"+merge_step;
						<?php } ?>

						
					}
				});


			}
		});

		//Removing this feature becuase it is unused and confusing
		//Remove mark
		/*
		$("#btn_remove_duplicate_mark").click(function(event){

			$.ajax({
				type: "GET",
				cache: false,
				url:  "/contacts_manage/remove_duplicate_mark/",
				data: {'contact_id':$(this).attr('contact_id'),'comment':$('#duplicate_note').val()},
				success: function(data){
				 	location.href = "/contacts/leads_main/view/<?php echo $merge_step; ?>";
				}
			});

		});
		*/

	});
</script>
