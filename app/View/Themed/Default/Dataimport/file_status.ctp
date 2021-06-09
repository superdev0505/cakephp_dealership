<br />
<br />
<br /><br />

<div class="widget widget-body-white widget-heading-simple">
    <div class="widget-body">
        <!-- Search result-->
        <div id="trim_search_result">
            <br>
            <div id="report_data_container">
                <h4>Data Import Status:</h4>
            </div>
            <table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
                <thead class="success">
                    <tr>
                        <th>ID</th>
                        <th>File Name</th>
                        <th>Data Imported</th>
                        <th>Data Clean Mapping</th>
                        <th>Completed</th>
                    </tr>	
                </thead>
                <tbody>
                    <?php
                    foreach ($vals as $value) {

//              echo '<pre>';
//              print_r($activeVendors[$value['DealerName']['dealer_id']]);
                        ?>
                        <tr>
                            <td><?php
                    echo $value['Fileimportstatus']['id'];
                        ?></td>
                            <td>
                                <?php
                    echo $value['Fileimportstatus']['filename'];
                        ?></td>
                             <td>
                        <?php
                                 if ($value['Fileimportstatus']['status'] == 1) {
                                     echo 'Yes';
                                     echo '<br><br>';
                                     echo '<b>Tmp_Table Name:</b> ' . $value['Fileimportstatus']['tmptable_name'];
                                 } else {
                                     echo 'No';
                                     echo '<br><br>';
                                     if ($value['Fileimportstatus']['tablestatus'] == 1) {
                                         ?>
                                         <button class="btn btn-primary btn-xs command1" id="<?= $value['Fileimportstatus']['id'] ?>"><i class="fa fa-refresh"></i> Data-Import-Command</button>
                                         <?php
                                     } else {
                                         ?>
                                         <button class="btn btn-primary btn-xs tablecreat" id="<?= $value['Fileimportstatus']['id'] ?>"><i class="fa fa-refresh"></i> Create-Table-Command</button>
                                         <?php
                                     }
                                 }
                                 ?>
                            </td>
                            <td><?php
                            
                            if(!empty($value['Datamapping']['id'])){
                                echo 'Yes';
                                echo '<br>';
                                echo '<br>';
                                if($value['Datamapping']['dealer_status']!='1'){
                                 echo '<button class="btn btn-primary btn-xs command2" id="'.$value['Datamapping']['id'].'"><i class="fa fa-refresh"></i> Data-Clean-Command</button>';
                                }
                            }else{
                                echo 'No';
                   if($value['Fileimportstatus']['status']==1){
                                ?>
                             
                                <br><br>
                                <a href="<?php echo $this->Html->url(array('controller'=>'Dataimport','action'=>'data_clean',$value['Fileimportstatus']['id'])); ?>"><span>Click here to Data Clean Mapping</span></a>
                            <?php
                            }
                                }
 
                            ?></td>
                            <td>
                                <?php
                           if(!empty($value['Datamapping']['id'])) {
                                        if ($value['Datamapping']['finalstage_flag']==1) {
                                            echo 'Yes';
                                            echo '<br>';
                                            echo '<br>';
                                            echo '<b>Final Message: </b>'.$value['Datamapping']['final_message'];
                                        } else {
                                            echo 'No';
                                            if($value['Datamapping']['final_message']!=''){
                                            echo '<br>';
                                            echo '<br>';
                                            echo '<b>Final Message: </b>'.$value['Datamapping']['final_message'];
                                            }
                                        }
                                    } else {
                                        echo 'No';
                                    }
                                       ?>
                            </td>
                           
                        </tr>
                                <?php
                            }
                            ?>    

                </tbody>
            </table>

            <!-- // Table END -->
            <br>
        </div>
        <!-- //Search result End-->
    </div>
</div>

<script type="text/javascript">
$(function(){
   
	$(".command1").click(function(){
		$(".command1").attr("disabled", true);
                //alert($(this).attr('id'));
                
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/handler/dataimport/"+$(this).attr('id'),
                        beforeSend: function(){
                            //$("#command1").attr("disabled", false);
                            //var message_apt_show = '<pre>'+data+'</pre>';
                            bootbox.dialog({
                                closeButton: false,
                                message: '<b>Data Loading...Please wait...</b>',
                                backdrop: true,
                                title: "data-import-Command",
                            }).find("div.modal-dialog").addClass("largeWidth");
                            //window.setTimeout('location.reload()', 4000);
                        },
			success: function(data){
				//$("#command1").attr("disabled", false);
                                bootbox.hideAll();
				  if(data.search('Import Success.') != -1){
                                        var message_apt_show = 'Import Success.';
                                    }else{
                                        var message_apt_show = '<pre>'+data+'</pre>';
                                    }
			
				bootbox.dialog({
                                        //closeButton: false,
					message: message_apt_show,
					backdrop: true,
					title: "data-import-Command",
				}).find("div.modal-dialog").addClass("largeWidth");
                                //window.setTimeout('location.reload()', 4000);
			},
                        error: function(data) {
                            bootbox.hideAll();
                            var message_apt_show = '<pre>'+data.status+'</pre>';
				bootbox.dialog({
                                        //closeButton: false,
					message: message_apt_show,
					backdrop: true,
					title: "data-import-Command",
				}).find("div.modal-dialog").addClass("largeWidth");
                        }
		});

	});
        
     
     $(".tablecreat").click(function(){
		$(".tablecreat").attr("disabled", true);
                //alert($(this).attr('id'));
                
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/handler/createtable/"+$(this).attr('id'),
                        beforeSend: function(){
                            //$("#command1").attr("disabled", false);
                            //var message_apt_show = '<pre>'+data+'</pre>';
                            bootbox.dialog({
                                closeButton: false,
                                message: '<b>A Temporary table is creating...Please wait...</b>',
                                backdrop: true,
                                title: "Create Table",
                            }).find("div.modal-dialog").addClass("largeWidth");
                            //window.setTimeout('location.reload()', 4000);
                        },
			success: function(data){
				//$("#command1").attr("disabled", false);
                                bootbox.hideAll();

                                    if(data.search('Table created successfully.') != -1){
                                        var message_apt_show = 'Table created successfully.';
                                    }else{
                                        var message_apt_show = '<pre>'+data+'</pre>';
                                    }
			
                                
				bootbox.dialog({
                                        //closeButton: false,
					message: message_apt_show,
					backdrop: true,
					 title: "Create Table",
				}).find("div.modal-dialog").addClass("largeWidth");
                                //window.setTimeout('location.reload()', 4000);
			},
                        error: function(data) {
                            bootbox.hideAll();
                            var message_apt_show = '<pre>'+data.status+'</pre>';
				bootbox.dialog({
                                        //closeButton: false,
					message: message_apt_show,
					backdrop: true,
					 title: "Create Table",
				}).find("div.modal-dialog").addClass("largeWidth");
                        }
		});

	});
     
     
     
     $(".command2").click(function(){
	$(".command2").attr("disabled", true);
            bootbox.dialog({
            closeButton: false,
            message: '<b>Data Cleaning...Please wait...</b>',
            backdrop: true,
            title: "Data-Clean-Command",
        }).find("div.modal-dialog").addClass("largeWidth");
		$.ajax({
			type: "GET",
			cache: false,
			url: "/devs/call_update_request/handler/dataclean/"+$(this).attr('id'),
			success: function(data){
				//$("#command1").attr("disabled", false);
                                bootbox.hideAll();
				var message_apt_show = '<pre>'+data+'</pre>';
				bootbox.dialog({
                                        //closeButton: false,
					message: message_apt_show,
					backdrop: true,
					title: "Data-Clean-Command",
				}).find("div.modal-dialog").addClass("largeWidth");
                               // window.setTimeout('location.reload()', 4000);
			},
                        error: function(data) {
                            bootbox.hideAll();
                            var message_apt_show = '<pre>'+data.status+'</pre>';
				bootbox.dialog({
                                        //closeButton: false,
					message: message_apt_show,
					backdrop: true,
					title: "Data-Clean-Command",
				}).find("div.modal-dialog").addClass("largeWidth");
                        }
		});

	});
        
        

});
</script>