<br />
<br />
<br />
<div class="innerLR">
<div class="separator-h"></div>
		 <?php echo $this->Session->flash('flash', array('element' => 'alertsuccess')); ?> 
<!-- col-table -->
	<div class="separator"></div>
<div class="row">
<div class="widget-body">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body1">
                            
                            <ul class="breadcrumb">
                                
<!--                                <li><span class="heading strong-text-white "><i class="fa fa-medkit fa-2x"></i>&nbsp;</span></li>-->
                                
<li><a href="#" class="add_dev"><i class="fa fa-group" style="font-size:20px;"></i>&nbsp;<b>Add New Developer</b></a><span class="divider"></span></li>

<li><a href="/projects/adminindex"><i class="fa fa-medkit"  style="font-size:20px;"></i>&nbsp;<b>View Project list</b></a>  <span class="divider"></span></li>
                            
<li><a href="/projects/close"><i class="fa fa-check-circle"  style="font-size:20px;"></i>&nbsp;<b>View Closed Project list</b></a>  <span class="divider"></span></li>
                            
                            </ul>  
                            
                            <div class="page-content">
                                <div id="notify-container">
                                                                    </div>
                                
<!--<div class="panel panel-default bg-primary">
    <div class="panel-heading">-->

        <div class="pull-left" style="padding-top:15px;">
            <span> <h3 class="panel-title">
                    &nbsp;Devteam:
                                      
                    
                </h3></span>
        </div>
<br>
<br>
<!--    <div class="panel-body pull-left">-->
    <div class="panel-body1">
        
        <div class="table-responsive">
        <div id="Campaign-grid" class="grid-view">

<table class="table table-bordered table-hover table-striped">
<thead  class="bg-primary">
<tr>
<th id="Campaign-grid_c0">ID#</th>
<th id="Campaign-grid_c0">Name</th>
<th id="Campaign-grid_c3">Email</th>
<th id="Campaign-grid_c3">Status</th>
<th id="Campaign-grid_c3">Edit</th>
<th id="Campaign-grid_c3">Active/Inactive</th>
<!--<th id="Campaign-grid_c3">Close Ticket</th>-->
</tr>
</thead>
<tbody>
<tr class="odd">
<?php 



foreach($developers as $developer){ ?>
<td>
  <?php 
  echo $developer['Developer']['id'];
  ?>  
</td>
<td><?php 
  echo $developer['Developer']['name'];
  ?>   </td>
<td><?php 
  echo $developer['Developer']['email'];
  ?>  </td>
<td><?php 
if($developer['Developer']['status']==1)
  echo 'Active';
else
    echo 'Inactive';
  ?>  </td>
<td><?php echo $this->Html->link('Edit', '#', array('class'=>'edit_dev','id'=>$developer['Developer']['id'])); ?>&nbsp;</a>
<td><?php echo $this->Html->link('Active/Inactive', 'admindelete/' . $developer['Developer']['id'], array('class'=>'no-ajaxify'), 'Are you sure you?', false); ?>&nbsp;</a>
</td>

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
    
    
      ///on click pop-up 
                $(".add_dev" ).click(function(event){
                    
              //  alert( $(this).attr('id') );
                 //var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/developers/add",
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Add New Developer."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
	});   
     ///on click pop-up for edit project
                $(".edit_dev").click(function(event){
                    
              //  alert( $(this).attr('id') );
                 var id=$(this).attr('id');
                
		event.preventDefault();
		$.ajax({
			type: "GET",
			cache: false,
			url: "/developers/edit/"+id,
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Update Developer."
				}).find("div.modal-dialog").addClass("largeWidth");
			}
		});
		
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
	 