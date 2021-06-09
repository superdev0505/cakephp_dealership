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

</style>
<?php
$this->Paginator->options(
        array('update'=>'div.modalBody',
                'url'=>array('controller'=>'reports', 
'action'=>'lead_logs')));
?>
<?php
foreach($all_logs as $log){
?>
<div class="row-fluid" >
<legend>Lead Id #<?php echo $log['Contact']['id']; ?>&nbsp;&nbsp;<?php echo $log['Contact']['first_name'] . "&nbsp;" . $log['Contact']['last_name'];  ?> <i class="fa fa-mobile"></i>
					<?php $phone = $log['Contact']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>&nbsp;&nbsp;<?php echo $log['Contact']['condition']; ?> &nbsp; <?php echo $log['Contact']['year']; ?>  &nbsp;<?php echo $log['Contact']['make']; ?> &nbsp;<?php echo $log['Contact']['model']; ?>
			<?php echo $log['Contact']['type']; ?></span></legend>
<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
					<!-- Table heading -->
					<thead>
						<tr>
							<th>History</th>
							<th>Sperson</th>
							<th>Step</th>
							<th>Status</th>
							<th>Notes</th>
							<th style="width:150px;" >Date</th>
						</tr>
					</thead>
                    <tbody >
                    <?php foreach($log['History'] as $entry){ ?>
                    <tr class="text-primary">
							<td><?php echo $entry['h_type']; ?>&nbsp;</td>
							<td><?php echo ($entry['sperson'] != '')?  $entry['sperson'] : "Please Transfer" ; ?>&nbsp;</td>
							<td><?php echo $entry['sales_step']; ?>&nbsp;</td>
							<td><?php echo $entry['status']; ?>&nbsp;</td>
							
							<td style="word-break:break-all;"><?php 
							
							echo $entry['comment']; 
							
							?>&nbsp;
                            </td>
                            <td><?php echo $entry['modified']; ?>&nbsp;</td>
						</tr>
                    
                    <?php } ?>
                    </tbody>
                    </table>
                  
</div>
  <div class="separator"></div>
  
<?php

}
 ?>
 <div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify leadLogsPage')); ?>
				<?php echo $this->Paginator->numbers(array('class'=>'no-ajaxify leadLogsPage')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify leadLogsPage')); ?>
			</ul>
		</div>
<script type="text/javascript">
$("li.leadLogsPage a").on('click',function(e){
			e.preventDefault();
			 
			$.ajax({
			type: "POST",
			cache: false,
			url: $(this).attr('href'),
			data:$("#leadsForm").serialize(),
			success: function(data){
				bootbox.hideAll();
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Lead Logs",
				}).find("div.modal-dialog").addClass("midWidth").find("div.modal-body").addClass('modalBody');
			}
		});
										
										
										});
</script>