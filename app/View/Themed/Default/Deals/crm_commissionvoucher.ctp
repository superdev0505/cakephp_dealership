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
	<div id="worksheet_container" style="width: 1000px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; font-weight: normal; margin: 0;}
	span{font-size: 12px; padding: 2px 0;}
	input[type="text"]{padding: 1px !important; }
@media print {
	input[type="text"]{padding: 1px;}
.dontprint{display: none;}
label{height: 21px !important; line-height: 21px !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 0 0 10px; text-align: center; font-size: 16px; text-decoration: underline;">COMMISSION VOUCHER</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="leftside" style="float: left; width: 20%;">
				<label><b>Salesman</b></label>
			</div>
			<div class="rightside" style="width: 80%; margin: 0; float: right;">
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 40%; margin: 0;">
						<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="float: left; width: 100%;">
					</div>
					
					<div class="form-field" style="float: right; width: 40%; margin: 0;">
						<input type="text" name="salesperson1" value="<?php echo isset($info['salesperson1'])?$info['salesperson1']:''; ?>" style="float: left; width: 100%;">
					</div>
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="leftside" style="float: left; width: 20%;">
				<label><b>Customer</b></label>
			</div>
			<div class="rightside" style="width: 80%; margin: 0; float: right;">
				<div class="row" style="float: left; width: 100%;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<input type="text" name="customer_data" value="<?php echo isset($info['customer_data']) ? $info['customer_data'] :  $info['first_name']." ".$info['last_name']; ?>" style="float: left; width: 100%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 30%; margin: 0;">
						<label>Delivery Date:</label>
						<input type="text" name="del_date" value="<?php echo isset($info['del_date'])?$info['del_date']:''; ?>" style="width: 60%;">
					</div>
					
					<div class="form-field" style="float: left; width: 40%; margin: 0;">
						<label>At:</label>
						<input type="text" name="at" value="<?php echo isset($info['at'])?$info['at']:''; ?>" style="width: 87%;">
					</div>
					
					<div class="form-field" style="float: left; width: 30%; margin: 0;">
						<label>SPRING:</label>
						<input type="text" name="spring" value="<?php echo isset($info['spring'])?$info['spring']:''; ?>" style="width: 72%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 33%; margin: 0;">
						<label>Year:</label>
						<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 80%;">
					</div>
					
					<div class="form-field" style="float: left; width: 34%; margin: 0;">
						<label>Make:</label>
						<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 80%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; margin: 0;">
						<label>Model:</label>
						<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 100%; margin: 0;">
						<label>Serial:</label>
						<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 94%;">
					</div>
				</div>
				
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="leftside" style="float: left; width: 20%;">
				<label><b>Trade Information</b></label>
			</div>
			<div class="rightside" style="width: 80%; margin: 0; float: right;">
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Year:</label>
						<input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width: 84%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Allowed:</label>
						<input type="text" name="allowed" value="<?php echo isset($info['allowed'])?$info['allowed']:''; ?>" style="width: 84%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>ACV:</label>
						<input type="text" name="acv" value="<?php echo isset($info['acv'])?$info['acv']:''; ?>" style="width: 83%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Make:</label>
						<input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width: 88%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Model:</label>
						<input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Type:</label>
						<input type="text" name="type_trade" value="<?php echo isset($info['type_trade'])?$info['type_trade']:''; ?>" style="width: 84%;">
					</div>
				</div>
			</div>	
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="leftside" style="float: left; width: 20%;">
				<label><b>Sold Unit Information</b></label>
			</div>
			<div class="rightside" style="width: 80%; margin: 0; float: right;">
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Price:</label>
						<input type="text" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width: 82%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Days on Lot:</label>
						<input type="text" name="lot" value="<?php echo isset($info['lot'])?$info['lot']:''; ?>" style="width: 78%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Invoice:</label>
						<input type="text" name="invoice" value="<?php echo isset($info['invoice'])?$info['invoice']:''; ?>" style="width: 79%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Lender:</label>
						<input type="text" name="lender" value="<?php echo isset($info['lender'])?$info['lender']:''; ?>" style="width: 87%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Pack:</label>
						<input type="text" name="pack" value="<?php echo isset($info['pack'])?$info['pack']:''; ?>" style="width: 83%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Financed Amt:</label>
						<input type="text" name="financed" value="<?php echo isset($info['financed'])?$info['financed']:''; ?>" style="width: 75%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Trade Allow Difference:</label>
						<input type="text" name="trade_allow" value="<?php echo isset($info['trade_allow'])?$info['trade_allow']:''; ?>" style="width: 55%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Buy Rate:</label>
						<input type="text" name="buy_rate" value="<?php echo isset($info['buy_rate'])?$info['buy_rate']:''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Internal Cost:</label>
						<input type="text" name="internal_cost" value="<?php echo isset($info['internal_cost'])?$info['internal_cost']:''; ?>" style="width: 71%;">
					</div>
					
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Sell Rate:</label>
						<input type="text" name="sell_rate" value="<?php echo isset($info['sell_rate'])?$info['sell_rate']:''; ?>" style="width: 83%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: right; width: 50%; margin: 0;">
						<label>% Earned:</label>
						<input type="text" name="earned" value="<?php echo isset($info['earned'])?$info['earned']:''; ?>" style="width: 82%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: right; width: 50%; margin: 0;">
						<label>Point Markup:</label>
						<input type="text" name="markup" value="<?php echo isset($info['markup'])?$info['markup']:''; ?>" style="width: 76%;">
					</div>
				</div>
				
				
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Net Unit Profit::</label>
						<input type="text" name="net_profit" value="<?php echo isset($info['profit'])?$info['profit']:''; ?>" style="width: 67%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Finance Profit:</label>
						<input type="text" name="finance_profit" value="<?php echo isset($info['finance_profit'])?$info['finance_profit']:''; ?>" style="width: 69%;">
					</div>
				</div>
				
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 33%; margin: 0;">
						<label>Extended Warranty Profit:</label>
						<input type="text" name="ext_profit" value="<?php echo isset($info['ext_profit'])?$info['ext_profit']:''; ?>" style="width: 36%;">
					</div>
					
					<div class="form-field" style="float: left; width: 34%; margin: 0;">
						<label>ESC Price:</label>
						<input type="text" name="esc_price" value="<?php echo isset($info['esc_price'])?$info['esc_price']:''; ?>" style="width: 70%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; margin: 0;">
						<label>ESC Cost:</label>
						<input type="text" name="esc_cost" value="<?php echo isset($info['esc_cost'])?$info['esc_cost']:''; ?>" style="width: 72%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 33%; margin: 0;">
						<label>GAP Profit:</label>
						<input type="text" name="gap_profit" value="<?php echo isset($info['gap_profit'])?$info['gap_profit']:''; ?>" style="width: 67%;">
					</div>
					
					<div class="form-field" style="float: left; width: 34%; margin: 0;">
						<label>GAP Price:</label>
						<input type="text" name="gap_price" value="<?php echo isset($info['gap_price'])?$info['gap_price']:''; ?>" style="width: 70%;">
					</div>
					
					<div class="form-field" style="float: left; width: 33%; margin: 0;">
						<label>GAP Cost:</label>
						<input type="text" name="gap_cost" value="<?php echo isset($info['gap_cost'])?$info['gap_cost']:''; ?>" style="width: 72%;">
					</div>
				</div>
			</div>	
		</div>
		
		
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="leftside" style="float: left; width: 20%;">
				<label><b>Commissions - Payable</b></label>
			</div>
			<div class="rightside" style="width: 80%; margin: 0; float: right;">
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Sales Commission:</label>
						<input type="text" name="sales_commission" value="<?php echo isset($info['sales_commission'])?$info['sales_commission']:''; ?>" style="width: 64%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Finance:</label>
						<input type="text" name="finance" value="<?php echo isset($info['finance'])?$info['finance']:''; ?>" style="width: 79%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Extended Warranty:</label>
						<input type="text" name="ext_warranty" value="<?php echo isset($info['ext_warranty'])?$info['ext_warranty']:''; ?>" style="width: 62%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>GAP:</label>
						<input type="text" name="gap" value="<?php echo isset($info['gap'])?$info['gap']:''; ?>" style="width: 83%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>Age Spif:</label>
						<input type="text" name="age_spif" value="<?php echo isset($info['age_spif'])?$info['age_spif']:''; ?>" style="width: 77%;">
					</div>
				</div>
			</div>	
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="leftside" style="float: left; width: 20%;">
				<label><b>Total Payable Commissions</b></label>
			</div>
			<div class="rightside" style="width: 80%; margin: 0; float: right;">
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label>PHIL PASTERNAK:</label>
						<input type="text" name="phil" value="<?php echo isset($info['phil'])?$info['phil']:''; ?>" style="width: 60%;">
					</div>
				</div>
				
				<div class="row" style="float: left; width: 100%; margin: 2px 0;">
					<div class="form-field" style="float: left; width: 50%; margin: 0;">
						<label><b>Total</b>:</label>
						<input type="text" name="total" value="<?php echo isset($info['total'])?$info['total']:''; ?>" style="width: 82%;">
					</div>
				</div>
			</div>	
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 20px 0 7px; border-top: 2px solid #000; padding: 20px 0 0;">
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0 10px;">
				<label>Date Prepared:</label>
				<input type="text" name="date_prepared" value="<?php echo isset($info['date_prepared'])?$info['date_prepared']:''; ?>" style="width: 80%; float: right;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0 10px;">
				<label>Salesman:</label>
				<input type="text" name="sales_man1" value="<?php echo isset($info['sales_man1'])?$info['sales_man1']:''; ?>" style="width: 49%; float: right;">
				<span style="float: right;">X</span>
				<input type="text" name="sales_man1_x" value="<?php echo isset($info['sales_man1_x'])?$info['sales_man1_x']:''; ?>" style="width: 30%; float: right;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0 10px;">
				<label>Salesman 2 (If Applicable):</label>
				<input type="text" name="sales_man2" value="<?php echo isset($info['sales_man2'])?$info['sales_man2']:''; ?>" style="width: 49%; float: right;">
				<span style="float: right;">X</span>
				<input type="text" name="sales_man2_x" value="<?php echo isset($info['sales_man2_x'])?$info['sales_man2_x']:''; ?>" style="width: 30%; float: right;">
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0 10px;">
				<label>Terry Vaughn:</label>
				<input type="text" name="terry_vaug" value="<?php echo isset($info['terry_vaug'])?$info['terry_vaug']:''; ?>" style="width: 80%; float: right;">
				<span style="float: right;">X</span>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0 10px;">
				<label>VERIFIED:</label>
				<input type="text" name="verified" value="<?php echo isset($info['verified'])?$info['verified']:''; ?>" style="width: 80%; float: right;">
				<span style="float: right;">X</span>
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
