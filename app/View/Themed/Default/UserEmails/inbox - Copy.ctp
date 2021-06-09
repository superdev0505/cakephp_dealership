</br>
</br>
</br>
</br>

<div class="layout-app">
	<div class="row row-app email">
		<!-- col -->
		<div class="col-md-12">
			<!-- col-separator.box -->
			<div class="col-separator col-unscrollable box col-separator-first">
				<div class="row row-app">
					<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
					<div class="col-lg-4 col-md-6" id="email_list">
						<div class="col-separator col-unscrollable box">
							<div class="col-table">
								<div class="input-group input-group-lg border-bottom"> <span class="input-group-btn"> <a href="" class="btn"><i class="fa fa-search text-muted"></i></a> </span>
									<input type="text" class="form-control border-none" placeholder="Search">
								</div>
								<div class="col-table-row">
									<div class="col-app col-unscrollable">
										<div class="col-app">
											<div class="list-group email-item-list">
												<?php
													//pr($data);
													foreach($data as $email)
													{
												?>
												<a href="javascript:void(0)" class="list-group-item showdetail" id="<?php echo $email['UserEmail']['id']; ?>"> <span class="innerTB display-block"> <span class="media"> <span class="pull-left text-center innerLR innerT display-block half"> <i class="fa fa-fw fa-heart text-muted"></i> </span> <span class="media-body display-block innerR"> <span class="media display-block innerB"> <img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="" width="40" class="pull-left" /> <span class="media-body display-block"> <small class="text-muted pull-right"><?php echo date('d M',strtotime($email['UserEmail']['received_date'])); ?></small>
												<h5><?php echo $email['UserEmail']['subject']; ?></h5>
												<!-- <i class="fa fa-flag text-primary"></i> -->
												</span> <span class="clearfix"></span> </span>
												<p class="margin-none text-larger text-muted-darker"> <?php echo $email['UserEmail']['message']; ?> </p>
												</span> </span> </span> </a>
												<?php
													}
													?>
											</div>
											<!-- // END list-group -->
										</div>
										<!-- // END col-app -->
									</div>
									<!-- // END col-app -->
								</div>
								<!-- // END col-table-row -->
							</div>
							<!-- // END col-table -->
						</div>
						<!-- // END col-separator -->
					</div>
					<!-- // END col -->
					<div class="col-lg-8 col-md-6 hidden-sm hidden-xs" id="email_details">
						<div class="col-separator col-unscrollable col-separator-last">
							<div class="col-table" >
								<div class="innerAll border-bottom bg-gray text-center">
									<div class="btn-group btn-group-sm"> 
										<a href="/user_emails/reply/<?php echo $id; ?>" class="btn btn-default"> <i class="fa fa-reply"></i></a>
										<a href="javascript:void(0)" onclick="deleteemail('<?php echo $id; ?>')" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>
									</div>
									<button class="btn btn-sm btn-inverse" id="close-email-details"><i class="fa fa-fw fa-times"></i></button>
								</div>
								<div class="col-table-row">
									<div class="col-app col-unscrollable">
										<div class="col-app">
							<?php
									//pr($data);
									$i = 1;
									foreach($data as $email)
									{
										$id= $email['UserEmail']['id'];
										$display = 'block';
										if($i > 1){
											$display = 'none';
										}
										$i++;
								?>
								
											<div class="innerAll border-bottom inner-2x" >
												<div class="media innerB"> <img src="/app/View/Themed/Default/webroot/assets/images/icon-user-51x51.png" alt="" width="50" class="pull-left" />
													<div class="media-body innerT half"> <small class="text-muted pull-right"><?php echo date('d M Y',strtotime($email['UserEmail']['received_date'])); ?></small>
														<h5 class="text-muted-darker"><?php echo $email['UserEmail']['sender_name']; ?> <span class="text-weight-regular">(Me)</span></h5>
														<h5 class="text-muted-dark text-weight-normal">To: <?php echo $email['UserEmail']['receiver_name']; ?></h5>
													</div>
													<div class="clearfix"></div>
												</div>
												<h4 class="innerT margin-none"><i class="fa fa-fw fa-circle-o text-success"></i> RE: <?php echo $email['UserEmail']['subject']; ?></h4>
											</div>
											<div class="innerAll">
												<div class="innerAll">
													<p><?php echo $email['UserEmail']['message']; ?></p>
													<p class="text-muted margin-none">Regards,<br/>
														mosaicpro </br>
														Director @ mosaicpro.biz</br>
														www.mosaicpro.biz</p>
												</div>
											</div>
											<div class="innerAll bg-gray border-top">
												<div class="media inline-block margin-none">
													<div class="innerLR"> <i class="fa fa-paperclip pull-left fa-2x"></i>
														<div class="media-body">
															<div><a href="" class="strong text-regular">Project.zip</a></div>
															<span>15 MB</span> </div>
														<div class="clearfix"></div>
													</div>
												</div>
												<div class="media inline-block margin-none">
													<div class="innerLR border-left"> <i class="fa fa-file pull-left fa-2x"></i>
														<div class="media-body">
															<div><a href="" class="strong text-regular">Contract.pdf</a></div>
															<span>244 KB</span> </div>
														<div class="clearfix"></div>
													</div>
												</div>
											</div>
											<div class="col-separator-h box"></div>
							<?php 	} ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end col 2 -->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
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
				<div class="pull-left"> <a href="" class=" btn btn-default btn-sm"><i class="fa fa-fw fa-arrow-left"></i> back</a> </div>
				<div class="pull-left innerL"> <a href="" class=" btn btn-success btn-sm strong"><i class="fa fa-fw icon-paperclip"></i> Save Draft</a> </div>
				<a href="" class="pull-right btn btn-primary btn-sm strong"><i class="fa fa-fw icon-outbox-fill"></i> Send Email</a>
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
			<div class="innerAll text-center border-top"> <a href="" class="btn btn-default"><i class="fa fa-fw icon-crossing"></i> Cancel</a> <a href="" class="btn btn-primary"><i class="fa fa-fw icon-outbox-fill"></i> Send email</a> </div>
		</div>
	</div>
</div>
<!-- // Modal END -->

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
