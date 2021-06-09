
<div class='row'>
	<div class="col-md-2">
		<div style="margin-top: 14px;" class="text-primary">
			<?php echo $this->Paginator->counter('{:count}');?> Leads Found <i class="icon-circle-arrow-down"></i>
		</div>

	</div>
	<div class="col-md-10">

		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
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
?>


<?php
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
					<?php echo $details['Contact']['first_name'];?> <?php echo $details['Contact']['last_name'];?>
				</td>
				<td <?php echo $style;?> >
					<?php echo "<b>Phone#:</b> ".$details['Contact']['phone'];?><br/>
					<?php echo "<b>Mobile#:</b> ".$details['Contact']['mobile'];?><br/>
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
						
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'], 'mgr_24hr_calls'=>'mgr_24hr_calls', '?'=> array('spit_deal_update'=>'yes','update_type'=>'Outbound Call Update') )); ?>" class="no-ajaxify status_note_update_mgr_call" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Outbound Call Update</a>
						</li>
						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'], 'mgr_24hr_calls'=>'mgr_24hr_calls', '?'=> array('spit_deal_update'=>'yes', 'update_type'=>'Inbound Call Update') )); ?>" class="no-ajaxify status_note_update_mgr_call" user_id="<?php echo $details['Contact']['user_id'];?>" ><i class="fa fa-pencil"></i> Inbound Call Update</a>
						</li>

						<?php if($mgr_lead_action_no_lead_ownership == 'On'){ ?>

						<li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_manage','action'=>'note_status_update', $details['Contact']['id'], 'mgr_24hr_calls'=>'mgr_24hr_calls', '?'=> array('spit_deal_update'=>'yes','update_type'=>'Email Update (All)') )); ?>" user_id="<?php echo $details['Contact']['user_id'];?>" class="no-ajaxify status_note_update_mgr_call" ><i class="fa fa-pencil"></i> Email Send</a>
						</li>


						<?php } ?>


						
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



<?php 
	
	// debug($this->request->query['search_contact_status_id']);
	// debug($this->request->here);
	// debug($this->request);

?>



<script type="text/javascript">


function refresh_mgr_call_list(){
	$("#mgr24hr_search_result").fadeOut();
	$.ajax({
		url: "<?php echo $this->request->here;  ?>",
		type: "get",
		data: {'search_contact_status_id':'<?php echo $this->request->query['search_contact_status_id'];  ?>', 'start_date':'<?php echo $this->request->query['start_date'];  ?>', 'end_date': '<?php echo $this->request->query['end_date'];  ?>'     },
		cache: false,
		success: function(results){ 
			$('#mgr24hr_search_result').html(results);
			$("#mgr24hr_search_result").fadeIn();
		}
	});

}

$(function() {

	$(".btn_show_hide_history_otherlocation").click(function() {
        contact_id = $(this).attr('toggleId'); 
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





	$(".status_note_update_mgr_call").off("click").click(function(event){
		event.preventDefault();

		
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Update lead",
					}).find("div.modal-dialog").addClass("largeWidth3");
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
				$('#mgr24hr_search_result').html(results);
			}
		});
	});

});

</script>





































