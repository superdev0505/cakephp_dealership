</br></br>
<style>
#list_lead_search_result ul li{
	display: block !important;
}
.maxWidth {
    margin: 0 auto;
    width: 850px;
}
.excelWidth {
    margin: 0 auto;
    width: 1000px;
	text-align:center;
}
.focus_input{
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
.small-text-size
{
	font-size:20px;
	line-height:20px;
}
</style>
<?php
$zone = AuthComponent::user('zone');
$step_procces = AuthComponent::user('step_procces');
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');
$date = new DateTime();
date_default_timezone_set($zone);
$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-1 month', strtotime($datetimeshort)));
?>
<br>
<br>
<?php 
$selected_lead_type = (isset($this->request->params['pass'][0]))? $this->request->params['pass'][0] : "" ;
$lead_type='';
$view_text_class = 'col-md-9';
if(isset($this->request->query['lead_type']) && !empty($this->request->query['lead_type']))
{
	$lead_type=$this->request->query['lead_type'];
	$view_text_class = 'col-md-6';
}
$selected_lead_type=$lead_type;
$form_action='search_result';
if($lead_type=='service'){
	$form_action='service_search_result';
}elseif($lead_type=='part')
{
	$form_action='part_search_result';
}elseif($lead_type=='event_solds' || $lead_type=='event_leads')
{
	$form_action='event_sold_result';
}
?>
<div class="innerLR" id="BdcMainDiv">
			
  <div class="widget" style="margin-bottom:0px;">
		
		<div class="row  row-merge margin-none " style="padding:3px;">
			<div class="col-md-6">
            <h2 style="text-align:left;font-size:14px;margin-left:5px;"><strong><?php echo AuthComponent::user('dealer').' -  #'.AuthComponent::user('dealer_id'); ?></strong></h2>
            </div>
            <div class="col-md-3">
            <h3 style="text-align:left;font-size:14px;margin-left:5px;"><strong id="currentView">User: </strong> <?php echo AuthComponent::user('full_name'); ?></h3>
            </div>
            <?php if(!empty($lead_type)){
				
				if($lead_type == 'contact')
				{
					$text_view = 'Pre-Purchase(Month)';
				}elseif($lead_type == 'sold')
				{
					$text_view = ' Sold';
				}elseif($lead_type == 'service')
				{
					$text_view = ' Service';
				}
				elseif($lead_type == 'part')
				{
					$text_view = 'Parts';
				}
				elseif($lead_type == 'event_solds')
				{
					$text_view = 'Event (Solds)';
				}elseif($lead_type == 'event_leads')
				{
					$text_view = 'Event (Prospects)';
				}
			?>
            <div class="col-md-3">
            <h3 style="text-align:left;font-size:14px;margin-left:5px;"><strong id="currentView">Current View: </strong><span id="CurrentViewText" style="font-size:14px;"> <?php echo $text_view; ?></span></h3>
            </div>
           <?php } ?>
         </div>
   </div>          
        <div class="widget">
		
		<div class="row row-merge margin-none ">
			<div class="col-md-12">

				<div class="row row-merge margin-none ">
					<div class="col-md-6">
                  <div class="row row-merge margin-none ">
					<div class="col-md-3">
								<div class="innerAll text-center statbox"> 
									<a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'today_callback')); ?>?lead_type=contact" class="no-ajaxify" >
									<span class="text-medium strong small-text-size"><?php echo $call_back_count['pre_purchase_cbk_count']; ?></span><br/>
									Pre-Purchase<br/> CBK
									</a> 
								</div>
							</div>
                            <div class="col-md-3">
								<div class="innerAll text-center statbox"> 
									<a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'overdue_callback')); ?>?lead_type=contact" class="no-ajaxify" >
									<span class="text-medium strong text-danger"><?php echo $call_back_count['pre_purchase_over_cbk_count']; ?></span><br/>
									Pre-Purchase<br/>CBK(overdue)
									</a> 
								</div>
							</div>
							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a  href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'sold_today_callback')); ?>?lead_type=sold" class="no-ajaxify">
										<span class="text-medium strong"><?php echo $call_back_count['sold_cbk_count']; ?></span><br/>
										Sold CSI<br/>CBK
									</a>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a  href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'sold_overdue_callback')); ?>?lead_type=sold" class="no-ajaxify">
										<span class="text-medium strong text-danger"><?php echo $call_back_count['sold_over_cbk_count']; ?></span><br/>
										Sold CSI <br />CBK(overdue)
									</a>
								</div>
							</div>
							</div>
                         </div>
                         <div class="col-md-6">
                         <div class="row row-merge margin-none ">
							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'today_callback')); ?>?lead_type=service" class="no-ajaxify" >
										<span class="text-medium strong"><?php echo $call_back_count['service_cbk_count']; ?></span><br/>
										Service Visit <br/>CBK
									</a>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'overdue_callback')); ?>?lead_type=service" class="no-ajaxify" >
										<span class="text-medium strong text-danger"><?php echo $call_back_count['service_over_cbk_count']; ?></span><br/>
										Service Visit<br/>CBK (overdue)
									</a>
								</div>
							</div>

							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a  href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'today_callback')); ?>?lead_type=part" class="no-ajaxify" >
										<span class="text-medium strong "><?php echo $call_back_count['parts_cbk_count']; ?></span><br/>
										Parts Visit<br/>CBK
									</a>
								</div>
							</div>
                            <div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a  href="<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main','search_all'=>'overdue_callback')); ?>?lead_type=part" class="no-ajaxify" >
										<span class="text-medium strong text-danger"><?php echo $call_back_count['parts_over_cbk_count']; ?></span><br/>
										Parts Visit <br />CBK(overdue)
									</a>
								</div>
							</div>
                            </div>
                            </div>
							</div>
							</div>
                            </div>
							</div>
						

			
			<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
            
			
			<div class="widget widget-body-white" style="margin:0px;">
				<div class="widget-body">
					
					<div class="row">
						<?php
						$focus_class='';
						$freedom_group = array(762,761,760,759,758,491,492,262,1406,1627,1626,1640);
						if($lead_type==''){
							$focus_class='focus_input';
						}
						 echo $this->Form->create('BdcLead', array('url' => array('controller'=>'bdc_leads','action' => $form_action,'load_first') ,'autocomplete'=>"off", 'class' => 'form-inline no-ajaxify')); ?>
                        <div class="col-md-1" style="width:15% !important">
                        <?php 
						$dealer_id = AuthComponent::user('dealer_id');
						
						$main_lead_bdc_type = array(
								'contact' => 'Pre-Purchase',
								'sold' => 'CSI Sold',
								'service' => 'Service Leads',
								'part' => 'Part Leads',	
								
								/*'event_leads' => 'Event (Leads)'*/					
							);
						if(in_array(AuthComponent::user('dealer_id'),array(5000,20080)))
						{$main_lead_bdc_type = array(
								'contact' => 'Pre-Purchase',
								'sold' => 'CSI Sold',
								'service' => 'Service Leads',
								'part' => 'Part Leads',	
								'event_solds' => 'Event (Solds)',
								'event_leads' => 'Event (Prospects)'					
							);
							
						}elseif(in_array($dealer_id,$freedom_group))
						{
							$main_lead_bdc_type = array(
								'contact' => 'Pre-Purchase',
								'sold' => 'CSI Sold',
								'service' => 'Service Leads',
								/*'event_leads' => 'Event (Leads)'*/					
							);
						}
						 echo $this->Form->select('lead_type',$main_lead_bdc_type, array('div' => false,  'class'=>"form-control ".$focus_class,'value'=>$lead_type, 'style' => 'width: 100%', 'empty' => 'Select Lead Type')); ?></div>
                          <?php if($lead_type=='contact'||$lead_type=='sold'){ ?>  
                          <?php /*?> <div class="col-md-1" style="width:10% !important">
                       <a href="#" class="btn btn-primary pull-left no-ajaxify" id="toggle_sort" data-id="DESC">New- Lead View</a></div><?php */?>
                         <div class="col-md-3" style="width:24% !important">
                        <button type="submit" id="btn-submit-search2" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                         <?php echo $this->Form->input('search_all_value', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control pull-right', 'required' => false,'placeholder'=>'Search Quick lead','style'=>'width:80%')); ?>						</div>
                        </div>
                        
						<div class="col-md-3" style="width:23% !important">
                        
                        <div class="overflow-hidden">
							<?php
							if($lead_type=='contact'){
								$search_value='pre-purchase_month';
								$search_option_array=array(
								'Pre-Purchase' => 'Pre-Purchase(Today)',
								'Pre-Purchase_yesterday' => 'Pre-Purchase(Yesterday)',
								'pre_last_week'=>'Pre-Purchase(Last Week)',
								'pre-purchase_month'=>'Pre-Purchase(Month)',
								'pre_last_month'=>'Pre-Purchase(Last Month)',
								'today_callback'=>"Today's Call Back",
								'view_1st_voice_pre'=>"1st Voicemail(Pre-Purchase)",
								'view_2nd_voice_pre'=>"2nd Voicemail(Pre-Purchase)",
								'view_3rd_voice_pre'=>"3rd Voicemail(Pre-Purchase)",
								'no_contact_pre_month'=>"No Contact Pre-Purchase (Month)",
													
							);							
							}else{
								$search_value='Sold';
								$search_option_array=array(
								'Sold' => 'Sold',
								'sold_last_week'=>'Sold(Last 14 days)',
								'sold_this_month'=>'Sold(Month)',
								'sold_last_month'=>'Sold(Last Month)',
								'view_3rd_voice_sold'=>"3rd Voicemail(Sold)",
								'no_contact_sold_month'=>"No Contact Sold (Month)",
								'sold_today_callback'=>"Today's Call Back"
								
							);
							}
							if(isset($this->params['named']['search_all']))
							{
								$search_value=$this->params['named']['search_all'];
							}
							echo $this->Form->select('search_all', $search_option_array, array('div' => false,  'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Lead Search', 'id' => 'ContactSearchAll','value'=>$search_value));
							//keep the state of Quick Search
							//echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>
                            </div>
						</div>
						<div class="col-md-3" style="width:23% !important">
							 <button type="submit" id="btn-submit-search" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                            <div class="input-group date" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('search_all2', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'Search By Date')); 
								/*//echo $this->Form->input('date_search', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'empty' => 'search by Day','options'=>array('today'=>'Today','yesterday'=>'Yesterday','week'=>'This Week','month'=>'This Month'),'style'=>'width:98%'));*/
								?>
                               						
							</div>
                            </div>
						</div>
                          <?php }elseif($lead_type=='service'){?>
                          
                          <div class="col-md-3" style="width:24% !important">
                        <button type="submit" id="btn-submit-search2" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                         <?php echo $this->Form->input('search_all_value', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control pull-right', 'required' => false,'placeholder'=>'Search Quick lead','style'=>'width:80%')); ?>						</div>
                        </div>
                          <div class="col-md-3" style="width:20% !important">
                        
                        <div class="overflow-hidden">
							<?php
							$search_value='';
							if(isset($this->params['named']['search_all']))
							{
								$search_value=$this->params['named']['search_all'];
							}
							echo $this->Form->select('search_all', array(
								'today' => 'Today Lead',
								'last_week' => 'Last Week',
								'month'=>'Month',
								'last_month'=>'Last Month',
								'view_3rd_voicemail'=>"3rd Voicemail",
								'today_callback'=>"Today's Call back",
								/*'7days'=>'7 Days Lead',
								'2days'=>'2 Days Lead'*/
												
							), array('div' => false, 'value'=>$search_value, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Lead Search', 'id' => 'ContactSearchAll'));
							//keep the state of Quick Search
							//echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>
                            </div>
						</div>
                         <div class="col-md-3" style="width:20% !important">
							 <button type="submit" id="btn-submit-search" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                            <div class="input-group date" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('search_all2', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'Search By Date')); 
								/*//echo $this->Form->input('date_search', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'empty' => 'search by Day','options'=>array('today'=>'Today','yesterday'=>'Yesterday','week'=>'This Week','month'=>'This Month'),'style'=>'width:98%'));*/
								?>
                               						
							</div>
                            </div>
						</div> 
                          <?php }elseif($lead_type=='part'){ ?>
                          
                                       
                          <div class="col-md-3" style="width:22% !important">
                        <button type="submit" id="btn-submit-search2" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                         <?php echo $this->Form->input('search_all_value', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control pull-right', 'required' => false,'placeholder'=>'Search Quick lead','style'=>'width:80%')); ?>						</div>
                        </div>
                          <div class="col-md-3" style="width:20% !important">
                        
                        <div class="overflow-hidden">
							<?php
							$search_value='';
							if(isset($this->params['named']['search_all']))
							{
								$search_value=$this->params['named']['search_all'];
							}
							echo $this->Form->select('search_all', array(
								'today' => 'Today Lead',
								'last_week' => 'Last Week',
								'month'=>'Month',
								'last_month'=>'Last Month',
								'today_callback'=>"Today's Call back",
								/*'14days'=>'14 Days Lead',
								'7days'=>'7 Days Lead',
								'2days'=>'2 Days Lead'*/
												
							), array('div' => false, 'value'=>$search_value, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Lead Search', 'id' => 'ContactSearchAll'));
							//keep the state of Quick Search
							//echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>
                            </div>
						</div>
                         <div class="col-md-3" style="width:20% !important">
							 <button type="submit" id="btn-submit-search" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                            <div class="input-group date" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('search_all2', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'Search By Date')); 
								/*//echo $this->Form->input('date_search', array(
								'div' => false,
								'class' => 'form-control',
								'label' => false,
								'empty' => 'search by Day','options'=>array('today'=>'Today','yesterday'=>'Yesterday','week'=>'This Week','month'=>'This Month'),'style'=>'width:98%'));*/
								?>
                               						
							</div>
                            </div>
						</div> 
                                                   
                          <?php }elseif($lead_type=='event_solds' || $lead_type=='event_leads'){ ?>
                          
                                       
                          <div class="col-md-3" style="width:22% !important">
                        <?php /*?><button type="submit" id="btn-submit-search2" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                         <?php echo $this->Form->input('search_all_value', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control pull-right', 'required' => false,'placeholder'=>'Search Quick lead','style'=>'width:80%')); ?>						</div><?php */?>
                        </div>
                          <div class="col-md-3" style="width:20% !important">
                        
                        <div class="overflow-hidden">
							<?php
							$search_value=date('Y');
							$main_option_array = range(2005,$search_value);
							
							$main_option_array = array_combine($main_option_array,$main_option_array);
							if(isset($this->params['named']['search_all']))
							{
								$search_value=$this->params['named']['search_all'];
							}
							
							echo $this->Form->select('search_all', $main_option_array, array('div' => false, 'value'=>$search_value, 'class'=>"form-control", 'style' => 'width: 100%', 'empty' => 'Quick Lead Search', 'id' => 'ContactSearchAll'));
							//keep the state of Quick Search
							//echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
							?>
                            </div>
						</div>
                         <div class="col-md-3" style="width:20% !important">
							<?php /*?> <button type="submit" id="btn-submit-search" class="btn btn-info pull-right no-ajaxify"><i class="icon-search"></i></button>
                        <div class="overflow-hidden">
                            <div class="input-group date" ><span class="input-group-addon"><i class="fa fa-th"></i></span>
								<?php
								 echo $this->Form->input('search_all2', array('style' => "",'label'=>false,'div'=>false ,'type' => 'text', 'class' => 'form-control', 'required' => false,'placeholder'=>'Search By Date')); 
								?>
                               						
							</div>
                            </div><?php */?>
						</div> 
                                                   
                          <?php } ?>
                        <div class="col-md-1" style="width:12.33% !important">
                        <div class="btn-group pull-right" >
				
					<button type="button" class="btn  btn-primary dropdown-toggle" data-toggle="dropdown">
						Actions
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu pull-right">
                   
                         <?php if($lead_type=='contact'||$lead_type=='sold'){ ?> 
                         <li>
                         <?php echo $this->Html->link('Daily Report Download',array('controller'=>'bdc_leads','action'=>'month_export','yes',$lead_type),array('escape'=>false,'class'=>'no-ajaxify','target'=>'_blank','data-placement'=>'top','data-original-title'=>'Download Bdc Month leads','data-toggle'=>''));
						 echo '</li><li>';
						 echo $this->Html->link('Daily Report View',array('controller'=>'bdc_leads','action'=>'month_export','no',$lead_type),array('escape'=>false,'class'=>'no-ajaxify','target'=>'_blank','data-placement'=>'top','data-original-title'=>'View Bdc Month leads','data-toggle'=>'','id'=>'BdcExcelMonth'));
						 echo '</li>';
						 }elseif($lead_type=='service'){
							  echo '<li>';
							 echo $this->Html->link('Daily Report Download',array('controller'=>'bdc_leads','action'=>'service_month_export','yes'),array('escape'=>false,'class'=>'no-ajaxify','target'=>'_blank','data-placement'=>'top','data-original-title'=>'Download Bdc Month leads','data-toggle'=>''));
							  echo '</li><li>';
							 						 
						 echo $this->Html->link('Daily Report View',array('controller'=>'bdc_leads','action'=>'service_month_export'),array('escape'=>false,'class'=>' no-ajaxify','target'=>'_blank','data-placement'=>'top','data-original-title'=>'View Bdc Month leads','data-toggle'=>'','id'=>'BdcExcelMonth'));
						  echo '</li>';
						 }elseif($lead_type=='part'){
							  echo '<li>';
							 echo $this->Html->link('Daily Report Download',array('controller'=>'bdc_leads','action'=>'part_month_export','yes'),array('escape'=>false,'class'=>'no-ajaxify','target'=>'_blank','data-placement'=>'top','data-original-title'=>'Download Parts Month leads','data-toggle'=>''));
							  echo '</li><li>';
							 						 
						 echo $this->Html->link('Daily Report View',array('controller'=>'bdc_leads','action'=>'part_month_export'),array('escape'=>false,'class'=>' no-ajaxify','target'=>'_blank','data-placement'=>'top','data-original-title'=>'View Bdc Month leads','data-toggle'=>'','id'=>'BdcExcelMonth'));
						  echo '</li>';
						 }?>
                          <li >
                        <a href="#" id="surveyViewToggle" data-id="full_screen"  data-placement="left" data-original-title="Full Screen" data-toggle="">PopUp View</a></li>
                        </ul></div>
                        </div>
                     
						<?php echo $this->Form->end(); ?>
						
						<div class="col-md-6">
							<?php /*?><button class="btn btn-inverse" data-toggle="collapse" data-target="#advance-search"><i class="fa fa-search"></i> Advanced Lead Search</button>
							<button class="btn btn-inverse" id="form_reset_button" type="button">Reset</button><?php */?>

						
						</div>
						
					</div>
					
					
				</div>
			</div>	

	<!-- Widget -->
	<div class="wizard">
	
		<div class="widget widget-heading-simple widget-body-white widget-employees">
			<div class="widget-body padding-none">
				
				<div class="row row-merge">
					<div class="col-md-5 listWrapper" style="width:36%">
						<div id="search-result-content"></div>
					</div>
					<div class="col-md-7 detailsWrapper" style="width:64%">
						<div class="ajax-loading hide">
							<i class="icon-spinner icon-spin icon-4x"></i>
						</div>
						<div id="lead_details_content" style="max-height: 600px; overflow: auto"></div>
					</div>
				</div>
				
			</div>
		</div>
	
	</div>
<!-- // Widget END -->		

</div>

<!-- Modal -->

<!-- // Modal END -->

<script>
$search_all_params='<?php echo isset($this->params['named']['search_all'])?$this->params['named']['search_all']:''; ?>';
	function removeAlert()
 	{
		
	$(".alert").not(".call_back").delay(3000).fadeOut("slow"); 
 	}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	
	function validatePhone(txtPhone) {
		var a = document.getElementById(txtPhone).value;
		var filter = /^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/;
		if (filter.test(a)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	$("#BdcLeadSearchAll2").bdatepicker({
			format: 'yyyy-mm-dd',
			endDate: "<?php echo date('Y-m-d'); ?>"
		});
	<?php if($lead_type=='contact'||$lead_type=='sold'){ ?> 
	function display_pending_notpending(query_type){
		$("#search-result-content").html("");
		$('.ajax-loading').removeClass('hide');
		var search_url = "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/search_all2:"+query_type+"/search_all:"+query_type+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
		$.ajax({
			type: "GET",
			cache: false,
			url:  search_url,
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
	}
	
	
	
	search_current_month = true;
	
	$("#form_reset_button").click(function() {
        $('#ContactLeadsForm2').find('input, select').each(function() {
            $(this).val('');
        });
		$('#ContactLeadsMainForm').find('input, select').each(function() {
            $(this).val('');
        });
		
    });
	

		removeAlert();
		
		<?php if( isset($this->request->params['pass']['0']) && $this->request->params['pass']['0'] == 'view'){ ?>
		
		$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/contact_id:<?php echo $this->request->params['pass']['1']; ?>/",
			success: function(data){
				$("#search-result-content").html(data);
				s_order=$("#prev_l_sort").attr('data-id');
				$("#toggle_sort").attr('data-id',s_order);
				$('.ajax-loading').addClass('hide');
			}
		});
		
		
		<?php }else if( isset($this->request->params['pass']['0'])){ ?>

		$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/selected_lead_type:<?php echo $selected_lead_type; ?>/",
			success: function(data){
				$("#search-result-content").html(data);
				s_order=$("#prev_l_sort").attr('data-id');
				$("#toggle_sort").attr('data-id',s_order);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
		
		
		<?php
		//load newly added/edited leads
		if( isset($load_lead)){ ?>
		$("#lead_details_content").html("&nbsp;");
		$("#lead_details_content").prev('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'lead_details', 'selected_lead_type'=>$selected_lead_type, $load_lead )); ?>",
			success: function(data){
				$("#lead_details_content").html(data);
				$("#lead_details_content").prev('.ajax-loading').addClass('hide');
			}
		});
		<?php 
		} ?>
	
		
		$("#ContactSearchCreated").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			startDate = new Date(selected.date.valueOf());
			startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
			$('#ContactSearchModified').bdatepicker('setStartDate', startDate);
			
		});
		
		$("#ContactSearchModified").bdatepicker({
			format: 'yyyy-mm-dd',
			startDate: "2013-02-14"
		}).on('changeDate', function(selected){
			FromEndDate = new Date(selected.date.valueOf());
			FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
			$('#ContactSearchCreated').bdatepicker('setEndDate', FromEndDate);
		});
		
		//advance search
		$("#submit_advance_search_filter").click(function(event){
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
					$("#advance-search").collapse('hide');
				}
			});
			return false;
		});
		//toggle search order
		$('body').on('click',"#toggle_sort",function(e){
			e.preventDefault();
			sort_order=$(this).attr('data-id');
			$("#search-result-content").html("");
			$('.ajax-loading').removeClass('hide');
			
			var search_url = $("#BdcLeadLeadsMainForm").attr('action') + "/search_all2:"+$("#BdcLeadSearchAll2").val()+"/search_all:"+$("#ContactSearchAll").val()+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>/l_sort:"+sort_order;
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					s_order=$("#prev_l_sort").attr('data-id');
					if(s_order=='ASC'){
						$("#toggle_sort").text('Past- Lead View');
					}else
					{
						$("#toggle_sort").text('New- Lead View');
				}
					$("#toggle_sort").attr('data-id',s_order);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
		//quick search
		$("#btn-submit-search").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/search_all2:"+$("#BdcLeadSearchAll2").val()+"/search_all:"+$("#ContactSearchAll").val()+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					s_order=$("#prev_l_sort").attr('data-id');
					$("#toggle_sort").attr('data-id',s_order);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
		$("#ContactSearchAll").on('change',function(){
						if($(this).val()!='')
						{
							$("#lead_details_content").html("&nbsp;")
							$("#search-result-content").html("");
							$('.ajax-loading').removeClass('hide');
							//	event.preventDefault();
							var search_url = $(this).closest('form').attr('action') + "/search_all:"+$("#ContactSearchAll").val()+"/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
							$.ajax({
								type: "GET",
								cache: false,
								url:  search_url,
								success: function(data){
								$("#search-result-content").html(data);
								$option_value = $("#ContactSearchAll").val();
								if($option_value.match(/voice_pre$/))
								{
									$('a[href="#tab-voicemail"]').trigger('click');
								}
								s_order=$("#prev_l_sort").attr('data-id');
								$("#toggle_sort").attr('data-id',s_order);
								$('.ajax-loading').addClass('hide');
								}
							});							
						}
					});
		
		$("#btn-submit-search2").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/search_all_value:"+$("#BdcLeadSearchAllValue").val()+"/selected_lead_type:<?php echo $selected_lead_type; ?>";
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					s_order=$("#prev_l_sort").attr('data-id');
					$("#toggle_sort").attr('data-id',s_order);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
		
		
		<?php if(isset($this->params->query['search_sales_step'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchSalesStep").val("<?php echo $this->params->query['search_sales_step']; ?>");	
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
		
	
		<?php if(isset($this->params->query['search_status'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchStatus").val("<?php echo $this->params->query['search_status']; ?>");	
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
		
		<?php if(isset($this->params->query['search_type'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchType").val("<?php echo $this->params->query['search_type']; ?>");	
		$('.ajax-loading').removeClass('hide');
		$.ajax({
			type: "GET",
			cache: false,
			data: $("#ContactLeadsForm2").serialize(),
			url:  $("#ContactLeadsForm2").attr('action'),
			success: function(data){
				$("#search-result-content").html(data);
				$('.ajax-loading').addClass('hide');
			}
		});
		<?php } ?>
	
		
		<?php if(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'mobile_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('mobile_lead_pending');
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'mobile_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('mobile_lead_notpending');
			
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'showroom_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('showroom_lead_pending');	
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'showroom_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('showroom_lead_notpending');
		
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'phone_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('phone_lead_pending');	
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'phone_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('phone_lead_notpending');
			
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'web_lead_pending'){ ?>
			search_current_month = false;
			display_pending_notpending('web_lead_pending');	
		<?php }elseif(isset($this->params->query['quick_lead_search']) && $this->params->query['quick_lead_search'] == 'web_lead_notpending'){ ?>
			search_current_month = false;
			display_pending_notpending('web_lead_notpending');		
			
			
			
			
		<?php }else if(isset($this->params->query['quick_lead_search'])){ ?>
		search_current_month = false;
		$("#lead_details_content").html("&nbsp;")
		$("#ContactSearchAll").val("<?php echo $this->params->query['quick_lead_search']; ?>");	
		$("#btn-submit-search").trigger('click');
		<?php } ?>
		
		
		<?php if(isset($this->params->query['mainsearch'])){ ?>
		search_current_month = false;
		$("#ContactSearchPhone").val("<?php echo $this->params->query['search_phone']; ?>");
		$("#ContactSearchMobile").val("<?php echo $this->params->query['search_mobile']; ?>");
		$("#ContactSearchFirstName").val("<?php echo $this->params->query['search_first_name']; ?>");
		$("#ContactSearchLastName").val("<?php echo $this->params->query['search_last_name']; ?>");
		
		$("#ContactNsearchPhone").val("<?php echo $this->params->query['search_phone']; ?>");
		$("#ContactNsearchMobile").val("<?php echo $this->params->query['search_mobile']; ?>");
		$("#ContactNsearchFirstName").val("<?php echo $this->params->query['search_first_name']; ?>");
		$("#ContactNsearchLastName").val("<?php echo $this->params->query['search_last_name']; ?>");
		
		var search_url = "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/search_all2:new_lead_search/search_all:new_lead_search/search_all_value:/selected_lead_type:<?php echo $selected_lead_type; ?>";
		$.ajax({
			type: "GET",
			cache: false,
			data:{mobile: $("#ContactNsearchMobile").val(), phone: $("#ContactNsearchPhone").val(), first_name:$("#ContactNsearchFirstName").val(), last_name : $("#ContactNsearchLastName").val()  },
			url:  search_url,
			success: function(data){
				$("#search-result-content").html(data);
				$("#start_new_lead").show();
			}
		});
		
		<?php } ?>
		
		
		
		//load todays leads if search and viwe area is empty
		if( $("#lead_details_content").html() == "" && $("#search-result-content").html() == "" && search_current_month == true){
			if($search_all_params=='')
			{
			$lead_type='<?php if($lead_type=='contact'){echo 'pre-purchase_month';}else{echo 'Sold';} ?>';
			}else
			{
				$lead_type=$search_all_params;
			}
			$view_lead_id ='';
			<?php if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id'])){ ?>
			$view_lead_id = '/view_lead_id:<?php echo $this->request->params['named']['view_lead_id']; ?>';
			<?php } ?>
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				url:  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'search_result')); ?>/load_first/search_all:"+$lead_type+$view_lead_id,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
		}
		
	
	<?php } elseif($lead_type=='service'){?>
	$("#lead_details_content").html("&nbsp;");
	$view_lead_id ='';
	<?php if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id'])){ ?>
	$view_lead_id = '/view_lead_id:<?php echo $this->request->params['named']['view_lead_id']; ?>';
	<?php } ?>
		$('.ajax-loading').removeClass('hide');
		$url='<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'service_search_result','load_first')); ?>/search_all:'+$search_all_params+$view_lead_id;
		$.ajax({
			type: "GET",
			cache: false,
			url:  $url,
			success: function(data){
				$("#search-result-content").html(data);
			/*	s_order=$("#prev_l_sort").attr('data-id');
				$("#toggle_sort").attr('data-id',s_order);*/
				$('.ajax-loading').addClass('hide');
			}
		});
	
	//Search list toggle
	
	$("#ContactSearchAll").on('change',function(){
						if($(this).val()!='')
						{
							$("#lead_details_content").html("&nbsp;")
							$("#search-result-content").html("");
							$('.ajax-loading').removeClass('hide');
							//	event.preventDefault();
							var search_url = $(this).closest('form').attr('action') + "/search_all:"+$("#ContactSearchAll").val();
							$.ajax({
								type: "GET",
								cache: false,
								url:  search_url,
								success: function(data){
								$("#search-result-content").html(data);
								s_order=$("#prev_l_sort").attr('data-id');
								$("#toggle_sort").attr('data-id',s_order);
								$('.ajax-loading').addClass('hide');
								}
							});							
						}
					});
					
		//text search
		$("#btn-submit-search2").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'service_search_result')); ?>/load_first/search_all_value:"+$("#BdcLeadSearchAllValue").val();
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
			$("#btn-submit-search").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'service_search_result')); ?>/load_first/search_all2:"+$("#BdcLeadSearchAll2").val();
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
					

			
	<?php }elseif($lead_type=='part'){?>
		$("#lead_details_content").html("&nbsp;");
	$view_lead_id ='';
	<?php if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id'])){ ?>
	$view_lead_id = '/view_lead_id:<?php echo $this->request->params['named']['view_lead_id']; ?>';
	<?php } ?>
	$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		$url='<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'part_search_result','load_first')); ?>/search_all:'+$search_all_params+$view_lead_id;
		$.ajax({
			type: "GET",
			cache: false,
			url:  $url,
			success: function(data){
				$("#search-result-content").html(data);
			/*	s_order=$("#prev_l_sort").attr('data-id');
				$("#toggle_sort").attr('data-id',s_order);*/
				$('.ajax-loading').addClass('hide');
			}
		});
	
	//Search list toggle
	
	$("#ContactSearchAll").on('change',function(){
						if($(this).val()!='')
						{
							$("#lead_details_content").html("&nbsp;")
							$("#search-result-content").html("");
							$('.ajax-loading').removeClass('hide');
							//	event.preventDefault();
							var search_url = $(this).closest('form').attr('action') + "/search_all:"+$("#ContactSearchAll").val();
							$.ajax({
								type: "GET",
								cache: false,
								url:  search_url,
								success: function(data){
								$("#search-result-content").html(data);
								s_order=$("#prev_l_sort").attr('data-id');
								$("#toggle_sort").attr('data-id',s_order);
								$('.ajax-loading').addClass('hide');
								}
							});							
						}
					});
					
		//text search
		$("#btn-submit-search2").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'part_search_result')); ?>/load_first/search_all_value:"+$("#BdcLeadSearchAllValue").val();
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
			$("#btn-submit-search").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller' => 'bdc_leads','action' => 'part_search_result')); ?>/load_first/search_all2:"+$("#BdcLeadSearchAll2").val();
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
					

			
	<?php }elseif($lead_type=='event_solds' || $lead_type == 'event_leads'){
		$lead_action = $lead_type
		?>
		$search_all_params = '<?php echo $search_value; ?>';
		$("#lead_details_content").html("&nbsp;");
	$view_lead_id ='';
	<?php if(isset($this->request->params['named']['view_lead_id']) && !empty($this->request->params['named']['view_lead_id'])){ ?>
	$view_lead_id = '/view_lead_id:<?php echo $this->request->params['named']['view_lead_id']; ?>';
	<?php } ?>
	$("#lead_details_content").html("&nbsp;");
		$('.ajax-loading').removeClass('hide');
		$url='<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'event_sold_result','load_first','lead_action' =>$lead_action )); ?>/search_all:'+$search_all_params+$view_lead_id;
		$.ajax({
			type: "GET",
			cache: false,
			url:  $url,
			success: function(data){
				$("#search-result-content").html(data);
			/*	s_order=$("#prev_l_sort").attr('data-id');
				$("#toggle_sort").attr('data-id',s_order);*/
				$('.ajax-loading').addClass('hide');
			}
		});
	
	//Search list toggle
	
	$("#ContactSearchAll").on('change',function(){
						if($(this).val()!='')
						{
							$("#lead_details_content").html("&nbsp;")
							$("#search-result-content").html("");
							$('.ajax-loading').removeClass('hide');
							//	event.preventDefault();
							var search_url = "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'event_sold_result','load_first','lead_action' =>$lead_action )); ?>/search_all:"+$("#ContactSearchAll").val();
							$.ajax({
								type: "GET",
								cache: false,
								url:  search_url,
								success: function(data){
								$("#search-result-content").html(data);
								s_order=$("#prev_l_sort").attr('data-id');
								$("#toggle_sort").attr('data-id',s_order);
								$('.ajax-loading').addClass('hide');
								}
							});							
						}
					});
					
		//text search
		$("#btn-submit-search2").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'event_sold_result','load_first','lead_action' =>$lead_action )); ?>/search_all_value:"+$("#BdcLeadSearchAllValue").val();
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
		
			$("#btn-submit-search").click(function(event){
											   
			$("#search-result-content").html("");
			$("#lead_details_content").html("");
			
			$('.ajax-loading').removeClass('hide');
			event.preventDefault();
			var search_url =  "<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'event_sold_result','load_first','lead_action' =>$lead_action )); ?>/search_all2:"+$("#BdcLeadSearchAll2").val();
			$.ajax({
				type: "GET",
				cache: false,
				url:  search_url,
				success: function(data){
					$("#search-result-content").html(data);
					$('.ajax-loading').addClass('hide');
				}
			});
			return false;
		});
					

			
	<?php } ?>

	$("#BdcExcelMonth").on('click',function(e){
		e.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: 'Dealership Month Report',
				}).find("div.modal-dialog").addClass("excelWidth");
			}
		});
		
		});
		$("#surveyViewToggle").on('click',function(e){
											   e.preventDefault();
											   scr_mode=$(this).attr('data-id');
											   if(scr_mode=='full_screen'){
												    $(this).attr('data-id','popup');
													$(this).text('Screen View');
												   //	$(this).attr('class','btn glyphicons more_windows');
												    $(this).attr('data-original-title','Full Screen');
												 
											   }else{
												   $(this).attr('data-id','full_screen');
												   $(this).text('Popup View');
												   //$(this).attr('class','btn glyphicons display');
												   $(this).attr('data-original-title','Show as Popup');
											   }
											   
											   });	
	$("#BdcLeadLeadType").on('change',function(){
		$val=$(this).val();
		if($val != ''){
			url='<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main')); ?>?lead_type='+$val;
			location.href=url;
			
		}
		
		});
		$("#ContactSearchAll").on('change',function(){
			view_text=$("#ContactSearchAll option:selected").text();
			$("#CurrentViewText").text(view_text);
			});
			$("#btn-submit-search").on('click',function(){
			view_text=$("#BdcLeadSearchAll2").val();
			$("#CurrentViewText").text("Date View - "+view_text);
			});
			$("#btn-submit-search2").on('click',function(){
			view_text=$("#BdcLeadSearchAllValue").val();
			$("#CurrentViewText").text("Search Query - "+view_text);
			});
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>

