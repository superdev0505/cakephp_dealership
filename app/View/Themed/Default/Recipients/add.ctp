<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 800px;
}
.error-message{
	color: #FF0000;
}


</style>
<br><br><br>

<div class="innerAll">

	<div class="row">
		<div class="col-md-3">
			

			<div class="widget">
				<h4 class="innerAll border-bottom margin-bottom-none"> 
					<i class="fa fa-plus-square"></i> Add Recipient
				</h4>
				<?php echo $this->Form->create('Recipient', array('type'=>'post', 'autocomplete'=>"off", 'class' => 'apply-nolazy')); ?>
					<div class="innerAll">			
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user text-faded"></i></span>
								<input type="hidden" name="list_id" id="RecipientListId" value="<?php echo $list_id; ?>">
								<input type="text" name="name" class="form-control" id="RecipientName" placeholder="Full Name">
								</div>
						</div>
						<div class="form-group">
					  		<div class="input-group">
								<span class="input-group-addon"><i class="icon-envelope-1 text-faded"></i></span>
					        	<input type="email" name="email_address" class="form-control" id="RecipientEmailAddress" placeholder="Email Address">
							</div>
						</div>
					</div>

				  	<div class="text-center border-top innerTB">
				  		<button type="button" id="btn_save_list" class="btn btn-primary" ><i class="fa fa-save"></i> Submit</button>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>



			<div class="widget">
				<h4 class="innerAll border-bottom margin-bottom-none"> 
					<i class="fa fa-upload"></i> Upload a CSV
				</h4>
				<?php echo $this->Form->create('Recipient', array('url' =>array('controller'=>'recipients','action'=>"recipient_list","?"=>array("type"=>"upload",'list_id'=>$list_id)),'type'=>'post', 'autocomplete'=>"off", 'class' => 'apply-nolazy', 'id' => 'RecipientAddFormUpload' )); ?>
					<div class="innerAll">			
						<div class="form-group">
							<div class="input-group">
								
								<p class="help-block">
									<i class="fa fa-info"></i> <strong>Please Note:</strong> First Column is used for the customers (Full Name) and second column is used for (Email address) when uploading the (CSV) file to create a marketing list.
								</p>	

								<label class="btn btn-primary btn-sm" for="inputCsvUpload" title="Upload image file">
									<input class="hide" id="inputCsvUpload" name="file" type="file">
									<i class="fa fa-file"></i> Select File
						        </label>
							</div>
						</div>
						
						<div class="form-group margin-none">
					  		<label class="checkbox-inline checkbox-custom">
					  			<i class="fa fa-fw fa-square-o"></i>
								<input type="checkbox" id="first_row_header" name="first_row_header" value="option1"> The first row contains headers
							</label>
						</div>


					</div>

				  	<div class="text-center border-top innerTB">
				  		<button type="button" id="btn_upload_list" class="btn btn-primary" ><i class="fa fa-save"></i> Upload</button>
				  		<a href="/lists/" class="btn btn-danger"><i class="fa fa-arrow-circle-o-left"></i> Back</a>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>









		</div>
		<div class="col-md-9">
			<div class="widget">
				<h4 class="innerAll border-bottom margin-bottom-none"> <span class="text-primary"><?php echo $list['List']['list_name'];  ?></span> -  Recipients</h4>
				<div class="widget-body">
					<div id="recipient_container">
						
					</div>	
				</div>
			</div>	
		</div>
	</div>	


</div>

		
<script>
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
    return pattern.test(emailAddress);
};
$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$("#btn_save_list").click(function(){

		// if( $("#RecipientName").val() == '' ){
		// 	alert("Please enter name");
		// 	$("#RecipientName").focus()
		// 	return true;
		// }
		if( $("#RecipientEmailAddress").val() == '' ){
			alert("Please enter email address");
			$("#RecipientEmailAddress").focus()
			return true;
		}
		if(!isValidEmailAddress( $("#RecipientEmailAddress").val() )){
			alert("Please enter a valid email address");
			$("#RecipientEmailAddress").focus()
			return true;
		}

		$("#btn_save_list").attr("disabled", true);
		$.ajax({
			type: "POST",
			url:  "/recipients/recipient_list/?list_id=<?php echo $list_id; ?>",
			data: $("#RecipientAddForm").serialize(),
			success: function(data){
				$("#recipient_container").html(data);

				$("#RecipientEmailAddress").val("");
				$("#RecipientName").val("");
				$("#btn_save_list").attr("disabled", false);
			}
		});



	});	


	$("#btn_upload_list").click(function(){
		console.log("test");
		if($("#inputCsvUpload").val() != ''){

			var file_data = $('#inputCsvUpload').prop('files')[0];   
		    var form_data = new FormData();                  
		    form_data.append('file', file_data);
		    form_data.append('first_row_header',  $("#first_row_header").is(":checked") );

			$.ajax({
		        url: $("#RecipientAddFormUpload").attr("action"),
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: form_data,                         
		        type: 'post',
				success: function(data){
					//$("#upload").html("Upload");
					//$("#upload").attr("disabled", false);
					//$("#settingImage").val("");
					//$("#s3_files_list").html(data);

					$("#recipient_container").html(data);
				}
			});

		}else{
			alert("Please select a csv file")
		}


	});	
	
		
	$.ajax({
		type: "GET",
		cache: false,
		url:  "/recipients/recipient_list/",
		data: {"list_id":"<?php echo $list_id; ?>"},
		success: function(data){
			$("#recipient_container").html(data);
		}
	});


		
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>













