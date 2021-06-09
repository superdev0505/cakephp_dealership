<?php
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
      <?php  if($edit){?>
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
	label{font-size: 14px; margin-bottom: 0px; font-weight: normal !important;}
	.wraper.main input {padding: 1px;}
		.list{width: 80%; display: inline-block; margin: 0; padding: 0;}
	.list li{display: inline-block; list-style: none; margin: 0 3%;}
@media print {
	h2{background-color: #ccc;}	
.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="logo" style="width: 80%; margin: 0 auto;">

				<?php if ($cid == 4435 || $cid == 4430) { ?>
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/j-l-harley-logo.png'); ?>" alt="" style="width: 100%;">
				<?php }elseif ($cid == 4440 || $cid == 1370 || $cid == 112 || $cid == 760 || $cid ==762 || $cid == 2501) { ?> 
					<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/combo-logo.jpg'); ?>" alt="" style="width: 100%;">
				<?php } ?> 
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 25%;">
				<label>DATE:</label>
				<input type="text" name="date" value="<?php echo isset($info['date']) ? $info['date'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-filed" style="float: left; width: 25%;">
				<label>YEAR:</label>
				<input type="text" name="year"  value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 77%;">
			</div>
			
			<div class="form-filed" style="float: left; width: 25%;">
				<label>MAKE:</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 76%;">
			</div>
			
			<div class="form-filed" style="float: right; width: 25%;">
				<label>MODEL:</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 72%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 70%;">
				<div class="form-filed" style="float: left; width: 100%;">
					<label>VIN:</label>
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 92%;">
				</div>
			</div>
			<div class="right" style="float: left; width: 30%;">
				<div class="form-filed" style="float: left; width: 35%;">
					<label>BRING$</label>
				</div>
				<div class="form-filed" style="float: left; width: 65%;">
					<label>(A)</label>
					<input type="text" name="sales_A" value="<?php echo isset($info['sales_A']) ? $info['sales_A'] : ''; ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 70%;">
				<div class="form-filed" style="float: left; width: 40%;">
					<label>COLOR:</label>
					<input type="text" name="unit_color" value="<?php echo isset($info['unit_color']) ? $info['unit_color'] : ''; ?>" style="width: 74%;">
				</div>
				<div class="form-filed" style="float: left; width: 60%;">
					<label>MILES:</label>
					<input type="text" name="miles" value="<?php echo isset($info['miles']) ? $info['miles'] : ''; ?>" style="width: 82%;">
				</div>
			</div>
			<div class="right" style="float: left; width: 30%;">
				<div class="form-filed" style="float: left; width: 35%;">
					<label>/1.2</label>
				</div>
				<div class="form-filed" style="float: left; width: 65%;">
					<label>(B)</label>
					<input type="text" name="sales_B" value="<?php echo isset($info['sales_B']) ? $info['sales_B'] : ''; ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 70%;">
				<div class="form-filed" style="float: left; width: 40%;">
					<label>RECON:  BATTERY YEAR</label>
					<input type="text" name="battery_year" value="<?php echo isset($info['battery_year']) ? $info['battery_year'] : ''; ?>" style="width: 33%;">
				</div>
				<div class="form-filed" style="float: left; width: 30%;">
					<label>CAM SHOES</label>
					<input type="text" name="cam_shoes" value="<?php echo isset($info['cam_shoes']) ? $info['cam_shoes'] : ''; ?>" style="width: 52%;">
				</div>
				<div class="form-filed" style="float: left; width: 20%;">
					<label>TIRES F</label>
					<input type="text" name="tires_f" value="<?php echo isset($info['tires_f']) ? $info['tires_f'] : ''; ?>" style="width: 52%;">
				</div>
				<div class="form-filed" style="float: left; width: 10%;">
					<label>R</label>
					<input type="text" name="tires_r" value="<?php echo isset($info['tires_r']) ? $info['tires_r'] : ''; ?>" style="width: 48%;">
				</div>
			</div>
			<div class="right" style="float: left; width: 30%;">
				<div class="form-filed" style="float: left; width: 35%;">
					<label>-RECON</label>
				</div>
				<div class="form-filed" style="float: left; width: 65%;">
					<label>(C)</label>
					<input type="text" name="sales_C" value="<?php echo isset($info['sales_C']) ? $info['sales_C'] : ''; ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 70%;">
				<div class="form-filed" style="float: left; width: 20%;">
					<label>BUFF</label>
					<input type="text" name="buff" value="<?php echo isset($info['buff']) ? $info['buff'] : ''; ?>" style="width: 62%;">
				</div>
				<div class="form-filed" style="float: left; width: 35%;">
					<label>HARLEY TUNER? </label>
					<input type="text" name="harley_tuner" value="<?php echo isset($info['harley_tuner']) ? $info['harley_tuner'] : ''; ?>" style="width: 46%;">
				</div>
				<div class="form-filed" style="float: left; width: 45%;">
					<input type="text" name="name" style="width: 93%;">
				</div>
			</div>
			<div class="right" style="float: left; width: 30%;">
				<div class="form-filed" style="float: left; width: 35%;">
					<label>B-C= ACV</label>
				</div>
				<div class="form-filed" style="float: left; width: 65%;">
					<label>(D)</label>
					<input type="text" name="sales_D" value="<?php echo isset($info['sales_D']) ? $info['sales_D'] : ''; ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 70%;">
				<div class="form-filed" style="float: left; width: 100%;">
					<input type="text" name="floor_text" value="<?php echo isset($info['floor_text']) ? $info['floor_text'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
			<div class="right" style="float: left; width: 30%;">
				<div class="form-filed" style="float: left; width: 35%;">
					<label>FLOOR $</label>
				</div>
				<div class="form-filed" style="float: left; width: 65%;">
					<label>(E)</label>
					<input type="text" name="sales_E" value="<?php echo isset($info['sales_E']) ? $info['sales_E'] : ''; ?>" style="width: 81%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="left" style="float: left; width: 70%;">
				<div class="form-filed" style="float: left; width: 100%;">
					<input type="text" name="floor_text" value="<?php echo isset($info['floor_text']) ? $info['floor_text'] : ''; ?>" style="width: 100%;">
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0;">
				<div class="form-filed" style="float: left; width: 16%;">
					<label>MANUAL</label>
						<span><input type="radio" name="manual" value="<?php echo isset($info['manual']) ? $info['manual'] : ''; ?>"> Y/
						<input type="radio" name="name" value="<?php echo isset($info['manual']) ? $info['manual'] : ''; ?>"> N</span>
				</div>
				
				<div class="form-filed" style="float: left; width: 16%; margin: 0 2%;">
					<label>2 KEYS</label>
					<span><input type="radio" name="key" value="<?php echo isset($info['key']) ? $info['key'] : ''; ?>"> Y/<input type="radio" name="key" value="<?php echo isset($info['key']) ? $info['key'] : ''; ?>"> N</span>
				</div>
				
				<div class="form-filed" style="float: left; width: 16%;">
					<label>ESP</label>
					<span><input type="radio" name="esp" value="<?php echo isset($info['esp']) ? $info['esp'] : ''; ?>"> Y/<input type="radio" name="name" value="<?php echo isset($info['esp']) ? $info['esp'] : ''; ?>"> N</span>
				</div>
				
				<div class="form-filed" style="float: left; width: 30%;">
					<label>ANY DAMAGE ON TITLE?</label>
					<span><input type="radio" name="damage" value="<?php echo isset($info['damage']) ? $info['damage'] : ''; ?>"> Y/<input type="radio" name="name" value="<?php echo isset($info['damage']) ? $info['damage'] : ''; ?>"> N</span>
				</div>
				
				<div class="form-filed" style="float: left; width: 16%;">
					<input type="text" name="name" style="width: 100%;">
				</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0;">
			<label>SCALE OF 1-10:</label>
			<ul class="list">
				<li>1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
				<li>5</li>
				<li>6</li>
				<li>7</li>
				<li>8</li>
				<li>9</li>
				<li>10</li>
			</ul>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 30px;">
			<div class="form-filed" style="float: left; width: 100%;">
				<label>ACCESSORIES:</label>
				<input type="text" name="accessories" value="<?php echo isset($info['accessories']) ? $info['accessories'] : ''; ?>" style="width: 87%;">
			</div>
		</div> 
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 49%;">
				<label>CUSTOMER:</label>
				<input type="text" name="customer" value="<?php echo isset($info['customer'])?$info['customer']:$info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
			</div>	
			<div class="form-filed" style="float: right; width: 49%;">
				<label>SALESMAN:</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 35%;">
				<label>APPRAISED BY:  (Manager)</label>
				<input type="text" name="appraised_by" value="<?php echo isset($info['appraised_by']) ? $info['appraised_by'] :  ''; ?>" style="width: 46%;">
			</div>
			<div class="form-filed" style="float: left; width: 35%;">
				<label>(Service Writer)</label>
				<input type="text" name="service_writer" value="<?php echo isset($info['service_writer'])?$info['service_writer']:''; ?>" style="width: 68%;">
			</div>
			<div class="form-filed" style="float: right; width: 30%;">
				<label>(3)</label>
				<input type="text" name="3" value="<?php echo isset($info['3']) ? $info['3'] :  ''; ?>" style="width: 89%;">
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

	//alert("please select a fee");	
	
	$(".date_input_field").bdatepicker();

	/*$('#est_payoff').on('change keyup paste',function(){
		
		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/
		
	
	/*
	if( $('#sell_price').val() != '' && $('#sell_price').val() > 0 ){
		downpayment = ($('#sell_price').val() / 100 ) * 25;
		$('#down_pay').val( downpayment.toFixed(2)  ) ;
	}
	*/
		
	
	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);
	

	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis();
	});
	
	$("#btn_back").click(function(){
		
	});


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
