<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</br></br></br></br>
<div class="layout-app">
	<div class="row row-app">
		
		<div class="col-md-12">
			
			<div class="col-separator col-separator-first box">
				
				<div class="innerAll border-bottom">
					<!--
					<div class="pull-left">
						<a href="email.html?lang=en" class=" btn btn-default btn-sm"><i class="fa fa-fw fa-arrow-left"></i> back</a> 
					</div>
					<div class="pull-left innerL">
						<a href="email.html?lang=en" class=" btn btn-success btn-sm strong"><i class="fa fa-fw icon-paperclip"></i> Save Draft</a>
					</div>
					<a href="email.html?lang=en" class="pull-right btn btn-primary btn-sm strong"><i class="fa fa-fw icon-outbox-fill"></i> Send Email</a>
					<div class="clearfix"></div>-->
				</div>
				<?php echo $this->Form->create('UserEmail', array('id' => 'EmailForm', 'controller' => 'user_emails', 'action' => 'reply/'.$id,'enctype'=>'multipart/form-data')); ?>
				
				<div class="bg-gray innerAll">
					<form class="form-horizontal innerR" role="form">
						<div class="form-group">
							<label for="to" class="col-sm-2 control-label">To:</label>
							<div class="col-sm-10">
								<div class="input-group">
									
									<!--<input type="text" class="form-control" id="to" name="data[UserEmail][email_replyto]">-->									
									<?php
									echo $this->Form->input('UserEmail.user_id', array('type' => 'select', 'options' => $userlists,'empty'=>'Select Users','label'=>false,'value'=>$data['UserEmail']['user_id']));
									?>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="to" class="col-sm-2 control-label">Cc:</label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" id="to" name="data[UserEmail][cc]" ,value= "<?php echo $data['UserEmail']['cc']; ?>">	

									<input type="hidden" class="form-control" id="to" name="data[UserEmail][id]" ,value= "<?php echo $data['UserEmail']['id']; ?>">											
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="to" class="col-sm-2 control-label">Bcc:</label>
							<div class="col-sm-10">
								<div class="input-group">
									<input type="text" class="form-control" id="to" name="data[UserEmail][bcc]" ,value="<?php echo $data['UserEmail']['bcc']; ?>">									
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="Bcc" class="col-sm-2 control-label">From:</label>
							<div class="col-sm-6">
								<input type="text" readonly class="form-control" id="to" name="data[UserEmail][email_from]"  value="<?php echo $setting['Setting']['email_from']; ?>" >
							</div>
						
						</div>
						
						<div class="form-group">
							<label for="Bcc" class="col-sm-2 control-label">Subject:</label>
							<div class="col-sm-6">
						<input type="text"  class="form-control" id="to" name="data[UserEmail][subject]" ,
								value="RE:<?php echo $data['UserEmail']['subject']; ?>">
							</div>
						
						</div>

						<div class="clearfix"></div>
				
				</div>
				
				<hr class="margin-none"/>
				<div class="innerAll inner-2x">
					<textarea name="data[UserEmail][message]" class="notebook border-none form-control padding-none" rows="8" style="width:700px;" placeholder="Write your content here..."><?php echo $data['UserEmail']['message']; ?></textarea>
					<div class="clearfix"></div>
				</div>
				<div class="col-separator-h"></div>
				<div class="innerAll text-center">
					<a href="/user_emails/inbox" class="btn btn-default"><i class="fa fa-fw icon-crossing"></i> Cancel</a>
					<a href="javascript:void(0)" class="btn btn-primary" id="sendbutton"><i class="fa fa-fw icon-outbox-fill"></i> Send email</a>
				</div>
			</div>
		</div>
		
	</div>
</div>


<?php echo $this->Form->end(); ?>


<!-- Modal -->
<div class="modal fade" id="modal-compose">
	
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal heading -->
			<!-- <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Login</h3>
			</div> -->
			<!-- // Modal heading END -->

			<div class="innerAll border-bottom">
				<div class="pull-left">
					<a href="" class=" btn btn-default btn-sm"><i class="fa fa-fw fa-arrow-left"></i> back</a> 
				</div>
				<div class="pull-left innerL">
					<a href="" class=" btn btn-success btn-sm strong"><i class="fa fa-fw icon-paperclip"></i> Save Draft</a>
				</div>
				<a href="javascript:void(0)" class="pull-right btn btn-primary btn-sm strong"><i class="fa fa-fw icon-outbox-fill"></i> Send Email</a>
				<div class="clearfix"></div>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body padding-none">
				
				<form class="form-horizontal" role="form">
					<div class="bg-gray innerAll border-bottom">
						<div class="innerLR">
							<div class="form-group">
								<label for="to" class="col-sm-2 control-label">To:</label>
								<div class="col-sm-10">
									<div class="input-group">
										<input type="text" class="form-control" id="to">
										<div class="input-group-btn">
											<button type="button" data-toggle="collapse" data-target="#cc" class="btn btn-default">CC/BCC <span class="caret"></span></button>
										</div>
									</div>
								</div>
							</div>
							<div id="cc" class="collapse">
								<div class="form-group">
									<label for="Cc" class="col-sm-2 control-label">Cc:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="Cc">
									</div>
								</div>
								<div class="form-group">
									<label for="Bcc" class="col-sm-2 control-label">Bcc:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="Bcc">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="Bcc" class="col-sm-2 control-label">From:</label>
								<div class="col-sm-6">
									<select class="selectpicker">
										<option>contact@mosaicpro.biz</option>
									</select>
								</div>
							
							</div>

							<div class="form-group">
								<label for="Bcc" class="col-sm-2 control-label">Signature:</label>
								<div class="col-sm-6">
								<select class="selectpicker">
									<option>Select Signature</option>
								</select>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

					<div class="innerAll inner-2x">
						<textarea class="notebook border-none form-control padding-none" rows="4" placeholder="Write your content here..."></textarea>
						<div class="clearfix"></div>
					</div>
				</form>

			</div>
			<!-- // Modal body END -->

			<div class="innerAll text-center border-top">
				<a href="" class="btn btn-default"><i class="fa fa-fw icon-crossing"></i> Cancel</a>
				<a href="javascript:void(0)" class="btn btn-primary" id="sendbutton"><i class="fa fa-fw icon-outbox-fill"></i> Send email</a>
			</div>
	
		</div>
	</div>
	
</div>
<!-- // Modal END -->

	
	
		
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		
<script>

$("#sendbutton").click(function() {
	//alert('submit');
	$('#EmailForm').submit();
});
</script>

