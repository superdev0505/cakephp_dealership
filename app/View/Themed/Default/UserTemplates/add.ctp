</br>
</br>
</br>
</br>
<?php
$template_type = array ('user' => 'Internal', 'customer' => 'Customer');

echo $this->Session->flash('flash', array('element' => 'alert')); ?>
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
					<?php echo $this->Form->create('UserTemplate', array('class' => 'form-inline apply-nolazy', 'role'=>"form", 'method'=>'post','type' => 'file')); ?>
						<?php
						if(isset($this->request->params['pass'][1]))
							echo $this->Form->hidden('id');
						?>

						<div class="panel panel-default">
							<div class="panel-heading bg-primary">
								<div class="clearfix">
									<h3 class="pull-left">
										<font color="white">Add Template - <?php echo $template_type[$this->request->params['pass'][0]]; ?></font>
									</h3>
									<div class="pull-right">

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

								<div class="form-group col-lg-6">
								<?php
									echo $this->Form->label('template_title','Template Title');
									echo $this->Form->input('template_title', array( 'type' => 'text','label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>
                                <div class="form-group col-lg-6">
								<?php
									echo $this->Form->label('template_email_subject','Template Subject');
									echo $this->Form->input('template_email_subject', array( 'type' => 'text','label'=>false,'div'=>false,'class' => 'form-control', 'required' => 'required' ));
                                ?>
								</div>

								<div class="clearfix hspace12">&nbsp;</div>

								<div class="form-group col-lg-12">
								<?php
									echo $this->Form->label('template_html','Template Editor:');
									echo $this->Form->textarea('template_html', array('id'=>'TemplateTemplateHtml','class' => 'form-control'));
                                ?>
								</div>

								<div class="clearfix hspace12">&nbsp;</div>
								<hr />
								<div class="clearfix hspace12">&nbsp;</div>

							</div>
							<div class="panel-footer">
								<a href="<?php echo $this->Html->url(array('action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>

								<?php if( !isset($this->request->params['pass']['1']) ) { ?>
								&nbsp; &nbsp; <button type="button" id="btn_save_email_druft" class="btn btn-warning" >Save Draft</button>
								<?php } ?>

								<div class="pull-right">
									<button type="submit" class="btn btn-success btn-submit" data-loading-text="Please wait, processing...">Save Template Changes</button>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					<?php echo $this->Form->end(); ?>






				</div>
			</div>
	</div>

	<div class="col-md-2 listWrapper">
		<!-- Widget -->
<div class="panel-heading bg-primary"><h4>User Inputs</h4></div>
<div class="panel panel-default">
			<div class="panel-body">
				<div id="search-result-content">

					<?php if($this->params['pass'][0] == 'customer'){ ?>


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
                     Stock #: <a href="javascript:" field-name="{stock_num}" class="template-field"><span class="label label-success label-stroke">{stock_num}</span></a><br />
                    Modified Full Date: <a href="javascript:" field-name="{modified_full_date}" class="template-field"><span class="label label-success label-stroke">{modified_full_date}</span></a><br />
                    Modified: <a href="javascript:" field-name="{modified}" class="template-field"><span class="label label-success label-stroke">{modified}</span></a><br />
                    <!-- Mobile: <a href="javascript:" field-name="{mobile}" class="template-field"><span class="label label-success label-stroke">{mobile}</span></a><br /> -->
                    Address: <a href="javascript:" field-name="{address}" class="template-field"><span class="label label-success label-stroke">{address}</span></a><br />
                    City: <a href="javascript:" field-name="{city}" class="template-field"><span class="label label-success label-stroke">{city}</span></a><br />
                    State: <a href="javascript:" field-name="{state}" class="template-field"><span class="label label-success label-stroke">{state}</span></a><br />

					<?php }elseif($this->params['pass'][0] == 'user'){ ?>

					User Name: <a href="javascript:" field-name="{username}" class="template-field"><span class="label label-success label-stroke">{username}</span></a><br />
                    First Name: <a href="javascript:" field-name="{first_name}" class="template-field"><span class="label label-success label-stroke">{first_name}</span></a><br />
                    Last Name: <a href="javascript:" field-name="{last_name}" class="template-field"><span class="label label-success label-stroke">{last_name}</span></a><br />
                    Full Name: <a href="javascript:" field-name="{full_name}" class="template-field"><span class="label label-success label-stroke">{full_name}</span></a><br />
                    Email ID: <a href="javascript:" field-name="{email}" class="template-field"><span class="label label-success label-stroke">{email}</span></a><br />


					<?php } ?>

				</div>
			</div>
		</div>
		<!-- // Widget END -->

	</div>
	<?php //echo $this->element('sql_dump'); ?>

</div>
<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>



	$("#btn_save_email_druft").click(function(){

		var message_body = CKEDITOR.instances["TemplateTemplateHtml"].getData();
		//console.log(contact_id,message_body, subject);

		$.ajax({
			type: "POST",
			url: "/drafts/druft_template",
			data: {'message_body':message_body},
			success: function(data){
				alert("Draft saved successfully");
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













	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});




</script>
