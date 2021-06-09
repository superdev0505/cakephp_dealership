<br /><br />
<br />
<div class="innerAll">

	GIT Sync and Debug Modest

	<div class="widget">
		<div class="widget-body innerAll">

			<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main">
				<tr>
					<th>Server</th>
					<th>GIT Sync</th>
					<th>Debug Mode</th>
				</tr>
				<tr>
					<td><span>Live Site</span></td>
					<td><button id="svnup_live" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i> GIT Sync</button></td>
					<td>
						<button class="btn btn-danger btn-xs set_debug" data-server="live" style="display:none;" data-debugmode = "1">
							Set Debug 1
						</button>
						<button class="btn btn-success btn-xs set_debug" data-server="live" data-debugmode = "0">
							Set Debug 0
						</button>
					</td>
				</tr>
				<tr>
					<td><span >Handler</span></td>
					<td><button id="svnup_handler" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i> GIT Sync</button></td>
					<td>
						<button class="btn btn-danger btn-xs set_debug" data-server="handler" data-debugmode = "1">
							Set Debug 1
						</button>
						<button class="btn btn-success btn-xs set_debug" data-server="handler" data-debugmode = "0">
							Set Debug 0
						</button>
					</td>
				</tr>
				<tr>
					<td><span >Devteam</span></td>
					<td><button id="svnup_devteam" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i> GIT Sync</button></td>
					<td>
						<button class="btn btn-danger btn-xs set_debug" data-server="devteam" data-debugmode = "1">
							Set Debug 1
						</button>
						<button class="btn btn-success btn-xs set_debug" data-server="devteam" data-debugmode = "0">
							Set Debug 0
						</button>
					</td>
				</tr>
				<tr>
					<td><span >Eblast</span></td>
					<td><button id="svnup_eblast" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i> GIT Sync</button></td>
					<td>
						<button class="btn btn-danger btn-xs set_debug" data-server="eblast" data-debugmode = "1">
							Set Debug 1
						</button>
						<button class="btn btn-success btn-xs set_debug" data-server="eblast" data-debugmode = "0">
							Set Debug 0
						</button>
					</td>
				</tr>
				<tr>
					<td><span >Mobile</span></td>
					<td><button id="svnup_mobile" class="btn btn-primary btn-xs"><i class="fa fa-refresh"></i> GIT Sync</button></td>
					<td>
						<button class="btn btn-danger btn-xs set_debug" data-server="mobile" data-debugmode = "1">
							Set Debug 1
						</button>
						<button class="btn btn-success btn-xs set_debug" data-server="mobile" data-debugmode = "0">
							Set Debug 0
						</button>
					</td>
				</tr>
			</table>

			<div>
				Clear Dealer Cache:
				<input type="text" class="form-control input-sm" style="display: inline-block; width: 60px" name="delerid" id="cache-dealerid">
				<button class="btn btn-success btn-sm" id="btn-clear-dealer-cache" >
							<i class="fa fa-trash-o"></i> Clear Cache
				</button>
			</div>

		</div>
	</div>

</div>



<script type="text/javascript">


$(function(){

	//Set Debug 1/2

	$(".set_debug").click(function(){

		$(this).attr("disabled", true);

		var server = $(this).attr("data-server");
		var debug_mode = $(this).attr("data-debugmode");
		if(confirm("Do you want to set debug?")){

			$.ajax({
				type: "GET",
				cache: false,
				url: "/devs/call_update_request/"+server+"/debug/"+debug_mode,
				context: $(this),
				success: function(data){
					$(this).attr("disabled", false);
					var message_apt_show = '<pre>'+data+'</pre>';
					bootbox.dialog({
						message: message_apt_show,
						backdrop: true,
						title: "Debug Mode",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});


		}

	});




	//GIT Sync

	$("#svnup_eblast").click(function(){
		$("#svnup_eblast").attr("disabled", true);
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/mobile/svnup",
			success: function(data){
				$("#svnup_eblast").attr("disabled", false);
				var message_apt_show = '<pre>'+data+'</pre>';
				bootbox.dialog({
					message: message_apt_show,
					backdrop: true,
					title: "GIT Sync",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});

	$("#svnup_mobile").click(function(){
		$("#svnup_mobile").attr("disabled", true);
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/mobile/svnup",
			success: function(data){
				$("#svnup_eblast").attr("disabled", false);
				var message_apt_show = '<pre>'+data+'</pre>';
				bootbox.dialog({
					message: message_apt_show,
					backdrop: true,
					title: "GIT Sync",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});

	$("#svnup_devteam").click(function(){
		$("#svnup_devteam").attr("disabled", true);
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/devteam/svnup",
			success: function(data){
				$("#svnup_devteam").attr("disabled", false);
				var message_apt_show = '<pre>'+data+'</pre>';
				bootbox.dialog({
					message: message_apt_show,
					backdrop: true,
					title: "GIT Sync",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});

	$("#svnup_handler").click(function(){
		$("#svnup_handler").attr("disabled", true);
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/handler/svnup",
			success: function(data){
				$("#svnup_handler").attr("disabled", false);
				var message_apt_show = '<pre>'+data+'</pre>';
				bootbox.dialog({
					message: message_apt_show,
					backdrop: true,
					title: "GIT Sync",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});

	$("#svnup_live").click(function(){
		$("#svnup_live").attr("disabled", true);
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/live/svnup",
			success: function(data){
				$("#svnup_live").attr("disabled", false);
				var message_apt_show = '<pre>'+data+'</pre>';
				bootbox.dialog({
					message: message_apt_show,
					backdrop: true,
					title: "GIT Sync",
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});

	});



	$("#btn-clear-dealer-cache").click(function(){

		var dealer = $("#cache-dealerid").val();
		if(dealer == ''){
			alert("Please enter dealer id");
			$("#cache-dealerid").focus();
		}else{

			$.ajax({
				type: "GET",
				cache: false,
				url: "https://app.dealershipperformancecrm.com/manage_cache/refresh/"+dealer,
				success: function(data){
					//console.log(data);
					alert("Dealer Cache Cleared Successfully!");
				}
			});

		}

	});







});








</script>
