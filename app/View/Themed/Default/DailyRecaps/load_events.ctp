<?php
/**
 * Below form is added for periodic events search functionality.
 * Form contains date range picker.
 * And a search button, on whose click ajax call is rendered,
 * Which shows data.
 *
 * @author Abha Sood Negi
 */
?>
<div class="widget">
	<?php echo $this->Form->create('EventsPeriodSearch', array('class' => 'form-inline no-ajaxify', 'id' => 'EventsPeriodSearchIndexForm' )); ?>
		<div class="row" style="margin: auto; padding: 15px;">
			<input type='hidden' name='event_s_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 'event_s_d_range'>
			<input type='hidden' name='event_e_d_range' value='<?php echo date("Y-m-d",strtotime("now")); ?>' id = 'event_e_d_range'>

			<div class="col-md-2">
				<?php echo $this->Form->label('range','Period:', array('class'=>'strong')); ?>
			</div>

			<div id="event_reportrange" class="col-md-3" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc;display:inline">
				<div style="width:100%">
					<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
					<?php echo date("F j, Y",strtotime("now")); ?>
					<b class="caret"></b>
				</div>
			</div>

			<div class="col-md-2">
				<button type="button" id="btn_do_events_search" class="btn btn-primary btn-sm">Search</button> &nbsp;
			</div>

			<div class="col-md-8">&nbsp;</div>
		</div>
	<?php echo $this->Form->end(); ?>
	<div id="events_period_search_result"></div>
</div>
<?php // Abha's Code ends. ?>

<?php

$RecordsPerSec = '';
for($i=4;$i<=100;$i=($i+4)){
	if($DefaultRecs==$i){
		$RecordsPerSec .= "<option value='$i' selected='selected'>$i</option>";
	}else{
		$RecordsPerSec .= "<option value='$i'>$i</option>";
	}
}
						$cnt = 1;
								foreach($EventSections as $SecId=>$SecName){
									
									if($SecId==3){ /* all BDC get that Warining background - */
										$style = ' style="background: none repeat scroll 0 0 #ab7a4b; border-color: #ab7a4b;color: #fff;"';
									}else{
										$style = 'style="background-color:#3695d5;color:#fff;"';
									}
								?>
								
									<div class="widget">
											<div class="widget-head" <?php echo $style;?>>
													<h4 class="heading" ><?php echo $SecName['name'];?> <span style="padding-left:10px;color:#fff;font-weight:bold;" id="EventTotal_<?php echo $SecId;?>"> 
														(Total Records - <?php echo $section_count[$SecId]['0']['0']['count'];?>)
													</span> </h4>

													<button class='btn btn-inverse btn-xs' id="btn_load_event_<?php echo $SecId;?>">
														<i class="fa fa-refresh"></i> Load
													</button>


													<div style="float:right;display:inline;">
													Show <select name="SelRecSize_<?php echo $SecId;?>" id="SelRecSize_<?php echo $SecId;?>" onchange="SelRecordsLimitInSec('<?php echo $SecId;?>','ew_container_<?php echo $SecId;?>','/daily_recaps/GetEventSection/<?php echo $SecId;?>')">
															
															<?php echo $RecordsPerSec;?>
														</select> Records
													</div>
											</div>
											<div class="widget-body innerAll event" id="ew_container_<?php echo $SecId;?>">
													Click Load button to show leads
											</div>
											
											<script>

											<?php if($cnt == 1){ ?>
												$.ajax({
													url: "/daily_recaps/GetEventSection/<?php echo $SecId;?>/<?php echo $DefaultRecs;?>/<?php echo $selected_stats;?>",
													type : 'POST',
													tryCount : 0,
													retryLimit : 3,
													success : function(data) {
														$( "#ew_container_<?php echo $SecId;?>" ).html(data);
														ShowCompleted();
													},
													error : function(xhr, textStatus, errorThrown ) {
														if (textStatus == 'error') {
															this.tryCount++;
															if (this.tryCount <= this.retryLimit) {
																//try again
																$.ajax(this);
																return;
															}            
															return;
														}
														
													}
												});
											<?php } ?>	

											$("#btn_load_event_<?php echo $SecId;?>").click(function(){

												$.ajax({
													url: "/daily_recaps/GetEventSection/<?php echo $SecId;?>/<?php echo $DefaultRecs;?>/<?php echo $selected_stats;?>",
													type : 'POST',
													tryCount : 0,
													retryLimit : 3,
													success : function(data) {
														$( "#ew_container_<?php echo $SecId;?>" ).html(data);
														ShowCompleted();
													},
													error : function(xhr, textStatus, errorThrown ) {
														if (textStatus == 'error') {
															this.tryCount++;
															if (this.tryCount <= this.retryLimit) {
																//try again
																$.ajax(this);
																return;
															}            
															return;
														}
													}
												});

											});
											</script>
									</div>
								<?php
								$cnt++;
								}
								?>

<?php
/**
 * Below date range picker settings.
 * And an ajax call to get data,
 * Data is shown in div.
 *
 * @author Abha Sood Negi
 */
?>
<script type="text/javascript">
	$script.ready('bundle', function() {
		$('#event_reportrange div').daterangepicker({
	        singleDatePicker: true,
	        showDropdowns: true,
	        minDate: '<?php echo date("m/d/Y",strtotime("now")); ?>'
	    }, 
	    function(start, end, label) {
	    	var htmlDiv = '<i class="glyphicon glyphicon-calendar fa fa-calendar"></i> '+end.format("MMMM D, YYYY")+' <b class="caret"></b>';
	        $('#event_reportrange div').html(htmlDiv);
			$("#event_s_d_range").val( '<?php echo date("Y-m-d",strtotime("now")); ?>' );
			$("#event_e_d_range").val( end.format('YYYY-MM-DD') );
	    });

		$("#btn_do_events_search").click(function(){
  			search_url = "/daily_recaps/doEventsPeriodSearch";
			search_data = $("#EventsPeriodSearchIndexForm").serialize();

	  		$.ajax({
				url: search_url,
				type: "POST",
				data: search_data,
				cache: false,
				success: function(data){
					$("#events_period_search_result").html(data);
				}
			});
  		});

	});
</script>
<?php // Abha's Code ends. ?>