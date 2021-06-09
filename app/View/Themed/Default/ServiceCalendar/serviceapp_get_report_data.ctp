<?php 
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>
<style>
@media print {
	.no_show_btn{display:none;}
}
</style>
<h2 style="text-align:center;padding:10px;"><?php echo $report_header; ?></h2>
			<!-- Table -->
			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th  width="5%">ID</th>
                        <th  width="10%">Cutomer</th>
						<th  width="20%">Vehicle</th>
                        <th  width="10%">Bay</th>
                        <th  width="10%">Tech / Writer</th>
                        <th  width="10%">Service Type</th>
                        <th  width="10%">Service Status</th>
                        <th  width="10%"> Appointment</th>
                       
					</tr>
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php 
					/* foreach($lead_sources as $lead_source){ 
					if(isset( $result_ar[$lead_source])){
					$row_data = $result_ar[$lead_source]; */
					foreach($all_appointments as $s_leads){
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						
                        <td  ><?php echo $s_leads['ServiceEvent']['id']; ?><br/>
                        
						<?php 
						$stat_date = date('Y-m-d',strtotime($s_leads['ServiceEvent']['start']));
						echo $this->Html->link('Show',array('ServiceCalendar','action' => 'index','appt_date'=>$stat_date),array('class' => 'btn btn-info no_show_btn')); ?>
                        </td>
						<td  > <strong><?php echo $s_leads['ServiceLead']['first_name'];  ?> <?php echo $s_leads['ServiceLead']['last_name'];  ?></strong>
                                <br/><small>City: <?php echo $s_leads['ServiceLead']['city'];  ?></small>&nbsp;<small>State: <?php echo $s_leads['ServiceLead']['state'];  ?></small>		
                           <br/><small>Mobile: <?php echo format_phone($s_leads['ServiceLead']['mobile']);  ?></small>&nbsp;<small>Work: <?php echo format_phone($s_leads['ServiceLead']['work_number']);  ?></small><br/><small>Phone: <?php echo format_phone($s_leads['ServiceLead']['phone']);  ?></small>
                           <br/><small>Email: <?php echo $s_leads['ServiceLead']['email'];  ?></small>     
                                
                                </td>
						 <td  ><?php echo $s_leads['ServiceLead']['condition']; ?> <br/> <?php echo $s_leads['ServiceLead']['year']; ?> <br/><?php echo $s_leads['ServiceLead']['make']; ?><br/><?php echo $s_leads['ServiceLead']['model']; ?>
			<?php echo $contact['Contact']['type']; ?></span></td>
						<td  ><?php echo $s_leads['ServiceBay']['name']; ?></td>
						<td  ><strong>Tech:</strong> <?php echo $service_techs[ $s_leads['ServiceEvent']['user_id']]; ?><br/>
                        <strong>Writer:</strong><?php echo $s_leads['ServiceLead']['sperson']; ?><br />
                        <strong>2nd Tech:</strong><?php echo $service_techs[ $s_leads['ServiceLead']['tech2_id']]; ?>
                        </td>
						<td  ><?php 
						$all_event_types = explode(',',$s_leads['ServiceEvent']['event_type_id']); 
						foreach($all_event_types  as $etype){
						echo $eventTypes[$etype].'<br />';
						}?></td>
						<td  ><?php echo $s_leads['ServiceStatus']['name']; ?></td>
						<td  ><strong>Start:</strong> <?php echo date('m/d/Y h:i A',strtotime($s_leads['ServiceEvent']['start'])); ?>
                        <br />
                       <strong> End:</strong> <?php echo date('m/d/Y h:i A',strtotime($s_leads['ServiceEvent']['end'])); ?>
                        </td>
                        
					</tr>
					<!-- // Table row END -->

					
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
		
	
	<?php 
	//debug($total_count);
	//echo $this->element('sql_dump'); 
	?>
