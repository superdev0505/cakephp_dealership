</br>
</br>
</br>
</br>

<div class="row-fluid">
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-body">
				<ul class="breadcrumb">
					<li><a href="/eblasts">Dashboard</a><span class="divider"></span></li>
					<li><a href="/eblasts/templates">Templates</a>  <span class="divider"></span></li>
					<li class="active">Update </li>
				</ul>
				<div class="page-content">
					<div id="notify-container">
					</div>
					<div class="pull-right">
						<a href="javascript:;" onclick="window.open('/customer/templates/tr498fn1wk757/preview', 'Preview', 'height=600, width=600'); return false;" class="btn btn-default">Preview</a>
						<a data-toggle="modal" href="#template-test-email" class="btn btn-default">Send a test email using this template</a>
						<a data-toggle="modal" href="#template-add-category" class="btn btn-default">Add Template Category</a>
					</div>
					<div class="clearfix">
						<!-- -->
					</div>
					<hr />
					<form id="yw0" action="/customer/templates/tr498fn1wk757/update" method="post">
						<div style="display:none"><input type="hidden" value="3da63df74a218a322207999fe18c1a52770697c7" name="csrf_token" /></div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"> <span class="glyphicon glyphicon-text-width"></span> Add Template</h3>
							</div>
							<div class="panel-body">
								<div class="form-group col-lg-4">
									<label for="CustomerEmailTemplate_name" class="required">Name <span class="required">*</span></label>
									<input data-title="Name" data-container="body" data-toggle="popover" data-content="The name of the template, used for you to make the difference if having to many templates." class="form-control has-help-text" placeholder="Name" data-placement="top" name="CustomerEmailTemplate[name]" id="CustomerEmailTemplate_name" type="text" maxlength="255" value="example-template" />
								</div>
								<div class="form-group col-lg-4">
									<label for="CustomerEmailTemplate_inline_css" class="required">Type<span class="required">*</span></label>            
									<select data-title="Inline css" data-container="body" data-toggle="popover" data-content="Select Type" class="form-control has-help-text" placeholder="Inline css" data-placement="top" name="CustomerEmailTemplate[inline_css]" id="CustomerEmailTemplate_inline_css">
										<option value="Autoresponder" selected="selected">Autoresponder</option>
										<option value="Newsletter">Newsletter</option>
									</select>
								</div>
								<div class="form-group col-lg-4">
									<label for="CustomerEmailTemplate_inline_css" class="required">Category<span class="required">*</span></label>            
									<select data-title="Inline css" data-container="body" data-toggle="popover" data-content="Select Category" class="form-control has-help-text" placeholder="Inline css" data-placement="top" name="CustomerEmailTemplate[inline_css]" id="CustomerEmailTemplate_inline_css">
										<option value="Corporate" selected="selected">Corporate</option>
										<option value="Foods">Foods</option>
										<option value="Health">Health</option>
									</select>
								</div>
								<div class="clearfix">
									<!-- -->
								</div>
								<hr />
								<div class="form-group">
									<label for="CustomerEmailTemplate_content" class="required">Content <span class="required">*</span></label>            
									<textarea class="form-control ckeditor" placeholder="Content" rows="15" name="CustomerEmailTemplate[content]" id="CustomerEmailTemplate_content">
									</textarea>
								</div>
							</div>
							<div class="panel-footer">
								<div class="pull-right">
									<button type="submit" class="btn btn-default btn-submit" data-loading-text="Please wait, processing...">Save changes</button>
								</div>
								<div class="clearfix">
									<!-- -->
								</div>
							</div>
						</div>
					</form>
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
                                        <div class="form-group">
                                            <strong>Category Name:</strong>
                                            <input class="form-control" type="text" name="category_name" id="category_name" />
                                        </div>
                                        <div class="fileupload fileupload-new margin-none" data-provides="fileupload">
                                            <div class="input-group">
                                                <div class="form-control col-md-3">
                                                	<i class="fa fa-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file">
                                                    <span class="fileupload-new">Select file</span>
                                                    <span class="fileupload-exists">Change</span>
                                                    <input type="file" class="margin-none" name="thumbfile" id="thumbfile" />
                                                    </span>
                                                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="clearfix"><!-- --></div>
                                        <hr />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-submit">Add Category</button>
                                    </div>
                                    <div class="clearfix"><!-- --></div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 listWrapper">
		<!-- Widget -->
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="search-result-content">
					User Name: {user_name}<br />
					First Name: {first_name}<br />
					Last Name: {last_name}<br />
					Full Name: {full_name}<br />
					Email ID: {email_id}<br />
				</div>
			</div>
		</div>
		<!-- // Widget END -->
	</div>
</div>
<script type="text/javascript">
	/*<![CDATA[*/
	jQuery(function($) {

		// Variable to store your files
		var files;
		// Add events
		$('input[type=file]').on('change', prepareUpload);
		// Grab the files and set them to our variable
		function prepareUpload(event) {
			files = event.target.files;
		}

		$('#template-add-cat-form').on('submit', uploadFiles);

		// Catch the form submit and upload the files
		function uploadFiles(event)
		{
			event.stopPropagation(); // Stop stuff happening
			event.preventDefault(); // Totally stop stuff happening
			$('.ajax-loading').removeClass('hide');
			// Create a formdata object and add the files
			var data = new FormData();
			$.each(files, function(key, value) {
				data.append(key, value);
			});
			$.ajax({
				url: '<?php echo FOLDERNAME; ?>/eblasts/add_template_category/?files=yes',
				type: 'POST',
				data: data,
				cache: false,
				dataType: 'json',
				processData: false, // Don't process the files
				contentType: false, // Set content type to false as jQuery will tell the server its a query string request
				success: function(data, textStatus, jqXHR) {
					if(typeof data.error === 'undefined') {
						// Success so call function to process the form
						submitForm(event, data);
					}
					else {
						// Handle errors here
						console.log('ERRORS: ' + data.error);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle errors here
					console.log('ERRORS: ' + textStatus);
					// STOP LOADING SPINNER
				}
			});
		}

		function submitForm(event, data)
		{
			// Create a jQuery object from the form
			$form = $(event.target);
			// Serialize the form data
			var formData = $form.serialize();
			// You should sterilise the file names
			$.each(data.files, function(key, value) {
				formData = formData + '&filenames[]=' + value;
			});

			$.ajax({
				url: '<?php echo FOLDERNAME; ?>/eblasts/add_template_category/?files=no',
				type: 'POST',
				data: formData,
				cache: false,
				dataType: 'json',
				success: function(data, textStatus, jqXHR)
				{
					if(typeof data.error === 'undefined') {
						// Success so call function to process the form
						console.log('SUCCESS: ' + data.success);
					}
					else {
						// Handle errors here
						console.log('ERRORS: ' + data.error);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle errors here
					console.log('ERRORS: ' + textStatus);
				},
				complete: function()
				{
					$('.ajax-loading').addClass('hide');
				}
			});
		}

	var wysiwygOptionsCustomerEmailTemplate_content = {'language':'en','contentsCss':['/assets/css/bootstrap.min.css','/assets/css/style.css'],'filebrowserBrowseUrl':'/extensions/ckeditor/filemanager','filebrowserImageWindowHeight':400,'fullPage':true,'allowedContent':true,'height':800};

	$("#CustomerEmailTemplate_content").ckeditor(wysiwygOptionsCustomerEmailTemplate_content);

	});
	/*]]>*/
</script>