<style>
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;

}
</style>
<br><br><br>

<div class='innerAll'>


	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">


			<input type='hidden' name='s_d_range' value='<?php echo $s_date; ?>' id = 's_d_range'>
			<input type='hidden' name='e_d_range' value='<?php echo $e_date; ?>' id = 'e_d_range'>

			<div class="row">
				<div class='col-md-6'>

					<div class="clearfix ">
						<div class="pull-left"><b>Real Time Stats</b></div>
						<div class="pull-right">
							<div id="reportrange" class=""  style="background: #fff; cursor: pointer; padding: 1px 10px; border: 1px solid #ccc; margin-right: 25px; margin-bottom: 4px;">
								<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
								<span><?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></span>
								<b class="caret"></b>
							</div>
						</div>
					</div>

				</div>
				<div class='col-md-6'>

					<div class='clearfix'>
						<select  class="form-control input-sm pull-right" id="realtime_report_type_s" style="width: 175px; display: inline-block">
							<option value="realtime_report_allsteps" selected='selected'>All Steps</option>
							<option value="index">Highest Step Change</option>
						</select>
						<br>
					</div>
				</div>
			</div>

			<div id='report_data_container'></div>




		</div>


	</div>


</div>




<script>

$script.ready('bundle', function() {


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


		//moment().tz("America/Los_Angeles");
		//var zone = "America/Los_Angeles";
		// moment().tz("America/Los_Angeles").format();

		function get_realtime_url(){
			if( $("#realtime_report_type_s").val() == 'realtime_report_allsteps' ){
				return "/master_reports/realtime_report_all/";
			}else{
				return "/master_reports/realtime_report/";
			}
		}




	$("#realtime_report_type_s").change(function(event){

		//if( $(this).val() == 'index'){
			group=$("#LeadGroupStat").val();
			$.ajax({
				type: "POST",
				cache: false,
				url:  get_realtime_url()+""+$("#s_d_range").val()+"/"+$("#e_d_range").val(),
				success: function(data){
					$("#report_data_container").html(data);
				}
			});

		//}

	});



 		$.ajax({
			type: "GET",
			cache: false,
			url: get_realtime_url()+"<?php echo date("Y-m-d",strtotime($s_date)); ?>/<?php echo date("Y-m-d",strtotime($s_date)); ?>",
			success: function(data){
        		$('#report_data_container').html(data);

			}
		});







	 var cb = function(start, end, label) {
        console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range").val( start.format('YYYY-MM-DD') );
        $("#e_d_range").val( end.format('YYYY-MM-DD') );

        $.ajax({
			type: "GET",
			cache: false,
			url: get_realtime_url()+""+start.format('YYYY-MM-DD')+"/"+ end.format('YYYY-MM-DD'),
			success: function(data){
        		$('#report_data_container').html(data);

			}
		});



      }

	// $(".modal-title").replaceWith('');

	 var optionSet1 = {
            startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
           endDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
            minDate: '01/01/2012',
            maxDate: '12/31/<?php echo date('Y'); ?>',
            <?php if($report_limit == 'On'){ ?>
            dateLimit: { days: 60 },
            <?php } ?>
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

	// $('#reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

	 $('#reportrange').daterangepicker(optionSet1, cb);








	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});





</script>
