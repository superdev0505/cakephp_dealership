	<div class='row'>
		<div class="col-md-10">
			<div class="paging">
				<ul class="pagination margin-none">
					<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
					<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
					<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
				</ul>
			</div>
		</div>
		<div class="col-md-2 text-right strong ">
			<?php echo $this->Paginator->counter('{:start} - {:end} of {:count}'); ?>
		</div>	
	</div>

	<?php 
	//debug($this->request->query); 
	if(isset($this->request->query['key'])){ 
	?>

	<?php 
	if(!empty($multiple_list_ar)){ 
		$selected_index = ($this->request->query['list_index'])? $this->request->query['list_index'] : '';
	?>

	<div class="widget">
		<div class="widget-head">
			<h4 class="heading glyphicons search"><i></i>Added Search</h4>
		</div>
		<div class="widget-body list">
			<div class="separator"></div>
			<?php foreach($multiple_list_ar as $key=>$value){ ?>
				<?php if($selected_index == $key){ ?>
					<div>&nbsp;&nbsp;&nbsp; <?php echo $value ?></div>
				<?php }else{ ?>
					<div>&nbsp;&nbsp;&nbsp; <a class="select_multiple_list" src_list_id="<?php echo $key ?>"  href="javascript:"><?php echo $value ?></a></div>
				<?php } ?>
				
			<?php } ?>
			<div class="separator"></div>
		</div>
	</div>



	<?php } ?>


	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Ref No.</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>Sales Person</th>
			<th>Owner</th>
			<th>Status</th>
			<th>Created</th>
			<th>Modified</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($contacts as $contact) { ?>
			<tr class="gradeA">
				<td><?php echo $contact['Contact']['id'] ?></td>
				<td><?php echo ucwords(strtolower($contact['Contact']['first_name'])); ?> <?php echo ucwords(strtolower($contact['Contact']['last_name'])) ?></td>
				<td><?php echo ucwords(strtolower($contact['Contact']['email'])) ?></td>		
				<td><?php echo ucwords(strtolower($contact['Contact']['sperson'])) ?></td>	
				<td><?php echo $contact['Contact']['owner'] ?></td>
				<td><?php echo $contact['Contact']['status'] ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['created'])); ?></td>
				<td><?php echo date('m/d/Y g:i A', strtotime($contact['Contact']['modified'])); ?></td>
				<th>
					<button class="btn btn-success btn-sm send_test_eblast" rectype="contact" eblast_appid = "<?php echo $eblast_appid  ?>" contact_id = "<?php echo $contact['Contact']['id']; ?>" >Send Test Message</button>
				</th>	
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
	</table>
	<?php } ?>
	<?php if(isset($this->request->query['list_key'])){ ?>


	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Ref No.</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($recipients as $recipients) { ?>
			<tr class="gradeA">
				<td><?php echo $recipients['Recipient']['id']; ?></td>
				<td><?php echo ucwords(strtolower($recipients['Recipient']['name'])); ?></td>
				<td><?php echo $recipients['Recipient']['email_address']; ?></td>		
				<th>
					<button class="btn btn-success btn-sm send_test_eblast" eblast_appid = "<?php echo $eblast_appid;  ?>"  rectype="list" eblast_recpient_id = "<?php echo $recipients['Recipient']['id'];  ?>" contact_id = "<?php echo $recipients['Recipient']['id']; ?>" >Send Test Message</button>
				</th>	
			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
	</table>



	


	<?php } ?>

<script>
$(function(){

	//Pagination Starts
	$(".paging a,a.sortLeads" ).addClass("no-ajaxify");
	$(".paging a,a.sortLeads" ).click(function(event){
		event.preventDefault();
		var parent_classs = $(this).parent('li').attr("class");
		if(parent_classs != 'disabled'){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				cache: false,
				success: function(results){ 
					$('.bootbox-body').html(results);
				}
			});
		}
	});
	//Pagination Ends

	$(".select_multiple_list").click(function(event){
		event.preventDefault();
		$.ajax({
			url: "/marketing_apps/eblast_recipient/",
			data: {'key':'<?php echo $this->request->query['key']; ?>','list_index':$(this).attr('src_list_id')},
			type: "get",
			cache: false,
			success: function(results){ 
				$('.bootbox-body').html(results);
			}
		});

	});

	$(".send_test_eblast").click(function(event){
		event.preventDefault();

		var person = prompt("Please Enter Email Address");
		if (person != null && person.trim() != '') {
			$.ajax({
				type: "GET",
				cache: false,
				url: "/marketing_recipient/test_send",
				<?php if(isset($list_id)){ ?>
					data: {'eblast_appid': $(this).attr('eblast_appid'), 'eblast_recpient_id' : $(this).attr('eblast_recpient_id'), 'recipient': person, 'rectype' : $(this).attr('rectype')},
				<?php }else{ ?>
					data: {'contact_id': $(this).attr('contact_id'), 'eblast_appid' : $(this).attr('eblast_appid'), 'recipient': person, 'rectype' : $(this).attr('rectype')},
				<?php } ?>
				success: function(data){
					//console.log(data);
					bootbox.dialog({
						message: "Test Message Sent",
						title: "Eblast",
					});
				}
			});
		    // alert(person);
		}else{
			alert("Please enter a valid email address");
		}

		// $.ajax({
		// 	type: "GET",
		// 	cache: false,
		// 	url: "/contacts_manage/contact_comment",
		// 	data: {'contact_id': $(this).attr('contact_id')},
		// 	success: function(data){
		// 		bootbox.dialog({
		// 			message: data,
		// 			title: "Contact Notes",
		// 		});
		// 	}
		// });


	});


	$(".read_more_contact_note_details").click(function(event){
		event.preventDefault();

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contacts_manage/contact_comment",
			data: {'contact_id': $(this).attr('contact_id')},
			success: function(data){
				bootbox.dialog({
					message: data,
					title: "Contact Notes",
				});
			}
		});


	});



});
</script>












