<?php
	$c_query =  $this->request->query;
	unset($c_query['_']);
	$curl = array('controller'=>$this->request->params['controller'], 'action'=>$this->request->params['action'],'?'=>$c_query);
	$curl = array_merge($curl, $this->request->params['pass'],$this->request->params['named']);
	$current_url =  $this->Html->url($curl);
?>
<!-- Table -->
<div class="paging">
	<ul class="pagination margin-none">
		<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
		<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
		<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
	</ul>
</div>
<br />

<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
	<!-- Table heading -->
	<thead>
		<tr>
			<th>#</th>
			<th>Model</th>
			<th>Make</th>
			<th>Category</th>
			<th>Model Prefix</th>
			<th>MSRP</th>
			<th>Short Mame</th>
			<th>Pretty Name</th>
			<th>Color</th>
		</tr>
	</thead>
	<!-- // Table heading END -->
	<!-- Table body -->
	<tbody>
		<!-- Table row -->
		<?php foreach ($trims as $trim) { ?>
		<tr class="text-primary">
			<td><?php echo $trim['Trim']['id']; ?></td>
			<td>
				<?php echo $trim['Model']['year']; ?>, 
				<?php echo $trim['Model']['pretty_name']; ?>, 
				<?php echo $trim['Model']['make_id']; ?>
			</td>
			<td><?php echo $trim['Make']['pretty_mame']; ?></td>
			<td>
				Category: <?php echo $trim['Category']['body_type']; ?><br />
				Class: <?php echo $trim['Category']['body_sub_type']; ?><br />
				Type: <?php echo $trim['Category']['d_type']; ?>
				
				<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array('action'=>'edit_trim',$trim['Trim']['id'],'?'=>array('returl'=>$current_url)), array('class'=>'btn btn-info btn-xs no-ajaxify btn_edit_trim','escape'=>false)  ); ?>
				
			</td>
			<td><?php echo $trim['Trim']['model_prefix']; ?>&nbsp;</td>
			<td><?php echo number_format($trim['Trim']['msrp'], 2, '.', ''); ?></td>
			<td><?php echo $trim['Trim']['short_name']; ?>&nbsp;</td>
			<td><?php echo $trim['Trim']['pretty_name']; ?>&nbsp;</td>
			<td>
				<?php  foreach ($trim['TrimColor'] as $color) { ?>
					<div><?php echo $color['pretty_mame']; ?></div>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		<!-- // Table row END -->
	</tbody>
	<!-- // Table body END -->
</table>
<!-- // Table END -->
<br />
<div class="paging">
	<ul class="pagination margin-none">
		<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
		<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
		<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
	</ul>
</div>
<?php //debug($trims); ?>
<?php //echo $this->element('sql_dump'); ?>

<script>
$(function(){ 
	
	$(".btn_edit_trim" ).click(function(event){
		event.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Edit Trim",
				});
			}
		});
		
	});
	

	$(".paging a" ).click(function(event){
		event.preventDefault();
		$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('#trim_search_result').html(results);
			}
		});
	});
	
	
	
});

</script>
















