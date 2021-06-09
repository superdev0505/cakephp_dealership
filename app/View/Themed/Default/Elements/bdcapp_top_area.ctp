<style>

@media (max-width: 650px) {
	.modal-footer button { width: 90%; margin-bottom: 5px !important; }
}
.sidebar.sidebar-discover #menu>div>ul>li>a>span {
	position: absolute;
	left: 50px;
	top: 0;
}

.m-notification{
	color: #fff !important;
	margin-right: 10px;
	border: none;
}
.m-notification:hover{
	color: #525252 !important;
}
.sidebar.sidebar-discover #menu>div>ul>li.active>a{
	background: #353535;
	border-left: 4px solid #353535;
	border-right: 4px solid #353535;
}


</style>

<div class="navbar hidden-print main" role="navigation">

	<span id="default_d_type" d_type = "<?php echo (AuthComponent::user('d_type')!='')? AuthComponent::user('d_type') : "Powersports"; ?>" ></span>

	<div class="pull-left">
		<a href="<?php echo $this->Html->url(array('controller' => 'bdc_leads', 'action' => 'leads_main','bdcapp'=>true)) ?>"><img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" width="" height="" title="Dealership Performance CRM" alt="Dealership Performance CRM" /></a>
		<span id="refresh_stat" style='display: none;'>.</span>
	</div>

	<div class="pull-left"  style="margin-left:10px;margin-top:20px;min-width:270px;">
			<strong>For Support:</strong>
			Phone: (800) 516-1768 Ext. 2
			<br>
			Email: <a href="/supports/add">support@dp360crm.com</a>
	</div>

	<ul class="main pull-right">
    <li><a href="<?php echo $this->Html->url(array('controller' => 'supports','action' => 'add')); ?>" class="no-ajaxify"><i class="fa fa-medkit fa-lg"></i>&nbsp;Support</a></li>
    <?php if($dealer_info['DealerName']['dealer_group']){ ?>

    <li><?php
	$d_id=AuthComponent::user('dealer_id');
	if(SessionComponent::check('SelectedDealer'))
	{
		$d_id=SessionComponent::read('SelectedDealer');
	}
	echo $this->Form->input('select_dealer',array('type'=>'select','id'=>'SelectedDealer','div'=>false,'label'=>false,'options'=>$build_ids,'class'=>'form-control','style'=>'margin-top:10px;','value'=>$d_id));  ?></li><?php } ?>

	<li>

			<?php echo $this->Html->image("https://dpcrm.s3.amazonaws.com/assets/images/icon-user-51x51.png",array('class'=>"img-circle",'width'=>"30")); ?><strong><?php echo AuthComponent::user('full_name'); ?></strong>

		</li>
        <li><a href="<?php echo $this->Html->url(array('controller' =>'users','action' => 'logout','bdcapp' =>true)); ?>" class="no-ajaxify"><i></i>Logout</a></li>
	</ul>
</div>

<script>

function dateformat(datestr){
	var t = datestr.split(/[- :]/);
	var date = new Date(t[0], t[1]-1, t[2], t[3], t[4], t[5]);
	d = date.toLocaleTimeString().replace(/:\d+ /, ' ');
	return (date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear() + " "+d;
}

$script.ready('bundle', function() {

	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	$(window).load(function(){
	<?php  } ?>


		$("#SelectedDealer").on('change',function(){
		$val=$(this).val();
		if($val != ''){
			url='<?php echo $this->Html->url(array('controller'=>'bdc_leads','action'=>'leads_main')); ?>/selectedDealer:'+$val;
			location.href=url;

		}

		});
	function hide_footer(){
		$("#footer").fadeOut('slow');
	}


	setTimeout(hide_footer, 3000);




	<?php  if (isset($_SERVER['HTTP_USER_AGENT']) &&  (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)){ ?>
	});
	<?php  } ?>


});

</script>
