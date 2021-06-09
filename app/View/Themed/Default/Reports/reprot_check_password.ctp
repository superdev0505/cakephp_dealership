<br />
<br />
<br />
<br /><br />
<br />
<div class="innerLR">
							<div class="panel panel-default col-md-4  col-sm-offset-3 col-md-offset-4">
           						


 								  <div class="panel-body">
								  	<!--<form role="form" action="index.html?lang=en">-->
									<?php echo $this->Form->create('Dealer',array('class'=>'form-horizontal apply-nolazy','role'=>"form" )); ?>
 								<?php echo $this->Session->flash('flash'); ?> 
								  	  <div class="form-group">

								  	  

 										<?php echo $this->Form->label('password', 'Dealer Password'); ?>
 										<?php echo $this->Form->input('password',array('type'=>'password', 'required'=>'required', 'div'=>false,'label'=>false,'placeholder'=>"Enter Dealer Password",'class'=>'form-control')); ?>
									  </div>
									  
									  

									  <button type="submit" class="btn btn-primary btn-block">Login</button>

									  
									<?php echo $this->Form->end(); ?>

								   	
									<div class="clearfix"></div>
								  </div>									
								</div>

								
</div>									
 
							

								
							
							