<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
		<tr>
			<th width="60px" <?php echo $style;?>>Contact ID#</th>
			<th width="65px" <?php echo $style;?>>Name</th>
			<th width="140px" <?php echo $style;?>>Contact #</th>
			<th width="72px" <?php echo $style;?>>Vehicle</th>
			<th width="60px" <?php echo $style;?>>Status</th>
			<th width="200px"  <?php echo $style;?>>Email</th>
			<th width="200px"  <?php echo $style;?>>Type</th>
			<th width="45px" <?php echo $style;?>>Occurred On</th>
		</tr>
		
		<?php foreach($statistics as $details){ 	?>
			<tr>
				<td><?php echo $details['SendgridAutoStatistic']['contact_id'];?> </td>
				<td><?php echo $details['Contact']['first_name']." ".$details['Contact']['m_name']." ".$details['Contact']['last_name'];?> </td>
				<td>
				 <?php $phone = $details['Contact']['mobile'];
            $phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
            $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
            echo $cleaned;?>
				 </td>
				<td> <?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'];?> </td>
				<td><?php echo $details['Contact']['status'];?> </td>
				<td><?php echo $details['SendgridAutoStatistic']['email'];?> </td>
				<td><?php echo $details['SendgridAutoStatistic']['event_type'];?> </td>
				<td> <?php echo date("n/j/Y H:i:s",$details['SendgridAutoStatistic']['tstmp']);?></td>
			</tr>
		<?php
		}
		?>
		
	</thead>
	<tbody>
</table>