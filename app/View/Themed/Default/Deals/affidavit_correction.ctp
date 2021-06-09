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
$expectedt = date('m/d/Y');
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
    <input type="hidden" id="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" name="vin">
	<div id="worksheet_container" style="width: 1020px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 14px; display: inline-block;  margin: 0 2%; font-size: 20px;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.vin-list input {text-align: center;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
@media print {
	.bg{background-color: #000 !important; color: #fff; }
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<div class="row" style="float: left; width: 100%; margin: 4px 0;">
			<div class="logo" style="float: left; width: 12%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mvd-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<div class="center" style="float: left; width: 75%; text-align: center;">
				<p style="float: left; width: 100%; margin: 20px 0 30px; font-size: 16px;"><b>New Maxico Taxtation & Revenue Department, Motor Vehicle Division</b></p>
				<h2 style="float: let; width: 100%; margin-top: 20px;"><b>AFFIDAVIT OF CORRECTION</b></h2>
			</div>
			
			<div class="logo" style="float: right; width: 12%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mvd-round-logo.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box; padding: 7px; text-align: center; font-size: 16px; border: 1px solid #000; border-bottom: 0px; margin: 0;"><b>Explanation and Instructions</b></h2>
		
		<p style="float: left; width: 100%; box-sizing: border-box; padding: 5px 7px; border: 1px solid #000; border-bottom: 0px; margin: 0;">This Affidavit of Correction may be used to correct an error on a New Mexico or out-of-state vehicle title or manufacturer's statement/certificate of origin (MSO/MCO) that is being presented for the purpose od issuance of issuance of a New Mexico title. The affidavit is made by, and must be signed by, the seller/transferor of the vehicle. In the case of a correction to a MSO/MCO, the seller/transferor is the dealer. The signature of the seller/transferor must be notarized.</p>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box; padding: 7px; text-align: center; font-size: 16px; border: 1px solid #000; border-bottom: 0px; margin: 0;"><b>Vehicle and Title or MSO/MCO Information.</b></h2>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field vin-list" style="float: left; width: 100%; box-sizing: border-box;">
				<label style="display: block; border-bottom: 1px solid #000; padding: 7px 7px 2px;">Vehicle Identification Number (VIN)</label>
				<input type="text" name="vin0" id="vin0" value="<?php echo isset($info['vin0']) ? $info['vin0'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin1" id="vin1" value="<?php echo isset($info['vin1']) ? $info['vin1'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin2" id="vin2" value="<?php echo isset($info['vin2']) ? $info['vin2'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin3" id="vin3" value="<?php echo isset($info['vin3']) ? $info['vin3'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin4" id="vin4" value="<?php echo isset($info['vin4']) ? $info['vin4'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin5" id="vin5" value="<?php echo isset($info['vin5']) ? $info['vin5'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin6" id="vin6" value="<?php echo isset($info['vin6']) ? $info['vin6'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin7" id="vin7" value="<?php echo isset($info['vin7']) ? $info['vin7'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin8" id="vin8" value="<?php echo isset($info['vin8']) ? $info['vin8'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin9" id="vin9" value="<?php echo isset($info['vin9']) ? $info['vin9'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin10" id="vin10" value="<?php echo isset($info['vin10']) ? $info['vin10'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin11" id="vin11" value="<?php echo isset($info['vin11']) ? $info['vin11'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin12" id="vin12" value="<?php echo isset($info['vin12']) ? $info['vin12'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin13" id="vin13" value="<?php echo isset($info['vin13']) ? $info['vin13'] : ''; ?>" style="width: 5%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin14" id="vin14" value="<?php echo isset($info['vin14']) ? $info['vin14'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
				<input type="text" name="vin15" id="vin15" value="<?php echo isset($info['vin15']) ? $info['vin15'] : ''; ?>" style="width: 6%; border-right: 1px solid #000; height: 30px;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 65%; box-sizing: border-box; padding: 3px; border-right: 1px solid #000;">
				<label>Title Number (if title)</label>
				<input type="text" name="title_num" value="<?php echo isset($info['title_num'])?$info['title_num']:''; ?>" style="width: 100%;">
			</div>
			<div class="form-field" style="float: left; width: 35%; box-sizing: border-box; padding: 3px;">
				<label>Title State of Issue</label>
				<input type="text" name="title_state" value="<?php echo isset($info['title_state'])?$info['title_state']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row no-border" style="float: left; width: 100%; margin: 0; box-sizing: border-box; border: 1px solid #000; border-bottom: 0px;">
			<div class="form-field" style="float: left; width: 100%; box-sizing: border-box; padding: 3px;">
				<label>Manufacturer Name (If MSO/MCO)</label>
				<input type="text" name="manufacturer" value="<?php echo isset($info['manufacturer'])?$info['manufacturer']:''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; box-sizing: border-box;  padding: 7px; text-align: center; font-size: 16px; border: 1px solid #000; border-bottom: 0px; margin: 0;"><b>Affidavit and Notarization</b></h2>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; padding: 7px; box-sizing: border-box; border: 1px solid #000; margin-bottom: 10px;">
			<p style="float: left; width: 100%; box-sizing: border-box; margin: 0 0 10px; font-size: 15px;">I, <input type="text" name="title" value="<?php echo isset($info['title'])?$info['title']:''; ?>" style="width: 60%;"> (Seller's printed name), under penalty of perjury hereby swear that I have examined the vehicle identified above, and submit the following explanation for the described error, erasure, strikeover, etc. on the title document, and that no fraud was intended.</p>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Descripition of error</label>
				<textarea name="descripition" style="width: 100%; height: 50px; border: 0px"><?php echo isset($info['descripition'])?$info['descripition']:'' ?></textarea>
			</div>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0;">
				<label>Correction of error</label>
				<textarea name="correction" style="width: 100%; height: 50px; border: 0px;"><?php echo isset($info['correction'])?$info['correction']:'' ?></textarea>
			</div>
			
			<p style="float: left; width: 100%; box-sizing: border-box; margin: 7px; font-size: 15px;">I hereby declare under penalty of perjury that the information given in this statement is true and correct to the best of my knowledge.</p>
			
			<div class="form-field" style="float: left; width: 100%; margin: 7px 0; text-align: center;">
				<input type="text" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" style="width: 60%; margin-bottom: 3px; text-align: center;">
				<label style="display: block;">Signature of person (seller) submitting affidavit</label>
			</div>
			
			<p style="width: 60%; margin: 4px auto; 7px;"><b>Warning:</b> <i>Any person who makes any false affidavit, or knowingly swears or affirms falsely to any matter required by the Motor Vehicle Code is guilty of perjury, which is a fourth degree felony (Sections 66-5-38 and 30-25-1) NMSA 1978).</i></p>
			
			<p style="width: 100%; float: left; margin: 13px 0 7px;">SUBSCRIBED AND SWORN to before me this <input type="text" name="sworn" value="<?php echo isset($info['sworn'])?$info['sworn']:''; ?>" style="width: 16%;"> day of <input type="text" name="day_of" value="<?php echo isset($info['day_of'])?$info['day_of']:''; ?>" style="width: 30%;"> 20 <input type="text" name="day" value="<?php echo isset($info['day'])?$info['day']:''; ?>" style="width: 10%;"></p>
			
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: right; width: 50%; text-align: center;">
					<input type="text" name="notary" value="<?php echo isset($info['notary'])?$info['notary']:''; ?>" style="width: 100%; margin-bottom: 3px;">
					<label>Notary Public</label>
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>My Commision Expires:</label>
					<input type="text" name="expires" value="<?php echo isset($info['expires'])?$info['expires']:''; ?>" style="width: 100%;">
				</div>
			</div>
			
			
			<p style="width: 100%; float: left; margin: 10px 0 10px;"> (No notary required if error was witnessed by MVD agent.)</p>
			
			
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>Signature of MVD Agent</label>
					<input type="text" name="mvd" value="<?php echo isset($info['mvd'])?$info['mvd']:''; ?>" style="width: 60%;">
				</div>
			</div>
			
		</div>
		
		
		
	</div>
	<!-- worksheet end -->
		
		
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

	var vin = $('#vin').val();
	var res = vin.split("");
	for (var i = 0; i <= 15; i++) {
		$("#vin" + i).val(res[i]);
	}
	
	
     
});

	
	
	
	
	
</script>
</div>
