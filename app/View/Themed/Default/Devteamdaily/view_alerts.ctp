

<div class="innerLR">
<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
<?php
					//pr($report_results );
					foreach($all_alerts as $alert){ 
					
					?>
<div class="col-table-row">
										<div class="col-app col-unscrollable">
											<div class="col-app">
							
												<div class="innerAll border-bottom inner-2x" >
													<div class="media innerB"> 
														
														<div class="media-body innerT half">
                                                       
															<small class="text-muted pull-right"><?php echo date('M d, Y h:i A',strtotime($alert['UpdateAlert']['created'])); ?></small>
												
															
														</div>
														<div class="clearfix"></div>
													</div>
													<h4 class="innerT margin-none"><i class="fa fa-fw fa-circle-o text-success"></i> <?php echo $alert['UpdateAlert']['header']; ?></h4>
                                                   
												</div>
												<div class="innerAll">
													<div class="innerAll">
														<p style="overflow: auto;max-height: 194px;"><?php echo $alert['UpdateAlert']['message']; ?></p>
													</div>
												</div>
												
												<div class="col-separator-h box"></div>
												 <?php 
											$user_id=AuthComponent::user('id');
											if(!preg_match("/".$user_id."/",$alert['UpdateAlert']['hide_user_ids'])){ ?>
                                            			
                             <a href="#" class="btn btn-info pull-right read_alert no-ajaxify" data-id="<?php echo $alert['UpdateAlert']['id']; ?>">Read</a>                           
                                                        <?php } ?>
                                                        <br /><br />
												
											</div>
										</div>
									</div>
                                  <hr />
                                    <?php } ?>
									

    </div>
 <script type="text/javascript">
 $(document).ready(function(){
							
			$("a.read_alert").on('click',function(e){
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
								
												  
						 });
			
							});
 
 </script>