<style>
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}

</style>
<?php
function format_phone($phone){
    $phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
    return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
}
?>


                        <!-- Total bookings & sort by options -->
                       <div class="separator bottom">
                            Total Appointements: <?php echo $service_leads_count; ?>
                            <span class="pull-right">
                                <label class="strong">Show :</label>
                                <?php echo $this->Form->input('lead_limit',array('value'=>$limit,'div'=>false,'label'=>false,'type'=>'select','options'=>array(20=>20,50=>50,100=>100,200=>200,'all'=>'All'))); ?>&nbsp;Records
                            </span>
                            <div class="clearfix"></div>
                        </div>
                        <!-- // Total bookings & sort by options END -->
                        <!-- Table -->
                        <table class="table table-condensed table-striped table-primary table-vertical-center checkboxs">
                            <thead>
                                <tr>

                                    <th class="center">Id#</th>

                                    <th width="10%">Client</th>
                                    <th width="10%">Phone</th>
                                    <th class="center" width="20%">Vehicle</th>
                                    <th class="center" width="5%">Bay</th>
                                    <th class="center" width="5%">Tech</th>
                                     <th class="center" width="5%">Tech2</th>
                                    <th class="center" width="5%">Service Type</th>
                                     <th class="center" width="10%">Service Status</th>
                                      <th class="center" width="10%">Start</th>
                                       <th class="center" width="10%">End</th>
                                        <th class="center" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($service_leads as $s_leads){ ?>
                                <!-- Item -->
                                <tr class="selectable">

                                    <td class="center"><?php echo $s_leads['ServiceLead']['id'];  ?></td>
                                   <td>
                                        <strong><?php echo $s_leads['ServiceLead']['first_name'];  ?> <?php echo $s_leads['ServiceLead']['last_name'];  ?></strong>
                                        <br/>
                                        <small>Location: <?php echo $s_leads['ServiceLead']['city'];  ?></small>
                                    </td>
                                    <td>
                                        <strong>Mobile:</strong> <?php echo $s_leads['ServiceLead']['mobile']; ?><br/>
                                        <strong>Home:</strong> <?php echo $s_leads['ServiceLead']['phone']; ?><br/>
                                        <strong>Work:</strong> <?php echo $s_leads['ServiceLead']['work_number']; ?><br/>
                                    <td class="center"><?php echo $s_leads['ServiceLead']['condition']; ?> &nbsp; <?php echo $s_leads['ServiceLead']['year']; ?>  &nbsp;<?php echo $s_leads['ServiceLead']['make']; ?> &nbsp;<?php echo $s_leads['ServiceLead']['model']; ?>
			<?php echo $contact['Contact']['type']; ?></span></td>
                                    <td class="center"><?php echo $service_bays[$s_leads['ServiceEvent']['bay_id']] ;?></td>
                                    <td class="center">tech1</td>
                                    <td class="center">tech2</td>
                                     <td class="center"><?php
									$all_event_types = explode(',',$s_leads['ServiceEvent']['event_type_id']);
									foreach($all_event_types  as $etype){
										echo $service_types[$etype].'<br />';
										}
									  ?></td>
                                    <td class="center"><?php echo $service_statuses[$s_leads['ServiceEvent']['service_status_id']] ;?></td>
                                    <td class="center"><?php echo date('d/m/Y',strtotime($s_leads['ServiceEvent']['start']));
									echo '<br />'.date('g:i A',strtotime($s_leads['ServiceEvent']['start']));
									 ?></td>
                                    <td class="center"><?php echo date('d/m/Y',strtotime($s_leads['ServiceEvent']['end']));
									echo '<br />'.date('g:i A',strtotime($s_leads['ServiceEvent']['end']));

									 ?></td>
                                    <td class="center">
                                        <div class="btn-group btn-group-sm">
                                            <?php /*?><a href="#" class="btn btn-default"><i class="fa fa-eye"></i></a><?php */?>
                                            <div class="btn-group pull-right" >

					<a class="btn  btn-primary dropdown-toggle" data-toggle="dropdown">
						Actions
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu pull-right" style="text-align:left">
                                            <li><a href="#" class="editEvent no-ajaxify" data-id="<?php echo $s_leads['ServiceEvent']['id'];?> "><i class="fa fa-pencil"></i> Edit</a></li>
                                            <li>
							<a  href="<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'status_update', $s_leads['ServiceLead']['id'], '?'=> array('update_type'=>'text status') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Text Status Update</a>
						</li>
                                             <li><a  href="<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'status_update',$s_leads['ServiceLead']['id'], '?'=> array('update_type'=>'Email Update (All)') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Email Update (All)</a></li>
                                             <li><a  href="<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'status_update', $s_leads['ServiceLead']['id'], '?'=> array('update_type'=>'Outbound Call Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i>Service Outbound Update</a></li>
                                               <li><a  href="<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'status_update', $s_leads['ServiceLead']['id'], '?'=> array('update_type'=>'Inbound Call Update') )); ?>" class="no-ajaxify status_note_update" ><i class="fa fa-pencil"></i> Servcie Inbound Update</a></li>
                                              <?php /*?> <li><a href="#" class="editEvent no-ajaxify" data-id="<?php echo $s_leads['ServiceEvent']['id'];?> "><i class="fa fa-pencil"></i> Step Update</a></li><?php */?>
                                            </ul></div><br /><br />
                                            <a href="#" class="btn btn-inverse showHistory no-ajaxify" data-id="<?php echo $s_leads['ServiceLead']['id'];?>" style="font-size: 16px;line-height: 2;padding: 1px 17px;">History</a>
                                            <?php /*?><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a><?php */?>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="display:none;" id="Lead_<?php echo $s_leads['ServiceLead']['id']; ?>">
                                <td colspan="11">
                                <div class="row">
					<div class="col-md-12">
                                <table class="table table-striped table-responsive swipe-horizontal table-condensed" >
														<!-- Table heading -->
														<thead >
															<tr>
																<th style="color:#000 !important">Event Type</th>
																<th style="color:#000 !important"> Event Status</th>
																<th style="color:#000 !important">Event Title</th>
																<th style="color:#000 !important">Schedule</th>
																<th style="color:#000 !important">Date<span style="float:right;"><a href="javascript:void();" onclick="$('#Lead_<?php echo $s_leads['ServiceLead']['id'];?>').hide();" style="color:#000;">( X )</a></span></th>
															</tr>
														</thead>
														<!-- // Table heading END -->
														<!-- Table body -->
														<tbody>
															<!-- Table row -->
															<?php foreach ($s_leads['ServiceHistory'] as $entry) { ?>
															<tr class="gradeA">
																<td><?php echo $entry['make']; ?>&nbsp;</td>
																<td><?php echo  $event_statuses[$entry['ServiceHistory']['status']]; ?>&nbsp;</td>
																<td><?php echo $entry['notes']; ?>&nbsp;</td>
																<td>
																	<?php echo date("m/d/Y g:i A",strtotime($entry['start_date'])); ?> -
																	<?php echo date("m/d/Y g:i A",strtotime($entry['end_date'])); ?>
																</td>
																<td><?php echo ($entry['created']!='')?  $this->Time->format('n/j/Y g:i A', $entry['created'])   : "" ?>&nbsp;</td>
															</tr>
															<?php } ?>
															<!-- // Table row END -->
														</tbody>
														<!-- // Table body END -->
													</table>
                                                    </div>
                                                    </div>
                                                    </td>
                                </tr>
                                <?php } ?>

                                <!-- // Item END -->

                            </tbody>
                        </table>
                        <!-- // Table END -->
                        <!-- With selected actions -->

                        <!-- // With selected actions END -->
                        <!-- Pagination -->

                        <div class="clearfix"></div>
                        <!-- // Pagination END -->



<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>



		$(".editEvent").on('click',function(e){
			e.preventDefault();
			data_id=$(this).attr('data-id');
			edit_page = "<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'edit')); ?>/"+data_id;

			$.ajax({
				type: "GET",
				cache: false,
				url:  edit_page,
				success: function(data){
					bootbox.dialog({
						message: data,
						title: "Edit Event",
					});
				}
			});

			});

			$(".showHistory").on('click',function(e){
				e.preventDefault();
				data_id=$(this).attr('data-id');
				$("#Lead_"+data_id).slideToggle();
				});

	$("#lead_limit").on('change',function(){
				val=$(this).val();
				form_data=$("#LeadSearchForm").serialize();
		url='<?php echo $this->Html->url(array('controller'=>'service_calendar','action'=>'search')); ?>/'+val;
		$.ajax({
				type: "POST",

				url:  url,
				data:form_data,
				success: function(data){
					$("#LoadSearchResult").html(data);
				}
			});
				});

	$(".status_note_update").click(function(event){
		event.preventDefault();
		$.ajax({
					type: "GET",
					cache: false,
					url: $(this).attr('href'),
					success: function(data){
						bootbox.dialog({
							message: data,
							title: "Update lead",
						}).find("div.modal-dialog").addClass("largeWidth3");
					}
				});

	});

<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>
});
</script>
