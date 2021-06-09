<?php $this->layout='default_login'; //set your layout here ?>
<div class="innerAll">
	<div class="error innerAll ">

		<div class="well text-center">
			<div class="center text-large innerAll">
				<i class="fa fa-5x fa-chain-broken text-danger "></i>
			</div>
			<h1 class="strong innerTB">Oops!</h1>
			<h4 class="innerB">This page does not exist.</h4>
			<div class="well bg-white text-danger strong ">

	<strong><?php echo __d('cake', 'Error'); ?>: </strong>
	<?php printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	); ?>


			</div>
			<div class="inerAll">
			<a href="https://app.dealershipperformancecrm.com/" class=" btn btn-primary text-large ">

			<img src="https://dpcrm.s3.amazonaws.com/assets/images/DealershipPerformance_FinalLogo.jpg" width="" height="" title="Dealership Performance CRM" alt="Dealership Performance CRM">

			</a>
			</div>
		</div>

	</div>
</div>
