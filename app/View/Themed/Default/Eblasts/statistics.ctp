
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
			<ul>
				<li class="active">
					<a class="glyphicons stats" href="#tab-1" id="btn-tab-1" data-toggle="tab"><i></i>Auto Responders</a>
				</li>
			</ul>
		</div>
		<!-- // Tabs Heading END -->

		<div class="widget-body">
			<div class="tab-content">
				<div class="tab-pane animated fadeInUp active" id="tab-1">&nbsp;</div>
			</div>
		</div>		




	</div>	


	
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




			$.ajax({
				type: "GET",
				cache: false,
				url: "<?php echo $this->Html->url(array('controller'=>'eblasts', 'action'=>'autoresponders_stats')); ?>",
				success: function(data){
					$("#tab-1").html(data);
				},
				error: function (xhr, ajaxOptions, thrownError) {
				}
			});


	


	
});

</script>

