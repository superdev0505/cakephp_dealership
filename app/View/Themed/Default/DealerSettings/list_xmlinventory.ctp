<style>
#content {
padding: 93px 0px 0px;
}
#content > .innerLR > h1, #content > .innerLR > h2, #content > .innerLR > h3, #content > .innerLR > h4 {
    margin: 0px;
    padding-bottom: 24px;
}
@media (max-width: 768px) {
	.dealer_info{
		float:left;
	}
}
@media (min-width: 768px) {
	.dealer_info{
		float:right;
	}
}
.clearfix{
display:block;
clear:both;
}
</style>
<div class="innerLR">
	<?php echo $this->Session->flash('flash', array('element' => 'session_message'));	?>

	<h3 class="pull-left margin-none innerR">List XmlInventory</h3>
	<div class="clearfix"></div>

	<!-- Row -->							
	<div class="row">
		<div class="col-md-4 pull-left">
<!-- Shows the next and previous links -->
	
			<div class="widget ">
				<div class="innerAll border-bottom">
				<?php echo $this->Form->create('XmlInventory',array('url' =>array('controller'=>'dealer_settings','action'=>'list_xmlinventory'),'class'=>'apply-nolazy'));?>
					<div class="input-group">
					<?php 
					echo $this->Form->input(
						'Search',
						array('label' => false,'div'=>false,'class'=>'form-control','placeholder'=>'Search')
					);
					?>
		 <!--<input type="text" class="form-control" placeeholder="Search" name="['XmlInventory']['Search']">-->
			      		<span class="input-group-btn">
			        		<button class="btn btn-primary" type="submit" name='data['XmlInventory']['search'] id='submit'><i class="fa fa-search"></i></button>
			      		</span>
			    	</div>
					<?php echo $this->Form->end();?>
				</div>
			</div>
	</div>
	<div class="dealer_info">
<!-- Shows the next and previous links -->
			<div class="widget ">
				<div class="innerAll border-bottom">
					<!-- Shows the next and previous links -->
<ul class="pagination margin-none">
<?php echo $this->Paginator->prev('« ', array('class' => ''));?>
<?php echo $this->Paginator->numbers(['modulus' => 4]); ?>
<?php echo $this->Paginator->next(' »', array('class' => '')); ?>
</ul>
				</div>
			</div>
	</div>
	<div class="clearfix"></div>
		<!-- Start Featured -->
	<div class="col-md-12">
		<?php foreach ($inventory as $inv) { ?>
			<!-- course -->
			<div class="widget media margin-none ">
			
			  	<a class="pull-left bg-success innerAll text-center text-white" href="#"><img src="https://chart.googleapis.com/chart?cht=qr&chs=80x80&chld=L|0&chl=https://app.dealershipperformancecrm.com/dealer_settings/process_qr/<?php echo $inv['XmlInventory']['id'];
				//.'/'.$this->Session->read('User.random_code');
				?>"/></a>
			  	<div class="media-body innerAll">
					
			    	<h4 class="media-heading"><?php echo $this->Html->link($inv['XmlInventory']['vehtype'],
				array('controller'=>'dealer_settings','action'=>'detail_xmlinventory',$inv['XmlInventory']['id']),
				array('class'=>"text-inverse"));?> <small><?php echo $inv['XmlInventory']['make'].'---'.$inv['XmlInventory']['model']; ?></small></h4>
					<div class="clearfix"></div>
					<div class="pull-right hidden-xs">
					Dealer Name : <?php echo $inv['XmlInventory']['dealername']; ?>
					<div class="clearfix"></div>
					Dealer Phone : <?php echo $inv['XmlInventory']['telephone']; ?>
					</div>
					<div class="pull-left">
					Category : <?php echo $inv['XmlInventory']['category_name']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";?>
					Condition : <?php $detail= $inv['XmlInventory']['condition'];
										if($detail==U){echo "Used";}
										elseif($detail==N){echo "New";} echo "&nbsp;&nbsp;&nbsp;&nbsp;";
										?>
					<div class="clearfix"></div>
					Year : <?php echo $inv['XmlInventory']['year']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";?>					
					Price : <?php echo '$'.$inv['XmlInventory']['price']; echo "&nbsp;&nbsp;&nbsp;&nbsp;";?>
					Color: <?php if($inv['XmlInventory']['color']!=''){ echo $inv['XmlInventory']['color'];
													}else{ echo "N/A"; }echo "&nbsp;&nbsp;&nbsp;&nbsp;";?>
					</div>
				</div>
			</div>
			<!-- // END course -->
			<div class="separator bottom"></div>
			<?php } ?>
			<div class="pull-right">
				<div class="widget ">
					<div class="innerAll border-bottom">
<!-- Shows the next and previous links -->
<ul class="pagination margin-none">
<?php echo $this->Paginator->prev('« ', array('class' => ''));?>
<?php echo $this->Paginator->numbers(['modulus' => 4]); ?>
<?php echo $this->Paginator->next(' »', array('class' => '')); ?>
</ul>
			</div>
		</div>
	</div>
</div>
	<!-- // END col -->
	</div>
	</div>
	<!-- // END row -->