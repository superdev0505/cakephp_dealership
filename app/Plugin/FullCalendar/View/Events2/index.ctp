<?php
$uname = AuthComponent::user('username');
//echo $uname;
?>
<div class="events index">
<div>
<h4>My Events &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!-- <a class="btn btn-success btn-mini" href="<?php
echo $this->Html->url(array(
    'plugin' => 'full_calendar',
    'controller' => 'events',
    'action' => 'add'
));
?>"><i class="icon-plus"></i></a> -->
<a class="btn btn-success btn-mini" href="<?php
echo $this -> Html -> url(array('plugin' => 'full_calendar', 'controller' => 'full_calendar'));
?>"><i class="icon-calendar"></i> &nbsp;Calendar View</a>&nbsp;&nbsp;
</form>
<!--  <a class="btn btn-info btn" href="<?php
echo $this->Html->url(array(
    'plugin' => 'full_calendar',
    'controller' => 'event_types'
));
?>" >Event Types</a> -->
<?php
echo $this -> Form -> create('Event', array('url' => array_merge(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index'), $this -> params['pass']), 'class' => 'navbar-search pull-right'));
?>
<div class="input-append">
<?php
echo $this -> Form -> input('search_all', array('div' => false, 'class' => 'span2', 'placeholder' => 'Search', 'label' => false));
?>
<button type="submit" class="btn btn-success btn"><i class="icon-search"></i></button>
<!-- <a class="btn btn-primary btn" id="more" ><i class="icon-caret-down"></i> More</a>    -->
</div>
<?php
echo $this -> Form -> end();
?>    
</h4>
<?php
if ($searched):
    $search_args = $this->passedArgs;
?>
<div class="filter-result-box alert alert-info" >
<?php
    if (!empty($search_args['search_title'])):
?>
<strong>Title: </strong><span><?php
echo $search_args['search_title'];
?></span>
<?php
endif;
?>
<?php
    if (!empty($search_args['search_date_from'])):
?>
<strong>Starts From: </strong><span><?php
echo $search_args['search_date_from'];
?></span>
<?php
endif;
?>
<?php
    if (!empty($search_args['search_date_to'])):
?>
<strong>To: </strong><span><?php
echo $search_args['search_date_to'];
?></span>
<?php
endif;
?>
</div>
<?php
endif;
?>
<div class="filter-box" style="display:none">
<?php
echo $this -> Form -> create('Event', array('url' => array_merge(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'index'), $this -> params['pass']), 'class' => 'form-inline'));
?>
<fieldset>
<legend>Filters</legend>
<?php
echo $this -> Form -> input('search_title', array('div' => false, 'class' => 'span2', 'label' => 'Title ', 'placeholder' => 'Title'));
?>
<?php
echo $this -> Form -> input('search_date_from', array('div' => false, 'class' => 'span2 date', 'label' => 'Start From '));
?>
<?php
echo $this -> Form -> input('search_date_to', array('div' => false, 'class' => 'span2 date', 'label' => 'To '));
?>
<?php
echo $this -> Form -> submit('Filter', array('div' => false, 'class' => 'btn btn-info'));
?>
</fieldset>
<?php
echo $this -> Form -> end();
?>
</div>
</div>
<table class="table table-bordered table-striped table-striped-info" >
<thead class="primary">
<tr>
<th>Id</th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;Name</th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;<?php
echo $this -> Paginator -> sort('status');
?></th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;<?php
echo $this -> Paginator -> sort('type');
?></th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;<?php
echo $this -> Paginator -> sort('title');
?></th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;<?php
echo $this -> Paginator -> sort('details');
?></th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;Staff</th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;<?php
echo $this -> Paginator -> sort('Event Start D/T');
?></th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;<?php
echo $this -> Paginator -> sort('Event End D/T');
?></th>
<th><i class="icon-calendar"></i>&nbsp;&nbsp;Due</th>
<th class="actions">Operation</th>
</tr>
</thead>
<tbody>
<?php
if (empty($events)):
?>
<tr>
<td class="striped-info">No Record Found.</td>
</tr>
<?php
endif;
?>
<?php
foreach ($events as $event):
?>
<tr>
<td><?php
echo $event['Event']['id'];
?></td>
<td><?php
echo $event['Event']['first_name'] . "&nbsp;" . $event['Event']['last_name'];
?></td>
<td>
<?php
echo $this -> Html -> link($event['EventType']['name'], array('controller' => 'event_types', 'action' => 'view', $event['EventType']['id']));
?>
</td>
<td><?php
echo $event['Event']['status'];
?></td>
<td><?php
echo $event['Event']['title'];
?></td>
<td><?php
echo $event['Event']['details'];
?></td>
<?php
$f = AuthComponent::user('first_name');
$l = AuthComponent::user('last_name');
?>
<td><?php
echo $event['Event']['sperson'];
 ?></td>
<td><?php
echo $this -> Time -> format('l F jS, Y g:i A', $event['Event']['start']);
?></td>
<td><?php
echo $this -> Time -> format('l F jS, Y g:i A', $event['Event']['end']);
?></td>
<?php
$completed = $event['Event']['status'];
//echo $completed;

$dump = ($completed == "Completed");
//echo $dump;
?>
<?php
if ($dump == 1) {
	echo "<td style='border:3px dotted green'><strong>Completed</strong></td>";
} else if ($dump == 0) {
	echo "<td>Not Completed</td>";
}
?>


<td>
<div class="btn-group">
  	<a class="btn btn-primary btn-small dropdown-toggle" data-toggle="dropdown" href="#">
    	Action<span class="caret"></span>
  	</a>
	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		<li><a href="<?php
echo $this -> Html -> url(array('controller' => 'events', 'action' => 'view', $event['Event']['id']));
?>"><i class="icon-zoom-in"></i> View</a></li>
        <li><a href="<?php
echo $this -> Html -> url(array('controller' => 'events', 'action' => 'edit', $event['Event']['id']));
?>"><i class="icon-edit"></i> Edit</a></li>
	</ul>
</div>

</td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
<div class="pagination pagination-centered pagination-mini">
<ul>
<?php
echo $this -> Paginator -> prev('', array(), null, array('class' => 'disabled'));
?>
<?php
echo $this -> Paginator -> numbers();
?>
<?php
echo $this -> Paginator -> next('', array(), null, array('class' => 'disabled'));
?>
</ul>
</div>
</div>
<script>
	jQuery(function($) {
		$("#more").click(function() {
			$(".filter-box").toggle('fold');
		});
		
	}); 
</script>
</div>