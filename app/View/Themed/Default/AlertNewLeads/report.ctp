		<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}

</style>


<br><br><br>
<div class="innerAll">

	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">New Lead Alert Report</h4>
		</div>
		<div class="widget-body innerAll">


			<table class="dynamicTable tableTools table table-bordered checkboxs " id="table-main">
				<tbody>
				<tr class="">
					<th>Sales Person</th>
					<th>Contact</th>
					<th>Created</th>
				</tr>

				<?php foreach ($alertNewLeads as $alertNewLead) { ?>

				<tr>
					<td class="text-primary">
						<i class="fa fa-user"></i>  
						<?php echo $alertNewLead['User']['first_name'] ?> <?php echo $alertNewLead['User']['last_name'] ?>
					</td>
					<td><?php echo $alertNewLead['Contact']['first_name'] ?> <?php echo $alertNewLead['Contact']['last_name'] ?></td>
					<td>
						<?php echo date('m/d/Y g:i A', strtotime($alertNewLead['AlertNewLead']['created'])); ?>
					</td>
				</tr>	

				<?php } ?>

				
				
			</tbody></table>	

			
		</div>


		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>

	</div>

</div>