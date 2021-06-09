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
		<style>body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}

.dte_fm{border:2px solid black; width:10%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm2{border:2px solid black; width:37%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm3{border:2px solid black; width:50%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm4{border:2px solid black; width:90%; border-bottom:dashed 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}
.dte_fm5{border:2px solid black; width:90%; background:none; border:none; margin-right:20px;}

.dte_fm6{border:2px solid black; width:28%; border-bottom:solid 1px #000; border-top:none; border-left:none; border-right:none; margin-right:20px;}

@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;}
    #fixedfee_selection,.price_options,.noprint {
        display: none;
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
        
        
		
		<table width="100%" style="border:solid 3px #000;" >
      <tr>
        <td style="background:#ccc; color:#fff; font-size:18px; text-align:center; padding:10px 0; font-weight:600;">WHOLE GOODS WORKSHEETS</td>
      </tr>
    </table>

      <table width="100%">
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">DATE <input name="date"  value="<?php echo isset($info['date']) ? $info['date'] : "" ?>"  type="text" class="dte_fm" /> 
		SALESPERSON: <input name="salesperson"  value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>"  type="text" class="dte_fm2" /> 
		CASH <input name="cash"  value="<?php echo isset($info['cash']) ? $info['cash'] : "" ?>"  type="text" class="dte_fm" /> 
		FINANCE <input name="finance"  value="<?php echo isset($info['finance']) ? $info['finance'] : "" ?>"  type="text" class="dte_fm" /></td>
         </tr>
         
        <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  CUSTOMER NAME: <input name="customer_name1"  value="<?php echo isset($info['customer_name1']) ? $info['customer_name1'] :  $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="dte_fm3" /></td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  PRODUCT 1: <input  value="<?php echo isset($info['product1']) ? $info['product1'] : $info['year'].','.$info['make'].','.$info['model']; ?>"  name="product1" type="text" class="dte_fm3" /> 
		STOCK # 1: <input name="pr1_stock"  value="<?php echo isset($info['pr1_stock']) ? $info['pr1_stock'] : $info['stock_num']; ?>"  type="text" class="dte_fm" /> </td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  Vin 1: <input  value="<?php echo isset($info['vin1']) ? $info['vin1'] : $info['vin'] ?>"  name="vin1" type="text" class="dte_fm3" /></td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  PRODUCT 2: <input  value="<?php echo isset($info['product2']) ? $info['product2'] : "" ?>"  name="product2" type="text" class="dte_fm3" />  STOCK # 2: <input name="pr2_stock" type="text" class="dte_fm" /> </td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  Vin 2: <input  value="<?php echo isset($info['vin2']) ? $info['vin2'] : "" ?>"  name="vin2" type="text" class="dte_fm3" /></td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;">  PRODUCT 3: <input  value="<?php echo isset($info['product3']) ? $info['product3'] : "" ?>"  name="product3" type="text" class="dte_fm3" />  STOCK # 3: <input name="pr3_stock" type="text" class="dte_fm" /> </td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:14px; padding:10px 0;"> Vin 3: <input  value="<?php echo isset($info['vin3']) ? $info['vin3'] : "" ?>"  name="vin3" type="text" class="dte_fm3" /></td>
      </tr>
    </table>

     <table width="100%" style="border:solid 3px #000; background:#ccc;" >
      <tr>
        <td style="color:#fff; font-size:18px; text-align:center; padding:10px 0; font-weight:600;  width:50%;">WHOLE GOODS WORKSHEETS</td>
         <td style="color:#fff; font-size:18px; text-align:center; padding:10px 0; font-weight:600; width:50%;">WHOLE GOODS WORKSHEETS</td>
      </tr>
    </table>
    
    <table width="100%" style="border:solid 1px #000;" >
        <tr>
          <td style="color:#000; font-size:15px; padding:5px 0; font-weight:normal;  width:50%;">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
        <td style="width:33%; padding:0px 15px;">BUYERS ORDER:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">RETAIL SELL:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">TRADE EVALUATION:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">COST:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">DUE BILL:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">PDI:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">COPY OF DRIVERS LICENSE:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">MISC. EXP.:</td>
      </tr>
      
      <tr>
        <td style="width:33%; padding:0px 15px;">INSURANCE CARD: </td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">REBATE #1:</td>
      </tr>
      
       <tr>
        <td style="width:33%; padding:0px 15px;">COPY OF INVOICE:</td>
        <td style="width:33%; padding:0px 15px;">----</td>
        <td style="width:33%; padding:0px 15px;">REBATE #2:</td>
      </tr>
      
       <tr>
        <td style="width:40%; padding:0px 15px;">TRADE TITLE:</td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;">REBATE #3:</td>
      </tr>
      
       <tr>
        <td style="width:40%; padding:0px 15px;">LIEN RELEASE FORM</td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> LESS REBATES:</td>
      </tr>
      
       <tr>
        <td style="width:40%; padding:0px 15px;">TRAILER TITLE </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> PROFIT $ :</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">LIEN RELEASE FORM </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;">  PROFIT %:</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">LOAN PAYOFF FORM </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> FIN. SOURCE:</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">LOGGED </td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;"> DATE FUNDED:</td>
      </tr>
      
      <tr>
        <td style="width:40%; padding:0px 15px;">FUNDING CHECKLIST</td>
        <td style="width:30%; padding:0px 15px;">----</td>
        <td style="width:30%; padding:0px 15px;">TRADE ACV:</td>
      </tr>
     </table>
        </td>
        

         <td style="color:#000; font-size:15px; padding:5px 0; font-weight:normal; width:50%;">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td style="width:33%;">STOCK # 1</td>
            <td style="width:33%;">STOCK # 2</td>
            <td style="width:33%;">STOCK # 3</td>
          </tr>
        </table>
         
         <p><input name="stock1"  value="<?php echo isset($info['stock1']) ? $info['stock1'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock2"  value="<?php echo isset($info['stock2']) ? $info['stock2'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock3"  value="<?php echo isset($info['stock3']) ? $info['stock3'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock4"  value="<?php echo isset($info['stock4']) ? $info['stock4'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock5"  value="<?php echo isset($info['stock5']) ? $info['stock5'] : "" ?>"  type="text" class="dte_fm4" /></p>
        <p><input name="stock6"  value="<?php echo isset($info['stock6']) ? $info['stock6'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock7"  value="<?php echo isset($info['stock7']) ? $info['stock7'] : "" ?>"  type="text" class="dte_fm4" /></p>
        <p><input name="stock8"  value="<?php echo isset($info['stock8']) ? $info['stock8'] : "" ?>"  type="text" class="dte_fm4" /></p>
        <p><input name="stock9"  value="<?php echo isset($info['stock9']) ? $info['stock9'] : "" ?>"  type="text" class="dte_fm4" /></p>
         <p><input name="stock10"  value="<?php echo isset($info['stock10']) ? $info['stock10'] : "" ?>"  type="text" class="dte_fm4" /></p>
            <p><input name="stock11"  value="<?php echo isset($info['stock11']) ? $info['stock11'] : "" ?>"  type="text" class="dte_fm4" /></p>
               <p><input name="stock12"  value="<?php echo isset($info['stock12']) ? $info['stock12'] : "" ?>"  type="text" class="dte_fm4" /></p>
                  <p><input name="stock13"  value="<?php echo isset($info['stock13']) ? $info['stock13'] : "" ?>"  type="text" class="dte_fm4" /></p>
              </td>
           </tr>
    </table>
    
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:40%; font-size:20px;">INVOICE AMOUNT - M.S.R.P. / INVOICE</td>
    <td style="width:20%; font-size:20px; height:70px; border-right:solid 1px #000; padding-top:22px;">$<input name="invoice1"  value="<?php echo isset($info['invoice1']) ? $info['invoice1'] : "" ?>"  type="text" class="dte_fm6" /> $ <input name="invoice2"  value="<?php echo isset($info['invoice2']) ? $info['invoice2'] : "" ?>"  type="text" class="dte_fm6" /></td>
    <td style="width:20%; font-size:20px; border-right:solid 1px #000 ; padding-left:28px;">$<input name="invoice3" type="text" class="dte_fm6"  value="<?php echo isset($info['invoice3']) ? $info['invoice3'] : "" ?>"  /> $ <input name="invoice4" type="text" class="dte_fm6"  value="<?php echo isset($info['invoice4']) ? $info['invoice4'] : "" ?>"  /></td>
     <td style="width:20%; font-size:20px; padding-left:5px; padding-top:22px;">$<input name="invoice5" type="text" class="dte_fm6"  value="<?php echo isset($info['invoice5']) ? $info['invoice5'] : "" ?>"  /> $ <input  value="<?php echo isset($info['invoice6']) ? $info['invoice6'] : "" ?>"  name="invoice6" type="text" class="dte_fm6" /></td>
  </tr>
</table>
 
    
   
    <table width="49%" style="border:solid 3px #000; margin:0 2% 0 0; float:left;" >
      <tr>
        <td style="background:#ccc; color:#fff; font-size:20px; text-align:center; border-bottom:solid 3px #000; padding:10px 0; font-weight:600;">Comments</td>
      </tr>
      <tr>
        <td style="color:#000; font-size:18px; padding:10px 0; font-weight:600; height:50 0px;">
		<input name="comments1"  value="<?php echo isset($info['comments1']) ? $info['comments1'] : "" ?>"  type="textarea"  rows="40" cols="10" class="dte_fm5" />
        
        </td>
      </tr>
    </table>
    
    <table width="49%" style="border:solid 3px #000;" >
      <tr>
        <td style=" background:#ccc; color:#000; font-size:18px; text-align:center; padding:10px 0; border-bottom:solid 3px #000; font-weight:600;">Misc. Expense Detail</td>
      </tr>
      
      <tr>
        <td style="color:#000; font-size:18px; text-align:center; padding:15px 0; border-bottom:solid 1px #000; font-weight:600;"><input name="expense1" rows="40" cols="10"  value="<?php echo isset($info['expense1']) ? $info['expense1'] : "" ?>"   type="textarea" class="dte_fm5" /></td>
      </tr>
      
     
    </table>
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
