<!-- col-table-row -->
				<div class="col-table-row">

					<!-- col-app -->
					<div class="col-app col-unscrollable">

						<!-- col-app -->
						<div class="col-app">
							<div class="login">
								<div class="placeholder text-center"><span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span></div>
								<div class="panel panel-default col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">

								  <div class="panel-body">
								  <div class="form-group">
								 

				<?php 
				// debug(AuthComponent::user('password'));
				// debug(AuthComponent::user('id'));
				// debug( $this->request->params['pass']['0'] );


				?>			
							<a class="btn btn-default btn-block no-ajaxify active" href="https://mobile.dealershipperformancecrm.com/users/qr?inv_no=<?php echo $this->request->params['pass']['0']; ?>&api_usr=<?php echo AuthComponent::user('id'); ?>&api_key=<?php echo $apikey; ?>">Start New Lead</a>	

							

								  </div> <div class="form-group">
								  <?php 
								  echo $this->Html->link('Vehicle Specification',
									array('controller'=>'dealer_settings',
									'action'=>'detail_xmlinventory',
									$xml_inv_id),
									array('class'=>"btn btn-default btn-block no-ajaxify active"));
									?>
								  </div><div class="form-group">
								  <?php 
								  echo $this->Html->link('New Worksheet',
									array('controller'=>'deals',
									'action'=>'worksheet',
									$xml_inv_id),
									array('class'=>"btn btn-default btn-block no-ajaxify active"));
									?>
								   </div><div class="form-group">
								   <?php 
								  echo $this->Html->link('Email Broucher',
									array(),
									array('class'=>"btn btn-default btn-block no-ajaxify active"));
									?>
								  
								  </div>
								  <div class="form-group">
								   <?php 
								  echo $this->Html->link('Mobile Setting',
									array(),
									array('class'=>"btn btn-default btn-block no-ajaxify active"));
									?>
								  
								  </div>
								
								</div>
								
								<div class="clearfix"></div>
							
							</div>


						</div>
						<!-- // END col-app -->

					</div>
					<!-- // END col-app.col-unscrollable -->

				</div>
				
				<!-- // END col-table-row -->




