<!-- <div class="row">
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close" type="button">×</button>
        <strong>Notice!</strong> Eblasts will also include all the new Matches from now to email sending time with selected filters (matching criteria).
    </div>
</div> -->

<div class="row">
	<?php
	if($type=='N'){ /* If its Eblast then allow to schedule only at one time */
		$send_mail_options = array(
                'yearly' => 'Yearly'
            );
		$week_day = array('Sunday'=>'Sunday',
						'Monday'=>'Monday',
						'Tuesday'=>'Tuesday',
						'Wednesday' =>'Wednesday',
						'Thursday'=>'Thursday',
						'Friday'=>'Friday',
						'Saturday'=>'Saturday'
					);
		$month = array('January'=>'January',
						'February'=>'February',
						'March'=>'March',
						'April'=>'April',
						'May'=>'May',
						'June'=>'June',
						'July'=>'July',
						'August'=>'August',
						'September'=>'September',
						'October'=>'October',
						'November'=>'November',
						'December'=>'December');
					
		
	
	?>
		<div class="col-md-3" >
			<?php
			echo $this->Form->input('period', array(
				'type' => 'select',
				'options' => $send_mail_options,
				'label'=>false,'div'=>false, 'class'=>'form-control selectpicker','style'=>'display: none','value'=>$send_mail_every
			));
			echo $this->Form->input('day', array(
				'type' => 'select',
				'options' => array('2'=>'2'),'label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'display: none','value'=>'2'
			));
			?>
			<?php
			echo $this->Form->label('month','Month:');
			echo $this->Form->input('month', array(
				'type' => 'select',
				'options' => $month,
				'empty' => 'Select','label'=>false,'div'=>false,'class' => 'form-control selectpicker','style'=>'width: 100%','value'=>''));
			?>
			<div class="separator"></div>
		</div>
		<div class="col-md-3" id="div_week_day" >
		</div>
		<div class="col-md-3" id="div_month">
		</div>
		<div class="col-md-3" id="div_day">
		</div>
		<div class="col-md-3">
		</div>
		
		

	<?php
	}else{
	?>
		<div class="col-md-12" id="schedule_single">
			<div class="col-md-3">
				<?php
				echo $this->Form->label('schedule_single_date','Select Date:');
				?>
				<div class="input-group date">
					<?php echo $this->Form->input('schedule_single_date', array('style' => "width:256px;",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control')); ?>
					
				</div>
				<div class="separator"></div>
			</div>
			<div class="col-md-3">
			<div class="input-group date" >
				<div class="input-group bootstrap-timepicker" style="margin-left:15px;">
					<?php
					echo $this->Form->label('schedule_time','Time:');
					echo $this->Form->input('schedule_time', array('label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false)); ?>
					
				</div>
			</div>
			<div class="separator bottom"></div>
		</div>
		</div>
	<?php
	}
	?>
	
    <div class="separator" style="height:190px;"></div>
</div>

<script>
//alert(getDaysInMonth('March',2014));
function getDaysInMonth(month,year) {
	var mos=['January','February','March','April','May','June','July','August','September','October','November','December']

	for (i = 0; i < 12; i++) {
		var lastDate = new Date(year, i+1, 0);
		if(month== mos[i]){
			return lastDate.getDate();
		}
	}
}

function ChangePeriod(val){
	$("#div_week_day").hide();
	$("#div_month").hide();
	$("#div_day").hide();
	
	if(val=='weekly'){
		$("#div_week_day").show();
	}else if(val=='monthly'){
		$("#div_day").show();
		FillDays('<?php echo date("F");?>','<?php echo date("Y");?>');
	}else if(val=='yearly'){
		$("#div_month").show();
		$("#div_day").show();
	}
}

function FillDays(month,year){
	if (typeof year === "undefined") {
		year = '<?php echo date("Y");?>';
	}
	
	var maxDay = parseInt(getDaysInMonth(month,year));
	var options = '<option value="">Select</option>';
	for(i=1;i<=maxDay;i++){
		options =options+'<option value="'+i+'">Day '+i+'</option>';
	}
	$("#EblastDay").html(options);
}

</script>