<?php
//prx($eblastUnsubscribes);
?>
<br>
<br>
<br>
<br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div class="row">
		<div class="col-md-12">
			<!-- Widget -->
			
			<div class="widget widget-body-white">
				<!-- Widget heading -->
				

						<!-- Filters -->
					<div class="filter-bar">
						<!-- <form class="margin-none form-inline" id="EblastsListingForm" action="<?php echo $this->webroot; ?>eblasts/search_result/selected_lead_type"> -->
							<!-- Other Search -->
							<div class="form-group col-md-2 padding-none">
								<div class="input-group">
									<?php 
									echo $this->Form->input('src', array(
										'div' => false,
										'class' => 'form-control',
										'label' => false,
										'placeholder' => 'Search email',
										'value' => $search_all2
									));
									?>
									<span class="input-group-addon" style="cursor:pointer;" id="EblastsSearch"><i class="fa fa-search"></i></span>
									
								</div>
							</div>
							<!-- // Other Search END -->
							<div class="clearfix"></div>
						<!-- </form> -->
					</div>
					<!-- // Filters END -->
				
				
		    <!-- // Widget heading END -->
				<div class="widget-body">
					<h4>Opt-Out</h4>
					<!-- Products table -->
					<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th style="width: 1%;" class="center">Ref#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Vehicle</th>
								<th>Dealer ID</th>
								<th>Opt-Out On</th>
								<!-- <th>Modified</th> -->
							</tr>
						</thead>
						<tbody>
							<?php
							
                            foreach($eblastUnsubscribes as $eblastUnsubscribe) { 
							?>
							<tr class="selectable" >
								<td ><?php echo $eblastUnsubscribe['EblastUnsubscribe']['contact_id']; ?></td>
								<td ><?php echo $eblastUnsubscribe['Contact']['first_name'] . "&nbsp;" . $eblastUnsubscribe['Contact']['last_name'];  ?></td>
								<td ><?php echo $eblastUnsubscribe['EblastUnsubscribe']['email']; ?></td>
								
								<td ><?php $phone = $eblastUnsubscribe['Contact']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?></td>
								
								<td ><?php echo $eblastUnsubscribe['Contact']['condition']; ?> &nbsp; <?php echo $eblastUnsubscribe['Contact']['year']; ?>  &nbsp;<?php echo $eblastUnsubscribe['Contact']['make']; ?> &nbsp;<?php echo $eblastUnsubscribe['Contact']['model']; ?></td>
								<td><?php echo $eblastUnsubscribe['Contact']['company_id']; ?></td>
								<td><?php echo $this->Time->format('n/j/Y g:i A', $eblastUnsubscribe['EblastUnsubscribe']['unsubscribed_on']); ?></td>
								<!-- <td><?php echo $this->Time->format('n/j/Y g:i A', $eblastUnsubscribe['Contact']['modified']); ?></td> -->
							</tr>
							<?php } ?>
						</tbody>
					</table>
					
	        <!-- // Products table END -->
					<!-- Options -->
					<div class="">
						<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
						<div class="pull-right">
							<ul class="pagination margin-none">
						        <?php echo $this->Paginator->prev('<<'); ?>
								<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
								<?php echo $this->Paginator->next('>>'); ?>
							</ul>
						</div>
						<div class="clearfix"></div>
						<!-- // Pagination END -->
						<?php //debug($eblastUnsubscribes); ?>
					</div>
					<!-- // Options END -->
				</div>
			</div>
			<!-- // Widget END -->
		
				<!-- // Widget heading END -->
			</div>
			<!-- // Widget END -->
		</div>
	</div>
	
	<?php //echo $this->element('sql_dump'); ?>
	
</div>


<script>
function Submit(){
	var src = $("#src").val();
	window.location.href = '/eblastunsubscribes/index?src='+src;
}

$('#EblastsSearch').click(function(){
	Submit();
});

$('#src').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
		Submit();	
	}
});

</script>
