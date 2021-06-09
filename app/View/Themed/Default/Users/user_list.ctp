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
			<!--Search start-->
			<?php echo $this->Form->create('User', array('type'=>'GET','url' => array('controller'=>'users','action' => 'search_user'),'class' => 'form-inline apply-nolazy')); ?>
			<div class="row">
				<div class="col-md-1">
					Search
				</div>
				<div class="col-md-2">
					<?php echo $this->Form->input('first_name', array('type' => 'text',  'placeholder' => 'First Name', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>''));?>
				</div>
				<div class="col-md-2">
					<?php echo $this->Form->input('last_name', array('type' => 'text', 'placeholder' => 'Last Name',  'label'=>false,'div'=>false, 'class' => 'form-control','style'=>''));?>
				</div>
				<div class="col-md-2">

					<?php 
					$opt = Set::merge($groups, array('A'=>'Active','NA'=>'Not Active'));

					echo $this->Form->input('group', array('type' => 'select', 'options'=>$opt, 'empty' => 'Group', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); 

						?>
				</div>
				<div class="col-md-2">
					<?php echo $this->Form->input('dealer_id', array('type' => 'select', 'options'=>$opt_dealer, 'empty'=>'Select Dealer (Required)', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
				</div>
				
				<div class="col-md-3">
					<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Search</button>
					<button type="button" id="add_new_user" class="btn btn-success no-ajaxify"><i class="fa fa-plus"></i> New User</button>
				</div>
			</div>
		
			<?php echo $this->Form->end(); ?>
			<!-- //Search End-->
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
	
	$("#add_new_user" ).click(function(event){
		event.preventDefault();
		
		if( $("#UserDealerId").val() != '' ){
		
			$.ajax({
				type: "GET",
				cache: false,
				url: "/users/add_user",
				data: {'dealer_id':$("#UserDealerId").val()},
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Add new user",
					}).find("div.modal-dialog").addClass("largeWidth");
				}
			});
	
		}else{
			$("#UserDealerId").focus();
			alert('Please select dealer');
		}			
	});
	
	
	//advance search
	$("#submit_advance_search_filter").click(function(event){
		
		if( $("#UserDealerId").val() != '' ){
		
			$("#trim_search_result").html("");
			$('.ajax-loading').removeClass('hide');
			$.ajax({
				type: "GET",
				cache: false,
				data: $(this).closest('form').serialize(),
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#trim_search_result").html(data);
				}
			});
		
		}else{
			$("#UserDealerId").focus();
			alert('Please select dealer');
		}	
		
		return false;
	});
	
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
















