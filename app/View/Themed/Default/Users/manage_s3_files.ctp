<script  type="text/javascript" src="/app/View/Themed/Default/webroot/assets/components/library/copytoclipbord/ZeroClipboard.js?v=v1.0.2&sv=v0.0.1"></script>

<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div id="failure_message"></div>
	<div class="widget widget-body-white">
			<div class="widget-body">
				<?php echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=> 'ManageS3Files'), 'type' => 'post', 'class' => 'apply-nolazy form-horizontal','type' => 'file')); ?>	
				<input type="hidden" name="filecontents" id="filecontents" value="" />
					<div class="row"> 
						<div class="panel-heading bg-primary"><h4>Upload Image</h4></div>
						<div class="separator"></div>
						<div  id="uploadimgthmb" style="padding-left:12px;">
							
						</div>
							
						<div class="col-sm-8">
						
							<?php echo $this->Form->input('image', array('class'=>"form-control",'type'=>'file','label'=>false,'div'=>false,'style'=>'height:auto;','id'=>'settingImage','onchange'=>'readURL(this)')); ?>
						</div>
						<div  style="display:block;float:right;padding-right:5px;">
							<button type="button" class="btn btn-success" id="upload">Upload</button>
							<div id="button_message" style="display:none;">Processing.......</div>
						</div>
							
					</div>
				<?php echo $this->Form->end(); ?>
				
				<div class="separator"></div>
				<div class="row"> 

					<div class="panel-heading bg-primary"><h4>Uploaded Files</h4></div>
					<div style="padding-left:10px;"  id="s3_files_list">
						<?php echo $this->element( 'manage_s3_files' ); ?>
					</div>
					</div>
				</div>
			
    
		</div>
	</div>

<script>
$('#upload').on('click', function() {
    var file_data = $('#settingImage').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
	$("#upload").hide();
	$("#button_message").show();
    $.ajax({
                url: '/users/UploadS3File',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(data){
                	$("#uploadimgthmb").html("");
					if(typeof data.success!='undefined'){
	$("#failure_message").html('<div class="alert alert-success"><strong>Success! </strong>'+data.success+'</div>');
						$("#s3_files_list").html("Loading..........");
						$.ajax({
							type: "GET",
							url:  "/users/GetS3Files",
							success: function(data){
								$("#s3_files_list").html(data);
							}
						});
					}else{
	$("#failure_message").html('<div class="alert alert-danger"><strong>Success!</strong>'+data.error+'</div>');
					}
					$("#upload").show();
					$("#button_message").hide();

					setTimeout(function(){
						$("#failure_message").html("");
					},3000);




                }
     });
});

   function readURL(input) {
		if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
				if($('#previewImg').length)
				{
                $('#previewImg').attr('src', e.target.result);
				}
				else
				{
					$('#uploadimgthmb').html('<img src="'+e.target.result+'" id="previewImg" style="height:120px;width:110px" />');
					$("#filecontents").val(e.target.result);
				}
				
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script type="text/javascript">
$( document ).ready(function() {
	var client = new ZeroClipboard($(".copybutton"));
		client.on( "ready", function( readyEvent ) {
		  // alert( "ZeroClipboard SWF is ready!" );

		  client.on( "aftercopy", function( event ) {
			// `this` === `client`
			// `event.target` === the element that was clicked
			//event.target.style.display = "none";
			//alert(event.target.id);
			id = event.target.id;
			$(event.target).removeClass("btn-primary");
			$(event.target).addClass("btn-inverse");
			//$("#span_"+id).text("Copied");
		  } );
		} );
});

var client = new ZeroClipboard($(".copybutton"));
		client.on( "ready", function( readyEvent ) {
		  // alert( "ZeroClipboard SWF is ready!" );

		  client.on( "aftercopy", function( event ) {
			// `this` === `client`
			// `event.target` === the element that was clicked
			//event.target.style.display = "none";
			//alert(event.target.id);
			id = event.target.id;
			$(event.target).removeClass("btn-primary");
			$(event.target).addClass("btn-inverse");
			//$("#span_"+id).text("Copied");
		  } );
		} );
</script>
    

