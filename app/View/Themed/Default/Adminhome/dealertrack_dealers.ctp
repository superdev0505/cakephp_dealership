<br />
<br />
<br /><br />

<div class="row">

        <div class="col-md-12">

		<?php echo $this->Session->flash(); ?>
            <!-- Widget -->
            <div class="widget  widget-body-white">

                <!-- Widget heading -->
                <div class="widget-head">
                    <h4 class="heading">Activate Dealer Dealer Track Integration</h4>
                </div>
                <!-- // Widget heading END -->

                <div class="widget-body">
                    <?php echo $this->Form->create('DealertrackDealer',array('class' =>'no-ajaxify apply-nolazy'));
					echo $this->Form->hidden('dealertrack_active',array('value' =>1));
					 ?>
                    <div class="col-md-4" style="width:30%">
                        Dealer: <?php echo $this->Form->input('dealer_id',array('div' =>false,'label' => false,'class' =>'form-control','style' =>'width:85%;display:inline;','type'=>'select','options' => $all_dealer_list,'empty' => 'Select Dealer','required' => true)); ?>
                    </div>
                        <div class="col-md-2" style="width:18%">
                     <?php echo $this->Form->input('default_sperson_id',array('div' =>false,'label' => false,'class' =>'form-control','style' =>'width:85%;display:inline;','type'=>'select','options' => array(),'empty' => 'Default Salesperson','required' => true)); ?>
                    </div>
                    &nbsp;&nbsp;
                    <div class="col-md-4" style="width:17%">
                        <?php echo $this->Form->input('dmsid',array('class' =>'form-control','style' => 'width:180px;display:inline;','label' => false,'div' =>false,'required' => true,'placeholder' =>'Dealer Track ID:')); ?>
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
                <h4>Active Dealer Track Dealerships :</h4>
            </div>
            <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                <thead class="success">
                    <tr>
                        <th>Dealer</th>
                        <th>Dealer Track ID</th>
                        <th>Active</th>
                        <th>Default Salersperson</th>
                        <th>2 Years Data Integrated</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   <?php foreach($dt_active_dealers as $dt_dealer){ ?>
                   <tr>
                   <td>
                       <?php echo '#'.$dt_dealer['DealertrackDealer']['dealer_id'].' '.$dt_dealer['DealertrackDealer']['dealer_name'] ?>
                   </td>
                   <td>
                       <?php echo $dt_dealer['DealertrackDealer']['dmsid']; ?>
                   </td>
                   <td>
                   <div class="make-switch" data-on="success" data-off="default">
                        <input type="checkbox"  <?php if ($dt_dealer['DealertrackDealer']['active']) echo 'checked="checked"'; else echo "" ; ?> class="update-dt-status" data-field="active" data-id="<?php echo $dt_dealer['DealertrackDealer']['id']; ?>"   />
                       </div>
                   </td>

                   <td>
                   <?php
				   echo $this->Form->input('default_sperson_id',array('type' => 'select','value' => $dt_dealer['DealertrackDealer']['default_sperson_id'],'options' => $dt_dealer['User'],'class' => 'default_sperson_class','id' => 'default_sperson_'.$dt_dealer['DealertrackDealer']['id'],'div' => false,'label' => false,'empty' => 'Default Salesperson','data-id' => $dt_dealer['DealertrackDealer']['id'] ));
				   ?>
                   </td>
                   <td>
                       <?php
                           if($dt_dealer['DealertrackDealer']['2_years_pulled'] == '1') echo 'Yes';
                           else echo 'No';
                        ?>
                   </td>
                   <td>
                       <?php echo date("Y-m-d",strtotime($dt_dealer['DealertrackDealer']['created']));?>
                   </td>
                   <td>
                       <!--<button data-field="remove" class="update-dt-status">X</button>-->
                       <?php echo $this->Form->input('X',array('type' => 'button','value' => 'remove', 'data-field'=>'remove','class' => 'dt-remove','id' => 'remove_'.$dt_dealer['DealertrackDealer']['id'],'div' => false,'label' => false,'data-id' => $dt_dealer['DealertrackDealer']['id'] )); ?>
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

    $(".update-dt-status").on('change',function(e){
		$val =0;
		if($(this).is(':checked'))
		{$val = 1;}
		$field = $(this).attr('data-field');
		$id = $(this).attr('data-id');
		$.ajax({
				type:'POST',
				url:'<?php echo $this->Html->url(array('controller' => 'adminhome','action' =>'update_dt_status')); ?>',
				data:{id:$id,field:$field,value:$val},
				success: function(data){

					}
			});


		});
        $(".dt-remove").on('click',function(e){
            $val =0;
            if($(this).is(':checked'))
            {$val = 1;}
            var $field = $(this).attr('data-field');
            var $id = $(this).attr('data-id');
            var parentTr = $(this).parents('tr');
            $.ajax({
                    type:'POST',
                    url:'<?php echo $this->Html->url(array('controller' => 'adminhome','action' =>'update_dt_status')); ?>',
                    data:{id:$id,field:$field,value:$val},
                    success: (function(data){
                            parentTr.remove()
                        })(this)
                });


            });

		$("#DealertrackDealerDealerId").on('change',function(){
			val = $(this).val();
			if(val != '')
			{
				$url = '<?php echo $this->Html->url(array('controller' => 'adminhome','action' => 'dealer_users')); ?>/'+val;
				$.ajax({
						type : 'POST',
						url:$url,
						success:function(data){

								$("#DealertrackDealerDefaultSpersonId").html(data);
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
				url:'<?php echo $this->Html->url(array('controller' => 'adminhome','action' =>'update_dt_status')); ?>',
				data:{id:$id,field:$field,value:$val},
				success: function(data){

					}
				});

			});

    });

</script>
