<br /><br />
<br />
<div class="innerAll">

	Email Sync Process / Eblast
	<div class="widget">
		<div class="widget-body innerAll">

			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
				<tr>
					<th>Process</th>
					<th>Status</th>
					<th>Start</th>
					<th>Action</th>
				</tr>
				<?php foreach($process_status as $process_st){ ?>
				<tr>
					<td>
						<?php echo $process_st['Process']['process_name'] ;?>	
					</td>
					<td>
						<?php 
						if($process_st['Process']['in_progress'] == '1'){
							echo ($process_st['Process']['warning'] == 1)? "<span class='label label-danger'>Running</span>" : "<span class='label label-warning'>Running</span>" ;
						}else{
							echo "<span class='label label-success'>Waiting</span>";
						}
						?>
					</td>
					<td>
						<?php 
						if($process_st['Process']['start']){
							echo ($process_st['Process']['warning'] == 1)? "<span class='label label-danger'>" . CakeTime::timeAgoInWords($process_st['Process']['start']) . "</span>" : "<span class='label label-success'>" . CakeTime::timeAgoInWords($process_st['Process']['start']) . "</span>";	
						}  
						?>
					</td>
					<td>
						<?php if($process_st['Process']['in_progress'] == '1' && $process_st['Process']['warning'] == 1 ){ ?>
							<a  href="/email_sync_status/reset/<?php echo $process_st['Process']['id']; ?>" class="btn btn-primary">Reset</a>
						<?php }  ?>	
					</td>
				</tr>
				<?php } ?>
				
			</table>


		</div>
	</div>


	User Email Sync
	<div class="widget">
		<div class="widget-body innerAll">

			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
				<tr>
					<th>User</th>
					<th>Status</th>
					<th>Last Check</th>
					<th>Action</th>
				</tr>
				<?php foreach($e_settings_all as $e_setting){ ?>
				<tr>
					<td>
						<?php echo $e_setting['User']['first_name'] ;?>	<?php echo $e_setting['User']['last_name'] ;?>	
					</td>
					<td>
						<?php 
							echo ($e_setting['EmailSetting']['warning'] == 1)? "<span class='label label-danger'>Running</span>" : "<span class='label label-warning'>Running</span>" ;
						
						?>
					</td>
					<td>
						<?php 
						if($e_setting['EmailSetting']['last_check']){
							echo ($e_setting['EmailSetting']['warning'] == 1)? "<span class='label label-danger'>" . CakeTime::timeAgoInWords($e_setting['EmailSetting']['last_check']) . "</span>" : "<span class='label label-success'>" . CakeTime::timeAgoInWords($e_setting['EmailSetting']['last_check']) . "</span>";	
						}  
						?>
					</td>
					<td>
						<?php if($e_setting['EmailSetting']['warning'] == 1 ){ ?>
							<a  href="/email_sync_status/reset_settings/<?php echo $e_setting['EmailSetting']['id']; ?>" class="btn btn-primary">Reset</a>
						<?php }  ?>	
					</td>
				</tr>
				<?php } ?>
				
			</table>


		</div>
	</div>







</div>



