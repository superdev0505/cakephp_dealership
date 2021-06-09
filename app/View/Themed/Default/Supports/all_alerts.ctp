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
			<table class="dynamicTable tableTools table table-bordered checkboxs"  >
			
				<!-- Table heading -->
				<thead>
					<tr>
						<th>Header</th>
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
						
						
                        <td class="actions">
        
			
			 <?php
			
			 echo $this->Html->link(__('<i class="fa fa-eye"></i>'),array('controller'=>'supports','action'=>'view_alerts',$alert['UpdateAlert']['id']),array('escape'=>false,'class'=>'btn btn-sm btn-success view-update-alert no-ajaxify','data-placement'=>'top','data-original-title'=>"View Alert",'data-toggle'=>"tooltip",'data-id' => $alert['UpdateAlert']['id']));
			 ?>         
             
                                      
		</td>
					</tr>
					<?php } ?>
					
					
					
				</tbody>
				<!-- // Table body END -->
				
			</table>
   
            </div>
	</div>
    </div>
    
 <script type="text/javascript">
 $(document).ready(function(){
	 $(".view-update-alert").on('click',function(e){
		 	e.preventDefault();
			data_id = $(this).attr('data-id');
			$.ajax({
				type: "GET",
				cache: false,
				url: '<?php echo $this->Html->url(array('controller' => 'supports','action' => 'view_alerts')); ?>/'+data_id,
				success: function(data){
				if(data != ''){
					bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Update Alerts",
					}).find("div.modal-dialog").addClass("system_update_alert");
				}
				//$("span#system_update_alert").remove();													
				}
			});
		 
		 });
	 
	 
	 });
 </script>   