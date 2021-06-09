<?php
//This Custom form Mapped Author: Abha Sood Negi

$zone = AuthComponent::user('zone');
$dealer = AuthComponent::user('dealer');
$cid = AuthComponent::user('dealer_id');
$d_address = AuthComponent::user('d_address');
$sperson = AuthComponent::user('full_name');
$d_city = AuthComponent::user('d_city');
$d_state = AuthComponent::user('d_state');
$d_zip = AuthComponent::user('d_zip');
$d_phone = AuthComponent::user('d_phone');
$d_fax = AuthComponent::user('d_fax');
$d_email = AuthComponent::user('d_email');
$d_website = AuthComponent::user('d_website');

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<?php  if($edit) {?>
		<input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	
	<style>
		#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
		input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 15px; font-weight: normal;}
		li{margin-bottom: 7px; font-size: 15px;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<h2 style="float: left; width: 100%; text-align: center; margin: 7px 0; margin: 19px 0; font-size: 22px;">Big Sioux PowerSports <br> Trade ACV Request</h2>

		<p style="float: left; width: 100%; text-align: center; margin: 7px 0;">Please Email to wade.s@bigsiouxpower.com or Fax: (605)-274-6919 <br> Wade Schuck Cell: 605-212-9251</p>
		
		<p style="float: left; width: 100%; text-align: center; margin: 7px 0;">Dealership: Harley-Davidson of Fargo #3449
Sales Manager: Brandon</p>
		
		<div class="row" style="float: left; width: 100%; text-align: center;">
			<div class="form-field" style="display: inline-block;">
				<label>Phone:</label>
				<strong>701-277-1000</strong>
			</div>
			<div class="form-field" style="margin: 0 5%; display: inline-block;">
				<label>Cell:</label>
				<strong>701-936-0633</strong>
			</div>
			<div class="form-field" style="display: inline-block;">
				<label>Fax:</label>
				<strong>701-281-3001</strong>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>DATE:</label>
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 94%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>SALES PERSON:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 87%">
			</div>
			
			<strong style="text-align: left; float: left; width: 100%; display: block;">Please be <span style="color: #ff0000;">EXACT </span> on bike specifications:</strong>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>YEAR:</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 94%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>MAKE:</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 93.5%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>MODEL:</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 92.4%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>MILES:</label>
				<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 93%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>COLORS:</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 91.5%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 95%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0; ">
				<label style="vertical-align: top;">CONDITION:</label>
				<textarea name="condition" style="height: 90px; border: 1px solid #000; width: 89%"><?php echo isset($info['condition'])?$info['condition']:''; ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="vertical-align: top;">EXTRAS:</label>
				<textarea name="extra" style="height: 90px; border: 1px solid #000; width: 91%"><?php echo isset($info['extra'])?$info['extra']:''; ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label style="vertical-align: top;">RECON:</label>
				<textarea name="recon" style="height: 90px; border: 1px solid #000; width: 92%"><?php echo isset($info['recon'])?$info['recon']:''; ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>NPA: $</label>
				<input type="text" name="npa" value="<?php echo isset($info['npa']) ? $info['npa'] : ''; ?>" style="width: 94%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Black Book: $</label>
				<input type="text" name="black_book" value="<?php echo isset($info['black_book']) ? $info['black_book'] : ''; ?>" style="width: 89%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>NADA: $</label>
				<input type="text" name="nada" value="<?php echo isset($info['nada']) ? $info['nada'] : ''; ?>" style="width: 92%">
			</div>
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Kelly Blue Book: $</label>
				<input type="text" name="blue_book" value="<?php echo isset($info['blue_book']) ? $info['blue_book'] : ''; ?>" style="width: 86%">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 20px 0;">
				<label>AGREED BIG SIOUX POWERSPORTS BUY BID:  $</label>
				<input type="text" name="buy_bid" value="<?php echo isset($info['buy_bid']) ? $info['buy_bid'] : ''; ?>" style="width: 62%">
			</div>

			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Big Sioux Powersports Buy Bid Signature:</label>
				<input type="text" name="bid_signature" value="<?php echo isset($info['bid_signature']) ? $info['bid_signature'] : ''; ?>" style="width: 70%">
			</div>
			
		</div>
	</div>
	<!-- worksheet end -->
		
	<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>

	<script type="text/javascript">
	$(document).ready(function(){
		$(".date_input_field").bdatepicker();
		
		$('#worksheet_wraper').stop().animate({
		  scrollTop: $("#worksheet_wraper")[0].scrollHeight
		}, 800);
		
		$("#worksheet_container").scrollTop(0);

		$("#btn_print").click(function(){
			$( "#worksheet_container" ).printThis();
		});
		
		$("#btn_back").click(function(){ });
	});
	</script>
</div>