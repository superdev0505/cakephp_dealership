<?php
function phone_no_format($phone = '')
{
$mobile_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it
return $cleaned;
}
$surveys = array(14 =>'Event - Prospect Survey',13 =>'Event - Sold Survey');
if(AuthComponent::user('dealer_id') == 40013){
$surveys = array(13 => 'Marketing Survey');
}elseif(AuthComponent::user('dealer_id') == 2344)
{
	$surveys = array(4 => 'CSI 17 Sold');
}
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
    <div class="col-md-3" style="width:23%">
		<h3 style="text-align:center">Event Survey Report</h3>
      </div>
     <div class="col-md-2" style="width:20%">
     <label style="width:20%;float:left;">Survey</label>
     <?php 
	 echo $this->Form->input('survey',array('type' => 'select','class'=>'form-control','style'=>'width:80%','label' =>false,'div' => false,'options' => $surveys,'value' => $survey_id));
	 ?>	 
     </div> 
      <div class="col-md-3" style="width:20% !important">
						<label style="width:20%;float:left;">From</label>	 
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('dms_feed_date_from', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($feed_first_date)))); 
								
								?>
                               						
							</div>
                            </div>
         <div class="col-md-3" style="width:20% !important">
						<label style="width:20%;float:left;">To</label>	 
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('dms_feed_date_to', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => date('Y-m-d',strtotime($feed_last_date)))); 
								
								?>
                               						
							</div>
                            </div> 
                   <div class="col-md-1">
                   <a href="javascript:void(0)" id="make_search" class="btn btn-inverse">Search</a>
                   </div> 
                   <div class="col-md-1">
                   <?php			
			echo $this->Html->link('<i class="fa fa-print"></i>','javascript:void(0)',array('class'=>'btn btn-inverse pull-right','id'=>'PrintReportData','escape'=>false,'data-id'=>'dealership')); 
			
			?>
            <a href="javascript:void(0)" id="export_report" class="btn btn-inverse"><i class="fa fa-download"></i></a>
                   </div>                          
						</div> 
	</div></div>
   
	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">
		<div id="report_data_container">
			
            <h3><?php 
			echo $surveys[$survey_id].'  - ';
			echo date('m/d/Y',strtotime($feed_first_date)); ?> to <?php echo date('m/d/Y',strtotime($feed_last_date)); echo ' ('.count($survey_data).')'; ?></h3>
            	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr class="bg-inverse">
						<th width="5%">ID</th>
						<th width="20%">Name</th>
                        <th width="20%">Phone #s</th>
                        <th width="20%">Email</th>
                       <?php /*?> <th width="20%">Salesperson</th><?php */?>
                       <th width="20%">CSR Status</th>
                       <th width="20%">Customer Status</th>
                       <th width="20%">CSR</th>                      
                        <th width="11%">Called Date</th>
                        
                    </tr>
				</thead>
                <tbody>
                <?php 
				$mobile_array = array();
				$phone_array = array();
				$email_array = array();
				foreach($survey_data as $lead){				
				?>
                <tr>
					<td ><?php echo $lead['Contact']['id']; ?></td>
                    <td><?php echo $lead['Contact']['first_name']. ' '.$lead['Contact']['last_name']; ?></td>
                    <td><?php echo "Mobile :" .phone_no_format($lead['Contact']['mobile']);
							echo "<br /> ";
							 echo "Phone : ".phone_no_format($lead['Contact']['phone']); 
					
					; ?></td>
                    <td style = "width:200px;"><?php echo $lead['Contact']['email'];   ?></td>
                   <?php /*?> <td><?php echo $lead['Contact']['sperson']; ?></td><?php */?>
                    <td><?php echo $lead['BdcSurvey']['status']; ?></td>
                    <td><?php echo $lead['BdcStatus']['name']; ?></td>
                     <td><?php echo $lead[0]['CSR']; ?></td>
                   
                    <td><?php echo date('m/d/Y H:i A',strtotime($lead['BdcSurvey']['created'])); ?></td>
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
	
	$("#dms_feed_date_from").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#dms_feed_date_to').bdatepicker('setStartDate', startDate);
		 $(this).bdatepicker('hide');
	});	
	$("#dms_feed_date_to").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
		$('#dms_feed_date_from').bdatepicker('setEndDate', startDate);
		 $(this).bdatepicker('hide');
	});	
	$("#make_search").on('click',function(){
		$to_feed_date = $("#dms_feed_date_to").val();
		$from_feed_date = $("#dms_feed_date_from").val();	
		$survey = $("#survey").val();
		window.location.href = '<?php echo $this->Html->url(array('controller'=>'bdc_leads','action' => 'event_survey_report')); ?>/survey:'+$survey+'/from_feed_stat_date:'+$from_feed_date+'/to_feed_stat_date:'+$to_feed_date ;
		
		});	
		$("#export_report").on('click',function(){
		$to_feed_date = $("#dms_feed_date_to").val();
		$from_feed_date = $("#dms_feed_date_from").val();	
		$survey = $("#survey").val();
		window.location.href = '<?php echo $this->Html->url(array('controller'=>'bdc_leads','action' => 'event_survey_report')); ?>/survey:'+$survey+'/from_feed_stat_date:'+$from_feed_date+'/to_feed_stat_date:'+$to_feed_date+'/export:yes' ;
		
		});	
		
		$("#PrintReportData").on('click',function(e){
		e.preventDefault();
		$("#report_data_container").printThis();		
		});
	
	});
</script>
