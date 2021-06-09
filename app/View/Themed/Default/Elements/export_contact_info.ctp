<?php
$style = 'style="background:#3695d5;color:white;border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
?>
<!-- Table -->
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
	<tr>
    <?php foreach($field_array as $field){ ?>
		<th <?php echo $style;?>><?php echo $contact_columns[$field]; ?></th>
		
        <?php } ?>
		
		
	</tr>
	</thead>
	<?php
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
	
	foreach($all_records as $details){
		
	?>
	
		<tr class="gradeA">
           <?php foreach($field_array as $field){ ?>
			<td <?php echo $style;?>><?php echo $details[$model][$field];?></td>
            <?php } ?>
			
			
		</tr>
	<?php
	}

	?>
		
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->