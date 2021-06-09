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
    width: 800px;
}
.error-message{
	color: #FF0000;
}
.largeWidth3 {
    margin: 0 auto;
    width: 1180px;
}
.midWidth {
    margin: 0 auto;
    width: 700px;
	
}



</style>

</br></br></br></br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>	

	<div class="row">

		<div class="col-md-8">
			<div class="widget widget-heading-simple widget-body-white">
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Contact Accounts</h4>
				</div>
				<div class="widget-body">
						<div class="row">
							<div class="col-md-12">

								<div class="widget widget-body-white widget-heading-simple">
									<div class="widget-body">
										<!--Search start-->
										<?php echo $this->Form->create('ContactAccount', array('type'=>'GET','url' => array('controller'=>'contact_accounts','action' => 'index'),'class' => 'form-inline apply-nolazy')); ?>
										<div class="row">
											<div class="col-md-1">
												Search
											</div>
											<div class="col-md-3">
												<?php echo $this->Form->input('name', array('value'=>$src_name,'type' => 'text',  'placeholder' => 'Account Name', 'label'=>false,'div'=>false, 'class' => 'form-control','style'=>''));?>
											</div>
											<div class="col-md-3">
												<?php echo $this->Form->input('user_id', array("value"=> $src_user, 'type' => 'select', 'options'=>$user_list, 'empty' => 'Sales Person', 'label' => false, 'div' => false, 'class' => 'form-control','style'=>'width: 100%')); ?>
											</div>
											
											<div class="col-md-3">
												<button type="submit" id="submit_search_account" class="btn btn-success no-ajaxify"><i class="fa fa-search"></i> Search</button>
												<a class="btn btn-warning no-ajaxify" href="/contact_accounts/" ><i class="fa fa-refresh"></i> Reset</a>
											</div>
										</div>
									
										<?php echo $this->Form->end(); ?>
										<!-- //Search End-->
									</div>
								</div>

								<table class="table table-striped table-responsive  table-primary">
									<!-- Table heading -->
									<thead>
										<tr>
											<th>Account Name</th>
											<th>Sales Person</th>
											<th>Details</th>
											<th>Number of employee</th>
											<th>Owner</th>
											<th style="width: 140px">Action</th>
										</tr>
									</thead
									><!-- // Table heading END -->
									<!-- Table body -->
									<tbody>
									<?php foreach($contactAccounts as $contactAccount){ ?>
										<tr class="text-primary">
											<td class="important">
												<u>
													<a class="btn_account_leads" data-account-id = '<?php echo $contactAccount['ContactAccount']['id']; ?>' href="javascript:">
														<div id="acc_name_<?php echo $contactAccount['ContactAccount']['id']; ?>"><?php echo $contactAccount['ContactAccount']['name']; ?></div>
													</a>
												</u>
											</td>
											<td><?php echo $contactAccount['User']['first_name']; ?> <?php echo $contactAccount['User']['last_name']; ?>&nbsp;</td>
											<td>
												<strong>Phone:</strong> <?php echo $contactAccount['ContactAccount']['phone']; ?><br>
												<strong>Email:</strong> <?php echo $contactAccount['ContactAccount']['email']; ?><br>
												<strong>Website URL:</strong> <?php echo $contactAccount['ContactAccount']['website_url']; ?><br>
												<strong>Notes:</strong> <br><?php echo $contactAccount['ContactAccount']['notes']; ?>
											</td>
											<td><?php echo $contactAccount['ContactAccount']['number_of_employee']; ?></td>
											<td>
												<?php if($contactAccount['Owner']['first_name'] != ''){ ?>
												<?php echo $contactAccount['Owner']['first_name']; ?> <?php echo $contactAccount['Owner']['last_name']; ?><br>
												<?php } ?>
												(<?php echo date('m/d/Y', strtotime($contactAccount['ContactAccount']['modified'])); ?>)

											</td>
											<td style="width: 152px;">
												<a class="btn btn-primary btn-xs no-ajaxify search_contact_account" contact_account_id='<?php echo $contactAccount['ContactAccount']['id']; ?>'  data-toggle="modal" href="#modal_search_account">
													<i class="fa fa-plus"> Add Contact </i>
												</a>

												<a class="btn btn-warning btn-xs no-ajaxify" href="/contact_accounts/index/?team_id=<?php echo $contactAccount['ContactAccount']['id']; ?>">
													<i class="fa fa-pencil"></i>
												</a>

												 <a class="btn btn-danger btn-xs no-ajaxify btn_account_delete"
												 style="float:right;" contact_delete_id='<?php echo $contactAccount['ContactAccount']['id']; ?>'  data-toggle="modal" href="#modal_delete_account"><i class="fa fa-times"></i></a>
											</td>
										</tr>
									<?php } ?>
									<!-- // Table row END -->
									</tbody>
									<!-- // Table body END -->
								</table>
								<!-- // Table END -->

								<div class="paging">
								    <ul class="pagination margin-none">
								        <?php echo $this->Paginator->prev('<<',  array('class'=>'no-ajaxify')); ?> 
								        <?php echo $this->Paginator->numbers(array('first' => 2, 'last' => 2,'class'=>'no-ajaxify')); ?> 
								        <?php echo $this->Paginator->next('>>', array('class'=>'no-ajaxify')); ?>
								    </ul>
								</div>

								<br>

								<a class="no-ajaxify btn btn-danger" href="/"><i class="fa fa-chevron-left"></i> Back</a>
							</div>
						</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-4">
			<!-- Widget -->
			<div class="widget widget-heading-simple widget-body-white">
		
				<!-- Widget heading -->
				<div class="widget-head">
					<?php if(isset(  $this->request->query['team_id'])){ ?>
						<h4 class="heading">Edit Contact Accounts</h4>
					<?php }else{ ?>
						<h4 class="heading">Add Contact Accounts</h4>
					<?php } ?>


				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
					<div class="innerLR <?php echo isset($this->request->query['team_id'])? "bg-success" : "" ; ?> ">
						<div class="separator"></div>
						<?php echo $this->Form->create('ContactAccount', array('class' => 'form-horizontal apply-nolazy',	'type' => 'post')); ?>
						<div class="form-group">
							<?php echo $this->Form->label('name','Account Name:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								
								<?php echo $this->Form->hidden('id');	?>

								<?php echo $this->Form->text('name',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('name');	?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('user_id','Sales Person:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->input('user_id',array('label'=>false, 'div' => false, 'empty'=>"Select Salesperson", 'required'=>false,'options' => $user_list,  'class' => 'form-control'));	?>
								<?php echo $this->Form->error('user_id');	?>
							</div>
						</div>


						<div class="form-group">
							<?php echo $this->Form->label('address','Address:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('address',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('address');	?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('phone','Phone:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('phone',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('phone');	?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('email','Email:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('email',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('email');	?>
							</div>
						</div>
						<div class="form-group">
							<?php echo $this->Form->label('website_url','Website URL:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('website_url',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('website_url');	?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('number_of_employee','Number of employee:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->text('number_of_employee',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('number_of_employee');	?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('notes','Notes:', array('class'=>'col-sm-3 control-label')); ?>
							<div class="col-sm-9">
								<?php echo $this->Form->textarea('notes',array('required'=>false,'class' => 'form-control'));	?>
								<?php echo $this->Form->error('notes');	?>
							</div>
						</div>



						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Save</button>

								<?php if(isset(  $this->request->query['team_id'])){ ?>
									<a class="btn btn-danger no-ajaxify" href="/contact_accounts/">Cancel</a>
								<?php } ?>
								<div class="separator"></div>
							</div>
						</div>
						<?php echo $this->Form->end(); ?>
						
		
					</div>
				</div>
			
			</div>
			<!-- // Widget END -->
		</div>
		
		
	</div>	
	
</div>

<!-- Modal -->
<div class="modal fade" id="modal_search_account">

	<div class="modal-dialog modal900" >
		<div class="modal-content">

			<?php echo $this->Form->create('Contact', array('type'=>'GET','url' => array('controller'=>'contact_accounts','action' => 'search_account_lead') ,'id'=>'ContactLeadsForm2','class' => 'form-inline no-ajaxify')); ?>

			<!-- Modal body -->
			<div class="modal-body">
				<div>
					<center>
						<div class="checkbox" style="display: inline-block; margin-top: 0;">
							<label class="checkbox-custom" >
								<input type="checkbox" checked="checked" id="ContactSearchBroad"   class="chk_lead_src_type" name="checkbox_status_broad" value="broad" >
								<i class="fa fa-fw fa-square-o"></i> Contains Word Search
							</label>
						</div>
						&nbsp; &nbsp; &nbsp;
						 <div class="checkbox" style="display: inline-block; margin-top: 0;">
							<label class="checkbox-custom" >
								<input type="checkbox" id="ContactSearchExact"   class="chk_lead_src_type" name="checkbox_status_exact" value="exact" >
								<i class="fa fa-fw fa-square-o"></i> Starts With Word Search
							</label>
						</div>


					</center>
					 <div class="separator"></div>
				</div>

			

				<div class="row">
					<div class="col-md-5 col-md-offset-1">
						Search Lead Range of :
						<?php
						$range_val = "two_years";
						if($default_search_lead_range == 'Off'){
							$range_val = "all";
						}
						echo $this->Form->input('search_range', array('type' => 'select',  'options' => array(
						'two_years' => 'Two Years',
						'all' => 'All',
						), 'label'=>false, 'value'=>$range_val, 'div'=>false,'class'=>'form-control','style'=>'width: auto'));
						?>
						<div class="separator"></div>
					</div>


				</div>

				<div class="row">
					<!--<div class="col-md-4 col-md-offset-2">
						<?php
						echo $this->Form->input('search_mobile', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Mobile Phone'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>
					-->

					<div class="col-md-5 col-md-offset-1">

						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-phone"></i></span>
							<?php
							echo $this->Form->input('search_phone', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => '(ALL) Phone - Mobile, Home, Work'), array('div' => false));
							?>
						</div>

						<div class="separator"></div>
					</div>

					<div class="col-md-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<?php
							echo $this->Form->input('search_email', array(
							'div' => false,
							'class' => 'form-control',
							'label' => false,
							'placeholder' => 'Email'), array('div' => false));
							?>
						</div>
						<div class="separator"></div>
					</div>


				</div>
				<div class="row">
					<div class="col-md-6">
						<?php
						echo $this->Form->input('search_first_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'First Name - Company, Spouse'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>
					<div class="col-md-6">
						<?php
						echo $this->Form->input('search_last_name', array(
						'div' => false,
						'class' => 'form-control',
						'label' => false,
						'placeholder' => 'Last Name'), array('div' => false));
						?>
						<div class="separator"></div>
					</div>


				</div>

				<div class="row">
					
					<div class="col-md-offset-3 col-md-6">
						<?php
						echo $this->Form->input('search_contact_account_id', array(
						'div' => false,
						'type' => 'hidden',
						'class' => 'form-control',
						'style' => "width: 100%",
						'label' => false,
						), array('div' => false));
						?>
						<div class="separator"></div>
					</div>


				</div>

				

			</div>


			<div class="modal-footer  margin-none" style="text-align: left">
				<div class="row">
					<div class="col-md-2 text-left">
						<a href="#" class="btn btn-danger " id="close_modal" data-dismiss="modal">Cancel</a>
					</div>
					<div class="col-md-8">
						
					</div>
					<div class="col-md-2">
						<button type="submit" id="submit_advance_search_filter" class="btn btn-success no-ajaxify pull-right">Search</button>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="search_result"></div>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_delete_account" tabindex="-1" role="dialog" 
	aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog" role="document">
        <div class="modal-content">
          	<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete account</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
          	</div>
          	<div class="modal-body">
               <p style="font-size:18px;font-weight:600;">Do you want to delete the account?</p>
          	</div>
	      	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
		        <button type="button" class="btn btn-info btn-del">yes</button>
	      	</div>
        </div>
  	</div>
</div>
<!-- // Modal END -->

<?php echo $this->element("sql_dump"); ?>
<script type="text/javascript">

$script.ready('bundle', function() {
	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>
	$(".btn_account_leads").click(function(event){
		event.preventDefault();
		var acc_id = $(this).attr("data-account-id");
		// alert(acc_id);

		$.ajax({
			type: "GET",
			cache: false,
			url: "/contact_accounts/get_leads",
			data: {'contact_account_id':acc_id },
			success: function(data){
				bootbox.dialog({
					message: data,
					backdrop: true,
					title: "Leads: "+$("#acc_name_"+acc_id).html(),
				}).find("div.modal-dialog").addClass("largeWidth3");
			}
		});
	});
	$(".btn_account_delete").click(function(event){
		event.preventDefault();
		var del_id = $(this).attr("contact_delete_id");
		$(".btn-del").click(function(){
			$.ajax({
				type: "GET",
				cache: false,
				url: "/contact_accounts/delete",
				data: {'contact_account_id':del_id },
				success: function(data){
				 	window.location = '/contact_accounts';
				}
			});
			$('#modal_delete_account').modal('hide');
		});
	});


	$("#ContactSearchBroad").checkbox('check');
	$(".chk_lead_src_type").click(function(event){
		$(".chk_lead_src_type").checkbox('uncheck');
		$(this).checkbox('check');
	});

	$(".search_contact_account").click(function(){
		
		$("#ContactSearchContactAccountId").val("");
		$("#ContactSearchContactAccountId").val( $(this).attr("contact_account_id") );
		$("#ContactSearchEmail").val("");
		$("#ContactSearchPhone").val(""); 
		$("#ContactSearchFirstName").val(""); 
		$("#ContactSearchLastName").val("");

		$('#search_result').html("");


	});

	$("#submit_advance_search_filter").click(function(event){
		event.preventDefault();

		if(
			$("#ContactSearchEmail").val().trim().search('@') >= 0 ||
			$("#ContactSearchPhone").val().trim().length >= 3 ||
			$("#ContactSearchFirstName").val().trim().length > 1 ||
			$("#ContactSearchLastName").val().trim().length > 1
		){
			var search_type = (  $("#ContactSearchExact").is(":checked") )? 'exact' : 'broad';

			$.ajax({
				type: "get",
				cache: false,
				data: {
					'search_type': search_type,
					email: $("#ContactSearchEmail").val().trim(),
					phone: $("#ContactSearchPhone").val().trim(), 
					first_name:$("#ContactSearchFirstName").val().trim(), 
					last_name : $("#ContactSearchLastName").val().trim(),
					searchrange: $("#ContactSearchRange").val(),
					contact_account_id: $("#ContactSearchContactAccountId").val().trim()
				},
				url:  $(this).closest('form').attr('action'),
				success: function(data){
					$("#search_result").html(data);
				}
			});




		}else{

			alert("Narrow your search");
		}


	});




	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});




</script>




