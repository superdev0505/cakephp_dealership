<br />
<br />
<br />
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php

  date_default_timezone_set('America/Los_Angeles');
$date = new DateTime();
//date_default_timezone_set($zone);
$datetime = date('l F jS, Y - h:i:s A');
//echo $datetime;
?>
<?php
$date = new DateTime();
//date_default_timezone_set($zone);

$datetime2 = date('Y-m-d - h:i:s');
//echo $datetime2;
$search_filters = array('valid_email' => 'Valid Email address');
?>
<br />
<div class="innerLR">
	<div class="widget">
		<!-- Form Wizard / Widget Pills -->
		<div class="wizard">
			<div class="widget-head bg-primary">
				<div class="pull-left"> <span class="heading strong-text-white "><i class="fa fa-cloud-download fa-2x"></i>&nbsp;Export Contact</span> </div>

				<div class="clearfix"></div>
			</div>

			<div class="widget-body">
				<div class="innerLR">

					<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
					<?php echo $this->Form->create('ExportData',array('class'=>'form-horizontal apply-nolazy','role'=>"form")); ?>


					<div class="form-group">
					<?php echo $this->Form->label('columns', 'Columns to Export:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('columns',array('type'=>'select',
								'options'=>$contact_columns,'required'=>'required', 'div'=>false,'label'=>false,'empty'=>"Select",'style'=>'width:100%','multiple' =>true, 'class' => 'custom-multi-select2','value' => array('first_name','last_name','email'))); ?> </div>
					</div>
                    	<div class="form-group">
					<?php echo $this->Form->label('search_filters', 'Search Filters:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('search_filters',array('type'=>'select',
								'options'=>$search_filters, 'div'=>false,'label'=>false,'empty'=>"Select",'style'=>'width:100%','multiple' =>true, 'class' => 'custom-multi-select2','value' => array('first_name','last_name','email'))); ?> </div>
					</div>

					<div class="form-group"> <?php echo $this->Form->label('record_search', 'Search Record :',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('record_search',array('type'=>'select','required'=>'required', 'div'=>false,'label'=>false,'class'=>'form-control','options' => array('all' => 'All','date_range' => 'Date Range'))); ?> </div>
					</div>
					<div class="form-group" id="date-range-div" style="display:none;"> <?php echo $this->Form->label('start_date', 'Start From:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-3"> <?php echo $this->Form->input('start_date',array('type'=>'text','required'=>false, 'div'=>false,'label'=>false,'placeholder'=>"Select Start Date",'class'=>'form-control')); ?> </div>
                      <?php echo $this->Form->label('end_date', 'To:',array('class'=>"col-sm-1 control-label")); ?>  <div class="col-sm-3"> <?php echo $this->Form->input('end_date',array('type'=>'text','required'=>false, 'div'=>false,'label'=>false,'placeholder'=>"Select End Date",'class'=>'form-control')); ?> </div>

					</div>

          <div class="form-group">
					<?php echo $this->Form->label('group_by', 'Group By (in order added):',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('group_by',array('type'=>'select',
								'options'=>$contact_columns, 'div'=>false,'label'=>false,'empty'=>"Select",'style'=>'width:100%','multiple' =>true, 'class' => 'custom-multi-select2')); ?> </div>
					</div>

					<div class="form-group">
					<div class="col-md-6">
                    <div class="pull-right">
						<button type="submit" class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Export to XLS</button>
					</div>
                    </div>
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
		$("#ExportDataStartDate").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		});
		$("#ExportDataEndDate").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		});

	$("#ExportDataRecordSearch").change(function(){
		$val = $(this).val();
		if($val == 'date_range'){
		     $("#date-range-div").slideDown();

		}else{
			$("#date-range-div").slideUp();
		}

	});


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
