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
		<th width="100px" <?php echo $style;?>>Comment</th>
	</tr>
	</thead>
	<tbody>