
<!-- row-app -->
<div class="row row-app" style="height: 100%">

	<!-- col -->
		<!-- col-separator.box -->
		<div class="col-separator col-unscrollable box">

			<!-- col-table -->
			<div class="col-table">

				<h4 class="innerAll margin-none border-bottom text-center bg-primary"><i class="fa fa-lock"></i> Login to your Account</h4>

				<!-- col-table-row -->
				<div class="col-table-row">

					<!-- col-app -->
					<div class="col-app col-unscrollable">
						<!-- col-app -->
						<div class="col-app">
							<div class="login">
								<br/>
								<div class="panel panel-default col-md-4  col-sm-offset-3 col-md-offset-4">
</br><div align="center">
<img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" title="Dealership Performance CRM" alt="Dealership Performance CRM" />
</div>
           						 <?php echo $this->Session->flash('flash'); ?>
 								  <div class="panel-body">
								  	<!--<form role="form" action="index.html?lang=en">-->
									<?php echo $this->Form->create('User',array('class'=>'form-horizontal apply-nolazy','role'=>"form" )); ?>



									  <div class="form-group">
 										<?php echo $this->Form->label('username', 'Username'); ?>
 										<?php echo $this->Form->input('username',array('type'=>'password', 'div'=>false,'label'=>false,'placeholder'=>"Enter Username",'class'=>'form-control')); ?>
									  </div>
									  <div class="form-group">
  										<?php echo $this->Form->label('password', 'Password'); ?>
 										<?php echo $this->Form->input('password',array('type'=>'password','div'=>false,'label'=>false, 'placeholder'=>"Password",'class'=>'form-control')); ?>
									  </div>

									  <button type="submit" class="btn btn-primary btn-block">Login</button>

									  <div class="checkbox">
									    <label>
									      <input type="checkbox"> Remember my details
									    </label>
									  </div>
									<?php echo $this->Form->end(); ?>

								   	<div class="col-sm-12 col-sm-offset-0 text-center padding-none">
										<div class="separator"></div>
										<?php echo $this->html->link('Mobile Log&nbsp;<i class="fa fa-mobile-phone"></i>',"https://mobile.dealershipperformancecrm.com",array('class'=>'btn btn-inverse no-ajaxify','escape'=>false)); ?>
										<?php echo $this->html->link('Forgot?',"mailto:support@dp360crm.com?subject=DP360 CRM - Login Support",array('class'=>'btn btn-danger no-ajaxify','escape'=>false)); ?>
										<?php echo $this->html->link('Support&nbsp;<i class="fa fa-medkit"></i>',"mailto:support@dp360crm.com;dealerleads@dp360crm.com?subject=DP360 CRM - Login Support",array('class'=>'btn btn-warning no-ajaxify','escape'=>false)); ?>
										<?php //echo $this->html->link('Create New&nbsp;<i class="fa fa-pencil"></i>',array('controller'=>'users','action'=>'register'),array('class'=>'btn btn-success no-ajaxify','escape'=>false)); ?>
                                                                                 <?php echo $this->element('support'); ?>
									</div>
									<div class="clearfix"></div>
								  </div>
									<p align="center">&#169; Dealership Performance CRM LLC - All Rights Reserved.</p>

									<a href='http://www.google.com/chrome/' target="_blank" style='margin-bottom: 8px; display: block; text-align: center'>
										<img src='https://dpcrm.s3.amazonaws.com/logo/google_chrome_best.jpg' alt='Download Chrome'>
									</a>

								</div>







								<div class="col-sm-4 col-sm-offset-4 text-center">
									<div class="innerAll">

										<?php echo $this->element('sql_dump'); ?>

										<div class="separator"></div>
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

			</div>
			<!-- // END col-table -->

		</div>
		<!-- // END col-separator.box -->


</div>
<!-- // END row-app -->
