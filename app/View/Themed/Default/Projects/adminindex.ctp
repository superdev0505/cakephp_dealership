<br />
<br />
<div class="innerLR">
<div class="separator-h"></div>
		 <?php echo $this->Session->flash('flash', array('element' => 'alertsuccess')); ?> 
<!-- col-table -->
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
                           <?php echo $this->Form->create('devteamdaily', array('url' => array('controller' => 'Projects','action' => 'adminindex'), 'class' => 'form-inline apply-nolazy')); ?>
		<i class="fa fa-group"></i>
                &nbsp;Devteam:
                <?php echo $this->Form->input('developer_id',array('type'=>'select',
								'options'=>$developers,'div'=>false,'label'=>false,'empty'=>"Select",'class'=>'form-control')); ?> 
                
	 <?php echo $this->Form->end(); ?>
              
	</h4>
	<div class="separator"></div>
<div class="row">
<div class="widget-body">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body1">
                            <ul class="breadcrumb">
                                <!--<li><span class="heading strong-text-white "><i class="fa fa-ruble fa-2x"></i>&nbsp;</span></li>-->
                                <li><a href="#" class="add_project"><i class="fa fa-medkit" style="font-size:20px;"></i>&nbsp;<b>Add New Project</b></a><span class="divider"></span></li>
								<li><a href="/developers/adminindex"><i class="fa fa-group " style="font-size:20px;"></i>&nbsp;<b>View Devteam</b></a>  <span class="divider"></span></li>
								<li><a href="/emailnotes/adminindex"><i class="fa fa-twitter " style="font-size:20px;"></i>&nbsp;<b>View Email address</b></a>  <span class="divider"></span></li>
								<li><a href="/projects/close"><i class="fa fa-check-circle"  style="font-size:20px;"></i>&nbsp;<b>View Closed Project list</b></a>  <span class="divider"></span></li>
							</ul>  
                            <div class="page-content">
                                <div id="notify-container">
									
								</div>
                                
<!--<div class="panel panel-default bg-primary">
    <div class="panel-heading">-->

        <div class="pull-left" style="padding-top:15px;">
            <span> <h3 class="panel-title"><b>
                    &nbsp; Total Projects: <?php 
                            if ($filter == 1) {
                            echo count($projects);
                            } else {

                            echo $totalprojects;
                            }
                    
                    ?>
                                      </b>
                    
                </h3></span>
        </div>
<br>
<br>
        <div class="pull-left" style="padding-top:15px;width: 100%;">
            <span> 
         <b>&nbsp;&nbsp;Quick Link: </b>
                <?php
            echo $this->Form->input('project_id', array('type' => 'select', 'options' => $allquicklinks, 'empty' => 'Select a Project.', 'label' =>FALSE, 'div' => false, 'class' => 'form-control1'));
            ?>
          </span>
        </div>
<br>
<br>
<br>
<br>

<div class="widget">
<div class="row row-merge margin-none">

    <div class="col-md-3">
            <div class="innerAll text-center statbox" style="color:#4193d0;"> 
    			<a href="<?php echo Router::url(array('controller'=>'projects', 'action'=>'adminindex'), false); ?>">
                    <span class="text-medium strong" id="PENDING"><?php    echo $totalprojects;
 ?></span><br/>
                    Open Project
    									</a> 
            </div>
    </div>
    <div class="col-md-3">
            <div class="innerAll text-center statbox" style="color:#4193d0;">
  <a href="<?php echo Router::url(array('controller'=>'projects', 'action'=>'close'), false); ?>">
                            <span class="text-medium strong" id="PENDING_u">
                                <?php
                                echo $closed;

                                ?>
                            </span><br/>
                            Closed Project
    									</a>
            </div>
    </div>
    <div class="col-md-3">
            <div class="innerAll text-center statbox" style="color:#4193d0;">
    <!--									<a href="#">-->
                        <span class="text-medium strong" id="AVERAGE">                                                                                        <?php
                        if($avg_responsetime==0){
                        echo $avg_minutes.' Min.';
                        }else{
                       if($avg_responsetime==1){                                                                                                   echo $avg_responsetime . ' Day';
                       }else{
                             echo $avg_responsetime . ' Days';
                       }
                        }

                        ?>
                        </span><br/>
                            AVERAGE CLOSED TIME
    <!--									</a>-->
            </div>
    </div>
    </div>

			</div>
    <div class="panel-body1">
        
        <div class="table-responsive">
        <div id="Campaign-grid" class="grid-view">

<table class="table table-bordered table-hover table-striped">
<thead  class="bg-primary">
<tr>
<th id="Campaign-grid_c0"  style="width:215px;" >Project Number #</th>
<th id="Campaign-grid_c0">Severity</th>
<th id="Campaign-grid_c0">Project Name</th>
<th id="Campaign-grid_c3"  style="width:350px;" >Project Description</th>
<th id="Campaign-grid_c3">Assign To</th>
<th id="Campaign-grid_c3" class="text-center">Add <br> Note</th>
<!--<th id="Campaign-grid_c3" style="width: 97px; text-align: center;">Total <br> To-do</th>-->
<!--<th id="Campaign-grid_c3" style="width: 97px; text-align: center;">Add <br> To-do</th>
<th id="Campaign-grid_c3" style="width: 97px; text-align: center;" class="bg-primary"> Push<br> to Test</th>-->
<th id="Campaign-grid_c3" class="text-center">Add <br> To-do</th>
<th id="Campaign-grid_c3"class="bg-primary text-center"> Push<br> to Test</th>
<th id="Campaign-grid_c3" class="text-center">Edit</th>
<th id="Campaign-grid_c3" class="text-center">Close</th>
<th id="Campaign-grid_c3" style="width:105px;" class="text-center">Attachment</th>
<!--<th id="Campaign-grid_c3">Close Ticket</th>-->
</tr>
</thead>
<tbody>
<?php 

$b=1;

foreach($projects as $project){
    
    //debug($project);
    
    if($b==1){
    ?>
<tr>
    <?php
    }else{
    ?>
<!--<tr  style="border-top: 10px solid #3695d5;">-->
    <tr class="bg-primary">
<th id="Campaign-grid_c0" class="bg-primary"  style="width:215px;" >Project Number #</th>
<th id="Campaign-grid_c0" class="bg-primary">Severity</th>
<th id="Campaign-grid_c0" class="bg-primary">Project Name</th>
<th id="Campaign-grid_c3" class="bg-primary"  style="width:350px;" >Project Description</th>
<th id="Campaign-grid_c3" class="bg-primary">Assign To</th>
<th id="Campaign-grid_c3" class="bg-primary text-center">Add <br> Note</th>
<!--<th id="Campaign-grid_c3" style="width: 97px; text-align: center;" class="bg-primary">Total <br> To-do</th>-->
<th id="Campaign-grid_c3" class="bg-primary text-center">Add <br> To-do</th>
<th id="Campaign-grid_c3"class="bg-primary text-center"> Push<br> to Test</th>
<!--<th id="Campaign-grid_c3" style="width: 97px; text-align: center;" class="bg-primary">Add <br> To-do</th>
<th id="Campaign-grid_c3" style="width: 97px; text-align: center;" class="bg-primary"> Push<br> to Test</th>-->
<th id="Campaign-grid_c3" class="bg-primary text-center">Edit</th>
<th id="Campaign-grid_c3" class="bg-primary text-center">Close</th>
<th id="Campaign-grid_c3" class="bg-primary text-center" style="width:105px;">Attachment</th>
<!--<th id="Campaign-grid_c3">Close Ticket</th>-->
</tr>
<tr>
    <?php
    
    }
    ?>
    
    <td>Project #<?php
    echo $project['Project']['id'];
    echo "<br>";
    echo "<br>";
    echo $this->Time->format('d/m/Y g:i A', $project['Project']['created']); 
    echo "<br>";
    echo "<br>";
    if($project['Project']['support_id']==0 || $project['Project']['support_id']==''){
        echo 'DP360 CRM';
    }else{
        echo $project['Support']['User']['dealer'].' #'.$project['Support']['User']['dealer_id'];
		 echo "<br> User ID  #".$project['Support']['User']['id'];
    
    }
  ///  echo $project['Project']['id'];
    
    //echo $this->Html->link($project['Project']['name'], '/devteamdaily/adminindex/' .$project['Project']['id'], array('class'=>'no-ajaxify'));
        ?>   </td>
    <td><?php
    echo $project['Project']['severity'];
        ?>   </td>
    <td><?php
    echo $project['Project']['name'];
    //echo $this->Html->link($project['Project']['name'], '/devteamdaily/adminindex/' .$project['Project']['id'], array('class'=>'no-ajaxify'));
        ?>   </td>
<td><?php 
  //echo nl2br($project['Project']['description']);
  ?>

<?php
echo $this->Text->truncate(strip_tags($project['Project']['description']), 125, array('html' => true,
    'ellipsis' => '<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="project_details no-ajaxify" id = "' .
    $project['Project']['id'] . '" >Read more</a>'));
?>
</td>
<td>
    <?php
echo $project['Developer']['name'];
?>  
</td>
<td class="text-center">
<!--    Add <br> Note-->
        <?php 
        //echo $this->Html->link('Add <br> Note', '#', array('class'=>'add_note','escape'=>false,'id'=>$project['Project']['id'])); 
        echo $this->Html->link('<i class="fa fa-file-text  fa-2x"></i>', '#', array('class'=>'add_note','escape'=>false,'id'=>$project['Project']['id'])); 
        ?>

</td>
<!--<td class="text-center">
    <?php 
//echo count($project['DevteamDaily']);
  ?> 
</td>-->
<td style="text-align: center;"><?php echo $this->Html->link('<i class="fa fa-tasks  fa-2x"></i>', '#', array('class'=>'add_todo','escape'=>false,'id'=>$project['Project']['id'])); ?></td>
<td style="text-align: center;">
<?php 

echo $this->Html->link('<i class="fa fa-arrow-up  fa-2x"></i>', '#', array('class'=>'add_test','escape'=>false,'id'=>$project['Project']['id'])); 

?>

</td>
<td  class="text-center"><?php echo $this->Html->link('<i class="fa fa-edit  fa-2x"></i>', '#', array('class'=>'edit_project','escape'=>false,'id'=>$project['Project']['id'])); ?></td>
<td>
    <?php 
    //echo $this->Html->link('<i class="fa fa-check-circle  fa-2x"></i>', 'admindelete/' . $project['Project']['id'], array('class'=>'no-ajaxify','escape'=>false), 'Are you sure you?', false); 
    echo $this->Html->link('<i class="fa fa-check-circle  fa-2x"></i>', '#', array('class'=>'close_project','escape'=>false,'id'=>$project['Project']['id'])); 
    ?>
</td>
<td  class="text-center">
    <?php echo $this->Html->link('<i class="fa fa-upload  fa-2x"></i>', '#', array('class'=>'file_upload','escape'=>false,'id'=>$project['Project']['id'])); ?>
    <br/>
    <br/>
    <b>Uploaded:</b>
    <br/>
    <?php 
    $u=1;
      if(!empty($project['Project']['file1'])){
     if(!empty($project['Project']['org_file1'])){   
    echo $this->Html->link($project['Project']['org_file1'], 'download/' . $project['Project']['file1'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, 'download/' . $project['Project']['file1'], array('class'=>'no-ajaxify'),null, false);      
    }
    $u++;
    
    echo "<br>";
    }
    if(!empty($project['Project']['file2'])){
    if(!empty($project['Project']['org_file2'])){   
    echo $this->Html->link($project['Project']['org_file2'], 'download/' . $project['Project']['file2'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, 'download/' . $project['Project']['file2'], array('class'=>'no-ajaxify'),null, false);      
    }
    
    $u++;
    echo "<br>";
    }
    if(!empty($project['Project']['file3'])){
    if(!empty($project['Project']['org_file3'])){   
    echo $this->Html->link($project['Project']['org_file3'], 'download/' . $project['Project']['file3'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, 'download/' . $project['Project']['file3'], array('class'=>'no-ajaxify'),null, false);      
    }
    
    $u++;
    echo "<br>";
    }
    //debug($project['ProjectFile']);
    if(!empty($project['ProjectFile'])){
        foreach($project['ProjectFile'] as $value){
            
            //echo $this->Html->link($value['filename'], 'download/' . $value['filename'], array('class'=>'no-ajaxify'),null, false); 
   if(!empty($value['org_filename'])){   
    echo $this->Html->link($value['org_filename'], 'download/' . $value['filename'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, 'download/' . $value['filename'], array('class'=>'no-ajaxify'),null, false);      
    }
            echo "<br>";
            $u++;
        }
    }
    
    
    
    ?>
</td>

</tr>

<!--<tr id="history_<?php //echo $project['Project']['id']; ?>" style='display: none'>-->
<tr id="history_<?php echo $project['Project']['id']; ?>" >
    <td colspan="11">
        <div class="row">
            <div class="col-md-12" id = "history_container_<?php echo $project['Project']['id']; ?>">
<!--            note section-->
<!--            note section-->
<!--            note section-->
<!--            note section-->
                <!-- Table -->
                <div class="pull-left"> 
                    <span class="heading strong-text-white ">
                        <i style="font-size:15px;" class="fa fa-list "></i>&nbsp;
                        <b>Note Update:</b>
                    </span> 
                </div>
						<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
							<!-- Table heading -->
							<thead>
								<tr>
									<th style='background-color: #424242'>Note</th>
									<th style='background-color: #424242;width: 250px;text-align: center;'>Date/Time</th>
									<th style='background-color: #424242;width: 150px;text-align: center;'>Attachment</th>
                                                                        
									
								</tr>
							</thead>
							<!-- // Table heading END -->
							<!-- Table body -->
							<tbody>
								<!-- Table row -->
                                                                
								<?php 
                                                                if(!empty($project['Note'])){
                                                                foreach ( $project['Note'] as $entry) { ?>
								<tr class="text-primary">
                                                                    <td><?php echo nl2br($entry['note']); ?>&nbsp;</td>
									<td style="text-align: center;">
                                                                             <?php echo date('D - M d, Y g:i A',strtotime($entry['created'])); ?>
                                                                            &nbsp;</td>
<td style="text-align: center;">

                <?php
                $u = 1;
                if (!empty($entry['file1'])) {

                if (!empty($entry['org_file1'])) {
                    echo $this->Html->link($entry['org_file1'], 'download_note/' . $entry['file1'], array('class' => 'no-ajaxify'), null, false);
                } else {
                    echo $this->Html->link('Note Attachment-' . $u, 'download_note/' . $entry['file1'], array('class' => 'no-ajaxify'), null, false);
                }

                $u++;
                echo "<br>";
            }
            if (!empty($entry['file2'])) {
                if (!empty($entry['org_file2'])) {
                    echo $this->Html->link($entry['org_file2'], 'download_note/' . $entry['file2'], array('class' => 'no-ajaxify'), null, false);
                } else {
                    echo $this->Html->link('Note Attachment-' . $u, 'download_note/' . $entry['file2'], array('class' => 'no-ajaxify'), null, false);
                }

                $u++;
                echo "<br>";
            }
            if (!empty($entry['file3'])) {
                if (!empty($entry['org_file3'])) {
                    echo $this->Html->link($entry['org_file3'], 'download_note/' . $entry['file3'], array('class' => 'no-ajaxify'), null, false);
                } else {
                    echo $this->Html->link('Note Attachment-' . $u, 'download_note/' . $entry['file3'], array('class' => 'no-ajaxify'), null, false);
                }

                $u++;
                echo "<br>";
            }
                ?>
            </td>
									
	</tr>
								<?php } 
                                                                }else{
                                                                    ?>
                                                                <tr class="text-primary">
                                                                    <td colspan="3" color="red"> No Data Found.&nbsp;</td>
									
								</tr>
                                                                
                                                                <?php
                                                                }
                                                                ?>
								<!-- // Table row END -->
							</tbody>
							<!-- // Table body END -->
						</table>
<!--                end note section-->
<!--                end note section-->
<!--                end note section-->
                
<!--                To-do section-->
<!--                To-do section-->

<br>
<div class="pull-left"> 
                    <span class="heading strong-text-white ">
                        <i style="font-size:15px;" class="fa fa-tasks"></i>&nbsp;
                        <b>To-do List:</b>
                    </span> 
                </div>

<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th class="bg-inverse" id="Campaign-grid_c0">Severity</th>
<th class="bg-inverse"  id="Campaign-grid_c0">Name</th>
<th class="bg-inverse"  id="Campaign-grid_c3">Email</th>
<th  class="bg-inverse" id="Campaign-grid_c3">To-do Name</th>
<th  class="bg-inverse" id="Campaign-grid_c3">To-do Description</th>
<th id="Campaign-grid_c3" class="bg-inverse" >Date / Time</th>
<th id="Campaign-grid_c3" class="bg-inverse" >Email Developer</th>
<th id="Campaign-grid_c3" class="bg-inverse" >To-do Status</th>
<th id="Campaign-grid_c3" class="bg-inverse" style='width: 150px;text-align: center;'>Attachment</th>
<!--<th id="Campaign-grid_c3">Close Ticket</th>-->
</tr>
</thead>
<tbody>
<tr class="odd">
<?php 

  if(!empty($project['DevteamDaily'])){

foreach($project['DevteamDaily'] as $support){ ?>
<td>
     <?php
    if($support['status']==1){
    ?>
    <i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
    <?php
    }
    ?>
    <?php echo $support['sevarity'] ?>
<br>
 <?php
    if($support['status']==1){
    ?>
    <a href="#" class="closed_status" id="<?php echo $support['id']; ?>">Closed</a>
    <?php
    }
    ?>

  
  
</td>
<td><?php echo $support['Developer']['name']; ?> </td>
<td><?php echo $support['Developer']['email'] ?> </td>
<td><?php echo $support['title'] ?> </td>
<td><?php 

//echo $support['DevteamDaily']['description'] 
echo nl2br($support['description']);

?>


</td>
<td>
     <?php echo date('D - M d, Y g:i A',strtotime($support['created'])); ?>
    <?php 

//echo $this->Time->format('m/d/Y g:i A', $support['created']); ?></td>
<td>
  <a href="mailto:<?php echo $support['Developer']['email']; ?>">Click to Email</a>

</td>
<td>
<!--  <a href="mailto:<?php //echo $support['User']['email']; ?>">Click to Email</a>-->
    <a href="#" id="<?php echo $support['id']; ?>" class="email_dealer" >Click to status</a>

</td>
<!--<td><?php //echo $this->Html->link('Close Ticket', 'admindelete/' . $support['Support']['id'], array('class'=>'no-ajaxify'), 'Are you sure you want to close this support ticket?', false); ?>&nbsp;</a>
</td>-->
<td style="text-align: center;">

                <?php
                $u = 1;
                if (!empty($support['file1'])) {

                if (!empty($support['org_file1'])) {
                    echo $this->Html->link($support['org_file1'], 'download_todo/' . $support['file1'], array('class' => 'no-ajaxify'), null, false);
                } else {
                    echo $this->Html->link('To-do Attachment-' . $u, 'download_todo/' . $support['file1'], array('class' => 'no-ajaxify'), null, false);
                }

                $u++;
                echo "<br>";
            }
            if (!empty($support['file2'])) {

                if (!empty($support['org_file2'])) {
                    echo $this->Html->link($support['org_file2'], 'download_todo/' . $support['file2'], array('class' => 'no-ajaxify'), null, false);
                } else {
                    echo $this->Html->link('To-do Attachment-' . $u, 'download_todo/' . $support['file2'], array('class' => 'no-ajaxify'), null, false);
                }

                $u++;
                echo "<br>";
            }
            if (!empty($support['file3'])) {

                if (!empty($support['org_file3'])) {
                    echo $this->Html->link($support['org_file3'], 'download_todo/' . $support['file3'], array('class' => 'no-ajaxify'), null, false);
                } else {
                    echo $this->Html->link('To-do Attachment-' . $u, 'download_todo/' . $support['file3'], array('class' => 'no-ajaxify'), null, false);
                }
                $u++;
                echo "<br>";
            }
                ?>
            </td>
</tr>
<?php } 
} else {
        ?>
        <tr class="text-primary">
            <td colspan="9" color="red"> No Data Found.&nbsp;</td>
                
        </tr>
            
        <?php
    }
    ?>
</tbody>
</table>
<!--To-do Section End-->
<!--To-do Section End-->
<!--To-do Section End-->
            
            </div>
        </div>
    </td>
</tr>

    <?php 
    
    $b++;
    } ?>
</tbody>
</table>

</div>       

<style type="text/css">
.col-md-3 {
    width: 33.33%;
}

.panel-body1::before, .panel-body1::after {
    content: " ";
    display: table;
}
.panel-body1::before, .panel-body1::after {
    content: " ";
    display: table;
}

.panel-body1::after {
    clear: both;
}
.panel-body1::before, .panel-body1::after {
    content: " ";
    display: table;
}
.panel-body1::after {
    clear: both;
}
.panel-body1::before, .panel-body1::after {
    content: " ";
    display: table;
}
*, *::before, *::after {
    box-sizing: border-box;
}

.panel-body1 {
    padding: 15px;
}

.modal-dialog {
    width: 1000px;
}

.form-control1 {
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555;
    font-size: 14px;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    vertical-align: middle;
    width: 88%;
}
</style>


<script>

$script.ready('bundle', function() {
    
    
          $(".closed_status").on('click',function(e){
	e.preventDefault();
        var sid=$(this).attr('id');
        //    alert(dealer_id);
        //    die;
        $.ajax({
            type: "GET",
            cache: false,
            url: '/devteamdaily/closed_status/'+sid,
            success: function(data){
                
                bootbox.dialog({
                    message: data,
                    title: "<b>To-do Status Histories</b>"
                }).find("div.modal-dialog").addClass("largeWidth");
            }
        });
        
    });
                
    
     ///on click pop-up 
                $(".email_dealer" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                 var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devteamdaily/send/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Response for To-do.",
				});
			}
		});
		
	});   
    
     ///on click pop-up 
                $(".add_todo" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/Devteamdaily/add/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add New To-do."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up 
                $(".add_note" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/Projects/addnote/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add Note."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up for close project
                $(".close_project").click(function(event){
                    
              //  alert( $(this).attr('id') );
                var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/Projects/admindelete/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Close."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up 
                $(".project_details" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/Projects/projectdetails/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Project Description."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
            });   
     ///on click pop-up 
                $(".add_test" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/Projects/addtest/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Push to TEST."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up 
                $(".add_project" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                 //var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/projects/add",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add New Project."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up for edit project
                $(".edit_project" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                 var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/projects/edit/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Update Project."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up for file upload project
                $(".file_upload" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                 var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/projects/file_upload/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "File Upload."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
        
    $("#devteamdailyDeveloperId").change(function(event){
        if($(this).val()!=''){
            $('#devteamdailyAdminindexForm').submit();	
        }
    });
    
    
    $("#project_id").change(function(event){
    
        if($(this).val()!=''){
location.href = "<?php echo $this->Html->url(array('controller'=>'projects','action'=>'adminindex')); ?>/"+$(this).val();
                        }
                        
		});
    
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");
        
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 