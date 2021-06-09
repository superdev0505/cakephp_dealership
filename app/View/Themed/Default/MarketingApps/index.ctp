</br></br>
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>
<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<div class="innerLR">
</br>
	<div class="row">
		<div class="col-md-4"><b>Month:</b>&nbsp; <?php echo $this->Form->month('stats_month', array('empty'=>false, 'value'=>$stats_month)); ?></br></br></div>
	</div>

	<div class="widget">

		<div class="row margin-none row-merge">
			<div class="col-md-7">

				<div class="row margin-none row-merge">
					
					<div class="col-md-3">
						<div class="innerAll text-center text-primary"> 
							<a href="/eblasts/statistics">
							<i class="fa fa-dashboard fa-2x"></i><span class="text-large strong"><?php echo $open_lead_count; ?></span><br/>
							<u>Show ALL Statistics</u>
							</a> 
						</div>

					</div>

					<div class="col-md-3">
						<div class="innerAll text-center text-primary">
							<!-- <a href="javascript:void(0);" onclick="MonthlyStatisticsDetails('<?php echo $stats_month;?>','unsubscribed')"> -->
								<span class="text-medium strong" style = "font-size: 33px !important;"> <?php echo $total_opened; ?> (<?php echo $open_percent; ?>%)</span><br/>
								Open % (30 Days)
							<!-- </a>  -->
						</div>
					</div>

					<div class="col-md-3">
						<div class="innerAll text-center text-primary">
							<!-- <a href="javascript:void(0);" onclick="MonthlyStatisticsDetails('<?php echo $stats_month;?>','unsubscribed')"> -->
								<span class="text-large strong"><?php echo $total_Opt_Out_Month; ?></span><br/>
								Opt-Out (Month)
							<!-- </a>  -->
						</div>
					</div>
					<div class="col-md-3">
						<div class="innerAll text-center text-primary">
							<!-- <a href="javascript:void(0);" onclick="MonthlyStatisticsDetails('<?php echo $stats_month;?>','spam')"> -->
								<span class="text-large strong"><?php echo $total_Spam_Month; ?></span><br/>
								Spam (Month)
							<!-- </a> -->
						</div>
					</div>
					

				</div>

			</div>
			<div class="col-md-5">

				<div class="row margin-none row-merge">	

					<div class="col-md-4">
						<div class="innerAll text-center text-primary">
							<!-- <a href="javascript:void(0);" onclick="MonthlyStatisticsDetails('<?php echo $stats_month;?>','bounced')"> -->
								<span class="text-large strong"><?php echo $total_Bounce_Month; ?></span><br/>
								Bounce (Month)
							<!-- </a> -->
						</div>
					</div>


					<div class="col-md-4">
						<div class="innerAll text-center text-primary">
							<a href="/eblasts/eblasts_list/M/">
								<span class="text-large strong"><?php echo $eblast_sent_count; ?></span><br/>
								<u>Eblasts</u>
							</a>
						</div>
					</div>
					<div class="col-md-4">
						<div class="innerAll text-center text-primary">
							<a href="/eblasts/eblasts_list/N/">
								<span class="text-large strong"><?php echo $newsletter_sent_count; ?></span><br/>
								<u>Newsletter</u>
							</a>
						</div>
					</div>

				</div>			


			</div>
		</div>


	
		
			
		
		
		
		
		
		
		
		
	</div>


	<!-- Row -->							
	<div class="row"></div>

		<!-- Col -->
		<div class="col-md-9">

			<!-- Start Featured -->
			<div class="row">
				<div class="col-sm-3">
					<div class="widget">
						<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'eblasts_list',"M")); ?>" class="display-block bg-info innerAll text-center text-white"><i class="icon-envelope-3 fa-5x"></i></a>
						<div class="text-center innerAll">
							<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'eblasts_list',"M")); ?>" class="strong  "><u>Eblast</u></a>
				</br></br>
<div align="left">This is used for one time or scheduled Eblast to all searchable customers. Some examples are: Special Events, New Products, or even Birthdays for the month. Can be used for F/I updates and warranty reminders.</div>
<div class="clearfix"></div>
							</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'eblasts_list','N')); ?>" class="display-block bg-success innerAll text-center text-white"><i class="icon-newspaper fa-5x"></i></a>
						<div class="text-center innerAll">
							<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'eblasts_list','N')); ?>" class="strong  "><u>Newsletter</u></a>
							</br></br>
<div align="left">This is used for 30 day scheduled Newsletters to all searchable customers. Some Examples are: Monthly, Bi-Monthly Group Updates, and Special Group Newsletters. Keep customer in sync with your dealership!</div>
<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget">
						<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'setup_autoresponder')); ?>" class="display-block bg-warning innerAll text-center text-white"><i class="icon-paper-documents fa-5x"></i></a>
						<div class="text-center innerAll">
							<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'setup_autoresponder')); ?>" class="strong  "><u>Autoresponders</u></a>
							</br></br>
<div align="left">Autoresponders are one-to-one emails that improve Customer Deal visits. Send helpful items or coupons after a recent purchase or visit, wish someone a happy birthday with a coupon, or welcome a new customer.</div>
<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="widget">
						<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'templates_list')); ?>" class="display-block bg-purple border-bottom innerAll text-center text-white"><i class="icon-folder-check fa-5x"></i></a>
						<div class="text-center innerAll">
							<a href="<?php echo $this->Html->url(array('controller'=>'eblasts','action'=>'templates_list')); ?>" class="strong  "><u>Templates</u></a>
						</br></br>
<div align="left">This section contains ready-made HTML templates and a build-your-own template editor. Your dealership can offer a quick and easily- edited solution for an eye-catching email message to your customers.</div>
<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Col -->
		<div class="col-md-3">
		<div class="widget">
				<div class="innerAll border-bottom">
					<a href="/user_emails/inbox/" class="btn btn-info btn-xs pull-right">Inbox&nbsp;<i class="fa fa-envelope-o"></i></a>
					<h4 class="margin-none padding-none"><i class="fa fa-envelope-o"></i>&nbsp;Emails</strong></h4>
				</div>
				
				<div style="height: 290px; overflow: auto">
					<?php foreach($emails as $email){ ?>
					<div class="media bg-white innerAll border-bottom margin-none">
						<a href="/user_emails/inbox/" class="pull-left"><img src="http://dpcrm.s3.amazonaws.com/assets/images/email_icon_square.png" height="60px" width="60px" alt="Image" /></a>
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
							<p><?php //echo $this->Text->truncate($email['UserEmail']['message'],150,array('html'=>false)); ?></p>
						</div>
					</div>
					<?php } ?>
				</div>
				
				
			</div>
</div>
		<!-- // Col END -->
	</div>
</div>
		<!-- // Content END -->

</div>






<script>

$script.ready('bundle', function() {

	$("#stats_monthMonth").change(function(event){
		location.href = "/eblasts/index/"+$(this).val();
	});
	
});


function MonthlyStatisticsDetails(month,type){
	if(month!='' && type!=''){
		var Title = "Month ("+type.toUpperCase()+")";
		$.ajax({
			type: "GET",
			cache: false,
			url: "/eblasts/StatisticsDetails/0/"+month+"/"+type,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "<b>Statistics Details on - "+Title+" </b>",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
	}
}
</script>





