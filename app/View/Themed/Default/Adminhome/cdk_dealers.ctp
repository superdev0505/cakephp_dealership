<br />
<br />
<br /><br />
<?php $api_list = array('active_service' =>'Service','active_parts' => 'Parts','active_sales' =>'Sales'); ?>

<div class="row">

        <div class="col-md-12">

		<?php echo $this->Session->flash(); ?>
            <!-- Widget -->
            <div class="widget  widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Activate Dealer CDK Integration</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <?php echo $this->Form->create('AdpActiveDealer',array('class' =>'no-ajaxify apply-nolazy'));
					echo $this->Form->hidden('adp_active',array('value' =>1));
					 ?>
                    <div class="col-md-4" style="width:30%">
                        Dealer: <?php echo $this->Form->input('dealer_id',array('div' =>false,'label' => false,'class' =>'form-control','style' =>'width:85%;display:inline;','type'=>'select','options' => $all_dealer_list,'empty' => 'Select Dealer','required' => true)); ?>
                    </div>
                        <div class="col-md-2" style="width:18%">
                     <?php echo $this->Form->input('default_sperson_id',array('div' =>false,'label' => false,'class' =>'form-control','style' =>'width:85%;display:inline;','type'=>'select','options' => array(),'empty' => 'Default Salesperson','required' => true)); ?>
                    </div>
                    &nbsp;&nbsp;
                    <div class="col-md-4" style="width:17%">
                        <?php echo $this->Form->input('cmf',array('class' =>'form-control','style' => 'width:180px;display:inline;','label' => false,'div' =>false,'required' => true,'placeholder' =>'CDK CMF Key:')); ?>
                    </div>
                    <div class="col-md-3" style="width:30%">
                    Active API:
					<?php echo $this->Form->input('active_api',array('type' => 'select','multiple' => 'multiple','options' => $api_list,'div' => false,'label' => false,'class' => 'custom-multi-select2','style' => 'width:80%;display:inline;','required' => true)); ?>
                    </div>
                	<div class="col-md-1" style="width:5%">
                            <button class="btn btn-primary" type="submit">Save</button>
                     </div>
                    <?php echo $this->Form->end(); ?>
                    <div class="separator"></div>

                </div>
            </div>


        </div>
    </div>


<div class="row">
<div class="col-md-12">
<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
      
            
            <div id="report_data_container">
                <h4>Active CDK Dealerships :</h4>
            </div>
            <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                <thead class="success">
                    <tr>
                        <th>Dealer</th>
                        <th>API Status</th>
                        <th>Service API</th> 
                        <th>Parts API</th>
                        <th>Sales API</th>
                        <th>Default Salersperson</th>
                        
                    </tr>	
                </thead>
                <tbody>
                   <?php foreach($cdk_active_dealers as $cdk_dealer){ ?>
                   <tr>
                   <td><?php echo '#'.$cdk_dealer['AdpActiveDealer']['dealer_id'].' '.$cdk_dealer['AdpActiveDealer']['dealer_name'] ?></td>
                   <td>
                   <div class="make-switch" data-on="success" data-off="default">
                        <input type="checkbox"  <?php if ($cdk_dealer['AdpActiveDealer']['adp_active']) echo 'checked="checked"'; else echo "" ; ?> class="update-cdk-status" data-field="adp_active" data-id="<?php echo $cdk_dealer['AdpActiveDealer']['id']; ?>"   />
                       </div>
                   </td>
                    <td>
                   <div class="make-switch" data-on="success" data-off="default">
                        <input type="checkbox"  <?php if ($cdk_dealer['AdpActiveDealer']['active_service']) echo 'checked="checked"'; else echo "" ; ?> class="update-cdk-status" data-field="active_service" data-id="<?php echo $cdk_dealer['AdpActiveDealer']['id']; ?>"   />
                       </div>
                   </td>
                     <td>
                   <div class="make-switch" data-on="success" data-off="default">
                        <input type="checkbox"  <?php if ($cdk_dealer['AdpActiveDealer']['active_parts']) echo 'checked="checked"'; else echo "" ; ?> class="update-cdk-status" data-field="active_parts" data-id="<?php echo $cdk_dealer['AdpActiveDealer']['id']; ?>"   />
                       </div>
                   </td>
                    <td>
                   <div class="make-switch" data-on="success" data-off="default">
                        <input type="checkbox"  <?php if ($cdk_dealer['AdpActiveDealer']['active_sales']) echo 'checked="checked"'; else echo "" ; ?> class="update-cdk-status" data-field="active_sales" data-id="<?php echo $cdk_dealer['AdpActiveDealer']['id']; ?>"   />
                       </div>
                   </td>
                   <td>
                   <?php 
				   echo $this->Form->input('default_sperson_id',array('type' => 'select','value' => $cdk_dealer['AdpActiveDealer']['default_sperson_id'],'options' => $cdk_dealer['User'],'class' => 'default_sperson_class','id' => 'default_sperson_'.$cdk_dealer['AdpActiveDealer']['id'],'div' => false,'label' => false,'empty' => 'Default Salesperson','data-id' => $cdk_dealer['AdpActiveDealer']['id'] ));
				   ?>
                   </td>
                   <tr>
				   <?php } ?> 
                </tbody>
            </table>

            <!-- // Table END -->
           
        <!-- //Search result End-->
    </div>
</div>
</div>
</div>
<script>
    $script.ready('bundle', function() {
       
    $(".update-cdk-status").on('change',function(e){
		$val =0;
		if($(this).is(':checked'))
		{$val = 1;}
		$field = $(this).attr('data-field');
		$id = $(this).attr('data-id');
		$.ajax({
				type:'POST',
				url:'<?php echo $this->Html->url(array('controller' => 'adminhome','action' =>'update_cdk_status')); ?>',
				data:{id:$id,field:$field,value:$val},
				success: function(data){
					
					}
			});
		
		
		});
		
		$("#AdpActiveDealerDealerId").on('change',function(){
			val = $(this).val();
			if(val != '')
			{
				$url = '<?php echo $this->Html->url(array('controller' => 'adminhome','action' => 'dealer_users')); ?>/'+val;
				$.ajax({
						type : 'POST',
						url:$url,
						success:function(data){
														
								$("#AdpActiveDealerDefaultSpersonId").html(data);
							}
					});
			}
			
			});
			
			$(".default_sperson_class").on('change',function(){
				$val = $(this).val();
				$id = $(this).attr('data-id');
				$field = 'default_sperson_id';
				
				$.ajax({
				type:'POST',
				url:'<?php echo $this->Html->url(array('controller' => 'adminhome','action' =>'update_cdk_status')); ?>',
				data:{id:$id,field:$field,value:$val},
				success: function(data){
					
					}
				});
				
			});
        
    });

</script>