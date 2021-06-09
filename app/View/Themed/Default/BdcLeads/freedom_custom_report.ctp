<?php $user_names=array();
$total_array = array('total_calls_made' => 0,'total_calls_per_hour' => 0,'total_contacts' =>0,'total_bad_leads'=>0,'total_no_leads' => 0 , 'total_appointments' => 0,'total_leads' => 0,'total_sold' =>0,'total_lead_closed' => 0,'total_lead_open' => 0);
 ?>
 
 <?php
$stat_count_report = array();
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
		<h3 style="text-align:center">Marketing Survey Report</h3>
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
			//echo $this->Html->link('<i class="fa fa-print"></i>','javascript:void(0)',array('class'=>'btn btn-inverse pull-right','id'=>'PrintReportData','escape'=>false,'data-id'=>'dealership')); 
			
			?>
            
                   </div>                          
						</div> 
	</div></div>
   
	<div class="separator"></div>
<!-- Table -->
<div class="widget">
		<div class="widget-head">
			<h4 class="heading">CSR Report</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Representative:</th>
						<th>Calls Made</th>
                        <th>Calls per Hour</th>
                        <th>Contacts</th>
                        <th>Contacts per Call(%)</th>
                        <th>Appointments</th>
                        <th>Leads</th>
                        <th>Leads Sold</th>
                        <th>% Sold</th>
                        <th>Leads Closed</th>
                        <th>Leads Open</th>
                        
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					foreach($report_results as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						$stat_count_report[$value['BdcSurvey']['user_id']]['user_id'] = $value['BdcSurvey']['user_id'];
						echo $name; ?></td>
						<td><?php 
						$total_array['total_calls_made'] +=$row_data['source_count'];
						$stat_count_report[$value['BdcSurvey']['user_id']]['total_calls'] = $row_data['source_count'];
						echo $row_data['source_count']; ?></td>						
						<td><?php 
						$total_array['total_calls_per_hour'] += round($row_data['source_count']/$hourdiff);
						echo round($row_data['source_count']/$hourdiff); ?></td>
                        <td><?php 
						$total_array['total_contacts'] +=$row_data['contact_lead'];
						echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						$total_array['total_bad_leads'] +=$row_data['bad_lead'];
						$total_array['total_no_leads'] +=$row_data['no_lead'];
						$stat_count_report[$value['BdcSurvey']['user_id']]['bad_leads'] = $row_data['bad_lead'];
						$stat_count_report[$value['BdcSurvey']['user_id']]['voicemail_leads'] = $row_data['voicemail_lead'];
						$stat_count_report[$value['BdcSurvey']['user_id']]['not_interested'] = $row_data['not_interested'];
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); ?> %</td>
                        <td><?php 
						$total_array['total_appointments'] +=$row_data['appointment_count'];
						echo $row_data['appointment_count']; ?></td>	
                        <td><?php 
						$total_array['total_leads'] +=$row_data['new_lead'];
						echo $row_data['new_lead']; ?></td>	
                        <td><?php 
						$total_array['total_sold'] +=$row_data['sold_leads'];
						$lead_bytype_report[$value['BdcSurvey']['user_id']]['buyer_leads'] = $row_data['sold_leads'];
						$lead_soldtype_report[$value['BdcSurvey']['user_id']]['buyer_leads'] = $row_data['sold_leads'];
						echo $row_data['sold_leads']; ?></td>	
                        <td><?php echo round(($row_data['sold_leads']/$row_data['new_lead'])*100); ?>%</td>	
                        <td><?php 
						$total_array['total_lead_closed'] +=$row_data['closed_leads'];
						echo $row_data['closed_leads']; ?></td>	
                        <td><?php 
						$total_array['total_lead_open'] +=$row_data['open_leads'];
						echo $row_data['open_leads']; ?></td>
					</tr>
					<?php } ?>
					<tr class="text-primary">
                        <td><strong>Total</strong></td>
                        <td><?php echo $total_array['total_calls_made'];  ?></td>
                        <td><?php echo $total_array['total_calls_per_hour'];  ?></td>
                        <td><?php echo $total_array['total_contacts'];  ?></td>
                        <td><?php 
					
						echo round(($total_array['total_contacts']/($total_array['total_calls_made']-($total_array['total_bad_leads']+$total_array['total_no_leads'])))*100); ?> %</td>
                        
                         <td><?php echo $total_array['total_appointments'];  ?></td>
                         <td><?php echo $total_array['total_leads'];  ?></td>
                         <td><?php echo $total_array['total_sold'];  ?></td>
                         <td><?php echo round(($total_array['total_sold']/$total_array['total_leads'])*100); ?>%</td>	
                          <td><?php echo $total_array['total_lead_closed'];  ?></td>
                          <td><?php echo $total_array['total_lead_open'];  ?></td>
                    </tr>
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
    
    
    <div class="widget">
		<div class="widget-head">
			<h4 class="heading">CSR Lead Type Report</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Representative</th>
						<th>Buyer Leads</th>
                        <th>Seller Leads</th>
                        <th>Trade-in Leads</th>
                        <th>Service Leads</th>
                        <th>Parts Leads</th>
                      
                        
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					$leadtype_total_array=array('total_buyer_leads' =>0,'total_seller_leads'=>0,'total_tradein_leads'=>0,'total_service_leads' => 0,'total_part_leads' => 0);
					foreach($lead_bytype_report as $user_id=>$value){ 
					
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$all_users[$user_id];
						$leadtype_user_names[$user_id]=$name;
						echo $name; ?></td>
						<td><?php 
						$stat_count_report[$user_id]['sales_leads'] = $value['tradein_leads'];
						$leadtype_total_array['total_buyer_leads'] += $value['buyer_leads'];
						echo $value['buyer_leads']; ?></td>
                        <td><?php 
						$stat_count_report[$user_id]['sales_leads'] += $value['seller_leads'];
						$leadtype_total_array['total_seller_leads'] += $value['seller_leads'];
						echo $value['seller_leads']; ?></td>
                        <td><?php 
						$leadtype_total_array['total_tradein_leads'] += $value['tradein_leads'];
						echo $value['tradein_leads']; ?></td>
                        <td><?php 
						$stat_count_report[$user_id]['service_leads'] = $value['service_leads'];
						$leadtype_total_array['total_service_leads'] += $value['service_leads'];
						echo $value['service_leads']; ?></td>						
						<td><?php 
						$stat_count_report[$user_id]['part_leads'] = $value['part_leads'];
						$leadtype_total_array['total_part_leads'] += $value['part_leads'];
						echo $value['part_leads']; ?></td>
                        
					</tr>
					<?php } ?>
					<tr class="text-primary">
                        <td><strong>Total</strong></td>
                        <td><?php echo $leadtype_total_array['total_buyer_leads'];  ?></td>
                        <td><?php echo $leadtype_total_array['total_seller_leads'];  ?></td>
                        <td><?php echo $leadtype_total_array['total_tradein_leads'];  ?></td>
                        <td><?php echo $leadtype_total_array['total_service_leads'];  ?></td>
                        <td><?php echo $leadtype_total_array['total_part_leads'];  ?></td>
                       
                    </tr>
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
    
    
    <div class="widget">
		<div class="widget-head">
			<h4 class="heading">CSR Sold Lead Type Report</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Representative</th>
						<th>Buyer Leads</th>
                        <th>Seller Leads</th>
                        <th>Trade-in Leads</th>
                        <th>Service Leads</th>
                        <th>Parts Leads</th>
                      
                        
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					$leadsoldtype_total_array=array('total_buyer_leads' =>0,'total_seller_leads'=>0,'total_tradein_leads'=> 0,'total_service_leads' => 0,'total_part_leads' => 0);
					foreach($lead_soldtype_report as $user_id=>$value){ 
					
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$all_users[$user_id];
						$leadtype_user_names[$user_id]=$name;
						echo $name; ?></td>
						<td><?php 
						$leadsoldtype_total_array['total_buyer_leads'] += $value['buyer_leads'];
						echo $value['buyer_leads']; ?></td>
                        <td><?php 
						$leadsoldtype_total_array['total_seller_leads'] += $value['seller_leads'];
						echo $value['seller_leads']; ?></td>
                        <td><?php 
						$leadsoldtype_total_array['total_tradein_leads'] += $value['tradein_leads'];
						echo $value['tradein_leads']; ?></td>
                        <td><?php 
						$leadsoldtype_total_array['total_service_leads'] += $value['service_leads'];
						echo $value['service_leads']; ?></td>						
						<td><?php 
						$leadsoldtype_total_array['total_part_leads'] += $value['part_leads'];
						echo $value['part_leads']; ?></td>
                        
					</tr>
					<?php } ?>
					<tr class="text-primary">
                        <td><strong>Total</strong></td>
                        <td><?php echo $leadsoldtype_total_array['total_buyer_leads'];  ?></td>
                        <td><?php echo $leadsoldtype_total_array['total_seller_leads'];  ?></td>
                        <td><?php echo $leadsoldtype_total_array['total_tradein_leads'];  ?></td>
                        <td><?php echo $leadsoldtype_total_array['total_service_leads'];  ?></td>
                        <td><?php echo $leadsoldtype_total_array['total_part_leads'];  ?></td>
                       
                    </tr>
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
    
    <?php foreach($per_dealer_data as $vdealer_id => $stat_data){ ?>
    <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Leads Per Salesperson : #<?php echo $vdealer_id.' - '.$stat_data['company']; ?></h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Salesperson</th>
						<th>Web Leads</th>
                        <th>Phone Leads</th>
                        <th>Showroom Leads</th>
                        <th>Mobile Leads</th>
                        <th>Not Worked</th>
                        <th>% Not Worked</th>
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					$total_sperson_lead_data = array('total_web_leads' =>0,'total_phone_leads'=>0,'total_showroom_leads'=> 0,'total_notworked_leads' => 0,'total_leads' => 0,'total_mobile_leads'=>0);
					foreach($stat_data['sperson_data'] as $data){ 
					
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						
						echo $data['Contact']['sperson']; ?></td>
						<td><?php 
						$total_sperson_lead_data['total_web_leads'] += $data[0]['web_lead_count'];
						echo $data[0]['web_lead_count']; ?></td>
                        <td><?php 
						$total_sperson_lead_data['total_phone_leads'] += $data[0]['phone_lead_count'];
						echo $data[0]['phone_lead_count']; ?></td>
                        <td><?php 
						$total_sperson_lead_data['total_showroom_leads'] += $data[0]['showroom_lead_count'];
						echo  $data[0]['showroom_lead_count']; ?></td>
                        <td><?php 
						$total_sperson_lead_data['total_mobile_leads'] += $data[0]['mobile_lead_count'];
						echo  $data[0]['mobile_lead_count']; ?></td>
                        <td><?php 
						$total_sperson_lead_data['total_notworked_leads'] +=  $data[0]['not_worked_leads'];
						echo $data[0]['not_worked_leads']; ?></td>						
						<td><?php 
						$total_sperson_lead_data['total_leads'] += $data[0]['total_lead_count'];
						echo round(($data[0]['not_worked_leads']/$data[0]['total_lead_count'])*100); ?>%
                        
                        </td>
                        
					</tr>
					<?php } ?>
					<tr class="text-primary">
                        <td><strong>Total</strong></td>
                        <td><?php echo $total_sperson_lead_data['total_web_leads'];  ?></td>
                        <td><?php echo $total_sperson_lead_data['total_phone_leads'];  ?></td>
                        <td><?php echo $total_sperson_lead_data['total_showroom_leads'];  ?></td>
                          <td><?php echo $total_sperson_lead_data['total_mobile_leads'];  ?></td>
                        <td><?php echo $total_sperson_lead_data['total_notworked_leads'];  ?></td>
                        <td><?php echo round(($total_sperson_lead_data['total_notworked_leads']/$total_sperson_lead_data['total_leads'])*100); ?>%</td>
                       
                    </tr>
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
                </div>
	</div>
    <?php } ?>
    
    <div class="widget">
		<div class="widget-head">
			<h4 class="heading">Call Status Count Report</h4>
		</div>
		<div class="widget-body innerAll">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Representative</th>
						<th>Bad Number</th>
                        <th>Voicemail</th>
                        <th>No Interest</th>
                        <th>Sales</th>
                        <th>Parts</th>
                        <th>Service</th>
                      
                        
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					$stat_count_total_array=array('total_bad_leads' =>0,'total_voicemail_leads'=>0,'total_nointerest_leads'=> 0,'total_service_leads' => 0,'total_part_leads' => 0,'total_sales_leads' => 0);
					foreach($stat_count_report as $user_id=>$value){ 
					
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$all_users[$user_id];
						$leadtype_user_names[$user_id]=$name;
						echo $name; ?></td>
						<td><?php 
						$stat_count_total_array['total_bad_leads'] += $value['bad_leads'];
						echo $value['bad_leads']; ?></td>
                        <td><?php 
						$stat_count_total_array['total_voicemail_leads'] += $value['voicemail_leads'];
						echo $value['voicemail_leads']; ?></td>
                        <td><?php 
						$stat_count_total_array['total_nointerest_leads'] += $value['not_interested'];
						echo $value['not_interested']; ?></td>
                        <td><?php 
						$stat_count_total_array['total_sales_leads'] += $value['sales_leads'];
						echo $value['sales_leads']; ?></td>
                        <td><?php 
						$stat_count_total_array['total_part_leads'] += $value['part_leads'];
						echo $value['part_leads']; ?></td>
                        <td><?php 
						$stat_count_total_array['total_service_leads'] += $value['service_leads'];
						echo $value['service_leads']; ?></td>						
						
                        
					</tr>
					<?php } ?>
					<tr class="text-primary">
                        <td><strong>Total</strong></td>
                        <td><?php echo $stat_count_total_array['total_bad_leads'];  ?></td>
                        <td><?php echo $stat_count_total_array['total_voicemail_leads'];  ?></td>
                        <td><?php echo $stat_count_total_array['total_nointerest_leads'];  ?></td>
                        <td><?php echo $stat_count_total_array['total_sales_leads'];  ?></td>
                        <td><?php echo $stat_count_total_array['total_part_leads'];  ?></td>
                        <td><?php echo $stat_count_total_array['total_service_leads'];  ?></td>
                        
                       
                    </tr>
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
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
		
		window.location.href = '<?php echo $this->Html->url(array('controller'=>'bdc_leads','action' => 'freedom_custom_report')); ?>/report_start_date:'+$report_start_date+'/report_end_date:'+$report_end_date;
		
		});	
		
		// Print report		
		$("#PrintReportData").on('click',function(e){
		e.preventDefault();
		$("#report_data_container").printThis();		
		});
	
	});
</script>

     
      
     
	 