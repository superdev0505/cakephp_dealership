<?php
$style = 'style="font-size:14px;vertical-align:middle"';
?>
<!-- Table -->
<div class="table-responsive">
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
	<?php
	if($event!='yes'){
	?>
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
			<th width="45px" <?php echo $style;?>>Action</th>
		</tr>
	</tr>
	<?php
	}else{
	?>
		<tr>
			<th  <?php echo $style;?>>ID#</th>
			<th  <?php echo $style;?>>Due Date</th>
			<th  <?php echo $style;?>>Last Modified</th>
			<th  <?php echo $style;?>>Name</th>
			<th  <?php echo $style;?>>Contact #</th>
			<th  <?php echo $style;?>>Vehicle</th>

			<th  <?php echo $style;?>>Event Info</th>

			<th width="200px"  <?php echo $style;?>>Comment</th>
			<th  width="65px" <?php echo $style;?>>Staff</th>
			<th width="45px" <?php echo $style;?>>Action</th>
		</tr>
	<?php
	}
	?>
	</thead>
	<tbody>
	
	
