<div>
<div>
<h4>My Deals / Worksheets
&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success btn-mini" href="<?php
echo $this->Html->url(array(
    'controller' => 'deal_fixedfees',
    'action' => 'index'
));
?>">Set or Edit Fixed Fee(s)</a>

<?php echo $this->Form->create('Deal', array('url' => array_merge(array('action' => 'index'), $this->params['pass']),'class'=>'navbar-search pull-right')); ?>
<div class="input-append">
<?php echo $this->Form->input('search_all',array('div'=>false,'class'=>'span2','placeholder'=>'Search','label'=>false)); ?>
<button type="submit" class="btn btn-success"><i class="icon-search"></i></button>
<a class="btn btn-primary" id="more" ><i class="icon-caret-down"></i> More</a>
</div>
<?php echo $this->Form->end(); ?>	
</h4>
<?php if($searched): 
$search_args = $this->passedArgs; ?>
<div class="filter-result-box alert alert-info" >
<?php if(!empty($search_args['search_name'])): ?>
<strong>&nbsp;Name:&nbsp;&nbsp; </strong><span><?php echo $search_args['search_name']; ?></span>
<?php endif; ?>
<?php if(!empty($search_args['search_amount'])): ?>
<strong>&nbsp;Amount:&nbsp; </strong><span><?php echo $search_args['search_amount']; ?></span>
<?php endif; ?>
<?php if(!empty($search_args['search_date_from'])): ?>
<strong>&nbsp;From Date:&nbsp; </strong><span><?php echo $search_args['search_date_from']; ?></span>
<?php endif; ?>
<?php if(!empty($search_args['search_date_to'])): ?>
<strong>&nbsp;To Date: &nbsp;</strong><span><?php echo $search_args['search_date_to']; ?></span>
<?php endif; ?>
</div>
<?php endif; ?>
<div class="filter-box" style="display:none">
<?php echo $this->Form->create('Deal', array('url' => array_merge(array('action' => 'index'), $this->params['pass']),'class'=>'form-inline')); ?>
<fieldset>
<legend>Search Filters</legend>
<?php echo $this->Form->input('search_name',array('div'=>false,'class'=>'span2','label'=>'&nbsp;Name&nbsp;&nbsp;','placeholder'=>'Name')); ?>
<?php echo $this->Form->input('search_amount',array('div'=>false,'class'=>'span2','label'=>'&nbsp;Name&nbsp;&nbsp;','placeholder'=>'Amount')); ?>
<?php echo $this->Form->input('search_date_from',array('div'=>false,'class'=>'span2 date','label'=>'&nbsp;From&nbsp;&nbsp;')); ?>
<?php echo $this->Form->input('search_date_to',array('div'=>false,'class'=>'span2 date','label'=>'&nbsp;To&nbsp;&nbsp;')); ?>
&nbsp;&nbsp;&nbsp;<?php echo $this->Form->submit('Filter',array('div'=>false,'class'=>'btn btn-info')); ?>
</fieldset>
<?php $this->Form->end(); ?>
</div>
</div>
<table class="table table-bordered table-hover table-striped table-striped-warning">
<thead class="warning">
<?php
echo $this->Html->tableHeaders(array('Customer Name','Amount','Condition','Year','Make','Model','Type','Status','Sperson','Notes','Last Touched','Operation'));
?>
</thead>
<tbody>
<?php if(empty($deals)): ?>
<tr>
<td colspan="6" class="striped-info">No record found.</td>
</tr>
<?php endif; ?>
<?php foreach ($deals as $deal):?>
<tr>
<td><?php echo $deal['Contact']['full_name']; ?></td>
<td><?php echo $this->Number->currency($deal['Deal']['amount'],'USD'); ?></a></td>

<td><?php echo $deal['Deal']['condition']; ?></td>

<td><?php echo $deal['Deal']['year']; ?></td>
<td><?php echo $deal['Deal']['make']; ?></td>
<td><?php echo $deal['Deal']['model']; ?></td>
<td><?php echo $deal['Deal']['type']; ?></td>

<td><?php if($deal['DealStatus']['name']=='In Process'){
echo '<span class="label label-warning">'.$deal['DealStatus']['name'].'</span>'; 
}
else if($deal['DealStatus']['name']=='Accepted'){
echo '<span class="label label-success">'.$deal['DealStatus']['name'].'</span>';
}
else if($deal['DealStatus']['name']=='Rejected'){
echo '<span class="label label-important">'.$deal['DealStatus']['name'].'</span>';
}?></td>
<td><?php if(isset($deal['children']['User']['full_name'])) echo $deal['children']['User']['full_name']; ?></td>
<td><?php echo $deal['Deal']['notes']; ?></td>			

<td><?php echo $this->Time->format('l F jS, Y g:i A',$deal['Deal']['modified_long']); ?></td>
<td>
	<div class="btn-group">
	  	<a class="btn btn-primary btn-small dropdown-toggle" data-toggle="dropdown" href="#">
	    	Action<span class="caret"></span>
	  	</a>
		<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
			<li>
				<a href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'edit', $deal['Deal']['id'])); ?>">
					<i class="icon-edit"></i> Edit</a>
			</li>
<li>
<a class="btn-mini-success fancybox fancybox.iframe" href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'metricworksheet', $deal['Deal']['id'])); ?>" id="metricworksheet"><font color='black'><i class="icon-mini icon-print"></i> &nbsp;Worksheet</a></font>
<script>
$('document').ready(function(){
    $('#metricworksheet').fancybox({
        autoDimensions: false,
        height: 450,
        width: 1000
    });
});
</script>
</li>



<li>
<a class="btn-mini-success fancybox fancybox.iframe" href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'creditmetric', $deal['Deal']['id'])); ?>" id="creditmetric"><font color='black'><i class="icon-mini icon-print"></i> &nbsp;Credit App</a></font>
<script>
$('document').ready(function(){
    $('#creditmetric').fancybox({
        autoDimensions: false,
        height: 450,
        width: 1000
    });
});
</script>
</li>
<li>
<a class="btn-mini-success fancybox fancybox.iframe" href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'poa', $deal['Deal']['id'])); ?>" id="poa"><font color='black'><i class="icon-mini icon-print"></i> &nbsp;POA From</a></font>
<script>
$('document').ready(function(){
    $('#poa').fancybox({
        autoDimensions: false,
        height: 450,
        width: 1000
    });
});
</script>
</li>
<li>
<a class="btn-mini-success fancybox fancybox.iframe" href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'billofsale', $deal['Deal']['id'])); ?>" id="billofsale"><font color='black'><i class="icon-mini icon-print"></i> &nbsp;Bill of Sale</a></font>
<script>
$('document').ready(function(){
    $('#billofsale').fancybox({
        autoDimensions: false,
        height: 450,
        width: 1000
    });
});
</script>
</li>
<li>
<a class="btn-mini-success fancybox fancybox.iframe" href="<?php echo $this->Html->url(array('controller' => 'deals', 'action' => 'payoff', $deal['Deal']['id'])); ?>" id="payoff"><font color='black'><i class="icon-mini icon-print"></i> &nbsp;Trade Payoff</a></font>
<script>
$('document').ready(function(){
    $('#payoff').fancybox({
        autoDimensions: false,
        height: 450,
        width: 1000
    });
});
</script>
</li>
		</ul>
	</div>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
<div class="pagination pagination-centered pagination-mini">
<ul>
<?php echo $this->Paginator->prev(''); ?>
<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2));?>
<?php echo $this->Paginator->next(''); ?>
</ul>
</div>
</div>
<script>
jQuery(function($) {
$("#more").click(function(){
$(".filter-box").toggle('fold');
});
$(".date").datepicker({ dateFormat: 'yy-mm-dd' });
});
</script>