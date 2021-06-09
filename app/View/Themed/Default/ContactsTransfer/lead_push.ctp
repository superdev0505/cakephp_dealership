<div class="container">

	<?php if(empty($hotlink)){ ?>

	<div class="row">
		<div class="col-md-12">
			<h4 class="text-primary">Lead Push</h4>
			<div> <strong class="text-muted" > Dealer Name:</strong> <?php echo $contact['Contact']['company']; ?></div>
			<div> <strong class="text-muted" > Sales Person:</strong> <?php echo $contact['Contact']['sperson']; ?></div>

			<div> <strong class="text-muted" > Source:</strong> <?php echo $contact['Contact']['source']; ?></div>
			<div> <strong class="text-muted" > Dealer ID:</strong> <?php echo $contact['Contact']['company_id']; ?></div>
			<div> <strong class="text-muted" > ID:</strong> <?php echo $contact['Contact']['id']; ?></div>
			<div> <strong class="text-muted" > Name:</strong> <?php echo $contact['Contact']['first_name']; ?> <?php echo $contact['Contact']['last_name']; ?></div>
			<div> <strong class="text-muted" > Address:</strong> <?php echo $contact['Contact']['address']; ?></div>
			<div> <strong class="text-muted" > Mobile:</strong> <?php
				//echo $contact['Contact']['mobile'];
				$phone = $contact['Contact']['mobile'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;

			?></div>
			<div> <strong class="text-muted" > Phone:</strong> <?php
				$phone = $contact['Contact']['phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;
			?></div>
			<div> <strong class="text-muted" > Work number:</strong> <?php
			$phone = $contact['Contact']['work_number'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $cleaned;

			?></div>
			<div> <strong class="text-muted" > Email:</strong> <?php echo $contact['Contact']['email']; ?></div>
			<div> <strong class="text-muted" > Year:</strong> <?php echo $contact['Contact']['year']; ?></div>
			<div> <strong class="text-muted" > Make:</strong> <?php echo $contact['Contact']['make']; ?></div>
			<div> <strong class="text-muted" > Model:</strong> <?php echo $contact['Contact']['model']; ?></div>
			<div> <strong class="text-muted" > Stock Number:</strong> <?php echo $contact['Contact']['stock_num']; ?></div>
			<div> <strong class="text-muted" > Vin:</strong> <?php echo $contact['Contact']['vin']; ?></div>
			<div> <strong class="text-muted" > Web Selection:</strong> <?php echo $contact['Contact']['web_selection']; ?></div>
		</div>

	</div>
	<br>
	<div class="row" class="bs-example">
		<div class="col-md-12">
			<?php echo $this->Form->create('Contact', array('type'=>'post','class' => ' apply-nolazy', 'role'=>"form")); ?>

				<?php echo $this->Form->hidden('contact_id', array('value'=>$contact['Contact']['id'])); ?>

				<?php if($location_transfer == 'On'){ ?>

				<div class="form-group">
				<?php echo $this->Form->label('dealer_id','Select Location:', array('class'=>'strong')); ?>
				<?php
					echo $this->Form->select('dealer_id',$dealer_ids , array(
						'empty' => 'Select',
						'required' => 'required',
						'selected' => '',
						'class' => 'form-control required_input' ,'style'=>'width: 100%'
					));
				?>
				</div>

				<?php } ?>

				<?php if($contact['Contact']['user_id'] == ''){ ?>

				<div class="form-group">
					<?php echo $this->Form->label('user_id','Push From:', array('class'=>'strong')); ?>
					<?php
					echo $this->Form->select('user_id_from',$all_users , array(
					'empty' => 'Select',
					'required' => 'required',
					'selected' => '',
					'class' => 'form-control'
					));
					?>
				</div>

				<?php } ?>

				<div class="form-group">
					<?php echo $this->Form->label('user_id','Select sales person:', array('class'=>'strong')); ?>
					<?php
					echo $this->Form->select('user_id',$users , array(
					'empty' => 'Select',
					'required' => 'required',
					'selected' => '',
					'class' => 'form-control'
					));
					?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->label('notes','Notes:'); ?>
					<?php echo $this->Form->input('notes', array('label'=>false, 'div'=>false, 'type' => 'textarea','class' => 'form-control')); ?>
				</div>

				<button class='btn btn-success'>Submit</button>
			<?php echo $this->Form->end(); ?>

			<br><br>
		</div>
	</div>

	<?php }else{ ?>

		<h4 class="text-danger">This link to push lead has expired <?php echo date('m/d/Y g:i A', strtotime($hotlink['LeadpushHotlink']['created'])); ?></h4>

	<?php } ?>


</div>
