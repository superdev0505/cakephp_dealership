<?php 
    function get_filename($fname){
        //$fname = "10341_549bf6a99ad79_photodune-1949987-male-portrait-s.jpg";
        $name1 = substr($fname, strpos($fname, "_")+1   );
        $filename = substr($name1, strpos($name1, "_")+1   );
        return $filename;
    }
    function file_size($size){
        return number_format($size/1024, 1, '.', '')."KB" ;
    }
    //debug($files);
?>
<br />
<br />
<br />
<div class="innerLR">
<div class="separator-h"></div>
		 <?php echo $this->Session->flash('flash', array('element' => 'alertsuccess')); ?> 
<!-- col-table -->
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
                           <?php echo $this->Form->create('supports', array('url' => array('controller' => 'supports','action' => 'adminindex'), 'class' => 'form-inline apply-nolazy')); ?>
		<i class="fa fa-bar-chart-o"></i> Select Date:
		&nbsp;
                 <?php echo $this->Form->input('select_date', array('type' => 'text','style'=>'width:150px;', 'class' => 'form-control chngvalue')); ?>
                &nbsp; &nbsp;
                Month:
<?php
//
//if($month==''){
//    $month=date('m');
//}

?>                
                <select id="supports_month" style="width: 175px; display: inline-block" class="form-control input-sm" name="data[stats_month][month]">
                    <option value="" <?php if($month==''){ echo 'selected'; } ?> >Select</option>
<option value="01" <?php if($month=='01'){ echo 'selected'; } ?> >January</option>
<option value="02" <?php if($month=='02'){ echo 'selected'; } ?> >February</option>
<option value="03" <?php if($month=='03'){ echo 'selected'; } ?> >March</option>
<option value="04" <?php if($month=='04'){ echo 'selected'; } ?> >April</option>
<option value="05" <?php if($month=='05'){ echo 'selected'; } ?> >May</option>
<option value="06" <?php if($month=='06'){ echo 'selected'; } ?> >June</option>
<option value="07" <?php if($month=='07'){ echo 'selected'; } ?> >July</option>
<option value="08" <?php if($month=='08'){ echo 'selected'; } ?> >August</option>
<option value="09" <?php if($month=='09'){ echo 'selected'; } ?> >September</option>
<option value="10" <?php if($month=='10'){ echo 'selected'; } ?> >October</option>
<option value="11" <?php if($month=='11'){ echo 'selected'; } ?> >November</option>
<option value="12" <?php if($month=='12'){ echo 'selected'; } ?> >December</option>
</select>
	 <?php echo $this->Form->end(); ?>
              
	</h4>
	
	
	
	<div class="separator"></div>
<div class="row">
<div class="widget-body">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
<!--                            <ul class="breadcrumb"><li><span class="heading strong-text-white "><i class="fa fa-medkit fa-2x"></i>&nbsp;DP360 CRM Support-Ticket - ADMIN</span></li>
<li><a href="/supports/add">Support</a><span class="divider"></span></li><li><a href="/supports/adminindex">View Tickets</a>  <span class="divider"></span></li><li class="active">View all </li></ul>  
                            -->
                            <div class="page-content">
                                <div id="notify-container">
                                                                    </div>
                                
<!--<div class="panel panel-default bg-primary">
    <div class="panel-heading">-->

        <div class="pull-left" style="padding-top:15px;">
            <span> <h3 class="panel-title">
                    &nbsp;Support Tickets : <?php echo count($supports); ?>
                                      
                    
                </h3></span>
        </div>
<br>
<br>

<div class="widget">
<div class="row row-merge margin-none ">

							<div class="col-md-3">
								<div class="innerAll text-center statbox"> 
									<a href="#">
									<span class="text-medium strong" id="PENDING"><?php echo $pendings; ?></span><br/>
									PENDING TICKET
									</a> 
								</div>
							</div>
							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="#">
										<span class="text-medium strong" id="PENDING_u">
                                                                                    <?php
                                                                                    echo count($cal_responsetime);
                                                                                    
                                                                                    ?>
                                                                                </span><br/>
										CLOSED TICKET
									</a>
								</div>
							</div>
							<div class="col-md-3">
								<div class="innerAll text-center statbox">
									<a href="#">
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
									</a>
								</div>
							</div>
						</div>

			</div>
<!--        <div class="pull-right">
            
        <div class="clearfix"> </div>
    </div>-->
    <div class="panel-body pull-left">
        
        <div class="table-responsive">
        <div id="Campaign-grid" class="grid-view">

<table class="table table-bordered table-hover table-striped">
<thead  class="bg-primary">
<tr>
<th id="Campaign-grid_c0">Severity</th>
<th id="Campaign-grid_c3">Direct Phone</th>
<th id="Campaign-grid_c0">Dealer</th>
<th id="Campaign-grid_c1">Dealer ID</th>
<th id="Campaign-grid_c2">Name</th>
<th id="Campaign-grid_c3">Email</th>
<th id="Campaign-grid_c3">Ticket Name</th>
<th id="Campaign-grid_c3">Support Description</th>
<th id="Campaign-grid_c3">Date / Time</th>
<th id="Campaign-grid_c3">Email Dealer</th>
<th id="Campaign-grid_c3" style="width: 97px; text-align: center;">Add <br> To-do</th>
<th id="Campaign-grid_c3">Support Status</th>
<th id="Campaign-grid_c3">Attachment</th>
<!--<th id="Campaign-grid_c3">Close Ticket</th>-->
</tr>
</thead>
<tbody>
<tr class="odd">
<?php 



foreach($supports as $support){ ?>
<td>
     <?php
    if($support['Support']['status']==1){
    ?>
    <i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
    <?php
    }
    ?>
    <?php echo $support['Support']['sevarity'] ?>
<br>
 <?php
    if($support['Support']['status']==1){
    ?>
    <a href="#" class="closed_status" id="<?php echo $support['Support']['id']; ?>">Closed</a>
    <?php
    }
    ?>

  
  
</td>
<td><?php echo $support['Support']['direct_phone'] ?></td>
<td><?php echo $support['User']['dealer_id'] ?></td>
<td><?php echo $support['User']['dealer'] ?> </td>
<td><?php echo $support['User']['first_name'].' '.$support['User']['last_name'] ?> </td>



<td><?php echo $support['User']['email'] ?> </td>

<td><?php echo $support['Support']['title'] ?> </td>
<td>
    <?php //echo $support['Support']['description'] ?> 
<?php
echo $this->Text->truncate(strip_tags($support['Support']['description']), 70, array('html' => true,
    'ellipsis' => '<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="project_details no-ajaxify" id = "' .
    $support['Project']['id'] . '" >Read more</a>'));
?>
</td>
<td><?php echo $this->Time->format('m/d/Y g:i A', $support['Support']['created']); ?></td>
<td>
  <a href="mailto:<?php echo $support['User']['email']; ?>">Click to Email</a>

</td>
<td style="text-align: center;"><?php echo $this->Html->link('Add <br> To-do', '#', array('class'=>'add_todo','escape'=>false,'id'=>$support['Project']['id'])); ?></td>
<td>
<!--  <a href="mailto:<?php //echo $support['User']['email']; ?>">Click to Email</a>-->
    <a href="#" id="<?php echo $support['Support']['id']; ?>" class="email_dealer" >Click to Support</a>

</td>

<td>
    <?php echo $this->Html->link('File Upload', '#', array('class'=>'file_upload','id'=>$support['Project']['id'])); ?>
    <br/>
    <br/>
    <b>Uploaded:</b>


    <?php if($support['Support']['attachments'] != '' && !empty( json_decode($support['Support']['attachments']) )){ ?>
        <strong>Attachment</strong>
        <hr>
        <?php foreach(json_decode($support['Support']['attachments']) as $files){ ?>
            <div style="margin: 5px;">
                <?php echo get_filename($files); ?>
                <?php echo $this->Html->link('<i class="fa fa-download"></i>',array('controller'=>'contact_s3', 'action'=> 'download_attachment_support',"?"=>array('filename'=> $files )), array('escape'=>false, 'class'=>"btn  btn-xs no-ajaxify")); ?>
            </div>
        <?php }?>
    <?php }?>












    <br/>
    <?php 
    $u=1;
    if(!empty($support['Project']['file1'])){
   // echo $this->Html->link('Attachment-'.$u, '/Projects/download/' . $support['Project']['file1'], array('class'=>'no-ajaxify'),null, false); 
    
       if(!empty($support['Project']['org_file1'])){   
    echo $this->Html->link($support['Project']['org_file1'], '/Projects/download/' . $support['Project']['file1'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, '/Projects/download/' . $support['Project']['file1'], array('class'=>'no-ajaxify'),null, false);      
    }
    
    $u++;
    echo "<br>";
    }
    if(!empty($support['Project']['file2'])){
    //echo $this->Html->link('Attachment-'.$u, '/Projects/download/' . $support['Project']['file2'], array('class'=>'no-ajaxify'),null, false); 
             if(!empty($support['Project']['org_file2'])){   
    echo $this->Html->link($support['Project']['org_file2'], '/Projects/download/' . $support['Project']['file2'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, '/Projects/download/' . $support['Project']['file2'], array('class'=>'no-ajaxify'),null, false);      
    }
    
    $u++;
    echo "<br>";
    }
    if(!empty($support['Project']['file3'])){
 if(!empty($support['Project']['org_file3'])){   
    echo $this->Html->link($support['Project']['org_file3'], '/Projects/download/' . $support['Project']['file3'], array('class'=>'no-ajaxify'),null, false); 
     }else{
    echo $this->Html->link('Attachment-'.$u, '/Projects/download/' . $support['Project']['file3'], array('class'=>'no-ajaxify'),null, false);      
    }
    
    
    $u++;
    echo "<br>";
    }
    //debug($support['ProjectFile']);
    if(!empty($support['Project']['ProjectFile'])){
        foreach($support['Project']['ProjectFile'] as $value){
           // echo $this->Html->link('Attachment-'.$u, '/Projects/download/' . $value['filename'], array('class'=>'no-ajaxify'),null, false); 
            
              if (!empty($value['org_filename'])) {
                echo $this->Html->link($value['org_filename'], '/Projects/download/' . $value['filename'], array('class' => 'no-ajaxify'), null, false);
            } else {
                echo $this->Html->link('Attachment-' . $u, '/Projects/download/' . $value['filename'], array('class' => 'no-ajaxify'), null, false);
            }
            
            echo "<br>";
            $u++;
        }
    }
    
    
    
    ?>
</td>
<!--<td><?php //echo $this->Html->link('Close Ticket', 'admindelete/' . $support['Support']['id'], array('class'=>'no-ajaxify'), 'Are you sure you want to close this support ticket?', false); ?>&nbsp;</a>
</td>-->

</tr>
</tbody>
<?php } ?>
</table>

</div>       

<style type="text/css">
.col-md-3 {
    width: 33.33%;
}


.modal-dialog {
    width: 1000px;
}

</style>


<script>

$script.ready('bundle', function() {
    
    
     setInterval(function() {
                  window.location.reload();
                }, 300000); 
                
                
                $(".closed_status").on('click',function(e){
	e.preventDefault();
        var sid=$(this).attr('id');
        //    alert(dealer_id);
        //    die;
        $.ajax({
            type: "GET",
            cache: false,
            url: '/supports/closed_status/'+sid,
            success: function(data){
                
                bootbox.dialog({
                    message: data,
                    title: "<b>Histories</b>"
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
			url: "/supports/send/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Response for Support-Ticket.",
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
			url: "/Devteamdaily/add_todo/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add New To-do."
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
        
        ///on click pop-up for file upload project
                $(".file_upload" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                 var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/projects/file_upload/"+id+'/s',
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "File Upload."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");
        
        $('#supportsSelectDate').bdatepicker({
                });
                
                $("#supportsSelectDate").change(function(event){
                    $('#supportsAdminindexForm').submit();	
                });
                
$("#supports_month").change(function(event){
    if($(this).val()!=''){
			location.href = "<?php echo $this->Html->url(array('controller'=>'supports','action'=>'adminindex')); ?>/"+$(this).val();
                        }
                        
		});
                

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 