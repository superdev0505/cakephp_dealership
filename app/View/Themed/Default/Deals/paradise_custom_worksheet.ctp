<?php
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
	<div id="worksheet_container">
		<style>
			table {text-align: center;}
			input[type="text"]{width: 30%;margin-left: 5px;}
			select {margin-left: 5px;}
			@media print {
				table{margin-top:0px !important;}
			}
		</style>
		<div class="wraper header"> 
				<input name="contact_id" type="hidden"  value="<?php echo $contact['Contact']['id']; ?>" />
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
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>BASE INVOICE</label><input name="base_invoice" id="base_invoice"  value="<?php echo isset($info['base_invoice']) ? $info['base_invoice'] :''; ?>"  type="text" class="invoice" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>TOTAL INVOICE</label> <input name="total_invoice" id="total_invoice" value="<?php echo isset($info['total_invoice']) ? $info['total_invoice'] : ''; ?>"  type="text" class="invoice" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>Manufacturer Base Price</label><input name="base_price" id="base_price" value="<?php echo isset($info['base_price']) ? $info['base_price'] : ''; ?>"  type="text" class="invoice" /></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>Manufacturer Selling Price</label> <input name="sell_price" id="sell_price" value="<?php echo isset($info['sell_price']) ? $info['sell_price'] :''; ?>"   type="text" class="invoice"/></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>Prep</label> <input name="prep_form" id="prep_form" value="<?php echo isset($info['prep_form']) ? $info['prep_form'] :''; ?>"   type="text" class="invoice"/></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>Paradise Price</label> <input name="paradise_price" id="paradise_price" value="<?php echo isset($info['paradise_price']) ? $info['paradise_price'] :''; ?>"   type="text" class="invoice"/></td>
		  </tr>
		</table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>You Save</label> <input name="you_save" id="you_save" value="<?php echo isset($info['you_save']) ? $info['you_save'] :''; ?>"   type="text" class="invoice"/></td>
		  </tr>
		</table>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px;">
		  <tr>
			<td style=" width:50%;color:#000; font-size:14px; font-weight:600;"><label>
		
			Monthly Price</label><select class="invoice" id="month_price" value="<?php echo isset($info['month_price']) ? $info['month_price'] :''; ?>" name="month_price" style="width:30%;">
				<option value="" selected>Choose</option>
			  <option value="120">120</option> 
			  <option value="240">240</option>
			</select></td>
		  </tr>
		</table>
		<input type="hidden" name="pmc2" id="pmc2" value="<?php echo isset($info['pmc2']) ? $info['pmc2'] :''; ?>" />
		<input type="hidden" name="paradise" id="paradise" value="<?php echo isset($info['paradise']) ? $info['paradise'] :''; ?>" />
		<input type="hidden" name="paradise_month" id="paradise_month" value="<?php echo isset($info['paradise_month']) ? $info['paradise_month'] :''; ?>" />
	</div>
		<!---left1-->
		</br>
		<!-- no print buttons -->
	<div style="clear:both"></div>
	
	<br/>	
	<div class="dontprint">
		<button class="btn btn-inverse pull-right" style="margin-left:5px;" data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote" class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
		<input type="hidden" id="tax_percent" name="tax_percent" value="0" />
	</div>
	<br/>	<br/>	<br/>	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">
$(document).ready(function(){
	 function calculate_total() {
        var base_invoice = isNaN(parseFloat( $("#base_invoice").val()))?0.00:parseFloat( $("#base_invoice").val());
        var total_invoice = isNaN(parseFloat( $("#total_invoice").val()))?0.00:parseFloat( $("#total_invoice").val());
         var paradise_price = isNaN(parseFloat( $("#paradise_price").val()))?0.00:parseFloat( $("#paradise_price").val());
        var prep_form = isNaN(parseFloat( $("#prep_form").val()))?0.00:parseFloat( $("#prep_form").val());
        var month_price = isNaN(parseFloat( $("#month_price").val()))?0.00:parseFloat( $("#month_price").val());
        var base_price = parseFloat(base_invoice)/0.63;
        var sell_price = parseFloat(total_invoice)/0.63;
        var you_save = sell_price - paradise_price;
        var pmc2 = total_invoice/(paradise_price - prep_form);
        console.log(pmc2);
        var paradise_month = ((paradise_price*0.9)/month_price )*1.0499
        
        $("#base_price").val((convertFormatedMoney(Math.round(base_price).toFixed(2))).replace('.00', ''));
        $("#sell_price").val((convertFormatedMoney(Math.round(sell_price).toFixed(2))).replace('.00', ''));
        $("#you_save").val((convertFormatedMoney(Math.round(you_save).toFixed(2))).replace('.00', ''));
        $("#pmc2").val(Math.round(pmc2));
        $("#paradise").val((convertFormatedMoney(Math.round(paradise_price).toFixed(2))).replace('.00', ''));
        $("#paradise_month").val((convertFormatedMoney(Math.round(paradise_month).toFixed(2))).replace('.00', ''));
     }
	 $(".invoice").on('change keyup paste',function(){
        calculate_total();
     });

     function convertFormatedMoney (money){
		return money
			  .replace(/[^\d\-]/g,"")
			  .replace(/([0-9])([0-9]{2})$/, '$1.$2')  
			  .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
     	}
    });
</script>
</div>
