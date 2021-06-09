<?php
if($export){
	$style = 'style="background:#3695d5;color:white;border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
}else{
	$style = '';
}
?>
<!-- Table -->
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
	<tr>
		<th width="76px" <?php echo $style;?>>Created Date</th>
		<th width="76px" <?php echo $style;?>>Updated Date</th>
          <?php if(isset($next_act)) {?>
		<th width="76px" <?php echo $style;?>>Next Activity</th>
		<?php }
		 ?>
        <?php if(isset($appt_report) && $appt_report){ ?>
        <th width="76px" <?php echo $style;?>>Appt Date</th>
        <?php } ?>
        <th width="65px" <?php echo $style;?>>Sales Person</th>
        <th width="65px" <?php echo $style;?>>Originator</th>
		<th width="65px" <?php echo $style;?>>Full Name</th>
		<th width="65px" <?php echo $style;?>>Email</th>
		<th width="72px" <?php echo $style;?>>Phone #</th>
		<th width="72px" <?php echo $style;?>>Vehicle</th>
		<th width="72px" <?php echo $style;?>>Trade</th>
		<th width="60px" <?php echo $style;?>>Log Type</th>
		<th width="72px" <?php echo $style;?>>Sale Step</th>
		<th width="60px" <?php echo $style;?>>Open/Close</th>
		<th width="60px" <?php echo $style;?>>Status</th>
		<th width="100px"  <?php echo $style;?>>Comment</th>
	</tr>
	</thead>
	<tbody>

	<?php
if($export){
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
}else{
	$style = '';
	}
?>
	<?php
		if(is_array($step_log_results)){
			foreach($step_log_results as $details){
			?>
			<tr class="gradeA">
				<td <?php echo $style;?> ><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
				<td <?php echo $style;?> ><?php echo date("F j, Y h:i A",strtotime($details['Contact']['modified']));?></td>
                  <?php if(isset($next_act)) {?>
				<td <?php echo $style;?> >
					<?php
						//if($details['Contact']['next_activity']!=''){echo date("F j, Y h:i A",strtotime($details['Contact']['next_activity']));}
						if(isset( $next_act[  $details['Contact']['id']  ]  )){
							echo date("F j, Y h:i A",  strtotime( $next_act[  $details['Contact']['id']  ] )  );
						}

					?>
				</td>
                <?php } ?>
                <?php if(isset($appt_report)){ ?>
                    <td <?php echo $style;?> >
                    <?php echo date("F j, Y h:i A",  strtotime($details['Event']['start'])); ?>
                    </td>
				<?php } ?>

				<td <?php echo $style;?> ><?php echo $details['Contact']['sperson'];?></td>
                <td <?php echo $style;?> ><?php echo $details['Contact']['owner'];?></td>
				<td <?php echo $style;?> >
					<?php echo $details['Contact']['first_name'];?>
					<?php echo $details['Contact']['m_name'];?>
					<?php echo $details['Contact']['last_name'];?>
				 </td>
				 <td <?php echo $style;?> ><?php echo $details['Contact']['email'];?></td>
				<td <?php echo $style;?> ><?php echo format_phone(  $details['Contact']['mobile']) ;?></td>
				<td <?php echo $style;?> >
					<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
				</td>
				<td <?php echo $style;?> >
					<?php echo $details['Contact']['condition_trade']." ".$details['Contact']['year_trade']." ".$details['Contact']['make_trade']." ".$details['Contact']['model_trade'] ;?>
				</td>
				<td <?php echo $style;?> ><?php
					$status_name = isset($details['ContactStatus']['name'])?$details['ContactStatus']['name']:'';
					if(empty($status_name) && isset($details['Contact']['ContactStatus']['name']))
					$status_name = $details['Contact']['ContactStatus']['name'];
					echo $status_name;

				?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['sales_step'];?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['lead_status'];?></td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['status'];?></td>
				<td <?php echo $style;?> >


						<?php
						echo $this->Text->truncate( strip_tags($details['Contact']['notes']),200,array('html'=>true,
						'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_details no-ajaxify" contact_id = "'.
						$details['Contact']['id'].'" >Read more</a>'));
						?>



				</td>
			</tr>
			<?php
			}
		}
		?>
		</tbody>
		<!-- // Table body END -->
	</table>
	<!-- // Table END -->
