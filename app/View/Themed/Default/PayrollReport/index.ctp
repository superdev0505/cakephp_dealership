<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="/app/View/Themed/Default/webroot/assets/components/library/bootstrap/css/bootstrap.min.css" />
<script src="/app/View/Themed/Default/webroot/assets/components/library/jquery/jquery.min.js?v=v1.0.2&sv=v0.0.1"></script>

<style type="text/css" media="print">
.dontprint
{ display: none; }
</style>
<style>
/*General Start*/
ul, li, h1, h2, h3, h4, h5, h6,p{
	margin:0;
	padding:0;
	list-style-type:none;
}

body {
	font-family:"Arial";
	margin: 10px;
}

a {
	text-decoration:none;
	color:inherit;
}

input{
    border: 1px solid #aaa;
    padding: 5px 0;
}


th, td{
	padding: 10px;
}
table, th, td
{
  border-collapse:collapse;
  border: 1px solid black;
  text-align:center;
}
td{
	font-weight: bold;
}

td.black_sep{
	background-color: black;
	width: 3px;
	font-size: 0px;
	padding: 0px;
}
td.red{
	background: #ECECEC;
}
td.total{
	background: #ECECEE;
}
td.blue{
	background: #9bc2e6;
}

td.white{
	background: #ffffff;
}

</style>
    </head>

<?php
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}
function sv($stat_var){
	if(!empty($stat_var)){
		return $stat_var;
	}else{
		return 0;
	}
}

function cal_percent($total, $cnt){
	if($total == 0 && $cnt){
		return "0";
	}

	if($total == 0){
		return "0";
	}
	if($cnt == 0){
		return 0;
	}else{
		return round( ($cnt / $total) * 100 );
	}
}

?>

<div>
	<a href="/dashboards/main"><img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" width="" height="" title="Dealership Performance CRM" alt="Dealership Performance CRM" /></a>
</div>
<br>

	<h2 class="pull-left" style="margin-right:80px;"><?php echo $userinfo['dealer']; ?></h2>

	<div style="padding-left: 300px;"> <?php echo $this->Form->month('stats_month', array('class'=>"form-control input-sm", 'style'=>"width: 175px; display: inline-block", 'empty'=>false, 'value'=>$month)); ?></div>

	<table class="" id="table-main" style="font-size:13px;" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr class='bg-inverse' >
				<td class="red" rowspan='<?php echo count($dealers) + 2; ?>'>Monthly Totals</td>
				<td class="red" rowspan='<?php echo count($dealers) + 1; ?>'><?php echo $month_stat_label; ?> TOTALS</td>
				<td class="red">Location</td>
				<!-- <td class="red">Appt. Show</td> -->
				<td class="red">WEB LEADS</td>
				<td class="red">PHONE LEADS</td>
				<td class="red">TOTAL LEADS</td>
				<td class="red">Appointments Set by Agent</td>
				<td class="red">ASBA %</td>
				<td class="red">Appointments Set by Closer</td>
				<td class="red">ASBC %</td>
				<td class="red">Appointments Set (Total)</td>
				<td class="red">AST %</td>

				<td class="red">Appointments Set for Today by Agent</td>
				<td class="red">Agent Appointments Showed Up</td>
				<td class="red">AASU %</td>
				<td class="red">Appointments Set for Today by Closer</td>
				<td class="red">Closer Appointments Showed Up</td>
				<td class="red">CASU %</td>
				<td class="red">Total Appointments Showed Up</td>
				<td class="red">ASU %</td>
				<td class="red">Units Sold</td>
				<td class="red">Units Sold %</td>
			</tr>

			<!-- Localtion stat start -->
			<?php
			$gt_appt = 0;
			$gt_1 = 0;
			$gt_2 = 0;
			$gt_3 = 0;
			$gt_4 = 0;
			$gt_5 = 0;
			$gt_6 = 0;
			$gt_7 = 0;
			$gt_8 = 0;
			$gt_9 = 0;

			$gt_10 = 0;
			$gt_11 = 0;
			$gt_12 = 0;
			$gt_13 = 0;
			$gt_14 = 0;
			$gt_15 = 0;
			$gt_16 = 0;
			$gt_17 = 0;
			$gt_18 = 0;
			$gt_19 = 0;

			foreach ($dealers as $dealer_id=>$dealer_name) {
				$total_appointments_set = sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['10']) +
					sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['11']) ;
				$total_lead_count = sv($web_phone_stat['web_phone_cnt_dealer'][$dealer_id]['5']) + sv($web_phone_stat['web_phone_cnt_dealer'][$dealer_id]['6']) ;

				$ASBA = cal_percent( $total_lead_count, sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['10']) );
				$ASBC = cal_percent( $total_lead_count, sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['11']) );

				//Total SHowup
				//$total_appointments_showedup = 	sv($app_today_showed['showed_dealer'][$dealer_id]['10']) + sv($app_today_showed['showed_dealer'][$dealer_id]['11']);
				$total_appointments_showedup = 	sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id][10]) + sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id][11]);



				$unit_sold_percent =  cal_percent( $total_appointments_showedup, sv($unit_solds_month['sold_location_stat'][$dealer_id]) );

				$AASU = cal_percent(sv($app_today_showed['today_dealer'][$dealer_id]['10']), sv($app_today_showed['showed_dealer'][$dealer_id]['10']));
				$CASU = cal_percent($app_today_showed['today_dealer'][$dealer_id]['11'], sv($app_today_showed['showed_dealer'][$dealer_id]['12']));
			?>
			<tr class='bg-inverse' >
				<td class="white">#<?php echo $dealer_id; ?></td>
				<!-- <td class="white"><?php
					//$gt_appt +=  sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id]);
					//echo sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id]); ?>
				</td> -->
				<td class="white"><?php
					$gt_1 +=  sv($web_phone_stat['web_phone_cnt_dealer'][$dealer_id]['5']);
					echo sv($web_phone_stat['web_phone_cnt_dealer'][$dealer_id]['5']); ?>
				</td>
				<td class="white"><?php
					$gt_2 +=  sv($web_phone_stat['web_phone_cnt_dealer'][$dealer_id]['6']);
					echo sv($web_phone_stat['web_phone_cnt_dealer'][$dealer_id]['6']); ?>
				</td>
				<td class="white"><?php
					$gt_3 += $total_lead_count;
					echo $total_lead_count; ?>
				</td>
				<td class="white"><?php
					$gt_4 += sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['10']);
					echo sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['10']); ?>
				</td>
				<td class="white"><?php
					echo $ASBA; ?>%
				</td>
				<td class="white"><?php
					$gt_6 += sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['11']);
					echo sv($event_agent_closer['event_agent_closer_dealer'][$dealer_id]['11']); ?>
				</td>
				<td class="white"><?php
					echo $ASBC; ?>%
				</td>
				<td class="white"><?php
					$gt_8 += $total_appointments_set;
					echo $total_appointments_set; ?>
				</td>
				<td class="white"><?php
					echo $ASBA + $ASBC; ?>%
				</td>

				<td class="white"><?php
					$gt_10 += sv($app_today_showed['today_dealer'][$dealer_id]['10']);
					echo sv($app_today_showed['today_dealer'][$dealer_id]['10']); ?>
				</td>
				<td class="white">

					<?php
					//$gt_appt +=  sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id]);
					//echo sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id]); ?>
					<?php
					$gt_11 += sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id][10]);
					echo sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id][10]); ?>
				</td>
				<td class="white"><?php //echo $AASU; ?></td>
				<td class="white">
					<?php
					$gt_13 += sv($app_today_showed['today_dealer'][$dealer_id]['11']);
					echo sv($app_today_showed['today_dealer'][$dealer_id]['11']);
					?>
				</td>
				<td class="white"><?php
					// $gt_14 += sv($app_today_showed['showed_dealer'][$dealer_id]['11']);
					// echo sv($app_today_showed['showed_dealer'][$dealer_id]['11']);
				?>
					<?php
					$gt_14 += sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id][11]);
					echo sv($bdc_app_shows['event_agent_closer_dealer'][$dealer_id][11]); ?>

				</td>
				<td class="white"><?php //echo $CASU; ?></td>
				<td class="white"><?php
					$gt_16 += $total_appointments_showedup;
					echo $total_appointments_showedup; ?>
				</td>
				<td class="white"></td>
				<td class="white"><?php
					$gt_18 += sv($unit_solds_month['sold_location_stat'][$dealer_id]);
					echo sv($unit_solds_month['sold_location_stat'][$dealer_id]); ?>
				</td>
				<td class="white"><?php echo $unit_sold_percent; ?>%</td>
			</tr>
			<?php } ?>
			<!-- Location stat ends -->

			<!-- Total Location start -->
			<tr class='bg-inverse' >
				<td class="total" colspan="2">TOTALS</td>
				<!-- <td class="total"><?php echo $gt_appt; ?></td> -->
				<td class="total"><?php echo $gt_1; ?></td>
				<td class="total"><?php echo $gt_2; ?></td>
				<td class="total"><?php echo $gt_3; ?></td>
				<td class="total"><?php echo $gt_4; ?></td>
				<td class="total"><?php echo cal_percent($gt_3, $gt_4); ?>%</td>
				<td class="total"><?php echo $gt_6; ?></td>
				<td class="total"><?php echo cal_percent($gt_3, $gt_6); ?>%</td>
				<td class="total"><?php echo $gt_8; ?></td>
				<td class="total"><?php echo cal_percent($gt_3, $gt_8); ?>%</td>

				<td class="total"><?php echo $gt_10; ?></td>
				<td class="total"><?php echo $gt_11; ?></td>
				<td class="total"><?php //echo cal_percent($gt_10, $gt_11); ?></td>
				<td class="total"><?php echo $gt_13; ?></td>
				<td class="total"><?php echo $gt_14; ?></td>
				<td class="total"><?php //echo cal_percent($gt_13, $gt_14); ?></td>
				<td class="total"><?php echo $gt_16; ?></td>
				<td class="total"></td>
				<td class="total"><?php echo $gt_18; ?></td>
				<td class="total"><?php echo $gt_19; ?>%</td>
			</tr>
			<!-- Total Location ends -->

			<!-- Users stat start -->

			<?php
			foreach ($internet_stuffs as $username=>$sperson) { ?>

			<tr class='bg-inverse' >
				<td class="blue" rowspan='<?php echo count($dealers) + 2; ?>'><?php echo $sperson; ?></td>
				<td class="blue" rowspan='<?php echo count($dealers) + 1; ?>'>MONTHLY TOTALS</td>
				<td class="blue">Location</td>
				<!-- <td class="blue">Appt. Show</td> -->
				<td class="blue">WEB LEADS</td>
				<td class="blue">PHONE LEADS</td>
				<td class="blue">TOTAL LEADS</td>
				<td class="blue">Appointments Set by Agent</td>
				<td class="blue">ASBA %</td>
				<td class="blue">Appointments Set by Closer</td>
				<td class="blue">ASBC %</td>
				<td class="blue">Appointments Set (Total)</td>
				<td class="blue">AST %</td>

				<td class="blue">Appointments Set for Today by Agent</td>
				<td class="blue">Agent Appointments Showed Up</td>
				<td class="blue">AASU %</td>
				<td class="blue">Appointments Set for Today by Closer</td>
				<td class="blue">Closer Appointments Showed Up</td>
				<td class="blue">CASU %</td>
				<td class="blue">Total Appointments Showed Up</td>
				<td class="blue">ASU %</td>
				<td class="blue">Units Sold</td>
				<td class="blue">Units Sold %</td>
			</tr>
			<?php
			$gt_appt = 0;
			$gu_1 = 0;
			$gu_2 = 0;
			$gu_3 = 0;
			$gu_4 = 0;
			$gu_5 = 0;
			$gu_6 = 0;
			$gu_7 = 0;
			$gu_8 = 0;
			$gu_9 = 0;

			$gu_10 = 0;
			$gu_11 = 0;
			$gu_12 = 0;
			$gu_13 = 0;
			$gu_14 = 0;
			$gu_15 = 0;
			$gu_16 = 0;
			$gu_17 = 0;
			$gu_18 = 0;
			$gu_19 = 0;

			foreach ($dealers as $dealer_id=>$dealer_name) {
				$total_web_ph_usr = sv($web_phone_stat['web_phone_cnt_user'][$dealer_id][$username]['5']) +
				 sv($web_phone_stat['web_phone_cnt_user'][$dealer_id][$username]['6']);
				$total_appointments_set =  sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['10']) +  sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['11']);

				$ASBA = cal_percent( $total_web_ph_usr, sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['10'])  );
				$ASBC = cal_percent( $total_lead_count, sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['11']) );

				//Total SHowup
				//$total_appointments_showedup_user = sv($app_today_showed['showed_user'][$dealer_id][$username]['10']) + sv($app_today_showed['showed_user'][$dealer_id][$username]['11']);
				$total_appointments_showedup_user = sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]['10']) + sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]['11']);

				$unit_sold_percent_user =  cal_percent( $total_appointments_showedup_user, sv($unit_solds_month['sold_user_user'][$dealer_id][$username]) );

				$AASU = cal_percent(sv($app_today_showed['today_user'][$dealer_id][$username]['10']), sv($app_today_showed['showed_user'][$dealer_id][$username]['10']));
				$CASU = cal_percent(sv($app_today_showed['today_user'][$dealer_id][$username]['11']), sv($app_today_showed['showed_user'][$dealer_id][$username]['11']));
			?>
			<tr class='bg-inverse' >
				<td class="white">#<?php echo $dealer_id; ?></td>
				<!-- <td class="white"><?php
					//$gt_appt += sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]);
					//echo sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]); ?>
				</td> -->
				<td class="white"><?php
					$gu_1 += sv($web_phone_stat['web_phone_cnt_user'][$dealer_id][$username]['5']);
					echo sv($web_phone_stat['web_phone_cnt_user'][$dealer_id][$username]['5']); ?>
				</td>
				<td class="white"><?php
					$gu_2 += sv($web_phone_stat['web_phone_cnt_user'][$dealer_id][$username]['6']);
					echo sv($web_phone_stat['web_phone_cnt_user'][$dealer_id][$username]['6']); ?>
				</td>
				<td class="white"><?php
					$gu_3 += $total_web_ph_usr ;
					echo $total_web_ph_usr ;  ?>
				</td>
				<td class="white"><?php
					$gu_4 += sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['10']);
					echo sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['10']);
				?></td>
				<td class="white"><?php
					echo $ASBA; ?>%
				</td>
				<td class="white"><?php
					$gu_6 += sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['11']);
					echo sv($event_agent_closer['event_agent_closer_user'][$dealer_id][$username]['11']); ?>
				</td>
				<td class="white"><?php
					echo $ASBC; ?>%
				</td>
				<td class="white"><?php
					$gu_8 += $total_appointments_set;
					echo $total_appointments_set; ?>
				</td>
				<td class="white"><?php
					echo $ASBA + $ASBC; ?>%
				</td>

				<td class="white"><?php
					$gu_10 += sv($app_today_showed['today_user'][$dealer_id][$username]['10']);
					echo sv($app_today_showed['today_user'][$dealer_id][$username]['10']); ?>
				</td>
				<td class="white">
					<?php //echo sv($app_today_showed['showed_user'][$dealer_id][$username]['10']); ?>
					<?php
					$gu_11 += sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]['10']);
					echo sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]['10']);
					?>
				</td>
				<td class="white"> </td>
				<td class="white"><?php echo sv($app_today_showed['today_user'][$dealer_id][$username]['11']); ?></td>
				<td class="white">
					<?php //echo sv($app_today_showed['showed_user'][$dealer_id][$username]['11']); ?>
					<?php
					$gu_14 += sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]['11']);
					echo sv($bdc_app_shows['event_agent_closer_user'][$dealer_id][$username]['11']);
					?>


				</td>
				<td class="white"></td>
				<td class="white">
					<?php
					$gu_16 += $total_appointments_showedup_user;
					echo $total_appointments_showedup_user;

					?>
				</td>
				<td class="white"> </td>
				<td class="white"><?php
					$gu_18 += sv($unit_solds_month['sold_user_user'][$dealer_id][$username]);
					echo sv($unit_solds_month['sold_user_user'][$dealer_id][$username]); ?></td>
				<td class="white"><?php echo $unit_sold_percent_user; ?>%</td>
			</tr>
			<?php } ?>
			<tr class='bg-inverse' >
				<td class="total" colspan="2">TOTALS</td>
				<!-- <td class="total"><?php echo $gt_appt; ?></td> -->
				<td class="total"><?php echo $gu_1; ?></td>
				<td class="total"><?php echo $gu_2; ?></td>
				<td class="total"><?php echo $gu_3; ?></td>
				<td class="total"><?php echo $gu_4; ?></td>
				<td class="total"><?php echo cal_percent($gu_3, $gu_4); ?>%</td>
				<td class="total"><?php echo $gu_6; ?></td>
				<td class="total"><?php echo cal_percent($gu_3, $gu_6); ?>%</td>
				<td class="total"><?php echo $gu_8; ?></td>
				<td class="total"><?php echo cal_percent($gu_3, $gu_8); ?>%</td>

				<td class="total"><?php echo $gu_10; ?></td>
				<td class="total"><?php echo $gu_11; ?></td>
				<td class="total"></td>
				<td class="total"><?php echo $gu_13; ?></td>
				<td class="total"><?php echo $gu_14; ?></td>
				<td class="total"></td>
				<td class="total"><?php echo $gu_16; ?></td>
				<td class="total"></td>
				<td class="total"><?php echo $gu_18; ?></td>
				<td class="total"><?php echo $gu_19; ?>%</td>
			</tr>

			<!-- Users stat ends -->
		<?php } ?>



		</tbody>
		<!-- // Table body END -->
		</table>

		<?php echo $this->element('sql_dump'); ?>


	<script type="text/javascript">
		$("#stats_monthMonth").change(function(event){
			location.href = "<?php echo $this->Html->url(array('controller' => 'payroll_report', 'action' => 'index')); ?>?month="+$(this).val();
		});
	</script>

</body>
</html>
