<br><br><br>
<div class="innerAll">
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body text-center" >

				<?php echo $this->Form->create('Contact', array('type' => 'GET','url' => array('controller' => 'email', 'action' => 'download_email'), 'id' => 'download_email_form', 'class' => 'form-inline no-ajaxify')); ?>

					<input type='hidden' name='s_d_range' value='<?php echo date("Y-m-d",strtotime("-1 month")); ?>' id = 's_d_range'>
					<input type='hidden' name='e_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 'e_d_range'>


				<i class="fa fa-envelope"></i>
				Download Email: <?php  echo $this->Form->label('search_lead_type', 'Lead Type: &nbsp;');
                if($light_speed_bool) $opts = array('sold'=>'Sold', 'not_sold'=>'Not Sold','all'=>'All','adp_customer'=>'Light Speed');
                else $opts = array('sold'=>'Sold', 'not_sold'=>'Not Sold','all'=>'All');
				echo $this->Form->input('search_lead_type', array(
				'div' => false,
				'options' => $opts,
				'class' => 'form-control',
				'label' => false,
				'style' => 'width: auto'), array('div' => false));
				?>

				 &nbsp; &nbsp; &nbsp;
				 <strong>Period:</strong>

			 	<div id="reportrange"  style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
					<span>
						<a href="javascript:void(0)" onclick="PopulateDatePicker();">
							<?php echo date("F j, Y",strtotime("-1 month")); ?> - <?php echo date("F j, Y",strtotime("now")); ?>
							<b class="caret"></b>
						</a>
					</span>
				</div>
				&nbsp;
				<button id="btn-download-email" class="btn btn-warning btn-sm" type="button">
					<i class="fa fa-download"></i> Download
				</button>

				<a href="/" class="btn btn-danger btn-sm no-ajaxify">Back</a>

				<br><br>

				<strong>Columns: </strong> &nbsp;
				<?php echo $this->Form->input('first_name', array('checked' => true,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " First Name", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('last_name', array('checked' => true,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Last Name", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('email', array('checked' => true,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Email", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('mobile', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Cell", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('phone', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Phone", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('work_number', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Work Number", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('address', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Address", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('city', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " City", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('state', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " State", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;

				<?php echo $this->Form->input('zip', array('checked' => false,
				'hiddenField' => false, 'div' => false, 'class' => '', 'label' => " Zip", 'value' => 1, 'type' => 'checkbox')); ?> &nbsp;


				<?php echo $this->Form->end(); ?>

		</div>


	</div>


</div>

<script type="text/javascript">
function PopulateDatePicker() {

	var cb = function(start, end, label) {
		console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
		$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

		$("#s_d_range").val( start.format('YYYY-MM-DD') );
		$("#e_d_range").val( end.format('YYYY-MM-DD') );
	}

	var optionSet1 = {
	    startDate: '<?php echo date("m/d/Y",strtotime("-1 month")); ?>',
	   endDate: '<?php echo date("m/d/Y",strtotime("now")); ?>',
	    minDate: '01/01/2000',
	    maxDate: '12/31/<?php echo date('Y'); ?>',
	    showDropdowns: true,
	    showWeekNumbers: true,
	    timePicker: false,
	    timePickerIncrement: 1,
	    timePicker12Hour: true,
	    ranges: {
	       'Today': [moment(), moment()],
	       'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
	       'Last 7 Days': [moment().subtract('days', 6), moment()],
	       'Last 30 Days': [moment().subtract('days', 29), moment()],
	       'This Month': [moment().startOf('month'), moment().endOf('month')],
	       'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
	    },
	    opens: 'left',
	    buttonClasses: ['btn btn-default'],
	    applyClass: 'btn-small btn-primary',
	    cancelClass: 'btn-small',
	    format: 'MM/DD/YYYY',
	    separator: ' to ',
	    locale: {
	        applyLabel: 'Submit',
	        cancelLabel: 'Clear',
	        fromLabel: 'From',
	        toLabel: 'To',
	        customRangeLabel: 'Custom',
	        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
	        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
	        firstDay: 1
	    }
	  };

	$('#reportrange').daterangepicker(optionSet1, cb);

}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	$("#btn-download-email").click(function(){

		var form_vals = $("#download_email_form").serialize();

		location.href = "/email/download_email/?"+form_vals;

	});

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
