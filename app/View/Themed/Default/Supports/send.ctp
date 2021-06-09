<!-- Widget -->
<?php 
//debug($this->request->query['returl']);
//debug( html_entity_decode($this->request->query['returl']) ); 

?>

<div class="widget widget-heading-simple widget-body-white" >
<form accept-charset="utf-8" method="post" id="supportsSendForm" class="form-inline apply-nolazy" autocomplete="off" action="/supports/send/<?php echo $sid; ?>">
	<div class="widget-body">
		<div class="innerB">
			<div class="row">
				<div class="col-md-12">
					<?php //echo $this->Form->label('dealer_id','Select Dealership'); ?>
					<?php //echo $this->Form->input('dealer_id', array('type' => 'select', 'options' => $dealers_list,  'empty' =>FALSE, 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
                                    <?php echo $this->Form->label('response_status','Status:'); ?>
					<?php echo $this->Form->input('response_status',array('type'=>'select',
								'options'=>array(
									'Open'=>'Open',
									'Pending'=>'Pending',
									'Close'=>'Close'
									
								),'required'=>'required','id'=>'response_status', 'div'=>false,'label'=>false,'empty'=>"Select",'class'=>'form-control')); ?>
					<div class="separator"></div>
				</div>
			</div>
		</div>
		<div class="innerB">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->label('percentage','Percentage:'); ?>
					<?php echo $this->Form->input('percentage',array('type'=>'select',
								'options'=>array(
									'10'=>'10%',
									'20'=>'20%',
									'30'=>'30%',
									'40'=>'40%',
									'50'=>'50%',
									'60'=>'60%',
									'70'=>'70%',
									'80'=>'80%',
									'90'=>'90%',
									'100'=>'100%'
									
								),'required'=>'required','id'=>'percentage', 'div'=>false,'label'=>false,'empty'=>"Select",'class'=>'form-control')); ?>
				</div>
			</div>
		</div>
		<div class="innerB">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->label('note','Note:'); ?>
					<?php echo $this->Form->input('note', array('type' => 'textarea', 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control','id' => 'note','style'=>'width: 100%')); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-right">
					<div class="separator"></div>
					<button type="button" id="btn_save_trim" class="btn btn-success" >Click to Close</button>&nbsp;
					<button type="button" id="close_modal_dialog" class="btn btn-danger" >Cancel</button>
				</div>
			</div>
			
		</div>
		
	</div>

<?php $this->Form->end(); ?>	
</div>
<!-- // Widget END -->
<?php 
//debug($body_type);
//debug($trim);
//echo $this->element("sql_dump");	

 ?>
 <script>
$(function(){ 
		
	$("#btn_save_trim").click(function(event){
		event.preventDefault();
					
		if( $("#response_status").val() == ''){
			$("#response_status").focus();
			alert('Please Select a Status.');
			return false;
		}
		if( $("#percentage").val() == ''){
			$("#percentage").focus();
			alert('Please Select Percentage.');
			return false;
		}
		
//		if( $("#note").val() == ''){
//			$("#note").focus();
//			alert('Please enter Note');
//			return false;
//		}
                
                 $("#supportsSendForm").submit();
				
		/*$.ajax({
			type: "POST",
			url:  $("#supportsSendForm").attr('action'),
			data: $("#supportsSendForm").serialize(),
			success: function(data){
				$(".bootbox-body").html(data);
			}
		});*/
		
		
	});
	
	$("#close_modal_dialog").click(function(event){
		event.preventDefault();
		bootbox.hideAll();
	});	
	
	<?php if(isset($save_sucees)){ ?>
		bootbox.hideAll();
	<?php } ?>
	
});

</script>
