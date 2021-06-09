<br>
<br>
<br>
<div class="innerAll" >

    <form class="apply-nolazy" id="s3imgform" action="https://<?php echo $bucket; ?>.s3.amazonaws.com/" method="post" enctype="multipart/form-data">
      <input type="hidden" name="key" value="<?php echo $filename; ?>${filename}">
      <input type="hidden" name="AWSAccessKeyId" value="AKIAJCHHC37LYOABAIIQ"> 
      <input type="hidden" name="acl" value="private"> 
      <input type="hidden" name="success_action_redirect" value="http://dp360crm/contact_s3/uplaod">
      <input type="hidden" name="policy" value="<?php echo $policy; ?>">

      <input type="hidden" name="signature" value="<?php echo $signature; ?>">
      <input type="hidden" name="Content-Type" value="">
      <!-- Include any additional input fields here -->

      File to upload to S3: 
      <input name="file" id="settingImage" type="file"> 
      <br> 
      <input type="submit" id="upload" value="Upload File to S3"> 
    </form> 

</div>

<script type="text/javascript">

$(function (){


  $('#upload').on('click', function() {

    if($("#settingImage").val() != ''){
        //var file_data = $('#settingImage').prop('files')[0];   
        var form_data = new FormData( $("#s3imgform")[0] );   
        // console.log(form_data);               
        // form_data.append('file', file_data);
      
      // $("#upload").html("Uploading...");
      // $("#upload").attr("disabled", 'disabled');


      $.ajax({
            url: 'https://<?php echo $bucket; ?>.s3.amazonaws.com/',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
        success: function(data){
          // $("#upload").html("Upload");
          // $("#upload").attr("disabled", false);
          // $("#settingImage").val("");
          // $("#s3_files_list").html(data);
          console.log(data);
        },
          error: function (xhr, ajaxOptions, thrownError) {

            $("#upload").html("Upload");
            $("#upload").attr("disabled", false);
            $("#settingImage").val("");

              if(xhr.statusText == 'Request Entity Too Large' ){
                alert('File size is too large please limit this to (1MB)');
              }
            }
      });

    }else{
      alert("Please select a file");
    }

    return false;
      
  });





});



</script>