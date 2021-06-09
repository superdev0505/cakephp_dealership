<?php
// updated
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

/*General Start*/
.black_row{background-color:#000;padding:3px;color:#fff;}
.grey_bg{background-color:#ccc!important;}
body {
  		-webkit-print-color-adjust: exact;
	}
@media print {
	.print_month
	{
		display:block;
	}
	input[type=text]{border:none;}
	input[type=text].border_bottom{border-bottom:1px solid #000!important;}
	.black_row{background-color:#ccc !important;}		
}
</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 
			
			<table width="100%">
            	<tr>
                <td width="50%">
                	<table width="100%">
                    	<td width="50%">
                        	 <img style="width:250px;" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/goaz_logo.png'); ?>" alt="">
                        </td>
                        <td>
                        <span>
                          15500 N. Hayden Rd<br/>
                          Scottsdale, AZ 85260<br/>
                          Phone:&nbsp;&nbsp;480-609-1800<br/>
                          Fax: &nbsp;&nbsp;  480-247-5627<br/>
                          Sales@goaz.com
                          
                        </span>
                        </td>
                    </table>
                </td>
                <td width="100%" align="center" valign="bottom">
                <h3>Buyers Agreement</h3><br/><br/>
                <label style="width:35%;float:left;display:inline;">Date
                <input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:$expectedt; ?>" style="width:90%;" />
                </label>
                
                <label style="width:35%;float:left;display:inline;">Salesperson
                <input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width:100%;" />
                </label>
                
                </td>
                </tr>
            </table>
            <table width="100%" border="1" cellpadding="4">
            <tr>
            	<td colspan="2" align="center" class="black_row"><h4>Customer Information</h4></td>
                <td colspan="2" align="center" class="black_row"><h4>Purchase Vehicle Information</h4></td>
            </tr>
            <tr>
    	        <td width="8%" class="grey_bg"><label>Buyer</label></td>
  	            <td width="42%"><input type="text" name="buyer" value="<?php echo $info['first_name'].' '.$info['last_name'] ?>" style="width:90%;" /></td>
                <td width="8%" class="grey_bg"><label>Stock #</label></td>
                <td width="42%"><div style="float:left;width:60%;border-right:1px solid #000;"><input type="text" name="stock_num" value="<?php echo $info['stock_num']; ?>" style="width:90%;" /></div>
                <div style="float:left;width:40%;">
                <label style="display:inline;">&nbsp;&nbsp;<input type="radio" name="condition" value="New" <?php echo ($info['condition'] == 'New')?'checked':''; ?> />&nbsp;New</label>
                <label style="display:inline;"><input type="radio" name="condition" value="Used" <?php echo ($info['condition'] == 'Used')?'checked':''; ?> />&nbsp;Used</label>
                </div>
                </td>
            </tr>
            
            <tr>
    	        <td class="grey_bg"><label>Co-Buyer</label></td>
  	            <td ><input type="text" name="co_buyer" value="<?php echo isset($info['co_buyer'])?$info['co_buyer']:''; ?>" style="width:90%;" /></td>
                <td  class="grey_bg"><label>Year</label></td>
                <td ><input type="text" name="year" value="<?php echo $info['year']; ?>" style="width:90%;" />
                </td>
            </tr>
            <tr>
    	        <td  class="grey_bg"><label>Address</label></td>
  	            <td ><input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width:90%;" /></td>
                <td  class="grey_bg"><label>Make</label></td>
                <td ><input type="text" name="make" value="<?php echo $info['make']; ?>" style="width:90%;" />
                </td>
            </tr>
            
            <tr>
    	        <td  class="grey_bg"><label>City St. Zip.</label></td>
  	            <td ><input type="text" name="city"  value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width:50%; float:left;" /><input type="text" name="state"  value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width:20%; float:left;" />
                <input type="text" name="zip"  value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width:27%; float:left;" />
                </td>
                <td class="grey_bg"><label>Model</label></td>
                <td ><input type="text" name="model" value="<?php echo $info['model']; ?>" style="width:90%;" />
                </td>
            </tr>
            
            <tr>
    	        <td  class="grey_bg"><label>Work #</label></td>
  	            <td ><div style="width:35%;float:left;"><input type="text" name="work_number" value="<?php echo isset($info['work_number'])?$info['work_number']:''; ?>" style="width:90%;" /></div>
                <div class="grey_bg input_div" style="width:15%;height:30px;float:left;border-right:1px solid #000;border-left:1px solid #000;"><label>&nbsp;County</label> </div>
                <div style="width:50%;float:left;">
                    <input type="text" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" style="width:90%;float:left;" />
                    
                </div>
                </td>
                <td  class="grey_bg"><label>Odometer</label></td>
                <td ><input type="text" name="odometer" value="<?php echo isset($info['odometer'])?$info['odometer']:''; ?>" style="width:90%;" />
                </td>
            </tr>
            
            <tr>
    	        <td  class="grey_bg"><label>Home #</label></td>
  	            <td ><input type="text" name="phone" value="<?php echo isset($info['mobile'])?$info['mobile']:$info['phone']; ?>" style="width:90%;" /></td>
                <td  class="grey_bg"><label>Color</label></td>
                <td ><input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width:90%;" />
                </td>
            </tr>
            <tr>
    	        <td  class="grey_bg"><label>Email</label></td>
  	            <td ><input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width:90%;" /></td>
                <td  class="grey_bg"><label>VIN #</label></td>
                <td ><input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width:90%;" />
                </td>
            </tr>
            
            <tr>
            	<td colspan="2" align="center" class="black_row"><h4>Trade</h4></td>
                <td colspan="2" align="center" class="black_row"><h4>Vehicle Amount</h4></td>
            </tr>
            
              <tr>
    	        <td  class="grey_bg"><label>VIN</label></td>
  	            <td ><div style="width:60%;float:left;"><input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" style="width:90%;" /></div>
                <div class="grey_bg input_div" style="width:12%;height:30px;float:left;border-right:1px solid #000;border-left:1px solid #000;"><label>&nbsp;Miles</label> </div>
                <div style="width:28%;float:left;">
                    <input type="text" name="trade_odometer" value="<?php echo isset($info['trade_odometer'])?$info['trade_odometer']:''; ?>" style="width:90%;float:left;" />
                    
                </div>
                </td>
                <td colspan="2" rowspan="8">
                <table width="100%">
                	<tr>
                    <td width="30%"><label>MSRP:</label></td>
                    <td width="70%"><input type="text" id="unit_value" name="unit_value" class="border_bottom amount_field" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    
                    <tr>
                    <td width="30%"><label>Frieght:</label></td>
                    <td width="70%"><input type="text" id="frieght_fee" name="frieght_fee" class="border_bottom amount_field" value="<?php echo isset($info['frieght_fee'])?$info['frieght_fee']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    <tr>
                    <td width="30%"><label>Handling:</label></td>
                    <td width="70%"><input type="text" id="handling_fee" name="handling_fee" class="border_bottom amount_field" value="<?php echo isset($info['handling_fee'])?$info['handling_fee']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    
                    <tr>
                    <td width="30%"><label>DOC Fee:</label></td>
                    <td width="70%"><input type="text" id="doc_fee" name="doc_fee" class="border_bottom amount_field" value="<?php echo isset($info['doc_fee'])?$info['doc_fee']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    
                    <tr>
                    <td width="30%"><label>Recon Fee:</label></td>
                    <td width="70%"><input type="text" id="recon_fee" name="recon_fee" class="border_bottom amount_field" value="<?php echo isset($info['recon_fee'])?$info['recon_fee']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    <tr>
                    <td width="30%"><label>Tax, Title, Lic:</label></td>
                    <td width="70%"><input type="text" id="other_fee" name="other_fee" class="border_bottom amount_field" value="<?php echo isset($info['other_fee'])?$info['other_fee']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    <tr>
                    <td colspan="2">&nbsp;</td>
                    </tr>
                     <tr>
                    <td width="30%"><label>Total:</label></td>
                    <td width="70%"><input id="total_amount" type="text" name="total_amount" class="border_bottom" value="<?php echo isset($info['total_amount'])?$info['total_amount']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    
                    
                </table>
                
                </td>
                
                
              </tr>
              <tr>
              	 <td  class="grey_bg"><label>Year</label></td>
  	            <td ><div style="width:35%;float:left;"><input type="text" name="year_trade" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>" style="width:90%;" /></div>
                <div class="grey_bg input_div" style="width:18%;height:30px;float:left;border-right:1px solid #000;border-left:1px solid #000;"><label>&nbsp;Make</label> </div>
                <div style="width:47%;float:left;">
                    <input type="text" name="make_trade" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>" style="width:90%;float:left;" />
                    
                </div>
                </td>
              </tr>
              
              <tr>
              	 <td  class="grey_bg"><label>Model</label></td>
  	            <td ><div style="width:50%;float:left;"><input type="text" name="model_trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" style="width:90%;" /></div>
                <div class="grey_bg input_div" style="width:15%;height:30px;float:left;border-right:1px solid #000;border-left:1px solid #000;"><label>&nbsp;Color</label> </div>
                <div style="width:35%;float:left;">
                    <input type="text" name="color_trade" value="<?php echo isset($info['color_trade'])?$info['color_trade']:''; ?>" style="width:90%;float:left;" />
                    
                </div>
                </td>
              </tr>
              <tr>
             	 <td colspan="2" align="center" class="black_row"><h4>Lienholder</h4></td>
              </tr>
               <tr>
              	<td  class="grey_bg"><label>Company</label></td>
  	            <td ><input type="text" name="lien_company" value="<?php echo isset($info['lien_company'])?$info['lien_company']:''; ?>" style="width:90%;" /></td>
              </tr>
              <tr>
              	<td  class="grey_bg"><label>Address</label></td>
  	            <td ><input type="text" name="lien_address" value="<?php echo isset($info['lien_address'])?$info['lien_address']:''; ?>" style="width:90%;" /></td>
              </tr>
               <tr>
              	<td  class="grey_bg"><label>City St. zip.</label></td>
  	            <td ><input type="text" name="lien_city_state" value="<?php echo isset($info['lien_city_state'])?$info['lien_city_state']:''; ?>" style="width:90%;" /></td>
              </tr>
              
              <tr>
              	<td  class="grey_bg"><label>Phone</label></td>
  	            <td ><input type="text" name="lien_phone" value="<?php echo isset($info['lien_phone'])?$info['lien_phone']:''; ?>" style="width:90%;" /></td>
              </tr>
              <tr>
              	<td  class="grey_bg"><label>Pay off $</label></td>
  	            <td ><input type="text" name="lien_payoff" value="<?php echo isset($info['lien_payoff'])?$info['lien_payoff']:''; ?>" style="width:90%;" /></td>
              	<td colspan="2" rowspan="3">
                	<table width="100%;">
                    <tr>
                    <td width="40%">
                    	Apllicable Promos?
                    </td>
                    <td>
                    	<span style="display:inline;"><input type="radio" name="promos_apply" value="yes" <?php echo (isset($info['promos_apply']) && $info['promos_apply'] =='yes')?'checked':''; ?> /> Yes&nbsp;&nbsp;</span>
                        <span style="display:inline;"><input type="radio" name="promos_apply" value="no" <?php echo (isset($info['promos_apply']) && $info['promos_apply'] =='no')?'checked':''; ?> /> No</span>
                    </td>
                    </tr>
                    <tr>
                    	<td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td>Discription/Amount:</td>
                        <td><input type="text" name="promo_amount" class="border_bottom" value="<?php echo isset($info['promo_amount'])?$info['promo_amount']:''; ?>" style="width:90%;" /></td>
                    </tr>
                    
                    <tr>
                    	<td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td>Expires:</td>
                        <td><input type="text" name="promo_expiry" class="border_bottom" value="<?php echo isset($info['promo_expiry'])?$info['promo_expiry']:''; ?>" style="width:90%;" /></td>
                    </tr>
                     <tr>
                    	<td colspan="2">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="2"><p>Price does not include Applicable Tax, Title, or Lic Fees</p></td>
                    </tr>
                    </table>
                    
                </td>
              </tr>
              
              <tr>
              <td colspan="2">
              <label style="display:inline;float:left;width:42%">Good Through: <input type="text" name="good_through" class="border_bottom" value="<?php echo isset($info['good_through'])?$info['good_through']:''; ?>" style="width:35%;" /></label>
               <label style="display:inline;float:left;width:38%">Per Diem: <input type="text" name="per_diem" class="border_bottom" value="<?php echo isset($info['per_diem'])?$info['per_diem']:''; ?>" style="width:40%;" /></label>
               <label style="display:inline;float:left;width:20%">By: <input type="text" name="per_diem" class="border_bottom" value="<?php echo isset($info['per_diem'])?$info['per_diem']:''; ?>" style="width:60%;" /></label>
              </td>
              </tr>
              <tr> 
              <td colspan="2">
              <table width="100%" border="1">
              	<tr>
              		<td  class="grey_bg" width="16%;"><label>Tires</label></td>
                    <td width="16%;"><input type="text" name="unit_tires"  value="<?php echo isset($info['unit_tires'])?$info['unit_tires']:''; ?>" style="width:95%;" /></td>
                    <td  class="grey_bg" width="68%;"><label>Customer Rates</label></td>
              	</tr>
                <tr>
              		<td  class="grey_bg"><label>Paint</label></td>
                    <td ><input type="text" name="paint" value="<?php echo isset($info['paint'])?$info['paint']:''; ?>" style="width:95%;" /></td>
                      <td  class="grey_bg" width="68%;"><label>Vehicle Seen &nbsp;&nbsp;<input type="radio" name="vehicle_seen" value="yes" <?php echo (isset($info['vehicle_seen']) && $info['vehicle_seen']== 'yes')?'checked':''; ?> /> &nbsp;Yes &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      
                      <input type="radio" name="vehicle_seen" value="no" <?php echo (isset($info['vehicle_seen']) && $info['vehicle_seen']== 'no')?'checked':''; ?> /> &nbsp;No
                      </label></td>
                   
              	</tr>
                 <tr>
              		<td  class="grey_bg"><label>Last SVC.</label></td>
                    <td ><input type="text" name="last_svc" value="<?php echo isset($info['last_svc'])?$info['last_svc']:''; ?>" style="width:95%;" /></td>
                    <td  class="grey_bg" width="68%;" align="center"><label>Trade Value</label></td>
                 </tr>
                  <tr>
              		<td  class="grey_bg"><label>Accys.</label></td>
                    <td ><input type="text" name="accys" value="<?php echo isset($info['accys'])?$info['accys']:''; ?>" style="width:95%;" /></td>
                     <td  rowspan="3" valign="middle" align="center"><input type="text" name="trade_value" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" style="width:75%;" /></td>
                 </tr>
                 <tr>
              		<td  class="grey_bg"><label>Engine</label></td>
                    <td ><input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width:95%;" /></td>
                 </tr>
                 <tr>
              		<td  class="grey_bg"><label>Lights</label></td>
                    <td ><input type="text" name="lights" value="<?php echo isset($info['lights'])?$info['lights']:''; ?>" style="width:95%;" /></td>
                 </tr>
                
              </table>
              </td>
              </tr>
            <tr>
            	<td colspan="2" align="center" class="black_row"><h4>Down</h4></td>
                <td colspan="2" align="center" class="black_row"><h4>Payment</h4></td>
            </tr>
            <tr>
            <td colspan="2" align="center" valign="bottom">
            <h3 style="display:inline;">
            20% Down Option
            
            </h3>
            
            </td>
             <td colspan="2" align="center">
            <h3 style="display:inline;">
            <input type="radio" name="payment_option" value="1" <?php echo (isset($info['payment_option'] )&& $info['payment_option'] == 1)?'checked':''; ?> /> &nbsp;48 months to  <input name="payment_val1" type="text" value="<?php echo isset($info['payment_val1'])?$info['payment_val1']:''; ?>" style="width:50%;float:right" /></h3><br/>
             <h3 style="display:inline;">
            <input type="radio" name="payment_option" value="2" <?php echo (isset($info['payment_option'] )&& $info['payment_option'] == 2)?'checked':''; ?> /> &nbsp;60 months to <input name="payment_val2" type="text" value="<?php echo isset($info['payment_val2'])?$info['payment_val2']:''; ?>" style="width:50%;float:right" /></h3><br/>
            <h3 style="display:inline;">
            <input type="radio" name="payment_option" value="3" <?php echo (isset($info['payment_option'] )&& $info['payment_option'] == 3)?'checked':''; ?> /> &nbsp;72 months to <input name="payment_val3" type="text" value="<?php echo isset($info['payment_val3'])?$info['payment_val3']:''; ?>" style="width:50%;float:right" /></h3><br/>
            <br/>
            <br/>
            <p align="center">Payments calculated on Avg. Credit and Avg. Terms<br/> O.A.C </p>
            
            </td>
            </tr>
            
            </table><br/>
            <br/>
            
            <table width="100%">
         		<tr>
                	<td width="15%"><label>Buyer' Sign:</label></td>
                    <td width="35%"><input type="text" class="border_bottom" style="width:95%;" /></td>                	<td width="15%"><label>Accepted By:</label></td>
                    <td width="35%"><input type="text" class="border_bottom" style="width:95%;" /></td>
                </tr>   
                <tr>
                	<td colspan="4">
                    <br/><br/>
                    	<p>This Offer is not valid unless signed and accepted by the Dealer and and approved by a responsible Finance Company as to the unpaid balance.</p>
                    </td>
                </tr>
                	     
            </table>
         

		
		<!-- no print buttons -->
        	<br/>	
        </div>
    
    </div>
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
	
	$(".amount_field").on('change keyup paste',function(){
		 calculate_total();
									 									 
	 });
									 
											 
	
	
	
	function calculate_total(){
				
		
		var unit_value = isNaN(parseFloat( $("#unit_value").val()))?0.00:parseFloat( $("#unit_value").val());
		var frieght_fee = isNaN(parseFloat( $("#frieght_fee").val()))?0.00:parseFloat( $("#frieght_fee").val());
		var handling_fee = isNaN(parseFloat( $("#handling_fee").val()))?0.00:parseFloat( $("#handling_fee").val());
		var doc_fee = isNaN(parseFloat( $("#doc_fee").val()))?0.00:parseFloat( $("#doc_fee").val());
		var recon_fee = isNaN(parseFloat( $("#recon_fee").val()))?0.00:parseFloat( $("#recon_fee").val());
		var other_fee = isNaN(parseFloat( $("#other_fee").val()))?0.00:parseFloat( $("#other_fee").val());
		
		total_amount = unit_value + frieght_fee + handling_fee + doc_fee + recon_fee + other_fee;
		$("#total_amount").val(total_amount.toFixed(2));
		
	}
	
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
