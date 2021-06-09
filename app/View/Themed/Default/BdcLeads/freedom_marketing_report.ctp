<?php

 ?>
</br>
</br>
</br>
</br> 
 
<div class="innerLR">
	<!-- col-table -->
    <div class="ajax-loading hide">
		<i class="icon-spinner icon-spin icon-4x"></i>
	</div>
	<div class="widget widget-body-white" style="margin:0px;">
			<div class="widget-body bg-primary">
	<div class="row">
    <div class="col-md-4">
		<h3 style="text-align:center">Marketing Survey Response Report</h3>
      </div>
 
      <div class="col-md-2">
						<label style="width:20%;float:left;">From</label>	 
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('report_start_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($report_start_date)))); 
								
								?>
                               						
							</div>
                            </div>
         <div class="col-md-2">
						<label style="width:20%;float:left;">To</label>	 
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('report_end_date', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($report_end_date)))); 
								
								?>
                               						
							</div>
                            </div> 
                   <div class="col-md-1">
                   <a href="javascript:void(0)" id="make_search" class="btn btn-inverse">Search</a>
                   </div> 
                   <div class="col-md-2">
                   <?php			
			echo $this->Html->link('<i class="fa fa-print"></i>','javascript:void(0)',array('class'=>'btn btn-inverse pull-right','id'=>'PrintReportData','escape'=>false,'data-id'=>'dealership')); 
			
			?>
            
                   </div>                          
						</div> 
	</div></div>
   
	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">
		<div id="report_data_container">
			
            <h3><?php 
		
			echo 'Marketing Survey Response Report  - ';
			echo date('m/d/Y',strtotime($report_start_date)); ?> to <?php echo date('m/d/Y',strtotime($report_end_date)); echo ' (Total Contact Calls : '.count($bdc_survey_ids).')'; ?></h3>
            	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr class="bg-inverse">
						<th>Question</th>
						<th>Yes Count</th>
                        <th>No Count</th>
                        <th>N/A Count</th>
                                     
                    </tr>
				</thead>
                <tbody>
                <?php 
				
				foreach($question_dealer_count as $response){				
				?>
                <tr>
					<td><?php echo $response['Question']['name']; ?></td>
                    <td><?php echo $response[0]['yes_count']; ?></td>
                    <td><?php echo $response[0]['no_count'];  ?></td>
                    <td><?php echo $response[0]['na_count'];    ?></td>                        
                   
                </tr>
				<?php } ?>
                </tbody>
                </table>
           
       
			</div>
			
			
		</div>

	</div>
 </div>
<script type="text/javascript">
$script.ready('bundle', function() {
	
	$("#report_start_date").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#report_end_date').bdatepicker('setStartDate', startDate);
		 $(this).bdatepicker('hide');
	});	
	$("#report_end_date").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#report_start_date').bdatepicker('setEndDate', startDate);
		 $(this).bdatepicker('hide');
	});	
	$("#make_search").on('click',function(){
		$report_end_date = $("#report_end_date").val();
		$report_start_date = $("#report_start_date").val();	
		
		window.location.href = '<?php echo $this->Html->url(array('controller'=>'bdc_leads','action' => 'freedom_marketing_report')); ?>/report_start_date:'+$report_start_date+'/report_end_date:'+$report_end_date;
		
		});	
		
		// Print report		
		$("#PrintReportData").on('click',function(e){
		e.preventDefault();
		$("#report_data_container").printThis();		
		});
	
	});
</script>
