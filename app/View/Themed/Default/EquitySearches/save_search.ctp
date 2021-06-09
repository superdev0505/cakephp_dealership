<?php foreach ($equitySearches as $equitySearch) { ?>

<span style="margin-top: 5px; font-size: 90%"
data-searchid="<?php echo $equitySearch['EquitySearch']['id']; ?>" class="label label-success label-stroke">
	<a onclick="do_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>', event)" class="equity_searches no-ajaxify" href="#" >
		<?php echo $equitySearch['EquitySearch']['search_name']; ?> <?php echo $equitySearch['User']['full_name'];?> ( 
		<?php echo date("m d, Y",strtotime($equitySearch['EquitySearch']['date_start'])); ?> -
		<?php echo date("m d, Y",strtotime($equitySearch['EquitySearch']['date_end'])); ?>
	)
	</a>
	&nbsp; &nbsp;
	<a class="remove_equity_searches" href="#" onclick="remove_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>')"
	 class="btn btn-xs btn-danger">X</a>
</span>

<?php } ?>
