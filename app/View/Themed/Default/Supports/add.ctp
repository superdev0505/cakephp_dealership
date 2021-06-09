<br />
<br />
<br />
<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php

  date_default_timezone_set('America/Los_Angeles');
$date = new DateTime();
//date_default_timezone_set($zone);
$datetime = date('l F jS, Y - h:i:s A');
//echo $datetime;
?>
<?php
$date = new DateTime();
//date_default_timezone_set($zone);

$datetime2 = date('Y-m-d - h:i:s');
//echo $datetime2;
?>
<br />

<div class="innerLR">
	<div class="widget">
		<!-- Form Wizard / Widget Pills -->
		<div class="wizard">
			<div class="widget-head bg-primary">
				<div class="pull-left"> <span class="heading strong-text-white "><i class="fa fa-medkit fa-2x"></i>&nbsp;DP360 CRM Support-Ticket</span> </div>
				<div class="pull-right"> <span class="strong innerLR"> <?php echo $datetime; ?>&nbsp;- <i><span class="label label-white label">No Outages Reported</span></i></span> </div>
				<div class="clearfix"></div>
			</div>

			<div class="widget-body">
				<div class="innerLR">

					<?php echo $this->Session->flash('flash', array('element' => 'session_message')); ?>
					<?php echo $this->Form->create('Support',array('class'=>'form-horizontal apply-nolazy','role'=>"form",'type'=>'post')); ?>


					<div class="form-group">
					<?php echo $this->Form->label('sevarity', 'Severity of support:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('sevarity',array('type'=>'select',
								'options'=>array(
									'Normal'=>'Normal - Please contact when available',
									'High'=>'High - Useable but needs repair',
									'Urgent'=>'Urgent - Immediate Support is needed'
								),'required'=>'required', 'div'=>false,'label'=>false,'empty'=>"Select",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('title', 'Support Title:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('title',array('type'=>'text','required'=>'required', 'div'=>false,'label'=>false,'placeholder'=>"Enter title",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('direct_phone', 'Direct Phone Number:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('direct_phone',array('type'=>'text','required'=>false, 'div'=>false,'label'=>false,'placeholder'=>"Direct Phone Number",'class'=>'form-control', 'required'=>'required')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('email', 'Email:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('email',array('type'=>'text','required'=>false, 'div'=>false,'label'=>false,'placeholder'=>"Enter Email",'class'=>'form-control')); ?> </div>
					</div>
					<div class="form-group"> <?php echo $this->Form->label('description', 'Support Description:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-10"> <?php echo $this->Form->input('description',array('type'=>'textarea','required'=>'required', 'rows'=>5, 'div'=>false,'label'=>false,'placeholder'=>"Enter Description",'class'=>'form-control')); ?> </div>
					</div>


					<div class="row" >
						<div class="col-md-2"  >
						</div>
						<div class="col-md-10"  >

							<div class="row" >
								<div class="col-md-7"  >
									<br>
									File Attachment

									<div id="file_attachment_list"></div>

								</div>
								<div class="col-md-5">
									<br>

									<input type="hidden" id="key_s3" name="key" value="<?php echo $filename; ?>${filename}">
									<input type="hidden" id="AWSAccessKeyId_s3" name="AWSAccessKeyId" value="AKIAJCHHC37LYOABAIIQ">
									<input type="hidden" id="acl_s3" name="acl" value="private">
									<input type="hidden" id="success_action_redirect_s3" name="success_action_redirect" value="https://app.dealershipperformancecrm.com/contact_s3/test/">
									<input type="hidden" id="policy_s3" name="policy" value="<?php echo $policy; ?>">

									<input type="hidden" id="signature_s3"  name="signature" value="<?php echo $signature; ?>">
									<input type="hidden" id="content_type_s3" name="Content-Type" value="">



									<div id="input_attachment">
										<div class="text-right">

											<label class="btn btn-primary" for="settingImage_s3" title="Upload Attachment" id="attachment_label">
												<input name="file" id="settingImage_s3" type="file" class="form-control hide" 'style'='height:auto;' >
												<i class="fa icon-paperclip"></i> Attachment
											</label>&nbsp;
											<div class="pull-right">
												<button type="submit" id='submit_support' class="btn btn-success" style="border-top-left-radius: 0; border-bottom-right-radius: 0; font-weight: 700; border: 1px solid #DDD;">Submit Ticket</button>
											</div>
											<div type="button"  id="upload3"></div>

										</div>
									</div>
									<br>
								</div>
							</div>

						</div>
					</div>

















					<?php echo $this->Form->input('created', array('type' => 'hidden', 'value' => "$datetime2")); ?>
					<?php echo $this->Form->input('modified', array('type' => 'hidden', 'value' => "$datetime2")); ?>







					<div class="clearfix"></div>

					<?php echo $this->Form->end(); ?>

				</div>
			</div>


		</div>
	</div>
</div>

<form class="apply-nolazy form-horizontal" id="mail_attachment"  action="https://<?php echo $bucket; ?>.s3.amazonaws.com/" method="post" enctype="multipart/form-data">

</form>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>

	$(".alert").delay(3000).fadeOut("slow");


	$("#SupportAddForm").submit(function(){

		//console.log('dd');
		$("#submit_support").attr('disabled',true);

	});




	//File Attachments




	$('#settingImage_s3').on('change', function() {

	    if($("#settingImage_s3").val() != ''){

	    	if($( '#settingImage_s3' )[0].files[0].size > 25000000){
	    		alert("Maximum upload size exceeded, File size limit is 25MB");
	    		return false;
	    	}

			if($("#uploaded_total").val()){
				var current_total = parseInt( $("#uploaded_total").val());
				var new_total = $( '#settingImage_s3' )[0].files[0].size + current_total;
				if(new_total > 25000000){
					alert("Maximum upload size exceeded, File size limit is 25MB");
					return false;
				}
			}



			var form_data = new FormData( $("#mail_attachment")[0]);

	        form_data.append( 'key', $("#key_s3").val() );
	        form_data.append( 'AWSAccessKeyId', $("#AWSAccessKeyId_s3").val() );
	        form_data.append( 'acl', $("#acl_s3").val() );
	        form_data.append( 'success_action_redirect', $("#success_action_redirect_s3").val() );
	        form_data.append( 'policy', $("#policy_s3").val() );
	        form_data.append( 'signature', $("#signature_s3").val() );
	        form_data.append( 'Content-Type', $("#content_type_s3").val() );

	        form_data.append( 'file', $( '#settingImage_s3' )[0].files[0] );

			$("#upload3").html("Uploading attachment, Please wait...");
			$("#attachment_label").hide();




			$.ajax({
	            url: 'https://<?php echo $bucket; ?>.s3.amazonaws.com/',
	            cache: false,
	            contentType: false,
	            processData: false,
	            data: form_data,
	            type: 'post',
		        success: function(data){

					$("#upload3").html("");
					$("#settingImage_s3").val("");
					$("#attachment_label").show();


					$.ajax({
						type: "GET",
						url: '/contact_s3/file_list_attachment_support/',
						data: {'message_key': "<?php echo $message_key ?>" },
						success: function(data){
							$("#file_attachment_list").html(data);
						}
					});
	      			// console.log(data);


		        },
				error: function (xhr, ajaxOptions, thrownError) {

					$("#upload3").html("");
					$("#settingImage_s3").val("");
					$("#attachment_label").show();

					$.ajax({
						type: "GET",
						url: '/contact_s3/file_list_attachment_support/',
						data: {'message_key': "<?php echo $message_key ?>"},
						success: function(data){
							$("#file_attachment_list").html(data);
						}
					});

				}
	      	});

	    }else{
			alert("Please select a file");
	    }
	    return false;
	});










	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
