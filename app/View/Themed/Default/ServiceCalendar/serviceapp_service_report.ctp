<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}
#aptType{
	position: fixed;
    margin: -2px 0px 0px 0px;
    visibility: hidden;
}
#aptDate{
	margin: 0px 0px 4px 0px;
}
</style>
</br>
</br>
</br>
</br>

<div class="innerLR">
	<!-- col-table -->
	<div class="innerAll margin-none border-bottom text-center bg-primary">	
		<!--<i class="fa fa-bar-chart-o"></i>-->
		<div class="md-col-6">
			<div class="md-col-3">
				<div id="aptType"><h2>Select Report</h2>
					&nbsp;<select name="report_table" class="form-control input-sm" id="select_report" style="width: 300px; display: inline-block">
					<option value="" selected="selected">Select Report</option>
					<option value="yesterday_missed">Yesterday Missed Apointments</option>
					<option value="tomorrow_appointments">Tomorrow Appointments</option>
					<!--<option value="specificday_appointments">Specific Day Appointments</option>				-->
					</select>
				</div>
			</div>
			<div class="md-col-3">
				<div id="aptDate"><h2>Select Date:</h2> <input type="text" id="datepicker" style="border-color: #efefef;text-align: center;font-size: 16px;"></input>
				</div>
			</div>
		</div>            
            <?php			
			echo $this->Html->link('<i class="fa fa-print"></i> Print Report','javascript:void(0)',array('class'=>'btn btn-inverse pull-right','id'=>'PrintReportData','escape'=>false,'style'=>'display:none;margin: -28px 6px 6px 2px;','data-id'=>'dealership')); 
			?>
	</div>
	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<div id="report_data_container">			
			</div>
		</div>
	</div>
	<!-- // Widget END -->	
</div>

<script type="text/javascript">
	$script.ready('bundle', function() {
		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
		$(window).load(function(){ 
		<?php  } ?>	
		
			$("#select_report").change(function(){
				$("#report_data_container").html("");
				$("#datepicker").val("");
				$("#PrintReportData").hide();
				if($(this).val() != ""){
					$("#PrintReportData").show();
					var url = "<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'get_report_data')); ?>/report_type:"+$(this).val();
					console.log(url);
					$.ajax({
						type: "POST",
						cache: false,
						url:  url,
						success: function(data){							
							$("#report_data_container").html(data);
						}
					});
				}
			});
			
		$("#PrintReportData").on('click',function(e){
			e.preventDefault();
			$("#report_data_container").printThis();		
			});
			
			
			<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
		}); 
		<?php  } ?>	
	});
</script>
<script type="text/javascript">
	$script.ready('bundle', function() {
		<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
		$(window).load(function(){ 
		<?php  } ?>

		$( function() {
			//$( "#datepicker" ).datepicker();
			$("#datepicker").change(function(){
				$("#report_data_container").html("");
				$("#PrintReportData").hide();				
				if($(this).val() != ""){
					$("#PrintReportData").show();
					date = new Date($(this).val());
					year = date.getFullYear();
					month = date.getMonth()+1;
					dt = date.getDate();

					if (dt < 10) {
					  dt = '0' + dt;
					}
					if (month < 10) {
					  month = '0' + month;
					}
					
					var newDate = year+month+dt; //'-'
					//console.log(newDate);
					var url = "<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'get_report_data')); ?>/report_type:"+newDate;
					console.log(url);	
					$.ajax({
						type: "POST",
						cache: false,
						url:  url,
						success: function(data){							
							$("#report_data_container").html(data);
						}
					});
				}
			});
		});

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
		}); 
		<?php  } ?>	
	});	
</script>
<script type="text/javascript">	
	/**$(function(){
		$( "#datepicker" ).datepicker();
	});**/
</script>