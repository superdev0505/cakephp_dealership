</br>
</br>
</br>
</br>
<?php echo $this->Session->flash('flash', array('element' => 'alert')); ?>
<div class="row-fluid">
	<div class="col-lg-10">
		<div class="panel panel-default">
			<div class="panel-body">
			
				<div class="page-content">
					<div id="notify-container">
					</div>
					
					</div>
					<div class="clearfix">
						<!-- -->
					</div>
					<hr />

					<?php echo $this->Form->create('Template', array('class' => 'form-inline apply-nolazy', 'role'=>"form", 'method'=>'post','type' => 'file')); 
					echo $this->Form->input('base_template_id', array('type' => 'hidden'));
					?>

						<div class="panel panel-default">
							<div class="panel-heading bg-primary">
								<div class="clearfix">
									<h3 class="pull-left">
										<font color="white">Add Template</font>
									</h3>
									<div class="pull-right">
										<a data-toggle="modal" id="btn-template-preview" href="#template-test-preview" class="btn btn-inverse">Preview</a>
										<a data-toggle="modal" href="#template-test-email" class="btn btn-inverse">Send test with this template</a>
										<a data-toggle="modal" href="#template-add-category" class="btn btn-inverse">+Add Template Category</a></h3>
										
								<div class="fileupload fileupload-new margin-none" data-provides="fileupload" style="display: inline-block">
									<span class="input-group-btn" style=" display: inline-block;">
										<span class="btn btn-inverse btn-file">
										<span class="fileupload-new">Upload Template Image</span>
										<span class="fileupload-exists">Change</span>
											<?php echo $this->Form->input('thumbfile', array('type' => 'file')); ?>
										</span>
										<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
									</span>
                                </div>
										
									</div>
								</div>
							</div>
							<div class="panel-body">

								<div class="form-group col-lg-2">
								<?php
									echo $this->Form->label('template_title','Template Title');
									echo $this->Form->input('template_title', array( 'type' => 'text','label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-2">
								<?php
                                    echo $this->Form->label('template_type','Template Type');
                                    $options = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Mail Template' );
                                    echo $this->Form->input('template_type', array( 'type' => 'select', 'options' => $options, 'empty' => 'Select', 'label'=>false, 'div'=>false, 'class' => 'form-control selectpicker','style'=>'width: 100%', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-2">
								<?php
                                    echo $this->Form->label('template_category','Category');
                                    echo $this->Form->input('template_category', array( 'type' => 'select', 'options' => $categories, 'empty' => 'Select', 'label'=>false, 'div'=> '', 'class' => 'form-control selectpicker catList', 'style'=>'width: 100%', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-2">
								<?php
									echo $this->Form->label('template_email_subject','Email Subject');
									echo $this->Form->input('template_email_subject', array( 'type' => 'text','label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-2">
								<?php
                                    echo $this->Form->label('template_email_from_id','Email From');
									echo $this->Form->input('template_email_from_id', array( 'type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-2">
								<?php
                                    echo $this->Form->label('template_email_from_name','From Full Name');
									echo $this->Form->input('template_email_from_name', array( 'type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="clearfix hspace12">&nbsp;</div>
                                
								

								<div class="form-group col-lg-12">
								<?php
									echo $this->Form->label('template_html','Template Editor:');
									echo $this->Form->textarea('template_html', array('class' => 'form-control ckeditor'));
                                ?>
								</div>

								<div class="clearfix hspace12">&nbsp;</div>
								<hr />
								<div class="clearfix hspace12">&nbsp;</div>



                               
								
								
								
								
								
								

							</div>
							<div class="panel-footer">
								
<a href="<?php echo $this->Html->url(array('action'=>'templates_list')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
<div class="pull-right">
									<button type="submit" class="btn btn-success btn-submit" data-loading-text="Please wait, processing...">Save Template Changes</button>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>
						
					
					<div class="modal fade bs-example-modal-lg" id="template-test-preview" tabindex="-1" role="dialog" aria-labelledby="template-test-email-label" aria-hidden="true">
						<div class="modal-dialog modal-lg" style="width: 800px;">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Template Preview</h4>
								</div>
								<div class="modal-body">
									<div id="template-preview-content"></div>
									<hr /><br />
									This email was sent to {email} by {email_from} |   
									Update Profile/Email Address | Instant removal with <a href="{unsubscribe_url}">Unsubscribe </a>.
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="template-test-email" tabindex="-1" role="dialog" aria-labelledby="template-test-email-label" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Send a test email</h4>
								</div>
								<div class="modal-body">
									<div class="msg1"></div>
									<div class="callout">
										<strong>Notes: </strong><br />
										* if multiple recipients, separate the email addresses by a comma.<br /> * the email tags will not be parsed while sending test emails.<br /> * make sure you save the template changes before you send the test.
									</div>
									<form id="template-test-form" action="/eblasts/send_test_email/" method="post">
										<input class="form-control" type="text" name="email" id="email" />
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary btn-submit" id="send_test_email">Send test</button>
								</div>
							</div>
						</div>
					</div>
					<div class="modal fade" id="template-add-category" tabindex="-1" role="dialog" aria-labelledby="template-test-email-label" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
                                <form id="template-add-cat-form" action="" method="post">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Add New Category</h4>
                                    </div>
                                    <div class="modal-body">
                                    	<div class="clearfix"><!-- --></div>
                                    	<div class="msg"></div>
                                    	<div class="clearfix"><!-- --></div>
                                        <div class="form-group">
                                            <strong>Category Name:</strong>
                                            <input class="form-control" type="text" name="category_name" id="category_name" />
                                        </div>
                                        <div class="clearfix"><!-- --></div>
                                        <hr />
                                    </div>
                                    <div class="modal-footer">
                                    	<input type="checkbox" value="1" id="add-another" /> Do not close  
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary btn-submit" id="submitbtn">Add Category</button>
                                    </div>
                                    <div class="clearfix"><!-- --></div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>

	<div class="col-md-2 listWrapper">
		<!-- Widget -->
<div class="panel-heading bg-primary"><h4>User Inputs</h4></div>		
<div class="panel panel-default">
			<div class="panel-body">
				<div id="search-result-content">
                    User Name: <a href="javascript:" field-name="{user_name}" class="template-field"><span class="label label-success label-stroke">{user_name}</span></a><br />
                    First Name: <a href="javascript:" field-name="{first_name}" class="template-field"><span class="label label-success label-stroke">{first_name}</span></a><br />
                    Last Name: <a href="javascript:" field-name="{last_name}" class="template-field"><span class="label label-success label-stroke">{last_name}</span></a><br />
                    Full Name: <a href="javascript:" field-name="{full_name}" class="template-field"><span class="label label-success label-stroke">{full_name}</span></a><br />
                    Email ID: <a href="javascript:" field-name="{email}" class="template-field"><span class="label label-success label-stroke">{email}</span></a><br />
                    Type: <a href="javascript:" field-name="{type}" class="template-field"><span class="label label-success label-stroke">{type}</span></a><br />
                    Condition: <a href="javascript:" field-name="{condition}" class="template-field"><span class="label label-success label-stroke">{condition}</span></a><br />
                    Year: <a href="javascript:" field-name="{year}" class="template-field"><span class="label label-success label-stroke">{year}</span></a><br />
                    Make: <a href="javascript:" field-name="{make}" class="template-field"><span class="label label-success label-stroke">{make}</span></a><br />
                    Model: <a href="javascript:" field-name="{model}" class="template-field"><span class="label label-success label-stroke">{model}</span></a><br />
                    Modified Full Date: <a href="javascript:" field-name="{modified_full_date}" class="template-field"><span class="label label-success label-stroke">{modified_full_date}</span></a><br />
                    Modified: <a href="javascript:" field-name="{modified}" class="template-field"><span class="label label-success label-stroke">{modified}</span></a><br />
                    Mobile: <a href="javascript:" field-name="{mobile}" class="template-field"><span class="label label-success label-stroke">{mobile}</span></a><br />
                    Address: <a href="javascript:" field-name="{address}" class="template-field"><span class="label label-success label-stroke">{address}</span></a><br />
                    City: <a href="javascript:" field-name="{city}" class="template-field"><span class="label label-success label-stroke">{city}</span></a><br />
                    State: <a href="javascript:" field-name="{state}" class="template-field"><span class="label label-success label-stroke">{state}</span></a><br />
				</div>
			</div>
		</div>
		<!-- // Widget END -->
			
	</div>
	<?php //echo $this->element('sql_dump'); ?>

</div>


<?php
    if( $this->params->isAjax ) {
?>

<script type="text/javascript">
	$(document).ready(function(){
		//$('.ckeditor').ckeditor();
	});
</script>
<?php
    }
?>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	//	$('.ckeditor').ckeditor();
		

		$("a.template-field").click(function(){
			CKEDITOR.instances['TemplateTemplateHtml'].insertText($(this).attr('field-name'));
		});
			
		$('#btn-template-preview').click(function () {
			editordata = CKEDITOR.instances["TemplateTemplateHtml"].getData();
			$("#template-preview-content").html(editordata);
		});

		
		//Send test email
		$("#send_test_email").click(function(){
			editordata = CKEDITOR.instances["TemplateTemplateHtml"].getData();
			
			if($("#email").val() != '' && editordata != '' && $("#TemplateTemplateEmailSubject").val() != ''){
				$.ajax({
					url: '<?php echo $this->webroot; ?>eblasts/send_test_email',
					type: 'POST',
					data: {'emails': $("#email").val(),'template': editordata, 'subject': $("#TemplateTemplateEmailSubject").val()},
					cache: false,
					success: function(data, textStatus, jqXHR){
						setTimeout(function(){
							if( !$('#add-another').is(':checked') ) { $('#template-test-email').modal('hide'); }
						}, 1000);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						//window.location = window.location;
					},
					complete: function(){
	
					}
				});
			}else{
				$('.msg1').html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error!</strong> Please enter email address, subject and template content!</div>');
			}
			
			
			return false;
		});

		$('#submitbtn').click(function(){
			if( $('#category_name').val().length < 2 ) {
				$('.msg').html('<div class="alert alert-warning"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error!</strong> Enter category name!</div>');
				return false;
			}

			$.ajax({
				url: '<?php echo $this->webroot; ?>eblasts/add_template_category',
				type: 'POST',
				data: $('#template-add-cat-form').serialize(),
				cache: false,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined') {
						// Success so call function to process the form
						// console.log('SUCCESS: ' + data.success);

						$('.msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Success!</strong> New category name saved!</div>');

						setTimeout(function(){
							if( !$('#add-another').is(':checked') ) { $('#template-add-category').modal('hide'); }
							$('.msg').html('');
							$('#category_name').val('');
						}, 1000);
						$('.catList').load('<?php echo $this->webroot; ?>eblasts/load_categories');
					}
					else {
						// Handle errors here
						// console.log('ERRORS: ' + data.error);
						$('.msg').html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error:</strong> '+data.error+'</div>');
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle errors here
					// console.log('ERRORS: ' + textStatus);
					window.location = window.location;
				},
				complete: function()
				{
					$('.ajax-loading').addClass('hide');
				}
			});
		});



		
		
		
	
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>