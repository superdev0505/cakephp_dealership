
<!-- row-app -->
<div class="row row-app">

	<!-- col -->
		<!-- col-separator.box -->
		<div class="col-separator col-unscrollable box">
			
			<!-- col-table -->
			<div class="col-table">
				
				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-lock"></i> Reset Password</h4>

				<!-- col-table-row -->
				<div class="col-table-row">

					<!-- col-app -->
					<div class="col-app col-unscrollable">

						<!-- col-app -->
						<div class="col-app">
							<div class="login">
								<br/>
								<div class="panel panel-default col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4">
							     <br /> 
           						 <?php echo $this->Session->flash('flash', array('element' => 'alertnew')); ?> 
 								  <div class="panel-body">
										<div align="center">
										<?php if($success): ?>
										<?php echo $this->Html->link('Take me to Login page',array('controller'=>'users','action'=>'login'),array('class'=>'btn btn-info','escape'=>false)); ?>
										<?php else:?>
										<?php echo $this->Html->link('Reset password again',array('controller'=>'users','action'=>'forgot'),array('class'=>'btn btn-info','escape'=>false)); ?>
										<?php echo $this->html->link('Cancel',array('controller'=>'users','action'=>'login'),array('class'=>'btn btn-info','escape'=>false)); ?>
										<?php endif;?>
											 										

										</div>

 
								   
								  </div>
								
								</div>
 
							
							</div>


						</div>
						<!-- // END col-app -->

					</div>
					<!-- // END col-app.col-unscrollable -->

				</div>
				<!-- // END col-table-row -->
			
			</div>
			<!-- // END col-table -->
			
		</div>
		<!-- // END col-separator.box -->


</div>
<!-- // END row-app -->
