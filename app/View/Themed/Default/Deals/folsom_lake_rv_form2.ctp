<?php
// updated
$dealer_not_tax_payoff = array(2501,576);

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');
$dealer_id =$cid;
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
$expectedt = date('Y-m-d H:i:s');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;

?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("Deal", array('type'=>'post','class'=>'apply-nolazy')); ?>
	<div id="worksheet_container" style="width: 1031px;">
		<style>
body{ margin:0 7%; padding:0; font-family:Georgia, "Times New Roman", Times, serif; font-size:13px; border:solid 6px #32543C;}

.folsom{}
.folsom h1{ font-size:22px; color:000; margin:0; font-weight:normal;}
.folsom p{ font-size:16px; color:000; margin:0;}
.inp_frm{ width:30%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
.inp_frm2{ width:60%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
.inp_frm3{ width:20%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
.inp_frm4{ width:65%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#000; margin:5px 0; font-size:17px; } 
.inp_frm5{ width:10%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
.inp_frm6{ width:15%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}
.inp_frm7{ width:22.7%; border-bottom:solid 2px #000; border-top:none; border-right:none; border-left:none; background:none; font-size:14px; color:#ccc; margin:5px 0;}



.top_sty{ width:60%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.top_sty2{ width:100%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms{ width:70%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms2{ width:46%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms3{ width:24%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms4{ width:76%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}
.cutmar_nms5{ width:86%; border-bottom:solid 2px #000; border-right:none; border-left:none; border-top:none; color:#333333; font-size:14px; margin:5px 0;}

</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 
		<?php //pr($contact); ?>
        <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
		<input name="contact_id" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="ref_num" type="hidden"  value="<?php echo $info['contact_id']; ?>" />
				<input name="company_id" type="hidden"  value="<?php echo $cid; ?>" />
				<input name="company" type="hidden"  value="<?php echo $dealer; ?>" />
				<input name="sperson" type="hidden"  value="<?php echo $sperson; ?>" />
				<input name="status" type="hidden"  value="<?php echo $info['status']; ?>" />
				<input name="source" type="hidden"  value="<?php echo $info['source']; ?>" />
				
				<input name="owner" type="hidden"  value="<?php echo $info['owner']; ?>" />
                <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>" />
                <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>" />
                 <input name="make" type="hidden"  value="<?php echo $info['make']; ?>" />
		
			<div class="container">
			 
				
				<table width="100%" cellpadding="0" border="1">
				 <tr>
				 <td width="30%" style="padding:6px 8px;">Quote #</td>
				 <td width="20%" style="padding:6px 8px;">Customer#</td>
				 <td width="10%" style="padding:6px 8px;">#Tires</td>
				 <td width="10%" style="padding:6px 8px;">éTVs</td>
				 <td width="30%" style="padding:6px 8px; text-align:center;"><img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/img-fm.png'); ?>"/></td>
				 </tr>
				  </table>
				  
				 <table width="100%" cellpadding="0" border="1"> 
				 <tr>
				 <td width="40%" style="padding:4px 8px;">Buyer's Name</td>
				 <td width="22%" style="padding:4px 8px; text-align:center;">Registration Choice<br/> 
				   AND / OR</td>
				   <td width="38%" style="padding:4px 8px; text-align:center;"></td>
				 </tr>
				 </table>
				 
				 <table width="100%" cellpadding="0" border="1">
				 <tr>
				 <td width="33%"  style="padding:8px 8px;">Co-Buyer's Name</td>
				 <td width="33%"  style="padding:8px 8px;">Date</td>
				 <td width="33%"  style="padding:8px 8px;">Salesperson</td>
				 </tr>
				 </table>

				  <table width="100%" cellpadding="0" border="1">
				 <tr>
				 <td width="33%"  style="padding:8px 8px;">Address</td>
				 <td width="33%"  style="padding:8px 8px;">Cell#</td>
				 <td width="33%"  style="padding:8px 8px;">HM#</td>
				 </tr>
				 </table>
				 
				 <table width="100%" cellpadding="0" border="1">
				 <tr>
				 <td width="33%"  style="padding:8px 8px;">City</td>
				 <td width="33%"  style="padding:8px 8px;">State</td>
				 <td width="33%"  style="padding:8px 8px;">Zip:</td>
				 </tr>
				 </table>
				 
				 <table width="50%" cellpadding="0" border="1" >
				 <tr>
				 <td width="100%" style="padding:9px 8px; background:#302E2F; text-align:center; font-size:22px; color:#fff;">RV </td>
				 <table width="50%"  border="1">
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">Circle One:</td>
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">NEW</td>
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">USED</td>
				 </table>
				 
				 <table width="50%"  border="1">
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Year</td>
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Make</td>
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Type</td>
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Stock</td>
				 </table>
				 
				 <table width="50%" border="1">
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">Model:</td>
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">Miles</td>
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">Other</td>
				 </table>
				 </tr>
				 </table>

				<table width="50%" cellpadding="0" border="1" style="float:right; margin-top:-191px;">
				<tr>
				 <td width="100%" style="padding:13px 8px;">Email</td>
				</tr>

				<tr>
				 <td width="100%" style="padding:13px 8px; height:140px;">Retail Market Value</td>
				 </tr>
				 
				<tr> 
				  <td width="100%" style="padding:13px 8px; line-height:25px; height:187px;">Camp Assist Package (Req.):	90-Point</br> Inspection, One-on-One Ownership Instruction,</br> Test Tow and Hitch Instruction, CoachNet</br> Roadside Assistance, Technical Support 24/7</br> (365)
				Full Interior and Exterior Detail <span style="float:right; color:#333;">$595.00</span>
				</td>
				</tr>

				<tr>
				 <td width="100%" style="padding:13px 8px; height:140px;">Total</td>
				 </tr>
				 </table>
				 
				 
				 
				 <table width="50%" cellpadding="0" border="1" >
				 <tr>
				 <td width="100%" style="padding:9px 8px; background:#302E2F; text-align:center; font-size:22px; color:#fff;">Trade </td>
				 
				 <table width="50%"  border="1">
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Year</td>
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Make</td>
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Type</td>
				 <td width="25%" style="color:#000; background:#fff; padding:10px 8px;">Stock</td>
				 </table>
				 
				 <table width="50%"  border="1">
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">Circle One:</td>
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">NEW</td>
				 <td width="33%" style="color:#000; background:#fff; padding:10px 8px;">USED</td>
				 </table>
				 
				 <table width="50%" border="1">
				 <td width="100%" style="color:#000; background:#fff; padding:10px 8px;">Lienholder:</td>
				 </table>
				 
				 <table width="50%" border="1">
				 <td width="100%" style="color:#000; background:#fff; padding:10px 8px;">Amount Owed:</td>
				 </table>
				 
				 <table width="50%" border="1">
				 <td width="100%" style="color:#000; background:#fff; padding:35px 8px;">Current monthly payment:</td>
				 </table>
				 </table>

				 
				 <table width="100%" border="1">
				 <tr style="background:#353334;">
				 <td width="35%" style="text-align:center; font-size:30px; color:#fff; padding:5px 10px;">Trade Market Value</td>
				 <td width="30%" style="text-align:center; font-size:30px; color:#fff; padding:5px 10px;">Down Payment</td>
				 <td width="35%" style="text-align:center; font-size:30px; color:#fff; padding:5px 10px;">Est. Monthly payment</td>
				 </tr>
				 
				 <tr>
				 <td width="35%" style="text-align:center; font-size:16px; color:#000; height:200px;">Trade subject to final on-site inspection</td>
				 <td width="30%" style="text-align:center; font-size:16px; color:#000; height:200px;">30%» Lender Recommendation</td>
				 <td width="35%" style="text-align:center; font-size:16px; color:#000;  height:200px;"></td>
				 </tr>
				 </table>

				  
				 <table width="100%">
				 <tr>
				 <td width="35%" style="text-align:center; font-size:30px; color:#000; padding:5px 10px;">Customers purchase offer</td>
				 </table>

				 <table width="100%">
				 <tr>
				 <td width="70%"><input name="" class="top_sty" value="X" type="text"></td>
				 <td width="30%"><input name="" class="top_sty2" value="X" type="text"></td>
				 </table>
				 
				 <table width="100%">
				 <tr>
				 <td width="70%"><input name="" class="top_sty" value="X" type="text"></td>
				 <td width="30%"><label style="font-size:14px;">Sales Manager Approval</label></td>
				 </table>
				 
				 <table width="100%">
				 <tr>
				 <td width="100%"><p style="font-size:16px; color:#000; padding:5px 0px;">This form is a tool  of negotiation  and is only binding upon acceptance of Folsom Lake RV  management.

				</p></td>
				 
				 </table>
 
			</div>
			
		</div></div>
		<br />
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary">Print Worksheet</button>
		<button class="btn btn-inverse"  data-dismiss="modal" type="button">Close</button>
		
		<select name="deal_status_id" id="deal_status_id" class="form-control" style="width: auto; display: inline-block;">
			<option value="">* Select Status</option>
			<?php foreach($deal_statuses as $key=>$value){ ?>
			<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php } ?>
		</select>
		<button type="submit" id="btn_save_quote"  class="btn btn-success">Save Quote</button>
		
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
		
	</div>
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	var actual_balance = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	var actual_value = <?php  echo (!empty($contact['Contact']['unit_value']))? $contact['Contact']['unit_value']  : "0.00" ;   ?>;
	
	function calculateProfit()
	{
		profitOption=$("#profitOption").val();
		if(profitOption=='cost_sell')
		{
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
		}
		else
		{
			freight=($("#freight").val()=='')?0:parseFloat($("#freight").val());
			prep=($("#prep").val()=='')?0:parseFloat($("#prep").val());
			doc=($("#doc").val()=='')?0:parseFloat($("#doc").val());
			profit=parseFloat($("#sell_price").val()-$("#cost").val());
			profit=parseFloat(profit+parseFloat(freight)+parseFloat(prep)+doc);
		}
		$("#profit").val(profit.toFixed(2));
		
	}
	$("#profitOption").on('change',function(){
											calculateProfit();
											
											});
	$("#calculateDown").on('click',function(){
											calculate_initial_investment();
											//alert(actual_balance);
											
											});
	$(".priceChange").on('change keyup paste',function(){
									 
									 tax_percent=$("#tax_percent").val();
									 if($("#est_payoff").val()!='');
									 update_10days_payoff();
									 if($("#doc").val()!=''&&$("freight").val()!='')
									 calculate_tax(tax_percent);
									 
									 });
									 
	$(".payment_print_option").on('change',function(){
		$val = $(this).val();
		if($(this).is(':checked'))
		{
			$("#"+$val).removeClass('noprint');	
		}else{
			$("#"+$val).addClass('noprint');
		}
	});
											 
	
	$("#cost").on('change keyup paste',function(){
									calculateProfit();
									});
	
	$(".tradeDiff").on('change keyup paste',function(){
											   allowance=parseFloat($("#trade_allowance").val());
											   if(isNaN(allowance))
											   {
												  allowance=0; 
											   }
											   est_payoff=parseFloat($("#est_payoff").val());
											   if(isNaN(est_payoff))
											   {
												  est_payoff=0; 
											   }
											   sell_price=parseFloat(actual_value-allowance);	
									
										
										 $("#sub_total").val(sell_price.toFixed(2));	   
											  /* if(allowance!='')
											   {*/
												  /* if(allowance.match(/^[0-9]+(\.[0-9]*)?$/))
												   {*/
													  
													   calculateProfit();
													   tax_percent=$("#tax_percent").val();
													   if($("#est_payoff").val()!='');
													   update_10days_payoff();
													 if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
													/*}else
												   {
													   alert("Please enter the correct amount in trade allowance");
													   $(this).focus();
												   }*/
											 /*  }
											   else
											   {
												    $("#sell_price").val(parseFloat(actual_value).toFixed(2));
													profit=parseFloat(actual_value-$("#cost").val());
												    $("#profit").val(profit.toFixed(2));
													tax_percent=$("#tax_percent").val();
													if($("#est_payoff").val()!='');
													if($("#doc").val()!=''&&$("freight").val()!='')
													calculate_tax(tax_percent);
													update_10days_payoff();
													
											   }*/
											   
											   });
		
	$("#sell_price").on('change keyup paste',function(){
											   price=parseFloat($(this).val());
											   if(isNaN(price))
											   price =0.00;
											   actual_value=price;
											   //allowance=$("#trade_allowance").val();
											   /*if(allowance.match(/^[0-9]+(\.[0-9]+)?$/))
											   {*/
												  // new_bal=parseFloat(price-parseFloat(allowance));
												  // new_bal=new_bal.toFixed(2);
												   //$("#sell_price").val(new_bal);
												 //  profit=parseFloat(new_bal-$("#cost").val());
												  // $("#profit").val(profit.toFixed(2));
											  /* }*/
											  actual_value=price;
											  calculateProfit();
											   tax_percent=$("#tax_percent").val();
											  if($("#est_payoff").val()!='');
												if($("#doc").val()!=''&&$("freight").val()!='')
													   calculate_tax(tax_percent);
											   			// update_10days_payoff();
											   });

	function calculate_tax(tax_value){
		var tax_type = $('input:radio[name=taxopt]:checked').val();
		
		/*var freight = parseFloat( $('#freight').val() );
		var prep = parseFloat( $('#prep').val() );
		var doc = parseFloat( $('#doc').val() );
		var part_serv = parseFloat( $('#part_serv').val() );
		var tag_tit = parseFloat( $('#tag_tit').val() );*/
		var sell_price = isNaN(parseFloat( $("#sell_price").val()))?0.00:parseFloat( $("#sell_price").val());
		var trade_allowance = isNaN(parseFloat( $("#trade_allowance").val()))?0.00:parseFloat( $("#trade_allowance").val());
		amount = sell_price- trade_allowance;
		if(tax_type == 'tax_vehicle_only'){
			var amount = amount;
		}else{
			//var amount = freight+prep+part_serv+sell_price; 
			amount = amount ;
		}
		$("#sub_total").val(amount.toFixed(2));
		
		var amountIncludingTax =  (parseFloat(tax_value)/100)*amount;
		
		amountIncludingTax = amountIncludingTax.toFixed(2);
		$('#tax').val( amountIncludingTax );
		
		//actual_balance = freight+prep+doc+part_serv+tag_tit+sell_price+parseFloat(amountIncludingTax); 
		actual_balance = amount + parseFloat(amountIncludingTax);
		//alert(actual_balance);
		est_payoff=parseFloat($("#est_payoff").val());
		   if(isNaN(est_payoff))
		   {
			  est_payoff=0; 
		   }
		   actual_balance = actual_balance +est_payoff;
		   $('#bal').val( actual_balance   );
		
		//calculate_initial_investment();
		
		 update_10days_payoff(); 
	}
	
	function calculate_initial_investment(){
		//$('#bal').val();
		investment = ($('#bal').val() * 25 ) / 100;
		$('#down_pay').val( investment.toFixed(2)    );
		newbal = actual_balance -  investment ;
		$('#bal').val( newbal.toFixed(2) );
	}
	
	function update_initial_investment(){
		var initialinv = $('#down_pay').val();
		var inv = 0;
		if(initialinv == '' || isNaN(initialinv)){
			inv = 0;
			$('#down_pay').val("");
		}else{
			inv = parseFloat(initialinv);
		}
		newbal = actual_balance - inv;
		$('#bal').val( newbal.toFixed(2) ); 
	}
	
	$('#down_pay').on('change keyup paste',function(){
		update_initial_investment();
		update_10days_payoff();
	});
	
	
	function get_initial_inv(){
		var initialinv = $('#down_pay').val();
		if(initialinv == '' || isNaN(initialinv)){
			return 0;
		}else{
			return parseFloat(initialinv);
		}
	}
	function get_10day_estimated(){
		est_payoff = $('#est_payoff').val();
		if(est_payoff == ''){
			return 0;
		}
		if(isNaN(est_payoff)){
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
			return 0;
		}else{
			$('#errorForPayoff').text("");
			return parseFloat(est_payoff);
		}
		
	}
	
	function update_10days_payoff(){/*
		initialinv = get_initial_inv();
		est = get_10day_estimated();
		selling_price=actual_balance;
		trade_allowance=$("#trade_allowance").val();
		if(trade_allowance.match(/^[0-9]+(\.[0-9]+)?$/)&&!($("#doc").val()!=''&&$("freight").val()!=''))
		{
			selling_price=selling_price-parseFloat(trade_allowance);
		}
		newbalance = (selling_price - initialinv ) + est;
		
		
		$('#bal').val( newbalance.toFixed(2)   );
	*/}
		
	/*$('#est_payoff').on('change keyup paste',function(){
		
		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/
		
	$("input:radio[name=taxopt]").click(function() {
		tax_value = $('#tax_percent').val();
		if(tax_value == 0){
			alert('Please select a fee');
		}else{
			calculate_tax(tax_value);
		}
		
	});
	
	$('#fixed_fee_options').change(function(){
		if( $(this).val() != ''){
			$.ajax({
				type: "get",
				cache: false,
				dataType: 'json',
				url:  "/deal_fixedfees/get_fees/"+$(this).val(),
				success: function(data){
					//console.log(data);
					$('#freight').val(data.freight_fee);
					$('#prep').val(data.prep_fee);
					$('#doc').val(data.doc_fee);
					$('#part_serv').val(parseFloat(data.parts_fee) + parseFloat(data.service_fee));
					$('#tag_tit').val(parseFloat(data.title_fee) + parseFloat(data.tag_fee));
					
					$('#tax_percent').val(data.tax_fee);
					calculate_tax(data.tax_fee);
				}
			});
		}
	});
	

	$("#btn_save_quote").click(function(){
		if($("#deal_status_id").val() == ''){
			alert("Please select status");
			$("#deal_status_id").focus();
			return false;	
		}else{
			return true;
		}
	});
	
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
	if($('#apr').val() != "" && $('#apr').val() != null){
	calculateMonthWisePayments();
	}else {
		$('input[id^="paymentFor"]').val("");
	}
	var rx = new RegExp(/^\d+(?:\.\d{1,2})?$/);
	$('#apr').on('change keyup paste',function(){
		
		if(rx.test($('#apr').val())){
			calculateMonthWisePayments();
			}else{
					$('.options_price').val("");
			}
	 });
	
	$(".price_options").on('change',function(){
										span_id=$(this).attr('price-id')+'_span';
										$("#"+span_id).text($(this).val());	 
										calculateMonthWisePayments();	 
											 });
     
});
function calculate() 
{
	var selling_price = $('#sell_price').val();
	var freight = $('#freight').val();
	var prep = $('#prep').val();
	var doc = $('#doc').val();
	var parts_fee = "0";
	var service_fee = "0";
	var parts_service = parseFloat(parts_fee)+parseFloat(service_fee);
	var tag_fee = "0";
	var title_fee = "0";
	var tag_title = parseFloat(tag_fee)+parseFloat(title_fee);
	$('#part_serv').val(parts_service);
	$('#tag_tit').val(tag_title);
	var amount = parseFloat(selling_price) + parseFloat(freight) + parseFloat(prep) + parseFloat(doc) + parseFloat(parts_service) + parseFloat(tag_title);
	var tax = $('#tax').val();
	var amountIncludingTax = amount + (amount*parseFloat(tax))/100;
	var estimated_payoff = $('#est_payoff').val();
	if(estimated_payoff.trim() === "") {
		estimated_payoff = 0;
	} 
	
	var downpayment = $('#down_pay').val();
	if(downpayment.trim() === "") {
		downpayment = 0;
	} 
	if(isNaN(downpayment) || isNaN(estimated_payoff))
	{
		//alert("Please enter valid amount");
		if(isNaN(downpayment)){
			$('#errorForDownPay').text("Please enter valid  Down Payment.");
			$('#down_pay').val("");
		}else{
			$('#errorForPayoff').text("Please enter valid estimated PayOff.");
			$('#est_payoff').val("");
		}
		$('#bal').val("");
		$('.options_price').val("");
		
	}else{
		$('#errorForDownPay').text("");
		$('#errorForPayoff').text("");
	var balance = parseFloat(amountIncludingTax) + parseFloat(estimated_payoff) - parseFloat(downpayment);
		balance_value = balance.toFixed(2);
		if(!isNaN(balance_value)){
			$('#bal').val(balance_value);
		}
		
	}
	
	//console.log( $('#bal').val() );
	
}
	
	
	 function calculateMonthWisePayments(){
		 
		$(".price_options").each(function(){
										  years=$(this).val()/12;
										  pay_monthly=MonthwisePayments(years);
										  price_field=$(this).attr('price-id');										  										  var payment = document.getElementById(price_field);
										  payment.value = pay_monthly;
										  
										  });
	 	}
	
	function MonthwisePayments(years)
	{
		var apr = parseFloat($('#apr').val());
		var principal = parseFloat($('#bal').val());
		var interest = parseFloat(apr) / 100 / 12;
		var payments = years * 12;
		var tax = parseFloat($('#tax').val());
		//var payment = document.getElementById(("paymentFor"+i).toString());
		var x = Math.pow(1 + interest, payments, tax);   // Math.pow() computes powers
			var monthly = (principal * x * interest) / (x - 1);
			// If the result is a finite number, the user's input was good and
			// we have meaningful results to display
			if (isFinite(monthly)) {
			// Fill in the output fields, rounding to 2 decimal places
			//payment.value = monthly.toFixed(2);
			return monthly.toFixed(2);
		}else{
			//payment.value = "";
			return "";
		}
	}
</script>
</div>
