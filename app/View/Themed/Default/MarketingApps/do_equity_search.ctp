
<div class='row'>
	<div class="col-md-2">
		<div style="margin-top: 14px;" class="text-primary">
			<?php echo $this->Paginator->counter('{:count}');?> Leads Found <i class="icon-circle-arrow-down"></i>
		</div>

	</div>
	<div class="col-md-10">

		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify'), null, array('class'=>'no-ajaxify')); ?>
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
			<th  <?php echo $style;?>>Name</th>
			<th  <?php echo $style;?>>Contact #</th>
			<th  <?php echo $style;?>>Vehicle</th>
			
			<th  <?php echo $style;?>>Visit Info</th>


			<th width="200px"  <?php echo $style;?>>Comment</th>
			<th width="65px" <?php echo $style;?>>Staff</th>
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
					<?php echo ucwords(strtolower($details['Contact']['first_name']));?> <?php echo ucwords(strtolower($details['Contact']['last_name']));?>
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




<?php //debug($equitySearches); ?>

<?php //echo $this->element("sql_dump"); ?>



<script type="text/javascript">

$(function() {


	<?php if( isset($equitySearches) ){ ?>

		<?php if(  $this->request->params['paging']['Contact']['page'] == '1' ){ ?>

			$("#EblastAppSearchLeadType").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_lead_type']) ?>);
			$("#EblastAppSearchStatusHeader").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_header']) ?>);
			$("#EblastAppSearchSalesStep").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_sales_step']) ?>);
			
			$("#EblastAppSearchSalesStep").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_sales_step']) ?>);
			$("#EblastAppSearchEstPaymentSearch").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_est_payment_search']) ?>);
			$("#EblastAppSearchSource").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_source']) ?>);
			$("#EblastAppSearchModel").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_model']) ?>);
			
			
			<?php if(  empty($equitySearches['EblastAppSearch']['search_user_id']) &&    $restrict_eblast_salesperson == 'On' && !in_array(AuthComponent::user('group_id'),array('2','4','6','7','9','12','13'))){ ?>
				$("#EblastAppSearchUserId").val("<?php echo AuthComponent::user('id'); ?>");
			<?php }else{ ?>
				$("#EblastAppSearchUserId").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_user_id']) ?>);
			<?php } ?>	

			
			


			$("#EblastAppSearchType").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_type']) ?>);
			$("#EblastAppSearchZip").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_zip']) ?>);

			$("#s_d_range").val( <?php echo json_encode($equitySearches['EblastAppSearch']['date_start']) ?> );
			$("#e_d_range").val( <?php echo json_encode($equitySearches['EblastAppSearch']['date_end']) ?> );

			$('#reportrange span').html( "<?php echo date("F j, Y", strtotime($equitySearches['EblastAppSearch']['date_start'])) . " - " . date("F j, Y", strtotime($equitySearches['EblastAppSearch']['date_end'])); ?>" );

			$('#reportrange').data('daterangepicker').setStartDate('<?php echo date("m/d/Y", strtotime($equitySearches['EblastAppSearch']['date_start'])); ?>');
			$('#reportrange').data('daterangepicker').setEndDate('<?php echo date("m/d/Y", strtotime($equitySearches['EblastAppSearch']['date_end'])); ?>');



			<?php if($equitySearches['EblastAppSearch']['search_pushed'] == '1'){ ?>
				$("#EblastAppSearchPushed").attr("checked" , true);
			<?php }else{ ?>
				$("#EblastAppSearchPushed").attr("checked" , false);
			<?php } ?>

					

			$.ajax({
				type: "GET",
				cache: false,
				url: "/eblasts/status_by_header",
				data: {'header': <?php echo json_encode($equitySearches['EblastAppSearch']['search_header']) ?>},
				success: function(data){
					var opts = $.parseJSON(data);
					$("#EblastAppSearchStatus").empty();
					$("#EblastAppSearchStatus").html('<option value="">Select</option>');
					$.each(opts, function(i, d) {
						$("#EblastAppSearchStatus").append('<option value="' + i + '">' + d + '</option>');
					});

					$("#EblastAppSearchStatus").val(<?php echo json_encode($equitySearches['EblastAppSearch']['search_status']) ?>);

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




	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		//$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('#equity_search_result').html(results);
			}
		});
	});

});

</script>





































