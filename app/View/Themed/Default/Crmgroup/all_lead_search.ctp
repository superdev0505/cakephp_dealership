<style>
.pagination>li.current {
	position: relative;
	float: left;
	padding: 6px 12px;
	margin-left: -1px;
	line-height: 1.428571429;
	text-decoration: none;
	background-color: #FFF;
	border: 1px solid #DDD;
}
.largeWidth {
    margin: 0 auto;
    width: 1084px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
}
a.all_leads_sort_heads{
	color: white;
	text-decoration:  underline;
}

</style>


<?php
if(!empty($contacts)){
$options['model']= 'Contact';
$options['url']['model']= 'Contact';
?>

<div class="row">
	<div class='col-md-9 all_lead_search_paging'>
		<div class="paging">
			<ul class="pagination margin-none">
				<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify','model' =>'Contact'),$options); ?>
				<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify','model' =>'Contact')); ?>
				<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify','model'=>'Contact'),$options); ?>
			</ul>
		</div>
	</div>
	<div class='col-md-3'>
		<?php
		echo $this->Paginator->counter(
		    'Page {:page} of {:pages}, showing {:current} leads out of
		     {:count} total'
		);
		?>
	</div>
</div>


<?php } ?>


	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Id</th>
			<th><?php echo  $this->Paginator->sort('company_id', 'Dealer', array('class'=>'all_leads_sort_heads no-ajaxify')); ?></th>
			<th>Customer</th>
			<th>Step/Status</th>
			<th>Vehicle</th>
			<th>Source</th>
			<th><?php echo $this->Paginator->sort('created', 'Created', array('class'=>'all_leads_sort_heads no-ajaxify')); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Modified', array('class'=>'all_leads_sort_heads no-ajaxify')); ?></th>
			<th><?php echo $this->Paginator->sort('user_id', 'Sales Person', array('class'=>'all_leads_sort_heads no-ajaxify')); ?></th>
			<th>Originator</th>
			
			<th width='10%'>Comment</th>
		</tr>
		</thead>
		<tbody>
			<?php foreach($contacts as $contact) { 

				$color_class = "";
				if($contact['Contact']['owner'] == $contact['Contact']['sperson']  &&  $contact['Contact']['created'] ==  $contact['Contact']['modified']){
					$color_class = "label-danger-crmgroup";
				}else if(
					$contact['Contact']['owner'] != $contact['Contact']['sperson'] &&  
					$contact['Contact']['created'] ==  $contact['Contact']['modified']
				){
					$color_class = "label-warning-crmgroup";
				}else if(
					$contact['Contact']['owner'] != $contact['Contact']['sperson'] &&  
					$contact['Contact']['created'] !=  $contact['Contact']['modified']
				){
					$color_class = "label-success-crmgroup";;
				}else{
					$color_class = "label-success-crmgroup";
				}

				?>
			<tr class="gradeA">
				<td class='text-center'>
					
					<div>
						<span class="label <?php echo $color_class; ?> label-stroke" style="font-size: 10px; margin-bottom: 5px;" ><?php echo $contact['Contact']['id'] ?></span>
					</div>
					<a class='no-ajaxify open_build_ajax btn btn-primary btn-xs' href="/crmgroup/open_build_main/<?php echo $contact['Contact']['company_id']; ?>/<?php echo $contact['Contact']['id']; ?>">Work</a>
				</td>
				<td>
					<?php echo $contact['Contact']['company'] ?>
					
					<?php if($contact['Contact']['dealer_transfer_from'] != ''){ ?>
					<br><br><div class="text-primary"><strong>Transferred From <?php echo $contact['DealerName']['name'] ?></strong></div>
					<?php } ?>

				</td>
				<td>
					<?php echo $contact['Contact']['first_name'] ?> <?php echo $contact['Contact']['last_name'] ?><br>

					<i class="fa fa-mobile"></i>
					<?php $phone = $contact['Contact']['mobile'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					<?php if($contact['Contact']['phone'] != ''){ ?>
					<br> <i class="fa fa-phone"></i>
					<?php $phone1 = $contact['Contact']['phone'];
					$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
					$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
					echo $cleaned1;?>
					<?php } ?>

					<?php if($contact['Contact']['work_number'] != ''){ ?>
					<br>
					 <i class="fa fa-phone"></i>
					<?php $phone1 = $contact['Contact']['work_number'];
					$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
					$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
					echo $cleaned1;?>
					<?php } ?>

				</td>
				<td>
					<div>Step: <?php echo $custom_step_map[ $contact['Contact']['sales_step'] ]; ?></div>
					<div>Status: <?php echo $contact['Contact']['status']; ?></div>
				</td>

				<td>
					<?php echo ($contact['Contact']['year'] != 0)?  $contact['Contact']['year'] : "Any" ; ?>  <br>
					<?php echo $contact['Contact']['make']; ?> <br>
					<?php echo $contact['Contact']['model']; ?> <br>
					<?php echo $contact['Contact']['type']; ?> <br>
					<?php echo $contact['Contact']['class']; ?>
				</td>
				<td><?php echo $contact['Contact']['source'] ?></td>
				<td><?php echo date('D - M d, Y g:i A', strtotime($contact['Contact']['created'])); ?></td>
				<td><?php echo date('D - M d, Y g:i A', strtotime($contact['Contact']['modified'])); ?></td>
				<td><?php echo $contact['Contact']['sperson'] ?></td>
				<td><?php echo $contact['Contact']['owner'] ?></td>
				
				<td><?php
						echo $this->Text->truncate( strip_tags($contact['Contact']['notes']),200,array('html'=>true,
						'ellipsis'=>'<br><a href="javascript:" style="display: inline; color: #4193d0; padding: 0; font-weight: normal;" class="read_more_contact_note_search_result no-ajaxify" contact_id = "'.
						$contact['Contact']['id'].'" >Read more</a>'));
					?>
				</td>

			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>



<?php //Service Leads;  ?>

<?php
if(!empty($service_leads) ){
$options['model']= 'ServiceLeadsDms';
$options['url']['model']= 'ServiceLeadsDms';
?>



<?php }
if($this->request->query['search_bdc_lead'] == '1')
{
 ?>

<h2>Service Leads</h2>
	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Id</th>
			<th>Dealer</th>
			<th>Customer</th>
			<th>Order No</th>
			<th>Service Writer</th>
			<th>Survey</th>
            <th>Created</th>
			<th>Modified</th>



		</tr>
		</thead>
		<tbody>
			<?php foreach($service_leads as $contact) { ?>
			<tr class="gradeA">
				<td class='text-center'>
					<?php echo $contact['ServiceLeadsDms']['id'] ?> <br>
<a class='no-ajaxify open_build_ajax btn btn-primary btn-xs' href="/crmgroup/open_build_bdc/<?php echo $contact['ServiceLeadsDms']['dealer_id']; ?>/<?php echo $contact['ServiceLeadsDms']['id']; ?>/service">BDC Work</a>

			</td>
				<td><?php echo $contact['ServiceLeadsDms']['dealer'] ?></td>
				<td>
					<?php echo $contact['ServiceLeadsDms']['name'] ?> <br />
					<i class="fa fa-mobile"></i>
					<?php $phone = $contact['ServiceLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					<?php if($contact['ServiceLeadsDms']['work_phone'] != ''){ ?>
					<br> <i class="fa fa-phone"></i>
					<?php $phone1 = $contact['ServiceLeadsDms']['work_phone'];
					$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
					$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
					echo $cleaned1;?>
					<?php } ?>

				</td>
				<td>
					<?php echo $contact['ServiceLeadsDms']['order_no']; ?>

				</td>
				<td><?php echo $contact['ServiceLeadsDms']['service_writer'] ?></td>
                <td>
					<?php foreach($contact['BdcSurvey'] as $survey){ ?>
						<div><?php echo $survey['status']; ?></div>
					<?php } ?>

				</td>
				<td><?php echo date('D - M d, Y g:i A', strtotime($contact['ServiceLeadsDms']['created'])); ?></td>
				<td><?php echo date('D - M d, Y g:i A', strtotime($contact['ServiceLeadsDms']['modified'])); ?></td>



			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>

<?php } ?>
<?php
if(!empty($part_leads) ){

?>



<?php }
if($this->request->query['search_bdc_lead'] == '1')
{
 ?>

<h2>Part Leads</h2>
	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Id</th>
			<th>Dealer</th>
			<th>Customer</th>
			<th>Invoice No</th>
			<th>Sales Person</th>
			<th>Survey</th>
            <th>Created</th>
			<th>Modified</th>



		</tr>
		</thead>
		<tbody>
			<?php foreach($part_leads as $contact) { ?>
			<tr class="gradeA">
				<td class='text-center'>
					<?php echo $contact['PartLeadsDms']['id'] ?> <br>
<a class='no-ajaxify open_build_ajax btn btn-primary btn-xs' href="/crmgroup/open_build_bdc/<?php echo $contact['PartLeadsDms']['dealer_id']; ?>/<?php echo $contact['PartLeadsDms']['id']; ?>/part">BDC Work</a>

			</td>
				<td><?php echo $contact['PartLeadsDms']['dealer'] ?></td>
				<td>
					<?php echo $contact['PartLeadsDms']['name'] ?> <br />
					<i class="fa fa-mobile"></i>
					<?php $phone = $contact['PartLeadsDms']['home_phone'];
					$phone_number = preg_replace('/[^0-9]+/', '', $phone); //Strip all non number characters
					$cleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number); //Re Format it
					echo $cleaned;?>
					<?php if($contact['PartLeadsDms']['work_phone'] != ''){ ?>
					<br> <i class="fa fa-phone"></i>
					<?php $phone1 = $contact['PartLeadsDms']['work_phone'];
					$phone_number1 = preg_replace('/[^0-9]+/', '', $phone1); //Strip all non number characters
					$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number1); //Re Format it
					echo $cleaned1;?>
					<?php } ?>

				</td>
				<td>
					<?php echo $contact['PartLeadsDms']['invoice_no']; ?>

				</td>
				<td><?php echo $contact['ServiceLeadsDms']['sperson'] ?></td>
                <td>
					<?php foreach($contact['BdcSurvey'] as $survey){ ?>
						<div><?php echo $survey['status']; ?></div>
					<?php } ?>

				</td>
				<td><?php echo date('D - M d, Y g:i A', strtotime($contact['PartLeadsDms']['created'])); ?></td>
				<td><?php echo date('D - M d, Y g:i A', strtotime($contact['PartLeadsDms']['modified'])); ?></td>



			</tr>
			<?php } ?>
		</tbody>
		<!-- // Table body END -->
		</table>

<?php } ?>


<?php //echo $this->element("sql_dump"); ?>

<script>

$(function() {

	//Pagination Starts
	$(".all_lead_search_paging .paging a,a.all_leads_sort_heads" ).addClass("no-ajaxify");
	$(".all_lead_search_paging .paging a,a.all_leads_sort_heads" ).click(function(event){
		event.preventDefault();
		var parent_classs = $(this).parent('li').attr("class");
		if(parent_classs != 'disabled'){
			$.ajax({
				url: $(this).attr('href'),
				type: "get",
				cache: false,
				success: function(results){ 
					$('#all_leads_result').html(results);
				}
			});
		}
	});
	$("a.all_leads_sort_heads.asc").append(" <i class='fa fa-caret-up'></i>");
	$("a.all_leads_sort_heads.desc").append(" <i class='fa fa-caret-down'></i>");

	//Pagination Ends

	$(".read_more_contact_note_search_result").click(function(event){
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


	$(".open_build_ajax").click(function(event){
		event.preventDefault();
		//console.log($(this).attr('href'));
		$("#frameDemo").attr("src", $(this).attr('href') );
		$("#btn-tab-2").trigger('click');
	});

});

</script>
