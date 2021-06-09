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
								foreach($PostsaleSections as $SecId=>$SecName){

									if(strpos($SecName['name'],'BDC')!=false){
										$style = ' style="background: none repeat scroll 0 0 #ab7a4b; border-color: #ab7a4b;color: #fff;"';
									}else{
										$style = 'style="background-color:#3695d5;color:#fff;"';
									}
								?>
								
									<div class="widget">
											<div class="widget-head" <?php echo $style;?>>
													<h4 class="heading" ><?php echo $SecName['name'];?>  <span style="padding-left:10px;color:#fff;font-weight:bold;" id="PostsaleTotal_<?php echo $SecId;?>">

													(Total Records - Not Worked: <?php echo $section_count[$SecId]['Count_not_worked']['0']['0']['count']; ?>, Worked: <?php echo $section_count[$SecId]['Countworked']['0']['0']['count'];?>)

													</span></h4>

													<button class='btn btn-inverse btn-xs' id="btn_load_<?php echo $SecId;?>">
														<i class="fa fa-refresh"></i> Load
													</button>
													
													&nbsp;&nbsp;&nbsp;
											 		<label>
														<input onclick="show_hide_completed('<?php echo $SecId;?>','/daily_recaps/GetPostsaleSection/<?php echo $SecId;?>','ew_container_<?php echo $SecId;?>')" name="show-completed-checkbox" id="show-completed-checkbox_<?php echo $SecId;?>" type="checkbox"  /> Show Completed
													</label>


													<div style="float:right;display:inline;">
														Show <select name="SelRecSize_<?php echo $SecId;?>" id="SelRecSize_<?php echo $SecId;?>" onchange="SelRecordsLimitInSec('<?php echo $SecId;?>','ew_container_<?php echo $SecId;?>','/daily_recaps/GetPostsaleSection/<?php echo $SecId;?>')">
															<?php echo $RecordsPerSec;?>
														</select> Records
													</div>
											</div>
											<div class="widget-body innerAll postsale" id="ew_container_<?php echo $SecId;?>">
													Click Load button to show leads
											</div>
											
											<script>
											<?php if($cnt == 1){ ?>

												$.ajax({
														url: "/daily_recaps/GetPostsaleSection/<?php echo $SecId;?>/<?php echo $DefaultRecs;?>/<?php echo $selected_stats;?>",
														type : 'POST',
														tryCount : 0,
														retryLimit : 3,
														success : function(data) {
															$("#ew_container_<?php echo $SecId;?>" ).html(data);
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

												$("#btn_load_<?php echo $SecId;?>").click(function(){

													$.ajax({
														url: "/daily_recaps/GetPostsaleSection/<?php echo $SecId;?>/"+ $("#SelRecSize_<?php echo $SecId;?>").val() +"/<?php echo $selected_stats;?>?completed="+$("#show-completed-checkbox_<?php echo $SecId;?>").is(":checked"),
														type : 'POST',
														tryCount : 0,
														retryLimit : 3,
														success : function(data) {
															$("#ew_container_<?php echo $SecId;?>" ).html(data);
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