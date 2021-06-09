






				<!-- Table -->
				<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
					<!-- Table heading -->
					<thead>
						<tr>
							<th width='80'>History</th>
							<th>Sperson</th>
							<th>Step</th>
							<th>Status</th>
							<th>Details  or Vehicle</th>
							<th>Notes</th>
							<th style="width:150px;" >Date</th>
						</tr>
					</thead>
					<!-- // Table heading END -->
					<!-- Table body -->
					<tbody>
						<!-- Table row -->
						<?php foreach ($history as $entry) { ?>
						<tr class="text-primary">
							<td>

								<?php if($entry['History']['sales_step'] == 'Sold' && $entry['History']['status'] == 'Sold/Rolled'){ ?>
									<span style="display: inline;" class='history-icon  glyphicons usd'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Lead'){ ?>
									<span style="display: inline;" class='history-icon  glyphicons user'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Event'){ ?>
									<span style="display: inline;" class='history-icon glyphicons alarm'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'MMS'){ ?>
									<span style="display: inline;" class='history-icon glyphicons chat'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'BDC Survey'){ ?>
									<span style="display: inline;" class='history-icon glyphicons headset'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Deal'){ ?>
									<span style="display: inline;" class='history-icon glyphicons keys'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Note Update'){ ?>
									<span style="display: inline;" class='history-icon glyphicons notes_2'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Lead Arrived'){ ?>
									<span style="display: inline;" class='history-icon glyphicons cloud'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Staff Transfer'){ ?>
									<span style="display: inline;" class='history-icon glyphicons list'><i></i></span>
								<?php }else if($entry['History']['h_type'] == 'Email'){ ?>

									<?php if($entry['History']['sales_step'] == 'Email Open'){ ?>
										<span style="display: inline;" class='fa fa-envelope-o'><i></i></span>
										<span style="display: inline;" class='fa fa-user'><i></i></span>
									<?php }else{ ?>
										<span style="display: inline;" class='history-icon glyphicons envelope'><i></i></span>
									<?php } ?>


								<?php }else if($entry['History']['h_type'] == 'Lead Score'){ ?>
									<span style="display: inline;" class='history-icon glyphicons list'><i></i></span>
								<?php }else{ ?>
									<span style="display: inline;" class='history-icon glyphicons list'><i></i></span>
								<?php } ?>








								<div style="display: block; margin-top: 5px" ><?php echo $entry['History']['h_type']; ?>&nbsp;</div>

								<?php //echo $entry['History']['id']; ?>

							</td>
							<td><?php echo ($entry['History']['sperson'] != '')?  $entry['History']['sperson'] : "Please Transfer" ; ?>&nbsp;</td>
							<td><?php
								echo isset($sales_step_options[ $entry['History']['sales_step'] ]) ?
								 $sales_step_options[ $entry['History']['sales_step'] ] : $entry['History']['sales_step']  ;

							 ?>&nbsp;</td>
							<td><?php echo $entry['History']['status']; ?>&nbsp;</td>
							<td><?php
							if($entry['History']['h_type']=='Lead Score'&& !empty($entry['History']['event_id']))
							{
								echo $this->Html->link($entry['History']['cond'],array('controller'=>'contacts','action'=>'view_lead_score',$entry['History']['event_id']),array('class'=>'view_lead_score no-ajaxify'));
							}

							else
							{
							echo $entry['History']['cond'];
							}

							?>&nbsp;<?php echo $entry['History']['year']; ?>&nbsp;<?php echo $entry['History']['make']; ?>&nbsp;<?php echo $entry['History']['model']; ?>&nbsp;<?php echo $entry['History']['type']; ?></td>
							<td style="/* word-break: break-all; */ "><?php
							if($entry['History']['h_type']=='BDC Survey'&& !empty($entry['History']['event_id'])&&$entry['History']['status']=='contact' && !in_array($entry['History']['condition'],array('6','29','15')))
							{
								echo $this->Html->link("<i class='fa fa-fw icon-checkmark-thick'></i> ".$entry['History']['comment'],array('controller'=>'bdc_leads','action'=>'survey_response',$entry['History']['event_id']),array('class'=>'show_survey_response no-ajaxify','style'=>"text-decoration:underline",'escape'=>false));
							}

							else{
								echo $this->Text->truncate( strip_tags($entry['History']['comment']),200,array('html'=>true,
									'ellipsis'=>'<br><a href="javascript:" class="read_more_history_note_details" history_id = "'.$entry['History']['id'].'" >Read more</a>'));
							} ?>&nbsp;</td>
							<td><?php echo date('D - M d, Y g:i A', strtotime($entry['History']['created'])); ?>&nbsp;</td>
						</tr>
						<?php } ?>
						<!-- // Table row END -->
					</tbody>
					<!-- // Table body END -->
				</table>
				<!-- // Table END -->
