
<div class="innerLR">
                <div class="row">
                    <!-- col -->
                    <div class="col-sm-12">
                        <!-- row -->
                        <div class="row ">
                            <!-- col -->
                            <div class="col-md-8 col-lg-9">
                               <!-- <div class="innerB">
                                    <input type="text" class="form-control" placeholder="Search appointments ...">
                                </div>-->
                                <div class="widget widget-body-white" id="appointment-tree-view">
                                    
                                    <?php echo $this->element('appointment_tree_view'); ?>
                                    <!-- // END widget-body -->
                                </div>
                                <!-- // END widget-->
                            </div>
                            <!-- // END col -->
                            <!-- col -->
                            <div class="col-md-4 col-lg-3">
                                <div class="widget widget-body-white	">
                                    <div class="widget-body text-center ">
                                        <div class="innerAll">
                                            <div class="strong">Total appointments</div>
                                            <div class="text-large text-primary" id="total_appointment_count"><?php echo $total_events ?></div>
                                          <!--  <div class="innerT">
                                                <a href="" class="btn btn-inverse btn-lg">Cancel</a>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="widget-footer  text-center">
                                        
                                    </div>
                                </div>
                                <div class="widget">
                                    <div id="appointment-datepicker-inline"></div>
                                </div>
                            </div>
                            <!-- // END col -->
                        </div>
                        <!-- // END row -->
                    </div>
                    <!-- // END col -->
                </div>
                <!-- // END Row -->
            </div>
<script>
function update_view($date){
	$.ajax({
			type:'GET',
			url:'<?php echo $this->Html->url(array('controller'=>'ServiceCalendar','action' =>'appointment_view')); ?>/'+$date,
			success: function(data){
				$("#appointment-tree-view").html(data);
				hidden_count=$("#hidden-total-count").text();
				$("#total_appointment_count").text(hidden_count);
			}
		});
}
$script.ready('bundle', function() {
if (typeof $.fn.bdatepicker == 'undefined')
	$.fn.bdatepicker = $.fn.datepicker.noConflict();
	$('#appointment-datepicker-inline').bdatepicker({ inline: true, showOtherMonths:true}).on('changeDate', function(selected){
		startDate = new Date(selected.date.valueOf());
		day = startDate.getDate();
		month = startDate.getMonth()+1;
		year = startDate.getFullYear();
		new_date = year+'-'+month+'-'+day;
		update_view(new_date);
		});
	
	});
	startDate = new Date('<?php echo $view_date; ?>');
	console.log(startDate);
	setTimeout(function(){$('#appointment-datepicker-inline').bdatepicker('update','<?php echo date('m/d/Y',strtotime($view_date)); ?>');
},500);</script>            