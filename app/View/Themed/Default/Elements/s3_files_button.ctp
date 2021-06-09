<!-- <button id="btn-submit-lead" class="btn btn-inverse" type="button" onclick="ShowManageS3Files('show');">Image Archive</button> -->
<style>
.largeWidth {
    margin: 0 auto;
    width: 900px;
}
</style>
<script>
function ShowManageS3Files(){
	$.ajax({
			type: "GET",
			url:  "/users/ShowManageS3File",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Manage Files",
					
				}).find("div.modal-dialog").addClass("largeWidth");;
				
				
				
				
			}
		});
}
</script>