
<div class='row'>
	<div class="col-md-2">
		<div style="margin-top: 14px;" class="text-primary">
			<?php echo $this->Paginator->counter('{:count}');?> Leads Found <i class="icon-circle-arrow-down"></i>
		</div>
	</div>

	<div class="col-md-5">
		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo ($this->Paginator->hasPrev())? $this->Paginator->prev('<<') : '<li class="disabled"><a class="no-ajaxify" href="javascript:">&lt;&lt;</a></li>'  ; ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo ($this->Paginator->hasNext())? $this->Paginator->next('>>') : '<li class="disabled"><a class="no-ajaxify" href="javascript:">&gt;&gt;</a></li>'  ; ?>
			</ul>
		</div>
	</div>

	<div class="col-md-5">
		Period:
		<div id="reportrange_date"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
			<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
			<span>
				<?php echo date("F j, Y",strtotime("-1 month")); ?> - <?php echo date("F j, Y",strtotime("now")); ?>
				<b class="caret"></b>
			</span>
		</div>
	</div>

</div>


<?php
$style = 'style="font-size:14px;vertical-align:middle"';
?>
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
			<th width="45px" <?php echo $style;?>>Action</th>
		</tr>
	</tr>
	</thead>
	<tbody>

<?php
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
	$group_id = AuthComponent::user('group_id');
	$dealer_settings = $this->App->getDealerSettings(array('move_lead_allowed_group'),AuthComponent::user('dealer_id'));
?>


<?php
		
	$startDate = (isset($startDate)) ? $startDate : '';
	$endDate = (isset($endDate)) ? $endDate : '';	

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
					'ellipsis'=>'<br><a  onclick="read_more_workload('.$details['Contact']['id'].')"   href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_workload no-ajaxify" contact_id = "'.
					$details['Contact']['id'].'" >Read more</a>'));
				?>

				</td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['sperson'];?></td>
                <td <?php echo $style;?> >

				<div class="btn-group pull-right" >

					<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown" onclick="InitFuncs()">
						Actions
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">


						<?php if($details['Contact']['sales_step'] != '10'){ ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'dormant'=>'dormant', 'user_id' => $details['Contact']['user_id'], '?'=> array('update_type'=>'Email Update (All)', 'start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Email Update (All)</a>
						</li>
						<?php } ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'dormant'=>'dormant', 'user_id' => $details['Contact']['user_id'], '?'=> array('update_type'=>'Outbound Call Update', 'start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Outbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'dormant'=>'dormant', 'user_id' => $details['Contact']['user_id'], '?'=> array('update_type'=>'Inbound Call Update', 'start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Inbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'dormant'=>'dormant', 'user_id' => $details['Contact']['user_id'], '?'=> array('update_type'=>'Showroom Visit Update', 'start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Step Update</a>
						</li>
						<?php if($details['Contact']['sales_step'] != '10'){ ?>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'],'dormant'=>'dormant', 'user_id' => $details['Contact']['user_id'], '?'=> array('update_type'=>'Dead Lead (Closed)', 'start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify status_note_update" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Dead Lead (Closed)</a>
						</li>

						<li>
							<a id="work_lead_link2" href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_input_edit', $details['Contact']['id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="no-ajaxify work_lead_link" user_id="<?php echo $details['Contact']['user_id'];?>" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Sold Update - Floor</a>
						</li>
						<?php } ?>


					<?php if(!empty($details['Event']['start'])) : ?>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'], 'dormant' => 'dormant', 'user_id' => $details['Contact']['user_id'], '?'=> array('update_type'=>'Set Appointment') )); ?>" class='no-ajaxify status_note_update' ><i class="fa fa-pencil"></i> Event: <u><?php echo date('m/d/Y g:i A', strtotime($details['Event']['start'])); ?></u></a>
						</li>

                    	<?php if($details['Event']['event_type_id'] == 21 && $details['Event']['customer_showed'] == 0) : ?>
                            	<li>
                            		<a href="javascript:void(0)" class='no-ajaxify mark_cust_showed' data-id ="<?php echo $details['Event']['id']; ?>" ><i class="fa fa-pencil"></i> Mark Appt Showed</a>
                            	</li>
						<?php endif; ?>
							
					<?php else: ?>
						<li>
							<a href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', 'dormant' => 'dormant', $details['Contact']['id'],  '?'=> array('update_type' => 'Set Appointment', 'user_id' => $details['Contact']['user_id'], 'start_date' => $startDate, 'end_date' => $endDate) )); ?>" class='no-ajaxify status_note_update' ><i class="fa fa-plus"></i> New Event </a>
						</li>
					<?php endif; ?>

						
						<?php if(in_array($group_id, explode(',', $dealer_settings['move_lead_allowed_group']))) {  ?>
						<li>
						<a id="transfer_lead_link" href="<?php echo $this->Html->url(array('controller' => 'contacts_manage', 'action' => 'lead_transfer', 'dormant' => 'dormant', 'user_id' => $details['Contact']['user_id'], $details['Contact']['id'],  '?' => array('start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify transfer_lead_link" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-user"></i> Move Lead</a>
						</li>
						<?php } ?>

						<?php if($group_id == 1 || $group_id == 2 || $group_id == 4){  ?>
						<li>
						<a id="send_manager_message" href="<?php echo $this->Html->url(array('controller' => 'manager_messages', 'action' => 'compose', 'dormant' => 'dormant', 'user_id' => $details['Contact']['user_id'], $details['Contact']['id'], '?' => array('start_date' => $startDate, 'end_date' => $endDate) )); ?>" class="no-ajaxify send_manager_message" user_id="<?php echo $details['Contact']['user_id'];?>"  >
							MGR <i class="fa fa-comment"></i>
						</a>
						</li>
						<?php }  ?>

						<li>
							<a id="work_lead_link" href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'leads_input_edit', $details['Contact']['id'], 'selected_lead_type'=> $selected_lead_type )); ?>" class="no-ajaxify work_lead_link"  user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Edit Lead</a>
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


<script type="text/javascript">

$(function() {

	<?php if(isset($startDate) && isset($endDate)) : ?>

		$("#s_d_range").val( <?php echo json_encode($startDate); ?> );
		$("#e_d_range").val( <?php echo json_encode($endDate); ?> );

		$('#reportrange_date span').html( "<?php echo date("F j, Y", strtotime($startDate)) . " - " . date("F j, Y", strtotime($endDate)); ?>" );		

	<?php endif; ?>

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


	$(".disabled a" ).click(function(event){
		event.preventDefault();
	});
	
	$(".paging a,a.sortLeads" ).click(function(event){

		event.preventDefault();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){
				$('#tab5-2').html(results);
			}
		});
	});

	var cb = function(start, end, label) {
		$('#reportrange_date span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

		$("#s_d_range").val( start.format('YYYY-MM-DD') );
		$("#e_d_range").val( end.format('YYYY-MM-DD') );

		var user_id = $("#user_id").val();

		$.ajax({
			type: "GET",
			cache: false,
			url: '/equity_searches/dormant/'+user_id+'/?startDate='+start.format('YYYY-MM-DD')+'&endDate='+end.format('YYYY-MM-DD'),
			success: function(data){
				$('#tab5-2').html(data);
			}
		});
	}

	var optionSet1 = {
		startDate: '<?php echo date("m/d/Y",strtotime("-1 month")); ?>',
		endDate: '<?php echo date("m/d/Y",strtotime("now")); ?>',
        minDate: '01/01/2000',
        maxDate: '12/31/<?php echo date('Y'); ?>',        
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
           'Last 7 Days': [moment().subtract('days', 6), moment()],
           'Last 30 Days': [moment().subtract('days', 29), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
	};
	$('#reportrange_date').daterangepicker(optionSet1, cb);

	$('#reportrange_date span').html("<?php echo date("F j, Y", strtotime("-1 month")) . " - " . date("F j, Y", strtotime("now")); ?>");	

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
