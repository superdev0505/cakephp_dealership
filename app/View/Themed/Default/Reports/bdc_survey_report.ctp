<!-- Table -->
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Next Day Follow-up</th>
						<th>Bad Number</th>
                        <th>No Number</th>
                        <th>Bad # %</th>
                        <th>No # %</th>
                        <th>Minus Bad & No #</th>
                        <th>Contacts</th>
                        <th>Call/Contacts %</th>
                        <th>In</th>
                        <th>In/Contacts %</th>
                        <th>Sold</th>
                        <th>Sold/Contacts %</th>	
                    </tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					$in_ids=implode(',',$total_count['in_ids']);
					$bad_ids=implode(',',$total_count['bad_ids']);
					$no_ids=implode(',',$total_count['no_ids']);
					$sold_ids=implode(',',$total_count['sold_ids']);
					$contact_ids=implode(',',$total_count['contact_ids']);
					$all_ids=implode(',',$all_leads);
					$no_bad_ids=implode(',',array_diff($all_leads,$total_count['bad_ids'],$total_count['no_ids']));
					?>
					
					<tr class="text-primary">
						<td><?php echo $this->Html->link($total_count['total_ndf'],'',array('class'=>'no-ajaxify show_logs','leads'=>$all_ids)); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($total_count['bad_number'],'',array('class'=>'no-ajaxify show_logs','leads'=>$bad_ids)); ?>&nbsp;</td>
                        <td><?php echo $this->Html->link($total_count['no_number'],'',array('class'=>'no-ajaxify show_logs','leads'=>$no_ids)); ?>&nbsp;</td>
                        <td><?php echo $total_count['bad_per']; ?>%&nbsp;</td>
                        <td><?php echo $total_count['no_number_per']; ?>%&nbsp;</td>
                        <td><?php echo $this->Html->link($total_count['contact_bad'],'',array('class'=>'no-ajaxify show_logs','leads'=>$no_bad_ids));?>&nbsp;</td>
						<td><?php echo $this->Html->link($total_count['contacts'],'',array('class'=>'no-ajaxify show_logs','leads'=>$contact_ids)); ?>&nbsp;</td>
						<td><?php echo $total_count['contact_per']; ?>%&nbsp;</td>
						<td><?php echo $this->Html->link($total_count['in'],'',array('class'=>'no-ajaxify show_logs','leads'=>$in_ids)); ?>&nbsp;</td>
						<td><?php echo $total_count['contact_in']; ?>%&nbsp;</td>
						<td><?php echo $this->Html->link($total_count['sold'],'',array('class'=>'no-ajaxify show_logs','leads'=>$sold_ids)); ?>&nbsp;</td>
                        <td><?php echo $total_count['contact_sold']; ?>%&nbsp;</td>
					</tr>
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
		
	<form id="leadsForm" action="<?php echo $this->Html->url(array('controller'=>'reports','action'=>'lead_logs')); ?>">
    <input type="hidden" name="leads" id="totalLeads" value="" />
    
    </form>
	<?php 
	//debug($total_count);
	//echo $this->element('sql_dump'); 
	?>
    <style>
.midWidth {
    margin: 0 auto;
    width: 80%;
	
}
.modalBody {
    height:600px;
	overflow-y:scroll;
	
}
</style>
<script type="text/javascript">
$(document).ready(function(){
						 
	$("a.show_logs").on('click',function(e){
		 e.preventDefault();
		 leads=$(this).attr('leads');
		 $("#totalLeads").val(leads);
		 $.ajax({
			type: "POST",
			cache: false,
			url: $("#leadsForm").attr('action'),
			data:$("#leadsForm").serialize(),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Lead Logs",
				}).find("div.modal-dialog").addClass("midWidth").find("div.modal-body").addClass('modalBody');
			}
		});
															 
 });
						   
});
</script>
			
			