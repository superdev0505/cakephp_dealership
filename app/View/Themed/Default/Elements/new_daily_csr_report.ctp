<?php $user_names=array();
date_default_timezone_set('America/Los_Angeles');
$unix_time = strtotime("-17 hour");
//$unix_time = strtotime("2015-03-06");
 ?>
<br />
	<h4 align="left">Pre-Purchase Survey CSR Report Detail (<?php echo date('m/d/Y', $unix_time); ?>) - <?php echo AuthComponent::user('dealer').'- #'.AuthComponent::user('dealer_id'); ?></h4>
	     <!-- Table -->
			<table border="1" cellpadding="5" align="center">
			
				
				
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						
                        <th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
						<th>Bad #</th>
                        <th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>In</th>
                        <th>In / <br /> Contact %</th>
                        <th>Sold</th>
                        <th>Sold%</th>	
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
				<?php
					//pr($report_results );
					foreach($next_today_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                        <td><?php echo $row_data['in_leads']; ?></td>
						<td><?php echo round(($row_data['in_leads']/$row_data['contact_lead'])*100); ?>%</td>
                        <td><?php echo $row_data['sold_leads']; ?></td>
                        <td><?php echo round(($row_data['sold_leads']/$row_data['contact_lead'])*100); ?>%</td>
                        <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
 <h4 align="left">Pre-Purchase Survey Report Detail (<?php echo date('F Y', $unix_time); ?>)</h4>         
 	<table border="1" cellpadding="5" align="center">
			
				
				
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						
                        <th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
						<th>Bad #</th>
                        <th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>In</th>
                        <th>In / <br /> Contact %</th>
                        <th>Sold</th>
                        <th>Sold%</th>	
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
				<?php
					//pr($report_results );
					foreach($next_month_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                        <td><?php echo $row_data['in_leads']; ?></td>
						<td><?php echo round(($row_data['in_leads']/$row_data['contact_lead'])*100); ?>%</td>
                        <td><?php echo $row_data['sold_leads']; ?></td>
                        <td><?php echo round(($row_data['sold_leads']/$row_data['contact_lead'])*100); ?>%</td>
                        <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
 <?php // Sold Survey ?>
            
 <h4 align="left">Sold Survey CSR Report Detail (<?php echo date('m/d/Y', $unix_time); ?>)</h4>        
         <table border="1" cellpadding="5" align="center">
						
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
                        <th>Bad #</th>
                       	<th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php
					//pr($report_results );
					foreach($sold_today_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                       
					       <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
                </tbody>
                </table>  
           
            <h4 align="left">Sold Survey CSR Report Detail (<?php echo date('F Y', $unix_time); ?>)</h4>        
         <table border="1" cellpadding="5" align="center">
						
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
                        <th>Bad #</th>
                       	<th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php
					//pr($report_results );
					foreach($sold_month_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                       
					       <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
                </tbody>
                </table>         
                
       <?php // Service Survey ?>
            
 <h4 align="left">Service Survey CSR Report Detail (<?php echo date('m/d/Y', $unix_time); ?>)</h4>        
         <table border="1" cellpadding="5" align="center">
						
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
                        <th>Bad #</th>
                       	<th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php
					//pr($report_results );
					foreach($service_today_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                       
					       <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
                </tbody>
                </table>  
           
            <h4 align="left">Service Survey CSR Report Detail (<?php echo date('F Y', $unix_time); ?>)</h4>        
         <table border="1" cellpadding="5" align="center">
						
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
                        <th>Bad #</th>
                       	<th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php
					//pr($report_results );
					foreach($service_month_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                       
					       <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
                </tbody>
                </table>   
                
                
                
                  <?php // Parts Survey ?>
            
 <h4 align="left">Parts Survey CSR Report Detail (<?php echo date('m/d/Y', $unix_time); ?>)</h4>        
         <table border="1" cellpadding="5" align="center">
						
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
                        <th>Bad #</th>
                       	<th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php
					//pr($report_results );
					foreach($part_today_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                       
					       <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
                </tbody>
                </table>  
           
            <h4 align="left">Parts Survey CSR Report Detail (<?php echo date('F Y', $unix_time); ?>)</h4>        
         <table border="1" cellpadding="5" align="center">
						
					<tr bgcolor="#4193d0" style="color:#fff;font-weight:bold">
						<th>CSR Name</th>
                        <th>Total <br/>Calls Made</th>
                        <th>Bad #</th>
                       	<th>Bad # %</th>
                        <th>Minus <br/> Bad & No #</th>
                        <th>Contact</th>
                        <th>Call vs <br /> Contact %</th>
                        <th>CRS%</th>
                    </tr>
				
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
                <?php
					//pr($report_results );
					foreach($part_month_data as $key=>$value){ 
					$row_data = $value[0];
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						$name=$value['User']['first_name'].' '.$value['User']['last_name'];
						$user_names[$value['BdcSurvey']['user_id']]=$name;
						echo $name; ?></td>
						<td><?php echo $row_data['source_count']; ?></td>
						<td><?php echo $row_data['bad_lead']; ?></td>
						
						<td><?php echo round(($row_data['bad_lead']/$row_data['source_count'])*100); ?> %</td>
						
						<td><?php echo ($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])); ?></td>
                        <td><?php echo $row_data['contact_lead']; ?></td>
                        <td><?php 
						if($row_data['contact_lead']==0)
						{
							echo '0';
						}else{
						echo round(($row_data['contact_lead']/($row_data['source_count']-($row_data['no_lead']+$row_data['bad_lead'])))*100); }?> %</td>
                       
					       <td><?php echo round(($row_data['crs_survey']/$row_data['contact_lead'])*100); ?>%</td>
					</tr>
					<?php } ?>
                </tbody>
                </table>                                 