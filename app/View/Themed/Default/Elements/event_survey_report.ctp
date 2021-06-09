<?php
function phone_no_format($phone = '')
{
$mobile_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $mobile_number); //Re Format it
return $cleaned;
}
$surveys = array(14 =>'Event - Prospect Survey',13 =>'Event - Sold Survey');
 ?>

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
           
       