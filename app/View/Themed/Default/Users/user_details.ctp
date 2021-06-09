<div class="innerAll">
	<div class="title">
		<div class="row">
			<div class="col-md-6">
				<div class="clearfix">
					<div class="pull-left"><img style="width: 40px;" src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="Profile" class="" /></div>
					<h3 class="text-primary margin-none pull-left innerR" style="word-break: break-all;"><?php echo $user['User']['first_name'] . "&nbsp;" . $user['User']['last_name'];  ?> <?php
$dump = $user['User']['active'];

if ($dump == 1) {
echo '<span class="label label-success  label-stroke">Active</span>';
} else if ($dump == 0) {
echo '<span class="label label-danger label-stroke">Not Active</span>';
}
?></h3>
						
				</div>
				<ul class="list-unstyled list-group-1">
					<li><i class="fa fa-home"></i> <?php echo $user['User']['d_address']; ?>&nbsp;<?php echo $user['User']['d_city']; ?>&nbsp;<?php echo $user['User']['d_state']; ?>&nbsp;<?php echo $user['User']['d_zip']; ?>
						<div class="row"></div>
                                                &nbsp; <i class="fa fa-phone"></i>
                                                <?php $phone1 = $user['User']['d_phone'];
                                                $phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
                                                $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
                                                echo $cleaned1;?>
						&nbsp; <i class="fa fa-envelope"></i> <span style="word-break: break-all;"><?php echo $user['User']['email']; ?></span></li>
				</ul>
			</div>
			<div class="col-md-6 text-right"> 
				<a href="<?php echo $this->Html->url(array('action'=>'edit_new', $user['User']['id'] )); ?>" class="btn btn-primary" ><i class="fa fa-pencil"></i> Edit User</a>
			 </div>
		</div>
	</div>
	<hr/>
	<div class="body">
		<div class="row">
			<div class="col-md-6">
				<ul class="list-unstyled list-group-1">
                                        <?php $group = $user['User']['group_id']; //echo $group; ?>
                                        <li><span class="strong">Dealer ID:</span>&nbsp;#<?php echo $user['User']['dealer_id']; ?></li>
                                        <li><span class="strong">Dealer:</span> <?php echo $user['User']['dealer']; ?></li>
                                        <li><span class="strong">Dealer Website:</span> <?php echo $user['User']['d_website']; ?></li>
                                        <li><span class="strong">Web Provider:</span> <?php echo $user['User']['d_web_provider']; ?></li>                                 <li><span class="strong">Zone:</span>&nbsp;<?php echo $user['User']['zone']; ?></li>
					<li><span class="strong">User ID:</span>&nbsp;#<?php echo $user['User']['id']; ?></li>
					<li><span class="strong">Username:</span> <?php echo $user['User']['username']; ?></li>
                                        <li><span class="strong">Step Process:</span> <?php echo $user['User']['step_procces']; ?></li>
<li><span class="strong">User Type:</span>&nbsp;<?php
if ($group == 2) {
    echo '<span class="label label-warning  label-stroke">'.$groups[$group].'</span>';
} elseif ($group == 3) {
    echo '<span class="label label-info  label-stroke">'.$groups[$group].'</span>';
} elseif ($group == 1) {
    echo '<span class="label label-danger  label-stroke">'.$groups[$group].'</span>';
} else {
    echo '<span class="label label-info  label-stroke">'.$groups[$group].'</span>';
}
?></li>
					<li><span class="strong">Type:</span> <?php echo $user['User']['dealer_type']; ?></li>
					

<li><span class="strong">Created:</span> <?php echo $this->Time->format('n/j/Y g:i A', $user['User']['created']); ?></li>
                                     </ul>
				<div class="separator bottom"></div>
			</div>
		</div>
	</div>
</div>
<?php //debug($contact);   ?>
