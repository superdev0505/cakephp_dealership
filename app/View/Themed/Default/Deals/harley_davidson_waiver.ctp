<?php
//This Custom form Mapped Author: Abha Sood Negi

$zone = AuthComponent::user('zone');
$dealer = AuthComponent::user('dealer');
$cid = AuthComponent::user('dealer_id');
$d_address = AuthComponent::user('d_address');
$sperson = AuthComponent::user('full_name');
$d_city = AuthComponent::user('d_city');
$d_state = AuthComponent::user('d_state');
$d_zip = AuthComponent::user('d_zip');
$d_phone = AuthComponent::user('d_phone');
$d_fax = AuthComponent::user('d_fax');
$d_email = AuthComponent::user('d_email');
$d_website = AuthComponent::user('d_website');

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
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
		#worksheet_container{width:100%; margin:0 auto; font-size: 16px !important;}
		input[type="text"]{ border-bottom: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 14px; margin-bottom: 0px; font-weight: normal !important;}
		.wraper.main input {padding: 1px;}
			.list{width: 80%; display: inline-block; margin: 0; padding: 0;}
		.list li{display: inline-block; list-style: none; margin: 0 3%;}
		p{font-size: 15px; line-height: 19px;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<h2 style="float: left; width: 100%; text-align: center; font-size: 22px; margin: 7px 0 20px 0; font-weight: bold;">GENERAL RELEASE AND WAIVER OF LIABLITY <br> AND ASSUMPTION OF RISK AGREEMENT</h2>
		<p style="float: left; width: 100%; margin-bottom: 14px;">The undersigned ( on my own behalf of my heirs, personal representatives, successors and assigns), for and in consideration of the opportunity to engage today in a demonstration ride of one of more Harley-Davidson or Buell Motorcycles at J&L Harley-Davidson, Harley-Davidson of Fargo, or Glacial Lakes Harley-Davidson, and surrounding areas, and for other valuable consideration, the Harley-Davidson Motor Company, Buell Motorcycle Company, Buell Distribution Corporation, J&L Harley-Davidson, Inc, Glacial Lakes Harley-Davidson Shop. Harley-Davidson of Fargo, Inc. and their respective officers, directors, employees, agents and affiliates ("release parties"), from any and all claims, demands, rights and causes of action of any kind whatsoever, known or unknown, which I now have or later may have in any way resulting from, or arising out of, my demonstration ride on one or more Harley-Davidson or Buell Motorcycle or Can-AM vehicle.</p>
		<p style="float: left; width: 100%; margin-bottom: 14px;">This release extends to any and all claims I have or may have against the released parties, even if such claims result from product liability or negligence on the part of any or all of the released parties, concerning the design, manufacture, repair or maintenance of the motorcycle(s) which I will be demonstration riding, or concerning the conditions, locations, qualifications, instructions, rules or procedures  under which the demonstration is conducted, or from any other cause.</p>
		<p style="float: left; width: 100%; margin-bottom: 14px;">I hereby state that I am experienced in and familiar with the operation of various motorcycles and fully understand the risks and dangers inherent in motorcycling. I am voluntarily participating in the demonstartion ride and I expressly agree to assume the entire risk of any accident or personal injury, including death, which I might suffer as a result of my participating in the demonstration ride. I participate in this demonstration ride knowing the performance nature of the motorcycle described herein, the existing weather conditions, road conditions and other similar conditions and factors associated with this demonstration ride.</p>
		<p style="float: left; width: 100%;">I hereby waive all benefits flowing from any California statute or the statute of any other state which would otherwise limit the scope of this release and indemnification, including, but not limited to Section 1542 of the California Civil Code which provides:</p>
		<p style="float: left; width: 100%; margin-bottom: 14px;">A general release does not extend to claims which the creditor does not know or suspect to exist in this favor at the time of executing this release, which if known to him must have materially affected his settlement with the debtor.</p>
		<p style="float: left; width: 100%; margin-bottom: 14px;">By signing this Release, I certify that I have read this Release and fully understand it and that I am not relying on any statements of anyone released hereby.</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box; padding-left: 3%;">
			<strong style="display: block; width: 100%; float: left; margin-bottom: 10px;">Do you currently own a motorcycle?</strong>
			<div class="form-filed" style="float: left; width: 15%;">
				<label><input type="radio" name="motorcycle" <?php echo (isset($info['motorcycle'])&&$info['motorcycle']=='yes')?'checked="checked"':''; ?> value="yes"></label>  Yes
			</div>
			<div class="form-filed" style="float: left; width: 25%;">
				<label><input type="radio" name="motorcycle" <?php echo (isset($info['motorcycle'])&&$info['motorcycle']=='used_motorcycle')?'checked="checked"':''; ?> value="used_motorcycle"></label>  No, but I used to own
			</div>
			<div class="form-filed" style="float: left; width: 20%;">
				<label><input type="radio" name="motorcycle" <?php echo (isset($info['motorcycle'])&&$info['motorcycle']=='never_motorcycle')?'checked="checked"':''; ?> value="never_motorcycle"></label>  No, never owned
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box; padding-left: 2%;">
			<strong style="display: block; width: 100%; float: left; margin-bottom: 10px;">Which board of motorcycle do you currently own or have previously owned?</strong>
			<div class="form-filed" style="float: left; width: 20%;">
				<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Harley-Daidson')?'checked="checked"':''; ?> value="Harley-Daidson">Harley-Daidson </label>
			</div>
			<div class="form-filed" style="float: left; width: 15%;">
				<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='BMW')?'checked="checked"':''; ?> value="BMW">BMW </label>
			</div>
			<div class="form-filed" style="float: left; width: 20%;">
				<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Spyder')?'checked="checked"':''; ?>  value="Spyder">Can-Am(Spyder) </label>
			</div>
			<div class="form-filed" style="float: left; width: 15%;">
				<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Ducati')?'checked="checked"':''; ?> value="Ducati">Ducati </label> 
			</div>
			<div class="form-filed" style="float: left; width: 12%;">
				<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Honda')?'checked="checked"':''; ?> value="Honda">Honda</label> 
			</div>
			<div class="form-filed" style="float: left; width: 15%;">
				<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Kawasaki')?'checked="checked"':''; ?> value="Kawasaki">Kawasaki</label> 
			</div>
			<div class="downline" style="float: left; width: 100%; margin: 10px 0;">
				<div class="form-filed" style="float: left; width: 20%;">
					<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Suzuki')?'checked="checked"':''; ?> value="Suzuki">Suzuki </label>
				</div>
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Triumph')?'checked="checked"':''; ?> value="Triumph">Triumph </label>
				</div>
				<div class="form-filed" style="float: left; width: 20%;">
					<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Victory')?'checked="checked"':''; ?> value="Victory">Victory </label>
				</div>
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='Yamaha')?'checked="checked"':''; ?> value="Yamaha">Yamaha </label> 
				</div>
				<div class="form-filed" style="float: left; width: 12%;">
					<label><input type="radio" name="motorcycle_board" <?php echo (isset($info['motorcycle_board'])&&$info['motorcycle_board']=='other')?'checked="checked"':''; ?> value="other">Other</label> 
				</div>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; box-sizing: border-box; padding-left: 2%;">
			<strong style="display: block; width: 100%; float: left; margin-bottom: 10px;">Do you expect to make a motorcycle purchase in the near future?</strong>
			<div class="form-filed" style="float: left; width: 22%;">
				<label><input type="radio" name="motorcycle_purchase" <?php echo (isset($info['motorcycle_purchase'])&&$info['motorcycle_purchase']=='3')?'checked="checked"':''; ?> value="3">  Yes, in less than 3 months </label>
			</div>
			<div class="form-filed" style="float: left; width: 20%;">
				<label><input type="radio" name="motorcycle_purchase" <?php echo (isset($info['motorcycle_purchase'])&&$info['motorcycle_purchase']=='3-12')?'checked="checked"':''; ?> value="3-12"> Yes, in 3-12 months </label>
			</div>
			<div class="form-filed" style="float: left; width: 20%;">
				<label><input type="radio" name="motorcycle_purchase" <?php echo (isset($info['motorcycle_purchase'])&&$info['motorcycle_purchase']=='year')?'checked="checked"':''; ?> value="year"> Yes, in more than 1 year </label>
			</div>
			<div class="form-filed" style="float: left; width: 20%;">
				<label><input type="radio" name="motorcycle_purchase" <?php echo (isset($info['motorcycle_purchase'])&&$info['motorcycle_purchase']=='not')?'checked="checked"':''; ?> value="not">  Not Sure </label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding-left: 2%; box-sizing: border-box;">
			<strong style="display: block; width: 100%; float: left; margin-bottom: 10px;">How did you hear about this  test ride opportunity?</strong>
			<div class="upper" style="float: left; width: 100%;">
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Website')?'checked="checked"':''; ?> value="Website"> Website </label>
				</div>
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='E-newsletter')?'checked="checked"':''; ?> value="E-newslette"> E-newsletter</label>
				</div>
				<div class="form-filed" style="float: left; width: 20%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Social Media')?'checked="checked"':''; ?> value="Social Media"> Social Media </label>
				</div>
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Walk-In')?'checked="checked"':''; ?> value="Walk-In">  Walk-In </label> 
				</div>
				<div class="form-filed" style="float: left; width: 12%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Newspaper')?'checked="checked"':''; ?> value="Newspaper">  Newspaper</label> 
				</div>
			</div>
			<div class="downline" style="float: left; width: 100%; margin: 10px 0;">
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Radio')?'checked="checked"':''; ?> value="Radio">  Radio</label> 
				</div>
				<div class="form-filed" style="float: left; width: 15%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Family/Friend')?'checked="checked"':''; ?> value="Family/Friend"> Family/Friend</label>
				</div>
				<div class="form-filed" style="float: left; width: 40%;">
					<label><input type="radio" name="opportunity" <?php echo (isset($info['opportunity'])&&$info['opportunity']=='Other')?'checked="checked"':''; ?> value="Other"> Other (Please Specify) </label>
					<input type="text" name="text_other" style="50%">
				</div>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; font-size: 17px; font-weight: bold; margin: 13px 0 3px 0;">THIS IS A RELEASE-READ BEFORE SIGNING</h2>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<input type="text" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" style="width: 100%;">
				<label>Signature</label>
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 100%;">
				<label>Print Name - Clearly</label>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 100%;">
				<label>Address</label>
			</div>
			<div class="form-field" style="float: right; width: 49%;">
				<input type="text" name="city_state_zip" value="<?php echo isset($info['city_state_zip']) ? $info['city_state_zip'] : $info['city']." ".$info['state'].' '.$info['zip'];  ?>" style="width: 100%;">
				<label>City, State & Zip</label>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<input type="text" name="phone" value="<?php echo $info['phone']; ?>" style="width: 100%;">
				<label>Phone</label>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 100%;">
				<label>Email</label>
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 49%;">
				<input type="text" name="date_data"  value="<?php echo date("Y-m-d"); ?>" style="width: 100%;">
				<label>Date</label>
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
			$(".date_input_field").bdatepicker();

			$('#worksheet_wraper').stop().animate({
			  scrollTop: $("#worksheet_wraper")[0].scrollHeight
			}, 800);

			$("#worksheet_container").scrollTop(0);

			$("#btn_print").click(function(){
				$( "#worksheet_container" ).printThis();
			});
			
			$("#btn_back").click(function(){ });
		});
	</script>
</div>