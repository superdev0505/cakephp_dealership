<style type="text/css">
	.cke_button__superbutton_icon, .cke_button__emailpreview_icon{ display: none;}
	.cke_button__superbutton_label, .cke_button__emailpreview_label{display:  block;}
	.cke_button__superbutton, .cke_button__emailpreview{border: 1px solid #E1E1E1 !important;}
</style>
</br></br></br></br>
<div class="layout-app">
	<div class="row row-app">

		<div class="col-md-12">

			<div class="col-separator col-separator-first box">



				<?php echo $this->Form->create('UserEmail', array('type' => 'post', 'class' => 'apply-nolazy')); ?>

					<?php
					if(isset($this->request->query['reply']))
						echo $this->Form->hidden('parent_mail_id');
					?>

				<div class="bg-info innerAll">

					<div class='row'>
						<div class="col-md-2">
							<div class="form-group margin-none">
								<?php  if($type == 'user'){ ?>
									<?php echo $this->Form->label('receiver_id', 'To:',array('class'=>" control-label")); ?>
									<div class="">
										<div class="input-group" style='display: block'>
											<?php echo $this->Form->select('receiver_id', $userlists,  array('empty' => 'Select Users', 'style'=>'width: 95%','class'=>'form-control','required'=>'required'));	?>
										</div>
									</div>
								<?php }else if($type = 'contact'){ ?>
									<?php echo $this->Form->label('receiver_name', 'REPLY To:',array('class'=>" control-label")); ?>
									<div class="">
										<div class="input-group">
											<?php echo $this->Form->text('receiver_name', array('class'=>"form-control"));	?>
											<?php echo $this->Form->hidden('receiver_id');	?>
										</div>
									</div>
								<?php }?>
							</div>
						</div>


						<div class="col-md-2">
							<div class="form-group margin-none">
								<?php echo $this->Form->label('email_from', 'From:',array('class'=>" control-label")); ?>
								<div class="">
									<?php echo $this->Form->text('email_from', array('class'=>"form-control",'readonly'=>"readonly")); ?>
								</div>
							</div>

						</div>





						<div class="col-md-4">
							<div class="form-group margin-none ">
								<?php echo $this->Form->label('template_id', 'Template:',array('class'=>" control-label")); ?>
								<div class="">
									<div class="input-group" style='display: block'>
										<?php echo $this->Form->select('template_id', $userTemplates ,array('empty'=>'Select','style'=>'width: 95%', 'class'=>"form-control"));	?>
										<?php echo $this->Form->hidden('template_id');	?>
									</div>
								</div>
							</div>
						</div>




						<div class="col-md-4">
							<div class="form-group margin-none <?php if ($this->Form->isFieldError('subject')) { echo "has-error";} ?>">
								<?php echo $this->Form->label('subject', 'Subject:',array('class'=>" control-label")); ?>
								<div class="">
									<?php echo $this->Form->text('subject', array('required'=>'required','class'=>"form-control")); ?>
									<?php echo $this->Form->error('subject', null, array('class'=>'has-error help-block')); ?>
								</div>
							</div>


						</div>


						<div style="clear:both"></div>

						<div class="col-md-4">
							<div class="form-group margin-none <?php if ($this->Form->isFieldError('subject')) { echo "has-error";} ?>">
								<?php echo $this->Form->label('CC', 'CC:',array('class'=>" control-label")); ?>
								<div class="">
									<?php echo $this->Form->text('cc', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['cc'],'class'=>"form-control")); ?>
									<?php echo $this->Form->error('cc', null, array('class'=>'has-error help-block')); ?>
								</div>
							</div>


						</div>


						<div class="col-md-4">
							<div class="form-group margin-none <?php if ($this->Form->isFieldError('subject')) { echo "has-error";} ?>">
								<?php echo $this->Form->label('BCC', 'BCC:',array('class'=>" control-label")); ?>
								<div class="">
									<?php echo $this->Form->text('bcc', array('value'=>@$SetCcBccDefaultEmail['SetCcBccDefaultEmail']['bcc'],'class'=>"form-control")); ?>
									<?php echo $this->Form->error('bcc', null, array('class'=>'has-error help-block')); ?>
								</div>
							</div>


						</div>

					</div>



















					<div class="clearfix"></div>
				</div>

				<hr class="margin-none"/>

				<div class="innerAll ">
					<div class="row">
						<div class="col-md-10">
							<?php  
							//echo $this->Form->textarea('message', array('id'=>'TemplateTemplateHtml','class'=>"notebook border-none form-control padding-none", 'rows'=>"10", 'placeholder'=>"Write your content here...",'required'=>'required'));  ?>
							
							<textarea name="data[UserEmail][message]" id="TemplateTemplateHtml"><?php echo $sig;?></textarea>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-2">
							<div class="panel-heading bg-primary"><h4>User Inputs</h4></div>




							<?php  if($type == 'user'){ ?>

							<div class="innerAll" style="border: 1px solid #CCCCCC;" >


							User Name: <a href="javascript:" field-name="{username}" class="template-field"><span class="label label-success label-stroke">{username}</span></a><br />
							First Name: <a href="javascript:" field-name="{first_name}" class="template-field"><span class="label label-success label-stroke">{first_name}</span></a><br />
							Last Name: <a href="javascript:" field-name="{last_name}" class="template-field"><span class="label label-success label-stroke">{last_name}</span></a><br />
							Full Name: <a href="javascript:" field-name="{full_name}" class="template-field"><span class="label label-success label-stroke">{full_name}</span></a><br />
							Email ID: <a href="javascript:" field-name="{email}" class="template-field"><span class="label label-success label-stroke">{email}</span></a><br />
                           Dealer Name: <a href="javascript:" field-name="{dealer}" class="template-field"><span class="label label-success label-stroke">{dealer}</span></a><br />
                             Address: <a href="javascript:" field-name="{d_address}" class="template-field"><span class="label label-success label-stroke">{d_address}</span></a><br />
                           Phone: <a href="javascript:" field-name="{d_phone}" class="template-field"><span class="label label-success label-stroke">{d_phone}</span></a><br />
                         Dealer Email: <a href="javascript:" field-name="{d_email}" class="template-field"><span class="label label-success label-stroke">{d_email}</span></a><br />
                            Website: <a href="javascript:" field-name="{d_website}" class="template-field"><span class="label label-success label-stroke">{d_website}</span></a><br />
                            City: <a href="javascript:" field-name="{d_city}" class="template-field"><span class="label label-success label-stroke">{d_city}</span></a><br />
                            State: <a href="javascript:" field-name="{d_state}" class="template-field"><span class="label label-success label-stroke">{d_state}</span></a><br />
                             Zip: <a href="javascript:" field-name="{d_zip}" class="template-field"><span class="label label-success label-stroke">{d_zip}</span></a><br />
							</div>
							<?php  }else{ ?>



							<div class="relativeWrap">
								<div class="widget widget-tabs widget-tabs-responsive" style='margin-bottom: 0;'>

									<!-- Tabs Heading -->
									<div class="widget-head">
										<ul>
											<li class="active"><a class="glyphicons group" href="#tab-1-userinput" data-toggle="tab"><i></i>Lead</a></li>
											<li class=""><a class="glyphicons group" href="#tab-2-userinput" data-toggle="tab"><i></i>Dealer</a></li>
										</ul>
									</div>
									<!-- // Tabs Heading END -->

									<div class="widget-body">
										<div class="tab-content">

											<!-- Tab content -->
											<div class="tab-pane animated fadeInUp active" id="tab-1-userinput">


		<div class="" style="" >
			Sales Person: <a href="javascript:" field-name="{sperson}" class="template-field"><span class="label label-success label-stroke">{sperson}</span></a><br />
			SPerson(First): <a href="javascript:" field-name="{sperson_first}" class="template-field"><span class="label label-success label-stroke">{sperson_first}</span></a><br />
			First Name: <a href="javascript:" field-name="{first_name}" class="template-field"><span class="label label-success label-stroke">{first_name}</span></a><br />
			Last Name: <a href="javascript:" field-name="{last_name}" class="template-field"><span class="label label-success label-stroke">{last_name}</span></a><br />
			Email ID: <a href="javascript:" field-name="{email}" class="template-field"><span class="label label-success label-stroke">{email}</span></a><br />
			Type: <a href="javascript:" field-name="{type}" class="template-field"><span class="label label-success label-stroke">{type}</span></a><br />
			Condition: <a href="javascript:" field-name="{condition}" class="template-field"><span class="label label-success label-stroke">{condition}</span></a><br />
			Year: <a href="javascript:" field-name="{year}" class="template-field"><span class="label label-success label-stroke">{year}</span></a><br />
			Make: <a href="javascript:" field-name="{make}" class="template-field"><span class="label label-success label-stroke">{make}</span></a><br />
			Model: <a href="javascript:" field-name="{model}" class="template-field"><span class="label label-success label-stroke">{model}</span></a><br />

	<!--	Modified Full Date: <a href="javascript:" field-name="{modified_full_date}" class="template-field"><span class="label label-success label-stroke">{modified_full_date}</span></a><br />
			Modified: <a href="javascript:" field-name="{modified}" class="template-field"><span class="label label-success label-stroke">{modified}</span></a><br /> -->

			Mobile: <a href="javascript:" field-name="{mobile}" class="template-field"><span class="label label-success label-stroke">{mobile}</span></a><br />
			Address: <a href="javascript:" field-name="{address}" class="template-field"><span class="label label-success label-stroke">{address}</span></a><br />
			City: <a href="javascript:" field-name="{city}" class="template-field"><span class="label label-success label-stroke">{city}</span></a><br />
			State: <a href="javascript:" field-name="{state}" class="template-field"><span class="label label-success label-stroke">{state}</span></a><br />
			Today: <a href="javascript:" field-name="{today}" class="template-field"><span class="label label-success label-stroke">{today}</span></a><br />
			Zip: <a href="javascript:" field-name="{zip}" class="template-field"><span class="label label-success label-stroke">{zip}</span></a><br />

			<?php if(isset($contact_info) && $contact_info['Contact']['xml_inv_url'] != ''){ ?>
		Vehicle URL: <a href="javascript:" field-name="{xml_inv_url}" class="template-field"><span class="label label-success label-stroke">{xml_inv_url}</span></a><br />
		<?php } ?>


		</div>



											</div>
											<!-- // Tab content END -->

											<!-- Tab content -->
											<div class="tab-pane animated fadeInUp" id="tab-2-userinput">

					<div class="" style="" >
						First Name: <a href="javascript:" field-name="{dealer_name}" class="template-field"><span class="label label-success label-stroke">{dealer_name}</span></a><br />
						Email: <a href="javascript:" field-name="{dealer_email}" class="template-field"><span class="label label-success label-stroke">{dealer_email}</span></a><br />
						Phone: <a href="javascript:" field-name="{dealer_phone}" class="template-field"><span class="label label-success label-stroke">{dealer_phone}</span></a><br />
						Fax: <a href="javascript:" field-name="{dealer_fax}" class="template-field"><span class="label label-success label-stroke">{dealer_fax}</span></a><br />
						Address: <a href="javascript:" field-name="{dealer_address}" class="template-field"><span class="label label-success label-stroke">{dealer_address}</span></a><br />
						City: <a href="javascript:" field-name="{dealer_city}" class="template-field"><span class="label label-success label-stroke">{dealer_city}</span></a><br />
						State: <a href="javascript:" field-name="{dealer_state}" class="template-field"><span class="label label-success label-stroke">{dealer_state}</span></a><br />
						Zip: <a href="javascript:" field-name="{dealer_zip}" class="template-field"><span class="label label-success label-stroke">{dealer_zip}</span></a><br />
						Website: <a href="javascript:" field-name="{dealer_website}" class="template-field"><span class="label label-success label-stroke">{dealer_website}</span></a><br />
					</div>

											</div>
											<!-- // Tab content END -->

										</div>
									</div>
								</div>
							</div>









							<?php  } ?>















						</div>
					</div>





				</div>

				<div class="col-separator-h"></div>


				<div class="innerAll ">
					<div class="row">
						<div class="col-md-2">
							<button type="button" id="btn_save_email_druft" class="btn btn-warning" >Save Draft</button>
						</div>
						<div class="col-md-4 text-center" >
							<a href="/user_emails/inbox" class="btn btn-danger"><i class="fa fa-reply"></i> Cancel</a>
							<button type="submit" id='btn-send-email' class="btn btn-success" id="btn-submit-lead"><i class="fa fa-fw icon-outbox-fill"></i> Send email</button>
							<?php echo $this->element( 's3_files_button' ); ?>
						</div>
						<div class="col-md-6" >


							<?php echo $this->Form->hidden('UserEmail.message_key', array('value'=>$message_key)); ?>



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



									<div class="row" id="input_attachment">
										<div class="col-sm-12 text-right">

											<label class="btn btn-primary" for="settingImage_s3" title="Upload Attachment" id="attachment_label">
												<input name="file" id="settingImage_s3" type="file" class="form-control hide" 'style'='height:auto;' >
												<i class="fa icon-paperclip"></i> Attachment
											</label>

											<div type="button"  id="upload3"></div>
										</div>
									</div>

									<br>
								</div>



							</div>













						</div>
					</div>







				</div>


				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>

<?php //debug( $setting ); ?>


<script>

<?php if($type = 'contact'){ ?>

function ShowEmailPreview(){

	$.ajax({
		type: "POST",
		url: "/user_emails/email_preview_contact",
		data: {'contact_id':"<?php echo $this->request->params['pass'][1];  ?>",'message':CKEDITOR.instances["TemplateTemplateHtml"].getData()},
		success: function(data){

			bootbox.dialog({
				message: data,
				backdrop: true,
				title: "Email Preview",
			}).find("div.modal-dialog").addClass("largeWidth");
		}
	});

}

<?php }else{ ?>

	function ShowEmailPreview(){
		console.log("user email");
	}

<?php } ?>


$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>



	$("#btn_save_email_druft").click(function(){

		var contact_id = "<?php echo $this->request->params['pass'][1];  ?>";
		var message_body = CKEDITOR.instances["TemplateTemplateHtml"].getData();
		var subject = $("#UserEmailSubject").val();
		console.log(contact_id,message_body, subject);

		$.ajax({
			type: "POST",
			url: "/drafts/druft_email",
			data: {'contact_id': contact_id ,'message_body':message_body, 'subject' : subject },
			success: function(data){
				alert("Draft saved successfully");
			}
		});



	});







	$("#UserEmailComposeForm").submit(function(event){
		$("#btn-send-email").attr("disabled", true);
	});


	<?php
		$signature_image = "";
		if($setting['Setting']['image'] != '' ){
			$imgpath=WWW_ROOT.'files'.DS.'setting'.DS.'image'.DS.$setting['Setting']['id'].DS.''.$setting['Setting']['image'];
			if(file_exists($imgpath)){
				$src = FULL_BASE_URL.'/app/webroot/files/'.'setting'.'/image/'.$setting['Setting']['id'].'/'.$setting['Setting']['image'];
				$signature_image = '<br/><img src="'.$src.'" style="width:100px;height:120px;" />';
			}
		}

	 ?>


	$("#UserEmailTemplateId").change(function(){
		$.ajax({
			type: "GET",
			cache: false,
			url:  "/user_templates/get_template/",
			data: {'id':$(this).val()},
			 dataType: "json",
			success: function(data){
				//console.log(data);
				CKEDITOR.instances['TemplateTemplateHtml'].setData(data['template_body'] +  <?php echo json_encode(($setting['Setting']['signature']).$signature_image ); ?> );
				$('#UserEmailSubject').val(data['template_subject']);
			}
		});
	});

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
						url: '/contact_s3/file_list_attachment/',
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
						url: '/contact_s3/file_list_attachment/',
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
