<br />
<br /><br /><br />
<style>
table.no-stripe td{background-color: #fff!important;}
</style>
<?php echo $this->Session->flash(); ?>
<div class="innerLR">
               
             
                 
                
             
                <!-- // Filters END -->
                <!-- Widget -->
                <div class="widget widget-body-white" >
                    <!-- Widget heading -->
                    <div class="widget-head">
                        <h4 class="heading"><i class="fa fa-medkit fa-lg"></i>&nbsp;Setup Email Survey</h4>
                    </div>
                    <!-- // Widget heading END -->
                    <div class="widget-body" id="LoadSearchResult">
                    <div class="separator bottom">
                           Setup Survey Questions
                            <div class="clearfix"></div>
                        </div>
                         <table class="table table-condensed table-striped table-primary table-vertical-center checkboxs">
                            <thead>
                                <tr>
                                <th width="90%">Survey</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($surveys as $survey){  ?>
                            <tr>
                            <td><?php echo $survey['Survey']['name']; ?></td>
                            <td> <a href="#" class="btn btn-inverse showQuestions no-ajaxify" data-id="<?php echo $survey['Survey']['id'];?>" style="font-size: 16px;line-height: 2;padding: 1px 17px;">Setup Survey</a></td>
                            </tr>
                             <tr style="display:none;" id="Survey_<?php echo $survey['Survey']['id']; ?>">
                            <td colspan="2">
                            <div class="row">
							<div class="col-md-12">
                            <div class="separator bottom">
                           Select the questions below that you want to setup for Email Survey
                            <div class="clearfix"></div>
                        </div>
                              <table class="table table-responsive no-stripe swipe-horizontal table-condensed" >							<thead >
                            <tr>
                            <th style="color:#000 !important" width="70%">Question</th>
                            <th style="color:#000 !important">Question Order</th>
                            <th style="color:#000 !important">Action<span style="float:right;"><a href="javascript:void();" onclick="$('#Survey_<?php echo $survey['Survey']['id'];?>').hide();" style="color:#000;">( X )</a></span></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($survey['Question'] as $question){ ?>
                            <tr>
                            <td id="question_td_<?php echo $question['id']; ?>" >
                            <?php 
							$class = 'btn-info';
							$action = 'add';
							$btn_text = 'Select';
							$d_s_id = '0';
							if(in_array($question['id'],$dealer_survey_questions)){
								echo '<i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;">&nbsp;'; 
								$class = 'btn-danger';
								$action = 'delete';
								$btn_text = 'Remove';
								$d_s_id = array_search($$question['id'],$dealer_survey_questions);
							}
							?></i>Q):- <?php echo $question['name']; 
							
							
							
							?>
                           
                            </td>
                            <td><input type="text" class="form-control" data-primary="<?php echo $d_s_id; ?>" id="question_order_<?php echo $question['id'] ?>" style="width:150px" placeholder="Question Order" data-id="<?php echo $question['id']; ?>" value="<?php echo isset($question_sequence[$question['id']])?$question_sequence[$question['id']]:''; ?>" /></td>
                            <td>
                            <a href="javascript:void(0)" class="btn <?php echo $class; ?> question_action" data-id="<?php echo $question['id']; ?>" data-primary="<?php echo $d_s_id; ?>" data-survey="<?php echo $survey['Survey']['id']; ?>" data-action="<?php echo $action; ?>" ><?php echo $btn_text; ?></a>
                            </td>
                            </tr>
                            
							
							<?php } ?>
                            </tbody>
                          </table>
                            </div>
                            </div>
                            </td>
                            </tr>	
							<?php } ?>
                            </tbody>    
                        <!-- Total bookings & sort by options -->
                     
                        <!-- // Total bookings & sort by options END -->
                        <!-- Table -->
                        
                        <!-- // Table END -->
                        <!-- With selected actions -->
                        
                        <!-- // With selected actions END -->
                        <!-- Pagination -->
                    
                        <div class="clearfix"></div>
                        <!-- // Pagination END -->
                    </div>
                </div>
                <!-- // Widget -->
                <!-- Row -->
                
                <!-- // Row END -->
            </div>


<script>
$(document).ready(function(){
	
	$(".showQuestions").on('click',function(e){
				e.preventDefault();
				data_id=$(this).attr('data-id');
				$("#Survey_"+data_id).slideToggle();
				});
				
	$(".question_action").on('click',function(e){
		e.preventDefault();
		$obj = $(this);
		$question_id= $(this).attr('data-id');
		$action = $(this).attr('data-action');
		$survey_id = $(this).attr('data-survey');
		$q_order = $("#question_order_"+$question_id).val();
		$id = $(this).attr('data-primary');
		if($action=='add' && $q_order ==0)
		{
			alert('Please enter question order');
			return false;
		}
		if($id != 0){
		$form_data ={id:$id,action:$action,question_id:$question_id,survey_id:$survey_id,q_order:$q_order};
		}else{
			$form_data ={action:$action,question_id:$question_id,survey_id:$survey_id,q_order:$q_order};
		}
		$.ajax({
			type:'POST',
			url:'<?php echo $this->Html->url(array('controller' =>'dealer_survey_questions','action' =>'survey_question_action')); ?>',
			data:$form_data,
			success: function(data){
				if($action == 'add'){
					$obj.addClass('btn-danger').removeClass('btn-info');
					$obj.attr('data-action','delete');
					$obj.text('Remove');
					$obj.attr('data-primary',data);
					$("#question_order_"+$question_id).attr('data-primary',data);
					$("#question_td_"+$question_id).prepend('<i class="fa fa-fw fa-check-square-o" style="color: #8BBF61;">&nbsp;');
					
				}
				else{
					$obj.addClass('btn-info').removeClass('btn-danger');
					$obj.attr('data-action','add');
					$obj.text('Select');
					$obj.attr('data-primary','0');
					$("#question_order_"+$question_id).attr('data-primary','0');
					$("#question_td_"+$question_id+" i").remove();
				}
				
				}
			
			});
		
		});			
	
	});

</script>            