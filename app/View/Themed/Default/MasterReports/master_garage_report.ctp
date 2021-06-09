
<?php 
	function calculate_percent($val1, $val2){
		//debug($val1);
		if($val2 == 0 && $val1 == 0)
			return 0;
		else if($val1 == 0 &&  $val2 == 0){
			return 0;
		}
		else if($val1 == 0 &&  $val2 != 0){
			return $val2 * 100;
		}
		else{
			return round( ($val2/$val1) * 100 ) ;
		}
	}
	function secondsToTime($seconds) {
		$dtF = new DateTime("@0");
		$dtT = new DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a d, %h h, %m m');
	}
?>
	<div class='clearfix'>
		

		<div class="row">
			
			<div class="col-md-6">
				<h3 class="text-primary">Entire Dealership - <?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></h3>
			</div>
			<div class="col-md-4">
				
				


			</div>
			<div class="col-md-2 text-right">
				<a class="btn btn-inverse print_btn no-ajaxify" 
				onclick='javascript: window.open("<?php echo $this->Html->url(array('controller' => $this->request->params['controller'], 'action' => $this->request->params['action'], 'view_type'=>'print',  '?' =>  $this->request->query));?>");'   
				href="javascript:"><i class="fa fa-print"></i> Print</a>
			</div>
		</div>
		



	</div>
	<div class="separator"></div>
	
    
    <h3 class="text-primary">Showroom</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Totals</h4>
		</div>
		<div class="widget-body innerAll">
			<?php 
			unset($custom_step_map[1]);
			echo $this->element('deals_total_table_garage', array('stat_type'=>'deal_registers_showroom', 'custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers_showroom,'contact_status'=>7,'total_sold_count' => 0)); ?>
		</div>
	</div>
    <?php $total_sold_count = ($phone_sold_count + $mobile_sold_count + $web_sold_count); ?>
     <h3 class="text-primary">Sold(Web,Phone,Mobile)</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Total</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs">
		<!-- Table heading -->
                <thead>
                    <tr>
                    <th>Web Solds</th>
                    <th>Mobile Solds</th>
                    <th>Phone Solds</th>
                     <th>Total Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $web_sold_count ?></td>
                        <td><?php echo $mobile_sold_count ?></td>
                        <td><?php echo $phone_sold_count ?></td>
                         <td><?php echo ($phone_sold_count + $mobile_sold_count + $web_sold_count); ?></td>
                    </tr>
                </tbody>
            
            
          </table>
		</div>
	</div>
     <h3 class="text-primary">Total Garage</h3>	
	<div class="widget">
		<div class="widget-head">
			<h4 class="heading">Dealership Total</h4>
		</div>
		<div class="widget-body innerAll">
			<?php echo $this->element('deals_total_table_garage', array('custom_step_map'=>$custom_step_map, 'deals_total'=>$deal_registers_showroom,'total_sold_count' => $total_sold_count)); ?>
            
            
            
		</div>
	</div>


	<?php //debug($deal_registers); ?>
	
<script>
$(function(){

	 var cb = function(start, end, label) {
        //console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range").val( start.format('YYYY-MM-DD') );
        $("#e_d_range").val( end.format('YYYY-MM-DD') );

        $.ajax({
			type: "GET",
			cache: false,
			url: "/master_reports/master_garage_report?start_date="+start.format('YYYY-MM-DD')+"&end_date="+ end.format('YYYY-MM-DD'),
			success: function(data){
        		$('#report_data_container').html(data);
			
			}
		});


        
      }


	var optionSet1 = {
        startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
       endDate: '<?php echo date("m/d/Y",strtotime($e_date)); ?>',
        minDate: '01/01/2008',
        maxDate: '<?php echo date("m/d/Y"); ?>',
        <?php if($report_limit == 'On'){ ?>
        dateLimit: { days: 60 },
        <?php }else{ ?>
        	dateLimit: { days: 365 },
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
	// $('#reportrange').daterangepicker(optionSet1, cb);




	$(".realtime_stat_details").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Master Report Details",
				}).find("div.modal-dialog").addClass("modal1180");
				}
			}
		});
		
	});



	$(".popup_details").click(function(e){
		e.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				if(data!='Not Found')
				{
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Master Report Details",
				}).find("div.modal-dialog").addClass("modal1180");
				}
			}
		});
		
	});
	

	$("#master_report_type_s").change(function(event){
		if( $(this).val() == 'index'){
			//data_id=$("#LeadGroupStat").attr('data-id');
			//group=$("#LeadGroupStat").val();
			/*if(data_id!='dealership')
			{
				group='all_builds';
			}*/
			$.ajax({
				type: "POST",
				cache: false,
				url:  "<?php echo $this->Html->url(array('controller'=>'master_reports','action'=>'index')) ?>/index/",
				success: function(data){
					$("#report_data_container").html(data);
				}
			});
			
		}
			
	});
	
	$(".popup").click(function(event){
		
		event.preventDefault();
		
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Report",
				});
			}
		});
		
	});


});

</script>
	
	
