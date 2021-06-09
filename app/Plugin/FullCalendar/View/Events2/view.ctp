<?php
$sperson = AuthComponent::user('full_name');
//echo $x;

$dealer = AuthComponent::user('dealer');
//echo $company;

$salesemail = AuthComponent::user('email');
//echo $salesemail;
?>
<div class="row">
<div class="span9 offset2">
<div>
<h5>View Event
<!-- 	<a class="btn btn-success btn-mini" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add')); ?>"><i class="icon-plus"></i></a>
<a class="btn btn-info btn-mini" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'full_calendar')); ?>"><i class="icon-calendar"></i> Calendar View</a> -->
</h5>
</div>
<table class="table table-bordered">
<tr>
<?php $i = 0; $class = ' class="altrow"';?>



<tr><th>Dealer:</th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $dealer; ?></td>

<th>Customer:</th> &nbsp;<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['first_name']; ?>&nbsp;<?php echo $event['Event']['last_name']; ?></td>&nbsp;

<?php
		$hphone = $event['Event']['phone'];
		//echo $hphone;

		$phone_number= preg_replace('/[^0-9]+/', '', $hphone); //Strip all non number characters
		$hcleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number) //Re Format it
		?>
<?php
		$mphone = $event['Event']['mobile'];
		//echo $mphone;

		$phone_number= preg_replace('/[^0-9]+/', '', $mphone); //Strip all non number characters
		$mcleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number) //Re Format it
		?>



&nbsp;<th>Home#</dt>&nbsp;<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $hcleaned; ?></td>&nbsp;
&nbsp;<th>Mobile#</th>&nbsp;<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $mcleaned; ?></td>&nbsp;


</tr>
<tr>
<th>Staff:</th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['sperson']; ?></td>
<th<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Type:'); ?></th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['EventType']['name']; ?></td>
&nbsp;<th>Email:</th>&nbsp;<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['email']; ?></td>
<th<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Status:'); ?></th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['status']; ?></td>
</tr>
<th<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Title:'); ?></th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['title']; ?></td>

<th<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Details:'); ?></th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $event['Event']['details']; ?></td>

<th<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Start:'); ?></th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Time->format('l F jS, Y g:i A',$event['Event']['start']); ?></td>

<th<?php if ($i % 2 == 0) echo $class;?>><?php echo __('End:'); ?></th>
<td<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Time->format('l F jS, Y g:i A',$event['Event']['end']);?></td>
</tr>
</table>
</br>
<div align="center">
<dd><a class="btn btn-info" href="/dashboards/"><i class="icon-reply"></i>Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<a class="btn btn-info" href="/full_calendar/"><i class="icon-reply"></i>Calendar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="btn btn-info" href="/full_calendar/events/"><i class="icon-reply"></i>Events</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="btn btn-success" href="<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'action' => 'edit', $event['Event']['id'])); ?>"><i class="icon-edit"></i> Edit Event</a></dd>
</dl>

</div>
</div>
</div>
