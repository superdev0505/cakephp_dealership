						<!-- Table -->
						<table class="table table-striped table-responsive swipe-horizontal table-condensed table-primary">
							<!-- Table heading -->
							<thead>
								<tr>
									<th style='background-color: #424242'>History</th>
									<th style='background-color: #424242'>Sperson</th>
									<th style='background-color: #424242'>Step</th>
									<th style='background-color: #424242'>Status</th>
									<th style='background-color: #424242'>Details  or Vehicle</th>
									<th style='background-color: #424242'>Notes</th>
									<th style="width:150px; background-color: #424242;" >Date
									<span style="float:right;"><a href="javascript:" class='close_history_table' onclick="hide_history_table(<?php echo $contact_id;?>)"   style="color:white;">( X )</a></span>
									</th>
								</tr>
							</thead>
							<!-- // Table heading END -->
							<!-- Table body -->
							<tbody>
								<!-- Table row -->
								<?php foreach ($histories as $entry) { ?>
								<tr class="text-primary">
									<td><?php echo $entry['History']['h_type']; ?>&nbsp;</td>
									<td><?php echo ($entry['History']['sperson'] != '')?  $entry['History']['sperson'] : "Please Transfer" ; ?>&nbsp;</td>
									<td><?php echo $entry['History']['sales_step']; ?>&nbsp;</td>
									<td><?php echo $entry['History']['status']; ?>&nbsp;</td>
									<td><?php echo $entry['History']['cond']; ?>&nbsp;<?php echo $entry['History']['year']; ?>&nbsp;<?php echo $entry['History']['make']; ?>&nbsp;<?php echo $entry['History']['model']; ?>&nbsp;<?php echo $entry['History']['type']; ?></td>
									<td style="word-break:break-all;">
									<?php 
									echo $entry['History']['comment']; 
									 ?>&nbsp;</td>
									<td><?php echo $entry['History']['modified']; ?>&nbsp;</td>
								</tr>
								<?php } ?>
								<!-- // Table row END -->
							</tbody>
							<!-- // Table body END -->
						</table>
						<!-- // Table END -->
						<script>
							function hide_history_table(contact_id){
								$('#history_'+contact_id).hide();
							}
						
						</script>
						
						