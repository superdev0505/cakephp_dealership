<br><br><br><br>
<?php 
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>



<?php $style = '' ?>

<div class='innerAll'>

<?php

foreach($dealer_ids as $dealer_id=>$dealer_name){

?>
	<div class='text-primary'><h4>Dealer: <?php echo $dealer_name; ?></h4></div>

	<?php if(isset($all_user_details_list[$dealer_id])){ foreach($all_user_details_list[$dealer_id] as $dealer_user){  ?>	

		<div class='text-warning'><strong>Sales Person:</strong> <?php echo $dealer_user['User']['first_name']." ".$dealer_user['User']['last_name']  ; ?></div>

		<div>Todays Event</div>


			<table class="dynamicTable tableTools table table-bordered checkboxs" 
			id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
			<!-- Table heading -->
				<thead>
				<tr>
					<th width="10px" <?php echo $style;?>>Ref No.</th>
					<th width="76px" <?php echo $style;?>>Created Date</th>
					<th width="76px" <?php echo $style;?>>Updated Date</th>
					<th width="76px" <?php echo $style;?>>Next Activity</th>
					<th width="65px" <?php echo $style;?>>Sales Person</th>
					<th width="65px" <?php echo $style;?>>Full Name</th>
					<th width="72px" <?php echo $style;?>>Phone #</th>
					<th width="72px" <?php echo $style;?>>Vehicle</th>
					<th width="60px" <?php echo $style;?>>Log Type</th>
					<th width="72px" <?php echo $style;?>>Sale Step</th>
					<th width="60px" <?php echo $style;?>>Open/Close</th>
					<th width="60px" <?php echo $style;?>>Status</th>
					<th width="100px"  <?php echo $style;?>>Comment</th>
				</tr>
				</thead>
				<tbody>

				<?php foreach($event_by_users[$dealer_id][$dealer_user['User']['id']] as $details){  ?>	

			

					<tr class="gradeA">
						<td><?php echo $details['Contact']['id'];?></td>
						<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
						<td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['modified']));?></td>
						<td>
							<?php echo date("F j, Y h:i A",  strtotime( $details['Event']['start'] )  ); ?>
						</td>
						<td><?php echo $details['Contact']['sperson'];?></td>
						<td>
							<?php echo $details['Contact']['first_name'];?>
							<?php echo $details['Contact']['m_name'];?>
							<?php echo $details['Contact']['last_name'];?>
						 </td>
						<td><?php echo format_phone(  $details['Contact']['mobile']) ;?></td>
						<td>
							<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
						</td>
						<td><?php echo $ContactStatus[$details['Contact']['contact_status_id']];?></td>
						<td><?php echo  $sales_steps[$details['Contact']['sales_step']];?></td>
						<td><?php echo $details['Contact']['lead_status'];?></td>
						<td><?php echo $details['Contact']['status'];?></td>
						<td><?php echo $details['Contact']['notes']; ?></td>
					</tr>

					<?php } ?>
				</tbody>
			</table>





	<?php
	}}
	?>	



<br><br>

<?php
}
?>


</div>