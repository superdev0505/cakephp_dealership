<script src="/app/View/Themed/Default/webroot/assets/components/common/forms/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
     var editor = CKEDITOR.instances['content_data'];
    if (editor) { editor.destroy(true); }
    CKEDITOR.replace('content_data');
</script>

<script type="text/javascript">
    $script.ready('bundle', function() {
        
        $("#editbtn").click(function(){
            $("#savebtn").css( "display", "inline");
             $("#cancelbtn").css( "display", "inline");
            $("#editbtn").css( "display", "none");
            $("#showinfo").css( "display", "none");
            $("#Editinfo").css( "display", "inline");
        });
        
        $("#cancelbtn").click(function(){
        //$('#cancelbtn').live('click', function() {
            //alert('test');
            $("#savebtn").css( "display", "none");
            $("#cancelbtn").css( "display", "none");
            $("#Editinfo").css( "display", "none");
            $("#showinfo").css( "display", "inline");
           $("#editbtn").css( "display", "inline");
            
        });
        
        
    });
    
    /////save data
        function saveData(){
		var content = '';
        
		content = CKEDITOR.instances.txtContent.getData();

                    $.ajax({
			type: "get",
			cache: false,
			data: {'content': content},
			url:  "/knowledge_bases/savedata/<?=$data['KnowledgeBase']['id']?>",
			success: function(data){
				if($.trim(data)=='success'){
					$("#edit_response").html('<div class="alert alert-success"><button data-dismiss="alert" class="close" type="button">×</button><strong>Successful!</strong> Data is saved.</div>');
                                        
					$("#showinfo").html('');
					$("#showinfo").html(content);
                                         $("#savebtn").css( "display", "none");
                                        $("#cancelbtn").css( "display", "none");
                                        $("#Editinfo").css( "display", "none");
                                        $("#showinfo").css( "display", "inline");
                                       $("#editbtn").css( "display", "inline");
                                       $(".alert").delay(3000).fadeOut("slow");
                                       
				}else if($.trim(data)!=''){
					$("#edit_response").html('<div class="alert alert-danger"><button data-dismiss="alert" class="close" type="button">×</button>'+data+'</div>');
				}
			}
		});
	}
       /////save data end
    </script>

<style type="text/css">
    .modal-dialog {
    width: auto !important;
    padding: 20px;
}
    
</style>
<br>
<div class="innerLR">

    <h2>Dashboard</h2>

    <!-- BreadCum -->
    <div class="input-group">
        <div class="kb-breadcrumbs"> 
             <a href="/knowledgebases/index"><strong>Knowledge Base</strong> » 
            <a href="#">Dashboard</a> » 
            <a href="#">
               Closed(Month)
            </a>
        </div>
    </div>

    <div class="separator-h"></div>

    <div class="row">

        <div class="col-md-12">
            <div class="widget">

                <!-- Category Heading -->
                <h4 class="innerAll bg-gray border-bottom margin-bottom-none">
               Closed(Month)
               <?php if(AuthComponent::user('group_id')==9 || AuthComponent::user('group_id')==1){ ?>
                           <div class="text-right">
                <button  id="editbtn"  type="button" class="btn btn-success">Edit</button>&nbsp;
                <button type="button" id="savebtn" onclick="saveData();" style="display:none;" class="btn btn-success">Save</button>&nbsp;
                <button type="button" id="cancelbtn"  style="display:none;" class="btn btn-danger">Cancel</button>
            </div>
               <?php
               }
               ?>
                </h4>

                <!-- Category Links -->
                <div class="row innerAll">
                    <div id="edit_response"></div>
                    <div style="margin-left: 5px;" id="showinfo" >
                        <?php
                        echo $data['KnowledgeBase']['content'];
                        ?>
                    </div>
                    <div style="display:none;" id="Editinfo">
                        <textarea  name="content_data" class="ckeditor" style="width: 100%;" id="txtContent"><?php echo $data['KnowledgeBase']['content']; ?> </textarea> 
                    </div> 
                        
                </div>

            </div><!-- // END col-separator -->	
        </div>
        <!-- // END col -->
    </div>
    <!-- // END row -->

</div>