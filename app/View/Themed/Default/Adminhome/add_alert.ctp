<br /><br /><br />
<div class="layout-app">
	<div class="row row-app">
		
		<div class="col-md-12">
			
			<div class="col-separator col-separator-first box">
				
				<div class="innerAll border-bottom">

				
				</div> 
				
				<?php echo $this->Form->create('UpdateAlert', array('type' => 'post', 'class' => 'apply-nolazy'));
				
				if(isset($this->request->data['UpdateAlert']['id']))
				{
					echo $this->Form->hidden('id');
					//echo $this->Form->hidden('dealer_id');
				}else{
					//echo $this->Form->hidden('dealer_id',array('value'=>'0'));
				}
				
				?>
					
					
				<div class="bg-info innerAll">
					
							
					
					
					
					
					

					<div class="form-group <?php if ($this->Form->isFieldError('header')) { echo "has-error";} ?>">
						<?php echo $this->Form->label('header', 'Header:',array('class'=>"col-sm-2 control-label")); ?>
						<div class="col-sm-6">
							<?php echo $this->Form->text('header', array('required'=>'required','class'=>"form-control")); ?>
							<?php echo $this->Form->error('header', null, array('class'=>'has-error help-block')); ?>
						</div>
					
					</div>

					<div class="clearfix"></div>
				</div>
				
				<hr class="margin-none"/>
				
				<div class="innerAll ">
					<div class="row">
                    <div class="col-md-11">
                    <div class="col-md-2">
                    <label class="control-label">Dealers</label>
                   </div>
                   <div class="col-md-10"> 
                   <label class="control-label"><input type="checkbox" id="all_dealers"  name="all_dealers"  value="yes" <?php echo (!empty($this->request->data['all_dealers'])&& $this->request->data['all_dealers'] =='yes')?'checked="checked"':''; ?>/>&nbsp;All Dealers</label><br/>
                   <div id="select-dealer">
                   <?php echo $this->Form->input('dealer_id',array('class'=>'custom-multi-select2','type' => 'select','div' => false,'label' => false,'multiple' => 'multiple','options' => $all_dealers,'style'=>'width:100%','data-placeholder' => 'Select Dealers for you which you want to add update alert')) ?>
                   </div>
                        <div class="separator"></div>
                   </div>
                   
              
                    
                    </div>
                    	
						<div class="col-md-11">
							<?php 
							//$this->request->data['UserEmail']['message']=nl2br($this->request->data['UserEmail']['message']);
							echo $this->Form->textarea('message', array('id'=>'TemplateTemplateHtml','class'=>"notebook border-none form-control padding-none", 'rows'=>"10", 'placeholder'=>"Write your content here...",'required'=>'required')); ?>
							<div class="clearfix"></div>		
						</div>
						
					</div>	
					
					
					
				
				
				</div>
				
				
				<div class="col-separator-h"></div>
				<div class="innerAll text-center">
					
					<button type="submit" class="btn btn-success" id="btn-submit-lead"><i class="fa fa-fw icon-medical-symbol-fill"></i> Submit</button>
				</div>
				
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#all_dealers").on('change',function(){
		if($(this).is(':checked'))
		{
			$("#select-dealer").hide();
		}else
		{
			$("#select-dealer").show();
		}
		});
	
	});

</script>