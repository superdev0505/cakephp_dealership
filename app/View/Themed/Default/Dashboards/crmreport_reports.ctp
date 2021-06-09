<br />
<br />
<br /><br />
<style>

.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
    
}

#ContactSearchPhone, .today_count {
    -webkit-transition: text-shadow 1s linear;
    -moz-transition: text-shadow 1s linear;
    -ms-transition: text-shadow 1s linear;
    -o-transition: text-shadow 1s linear;
    transition: text-shadow 1s linear;
	border-color: #6EA2DE;
    box-shadow: 0px 0px 10px #6EA2DE !important;
	width: 95%;
	/* margin-left: 10px; */
}
#ContactSearchQuick:hover,
#ContactSearchQuick.glow {
    text-shadow: 0 0 10px red;
}
#submit_advance_search_filter {
	margin-left: 10px;
}

.bg-danger{
	background: #CC3A3A;
}

.statbox{
	padding-top: 7px;
	padding-bottom: 7px;
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
    width: 1300px;
}
</style>
<?php
function calculate_percent($val1, $val2){
		if($val2 == 0 && $val1 == 0)
			return 0;
		else if($val1 == 0 &&  $val2 == 0){
			return 0;
		}
		else if($val1 == 0 &&  $val2 != 0){
			return $val2 * 100;
		}
		else{
			return round( ($val2/$val1) * 100 ) ;
		}
	}
function calculate_total($deals_total,$cust_step_map){	
$all_leads = 0;
foreach($cust_step_map as $key => $val){
$all_leads += $deals_total[$key];
}
return $all_leads;
}

$all_total=calculate_total($deal_registers,$custom_step_map);
$showroom_total=calculate_total($deal_registers_showroom,$custom_step_map);
$web_total=calculate_total($deal_registers_web,$custom_step_map);
$phone_total=calculate_total($deal_registers_phone,$custom_step_map);
$mobile_total=calculate_total($deal_registers_mobile,$custom_step_map);

//dealership lead step graph string
$json_array=array(array($deal_registers['1'],1),array($deal_registers['3'],2),array($deal_registers['4'],3),array($deal_registers['5'],4),array($deal_registers['6'],5),array($deal_registers['7'],6),array($deal_registers['8'],7),array($deal_registers['9'],8),array($deal_registers['10'],9),array(0,10));
$label_array=array(array(0,'Pending'),array(1,'Pending'),array(2,'Greet'),array(3,'Identify'),array(4,'Present'),array(5,'Sit Down'),array(6,'Write Up'),array(7,'Close'),array(8,'F/I'),array(9,'Sold'),array(10,'Sold'));

/*$json_array=array(array($deal_registers['Pending'],1),array($deal_registers['Greet'],2),array($deal_registers['Identify'],3),array($deal_registers['Present'],4),array($deal_registers['Sit_Down'],5),array($deal_registers['Write_Up'],6),array($deal_registers['Close'],7),array($deal_registers['Finance'],8),array($deal_registers['Sold'],9));
$label_array=array(array(1,'Pending'),array(2,'Greet'),array(3,'Identify'),array(4,'Present'),array(5,'Sit Down'),array(6,'Write Up'),array(7,'Close'),array(8,'F/I'),array(9,'Sold'));*/
$label_string=json_encode($label_array);
$rawData= json_encode($json_array);
//end 
//Dealership Lead types graph string

$leadTypes_count=array(array(0,$showroom_total),array(1,$web_total),array(2,$phone_total),array(3,$mobile_total));

$leadTypes_label=array(array(0,'Showroom'),array(1,'Web'),array(2,'Phone'),array(3,'Mobile'));
$leadTypes_label=json_encode($leadTypes_label);
$leadTypes_count=json_encode($leadTypes_count);
/////

// Lead open Closed and Dormant

$leadStatus_count=array(array(0,$open_lead_count),array(1,$closed_lead_count),array(2,$dormant_lead_count));

$leadStatus_label=array(array(0,'Open'),array(1,'Closed'),array(2,'Dormant'));
$leadStatus_label=json_encode($leadStatus_label);
$leadStatus_count=json_encode($leadStatus_count);
/*?><div class="innerLR">
                <h2 class="margin-none">Analytics &nbsp;<i class="fa fa-fw fa-pencil text-muted"></i>
                </h2>
                <?php echo $this->element('sales_pipeline_report'); ?>
            </div><?php */?><div class="innerLR">
                <h2 class="margin-none">Analytics &nbsp;<i class="fa fa-fw fa-pencil text-muted"></i>
                
            <?php 
	if($dealer_info['DealerName']['dealer_group']) {
		if(is_null($group))
		{
			$group=AuthComponent::user('dealer_id');
		}
		$dealer_names['all_builds']='All Group';
	echo $this->Form->input('dealer_group'.$label,array('class'=>'form-control pull-right','id'=>'CRMLeadGroupStat','options'=>$dealer_names,'value'=>$group,'label'=>false,'div'=>false,'style'=>'max-width:25%!important;')); 
	unset($dealer_names['all_builds']);
	}?>
    
    <button class='btn btn-primary pull-right' id="btn_daily_recap" style="margin-right:5px;"><i class="fa fa-fw icon-graph-up-1"></i>Recap</button>
   <div class="col-md-3 pull-right">
               <div id="main-report-range" class="bg-white"  style=" cursor: pointer; padding: 1px 13px; border: 1px solid #ccc; 
                margin-bottom: 4px;">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span><?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></span> 
                                                <b class="caret"></b>   
                                            </div></div> 
    
                </h2>
                <br />
                <div class="row">
                    <div class="col-md-7" style="width:62%;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget innerAll text-center">
                                    <h3 class="innerT">Sold Percentage</h3>
                                    <p class="innerB margin-none text-xlarge text-condensed strong text-primary"><?php echo calculate_percent($deal_registers['3'], $deal_registers['10']); ?>%</p>
                                   <?php /*?> <div class="innerTB">
<?php
$i=1;
$bar_string='';
foreach($day_solds as $key=>$value){
	if($i>20)
	{
		break;
	}
	if(isset($day_leads[$key]))
	{
		$bar_string.=','.$value.':'.$day_leads[$key];
		$i++;
	}
}
$bar_string=substr($bar_string,1);
?>                                    
                                        <div class="sparkline" sparkHeight="57"><?php echo $bar_string; ?></div>
                                    </div><?php */?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget innerAll text-center">
                                    <h3 class="innerT">Total Leads</h3>
                                    <p class="innerB margin-none text-xlarge text-condensed strong text-primary"><?php echo $all_total; ?></p><?php /*?>
                                    <div class="innerTB" style="min-height:85px;">
                                   
                                       
                                    </div><?php */?>
                                </div>
                                <!-- //Widget -->
                            </div>
                            
                            
                            <!-- //Col -->
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="widget widget-tabs widget-tabs-double-2 border-bottom widget-tabs-responsive">
                                    <div class="widget-body">
                                        <div class="tab-content">
                                            <!-- Tab content -->
                                            <div id="tabOpen" class="tab-pane active widget-body-regular innerAll inner-2x text-center  bg-primary">
                                            
                                           
                                    <h3 class="innerT">Open</h3>
                                    <p class="margin-none text-xlarge text-condensed strong text-white"> <?php echo $open_lead_count; ?></p>
                                    
                                
                                            
                                            </div>
                                            <!-- // Tab content END -->
                                            <!-- Tab content -->
                                            <div id="tabClosed" class="tab-pane widget-body-regular innerAll inner-2x text-center bg-primary">
                                            <h3 class="innerT">Closed</h3>
                                    <p class="margin-none text-xlarge text-condensed strong text-white"> <?php echo $closed_lead_count; ?></p>
                                            
                                            </div>
                                            <!-- // Tab content END -->
                                            <!-- Tab content -->
                                            <div id="tabDormant" class="tab-pane widget-body-regular innerAll inner-2x text-center bg-primary">
                                            <h3 class="innerT">Dormant</h3>
                                    <p class="margin-none text-xlarge text-condensed strong text-white"> <?php echo $dormant_lead_count; ?></p>
                                          
                                            </div>
                                            <div id="tabSoldCount" class="tab-pane widget-body-regular innerAll inner-2x text-center bg-primary">
                                            <h3 class="innerT">Sold</h3>
                                    <p class="margin-none text-xlarge text-condensed strong text-white"> <?php echo $deal_registers['10']; ?></p>
                                          
                                            </div>
                                            <div id="tabPendingCount" class="tab-pane widget-body-regular innerAll inner-2x text-center bg-primary">
                                            <h3 class="innerT">Pending</h3>
                                    <p class="margin-none text-xlarge text-condensed strong text-white"> <?php echo $pending_lead_count; ?></p>
                                          
                                            </div>
                                            
                                            
                                            <!-- // Tab content END -->
                                        </div>
                                    </div>
                                    <!-- Tabs Heading -->
                                    <div class="widget-head border-top-none bg-gray">
                                        <ul>
                                            <li class="active"><a class="glyphicons folder_open" href="#tabOpen"
                                                data-toggle="tab"><i></i><span>Open</span></a>
                                            </li>
                                            <li><a class="glyphicons folder_lock" href="#tabClosed"
                                                data-toggle="tab"><i></i><span>Closed</span></a>
                                            </li>
                                            <li><a class="glyphicons folder_new" href="#tabDormant"
                                                data-toggle="tab"><i></i><span>Dormant</span></a>
                                            </li>
                                             <li><a class="glyphicons check" href="#tabSoldCount"
                                                data-toggle="tab"><i></i><span>Sold</span></a>
                                            </li>
                                             <li><a class="glyphicons disk_remove" href="#tabPendingCount"
                                                data-toggle="tab"><i></i><span>Pending</span></a>
                                            </li>
                                            
                                           
                                           
                                        </ul>
                                    </div>
                                    <!-- // Tabs Heading END -->
                                </div>
                                <!-- //Widget -->
                            </div>
                            <div class="col-md-6">
                                <div class="widget widget-tabs widget-tabs-double-2 border-bottom widget-tabs-responsive">
                                    <div class="widget-body">
                                        <div class="tab-content">
                                            <!-- Tab content -->
                                            <div id="tabShowroom" class="tab-pane active widget-body-regular innerAll inner-2x text-center">
                                            <?php $showroom_per=calculate_percent($all_total,$showroom_total); ?>
                                                <div data-percent="<?php echo $showroom_per; ?>" data-size="95" class="easy-pie inline-block primary" data-scale-color="false"
                                                data-track-color="#efefef" data-line-width="8">
                                                    <div class="value text-center">
                                                        <span class="strong"><i class="icon-building fa-2x text-primary"></i>&nbsp;<?php echo $showroom_per; ?>%
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="strong">Total Showroom-<?php echo $showroom_total; ?></span>
                                            </div>
                                            <!-- // Tab content END -->
                                            <!-- Tab content -->
                                            <div id="tabWeb" class="tab-pane widget-body-regular innerAll inner-2x text-center">
                                            <?php $web_per=calculate_percent($all_total,$web_total); ?>
                                              <div data-percent="<?php echo $web_per; ?>" data-size="95" class="easy-pie inline-block primary" data-scale-color="false"
                                                data-track-color="#efefef" data-line-width="8">
                                                    <div class="value text-center">
                                                        <span class="strong"><i class="icon-cloud-download fa-2x text-primary"></i>&nbsp;<?php echo $web_per; ?>%
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="strong">Total Web-<?php echo $web_total; ?></span>
                                            </div>
                                            <!-- // Tab content END -->
                                            <!-- Tab content -->
                                            <div id="tabPhone" class="tab-pane widget-body-regular innerAll inner-2x text-center">
                                            <?php $phone_per=calculate_percent($all_total,$phone_total); ?>
                                               <div data-percent="<?php echo $phone_per; ?>" data-size="95" class="easy-pie inline-block primary" data-scale-color="false"
                                                data-track-color="#efefef" data-line-width="8">
                                                    <div class="value text-center">
                                                        <span class="strong"><i class="icon-phone fa-2x text-primary"></i>&nbsp;<?php echo $phone_per; ?>%
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="strong">Total Phone-<?php echo $phone_total; ?></span>
                                            </div>
                                            <div id="tabMobile" class="tab-pane widget-body-regular innerAll inner-2x text-center">
                                            <?php $mobile_per=calculate_percent($all_total,$mobile_total); ?>
                                               <div data-percent="<?php echo $mobile_per; ?>" data-size="95" class="easy-pie inline-block primary" data-scale-color="false"
                                                data-track-color="#efefef" data-line-width="8">
                                                    <div class="value text-center">
                                                        <span class="strong"><i class="icon-smart-phone fa-2x text-primary"></i>&nbsp;<?php echo $mobile_per; ?>%
                                                        </span>
                                                    </div>
                                                </div>
                                                <span class="strong">Total Mobile-<?php echo $mobile_total; ?></span>
                                            </div>
                                            
                                            <!-- // Tab content END -->
                                        </div>
                                    </div>
                                    <!-- Tabs Heading -->
                                    <div class="widget-head border-top-none bg-gray">
                                        <ul>
                                            <li class="active"><a class="glyphicons building" href="#tabShowroom"
                                                data-toggle="tab"><i></i><span>Showroom</span></a>
                                            </li>
                                            <li><a class="glyphicons cloud-upload" href="#tabWeb"
                                                data-toggle="tab"><i></i><span>Web</span></a>
                                            </li>
                                            <li><a class="glyphicons earphone" href="#tabPhone"
                                                data-toggle="tab"><i></i><span>Phone</span></a>
                                            </li>
                                            <li><a class="glyphicons iphone" href="#tabMobile"
                                                data-toggle="tab"><i></i><span>Mobile</span></a>
                                            </li>
                                           
                                           
                                        </ul>
                                    </div>
                                    <!-- // Tabs Heading END -->
                                </div>
                                <!-- //Widget -->
                            </div>
                        </div>
                        <!-- //Row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget widget-tabs widget-tabs-double-2 border-bottom widget-tabs-responsive"id="BarTabs"> 
                                <div class="widget-body">
                                    <div class="tab-content">
                                 		<div id="tabDealerStat" class="tab-pane active widget-body-regular">
                                            <div class="widget widget-body-white overflow-hidden">
                                                <div class="widget-head innerAll half">
                                                    <h4 class="margin-none"><i class="fa fa-fw icon-wallet"></i>Lead Stats</h4>
                                                </div>
                                                <div class="widget-body innerAll">
                                                    <!-- Horizontal Bars for Lead Step Chart -->
                                                    <div id="chart_horizontal_bars" class="flotchart-holder" style="width:100%;height:260px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Horizontal Bars for Lead Type Chart -->
                                        <div id="tabLeadTypeStat" class="tab-pane widget-body-regular">
                                            <div class="widget widget-body-white overflow-hidden">
                                                <div class="widget-head innerAll half">
                                                    <h4 class="margin-none"><i class="fa fa-fw icon-wallet"></i>Lead Type Stats</h4>
                                                </div>
                                                <div class="widget-body innerAll">
                                                    <!-- Horizontal Bars for Lead Step Chart -->
                                                    <div id="LeadTypeChart" class="flotchart-holder" style="width:100%;height:260px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div id="tabLeadStatusStat" class="tab-pane widget-body-regular">
                                            <div class="widget widget-body-white overflow-hidden">
                                                <div class="widget-head innerAll half">
                                                    <h4 class="margin-none"><i class="fa fa-fw icon-wallet"></i>Open/Closed</h4>
                                                </div>
                                                <div class="widget-body innerAll">
                                                    <!-- Horizontal Bars for Lead Step Chart -->
                                                    <div id="LeadStatusChart" class="flotchart-holder" style="width:100%;height:260px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-head border-top-none bg-gray">
                                    <ul>
                                        <li class="active"><a class="glyphicons disk_export" href="#tabDealerStat"
                                            data-toggle="tab"><i></i><span>Lead Step</span></a>
                                        </li>
                                        <li><a class="glyphicons sort" href="#tabLeadTypeStat"
                                            data-toggle="tab"><i></i><span>Lead Types</span></a>
                                        </li>
                                         <li><a class="glyphicons retweet_2" href="#tabLeadStatusStat"
                                            data-toggle="tab"><i></i><span>Open/Closed</span></a>
                                        </li>       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- Widget -->
                        
                        <!-- //Widget -->
                        
                        
                        <!-- //Row -->
                        <!-- Widget	 -->
                        
                        <!-- // End Widget -->
                        <!-- Widget	 -->
                        
                        <!-- //Widget -->
                    </div>
                    <!-- //  End Col -->
                    <div class="col-md-5" style="width:38%;">
                        <!-- Widget -->
                        <div class="widget widget-body-gray">
                            <div class="widget-body padding-none">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($total_earnings,'USD'); ?></div>
                                    <h4 class="text-white strong text-medium">Earnings</h4>
                                    <h5 class="text-white margin-none">This month earnings</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
						$lead_type_names=array(5=>'Web',6=>'Phone',7=>'Showroom',12=>'Mobile');
						foreach($lead_type_names as $c_status_id=>$c_status){ ?>
                        <div class="relativeWrap">
                        <div class="widget widget-body-gray widget-tabs widget-tabs-double-2 widget-tabs-responsive">
                        <div class="widget-head">
                            <ul>
                                <li class="active"><a class="glyphicons check" href="#SoldValue_<?php echo $c_status_id; ?>" data-toggle="tab"><i></i>Sold</a>
                                </li>
                                <li><a class="glyphicons more_items" href="#AllValue_<?php echo $c_status_id; ?>" data-toggle="tab"><i></i>All</a></li>
                                 <li><a class="glyphicons folder_open" href="#OpenValue_<?php echo $c_status_id; ?>" data-toggle="tab"><i></i>Open</a></li>
                                  <li><a class="glyphicons folder_lock" href="#ClosedValue_<?php echo $c_status_id; ?>" data-toggle="tab"><i></i>Closed</a></li>
                                  <?php if($c_status_id !=7){ ?>
                                   <li><a class="glyphicons disk_remove" href="#PendingValue_<?php echo $c_status_id; ?>" data-toggle="tab"><i></i>Pending</a></li>
                                   <?php } ?>
                                   <li><a class="glyphicons folder_new" href="#DormantValue_<?php echo $c_status_id; ?>" data-toggle="tab"><i></i>Dormant</a></li>
                                
                            </ul>
                        </div>
                            <div class="widget-body padding-none">
                            <div class="tab-content">
                            	<div id="SoldValue_<?php echo $c_status_id; ?>" class="tab-pane active">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($lead_combine_value[$c_status_id]['sold'],'USD'); ?></div>
                                    <h4 class="text-white strong text-medium"><?php echo $c_status; ?></h4>
                                    <h5 class="text-white margin-none">Lead Value</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="AllValue_<?php echo $c_status_id; ?>" class="tab-pane">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($lead_combine_value[$c_status_id]['all'],'USD'); ?></div>
                                    <h4 class="text-white strong text-medium"><?php echo $c_status; ?></h4>
                                    <h5 class="text-white margin-none">Lead Value</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="OpenValue_<?php echo $c_status_id; ?>" class="tab-pane">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($lead_combine_value[$c_status_id]['open'],'USD'); ?></div>
                                    <h4 class="text-white strong text-medium"><?php echo $c_status; ?></h4>
                                    <h5 class="text-white margin-none">Lead Value</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="ClosedValue_<?php echo $c_status_id; ?>" class="tab-pane">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($lead_combine_value[$c_status_id]['closed'],'USD'); ?></div>
                                    <h4 class="text-white strong text-medium"><?php echo $c_status; ?></h4>
                                    <h5 class="text-white margin-none">Lead Value</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                              <?php if($c_status_id !=7){ ?>
                            <div id="PendingValue_<?php echo $c_status_id; ?>" class="tab-pane">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($lead_combine_value[$c_status_id]['pending'],'USD'); ?></div>
                                    <h4 class="text-white strong text-medium"><?php echo $c_status; ?></h4>
                                    <h5 class="text-white margin-none">Lead Value</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div id="DormantValue_<?php echo $c_status_id; ?>" class="tab-pane">
                                <div class="bg-primary innerAll">
                                    <div class="text-large text-white pull-right"><?php echo $this->Number->currency($lead_combine_value[$c_status_id]['dormant'],'USD'); ?></div>
                                    <h4 class="text-white strong text-medium"><?php echo $c_status; ?></h4>
                                    <h5 class="text-white margin-none">Lead Value</h5>
                                    <div class="separator bottom"></div>
                                    <div class="progress primary progress-mini  margin-none">
                                        <div class="progress-bar progress-bar-white	" style="width: 70%;"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                         </div>
                        </div>
                        </div>
                         <?php } ?>
                        
                        
                        <!-- //End Widget -->
                        
                        <?php /*?><div class="widget widget-body-gray">
                            <div class=" innerAll half border-bottom">
                                
                                <h4 class="pull-left innerT half margin-none"><i class="fa fa-fw fa-money"></i> Last 4 Months Earnings Stat</h4>
                                <div class="clearfix"></div>
                            </div>
                            <div class="innerAll border-bottom">
                                
                            </div>
                            <div class="widget-body ">
                                <div class="sparkline" sparkType="line" sparkResize="true" sparkHeight="76" sparkLineWidth="2"
                                sparkWidth="100%" sparkLineColor="#3695d5" sparkSpotColor="#3695d5"
                                sparkFillColor="" sparkHighlightLineColor="#7c7c7c"
                                sparkHighlightSpotColor="#7c7c7c" sparkSpotRadius="4"
                                sparkMinSpotColor="#b55151" sparkMaxSpotColor="#609450">
                                    <?php  echo implode(',',$last4_month_stat); ?></div>
                            </div>
                        </div><?php */?>
                        <!-- Widget -->
                        
                        <!-- //End Widget -->
                        <!-- Widget	 -->
                        
                        <!-- //Widget -->
                        <!-- Widget -->
                        
                        <!-- //End Widget -->
                        <!-- Widget -->
                        
                        <!-- //End Widget -->
                    </div>
                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-head bg-inverse">
                                <h4 class="innerAll half"><i class="fa fa-fw  icon-graph-up-1"></i> Master Report</h4>
                            </div>
                            <div class="widget-body bg-white border-bottom">
                                <div id="master_report_data" style="height:400px;overflow-y:scroll;"></div>
                            </div>
                            <ul class="list-unstyled">
                            <?php if($dealer_info['DealerName']['dealer_group']){
								foreach($dealer_names as $d_id=>$d_name){
								?>
                                <li class="innerAll border-bottom">
                                    <div class="pull-right strong">#<?php echo $d_id; ?></div><a href="#" data-id="<?php echo $d_id; ?>" class="dealer_master no-ajaxify"><i class="fa fa-fw fa-circle text-info"></i> <?php echo $d_name; ?></a></li><?php }
							}else{
										
										?>
                                <li class="innerAll border-bottom">
                                    <div class="pull-right strong"><?php echo $dealer_info['DealerName']['dealer_id']; ?></div><i class="fa fa-fw fa-circle text-success"></i> <?php echo $dealer_info['DealerName']['name']; ?></li><?php } ?>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- //End Col -->


                    <div class="col-md-12">
                        <div class="widget">
                            <div class="widget-head bg-inverse">
                                
                                <input type='hidden' name='s_d_range' value='<?php echo $s_date; ?>' id = 's_d_range'>
                                <input type='hidden' name='e_d_range' value='<?php echo $e_date; ?>' id = 'e_d_range'>

                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="innerAll half"><i class="fa fa-fw  icon-graph-up-1"></i> Real Time Stats</h4>
                                    </div>
                                    <div class="col-md-8">

                                        <div class="pull-left" style="margin: 2px 10px 0px 0px;">
                                            <?php 

                                            $dealer_options_realtime = array();
                                            if($dealer_info['DealerName']['dealer_group']){
                                                $dealer_options_realtime = $dealer_names;
                                            }else{
                                                $dealer_options_realtime[$dealer_info['DealerName']['dealer_id']] = $dealer_info['DealerName']['name'];
                                            }
                                            echo $this->Form->input('realtime_dealer', array('options'=> $dealer_options_realtime, 'value'=>$dealer_info['DealerName']['dealer_id'], 'label'=>false, 'div' => false, 
                                            'class'=>'form-control input-sm' )); ?>

                                        </div>                                        


                                        <div class="pull-left">
                                            <div id="reportrange" class=""  style=" cursor: pointer; padding: 1px 10px; border: 1px solid #ccc; margin-right: 25px; margin-bottom: 4px;">
                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                <span><?php echo date("F j, Y",strtotime($s_date)); ?> - <?php echo date("F j, Y",strtotime($e_date)); ?></span> 
                                                <b class="caret"></b>   
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="widget-body bg-white border-bottom">
                                <div id="realtime_report_data" style="height: 400px; overflow-y:scroll;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- //End Col -->












                </div>
            </div>
 <script>
function getMaster($dealer_id,$start_date,$end_date){
	$("#master_report_data").html('');
	url='<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'master')); ?>/'+$dealer_id+'?start_date='+$start_date+'&end_date='+$end_date;
	$.ajax({
		   url:url,
		   type:'GET',
		   success:function(data){
			   $("#master_report_data").html(data);
		   }
		   
		   });
}
$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	rawData=<?php echo $rawData; ?>;	
	ticks=<?php echo $label_string; ?>;	
	colorArray1=["#ffffff",'#3695D5'];
	colorArray2=["#ffffff",'#EDF5FF'];
	//dealerStats(json_string);
	 dealerGraph(rawData,ticks,'Lead Step Stats','#chart_horizontal_bars');
	 //Lead types Chart
	 $leadTypes_count=<?php echo $leadTypes_count ?>;
	 $leadTypes_label=<?php echo $leadTypes_label ?>;
	 dealerBarGraph($leadTypes_count,$leadTypes_label,'Lead Type Stats','#LeadTypeChart','Lead Types','Lead Count',colorArray1);
	  $leadStatus_count=<?php echo $leadStatus_count ?>;
	 $leadStatus_label=<?php echo $leadStatus_label ?>;
	 dealerBarGraph($leadStatus_count,$leadStatus_label,'Open /Closed','#LeadStatusChart','Lead Status','Lead Count',colorArray2);
	 $dealer_id="<?php echo $dealer_info['DealerName']['dealer_id']; ?>";
	 getMaster($dealer_id,$("#s_d_range").val(), $("#e_d_range").val());
	 
	 
$('#BarTabs').bind('shown.bs.tab', function(e) {
				data=e.target.toString();
				t=data.split('#');
		 if (t[1] == "tabLeadTypeStat") {
  dealerBarGraph($leadTypes_count,$leadTypes_label,'Lead Type Stats','#LeadTypeChart','Lead Types','Lead Count',colorArray1);
  }else if(t[1]=='tabDealerStat'){
	  dealerGraph(rawData,ticks,'Lead Step Stats','#chart_horizontal_bars');
  }
  else if(t[1]=='tabLeadStatusStat'){
	  dealerBarGraph($leadStatus_count,$leadStatus_label,'Open /Closed','#LeadStatusChart','Lead Status','Lead Count',colorArray2);
	  
  }
});
function GraphResizing()
{
	
 dealerBarGraph($leadTypes_count,$leadTypes_label,'Lead Type Stats','#LeadTypeChart','Lead Types','Lead Count',colorArray1);
 dealerGraph(rawData,ticks,'Lead Step Stats','#chart_horizontal_bars');
  dealerBarGraph($leadStatus_count,$leadStatus_label,'Open /Closed','#LeadStatusChart','Lead Status','Lead Count',colorArray2);
 
 
}

	 
	$("#stats_monthMonth").change(function(event){
		location.href = "<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'reports')); ?>/"+$("#stats_monthMonth").val();
	});
		
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	

    function load_realtime_report(realtime_dealer_id, starttime, endtime){
        $('#realtime_report_data').html("");
        $.ajax({
            type: "GET",
            cache: false,
            data : {'dealer_id':realtime_dealer_id},
            url: "/crmreport/master_reports/realtime_report_all/"+""+starttime+"/"+ endtime,
            success: function(data){
                $('#realtime_report_data').html(data);
            
            }
        });        
    }

    load_realtime_report("<?php echo $dealer_info['DealerName']['dealer_id']; ?>", $("#s_d_range").val(), $("#e_d_range").val() ) ;

    $("#realtime_dealer").change(function(){
        load_realtime_report( $("#realtime_dealer").val() , $("#s_d_range").val(), $("#e_d_range").val() ) ;
    });

    var main_cb = function(start, end, label) {
        console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range").val( start.format('YYYY-MM-DD') );
        $("#e_d_range").val( end.format('YYYY-MM-DD') );
		location.href = "<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'reports')); ?>?start_date="+start.format('YYYY-MM-DD')+'&end_date='+ end.format('YYYY-MM-DD');
			
        
    }
	
	var cb = function(start, end, label) {
        console.log(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'), label);
        $('#main-report-range span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

        $("#s_d_range").val( start.format('YYYY-MM-DD') );
        $("#e_d_range").val( end.format('YYYY-MM-DD') );

        load_realtime_report( $("#realtime_dealer").val(), start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD') );
    }

    var optionSet1 = {
        startDate: '<?php echo date("m/d/Y",strtotime($s_date)); ?>',
        endDate: '<?php echo date("m/d/Y",strtotime($e_date)); ?>',
        minDate: '01/01/2012',
        maxDate: '<?php echo date('m/d/Y'); ?>',
        dateLimit: { days: 60 },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
           'Last 7 Days': [moment().subtract('days', 6), moment()],
           'Last 30 Days': [moment().subtract('days', 29), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
        }
    };
    $('#reportrange').daterangepicker(optionSet1, cb);
	
   $('#main-report-range').daterangepicker(optionSet1, main_cb);




	
 <?php if($dealer_info['DealerName']['dealer_group']) {?>
			$("#CRMLeadGroupStat").on('change',function(e){
						e.preventDefault();
						group=$(this).val();
						/*group='null'; 
						
						
						if(data_id=='dealership')
						{
							group='all_builds';
							
						}*/
						location.href = "<?php echo $this->Html->url(array('controller'=>'dashboards','action'=>'reports',date('m'))); ?>/"+group+"?start_date="+$("#s_d_range").val()+"&end_date="+$("#e_d_range").val();
						
						//$("#report_data_container").html('');	
						//allCharts(rurl1,rurl2);
								
													
			});
	
	<?php } ?>
	
$("#menu").on('mouseleave',function(){
									
								setTimeout(function(){GraphResizing();},100);	
									});
$(".dealer_master").on('click',function(e){
										e.preventDefault();
										dealer_id=$(this).attr('data-id');
										
										getMaster(dealer_id,$("#s_d_range").val(), $("#e_d_range").val());
										
										});


	
});
$("#btn_daily_recap").click(function(){
			$.ajax({
				type: "GET",
				cache: false,
				url: "/crmreport/reports/dailyrecap_reports/null/null/null/no",
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "<b>Daily Recap</b>",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});
		});


</script>           