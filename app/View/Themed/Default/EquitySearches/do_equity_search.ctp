<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>

<div class='row'>
	<div class="col-md-2">
		<div style="margin-top: 14px;" class="text-primary">
			<?php echo $this->Paginator->counter('{:count}');?> Leads Found <i class="icon-circle-arrow-down"></i>
		</div>

	</div>
	<div class="col-md-5">

		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>

	</div>

	<div class="col-md-5">
		<div class="right">
			<a href="/equity_searches/print_equity_search" target="_blank" class="btn btn-inverse pull-right" id="print-equity-result"><i class="fa fa-print"></i> Print</a>
		</div>
	</div>

</div>




<?php
$style = 'style="font-size:14px;vertical-align:middle"';
?>
<div id="equit-print-area">
<style>
@media print{
	.noprint{display:none;}
	}

</style>

<!-- Table -->
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
	<tr>
		<tr>
			<th  <?php echo $style;?>>ID#</th>
			 <th  <?php echo $style;?>>Created</th>
			 <th  <?php echo $style;?>>Last Modified</th>
			 <th  <?php echo $style;?>>Next Activity</th>
			<th  <?php echo $style;?>>Name</th>
			<th  <?php echo $style;?>>Contact #</th>
			<th  <?php echo $style;?>>Vehicle</th>

			<th  <?php echo $style;?>>Visit Info</th>


			<th width="200px"  <?php echo $style;?>>Comment</th>
			<th width="65px" <?php echo $style;?>>Staff</th>
			<th width="45px" class="noprint" <?php echo $style;?>>Action</th>
		</tr>
	</tr>
	</thead>
	<tbody>

<?php
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
	$group_id = AuthComponent::user('group_id');
?>


<?php

//debug($contacts);

			$i = 0;
			foreach($contacts as $details){
				if($i%2==0){
					$style  = 'style="background-color:#f7f7f7"';
				}else{
					$style  = '';
				}
				$checked = false;

			?>
			<tr class="gradeA <?php if($checked){ echo 'tr_checked'; }else{ echo 'tr_unchecked';} ?>">
				<td rowspan="1" <?php echo $style;?> >
					<?php echo $details['Contact']['id'];?>
				</td>
				<td <?php echo $style;?> >
					<?php echo date("m/d/Y",strtotime($details['Contact']['created']));?>
					<br><?php echo date("g:i A",strtotime($details['Contact']['created']));?>
				</td>
				<td <?php echo $style;?> >
					<?php echo date("m/d/Y",strtotime($details['Contact']['modified']));?><br>
					<?php echo date("g:i A",strtotime($details['Contact']['modified']));?>
				</td>
				<td <?php echo $style;?> >
					<?php
				if($details['Event']['start']!=''){
				?><?php echo date("m/d/Y",strtotime($details['Event']['start']));?><br><?php echo date("G:i A",strtotime($details['Event']['start']));?>
				<?php
				}else{
					echo "No Event Set";
				}
				?></td>
				<td <?php echo $style;?> >
					<?php
						$spouseName = "";
						if($details['Contact']['spouse_first_name'] != '' && $details['Contact']['spouse_last_name'] != '') {
							$spouseName = "<br>Spouse: " . $details['Contact']['spouse_first_name'] . " " . $details['Contact']['spouse_last_name'];
						}
						echo ucwords(strtolower($details['Contact']['first_name'])) . " " . ucwords(strtolower($details['Contact']['last_name'])) . $spouseName;
					?>
				</td>
				<td <?php echo $style;?> >
					<?php echo "<b>Phone#:</b> ". $this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$details['Contact']['dnc_status'],
						$details['Contact']['phone'],
						$details['Contact']['modified'],
					 	$details['Contact']['sales_step']);?><br/>
					<?php echo "<b>Mobile#:</b> ".$this->Dncprocess->show_phone(
						$dnc_manual_uplaod_process,
						$details['Contact']['dnc_status'],
						$details['Contact']['mobile'],
						$details['Contact']['modified'],
					 	$details['Contact']['sales_step']);?><br/>
					<?php echo "<b>Email:</b> ".$details['Contact']['email'];?>

					<?php if(isset($rds[$details['Contact']['id']])){ ?>
						<a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $details['Contact']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
					<?php } ?>
					<?php if(isset($yds[$details['Contact']['id']])){ ?>
						<a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $details['Contact']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
					<?php } ?>

				</td>
				<td <?php echo $style;?> >
					<?php echo $details['Contact']['condition'];?>,
					<?php echo $details['Contact']['year'];?>,
					<?php echo $details['Contact']['make'];?>,
					<?php echo $details['Contact']['model'];?>
				</td>


				<td <?php echo $style;?> >
					<?php echo $details['ContactStatus']['name'];?>,<br>
					<?php echo $SalesStep[$details['Contact']['sales_step']];?>,<br>
					<?php echo $details['Contact']['status'];?>
				</td>




				<td <?php echo $style;?> >
				<?php
					echo $this->Text->truncate( strip_tags($details['Contact']['notes']),200,array('html'=>true,
					'ellipsis'=>'<br><a  onclick="read_more_workload('.$details['Contact']['id'].')"   href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_workload no-ajaxify noprint" contact_id = "'.
					$details['Contact']['id'].'" >Read more</a>'));
				?>

				</td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['sperson'];?></td>
                <td class="noprint" <?php echo $style;?> >

				<div class="btn-group pull-right" >

					<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown" onclick="InitFuncs()">
						Actions
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">



						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'equity'=>'equity', '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Email Update (All)</a>
						</li>
						
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'equity'=>'equity', '?'=> array('update_type'=>'Outbound Call Update') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Outbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'equity'=>'equity', '?'=> array('update_type'=>'Inbound Call Update') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Inbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'equity'=>'equity', '?'=> array('update_type'=>'Showroom Visit Update') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Step Update</a>
						</li>
						<?php if($details['Contact']['sales_step'] != '10'){ ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'equity'=>'equity', '?'=> array('update_type'=>'Dead Lead (Closed)') )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Dead Lead (Closed)</a>
						</li>

						<li>
							<a id="work_lead_link2" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input_edit', $details['Contact']['id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="no-ajaxify work_lead_link" user_id="<?php echo $details['Contact']['user_id'];?>" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Sold Update - Floor</a>
						</li>
						<?php } ?>


					<?php if(!empty($details['Event']['start'])) : ?>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>" class='no-ajaxify status_note_update' ><i class="fa fa-pencil"></i> Event: <u><?php echo date('m/d/Y g:i A', strtotime($details['Event']['start'])); ?></u></a>
						</li>

                    	<?php if($details['Event']['event_type_id'] == 21 && $details['Event']['customer_showed'] == 0) : ?>
                            	<li>
                            		<a href="javascript:void(0)" class='no-ajaxify mark_cust_showed' data-id ="<?php echo $details['Event']['id']; ?>" ><i class="fa fa-pencil"></i> Mark Appt Showed</a>
                            	</li>
						<?php endif; ?>

					<?php else: ?>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'], '?'=> array('update_type'=>'Set Appointment') )); ?>" class='no-ajaxify status_note_update' ><i class="fa fa-plus"></i> New Event</a>
						</li>
					<?php endif; ?>


						<li>
						<a id="transfer_lead_link" href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'lead_transfer', $details['Contact']['id'],'equity'=>'equity')); ?>" class="no-ajaxify transfer_lead_link" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-user"></i> Move Lead</a>
						</li>
						

						<?php if($group_id == 1 || $group_id == 2 || $group_id == 4){  ?>
						<li>
						<a id="send_manager_message" href="<?php echo $this->Html->url(array('controller'=>'manager_messages','action'=>'compose', $details['Contact']['id'],'equity'=>'equity')); ?>" class="no-ajaxify send_manager_message" user_id="<?php echo $details['Contact']['user_id'];?>"  >
							MGR <i class="fa fa-comment"></i>
						</a>
						</li>
						<?php }  ?>

						<li>
							<a id="work_lead_link" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input_edit', $details['Contact']['id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="no-ajaxify work_lead_link"  user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Edit Lead</a>
						</li>


					</ul>

				</div>
				<div class="separator"></div>
				<div class="pull-right" >
					<button type="button" class="btn  btn-inverse show_history btn_show_hide_history_otherlocation" style="float:right;width:87px;margin-top:10px;"
					 toggleId="<?php echo $details['Contact']['id'];?>">
						History
					</button>
				</div>
				</td>
			</tr>

			<tr id="history_otherloc_<?php echo $details['Contact']['id'];?>" class="gradeA" style="display: none" >
				<td colspan="11">
					<div class="row">
						<div class="col-md-12" id = "history_otherloc_container_<?php echo $details['Contact']['id'];?>">&nbsp;</div>
					</div>
				</td>
			</tr>


			<?php $i++; } ?>
		</tbody>
	</table>
</div>


	<?php

	$query = (isset($this->request->query))? $this->request->query : array() ;
	if(isset($query['_'])){
		unset($query['_']);
	}
	echo $this->Html->link("current page", array_merge(array("?"=>$query), $this->request->named, $this->request->params['pass']), array("id"=>"equity_current_page","class"=>"hide") );

	?>



<script type="text/javascript">

function reload_equity_result(){

	bootbox.hideAll();

	$.ajax({
		url: $("#equity_current_page").attr('href'),
		type: "get",
		cache: false,
		success: function(results){
			$('#equity_search_result').html(results);
		}
	});

}

$(function() {

	$(".alert").delay(3000).fadeOut("slow");

	$(".lnk_merge_all_matched").click(function(event){
			event.preventDefault();
			$.ajax({
				type: "GET",
				cache: false,
				url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id')+"/?return_type=equity_result",
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
				url:  "/contacts_manage/merge_all_matched/"+$(this).attr('contact_id')+"/?return_type=equity_result",
				success: function(data){

					bootbox.dialog({
						message: data,
						title: "List of possible duplicate contacts",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});
		});






	<?php if( isset($equitySearches) ){ ?>

		<?php if(  $this->request->params['paging']['Contact']['page'] == '1' ){ ?>

			$("#EquitySearchSearchLeadType").val(<?php echo json_encode($equitySearches['EquitySearch']['search_lead_type']) ?>);
			$("#EquitySearchSearchStatusHeader").val(<?php echo json_encode($equitySearches['EquitySearch']['search_header']) ?>);
			$("#EquitySearchSearchSalesStep").val(<?php echo json_encode($equitySearches['EquitySearch']['search_sales_step']) ?>);

			$("#EquitySearchSearchSalesStep").val(<?php echo json_encode($equitySearches['EquitySearch']['search_sales_step']) ?>);
			$("#EquitySearchSearchEstPaymentSearch").val(<?php echo json_encode($equitySearches['EquitySearch']['search_est_payment_search']) ?>);
			$("#EquitySearchSearchSource").val(<?php echo json_encode($equitySearches['EquitySearch']['search_source']) ?>);
			$("#EquitySearchSearchModel").val(<?php echo json_encode($equitySearches['EquitySearch']['search_model']) ?>);
			$("#EquitySearchSearchUserId").val(<?php echo json_encode($equitySearches['EquitySearch']['search_user_id']) ?>);
			$("#EquitySearchSearchType").val(<?php echo json_encode($equitySearches['EquitySearch']['search_type']) ?>);
			$("#EquitySearchSearchZip").val(<?php echo json_encode($equitySearches['EquitySearch']['search_zip']) ?>);

			$("#EquitySearchSearchCompanyWork").val(<?php echo json_encode($equitySearches['EquitySearch']['search_company_work']) ?>);
			$("#EquitySearchSearchClass").val(<?php echo json_encode($equitySearches['EquitySearch']['search_class']) ?>);

			$("#EquitySearchSearchCompanyAccountId").val(<?php echo json_encode($equitySearches['EquitySearch']['search_company_account_id']) ?>);

			/* Add By Sb */
			$("#EquitySearchSearchVin").val(<?php echo json_encode($equitySearches['EquitySearch']['search_vin']) ?>);
			$("#EquitySearchSearchMake").val(<?php echo json_encode($equitySearches['EquitySearch']['search_make']) ?>);
			$("#EquitySearchSearchComment").val(<?php echo json_encode($equitySearches['EquitySearch']['search_comment']) ?>);
			$("#EquitySearchSearchFullName").val(<?php echo json_encode($equitySearches['EquitySearch']['search_full_name']) ?>);
			$("#EquitySearchSearchState").val(<?php echo json_encode($equitySearches['EquitySearch']['search_state']) ?>);
			$("#EquitySearchSearchCondition").val(<?php echo json_encode($equitySearches['EquitySearch']['search_condition']) ?>);
			/* add by sb */


			<?php if($equitySearches['EquitySearch']['search_pushed'] == '1'){ ?>
				$("#EquitySearchSearchPushed").attr("checked" , true);
			<?php }else{ ?>
				$("#EquitySearchSearchPushed").attr("checked" , false);
			<?php } ?>

			$("#s_d_range").val( <?php echo json_encode($equitySearches['EquitySearch']['date_start']) ?> );
			$("#e_d_range").val( <?php echo json_encode($equitySearches['EquitySearch']['date_end']) ?> );

			$('#reportrange span').html( "<?php echo date("F j, Y", strtotime($equitySearches['EquitySearch']['date_start'])) . " - " . date("F j, Y", strtotime($equitySearches['EquitySearch']['date_end'])); ?>" );

			$('#reportrange').data('daterangepicker').setStartDate('<?php echo date("m/d/Y", strtotime($equitySearches['EquitySearch']['date_start'])); ?>');
			$('#reportrange').data('daterangepicker').setEndDate('<?php echo date("m/d/Y", strtotime($equitySearches['EquitySearch']['date_end'])); ?>');


			$.ajax({
				type: "GET",
				cache: false,
				url: "/eblasts/status_by_header",
				data: {'header': <?php echo json_encode($equitySearches['EquitySearch']['search_header']) ?>},
				success: function(data){
					var opts = $.parseJSON(data);
					$("#EquitySearchSearchStatus").empty();
					$("#EquitySearchSearchStatus").html('<option value="">Select</option>');
					$.each(opts, function(i, d) {
						$("#EquitySearchSearchStatus").append('<option value="' + i + '">' + d + '</option>');
					});

					$("#EquitySearchSearchStatus").val(<?php echo json_encode($equitySearches['EquitySearch']['search_status']) ?>);

				}
			});

		<?php } ?>


	<?php } ?>




	$(".btn_show_hide_history_otherlocation").click(function() {
        contact_id = $(this).attr('toggleId');
		console.log(contact_id);
		if($("#history_otherloc_container_"+contact_id).html() == '&nbsp;'){
			$("#history_otherloc_"+contact_id).show();
			$.ajax({
				url: "/contacts_manage/load_history_other/"+contact_id,
				type: "get",
				cache: false,
				success: function(results){
					$("#history_otherloc_container_"+contact_id).html(results);
				}
			});
		}else{
			$("#history_otherloc_"+contact_id).show();
		}
    });

	//Pagination Starts
	$(".paging a,a.sortLeads" ).addClass("no-ajaxify");
	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		var parent_classs = $(this).parent('li').attr("class");
		if(parent_classs != 'disabled'){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				cache: false,
				success: function(results){
					$('#equity_search_result').html(results);
				}
			});
		}
	});
	//Pagination Ends

	$(".mark_cust_showed").on('click',function(e) {
		e.preventDefault();
		data_id = $(this).attr('data-id');
		$obj = $(this);
		$.ajax({
			type:'GET',
			url:'<?php echo $this->Html->url(array('controller' =>'events','action' => 'customer_showed')); ?>/'+data_id,
			success: function(data){
				$obj.parent().remove();
			}
		});
	});
});

</script>
