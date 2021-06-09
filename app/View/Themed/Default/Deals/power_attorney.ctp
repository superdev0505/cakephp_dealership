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
	<div id="worksheet_container" style="width: 960px; margin:0 auto; font-size: 12px;">
	<style>

	#worksheet_container{width:100%; margin:0 auto; font-size: 15px !important;}
	input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
	label{font-size: 14px; margin-bottom: 0px;}
	ul{margin: 0; padding: 0;}
	li{margin-bottom: 7px; font-size: 12px; display: inline-block;  margin: 0 2%;}
	table{font-size: 14px; border-top: 1px solid #000; border-left: 1px solid #000; margin-top: 10px; float: left; width: 100%;}
	td, th{border-bottom: 1px solid #000;}
	th{border-right: 1px solid #000;}
	td:last-child, th:last-child{border-right: 1px solid #000;}
	td{border-right: 1px solid #000;}
	table input[type="text"]{border: 0px;}
	th, td{padding: 2px;}
	.no-border input[type="text"]{border: 0px;}
	.wraper.main input {padding: 0px;}
	.right table input[type="text"], .right table td{text-align: right; font-weight: bold;}

@media print {
	.bg{background-color: #000 !important; color: #fff;}
	.second-page{margin-top: 10% !important;}
	.wraper.main input {padding: 0px !important;}
	.dontprint{display: none;}
	}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header">
		<h2 style="float: left; width: 100%; text-align: center; margin: 0; font-size: 18px; text-decoration: underline;">POWER OF ATTORNEY</h2>
		<p style="float: left; width: 100%; font-size: 15px; margin: 10px 0;">KNOW ALL MEN BY THESE PRESENT, that the undersigned,</p>
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000;">
				<label>Legal Owner:</label>
				<input type="text" name="legal_owner" value="<?php echo isset($info['legal_owner'])?$info['legal_owner']:''; ?>" style="width: 70%; border: 0px;">
			</div>
			<label style="display: block; text-align: center; margin-top: 5px; float: left; width: 100%;">State Which (Buyer, Seller, Legal, Owner)</label>
		</div>
		
		<p style="float: left; width: 100%; font-size: 16px; margin: 7px 0;">of the following vehicle</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%;">
				<label>Type</label>
				<input type="text" name="type" value="<?php echo isset($info['type'])?$info['type']:''; ?>" style="width: 87%;">
			</div>
			<div class="form-field" style="float: right; width: 48%;">
				<label>Year</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 92%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%;">
				<label>Make</label>
				<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width: 86%;">
			</div>
			<div class="form-field" style="float: right; width: 48%;">
				<label>Serial No.</label>
				<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width: 85%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; font-size: 16px; margin: 7px 0;">does hereby authorize and irrevocably appoint:</p>
		
		<div class="row" style="float: left; width: 100%; margin: 3px 0;">
			<div class="form-field" style="float: left; width: 100%; border-bottom: 1px solid #000; margin-bottom: 5px;">
				<input type="text" name="attorney" value="<?php echo isset($info['attorney'])?$info['attorney']:''; ?>" style="width: 70%; border: 0px;">
			</div>
			<label style="display: block; text-align: center;">(Attorney-in-Fact)</label>
		</div>
		
		<p style="float: left; width: 100%; font-size: 16px; margin: 7px 0;">my (our) true and lawful Attorney-in-Fact to sign in the name, place and stead of the undersigned, any certificate of title covering the vehicle described above in whatever manner necessary to effect the transfer of such vehicle title, application or a duplicate of such vehicle title, or application for a new certificate of title of said vehicle, as he or she may deem fit and proper, hereby ratifying and confirming whatever action said Attorney shaall or may take by virtue thereof in the premises.</p>
		
		<p style="float: left; width: 100%; font-size: 16px; margin: 7px 0;">IN WITNESS WHEREOF, the undersigned has executed this instrument this <input type="text" name="name" style="width: 20%;"> day of <input type="text" name="title1" value="<?php echo isset($info['title1'])?$info['title1']:''; ?>" style="width: 20%;">, <input type="text" name="title2" value="<?php echo isset($info['title2'])?$info['title2']:''; ?>" style="width:10%;"></p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%;">
				<label>X</label>
				<input type="text" name="x1" value="<?php echo isset($info['x1'])?$info['x1']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 48%;">
				<label>X</label>
				<input type="text" name="x2" value="<?php echo isset($info['x2'])?$info['x2']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 48%;">
				<label>X</label>
				<input type="text" name="x3" value="<?php echo isset($info['x3'])?$info['x3']:''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 48%;">
				<label>X</label>
				<input type="text" name="x4" value="<?php echo isset($info['x4'])?$info['x4']:''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<p style="float: left; width: 100%; font-size: 16px; margin: 7px 0;">Subscribed to and sworn before me, a Notary Public in and for the County of <input type="text" name="torrance" style="font-size: 16px; width: 90px;" value="<?php echo isset($info['torrance'])?$info['torrance']:'Torrance'; ?>" style="width: 20%;">, State of <input type="text" name="mexico" style="font-size: 16px; width: 110px;" value="<?php echo isset($info['mexico'])?$info['mexico']:'New Mexico'; ?>" style="width: 20%;"> on the date first above written, that the above named owner(s) acknowledged the same to be his (their) free and voluntary act and deed.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: right; width: 48%;">
				<input type="text" name="notary" value="<?php echo isset($info['notary'])?$info['notary']:''; ?>" style="width: 100%; margin-bottom: 3px;">
				<label style="display: block; text-align: center">Notary Public</label>
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
	
	
     
});

	
	
	
	
	
</script>
</div>
