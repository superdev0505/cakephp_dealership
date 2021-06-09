<br />
<br />
<br />
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$date = new DateTime();
date_default_timezone_set($zone);
$datetime = date('l F jS, Y - h:i:s A');
//echo $datetime;
?>
<?php
$date = new DateTime();
date_default_timezone_set($zone);
$datetime2 = date('Y-m-d - h:i:s');
//echo $datetime2;
?>
<br />

<div class="innerLR">
	<div class="widget">
		<!-- Form Wizard / Widget Pills -->
		<div class="wizard">
			<div class="widget-head bg-primary">
				<div class="pull-left"> <span class="heading strong-text-white "><i class="fa fa-medkit fa-2x"></i>&nbsp;DP360 BDC App Support-Ticket</span> </div>
				<div class="pull-right"> <span class="strong innerLR"> <?php echo $datetime; ?>&nbsp;- <i><span class="label label-white label">No Outages Reported</span></i></span> </div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-body">
				<div class="innerLR">

					<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
					<?php echo $this->Form->create('Support',array('class'=>'form-horizontal apply-nolazy','role'=>"form" )); ?>


					<div class="form-group">
					<?php echo $this->Form->label('sevarity', 'Severity of support:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('sevarity',array('type'=>'select',
								'options'=>array(
									'Normal'=>'Normal - Please contact when available',
									'High'=>'High - Useable but needs repair',
									'Urgent'=>'Urgent - Immediate Support is needed'
								),'required'=>'required', 'div'=>false,'label'=>false,'empty'=>"Select",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('title', 'Support Title:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('title',array('type'=>'text','required'=>'required', 'div'=>false,'label'=>false,'placeholder'=>"Enter title",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('direct_phone', 'Direct Phone Number:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('direct_phone',array('type'=>'text','required'=>false, 'div'=>false,'label'=>false,'placeholder'=>"Direct Phone Number",'class'=>'form-control', 'required'=>'required')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('email', 'Email:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('email',array('type'=>'text','required'=>false, 'div'=>false,'label'=>false,'placeholder'=>"Enter Email",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('description', 'Support Description:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('description',array('type'=>'textarea','required'=>'required', 'rows'=>5, 'div'=>false,'label'=>false,'placeholder'=>"Enter Description",'class'=>'form-control')); ?> </div>
					</div>

					<?php echo $this->Form->input('created', array('type' => 'hidden', 'value' => "$datetime2")); ?>
					<?php echo $this->Form->input('modified', array('type' => 'hidden', 'value' => "$datetime2")); ?>






					<div class="pull-right">
						<button type="submit" id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Submit Ticket</button>
					</div>
					<div class="clearfix"></div>

					<?php echo $this->Form->end(); ?>

				</div>
			</div>


		</div>
	</div>
</div>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	$(".alert").delay(3000).fadeOut("slow");


	$("#SupportAddForm").submit(function(){

		//console.log('dd');
		$("#submit_support").attr('disabled',true);

	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
