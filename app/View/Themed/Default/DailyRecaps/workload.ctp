<style type="text/css">

	.cke_button__superbutton_icon, .cke_button__emailpreview_icon{ display: none;}
	.cke_button__superbutton_label, .cke_button__emailpreview_label{display:  block;}
	.cke_button__superbutton, .cke_button__emailpreview{border: 1px solid #E1E1E1 !important;}

	.largeWidth3 {
	margin: 125px auto;
	width: 1180px;
	}

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
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}

@media (min-width:300px) and (max-width:480px)
{
.navbar.main {
    min-height: 0;
    height: 100px;}

.navbar > ul.main{ margin-top: -10px;
    margin-right: 140px;}

.btn-sm{ margin-top:20px;}

.widget .widget-head{ height:68px; line-height: 34px;}

.widget .widget-head .heading{ font-size: 11px;
    height: 38px; line-height:14px; }
}





</style>



<?php
$group_id = AuthComponent::user('group_id');

if(!$this->request->is('ajax')){
	echo '<br><br><br>';
}
?>

<?php
if(!isset($this->request->params['named']['reload']) && $this->request->params['named']['reload']!='reload'){
?>
<div class="innerLR" id="workload_container">
<?php
}

$activeTab = $activeTab;
if(isset($this->request->params['named']['activeTab'])){
	$activeTab = $this->request->params['named']['activeTab'];
}
?>

<br>

<input type='hidden' name="hdn_active" id="hdn_active" value="<?php echo $activeTab;?>" />
	<!-- row -->
	<div class="row">

		<!-- Button for Instock Search -->
			<div style='display: inline-block'>
				<button id="btn_search_stock_vin" v_type='main' type="button" class="btn btn-primary btn-sm ">
					<i class="fa fa-search"></i>
					Instock Search
				</button>
			</div>

		<div class="col-md-12">

							<div class='row'>
								<div class="col-md-offset-6 col-md-6" >
									<div class="pull-right" >
										<?php
											if($this->request->params['named']['ShowCompleted']=='yes'){
												$ShowCompletedChkd = 'checked="checked"';
											}else{
												$ShowCompletedChkd = '';
											}
										?>
										<!-- <input type="checkbox" <?php echo $ShowCompletedChkd;?> id="show_completed" onchange="return ShowCompleted()" > Show Completed &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
										<?php

										if(count($stat_options)>0){
											echo $this->Form->select('user_id', $stat_options, array('value'=>$selected_stats,'style'=>"display: inline-block;width: auto;","onchange"=>"return ReloadWorkload(this.value)"));
										}
										?>
									</div>
								</div>
							</div>


			<div class="wizard">


				<div class="widget widget-tabs widget-tabs-responsive">
					<!-- Widget heading -->
					<div class="widget-head" style="padding-right:0px;">


						<ul style="width: 98%">
							<li <?php if($activeTab=='tab3'){ ?> class="active" <?php } ?>><a href="#tab2-3" onclick="$('#hdn_active').val('tab3');LoadEvents('<?php echo $selected_stats;?>');" class="glyphicons alarm" data-toggle="tab"><i></i>EVENTS</a></li>
							<li <?php if($activeTab=='tab1'){ ?> class="active" <?php } ?>><a href="#tab1-2" onclick="$('#hdn_active').val('tab1');LoadPreSale('<?php echo $selected_stats;?>');" class="glyphicons alarm" data-toggle="tab"><i></i>ALL PRE-SALE (SALES)</a></li>
							<li <?php if($activeTab=='tab2'){ ?> class="active" <?php } ?>><a href="#tab2-2" onclick="$('#hdn_active').val('tab2');LoadPostSale('<?php echo $selected_stats;?>');" class="glyphicons road" data-toggle="tab"><i></i>ALL POST-SALE (SALES)</a></li>

							<li <?php if($activeTab=='tab5'){ ?> class="active" <?php } ?>><a href="#tab5-2" onclick="$('#hdn_active').val('tab5');LoadDormant('<?php echo $selected_stats;?>', '', '');" class="glyphicons road" data-toggle="tab"><i></i>Dormant</a></li>

							<li <?php if($activeTab=='tab4'){ ?> class="active" <?php } ?>><a href="#tab4-2" onclick="$('#hdn_active').val('tab4');LoadEquity('<?php echo $selected_stats;?>');" class="glyphicons user" data-toggle="tab"><i></i>Equity / Lead Search</a></li>

							<?php if($group_id == '2' || $group_id == '6'){ ?>
							<li>
								<a href="#tab4-3" onclick="LoadMgrcalls();" class="glyphicons phone_alt" data-toggle="tab"><i></i>Mgr 24hr calls</a>
							</li>
							<?php } ?>



							<!--
							<div style="float:right;">
								<select name="CommonRecNo" id="CommonRecNo" onchange="SelRecordsLimit(this.value)">
									<option value="">Records</option>
									<?php echo $RecordsPerSec;?>
								</select>
							</div>
							-->
						</ul>





					</div>
					<!-- // Widget heading END -->
					<div class="widget-body">
						<div class="tab-content">
							<!-- Step 1 -->
							<div class="tab-pane <?php if($activeTab=='tab1'){ echo "active"; } ?>" id="tab1-2"></div>
							<div class="tab-pane  <?php if($activeTab=='tab2'){ echo "active"; } ?>" id="tab2-2" ></div>

							<div class="tab-pane  <?php if($activeTab=='tab3'){ echo "active"; } ?>" id="tab2-3" ></div>

							<div class="tab-pane  <?php if($activeTab=='tab4'){ echo "active"; } ?>" id="tab4-2" ></div>
							<div class="tab-pane" id="tab4-3" ></div>
							<div class="tab-pane <?php if($activeTab=='tab5'){ echo "active"; } ?>" id="tab5-2" ></div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
if(!isset($this->request->params['named']['reload']) && $this->request->params['named']['reload']!='reload'){
?>
</div>
<?php
}
?>

<!-- Modal -->
<div class="modal fade" id="modal-2">

	<div class="modal-dialog" style="width: 850px;">
		<div class="modal-content">

			<!-- Modal body -->
			<div class="modal-body">


				<?php
				$cnt = 1;
				if(isset($lead_status_options)){
				 foreach($lead_status_options as $key=>$value){ ?>

				 	<?php if($cnt == 1 ||  $cnt > 7){  ?>
				 	<div class="row">
					<?php }  ?>

						<div style="" class="col-md-<?php if($cnt <= 3) echo "12"; else if($cnt <= 7) echo "6"; else echo  "12"; ?>" id="<?php echo str_replace(array(" ", "(",")","'"),"-",$key); ?>" >
							<strong><u> <?php echo $key; ?></u></strong>
							<div style="margin-top: 4px;"></div>
							<?php
							$header_item = 1;
							foreach($value as $v){

								if($v == 'Duplicate-Closed'){
									continue;
								}
								?>
								<?php if($header_item  ==  6){ ?>
									<div class='collapse' id="item_collapse_<?php echo $cnt ?>">
								<?php } ?>
								<div class="checkbox" style="display: inline-block; margin-top: 0;">
									<label class="checkbox-custom status-done" <?php echo (isset($history_status[$v]))? 'style="color: #CCCCCC;" ' : '' ?> >
										<input type="checkbox" <?php echo (isset($history_status[$v]))? 'disabled="disabled"' : '' ?>   class="chk_lead_status <?php echo (isset($history_status[$v]))? 'status_done' : '' ?>" name="checkbox_status" value="<?php echo $v; ?>" >
										<i class="fa fa-fw fa-square-o"></i> <?php echo $v; ?> <?php echo (isset($history_status[$v]))? $history_status[$v] : "" ?>
									</label>
								</div>
							<?php  $header_item++; } ?>
							<?php if(count($value) > 5){ ?>
								</div>
								<div style="text-align: right;">
									<button data-toggle="collapse" data-target="#item_collapse_<?php echo $cnt ?>" aria-expanded="false" aria-controls="collapse_bottom_search" type = 'button' class="status_show_more_button btn btn-primary btn-xs collapsed"></button>
								</div>
							<?php } ?>

							<div style="margin: 5px 0"><hr /></div>
						</div>

					<?php if($cnt >= 7){  ?>
					</div>
					<?php }  ?>

					<?php
						$cnt++; }
					}
						?>


			</div>
			<div class="modal-footer center margin-none">
				<a href="#" class="btn btn-primary" data-dismiss="modal">Ok</a>
			</div>
		</div>
	</div>

</div>
<!-- Modal END-->



<script>
function InitFuncs(){
	function drag_start(event) {
	    var style = window.getComputedStyle(event.target, null);
	    event.dataTransfer.setData("text/plain",
	    (parseInt(style.getPropertyValue("left"),10) - event.clientX) + ',' + (parseInt(style.getPropertyValue("top"),10) - event.clientY));
	} 
	function drag_over(event) { 
	    event.preventDefault(); 
	    return false; 
	} 
	function drop(event) { 
	    var offset = event.dataTransfer.getData("text/plain").split(',');
	    var dm = document.getElementById('dragme');
	    dm.style.left = (event.clientX + parseInt(offset[0],10)) + 'px';
	    dm.style.top = (event.clientY + parseInt(offset[1],10)) + 'px';
	    event.preventDefault();
	    return false;
	} 
	
	document.body.addEventListener('dragover',drag_over,false); 
	document.body.addEventListener('drop',drop,false);	
	$(".status_note_update").off("click").click(function(event){
		event.preventDefault();
		var userId = "<?php echo AuthComponent::user('id');?>";
		var proceed = false;
		if( userId != $(this).attr('user_id')){
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				proceed = true;
			}else{
				proceed = false;
			}
		}else{
			proceed = true;
		}
		if(proceed==true){
			console.log( $(this).attr('href') );
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Update lead",
					}).find("div.modal-dialog").addClass("largeWidth3").attr("id", "dragme").attr("draggable", true);
					var dm = document.getElementById('dragme');
					dm.addEventListener('dragstart',drag_start,false);
				}
			});
		}
	});
	
	$(".transfer_lead_link").off("click").click(function(event){
		event.preventDefault();
		var userId = "<?php echo AuthComponent::user('id');?>";
		var proceed = false;
		if( userId != $(this).attr('user_id')){
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				proceed = true;
			}else{
				proceed = false;
			}
		}else{
			proceed = true;
		}
		if(proceed==true){
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Move Lead",
					});
				}
			});
		}

	});


	$("#worksheet_poup").off("click").click(function(event){
		event.preventDefault();
		var userId = "<?php echo AuthComponent::user('id');?>";
		var proceed = false;
		if( userId != $(this).attr('user_id')){
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				proceed = true;
			}else{
				proceed = false;
			}
		}else{
			proceed = true;
		}

		if(proceed==true){
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){

					bootbox.dialog({
						message: data,
						backdrop: true,
						title: "<?php echo AuthComponent::user('dealer'); ?>",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});
		}

	});


	//Note upate

	$(".note_update_link").off("click").click(function(event){
		event.preventDefault();
		var userId = "<?php echo AuthComponent::user('id');?>";
		var proceed = false;
		if( userId != $(this).attr('user_id')){
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				proceed = true;
			}else{
				proceed = false;
			}
		}else{
			proceed = true;
		}

		if(proceed==true){
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){

					bootbox.dialog({
						message: data,
						title: "Note Update",
						buttons: {
							success: {
								label: "Ok",
								className: "btn-success",
								callback: function() {

									if( $("#ContactNoteUpdate").val() != '' ){

										$("#message_eror").html('');
										$.ajax({
											type: "POST",
											data: $("#ContactNoteUpdateForm").serialize(),
											url: $("#ContactNoteUpdateForm").attr('action'),
											success: function(data){
												//console.log(data);
												//return true;
												location.href = "/contacts/leads_main/view/"+$("#ContactContactId").val();
											}
										});
										return false;

									}else{
										 $("#message_eror").html('Please enter note');
										 return false;
									}
								}
							},
						}
					});


				}
			});
		}
	});






	//instant message

	$(".send_manager_message").off("click").click(function(event){
		event.preventDefault();
		var userId = "<?php echo AuthComponent::user('id');?>";
		var proceed = false;
		if( userId != $(this).attr('user_id')){
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				proceed = true;
			}else{
				proceed = false;
			}
		}else{
			proceed = true;
		}
		if(proceed==true){
			$.ajax({
				type: "GET",
				cache: false,
				url: $(this).attr('href'),
				success: function(data){

					bootbox.dialog({
						message: data,
						title: "Instance Message",
						buttons: {
							success: {
								label: "Ok",
								className: "btn-success",
								callback: function() {

									if( $("#ManagerMessageMessage").val() != '' ){

										$("#message_eror").html('');
										$.ajax({
											type: "POST",
											data: $("#ManagerMessageComposeForm").serialize(),
											url: "/manager_messages/send/",
											success: function(data){
												return true;
												//location.href = "/contacts/leads_main/view/"+data;
											}
										});

									}else{
										 $("#message_eror").html('Please enter message');
										 return false;
									}
								}
							},
						}
					});


				}
			});
		}

	});



	$(".work_lead_link, .work_lead_link2").off("click").click(function(event){
		event.preventDefault();
		var userId = "<?php echo AuthComponent::user('id');?>";
		if( userId != $(this).attr('user_id')){
			event.preventDefault();
			if(confirm("You are not the current owner of this customer lead. Your changes will be added to the owners change-Log")){
				/*
				$.ajax({
					type: "GET",
					cache: false,
					url: $(this).attr('href'),
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "",
						}).find("div.modal-dialog").css("width","900px");
					}
				});
				*/
				location.href = $(this).attr('href');
			}
		}else{
			/*
			$.ajax({
					type: "GET",
					cache: false,
					url: $(this).attr('href'),
					success: function(data){

						bootbox.dialog({
							message: data,
							backdrop: true,
							title: "",
						}).find("div.modal-dialog").css("width","900px");
					}
				});
				*/
				location.href = $(this).attr('href');
			}
	});

	function ShowSurvey(url){
		$.ajax({
			type: "GET",
			cache: false,
			url: url,
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "BDC Survey",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});
	}
}
</script>
<script>
 function ShowHistory(toggleId){
   $("#history_"+toggleId).toggle()
}

function read_more_workload(toggleId){
   		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': toggleId},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});
}

$(document).on("click", ".read_more_history_note_details", function(){

	$.ajax({
		type: "GET",
		cache: false,
		url: "/contacts_manage/history_comment",
		data: {'history_id': $(this).attr('history_id')},
		success: function(data){
			bootbox.dialog({
				message: data,
				title: "History Notes",
			});
		}
	});



});

function LoadPreSale(user_id){
	var RecordsPerSec = "<?php echo $DefaultRecs;?>";
	if($('#tab1-2').html()==''){
		$('#tab1-2').html('Loading................');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/daily_recaps/load_presale/'+RecordsPerSec+'/'+user_id,
			success: function(data){
				$('#tab1-2').html(data);
			}
		});
	}

}

function LoadPostSale(user_id){
	var RecordsPerSec = "<?php echo $DefaultRecs;?>";
	if($('#tab2-2').html()==''){
		$('#tab2-2').html('Loading................');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/daily_recaps/load_postsale/'+RecordsPerSec+'/'+user_id,
			success: function(data){
				$('#tab2-2').html(data);
			}
		});
	}

}

function LoadEquity(user_id){
	//console.log("load equity");
	//if($('#tab4-2').html()==''){
		$('#tab4-2').html('Loading................');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/equity_searches/index/'+user_id,
			success: function(data){
				$('#tab4-2').html(data);
			}
		});
	//}
}

function LoadDormant(user_id, start_date, end_date){

	$('#tab5-2').html('Loading................');
	$.ajax({
		type: "GET",
		cache: false,
		url: '/equity_searches/dormant/'+user_id+'/?startDate='+start_date+'&endDate='+end_date,
		success: function(data){
			$('#tab5-2').html(data);
		}
	});

}









function LoadMgrcalls(user_id){
	$('#tab4-3').html('Loading................');
	$.ajax({
		type: "GET",
		cache: false,
		url: '/equity_searches/load_mgrcalls/',
		success: function(data){
			$('#tab4-3').html(data);
		}
	});

}









function LoadEvents(user_id){
	console.log(user_id);
	var RecordsPerSec = "<?php echo $DefaultRecs;?>";
	if($('#tab2-3').html()==''){
		$('#tab2-3').html('Loading................');
		$.ajax({
			type: "GET",
			cache: false,
			url: '/daily_recaps/load_events/'+RecordsPerSec+'/'+user_id,
			success: function(data){
				$('#tab2-3').html(data);
			}
		});
	}

}


function ShowSurveyResponse(id){
	var url = '/bdc_leads/survey_response/'+id+"/workload:workload";
	$.ajax({
			type: "GET",
			cache: false,
			url: url,
			success: function(data){

				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "BDC Survey",
				}).find("div.modal-dialog").addClass("midWidth");
			}
		});
}

function SelRecordsLimit(section_id){

	var SelTab = $("#hdn_active").val();
	var RecordSize = $("#SelRecSize_"+section_id).val();
	var user_id = $("#user_id").val();


	if(SelTab == 'tab1'){
		method = "GetPresaleSection";
	}else if(SelTab == 'tab2'){
		var method = "GetPostsaleSection";
	}else if(SelTab == 'tab3'){
		var method = "GetEventSection";
	}

	if(section_id == '1' || section_id == '2' ){
		$("#ew_container_"+section_id).load("/daily_recaps/"+method+"/"+section_id+"/"+RecordSize+"/"+user_id);
	}else{
		$("#ew_container_"+section_id).load("/daily_recaps/"+method+"/"+section_id+"/"+RecordSize+"/"+user_id+"?completed="+$("#show-completed-checkbox_"+section_id).is(":checked") );
	}
	
	/*
	if(RecordSize!=''){
		var tabclass;
		var SelTab = $("#hdn_active").val();
		console.log(SelTab);
		if(SelTab=='tab1'){
			method = "GetPresaleSection";
			var tabclass = 'presale';
		}else if(SelTab=='tab2'){
			tabclass = 'postsale';
			var method = "GetPostsaleSection";
		}else if(SelTab=='tab3'){
			tabclass = 'event';
			var method = "GetEventSection";
		}
		console.log(tabclass);
		console.log($('body').find("."+tabclass));
		$("."+tabclass).each(function() {
			var id = $(this).attr("id");
			id = id.split("_");
			SecId = id[1];
			$(this).load( "/daily_recaps/"+method+"/"+SecId+"/"+RecordSize);
		});
	}
	*/
}



function SelRecordsLimitInSec(SecId,Container,URL){

	var user_id = $("#user_id").val();
	if(SecId == '1' || SecId == '2'){
		$("#"+Container).load( URL+"/"+ $("#SelRecSize_"+SecId).val() +"/"+user_id);
	}else{
		$("#"+Container).load( URL+"/"+ $("#SelRecSize_"+SecId).val() +"/"+user_id+"?completed="+$("#show-completed-checkbox_"+SecId).is(":checked"));
	}
}

function show_hide_completed(SecId,URL,Container){
	var user_id = $("#user_id").val();
	$("#"+Container).load( URL+"/"+ $("#SelRecSize_"+SecId).val() +"/"+user_id+"?completed="+$("#show-completed-checkbox_"+SecId).is(":checked") );
}


function ReloadWorkload(){

	var tab = $("#hdn_active").val();

	if(tab == 'tab5'){
		LoadDormant($("#user_id").val(), '', '');
	}else{

		if($("#show_completed").is(":checked")==true){
			var ShowCompleted = "yes";
		}else{
			var ShowCompleted = "no";
		}
		var user_id = $("#user_id").val();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/daily_recaps/workload/"+user_id+"/"+tab+"/reload:reload"+"/ShowCompleted:"+ShowCompleted,
			success: function(data){
				$("#workload_container").html(data);
			}
		});

	}


}

function ShowCompleted(){
	if($("#show_completed").is(":checked")==true){
		$(".tr_checked").each(function( ) {
			$(this).show();
		});
		$(".tr_unchecked").each(function( ) {
			$(this).show();
		});
	}else{
		$(".tr_checked").each(function( ) {
			$(this).hide();
		});
		$(".tr_unchecked").each(function( ) {
			$(this).show();
		});
	}

}
</script>

<script>
<?php
if($activeTab=='tab1'){
?>
	LoadPreSale('<?php echo $selected_stats;?>');
<?php
}elseif($activeTab=='tab2'){
?>
	LoadPostSale('<?php echo $selected_stats;?>');
<?php
}elseif($activeTab=='tab3'){
?>
	LoadEvents('<?php echo $selected_stats;?>');
<?php
}elseif($activeTab=='tab4'){
?>
	$('#hdn_active').val('tab4');
	LoadEquity('<?php echo $selected_stats;?>');
<?php
}
?>


//$('#hdn_active').val('tab4');LoadEquity('<?php echo $selected_stats;?>');




</script>
<script>
//Popup for 'Instock Search' button
$(function() {
	$("#btn_search_stock_vin").click(function(){

	  $.ajax({
	    type: "GET",
	    cache: false,
	    data: {v_type: $(this).attr("v_type") },
	    url: "/contact_instock/instock_search/?search_type=vin",
	    success: function(data){

	      bootbox.dialog({
	        message: data,
	        backdrop: true,
	        title: "In Stock Search",
	      }).find("div.modal-dialog").addClass("largeWidth");
	    }
	  });
	});
});
</script>
