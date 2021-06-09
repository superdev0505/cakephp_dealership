<br>
<br>
<br>
<br>

<?php

	$date = new DateTime();
	date_default_timezone_set($zone);
	
	$search_text = "";
	if(!empty($this->request->query) && $this->request->query['src'] != '' ){
		$search_text = $this->request->query['src'];
	}
?>


<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div class="row">
		<div class="col-md-12">
			<div class="widget widget-body-white">
				<div class="widget-body">
					<div class="separator bottom"></div>
					<div class="filter-bar">
						<form class="margin-none form-inline">
							<div class="form-group col-md-3 padding-none">
								<div class="input-group">
									<?php 
									echo $this->Form->input('search_all2', array(
									'div' => false,
									'class' => 'form-control',
									'label' => false,
									'name' => 'src' ,
									'value' => $search_text,
									'placeholder' => 'Search Email'), array('div' => false, 'id' => 'ContactSearchAll2'));
									?>
									
									<div class="input-group-btn">
										<button class="btn btn-default rounded-none" type="submit"><i class="fa fa-search"></i></button>
									</div>
									<div class="input-group-btn">
										<a class="btn btn-default rounded-none no-ajaxify" href="<?php echo $this->Html->url(array('action'=>'index')); ?>">
											<i class="fa fa-times"></i>	
										</a>	
									</div>
								</div>
							</div>

							<div class="pull-right">
								
							</div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
						</form>
					</div>

					<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th style="width: 1%;" class="center">Ref#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Modified</th>
								<th class="center" style="width: 100px;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            foreach($Unsubscribes as $unsubscribe) : 
							?>
							<tr class="selectable" style="">
								<td class="center" 	 ><?php echo $unsubscribe['Contact']['id'];?></td>
								<td>
									<?php echo $unsubscribe['Contact']['first_name']; ?> 
									<?php echo $unsubscribe['Contact']['last_name']; ?>
								</td>
								<td><?php echo $unsubscribe['Unsubscribe']['email']; ?></td>
								<td><?php echo $unsubscribe['Contact']['modified']; ?></td>
								<td>
									<a onclick="return confirm('Do you want to remove?')" href="<?php echo $this->Html->url(array('action'=>'delete', $unsubscribe['Unsubscribe']['id'])); ?>" class="btn btn-sm btn-danger no-ajaxify"  ><i class="fa fa-times"> </i></a>
								</td>
								
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					
					<div class="">
						<a href="<?php echo $this->Html->url(array('action'=>'/')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
						<div class="pull-right">
							<ul class="pagination margin-none">
						        <?php echo $this->Paginator->prev('<<'); ?>
								<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
								<?php echo $this->Paginator->next('>>'); ?>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	$(".alert").delay(3000).fadeOut("slow");

	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>










<?php echo $this->element("sql_dump");  ?>