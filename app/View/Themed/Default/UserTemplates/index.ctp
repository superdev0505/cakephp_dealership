<?php
$zone = AuthComponent::user('zone');
$uname = AuthComponent::user('full_name');
$dealer = AuthComponent::user('dealer');
$date = new DateTime();
date_default_timezone_set($zone);

$template_type = array ('user' => 'Internal', 'customer' => 'Customer');
?>
<br>
<br>
<br>
<br>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div class="row">
		<div class="col-md-12">
			<!-- Widget -->
			<div class="widget widget-body-white">
				<!-- Widget heading -->

		    <!-- // Widget heading END -->
				<div class="widget-body">
					<div class="separator bottom"></div>
					<!-- Filters -->
					<div class="filter-bar">


							<div class="pull-right">
								<!-- Removed per deprication reason ASR09312015
								<a href="<?php echo $this->Html->url(array('action'=>'add','user')); ?>" class="btn btn label-success"><font color="white"><i class="fa fa-plus"></i> Internal</font></a>-->
								<a href="<?php echo $this->Html->url(array('action'=>'add','customer')); ?>" class="btn btn label-success"><font color="white"><i class="fa fa-plus"></i> Customer</font></a>

							</div>
							<div class="clearfix"></div>
							<div class="clearfix"></div>
					</div>
					<!-- // Filters END -->
					<!-- Products table -->
					<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
						<thead>
							<tr>
								<th style="width: 1%;" class="center">
									<?php echo $this->Paginator->sort('id','Ref#',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th>Preview</th>
								<th>
									<?php echo $this->Paginator->sort('template_title','Title',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
                                <th>
                                	<?php echo $this->Paginator->sort('user_id','Creator',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
                                </th>
								<th>
									<?php echo $this->Paginator->sort('created_date','Created On',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th>
									<?php echo $this->Paginator->sort('template_type','Type',array('class'=>'no-ajaxify','style'=>'color:#FFF;text-decoration: underline;')); ?>
								</th>
								<th class="center" style="width: 190px;">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
                            foreach($userTemplates as $userTemplate) {
							?>
							<tr class="selectable" style="">
								<td class="center" style="width: 41px;"><?php echo $userTemplate['UserTemplate']['id']; ?></td>
								<td class="important">
                                	<?php if($userTemplate['UserTemplate']['template_image'] != ''){ ?>
									<span class="important" style="width: 130px;">
										<?php echo $this->Html->image("template-thumbs/".$userTemplate['UserTemplate']['template_image'], array('width'=>"50",'height'=>"30")); ?>
									</span>
									<?php } ?>
                                </td>
								<td class="important" ><?php echo $userTemplate['UserTemplate']['template_title']; ?></td>
                                <td><?php echo (!empty($userTemplate['User']['id']))?$userTemplate['User']['first_name'].' '.$userTemplate['User']['last_name']:'Default User'; ?></td>
								<td><?php echo $this->Time->format('M d, Y', $userTemplate['UserTemplate']['created_date']); ?></td>
								<td><?php echo $template_type[$userTemplate['UserTemplate']['template_type']]; ?></td>
								<td class="center" style="width: 100px;">
                                <?php 
								$manager_group_ids =array(2,4,6,7,12);
								if(AuthComponent::user('id') == $userTemplate['UserTemplate']['user_id'] || in_array(AuthComponent::user('group_id'),$manager_group_ids)){
								?>
									<a href="<?php echo $this->Html->url(array('action'=>'add',$userTemplate['UserTemplate']['template_type'],  $userTemplate['UserTemplate']['id'])); ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil"> </i></a>

									<a href="<?php echo $this->Html->url(array('action'=>'delete', $userTemplate['UserTemplate']['id'])); ?>" onClick=" return confirm('Do you want to delete this template?')" class="btn btn-sm btn-danger no-ajaxify"><i class="fa fa-times"> </i></a>

									<a href="<?php echo $this->Html->url(array('action'=>'templates_duplicate', $userTemplate['UserTemplate']['id'])); ?>" class="btn btn-sm btn-primary duplicate_template no-ajaxify"><i class="fa fa-plus-square"></i> Duplicate</a>


                                   <?php } ?> 
                                </td>
							</tr>
							<?php } ?>
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

				<!-- // Widget heading END -->
			</div>
			<!-- // Widget END -->
		</div>
	</div>
</div>

<script>

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


	$(".duplicate_template").click(function(event){
		if(!confirm("Do you want to make a duplicate copy?")){
			event.preventDefault();
		}
	});




	$(".alert").delay(3000).fadeOut("slow");

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
















	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>

});

</script>
