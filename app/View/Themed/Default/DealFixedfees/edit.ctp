</br></br></br></br>



<div class="innerLR">

	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	

	<div class="widget widget-body-white">
		<div class="widget-body">
				
				<div><strong>CURRENT  FIXED FEE / PAYMENT IN USE -  Select Fee to view in edit (below)</strong> </div>
				<br />
				
				<?php echo $this->Form->create('DealFixedfee', array('class' => 'form-inline apply-nolazy',	'type' => 'post')); ?>
				<?php echo $this->Form->input('id'); ?>
				
				<div class="row">
					<div class="col-md-12">
						<font color='red'>*</font>&nbsp;<strong>Edit Fee(s):</strong>&nbsp; <?php
						echo $this->Form->input('condition', array(
							'id' => "edit_options_type_condition",
							'type' => 'select',
							'required' => 'required',
							'options' => $selected_type_condition,
							'empty' => false,
							'selected' => $this->request->data['DealFixedfee']['id'],
							'class' => 'input-sm',
							'label' => false,
							'div' => false,
							'style' =>'margin-bottom: 0'
						));
						?>
						&nbsp; &nbsp; &nbsp;<?php echo $this->Form->button('<i class="icon-edit"></i> Edit', array('id' => "btn_edit_type_condition",'div' => false, 'type'=>'button','class' => 'btn btn-success')); ?>
						<div class="separator"></div>
						<hr />
						<div class="separator"></div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						(1) Start by selecting the Condition and the Unit Type.
						<div class="separator"></div>
					</div>
				</div>
				
				<div class="row">
                <div class="col-md-2">
                <?php
				$condition_array=array(
										'New' => 'New',
										'Used' => 'Used',
										'Rental' => 'Rental',
										'Demo' => 'Demo'
								);
				
				$select_fee='';
				$custom_field='display:none;';				
				$checked = '';
				$custom_name_value='';
				if(!in_array($this->request->data['DealFixedfee']['condition'],$condition_array))
				{
					$select_fee='display:none;';
					$custom_field='';				
					$checked ='checked="checked"';
					$custom_name_value=$this->request->data['DealFixedfee']['condition'];
				}
				
				 ?>
                <label class="checkbox"><input type="checkbox" <?php echo $checked; ?> id="custom_name" name="custom_name" />&nbsp; Custom Name</label>
                </div>
                <div class="col-md-3 custom_field" style=" <?php echo $custom_field; ?>">
                &nbsp;<font color='red'>*&nbsp;</font>Fee Name:&nbsp;
                <?php
				echo $this->Form->input('custom_name_value',array('label'=>false,'div'=>false,'class'=>'form-control','value'=>$custom_name_value)); 
				?>
                </div>
					<div class="col-md-3 select_fee" style=" <?php echo $select_fee; ?>">
						<font color='red'>*&nbsp;</font>Fee(s) Condition:&nbsp; <?php
						echo $this->Form->input('condition',
								array(
								'options' => $condition_array,
								'empty' => 'Select',
								'required' => 'required',
								'class' => 'input-sm',
								'label' => false,
								'div' => false
							));
						
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-3 select_fee" style=" <?php echo $select_fee; ?>">
						<font color='red'>*&nbsp;</font>Fee(s) Unit Type:&nbsp; <?php
						echo $this->Form->input('type',
								array(
								'options' => array(
									'ATV' => 'ATV',
									'Boat' => 'Boat',
									'Car' => 'Car',
									'Cruiser/Vtwin' => 'Cruiser/Vtwin',
									'Dirt Bike' => 'Dirt Bike',
									'Go Kart' => 'Go Kart',
									'PWC' => 'PWC',
									'RV' => 'RV',
									'Scooter' => 'Scooter',
									'Side x Side' => 'Side x Side',
									'Side Car' => 'Side Car',
									'Trailer' => 'Trailer',
									'Trike' => 'Trike',
									'Snowmobile' => 'Snowmobile',
									'Street Bikes' => 'Street Bikes',
									'Utility Vehicle' => 'Utility Vehicle',
									'UTV' => 'UTV'
								), 
								'empty' => 'Select',
								'required' => 'required',
								'class' => 'input-sm',
								'label' => false,
								'div' => false
							));
						?>
						<?php if(isset($duplicate_message)){ ?>
							<div style="margin-top: 10px;"><?php echo $duplicate_message; ?></div>
							<div style="margin-top: 10px;" class="text-danger"><i class="fa fa-exclamation"></i> <?php echo $duplicate_message; ?></div>
						<?php } ?>
						<div class="separator"></div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						(2) Fill out fee(s) for this Unit Type(below).
						<div class="separator"></div>
					</div>
				</div>
				
				<div class="row">
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Freight:$&nbsp; <?php
						echo $this->Form->input('freight_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Prep/Recond:$&nbsp; <?php
						echo $this->Form->input('prep_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Doc:$&nbsp; <?php
						echo $this->Form->input('doc_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Parts:$&nbsp; <?php
						echo $this->Form->input('parts_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					
				</div>
				
					
				<div class="row">
				
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Service:$&nbsp; <?php
						echo $this->Form->input('service_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
				
					
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Tag Fee:$&nbsp; <?php
						echo $this->Form->input('tag_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Title Fee:$&nbsp; <?php
						echo $this->Form->input('title_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
				
					
					<div class="col-md-3">
						<font color='red'>*&nbsp;</font>Sales Tax:&nbsp; <br />
						<?php echo $this->Form->input('tax_fee',array('type'=>'text', 'required' => 'required', 'style'=>'width: 90%','class'=>'form-control','label' => false,'div' => false));		?> %
						<div class="separator"></div>
					</div>
					
					
					
				</div>
					
				<hr />
				<div class="separator"></div>
				
				<div class="row">
				
					
					<div class="col-md-3">
						PPM:$&nbsp; <?php
						echo $this->Form->input('ppm_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					<div class="col-md-3">
						Hazard:$&nbsp; <?php
						echo $this->Form->input('hazard_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
				
					
					<div class="col-md-3">
						ESP:$&nbsp; <?php
						echo $this->Form->input('esp_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
					<div class="col-md-3">
						GAP:$&nbsp; <?php
						echo $this->Form->input('gap_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					
				</div>
				<div class="row">
				
					<div class="col-md-3">
						Tire/W:$&nbsp; <?php
						echo $this->Form->input('tire_wheel_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-3">
						License/Registration:$&nbsp; <?php
						echo $this->Form->input('licreg_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
				
					<div class="col-md-3">
						VSC:$&nbsp; <?php
						echo $this->Form->input('vsc_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
						
					<div class="col-md-3">
						Roadside:$&nbsp; <?php
						echo $this->Form->input('roadside_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-3">
						Theft:$&nbsp; <?php
						echo $this->Form->input('theft_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
                    
                   <?php /*?> <div class="col-md-3">
						Installed Equip:$&nbsp; <?php
						echo $this->Form->input('install_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div><?php */?>
                     <div class="col-md-3">
						DMV Fee - Off Road ( Fixed Fee) $&nbsp; <?php
						echo $this->Form->input('dmv_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
                     <div class="col-md-3">
						DMV Fee - On Road (% of subtotal)&nbsp; <?php
						echo $this->Form->input('dmv_offroad', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
                         <div class="col-md-3">
						APR %&nbsp; <?php
						echo $this->Form->input('apr_percentage', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
                         
				</div>
				<div class="row">
                <div class="col-md-3">
						Down Payment %&nbsp; <?php
						echo $this->Form->input('down_percentage', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
		
				<div class="col-md-3">
						Filling Fee $&nbsp; <?php
						echo $this->Form->input('filling_fee', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
                   <div class="col-md-3">
						Vehicle Axle Fee 2 axle $&nbsp; <?php
						echo $this->Form->input('vehicle_axle_fee_2', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div> 
                    
                    <div class="col-md-3">
						Vehicle Axle Fee 2+ axle $&nbsp; <?php
						echo $this->Form->input('vehicle_axle_fee_4', array(
							'type' => 'text',
							'class' => 'form-control',
							'required' => 'required',
							'label' => false,
							'div' => false
						));
						?>
						<div class="separator"></div>
					</div>
                    
                    
                </div>    
				<div class="row">	
					<div class="col-md-3">
                   
						<a href="<?php echo $this->Html->url(array('action'=>'index')); ?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Cancel</a>
                        
					</div>
					
					<div class="col-md-3">
                  
						<button type="submit" class="btn btn-success" id="btn-submit-lead"><i class="fa fa-fw icon-save"></i> Save Fixed Fee(s)</button>
                      
					</div>
					
				</div>
				
				
				
				<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	
	
	$(".alert").delay(3000).fadeOut("slow");


	$('#btn_edit_type_condition').click(function(){
		location.href = "<?php echo $this->Html->url(array('action'=>'edit')); ?>/"+$('#edit_options_type_condition').val();
		return false;
	});
		
		<?php if(!empty($custom_name_value)){ ?>
		$("#DealFixedfeeCondition").removeAttr('required');
		$("#DealFixedfeeType").removeAttr('required');
		<?php } ?>
		$("#custom_name").on('change',function(){
		if($(this).is(':checked'))
		{
			$(".select_fee").hide();
			$(".custom_field").fadeIn();
			$("#DealFixedfeeCustomNameValue").attr('required','required');
			$("#DealFixedfeeCondition").removeAttr('required');
			$("#DealFixedfeeType").removeAttr('required');
		}else
		{	$("#DealFixedfeeCustomNameValue").removeAttr('required');
			$("#DealFixedfeeCondition").attr('required','required');
			$("#DealFixedfeeType").attr('required','required');
			$(".custom_field").hide();	
			$(".select_fee").fadeIn();
		}
		
		});

		
	
	
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>

