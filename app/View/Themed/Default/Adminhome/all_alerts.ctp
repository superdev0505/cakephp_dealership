<br />
<br />

<br />
<br />


<div class="innerLR">
<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
<div class="widget">
		<div class="widget-head">
			<h4 class="heading">All Update Alerts</h4>
		</div>
		<div class="widget-body innerAll">
		  
		  <div class="table-responsives">
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Header</th>
						<th>Message</th>
                        <th>Action</th>
                        
					</tr>
					
				</thead>
				<!-- // Table heading END -->
				
				<!-- Table body -->
				<tbody>
					<?php
					//pr($report_results );
					foreach($all_alerts as $alert){ 
					
					?>
					<!-- Table row -->
					<tr class="gradeA" >
						<td><?php
						
						echo $alert['UpdateAlert']['header']; ?></td>
						<td><?php echo $alert['UpdateAlert']['message'];; ?></td>
						
                        <td class="actions">
        
			
			 <?php
			
			 echo $this->Html->link(__('<i class="fa fa-pencil"></i>'),array('controller'=>'adminhome','action'=>'add_alert',$alert['UpdateAlert']['id']),array('escape'=>false,'class'=>'btn btn-sm btn-success','data-placement'=>'top','data-original-title'=>"Edit Alert",'data-toggle'=>"tooltip"));
			 ?>
             
             
                                        <?php
                                         echo $this->Form->postLink(__('<i class="fa fa-times"></i>'), array('controller'=>'adminhome','action'=>'delete_alert',$alert['UpdateAlert']['id']), array('escape'=>false,'class'=>'btn btn-sm btn-danger','data-placement'=>'top','data-original-title'=>"Delete alert",'data-toggle'=>"tooltip"), __('Are you sure you want to delete alert?')); ?>
		</td>
					</tr>
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
	     </div>		
            </div>
	</div>
    </div>