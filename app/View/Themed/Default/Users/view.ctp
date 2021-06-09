</br>
<div class="row">
<div class=" span5 offset3">
	
	<table class="table table-bordered">
	<thead>
	<tr>
		<td>Dealer:</td><td> <?php echo $user['User']['dealer']; ?></td>
	</tr>
<tr>
		<td>Dealer ID:</td><td> <?php echo $user['User']['dealer_id']; ?></td>
	</tr>
<tr>
		<td>Time Zone:</td><td> <?php echo $user['User']['zone']; ?></td>
	</tr>	<tr>
		<td>Name:</td><td> <?php echo $user['User']['full_name']; ?></td>
	</tr>
	<tr>         
<tr>
		<td>Username: </td><td><?php echo $user['User']['username']; ?></td>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td>Group: </td><td><?php echo $user['Group']['name']; ?></td>
	</tr>

		<td>Email:</td><td> <?php echo $user['User']['email']?></td>
	</tr>
	<tr>
		<td>Quick Code:</td><td> <?php echo $user['User']['quick_code']?></td>
	</tr>
        <tr>
		<td>Active:</td><td> <?php if($user['User']['active']) echo 'Yes'; else echo 'No'; ?></td>
	</tr>
	<tr>
	        <td>Created:</td><td> <?php echo $this->Time->format('l F jS, Y g:i A',$user['User']['created']);?></td>

	</tr>
	<tr>
	        <td>Last Touched:</td><td> <?php echo $this->Time->format('l F jS, Y g:i A',$user['User']['modified']);?></td>

	</tr>
	</tbody>
	</table>
<div align="center">
<?php echo $this->Html->link('Back',array('controller'=>'users','action'=>'index'),array('class'=>'btn btn-info','icon'=>'reply'));?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'edit', $user['User']['id'])); ?>" class="btn btn-success btn-btn"><i class="icon-edit"></i>&nbsp;Edit User</a>
	</div>
</div>
</div>