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
										<a href="javascript:;" onclick="window.open('/customer/templates/tr498fn1wk757/preview', 'Preview', 'height=600, width=600'); return false;" class="btn btn-inverse">Preview</a>
										<a data-toggle="modal" href="#template-test-email" class="btn btn-inverse">Send test with this template</a>
										<a data-toggle="modal" href="#template-add-category" class="btn btn-inverse">+Add Template Category</a></h3>
									</div>
								</div>
							</div>
							<div class="panel-body">

								<div class="form-group col-lg-4">
								<?php
									echo $this->Form->label('template_title','Template Title');
									echo $this->Form->input('template_title', array( 'type' => 'text','label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-4">
								<?php
                                    echo $this->Form->label('template_type','Template Type');
                                    $options = array ( 'A' => 'Autoresponder', 'N' => 'Newsletter', 'M' => 'Mail Template' );
                                    echo $this->Form->input('template_type', array( 'type' => 'select', 'options' => $options, 'empty' => 'Select', 'label'=>false, 'div'=>false, 'class' => 'form-control selectpicker','style'=>'width: 100%', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-4">
								<?php
                                    echo $this->Form->label('template_category','Category');
                                    echo $this->Form->input('template_category', array( 'type' => 'select', 'options' => $categories, 'empty' => 'Select', 'label'=>false, 'div'=> '', 'class' => 'form-control selectpicker catList', 'style'=>'width: 100%', 'required' => 'required' ));
                                ?>
								</div>

								<div class="clearfix hspace12">&nbsp;</div>
								<hr />
								<div class="clearfix hspace12">&nbsp;</div>

								<div class="form-group col-lg-4">
								<?php
									echo $this->Form->label('template_email_subject','Email Subject');
									echo $this->Form->input('template_email_subject', array( 'type' => 'text','label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-4">
								<?php
                                    echo $this->Form->label('template_email_from_id','Email From Id');
									echo $this->Form->input('template_email_from_id', array( 'type' => 'text', 'label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="form-group col-lg-4">
								<?php
                                    echo $this->Form->label('template_email_from_name','Email From Name');
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

                                <div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                    <div class="input-group">
                                        <div class="form-control col-md-3">
                                            <i class="fa fa-file fileupload-exists"></i>
                                            <span class="fileupload-preview"></span>
                                        </div>
                                        <span class="input-group-btn">
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
							<div class="panel-footer">
								
<a href="<?php echo $this->Html->url(array('action'=>'templates_list')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
<div class="pull-right">
									<button type="submit" class="btn btn-success btn-submit" data-loading-text="Please wait, processing...">Save Template Changes</button>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>


					<div class="modal fade" id="template-test-email" tabindex="-1" role="dialog" aria-labelledby="template-test-email-label" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Send a test email</h4>
								</div>
								<div class="modal-body">
									<div class="callout">
										<strong>Notes: </strong><br />
										* if multiple recipients, separate the email addresses by a comma.<br /> * the email tags will not be parsed while sending test emails.<br /> * make sure you save the template changes before you send the test.
									</div>
									<form id="template-test-form" action="/customer/templates/tr498fn1wk757/test" method="post">
										<input class="form-control" type="text" name="email" id="email" />
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary btn-submit" onclick="$('#template-test-form').submit();">Send test</button>
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
                    User Name: {user_name}<br />
                    First Name: {first_name}<br />
                    Last Name: {last_name}<br />
                    Full Name: {full_name}<br />
                    Email ID: {email}<br />
                    Type: {type}<br />
                    Condition: {condition}<br />
                    Year: {year}<br />
                    Make: {make}<br />
                    Model: {model}<br />
                    Modified Full Date: {modified_full_date}<br />
                    Modified: {modified}<br />
                    Mobile: {mobile}<br />
                    Address: {address}<br />
                    City: {city}<br />
                    State: {state}<br />
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
<script type="text/javascript" src="<?php echo $this->webroot; ?>app/View/Themed/Default/webroot/assets/components/common/forms/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.ckeditor').ckeditor();
	});
</script>
<?php
    }
?>

<script type="text/javascript">
	$(document).ready(function(){

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

						$('.msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error!</strong> New category name saved!</div>');

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
	});
</script>