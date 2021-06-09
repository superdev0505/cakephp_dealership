<br /><br />
<br />

<div id="index_fixed_fees" class="innerAll">

	Add Fixed Fee / Payment
	<?php echo $this->Html->link('<i class="fa fa-plus"></i>',array('controller' => 'deal_fixedfees','action' => 'add'),array("id"=>"lnk_add_fixed_fee","class"=>"btn btn-success btn-mini no-ajaxify","escape"=>false)); ?>
<br /><br />


	<div class="widget">
		
		<div class="widget-body innerAll">	
	
			<div id="comment-overlay" class="ui-widget-overlay" style="display: none"><div style="position: absolute; top: 50%; left: 47%;"><?php echo $this->Html->image('loading.gif'); ?></div></div>
			
			
			
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
				<thead>
				<?php
				echo $this->Html->tableHeaders(array(
					array(
						'Ref#' => array(
							'class' => 'info'
						)
					),
					array(
						'User Name' => array(
							'class' => 'info'
						)
					),
					array(
						'Fee Name' => array(
							'class' => 'info'
						)
					),
					
					
					array(
						'Edit' => array(
							'class' => 'info'
						)
					),
				));
				?>
				</thead>
				<tbody>
					<?php foreach($deal_fixedfees as $deal_fixedfee){ ?>
					<tr>
						<td class='striped-info' ><?php echo $deal_fixedfee['DealFixedfee']['id']; ?></td>
						<td class='striped-info'><?php echo $deal_fixedfee['User']['first_name']; ?> <?php echo $deal_fixedfee['User']['last_name']; ?></td>
						<td class='striped-info'><?php echo $deal_fixedfee['DealFixedfee']['condition'].' '.$deal_fixedfee['DealFixedfee']['type']; ?></td>
					<?php /*?>	<td class='striped-info'><?php echo $deal_fixedfee['DealFixedfee']['type']; ?></td><?php */?>
						<td class='striped-info' width="100">
							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array_merge(array("?"=>$this->params->query), $this->params['named'],array('action' => 'edit', $deal_fixedfee['DealFixedfee']['id'])), array('escape'=>false,'class'=>'lnk_edit_deal_fixedfees no-ajaxify')); ?>
							&nbsp; &nbsp;  <?php 
							if(AuthComponent::user('id') == 232){
							echo $this->Html->link('<i class="fa fa-trash-o"></i>', array_merge(array("?"=>$this->params->query), $this->params['named'],array('action' => 'delete', $deal_fixedfee['DealFixedfee']['id'])), array('escape'=>false,'class'=>'lnk_edit_deal_fixedfees no-ajaxify'));
							}
							?>
						</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			
			<div class="paging">
				<ul class="pagination margin-none">
					<?php echo $this->Paginator->prev(''); ?>
					<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
					<?php echo $this->Paginator->next(''); ?>
				</ul>
			</div>
			
		</div>
		
		

	</div>

</div>



<script>

$script.ready('bundle', function() {
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	
	
	$(".pagination  a").click(function(event){
		event.preventDefault();
		$("#comment-overlay").show();
		$.ajax({
			type: "POST",
			url:  $(this).attr('href'),
			success: function(data){
				$("#index_fixed_fees").html(data);
			}
		});
	});
	 
	 
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>










