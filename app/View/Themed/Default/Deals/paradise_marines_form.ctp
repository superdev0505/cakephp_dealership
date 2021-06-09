<?php

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');

$d_address = AuthComponent::user('d_address');
//echo $daddress;

$sperson = AuthComponent::user('full_name');

$d_city = AuthComponent::user('d_city');
//echo $dcity;

$d_state = AuthComponent::user('d_state');
//echo $dstate;

$d_zip = AuthComponent::user('d_zip');
//echo $dzip;

$d_phone = AuthComponent::user('d_phone');
//echo $dphone;

$d_fax = AuthComponent::user('d_fax');
//echo $dfax;

$d_email = AuthComponent::user('d_email');
//echo $demail;

$d_website = AuthComponent::user('d_website');
//echo $dwebsite;

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;
//echo "<pre>";
//print_r($info);
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
    <input type="hidden" id="paradise" class="pmc_total" value="<?php echo (isset($info['paradise']) && !empty($info['paradise'])) ? $info['paradise'] : $info['paradise']; ?>" name="paradise">
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	input[type="file"]{ border-bottom: 0px; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 15px; font-weight: normal; margin: 0;}
	
@media print {
	input[type="text"]{padding: 0px;}
.dontprint{display: none;}
.left-list ul {list-style: none !important;}
.left-side span {margin: 14px 0 !important;}
.right-list ul {list-style: none !important;}
.file1 {display: none !important;}
.file2 {display: none !important;}
.file3 {display: none !important;}
.sea_fox {width: 27.9% !important;}
label{height: 21px !important; line-height: 21px !important;}
.second-page{margin-top: 13% !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 0; background: #000;">
			<div class="logo" style="float: left; width: 100%; position: relative;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/header-bg.jpg'); ?>" alt="" style="width: 100%;">
				<!--<div class="text" style="position: absolute; top: 40%; color: #fff; text-align: center; right: 23%;">
					<p style="margin: 3px 0; color: #fff;"><b>251.968.2628</b></p>
					<p style="margin: 6px 0; color: #fff;">6940A Hwy 59 North</p>
					<p style="margin: 6px 0 2px; color: #fff;">Gulf Shores, AL 36542</p>
					<p style="margin: 3px 0; color: #fff;"><b><span style="color: orange;">PARADISEMARINE</span>.com</b></p>
				</div>-->
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; padding: 10px; box-sizing: border-box; border-top: 0px;">
			<!-- <h2 style="float: left; width: 100%; font-size: 20px; margin: 15px 0; text-align: center;"><b>2017 SEA FOX 288 COMMANDER</b></h2> -->
			<input type="text" name="commander" value="<?php echo isset($info['commander']) ? $info['commander'] : ''; ?>" style="float: left; width: 45%; font-size: 20px;border-bottom: 1px solid #e2e1e1;margin: auto 259px;">
			<div class="left-side sea_fox" style="float: left; width: 29%;">
				<label style="margin: 7px 0;">VIN:</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>">
				<label style="margin: 7px 0;">STOCK #:</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>">
				<label style="margin: 7px 0;">ENGINE 1:</label>
				<input type="text" name="engine1" value="<?php echo isset($info['engine1']) ? $info['engine1'] : ''; ?>">
				<label style="margin: 7px 0;">ENGINE 2:</label>
				<input type="text" name="engine2" value="<?php echo isset($info['engine2']) ? $info['engine2'] : ''; ?>">
				<label style="margin: 7px 0;">TRAILER:</label>
				<input type="text" name="trailer" value="<?php echo isset($info['trailer']) ? $info['trailer'] : ''; ?>">
				<label style="margin: 7px 0;">COLOR (EXT):</label>
				<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>">
			</div>
			
			<div class="right" style="float: right; width: 60%; margin-top: 30px;">
				<input type="file" class="file3" onchange="previewFile3()"><br>
				<img class="file-img3" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logo-sea.jpg'); ?>" style="width: 100%;height: 111px;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; border-top: 0px;">
			<!-- left side start -->
			<div class="left-side pmc" style="float: left; width: 40%; border-right: 1px solid #000; box-sizing: border-box; padding: 0px 0;">
				<h3 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 17px;"><b>SPECIFICATIONS</b></h3>
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 0 30px;">
					<label>LENGTH:</label>
					<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : ''; ?>" placeholder="28'">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 0 30px;">
					<label>WIDTH:</label>
					<input type="text" name="width" value="<?php echo isset($info['width']) ? $info['width'] : ''; ?>" placeholder="9'8''">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 0 30px;">
					<label>WEIGHT:</label>
					<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" placeholder="6,000 LB">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 0 30px;">
					<label>DRAFT:</label>
					<input type="text" name="draft" value="<?php echo isset($info['draft']) ? $info['draft'] : ''; ?>" placeholder="18''">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 0 30px;">
					<label>FUEL CAPACITY:</label>
					<input type="text" name="fuel" value="<?php echo isset($info['fuel']) ? $info['fuel'] : ''; ?>" placeholder="207 GAL">
				</div>
				
				<div class="form-field" style="float: left; width: 100%; margin: 0; padding: 0 30px;">
					<label>PERSONS CAPACITY:</label>
					<input type="text" name="person" value="<?php echo isset($info['person']) ? $info['person'] : ''; ?>" placeholder="YC" style="width: 50%;">
				</div>	
				
				<h2 style="float: left; width: 100%; margin: 0; text-align: center; background: #000; margin: 10px 0; padding: 10px; box-sizing: border-box; color: #fff; font-size: 16px;">ALL PRICES <span style="text-decoration: underline; color: #fff; font-size: 15px;">INCLUDE</span> CUSTOM TRAILERS!</h2>
				
				<div class="marine-thumb" style="width: 100%; padding: 3px 20px; box-sizing: border-box;">
					<input type="file" class="file1" onchange="previewFile1()" style="margin-left: 60px;"><br>
					<img class="file-img1" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/file1.png'); ?>" style="width: 100%; height: 184px;">
					<input type="file" class="file2" onchange="previewFile2()" style="margin-left: 60px;">
					<img class="file-img2" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/file2.png'); ?>" style="width: 100%; height: 195px;">
				</div>
				
				<div class="text" style="float: left; width: 100%; margin: 0; box-sizing: border-box;">
					<p style="float: left; width: 100%; margin: 2px 0; text-align: center; line-height: 22px">PMC<?php echo (isset($info['pmc2']) && !empty($info['pmc2'])) ? $info['pmc2'] : $info['pmc2']; ?>.<?php echo (isset($info['prep_form']) && !empty($info['prep_form'])) ? $info['prep_form'] : $info['prep_form']; ?>.<span id="pmc"></span><br> *10% DOWN, <?php echo (isset($info['month_price']) && !empty($info['month_price'])) ? $info['month_price'] : $info['month_price']; ?> MONTHS @ 4.99%</p>
				</div>	
			</div>
			<!-- left side end -->
			
			<!-- right side start -->
			<div class="right-side" style="float: left; width: 60%; box-sizing: border-box;">
				<h2 style="float: left; padding: 10px; width: 100%; text-align: center; font-size: 17px; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box;"><b><input type="text" name="sea_fox" value="<?php echo isset($info['sea_fox']) ? $info['sea_fox'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 15%;font-size: 17px;"> BASE PRICE: $<?php echo (isset($info['base_price']) && !empty($info['base_price'])) ? $info['base_price'] : $info['base_price']; ?> </b></h2>
				
				<div class="row" style="float: left; width: 100%;margin: 0; box-sizing: bordor-box; border-bottom: 1px solid #000;">
					<h2 style="float: left; padding: 10px; width: 100%; text-align: center; font-size: 17px; margin: 0;"><b>INCLUDED EQUIPMENT AND ACCESSORIES</b></h2>
					
					<div class="left-list" style="width: 40%; margin-left: 5%; float: left; font-size: 15px;">
						<ul>
							<li><input type="text" name="equip1" value="<?php echo isset($info['equip1']) ? $info['equip1'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="equip2" value="<?php echo isset($info['equip2']) ? $info['equip2'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="equip3" value="<?php echo isset($info['equip3']) ? $info['equip3'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="equip4" value="<?php echo isset($info['equip4']) ? $info['equip4'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="equip5" value="<?php echo isset($info['equip5']) ? $info['equip5'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="equip6" value="<?php echo isset($info['equip6']) ? $info['equip6'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
						</ul>
					</div>
					
					<div class="right-list" style="width: 40%; float: left; margin-left: 5%;">
						<ul>
							<li><input type="text" name="access1" value="<?php echo isset($info['access1']) ? $info['access1'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="access2" value="<?php echo isset($info['access2']) ? $info['access2'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="access3" value="<?php echo isset($info['access3']) ? $info['access3'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="access4" value="<?php echo isset($info['access4']) ? $info['access4'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="access5" value="<?php echo isset($info['access5']) ? $info['access5'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
							<li><input type="text" name="access6" value="<?php echo isset($info['access6']) ? $info['access6'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 100%;"></li>
						</ul>
					</div>
				</div>
				
				<h2 style="float: left; padding: 10px; width: 100%; text-align: center; font-size: 17px; margin: 0; border-bottom: 1px solid #000; box-sizing: border-box;"><b><input type="text" name="selling_sea_fox" value="<?php echo isset($info['selling_sea_fox']) ? $info['selling_sea_fox'] : ''; ?>" style="border-bottom: 1px solid #e2e1e1;width: 15%;font-size: 17px;"> SELLING PRICE: $<?php echo (isset($info['sell_price']) && !empty($info['sell_price'])) ? $info['sell_price'] : $info['sell_price']; ?></b></h2>
				
				
				<div class="row" style="width: 100%; border-bottom: 1px solid #000; float: left; margin: 0; padding-bottom: 10px;">
					<div class="thumb" style="width: 80px; float: left;margin-left: 20px;">
						<img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/tree-left.jpg'); ?>" alt="" style="width: 100%;">
					</div>
					
					<div class="center-section" style="width: 60%; float: left; text-align: center; font-size: 24px; margin: 26px 0 0;margin-left: 2.3%;">
						<b><i>PARADISE PRICE  <br> $<?php echo (isset($info['paradise']) && !empty($info['paradise'])) ? $info['paradise'] : $info['paradise']; ?> or $<?php echo (isset($info['paradise_month']) && !empty($info['paradise_month'])) ? $info['paradise_month'] : $info['paradise_month']; ?>/month</i></b>
					</div>
					
					<div class="thumb" style="width: 80px; float: right;margin-right: 20px;">
						<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/tree-right.jpg'); ?>" alt="" style="width: 100%;">
					</div>
					
					<b style="float: left; width: 100%; display: block; color: #cc0000; text-align: center; font-size: 25px;"><i>You Save $<?php echo (isset($info['you_save']) && !empty($info['you_save'])) ? $info['you_save'] : $info['you_save']; ?> AND You Get a Trailer!</i></b>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 0; box-sizing: border-box; padding: 0px 10px;">
					<div class="left-side" style="float: left; width: 50%; margin: 0; border-right: 1px solid #000; box-sizing: border-box;">
						<span style="display: block; margin: 17px 0;"><input type="checkbox" name="freight_check" <?php echo ($info['freight_check'] == "freight") ? "checked" : ""; ?> value="freight"/> FREIGHT: <input type="text" class="pmc_total" name="freight_price" value="<?php echo isset($info['freight_price']) ? $info['freight_price'] : ''; ?>" style="width: 45%;font-weight: bold;font-size: 16px;"></span>
						<span style="display: block; margin: 17px 0;"><input type="checkbox" name="fuel_check" <?php echo ($info['fuel_check'] == "fuel") ? "checked" : ""; ?> value="fuel"/> DEALER PREP & FUEL: <input type="text" class="pmc_total" name="fuel_price" value="<?php echo isset($info['fuel_price']) ? $info['fuel_price'] : ''; ?>" style="width: 25%;font-size: 16px;font-weight: bold;"></span>
						<span style="display: block; margin: 17px 0;"><input type="checkbox" name="prop_check" <?php echo ($info['prop_check'] == "prop") ? "checked" : ""; ?> value="prop_price"/> SS PROP UPGRADE: <input type="text" class="pmc_total" name="access4" value="<?php echo isset($info['prop_price']) ? $info['prop_price'] : ''; ?>" style="width: 33%;font-weight: bold;font-size: 16px;"></span>
						<span style="display: block; margin: 17px 0;"><input type="checkbox" name="safety_check" <?php echo ($info['safety_check'] == "safety") ? "checked" : ""; ?> value="safety"/> SAFETY GEAR & ANCHOR: <input type="text" class="pmc_total" name="safety_price" value="<?php echo isset($info['safety_price']) ? $info['safety_price'] : ''; ?>" style="width: 17%;    font-weight: bold; font-size: 16px;"></span>
						<span style="display: block; margin: 17px 0;"><input type="checkbox" name="battery_check" <?php echo ($info['battery_check'] == "battery") ? "checked" : ""; ?> value="battery"/> ADDITIONAL BATTERY: <input type="text" class="pmc_total" name="battery_price" value="<?php echo isset($info['battery_price']) ? $info['battery_price'] : ''; ?>" style="width: 27%;font-size: 16px; font-weight: bold;"></span>
						<span style="display: block; margin: 22px 0;"><input type="checkbox" name="trailer_check" <?php echo ($info['trailer_check'] == "trailer") ? "checked" : ""; ?> value="trailer"/> CUSTOM TRAILER: <b style="color: #ff0000"><i>INCLUDED!</i></b></span>
					</div>
					
					<div class="right-side" style="float: right; width: 50%; box-sizing: border-box;">
						<b style="display: block; text-align: center; text-decoration: underline;"><i>TOTAL PACKAGE PRICE</i></b>
						<textarea name="note" style="width: 100%; height: 150px; border: 0px;"><?php echo isset($info['note']) ? $info['note'] : ''; ?></textarea>
					</div>
				</div>
			</div>
			<!-- right side end -->
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 10px 0;">
			<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/footer-bg.jpg'); ?>" alt="" style="width: 100%;">
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

function previewFile1() {
		  var preview = document.querySelector('.file-img1');
		  var file    = document.querySelector('.file1').files[0];
		  var reader  = new FileReader();
 
		  reader.addEventListener("load", function () {
		    preview.src = reader.result;
		  }, false);

		  if (file) {
		    reader.readAsDataURL(file);
		  }
		}
function previewFile2() {
		  var preview = document.querySelector('.file-img2');
		  var file    = document.querySelector('.file2').files[0];
		  var reader  = new FileReader();

		  reader.addEventListener("load", function () {
		    preview.src = reader.result;
		  }, false);

		  if (file) {
		    reader.readAsDataURL(file);
		  }
		}
function previewFile3() {
		  var preview = document.querySelector('.file-img3');
		  var file    = document.querySelector('.file3').files[0];
		  var reader  = new FileReader();

		  reader.addEventListener("load", function () {
		    preview.src = reader.result;
		  }, false);

		  if (file) {
		    reader.readAsDataURL(file);
		  }
		}

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
		var cal_subtotal = 0.00;
		$( ".pmc_total" ).each(function( index ) {
			cal_subtotal += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
		});
		$("#pmc").html(cal_subtotal);

		function pmc_subtotal() {
				var cal_subtotal = 0.00;
				$( ".pmc_total" ).each(function( index ) {
					cal_subtotal += isNaN(parseFloat($(this).val()))?0.00:parseFloat($(this).val());
				});
				$("#pmc").html(cal_subtotal);
			}

			$(".pmc_total").on('change keyup paste',function(){
				pmc_subtotal();
			});

	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
