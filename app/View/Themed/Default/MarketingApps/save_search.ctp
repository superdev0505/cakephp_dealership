<?php foreach ($marketingEquitySearches as $marketingEquitySearch) { ?>
<span style="margin-top: 5px; font-size: 90%"	data-searchid="<?php echo $marketingEquitySearch['EblastAppSearch']['id']; ?>" class="label label-primary label-stroke">
	<a  onclick="do_equity_search('<?php echo $marketingEquitySearch['EblastAppSearch']['id']; ?>', event, 'eblast')" class="equity_searches no-ajaxify" href="#" >[M]
		<u><?php echo $marketingEquitySearch['User']['full_name']; ?> - <?php echo $marketingEquitySearch['EblastAppSearch']['search_name']; ?>
		</u>
	</a>
	&nbsp; &nbsp;
	<a class="remove_equity_searches" href="#" onclick="remove_equity_search('<?php echo $marketingEquitySearch['EblastAppSearch']['id']; ?>','eblast')"
	 class="btn btn-xs btn-danger">X</a>
</span>

<?php } ?>

<?php foreach ($equitySearches as $equitySearch) { ?>
<span style="margin-top: 5px; font-size: 90%"	data-searchid="<?php echo $equitySearch['EquitySearch']['id']; ?>" class="label label-primary label-stroke">
	<a  onclick="do_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>', event, 'equity')" class="equity_searches no-ajaxify" href="#" >[Eq]
		<u><?php echo $equitySearch['User']['full_name']; ?> - <?php echo $equitySearch['EquitySearch']['search_name']; ?></u>
	</a>
	&nbsp; &nbsp;
	<a class="remove_equity_searches" href="#" onclick="remove_equity_search('<?php echo $equitySearch['EquitySearch']['id']; ?>','equity')"
	 class="btn btn-xs btn-danger">X</a>
</span>

<?php } ?>
