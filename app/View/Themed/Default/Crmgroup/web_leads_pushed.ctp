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
a.weblead_all_sortLeads{
	color: white;
	text-decoration:  underline;
}

</style>

	<div class="row">
		<div class="col-md-8 weblead_pushed_result_paging">
			<div class="paging innerAll">
				<ul class="pagination margin-none">
					<?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?>
					<?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?>
					<?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
				</ul>
			</div>

			<div>
				<label>
					<input type="radio" value="all" class="btn_webleadpushed_color_code" name="webleadpushed_colorcode"> <span style="color: #000000">All Lead</span>
				</label> &nbsp;
				<label
					data-toggle="tooltip"
					data-original-title="Lead Not Pushed and Not Worked"
					data-placement="top"
				>
					<input type="radio" value="red" class="btn_webleadpushed_color_code" name="webleadpushed_colorcode"> <span style="color: #cc3a3a">Unassigned Unworked</span>
				</label> &nbsp;
			
				<label
					data-toggle="tooltip"
					data-original-title="Lead Pushed and Not Worked"
					data-placement="top"
				>
					<input type="radio" value="yellow" class="btn_webleadpushed_color_code" name="webleadpushed_colorcode"> <span style="color: #d2ba02">Assigned Not Worked</span>
				</label> &nbsp;
			
				<label

					data-toggle="tooltip"
					data-original-title="Lead Worked"
					data-placement="top"
				>
					<input type="radio" value="green" class="btn_webleadpushed_color_code" name="webleadpushed_colorcode"> <span style="color: #8bbf61">Assigned and Worked</span>
				</label>
			</div>


		</div>
		<div class="col-md-4 text-right" >
			<?php if(!empty($internet_stuffs)){ ?>

					<?php echo $this->Form->input('internet_staff_pushed', 
					array('empty'=>"All", 'style'=>"width: auto; display: inline-block",
					 'class'=>'form-control', 
					 'label'=>'Internet Staff',
					 'value'=> isset($this->request->query['internet_staff'])? $this->request->query['internet_staff'] : "", 
					 'options'=>$internet_stuffs)); ?>	

			<?php } ?>
		</div>
	</div>





	<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
		<!-- Table heading -->
		<thead>
		<tr class='bg-inverse' >
			<th>Id</th>
			<th><?php echo  $this->Paginator->sort('company_id', 'Dealer', array('class'=>'weblead_all_sortLeads no-ajaxify')); ?></th>
			<th>Customer</th>
			<th>Vehicle</th>
			<th>Source</th>
			<th><?php echo $this->Paginator->sort('created', 'Created', array('class'=>'weblead_all_sortLeads no-ajaxify')); ?></th>
			<th><?php echo $this->Paginator->sort('modified', 'Modified', array('class'=>'weblead_all_sortLeads no-ajaxify')); ?></th>
			<th>Sales Person</th>
			<th>Owner</th>
			<th><?php echo $this->Paginator->sort('sales_step', 'Step', array('class'=>'weblead_all_sortLeads no-ajaxify')); ?></th>
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
					
					<span class="label <?php echo $color_class; ?> label-stroke" style="font-size: 10px; margin-bottom: 5px;" ><?php echo $contact['Contact']['id'] ?></span>


					<br>
<a class='no-ajaxify open_build_ajax btn btn-primary' href="/crmgroup/open_build_main/<?php echo $contact['Contact']['company_id']; ?>/<?php echo $contact['Contact']['id']; ?>">Work</a>
				
					<?php if($contact['Contact']['dealer_transfer_from'] != ''){ ?>	
					<br><br><div class="text-primary"><strong>Transferred to <?php echo $contact['DealerName']['name'] ?></strong></div>
					<?php } ?>	
				</td>
				<td><?php echo $contact['DealerName']['name'] ?></td>	
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
				<td><?php echo $custom_step_map[ $contact['Contact']['sales_step'] ]; ?></td>
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

<?php 
	//debug( $contacts ); 
	echo  $this->element('sql_dump'); 
 ?>

<script>

$(function() {


	//Color code start
	var selected_color = "all";
	<?php  
	if(!empty($this->request->query['selected_color'])){ 
	?>
		$('input:radio[name="webleadpushed_colorcode"]').filter('[value="<?php echo $this->request->query['selected_color']; ?>"]').attr('checked', true);
		selected_color = "<?php echo $this->request->query['selected_color']; ?>";
	<?php  
	}
	?>
	$(".btn_webleadpushed_color_code").change(function(){

		selected_color = $("input[type='radio'].btn_webleadpushed_color_code:checked").val();
        $.ajax({
			url: "/crmgroup/web_leads_pushed",
			type: "get",
			data : {'selected_color' : selected_color},
			cache: false,
			success: function(results){
				$('#web_leads_pushed').html(results);
			}
		});
    });
    //Color code end




	$("#internet_staff_pushed").change(function(){
		$.ajax({
			url: "/crmgroup/web_leads_pushed",
			type: "get",
			data: {'selected_color' : selected_color,dealer_id: "", internet_staff:$("#internet_staff_pushed").val()},
			cache: false,
			success: function(results){ 
				$('#web_leads_pushed').html(results);
			}
		});
	});

	$(".weblead_pushed_result_paging .paging a, a.weblead_all_sortLeads" ).click(function(event){
		event.preventDefault();
		//$("#ajaxOverlayLoader").show();
		$.ajax({
			url: $(this).attr('href'),
			type: "get",
			cache: false,
			success: function(results){ 
				$('#web_leads_pushed').html(results);
			}
		});
	});
	
	$("a.weblead_all_sortLeads.asc").append(" <i class='fa fa-caret-up'></i>");
	$("a.weblead_all_sortLeads.desc").append(" <i class='fa fa-caret-down'></i>");

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

	







