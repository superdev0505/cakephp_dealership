<br />
<br />
<br />
<br />
<div class="innerLR">

<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>

	<div class="row">
		<div class="col-md-12">

			<div class="widget widget-heading-simple widget-body-white">

				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Internet Email Settings</h4>
				</div>
				<!-- // Widget heading END -->

				<div class="widget-body">

					<?php
					//debug($this->request->data);
					echo $this->Form->create('EmailSetting', array('url'=>array('controller'=>'user_emails', 'action'=> 'smtp_settings'), 'type' => 'post', 'class' => 'apply-nolazy form-horizontal',)); ?>

					<div class="row">

						<div class='col-md-6'>

							<!--		<div class="form-group ">
								<?php echo $this->Form->label('load_settings','Load Settings:', array('class'=>"col-sm-3 control-label text-primary")); ?>
								<div class="col-sm-9">
									<div class="input-group">
										<?php echo $this->Form->input('load_settings', array('div'=>false,'label'=>false,  'type'=>'select', 'options'=>array('gmail'=>'Gmail'),
										 'class'=>"form-control",'empty'=>'Load Settings')); ?>
									</div>
								</div>
							</div>
					-->

							<div class="form-group ">
								<?php echo $this->Form->label('emailaddress','Email Address:', array('class'=>"col-sm-4 control-label")); ?>
								<div class="col-sm-8">
									<?php echo $this->Form->email('emailaddress', array('class'=>"form-control",'placeholder'=>'','required'=>'required')); ?>
									<?php echo $this->Form->error('emailaddress'); ?>
								</div>
							</div>



							<div class="form-group ">
								<?php echo $this->Form->label('imap_server','Incoming mail server (IMAP)', array('class'=>"col-sm-4 control-label")); ?>

								<div class="col-sm-4">
									<?php echo $this->Form->input('imap_server', array('type'=>'text', 'label'=>false, 'div'=>false,
										//'options' => $imaps,
										 //'empty'=>'Select',
									'class'=>"form-control",'placeholder'=>'','required'=>'required')); ?>
									<?php echo $this->Form->error('imap_server'); ?>
								</div>

								<div class="col-sm-2">
									<?php echo $this->Form->input('imap_port', array('type'=>'select', 'label'=>false, 'div'=>false,
										'options' => array('993'=>'993','143'=>'143'),
										'empty'=>'Port',
									'class'=>"form-control",)); ?>
									<?php echo $this->Form->error('imap_port'); ?>
								</div>

								<div class="col-sm-2">
									<?php echo $this->Form->input('imap_ssl_tls', array('type'=>'select', 'label'=>false, 'div'=>false,
										'options' => array('ssl'=>'SSL','tls'=>'TLS'),
										'empty'=>'SSL/TLS',
									'class'=>"form-control",)); ?>
									<?php echo $this->Form->error('imap_ssl_tls'); ?>
								</div>


							</div>




							<div class="form-group ">
								<?php echo $this->Form->label('smtp_host','Outgoing mail server (SMTP):', array('class'=>"col-sm-4 control-label")); ?>

								<div class="col-sm-4">
									<?php echo $this->Form->input('smtp_host', array(
										//'options'=>$smtps,
									 'type'=>'text',
									  //'empty'=>'Select',
									   'div'=>false, 'label'=>false,
									 'class'=>"form-control",'placeholder'=>'','required'=>'required')); ?>
									<?php echo $this->Form->error('smtp_host'); ?>
								</div>


								<div class="col-sm-2">
									<?php echo $this->Form->input('smtp_port', array('type'=>'select', 'label'=>false, 'div'=>false,
										'options' => array('465'=>'465','587'=>'587','25'=>'25','443'=>'443'),
										'empty'=>'Port',
									'class'=>"form-control",)); ?>
									<?php echo $this->Form->error('smtp_port'); ?>
								</div>

								<div class="col-sm-2">
									<?php echo $this->Form->input('smtp_ssl_tls', array('type'=>'select', 'label'=>false, 'div'=>false,
										'options' => array('ssl'=>'SSL','tls'=>'TLS'),
										'empty'=>'SSL/TLS',
									'class'=>"form-control",)); ?>
									<?php echo $this->Form->error('smtp_ssl_tls'); ?>
								</div>
							</div>

							<div class="form-group ">
								<?php echo $this->Form->label('server_type','Server Type:', array('class'=>"col-sm-4 control-label")); ?>

								<div class="col-sm-4">
									<?php 
									$server_type_opt = array('IMAP'=>'IMAP','Exchange Server'=>'Exchange Server');
									echo $this->Form->input('server_type', array(
										'options'=>$server_type_opt,
									   	'div'=>false, 'label'=>false,
									 'class'=>"form-control",'placeholder'=>'','required'=>'required')); ?>
									<?php echo $this->Form->error('server_type'); ?>
								</div>
								<div class="col-sm-4"> 
									<?php echo $this->Form->input('ews_version', array('type'=>'select', 'label'=>false, 'div'=>false,
										'style'=>"width: auto;display: inline-block;",
										'options' => array(
											'Exchange2010_SP2'=>'Exchange2010_SP2',
											'Exchange2010_SP1'=>'Exchange2010_SP1',
											'Exchange2010'=>'Exchange2010',
											'Exchange2007_SP3'=>'Exchange2007_SP3',
											'Exchange2007_SP2'=>'Exchange2007_SP2',
											'Exchange2007_SP1'=>'Exchange2007_SP1',
											'Exchange2007'=>'Exchange2007'
										),
										'empty'=>'EWS Version',
									'class'=>"form-control",)); ?>
									<?php echo $this->Form->error('smtp_ssl_tls'); ?>
								</div>
							</div>



						</div>

						<div class='col-md-4'>

							<div class="form-group ">
								<?php echo $this->Form->label('smtp_username','Email Username:', array('class'=>"col-sm-5 control-label")); ?>
								<div class="col-sm-7">
									<?php echo $this->Form->text('smtp_username', array('class'=>"form-control",'placeholder'=>'')); ?>
									<?php echo $this->Form->error('smtp_username'); ?>
								</div>
							</div>

							<div class="form-group ">
								<?php echo $this->Form->label('smtp_pwd','Email Password:', array('class'=>"col-sm-5 control-label")); ?>
								<div class="col-sm-7">
									<?php echo $this->Form->password('smtp_pwd', array('class'=>"form-control",'placeholder'=>'')); ?>
									<?php echo $this->Form->error('smtp_pwd'); ?>
								</div>
							</div>
<div class="col-sm-2"></div>
<div class="col-sm-5">
							<div class="form-group">
								<?php echo $this->Form->label('smtp_tls','SMTP TLS:', array('class'=>"col-sm-5 control-label")); ?>
								<div class="col-sm-7">
									<?php echo $this->Form->input('smtp_tls', array('type'=>'checkbox', 'label'=>false)); ?>
								</div>
							</div>
</div>
<div class="col-sm-5">
								<?php echo $this->Form->label('imap_gssapi','IMAP GSSAPI:', array('class'=>"col-sm-5 control-label")); ?>
								<div class="col-sm-7">

									<?php echo $this->Form->input('imap_gssapi', array('type'=>'checkbox', 'label'=>false)); ?>
								</div>
</div>
							</div>

						</div>




							<div class="form-group">
						        <div class="col-sm-offset-3 col-sm-9">
						            <button type="submit" class="btn btn-success" id="btn-submit-smtp"><i class="fa fa-save"></i> Save SMTP Setting</button>
									<button type="button" class="btn btn-primary" id="btn-test-smtp"><i class="fa fa-refresh"></i> Test SMTP Setting</button>
									<button type="button" class="btn btn-primary" id="btn-test-imap"><i class="fa fa-refresh"></i> Test IMAP Setting</button>

									<?php if($this->request->data['EmailSetting']['ext1'] == 'Off'){ ?>
										<button type="button" id='turn_on_email' class="btn btn-success" id="btn-test-imap"><i class="fa fa-check"></i> Turn On</button>
									<?php }else{ ?>
										<button type="button" id='shut_off_email' class="btn btn-danger" id="btn-test-imap"><i class="fa fa-times"></i> Shut off</button>
									<?php } ?>

						        </div>
						    </div>



					</div>

					<?php echo $this->Form->end(); ?>

				</div>

			</div>


		</div>

	</div>

















	<div class="widget widget-body-white">
		<div class="widget-body">
			<div class="row">
				<?php echo $this->Form->create('Setting', array('type' => 'file', 'class' => 'apply-nolazy',)); ?>

				<?php echo $this->Form->label('email_from','Email From:', array('class'=>"col-sm-2 control-label")); ?>
				<div class="col-sm-10">
					<div class="input-group">
						<?php echo $this->Form->text('email_from', array('class'=>"form-control"/*,'data-placement'=>'right','data-original-title'=>"Eneter From Email ID",'data-toggle'=>"tooltip"*/,'placeholder'=>'Please enter From Email address','type'=>'email')); ?>
						<?php echo $this->Form->error('email_from'); ?>
					</div>
				</div>
				<br />
				<br />
				<?php echo $this->Form->label('signature','Signature:', array('class'=>"col-sm-2 control-label")); ?>
				<div class="col-sm-10">
					<div class="input-group">
						<?php echo $this->Form->textarea('signature', array('class'=>"notebook  form-control",'rows'=>"8",'style'=>"width:700px;",'placeholder'=>"Write your content here..."/*,'data-placement'=>'right','data-original-title'=>"Enter Signature",'data-toggle'=>"tooltip"*/,'required'=>'required')); ?>
					</div>
				</div>
                <br />
				<br />
				<?php echo $this->Form->label('image','Upload Image', array('class'=>"col-sm-2 control-label")); ?>
                <div class="col-sm-10">
					<?php if(!empty($this->request->data['Setting']['image'])){
					echo $this->Html->image('/app/webroot/files/setting/image/'.$this->request->data['Setting']['id'].'/'.$this->request->data['Setting']['image'],array('id'=>'previewImg','style'=>'width:100px;height:120px;')); ?>
					<label class="checkbox"><input type="checkbox" class="checkbox" name="data[Setting][delete_img]" />Delete Image</label>
				<?php	}
					?>
						<?php echo $this->Form->input('image', array('class'=>"form-control",'type'=>'file','label'=>false,'div'=>false,'style'=>'height:auto;','id'=>'settingImage'/*,'data-placement'=>'right','data-original-title'=>"Enter Signature",'data-toggle'=>"tooltip"*/)); ?>

				</div>
				<div class="separator"></div>
				<div class="col-sm-10">
					<div class=" text-center">
					<br />
						<a href="/user_emails/inbox" class="btn btn-danger"><i class="fa fa-reply"></i> Cancel</a>
						<button type="submit" class="btn btn-success" id="btn-submit-lead"><i class="fa fa-save"></i> Save Setting</button>
					</div>
				</div>

				<?php echo $this->Form->end(); ?>
			 </div>
		</div>
	</div>
</div>
<!-- // Content END -->
<div class="clearfix"></div>
<script>
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
				if($('#previewImg').length){
					if(e.target.result){
                		$('#previewImg').attr('src', e.target.result);
                	}
				}


            }

            reader.readAsDataURL(input.files[0]);
        }
    }

	$(document).ready(function(){
    $("#settingImage").change(function(){

        readURL(this);
    });
	});



$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	$("#turn_on_email").click(function(){
		location.href = "/user_emails/settings_status/On";
	});

	$("#shut_off_email").click(function(){
		location.href = "/user_emails/settings_status/Off";
	});


	$("#btn-test-imap").click(function(){

		$.ajax({
			type: "GET",
			timeout: 10000,
			url:  "/user_emails/test_imap",
			success: function(data){
				alert(data);
			},
			error: function (xhr, ajaxOptions, thrownError) {
		        	alert("Couldn't connect to inbox");
		    }
		});


	});

	$("#btn-test-smtp").click(function(){

		if( $("#EmailSettingEmailaddress").val() == '' ){

			$("#EmailSettingEmailaddress").focus()
			alert('Please enter your email address');

		}else if( $("#EmailSettingSmtpPort").val() == '' ){

			$("#EmailSettingSmtpPort").focus()
			alert('Please enter smtp port');

		}else if( $("#EmailSettingSmtpUsername").val() == '' ){

			$("#EmailSettingSmtpUsername").focus()
			alert('Please enter smtp username');

		}else if( $("#EmailSettingSmtpPwd").val() == '' ){

			$("#EmailSettingSmtpPwd").focus()
			alert('Please enter smtp password');

		}else{

			bootbox.prompt("Enter an email address to send test message", function(result) {
				if (result === null) {
			    //Example.show("Prompt dismissed");
			  	} else {
					$.ajax({
						type: "GET",
						url:  "/user_emails/test_smtp",
						data: {'email':result},
						success: function(data){
							alert(data);
						}
					});
			  	}
			});

		}



	});

	$('#EmailSettingLoadSettings').change(function(event){

		if($(this).val() == 'gmail'){
			$('#EmailSettingSmtpHost').val('ssl://smtp.gmail.com');
			$('#EmailSettingSmtpPort').val('465');
			$('#EmailSettingSmtpTls').attr('checked', false);
			$('#EmailSettingImapServer').val('{imap.gmail.com:993/imap/ssl}INBOX');
		}

	});




	$(".alert").delay(3000).fadeOut("slow");


	CKEDITOR.replace( 'SettingSignature' );
	CKEDITOR.config.scayt_autoStartup = true;
	CKEDITOR.on( 'instanceReady', function( ev ){
		ev.editor.dataProcessor.writer.setRules( 'br',{
            indent : false,
            breakBeforeOpen : false,
            breakAfterOpen : false,
            breakBeforeClose : false,
            breakAfterClose : false
         });
   	});







	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});











</script>
