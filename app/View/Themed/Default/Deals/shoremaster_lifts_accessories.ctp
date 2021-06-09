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
		<h2 style="float: left; width: 100%; margin: 7px 0; text-align: center; font-size: 16px;">NORSASK FARM EQUIPMENT LTD. - SHOREMASTER LIFTS & ACCESSORIES</h2>				
		<div class="row lift-cal" style="float: left; width: 100%; margin: 0;">
			<table cellpadding="0" cellspacing="0" width="100%;">
				<tr>
					<th style="width: 40%;">Description</th>
					<th style="width: 30%;">Black: Parts to be billed out <br> Blue: Parts to be given to customer </th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Line total</th>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center; font-size: 16px;"><b>LIFTS</b></td>
				</tr>
				
				<tr>
					<td> 1200 PWC Cantilever lift w/wheel and bunks</td>
					<td>1017507+1006952</td>
					<td>$2100</td>
					<td><input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total1" value="<?php echo isset($info['total1']) ? $info['total1'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> hardware box</td>
					<td><i style="color: darkcyan">1017509</i></td>
					<td><input type="text" name="price2" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>1264 PWC Vertical Lift w/wheel and bunks</td>
					<td>1007069+1006952</td>
					<td>$2900</td>
					<td><input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total3" value="<?php echo isset($info['total3']) ? $info['total3'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> hardware box</td>
					<td><i style="color: darkcyan">1004416</i></td>
					<td><input type="text" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total4" value="<?php echo isset($info['total4']) ? $info['total4'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 3009 Vertical w/bunks+bunk brkts 108"wide</td>
					<td>1007106+1006957+1006979</td>
					<td>$6400</td>
					<td><input type="text" name="qty5" value="<?php echo isset($info['qty5']) ? $info['qty5'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total5" value="<?php echo isset($info['total5']) ? $info['total5'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>hardware box must add wheel or power</td>
					<td><i style="color: darkcyan">1016150</i></td>
					<td><input type="text" name="price6" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total6" value="<?php echo isset($info['total6']) ? $info['total6'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td> 3010 Vertical w/bunks+bunk brkts 120"wide</td>
					<td>1007107+1006957+1006979</td>
					<td>$6800</td>
					<td><input type="text" name="qty7" value="<?php echo isset($info['qty7']) ? $info['qty7'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total7" value="<?php echo isset($info['total7']) ? $info['total7'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> hardware box must add wheel or power</td>
					<td><i style="color: darkcyan">1016150</i></td>
					<td><input type="text" name="price8" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total8" value="<?php echo isset($info['total8']) ? $info['total8'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> 4009 Vertical w/bunks+bunk brkts 108"wide</td>
					<td>1007110+1006957+1006979</td>
					<td>$7450</td>
					<td><input type="text" name="qty9" value="<?php echo isset($info['qty9']) ? $info['qty9'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total9" value="<?php echo isset($info['total9']) ? $info['total9'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>hardware box must add wheel or power</td>
					<td><i style="color: darkcyan">1016151</i></td>
					<td><input type="text" name="price10" value="<?php echo isset($info['price10']) ? $info['price10'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total10" value="<?php echo isset($info['total10']) ? $info['total10'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>4010 Vertical w/bunks+bunk brkts 120"wide</td>
					<td>1007112+1006957+1006979</td>
					<td>$7600</td>
					<td><input type="text" name="qty11" value="<?php echo isset($info['qty11']) ? $info['qty11'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total11" value="<?php echo isset($info['total11']) ? $info['total11'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> hardware box must add wheel or power</td>
					<td><i style="color: darkcyan">1016151</i></td>
					<td><input type="text" name="price12" value="<?php echo isset($info['price12']) ? $info['price12'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total12" value="<?php echo isset($info['total12']) ? $info['total12'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>5010 Vertical w/bunks+bunk brkts 120"wide</td>
					<td>1007119+1006957+1006979</td>
					<td>$9550</td>
					<td><input type="text" name="qty13" value="<?php echo isset($info['qty13']) ? $info['qty13'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total13" value="<?php echo isset($info['total13']) ? $info['total13'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td> hardware box must add wheel or power</td>
					<td><i style="color: darkcyan">1016151</i></td>
					<td><input type="text" name="price14" value="<?php echo isset($info['price14']) ? $info['price14'] : ''; ?>" style="width: 100%;"></td>
					<td></td>
					<td><input type="text" class="total" name="total14" value="<?php echo isset($info['total14']) ? $info['total14'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>blue wheel</td>
					<td>1007201</td>
					<td>$225</td>
					<td><input type="text" name="qty15" value="<?php echo isset($info['qty15']) ? $info['qty15'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total15" value="<?php echo isset($info['total15']) ? $info['total15'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5"><b>For pontoon boats: remove 1006957 (boards) +1006979 (brackets) and add appropriate cradles</b></td>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center; font-size: 16px;"><b>12 VOLT LIFT SYSTEM</b></td>
				</tr>
				
				<tr>
					<td> Battery tray Leg mount</td>
					<td>1024401</td>
					<td>$130</td>
					<td><input type="text" name="qty16" value="<?php echo isset($info['qty16']) ? $info['qty16'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total16" value="<?php echo isset($info['total16']) ? $info['total16'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Lift Boss 12/24V w/Whisper Winch</td>
					<td>1025200</td>
					<td>$1800</td>
					<td><input type="text" name="qty17" value="<?php echo isset($info['qty17']) ? $info['qty17'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total17" value="<?php echo isset($info['total17']) ? $info['total17'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Sidewinder 12 Volt system w/Sidewinder mounting kit</td>
					<td>1024905 + 1024871</td>
					<td>$1000</td>
					<td><input type="text" name="qty18" value="<?php echo isset($info['qty18']) ? $info['qty18'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total18" value="<?php echo isset($info['total18']) ? $info['total18'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>10 watt solar panel w/bracket</td>
					<td>1014965</td>
					<td>$330</td>
					<td><input type="text" name="qty19" value="<?php echo isset($info['qty19']) ? $info['qty19'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total19" value="<?php echo isset($info['total19']) ? $info['total19'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Deep cycle battery</td>
					<td>DP27</td>
					<td>$150</td>
					<td><input type="text" name="qty20" value="<?php echo isset($info['qty20']) ? $info['qty20'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total20" value="<?php echo isset($info['total20']) ? $info['total20'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td>Battery box</td>
					<td>703359</td>
					<td>$20</td>
					<td><input type="text" name="qty21" value="<?php echo isset($info['qty21']) ? $info['qty21'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total21" value="<?php echo isset($info['total21']) ? $info['total21'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5" style="text-align: center;">LIFT ACCESSORIES</td>
				</tr>
				
				
				<tr>
					<td>pivoting wheel caddy kit w/tires</td>
					<td>1016280+2 of 1007829</td>
					<td>$1150</td>
					<td><input type="text" name="qty22" value="<?php echo isset($info['qty22']) ? $info['qty22'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total22" value="<?php echo isset($info['total22']) ? $info['total22'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>universal wheel caddy (pair) w/tires</td>
					<td>1007018+2 of 1007829</td>
					<td>$450</td>
					<td><input type="text" name="qty23" value="<?php echo isset($info['qty23']) ? $info['qty23'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total23" value="<?php echo isset($info['total23']) ? $info['total23'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>universal wheel caddy (pair) w/tires</td>
					<td>1007018+2 of 1007829</td>
					<td>$450</td>
					<td><input type="text" name="qty24" value="<?php echo isset($info['qty24']) ? $info['qty24'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total24" value="<?php echo isset($info['total24']) ? $info['total24'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Poly tire</td>
					<td>1007829</td>
					<td>$85</td>
					<td><input type="text" name="qty25" value="<?php echo isset($info['qty25']) ? $info['qty25'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total25" value="<?php echo isset($info['total25']) ? $info['total25'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Pontoon cradle brkts (req 4@2X6 boards)</td>
					<td>1007004</td>
					<td>$400</td>
					<td><input type="text" name="qty26" value="<?php echo isset($info['qty26']) ? $info['qty26'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total26" value="<?php echo isset($info['total26']) ? $info['total26'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Tri-toon cradle brkts (req 2@2X6 boards)</td>
					<td>1017068</td>
					<td>$200</td>
					<td><input type="text" name="qty27" value="<?php echo isset($info['qty27']) ? $info['qty27'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total27" value="<?php echo isset($info['total27']) ? $info['total27'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Carpeted 11' bunk boards (2 boards)</td>
					<td>1006957</td>
					<td>$400</td>
					<td><input type="text" name="qty28" value="<?php echo isset($info['qty28']) ? $info['qty28'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total28" value="<?php echo isset($info['total28']) ? $info['total28'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Carpeted 11' bunk boards (2 boards)</td>
					<td>1006957</td>
					<td>$400</td>
					<td><input type="text" name="qty29" value="<?php echo isset($info['qty29']) ? $info['qty29'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total29" value="<?php echo isset($info['total29']) ? $info['total29'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>18"swivel bunk brackets (set of 4)</td>
					<td>1006979</td>
					<td>$400</td>
					<td><input type="text" name="qty30" value="<?php echo isset($info['qty30']) ? $info['qty30'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total30" value="<?php echo isset($info['total30']) ? $info['total30'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Bow Guide (adjustable)</td>
					<td>1024554</td>
					<td>$1100</td>
					<td><input type="text" name="qty31" value="<?php echo isset($info['qty31']) ? $info['qty31'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total31" value="<?php echo isset($info['total31']) ? $info['total31'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5" style="font-size: 16px; text-align: center;"><b>CANOPIES</b></td>
				</tr>
				
				<tr>
					<td>23X108 Canopy Frame ,bolt bag ,end bundle</td>
					<td>1006058+1000440+1005854</td>
					<td>$2100</td>
					<td><input type="text" name="qty32" value="<?php echo isset($info['qty32']) ? $info['qty32'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total32" value="<?php echo isset($info['total32']) ? $info['total32'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>25X108 Canopy Frame, bolt bag, end bundle</td>
					<td>1006060</td>
					<td>$2300</td>
					<td><input type="text" name="qty33" value="<?php echo isset($info['qty33']) ? $info['qty33'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total33" value="<?php echo isset($info['total33']) ? $info['total33'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>23X120 Canopy Frame, bolt bag, end bundle</td>
					<td>1006059</td>
					<td>$2200</td>
					<td><input type="text" name="qty34" value="<?php echo isset($info['qty34']) ? $info['qty34'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total34" value="<?php echo isset($info['total34']) ? $info['total34'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>25X120 Canopy Frame, bolt bag, end bundle</td>
					<td>1006061+1004400+1005841</td>
					<td>$2300</td>
					<td><input type="text" name="qty35" value="<?php echo isset($info['qty35']) ? $info['qty35'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total35" value="<?php echo isset($info['total35']) ? $info['total35'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>27X120 Canopy Frame, bolt bag, end bundle</td>
					<td>1006063</td>
					<td>$3000</td>
					<td><input type="text" name="qty36" value="<?php echo isset($info['qty36']) ? $info['qty36'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total36" value="<?php echo isset($info['total36']) ? $info['total36'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				
				<tr>
					<td>29X120 Canopy Frame, bolt bag, end bundle</td>
					<td>1006066</td>
					<td>$3100</td>
					<td><input type="text" name="qty37" value="<?php echo isset($info['qty37']) ? $info['qty37'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total37" value="<?php echo isset($info['total37']) ? $info['total37'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>3 c Canopy legs </td>
					<td>1005858</td>
					<td>$255</td>
					<td><input type="text" name="qty38" value="<?php echo isset($info['qty38']) ? $info['qty38'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total38" value="<?php echo isset($info['total38']) ? $info['total38'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>23X108 Canopy Cover Vinyl</td>
					<td><input type="text" name="cano39" value="<?php echo isset($info['cano39']) ? $info['cano39'] : ''; ?>" style="width: 100%;"></td>
					<td>$1250</td>
					<td><input type="text" name="qty39" value="<?php echo isset($info['qty39']) ? $info['qty39'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total39" value="<?php echo isset($info['total39']) ? $info['total39'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>25X108 Canopy Cover Vinyl</td>
					<td><input type="text" name="cano40" value="<?php echo isset($info['cano40']) ? $info['cano40'] : ''; ?>" style="width: 100%;"></td>
					<td>$1300</td>
					<td><input type="text" name="qty40" value="<?php echo isset($info['qty40']) ? $info['qty40'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total40" value="<?php echo isset($info['total40']) ? $info['total40'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				<tr>
					<td>23X120 Canopy Cover Vinyl</td>
					<td><input type="text" name="cano41" value="<?php echo isset($info['cano41']) ? $info['cano41'] : ''; ?>" style="width: 100%;"></td>
					<td>$1300</td>
					<td><input type="text" name="qty41" value="<?php echo isset($info['qty41']) ? $info['qty41'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total41" value="<?php echo isset($info['total41']) ? $info['total41'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>25X120 Canopy Cover Vinyl</td>
					<td><input type="text" name="cano42" value="<?php echo isset($info['cano42']) ? $info['cano42'] : ''; ?>" style="width: 100%;"></td>
					<td>$1350</td>
					<td><input type="text" name="qty42" value="<?php echo isset($info['qty42']) ? $info['qty42'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total42" value="<?php echo isset($info['total42']) ? $info['total42'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>27X120 Canopy Cover Vinyl</td>
					<td><input type="text" name="cano43" value="<?php echo isset($info['cano43']) ? $info['cano43'] : ''; ?>" style="width: 100%;"></td>
					<td>$1400</td>
					<td><input type="text" name="qty43" value="<?php echo isset($info['qty43']) ? $info['qty43'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total43" value="<?php echo isset($info['total43']) ? $info['total43'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>29X120 Canopy Cover Vinyl</td>
					<td><input type="text" name="cano44" value="<?php echo isset($info['cano44']) ? $info['cano44'] : ''; ?>" style="width: 100%;"></td>
					<td>$1450</td>
					<td><input type="text" name="qty44" value="<?php echo isset($info['qty44']) ? $info['qty44'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total44" value="<?php echo isset($info['total44']) ? $info['total44'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td><b>Weather Max Upgrade</b></td>
					<td><input type="text" name="cano45" value="<?php echo isset($info['cano45']) ? $info['cano45'] : ''; ?>" style="width: 100%;"></td>
					<td>$350</td>
					<td><input type="text" name="qty45" value="<?php echo isset($info['qty45']) ? $info['qty45'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total45" value="<?php echo isset($info['total45']) ? $info['total45'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td colspan="5"><b>For complete Canopy kit: Add Canopy Frame, 3C legs and choice of Cover</b></td>
				</tr>
				
				<tr>
					<td>Bungee Strap Replacements for Canopy</td>
					<td>1001789</td>
					<td>$350</td>
					<td><input type="text" name="qty46" value="<?php echo isset($info['qty46']) ? $info['qty46'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total46" value="<?php echo isset($info['total46']) ? $info['total46'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>Replacement remote for Sidewinder</td>
					<td>1020123</td>
					<td>$75</td>
					<td><input type="text" name="qty47" value="<?php echo isset($info['qty47']) ? $info['qty47'] : ''; ?>" style="width: 100%;"></td>
					<td><input type="text" class="total" name="total47" value="<?php echo isset($info['total47']) ? $info['total47'] : ''; ?>" style="width: 100%;"></td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td style="text-align: center;"><b>Total</b></td>
					<td style="text-align: center;"><input type="text" name="total_cal" id="total_cal" value="<?php echo isset($info['total_cal']) ? $info['total_cal'] : ''; ?>" style="width: 100%;"></td>
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

	$(".lift-cal table tr").on('change keyup paste',function(){
		var $this = this; 
		calculate_row_total($this);
		calculate_totalaccess($this);
	});
	
	function calculate_totalaccess($this) {
		var hey = 0.00;
		$('.lift-cal table tr').each(function() {
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
