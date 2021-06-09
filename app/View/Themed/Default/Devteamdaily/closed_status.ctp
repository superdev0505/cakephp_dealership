<div class="innerLR">
	<!-- col-table -->
       
	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">
<!--			<div id="report_data_container">
			<h4>Daily Log</h4>
                             </div>-->
			<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
	<thead class="bg-primary">
		<?php echo $this->Html->tableHeaders(array('SL','Note','Status','Percentage')); ?>
	</thead>
	<tbody>
		<?php if(empty($allresults)): ?>
		<tr>
			<td colspan="4" class="striped-info">No record found.</td>
		</tr>
		<?php endif; ?>
		<?php 
                $i=1;
                foreach($allresults as $result): 
                    
                    ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $result['DevteamHistory']['note']; ?></td>
			<td><?php echo $result['DevteamHistory']['status']; ?></td>
			<td>
              <?php echo $result['DevteamHistory']['percentage']; ?>
                     %</td>
		</tr>
		<?php 
                $i++;
                endforeach; ?>
	</tbody>
</table>

<!-- // Table END -->
			
<br />
<!--<div class="paging">
	<ul class="pagination margin-none">
		<?php //echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?> <?php //echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?> <?php //echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
	</ul>
</div>			-->
			
			</div>
		</div>

	</div>
	<!-- // Widget END -->
</div>
<style>
/*.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}*/
</style>