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
		label{font-size: 15px; margin-bottom: 0px; font-weight: normal !important;}
		.wraper.main input {padding: 1px;}
		th, td{border-left: 1px solid #000; border-bottom: 1px solid #000; padding: 7px; font-size: 14px;}
		table{border-top: 1px solid #000; border-right: 1px solid #000; margin: 15px 0; float: left; width: 100%;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>SALESMAN</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 80%;">
			</div>
		</div>

		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>STOCK#</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 84%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>CUSTOMER</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 79%;">
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 7px 0; text-decoration: underline; margin: 19px 0; font-size: 20px; font-weight: bold;">BIKE SALES FINAL CHECKLIST</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">1. T-SHIRTS ISSUED</label>
				<label>
					<input type="radio" name="t_shirt" value="Y" <?php echo (isset($info['t_shirt']) && $info['t_shirt']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="t_shirt" value="N" <?php echo (isset($info['t_shirt']) && $info['t_shirt']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 20%;">
				<label style="margin: 0 13px 0 0;">2. PARTS GIFT ISSUED</label> 
			</div>
			<div class="form-field" style="float: left; width: 13%; text-align: center;">
				<label style="float: left; width: 100%; display: block;">__93600106</label>
				<span style="float: left; width: 100%; display: block;">(3pack)</span>
			</div>
			<div class="form-field" style="float: left; width: 13%; text-align: center;">
				<label style="float: left; width: 100%; display: block;">__93600062</label>
				<span style="float: left; width: 100%; display: block;">(mist&shine)</span>
			</div>
			<div class="form-field" style="float: left; width: 13%; text-align: center;">
				<label style="float: left; width: 100%; display: block;">__936000064</label>
				<span style="float: left; width: 100%; display: block;">(denim finish)</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">3. SERVICE INTRO WITH MICRO FIBER </label> 
				<label>
					<input type="radio" name="service_micro" value="Y" <?php echo (isset($info['service_micro']) && $info['service_micro']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="service_micro" value="N" <?php echo (isset($info['service_micro']) && $info['service_micro']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">4. TIRE PRESSURE/SHOCK CHECK W/CUSTOMER</label> 
				<label>
					<input type="radio" name="tire_pressure" value="Y" <?php echo (isset($info['tire_pressure']) && $info['tire_pressure']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="tire_pressure" value="N" <?php echo (isset($info['tire_pressure']) && $info['tire_pressure']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">5. CHECK FUEL FILL W/CUSTOMER </label> 
				<label>
					<input type="radio" name="fuel_fill" value="Y" <?php echo (isset($info['fuel_fill']) && $info['fuel_fill']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="fuel_fill" value="N" <?php echo (isset($info['fuel_fill']) && $info['fuel_fill']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">6. PHOTO TAKEN </label> 
				<label>
					<input type="radio" name="photo_taken" value="Y" <?php echo (isset($info['photo_taken']) && $info['photo_taken']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label style="margin: 0 13px 0 0;">
					<input type="radio" name="photo_taken" value="N" <?php echo (isset($info['photo_taken']) && $info['photo_taken']=='N')?'checked="checked"':''; ?> /> N
				</label>
				<label>CUSTOMER OK TO POST? INIT</label>
				<input type="text" name="ok_post" value="<?php echo isset($info['ok_post']) ? $info['ok_post'] : ''; ?>" style="width: 10%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">7. DO WE OWE CUSTOMER ANYTHING </label> 
				<label>
					<input type="radio" name="owe_customer" value="Y" <?php echo (isset($info['owe_customer']) && $info['owe_customer']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="owe_customer" value="N" <?php echo (isset($info['owe_customer']) && $info['owe_customer']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
			<div class="form-field" style="float: left; width: 100%;">
				<label style="padding: 8px 0 0 15px; display: inline-block;">IF SO WHAT? </label>
				<input type="text" name="so_what" value="<?php echo isset($info['so_what']) ? $info['so_what'] : ''; ?>" style="width: 30%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">8. DOES CUSTOMER OWE US ANYTHING </label> 
				<label>
					<input type="radio" name="customer_owe" value="Y" <?php echo (isset($info['customer_owe']) && $info['customer_owe']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="customer_owe" value="N" <?php echo (isset($info['customer_owe']) && $info['customer_owe']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
			<div class="form-field" style="float: left; width: 100%;">
				<label style="padding: 8px 0 0 15px; display: inline-block;">IF SO WHAT? </label>
				<input type="text" name="if_so_what" value="<?php echo isset($info['if_so_what']) ? $info['if_so_what'] : ''; ?>" style="width: 30%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">9. TRADE IN TAGGED, WITH KEYS, TAKEN TO SERVICE </label> 
				<label>
					<input type="radio" name="trade_service" value="Y" <?php echo (isset($info['trade_service']) && $info['trade_service']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="trade_service" value="N" <?php echo (isset($info['trade_service']) && $info['trade_service']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">10. PRE-DELIVERY CHECKLIST TURNED IN </label> 
				<label>
					<input type="radio" name="pre_delivery_checklist" value="Y" <?php echo (isset($info['pre_delivery_checklist']) && $info['pre_delivery_checklist']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="pre_delivery_checklist" value="N" <?php echo (isset($info['pre_delivery_checklist']) && $info['pre_delivery_checklist']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">11. CUSTOMER COMMITMENT OBTAINED TO FILL OUT SURVEY</label> 
				<label>
					<input type="radio" name="survey_commitment" value="Y" <?php echo (isset($info['survey_commitment']) && $info['survey_commitment']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="survey_commitment" value="N" <?php echo (isset($info['survey_commitment']) && $info['survey_commitment']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">12. CUSTOMER CLOSED OUT IN V-SEPT</label> 
				<label>
					<input type="radio" name="v_sept" value="Y" <?php echo (isset($info['v_sept']) && $info['v_sept']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="v_sept" value="N" <?php echo (isset($info['v_sept']) && $info['v_sept']=='N')?'checked="checked"':''; ?> /> N
				</label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label style="margin: 0 13px 0 0;">13. REFERALL SHEET COMPLETED</label> 
				<label>
					<input type="radio" name="referall_sheet" value="Y" <?php echo (isset($info['referall_sheet']) && $info['referall_sheet']=='Y')?'checked="checked"':''; ?> /> Y
				</label>
				<label>
					<input type="radio" name="referall_sheet" value="N" <?php echo (isset($info['referall_sheet']) && $info['referall_sheet']=='N')?'checked="checked"':''; ?> /> N
				</label>
				<label>(3 names obtained)</label>
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