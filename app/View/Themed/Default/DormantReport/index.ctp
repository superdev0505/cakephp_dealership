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

<?php
function phone_no_format($phone = '')
{
$mobile_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it
return $cleaned;
}

 ?>
</br>
</br>
</br>
</br> 
 
<div class="innerLR">
	
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">
			<h3>Dormant Leads (Current Month):</h3>
			<div class="row">
				<div class="col-md-6">
					
            		Dormant Time: <?php echo $dormant_time; ?> Days
				</div>
				<div class="col-md-6 text-right">
					<?php echo $this->Paginator->counter('Page {:page} of {:pages}, {:count} total');?>
				</div>
			</div>
            <table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr class="bg-primary">
						<th>Ref No.</th>
						<th>Created Date</th>
						<th>Updated Date</th>
						<th>Sales Person</th>
						<th>Full Name</th>
						<th>Phone #</th>
						<th>Vehicle</th>
						<th>Log Type</th>
						<th>Sale Step</th>
						<th>Open/Close</th>
						<th>Status</th>
						<th>Comment</th>
                  </tr>
				</thead>
                <tbody>
                 <?php foreach($contacts as $details){ ?>
                 <tr>
					<td><?php echo $details['Contact']['id'];?></a></td>
					<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
					<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['modified']));?></td>
					<td><?php echo $details['Contact']['sperson'];?></td>
					<td>
					<?php echo $details['Contact']['first_name'];?>
					<?php echo $details['Contact']['m_name'];?>
					<?php echo $details['Contact']['last_name'];?>
					</td>
					<td>
					<?php 
					$phone_number = preg_replace('/[^0-9]+/', '', $details['Contact']['mobile']); 
					echo   preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number);
					?>
					</td>
					<td>
					<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
					</td>
					<td><?php echo $details['ContactStatus']['name'];?></td>
					<td><?php echo  $sales_steps[$details['Contact']['sales_step']];?></td>
					<td><?php echo $details['Contact']['lead_status'];?></td>
					<td><?php echo $details['Contact']['status'];?></td>
					<td><?php echo $details['Contact']['notes']; ?></td>
                <?php } ?>
                </tbody>
			</table>
            
			<div class="paging innerAll">
				<ul class="pagination margin-none">
					<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
					<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
					<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
				</ul>
			</div>			
			
			
		</div>

	</div>
 </div>
<script type="text/javascript">
</script>
