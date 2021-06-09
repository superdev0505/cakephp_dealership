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
		.warranty{ width:90%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		.warranty2{ width:60%; border-bottom:solid 1px #000; background:none; border-top:none; border-left:none; border-right:none; margin-left:6px;}
		@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}		
		body { margin:0px 0px; }
		#worksheet_container {width:900px !important;margin-left:20px !important;}
		#worksheet_wraper {width:100%;}
		}
		</style>

	<div class="wraper header"> 
		
		
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:0px;">
			  <tr>
			    <td style="width:50%; text-align:center; font-size:30px; font-weight:600;"> Freedom Harley-Davidson, Inc. </td>
			  </tr>
			  
			  <tr>
			    <td style="width:50%; text-align:center; font-size:20px; font-weight:normal;"> 7233 Sunset Strip Ave NW ● North Canton, OH  44720 </td>
			  </tr>
			  </table>


			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:20%; font-size:16px; padding:6px 5px;"> WARRANTY </td>
				<td style="width:80%; padding:6px 5px;"> </td>
			      </tr>
			    </table>
			    
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:4%; font-size:16px;"> 
				<input  name="NEW_VEHICLE_WARRANTY"  <?php echo ($info['NEW_VEHICLE_WARRANTY'] == "NEW_VEHICLE_WARRANTY") ? 'checked' :  ''; ?>   type="checkbox" value="NEW_VEHICLE_WARRANTY" class="" />	
				</td>
				<td style="width:80%; font-size:16px;  padding:6px 5px;"> NEW VEHICLE WARRANTY AS OUTLINED BY MANUFACTURER </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:4%; font-size:16px;"> 
				<input  name="MANUFACTURERS"  <?php echo ($info['MANUFACTURERS'] == "MANUFACTURERS") ? 'checked' :  ''; ?>   type="checkbox" value="MANUFACTURERS" class="" />	
				</td>
				<td style="width:80%; font-size:16px;  padding:6px 5px;"> MANUFACTURER’S WARRANTY STILL APPLIES </td>
			      </tr>
			    </table>
			    
			    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:4%; font-size:16px;">
				<input  name="SOLD_AS_IS"  <?php echo ($info['SOLD_AS_IS'] == "SOLD_AS_IS") ? 'checked' :  ''; ?>   type="checkbox" value="SOLD_AS_IS" class="" />	
				</td>
				<td style="width:80%; font-size:16px;  padding:6px 5px;"> SOLD AS IS  </td>
			      </tr>
			    </table>
			    
			     <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:4%; font-size:16px;">
					<input  name="SOLD_WITH_GUARANTEE"  <?php echo ($info['SOLD_WITH_GUARANTEE'] == "SOLD_WITH_GUARANTEE") ? 'checked' :  ''; ?>   type="checkbox" value="SOLD_WITH_GUARANTEE" class="" />	
				</td>
				<td style="width:80%; font-size:16px;  padding:6px 5px; line-height:30px;"> SOLD WITH GUARANTEE AS FOLLOWS:  We, the dealer, guarantee this vehicle for 30 days or 1000 miles whichever comes first after date of delivery on a 50-50 retail basis of parts and labor used. (Owner pays half and dealer pays half of total retail cost of parts and labor used.) All repairs must be made in our service shop. We do not guarantee speedometer reading, tires, battery, glass, radio, accessories, exhaust system, chain, or sprockets.   </td>
			      </tr>
			    </table>

			  
			      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
			      <tr>
				<td style="width:10%; font-size:16px; padding:6px 5px;">  </td>
				<td style="width:80%; font-size:14px;  padding:6px 5px; line-height:26px;"> ALL WARRANTIES, IF ANY, BY A MANUFACTURER OR SUPPLIER OTHER THAN DEALER ARE THEIRS, NOT DEALERS, AND ONLY SUCH MANUFACTURER OR OTHER SUPPLIER SHALL BE LIABLE FOR PERFORMANCE UNDER SUCH WARRANTIES. UNLESS DEALER FURNISHES PURCHASER WITH A SEPARATE WRITTEN WARRANTY OR SERVICE CONTRACT MADE BY THE DEALER ON ITS BEHALF. DEALER HEREBY DISCLAIMS ALL WARRANTIES, EXPRESS OR IMPLIED, INCLUDING ANY IMPLIED WARRANTIES OF MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE IN CONNECTION WITH THE VEHICLE AND ANY RELATED PRODUCTS AND SERVICES SOLD BY DEALER. DEALER NEITHER ASSUMES OR AUTHORIZES ANY OTHER PERSON TO ASSUME FOR IT ANY LIABILITY IN CONNECTION WITH THE SALE OF THE VEHICLE AND THE RELATED PRODUCTS AND SERVICES. IN THE EVENT THAT A WRITTEN WARRANTY IS PROVIDED BY THE DEALER OR A SERVICE CONTRACT IS SOLD BY THE DEALER ON ITS OWN BEHALF, ANY IMPLIED WARRANTIES ARE LIMITED IN DURATION TO THE TERM OF THE WRITTEN WARRANTY/SERVICE CONTRACT.  </td>
			      </tr>
			    </table>
			    
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:33%; font-size:10px; padding:20px 0; border-top:solid 1px #000; border-bottom:solid 1px #000; border-right:solid 1px #000; vertical-align:top;"> 
				    
				    YEAR: <input name="year_datasplit"  value="<?php echo isset($info['year_datasplit']) ? $info['year_datasplit'] :  $info['year']; ?>" type="text" class="warranty2" />
				    <br />
				    MODEL: <input name="model_datasplit"  value="<?php echo isset($info['model_datasplit']) ? $info['model_datasplit'] :  $info['model']; ?>" type="text" class="warranty2" />
				    
				    <?php //echo $info['year'] .','.$info['model']; ?></td>
				    <td style="width:33%; font-size:10px; padding:20px 0; border-top:solid 1px #000; border-bottom:solid 1px #000; border-right:solid 1px #000; vertical-align:top;"> REFERENCE : <input name="REFERENCE"  value="<?php echo isset($info['REFERENCE']) ? $info['REFERENCE'] :  ''; ?>" type="text" class="warranty2" /></td>
				    <td style="width:33%; font-size:10px; padding:20px 0; border-top:solid 1px #000; border-bottom:solid 1px #000; vertical-align:top;"> VIN : <?php echo $info['vin']; ?> </td>
				  </tr>
				</table>
				
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:60%; font-size:16px; "> PURCHASER: <input name="PURCHASER"  value="<?php echo isset($info['PURCHASER']) ? $info['PURCHASER'] :  $info['first_name'].' '.$info['last_name']; ?>" type="text" class="warranty2" /></td>
				    <td style="width:10%; font-size:16px;"> DATE: </td>
				    <td style="width:30%; font-size:16px;"><?php echo date('Y-m-d'); ?> </td>
				  </tr>
				</table>

			       <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:60%; font-size:16px; "> PRINTED: <input name="PRINTED"  value="<?php echo isset($info['PRINTED']) ? $info['PRINTED'] :  ''; ?>" type="text" class="warranty2" /></td>
				    <td style="width:10%; font-size:16px;">  </td>
				    <td style="width:30%; font-size:16px;"> </td>
				  </tr>
				</table>
				
				 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
				  <tr>
				    <td style="width:20%; font-size:16px; text-align:right;"> OK TO POST ON FACE BOOK </td>
				    <td style="width:10%; font-size:16px; text-align:center;"> <input name="facebookyes"  value="<?php echo isset($info['facebookyes']) ? $info['facebookyes'] :  ''; ?>" type="text" class="warranty" /> YES </td>
				    <td style="width:10%; font-size:16px;  text-align:center;"> <input name="facebookno"  value="<?php echo isset($info['facebookno']) ? $info['facebookno'] :  ''; ?>" type="text" class="warranty" /> NO</td>
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
