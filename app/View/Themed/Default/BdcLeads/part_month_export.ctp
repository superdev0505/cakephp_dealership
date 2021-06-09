<?php $style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
$style1 = 'style="background:#3695d5;color:white;border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
date_default_timezone_set(AuthComponent::user('zone'));
 ?>
<h4>Dealership Performance 360 CRM BDC Survey(Part Leads) - <?php echo date('l, F j, Y');?></h4>
<table>
<thead><tr>
<td <?php echo $style1;?>>Date</td>
<td <?php echo $style1;?>>Store</td>
<td <?php echo $style1;?>>Survey Type</td>
<td <?php echo $style1;?>>Customer Name</td>
<td <?php echo $style1;?>>Customer Phone</td>
<td <?php echo $style1;?>>Action</td>
<?php /*?><td <?php echo $style1;?>>BDC Status</td>
<td <?php echo $style1;?>>Job</td>
<td <?php echo $style1;?>>Job Description</td><?php */?>

</tr></thead>
<tbody>
		<?php
		foreach($contacts['new'] as $lead){
			$month=date('m',strtotime($lead['PartLeadsDms']['created']));
				if($stats_month=='01')
				{
					$stats_month=12;
				}else
				{
					$stats_month=$stats_month-1;
				}
				$current_month=date('m');
				$month_text='Month';
				if($month<$current_month)
				{
					$month_text='Last Month';
				}
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				echo "Parts - $month_text (New)";
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['PartLeadsDms']['name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['PartLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['PartLeadsDms']['home_phone'];?></td>
<td  <?php echo $style;?>> <a href="#" class="btn btn-info updateExcelLead" data-id="<?php echo $lead['PartLeadsDms']['id']; ?>">Update Lead</a><br /><br />&nbsp;<a href="#" class="btn btn-inverse BdcInvalidLead no-ajaxify" data-id="<?php echo $lead['PartLeadsDms']['id']; ?>">Invalid Lead</a></td>
				<?php /*?><td <?php echo $style;?>>New</td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_title'];?></td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_description'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        <?php // Last Month New?>
        
        
        <?php //last month end new ?>
        
        <?php
		foreach($contacts['call_back'] as $lead){
			$month=date('m',strtotime($lead['PartLeadsDms']['created']));
				if($stats_month=='01')
				{
					$stats_month=12;
				}else
				{
					$stats_month=$stats_month-1;
				}
				$current_month=date('m');
				$month_text='Month';
				if($month<$current_month)
				{
					$month_text='Last Month';
				}
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				echo "Parts - $month_text (New)";
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['PartLeadsDms']['name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['PartLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['PartLeadsDms']['home_phone'];?></td>
<td  <?php echo $style;?>> <a href="#" class="btn btn-info updateExcelLead" data-id="<?php echo $lead['PartLeadsDms']['id']; ?>">Update Lead</a><br /><br />&nbsp;<a href="#" class="btn btn-inverse BdcInvalidLead no-ajaxify" data-id="<?php echo $lead['PartLeadsDms']['id']; ?>">Invalid Lead</a></td>
				<?php /*?><td <?php echo $style;?>>New</td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_title'];?></td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_description'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
        <?php // Last month Call Back ?>
       
        
        <?php // End Last month Callback ?>
         <?php
		foreach($contacts['voicemail'] as $lead){
			$month=date('m',strtotime($lead['PartLeadsDms']['created']));
				if($stats_month=='01')
				{
					$stats_month=12;
				}else
				{
					$stats_month=$stats_month-1;
				}
				$current_month=date('m');
				$month_text='Month';
				if($month<$current_month)
				{
					$month_text='Last Month';
				}
			?>
			<tr class="gradeA">
				<td <?php echo $style;?>><?php echo date('l, F j, Y');?></td>
				<td <?php echo $style;?>><?php echo AuthComponent::user('dealer');?></td>
				<td <?php echo $style;?>><?php 
				echo "Parts - $month_text (New)";
				
				?></td>
                <td <?php echo $style;?>><?php echo $lead['PartLeadsDms']['name'];?></td>
				<td <?php echo $style;?>><?php $phone = $lead['PartLeadsDms']['home_phone'];
$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
echo $lead['PartLeadsDms']['home_phone'];?></td>
<td  <?php echo $style;?>> <a href="#" class="btn btn-info updateExcelLead" data-id="<?php echo $lead['PartLeadsDms']['id']; ?>">Update Lead</a><br /><br />&nbsp;<a href="#" class="btn btn-inverse BdcInvalidLead no-ajaxify" data-id="<?php echo $lead['PartLeadsDms']['id']; ?>">Invalid Lead</a></td>
				<?php /*?><td <?php echo $style;?>>New</td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_title'];?></td>
				<td <?php echo $style;?>><?php echo $lead['ServiceLeadsDms']['job_description'];?></td><?php */?>
			</tr>
			<?php
			}
		?>
       <?php // Last month voicemail?> 
      
       
        
		</tbody>
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->

<script type="text/javascript">
$(document).ready(function(){
	
	$(".updateExcelLead").on('click',function(e){
		e.preventDefault();
		bootbox.hideAll();
		lead_id=$(this).attr('data-id');
		$("#lead_details_content").html("&nbsp;");
		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/bdc_leads/part_lead_details/"+lead_id,
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		
		});
		
		$(".BdcInvalidLead").on('click',function(e){
		e.preventDefault();
		
		lead_id=$(this).attr('data-id');
		$(this).parent().parent().remove();
		
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/bdc_leads/part_invalid_lead/"+lead_id,
			success: function(data){
				
			}
		});
		
		});
	
	
	});
</script>                        