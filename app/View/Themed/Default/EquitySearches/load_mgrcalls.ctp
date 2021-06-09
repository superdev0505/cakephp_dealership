<div class="widget widget-body-white">
		<div class="widget-body">
			
			<?php echo $this->Form->create('LoadMgrcalls', array('type'=>'GET','url' => array('controller' => 'equity_searches', 'action' => 'save_search'),'class' => 'form-inline no-ajaxify')); ?>

			<div class="row">
				<div class="col-md-3">

				</div>	
				<div class="col-md-2">
				
					<?php echo $this->Form->label('search_contact_status_id','Lead Type:', array('class'=>'strong')); ?>
					<?php
						echo $this->Form->input('search_contact_status_id',array(
						'type'=>'select',	
						'options'=> $contactstatusarr,
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'empty'=>'Select',
						));
					?>

					<input type='hidden' name='s_d_range_mgr' value='<?php echo $date_start; ?>' id = 's_d_range_mgr'>
					<input type='hidden' name='e_d_range_mgr' value='<?php echo $date_end; ?>' id = 'e_d_range_mgr'>

				</div>
				<div class="col-md-3">

				
					<div id="reportrange_mgr" class=""  style="width: 258px; background: #fff; cursor: pointer; padding: 4px 10px; border: 1px solid #ccc; margin-right: 25px; margin-bottom: 4px;">
						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						<span><?php echo date("F j, Y",strtotime($date_start)); ?> - <?php echo date("F j, Y",strtotime($date_end)); ?></span> 
						<b class="caret"></b>	
					</div>

					

				</div>	
				<div class="col-md-3">
					<button type="button" id="btn_loadmgrcalls" class="btn btn-primary btn-sm">Search</button> &nbsp;
				</div>	
			</div>
			<?php echo $this->Form->end(); ?>

			
		</div>
	</div>


<div class="widget widget-body-white">
	<div class="widget-body">
		<div id="mgr24hr_search_result">
		</div>
	</div>
</div>

<script type="text/javascript">

function do_search_mgr_calls(){
		$("#mgr24hr_search_result").fadeOut();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/equity_searches/do_mgrcalls_search/",
			data: {'search_contact_status_id': $("#LoadMgrcallsSearchContactStatusId").val(), 'start_date':$("#s_d_range_mgr").val(), 'end_date': $("#e_d_range_mgr").val()},
			success: function(data){
				console.log(data);
				$("#mgr24hr_search_result").html(data);
				$("#mgr24hr_search_result").fadeIn();
			}
		});

}

$(function(){

	console.log("hello");

	do_search_mgr_calls();
	$("#btn_loadmgrcalls").click(function(){
		do_search_mgr_calls();
	});



	var cb1 = function(start, end, label) {
        console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#reportrange_mgr span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range_mgr").val( start.format('YYYY-MM-DD') );
        $("#e_d_range_mgr").val( end.format('YYYY-MM-DD') );


        do_search_mgr_calls();      
    }



	var optionSet1_mgr = {
        startDate: '<?php echo date("m/d/Y",strtotime($date_start)); ?>',
       	endDate: '<?php echo date("m/d/Y",strtotime($date_end)); ?>',
        minDate: '01/01/2000',
        maxDate: '12/31/<?php echo date('Y'); ?>',
        dateLimit: { days: 7 },
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
    
	$('#reportrange_mgr').daterangepicker(optionSet1_mgr, cb1);
});

</script>