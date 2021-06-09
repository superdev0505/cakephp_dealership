<!-- Alert -->
<?php 
$alert_class = "alert-success";
if(isset($class) && $class == 'alert-error')
	$alert_class = "alert-danger";
?>
<div class="alert <?php echo $alert_class; ?> ">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php echo h($message); ?>
</div>
<!-- // Alert END -->