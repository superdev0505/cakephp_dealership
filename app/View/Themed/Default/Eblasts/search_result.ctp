<?php if( $this->Paginator->counter(array('format' => __('{:count}'))) != "0"){ ?>

<div class="results"><?php echo $this->Paginator->counter(array('format' => __('{:count}'))); ?>  Leads Found, <?php echo (isset($opt_out_count))? $opt_out_count." Opt out" : ""; ?>  <i class="icon-circle-arrow-down"> </i></div>




<div class="row-fluid innerAll">

<table class="table table-striped table-responsive swipe-horizontal ">
	<!-- Table heading -->
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Status</th>
			<th>Mobile</th>
			<th nowrap="nowrap">Sales Step</th>
			<th>Vehicle</th>
			<th>Modified</th>
		</tr>
	</thead>
	<!-- // Table heading END -->
	<!-- Table body -->
	<tbody>
		<!-- Table row -->
	<?php 
        $selected_lead_type = "";
        if( isset($this->request->params['named']['selected_lead_type']) &&  $this->request->params['named']['selected_lead_type'] != ''  ){
            $selected_lead_type = $this->request->params['named']['selected_lead_type'];
        }
        foreach ($contacts as $contact){ 	
    ?>
	<tr class="gradeA">
		<td>
			<?php //echo '#'.$contact['Contact']['id']; ?>
			<?php echo $contact['Contact']['first_name'] . "&nbsp;" . $contact['Contact']['last_name'];  ?>
		</td>
		<td>
             <?php echo $contact['Contact']['email']; ?> 
		</td>
		<td>
			<?php
			if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Web Lead') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Showroom') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Parts') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Service') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Call Center') {
				echo $contact['ContactStatus']['name'];
			} else if ($contact['ContactStatus']['name'] == 'Rental') {
				echo $contact['ContactStatus']['name'];
			}
			?>&nbsp; 
		</td>
		<td>
            <?php $phone = $contact['Contact']['mobile'];
            $phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
            $cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
            echo $cleaned;?>
		</td>
		<td>
             <?php 
			 echo $contact['Contact']['sales_step']; ?> 
		</td>
		<td>
             &nbsp; <?php echo $contact['Contact']['condition']; ?>
             &nbsp; <?php echo $contact['Contact']['year']; ?>
             &nbsp; <?php echo $contact['Contact']['make']; ?>
             &nbsp; <?php echo $contact['Contact']['model']; ?>
             &nbsp; <?php echo $contact['Contact']['type']; ?>
		</td>
		<td>
             <?php 
            $startTimeStamp = strtotime($contact['Contact']['modified']);
            $endTimeStamp = strtotime("now");
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff/86400;  // 86400 seconds in one day
            $numberDays = intval($numberDays);
            echo $numberDays
            ?>
            <?php echo $contact['Contact']['modified_full_date']; ?>
            <?php // if($contact['Contact']['email'] != ''){ echo $contact['Contact']['email']; } ?>
         <td>
	 </tr>
    <?php	
        }
    ?>
	<!-- // Table row END -->
		</tbody>
		<!-- // Table body END -->
	</table>
	<!-- // Table END -->
	<div class="paging no-ajaxify list-unstyled pagination ">
	<?php
		echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled'));
		echo "&nbsp;";
		echo $this->Paginator->numbers(array('separator' => '&nbsp;'));
		echo "&nbsp;";
		echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$(".paging  a").click(function(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url:  $(this).attr('href'),
			success: function(data){
				$("#search-result-content").html(data);
			}
		});
		return false;
	});
});
</script>
<?php } ?>