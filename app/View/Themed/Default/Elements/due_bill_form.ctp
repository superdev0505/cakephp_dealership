<div class="page-break"></div>
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
body{ margin:0 7%; padding:0; font-family:Georgia, "Times New Roman", Times, serif; font-size:13px; border:solid 1px #ccc;}

.bill_inp{ width:30%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
.bill_inp2{ width:70%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
.bill_inp3{ width:95%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:0px 10px;}
.bill_inp4{ width:90%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
.bill_inp5{ width:98%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
td.purchased{
			width:100%; margin-bottom:10px; padding:2px 0; color:#fff; background:#009900 !important;
		}
		td.river_valley_color{
			width:100%; margin-bottom:10px; padding:2px 0; color:#fff; background:#009900 !important;
		}
		
		@media print {		
		body { margin:0px 0px; }
		#worksheet_container {width:100%;}
		#worksheet_wraper {width:100%;}
		table{padding-bottom:2px !important;margin-bottom:2px !important;}
		td{margin:0 7p !important;padding-bottom:5px !important;}
		.bill_inp2{ width:40%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
		.bill_inp3{ width:95%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin:0px 10px;}
		.bill_inp4{ width:90%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
		.bill_inp5{ width:98%; border-bottom:solid 1px #000; border-top:none; border-right:none; border-left:none; margin-left:10px;}
		td.purchased{
			width:100%; margin-bottom:10px; padding:2px 0; color:#fff; background:#009900 !important;
			-webkit-print-color-adjust: exact;
		}
		td.river_valley_color{
			width:100%; margin-bottom:10px; padding:2px 0; color:#fff; background:#009900 !important;
			-webkit-print-color-adjust: exact;
		}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
    <td style="width:60%;">
	<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/logoimage.png'); ?>" alt="">
	</td>
    <td style=" width:40%;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style=" width:40%; font-size:32px; color:#000;">DUE BILL</td>
    <td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:100%; font-size:16px; color:#000;">DELIVERY DATE</td>
  </tr>
  <tr>
    <td style="width:100%; border:solid 1px #ccc; height:60px;"></td>
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
   <td style="width:100%; padding-bottom:10px;">SALESPERSON <input name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" type="text" class="bill_inp"></td> 
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:60%; padding-bottom:10px;">CUSTOMER NAME  <input name="customer_name" value="<?php echo isset($info['customer_name1']) ? $info['customer_name1'] :  $info['first_name'].' '.$info['last_name']; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:40%; padding-bottom:10px;">ADDRESS <input  value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>"  name="address" type="text" class="bill_inp2"></td> 
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:50%; padding-bottom:10px;">CITY  <input name="city"  value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:25%; padding-bottom:10px;">STATE <input name="state"  value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:25%; padding-bottom:10px;">ZIP <input name="zip"   value="<?php echo isset($info['zip']) ? $info['zip'] : $info['zip']; ?>"  type="text" class="bill_inp2"></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:60%; padding-bottom:10px;">PHONE NUMBER   <input name="phone_number"  value="<?php echo isset($info['phone']) ? $info['phone'] : $info['phone']; ?>"  type="text" class="bill_inp2"></td> 
   <td style="width:40%; padding-bottom:10px;">EMAIL <input name="email" type="text"   value="<?php echo isset($info['email']) ? $info['email'] : $info['email']; ?>"  class="bill_inp2"></td> 
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td class="purchased">PRODUCT(s) PURCHASED </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:80%; margin-bottom:10px; padding:2px 0;">1) </td>  
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
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p1_make2" type="text" class="bill_inp3"> </td>   
  </tr>
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">Model </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_model" value="<?php echo isset($info['p1_model'])?$info['p1_model']:$info['model']; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p1_vin" value="<?php echo isset($info['p1_vin'])?$info['p1_vin']:$info['vin']; ?>" type="text" class="bill_inp3"> </td>     
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:80%; margin-bottom:10px; padding:2px 0;">2) </td>  
   <td style="width:20%; margin-bottom:10px; padding:2px 0; text-align:right;">LOCATION </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">STOCK #  </td>  
   <td style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_stock" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">YR. </td>  
   <td style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_yr" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MAKE </td>   
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_make1" type="text" class="bill_inp3"> </td> 
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p2_make2" type="text" class="bill_inp3"> </td>   
  </tr>
  
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">Model </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_model" value="<?php echo isset($info['p2_model'])?$info['p2_model']:''; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p2_vin" value="<?php echo isset($info['p2_vin'])?$info['p2_vin']:''; ?>" type="text" class="bill_inp3"> </td>     
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:80%; margin-bottom:10px; padding:2px 0;">3) </td>  
   <td style="width:20%; margin-bottom:10px; padding:2px 0; text-align:right;">LOCATION </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">STOCK #  </td>  
   <td style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_stock" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">YR. </td>  
   <td style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_yr" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MAKE </td>   
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_make1" type="text" class="bill_inp3"> </td> 
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p3_make2" type="text" class="bill_inp3"> </td>   
  </tr>
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">Model </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_model" value="<?php echo isset($info['p3_model'])?$info['p3_model']:''; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p3_vin" value="<?php echo isset($info['p3_vin'])?$info['p3_vin']:''; ?>" type="text" class="bill_inp3"> </td>     
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">STOCK #  </td>  
   <td style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p4_stock" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">YR. </td>  
   <td style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p4_yr" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">MAKE </td>   
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p4_make1" type="text" class="bill_inp3"> </td> 
    <td style="width:19%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="p4_make2" type="text" class="bill_inp3"> </td>   
  </tr>
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">Model </td>  
   <td colspan="3" style="width:12%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p4_model" value="<?php echo isset($info['p4_model'])?$info['p4_model']:''; ?>" type="text" class="bill_inp3"> </td> 
    <td style="width:9%; margin-bottom:10px; padding:2px 0; margin:0 10px;">VIN</td>  
   <td colspan="3"  style="width:14%; margin-bottom:10px; padding:2px 0; margin:0 10px; text-align:right;"> <input name="p4_vin" value="<?php echo isset($info['p4_vin'])?$info['p4_vin']:''; ?>" type="text" class="bill_inp3"> </td>     
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td class="river_valley_color">RIVER VALLEY OWES THE CUSTOMER THE FOLLOWING </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px;">QTY  </td>  
   <td style="width:30%; margin-bottom:10px; padding:2px 10px; margin:0 10px; "> PART NUMBER</td> 
    <td style="width:30%; margin-bottom:10px; padding:2px 10px; margin:0 10px;">DESCRIPTION </td>  
   <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px; "> PARTS </td> 
    <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px;"> LABOR </td>   
    <td style="width:10%; margin-bottom:10px; padding:2px 10px; margin:0 10px; "> TOTAL </td> 
      
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="qty1"  id="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>"  type="text" class="bill_inp4">  </td>  
   <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="partnumber1" id="partnumber1"  value="<?php echo isset($info['partnumber1']) ? $info['partnumber1'] : ''; ?>"  type="text" class="bill_inp4"> </td> 
    <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="description1"  value="<?php echo isset($info['description1']) ? $info['description1'] : ''; ?>"  type="text" class="bill_inp4"> </td>  
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="part1" id="part1"  value="<?php echo isset($info['part1']) ? $info['part1'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;"> <input id="1" name="labor1"  value="<?php echo isset($info['labor1']) ? $info['labor1'] : ''; ?>"  type="text" class="bill_inp4 currency labor"> </td>   
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="total1" id="total1" value="<?php echo isset($info['total']) ? $info['total'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
      
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="qty2"  id="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>"  type="text" class="bill_inp4">  </td>  
   <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="partnumber2" id="partnumber2"  value="<?php echo isset($info['partnumber2']) ? $info['partnumber2'] : ''; ?>"  type="text" class="bill_inp4"> </td> 
    <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="description2"  value="<?php echo isset($info['description2']) ? $info['description2'] : ''; ?>"  type="text" class="bill_inp4"> </td>  
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="part2"  id="part2" value="<?php echo isset($info['part2']) ? $info['part2'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;"> <input id="2" name="labor2"  value="<?php echo isset($info['labor2']) ? $info['labor2'] : ''; ?>"  type="text" class="bill_inp4 currency labor"> </td>   
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="total2" id="total2" value="<?php echo isset($info['total2']) ? $info['total2'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
      
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="qty3" id="qty3"  value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>"  type="text" class="bill_inp4">  </td>  
   <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="partnumber3" name="partnumber3"  value="<?php echo isset($info['partnumber3']) ? $info['partnumber3'] : ''; ?>"  type="text" class="bill_inp4"> </td> 
    <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="description3"  value="<?php echo isset($info['description3']) ? $info['description3'] : ''; ?>"  type="text" class="bill_inp4"> </td>  
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="part3" name="part3"  value="<?php echo isset($info['part3']) ? $info['part3'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;"> <input id="3"  name="labor3"  value="<?php echo isset($info['labor3']) ? $info['labor3'] : ''; ?>"  type="text" class="bill_inp4 currency labor"> </td>   
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="total3" id="total3" value="<?php echo isset($info['total3']) ? $info['total3'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
      
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="qty4"  id="qty4"   value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>"  type="text" class="bill_inp4">  </td>  
   <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="partnumber4" id="partnumber4"  value="<?php echo isset($info['partnumber4']) ? $info['partnumber4'] : ''; ?>"  type="text" class="bill_inp4"> </td> 
    <td style="width:30%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="description4"  value="<?php echo isset($info['description4']) ? $info['description4'] : ''; ?>"  type="text" class="bill_inp4"> </td>  
   <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="part4" id="part4"  value="<?php echo isset($info['part4']) ? $info['part4'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px;"> <input id="4"  name="labor4"  value="<?php echo isset($info['labor4']) ? $info['labor4'] : ''; ?>"  type="text" class="bill_inp4 currency labor"> </td>   
    <td style="width:10%; margin-bottom:10px; padding:2px 0; margin:0 10px; "> <input name="total4" id="total4" value="<?php echo isset($info['total4']) ? $info['total4'] : ''; ?>"  type="text" class="bill_inp4 currency"> </td> 
      
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; margin-bottom:10px; padding:2px 10px; margin:0 10px; font-style:italic;">  THESE ITEMS ARE DUE TO RIVER VALLEY PRIOR TO DELIVERY  </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:100%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:10px;">
  <tr>
   <td style="width:50%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
   <td style="width:50%; margin-bottom:10px; padding:2px 0; margin:0 10px;">  <input name="" type="text" class="bill_inp5">  </td>  
  </tr>
</table>

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
</div>