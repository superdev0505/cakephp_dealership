<div class="col-md-12 text-left" id="other-location-result">  
	<br> 
	<h4><?php echo $this->Paginator->counter('{:start} - {:end} of {:count}'); ?></h4> 
	<table class="dynamicTable tableTools table table-bordered checkboxs"  style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0"> 
		<thead> 
			<tr class="bg-inverse" > 
				<th>Ref#</th> 
				<th>Name</th> 
				<th style="min-width: 190px">Contact</th> 
				<th>Vehicle</th> 
				<th>Sperson</th> 
				<th>Lead Status</th> 
				<th>Modified</th>
				<th>Add</th> 
			</tr> 
		</thead> 
		<tbody>
			<?php foreach($contacts as $contact){ ?>
			<tr class="gradeA" id="row_<?php echo $contact['Contact']['id']; ?>">
				<td class="center">
					<?php
					if ($contact['ContactStatus']['name'] == 'Mobile Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
	                                } else if ($contact['ContactStatus']['name'] == 'Web Lead') {
						echo '<span class="label label-danger label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
                                        } else if ($contact['ContactStatus']['name'] == 'Phone Lead') {
						echo '<span class="label label-info label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Showroom') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Parts') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Service') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Call Center') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					} else if ($contact['ContactStatus']['name'] == 'Rental') {
						echo '<span class="label label-success label-stroke">' . $contact['ContactStatus']['name'] . '</span>';
					}
					?><br>
					<?php echo $contact['Contact']['id']; ?> 
				</td>
				<td><?php echo $contact['Contact']['first_name']; ?> <?php echo $contact['Contact']['m_name']; ?> <?php echo $contact['Contact']['last_name']; ?></td>
				<td>
					<i class="fa fa-envelope"></i> <?php echo $contact['Contact']['email']; 
					if($contact['Contact']['dnc_status'] == 'not_email' || $contact['Contact']['dnc_status'] == 'no_call_email'){
						echo  " <i title='{$contact['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
					}
					$dnc_icon_phone = "";
					if($contact['Contact']['dnc_status'] == 'not_call' || $contact['Contact']['dnc_status'] == 'no_call_email'){
						$dnc_icon_phone = "<i title='{$contact['dnc_change_date']}' style='color: #CC3A3A;' class='fa fa-exclamation-triangle'></i>";
					}
					?> <br>

					<strong>Mobile:</strong> <?php $phone = $contact['Contact']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $this->Dncprocess->show_phone($dnc_manual_uplaod_process,$contact['Contact']['dnc_status'], $cleaned, 	$contact['Contact']['modified'],$contact['Contact']['sales_step']);
					?> 
					<?php echo $dnc_icon_phone; ?><br>

					<strong>Phone:</strong>
					<?php $phone1 = $contact['Contact']['phone'];
					$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
					$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it

					echo $this->Dncprocess->show_phone(
					$dnc_manual_uplaod_process,
					$contact['Contact']['dnc_status'],
					$cleaned1,
					$contact['Contact']['modified'],
				 	$contact['Contact']['sales_step']);
					?> <?php echo $dnc_icon_phone; ?>

					<br>

					<i class="fa fa-phone"></i> <strong>Work:</strong>
					<?php $phone1 = $contact['Contact']['work_number'];
					$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
					$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it

					echo $this->Dncprocess->show_phone(
					$dnc_manual_uplaod_process,
					$contact['Contact']['dnc_status'],
					$cleaned1,
					$contact['Contact']['modified'],
				 	$contact['Contact']['sales_step']);
					?> <?php echo $dnc_icon_phone; ?>
				</td>
				<td>
					<?php echo $contact['Contact']['year']; ?> <?php echo $contact['Contact']['make']; ?> <?php echo $contact['Contact']['model']; ?>

					<?php if($contact['ContactAccount']['id'] != ''){ ?> 
					<br><strong>Account:</strong>  <span class="text-primary"><?php echo $contact['ContactAccount']['name']; ?></span> 
					<?php } ?> 
					
				</td>
				<td><?php echo $contact['Contact']['sperson']; ?></td>
				<td><?php echo $contact['Contact']['lead_status']; ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['modified'])); ?></td>
				<td>
					<button type="button" contact_account_id = "<?php echo $contact_account_id; ?>" contact_id = '<?php echo $contact['Contact']['id']; ?>' class="btn btn-xs btn-primary btn_add_lead_company" ><i class="fa fa-plus"></i></button>
				</td>
				
			</tr>
			<?php } ?>

		</tbody>
	</table> 
</div>	
  								




		<div class="contact_account_search">
			<div class="paging">
			    <ul class="pagination margin-none">
			        <?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?> 
			        <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?> 
			        <?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
			    </ul>
			</div>
		</div>

			

<?php 
	// echo $this->element("sql_dump"); 
?>

<script>
$(function(){

	//Pagination Starts
	$(".contact_account_search .paging a,a.sortLeads" ).addClass("no-ajaxify");
	$(".contact_account_search .paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		var parent_classs = $(this).parent('li').attr("class");
		if(parent_classs != 'disabled'){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				cache: false,
				success: function(results){ 
					$('#search_result').html(results);
				}
			});
		}
	});
	//Pagination Ends

	$(".btn_add_lead_company").click(function(){
		var acc_name = $("#acc_name_"+ $('#ContactSearchContactAccountId').val() ).html();
		var contact_id = $(this).attr("contact_id");
		var contact_acc_id = $(this).attr("contact_account_id");

		$(this).attr("disabled", true);

		if(confirm("Do you want to add this lead to: "+acc_name+"?")){
			$.ajax({
				url: "/contact_accounts/add_lead_company",
				type: "post",
				context: $(this),
				data: {'contact_id' : contact_id, 'contact_acc_id' : contact_acc_id},
				cache: false,
				success: function(results){ 
					// console.log(results);
					$(this).attr("disabled", false);

					$("#row_"+contact_id).hide("medium");

					


				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert(textStatus);
					$(this).attr("disabled", false);
				}
			});

		}else{
			$(this).attr("disabled", false);
		}

	});





});
</script>