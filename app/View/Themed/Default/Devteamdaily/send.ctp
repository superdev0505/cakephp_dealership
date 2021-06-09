<!-- Widget -->
<?php
//debug($this->request->query['returl']);
//debug( html_entity_decode($this->request->query['returl']) ); 
?>

<div class="widget widget-heading-simple widget-body-white" >
    <form accept-charset="utf-8" method="post" id="supportsSendForm" class="form-inline apply-nolazy" autocomplete="off" action="/devteamdaily/send/<?php echo $sid; ?>">
        <div class="widget-body">
            <div class="form-group"> 
                <?php echo $this->Form->label('to_others', 'Send To:', array('class' => "col-sm-2 control-label")); ?>
                <div class="col-sm-10"> 

                    <div style="display: inline-block; margin-top: 0;" class=""> 
                        <label class="status-done1"> 
                            <input id="selecctall" type="checkbox" value="sa" name="sa" > Select All
<!--                                    <i class="fa fa-fw fa-square-o"></i>-->

                        </label> 
                    </div>

                    <br/>
                    <div style="display: inline-block; margin-top: 0;" class=""> 
                            <label class="status-done1"> 
                                <input  disabled="true" checked="true" type="checkbox" value="andrew@dp360crm.com" name="to_others[]" >
    <!--                                    <i class="fa fa-fw fa-square-o"></i>-->
                                Tod Kilgore
                            </label> 
                        </div>
                    <?php
                    foreach ($emails as $evalue) {
                        ?> 
                        <div style="display: inline-block; margin-top: 0;" class=""> 
                            <label class="status-done1"> 
                                <input  class="checkbox1" type="checkbox" value="<?php echo $evalue['Emailnote']['email'] ?>" name="to_others[]" >
    <!--                                    <i class="fa fa-fw fa-square-o"></i>-->
                                <?php echo $evalue['Emailnote']['name'] ?>
                            </label> 
                        </div>
                        &nbsp;&nbsp;
                        <?php
                    }
                    ?> 



                </div>
            </div>
            <br>
            <div class="form-group"> 
                <?php echo $this->Form->label('response_status', 'Status:',array('class'=>"col-sm-2 control-label")); ?>
                <div class="col-sm-10"> 
                    <?php //echo $this->Form->label('dealer_id','Select Dealership');  ?>
                    <?php //echo $this->Form->input('dealer_id', array('type' => 'select', 'options' => $dealers_list,  'empty' =>FALSE, 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>'width: 100%'));?>
  
                      
                    <?php
                    echo $this->Form->input('response_status', array('type' => 'select',
                        'options' => array(
                            'Open' => 'Open',
                            'Pending' => 'Pending',
                            'Close' => 'Close'
                        ), 'required' => 'required', 'id' => 'response_status', 'div' => false, 'label' => false, 'empty' => "Select", 'class' => 'form-control','style'=>'min-height: 10px; width: auto; margin-bottom: 10px;margin-left: 45px;'));
                    ?>
                    <!--					<div class="separator"></div>-->
                       
               
                </div>

            </div>
            <br>
            <div class="form-group"> 
                <?php echo $this->Form->label('percentage', 'Percentage:',array('class'=>"col-sm-2 control-label")); ?>
                <div class="col-sm-10"> 

                    <?php
                    echo $this->Form->input('percentage', array('type' => 'select',
                        'options' => array(
                            '10' => '10%',
                            '20' => '20%',
                            '30' => '30%',
                            '40' => '40%',
                            '50' => '50%',
                            '60' => '60%',
                            '70' => '70%',
                            '80' => '80%',
                            '90' => '90%',
                            '100' => '100%'
                        ), 'required' => 'required', 'id' => 'percentage', 'div' => false, 'label' => false, 'empty' => "Select", 'class' => 'form-control','style'=>'min-height: 10px; width: auto; margin-bottom: 10px;margin-left: 45px;'));
                    ?>
                </div>

            </div>
            <br>
            <div class="form-group" style="width: 100%"> 
<?php echo $this->Form->label('note', 'Note:',array('class'=>"col-sm-2 control-label",'style'=>'width:50%;')); ?>
                <div class="col-sm-10"> 

<?php echo $this->Form->input('note', array('type' => 'textarea', 'required' => 'required', 'label' => false, 'div' => false, 'class' => 'form-control', 'id' => 'note','style'=>'min-height: 10px; width: 100%; margin-bottom: 10px;')); 
    ?>
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

<div class="widget-body">
    <div id="report_data_container">
        <h4>Previous To-do Status Histories:</h4>
    </div>
    <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
        <thead class="bg-primary">
<?php echo $this->Html->tableHeaders(array('SL', 'Note', 'Status', 'Percentage')); ?>
        </thead>
        <tbody>
<?php if (empty($allresults)): ?>
                <tr>
                    <td colspan="4" class="striped-info">No record found.</td>
                </tr>
            <?php endif; ?>
            <?php
            $i = 1;
            foreach ($allresults as $result):
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['DevteamHistory']['note']; ?></td>
                    <td><?php echo $result['DevteamHistory']['status']; ?></td>
                    <td>
                        <?php echo $result['DevteamHistory']['percentage']; ?>
                        %</td>
                </tr>
                <?php
                $i++;
            endforeach;
            ?>
        </tbody>
    </table>

    <!-- // Table END -->
</div>
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
		
            if( $("#note").val() == ''){
                $("#note").focus();
                alert('Please enter Note');
                return false;
            }
            //                
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
	
<?php if (isset($save_sucees)) { ?>
                   bootbox.hideAll();
<?php } ?>
            
               $('#selecctall').click(function(event) {  //on click
                   if(this.checked) { // check select status
                       $('.checkbox1').each(function() { //loop through each checkbox
                           this.checked = true;  //select all checkboxes with class "checkbox1"              
                       });
                   }else{
                       $('.checkbox1').each(function() { //loop through each checkbox
                           this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                       });        
                   }
               });
	
           });

</script>
