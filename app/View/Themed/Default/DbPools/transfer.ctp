<br />
<br />
<br />

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

<div class="innerAll">

	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<?php echo $this->Form->create('Pool', array('type'=>'GET','url' => array('controller'=>'users','action' => 'search_user'),'class' => 'form-inline apply-nolazy')); ?>
			<div class="row">
				<div class="col-md-2">
					<?php echo $this->Form->input('dealer_id', array('type' => 'select', 'options'=>$opt_dealer, 'empty'=>'Select', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				<div class="col-md-3">
					<button type="submit" id="submit_data_transfer" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Select</button>
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>

	<div class="widget widget-body-white widget-heading-simple">
		<div class="widget-body">
			<!-- Search result-->
			<div id="trim_search_result">
				
			</div>
			<!-- //Search result End-->
		</div>
	</div>
</div>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	// $("#PoolDealerId").val(5000);

	$("#PoolDealerId").change(function(){
		$("#trim_search_result").html("");
	});
	
	$("#submit_data_transfer" ).click(function(event){
		event.preventDefault();

		$("#trim_search_result").html("");
		
		if( $("#PoolDealerId").val() != '' ){
		
			$.ajax({
				type: "GET",
				cache: false,
				url: "/db_pools/process_transfer",
				data: {'dealer_id':$("#PoolDealerId").val()},
				success: function(data){
					$("#trim_search_result").html(data);
				}
			});
	
		}else{
			$("#PoolDealerId").focus();
			alert('Please select dealer');
		}			
	});
		
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
















