<?php
$zone = AuthComponent::user('zone');
//echo $zone;
?>
<?php
$step_procces = AuthComponent::user('step_procces');
//echo $step_procces;
?>

<?php
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');

//echo $uname;
?>

<?php
if ($step_procces === "lemco_steps") {
    $options = array('Meet' => 'Meet-Step 1', 'Greet' => 'Greet-Step 2', 'Probe' => 'Probe-Step 3', 'Sit On' => 'Sit On-Step 4', 'Sit Down' => 'Sit Down-Step 5', 'Write Up' => 'Write Up-Step 6', 'Close' => 'Close-Step 7', 'F/I' => 'F/I-Step 8', 'Sold' => 'Sold-Step 9');
} else {
    $options = array('Connect' => 'Connect', 'Understand' => 'Understand', 'Satisfy' => 'Satisfy', 'Trial Close' => 'Trial Close', 'Obtain Commitment' => 'Obtain Commitment', 'Maintain Realationship' => 'Maintain Realationship');
}
?>

<?php
$date = new DateTime();
date_default_timezone_set($zone);


$datetimeshort = date('Y-m-d');
$yesterday = date('Y-m-d', strtotime('-1 day', strtotime($datetimeshort)));
//$lastweek = date('Y-m-d', strtotime('-7 day', strtotime($datetimeshort)));
$month = date('Y-m', strtotime('-1 day', strtotime($datetimeshort)));
$lastmonth = date('Y-m', strtotime('-30 day', strtotime($datetimeshort)));
//echo $datetimeshort;
//echo $yesterday;
//echo $lastweek;
//echo $month;
//echo $lastmonth;
?>
<br>
<br>
<br>
<br>
<h3>Contacts</h3>
<div class="innerLR">
	<div class="row">
		<div class="col-md-7">
			<!-- Widget -->
			<div class="widget widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading glyphicons list"><i></i> Manage contacts</h4>
				</div>
				<!-- // Widget heading END -->
				<div class="widget-body">
					<div class="separator bottom"></div>
					<!-- Filters -->
					<div class="filter-bar">
						<form class="margin-none form-inline">
									<!-- Other Search -->
							<div class="form-group col-md-2 padding-none">
								<div class="input-group">
									<?php 
									echo $this->Form->input('search_all2', array(
									'div' => false,
									'class' => 'form-control',
									'label' => false,
									'placeholder' => 'Other Search'), array('div' => false, 'id' => 'ContactSearchAll2'));
									?>
									<span class="input-group-addon"><i class="fa fa-search"></i></span> </div>
							</div>
							<!-- // Other Search END -->
							<!-- Quick Search -->
							<div class="form-group col-md-3 padding-none">
								<div class="col-md-8 padding-none">
								<?php
								echo $this->Form->select('search_all', array(
									'Open' => 'Open',
									'Closed' => 'Closed',
									$datetimeshort => 'Today',
									$yesterday => 'Yesterday',
									$month => 'This Month',
									$lastmonth => 'Last Month',
									'Web Lead' => 'Web Lead',
									'Phone Lead' => 'Phone Lead',
									'Showroom' => 'Showroom',
									$options
								), array('div' => false, 'selected'=>$selected_type,  'class' => 'form-control', 'empty' => 'Quick Search', 'id' => 'ContactSearchAll'));
								//keep the state of Quick Search
								echo $this->Form->hidden("search_all_value", array('value' => $selected_type));
								?>
									
								</div>
							</div>
							<!-- // Quick Search END -->
							<div class="clearfix"></div>
						</form>
					</div>
					<!-- // Filters END -->
					<!-- Products table -->
					<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th style="width: 1%;" class="center">Ref#</th>
								<th>Name</th>
								<th>Last Touched</th>
								<th>Lead Type</th>
								<th>Step</th>
								<th>Status</th>
								<th><span class="fa fa-fw fa-mobile"></span> Cell#</th>
								
								<th class="center" style="width: 100px;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php	foreach ($contacts as $contact): 	?>
							
							<tr class="selectable" style="">
								<td class="center" style="width: 41px;">
									 <?php
									$lead_status = $contact['Contact']['lead_status'];
									$cid = $contact['Contact']['id'];
									if ($lead_status === "Closed") {
										echo "Closed";
									} else {
										echo $cid;
									}
									?>
								</td>
								<td class="important" style="width: 130px;"><?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'];  ?></td>
								<td><?php echo $this->Time->format('l F jS, Y g:i A', $contact['Contact']['modified']); ?></td>
								<td >
										<?php
					if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
						echo '<span class="label label-danger">' . $contact['ContactStatus']['name'] . '</span>';
	                                } else if ($contact['ContactStatus']['name'] == 'Web Lead') {
						echo '<span class="label label-warning">' . $contact['ContactStatus']['name'] . '</span>';
                                        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
						echo '<span class="label label-warning">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Showroom') {
						echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Parts') {
						echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Service') {
						echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Call Center') {
						echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Rental') {
						echo '<span class="label label-success">' . $contact['ContactStatus']['name'] . '</span>';
					}
					?>
								</td>
								<td><?php echo $contact['Contact']['sales_step']; ?></td>
								<td><?php echo $contact['Contact']['status'];    ?></td>
								<td><?php 
									$phone = $contact['Contact']['mobile'];
									$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
									$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
									echo $cleaned; 
									?>
								</td>
								<td class="center" style="width: 100px;">
									<a href="<?php echo $this->Html->url(array('controller'=>'contacts','action'=>'editcontact',$contact['Contact']['id'])); ?>" class="edit-contact no-ajaxify btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
									<a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
								</td>
							</tr>
						
							<?php endforeach; ?>
						</tbody>
					</table>
					
					<!-- // Products table END -->
					<!-- Options -->
					<div class="">
						<div class="pull-right">
							<ul class="pagination margin-none">
						        <?php echo $this->Paginator->prev('<<'); ?>
								<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2)); ?>
								<?php echo $this->Paginator->next('>>'); ?>
							</ul>
						</div>
						<div class="clearfix"></div>
						<!-- // Pagination END -->
					</div>
					<!-- // Options END -->
				</div>
			</div>
			<!-- // Widget END -->
		</div>
		<div class="col-md-5">
			<!-- Widget -->
			<div class="widget widget-body-white">
				<!-- Widget heading -->
				<div id="action-container">
					&nbsp;
				</div>
				<!-- // Widget heading END -->
			</div>
			<!-- // Widget END -->
		</div>
		
	</div>
		
	
</div>
<script >
$script.ready(['core'], function(){

	$(".edit-contact").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "GET",
			url:  $(this).attr('href'),
			success: function(data){
				$("#action-container").html(data);
			}
		});
		//return false;
	});
	
});
</script>