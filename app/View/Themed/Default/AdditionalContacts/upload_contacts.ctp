
	<h4 class="innerAll border-bottom margin-bottom-none"> 
		<i class="fa fa-upload"></i> Upload a CSV
	</h4>
	

			


	<?php echo $this->Form->create('AdditionalContact', array( 'class' => 'apply-nolazy', 'role'=>"form")); ?>
		<div class="innerAll">


			<div class="row">
				<div class="col-md-6">
					<p class="help-block">
						<i class="fa fa-info"></i> <strong>Please Note: </strong> 
					</p>
				</div>
				<div class="col-md-6 text-right">
					<a class="no-ajaxify" href="/app/webroot/files/additional_contact_template.csv"><i class="fa fa-download"></i>  Download CSV Template</a>

				</div>
			</div>



			<div class="form-group">
				<div class="input-group">
					<label class="btn btn-primary btn-sm" for="inputCsvUpload" title="Upload image file">
						<input class="hide" id="inputCsvUpload" name="file" type="file">
						<i class="fa fa-file"></i> Select File
			        </label>
				</div>
			</div>
			
			<div class="form-group margin-none">
		  		<input type="checkbox" id="first_row_header" name="first_row_header" value="option1"> The first row contains headers
			</div>

		</div>

	  	<div class="text-center border-top innerTB">
	  		<button type="button" id="btn_upload_list" class="btn btn-primary"><i class="fa fa-save"></i> Upload</button>
	  		<button type="button"  class="btn btn-imp" data-dismiss="modal">Cancel</button>
		</div>	
<?php echo $this->Form->end(); ?>


<script type="text/javascript">

$(function(){


	$("#btn_upload_list").click(function(){
		//console.log("test");
		if($("#inputCsvUpload").val() != ''){

			$("#btn_upload_list").attr("disabled", true);

			var file_data = $('#inputCsvUpload').prop('files')[0];   
		    var form_data = new FormData();                  
		    form_data.append('file', file_data);
		    form_data.append('first_row_header',  $("#first_row_header").is(":checked") );

			$.ajax({
		        url: $("#AdditionalContactUploadContactsForm").attr("action"),
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: form_data,                         
		        type: 'post',
				success: function(data){	

					if(data == 'success'){
						bootbox.hideAll();
						$.ajax({
							type: "GET",
							cache: false,
							url: "/contacts/lead_details/<?php echo $contact_id; ?>",
							success: function(data){
								$("#lead_details_content").html(data);
							}
						});
					}else{
						$("#btn_upload_list").attr("disabled", false);
						alert(data);
					}

				},
				error: function (xhr, ajaxOptions, thrownError) {
					$("#btn_upload_list").attr("disabled", false);
					alert(thrownError);
				}
			});

		}else{
			alert("Please select a csv file")
		}


	});	





});





</script>






		