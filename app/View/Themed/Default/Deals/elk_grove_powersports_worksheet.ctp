<?php
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
body{ margin:0 7%; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:13px;}

.poewr_inp{ width:58%; border:none; font-size:16px; color:#000; margin-left:7px;border:1px solid black;}
.poewr_inp2{ width:72%; border:none; font-size:16px; color:#000; margin-left:7px;border:1px solid black;}
.poewr_inp3{ width:90%; border:none; font-size:16px; color:#000; margin-left:7px;border:1px solid black;}
.poewr_inp4{ width:40%; border:none; font-size:16px; color:#000; margin-left:7px;border:1px solid black;}
.poewr_inp5{ width:40%; font-size:16px; color:#000; margin-left:7px; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none;border:1px solid black;}

</style>
<?php $months=array('12'=>'12','24'=>'24','36'=>'36','48'=>'48','60'=>'60','72'=>'72','84'=>'84','96'=>'96','108'=>'108','120'=>'120','132'=>'132','144'=>'144','156'=>'156','168'=>'168','180'=>'180','192'=>'192','204'=>'204','216'=>'216','228'=>'228','240'=>'240');
$selected_months=array('1'=>'24',2=>36,3=>48,4=>60);

if(!in_array(AuthComponent::user('d_type'),array('Powersports','Harley-Davidson','H-D','')))
{
	$selected_months=array('1'=>'120',2=>144,3=>180,4=>240);
}


?>
		<div class="wraper header"> 
        
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
		<input name="date" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="created" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="created_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
		<input name="modified" type="hidden"  value="<?php echo $expectedt; ?>" />
		<input name="modified_long" type="hidden"  value="<?php echo $datetimefullview; ?>" />
		<input name="owner" type="hidden"  value="<?php echo $sperson; ?>" />
        <input name="first_name" type="hidden"  value="<?php echo $info['first_name']; ?>"  />	
         <input name="last_name" type="hidden"  value="<?php echo $info['last_name']; ?>"  />     
        
			<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%; font-size:16px; color:#000; padding:7px 7px; line-height:25px;"><strong>EIK Grove Power Sports</strong></br>10491 East Stockton Blvd Unit A </br> EIK Grove, CA 956245</br> Ph- 916-714-7223 </br> Fax- 916-714-3558 </td>
    <td  style="width:50%;">
    
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:16px; color:#000; padding:12px 7px;">REF #</td>
   </tr>
   
   <tr>
    <td style="font-size:16px; color:#000 ;padding:12px 7px;">Salesperson <input value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['salesperson']; ?>" name="salesperson" class="poewr_inp" type="text"></td>
   </tr>
   
   <tr>
    <td style="font-size:16px; color:#000; padding:12px 7px;">Date <input  value="<?php echo isset($info['date']) ? $info['date'] :""; ?>"  name="date" class="poewr_inp" type="text"></td>
   </tr>
    <tr>
    <td style="font-size:16px; color:#000; padding:12px 7px;">Source <input  value="<?php echo isset($info['source']) ? $info['source'] : ""; ?>"  name="source" class="poewr_inp" type="text"></td>
   </tr>
  </table>
 </td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;"> Customer First Name <input  value="<?php echo isset($info['customer_first_name']) ? $info['customer_first_name'] : $info['first_name']; ?>"  name="customer_first_name" class="poewr_inp" type="text"></td>
    <td style="width:60%; font-size:16px; color:#000; padding:12px 7px;">Customer Last Name <input   value="<?php echo isset($info['customer_last_name']) ? $info['customer_last_name'] : $info['last_name']; ?>"    name="customer_last_name" class="poewr_inp2" type="text"></td>
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;">Co-Customer First Name <input name="co_customer_first_name"  value="<?php echo isset($info['co_customer_first_name']) ? $info['co_customer_first_name'] :""; ?>"  class="poewr_inp" type="text"></td>
    <td style="width:60%; font-size:16px; color:#000; padding:12px 7px;"> Co-Customer Last Name <input name="co_customer_last_name"  value="<?php echo isset($info['co_customer_last_name']) ? $info['co_customer_last_name'] :""; ?>"  class="poewr_inp2" type="text"></td>
  </tr>
 </table>
  
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:100%; font-size:16px; color:#000; padding:12px 7px;">Address <input name="address"  value="<?php echo isset($info['address']) ? $info['address'] :""; ?>"  class="poewr_inp3" type="text"></td>
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:20%; font-size:16px; color:#000; padding:12px 7px;">City <input name="city"  value="<?php echo isset($info['city']) ? $info['city'] :""; ?>"  class="poewr_inp" type="text"></td>
    <td style="width:20%; font-size:16px; color:#000; padding:12px 7px;"> State <input name="state"  value="<?php echo isset($info['state']) ? $info['state'] :""; ?>"  class="poewr_inp2" type="text"></td>
    <td style="width:20%; font-size:16px; color:#000; padding:12px 7px;"> Zip <input name="zip"  value="<?php echo isset($info['zip']) ? $info['zip'] :""; ?>"  class="poewr_inp2" type="text"></td>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;"> Country <input name="country"  value="<?php echo isset($info['country']) ? $info['country'] :""; ?>"  class="poewr_inp2" type="text"></td>
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;">Home Phone <input name="home_phone"  value="<?php echo isset($info['home_phone']) ? $info['home_phone'] :""; ?>"  class="poewr_inp" type="text"></td>
    <td style="width:60%; font-size:16px; color:#000; padding:12px 7px;"> Work Phone <input name="work_phone"  value="<?php echo isset($info['work_phone']) ? $info['work_phone'] :""; ?>"  class="poewr_inp2" type="text"></td>
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;">Cell Phone <input name="cell_phone"  value="<?php echo isset($info['cell_phone']) ? $info['cell_phone'] :""; ?>"  class="poewr_inp" type="text"></td>
    <td style="width:60%; font-size:16px; color:#000; padding:12px 7px;"> Email Address <input name="email_address"  value="<?php echo isset($info['email_address']) ? $info['email_address'] :""; ?>"  class="poewr_inp2" type="text"></td>
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:30%; font-size:16px; color:#000; padding:12px 7px;"><strong>Solid Vehicle</strong> 
	Year <input name="solid_year"  value="<?php echo isset($info['solid_year']) ? $info['solid_year'] :""; ?>"  class="poewr_inp4" type="text"></td>
    <td style="width:30%; font-size:16px; color:#000; padding:12px 7px;"> 
	Make <input name="solid_make"  value="<?php echo isset($info['solid_make']) ? $info['solid_make'] :""; ?>"  class="poewr_inp2" type="text"></td>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;">
	Model <input name="solid_model"  value="<?php echo isset($info['solid_model']) ? $info['solid_model'] :""; ?>"  class="poewr_inp" type="text"></td>
  </tr>
 </table>
 
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:30%; font-size:16px; color:#000; padding:12px 7px;"> VIN # <input name="solid_vin"  value="<?php echo isset($info['solid_vin']) ? $info['solid_vin'] :""; ?>" class="poewr_inp" type="text"></td>
    <td style="width:70%; font-size:16px; color:#000; padding:12px 7px;"> Stock # <input name="solid_stock"  value="<?php echo isset($info['solid_stock']) ? $info['solid_stock'] :""; ?>" class="poewr_inp2" type="text"></td> 
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:30%; font-size:16px; color:#000; padding:12px 7px;"><strong>Trade Vehicle</strong>
	Year <input name="trade_year"   value="<?php echo isset($info['trade_year']) ? $info['trade_year'] :""; ?>"  class="poewr_inp4" type="text"></td>
    <td style="width:30%; font-size:16px; color:#000; padding:12px 7px;">
	Make <input name="trade_make"  value="<?php echo isset($info['trade_make']) ? $info['trade_make'] :""; ?>"  class="poewr_inp" type="text"></td>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;">
	Model <input name="trade_model"  value="<?php echo isset($info['trade_model']) ? $info['trade_model'] :""; ?>"  class="poewr_inp" type="text"></td>
  </tr>
 </table>
 
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:30%; font-size:16px; color:#000; padding:12px 7px;"> VIN # <input name="trade_vin"  value="<?php echo isset($info['trade_vin']) ? $info['trade_vin'] :""; ?>"  class="poewr_inp" type="text"></td>
    <td style="width:70%; font-size:16px; color:#000; padding:12px 7px;"> Stock # <input name="trade_stock"  value="<?php echo isset($info['trade_stock']) ? $info['trade_stock'] :""; ?>"  class="poewr_inp2" type="text"></td> 
  </tr>
 </table>
 
 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:33%;">
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">MSRP </td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="msrp"  value="<?php echo isset($info['msrp']) ? $info['msrp'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px ;padding:10px 0; color:#000;">Destination</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="destination"  value="<?php echo isset($info['destination']) ? $info['destination'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Assembly</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="assembly"  value="<?php echo isset($info['assembly']) ? $info['assembly'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Doc</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="doc"  value="<?php echo isset($info['doc']) ? $info['doc'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Text</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="textdata"  value="<?php echo isset($info['textdata']) ? $info['textdata'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">License</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="license"  value="<?php echo isset($info['license']) ? $info['license'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%%; font-size:16px; padding:10px 0; color:#000;">Total</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="total"  value="<?php echo isset($info['total']) ? $info['total'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%%; font-size:16px; padding:10px 0; color:#000;">-</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"></td>
  </tr>
  
  <tr>
    <td style="width:40%%; font-size:16px; padding:10px 0; color:#000;">-</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"></td>
  </tr>
  
  <tr>
    <td style="width:40%%; font-size:16px; padding:10px 0; color:#000;">-</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"></td>
  </tr>
  
  <tr>
    <td style="width:40%%; font-size:16px; padding:10px 0; color:#000;">-</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"></td>
  </tr>
  
  <tr>
    <td style="width:40%%; font-size:16px; padding:10px 0; color:#000;">-</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Cash</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="cash"  value="<?php echo isset($info['cash']) ? $info['cash'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Personal Cheak</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="personal_cheak"  value="<?php echo isset($info['personal_cheak']) ? $info['personal_cheak'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Cashier Cheak</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="cashier_cheak"  value="<?php echo isset($info['cashier_cheak']) ? $info['cashier_cheak'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Credit Card %</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="credit_card"  value="<?php echo isset($info['credit_card']) ? $info['credit_card'] :""; ?>"   class="poewr_inp" type="text"></td>
  </tr>
  
  <tr>
    <td style="width:40%; font-size:16px; padding:10px 0; color:#000;">Financing</td>
    <td style="width:60%; font-size:16px; padding:10px 0; color:#000;"><input name="financing"  value="<?php echo isset($info['financing']) ? $info['financing'] :""; ?>"   class="poewr_inp" type="text"></td>
   </tr>
  
</table>

    </td>
    <td style="width:33%;">
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:100%; font-size:16px; padding:10px 0; vertical-align:top; color:#000; height:350px; border:solid 1px #000;"> Trade </br> payoff </br> Lienholder</td>
  </tr>
  
   <tr>
    <td style="width:100%; font-size:16px; padding:10px 0; color:#000; vertical-align:top; height:350px; border:solid 1px #000;"> Down</td>
  </tr>
  
</table>

    </td>
    
    <td style="width:33%;">
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:100%; font-size:16px; padding:10px 0; vertical-align:top; color:#000; height:350px; border:solid 1px #000;"> Price <br /><br /><br /><br /> * Price does not include taxes or fees. Sales price includes all discounts and promotions.</td>
  </tr>
  
   <tr>
    <td style="width:100%; font-size:16px; padding:10px 0; color:#000; vertical-align:top; height:350px; border:solid 1px #000;"> Payment <br /></br /></br /></br />Pending Credit Approval</td>
  </tr>
  
</table>

    </td>
  </tr>
</table>

<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:50%; font-size:16px; color:#000; padding:7px 7px; line-height:25px;">  I Certify that the above information is complete and accurate. I authorize an inquery  of my credit history and the release of this infomation to be kept in strict confidence by Elk Grove Power Sports. Int.___________ </td>
  </tr>
</table>

 <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:16px; color:#000; padding:12px 7px;">Dealership Approval ___________________________ </td>
    <td style="width:60%; font-size:16px; color:#000; padding:12px 7px;"> Customer Approval _____________________________</td>
  </tr>
 </table>
		
		</div>
		<!---left1-->
		<!-- no print buttons end -->
		<!-- no print buttons end -->
		<!-- no print buttons end -->
	</div>
	
		<!-- no print buttons -->
	<br/>	
		
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
	
	$( ".price_val" ).keyup(function() {
		
		values= 0;
		$( ".price_val" ).each(function() {
			
			if($(this).val() == "") return;
			values = values + parseFloat($(this).val(),2);
		});
		
		$(".total_val").val(values);
	});
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
