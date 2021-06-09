
<!-- row-app -->
<div class="row row-app">

	<!-- col -->
		<!-- col-separator.box -->
		<div class="col-separator col-unscrollable box">
			
			<!-- col-table -->
			<div class="col-table">
				
				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-lock"></i> Forgot your password?</h4>

				<!-- col-table-row -->
				<div class="col-table-row">

					<!-- col-app -->
					<div class="col-app col-unscrollable">

						<!-- col-app -->
						<div class="col-app">
							<div class="login">
								<br/>
								<div class="panel panel-default col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-4"></br>
<div align="center">
<img src="http://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" title="Dealership Performance CRM" alt="Dealership Performance CRM" />
</div>
							   
           						 <?php echo $this->Session->flash('flash', array('element' => 'alertnew')); ?> 
 								  <div class="panel-body">
								  	<!--<form role="form" action="index.html?lang=en">-->
									<?php echo $this->Form->create('User',array('action'=>'forgot','class'=>'form-horizontal','role'=>"form" )); ?>

								  	  <div class="form-group">
 										<?php echo $this->Form->label('username', 'Please enter your username'); ?>
 										<?php echo $this->Form->input('username',array('type'=>'text', 'div'=>false,'label'=>false,'placeholder'=>"Enter Username",'class'=>'form-control')); ?>
									  </div>
 
									  <button type="submit" class="btn btn-primary btn-block">Send Reset Link</button>
 
 
 								<div class="col-sm-4 col-sm-offset-4 text-center">
									<div class="innerAll">
									 
	 										<?php echo $this->html->link('Back to Login',array('controller'=>'users','action'=>'login'),array('class'=>'btn btn-inverse no-ajaxify','escape'=>false)); ?>
									</div>
								</div>
 
									<?php echo $this->Form->end(); ?>
									
 								   
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
