<br />
<br />
<br />
<?php 
$eblast_types = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Eblast' );
$options_status = array ('not_sent' => 'Not sent', 'sent' => 'Sent');
?>
<div class="innerAll">
	
	<h3>Eblast Test</h3>
	<div class="widget widget-body-white">
		<div class="widget-body">

			<div class="row">
				<div class="col-md-12">
				<?php 
				foreach($eblast_list as $eblast){
				$form_filters = json_decode( $eblast['Eblast']['form_filters'] );
				?>
					
					<ul class="list-unstyled">

						<li style="float: left;margin-right: 10px;"><span class="strong">Status:</span>
							
							<?php 
								$status = "Pending";
								if($form_filters->send_every == 0){
									if( $eblast['Eblast']['last_run'] != ''){
									 	$status = "Completed";
										echo '<span class="label label-success label-stroke">Completed<span>';
									}
								}
								if($form_filters->send_every > 0){
									 if(strtotime($eblast['Eblast']['last_run']) >= strtotime($eblast['Eblast']['date_end'] ))
									 	$status = "Completed";
										echo '<span class="label label-success label-stroke">Completed<span>';
								}
								if($status == 'Pending'){
									echo '<span class="label label-danger label-stroke">Pending<span>';
								}
							 ?>
						</li>
						<?php if($status == "Completed"){ ?>
							<li style="float: left;margin-right: 10px;"><span class="strong">Sent:</span> <?php echo $eblast['0']['sent_num'] ?></li>
						<?php } ?>
						
						<li style="float: left;margin-right: 10px;"><span class="strong">Eblast ID:</span> <?php echo $eblast['Eblast']['eblasts_id'] ?></li>
						<li style="float: left;margin-right: 10px;"><span class="strong">Campaign Name:</span> <?php echo $eblast['Eblast']['campaign_name'] ?></li>
						<li style="float: left;margin-right: 10px;"><span class="strong">Type:</span> <?php echo $eblast_types[$eblast['Eblast']['template_type']]; ?></li>
						<li style="float: left;margin-right: 10px;"><span class="strong">Created On:</span>  <?php echo date('m/d/Y', strtotime($eblast['Eblast']['created_date'])); ?></li>
						
						<li style="float: left;margin-right: 10px;"><span class="strong">Dealer ID:</span> <?php echo $eblast['Eblast']['user_id']; ?></li>
						
						
						<li style="float: left;margin-right: 10px;"><span class="strong">Created By:</span> <?php echo $eblast['User']['first_name'] ?> <?php echo $eblast['User']['last_name'] ?></li>
						<li style="float: left;margin-right: 10px;"><span class="strong">Template:</span> 
							<?php echo $this->Html->link("<u>".$eblast['Template']['template_title']."</u>",
								array('controller'=>'eblasts','action'=>'templates_create',$eblast['Template']['template_id']),array('class'=>'no-ajaxify','style'=>"display: inline; font-size: 12px; font-weight: normal; padding: 1px 5px; color:#3695D5",'escape'=>false)); 
							?>
						</li>
						<li style="float: left;margin-right: 10px;"><span class="strong">Schedule:</span> 
							 <?php
								echo ($eblast['Eblast']['date_end']=='0000-00-00 00:00:00') ? '<i class="fa fa-arrow-right"></i> ' .'One Time' : '';
								if( is_object($form_filters)) {
									$hr['0']= 'One Time Only';
									$hr['1']= 'Every Hour';
									$hr['3']= '3 Hrs';
									$hr['5']= '5 Hrs';
									$hr['8']= '8 Hrs';
									$hr['12']= '12 Hrs';
									$hr['18']= '18 Hrs';
									$hr['24']= 'Every day';
									$hr['48']= '2 Days';
									$hr['72']= '3 Days';
									$hr['120']= '5 Days';
									$hr['168']= '1 Week';
									$hr['336']= '2 Weeks';
									$hr['672']= '4 Weeks';
									$hr['720']= '1 Month';
									$hr['2880']= '3 Months';
									$hr['4320']= '6 Months';
									$hr['8760']= 'Every Year';
									echo '<i class="fa fa-refresh"></i> ' . $hr[$form_filters->send_every];
								}
							?>
						</li>
						<li style="float: left;margin-right: 10px;">
							<span class="strong">Schedule Date:</span> 
							<?php if( $form_filters->send_every == 0) { 
								echo date('m/d/Y', strtotime($eblast['Eblast']['date_start']));
							 }else{
								echo date('m/d/Y', strtotime($eblast['Eblast']['date_start']))." - ".date('m/d/Y', strtotime($eblast['Eblast']['date_end']));
							 } 
							 ?>
						</li>
					</ul>
					<!-- List of Contact start -->	
					<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Vehicle</th>
								<th>Mobile</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($eblast['Contacts'] as $contact){	?>	
							<tr class="text-primary">
								<td><font color="blue"><u><?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'];  ?></u></font>
									<?php
									if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
										echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
													} else if ($contact['ContactStatus']['name'] == 'Web Lead') {
										echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														} else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
										echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
									} else if ($contact['ContactStatus']['name'] == 'Showroom') {
										echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
									} else if ($contact['ContactStatus']['name'] == 'Parts') {
										echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
									} else if ($contact['ContactStatus']['name'] == 'Service') {
										echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
									} else if ($contact['ContactStatus']['name'] == 'Call Center') {
										echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
									} else if ($contact['ContactStatus']['name'] == 'Rental') {
										echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
									}
									?>&nbsp; #<?php echo $contact['Contact']['id']; ?>
								</td>
								<td><?php echo $contact['Contact']['email']; ?>&nbsp;</td>
								<td><?php echo $contact['Contact']['condition']; ?> &nbsp; <?php echo $contact['Contact']['year']; ?>  &nbsp;<?php echo $contact['Contact']['make']; ?> &nbsp;<?php echo $contact['Contact']['model']; ?>&nbsp;</td>
								<td><?php $phone = $contact['Contact']['mobile'];
									$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
									$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
									echo $cleaned;?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<!-- //List of Contact end -->	
					<div class="seperator">&nbsp;</div>
					<hr />
					<div class="seperator">&nbsp;</div>
					
				<?php } ?>
				<?php //echo $this->element('sql_dump');	 ?>
				</div>
			</div>

		</div>
	</div>		
</div>