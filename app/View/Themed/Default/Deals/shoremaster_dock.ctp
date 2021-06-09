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
	label{font-size: 13px;}
	.list li {display: inline-block; font-size: 13px; list-style: outside none none; width: 24%; margin-bottom: 7px;}
	td, th{border-bottom: 1px solid #000; border-right: 1px solid #000; text-align: left; padding: 1px 10px; font-size: 12px;}
	 table input[type="text"]{ border-bottom: 0px solid #000;}
	 table{border-top: 1px solid #000; border-left: 1px solid #000;}
	
	body{font-size: 12px;}
	.wraper.main input {padding: 0px;}
@media print {
.dontprint{display: none;}
.m-t{margin: 164px 0 0 !important;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center; font-size: 16px;">NORSASK FARM EQUIPMENT LTD. - SHOREMASTER DOCK</h2>				
		<div class="row equip-calc" style="float: left; width: 100%; margin: 0;">
			<table cellpadding="0" cellspacing="0" width="100%;">
				<tr>
					<th style="width: 40%;">Description</th>
					<th style="width: 30%;">Black: Parts to be billed out <br> Blue: Parts to be given to customer </th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Line total</th>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center; font-size: 16px;"><b>TS9 Dock Frames</b></td>
				</tr>
				
				<tr>
					<td>4X8 Frame</td>
					<td>1003959</td>
					<td>$750</td>
					<td><input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total1" value="<?php echo isset($info['total1']) ? $info['total1'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>4X16 Frame</td>
					<td>1003958</td>
					<td>$1275</td>
					<td><input type="text" name="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>3' Corner Frame</td>
					<td>1005994</td>
					<td>$350</td>
					<td><input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total3" value="<?php echo isset($info['total3']) ? $info['total3'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>4'X8' Ramp Frame + 2 QC Brackets</td>
					<td>1006677+2of 1006730</td>
					<td>$800</td>
					<td><input type="text" name="qty4" value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total4" value="<?php echo isset($info['total4']) ? $info['total4'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>4'X4' Ramp frame + 2 QC Brackets</td>
					<td>1006676+2of 1006730</td>
					<td>$470</td>
					<td><input type="text" name="qty5" value="<?php echo isset($info['qty5']) ? $info['qty5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total5" value="<?php echo isset($info['total5']) ? $info['total5'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center; font-size: 16px;"><b>Deck Panels</b></td>
				</tr>
				
				
				<tr>
					<td>Flow through 2'X45"</td>
					<td>1028168 (TAN) 1028170 (GRAY)</td>
					<td>$135</td>
					<td><input type="text" name="qty6" value="<?php echo isset($info['qty6']) ? $info['qty6'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total6" value="<?php echo isset($info['total6']) ? $info['total6'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td>Cedar 2'X45"</td>
					<td>1018417</td>
					<td>$100</td>
					<td><input type="text" name="qty7" value="<?php echo isset($info['qty7']) ? $info['qty7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total7" value="<?php echo isset($info['total7']) ? $info['total7'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Vertex 2'X45"</td>
					<td>1004074</td>
					<td>$165</td>
					<td><input type="text" name="qty8" value="<?php echo isset($info['qty8']) ? $info['qty8'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total8" value="<?php echo isset($info['total8']) ? $info['total8'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Corner Panel Cedar</td>
					<td>1018418</td>
					<td>$100</td>
					<td><input type="text" name="qty9" value="<?php echo isset($info['qty9']) ? $info['qty9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total9" value="<?php echo isset($info['total9']) ? $info['total9'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Corner Panel Flow through</td>
					<td>1028151 (TAN) 1028147 (GRAY)</td>
					<td>$205</td>
					<td><input type="text" name="qty10" value="<?php echo isset($info['qty10']) ? $info['qty10'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total10" value="<?php echo isset($info['total10']) ? $info['total10'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Corner Panel Vertex</td>
					<td>1004076</td>
					<td>$225</td>
					<td><input type="text" name="qty11" value="<?php echo isset($info['qty11']) ? $info['qty11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total11" value="<?php echo isset($info['total11']) ? $info['total11'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center; font-size: 16px;"><b>Dock Legs & Accessories</b></td>
				</tr>
				
				<tr>
					<td>Infinity Dock Leg Pocket</td>
					<td>1006591</td>
					<td>$90</td>
					<td><input type="text" name="qty12" value="<?php echo isset($info['qty12']) ? $info['qty12'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total12" value="<?php echo isset($info['total12']) ? $info['total12'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Short leg pocket (for 2.5ft leg max)</td>
					<td>1006659</td>
					<td>$60</td>
					<td><input type="text" name="qty13" value="<?php echo isset($info['qty13']) ? $info['qty13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total13" value="<?php echo isset($info['total13']) ? $info['total13'] : ''; ?>" style="width: 100%;"></td>
				</tr>
			
				<tr>
					<td>5' 5-sided dock leg post</td>
					<td>1000157</td>
					<td>$60</td>
					<td><input type="text" name="qty14" value="<?php echo isset($info['qty14']) ? $info['qty14'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total14" value="<?php echo isset($info['total14']) ? $info['total14'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>7' 5-sided dock leg post</td>
					<td>1000158</td>
					<td>$75</td>
					<td><input type="text" name="qty15" value="<?php echo isset($info['qty15']) ? $info['qty15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total15" value="<?php echo isset($info['total15']) ? $info['total15'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Foot Pad</td>
					<td>1006523</td>
					<td>$50</td>
					<td><input type="text" name="qty16" value="<?php echo isset($info['qty16']) ? $info['qty16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total16" value="<?php echo isset($info['total16']) ? $info['total16'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Poly Tire</td>
					<td>1007829</td>
					<td>$85</td>
					<td><input type="text" name="qty17" value="<?php echo isset($info['qty17']) ? $info['qty17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total17" value="<?php echo isset($info['total17']) ? $info['total17'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Super Shallow screw leg w/wheel 26"-36"</td>
					<td>1006683+1007829</td>
					<td>$335</td>
					<td><input type="text" name="qty18" value="<?php echo isset($info['qty18']) ? $info['qty18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total18" value="<?php echo isset($info['total18']) ? $info['total18'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Shallow screw leg w/wheel 37"-57"</td>
					<td>1006682+1007829</td>
					<td>$385</td>
					<td><input type="text" name="qty19" value="<?php echo isset($info['qty19']) ? $info['qty19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total19" value="<?php echo isset($info['total19']) ? $info['total19'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Standard screw leg w/wheel 48"-72"</td>
					<td>1006686+1007829</td>
					<td>$450</td>
					<td><input type="text" name="qty20" value="<?php echo isset($info['qty20']) ? $info['qty20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total20" value="<?php echo isset($info['total20']) ? $info['total20'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Deep Screw legs w/wheel+Brace 66"-105"</td>
					<td>1006681+1007829+1006685</td>
					<td>$550</td>
					<td><input type="text" name="qty21" value="<?php echo isset($info['qty21']) ? $info['qty21'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total21" value="<?php echo isset($info['total21']) ? $info['total21'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Wheel axle adaptor (for dock leg, wheel not incl)</td>
					<td>1006709</td>
					<td>$60</td>
					<td><input type="text" name="qty22" value="<?php echo isset($info['qty22']) ? $info['qty22'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total22" value="<?php echo isset($info['total22']) ? $info['total22'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5" style="font-size: 16px; text-align: center;">Dock Accessories</td>
				</tr>
				
				<tr>
					<td>QC Bracket</td>
					<td>1006730</td>
					<td>$45</td>
					<td><input type="text" name="qty23" value="<?php echo isset($info['qty23']) ? $info['qty23'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total23" value="<?php echo isset($info['total23']) ? $info['total23'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>QC Off-Deck Lakeview Bench Tan w/2 QC Brackets</td>
					<td>Kit# 1022994 + (2) of 1006730</td>
					<td>$550</td>
					<td><input type="text" name="qty24" value="<?php echo isset($info['qty24']) ? $info['qty24'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total24" value="<?php echo isset($info['total24']) ? $info['total24'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td style="color: darkcyan;">1022998+1013336</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input type="text" class="total" name="total25" value="<?php echo isset($info['total25']) ? $info['total25'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Dock Furniture Set (2 Chairs, 1 Table, 1 Umbrella, 3 QC Brkt)</td>
					<td>1015685 + (3) 1006730</td>
					<td>$1200</td>
					<td><input type="text" name="qty26" value="<?php echo isset($info['qty26']) ? $info['qty26'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total26" value="<?php echo isset($info['total26']) ? $info['total26'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Blue Vertical Dock Bumper w/QC Bracket</td>
					<td>Kit# 1006691 + 1006730</td>
					<td>$210</td>
					<td><input type="text" name="qty27" value="<?php echo isset($info['qty27']) ? $info['qty27'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total27" value="<?php echo isset($info['total27']) ? $info['total27'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td>&nbsp;</td>
					<td style="color: darkcyan;">1004259+1004265</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input type="text" class="total" name="total28" value="<?php echo isset($info['total28']) ? $info['total28'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Tan Vertical Dock Bumper w/Qc Braket</td>
					<td>Kit# 1006692 + 1006730</td>
					<td>$210</td>
					<td><input type="text" name="qty29" value="<?php echo isset($info['qty29']) ? $info['qty29'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total29" value="<?php echo isset($info['total29']) ? $info['total29'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td style="color: darkcyan;">100----+1004265</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input type="text" class="total" name="total30" value="<?php echo isset($info['total30']) ? $info['total30'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td>Horizontal adapter for vertical dock bumoer</td>
					<td>1004186</td>
					<td>$20</td>
					<td><input type="text" name="qty31" value="<?php echo isset($info['qty31']) ? $info['qty31'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total31" value="<?php echo isset($info['total31']) ? $info['total31'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center; font-size: 16px;">Steps and Ladders</td>
				</tr>
				<tr>
					<td>QC 4 Step Dock Steps w/Handrail & 2 QC brackets</td>
					<td>1004263+2of 1006730</td>
					<td>$875</td>
					<td><input type="text" name="qty32" value="<?php echo isset($info['qty32']) ? $info['qty32'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total32" value="<?php echo isset($info['total32']) ? $info['total32'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>QC 6  step dock steps w/ handrail w/2 QC Brackets </td>
					<td>1004264+2of 1006730</td>
					<td>$890</td>
					<td><input type="text" name="qty33" value="<?php echo isset($info['qty33']) ? $info['qty33'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total33" value="<?php echo isset($info['total33']) ? $info['total33'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>3 Step Pivot Dock ladder w/2 QC Brackets</td>
					<td>1006669+2of 1006730</td>
					<td>$450</td>
					<td><input type="text" name="qty34" value="<?php echo isset($info['qty34']) ? $info['qty34'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total34" value="<?php echo isset($info['total34']) ? $info['total34'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>4 Step Pivot Dock ladder w/2 QC Brackets</td>
					<td>1006670+2of 1006730</td>
					<td>$500</td>
					<td><input type="text" name="qty35" value="<?php echo isset($info['qty35']) ? $info['qty35'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total35" value="<?php echo isset($info['total35']) ? $info['total35'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>5 Step Pivot Dock ladder w/2 QC Brackets</td>
					<td>1006671+2of 1006730</td>
					<td>$650</td>
					<td><input type="text" name="qty36" value="<?php echo isset($info['qty36']) ? $info['qty36'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total36" value="<?php echo isset($info['total36']) ? $info['total36'] : ''; ?>" style="width: 100%;"></td>
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td style="text-align: center;"><b>Total</b></td>
					<td><input type="text" name="total_cal" id="total_cal" value="<?php echo isset($info['total_cal']) ? $info['total_cal'] : ''; ?>" style="width: 100%;"></td>
				</tr>
			</table>
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
	function calculate_row_total($this){
		var qt = $($this).find('td:eq(3) input').val();
		var pri = $($this).find("td").eq(2).text();
		pri = pri.replace('$', '').replace(',', '');
        pri = parseFloat(pri);
		$($this).find('td:eq(4) input').val(qt * pri.toFixed(2));
	}

	$(".equip-calc table tr").on('change keyup paste',function(){
		var $this = this; 
		calculate_row_total($this);
		calculate_totalaccess($this);
	});


	function calculate_totalaccess($this) {
		var hey = 0.00;
		var count = 0;
		$('.equip-calc table tr').each(function() {
			var total = $(this).find('input.total').val();
			if (total) {
		        total = total == "" ? 0.00 : parseFloat(total);
		        hey += total;
		        console.log("total_access: " + hey);
				$("#total_cal").val(hey.toFixed(2));
			}
		});
	}
});
</script>
</div>
