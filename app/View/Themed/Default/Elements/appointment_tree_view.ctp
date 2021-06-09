<?php
function slot_duration($range,$end_time)
	{
		$booked_slot_array = array();
		$time = date('H:i:s',strtotime($end_time));
		$timestamp = strtotime($time);
		
		
		$time_slot = $range[0];
		if($timestamp >= end($range))
		{
			return $range;
		}else{
			for($i = 0; $i<count($range);$i++){
				if($timestamp >= $range[$i]){
				$booked_slot_array[]= $range[$i];
			}
			}
			return $booked_slot_array;
		}
	}
	
$booked_time_slots = array('time_slots' => array());	

	?>


                              <div class="widget-head">
                                        <div class="pull-left">
                                            <a href="javascript:void(0);" class=" heading strong add-new-appointmentrr" data-date="<?php echo $view_date; ?>"><i class="fa fa-fw text-primary fa-plus"></i> Appointments</a>
                                        </div>
                                        <div class="pull-right">
                                           <!-- <a href="#" class="text-primary strong"><i class="fa fa-arrow-left"></i></a> -->
                                            <span class="strong innerLR"><?php echo date('l, M d, Y',strtotime($view_date)) ?></span>
                                           <!-- <a href="#" class="text-primary strong"><i class="fa fa-arrow-right"></i></a>-->
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="widget-body padding-none">
                                        <ul class="list-unstyled timeline-appointments border-bottom bg-primary-light">
                                        <?php foreach($time_slot_array as $time){ ?>
                                            <li>
                                                <div class="time"><?php echo date('h:i',$time); ?>
                                                    <span class="text-primary"><?php echo date('a',$time); ?></span>
                                                </div>
                                                <i class="fa fa-dot-circle-o text-primary dot"></i>
                                                <div class="appointments">
                                                    <ul class="list-unstyled">
                                                    <?php if(!empty($slot_event_array[$time])){
														foreach($slot_event_array[$time] as $event){
														 $customer_name = ucfirst($event['ServiceEvent']['first_name'].' '.$event['ServiceEvent']['last_name']);
														 $b_slots =  slot_duration($time_slot_array ,$event['ServiceEvent']['end']);
														
														 $booked_time_slots['time_slots'] = array_merge($booked_time_slots['time_slots'], $b_slots); 
														
														 $booked_time_slots['customer'] = array('name' => $customer_name,'id' => $event['ServiceEvent']['id']);
														
														 
														 ?>
                                                        <li>
                                                            <div class="apt">
                                                             <?php /*?>   <div class="btn-group btn-group-xs pull-right">
                                                                    <a href="javascript:void(0);"  class="btn btn-default edit-appointment-slot" data-id ="<?php echo $event['ServiceEvent']['id']; ?>" data-name ="<?php echo $customer_name; ?>"><i class="fa fa-edit"></i></a>
                                                                    <a href="javascript:void(0);" class="btn btn-default delete-appointment-slot" data-id ="<?php echo $event['ServiceEvent']['id']; ?>"><i class="fa fa-times"></i></a>
                                                                </div><?php */?>
                                                                <a href="" class="text-regular strong"><i class="fa fa-fw fa-wrench"></i> <?php echo ucfirst($tech_users[$event['ServiceEvent']['user_id']]); ?></a> &nbsp;
                                                                <a href="" class="text-regular strong"><i class="fa fa-fw fa-user"></i> <?php echo $customer_name; ?></a> <i class="text-faded fa fa-ellipsis-h"></i><strong><i class="fa fa-clock-o"></i> <?php echo date('H:i a',strtotime($event['ServiceEvent']['start'])) ?> - <i class="fa fa-clock-o"></i> <?php echo date('h:i a',strtotime($event['ServiceEvent']['end'])) ?></strong>
                                                                <i class="text-faded fa fa-ellipsis-h"></i><?php echo $event['ServiceEvent']['title']; ?>
                                                                <i class="text-faded fa fa-tag"></i> 
                                                                <span class="label label-inverse"><?php echo $event['ServiceEventStatus']['name']; ?></span>
                                                            </div>
                                                        </li>
                                                        
                                                        <?php }} elseif(in_array($time,$booked_time_slots['time_slots'])){ ?>
                                                       <li>
                                                            <div class="apt">
                                                                <!--<div class="btn-group btn-group-xs pull-right">
                                                                    <a href="" class="btn btn-inverse"><i class="fa fa-plus"></i></a>
                                                                </div>-->
                                                                <span class="strong">Booked For Customer <span class="label label-inverse"><i class="fa fa-fw fa-user"></i>      <?php echo $booked_time_slots['customer']['name']; ?></span>
                                                                    </span>
                                                            </div>
                                                        </li>
														<?php }else{ ?>
                                                        <li>
                                                            <div class="apt">
                                                                <div class="btn-group btn-group-xs pull-right">
                                                                    <a href="" class="btn btn-inverse add_appointment_slot" data-user = "<?php echo $user_id; ?>" data-date = '<?php echo date('m/d/Y',strtotime($view_date)); ?>' data-time ="<?php echo date('h:i A',$time); ?>" ><i class="fa fa-plus"></i></a>
                                                                </div>
                                                                <span class="text-faded">
                                                                Empty Time Slot...
                                                                    </span>
                                                            </div>
                                                        </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </li>
                                           <?php } ?> 
                                            
                                            
                                            
                                            
                                            
                                        
                                           
                                        </ul>
                                    </div>
                                    <!-- // END widget-body -->
<span style="display:none;" id="hidden-total-count"><?php echo $total_events ?></span>                             <script type="text/javascript">
$(document).ready(function(){
	
// Add new Appointment code
$(".add_appointment_slot").on('click',function(e){
	e.preventDefault();
	$date = $(this).attr('data-date');
	$time = $(this).attr('data-time'); 
	$user_id = $(this).attr('data-user'); 
	$("#ServiceEventStartTime").val($time);
	$("#ServiceEventEndTime").val($time);
	$("#ServiceLeadUserId").val($user_id);
	$("#ServiceEventStartDate").val($date);
	$("#ServiceEventEndDate").val($date);
	update_chosen_value($("#ServiceJobId").val());
	$("div.excelWidth").find("button.bootbox-close-button").trigger('click');
	
	
	<?php /*?>url ='<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' =>'add')) ?>/start_date:'+	$date ;	
		$.ajax({
				type: "GET",
				cache: false,
				url:  url,
				success: function(data){					
					bootbox.dialog({
						message: data,
						//closeButton: true,
						title: 'Service Appointment',
						 buttons: {
							 "Cancel": {
							className: "btn-danger",
							callback: function() {
								bootbox.hideAll();
								//$('#calendar').fullCalendar('removeEvents','temporaryEvent');
								}
									},
								},
					});
				},
			}); <?php */?>
	});
 // Edit appointment
 $(".edit-appointment-slot").on('click',function(e){
	 	e.preventDefault();
		appt_id = $(this).attr('data-id');
		$customer = $(this).attr('data-name');
		edit_page = "<?php echo $this->Html->url(array('controller' =>'service_calendar','action' => 'edit','set_view' => 'edit2')); ?>/" + appt_id;
				$.ajax({
					type: "GET",
					cache: false,
					url:  edit_page,
					success: function(data){
						
						bootbox.dialog({
							message: data,
							title: "Edit - "+$customer ,
						});
					}
				});
	 });	
	 
	 $("a.delete-appointment-slot").on('click',function(e){
		e.preventDefault();
		if(confirm('Are you sure you want to delete this appintment?')){
		data_id = $(this).attr('data-id');
		$obj = $(this);
		// $(this).parent().parent().parent().qtip('destroy');
		 $.ajax({
			type : 'GET',
			url:'<?php echo $this->Html->url(array('controller' => 'ServiceCalendar','action' => 'delete_service_appointment','serviceapp' => true)); ?>/'+data_id,
			async:true,
			success: function(data){
					$obj.parent().parent().parent().remove();
					
					}
			});
		}
		
		});	
	
});

</script>