(function($)
{	
		editor=CKEDITOR.instances['TemplateTemplateHtml'];
		if(editor)
		{
			CKEDITOR.remove(editor);
		}
		CKEDITOR.replace( 'TemplateTemplateHtml' );	
				
		
		$("a.template-field").click(function(){
			CKEDITOR.instances['TemplateTemplateHtml'].insertText($(this).attr('field-name'));
			
		});
			
		$('#btn-template-preview').click(function () {
			editordata = CKEDITOR.instances["TemplateTemplateHtml"].getData();
			$("#template-preview-content").html(editordata);
		});



		CKEDITOR.on( 'instanceReady', function( ev ){
			ev.editor.dataProcessor.writer.setRules( 'br',{
	            indent : false,
	            breakBeforeOpen : false,
	            breakAfterOpen : false,
	            breakBeforeClose : false,
	            breakAfterClose : false
	         });
	   });

		editor1 = CKEDITOR.instances['TemplateTemplateHtml'];
		editor1.addCommand("mySimpleCommand", {
		    exec: function(edt) {
		        ShowManageS3Files('show');
		    }
		});
		editor1.ui.addButton('SuperButton', {
		    label: "Image Upload",
		    command: 'mySimpleCommand',
		});

		//email preview
		editor1.addCommand("mailPreviewCommand", {
		    exec: function(edt) {
		        ShowEmailPreview();
		    }
		});
		editor1.ui.addButton('EmailPreview', {
		    label: "Preview",
		    command: 'mailPreviewCommand',
		});



		
		//Send test email
		// $("#send_test_email").click(function(){
		// 	editordata = CKEDITOR.instances["TemplateTemplateHtml"].getData();
			
		// 	if($("#email").val() != '' && editordata != '' && $("#TemplateTemplateEmailSubject").val() != ''){
		// 		$.ajax({
		// 			url: '/eblasts/send_test_email',
		// 			type: 'POST',
		// 			data: {'emails': $("#email").val(),'template': editordata, 'subject': $("#TemplateTemplateEmailSubject").val()},
		// 			cache: false,
		// 			success: function(data, textStatus, jqXHR){
		// 				setTimeout(function(){
		// 					if( !$('#add-another').is(':checked') ) { $('#template-test-email').modal('hide'); }
		// 				}, 1000);
		// 			},
		// 			error: function(jqXHR, textStatus, errorThrown) {
		// 				//window.location = window.location;
		// 			},
		// 			complete: function(){
	
		// 			}
		// 		});
		// 	}else{
		// 		$('.msg1').html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error!</strong> Please enter email address, subject and template content!</div>');
		// 	}
			
			
		// 	return false;
		// });

		// $('#submitbtn').click(function(){
		// 	if( $('#category_name').val().length < 2 ) {
		// 		$('.msg').html('<div class="alert alert-warning"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error!</strong> Enter category name!</div>');
		// 		return false;
		// 	}

		// 	$.ajax({
		// 		url: '/eblasts/add_template_category',
		// 		type: 'POST',
		// 		data: $('#template-add-cat-form').serialize(),
		// 		cache: false,
		// 		dataType: 'json',
		// 		success: function(data, textStatus, jqXHR)
		// 		{
		// 			if(typeof data.error === 'undefined') {
		// 				// Success so call function to process the form
		// 				// console.log('SUCCESS: ' + data.success);

		// 				$('.msg').html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Success!</strong> New category name saved!</div>');

		// 				setTimeout(function(){
		// 					if( !$('#add-another').is(':checked') ) { $('#template-add-category').modal('hide'); }
		// 					$('.msg').html('');
		// 					$('#category_name').val('');
		// 				}, 1000);
		// 				$('.catList').load('<?php echo $this->webroot; ?>eblasts/load_categories');
		// 			}
		// 			else {
		// 				// Handle errors here
		// 				// console.log('ERRORS: ' + data.error);
		// 				$('.msg').html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">x</button> <strong>Error:</strong> '+data.error+'</div>');
		// 			}
		// 		},
		// 		error: function(jqXHR, textStatus, errorThrown) {
		// 			// Handle errors here
		// 			// console.log('ERRORS: ' + textStatus);
		// 			window.location = window.location;
		// 		},
		// 		complete: function()
		// 		{
		// 			$('.ajax-loading').addClass('hide');
		// 		}
		// 	});
		// });

})(jQuery);