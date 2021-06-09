

<div class="innerLR">
<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
<?php
					//pr($report_results );
					
					
					?>
<div class="col-table-row">
										<div class="col-app col-unscrollable">
											<div class="col-app">
							
												<div class="innerAll border-bottom inner-2x" >
													<div class="media innerB"> 
														
														<div class="media-body innerT half">
                                                       
															<small class="text-muted pull-right"><?php echo date('M d, Y h:i A',strtotime($update_alert['UpdateAlert']['created'])); ?></small>
												
															
														</div>
														<div class="clearfix"></div>
													</div>
													<h4 class="innerT margin-none"><i class="fa fa-fw fa-circle-o text-success"></i> <?php echo $update_alert['UpdateAlert']['header']; ?></h4>
                                                   
												</div>
												<div class="innerAll">
													<div class="innerAll">
														<p style="overflow: auto;max-height: 194px;"><?php echo $update_alert['UpdateAlert']['message']; ?></p>
													</div>
												</div>
												
												<div class="col-separator-h box"></div>
								
                                                     
												
											</div>
										</div>
									</div>
                                  <hr />
                                  
									

    </div>
 <script type="text/javascript">
 $(document).ready(function(){
						
			<?php if($system_update_alert ==0){ ?>	
					$("span#system_update_alert").remove();
			<?php }else{ ?>
					$("span#system_update_alert").text('Update-<?php echo $system_update_alert; ?>');
			<?php } ?>
			/*$("a.read_alert").on('click',function(e){
								e.preventDefault();
								alert_id=$(this).attr('data-id');
								$.ajax({
								type: "GET",
								cache: false,
								url: '/supports/hide_alert/'+alert_id,
								success: function(data){
									if(data=='0')
									{
										$("span#system_update_alert").remove();
									}else
									{
										$("span#system_update_alert").text('Update-'+data);
									}
									}
								});
								$(this).remove();
								
												  
						 });*/
			
							});
 
 </script>