<script src="/app/View/Themed/Default/webroot/assets/components/library/jquery/jquery.min.js?v=v1.0.2&sv=v0.0.1"></script>
<script src="/app/View/Themed/Default/webroot/js/printThis.js?v=v1.0.3-rc4"></script>
<?php
$style = 'style="font-size:14px;vertical-align:middle"';
?>
<div id="equity-print-area" class="content">
<style type="text/css">
	.table, th, td
	{
	  border-collapse:collapse;
	  border: 1px solid black;
	  text-align:left;
	  min-width: 100%;
	}
</style>

<!-- Table -->
<table class="table checkboxs" id="table-main" style="font-size:12px;width:100%;" cellpadding="0" cellspacing="0">
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
		</tr>
	</tr>
	</thead>
	<tbody>

<?php
	//$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
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

					<?php if(isset($rds[$details['Contact']['id']])){ ?>
						<a class="no-ajaxify lnk_merge_all_matched"  contact_id="<?php echo $details['Contact']['id']; ?>"  href="#" ><span class="label label-danger">D</span></a>
					<?php } ?>
					<?php if(isset($yds[$details['Contact']['id']])){ ?>
						<a class="no-ajaxify lnk_merge_partial_matched"  contact_id="<?php echo $details['Contact']['id']; ?>" href="#" ><span class="label label-warning">D</span></a>
					<?php } ?>

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
					'ellipsis'=>'<br><a  onclick="read_more_workload('.$details['Contact']['id'].')"   href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_workload no-ajaxify noprint" contact_id = "'.
					$details['Contact']['id'].'" >Read more</a>'));
				?>

				</td>
				<td <?php echo $style;?> ><?php echo $details['Contact']['sperson'];?></td>                
			</tr>

			<?php $i++; } ?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(function() {
		$("#equity-print-area").printThis();
	});
</script>