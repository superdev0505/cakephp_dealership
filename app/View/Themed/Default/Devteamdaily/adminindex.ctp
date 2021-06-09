<br />
<br />
<br />
<div class="innerLR">
<div class="separator-h"></div>
		 <?php echo $this->Session->flash('flash', array('element' => 'alertsuccess')); ?> 
<!-- col-table -->
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
                           <?php echo $this->Form->create('devteamdaily', array('url' => array('controller' => 'devteamdaily','action' => 'adminindex',$pid), 'class' => 'form-inline apply-nolazy')); ?>
		<i class="fa fa-bar-chart-o"></i> Select Date:
		&nbsp;
                 <?php echo $this->Form->input('select_date', array('type' => 'text','style'=>'width:150px;', 'class' => 'form-control chngvalue')); ?>
                &nbsp; &nbsp;
                Month:
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
                &nbsp; &nbsp;
                Devteam:
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
<!--                                <li><span class="heading strong-text-white "><i class="fa fa-tasks fa-2x"></i>&nbsp;</span></li>-->
                                <li><a href="/devteamdaily/add/<?php echo $pid;?>"><i class="fa fa-tasks" style="font-size:20px;"></i>&nbsp;<b>Add New To-do</b></a><span class="divider"></span></li>

<li><a href="/projects/adminindex"><i class="fa fa-medkit"  style="font-size:20px;"></i>&nbsp;<b>View Project List</b></a>  <span class="divider"></span></li>
<li><a href="/projects/close"><i class="fa fa-check-circle"  style="font-size:20px;"></i>&nbsp;<b>View Closed Project list</b></a>  <span class="divider"></span></li>
                            
                            </ul>  
                            
                            <div class="page-content">
                                <div id="notify-container">
                                                                    </div>
                                
<!--<div class="panel panel-default bg-primary">
    <div class="panel-heading">-->

        <div class="pull-left" style="padding-top:15px;">
            <span> <h3 class="panel-title">
                    &nbsp;<b>Project Name: </b><?php echo $pinfo['Project']['name']; ?>
                    <br>
                    <br>
                    &nbsp;<b>Total To-do List:</b> <?php echo count($supports); ?>
                                      
                    
                </h3></span>
        </div>
<br>
<br>
<br>
<br>

<div class="widget">
<div class="row row-merge margin-none ">

							<div class="col-md-3">
								<div class="innerAll text-center statbox" style="color:#4193d0;"> 
<!--									<a href="#">-->
									<span class="text-medium strong" id="PENDING"><?php echo $pendings; ?></span><br/>
									PENDING To-do List
<!--									</a> -->
								</div>
							</div>
							<div class="col-md-3">
								<div class="innerAll text-center statbox" style="color:#4193d0;">
<!--									<a href="#">-->
										<span class="text-medium strong" id="PENDING_u">
                                                                                    <?php
                                                                                    echo count($cal_responsetime);
                                                                                    
                                                                                    ?>
                                                                                </span><br/>
										CLOSED To-do List
<!--									</a>-->
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
<!--        <div class="pull-right">
            
        <div class="clearfix"> </div>
    </div>-->
    <div class="panel-body1">
        
        <div class="table-responsive">
        <div id="Campaign-grid" class="grid-view">

<table class="table table-bordered table-hover table-striped">
<thead  class="bg-primary">
<tr>
<th id="Campaign-grid_c0">Severity</th>
<th id="Campaign-grid_c0">Name</th>
<th id="Campaign-grid_c3">Email</th>
<th id="Campaign-grid_c3">To-do Name</th>
<th id="Campaign-grid_c3">To-do Description</th>
<th id="Campaign-grid_c3">Date / Time</th>
<th id="Campaign-grid_c3">Email Developer</th>
<th id="Campaign-grid_c3">To-do Status</th>
<!--<th id="Campaign-grid_c3">Close Ticket</th>-->
</tr>
</thead>
<tbody>
<tr class="odd">
<?php 



foreach($supports as $support){ ?>
<td>
     <?php
    if($support['DevteamDaily']['status']==1){
    ?>
    <i class="fa fa-fw fa-check" style="color: #8BBF61;"></i>
    <?php
    }
    ?>
    <?php echo $support['DevteamDaily']['sevarity'] ?>
<br>
 <?php
    if($support['DevteamDaily']['status']==1){
    ?>
    <a href="#" class="closed_status" id="<?php echo $support['DevteamDaily']['id']; ?>">Closed</a>
    <?php
    }
    ?>

  
  
</td>
<td><?php echo $support['Developer']['name']; ?> </td>
<td><?php echo $support['Developer']['email'] ?> </td>
<td><?php echo $support['DevteamDaily']['title'] ?> </td>
<td><?php 

//echo $support['DevteamDaily']['description'] 
echo nl2br($support['DevteamDaily']['description']);

?>


</td>
<td><?php echo $this->Time->format('m/d/Y g:i A', $support['DevteamDaily']['created']); ?></td>
<td>
  <a href="mailto:<?php echo $support['Developer']['email']; ?>">Click to Email</a>

</td>
<td>
<!--  <a href="mailto:<?php //echo $support['User']['email']; ?>">Click to Email</a>-->
    <a href="#" id="<?php echo $support['DevteamDaily']['id']; ?>" class="email_dealer" >Click to status</a>

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
</style>


<script>

$script.ready('bundle', function() {
    
    
//     setInterval(function() {
//                  window.location.reload();
//                }, 300000); 
                
                
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

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");
        
        $('#devteamdailySelectDate').bdatepicker({
                });
                
                $("#devteamdailySelectDate").change(function(event){
                    
                   $('#supports_month').val("");
                   $('#devteamdailyDeveloperId').val("");
                      if($(this).val()!=''){
                    $('#devteamdailyAdminindexForm').submit();	
                      }
                    
                });
                
                $("#devteamdailyDeveloperId").change(function(event){
                    
                    $('#supports_month').val("");
                    $('#devteamdailySelectDate').val("");
                     if($(this).val()!=''){
                    $('#devteamdailyAdminindexForm').submit();	
                     }
                });
                
$("#supports_month").change(function(event){
    
     $('#devteamdailyDeveloperId').val("");
     $('#devteamdailySelectDate').val("");
    if($(this).val()!=''){
			//location.href = "<?php //echo $this->Html->url(array('controller'=>'devteamdaily','action'=>'adminindex')); ?>/"+$(this).val();
                  $('#devteamdailyAdminindexForm').submit();	       
                    
                }
                        
		});
                

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 