<?php
$dealer_id_array = array(1606,62000);
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
	<div id="worksheet_container" style="width:97%; margin:0 auto;">
	<style>
    body{ margin:0 7%; padding:0; font-size:13px; border:solid 1px #ccc;}
    .bill_inp{ width:30%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
    .bill_inp2{ width:70%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
    .bill_inp3{ width:95%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:0px 10px;}
    .bill_inp4{ width:90%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
    .bill_inp5{ width:98%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
    td.purchased{
			width:100%; margin-bottom:10px; padding:2px 0; color:#fff; background:#009900 !important;
		}
		span.divider {border-top: 2px solid #000; width: 90%; display: inline-block;}
		td.river_valley_color{
			width:100%; margin-bottom:10px; padding:2px 0; color:#fff !important; background:#009900 !important;
		}
		.wraper.main input {padding: 0px !important;}
		@media print {
      .wraper.main input {padding: 0px;} 
      body {} 
      h2 {font-size:11px!important;fontweight:bolder;} 
      h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} 
      table.set_padding td{padding:1px 2px 0px 6px!important;}		
  		body { margin:0px 0px; }
  		#worksheet_container {width:100%;}
  		#worksheet_wraper {width:100%;}
  		table{padding-bottom:2px !important;margin-bottom:2px !important;}
  		td{margin:0 7p !important;padding-bottom:5px !important;}
  		.bill_inp2{ width:40%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
  		.bill_inp3{ width:95%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:0px 10px;}
  		.bill_inp4{ width:90%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
  		td {font-size: 9px;}
  		.bill_inp5{ width:98%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px; height: 10px;}
  		td.purchased{
  			width:100%; margin-bottom:5px; padding:2px 0; color:#fff; background:#009900 !important;
  			-webkit-print-color-adjust: exact;
  		}
  		td.river_valley_color{
  			width:100%; margin-bottom:5px; padding:2px 0; color:#fff; background:#009900 !important;
  			-webkit-print-color-adjust: exact;
  		}
      .notes_class{height: 50px;}
      .bill_inp4{height: 15px;}
      .delivery_class{height:10px !important;}
    }
	
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
    <td style="width:50%;">
	<img class="logo" style=" width: 70%;" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logoimage.png'); ?>" alt="">
	</td>
    <td style=" width:50%;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style=" width:40%; font-size:22px; color:#000; text-align: right; padding: 0 2% 0 0;"><strong>DUE BILL</strong></td>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:100%; font-size:16px; color:#000;"></td>
  </tr>
  <tr>
    <td style="width:100%; border:solid 1px #ccc; height:60px; vertical-align: top; padding: 2px 5px;">DELIVERY DATE <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt']) ? $info['submit_dt'] : $expectedt; ?>" style="width: 100%; border: 0px;"></td>
  </tr>
</table>

    </td>
  </tr>
</table>

    </td>
    
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; padding-bottom:10px;">SALESPERSON <input name="sperson" style="width: 50%;" value="<?php echo isset($info['sperson']) ? $info['sperson'] : $info['sperson']; ?>" type="text" class="bill_inp"></td> 
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:60%; padding-bottom:10px;">CUSTOMER NAME  <input name="customer_name1" value="<?php echo isset($info['customer_name1']) ? $info['customer_name1'] :  $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:40%; padding-bottom:10px;">ADDRESS <input  value="<?php echo isset($info['address_data']) ? $info['address_data'] : $info['address']; ?>"  name="address_data" style="width:72%" type="text" class="bill_inp2"></td> 
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:50%; padding-bottom:10px;">CITY  <input name="city_data"  value="<?php echo isset($info['city_data']) ? $info['city_data'] : $info['city']; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:25%; padding-bottom:10px;">STATE <input name="state_data"  value="<?php echo isset($info['state_data']) ? $info['state_data'] : $info['state']; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:25%; padding-bottom:10px;">ZIP <input name="zip_data"   value="<?php echo isset($info['zip_data']) ? $info['zip_data'] : $info['zip']; ?>"  type="text" class="bill_inp2"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:60%; padding-bottom:10px;">PHONE NUMBER   <input name="phone_number"  value="<?php echo isset($info['phone_number']) ? $info['phone_number'] : $info['phone']; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:40%; padding-bottom:10px;">EMAIL <input name="email_data" type="text"   value="<?php echo isset($info['email_data']) ? $info['email_data'] : $info['email']; ?>" style="width:76%"  class="bill_inp2"></td> 
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td class="purchased">PRODUCT(s) PURCHASED </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:80%; margin-bottom:10px; padding:2px 0;">1) <span class="divider"></span></td>  
   <td style="width:20%; margin-bottom:10px; padding:2px 0; text-align:right;">LOCATION </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">STOCK #  </td>  
   <td style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_stock" value="<?php echo isset($info['p1_stock'])?$info['p1_stock']:$info['stock_num']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">YR. </td>  
   <td style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_yr" value="<?php echo isset($info['p1_yr'])?$info['p1_yr']:$info['year']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MAKE </td>   
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_make1" value="<?php echo isset($info['p1_make1'])?$info['p1_make1']:$info['make']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p1_make2"  value="<?php echo isset($info['p1_make2'])?$info['p1_make2']:''; ?>"  type="text" class="bill_inp3"> </td>   
  </tr>
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MODEL </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_model" value="<?php echo isset($info['p1_model'])?$info['p1_model']:$info['model']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_vin" value="<?php echo isset($info['p1_vin'])?$info['p1_vin']:$info['vin']; ?>" type="text" class="bill_inp3"> </td>     
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:80%; margin-bottom:10px; padding:2px 0;">2) <span class="divider"></span></td>  
   <td style="width:20%; margin-bottom:10px; padding:2px 0; text-align:right;">LOCATION </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">STOCK #  </td>  
   <td style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_stock"  value="<?php echo (isset($info['p2_stock']) && !empty($info['p2_stock']))?$info['p2_stock']:$addonVehicles[0]['AddonVehicle']['stock_num']; ?>"  type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">YR. </td>  
   <td style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_yr"  value="<?php echo (isset($info['p2_yr']) && !empty($info['p2_yr']))?$info['p2_yr']:$addonVehicles[0]['AddonVehicle']['year']; ?>"  type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MAKE </td>   
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_make1"  value="<?php echo isset($info['p2_make1'])?$info['p2_make1']:$addonVehicles[0]['AddonVehicle']['make']; ?>"  type="text" class="bill_inp3"> </td> 
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p2_make2"  value="<?php echo isset($info['p2_make2'])?$info['p2_make2']:''; ?>"  type="text" class="bill_inp3"> </td>   
  </tr>
  
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MODEL </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_model" value="<?php echo isset($info['p2_model'])?$info['p2_model']:$addonVehicles[0]['AddonVehicle']['model']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_vin" value="<?php echo isset($info['p2_vin'])?$info['p2_vin']:$addonVehicles[0]['AddonVehicle']['vin']; ?>
   " type="text" class="bill_inp3"> </td>     
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:80%; margin-bottom:10px; padding:2px 0;">3) <span class="divider"></span></td>  
   <td style="width:20%; margin-bottom:10px; padding:2px 0; text-align:right;">LOCATION </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">STOCK #  </td>  
   <td style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_stock"  value="<?php echo isset($info['p3_stock'])?$info['p3_stock']:$addonVehicles[1]['AddonVehicle']['stock_num']; ?>"  type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">YR. </td>  
   <td style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_yr"  value="<?php echo isset($info['p3_yr'])?$info['p3_yr']:$addonVehicles[1]['AddonVehicle']['year']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MAKE </td>   
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_make1"  value="<?php echo isset($info['p3_make1'])?$info['p3_make1']:$addonVehicles[1]['AddonVehicle']['make']; ?>"  type="text" class="bill_inp3"> </td> 
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p3_make2"  value="<?php echo isset($info['p3_make2'])?$info['p3_make2']:''; ?>"  type="text" class="bill_inp3"> </td>   
  </tr>
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MODEL </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_model" value="<?php echo isset($info['p3_model'])?$info['p3_model']:$addonVehicles[1]['AddonVehicle']['model']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_vin" value="<?php echo isset($info['p3_vin'])?$info['p3_vin']:$addonVehicles[1]['AddonVehicle']['vin']; ?>" type="text" class="bill_inp3"> </td>     
  </tr>
</table>



<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td class="river_valley_color" style="color: #fff;">RIVER VALLEY OWES THE CUSTOMER THE FOLLOWING </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px;align:left;">QTY  </td>  
   <td style="width:30%; margin-bottom:10px; padding:2px 10px; margin:0 10px;align:left; "> PART NUMBER</td> 
    <td style="width:20%; margin-bottom:10px; padding:2px 10px; margin:0 10px;align:left;">DESCRIPTION </td>  
   <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px;align:left; "> PARTS </td> 
    <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px;align:left;"> LABOR </td>   
    <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px;align:left; "> TOTAL </td>  
  </tr>
</table>

<?php $row_number = (in_array(AuthComponent::user('dealer_id'), $dealer_id_array)) ? 11 : 15; ?>
<?php for($i=1; $i<= $row_number; $i++) { ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
    <tr>
      <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">
        <input name="due_qty<?php echo $i; ?>"  id="qty<?php echo $i; ?>" value="<?php echo (isset($info['due_qty'.$i]) && !empty($info['due_qty'.$i])) ? $info['due_qty'.$i] : $info['quantity'.$i]; ?>" type="text" class="bill_inp4">
      </td>

      <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px; ">
        <input name="due_partnumber<?php echo $i; ?>" id="due_partnumber<?php echo $i; ?>" value="<?php echo (isset($info['due_partnumber'.$i]) && !empty($info['due_partnumber'.$i])) ? $info['due_partnumber'.$i] : $info['part_number'.$i]; ?>"  type="text" class="bill_inp4">
      </td>

      <td style="width:20%; margin-bottom:10px; padding:2px 0; margin:0 10px;">
        <input name="due_description<?php echo $i; ?>" value="<?php echo (isset($info['due_description'.$i]) && !empty($info['due_description'.$i])) ? $info['due_description'.$i] : ''; ?>" type="text" class="bill_inp4">
      </td>

      <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; ">
        <input name="due_hours<?php echo $i; ?>" id="due_hours<?php echo $i; ?>" value="<?php echo (isset($info['due_hours'.$i]) && !empty($info['due_hours'.$i])) ? $info['due_hours'.$i] : ''; ?>"  type="text" class="bill_inp4 currency additional">
      </td>

      <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; ">
        <input name="due_rate<?php echo $i; ?>" id="due_rate<?php echo $i; ?>" value="<?php echo (isset($info['due_rate'.$i]) && !empty($info['due_rate'.$i])) ? $info['due_rate'.$i] : ''; ?>"  type="text" class="bill_inp4 currency additional">
      </td>
      
      <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">
        <input name="due_price<?php echo $i; ?>" id="<?php echo $i; ?>" value="<?php echo (isset($info['due_price'.$i]) && !empty($info['due_price'.$i])) ? $info['due_price'.$i] : ''; ?>" type="text" class="bill_inp4 currency price_set">
      </td>
    </tr>
  </table>
<?php } ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
    <textarea id="term_notes" name="term_notes" placeholder="TERMS/NOTES" style="width: 100%; border: 1px solid #000; height: 120px;"><?php echo isset($info['term_notes'])?$info['term_notes']:'' ?></textarea>  
  </tr>
</table>

<?php if(in_array(AuthComponent::user('dealer_id'), $dealer_id_array)) { ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
    <tr>
      <td class="river_valley_color delivery_class" style="width:100%; margin-bottom:10px; color: #fff; padding:2px 10px; margin:0 10px; font-style:italic;">  THESE ITEMS ARE DUE TO RIVER VALLEY PRIOR TO DELIVERY  </td>
    </tr>
    <?php for($i=1; $i<=7; $i++) { ?>
      <tr>
        <td class="delivery_class" style="width:100%; margin-bottom:10px; padding:2px 0; margin:0 10px;">
          <input name="deliver_item<?php echo $i; ?>" value="<?php echo isset($info['deliver_item'.$i])?$info['deliver_item'.$i]:'' ?>" type="text" class="bill_inp5" />
        </td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:50%; margin-bottom:10px; padding:2px 10px; margin:0 10px;">  CUSTOMER SIGNATURE  </td>  
   <td style="width:50%; margin-bottom:10px; padding:2px 10px; margin:0 10px;">  RIVER VALLEY AUTHORIZATION  </td>  
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
      $(".date_input_field").bdatepicker();
    	
    	$('#worksheet_wraper').stop().animate({
    	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
    	}, 800);

    	$("#worksheet_container").scrollTop(0);

    	$("#btn_print").click(function(){
        $("#termNotes").text($("#termNotes").val());
    		$( "#worksheet_container" ).printThis();
    	});
    	
    	$("#btn_back").click(function(){ });

    	//calculate();
    	function convertFormatedMoney (money){
  			return money
			  .replace(/\D/g, "")
			  .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
			  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
      }
    	
    	$('input.currency').on('keyup',function(){
    		if(event.which >= 37 && event.which <= 40){
          event.preventDefault();
        }
    		
        $(this).val(function(index, value) {
          value = value.replace(/^0+/, "");
          return convertFormatedMoney(value);
        });
    	});
    	
    	$(".price_set, .additional").on('keyup',function(){
    		var valdata = 0;
  			var price = $(this).val();	
  			price = price.replace(/,/g, '');
  			var attrid = $(this).attr("id");	
  			if(price != "") {	
  				// hours1
  				hourval = $("#hours"+attrid).val();
  				hourval = hourval.replace(/,/g, '');
  				
  				// rate1
  				rateval = $("#rate"+attrid).val();
  				rateval = rateval.replace(/,/g, '');

  				qty = $("#qty"+attrid).val();
  				qty = qty.replace(/,/g, '');
  				
  				totalquality =  (qty * parseFloat(price)) + hourval * parseFloat(rateval);
  				
  				$("#total"+attrid).val(convertFormatedMoney(totalquality.toFixed(2)));
  			}
    	});
    });
  </script>
</div>