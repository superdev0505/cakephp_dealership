<br />
<br />
<br /><br />

<div class="innerLR">
	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<h4>Stats Dealership</h4>
<!--                        start drop-down-->
<div class="widget widget-body-white">
		<div class="widget-body">
			
			<div class="row">
			
				<div class="col-md-8">

					
					&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 

					<div style="display: inline-block">
						<i class="fa fa-group fa-2x"></i> 
                                                <select id="stat_options" style="display: inline-block;width: auto;" class="form-control" name="data[stat_options]">
                                                    <option value="Select">Select Dealership</option>
                                                    <?php
                                                    foreach ($stat_options as $key => $value) {
                                                        ?>
                                                        <option  zone="<?php echo $value['User']['zone']; ?>" value="<?php echo $value['User']['dealer_id']; ?>"><?php echo $value['User']['dealer_id'].' - '.$value['User']['dealer']; ?></option>

                                                        <?php
                                                    }
                                                    ?>

                                                </select>
                                                    <?php
						//echo $this->Form->select('stat_options', $stat_options, array('value'=>$selected_stats,'class'=>'form-control','style'=>"display: inline-block;width: auto;")); 
                                                ?>
                                        </div>


				</div>
				
			</div>
			
		</div>
	</div>

<!--                        End drop-down-->
                        
                        
<!--                  Start Report-->
                        
                 <div class="widget">
		
		<div class="row row-merge margin-none ">
			<div class="col-md-10">

				<div class="row row-merge margin-none ">
					
					
					<div class="col-md-7">

						<div class="row row-merge margin-none ">

							<div class="col-md-3">
								<div class="innerAll text-center statbox"> 
									<a href="/contacts/leads_main/?quick_lead_search=open_this_month&stat_type=<?php echo $dealer_user; ?>">
									<span class="text-medium strong" id="open_lead_count1"><?php echo $open_lead_count; ?></span><br/>
									Open (Month)
									</a> 
								</div>
							</div>
							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="/contacts/leads_main/?quick_lead_search=closed_this_month&stat_type=<?php echo $dealer_user; ?>">
										<span class="text-medium strong" id="closed_lead_count1"><?php echo $closed_lead_count; ?></span><br/>
										Closed (Month) 
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="/contacts/leads_main/?quick_lead_search=sold_this_month&stat_type=<?php echo $dealer_user; ?>">
										<span class="text-medium strong" id="sold_lead_count1"><?php echo $sold_lead_count; ?></span><br/>
										Sold (Month)
									</a>
								</div>
							</div>

							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="/contacts/leads_main/?quick_lead_search=pending_this_month&stat_type=<?php echo $dealer_user; ?>">
										<span class="text-medium strong" id="pending_lead_count1"><?php echo $pending_lead_count; ?></span><br/>
										Pending (Month)
									</a>
								</div>
							</div>

						</div>



					</div>

					<div class="col-md-5">	

						<div class="row row-merge margin-none ">	

							<div class="col-md-4">
								<div class="innerAll text-center statbox">
									<a href="/contacts/leads_main/?quick_lead_search=Dormant&stat_type=<?php echo $dealer_user; ?>">
										<span class="text-medium strong" id="dormant_lead_count1"><?php echo $dormant_lead_count; ?></span><br/>
										Dormant (48 Hrs) 
									</a>
								</div>
							</div>
							<div class="col-md-4">
								<div class="innerAll text-center statbox">
								<!-- 	<a href="/events/index/?type=today&stat_type=<?php echo $dealer_user; ?>">  -->
									<a href="/contacts/leads_main/?quick_lead_search=today_event_count&stat_type=<?php echo $dealer_user; ?>">
									
										<span class="text-medium strong" id="today_event_count1"><?php echo $today_event_count; ?></span><br/>
										Today (Events) 
									</a>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="innerAll text-center statbox">
								<!-- 	<a href="/events/index/?type=overdue&stat_type=<?php echo $dealer_user; ?>"> -->
								<a href="/contacts/leads_main/?quick_lead_search=overdue_event_count&stat_type=<?php echo $dealer_user; ?>">
										<span class="text-medium strong <?php echo ($overdue_event_count != 0)? "text-danger" : ""; ?>" id="overdue_event_count1"><?php echo $overdue_event_count; ?></span><br/>
										Overdue (Events) 
									</a>
								</div>
							</div>

						</div>


					</div>

				</div>
			
			</div>
			<div class="col-md-2">
			
				<div class="row row-merge margin-none ">
					
					<div class="col-md-12">
						<div class="innerAll text-center statbox"> 
							<a href="/contacts/leads_main/?quick_lead_search=Today&stat_type=<?php echo $dealer_user; ?>">
							<span class="text-medium strong <?php echo ($today_lead_count < 5)? "text-danger" : ""; ?> " style="padding: 2px 22px;" id="today_lead_count1"><?php echo $today_lead_count; ?></span><br/>
							Todays New Leads
							</a> 
						</div>
					</div>
					
				</div>
			
			</div>
		
		</div>
		
	</div>       
                        
<!--              end report          -->
                        
                        
                        
		</div>
            
	</div>
</div>

<script type="text/javascript">
$script.ready('bundle', function() {
        $("#stat_options").change(function(event){
            var zone = $('option:selected', this).attr('zone');
            var dealer_id = $(this).val();

$.ajax({
            url: '/notifications/index/232/'+dealer_id+'/9/',
   type: 'get',
   cache: false,
   data: {'stats_month':"<?php echo date('m');?>",'stats_year':<?php echo date('Y');?>,'zone':zone,'stat_options': 'Dealer'},
   dataType: 'json',
            success: function (response) {
     $("#open_lead_count1").html(response.dashboard_stats.open_lead_count);
     $("#closed_lead_count1").html(response.dashboard_stats.closed_lead_count);
     $("#sold_lead_count1").html(response.dashboard_stats.sold_lead_count);
     $("#pending_lead_count1").html(response.dashboard_stats.pending_lead_count);
     $("#dormant_lead_count1").html(response.dashboard_stats.dormant_lead_count);
     $("#today_event_count1").html(response.dashboard_stats.today_event_count);
     $("#overdue_event_count1").html(response.dashboard_stats.overdue_event_count);
     $("#today_lead_count1").html(response.dashboard_stats.today_lead_count);
			}
			
});
                
                
	});
        
                
              });
</script>