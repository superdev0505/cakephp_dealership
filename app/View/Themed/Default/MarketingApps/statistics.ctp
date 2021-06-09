
<style>
.extraLargeWidth {
    margin: 0 auto;
    width: 1300px;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
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




</style>
<?php  
	$active_eblast = "active";
	$active_news = "";
	$eblastapp_id = "";

	if( isset($eblastapp['EblastApp']['template_type']) &&   $eblastapp['EblastApp']['template_type'] == 'N'){
		$active_eblast = "";
		$active_news = "active";		
	}

	if( isset($eblastapp['EblastApp']['id'])){
		$eblastapp_id = $eblastapp['EblastApp']['id'];
	}


?>

<br>
<br>
<br>
<br>
<div class="innerLR">

	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<h4>Statistics</h4>
	<br>
	<div class="widget widget-tabs widget-tabs-responsive" style='position: relative;'>



		<!-- Tabs Heading -->
		<div class="widget-head tabsbar_inverse">
			<ul class="stat_tab">
				<li class="<?php echo $active_eblast; ?>" >
					<a class="glyphicons stats" href="#tab-1" id="btn-tab-1" data-toggle="tab"><i></i>Eblast</a>
				</li>
				<li class="<?php echo $active_news; ?>">
					<a class="glyphicons stats" href="#tab-2" id="btn-tab-2" data-toggle="tab"><i></i>Newsletter</a>
				</li>
				
			</ul>
		</div>
		<!-- // Tabs Heading END -->

		<div class="widget-body">
			<div class="tab-content">
				<div class="tab-pane animated fadeInUp <?php echo $active_eblast; ?>" id="tab-1"></div>
				<div class="tab-pane animated fadeInUp <?php echo $active_news; ?>" id="tab-2"></div>
			</div>
		</div>		
		



	</div>	

	<a class="btn btn-primary" href="/marketing">Back</a>	
	
	<?php //echo $this->element('sql_dump'); ?>
	
</div>


<script>

$(function(){



	


	// $(".eblast_details_link").click(function(event){
	// 	event.preventDefault();
	// 	uurl = $(this).attr('report_url');
	// 	$.ajax({
	// 		type: "GET",
	// 		cache: false,
	// 		url: uurl,
	// 		success: function(data){
	// 			bootbox.dialog({
	// 				message: data,
	// 				title: "<b>Statistics Details </b>",
	// 			}).find("div.modal-dialog").addClass("largeWidth");
	// 		}
	// 	});

	// });


$("#btn-tab-1").click(function(){

	$.ajax({
		type: "GET",
		cache: false,
		url: "<?php echo $this->Html->url(array('controller'=>'marketing_apps', 'action'=>'eblast_stats','M', $eblastapp_id)); ?>",
		success: function(data){
			$("#tab-1").html(data);
		},
		error: function (xhr, ajaxOptions, thrownError) {
		}
	});

});

	$("#btn-tab-2").click(function(){
		if( $("#tab-2").html() == '' ){
			$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'marketing_apps', 'action'=>'eblast_stats','N', $eblastapp_id)); ?>",
				success: function(data){
					$("#tab-2").html(data);
				},
				error: function (xhr, ajaxOptions, thrownError) {
				}
			});
		}
			
	});

	$("#btn-tab-3").click(function(){
		if( $("#tab-3").html() == '' ){
			$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'marketing_apps', 'action'=>'autoresponders_stats')); ?>",
				success: function(data){
					$("#tab-3").html(data);
				},
				error: function (xhr, ajaxOptions, thrownError) {
				}
			});
		}
	});
	$(".btn_template_delete").click(function(event){
		event.preventDefault();
		var del_id = $(this).attr("template_delete_id");
			$(".deltem").click(function(){
			$.ajax({
				type: "GET",
				cache: false,
				url: "/marketing_apps/templates_delete",
				data: {'contact_template_id':del_id },
				success: function(data){
				 	window.location = '/marketing_apps/templates_list';
				}
			});
			$('#modal_delete_account').modal('hide');
		});	
	});

	<?php if($active_eblast == "active"){ ?>
		$("#btn-tab-1").trigger('click');
	<?php } ?>		

	<?php if($active_news == "active"){ ?>
		$("#btn-tab-2").trigger('click');
	<?php } ?>		


	
});

</script>

