<?php
// echo $this->Form->create('ContactS3', array('url'=>array('controller'=>'contact_s3', 'action'=> 'upload'),  'type' => 'post', 'class' => 'apply-nolazy form-horizontal','type' => 'file')); 
?>	

 <form class="apply-nolazy form-horizontal" id="s3imgform" 
 action="https://<?php echo $bucket; ?>.s3.amazonaws.com/" method="post" enctype="multipart/form-data">

	<input type="hidden" name="key" value="<?php echo $filename; ?>${filename}">
	<input type="hidden" name="AWSAccessKeyId" value="AKIAJCHHC37LYOABAIIQ"> 
	<input type="hidden" name="acl" value="private"> 
	<input type="hidden" name="success_action_redirect" value="https://app.dealershipperformancecrm.com/contact_s3/test/">
	<input type="hidden" name="policy" value="<?php echo $policy; ?>">

	<input type="hidden" name="signature" value="<?php echo $signature; ?>">
	<input type="hidden" name="Content-Type" value="">	


	<div class="row"> 
		<div class="col-sm-8">
			<?php //echo $this->Form->input('image', array('class'=>"form-control",'type'=>'file','label'=>false,'div'=>false,'style'=>'height:auto;','id'=>'settingImage' )); ?>
			<input name="file" id="settingImage" type="file" class="form-control" 'style'='height:auto;' > 
		</div>
		<div class="col-sm-4">
			<button type="button" class="btn btn-success" id="upload">Upload</button>
		</div>
	</div>

</form> 	
<?php 
// echo $this->Form->end(); 
// //debug( number_format($size/1024, 1, '.', '')    );  
?>
<div class="separator"></div>
<hr>
<div id="s3_files_list">Loading files...</div>

<script type="text/javascript">
$(function (){

	$.ajax({
		type: "GET",
		url: '/contact_s3/file_list/<?php echo $this->params['pass']['0']; ?>',
		success: function(data){
			$("#s3_files_list").html(data);
		}
	});



	$('#upload').on('click', function() {

	    if($("#settingImage").val() != ''){
			var form_data = new FormData( $("#s3imgform")[0] );   
	        
			$("#upload").html("Uploading...");
			$("#upload").attr("disabled", 'disabled');

	      $.ajax({
	            url: 'https://<?php echo $bucket; ?>.s3.amazonaws.com/',
	            cache: false,
	            contentType: false,
	            processData: false,
	            data: form_data,                         
	            type: 'post',
		        success: function(data){
					
					$("#upload").html("Upload");
					$("#upload").attr("disabled", false);
					$("#settingImage").val("");
		          

					$.ajax({
						type: "GET",
						url: '/contact_s3/file_list/<?php echo $this->params['pass']['0']; ?>',
						success: function(data){
							$("#s3_files_list").html(data);
						}
					});	
	      			console.log(data);


		        },
				error: function (xhr, ajaxOptions, thrownError) {
					$("#upload").html("Upload");
					$("#upload").attr("disabled", false);
					$("#settingImage").val("");  


					$.ajax({
						type: "GET",
						url: '/contact_s3/file_list/<?php echo $this->params['pass']['0']; ?>',
						success: function(data){
							$("#s3_files_list").html(data);
						}
					});	


					// alert(xhr.statusText);
				}
	      });

	    }else{
			alert("Please select a file");
	    }
	    return false; 
	});











	// $('#upload').on('click', function() {

	// 	if($("#settingImage").val() != ''){
	// 		var file_data = $('#settingImage').prop('files')[0];   
	// 	    var form_data = new FormData();                  
	// 	    form_data.append('file', file_data);
			
	// 		$("#upload").html("Uploading...");
	// 		$("#upload").attr("disabled", 'disabled');

	// 		$.ajax({
	// 	        url: '/contact_s3/upload/<?php echo $this->params['pass']['0']; ?>',
	// 	        cache: false,
	// 	        contentType: false,
	// 	        processData: false,
	// 	        data: form_data,                         
	// 	        type: 'post',
	// 			success: function(data){
	// 				$("#upload").html("Upload");
	// 				$("#upload").attr("disabled", false);
	// 				$("#settingImage").val("");
	// 				$("#s3_files_list").html(data);
	// 			},
	// 	     	error: function (xhr, ajaxOptions, thrownError) {

	// 	     		$("#upload").html("Upload");
	// 				$("#upload").attr("disabled", false);
	// 				$("#settingImage").val("");

	// 	        	if(xhr.statusText == 'Request Entity Too Large' ){
	// 	        		alert('File size is too large please limit this to (1MB)');
	// 	        	}
	// 	      	}
	// 		});

	// 	}else{
	// 		alert("Please select a file");
	// 	}

	    
	// });





});



</script>
