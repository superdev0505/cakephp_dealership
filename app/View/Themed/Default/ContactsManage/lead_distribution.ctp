</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	

	<div class="row">
		<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading text-primary">Distribute Lead to Sales Person in mass</h4>
				</div>
				<div class="widget-body">
						
						<?php //debug($users);
						echo $this->Form->create('Contact', array( 'class' => 'form-inline no-ajaxify apply-nolazy', 'type'=>'post', 'role'=>"form")); ?>
								
						<div class="row">
							<div class="col-md-12">
									<?php echo $this->Form->label('user_id_from','Transfer mass leads from:', array('class'=>'strong')); ?>
									<?php
									echo $this->Form->select('user_id_from',$users , array(
									'empty' => 'Select',
									'required' => 'required',
									'selected' => '',
									'class' => 'form-control' ,'style'=>'width: 100%'
									));
									?>
									
									<div class="separator"></div>
									<label>Transfer mass leads to:</label>
									<div id="transfer_leads_to_checkbox"></div>

									<div class="separator"></div>
									
									<?php echo $this->Form->label('note','Note:'); ?>
									<?php echo $this->Form->textarea('note', array('class'=>'form-control')); ?>


									<div class="separator"></div>
									<div class="text-right">
										<button type="button" id='calculate_lead_distributtion' style="display: none" class='btn btn-primary'>Distribute Leads</button>
									</div> 
									<div class="separator"></div>


								
							</div>
							
							
	
						</div>
						<?php echo $this->Form->end(); ?>
						
						
						
				</div>
			</div>
		</div>
		
	</div>	
	<?php  //echo $this->element("sql_dump"); ?>
</div>
<script>
$(function(){

	
	$("#calculate_lead_distributtion").click(function(event){
		var checked = [];
		$(".receivers_ckbox").each(function() {
            if(this.checked){
                checked.push(this.value);
            }
        });

        if( checked.length == 0  ){
        	alert("Please select receiver");
        	return true;
        }
        if( $("#ContactNote").val() == ''  ){
        	alert("Please enter notes");
        	return true;
        }

        if(confirm("Do you want to transfer leads?")){

        	$("#calculate_lead_distributtion").attr("disabled", true);

	        $.ajax({
	            type: "post",
	            cache: false,
	            dataType: 'html',
	            data: { receiver  : checked, user_from : $("#ContactUserIdFrom").val(), 'notes' :  $("#ContactNote").val() },
	            url:  "/contacts_manage/leads_distribute/",
	            success: function(data){
	            	$("#calculate_lead_distributtion").attr("disabled", false);


            		bootbox.dialog({
						message: "<div  style='text-align: center'><strong>"+data+"</strong><div>",
						title: "Lead Transfer",
						buttons: {
							success: {
								label: "Ok",
								className: "btn-success",
								callback: function() {
								}
							},
							
						}
					});	




	            }
	        });
        }



	});


	$("#ContactUserIdFrom").change(function(event){

		$.ajax({
			type: "get",
			dataType: 'json',
			url:  "/contacts_manage/lead_distribution_get_reciver/"+$("#ContactUserIdFrom").val(),
			success: function(data){
				//console.log(data);
				wc="";
				jQuery.each(data, function(key, wb){
					wc += '<label for="settings_holidays_'+key+'" class="checkbox"> '+
						' &nbsp; <input type="checkbox" name="data[settings_holidays_'+key+']" class="receivers_ckbox" value="'+key+'" id="settings_holidays_'+key+'">'+
							' '+wb+''+
						'</label> &nbsp; &nbsp;';
				});
				$("#transfer_leads_to_checkbox").html(wc);
				$("#calculate_lead_distributtion").show();
				
			}
		});


  	});


});
</script>






