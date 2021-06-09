<style>
#content {
padding: 93px 0px 0px;
}
#content > .innerLR > h1, #content > .innerLR > h2, #content > .innerLR > h3, #content > .innerLR > h4 {
    margin: 0px;
    padding-bottom: 24px;
}
.lead {
    margin: 10px 0px 10px;
}
@media (max-width: 768px) {
	.dealer_info{
		text-align:left;
	}
}
@media (min-width: 768px) {
	.dealer_info{
		text-align:right;
	}
}

</style>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>
	<div id="pdfTarget">
		<div class="innerAll shop-client-products cart invoice">
			<div class="table table-invoice">
				<div class="col-md-2 col-sm-2 col-xs-6 pull-left" style="padding: 9px;">
					<div class="media">
						<img class="media-object pull-left thumb" src="https://chart.googleapis.com/chart?cht=qr&chs=100x100&chld=L|0&chl=https://app.dealershipperformancecrm.com/dealer_settings/process_qr/<?php echo $details['XmlInventory']['id'];
						//.'/'.$this->Session->read('User.random_code');
						?>"/>
					</div>
				</div>
				<div class="col-md-2 col-sm-2 col-xs-6 pull-right text-right" style="padding: 9px;vertical-align:top;">
					<div class="innerL">
						<h4 class="separator bottom">#<?php echo $details['XmlInventory']['inv_id']; ?> <?php echo ($details['XmlInventory']['created']!="") ? '/'.$details['XmlInventory']['created']:''; ?></h4>
						<button type="button" data-toggle="print" class="btn btn-default print hidden-print"><i class="fa fa-fw fa-print"></i> Print</button>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12 pull-left" style="padding: 9px;vertical-align:top;">
					<?php if($details['XmlInventory']['description']!=""){?>
						<div class="media-body hidden-print">
							<div class="alert alert-primary margin-none">
								<strong>Description:</strong><br/>
								<?php echo $details['XmlInventory']['description']; ?>
							</div>
							<div class="separator bottom"></div>
						</div>
						<?php }?>
				</div>
			</div>
			<div style="clear:both;"></div>
			<div class="box-generic animated fadeInUp">
				<div class="table table-invoice">
							<div class="col-md-6 col-sm-6 col-xs-12 pull-left" style="padding:9px;vertical-align:top;">
								<p class="lead"><strong>Vehicle information</strong></p>
								<h2><?php echo $details['XmlInventory']['make'].' '.$details['XmlInventory']['model']; ?></h2>
								<address class="margin-none" style="word-wrap: break-word;">
								
									<?php echo ($details['XmlInventory']['vehtype']!="") ? '<strong>Vehicle Type:</strong> '.$details['XmlInventory']['vehtype']:'';?>
									<?php echo ($details['XmlInventory']['bodysubtype']!="") ? '<br/><strong>Body Sub Type:</strong> '.$details['XmlInventory']['bodysubtype']:''; ?>
									<?php echo ($details['XmlInventory']['category_name']!="") ? '<br /><strong>Category Name: </strong>'.$details['XmlInventory']['category_name']:''; ?><br/>
									<?php if($detail= $details['XmlInventory']['condition']!=""){ ?>
									<strong>Condition:</strong> <?php $detail= $details['XmlInventory']['condition'];
										if($detail==U){echo "Used";}
										elseif($detail==N){echo "New";}
										?><br /> 
										<?php  }?>
									<?php echo ($details['XmlInventory']['year']!="") ? '<strong>Year: </strong>'.$details['XmlInventory']['year']:''; ?>
									<?php echo ($details['XmlInventory']['price']!="") ? '<br/><strong>Price:</strong> '.$details['XmlInventory']['price']:''; ?>
									<?php echo ($details['XmlInventory']['vin']!="") ? '<br/><strong>Vin: </strong>'.$details['XmlInventory']['vin']:'';?>
									<?php echo ($details['XmlInventory']['stocknumber']) ? '<br/><strong>Stock Number:</strong>  '.$details['XmlInventory']['stocknumber']:''; ?>	
									<?php echo ($details['XmlInventory']['color']!="") ? '<br/><strong>color: </strong> '.$details['XmlInventory']['color']:''; ?>	
									<?php echo ($details['XmlInventory']['miles']) ? '<br/><strong>Miles:</strong>   '.$details['XmlInventory']['miles']:''; ?>	
									<?php //echo ($details['XmlInventory']['sold']) ? '<br/><strong>Sold:</strong>    '.$details['XmlInventory']['sold']:'';  ?>	
								</address>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 pull-left dealer_info" style="padding:9px;vertical-align:top;">
								<p class="lead"><strong>Dealer information</strong></p>
								<h2><?php echo $details['XmlInventory']['dealername']; ?></h2>
								<address class="margin-none">
									<?php if($details['XmlInventory']['address']!=""){?>
									<strong>Address : </strong><?php echo $details['XmlInventory']['address'].' '.$details['XmlInventory']['city'].' '.$details['XmlInventory']['state']; } ?>
									 <?php echo ($details['XmlInventory']['email']!="") ? '<br/><strong>E-mail:</strong>   <a href="mailto:#" style="word-wrap: break-word;"> '.$details['XmlInventory']['email']:''; ?></a>
									<?php echo ($details['XmlInventory']['telephone']!="") ? '<br/><strong>Phone:</strong>'.$details['XmlInventory']['telephone']:'';  ?>
									<?php echo ($details['XmlInventory']['zipcode']!="") ? '<br/><strong>Zip :</strong>'.$details['XmlInventory']['zipcode']:''; ?>
									 <?php echo ($details['XmlInventory']['url']!="") ? '<br/><strong>URL:</strong>    '.$details['XmlInventory']['url']:''; ?>
									<div class="separator line"></div>
								</address>
				</div>
			</div>
			<div style="clear:both;"></div>
			</div>
			<div class="separator bottom hidden-print"></div>

			<a class="btn btn-danger no-ajaxify" href="/dealer_settings/process_qr/<?php echo $details['XmlInventory']['id']; ?>">Back</a>
			
			<!-- Row -->
			
			<!-- // Row END -->
			
		</div>
	</div>
</div>