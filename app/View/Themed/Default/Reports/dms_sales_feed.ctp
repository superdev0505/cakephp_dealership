<?php
function phone_no_format($phone = '')
{
$mobile_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it
return $cleaned;
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
    <div class="col-md-5">
		<h3 style="text-align:center">DMS/Sold Comparison</h3>
      </div>
      <div class="col-md-3" style="width:20% !important">
						<label style="width:20%;float:left;">From</label>	 
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('dms_feed_date_from', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => $feed_start_date)); 
								
								?>
                               						
							</div>
                            </div>
         <div class="col-md-3" style="width:20% !important">
						<label style="width:20%;float:left;">To</label>	 
                            <div class="input-group date" style="width:80%;" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('dms_feed_date_to', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'select Date','value' => $feed_end_date)); 
								
								?>
                               						
							</div>
                            </div> 
                   <div class="col-md-1">
                   <a href="javascript:void(0)" id="make_search" class="btn btn-inverse">Search</a>
                   </div>                           
						</div> 
	</div></div>
   
	<div class="separator"></div>
	<!-- Widget -->
	<div class="widget widget-body-white widget-heading-simple">

		<div class="widget-body">
	
			
            <h3>CRM Lead Solds from date <?php echo date('m/d/Y',strtotime($feed_start_date)); ?> to <?php echo date('m/d/Y',strtotime($feed_end_date)); echo ' ('.count($sold_leads).')'; ?></h3>
            	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr class="bg-inverse">
						<th width="5%">ID</th>
						<th width="20%">Name</th>
                        <th width="20%">Phone #s</th>
                        <th width="20%">Email</th>
                        <th width="20%">Salesperson</th>
                        <th width="3%">Condition</th>
                        <th width="8%">Vin</th>
                        <th width="9%">Make</th>
                        <th width="9%">Model</th>
                        <th width="4%">Year</th>
                        <th width="4%">Source</th>
                        <th width="4%">Lead Type</th>
                        <th width="11%">Sold Date</th>
                        <th width="11%">Modified</th>
                        
                    </tr>
				</thead>
                <tbody>
                <?php 
				$mobile_array = array();
				$phone_array = array();
				$email_array = array();
				foreach($sold_leads as $lead){ 
				if(!empty($lead['LeadSold']['mobile']))
				$mobile_array[$lead['LeadSold']['id']] = phone_no_format($lead['LeadSold']['mobile']);
				if(!empty($lead['LeadSold']['phone']))
				$phone_array[$lead['LeadSold']['id']] = phone_no_format($lead['LeadSold']['phone']); 
				if(!empty($lead['LeadSold']['email']))
				$email_array[$lead['LeadSold']['id']] = strtolower($lead['LeadSold']['email']);
				?>
                <tr>
					<td id="LeadSold_<?php echo $lead['LeadSold']['id']; ?>"><?php echo $lead['LeadSold']['id']; ?></td>
                    <td><?php echo $lead['LeadSold']['first_name']. ' '.$lead['LeadSold']['last_name']; ?></td>
                    <td><?php echo "Mobile :" .phone_no_format($lead['LeadSold']['mobile']);
							echo "<br /> ";
							 echo "Phone : ".phone_no_format($lead['LeadSold']['phone']); 
					
					; ?></td>
                    <td style = "width:200px;"><?php echo $lead['LeadSold']['email'];   ?></td>
                    <td><?php echo $lead['LeadSold']['sperson']; ?></td>
                    <td><?php echo $lead['LeadSold']['condition']; ?></td>
                    <td><?php echo $lead['LeadSold']['vin']; ?></td>
                    <td><?php echo $lead['LeadSold']['make']; ?></td>
                    <td><?php echo $lead['LeadSold']['model']; ?></td>
                    <td><?php echo $lead['LeadSold']['year']; ?></td>
                    <td><?php echo $lead['LeadSold']['source']; ?></td>
                      <td><?php echo $contact_lead_type[$lead['LeadSold']['contact_status_id']]; ?></td>
                    <td><?php echo date('m/d/Y H:i A',strtotime($lead['LeadSold']['created'])); ?></td>
                    <td><?php echo date('m/d/Y H:i A',strtotime($lead['LeadSold']['modified'])); ?></td>
                </tr>
				<?php } ?>
                </tbody>
                </table>
           
         <hr style="margin-top:20px;margin-bottom:20px;"/>
            <h3>DMS Feed Sales Lead from date <?php echo date('m/d/Y',strtotime($feed_start_date)); ?> to <?php echo date('m/d/Y',strtotime($feed_end_date)); echo ' ('.count($dms_sales_leads).')'; ?></h3>
            	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" >
			
				<!-- Table heading -->
				<thead>
					<tr class="bg-primary">
						<th width="7%">ID</th>
						<th width="20%">Name</th>
                        <th width="20%">Phone #s</th>
                        <th width="20%">Email</th>
                        <th width="20%">Salesperson</th>
                        <th width="3%">Condition</th>
                        <th width="10%">Vin</th>
                        <th width="11%">Make</th>
                        <th width="9%">Model</th>
                        <th width="3%">Year</th>
                        
                       	<th width="10%">Sold Date</th>
                        
                  </tr>
				</thead>
                <tbody>
                 <?php 
				 $matched_search_key = array();
				 foreach($dms_sales_leads as $lead){
					 $set_icon = 0;
					 $mobile = phone_no_format($lead['SalesLeadsDms']['mobile']);
					 $phone = phone_no_format($lead['SalesLeadsDms']['phone']);
					 $email = strtolower($lead['SalesLeadsDms']['email']);
					 if(in_array($mobile,$mobile_array) || in_array($phone,$phone_array) ||in_array($email,$email_array)||in_array($phone,$mobile_array)||in_array($mobile,$phone_array) )	 {
						 $search_key = array_search($mobile,$mobile_array);
						 if(!$search_key){$search_key = array_search($phone,$phone_array);}
						 if(!$search_key){$search_key = array_search($email,$email_array);}
						 if(!$search_key){$search_key = array_search($phone,$mobile_array);}
						 if(!$search_key){$search_key = array_search($mobile,$phone_array);}
						 $matched_search_key[] =  $search_key;
						 $set_icon = 1;
					 }
					  ?>
                 <tr>
					<td><?php
					if($set_icon)
					{
						echo '<i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;"></i>';
					}
					 echo $lead['SalesLeadsDms']['id']; ?></td>
                    <td><?php echo $lead['SalesLeadsDms']['name']; ?></td>
                    <td><?php echo "Mobile :".$mobile;
							echo "<br />";
							echo "Phone :".$phone;
					 ?></td>
                    <td><?php   echo $lead['SalesLeadsDms']['email']; ?></td>
                    <td><?php echo $lead['SalesLeadsDms']['sperson']; ?></td>
                    <td><?php echo ($lead['SalesLeadsDms']['unit_condition'] == 'N')?'New':'Used'; ?></td>
                    <td><?php echo $lead['SalesLeadsDms']['vin_no']; ?></td>
                    <td><?php echo $lead['SalesLeadsDms']['unit_make']; ?></td>
                    <td><?php echo $lead['SalesLeadsDms']['unit_model']; ?></td>
                    <td><?php echo $lead['SalesLeadsDms']['unit_year']; ?></td>
                    <td><?php echo date('m/d/Y',strtotime($lead['SalesLeadsDms']['date_final'])); ?></td>
                  </tr>
                <?php } ?>
                </tbody>
                </table>
            
			
			
			
		</div>

	</div>
 </div>
<script type="text/javascript">
$script.ready('bundle', function() {
	$search_array = <?php echo json_encode($matched_search_key); ?>;
	for($i=0;$i<$search_array.length;$i++)
	{
		$id_key = '#LeadSold_'+$search_array[$i];
		$td_val =  $($id_key).text();
		$($id_key).html('<i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;"></i>'+$td_val);
	}
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
		window.location.href = '<?php echo $this->Html->url(array('controller'=>'reports','action' => 'dms_sales_feed')); ?>/from_feed_stat_date:'+$from_feed_date+'/to_feed_stat_date:'+$to_feed_date ;
		
		});	
	
	});
</script>
