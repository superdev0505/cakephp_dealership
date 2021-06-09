<?php
// updated
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
*{
				margin: 0;
				padding: 0;
				outline: none;
				
				-webkit-box-sizing: border-box;
				   -moz-box-sizing: border-box;
					-ms-box-sizing: border-box;
					 -o-box-sizing: border-box;
						box-sizing: border-box;
			}
		
			body {
				font-family: 'Open Sans', sans-serif;
				font-size: 1em;
				line-height: 1;
				background: #fff;
				color: #000;
			}
			
			table {
				width: 100%;
				margin: 0 auto;
				padding-bottom: 45px;
			}
			
			
			
			input {
				border: none;
				border-bottom: solid 1px #000;
				padding: 0 5px;
			}
			
			tfoot input {
				border: solid 1px #000;
				padding: 7px;
				width: 100%;
			}
			
			input.small {
				width: 75px;
			}
			
			
			
			p {
				font-size: 14px;
				line-height: 36px;
			}
			
			p.line-small input,
			p.line-small span,
			p.line-small b {
				display: inline-block;
				vertical-align: top;
			}
			
			p.line-small span,
			p.line-small b {
				width: 85%;
			}
			
			p.line-small {
				line-height: 18px;
				margin-bottom: 14px;
				margin-top: 10px;
			}
			
			
			
			table thead tr th {
				padding: 35px 50px;
			}
			
			table thead tr th img {
				max-width: 330px;
			}
			
			table thead tr th h2 {
				font-size: 19px;
				text-align: left;
			}
			
			table tbody tr td {
				padding: 0 70px;
			}
			
			table tbody tr:first-child td p {
				margin-bottom: 11px;
			}

			table tfoot tr td:first-child {
				padding: 2px 0px 2px 148px;
				width: 50%;
			}
			
			table tfoot tr td:first-child strong.form-head {
				font-size: 13px;
				display: inline-block;
				margin-top: 25px;
			}
			
			table tfoot tr td:nth-child(2) {
				padding-left: 62px;
				font-size: 14px;
				font-weight: 400;
			}
	@media print { body {font-family: Georgia, ‘Times New Roman’, serif;} h2 {font-size:12px!important;fontweight:bolder;} h4,h3 {font-size:9px!important;font-weight:bold;padding-top:0px!important;padding:0px!important;} table.set_padding td{padding:1px 2px 0px 6px!important;} 
		.container{
			
		}
	}

	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table>
		
			<!-- header -->
			<thead>
				<tr>
					<th>
						
						<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mission_city_logo.jpeg'); ?>" alt="">
				
					</th>
					<th><h2>CREDIT CARD AUTHORIZATION FORM</h2></th>
				</tr>
			</thead><!-- ./ header -->
			
			
			<!-- applicant's details -->
			<tbody>
				<tr>
					<td colspan="2">
						<p>
							I, <input type="text" tabindex="1" name="authorize" value="<?php echo isset($info["authorize"]) ? $info['authorize'] : $info['first_name'].' '.$info['last_name'];?>" id="name">, hereby authorize Mission City Indian Motorcycle to <br />charge the following 
							amount to the credit card specified below <strong>(initial before each statement)</strong>:
						</p>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p> 
							<input type="text" name="amount" value="<?php echo isset($info["amount"]) ? $info['amount'] : ''?>" id="a" class="small">
							The amount of $ <input type="text" tabindex="2" name="amount" id="amount" size="12"> 
						</p>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p class="line-small">
							<input type="text" name="all_amount" value="<?php echo isset($info["all_amount"]) ? $info['all_amount'] : ''?>" id="b" class="small">
							<span>Any and all amounts that are or may in the future become due and payable <br />in connection with any loan agreements or other credit arrangements.</span>
						</p>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p class="line-small">
							<input type="text"  name="understand_dep" value="<?php echo isset($info["understand_dep"]) ? $info['understand_dep'] : ''?>"  id="c" class="small">
							<b>I understand that the deposit given to hold a motorcycle for my purchase is non-refundable.</b>
						</p>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<p class="line-small">
							<input type="text"  name="understand_ok" value="<?php echo isset($info["understand_ok"]) ? $info['understand_ok'] : ''?>"   class="small">
							<span>I affirm that I am at least 18 years old and that I am legally authorized to use the credit card account specified below.</span>
						</p>
					</td>
				</tr>
			</tbody><!-- ./ applicant's details -->
			
			
			<!-- [[card form part]] the section contain the main form about your card -->
			<tfoot>
				<tr>
					<td colspan="2"><strong class="form-head">FILL OUT ALL INFORMATION BELOW COMPLETELY:</strong></td>
				</tr>
				<tr>
					<td><input type="text" name="card_name"  value="<?php echo isset($info["card_name"]) ? $info['card_name'] : ''?>"  ></td>
					<td>CARDHOLDER NAME (AS IT APPEARS ON CARD)</td>
				</tr>
				<tr>
					<td><input type="text" name="card_number"  value="<?php echo isset($info["card_number"]) ? $info['card_number'] : ''?>"  ></td>
					<td>CREDIT CARD NUMBER</td>
				</tr>
				<tr>
					<td><input type="text" name="card_exp"  value="<?php echo isset($info["card_exp"]) ? $info['card_exp'] : ''?>"  ></td>
					<td>EXPIRATION DATE (FORMAT MM/YY)</td>
				</tr>
				<tr>
					<td><input type="text" name="card_code"  value="<?php echo isset($info["card_code"]) ? $info['card_code'] : ''?>"  ></td>
					<td>SECURITY CODE</td>
				</tr>
				<tr>
					<td><input type="text" name="card_street"  value="<?php echo isset($info["card_street"]) ? $info['card_street'] : ''?>"  ></td>
					<td>CARD BILLING ADDRESS</td>
				</tr>
				<tr>
					<td><input type="text" name="card_address"  value="<?php echo isset($info["card_address"]) ? $info['card_address'] : ''?>"  ></td>
					<td>CARD BILLING CITY, STATE, ZIP</td>
				</tr>
				<tr>
					<td><input type="text" name="card_phone"  value="<?php echo isset($info["card_phone"]) ? $info['card_phone'] : ''?>"  ></td>
					<td>CARDHOLDER TELEPHONE NUMBER</td>
				</tr>
				<tr>
					<td><input type="text" name="card_sign" value="<?php echo isset($info["card_sign"]) ? $info['card_sign'] : ''?>"  ></td>
					<td>CARDHOLDER SIGNATURE</td>
				</tr>
				<tr>
					<td><input type="text" name="card_date"  value="<?php echo isset($info["card_date"]) ? $info['card_date'] : ''?>"  ></td>
					<td>DATE</td>
				</tr>
			</tfoot><!-- ./ card form part -->
			
		</table><!-- ./ application -->		
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
