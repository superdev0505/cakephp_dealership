<br /><br />
<br />

<div id="index_fixed_fees" class="innerAll">

	Add new SMTP server
	<?php echo $this->Html->link('<i class="fa fa-plus"></i>',
	array('controller' => 'smtp_imap','action' => 'add_smtp'),array("id"=>"lnk_add_fixed_fee","class"=>"btn btn-success btn-mini no-ajaxify","escape"=>false)); ?>
<br /><br />


	<div class="widget">
		
		<div class="widget-body innerAll">	
	
			<div id="comment-overlay" class="ui-widget-overlay" style="display: none"><div style="position: absolute; top: 50%; left: 47%;"><?php echo $this->Html->image('loading.gif'); ?></div></div>
			
			
			
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
				<thead>
				<?php
				echo $this->Html->tableHeaders(array(
					array(
						'Server' => array(
							'class' => 'info'
						)
					),
					array(
						'URL' => array(
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
					<?php foreach($smtps as $smtp){ ?>
					<tr>
						<td class='striped-info'><?php echo $smtp['SmtpServer']['name']; ?></td>
						<td class='striped-info'><?php echo $smtp['SmtpServer']['url']; ?></td>
						<td class='striped-info' width="100">
							<?php echo $this->Html->link('<i class="fa fa-pencil"></i>', array_merge(array("?"=>$this->params->query), $this->params['named'],array('action' => 'edit_smtp', $smtp['SmtpServer']['id'])), array('escape'=>false,'class'=>' no-ajaxify')); ?>

							&nbsp; &nbsp;  <?php echo $this->Html->link('<i class="fa fa-trash-o"></i>', array_merge(array("?"=>$this->params->query), $this->params['named'],array('action' => 'delete_smtp', $smtp['SmtpServer']['id'])), array('escape'=>false,'class'=>'no-ajaxify')); ?>
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










