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
$expectedt = date('Y-m-d H:i:s');
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
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>body{ margin:0 7%; padding:0; font-family:Georgia, "Times New Roman", Times, serif; font-size:13px; border:0px #ccc;}

	.light_fm{ width:10%; border-bottom:solid 1px #ccc; border-top:none; border-left:none; border-right:none; margin:0 10px;}
	.unit_fm{ width:80%; border:none; background:none;border:1px solid black; font-size:16px;}
	
	@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
			#finance_company_list{
				display: none;
			}
			.wraper .header{
				border:0px;
			}
		}
	</style>

	<div class="wraper header"> 
			<div class="row">
				
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
    <td style="width:30%;"></td>
    <td style=" width:40%;text-align:center; font-size:23px; font-weight:600; border-bottom:solid 4px #000;">INSURANCE BINDER INSTRUCTIONS</td>
    <td style="width:30%;"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;">Buyer:</td>
    <td style=" width:33%; font-size:18px; font-weight:600; padding:5px 5px;">D.O.B.</td>
    <td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;"> Cal. D.L.</td>
  </tr>
  
  <tr>
    <td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;"><input name="buyer_info" value="<?php echo isset($info['buyer_info']) ? $info['buyer_info'] :  $info['first_name']." ". $info['last_name']; ?>" type="text" class="unit_fm" /></td>
    <td style=" width:33%; font-size:18px; font-weight:600; padding:5px 5px;"><input name="dob_info" value="<?php echo isset($info['dob_info']) ? $info['dob_info'] : $info['dob']; ?>" type="text" class="unit_fm" /></td>
    <td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;"> <input name="driver_license" value="<?php echo isset($info['driver_license']) ? $info['driver_license'] : "" ?>" type="text" class="unit_fm" /></td>
  </tr>
  
  <tr>
    <td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;">Address:<br />
	<input name="address_info" value="<?php echo isset($info['address_info']) ? $info['address_info'] : $info['address']; ?>" type="text" class="unit_fm" />
	</td>
    <td style=" width:33%; font-size:18px; font-weight:600; padding:5px 5px;">City:<br />
	<input name="city_info" value="<?php echo isset($info['city_info']) ? $info['city_info'] : $info['city']; ?>" type="text" class="unit_fm" />
	</td>
    <td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;">State:<br />
	<input name="state_info" value="<?php echo isset($info['state_info']) ? $info['state_info'] : $info['state']; ?>" type="text" class="unit_fm" />
	</td>
	
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  
  <tr>
	<td style="width:33%; font-size:18px; font-weight:600; padding:5px 5px;">Zip:<br />
	<input name="zip_info" value="<?php echo isset($info['zip_info']) ? $info['zip_info'] : $info['zip']; ?>" type="text" class="unit_fm" />
	</td>
    <td style=" width:100%; font-size:18px; font-weight:400; padding:12px 0 0 0;">Co-Buyer:<br />
	<input name="co-buyer" value="<?php echo isset($info['co-buyer']) ? $info['co-buyer'] : "" ?>" type="text" class="unit_fm" />
	</td>
	
  </tr>
  
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:2px;">
  <tr>
    <td style="font-size:17px; font-weight:600; padding:5px 0 0 0; display:inline-block; border-bottom:solid 2px #000;">Insurance must be under the name listed above before taking delivery of vehicle.</td>
  </tr>
  <tr>
    <td style="font-size:17px; font-weight:600; padding:5px 0 0 0;">The vehicle must have comprehensive and collision insurance with a maximum <br />deductible of $500.00.</td>
  </tr>
</table>
 
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:2px;">
  <tr>
    <td style=" width:20%; font-size:17px; font-weight:600; padding:5px 0 0 0; ">Year:<br />
	<input name="year_info" value="<?php echo isset($info['year_info']) ? $info['year_info'] :  $info['year']; ?>" type="text" class="unit_fm" />
	</td>
    <td style="  width:20%;font-size:17px; font-weight:600; padding:5px 0 0 0; ">Make:<br />
	<input name="make_info" value="<?php echo isset($info['make_info']) ? $info['make_info'] : $info['make']; ?>" type="text" class="unit_fm" />
	</td>
    <td style=" width:30%;font-size:17px; font-weight:600; padding:5px 0 0 0; ">Model:<br />
	<input name="model_info" value="<?php echo isset($info['model_info']) ? $info['model_info'] : $info['model']; ?>" type="text" class="unit_fm" />
	</td>
    <td style=" width:50%;font-size:17px; font-weight:600; padding:5px 0 0 0; ">VIN:<br />
	<input name="vin_info" value="<?php echo isset($info['vin_info']) ? $info['vin_info'] : $info['vin']; ?>" type="text" class="unit_fm" />
	</td>
  </tr>
  
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:2px;">
  <tr>
    <td style=" width:20%; font-size:17px; font-weight:600; padding:10px 0 0 0; ">ODOMETER:<br/>
	<input name="odometer_info" value="<?php echo isset($info['odometer_info']) ? $info['odometer_info'] : $info['odometer']; ?>" type="text" class="unit_fm" />
	</td>
  </tr>
  </table>
    
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
   <tr>
    <td style=" width:20%; font-size:17px; font-weight:600; padding:10px 0 0 0; ">
    <br />
	<select name="finance_company_list" id="finance_company_list">		
		<option value="A-L FINANCIAL CORP,PO BOX 7965,LONG BEACH CA 90807,562-490-9877" <?php echo ($info['finance_company_list'] == "A-L FINANCIAL CORP,PO BOX 7965,LONG BEACH CA 90807,562-490-9877") ? 'selected' : ''?>>A-L FINANCIAL CORP</option>
		<option value="AMERICAN HONDA FINANCE CORP,1235 OLD  ALPHARETTA RD.,ALPHARETTA GA 30005" <?php echo ($info['finance_company_list'] == "AMERICAN HONDA FINANCE CORP,1235 OLD  ALPHARETTA RD.,ALPHARETTA GA 30005") ? 'selected' : ''?> >AMERICAN HONDA FINANCE CORP</option>
		<option value="BURBANK CY FCU  ELT K28,PO BX 31,BURBANK CA 91503,800 622 3328" <?php echo ($info['finance_company_list'] == "BURBANK CY FCU  ELT K28,PO BX 31,BURBANK CA 91503,800 622 3328") ? 'selected' : ''?>>BURBANK CY FCU  ELT K28</option>
		<option value="CAPITAL ONE, N.A. ELT ADT,P O BOX 660070,SACRAMENTO CA 95866,800-695-6950" <?php echo ($info['finance_company_list'] == "CAPITAL ONE, N.A. ELT ADT,P O BOX 660070,SACRAMENTO CA 95866,800-695-6950") ? 'selected' : ''?>>CAPITAL ONE, N.A. ELT ADT</option>
		<option value="DEL AMO MOTORSPORTS,2500 MARINE AVENUE,REDONDO BEACH CA 90278,310-220-2223" <?php echo ($info['finance_company_list'] == "DEL AMO MOTORSPORTS,2500 MARINE AVENUE,REDONDO BEACH CA 90278,310-220-2223" )? 'selected' : ''?>>DEL AMO MOTORSPORTS</option>
		<option value="DUCATI FNCL SVCS  ELT DWY,1401 FRANKLIN BLVD,LIBERTYVILLE IL 60048,888-938-2284" <?php echo ($info['finance_company_list'] == "DUCATI FNCL SVCS  ELT DWY,1401 FRANKLIN BLVD,LIBERTYVILLE IL 60048,888-938-2284") ? 'selected' : ''?>>DUCATI FNCL SVCS  ELT DWY</option>
		<option value="DWIGHT FNCL INC ELT Z64,PO BX 7397,PHOENIX AZ 85011,602-789-0712" <?php echo ($info['finance_company_list'] == "DWIGHT FNCL INC ELT Z64,PO BX 7397,PHOENIX AZ 85011,602-789-0712") ? 'selected' : ''?>>DWIGHT FNCL INC ELT Z64</option>
		<option value="LBS  FNCL  CU ELT L67,P O  BX  4860,LONG BEACH CA 90804,714-893-5111" <?php echo ($info['finance_company_list'] == "LBS  FNCL  CU ELT L67,P O  BX  4860,LONG BEACH CA 90804,714-893-5111") ? 'selected' : ''?>>LBS  FNCL  CU ELT L67</option>
		<option value="LONG BEACH CITY EMPLOYEES FCU,2801 TEMPLE AVE,SIGNAL HILL CA 90755,562-595-4725" <?php echo ($info['finance_company_list'] == "LONG BEACH CITY EMPLOYEES FCU,2801 TEMPLE AVE,SIGNAL HILL CA 90755,562-595-4725")? 'selected' : ''?>>LONG BEACH CITY EMPLOYEES FCU</option>
		<option value="LOS ANGELES FCU ELT# K65,PO BOX 53032,LOS ANGELES CA 90053,818-242-8640" <?php echo ($info['finance_company_list'] == "LOS ANGELES FCU ELT# K65,PO BOX 53032,LOS ANGELES CA 90053,818-242-8640") ? 'selected' : ''?>>LOS ANGELES FCU ELT# K65</option>
		<option value="MB FINANCIAL BANK ELT AKP,POST OFFICE BOX 5191,DES PLAINS IL 60014,888-422-6562" <?php echo ($info['finance_company_list'] == "MB FINANCIAL BANK ELT AKP,POST OFFICE BOX 5191,DES PLAINS IL 60014,888-422-6562") ? 'selected' : ''?>>MB FINANCIAL BANK ELT AKP</option>
		<option value="MEDALLIO BANK,1100 EAST 6600 SOUTH SUITE 510,SALT LAKE CITY UTAH 84121,866-688-6983" <?php echo ($info['finance_company_list'] == "MEDALLIO BANK,1100 EAST 6600 SOUTH SUITE 510,SALT LAKE CITY UTAH 84121,866-688-6983") ? 'selected' : ''?>>MEDALLIO BANK</option>
		<option value="MODEL FINANCE ELT ANT,PO BOX 5825,ORANGE CA 92863,714-480-8484" <?php echo ($info['finance_company_list'] == "MODEL FINANCE ELT ANT,PO BOX 5825,ORANGE CA 92863,714-480-8484") ? 'selected' : ''?>>MODEL FINANCE ELT ANT</option>
		<option value="MOTOLEASE FINANCIAL, LLC,5200 W CENTURY BLVD SUITE 750,LOS ANGELES CA 90045,8772346681" <?php echo ($info['finance_company_list'] == "MOTOLEASE FINANCIAL, LLC,5200 W CENTURY BLVD SUITE 750,LOS ANGELES CA 90045,8772346681") ? 'selected' : ''?>>MOTOLEASE FINANCIAL, LLC</option>
		<option value="SAN DIEGO CNTY CR UN,6545 SEQUENCE DR,SAN DIEGO CA 92121" <?php echo ($info['finance_company_list'] == "SAN DIEGO CNTY CR UN,6545 SEQUENCE DR,SAN DIEGO CA 92121") ? 'selected' : ''?>>SAN DIEGO CNTY CR UN</option>
		<option value="SHEFFIELD FNCL DIV OF BBT ELT# AQY,PO BOX 1704,CLEMMONS NC 27012,800-438-8892" <?php echo ($info['finance_company_list'] == "SHEFFIELD FNCL DIV OF BBT ELT# AQY,PO BOX 1704,CLEMMONS NC 27012,800-438-8892") ? 'selected' : ''?>>SHEFFIELD FNCL DIV OF BBT ELT# AQY</option>
		<option value="SYNCHRONY BANK ELT CZY,332 MINNESOTA STREET SUITE W600,ST. PAUL MN 55101,866-220-1332" <?php echo ($info['finance_company_list'] == "SYNCHRONY BANK ELT CZY,332 MINNESOTA STREET SUITE W600,ST. PAUL MN 55101,866-220-1332") ? 'selected' : ''?>>SYNCHRONY BANK ELT CZY</option>
		<option value="TECHNICOLOR FCU ELT# AYK,434 W ALAMEDA AVE,BURBANK CA 91506,818-973-4900" <?php echo ($info['finance_company_list'] == "TECHNICOLOR FCU ELT# AYK,434 W ALAMEDA AVE,BURBANK CA 91506,818-973-4900") ? 'selected' : ''?>>TECHNICOLOR FCU ELT# AYK</option>
		<option value="THUNDER ROAD FNCL LLC ELT ESN,PO BOX 19849,RENO NV 89521,775 332 1965" <?php echo ($info['finance_company_list'] == "THUNDER ROAD FNCL LLC ELT ESN,PO BOX 19849,RENO NV 89521,775 332 1965") ? 'selected' : ''?>>THUNDER ROAD FNCL LLC ELT ESN</option>
		<option value="WESTLAKE FINANCIAL SVCS ELT CTN,P O BOX 997592,SACRAMENTO CA 95899,888-893-7937" <?php echo ($info['finance_company_list'] == "WESTLAKE FINANCIAL SVCS ELT CTN,P O BOX 997592,SACRAMENTO CA 95899,888-893-7937") ? 'selected' : ''?>>WESTLAKE FINANCIAL SVCS ELT CTN</option>
		<option value="YAMAHA MTR FIN CORP USA ELT DYF,P.O. BOX 203,HUNT VALLEY MD 21030,844-926-2422" <?php echo ($info['finance_company_list'] == "YAMAHA MTR FIN CORP USA ELT DYF,P.O. BOX 504125,SAN DIEGO CA 92150,844-926-2422") ? 'selected' : ''?>>YAMAHA MTR FIN CORP USA ELT DYF</option>
		<?php /*?><option value="ROADRUNNER FINANCIAL INC.,4315 PICKETT RD.,ST JOSEPH MO 64503" <?php echo ($info['finance_company_list'] == "ROADRUNNER FINANCIAL INC.,4315 PICKETT RD.,ST JOSEPH MO 64503") ? 'selected' : ''?>>ROADRUNNER FINANCIAL INC.</option><?php */?>
	
	
	<select>

	<br /><br />
	
	<span id="finance_company_list_selected" ></span>
    </td>
  </tr>
  </table>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
    <td style=" width:20%; font-size:14px; font-weight:600; padding:10px 0 0 0; ">Please have insurance agent fax insurance binder to fax (310) 331-1646</td>
  </tr>
  </table>
  
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
  <td style=" width:100%; font-size:18px; text-align:center; font-weight:normal; padding:10px 0 0 0;">Any additional questions please see your sales asscociate.</td>
  </tr>
  
  <tr>
  <td style=" width:100%; font-size:25px; text-align:center; font-weight:normal; padding:10px 0 0 0;"><?php echo $info['sperson']; ?></td>
  </tr>
  
  <tr>
  <td style=" width:100%; font-size:18px; text-align:center; font-weight:normal; padding:10px 0 0 0;"><?php echo $dealer; ?>
2500 Marine</td>
  </tr>
  
  <tr>
  <td style=" width:100%; font-size:18px; text-align:center; font-weight:normal; padding:10px 0 0 0;"><?php echo $d_address; ?></td>
  </tr>
  
  <tr>
  <td style=" width:100%; font-size:18px; text-align:center; font-weight:normal; padding:10px 0 0 0;"><?php echo $d_city.','.$d_state.','.$d_zip; ?></td>
  </tr>
  
  <tr>
  <td style=" width:100%; font-size:18px; text-align:center; font-weight:normal; padding:10px 0 0 0;"><?php echo $d_phone; ?></td>
  </tr>
  
  <tr>
  <td style=" width:100%; font-size:30px; text-align:center; font-weight:600; padding:10px 0 0 0;">Thank you for your business!</td>
  </tr>
  
  </table>
			</div>
	</div></div>
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
	
	$("#finance_company_list").change(function() {
	
		val = $(this).val();
		var substr = val.split(',');
		var i;
		var string="<span style='font-size:15px;'>";
		for (i = 0; i < substr.length; ++i) {
			string = string + substr[i] + "<br />";
		}
		string = string + "</span>";
		//alert(string);
		$("#finance_company_list_selected").html(string);
	});

	var finance_company_list = "<?php echo $info['finance_company_list']; ?>";

	if(finance_company_list != ""){
		
		$("#finance_company_list").trigger("change");
	}

	
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
