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
	<style>
		
		body{ margin:0 5%; padding:0; font-family:Verdana, Geneva, sans-serif; }

		.mgr_checklist{ width:97%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.mgr_checklist2{ width:50%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}

		.mgr_checklist3 {
			 border: solid 2px #000 !important;
		    -webkit-appearance: none;
		    -moz-appearance: none;
		    -o-appearance: none;
		    appearance: none;
		    width: 18px;
		    height: 18px; vertical-align:middle;
		    margin-right: 10px;
		}

		.mgr_checklist4{ width:70%; background:none; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.mgr_checklist5{ width:20%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:5px 5px;}

		.mgr_checklist6{ width:65%; border-bottom:solid 1px #000; background:none; border-top:none; border-right:none; border-left:none; margin:5px 5px;}
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:100%;}
		#worksheet_wraper {width:100%;}
		}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:100%; text-align:center;">
				<img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/head-img.png'); ?>" alt="">
				
			    </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:50%; text-align:center; font-weight:600;"> TRADE-IN CHECK LIST  </td>
			    <td style="width:50%; text-align:center; font-weight:600;"> STOCK# <input  name="stock_data"  value="<?php echo isset($info['stock_data']) ? $info['stock_data'] :  $info['stock_num']; ?>"  type="text"  class="mgr_checklist5" /> </td>
			  </tr>
			</table>


			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="year_make_model"  value="<?php echo isset($info['year_make_model']) ? $info['year_make_model'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> CONFIRM YEAR, MAKE AND MODEL </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="roof_front_back"  value="<?php echo isset($info['roof_front_back']) ? $info['roof_front_back'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> INSPECT ROOF, FRONT, BACK, SIDES AND UNDERCARRIAGE </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="inspect_data"  value="<?php echo isset($info['inspect_data']) ? $info['inspect_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> INSPECT TIRES </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="run_slide_data"  value="<?php echo isset($info['run_slide_data']) ? $info['run_slide_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> RUN SLIDE OUTS OUT AND BACK IN </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="inspect_data"  value="<?php echo isset($info['inspect_data']) ? $info['inspect_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> INSPECT INTERIOR CONDITION </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="water_data"  value="<?php echo isset($info['water_data']) ? $info['water_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> TURN ON WATER HEATER </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="turn_data"  value="<?php echo isset($info['turn_data']) ? $info['turn_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> TURN ON A/C AND FURNACE </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="water_pump_data"  value="<?php echo isset($info['water_pump_data']) ? $info['water_pump_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> TURN ON WATER PUMP </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="propane_data"  value="<?php echo isset($info['propane_data']) ? $info['propane_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> TURN ON REFER ON PROPANE </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="celining_data"  value="<?php echo isset($info['celining_data']) ? $info['celining_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> CHECK FOR WATER DAMAGE (CEILING, FLOOR AND SIDEWALLS) </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="tank_data"  value="<?php echo isset($info['tank_data']) ? $info['tank_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> CHECK MONITOR PANEL FOR HOLDING TANK LEVELS</td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="collect_key_data"  value="<?php echo isset($info['collect_key_data']) ? $info['collect_key_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> COLLECT KEYS </td>
			  </tr>
			  
			  <tr>
			    <td style="width:20%; padding:2px 0;">  <input  name="collect_data"  value="<?php echo isset($info['collect_data']) ? $info['collect_data'] :  ''; ?>"  type="text"  class="mgr_checklist" />  </td>
			    <td style="width:80%; padding:2px 0;"> COLLECT TITLE AND/OR REGISTRATION </td>
			  </tr>
			</table>

			 
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:100%; font-weight:600;"> DATE UNIT INSPECTED <input  name="date_unit_data"  value="<?php echo isset($info['date_unit_data']) ? $info['date_unit_data'] :  ''; ?>"  type="text"  class="mgr_checklist5" /> MGR THAT PERFORMED  </td>
			  </tr>
			</table>


			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:100%; font-weight:600;"> INSPECTION <input  name="inspection_data"  value="<?php echo isset($info['inspection_data']) ? $info['inspection_data'] :  ''; ?>"  type="text"  class="mgr_checklist5" />   </td>
			  </tr>
			</table>

			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:33%; font-weight:normal;"> Year <input  name="inspection_year"  value="<?php echo isset($info['inspection_year']) ? $info['inspection_year'] :  $info['year_trade']; ?>"  type="text"  class="mgr_checklist4" />   </td>
			    <td style="width:33%; font-weight:normal;"> Make <input  name="inspection_make"  value="<?php echo isset($info['inspection_make']) ? $info['inspection_make'] :  $info['make_trade']; ?>"  type="text"  class="mgr_checklist4" />   </td>
			    <td style="width:33%; font-weight:normal;"> Model <input  name="inspection_model"  value="<?php echo isset($info['inspection_model']) ? $info['inspection_model'] :  $info['model_trade']; ?>"  type="text"  class="mgr_checklist4" />   </td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:33%; font-weight:normal;"> Length <input  name="inspection_length"  value="<?php echo isset($info['inspection_length']) ? $info['inspection_length'] :  ''; ?>"  type="text"  class="mgr_checklist4" />   </td>
			    <td style="width:33%; font-weight:normal;">  </td>
			    <td style="width:33%; font-weight:normal;">   </td>
			  </tr>
			</table>

			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:100%; font-weight:600;"> VIN# VERIFIED FROM UNIT </td>
			    </tr>
			</table>  

			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:100%; font-weight:600;">  <input  name="vin_verified_data"  value="<?php echo isset($info['vin_verified_data']) ? $info['vin_verified_data'] :  $info['vin_trade']; ?>"  type="text"  class="mgr_checklist" />  </td>
			    </tr>
			</table>

			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			   <tr>
			    <td style="width:33%; font-weight:600;"> Vin matches title? <input  name="vin_title_data"  value="<?php echo isset($info['vin_title_data']) ? $info['vin_title_data'] :  ''; ?>"  type="text"  class="mgr_checklist4" /> </td>
			    <td style="width:33%; font-weight:600;"> Mgr initials <input  name="mgr_data"  value="<?php echo isset($info['mgr_data']) ? $info['mgr_data'] :  ''; ?>"  type="text"  class="mgr_checklist4" />   </td>
			    <td style="width:33%; font-weight:600;">Winterized verified? <input  name="winterized_data"  value="<?php echo isset($info['winterized_data']) ? $info['winterized_data'] :  ''; ?>"  type="text"  class="mgr_checklist" /></td>
			  </tr>
			</table>

			  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
			  <tr>
			    <td style="width:33%; font-weight:normal;">    </td>
			    <td style="width:33%; font-weight:normal;">  </td>
			    <td style="width:33%; font-weight:normal;">   </td>
			  </tr>
			</table>

			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px; margin-bottom:30px;">
			   <tr>
			    <td style="width:33%; font-weight:normal; font-size:18px;"> NADA WHOLESALE    </td>
			    <td style="width:33%; font-weight:normal; font-size:18px;"> NADA RETAIL     </td>
			    <td style="width:33%; font-weight:normal; font-size:18px;">ACV </td>
			  </tr>
			  
			  <tr>
			    <td style="width:33%; font-weight:normal; font-size:18px;"> <input  name="nada_wholesale_data"  value="<?php echo isset($info['nada_wholesale_data']) ? $info['nada_wholesale_data'] :  ''; ?>"  type="text"  class="mgr_checklist4" /> </td>
			    <td style="width:33%; font-weight:normal; font-size:18px;"> <input  name="nada_retail_data"  value="<?php echo isset($info['nada_retail_data']) ? $info['nada_retail_data'] :  ''; ?>"  type="text"  class="mgr_checklist4" /> </td>
			    <td style="width:33%; font-weight:normal; font-size:18px;"> <input  name="acv_data"  value="<?php echo isset($info['acv_data']) ? $info['acv_data'] :  ''; ?>"  type="text"  class="mgr_checklist4" /> </td>
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
