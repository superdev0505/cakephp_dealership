
<?php
function format_phone($phone){
		$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
		return  preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number); //Re Format it
	}

?>

<div class='text-primary'>
	<?php echo $report_type;?>
</div>

	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >

					<th>ID</th>
					<th>Full Name</th>
                    <th>Sales Person</th>
					<th>Phone #</th>
					<th>Vehicle</th>
                    <th>Created Date</th>
					<th>First Updated </th>
					<th>Open/Close</th>
					<th>Status</th>
                    <th>Notes</th>

		</tr>
		</thead>
		<tbody>
			<?php foreach($lead_list as $details) { ?>
			<tr class="gradeA">
				<td><?php echo $details['Contact']['id'];?></td>
                <td>
                    <?php echo ucwords(strtolower($details['Contact']['first_name']));?>
                    <?php echo ucwords(strtolower($details['Contact']['m_name']));?>
                    <?php echo ucwords(strtolower($details['Contact']['last_name']));?>
                </td>
                <td><?php echo $details['Contact']['sperson'];?></td>
				<td><?php echo format_phone(  $details['Contact']['mobile']) ;?></td>
				<td>
					<?php echo $details['Contact']['condition']." ".$details['Contact']['year']." ".$details['Contact']['make']." ".$details['Contact']['model'] ;?>
				</td>
                <td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['created']));?></td>
                <td><?php echo date("F j, Y h:i A",strtotime($details['Contact']['first_modified']));?></td>
				<!--		<td><?php echo $ContactStatus[$details['Contact']['contact_status_id']];?></td> -->
						<!--<td><?php echo  $sales_steps[$details['Contact']['sales_step']];?></td>-->
				<td><?php echo $details['Contact']['lead_status'];?></td>
				<td><?php echo $details['Contact']['status'];?></td>
                <td><div class="note-wrapper"><?php echo $details['Contact']['notes'];?></div></td>
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>

		<div class="paging innerAll">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			</ul>
		</div>


<?php

	//debug( $contacts );

 ?>



<script>
$(function(){

$(".pagination  a").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: $(this).attr('href'),
			success: function(data){
				$(".bootbox-body").html(data);
			}
		});


	});



});
</script>
