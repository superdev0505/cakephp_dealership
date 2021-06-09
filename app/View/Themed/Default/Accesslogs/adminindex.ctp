<br />
<br />
<br />
<div class="innerLR">
<div class="separator-h"></div>
		 <?php echo $this->Session->flash('flash', array('element' => 'alertsuccess')); ?> 
<!-- col-table -->
	<h4 class="innerAll margin-none border-bottom text-center bg-primary">
                           <?php echo $this->Form->create('supports', array('url' => array('controller' => 'accesslogs','action' => 'adminindex'), 'class' => 'form-inline apply-nolazy')); ?>
	  
<!--             <i class="fa fa-search"></i> Search By Field:-->
		
                 <?php echo $this->Form->input('fvalue', array('type' => 'text','style'=>'width:150px;', 'class' => 'form-control')); ?>
                &nbsp; &nbsp;
                               <?php
          //  $opt = array('ip' => 'IP', 'url' => 'URL','user_id' => 'User ID', 'dealer_id' => 'Dealer ID','sperson' => 'Sales Person', 'http_user_agent' => 'User Agent');
            $opt = array('ip' => 'IP','user_id' => 'User ID', 'dealer_id' => 'Dealer ID','sperson' => 'Sales Person');
            echo $this->Form->input('field', array('type' => 'select', 'options' => $opt, 'empty' => 'Select Field', 'label' => false, 'div' => false, 'class' => 'form-control'));
            ?>
                <button type="button" id="advance_search_filter" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Search</button>
            &nbsp; &nbsp;	
            
            <i class="fa fa-calendar"></i> Search By Date:
		&nbsp;
                 <?php echo $this->Form->input('select_date', array('type' => 'text','style'=>'width:150px;', 'class' => 'form-control chngvalue')); ?>
                 &nbsp; &nbsp;
                 <i class="fa fa-bar-chart-o"></i>
                <?php
            echo $this->Form->input('top_overall', array('type' => 'select', 'options' => $aluser, 'empty' => 'Top 5 (Overall)', 'label' => false, 'div' => false, 'class' => 'form-control'));
            ?>
              
                &nbsp; &nbsp;
                  <i class="fa fa-list"></i> 
                <?php
            echo $this->Form->input('top_today', array('type' => 'select', 'options' => $all_today, 'empty' => 'Top 5 (Today)', 'label' => false, 'div' => false, 'class' => 'form-control'));
            ?>
<!--                Month:-->
<?php
//
//if($month==''){
//    $month=date('m');
//}

?>                
<!--                <select id="supports_month" style="width: 175px; display: inline-block" class="form-control input-sm" name="data[stats_month][month]">
                    <option value="" <?php //if($month==''){ echo 'selected'; } ?> >Select</option>
<option value="01" <?php //if($month=='01'){ echo 'selected'; } ?> >January</option>
<option value="02" <?php //if($month=='02'){ echo 'selected'; } ?> >February</option>
<option value="03" <?php //if($month=='03'){ echo 'selected'; } ?> >March</option>
<option value="04" <?php //if($month=='04'){ echo 'selected'; } ?> >April</option>
<option value="05" <?php //if($month=='05'){ echo 'selected'; } ?> >May</option>
<option value="06" <?php //if($month=='06'){ echo 'selected'; } ?> >June</option>
<option value="07" <?php //if($month=='07'){ echo 'selected'; } ?> >July</option>
<option value="08" <?php //if($month=='08'){ echo 'selected'; } ?> >August</option>
<option value="09" <?php //if($month=='09'){ echo 'selected'; } ?> >September</option>
<option value="10" <?php //if($month=='10'){ echo 'selected'; } ?> >October</option>
<option value="11" <?php //if($month=='11'){ echo 'selected'; } ?> >November</option>
<option value="12" <?php //if($month=='12'){ echo 'selected'; } ?> >December</option>
</select>-->
	 <?php echo $this->Form->end(); ?>
              
	</h4>
	<div class="separator"></div>
<div class="row">
<div class="widget-body">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body1">
                            <div class="page-content">
                                <div id="notify-container">
                                 </div>

        <div class="pull-left" style="padding-top:15px;">
            <span> <h3 class="panel-title">
                   <b> &nbsp;Access Logs: <?php echo $total_supports; ?></b>
                </h3></span>
        </div>
<br>
<!--        <div class="pull-right">
            
        <div class="clearfix"> </div>
    </div>-->
<div class="panel-body1 pull-left">
    
    <div class="table-responsive">
        <div id="Campaign-grid" class="grid-view">
            
            <table class="table table-bordered table-hover table-striped">
                <thead  class="bg-primary">
                    <tr>
                        <th id="Campaign-grid_c0">User ID</th>
                        <th id="Campaign-grid_c1">Dealer ID</th>
                        <th id="Campaign-grid_c2">Sales Person</th>
                        <th id="Campaign-grid_c0">IP</th>
                        <th id="Campaign-grid_c3">URL</th>
                        <th id="Campaign-grid_c3">User Agent</th>
                        <th id="Campaign-grid_c3">Date / Time</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($supports as $support) { ?>
                    <tr>
                            <td><?php echo $support['AccessLog']['user_id'];  ?></td>
                            <td><?php echo $support['AccessLog']['dealer_id'];  ?> </td>
                            <td><?php echo $support['AccessLog']['sperson'];  ?> </td>
                            <td>
                            <?php
                          echo $support['AccessLog']['ip']; 
                                ?>
                            </td>
                            <td><?php echo $support['AccessLog']['url'];  ?></td>

                            <td><?php echo $support['AccessLog']['http_user_agent'];  ?> </td>
                            <td>
                                <?php echo $this->Time->format('d/m/Y g:i A', $support['AccessLog']['created']); ?>
                            </td>
                            
                        </tr>
<?php } ?>
                    </tbody>
            </table>
            <br />
<div class="paging">
	<ul class="pagination margin-none">
		<?php 
                if(empty($today)){
                if(!empty($fld) && !empty($flv)){
                $this->Paginator->options(array('url' => array($fld, $flv))); 
                }
                }else{
                    $this->Paginator->options(array('url' => array($fld, $flv,$today))); 
                }
                
                echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?> <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?> <?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
	</ul>
</div>    
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

.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
</style>


<script>

$script.ready('bundle', function() {
    
    
//     setInterval(function() {
//                  window.location.reload();
//                }, 300000); 
                
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){ 
	<?php  } ?>	

	$(".alert").delay(3000).fadeOut("slow");
        
        $('#supportsSelectDate').bdatepicker({
                });
                
    $("#advance_search_filter").click(function(event){
                    $('#supportsSelectDate').val("");
                    if($('#supportsField').val()!='' && $('#supportsFvalue').val()!=''){
                    $('#supportsAdminindexForm').submit();	
                }
                    
                });
                
                $("#supportsSelectDate").change(function(event){
                    $('#supportsField').val("");
                    $('#supportsFvalue').val("");
                    $('#supportsAdminindexForm').submit();	
                });
                
$("#supportsTopOverall").change(function(event){
    
        if($(this).val()!=''){
            var myString =$("#supportsTopOverall option:selected").text();
            var arr = myString.split('#');
            if(arr[0]=='User ID'){
                var fid='user_id';
            }else{
                var fid='dealer_id';
            }
        //return false;
location.href = "<?php echo $this->Html->url(array('controller'=>'accesslogs','action'=>'adminindex')); ?>/"+fid+"/"+$(this).val();
                        }
                        
		});
                
               
$("#supportsTopToday").change(function(event){
    if($(this).val()!=''){
            var myString =$("#supportsTopToday option:selected").text();
            var arr = myString.split('#');
            if(arr[0]=='User ID'){
                var fid='user_id';
            }else{
                var fid='dealer_id';
            }
        //return false;
location.href = "<?php echo $this->Html->url(array('controller'=>'accesslogs','action'=>'adminindex')); ?>/"+fid+"/"+$(this).val()+"/today";
                        }
                        
		});
                

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	}); 
	<?php  } ?>	
	
});

</script>
	 