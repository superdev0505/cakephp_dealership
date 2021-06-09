<?php
$focus_input = "";
if($start_search == 'Phone'){
	$focus_input = "#ContactSearchPhone";
}else if($start_search == 'Name'){
	$focus_input = "#ContactSearchFirstName";
}else if($start_search == 'Email'){
	$focus_input = "#ContactSearchEmail";
}


function format_phone($phone){
	$phone = str_replace("-", "", $phone);
	$phone = str_replace(" ", "", $phone);
	$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
	return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
}




?>
<style>
<?php echo $focus_input; ?>, .today_count {
    -webkit-transition: text-shadow 1s linear;
    -moz-transition: text-shadow 1s linear;
    -ms-transition: text-shadow 1s linear;
    -o-transition: text-shadow 1s linear;
    transition: text-shadow 1s linear;
	border-color: #6EA2DE;
    box-shadow: 0px 0px 10px #6EA2DE !important;
	width: 100%;
	/* margin-left: 10px; */
}
#ContactSearchQuick:hover,
#ContactSearchQuick.glow {
    text-shadow: 0 0 10px red;
}
#submit_advance_search_filter {
	margin-left: 10px;
}
li.blue_background{
	background-color:#EDF0F5!important;
}
.bg-danger{
	background: #CC3A3A;
}

.statbox{
	padding-top: 7px;
	padding-bottom: 7px;
}
.glow_button{
	-webkit-transition: text-shadow 1s linear;
    -moz-transition: text-shadow 1s linear;
    -ms-transition: text-shadow 1s linear;
    -o-transition: text-shadow 1s linear;
    transition: text-shadow 1s linear;
	border-color: #8bbf61;
    box-shadow: 0px 0px 10px #8bbf61 !important;
}

.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1200px;
}

.extraLargeWidth {
    margin: 0 auto;
    width: 1300px;
}

#ContactSearchUnitColor{
	width: 80% !important;
}

</style>

<!-- Include the plugin's CSS and JS: -->
<script type="text/javascript" src="/app/View/Themed/Default/webroot/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="/app/View/Themed/Default/webroot/css/bootstrap-multiselect.css" type="text/css"/>

</br>
</br>
</br><br />
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');
$group_id = AuthComponent::user('group_id');
$user_id = AuthComponent::user('group_id');
$ridenow_group = array(263,5000);

//echo $uname;
?>
<?php
$date = new DateTime();
date_default_timezone_set($zone);
$datetimeshort = date('Y-m-d');
$datetime = date('m/d/Y g:ia');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
$year_array = range(2014,date('Y'));
$year_array = array_combine($year_array,$year_array);




$open_lead_count = "";
$closed_lead_count = "";
$sold_lead_count = "";
$pending_lead_count = "";
$dormant_lead_count = "";
$today_event_count = "";
$web_just_arrived = "";
$web_worked_today = "";
$web_visit = "";
$web_still_pending = "";
$web_dormant_48hrs = "";
$web_email_sent = "";
$web_appointment = "";
$web_closed_today = "";
$web_sold_today = "";
$web_missed_event = "";
$web_noteupdate_today = "";
$web_sms_text = "";
$new_inbound = "";
$existing_in = "";
$existing_out = "";
$phone_dormant_48hrs = "";
$phone_email_sent = "";
$phone_appointment = "";
$phone_closed_today = "";
$phone_sold_today = "";
$phone_missed_event = "";
$phone_noteupdate_today = "";
$phone_sms_text = "";
$showroom_existing_visit = "";
$showroom_dormant_48hrs = "";
$showroom_worksheet = "";
$showroom_email_sent = "";
$showroom_appointment = "";
$showroom_closed_today = "";
$showroom_sold_today = "";
$showroom_missed_appt = "";
$showroom_noteupdate_today = "";
$showroom_sms_text = "";
$mobile_just_arrived = "";
$mobile_worked_today = "";
$mobile_still_pending = "";
$mobile_dormant_48hrs = "";
$mobile_email_sent = "";
$mobile_appointment = "";
$mobile_closed_today = "";
$mobile_sold_today = "";
$mobile_missed_event = "";
$mobile_noteupdate_today = "";
$mobile_sms_text = "";
$overdue_event_count = "";
$today_lead_count = 0;
$new_outbound = "";
$showroom_new_visit = "";








?>

<div class="innerLR">

	<div class="row">

	</div>


	<div class="widget widget-body-white">
		<div class="widget-body">

			<div class="row">

				<div class="col-md-12" >

					<div class='glow_button pull-left'>
						<a id="lnk_add_new_lead" href="#modal-2" data-toggle="modal" class="" >Start or Search <i class="fa fa-edit fa-2x" style="cursor: pointer; vertical-align: middle;"></i></a>
					</div>

					<div class="starts-btn">
						<b>STATS:&nbsp;</b><i class="fa fa-dashboard fa-2x"></i>&nbsp;
						<?php
					echo $this->Form->input('stats_year', array('label'=>false,'div'=>false, 'value'=>$stats_year, 'options'=>$year_array, 'type'=>'select', 'class'=>"form-control", 'style'=>"width: auto; display: inline-block", 'empty'=>false)); ?>
					</div>

					<div  class='month-select'>
					<?php echo $this->Form->month('stats_month', array('class'=>"form-control", 'style'=>"display: inline-block; ", 'empty'=>false, 'value'=>$stats_month)); ?>
					</div>

					<div class='day-select'>
						<?php
						unset($stat_options['Dealer_month']);
						//$selected_stats = isset($this->request->query['stat_user']) ? $this->request->query['stat_user'] : null ;
						echo $this->Form->select('stat_options', $stat_options, array('value'=>$selected_stats,'class'=>'form-control','style'=>"display: inline-block;",'multiple'=>'multiple')); ?>
					</div>

					<!-- div for Button Instack Search -->

					<div class='instock-search'>
						<button id="btn_search_stock_vin" v_type='main' type="button" class="btn btn-primary btn-sm ">
							<i class="fa fa-search"></i>
							Instock Search
						</button>
					</div>












						<div class="btn-group pull-right action" id='' >
							<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown">
								ACTIONS
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu pull-right">
								<li>
									<a href='/daily_recaps/workload' class='no-ajaxify'  > <i class="fa fa-fw icon-graph-up-1"></i> Workload</a>
								</li>
<?php if($activate_lite_version == 'Off'){  ?>
								<li>
									<a href='/master_reports/realtime_container' class='no-ajaxify' ><i class="fa fa-fw icon-graph-up-1"></i> Real Time</a>
								</li>

								<li>
									<a href='/reports/dailyrecap_reports/null/null/null/yes' ><i class="fa fa-fw icon-graph-up-1"></i> Recap</a>
								</li>


							  <li><a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'bdc_appt_report')); ?>"> <i class="fa fa-fw icon-graph-up-1"></i>BDC-Appointments</a></li>


								<?php if (in_array($group_id, array('2','6','12','13'))  ) {  ?>
								<li>
									<a  href="<?php echo $this->Html->url(array('controller'=>'manage_web_lead','action'=>'not_worked_leads')); ?>">
										<i class="fa fa-fw icon-graph-up-1"></i> Not Worked Leads
									</a>
								</li>
								<?php } ?>
<?php }  ?>

								<?php if($location_transfer == 'On'){ ?>
								<li>
									<a  href="<?php echo $this->Html->url(array('controller'=>'contacts_transfer','action'=>'transfer_report')); ?>">
										<i class="fa fa-fw icon-graph-up-1"></i> Location Transfer
									</a>
								</li>
								<?php } ?>

<?php if($activate_lite_version == 'Off'){  ?>

								<?php if($group_id == '12' || $group_id == '2' || $group_id == '10'){ ?>
								<li>
									<a target="_blank"  href="<?php echo $this->Html->url(array('controller'=>'payroll_report','action'=>'index')); ?>">
										<i class="fa fa-fw icon-graph-up-1"></i> Payroll Report
									</a>
								</li>
								<?php } ?>
<?php }  ?>


							</ul>
						</div>



				</div>








			</div>

		</div>
	</div>

	<div class="widget">

		<div class="row row-merge margin-none ">

			<div class="col-md-6">

				<div class="row row-merge margin-none ">

					<div class="col-md-3">
						<div class="innerAll text-center statbox" id='open_month_box' data-boxname='Open (Month)' date-stype='<?php echo $dealer_user; ?>' >
							<a  id='open_month_link' href="/contacts/leads_main/?quick_lead_search=open_this_month&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
							<span class="text-medium strong" id="open_lead_count"><?php echo $open_lead_count; ?></span><br/>
							Open (Month)
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="innerAll text-center statbox" id='clsoed_month_box' data-boxname='Closed (Month)' date-stype='<?php echo $dealer_user; ?>' >
							<a  id='clsoed_month_link'  href="/contacts/leads_main/?quick_lead_search=closed_this_month&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
								<span class="text-medium strong" id="closed_lead_count"><?php echo $closed_lead_count; ?></span><br/>
								Closed (Month)
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="innerAll text-center statbox"  id='sold_month_box' data-boxname='Sold (Month)' date-stype='<?php echo $dealer_user; ?>' >
							<a id='sold_month_link'  href="/contacts/leads_main/?quick_lead_search=sold_this_month&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
								<span class="text-medium strong" id="sold_lead_count"><?php echo $sold_lead_count; ?></span><br/>
								Sold (Month)
							</a>
						</div>
					</div>

					<div class="col-md-3">
						<div class="innerAll text-center statbox"  id='pending_month_box' data-boxname='Pending (Month)' date-stype='<?php echo $dealer_user; ?>'  >
							<a  id='pending_month_link'  href="/contacts/leads_main/?quick_lead_search=pending_this_month&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
								<span class="text-medium strong" id="pending_lead_count"><?php echo $pending_lead_count; ?></span><br/>
								Pending (Month)
							</a>
						</div>
					</div>

				</div>



			</div>

			<div class="col-md-6">

				<div class="row row-merge margin-none ">

					<div class="col-md-3">
						<div class="innerAll text-center statbox"  id='dormant_48_box' data-boxname='Dormant (48 Hrs)' date-stype='<?php echo $dealer_user; ?>'  >
							<a  id='dormant_48_link' href="/contacts/leads_main/?quick_lead_search=Dormant&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
								<span class="text-medium strong" id="dormant_lead_count"><?php echo $dormant_lead_count; ?></span><br/>
								Dormant (48 Hrs)
							</a>
						</div>
					</div>
					<div class="col-md-3">
						<div class="innerAll text-center statbox"  id='today_event_box' data-boxname='Today (Events)' date-stype='<?php echo $dealer_user; ?>'  >
						<!-- 	<a href="/events/index/?type=today&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">  -->
							<a id='today_event_link' href="/contacts/leads_main/?quick_lead_search=today_event_count&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">

								<span class="text-medium strong" id="today_event_count"><?php echo $today_event_count; ?></span><br/>
								Today (Events)
							</a>
						</div>
					</div>

					<div class="col-md-3">
						<div class="innerAll text-center statbox"  id='overdue_event_box' data-boxname='Overdue (Events)'  date-stype='<?php echo $dealer_user; ?>'   >
						<!-- 	<a href="/events/index/?type=overdue&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>"> -->
						<a id='overdue_event_link' href="/contacts/leads_main/?quick_lead_search=overdue_event_count&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
								<span class="text-medium strong <?php echo ($overdue_event_count != 0)? "text-danger" : ""; ?>" id="overdue_event_count"><?php echo $overdue_event_count; ?></span><br/>
								Overdue (Events)
							</a>
						</div>
					</div>



					<div class="col-md-3">
						<div class="innerAll text-center statbox">
							<a href="/contacts/leads_main/?quick_lead_search=Today&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>">
							<span class="text-medium strong <?php echo ($today_lead_count < 5)? "text-danger" : ""; ?> "  id="today_lead_count"><?php echo $today_lead_count; ?> / <?php echo $new_lead_user; ?></span><br/>
								New Ups Goal
							</a>
						</div>
					</div>





				</div>


			</div>



		</div>

	</div>

	<div class="row">

		<!-- Col -->
		<div class="col-md-9">
			<div class="row">

				<div class="col-sm-3">
					<div class="widget">
						<a id='web_lead_box' data-boxname='Web Lead' date-stype='<?php echo $dealer_user; ?>'  href="<?php
							$weblead_query = ( $group_id == 3 && $selected_stats != 'Dealer_day'  )? array('quick_lead_search'=>'contactstatus_search_5',  'stat_type' => $current_user_id     ) :
							array('quick_lead_search'=>'contactstatus_search_5');

							echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=> $weblead_query  ));

						?>"  class=" web_just_arrived_icon no-ajaxify display-block <?php echo (count($web_lead_arrived) == 0)? "bg-success" : "bg-danger"; ?>  half    innerAll text-center text-white"><i class="icon-cloud-download fa-5x"></i></a>

						<div class="text-center innerAll">

							<div style="text-align: right; display: inline-block">

								<strong>Just Arrived:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_just_arrived','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-danger" id="web_just_arrived"><?php echo $web_just_arrived; ?></span>
								</a></br>
								<strong>Worked Today:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_worked_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-success" id="web_worked_today"><?php echo $web_worked_today; ?></span>
								</a></br>

								<div class="clearfix"></div>
								<strong>Still Pending:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_lead_still_pending','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-inverse" id="web_still_pending"><?php echo $web_still_pending; ?></span>
								</a></br>

								<strong>Dormant 48hrs:</strong>
								<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_dormant_48hrs','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-warning" id="web_dormant_48hrs"><?php echo $web_dormant_48hrs; ?></span>
								</a>
								</br>


								<div align="center">
									<button data-toggle="collapse" id="btn_more_stat_web" data-target="#collapse_stat_web" aria-expanded="false" aria-controls="Show More" type = 'button' class="btn btn-warning btn-xs">More Stat</button>
								</div>
								<div class="collapse" id="collapse_stat_web" >

									<strong>Step Update:</strong>	<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_visit','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-success" style="background: #3399FF;" id="web_visit"><?php echo $web_visit; ?></span>
									</a></br>

									<strong>Email(s) <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_email_sent','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="web_email_sent"><?php echo $web_email_sent; ?></span>
									</a>
									</br>

									<strong>Events (Today):</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_appointment','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="web_appointment"><?php echo $web_appointment; ?></span>
									</a>
									</br>


									<strong>Closed <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_closed_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="web_closed_today"><?php echo $web_closed_today; ?></span>
									</a>
									</br>

									<strong>Sold <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_sold_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-success" id="web_sold_today"><?php echo $web_sold_today; ?></span>
									</a>
									</br>
									<strong>Missed Event:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_missed_event','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" id="web_missed_event"><?php echo $web_missed_event; ?></span>
									</a>

									</br>

									<strong>Edit Update:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_noteupdate_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="web_noteupdate_today"><?php echo $web_noteupdate_today; ?></span>
									</a>
									</br>

									<strong>SMS Text (All):</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'web_sms_text','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" style="background: #3399FF;" id="web_sms_text"><?php echo $web_sms_text; ?></span>
									</a>
								</div>	

							</div>

							<div class="clearfix"></div>
						</div>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">

						<a id='phone_lead_box' data-boxname='Phone Lead' data-boxname='Showroom Lead' date-stype='<?php echo $dealer_user; ?>'  href="<?php
						$phoneead_query = ( $group_id == 3 && $selected_stats != 'Dealer_day' )? array('quick_lead_search'=>'contactstatus_search_6',  'stat_type' => $current_user_id     ) :
							array('quick_lead_search'=>'contactstatus_search_6');

						echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=> $phoneead_query   ));
						 ?>" class="no-ajaxify display-block bg-purple half   innerAll text-center text-white"><i class="icon-phone fa-5x"></i></a>

						<div class="text-center innerAll">

							<div style="text-align: right; display: inline-block">
									<strong>New Inbound:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'new_inbound','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-danger" id="new_inbound"><?php echo $new_inbound; ?></span>
								</a></br>
									<strong>New Outbound:</strong>	<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'new_outbound','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-success" id="new_outbound"><?php echo $new_outbound; ?></span>
								</a></br>

								<strong>Dormant 48hrs:</strong>
								<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_dormant_48hrs','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-warning" id="phone_dormant_48hrs"><?php echo $phone_dormant_48hrs; ?></span>
								</a>
								</br>


								<div align="center">
									<button data-toggle="collapse" id="btn_more_stat_phone" data-target="#collapse_stat_phone" aria-expanded="false" aria-controls="Show More" type = 'button' class="btn btn-warning btn-xs">More Stat</button>
								</div>
								<div class="collapse" id="collapse_stat_phone" >

									<strong>Existing In:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'existing_in','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" style="background: #3399FF;" id="existing_in"><?php echo $existing_in; ?></span>
									</a>
									</br>
										
									<strong>Existing Out:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'existing_out','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-success" id="existing_out"><?php echo $existing_out; ?></span>
									</a>
									</br>
									<strong>Email(s) <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts',
									'action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_email_sent','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="phone_email_sent"><?php echo $phone_email_sent; ?></span>
									</a>
									</br>
									<strong>Events (Today):</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_appointment','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="phone_appointment"><?php echo $phone_appointment; ?></span>
									</a>
									</br>

									<strong>Closed <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_closed_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="phone_closed_today"><?php echo $phone_closed_today; ?></span>
									</a>
									</br>

									<strong>Sold <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_sold_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-success" id="phone_sold_today"><?php echo $phone_sold_today; ?></span>
									</a>
									</br>
									<strong>Missed Event:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_missed_event','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" id="phone_missed_event"><?php echo $phone_missed_event; ?></span>
									</a>
									</br>

									<strong>Step Update:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_noteupdate_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="phone_noteupdate_today"><?php echo $phone_noteupdate_today; ?></span>
									</a>
									</br>
									<strong>SMS Text (All):</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'phone_sms_text','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" style="background: #3399FF;" id="phone_sms_text"><?php echo $phone_sms_text; ?></span>
									</a>

								</div>


							</div>
							<div class="clearfix">
							</div>

						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">

						<a  id='showroom_lead_box' data-boxname='Showroom Lead' date-stype='<?php echo $dealer_user; ?>'  href="<?php

						$showroom_lead_query = ( $group_id == 3 && $selected_stats != 'Dealer_day' )? array('quick_lead_search'=>'contactstatus_search_7',  'stat_type' => $current_user_id     ) :
							array('quick_lead_search'=>'contactstatus_search_7');

						echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=> $showroom_lead_query   ));

						 ?>" class="no-ajaxify display-block bg-mustard half innerAll text-center text-white"><i class="icon-building fa-5x"></i></a>
						<div class="text-center innerAll">
							<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=>array('quick_lead_search'=>'contactstatus_search_7'))); ?>" class="strong  "><u>Showroom (Month)</u></a></br>

							<div style="text-align: right; display: inline-block">

								
								<strong>Existing Visit:</strong>	<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_existing_visit','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-success" style="background: #3399FF;" id="showroom_existing_visit"><?php echo $showroom_existing_visit; ?></span>
									</a></br>
									<strong>Dormant 48hrs:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_dormant_48hrs','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="showroom_dormant_48hrs"><?php echo $showroom_dormant_48hrs; ?></span>
									</a><br />

									<strong>Worksheet:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_worksheet','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="showroom_worksheet"><?php echo $showroom_worksheet; ?></span>
									</a><br />

									<div align="center">
										<button data-toggle="collapse" id="btn_more_stat_showroom" data-target="#collapse_stat_showroom" aria-expanded="false" aria-controls="Show More" type = 'button' class="btn btn-warning btn-xs">More Stat</button>
									</div>
									<div class="collapse" id="collapse_stat_showroom" >

										<strong>New Visit:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_new_visit','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-success"  id="showroom_new_visit"><?php echo $showroom_new_visit; ?></span>
										</a></br>

										<strong>Email(s) <?php echo $stat_label; ?>:</strong>
										<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_email_sent','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-warning" id="showroom_email_sent"><?php echo $showroom_email_sent; ?></span>
										</a>
										</br>

										<strong>Events (Today):</strong>
										<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_appointment','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-warning" id="showroom_appointment"><?php echo $showroom_appointment; ?></span>
										</a>
										</br>

										<strong>Closed <?php echo $stat_label; ?>:</strong>
										<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_closed_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-warning" id="showroom_closed_today"><?php echo $showroom_closed_today; ?></span>
										</a>
										</br>

										<strong>Sold <?php echo $stat_label; ?>:</strong>
										<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_sold_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-success" id="showroom_sold_today"><?php echo $showroom_sold_today; ?></span>
										</a>
										</br>
										<strong>Missed Event:</strong><a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_missed_appt','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-danger" id="showroom_missed_appt"><?php echo $showroom_missed_appt; ?></span>
										</a>
										</br>

										<strong>Edit Update:</strong>
										<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_noteupdate_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-warning" id="showroom_noteupdate_today"><?php echo $showroom_noteupdate_today; ?></span>
										</a>
										</br>


										<strong>SMS Text (All):</strong>
										<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'showroom_sms_text','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
											<span class="label label-danger" style="background: #3399FF;" id="showroom_sms_text"><?php echo $showroom_sms_text; ?></span>
										</a>
									</div>
								</div>
							<div class="clearfix"></div>

						</div>
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="widget">
						<a  id='mobile_lead_box' data-boxname='Mobile Lead' date-stype='<?php echo $dealer_user; ?>'   href="<?php

						$mobile_lead_query = ( $group_id == 3 && $selected_stats != 'Dealer_day' )? array('quick_lead_search'=>'contactstatus_search_12',  'stat_type' => $current_user_id     ) :
							array('quick_lead_search'=>'contactstatus_search_12');

						echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=> $mobile_lead_query  ));

						?>" class="no-ajaxify display-block bg-gray border-bottom half   innerAll text-center"><i class="icon-smart-phone fa-5x"></i></a>
						<div class="text-center innerAll">
							<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main', '?'=>array('quick_lead_search'=>'contactstatus_search_12'))); ?>" class="strong  "><u>Mobile (Month)</u></a></br>

							<div style="text-align: right; display: inline-block">

								<strong>Just Arrived:</strong>
								<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_just_arrived','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-danger" id="mobile_just_arrived"><?php echo $mobile_just_arrived; ?></span>
								</a></br>
								<strong>Worked Today:</strong>
								<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_worked_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-success" id="mobile_worked_today"><?php echo $mobile_worked_today; ?></span>
								</a></br>
								<strong>Still Pending:</strong>	<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_still_pending','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
								<span class="label label-inverse" id="mobile_still_pending"><?php echo $mobile_still_pending; ?></span>
								</a></br>
								<strong>Dormant 48hrs:</strong>		<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_dormant_48hrs','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
									<span class="label label-warning" id="mobile_dormant_48hrs"><?php echo $mobile_dormant_48hrs; ?></span>
								</a></br>

								
								<div align="center">
									<button data-toggle="collapse" id="btn_more_stat_mobile"  data-target="#collapse_stat_mobile" aria-expanded="false" aria-controls="Show More" type = 'button' class="btn btn-warning btn-xs">More Stat</button>
								</div>
								<div class="collapse" id="collapse_stat_mobile" >

									<strong>Email(s) <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_email_sent','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="mobile_email_sent"><?php echo $mobile_email_sent; ?></span>
									</a>
									</br>

									<strong>Events (Today):</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_appointment','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="mobile_appointment"><?php echo $mobile_appointment; ?></span>
									</a>
									</br>

									<strong>Closed <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_closed_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="mobile_closed_today"><?php echo $mobile_closed_today; ?></span>
									</a>
									</br>

									<strong>Sold <?php echo $stat_label; ?>:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_sold_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-success" id="mobile_sold_today"><?php echo $mobile_sold_today; ?></span>
									</a>
									</br>
									<strong>Missed Event:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_missed_event','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" id="mobile_missed_event"><?php echo $mobile_missed_event; ?></span>
									</a>
									</br>

									<strong>Step Update:</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_noteupdate_today','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-warning" id="mobile_noteupdate_today"><?php echo $mobile_noteupdate_today; ?></span>
									</a>
									</br>
									<strong>SMS Text (All):</strong>
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'leads_main',"?"=>array('quick_lead_search'=>'mobile_sms_text','stat_type'=>$dealer_user,'grp_ids'=>$team_members_floor_text))); ?>" class="strong  ">
										<span class="label label-danger" style="background: #3399FF;" id="mobile_sms_text"><?php echo $mobile_sms_text; ?></span>
									</a>
								</div>



							</div>
							<div class="clearfix"></div>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<span class="display-block bg-info innerAll text-center text-white"></span>
						<div class="text-center innerAll">
							<span class="strong">Sales Step Search</span></br>
							<?php

							echo $this->Form->select('sales_step',$sales_step_options , array(
							    'empty' => 'Select',
							    'selected' => '',
								'style'=>'width: 100%',
							    'class' => 'input-medium'
							));
							?>
							<div class="clearfix"></div>

						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<span class="display-block bg-inverse innerAll text-center text-white"></span>
						<div class="text-center innerAll">
							<span class="strong">Sales Status Search</span>


							<?php
							echo $this->Form->select('status', $lead_status_options, array(
							    'empty' => 'Select',
							    'required' => 'required',
							    'selected' => '',
							    'class' => 'input-medium','label'=>'false' ,'style'=>'width: 100%')); ?>
							<div class="clearfix"></div>

						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<span class="display-block bg-warning innerAll text-center text-white"></span>
						<div class="text-center innerAll">
							<span class="strong">Quick Lead Search</span></br>
							  <?php echo $this->Form->select('search_all', array(
							            'Open' => 'Open',
							            'Closed' => 'Closed',
							            'Today' => 'Today',
							            "yesterday" => 'Yesterday',
							            "this_month" => 'This Month',
							            'last_month' => 'Last Month'), array('div' => false, 'selected'=>'' ,'style'=>'width: 100%',   'class' => 'input-medium', 'empty' => 'Select')); ?>
							<div class="clearfix"></div>

						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<span class="display-block bg-success innerAll text-center text-white"></span>
						<div class="text-center innerAll">
							<span class="strong">Vehicle Search</span></br>
							<?php echo $this->Form->select('type',$d_type_options,array('empty'=>'Select','selected'=>'','class'=>'input-medium' ,'style'=>'width: 100%')); ?>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>





		</div>
		<!-- // Col END -->

		<!-- Col -->
		<div class="col-md-3">

			<div class="row">
				<div class="col-md-12">


				</div>
			</div>
			<div class="clearfix"></div>
			<div  class="widget">
				<div class="center">
					<span class="margin-none padding-none">
					<strong>
						<span>

							<?php if($hide_deaelrname != '' &&  AuthComponent::user('id') == '232' && AuthComponent::user('dealer_id') == $hide_deaelrname){ ?>
									&nbsp;
							<?php }else{ ?>
								<?php echo AuthComponent::user('dealer'); ?> # <?php echo AuthComponent::user('dealer_id'); ?>
							<?php } ?>

						<br>
						<span id="current_date_time"><?php echo "$datetime"; ?></span>,

						<i class="fa fa-phone"></i> <?php echo format_phone( AuthComponent::user('d_phone') ); ?>
					</strong>&nbsp;</span>

					</br>

					<div class="innerAll border-bottom">
						<a id="last_10_inbox" current_state='last_10' href="javascript:" class="btn btn-info btn-xs  no-ajaxify">Switch to Inbox&nbsp;<i class="fa fa-envelope-o"></i></a>

						<?php if(!empty($smtp_settings) && $email_settings == 'On' ){ ?>

						&nbsp; <a href="javascript:" id='btn-email-sync-modal' class="btn btn-xs btn-inverse no-ajaxify">
								<font><i class="fa fa-refresh"></i> Email Sync</font>
						</a>
						<?php } ?>


					</div>
				</div>

				<div id="switch_inbox_container" style="height: 415px; overflow: auto; display: none">
					<?php foreach($emails as $email){ ?>
					<div class="media bg-white innerAll border-bottom margin-none">
						<a href="/user_emails/inbox" class="pull-left">
							<img src="https://dpcrm.s3.amazonaws.com/assets/images/email_icon_square.png" height="60px" width="60px" alt="Image" />
						</a>
						<div class="media-body">
							<div class="strong" style="text-align: right"><?php echo $this->Time->timeAgoInWords($email['UserEmail']['received_date'],array('format' => 'F jS', 'end' => '+12 hours')); ?></div>
							<div class="clearfix">
								<h5 class="text-muted-darker">
									<?php echo $email['UserEmail']['sender_name']; ?>
									<?php echo ($email['UserEmail']['sender_id'] == $current_user_id)? '<span class="text-weight-regular">(Me)</span>' : ""; ?>
								</h5>
								<h5 class="text-muted-dark text-weight-normal">
									To: <?php echo $email['UserEmail']['receiver_name']; ?>
									<?php echo ($email['UserEmail']['receiver_id'] == $current_user_id)? '<span class="text-weight-regular">(Me)</span>' : ""; ?>
								</h5>

								<a href="/user_emails/inbox"><h5><?php echo $email['UserEmail']['subject']; ?></h5></a>
							</div>
							<p><?php echo $this->Text->truncate($email['UserEmail']['message_text'],150,array('html'=>false)); ?></p>
						</div>
					</div>
					<?php } ?>
				</div>

				<div id="last_10_Leads_container" style="height: 415px; overflow: auto;">

					<div class="widget">
                		<div class="widget-head	">
							<h4 class="heading pull-left">Last 10 Leads</h4>
						</div>
						<div class="widget-body padding-none">

							<?php
							$lead_block=1;
							foreach($contacts as $contact){
								$block_color = '';
								if($lead_block%2==0){
									$block_color ='blue_background';
								}
								$lead_block++;
							?>


							<li class="list-group-item <?php echo $block_color; ?>">
                             <div class="media innerAll" style="padding: 7px;">

                             	<div class="row">
                             		<div class="col-md-8">

                             			<div class="media-body">
                                            <h5 class="media-heading strong"><?php echo ucwords(strtolower($contact['Contact']['first_name'])) . "&nbsp;" . ucwords(strtolower($contact['Contact']['last_name']));  ?></h5>
                                            <ul class="list-unstyled">

                                        		<li>
                                                    <span>
														<?php
														if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
															echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
																		} else if ($contact['ContactStatus']['name'] == 'Web Lead') {
															echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
																			} else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
															echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														} else if ($contact['ContactStatus']['name'] == 'Showroom') {
															echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														} else if ($contact['ContactStatus']['name'] == 'Parts') {
															echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														} else if ($contact['ContactStatus']['name'] == 'Service') {
															echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														} else if ($contact['ContactStatus']['name'] == 'Call Center') {
															echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														} else if ($contact['ContactStatus']['name'] == 'Rental') {
															echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
														}
														?>&nbsp; <?php


														echo '<span class="label label-info label-stroke">'.$sales_step_options_popup[ $contact['Contact']['sales_step'] ].'</span>'; ?>
													</span>
                                                    <?php
													$phone = $contact['Contact']['mobile'];
													$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
													$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
													$phone2 = $contact['Contact']['phone'];
													$phone_number2 = preg_replace('/[^0-9]+/', '', $phone2); //Strip all non number characters
													$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number2); //Re Format it
													$phone3 = $contact['Contact']['work_number'];
													$phone_number3 = preg_replace('/[^0-9]+/', '', $phone3); //Strip all non number characters
													$cleaned3 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number3); //Re Format it
													 ?>
												</li>


													<li style="display:none;" id="Contact_read_more_<?php echo $contact['Contact']['id']; ?>">
                                                            <span>
                                                            	<?php
																echo '#'.$contact['Contact']['id'].' <br />';
																echo '<strong><i class="fa fa-mobile-phone"></i> Mobile  :</strong>'. $cleaned.'&nbsp;<br />';
																echo '<strong><i class="fa fa-phone"></i> Phone :</strong>'. $cleaned2.'';?>
						                                        </span><br />
						                                        <span><?php echo '<strong><i class="fa fa-phone-square"></i> Work :</strong>'. $cleaned3.''; ?></span><br />
						                                        <span><?php echo '<strong><i class="fa fa-envelope-o"></i> Email :</strong>'. $contact['Contact']['email']; ?>
						                                    </span>
						                                    <br />



                                                            <span><strong>Status :</strong> <?php echo $contact['Contact']['status']; ?></span><br />
                                                            <?php /*?><span><strong>Step :</strong> <?php echo $sales_step_options[ $contact['Contact']['sales_step'] ]; ?></span><br/><?php */?>
                                                            <span><strong>Vehicle :</strong><?php echo $contact['Contact']['year'].' '.$contact['Contact']['make'].' '.$contact['Contact']['model']; ?></span><br/>
                                                            <span><strong>Created :</strong> <?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['created'])); ?></span><br />
                                                            <span><strong>Modified :</strong> <?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['modified'])); ?></span><br />
                                                            <span>
                                                            	<strong>Notes :</strong>


	                                                        	<?php echo $this->Text->truncate( strip_tags($contact['Contact']['notes']),200,array('html'=>true,
																'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note no-ajaxify" contact_id = "'.
																$contact['Contact']['id'].'" >Read more</a>'));	 ?>


                                                            </span>
                                                            <br />
                                                        </li>




                                            </ul>

                                        </div>

                             		</div>
                             		<div class="col-md-4 text-right"><a href="/contacts/leads_main/view/<?php echo $contact['Contact']['id']; ?>" class=" btn btn-primary btn-stroke btn-xs last_lead"><i class="fa fa-arrow-right"></i>
                                  		</a><br><span class="btn btn-primary btn-stroke btn-xs Contact_read_more" style="margin-top: 5px;" href="#" data-id="<?php echo $contact['Contact']['id'] ?>"><i class="fa fa-align-center"></i></span>

                             		</div>
                             	</div>






                         		</div>
							</li>




							<?php } ?>

						</div>
					</div>



				</div>


			</div>


		</div>
		<!-- // Col END -->
	</div>
	<?php echo $this->element('sql_dump'); ?>
</div>




<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog modal900" >
		<div class="modal-content">

			<?php echo $this->Form->create('Contact', array('type'=>'GET','url' => array('action' => 'search_result_new_lead', 'allow_shopper' => $allow_shopper, 'selected_lead_type'=> "", 'search_all'=>'new_lead_search' ) ,'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>

			<!-- Modal body -->
			<div class="modal-body">
				<div>


					 <center>
						 <div class="checkbox" style="display: inline-block; margin-top: 0;">
							<label class="checkbox-custom" >
								<input type="checkbox" checked="checked" id="ContactSearchBroad"   class="chk_lead_src_type" name="checkbox_status_broad" value="broad" >
								<i class="fa fa-fw fa-square-o"></i> Contains Word Search
							</label>
						</div>
						&nbsp; &nbsp; &nbsp;
						 <div class="checkbox" style="display: inline-block; margin-top: 0;">
							<label class="checkbox-custom" >
								<input type="checkbox" id="ContactSearchExact"   class="chk_lead_src_type" name="checkbox_status_exact" value="exact" >
								<i class="fa fa-fw fa-square-o"></i> Starts With Word Search
							</label>
						</div>


					</center>
					 <div class="separator"></div>
				</div>

				<!--<div class="row">

					<div class="col-md-12 text-center">
						Quick Search (All): <?php
						echo $this->Form->input('search_quick', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'style' => 'width: auto',
						'placeholder' => 'Quick search'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>

				</div>
				-->

				<div class="row">
					<div class="col-md-6">
						Search Lead Range of :
						<?php
						$range_val = "two_years";
						if($default_search_lead_range == 'Off'){
							$range_val = "all";
						}
						echo $this->Form->input('search_range', array('type' => 'select',  'options' => array(
						'two_years' => 'Two Years',
						'all' => 'All',
						), 'label'=>false, 'value'=>$range_val, 'div'=>false,'class'=>'form-control','style'=>'width: auto'));
						?>
						<div class="separator"></div>
					</div>

					<div class="col-md-6">
						<?php echo $this->Form->input('search_quick_lead', array('type' => 'select', 'options'=>array(
			            'Open' => 'Open',
			            'Closed' => 'Closed',
			            'Today' => 'Today',
			            "yesterday" => 'Yesterday',
			            "this_month" => 'This Month',
			            'last_month' => 'Last Month',
			            'web_lead' => 'Web',
			            'showroom_lead' => 'Showroom',
			            'phone_lead' => 'Phone',
			            'mobile_lead' => 'Mobile',
						), 'empty'=>'Quick Lead Search','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
						<div class="separator"></div>
					</div>

				</div>

				<div class="row">
					<!--<div class="col-md-4 col-md-offset-2">
						<?php
						echo $this->Form->input('search_mobile', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Mobile Phone'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>
					-->

					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<?php
							echo $this->Form->input('search_phone', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => '(ALL) Phone - Mobile, Home, Work'), array('div' => false));
							?>
						</div>

						<div class="separator"></div>
					</div>

					<div class="col-md-6">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<?php
							echo $this->Form->input('search_email', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'Email'), array('div' => false));
							?>
						</div>
						<div class="separator"></div>
					</div>


				</div>
				<div class="row">
					<div class="col-md-6">
						<?php
						echo $this->Form->input('search_first_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'First Name - Company, Spouse, Company'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-6">
						<?php
						echo $this->Form->input('search_last_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Last Name, Account'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>


				</div>

				<div align="center">
					<strong>Click to view</strong> <button data-toggle="collapse" data-target="#collapse_bottom_search" aria-expanded="false" aria-controls="collapse_bottom_search" type = 'button' class="btn btn-warning btn-xs">Advanced Search</button>
				</div>

				<div class="separator"></div>

				<div class="collapse" id="collapse_bottom_search">

					<?php if($d_type != 'RV'){ ?>
					<div class="row" >

						<div class="col-md-2">
							<?php
							$est_payment_options = array();
							for($i=0; $i<=19; $i++){
								$st = $i*100;
								$lt = $st+100;
								$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
							}
							echo $this->Form->input('search_est_payment_search',array('options'=>$est_payment_options,
								'class'=>'form-control',
								'style'=>'width: 100%',
								'empty'=>'Payment'
								));
							?>
							<div class="separator"></div>
						</div>

						<div class="col-md-2">
							<?php echo $this->Form->input('search_price_range', array('type' => 'select', 'options'=>$PriceRangeNonRvOptions, 'empty'=>'Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('search_trade_price_range', array('type' => 'select', 'options'=>$PriceRangeNonRvOptions, 'empty'=>'(Trade) Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('search_sales_step', array('type' => 'select', 'options'=>$sales_step_options_popup, 'empty'=>'Sales Step','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('search_status', array('type' => 'select', 'options'=>$lead_status_options_popup, 'empty'=>'Sales Status','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
					<?php } ?>
					<?php if($d_type == 'RV'){ ?>
					<div class="row">

						<div class="col-md-2">
							<?php
							$est_payment_options = array();
							for($i=0; $i<=19; $i++){
								$st = $i*100;
								$lt = $st+100;
								$est_payment_options[ "$".$st."-"."$".$lt ] = "$".$st."-"."$".$lt;
							}
							echo $this->Form->input('search_est_payment_search',array('options'=>$est_payment_options,
								'class'=>'form-control',
								'style'=>'width: 100%',
								'empty'=>'Payment','required'=>'required'
								));
							?>
							<div class="separator"></div>
						</div>

						<div class="col-md-2" >
							<?php echo $this->Form->input('search_price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>

						<div class="col-md-3" >
							<?php echo $this->Form->input('search_trade_price_range', array('type' => 'select', 'options'=>$PriceRangeOptions, 'empty'=>'(Trade) Price Range','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>

						<div class="col-md-3">
							<?php echo $this->Form->input('search_floor_plans', array('type' => 'select', 'options'=>$FloorPlansOptions, 'empty'=>'All Floor Plans','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('search_length', array('type' => 'select', 'options'=>$LengthOptions, 'empty'=>'Select Length','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<?php echo $this->Form->input('search_weight', array('type' => 'select', 'options'=>$WeightOptions, 'empty'=>'Weight','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('search_sleeps', array('type' => 'select', 'options'=>$SleepsOptions, 'empty'=>'Sleeps','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('search_fuel_type', array('type' => 'select', 'options'=>$FuelTypeOptions, 'empty'=>'Fuel Type','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('search_sales_step', array('type' => 'select', 'options'=>$sales_step_options_popup, 'empty'=>'Sales Step','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
						<div class="col-md-4">
							<?php echo $this->Form->input('search_status', array('type' => 'select', 'options'=>$lead_status_options_popup, 'empty'=>'Sales Status','style'=>'width: 100%','label'=>false,'div'=>false, 'class' => 'form-control')); ?>
							<div class="separator"></div>
						</div>
					</div>
					<div class="row">


					</div>
					<?php } ?>





					<div class="row">

						<div class="col-md-7 col-md-offset-2 text-center">
							Vehicle Search Start Here:
							<?php
							echo $this->Form->input('search_vehicle_type', array('type' => 'select', 'options' => array(
							'new_vehicle' => 'New Vehicle',
							'trade_vehicle' => 'Trade Vehicle',
							), 'label'=>false,'div'=>false,'class'=>'form-control','style'=>'width: auto'));
							?>
							<div class="separator"></div>
						</div>
					</div>

					<div class="row">

						<div class="col-md-3">
							<?php echo $this->Form->input('search_category', array('type' => 'select', 'options' => $d_type_options_popup, 'empty' => 'Type', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
							<div class="separator"></div>
						</div>

						<div class="col-md-3">
							<?php echo $this->Form->input('search_make', array('type' => 'select',   'empty' => 'Make', 'label' => false, 'div' => false, 'class' => 'form-control pull-left','style'=>'width: 80%'));  ?>
							<button id="btn_make_edit_trade" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php

							$year_all_options['0'] = 'Any Year';
							for($i = date('Y') + 1; $i >= 1980; $i--){
								$year_all_options[ $i ] = $i;
							}

							echo $this->Form->input('search_year', array('options'=>$year_all_options,'type' => 'select',   'empty' => 'Year', 'label' => false, 'div' => false, 'class' => 'form-control pull-left','style'=>'width: 80%'));  ?>
							<button id="btn_year_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-5">
							<?php
							$display_model_id =  "inline-block";
							echo $this->Form->input('search_model_id', array('type' => 'select', 'empty' => 'Model', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display:'.$display_model_id));
							?>
							<?php
							$display_model_txt = 'none';
							echo $this->Form->input('search_model', array('type' => 'text',  'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 80%; display: '.$display_model_txt));
							?>
							<button id="btn_models_edit" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('search_type', array('type' => 'select',  'empty' => 'Category', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
						</div>
						<div class="col-md-2">
							<?php
							echo $this->Form->input('search_condition', array('type' => 'select', 'options' => array(
							'Any' => 'Any',
							'New' => 'New',
							'Used' => 'Used',
							'Rental' => 'Rental',
							'Demo' => 'Demo'
							), 'empty' => 'Condition', 'selected' => '','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>

						<div class="col-md-4">
							<?php
							echo $this->Form->input('search_vin', array('type' => 'text','placeholder'=>'VIN','label'=>false,'div'=>false,'class' => 'form-control','style'=>'width: 100%'));
							?>
							<div class="separator"></div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 col-md-offset-1">
							<?php echo $this->Form->input('search_unit_color', array('type' => 'text', 'placeholder'=>'Color','label'=>false,'div'=>false,'style'=>'width: 80%','class' => 'form-control pull-left')); ?>&nbsp;
							<button id="btn_color_edit_nn" type="button" class="btn btn-inverse btn-sm"><i class="fa fa-pencil"></i></button>
							<div class="separator"></div>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('search_stock_num', array(
							'type' => 'text',
							'placeholder' =>'Stock#',
							'label'=>false,'div'=>false,
							'class' => 'form-control'
							));
							?>
							<div class="separator"></div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div align="center" class="text-center">
								<i>Search Previous ID from a Worksheet (input ID) </i>
								<?php
									echo $this->Form->input('search_id', array(
									'div' => false,
									'type' => 'text',
									'class' => 'form-control',
									'style' =>'width: 120px',
									'label' => false,
									'placeholder' => 'ID'), array('div' => false));
								?>
								<i>or Cant find your lead? Use the (<a href="/daily_recaps/workload/activeTab:tab4" class="no-ajaxify" >Advanced Search</a>)</i>
							</div>
						</div>
					</div>


				</div>


				<div class="row">
					<div class="col-md-12">
						<div class="separator bottom"></div>
						<a href="javaScript:" style="display: none;" id="start_new_lead">Start New</a>
					</div>
				</div>
			</div>
			<div class="modal-footer center margin-none">

				<div class="row">
					<div class="col-md-2 col-sm-6 col-xs-6 text-left">
						<a href="#" class="btn btn-danger " id="close_modal" data-dismiss="modal">Cancel</a>
					</div>
					<div class="col-md-8">

						<div id='new_search_cnt_alert'  style='display: none; margin-top: 9px; font-size: 13px; color: #fff;padding: 3px; margin-bottom: 10px;'></div>

						<span class='label label-info label-inverse' id='new_search_cnt' style='display: none; margin-top: 9px; font-size: 13px;'></span>
					</div>
					<div class="col-md-2 col-sm-6 col-xs-6">
						<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify pull-right">Search / Start</button>
					</div>
				</div>

				<!-- shoppers start	  -->
				<div class='row' id='result_shoppers' style='display: none'></div>
				<!-- shoppers ends  -->


			</div>
			<?php echo $this->Form->end(); ?>


		</div>
	</div>

</div>
<!-- // Modal END -->








<script>

	function print_range_popup(report_type){
		var emp = $("#print_employee").val();
		var overdue_rng = $("#overdue_print_employee").val();
		//console.log(report_type, emp);
		window.open(
		  '/print_report/index/?report_type='+report_type+'&employee='+emp+'&range='+overdue_rng,
		  '_blank'
		);
	}


	function read_more_history_note_details(history_id){

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/history_comment",
			data: {'history_id':history_id},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "History Notes",
				});
			}
		});

	};


$script.ready('bundle', function() {


	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	$("#open_alert_details_view").click(function(event){

		event.preventDefault();
		alert( $(this).attr );

	})


	$("#lnk_add_new_lead").on("click", function() {
        $('#ContactSearchPhone, #ContactSearchEmail, #ContactSearchFirstName, #ContactSearchLastName,#ContactSearchVin,#ContactSearchUnitColor,#ContactSearchModel,#ContactSearchStockNum,#ContactSearchId').val("");
        $('#ContactSearchEstPaymentSearch,#ContactSearchPriceRange, #ContactSearchTradePriceRange, #ContactSearchFloorPlans,#ContactSearchLength,#ContactSearchWeight,#ContactSearchSleeps,#ContactSearchFuelType,#ContactSearchSalesStep,#ContactSearchStatus,#ContactSearchCategory,#ContactSearchType,#ContactSearchMake,#ContactSearchYear,#ContactSearchModelId,#ContactSearchCondition,#ContactSearchQuickLead,#ContactSearchUnitColor').val("");

		$("#result_shoppers").html("");
        $("#result_shoppers").hide();
		$("#result_service_search").html("");
        $("#result_service_search").hide();
       $("#new_search_cnt").html("");
       $("#new_search_cnt").hide();

		$("#new_search_cnt_alert").html("");
       $("#new_search_cnt_alert").hide();


    });

	function redirect_range_popup(report_type, stat_type, range){
		//"/contacts/leads_main/?quick_lead_search=today_event_count&stat_type=<?php echo $dealer_user; ?>&grp_ids=<?php echo $team_members_floor_text; ?>"
		//console.log(report_type,stat_type, range);
		location.href = '/contacts/leads_main/?quick_lead_search=popup_stat&search_source=left_menu&report_type='+report_type+'&range='+range+'&stat_type='+stat_type;
	}

	$(document).on("click",".btn_show_hide_history_otherlocation",function() {
        contact_id = $(this).attr('data-contact-id');
		//console.log(contact_id);
		if($("#history_otherloc_container_"+contact_id).html() == '&nbsp;'){
			$("#history_otherloc_"+contact_id).show();
			$.ajax({
				url: "/contacts_manage/load_history_other/"+contact_id,
				type: "get",
				cache: false,
				success: function(results){
					$("#history_otherloc_container_"+contact_id).html(results);
				}
			});
		}else{
			$("#history_otherloc_"+contact_id).show();
		}
    });




	$('#open_month_box, #clsoed_month_box, #sold_month_box, #pending_month_box, #dormant_48_box, #today_event_box, #overdue_event_box, #web_lead_box, #phone_lead_box, #showroom_lead_box, #mobile_lead_box').click(
	function(event) {
		event.preventDefault();
		var btn_clicked = $(this).attr('id');
		var stype = $(this).attr('date-stype');
		var range_type = $(this).attr('data-boxname');

		var employee_dropdown = <?php echo json_encode( $this->Form->select('print_employee', $employees,
			array('empty'=>'All Employee','class'=>'form-control','style'=>"display: inline-block;width: auto;")) );
			?>;

		var overdue_range_selection = '<select class="form-control" style="display: inline-block;width: auto;" id="overdue_print_employee"><option value="">Range</option><option value="today">Today</option><option value="this_week">This week</option><option value="this_month">This Month</option><option value="last_month">Last Month</option></select>';

		var print_html = "";
		if(btn_clicked == 'overdue_event_box' || btn_clicked == 'dormant_48_box' || btn_clicked == 'today_event_box'  || btn_clicked == 'pending_month_box' ){

			print_html = "<br><br><div  style=\"text-align: center\"> "+employee_dropdown+" "+overdue_range_selection+"	<button onclick=\"print_range_popup('"+btn_clicked+"')\"  class=\"btn btn-primary\"><i class=\"fa fa-print\"></i> Print</button> <div>";

		}

		//Open popup
		bootbox.dialog({
			message: "<div  style='text-align: center'><strong>Please select a range for: "+ range_type +"</strong><div>"+print_html,
			buttons: {

				btn_today: {
					label: "Today",
					className: "btn-inverse",
					callback: function() {
						redirect_range_popup(btn_clicked, stype, 'today');
					}
				},

				btn_this_week: {
					label: "This week",
					className: "btn-inverse",
					callback: function() {
						redirect_range_popup(btn_clicked, stype, 'this_week');
					}
				},
				btn_this_month: {
					label: "This Month",
					className: "btn-inverse",
					callback: function() {
						redirect_range_popup(btn_clicked, stype, 'this_month');
					}
				},
				btn_last_month: {
					label: "Last Month",
					className: "btn-inverse",
					callback: function() {
						redirect_range_popup(btn_clicked, stype, 'last_month');
					}
				},

			}
		}).find("div.modal-footer").css('text-align',"center");


		return true;
	});

	$('#open_month_link, #clsoed_month_link, #sold_month_link, #pending_month_link, #dormant_48_link, #today_event_link, #overdue_event_link').click( function(event) {
		event.stopPropagation();
		console.log('Clicked link');
		return true;
	});





	//Email Sync Modal
	$("#btn-email-sync-modal").click(function(){
		$.ajax({
			type: "GET",
			cache: false,
			url: "<?php echo $this->Html->url(array('controller'=>'user_emails', 'action'=>'sync_modal')); ?>",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Email Sync",
				});
			}
		});
	});

	function count_new_lead(){
			$("#new_search_cnt").show();
			$("#new_search_cnt").html("Loading...");
			var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';



			if(

				$("#ContactSearchEmail").val().trim() != '' ||
				$("#ContactSearchPhone").val().trim() != '' ||
				$("#ContactSearchFirstName").val().trim() != '' ||
				$("#ContactSearchLastName").val().trim() != '' ||

				$("#ContactSearchId").val().trim() != '' ||

				$("#ContactSearchSalesStep").val().trim() != '' ||
				$("#ContactSearchStatus").val().trim() != '' ||
				$("#ContactSearchQuickLead").val().trim() != '' ||
				$("#ContactSearchCategory").val().trim() != '' ||
				$("#ContactSearchType").val().trim() != '' ||
				$("#ContactSearchMake").val().trim() != '' ||
				$("#ContactSearchYear").val().trim() != '' ||
				$("#ContactSearchModel").val().trim() != '' ||
				$("#ContactSearchModelId").val().trim() != '' ||
				$("#ContactSearchCondition").val().trim() != '' ||

				$("#ContactSearchVin").val().trim() != ''  ||
				$("#ContactSearchStockNum").val().trim() != ''  ||

				$("#ContactSearchUnitColor").val().trim() != ''  ||

				$("#ContactSearchEstPaymentSearch").val().trim() != ''  ||

				<?php if($d_type != 'RV'){ ?>
				$("#ContactSearchPriceRange").val().trim() != '' ||
				$("#ContactSearchTradePriceRange").val().trim() != ''
				<?php } ?>

				<?php if($d_type == 'RV'){ ?>
				$("#ContactSearchPriceRange").val().trim() != '' ||
				$("#ContactSearchTradePriceRange").val().trim() != '' ||
				$("#ContactSearchFloorPlans").val().trim() != '' ||
				$("#ContactSearchLength").val().trim() != '' ||
				$("#ContactSearchWeight").val().trim() != '' ||
				$("#ContactSearchSleeps").val().trim() != '' ||
				$("#ContactSearchFuelType").val().trim() != ''
				<?php } ?>


			){



				$.ajax({
					type: "GET",
					cache: false,
					data: {'search_type': search_type,
					email: $("#ContactSearchEmail").val().trim(),
					phone: $("#ContactSearchPhone").val().trim(), first_name:$("#ContactSearchFirstName").val().trim(), last_name : $("#ContactSearchLastName").val().trim(),


					//vehicle_selection_type: $('#vehicle_selection_type_container_search input:radio:checked').val(),

					sales_step: $("#ContactSearchSalesStep").val().trim(),
					status: $("#ContactSearchStatus").val().trim(),
					search_quick_lead: $("#ContactSearchQuickLead").val().trim(),

					category: $("#ContactSearchCategory").val().trim(),
					type: $("#ContactSearchType").val().trim(),
					make: $("#ContactSearchMake").val().trim(),
					year: $("#ContactSearchYear").val().trim(),
					model: $("#ContactSearchModel").val().trim(),
					condition: $("#ContactSearchCondition").val().trim(),
					searchrange: $("#ContactSearchRange").val(),


					vehicle_type: $("#ContactSearchVehicleType").val(),
					vin: $("#ContactSearchVin").val().trim(),
					stock_num: $("#ContactSearchStockNum").val().trim(),
					unit_color: $("#ContactSearchUnitColor").val().trim(),

					est_payment_search: $("#ContactSearchEstPaymentSearch").val().trim(),





					id: $("#ContactSearchId").val().trim(),

					<?php if($d_type != 'RV'){ ?>
					price_range: $("#ContactSearchPriceRange").val().trim(),
					trade_price_range: $("#ContactSearchTradePriceRange").val().trim()
					<?php } ?>

					<?php if($d_type == 'RV'){ ?>
					price_range: $("#ContactSearchPriceRange").val().trim(),
					trade_price_range: $("#ContactSearchTradePriceRange").val().trim(),
					floor_plans: $("#ContactSearchFloorPlans").val().trim(),
					length: $("#ContactSearchLength").val().trim(),
					weight: $("#ContactSearchWeight").val().trim(),
					sleeps: $("#ContactSearchSleeps").val().trim(),
					fuel_type: $("#ContactSearchFuelType").val().trim()
					<?php } ?>

					},
					url:  $("#ContactLeadsForm2").attr('action'),
					dataType: "json",
					success: function(data){
						//console.log(data);
						$("#result_shoppers").html("");
						$("#result_shoppers").hide();
						if(data.result == '0'){
							$("#new_search_cnt").html("0 - Lead found, Submit will start a new lead");
							$("#new_search_cnt_alert").hide();
						}else{
							$("#new_search_cnt").html(data.result+" - Lead Found");

							//console.log(data.display_alert);
							if( data.display_alert == true ){
								$("#new_search_cnt_alert").show();
								console.log(data.show_alert);
								var alert_str = '<div class="bg-danger"> <i class="fa fa-exclamation-triangle"></i> Your search matches a current Open Lead.  Please review here </div> <div class="bg-inverse">';
									alert_str += data.show_alert.Contact.first_name+" "+data.show_alert.Contact.last_name+", ";
									alert_str += ' Mobile: '+data.show_alert.Contact.mobile+', Phone: '+data.show_alert.Contact.phone+', Work:'+data.show_alert.Contact.phone+', Email: '+data.show_alert.Contact.email;

									alert_str += '<br>'+data.show_alert.Contact.year+' '+data.show_alert.Contact.make+' '+data.show_alert.Contact.model+' '+data.show_alert.Contact.stock_num;


									alert_str += '<br> Sales Person: '+data.show_alert.Contact.sperson;
	  								alert_str += ', Status: '+data.show_alert.Contact.status;
	  								alert_str += ', Modified: '+data.show_alert.Contact.modified + "</div>";



								$("#new_search_cnt_alert").html( alert_str );

							}else{
								$("#new_search_cnt_alert").html("");
								$("#new_search_cnt_alert").hide();
							}


						}
						result_shoppers = '';
						if(data.shoppers &&  data.shoppers.length > 0){
							$("#result_shoppers").show();
							$("#result_shoppers").html("");
							$switch_btn = '';

							if(data.service_search.length > 0)
							{
								$switch_btn = '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="other-location-result" data-id="result_service_search" data-hide="other-location-result" data-text="'+data.shoppers.length+' Other Location Leads">'+data.service_search.length+' Service Leads Found</a>';
							}

							if(data.lightspeed_search.length > 0)
							{
								$switch_btn += '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="other-location-result" data-id="result_lightspeed_search" data-hide="other-location-result" data-text="'+data.shoppers.length+' Other Location Leads">'+data.lightspeed_search.length+' Lightspeed Contacts Found</a>';
							}

							var result_shoppers = $switch_btn +
							'<div class="col-md-12 text-left" id="other-location-result">  <br> <h4>Leads Found In Other Locations ('+data.shoppers.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Location</th> \
								<th>Name</th> \
								<th>Account</th> \
								<th>Contact</th> \
								<th>Vehicle</th> \
								<th>Sperson</th> \
								<th>Lead Status</th> \
								<th>Modified</th> \
							</tr> \
							</thead> \
							<tbody>	';

							$.each( data.shoppers, function( key, value ) {
  								//alert( value.Contact.id );
  								result_shoppers +=
  								'<tr class="gradeA">' +
	  								'<td>'+value.Contact.id+'<a class="btn btn-primary btn-xs no-ajaxify" href="/contacts/leads_input/?ref_other='+value.Contact.id+'">Create New</a>'+
				'<br><button type="button"    class="btn  btn-inverse btn-xs btn_show_hide_history_otherlocation" style="margin-top: 10px"   data-contact-id="'+value.Contact.id+'" > History</button>'+
	  								'</td>'+
	  								'<td>'+value.Contact.company+'</td>'+
	  								'<td>'+value.Contact.first_name+' '+value.Contact.last_name+'</td>'+
										'<td>'+value.ContactAccount.name+'</td>'+
	  								'<td>Mobile: '+value.Contact.mobile+'<br>Phone: '+value.Contact.phone+'<br>Work:'+value.Contact.phone+'<br>Email: '+value.Contact.email+'</td>'+
	  								'<td>'+value.Contact.year+' '+value.Contact.make+' '+value.Contact.model+' '+value.Contact.stock_num+'</td>'+
	  								'<td>'+value.Contact.sperson+'</td>'+
	  								'<td>'+value.Contact.status+'</td>'+
	  								'<td>'+value.Contact.modified+'</td>'+
  								'</tr>'+

  								'<tr id="history_otherloc_'+value.Contact.id+'" class="gradeA" style="display: none;" >'+
									'<td colspan="8">'+
										'<div class="row">'+
											'<div class="col-md-12" id = "history_otherloc_container_'+value.Contact.id+'">&nbsp;</div>'+
										'</div>'+
									'</td>'+
								'</tr>'


  								;
							});
							result_shoppers +=  '</tbody></table> </div>';
							$("#result_shoppers").html(result_shoppers);

						}
						if(data.service_search && data.service_search.length > 0)
						{
							$("#result_shoppers").show();
							if($("#result_shoppers").html() == '')
							{
								$("#result_shoppers").html('');
								if(data.lightspeed_search.length > 0)
								{
									$switch_btn = '<a href="javascript:void(0)" style="margin-top:5px;" class="btn btn-primary main-search-switch-btn pull-right" data-first="result_service_search" data-id="result_lightspeed_search" data-hide="result_service_search" data-text="'+data.service_search.length+' Service Leads Found">'+data.lightspeed_search.length+' Lightspeed Contacts Found</a>';
								$("#result_shoppers").html($switch_btn);
								}

							}
							var result_service =
							'<div class="col-md-12 text-left" id="result_service_search">  <br> <h4>Leads Found In Service App('+data.service_search.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Vehicle</th> \
								<th>Modified</th> \
							</tr> \
							</thead> \
							<tbody>	';

							$.each( data.service_search, function( key, value ) {
  								//alert( value.Contact.id );
  								result_service +=
  								'<tr class="gradeA">' +
	  								'<td>'+value.ServiceLead.id+'<br /><a class="btn btn-primary btn-xs no-ajaxify" href="/contacts/leads_input/?service_ref='+value.ServiceLead.id+'">Create New</a>'+

	  								'</td>'+


	  								'<td>'+value.ServiceLead.first_name+' '+value.ServiceLead.last_name+'</td>'+
	  								'<td>Mobile: '+value.ServiceLead.mobile+'<br>Phone: '+value.ServiceLead.phone+'<br>Work:'+value.ServiceLead.phone+'<br>Email: '+value.ServiceLead.email+'</td>'+
	  								'<td>'+value.ServiceLead.year+' '+value.ServiceLead.make+' '+value.ServiceLead.model+' '+value.ServiceLead.stock_num+'</td>'+


	  								'<td>'+value.ServiceLead.modified+'</td>'+
  								'</tr>';
							});
							result_service +=  '</tbody></table> </div>';
							$("#result_shoppers").append(result_service);

						}

			// Light Speed search

			if(data.lightspeed_search && data.lightspeed_search.length > 0)
						{
							$("#result_shoppers").show();
							if($("#result_shoppers").html()=='')
							{
								$("#result_shoppers").html('');
							}
							var result_lightspeed =
							'<div class="col-md-12 text-left" id="result_lightspeed_search">  <br> <h4>Contacts Found In Lightspeed('+data.lightspeed_search.length+')</h4> <table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> \
							<thead> \
							<tr class="bg-inverse" > \
								<th>#</th> \
								<th>Name</th> \
								<th>Contact</th> \
								<th>Modified</th> \
								<th>Source</th> \
							</tr> \
							</thead> \
							<tbody>	';

							$.each( data.lightspeed_search, function( key, value ) {
  								//alert( value.Contact.id );
  								result_lightspeed +=
  								'<tr class="gradeA">' +
	  								'<td>'+value.AdpCustomer.id+'<br /><a class="btn btn-primary btn-xs no-ajaxify" href="/contacts/leads_input/?lightspeed_ref='+value.AdpCustomer.id+'">Create New</a>'+

	  								'</td>'+
	  								'<td>'+value.AdpCustomer.first_name+' '+value.AdpCustomer.last_name+'</td>'+
	  								'<td>Mobile: '+value.AdpCustomer.mobile+'<br>Phone: '+value.AdpCustomer.phone+'<br>Work:'+value.AdpCustomer.phone+'<br>Email: '+value.AdpCustomer.email+'</td>'+
	  								'<td>'+value.AdpCustomer.modified+'</td>'+
									'<td>'+value.AdpCustomer.lead_source+'</td>'+
  								'</tr>';
							});
							result_lightspeed +=  '</tbody></table> </div>';
							$("#result_shoppers").append(result_lightspeed);

					}


					}
				});

			}else{

				$("#new_search_cnt").hide();
			}

	}


	// $('#ContactSearchPhone, #ContactSearchEmail, #ContactSearchFirstName, #ContactSearchLastName,#ContactSearchVin,#ContactSearchUnitColor,#ContactSearchModel,#ContactSearchStockNum,#ContactSearchId').delayKeyup(function(el){
	// 	    count_new_lead();
	// },1000);


	$('#ContactSearchPhone, #ContactSearchEmail, #ContactSearchFirstName, #ContactSearchLastName,#ContactSearchVin,#ContactSearchUnitColor,#ContactSearchModel,#ContactSearchStockNum,#ContactSearchId').bind('input keyup', function(){
	    var $this = $(this);
	    var delay = 1500; // 2 seconds delay after last input

	    var elementid = $(this).attr('id');
	    //console.log(elementid);
	    if( elementid == 'ContactSearchPhone' &&  $("#ContactSearchPhone").val().trim().length < 3 && $("#ContactSearchPhone").val().trim().length > 0    ){
	    	return true;
	    }
	    if( elementid == 'ContactSearchFirstName' &&  $("#ContactSearchFirstName").val().trim().length == 1   ){
	    	return true;
	    }
	    if( elementid == 'ContactSearchLastName' &&  $("#ContactSearchLastName").val().trim().length == 1 ){
	    	return true;
	    }
	    if( elementid == 'ContactSearchEmail' &&  $("#ContactSearchEmail").val().search('@') < 1 ){
	    	return true;
	    }



	    clearTimeout($this.data('timer'));
	    $this.data('timer', setTimeout(function(){
	        count_new_lead();
	    }, delay));



	});

	$('body').on('click','a.main-search-switch-btn',function(e){
			e.preventDefault();
			div_show= $(this).attr('data-id');
			div_hide= $(this).attr('data-hide');
			show_text= $(this).attr('data-text');
			hide_text = $(this).text();
			$('#'+div_show).detach().insertBefore('#'+$(this).attr('data-first'));
			 $(this).text(show_text);
			$(this).attr('data-id',div_hide);
			$(this).attr('data-hide',div_show);
			$(this).attr('data-text',hide_text);
			$(".main-search-switch-btn").attr('data-first',div_show)

		});


	$(document).on("change", '#ContactSearchEstPaymentSearch,  #ContactSearchVehicleType,#ContactSearchPriceRange, #ContactSearchTradePriceRange, #ContactSearchFloorPlans,#ContactSearchLength,#ContactSearchWeight,#ContactSearchSleeps,#ContactSearchFuelType,#ContactSearchSalesStep,#ContactSearchStatus,#ContactSearchCategory,#ContactSearchType,#ContactSearchMake,#ContactSearchYear,#ContactSearchModelId,#ContactSearchCondition,#ContactSearchQuickLead,#ContactSearchRange,#ContactSearchUnitColor', function(){
		setTimeout(function(){count_new_lead()},500);
	});

$('#ContactSearchUnitColor').live('change' ,function()
{
	setTimeout(function(){count_new_lead()},500);
});



	$("#btn_color_edit_nn").click(function(){
		$("#ContactSearchUnitColor").replaceWith('<input name="search_unit_color" class="form-control" type="text" value="" id="ContactSearchUnitColor">');
	});


	$("#ContactSearchPhone").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



		$("#btn_real_time_stat").click(function(){
			$.ajax({
				type: "GET",
				cache: false,
				url: "/master_reports/realtime_report_all/",
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "<b>Real Time Stats</b>",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});
		});



		$("#ContactSearchBroad").checkbox('check');
		$(".chk_lead_src_type").click(function(event){
			$(".chk_lead_src_type").checkbox('uncheck');
			$(this).checkbox('check');
			count_new_lead();
		});

		<?php if($through_pwd_change_notification == true){ ?>


			$.ajax({
				type: "GET",
				cache: false,
				url: "/users/edit_account/",
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Edit User",
					});
				}
			});

		<?php } ?>



	$('#modal-2').on('shown.bs.modal', function () {

		//Make sure the modal and backdrop are siblings (changes the DOM)
  		$(this).before($('.modal-backdrop'));
  		//Make sure the z-index is higher than the backdrop
  		$(this).css("z-index", parseInt($('.modal-backdrop').css('z-index')) + 1);

		<?php if($start_search == 'Phone'){ ?>
    	$('#ContactSearchPhone').focus();
    	<?php }else{ ?>
    		$('#ContactSearchFirstName').focus();
    	<?php } ?>
	})

	$("#btn-email-sync-modal").hide();
	$("#last_10_inbox").click(function(event){
		if( $(this).attr('current_state') == 'last_10'){
			$("#switch_inbox_container").show();
			$("#last_10_Leads_container").hide();
			$(this).attr('current_state', 'inbox');
			$(this).html('Last 10 Leads&nbsp;<i class="fa fa-group"></i>');
			$("#btn-email-sync-modal").show();
		}else if( $(this).attr('current_state') == 'inbox'){
			$("#switch_inbox_container").hide();
			$("#last_10_Leads_container").show();
			$(this).attr('current_state', 'last_10');
			$(this).html('Switch to Inbox&nbsp;<i class="fa fa-envelope-o"></i>');
			$("#btn-email-sync-modal").hide();

		}
	});


    /* Dealership Day Multi-select */
    $(document).ready(function() {
        <?php
            $ary_output = implode(',', array_map(
                function ($v, $k) {
                    return sprintf("%s", $k);
                    //return sprintf("%s='%s'", $k, $v);
                },
                $stat_options,
                array_keys($stat_options)
            ));
        ?>
        var all_options = "<?php echo $ary_output; ?>";
        var all_prevselected = "<?php echo $selected_stats; ?>";
        if(all_options.split(",").length > 1){
            $('#stat_options').multiselect({
                allSelectedText: 'Dealership Day',
        	    includeSelectAllOption: true,
                selectAllName: 'Dealer_day',
                nonSelectedText: 'Dealer Day',
                enableFiltering: true,
                //onChange: _desel(option),
                onChange: function(option,checked,select) {
                    var val = $(option).val();
                    _desel(val);
                },
                onDropdownHidden: function(event) {
                    $("#stat_options").trigger("changeEvent");
                }
            });
        } else {
            $('#stat_options').ready(function(){
                $('#stat_options').multiselect('disable');
            });
        }
        function _desel(val){
            if(val.indexOf('team') != -1){
                $('#stat_options').multiselect('deselectAll',false).multiselect('select',val);
            } else {
                //console.log(all_options);
                $opt_ary = all_options.split(',');
                $opt_ary.map(function(val,idx){
                    if(val.indexOf('team') >= 0){
                        $('#stat_options').multiselect('deselect',val);
                    }
                });
            }

        }

        <?php
            if($selected_stats == 'Dealer_day'){ ?>
                $('#stat_options').multiselect('selectAll',false).multiselect('refresh');
        <?php } else { ?>
            var options = [
                <?php
                $sel_ary = explode(",",$selected_stats);
                foreach($stat_options as $key=>$value){
                    $selected = (in_array($key,$sel_ary)) ? 'true' : 'false';
                    $out = '{"label":"'.$value.'", "title":"'.$value.'", "value":"'.$key.'","selected":'.$selected.'},';
                    echo $out;
                }
                ?>
                //{label: 'Option 1', title: 'Option 1', value: '1', selected: true}
            ];
            $('#stat_options').multiselect('dataprovider',options).multiselect('refresh');
        <?php } ?>

    });

	$("#stat_options").on('changeEvent',function(event){
		if($(this).val() != ''){
            var all_options = "<?php echo $ary_output; ?>";
            var all_prevselected = "<?php echo $selected_stats; ?>";
            var all_selected = (String($(this).val()) === all_options || String($(this).val()) === 'null') ? 'Dealer_day' : $(this).val();
            //console.log("options = "+all_options);console.log("prev sel = "+all_selected);console.log("sel = "+all_prevselected);
            if(all_selected != all_prevselected){
                location.href = "/dashboards/main/?stat_user="+all_selected;
                //console.log(all_selected);
            } else {
                return false;
            }
		}
	});


	$("#sales_step").change(function(event){
		if($(this).val() != ''){
			location.href = "/contacts/leads_main/?quick_lead_search="+$(this).val();
		}
	});

	$("#status").change(function(event){
		if($(this).val() != ''){
			location.href = "/contacts/leads_main/?quick_lead_search="+$(this).val();
		}
	});

	$("#search_all").change(function(event){
		if($(this).val() != ''){
			location.href = "/contacts/leads_main/?quick_lead_search="+$(this).val();
		}
	});

	$("#type").change(function(event){
		if($(this).val() != ''){
			location.href = "/contacts/leads_main/?quick_lead_search="+$(this).val();
		}
	});
	$("#stats_monthMonth").change(function(event){
		location.href = "/dashboards/main/"+$(this).val()+"/"+$('#stats_year').val();
	});
	$("#stats_year").change(function(event){
		location.href = "/dashboards/main/"+$("#stats_monthMonth").val()+"/"+$('#stats_year').val();
	});

	$("#stats_day_month").change(function(event){
		location.href = "/dashboards/main/?stats_day_month="+$(this).val();
	});


	//advance search
	$("#submit_advance_search_filter").click(function(event){
		/*
		if( $("#ContactSearchMobile").val().trim() != '' && !validatePhone('ContactSearchMobile') ){
			alert('Please enter a valid cell number');
			return false;
		}
		if( $("#ContactSearchPhone").val().trim() != '' && !validatePhone('ContactSearchPhone') ){
			alert('Please enter a valid phone number');
			return false;
		}
		if( $("#ContactSearchFirstName").val().trim() != '' && validatePhone('ContactSearchFirstName') ){
			alert('Please enter phone number in cell/mobile field');
			return false;
		}
		if( $("#ContactSearchLastName").val().trim() != '' && validatePhone('ContactSearchLastName') ){
			alert('Please enter phone number in cell/mobile field');
			return false;
		}
		*/
		if(
			/*	$("#ContactSearchQuick").val().trim() != '' || */
				 $("#ContactSearchEmail").val().trim().search('@') >= 0 ||
				/* $("#ContactSearchMobile").val().trim() != '' ||*/
				 $("#ContactSearchPhone").val().trim().length >= 3 ||
				 $("#ContactSearchFirstName").val().trim().length > 1 ||
				 $("#ContactSearchLastName").val().trim().length > 1 ||

				 $("#ContactSearchId").val().trim() != '' ||

				 $("#ContactSearchSalesStep").val().trim() != '' ||
				 $("#ContactSearchStatus").val().trim() != '' ||
				 $("#ContactSearchQuickLead").val().trim() != '' ||


				// $("#ContactSearchVehicle").val().trim() != '' ||

				 $("#ContactSearchCategory").val().trim() != '' ||
				 $("#ContactSearchType").val().trim() != '' ||
				 $("#ContactSearchMake").val().trim() != '' ||
				 $("#ContactSearchYear").val().trim() != '' ||
				 $("#ContactSearchModel").val().trim() != '' ||
				 $("#ContactSearchModelId").val().trim() != '' ||
				 $("#ContactSearchCondition").val().trim() != '' ||

				 $("#ContactSearchVin").val().trim() != ''  ||
				$("#ContactSearchStockNum").val().trim() != ''  ||
				$("#ContactSearchUnitColor").val().trim() != ''  ||

				$("#ContactSearchEstPaymentSearch").val().trim() != ''  ||


				 <?php if($d_type != 'RV'){ ?>
				 $("#ContactSearchPriceRange").val().trim() != '' ||
				 $("#ContactSearchTradePriceRange").val().trim() != ''
				 <?php } ?>

				 <?php if($d_type == 'RV'){ ?>
				 $("#ContactSearchPriceRange").val().trim() != '' ||
				 $("#ContactSearchTradePriceRange").val().trim() != '' ||
				 $("#ContactSearchFloorPlans").val().trim() != '' ||
				 $("#ContactSearchLength").val().trim() != '' ||
				 $("#ContactSearchWeight").val().trim() != '' ||
				 $("#ContactSearchSleeps").val().trim() != '' ||
				 $("#ContactSearchFuelType").val().trim() != ''
				<?php } ?>


				  ){

			var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';

			$.ajax({
				type: "GET",
				cache: false,
				data: {'search_type': search_type,

				/*	quick: $("#ContactSearchQuick").val().trim(), */

				email: $("#ContactSearchEmail").val().trim(),
				//mobile: $("#ContactSearchMobile").val().trim(),
				phone: $("#ContactSearchPhone").val().trim(), first_name:$("#ContactSearchFirstName").val().trim(), last_name : $("#ContactSearchLastName").val().trim(),

				sales_step: $("#ContactSearchSalesStep").val().trim(),
				status: $("#ContactSearchStatus").val().trim(),
				search_quick_lead: $("#ContactSearchQuickLead").val().trim(),

				//vehicle_selection_type: $('#vehicle_selection_type_container_search input:radio:checked').val(),

				//search_vehicle: $("#ContactSearchVehicle").val().trim(),

				category: $("#ContactSearchCategory").val().trim(),
				type: $("#ContactSearchType").val().trim(),
				make: $("#ContactSearchMake").val().trim(),
				year: $("#ContactSearchYear").val().trim(),
				model: $("#ContactSearchModel").val().trim(),
				condition: $("#ContactSearchCondition").val().trim(),
				searchrange: $("#ContactSearchRange").val(),

				est_payment_search: $("#ContactSearchEstPaymentSearch").val(),


				vehicle_type: $("#ContactSearchVehicleType").val(),
				vin: $("#ContactSearchVin").val().trim(),
				stock_num: $("#ContactSearchStockNum").val().trim(),
				unit_color: $("#ContactSearchUnitColor").val().trim(),


				id: $("#ContactSearchId").val().trim(),

					<?php if($d_type != 'RV'){ ?>
					price_range: $("#ContactSearchPriceRange").val().trim(),
					trade_price_range: $("#ContactSearchTradePriceRange").val().trim()
					<?php } ?>

					<?php if($d_type == 'RV'){ ?>
					price_range: $("#ContactSearchPriceRange").val().trim(),
					trade_price_range: $("#ContactSearchTradePriceRange").val().trim(),
					floor_plans: $("#ContactSearchFloorPlans").val().trim(),
					length: $("#ContactSearchLength").val().trim(),
					weight: $("#ContactSearchWeight").val().trim(),
					sleeps: $("#ContactSearchSleeps").val().trim(),
					fuel_type: $("#ContactSearchFuelType").val().trim()
					<?php } ?>
				},
				dataType : 'json',
				url:  $(this).closest('form').attr('action'),

				success: function(data){
					//data.result = 0;
					if( data.result == '0'){


						if(
							$("#ContactSearchEmail").val().trim() == '' &&
							$("#ContactSearchPhone").val().trim() == '' &&
					 		$("#ContactSearchFirstName").val().trim() == '' &&
					 		$("#ContactSearchLastName").val().trim() == ''
					 	){
							$("#ContactSearchPhone").focus();
							alert('NO LEAD FOUND - \nPlease fill in at least one item below! \nAll Phone, Email, First Name or Last Name.');

					 	}else{

							location.href = "/contacts/leads_input/?search_phone="+escape($("#ContactSearchPhone").val())+"&search_first_name="+escape($("#ContactSearchFirstName").val())+"&search_last_name="+escape($("#ContactSearchLastName").val())
							+"&search_email="+escape($("#ContactSearchEmail").val())

							+"&price_range="+escape($("#ContactSearchPriceRange").val())
							+"&trade_price_range="+escape($("#ContactSearchTradePriceRange").val())
							+"&floor_plans="+escape($("#ContactSearchFloorPlans").val())
							+"&length="+escape($("#ContactSearchLength").val())
							+"&weight="+escape($("#ContactSearchWeight").val())
							+"&sleeps="+escape($("#ContactSearchSleeps").val())
							+"&fuel_type="+escape($("#ContactSearchFuelType").val())
							+"&vehicle_type="+escape($("#ContactSearchVehicleType").val())
							+"&type="+escape($("#ContactSearchCategory").val())
							+"&category="+escape($("#ContactSearchType").val())
							+"&make="+escape($("#ContactSearchMake").val())
							+"&year="+escape($("#ContactSearchYear").val())
							+"&model_id="+escape($("#ContactSearchModelId").val())
							+"&model="+escape($("#ContactSearchModel").val())
							+"&condition="+escape($("#ContactSearchCondition").val())
							+"&mainsearch=0";

					 	}








					}else{

						src_str = "";
						/*
						if( $("#ContactSearchQuick").val().trim() != ''){
							src_str += "quick: "+$("#ContactSearchQuick").val()+", ";
						}
						*/
						/*
						if( $("#ContactSearchMobile").val().trim() != ''){
							src_str += "mobile: "+$("#ContactSearchMobile").val()+", ";
						}
						*/
						if( $("#ContactSearchPhone").val().trim() != ''){
							src_str += "phone: "+$("#ContactSearchPhone").val()+", ";
						}
						if( $("#ContactSearchFirstName").val().trim() != ''){
							src_str += "first_name: "+$("#ContactSearchFirstName").val()+", ";
						}
						if( $("#ContactSearchLastName").val().trim() != ''){
							src_str += "last_name: "+$("#ContactSearchLastName").val()+", ";
						}

						if( $("#ContactSearchEmail").val().trim() != ''){
							src_str += "email: "+$("#ContactSearchEmail").val()+", ";
						}
						if( $("#ContactSearchId").val().trim() != ''){
							src_str += "id: "+$("#ContactSearchId").val()+", ";
						}


						if( $("#ContactSearchEstPaymentSearch").val().trim() != ''){
							src_str += "est_payment_search: "+$("#ContactSearchEstPaymentSearch").val()+", ";
						}


						if( $("#ContactSearchSalesStep").val().trim() != ''){
							src_str += "sales_step: "+$("#ContactSearchSalesStep").val()+", ";
						}
						if( $("#ContactSearchStatus").val().trim() != ''){
							src_str += "status: "+$("#ContactSearchStatus").val()+", ";
						}
						if( $("#ContactSearchQuickLead").val().trim() != ''){
							src_str += "search_quick_lead: "+$("#ContactSearchQuickLead").val()+", ";
						}
						/*
						if( $("#ContactSearchVehicle").val().trim() != ''){
							src_str += "search_vehicle: "+$("#ContactSearchVehicle").val()+", ";
						}
						*/

						if( $("#ContactSearchCategory").val().trim() != ''){
							src_str += "category: "+$("#ContactSearchCategory").val()+", ";
						}
						if( $("#ContactSearchType").val().trim() != ''){
							src_str += "type: "+$("#ContactSearchType").val()+", ";
						}
						if( $("#ContactSearchMake").val().trim() != ''){
							src_str += "make: "+$("#ContactSearchMake").val()+", ";
						}
						if( $("#ContactSearchYear").val().trim() != ''){
							src_str += "year: "+$("#ContactSearchYear").val()+", ";
						}
						if( $("#ContactSearchModel").val().trim() != ''){
							src_str += "model: "+$("#ContactSearchModel").val()+", ";
						}
						if( $("#ContactSearchModelId").val().trim() != ''){
							src_str += "model_id: "+$("#ContactSearchModelId").val()+", ";
						}
						if( $("#ContactSearchCondition").val().trim() != ''){
							src_str += "condition: "+$("#ContactSearchCondition").val()+", ";
						}

						src_str += "searchrange: "+$("#ContactSearchRange").val()+", ";


						src_str += "vehicle_type: "+$("#ContactSearchVehicleType").val()+", ";

						if( $("#ContactSearchVin").val().trim() != ''){
							src_str += "vin: "+$("#ContactSearchVin").val()+", ";
						}
						if( $("#ContactSearchStockNum").val().trim() != ''){
							src_str += "stock_num: "+$("#ContactSearchStockNum").val()+", ";
						}
						if( $("#ContactSearchUnitColor").val().trim() != ''){
							src_str += "unit_color: "+$("#ContactSearchUnitColor").val()+", ";
						}



						/*
						price_range: $("#ContactSearchPriceRange").val().trim(),
						floor_plans: $("#ContactSearchFloorPlans").val().trim(),
						length: $("#ContactSearchLength").val().trim(),
						weight: $("#ContactSearchWeight").val().trim(),
						sleeps: $("#ContactSearchSleeps").val().trim(),
						fuel_type: $("#ContactSearchFuelType").val().trim()
					*/

						<?php if($d_type != 'RV'){ ?>

						if( $("#ContactSearchPriceRange").val().trim() != ''){
							src_str += "price_range: "+$("#ContactSearchPriceRange").val()+", ";
						}
						if( $("#ContactSearchTradePriceRange").val().trim() != ''){
							src_str += "trade_price_range: "+ $("#ContactSearchTradePriceRange").val()  +", ";
						}

						<?php } ?>
						<?php if($d_type == 'RV'){ ?>
						if( $("#ContactSearchPriceRange").val().trim() != ''){
							src_str += "price_range: "+$("#ContactSearchPriceRange").val()+", ";
						}
						if( $("#ContactSearchTradePriceRange").val().trim() != ''){
							src_str += "trade_price_range: "+ $("#ContactSearchTradePriceRange").val()  +", ";
						}

						if( $("#ContactSearchFloorPlans").val().trim() != ''){
							src_str += "floor_plans: "+$("#ContactSearchFloorPlans").val()+", ";
						}
						if( $("#ContactSearchLength").val().trim() != ''){
							src_str += "length: "+$("#ContactSearchLength").val()+", ";
						}
						if( $("#ContactSearchWeight").val().trim() != ''){
							src_str += "weight: "+$("#ContactSearchWeight").val()+", ";
						}
						if( $("#ContactSearchSleeps").val().trim() != ''){
							src_str += "sleeps: "+$("#ContactSearchSleeps").val()+", ";
						}
						if( $("#ContactSearchFuelType").val().trim() != ''){
							src_str += "fuel_type: "+$("#ContactSearchFuelType").val()+", ";
						}
						<?php } ?>



						src_str += "search_type: "+search_type;
						// console.log(src_str);
						location.href = "/contacts/leads_main/?newleadsearch="+encodeURIComponent(src_str);
					}

				}
			});


		}else{
			console.log( $("#ContactSearchTradePriceRange").val() );
			alert("Narrow your search");
		}

		return false;
	});


	function validatePhone(txtPhone) {
		var a = document.getElementById(txtPhone).value;
		var filter = /^(\d+-?)+\d+$/;
		if (filter.test(a)) {
			return true;
		}
		else {
			return false;
		}
	}





	$.inventory({
		edit_mode: "yes",
		input_type: "#ContactSearchCategory",
		input_category:"#ContactSearchType",
		input_make:"#ContactSearchMake",
		btn_edit_make:'#btn_make_edit_trade',

		input_year:"#ContactSearchYear",
		input_yearedit:"#btn_year_edit",

	 	input_model_id:"#ContactSearchModelId",
		input_model:"#ContactSearchModel",
		btn_edit_model:"#btn_models_edit",

		input_unitColor_id:"#ContactSearchUnitColor",
		input_unitColor_fieldname:"search_unit_color",
		input_edit_make_id : 'ContactSearchMake',
		input_edit_make_fieldname : 'search_make',
		//vehicle_selection_type_container : '#vehicle_selection_type_container_search'


	});


	$("span.Contact_read_more").on('click',function(e){
		e.preventDefault();
		$lead_id= $(this).attr('data-id');
		$("#Contact_read_more_"+$lead_id).slideToggle();

		});



















	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});



		// $("#btn_daily_recap").click(function(){
		// 	$.ajax({
		// 		type: "GET",
		// 		cache: false,
		// 		url: "/reports/dailyrecap_reports/null/null/null/no",
		// 		success: function(data){
		// 			bootbox.dialog({
		// 				message: data,
		// 				title: "<b>Daily Recap</b>",
		// 			}).find("div.modal-dialog").addClass("largeWidth");
		// 		}
		// 	});
		// });

		// $("#btn_wokload").click(function(){
		// 	window.location.href="/daily_recaps/workload";
		// });


	$(document).on('click', '.read_more_contact_note', function(event) {
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "History Notes",
				});
			}
		});

		return false;



	});






</script>
<script>
	//Popup for 'Instock Search' button
	$(function() {
		$("#btn_search_stock_vin").click(function(){

			$.ajax({
				type: "GET",
				cache: false,
				data: {v_type: $(this).attr("v_type") },
				url: "/contact_instock/instock_search/?search_type=vin",
				success: function(data){

					bootbox.dialog({
						message: data,
						backdrop: true,
						title: "In Stock Search",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});
		});
	});

</script>
