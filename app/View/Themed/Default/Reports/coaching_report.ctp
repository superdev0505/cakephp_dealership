<style>
	.pace.pace-inactive {
		display: none;
	}
	.progress{
		height:5px;
		z-index: 1002;
		position:fixed;
		top: 0px;
		left: 0px;
		width: 100%;
		right: 0px;
		display: none;
	}
	.progress-bar{
		background:#3695d5 !important;
	}
	table.coaching-report td {
		border: 1px solid #ddd;
	}     
	table.coaching-report {
	    width: 80%;
	    margin: 0px auto;
	    background: white;
	}
	td.reports_td {
	    vertical-align: middle;
	}
	.coaching_reports_top_bar {
	    margin: 67px auto;
	    width: 87%;
	    background: #fff;
	    margin: 100px auto 7px auto !IMPORTANT;
	    box-shadow: 8px 3px 11px #a7a7a7;
	    text-align: center;
	    min-height: 75px;
	    padding: 18px;
	}
	tr.bottom_total_count td {
		background: #fff;
	}
	.monthly_report {
	    text-transform: uppercase;
	    color: #3695d5;
	    text-align: left;
		border: 1px solid black;
	    font-size: 14px;
	    padding: 3px;
	    background: #f6b31c;
	    COLOR: black;
	}
	tr.bottom_total_count td {
	    
	    font-weight: bold;
	}
	.ms-options-wrap > button:focus, .ms-options-wrap > button{
		width: 180px !important;
	}
	.ms-options-wrap > .ms-options{
		width: 180px !important;
	}
	.marginbott label{
		margin-bottom:0px;
	}
	button#getValue {
		background: #3695d5 !important;
		color: #fff;
		float: right;
	}	
</style>

<div class="progress"> 
	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div> 
</div>
<div class="coaching_reports_top_bar">
	<div class="col-md-12">	  
		<div class="col-md-6">
			<div class="col-md-2">
		  		<b>TODAY<br>
				<?php echo $today = date("m-d-y");?></b>
			</div>
		    <div class="col-md-3 aaa">
			<?php  $today = date("d");
				$total = date('t');
				$per = ($today*100)/$total;
			?>
				<b>PCT OF MTH <br><?php echo round($per,2);?>%</b>				
		    </div>
		    <div class="col-md-3 marginbott">
		    	<label><b>Group</b></label></br>
		    	<select name="multicheckbox[]" multiple="multiple" id="list_box_id" class="4colactive">
				<?php foreach($groupdat as $grpdt){ 
			    	foreach ($grpdt as $key) {?>
					<option value=<?php echo "'".$key['id']."'"; ?>><?php echo $key['name']; ?></option>
					<?php	
					}			    		
			    }
					?>
				</select>

				
			</div>
			<div class="col-md-4" style="padding-top:20px;">
				<button id="getValue" class="btn btn-default">Submit</button> 
			</div>
		</div>
		<!--<div class="col-md-2">
		 	<div class="monthly_report">current monthly</div>
		</div>-->
		<div class="col-md-4">
			***DO NOT INPUT ON THIS PAGE ACCEPT BENCHMARKS***
		</div>	  
	</div>
</div>
<div id="changedivMain">
<div id="changediv">
<table id="coaching-report_table" class="table table-striped table-responsive swipe-horizontal table-condensed table-primary coaching-report">
	<thead>
		<tr class="bottom_total_count">
			<td style="background:#f6b31c;color:black;font-size: 14px">CURRENT MONTH</td>
			<td></td>
			<td></td>
			<td></td>
			<td style="background: #3695d5 !important;color: #fff !important;">Call</td>
			<td colspan='2' style="background: #3695d5 !important;color: #fff !important;">Appointments</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="text-primary">
			<th>OWNERS</th>
			<th>GREET</th>
			<th>SIT DOWN</th>
			<th>DELIVERIES</th>
			<th>DIALS</th>
			<th>MADE</th>
			<th>SHOWN</th>
			<th>EMAILS</th>
			<th>SIT/LOGS</th>
			<th>DELIVERY/LOGS</th>
			<th>DELIVERIES/SIT</th>
			<th>APPTS/DIALS</th>
			<th>SHOWN/MADE</th>
		</tr>
	</thead>
	 
<?php
if(!empty($results)){
	foreach ($results as $key => $result){		
		$inners['owner'] = $result['sperson'];  
		$all_users[$k][] =  $result['user_id'];
		$inners['user_id']=  $result['user_id'];
		$inners['Greet'] = $allcnt[$key][3];
		$inners['SitDown'] = $allcnt[$key][6];	
		$inners['dials'] = $results_dial[$result['user_id']]['dials'];		
		$inners['Made'] = $selectedresult[$result['user_id']]['made'];	
		if(empty($inners['Made'])){
			$inners['Made']='0';
		}
		$inners['shown'] = $selectedresult[$result['user_id']]['shown'];	
		if(empty($inners['shown'])){
			$inners['shown']='0';
		}
		$t1 = (isset($type_count[$result['user_id']]['5']))?  $type_count[$result['user_id']]['5'] : 0;
		$t2 = (isset($type_count[$result['user_id']]['6']))?  $type_count[$result['user_id']]['6'] : 0;
		$t3 = (isset($type_count[$result['user_id']]['7']))?  $type_count[$result['user_id']]['7'] : 0;
		$t4 = (isset($type_count[$result['user_id']]['12']))?  $type_count[$result['user_id']]['12'] : 0;
		
		$inners['Emails'] = $t1+$t2=$t3+$t4;
		if(empty($inners['Emails'])){
			$inners['Emails'] ='0';
		}
		$inners['Deliveries'] = $allcnt[$key][10];
?>
	<thead>
		<tr>
	        <td class="reports_td"><?php echo $inners['owner'];?></td>
	        <td class="Greet_count"><?php echo $inners['Greet'];?></td>
	        <td class="SitDown_count"><?php echo $inners['SitDown'];?></td>
	        <td class="Deliveries_count"><?php echo $inners['Deliveries'];?></td>
	        <?php $dlscnt=(isset($inners['dials'])?$inners['dials']: 0); ?>
			<td class="Dials_count"><?php echo "$dlscnt";?></td>
			<td class="Made_count"><?php echo $inners['Made'];?></td>
			<td class="Shown_count"><?php echo $inners['shown'];?></td>
			<td class="Emails_count"><?php echo $inners['Emails'];?></td>
			
			<?php $Sitlog = $inners['Greet'] + $inners['shown'];
			if($Sitlog != 0){
				$percentageSitlog = ($inners['SitDown']*100)/$Sitlog;
				$percentpercentageSitlog = round($percentageSitlog, 2);
				if($percentpercentageSitlog <= 40){
					$backgroundpercentageSitlog = 'style="background: red;color: #fff;"';
				}else{
					$backgroundpercentageSitlog = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentpercentageSitlog = '0';
				$backgroundpercentageSitlog = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="SitLog_count" <?php echo $backgroundpercentageSitlog;?>><?php echo $percentpercentageSitlog;?>%</td>
			<?php $Deliverlog = $inners['Greet'] + $inners['shown'];
			if($Deliverlog != 0){
				$percentageDeliverlog = ($inners['Deliveries']*100)/$Deliverlog;
				$percentDeliverlog = round($percentageDeliverlog, 2);
				if($percentDeliverlog <= 12){
					$backgroundDeliverlog = 'style="background: red;color: #fff;"';
				}else{
					$backgroundDeliverlog = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentDeliverlog = '0';
				$backgroundDeliverlog = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="DeliveryLog_count" <?php echo $backgroundDeliverlog;?>><?php echo $percentDeliverlog;?>%</td>
			<?php 
			if($inners['SitDown'] != 0){
				$percentageDeliveriesSit = ($inners['Deliveries']*100)/$inners['SitDown'];
				$percentDeliveriesSit = round($percentageDeliveriesSit, 2);
				if($percentDeliveriesSit <= 30){
					$backgroundDeliveriesSit = 'style="background: red;color: #fff;"';
				}else{
					$backgroundDeliveriesSit = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentDeliveriesSit = '0';
				$backgroundDeliveriesSit = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="DeliveriesSit_count" <?php echo $backgroundDeliveriesSit;?>><?php echo $percentDeliveriesSit;?>%</td>
			<?php 
			if($inners['dials'] != 0){
				$percentageApptsDials = ($inners['shown']*100)/$inners['dials'];
				$percentApptsDials = round($percentageApptsDials, 2);
				if($percentApptsDials <= 8){
					$backgroundApptsDials = 'style="background: red;color: #fff;"';
				}else{
					$backgroundApptsDials = 'style="background: green;color: #fff;"';
				}
			}
			else{ 
				$percentApptsDials = '0';
				$backgroundApptsDials = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="ApptsDials_count" <?php echo $backgroundApptsDials;?>><?php echo $percentApptsDials;?>%</td>
			<?php 
			if($inners['Made'] != 0){
				$percentageShownMade = ($inners['shown']*100)/$inners['Made'];
				$percentShownMade = round($percentageShownMade, 2);
				if($percentShownMade <= 50){
					$backgroundShownMade = 'style="background: red;color: #fff;"';
				}else{
					$backgroundShownMade = 'style="background: green;color: #fff;"';
				}
			}
			else{ 
				$percentShownMade = '0';
				$backgroundShownMade = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="ShownMade_count" <?php echo $backgroundShownMade;?>><?php echo $percentShownMade;?>%</td>			
	  	</tr>
	</thead>
<?php 	
	}
}
?>
	<tr class="bottom_total_count">
		<td>Team Total</td>
		<td id="Greet_count_total"></td>
		<td id="SitDown_count_total"></td>
		<td id="Deliveries_count_total"></td>
		<td id="Dials_count_total"></td>
		<td id="Made_count_total"></td>
		<td id="Shown_count_total"></td>
		<td id="Emails_count_total"></td>
		<td id="SitLog_count_total" style="color:#fff;"></td>
		<td id="DeliveryLog_count_total" style="color:#fff;"></td>
		<td id="DeliveriesSit_count_total" style="color:#fff;"></td>
		<td id="ApptsDials_count_total" style="color:#fff;"></td>
		<td id="ShownMade_count_total" style="color:#fff;"></td>
	</tr>
	<tr class="bottom_total_count">
		<td>KPI</td>
		<td id="">5.1</td>
		<td id="">30.7</td>
		<td id="">82.7</td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
	</tr>
	<tr class="bottom_total_count">
		<td>GOAL</td>
		<td id="">3</td>
		<td id="">7.5</td>
		<td id="">22.5</td>
		<td id=""></td>
		<td id=""></td>
		<td colspan='2'>Bench Mark</td>
		<td id=""><input type="number" id="Sitlogcolor" value="40" style="width:50px;">%</td>
		<td id=""><input type="number" id="Deliverylogcolor" value="12" style="width:50px;">%</td>
		<td id=""><input type="number" id="DeliverySitcolor" value="30" style="width:50px;">%</td>
		<td id=""><input type="number" id="appologcolor" value="8" style="width:50px;">%</td>
		<td id=""><input type="number" id="ShownMadelogcolor" value="50" style="width:50px;">%</td>
	</tr>
	<tr class="bottom_total_count">
		<td style="background:#f6b31c;">OPPORTUNITY</td>
		<td id="" style="background:#f6b31c;">662</td>
		<td id="" style="background:#f6b31c;">491</td>
		<td id="" style="background:#f6b31c;">158</td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
	</tr>
</table>
</div>
<br>
<!-- 90 Days Report -->
<div id="changediv">
<table id="coaching-report_table" class="table table-striped table-responsive swipe-horizontal table-condensed table-primary coaching-report">
	<thead>
		<tr class="bottom_total_count">
			<td style="background:#f6b31c;color:black;font-size: 14px">90 DAY AVERAGE</td>
			<td></td>
			<td></td>
			<td></td>
			<td style="background: #3695d5 !important;color: #fff !important;">Call</td>
			<td colspan='2' style="background: #3695d5 !important;color: #fff !important;">Appointments</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="text-primary">
			<th>OWNERS</th>
			<th>GREET</th>
			<th>SIT DOWN</th>
			<th>DELIVERIES</th>
			<th>DIALS</th>
			<th>MADE</th>
			<th>SHOWN</th>
			<th>EMAILS</th>
			<th>SIT/LOGS</th>
			<th>DELIVERY/LOGS</th>
			<th>DELIVERIES/SIT</th>
			<th>APPTS/DIALS</th>
			<th>SHOWN/MADE</th>
		</tr>
	</thead>

<?php

if(!empty($resultNintydays)){
	foreach ($resultNintydays as $key => $result){		
		$inners['owner'] = $result['sperson'];  
		$all_users[$k][] =  $result['user_id'];
		$inners['user_id']=  $result['user_id'];
		$inners['Greet'] = $resAllCnt[$key][3];
		$inners['SitDown'] = $resAllCnt[$key][6];
		$inners['dials'] = $results_dial_ninty[$result['user_id']]['dials'];		
		$inners['Made'] = $selectedresultNinty[$result['user_id']]['made'];	
		if(empty($inners['Made'])){
			$inners['Made']='0';
		}
		$inners['shown'] = $selectedresultNinty[$result['user_id']]['shown'];	
		if(empty($inners['shown'])){
			$inners['shown']='0';
		}
		$t1 = (isset($type_count_ninty[$result['user_id']]['5']))?  $type_count_ninty[$result['user_id']]['5'] : 0;
		$t2 = (isset($type_count_ninty[$result['user_id']]['6']))?  $type_count_ninty[$result['user_id']]['6'] : 0;
		$t3 = (isset($type_count_ninty[$result['user_id']]['7']))?  $type_count_ninty[$result['user_id']]['7'] : 0;
		$t4 = (isset($type_count_ninty[$result['user_id']]['12']))?  $type_count_ninty[$result['user_id']]['12'] : 0;
		
		$inners['Emails'] = $t1+$t2=$t3+$t4;
		if(empty($inners['Emails'])){
			$inners['Emails'] ='0';
		}
		$inners['Deliveries'] = $resAllCnt[$key][10];
?>
	 
	<thead>
		<tr>
	        <td class="reports_td_ninty_day"><?php echo $inners['owner'];?></td>
	        <td class="Greet_count_ninty_day"><?php echo $inners['Greet'];?></td>
	        <td class="SitDown_count_ninty_day"><?php echo $inners['SitDown'];?></td>
	        <td class="Deliveries_count_ninty_day"><?php echo $inners['Deliveries'];?></td>
			<?php $dlscnt=(isset($inners['dials'])?$inners['dials']: 0); ?>
			<td class="Dials_count_ninty_day"><?php echo "$dlscnt";?></td>
			<td class="Made_count_ninty_day"><?php echo $inners['Made'];?></td>
			<td class="Shown_count_ninty_day"><?php echo $inners['shown'];?></td>
			<td class="Emails_count_ninty_day"><?php echo $inners['Emails'];?></td>
			
			<?php $Sitlog = $inners['Greet'] + $inners['shown'];
			if($Sitlog != 0){
				$percentageSitlog = ($inners['SitDown']*100)/$Sitlog;
				$percentpercentageSitlog = round($percentageSitlog, 2);
				if($percentpercentageSitlog <= 40){
					$backgroundpercentageSitlog = 'style="background: red;color: #fff;"';
				}else{
					$backgroundpercentageSitlog = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentpercentageSitlog = '0';
				$backgroundpercentageSitlog = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="SitLog_count_ninty_day" <?php echo $backgroundpercentageSitlog;?>><?php echo $percentpercentageSitlog;?>%</td>
			<?php $Deliverlog = $inners['Greet'] + $inners['shown'];
			if($Deliverlog != 0){
				$percentageDeliverlog = ($inners['Deliveries']*100)/$Deliverlog;
				$percentDeliverlog = round($percentageDeliverlog, 2);
				if($percentDeliverlog <= 12){
					$backgroundDeliverlog = 'style="background: red;color: #fff;"';
				}else{
					$backgroundDeliverlog = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentDeliverlog = '0';
				$backgroundDeliverlog = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="DeliveryLog_count_ninty_day" <?php echo $backgroundDeliverlog;?>><?php echo $percentDeliverlog;?>%</td>
			<?php 
			if($inners['SitDown'] != 0){
				$percentageDeliveriesSit = ($inners['Deliveries']*100)/$inners['SitDown'];
				$percentDeliveriesSit = round($percentageDeliveriesSit, 2);
				if($percentDeliveriesSit <= 30){
					$backgroundDeliveriesSit = 'style="background: red;color: #fff;"';
				}else{
					$backgroundDeliveriesSit = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentDeliveriesSit = '0';
				$backgroundDeliveriesSit = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="DeliveriesSit_count_ninty_day" <?php echo $backgroundDeliveriesSit;?>><?php echo $percentDeliveriesSit;?>%</td>
			<?php 
			if($inners['dials'] != 0){
				$percentageApptsDials = ($inners['shown']*100)/$inners['dials'];
				$percentApptsDials = round($percentageApptsDials, 2);
			 	if($percentApptsDials <= 8){
				 	$backgroundApptsDials = 'style="background: red;color: #fff;"';
				}else{
					$backgroundApptsDials = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentApptsDials = '0';
				$backgroundApptsDials = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="ApptsDials_count_ninty_day" <?php echo $backgroundApptsDials;?>><?php echo $percentApptsDials;?>%</td>
			<?php 
			if($inners['Made'] != 0){
				$percentageShownMade = ($inners['shown']*100)/$inners['Made'];
				$percentShownMade = round($percentageShownMade, 2);
				if($percentShownMade <= 50){
					$backgroundShownMade = 'style="background: red;color: #fff;"';
				}else{
					$backgroundShownMade = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentShownMade = '0';
				$backgroundShownMade = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="ShownMade_count_ninty_day" <?php echo $backgroundShownMade;?>><?php echo $percentShownMade;?>%</td>	
	  	</tr>
	</thead>
<?php 	
	}
}
?>
	<tr class="bottom_total_count_ninty_day">
		<td>Team Total</td>
		<td id="Greet_count_total_ninty_day"></td>
		<td id="SitDown_count_total_ninty_day"></td>
		<td id="Deliveries_count_total_ninty_day"></td>
		<td id="Dials_count_total_ninty_day"></td>
		<td id="Made_count_total_ninty_day"></td>
		<td id="Shown_count_total_ninty_day"></td>
		<td id="Emails_count_total_ninty_day"></td>
		<td id="SitLog_count_total_ninty_day" style="color:#fff;"></td>
		<td id="DeliveryLog_count_total_ninty_day" style="color:#fff;"></td>
		<td id="DeliveriesSit_count_total_ninty_day" style="color:#fff;"></td>
		<td id="ApptsDials_count_total_ninty_day" style="color:#fff;"></td>
		<td id="ShownMade_count_total_ninty_day" style="color:#fff;"></td>
	</tr>
	<tr class="bottom_total_count">
		<td>KPI</td>
		<td id="">5.1</td>
		<td id="">30.7</td>
		<td id="">82.7</td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
	</tr>
	<tr class="bottom_total_count">
		<td>GOAL</td>
		<td id="">3</td>
		<td id="">7.5</td>
		<td id="">22.5</td>
		<td id=""></td>
		<td id=""></td>
		<td colspan='2'>Bench Mark</td>
		<td id=""><input type="number" id="SitlogcolorNinty" value="40" style="width:50px;">%</td>
		<td id=""><input type="number" id="DeliverylogcolorNinty" value="12" style="width:50px;">%</td>
		<td id=""><input type="number" id="DeliverySitcolorNinty" value="30" style="width:50px;">%</td>
		<td id=""><input type="number" id="appologcolorNinty" value="8" style="width:50px;">%</td>
		<td id=""><input type="number" id="ShownMadelogcolorNinty" value="50" style="width:50px;">%</td>
	</tr>
	<tr class="bottom_total_count">
		<td style="background:#f6b31c;">OPPORTUNITY</td>
		<td id="" style="background:#f6b31c;">662</td>
		<td id="" style="background:#f6b31c;">491</td>
		<td id="" style="background:#f6b31c;">158</td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
	</tr>
</table>
</div>
<!-- 90 DAY AVERAGE FINISHED-->
<br>
<!-- YEAR TO DATE -->
<div id="changediv">
<table id="coaching-report_table" class="table table-striped table-responsive swipe-horizontal table-condensed table-primary coaching-report">
	<thead>
		<tr class="bottom_total_count">
			<td style="background:#f6b31c;color:black;font-size: 14px">YEAR TO DATE( 365 Days )</td>
			<td></td>
			<td></td>
			<td></td>
			<td style="background: #3695d5 !important;color: #fff !important;">Call</td>
			<td colspan='2' style="background: #3695d5 !important;color: #fff !important;">Appointments</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr class="text-primary">
			<th>OWNERS</th>
			<th>GREET</th>
			<th>SIT DOWN</th>
			<th>DELIVERIES</th>
			<th>DIALS</th>
			<th>MADE</th>
			<th>SHOWN</th>
			<th>EMAILS</th>
			<th>SIT/LOGS</th>
			<th>DELIVERY/LOGS</th>
			<th>DELIVERIES/SIT</th>
			<th>APPTS/DIALS</th>
			<th>SHOWN/MADE</th>
		</tr>
	</thead>
<?php
if(!empty($resultPastOneYear)){
	foreach ($resultPastOneYear as $key => $result){		
		$inners['owner'] = $result['sperson'];  
		$all_users[$k][] =  $result['user_id'];
		$inners['user_id'] =  $result['user_id'];
		$inners['Greet'] = $resAllYearCnt[$key][3];
		$inners['SitDown'] = $resAllYearCnt[$key][6];	
		$inners['dials'] = $results_dial_yearly[$result['user_id']]['dials'];		
		$inners['Made'] = $selectedresultYearly[$result['user_id']]['made'];	
		if(empty($inners['Made'])){
			$inners['Made']='0';
		}
		$inners['shown'] = $selectedresultYearly[$result['user_id']]['shown'];	
		if(empty($inners['shown'])){
			$inners['shown'] = '0';
		}
		$t1 = (isset($type_count_yearly[$result['user_id']]['5']))?  $type_count_yearly[$result['user_id']]['5'] : 0;
		$t2 = (isset($type_count_yearly[$result['user_id']]['6']))?  $type_count_yearly[$result['user_id']]['6'] : 0;
		$t3 = (isset($type_count_yearly[$result['user_id']]['7']))?  $type_count_yearly[$result['user_id']]['7'] : 0;
		$t4 = (isset($type_count_yearly[$result['user_id']]['12']))?  $type_count_yearly[$result['user_id']]['12'] : 0;
		
		$inners['Emails'] = $t1+$t2=$t3+$t4;
		if(empty($inners['Emails'])){
			$inners['Emails'] ='0';
		}
		$inners['Deliveries'] = $resAllYearCnt[$key][10];
?>	 
	<thead>
		<tr>
	        <td class="reports_td_yearly"><?php echo $inners['owner'];?></td>
	        <td class="Greet_count_yearly"><?php echo $inners['Greet'];?></td>
	        <td class="SitDown_count_yearly"><?php echo $inners['SitDown'];?></td>
	        <td class="Deliveries_count_yearly"><?php echo $inners['Deliveries'];?></td>
			<?php $dlscnt=(isset($inners['dials'])?$inners['dials']: 0); ?>
			<td class="Dials_count_yearly"><?php echo "$dlscnt";?></td>
			<td class="Made_count_yearly"><?php echo $inners['Made'];?></td>
			<td class="Shown_count_yearly"><?php echo $inners['shown'];?></td>
			<td class="Emails_count_yearly"><?php echo $inners['Emails'];?></td>
			
			<?php $Sitlog = $inners['Greet'] + $inners['shown'];
			if($Sitlog != 0){
				$percentageSitlog = ($inners['SitDown']*100)/$Sitlog;
				$percentpercentageSitlog = round($percentageSitlog, 2);
				if($percentpercentageSitlog <= 40){
					$backgroundpercentageSitlog = 'style="background: red;color: #fff;"';
				}else{
					$backgroundpercentageSitlog = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentpercentageSitlog = '0';
				$backgroundpercentageSitlog = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="SitLog_count_yearly" <?php echo $backgroundpercentageSitlog;?>><?php echo $percentpercentageSitlog;?>%</td>
			<?php $Deliverlog = $inners['Greet'] + $inners['shown'];
			if($Deliverlog != 0){
				$percentageDeliverlog = ($inners['Deliveries']*100)/$Deliverlog;
				$percentDeliverlog = round($percentageDeliverlog, 2);
				if($percentDeliverlog <= 12){
					$backgroundDeliverlog = 'style="background: red;color: #fff;"';
				}else{
					$backgroundDeliverlog = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentDeliverlog = '0';
				$backgroundDeliverlog = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="DeliveryLog_count_yearly" <?php echo $backgroundDeliverlog;?>><?php echo $percentDeliverlog;?>%</td>
			<?php 
			if($inners['SitDown'] != 0){
				$percentageDeliveriesSit = ($inners['Deliveries']*100)/$inners['SitDown'];
				$percentDeliveriesSit = round($percentageDeliveriesSit, 2);
				if($percentDeliveriesSit <= 30){
					$backgroundDeliveriesSit = 'style="background: red;color: #fff;"';
				}else{
					$backgroundDeliveriesSit = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentDeliveriesSit = '0';
				$backgroundDeliveriesSit = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="DeliveriesSit_count_yearly" <?php echo $backgroundDeliveriesSit;?>><?php echo $percentDeliveriesSit;?>%</td>
			<?php 
			if($inners['dials'] != 0){
				$percentageApptsDials = ($inners['shown']*100)/$inners['dials'];
				$percentApptsDials = round($percentageApptsDials, 2);
			 	if($percentApptsDials <= 8){
				 	$backgroundApptsDials = 'style="background: red;color: #fff;"';
				}else{
					$backgroundApptsDials = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentApptsDials = '0';
				$backgroundApptsDials = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="ApptsDials_count_yearly" <?php echo $backgroundApptsDials;?>><?php echo $percentApptsDials;?>%</td>
			<?php 
			if($inners['Made'] != 0){
				$percentageShownMade = ($inners['shown']*100)/$inners['Made'];
				$percentShownMade = round($percentageShownMade, 2);
				if($percentShownMade <= 50){
					$backgroundShownMade = 'style="background: red;color: #fff;"';
				}else{
					$backgroundShownMade = 'style="background: green;color: #fff;"';
				}
			}else{ 
				$percentShownMade = '0';
				$backgroundShownMade = 'style="background: red;color: #fff;"';
			}
			?>
			<td class="ShownMade_count_yearly" <?php echo $backgroundShownMade;?>><?php echo $percentShownMade;?>%</td>	
	  	</tr>
	</thead>
<?php 	
	}
}
?>
	<tr class="bottom_total_count">
		<td>Team Total</td>
		<td id="Greet_count_total_yearly"></td>
		<td id="SitDown_count_total_yearly"></td>
		<td id="Deliveries_count_total_yearly"></td>
		<td id="Dials_count_total_yearly"></td>
		<td id="Made_count_total_yearly"></td>
		<td id="Shown_count_total_yearly"></td>
		<td id="Emails_count_total_yearly"></td>
		<td id="SitLog_count_total_yearly" style="color:#fff;"></td>
		<td id="DeliveryLog_count_total_yearly" style="color:#fff;"></td>
		<td id="DeliveriesSit_count_total_yearly" style="color:#fff;"></td>
		<td id="ApptsDials_count_total_yearly" style="color:#fff;"></td>
		<td id="ShownMade_count_total_yearly" style="color:#fff;"></td>
	</tr>
	<tr class="bottom_total_count">
		<td>KPI</td>
		<td id="">5.1</td>
		<td id="">30.7</td>
		<td id="">82.7</td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
	</tr>
	<tr class="bottom_total_count">
		<td>GOAL</td>
		<td id="">3</td>
		<td id="">7.5</td>
		<td id="">22.5</td>
		<td id=""></td>
		<td id=""></td>
		<td colspan='2'>Bench Mark</td>
		<td id=""><input type="number" id="SitlogcolorYearly" value="40" style="width:50px;">%</td>
		<td id=""><input type="number" id="DeliverylogcolorYearly" value="12" style="width:50px;">%</td>
		<td id=""><input type="number" id="DeliverySitcolorYearly" value="30" style="width:50px;">%</td>
		<td id=""><input type="number" id="appologcolorYearly" value="8" style="width:50px;">%</td>
		<td id=""><input type="number" id="ShownMadelogcolorYearly" value="50" style="width:50px;">%</td>
	</tr>
	<tr class="bottom_total_count">
		<td style="background:#f6b31c;">OPPORTUNITY</td>
		<td id="" style="background:#f6b31c;">662</td>
		<td id="" style="background:#f6b31c;">491</td>
		<td id="" style="background:#f6b31c;">158</td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
		<td id=""></td>
	</tr>
</table>
</div>
<script>	
	$(document).ready(function(){
		Greet_count();
		SitDown_count();
		Deliveries_count();
		Dials_count();
		Made_count();
		Shown_count();
		Emails_count();
		SitLog_count();
		DeliveryLog_count();
		DeliveriesSit_count();
		ApptsDials_count();
		ShownMade_count();
	});

	function Greet_count() {
		// monthly calc
		var sum=0;
		$('.Greet_count').each(function() {
			sum += parseInt($(this).text());
		});
		$('#Greet_count_total').html(sum);
		// 90 Days calc
		var sum=0;
		$('.Greet_count_ninty_day').each(function() {
			sum += parseInt($(this).text());
		});
		$('#Greet_count_total_ninty_day').html(sum);
		
		// yearly calc
		var sum=0;
		$('.Greet_count_yearly').each(function() {
			sum += parseInt($(this).text());
		});
		$('#Greet_count_total_yearly').html(sum);
	}
	function SitDown_count() {
		// monthly Calc
		var sum=0;
		$('.SitDown_count').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#SitDown_count_total').html(sum);
		
		// 90 Days Calc
		var sum=0;
		$('.SitDown_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#SitDown_count_total_ninty_day').html(sum);

		// yearly Calc
		var sum=0;
		$('.SitDown_count_yearly').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#SitDown_count_total_yearly').html(sum);
	}
	function Deliveries_count() {
		// monthly Calc
		var sum=0;
		$('.Deliveries_count').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Deliveries_count_total').html(sum);

		// 90 Days Calc
		var sum=0;
		$('.Deliveries_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Deliveries_count_total_ninty_day').html(sum);

		// yearly Calc
		var sum=0;
		$('.Deliveries_count_yearly').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Deliveries_count_total_yearly').html(sum);
	}
	function Dials_count() {
		// monthly calc
		var sum=0;
		$('.Dials_count').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Dials_count_total').html(sum);

		// 90 Days calc
		var sum=0;
		$('.Dials_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Dials_count_total_ninty_day').html(sum);

		// yearly calc
		var sum=0;
		$('.Dials_count_yearly').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Dials_count_total_yearly').html(sum);
	}
	function Made_count() {
		// monthly calc
		var sum=0;
		$('.Made_count').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Made_count_total').html(sum);

		// yearly calc
		var sum=0;
		$('.Made_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Made_count_total_ninty_day').html(sum);

		// yearly calc
		var sum=0;
		$('.Made_count_yearly').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Made_count_total_yearly').html(sum);
	}

	function Shown_count() {
		// monthly calc
		var sum=0;
		$('.Shown_count').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Shown_count_total').html(sum);

		// 90 Days calc
		var sum=0;
		$('.Shown_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Shown_count_total_ninty_day').html(sum);

		// yearly calc
		var sum=0;
		$('.Shown_count_yearly').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Shown_count_total_yearly').html(sum);
	}
	function Emails_count() {
		// monthly calc
		var sum=0;
		$('.Emails_count').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Emails_count_total').html(sum);

		// 90 days calc
		var sum=0;
		$('.Emails_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Emails_count_total_ninty_day').html(sum);

		// yearly calc
		var sum=0;
		$('.Emails_count_yearly').each(function() {     
			sum += parseInt($(this).text());                     
		}); 
		$('#Emails_count_total_yearly').html(sum);
	}
	
	function SitLog_count(){
		// monthly calc
		var sum=0;
		var total= $('.SitLog_count').length;
		var average=0;
		$('.SitLog_count').each(function() {     
				sum += parseInt($(this).text());    
				average = sum/total;
		}); 
		if(average<='40'){
			$("#SitLog_count_total").css("background-color", "red");
		}else{
			$("#SitLog_count_total").css("background-color", "green");
		}
		$('#SitLog_count_total').html(average.toFixed(2)+ '%');

		// 90 Day calc
		var sum=0;
		var total= $('.SitLog_count_ninty_day').length;
		var average=0;
		$('.SitLog_count_ninty_day').each(function() {     
				sum += parseInt($(this).text());    
				average = sum/total;
		}); 
		if(average<='40'){
			$("#SitLog_count_total_ninty_day").css("background-color", "red");
		}else{
			$("#SitLog_count_total_ninty_day").css("background-color", "green");
		}
		$('#SitLog_count_total_ninty_day').html(average.toFixed(2)+ '%');

		// Yearly calc
		var sum=0;
		var total= $('.SitLog_count_yearly').length;
		var average=0;
		$('.SitLog_count_yearly').each(function() {     
				sum += parseInt($(this).text());    
				average = sum/total;
		}); 
		if(average<='40'){
			$("#SitLog_count_total_yearly").css("background-color", "red");
		}else{
			$("#SitLog_count_total_yearly").css("background-color", "green");
		}
		$('#SitLog_count_total_yearly').html(average.toFixed(2)+ '%');	
	}

	function DeliveryLog_count(){
		// monthly calc
		var sum=0;
		var total= $('.DeliveryLog_count').length;
		var average=0;
		$('.DeliveryLog_count').each(function() {     
			sum += parseInt($(this).text());
			average = sum/total;
		}); 
		if(average<='12'){
			$("#DeliveryLog_count_total").css("background-color", "red");
		}else{
			$("#DeliveryLog_count_total").css("background-color", "green");
		}
		$('#DeliveryLog_count_total').html(average.toFixed(2)+ '%');

		// 90 Days calc
		var sum=0;
		var total= $('.DeliveryLog_count_ninty_day').length;
		var average=0;
		$('.DeliveryLog_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());
			average = sum/total;
		}); 
		if(average<='12'){
			$("#DeliveryLog_count_total_ninty_day").css("background-color", "red");
		}else{
			$("#DeliveryLog_count_total_ninty_day").css("background-color", "green");
		}
		$('#DeliveryLog_count_total_ninty_day').html(average.toFixed(2)+ '%');

		// yearly calc
		var sum=0;
		var total= $('.DeliveryLog_count_yearly').length;
		var average=0;
		$('.DeliveryLog_count_yearly').each(function() {     
			sum += parseInt($(this).text());
			average = sum/total;
		}); 
		if(average<='12'){
			$("#DeliveryLog_count_total_yearly").css("background-color", "red");
		}else{
			$("#DeliveryLog_count_total_yearly").css("background-color", "green");
		}
		$('#DeliveryLog_count_total_yearly').html(average.toFixed(2)+ '%');	
	}
	function DeliveriesSit_count(){
		// monthly calc
		var sum=0;
		var total= $('.DeliveriesSit_count').length;
		var average=0;
		$('.DeliveriesSit_count').each(function() {     
			sum += parseInt($(this).text());  
			average = sum/total;				
		});
		
		if(average<='30'){
			$("#DeliveriesSit_count_total").css("background-color", "red");
		}else{
			$("#DeliveriesSit_count_total").css("background-color", "green");
		}
		
		$('#DeliveriesSit_count_total').html(average.toFixed(2)+ '%');

		// 90 Days calc
		var sum=0;
		var total= $('.DeliveriesSit_count_ninty_day').length;
		var average=0;
		$('.DeliveriesSit_count_ninty_day').each(function() {     
			sum += parseInt($(this).text());  
			average = sum/total;				
		});
		
		if(average<='30'){
			$("#DeliveriesSit_count_total_ninty_day").css("background-color", "red");
		}else{
			$("#DeliveriesSit_count_total_ninty_day").css("background-color", "green");
		}
		
		$('#DeliveriesSit_count_total_ninty_day').html(average.toFixed(2)+ '%');

		// yearly calc
		var sum=0;
		var total= $('.DeliveriesSit_count_yearly').length;
		var average=0;
		$('.DeliveriesSit_count_yearly').each(function() {     
			sum += parseInt($(this).text());  
			average = sum/total;				
		});
		
		if(average<='30'){
			$("#DeliveriesSit_count_total_yearly").css("background-color", "red");
		}else{
			$("#DeliveriesSit_count_total_yearly").css("background-color", "green");
		}
		
		$('#DeliveriesSit_count_total_yearly').html(average.toFixed(2)+ '%');		
	}
	function ApptsDials_count(){
		// monthly calc
		var sum=0;
		var total= $('.ApptsDials_count').length;
		var average=0;
		$('.ApptsDials_count').each(function() {     
				sum += parseInt($(this).text()); 
				average = sum/total;
		}); 
		if(average<='8'){
			$("#ApptsDials_count_total").css("background-color", "red");
		}else{
			$("#ApptsDials_count_total").css("background-color", "green");
		}
		$('#ApptsDials_count_total').html(average.toFixed(2)+ '%');

		// 90 days calc
		var sum=0;
		var total= $('.ApptsDials_count_ninty_day').length;
		var average=0;
		$('.ApptsDials_count_ninty_day').each(function() {     
				sum += parseInt($(this).text()); 
				average = sum/total;
		}); 
		if(average<='8'){
			$("#ApptsDials_count_total_ninty_day").css("background-color", "red");
		}else{
			$("#ApptsDials_count_total_ninty_day").css("background-color", "green");
		}
		$('#ApptsDials_count_total_ninty_day').html(average.toFixed(2)+ '%');

		// yearly calc
		var sum=0;
		var total= $('.ApptsDials_count_yearly').length;
		var average=0;
		$('.ApptsDials_count_yearly').each(function() {     
				sum += parseInt($(this).text()); 
				average = sum/total;
		}); 
		if(average<='8'){
			$("#ApptsDials_count_total_yearly").css("background-color", "red");
		}else{
			$("#ApptsDials_count_total_yearly").css("background-color", "green");
		}
		$('#ApptsDials_count_total_yearly').html(average.toFixed(2)+ '%');		
	}
	function ShownMade_count(){
		// monthly calc
		var sum=0;
		var total= $('.ShownMade_count').length;
		var average=0;
		$('.ShownMade_count').each(function() {     
				sum += parseInt($(this).text()); 
				average = sum/total;
		}); 
		if(average<='50'){
			$("#ShownMade_count_total").css("background-color", "red");
		}else{
			$("#ShownMade_count_total").css("background-color", "green");
		}
		$('#ShownMade_count_total').html(average.toFixed(2)+ '%');

		// 90 Days calc
		var sum=0;
		var total= $('.ShownMade_count_ninty_day').length;
		var average=0;
		$('.ShownMade_count_ninty_day').each(function() {     
				sum += parseInt($(this).text()); 
				average = sum/total;
		}); 
		if(average<='50'){
			$("#ShownMade_count_total_ninty_day").css("background-color", "red");
		}else{
			$("#ShownMade_count_total_ninty_day").css("background-color", "green");
		}
		$('#ShownMade_count_total_ninty_day').html(average.toFixed(2)+ '%');

		// yearly calc
		var sum=0;
		var total= $('.ShownMade_count_yearly').length;
		var average=0;
		$('.ShownMade_count_yearly').each(function() {     
				sum += parseInt($(this).text()); 
				average = sum/total;
		}); 
		if(average<='50'){
			$("#ShownMade_count_total_yearly").css("background-color", "red");
		}else{
			$("#ShownMade_count_total_yearly").css("background-color", "green");
		}
		$('#ShownMade_count_total_yearly').html(average.toFixed(2)+ '%');		
	}	
	
	$("#Sitlogcolor").change(function(){
		$('.SitLog_count').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#Sitlogcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#SitLog_count_total').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#Sitlogcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});
	
	$("#SitlogcolorNinty").change(function(){
		$('.SitLog_count_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#SitlogcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#SitLog_count_total_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#SitlogcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#SitlogcolorYearly").change(function(){
		$('.SitLog_count_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#SitlogcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#SitLog_count_total_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#SitlogcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#Deliverylogcolor").change(function(){
		$('.DeliveryLog_count').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#Deliverylogcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#DeliveryLog_count_total').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#Deliverylogcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});	

	$("#DeliverylogcolorNinty").change(function(){
		$('.DeliveryLog_count_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverylogcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#DeliveryLog_count_total_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverylogcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#DeliverylogcolorYearly").change(function(){
		$('.DeliveryLog_count_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverylogcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#DeliveryLog_count_total_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverylogcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#DeliverySitcolor").change(function(){
		$('.DeliveriesSit_count').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverySitcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#DeliveriesSit_count_total').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverySitcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})		
	});

	$("#DeliverySitcolorNinty").change(function(){
		$('.DeliveriesSit_count_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverySitcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#DeliveriesSit_count_total_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverySitcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})		
	});

	$("#DeliverySitcolorYearly").change(function(){
		$('.DeliveriesSit_count_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverySitcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#DeliveriesSit_count_total_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#DeliverySitcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})		
	});

	$("#appologcolor").change(function(){
		$('.ApptsDials_count').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#appologcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#ApptsDials_count_total').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#appologcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#appologcolorNinty").change(function(){
		$('.ApptsDials_count_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#appologcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#ApptsDials_count_total_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#appologcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#appologcolorYearly").change(function(){
		$('.ApptsDials_count_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#appologcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#ApptsDials_count_total_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#appologcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
	});

	$("#ShownMadelogcolor").change(function(){
		$('.ShownMade_count').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#ShownMadelogcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})

		$('#ShownMade_count_total').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#ShownMadelogcolor').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})		
	});

	$("#ShownMadelogcolorNinty").change(function(){
		$('.ShownMade_count_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#ShownMadelogcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#ShownMade_count_total_ninty_day').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#ShownMadelogcolorNinty').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})		
	});

	$("#ShownMadelogcolorYearly").change(function(){
		$('.ShownMade_count_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#ShownMadelogcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})
		$('#ShownMade_count_total_yearly').each(function(){
			var count = $(this).html();
			count = count.replace('%', '');
			count = parseInt(count);
			var value = $('#ShownMadelogcolorYearly').val();
			if(count<value){
				$(this).css("background-color", "red");
			}else{
				$(this).css("background-color", "green");
			}
		})		
	});
	
	$('#Sitlogcolor').keypress(function(e){
		var a = [];
		var k = e.which;
		for (i = 48; i < 58; i++)
			a.push(i);
		if (!(a.indexOf(k)>=0))
			e.preventDefault();
	});

	$('#Deliverylogcolor').keypress(function(e){
		var a = [];
		var k = e.which;
		for (i = 48; i < 58; i++)
			a.push(i);
		if (!(a.indexOf(k)>=0))
			e.preventDefault();
	});

	$('#DeliverySitcolor').keypress(function(e){
		var a = [];
		var k = e.which;
		for (i = 48; i < 58; i++)
			a.push(i);
		if (!(a.indexOf(k)>=0))
			e.preventDefault();
	});

	$('#appologcolor').keypress(function(e){
		var a = [];
		var k = e.which;
		for (i = 48; i < 58; i++)
			a.push(i);
		if (!(a.indexOf(k)>=0))
				e.preventDefault();
	});

	$('#ShownMadelogcolor').keypress(function(e){
		var a = [];
		var k = e.which;
		for (i = 48; i < 58; i++)
			a.push(i);
		if (!(a.indexOf(k)>=0))
			e.preventDefault();
	}); 
</script>
</div>
<!-- YEAR TO DATE FINISHED -->

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/app/View/Themed/Default/webroot/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="/app/View/Themed/Default/webroot/css/bootstrap-multiselect.css" type="text/css"/>
<link rel="stylesheet" href="/app/View/Themed/Default/webroot/css/bootstrap-multiselect.css" type="text/css"/>

<script type="text/javascript">
	$('#list_box_id').multiselect({
		columns: 0,
		placeholder: 'Select options'
	});
</script>

<script type="text/javascript">	
	$(document).ready(function() {
		$("#getValue").click(function(){
			var prgrsVar = [];
			$.each($("#list_box_id option:selected"), function(){            
				prgrsVar.push($(this).val());
			});
			
			var requestUrl  = '<?php echo Router::url(array('controller' => 'reports', 'action' => 'ajaxcoaching_report')); ?>';
           $.ajax({
			   progress: function(e) {
                    if(e.lengthComputable) {
                        var pct = (e.loaded / e.total) * 100;
                        $('div.progress > div.progress-bar').css({ "width": pct + "%" });
					} else {
                        console.warn('Content Length not reported!');
                    }
                },
                type:"POST",
                data:{value_to_send:prgrsVar}, 
                url: requestUrl,
				 
				 beforeSend: function() {
					  $('#getValue').attr('disabled', 'disabled');
					  $(".progress").show();
				   },
				   
                success : function(data) {
				$('#changedivMain').html(data);
				$(".progress").hide();
				$('#getValue').removeAttr('disabled');
				$('div.progress > div.progress-bar').css({ "width": "0%" });
                },
                error : function() {
                   alert("false");
                }
            });
		});
	});
	(function($, window, undefined) {
		var hasOnProgress = ("onprogress" in $.ajaxSettings.xhr());
		if (!hasOnProgress) {
			return;
		}
		var oldXHR = $.ajaxSettings.xhr;
		$.ajaxSettings.xhr = function() {
	        var xhr = oldXHR();
	        if(xhr instanceof window.XMLHttpRequest) {
	            xhr.addEventListener('progress', this.progress, false);
	        }
	        if(xhr.upload) {
	            xhr.upload.addEventListener('progress', this.progress, false);
	        }
	        return xhr;
	    };
	})(jQuery, window);
</script>