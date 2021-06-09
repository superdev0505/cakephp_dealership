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
		label{font-size: 15px; font-weight: normal;}
		li{list-style: none; font-size: 14px; margin: 0 0 3px 0;}
		@media print {
			h2{background-color: #ccc;}	
			.dontprint{display: none;}
		}
	</style>
	
	<!-- worksheet start -->
	<div class="wraper header"> 
		<div class="logo" style="float: left; width: 100%; text-align: left;">
			<?php  if($cid == 4435 || $cid == 4430){ ?>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a1.jpg'); ?>" alt="" style="width: 100%;">
			</div>
			<?php } ?>
			<div class="logo" style="display: inline-block; width: 11%;">
				<img  src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/a2.jpg'); ?>" alt="" style="width: 100%;">
			</div>
		</div>
		
		<strong style="float: left; width: 100%; font-size: 25px; text-align: center;  margin: -10px 0 0 0;"><i>F&I CHECKLIST</i></strong>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>BUSINESS MANAGER</label>
				<input type="text" name="manager" value="<?php echo isset($info['manager']) ? $info['manager'] : ''; ?>" style="width: 66%;">
			</div>
			<div class="form-field" style="float: right; width: 25%;">
				<label>STOCK #</label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 64%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; padding-bottom: 20px; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 50%;">
				<label>CUSTOMER NAME</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 70%;">
			</div>
			<div class="form-field" style="float: right; width: 25%; text-align: center;">
				<span>
					<input type="radio" name="vechile_type" value="new" <?php echo (isset($info['vechile_type']) && $info['vechile_type']=='new')?'checked="checked"':''; ?> /> New
				</span> /
				<span>
					<input type="radio" name="vechile_type" value="used" <?php echo (isset($info['vechile_type']) && $info['vechile_type']=='used')?'checked="checked"':''; ?> /> Used
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="left" style="float: left; width: 50%; border-right: 1px solid #000;">
				<strong style="float: left; width: 100%; font-size: 18px; margin: 10px 0;">EVERY DEAL</strong>
				<ul>
					<li>
						<input type="checkbox" name="ofac_report" <?php echo ($info['ofac_report'] == "ofac_report") ? "checked" : ""; ?> value="ofac_report"/> OFAC REPORT
					</li>
					<li>
						<input type="checkbox" name="load_deal" <?php echo ($info['load_deal'] == "load_deal") ? "checked" : ""; ?> value="load_deal"/> LOAD DEAL INTO TALON
					</li>
					<li>
						<input type="checkbox" name="sales_worksheet" <?php echo ($info['sales_worksheet'] == "sales_worksheet") ? "checked" : ""; ?> value="sales_worksheet"/> SALES WORKSHEET
					</li>
					<li>
						<input type="checkbox" name="title_card" <?php echo ($info['title_card'] == "title_card") ? "checked" : ""; ?> value="title_card"/> TITLE CARD
					</li>
					<li>
						<input type="checkbox" name="driver_license" <?php echo ($info['driver_license'] == "driver_license") ? "checked" : ""; ?> value="driver_license"/> DRIVERS LICENSE FRONT AND BACK
					</li>
					<li>
						<input type="checkbox" name="ride_dept" <?php echo ($info['ride_dept'] == "ride_dept") ? "checked" : ""; ?> value="ride_dept"/> TICKET TO RIDE SIGNED BY ALL DEPARTMENTS
					</li>
					<li>
						<input type="checkbox" name="copy_parts" <?php echo ($info['copy_parts'] == "copy_parts") ? "checked" : ""; ?> value="copy_parts"/> COPY OF PARTS & ACCESSORIES INVOICE
					</li>
					<li>
						<input type="checkbox" name="copy_motorcycle" <?php echo ($info['copy_motorcycle'] == "copy_motorcycle") ? "checked" : ""; ?> value="copy_motorcycle"/> COPY OF MOTORCLOTHES INVOICE
					</li>
					<li>
						<input type="checkbox" name="menu_link" <?php echo ($info['menu_link'] == "menu_link") ? "checked" : ""; ?> value="menu_link"/> SIGNED MENU LINK AND DECLINED PRODUCTS
					</li>
					<li>
						<input type="checkbox" name="bill_sale" <?php echo ($info['bill_sale'] == "bill_sale") ? "checked" : ""; ?> value="bill_sale"/> BILL OF SALE
					</li>
					<li>
						<input type="checkbox" name="down_payment" <?php echo ($info['down_payment'] == "down_payment") ? "checked" : ""; ?> value="down_payment"/> DOWN PAYMENT?
					</li>
					<li>
						<input type="checkbox" name="as_in_form" <?php echo ($info['as_in_form'] == "as_in_form") ? "checked" : ""; ?> value="as_in_form"/> AS/IS FORM
					</li>
					<li>
						<input type="checkbox" name="swr_signed" <?php echo ($info['swr_signed'] == "swr_signed") ? "checked" : ""; ?> value="swr_signed"/> SWR SIGNED (NEW ONLY)
					</li>
					<li>
						<input type="checkbox" name="mco" <?php echo ($info['mco'] == "mco") ? "checked" : ""; ?> value="mco"/> MCO / TITLE PRESENT AND SIGNED
					</li>
					<li>
						<input type="checkbox" name="title_application" <?php echo ($info['title_application'] == "title_application") ? "checked" : ""; ?> value="title_application"/> TITLE APPLICATION SIGNED
					</li>
					<li>
						<input type="checkbox" name="nd_residents" <?php echo ($info['nd_residents'] == "nd_residents") ? "checked" : ""; ?> value="nd_residents"/> DAMAGE DISCLOSURE (ND RESIDENTS)
					</li>
					<li>
						<input type="checkbox" name="mn_residents" <?php echo ($info['mn_residents'] == "mn_residents") ? "checked" : ""; ?> value="mn_residents"/> INSURANCE BINDER (MN RESIDENTS)
					</li>
					<li>
						<input type="checkbox" name="photocopy_payment" <?php echo ($info['photocopy_payment'] == "photocopy_payment") ? "checked" : ""; ?> value="photocopy_payment"/> PHOTO COPY OF PAYMENT 
					</li>
					<li>
						<input type="checkbox" name="temp_tag" <?php echo ($info['temp_tag'] == "temp_tag") ? "checked" : ""; ?> value="temp_tag"/> TEMP TAG/ DRIVE OFF TAG
					</li>
					<li>
						<input type="checkbox" name="pre_delivery" <?php echo ($info['pre_delivery'] == "pre_delivery") ? "checked" : ""; ?> value="pre_delivery"/> PRE-DELIVERY CHECKLIST (NEW ONLY)
					</li>
					<li>
						<input type="checkbox" name="log_info" <?php echo ($info['log_info'] == "log_info") ? "checked" : ""; ?> value="log_info"/> LOG INFO INTO F&I LOG
					</li>
				</ul>
			</div>
			
			<div class="right" style="float: right; width: 43%;">
				<strong style="float: left; width: 100%; font-size: 18px; margin: 10px 0;">TRADE-IN</strong>
				<ul>
					<li>
						<input type="checkbox" name="trade_title" <?php echo ($info['trade_title'] == "trade_title") ? "checked" : ""; ?> value="trade_title"/> TRADE IN TITLE SIGNED/PROMISE TO PRODUCE
					</li>
					<li>
						<input type="checkbox" name="deal_jacket" <?php echo ($info['deal_jacket'] == "deal_jacket") ? "checked" : ""; ?> value="deal_jacket"/> MAKE NEW DEAL JACKET
					</li>
					<li>
						<input type="checkbox" name="payoff_letter" <?php echo ($info['payoff_letter'] == "payoff_letter") ? "checked" : ""; ?> value="payoff_letter"/> 10 DAY PAYOFF LETTER (IF THERE IS A LIEN)
					</li>
					<li>
						<input type="checkbox" name="request_payoff" <?php echo ($info['request_payoff'] == "request_payoff") ? "checked" : ""; ?> value="request_payoff"/> CHECK REQUEST FOR PAYOFF
					</li>
					<li>
						<input type="checkbox" name="vin_audit" <?php echo ($info['vin_audit'] == "vin_audit") ? "checked" : ""; ?> value="vin_audit"/> VIN AUDIT CHECK (OUT OF STATE)
					</li>
					<li>
						<input type="checkbox" name="title_hdf" <?php echo ($info['title_hdf'] == "title_hdf") ? "checked" : ""; ?> value="title_hdf"/> APPLICATION FOR TITLE IN HDF
					</li>
					<li>
						<input type="checkbox" name="disclosure_damage" <?php echo ($info['disclosure_damage'] == "disclosure_damage") ? "checked" : ""; ?> value="disclosure_damage"/> SIGNED DAMAGE DISCLOSURE
					</li>
					<li>
						<input type="checkbox" name="attorney_power" <?php echo ($info['attorney_power'] == "attorney_power") ? "checked" : ""; ?> value="attorney_power"/> SIGNED POWER OF ATTORNEY
					</li>
					<li>
						<input type="checkbox" name="vechile_log" <?php echo ($info['vechile_log'] == "vechile_log") ? "checked" : ""; ?> value="vechile_log"/> TRADE-IN STOCKED INTO VEHICLE LOG
					</li>
					<li>
						<input type="checkbox" name="appraisal_jacket" <?php echo ($info['appraisal_jacket'] == "appraisal_jacket") ? "checked" : ""; ?> value="appraisal_jacket"/> TRADE-IN APPRAISAL IN BOTH JACKETS
					</li>
					<li>
						<input type="checkbox" name="service_notified" <?php echo ($info['service_notified'] == "service_notified") ? "checked" : ""; ?> value="service_notified"/> SERVICE NOTIFIED OF TRADE-IN
					</li>
				</ul>
				
				<strong style="float: left; width: 100%; font-size: 18px; margin: 10px 0;">LICENSE</strong>
				<ul>
					<li>
						<input type="checkbox" name="title_app" <?php echo ($info['title_app'] == "title_app") ? "checked" : ""; ?> value="title_app"/> TITLE APPLICATION
					</li>
					<li>
						<input type="checkbox" name="mco_title" <?php echo ($info['mco_title'] == "mco_title") ? "checked" : ""; ?> value="mco_title"/> MCO / TITLE
					</li>
					<li>
						<input type="checkbox" name="nd_damage" <?php echo ($info['nd_damage'] == "nd_damage") ? "checked" : ""; ?> value="nd_damage"/> DAMAGE DISCLOSURE (ND RESIDENTS)
					</li>
					<li>
						<input type="checkbox" name="mn_binder" <?php echo ($info['mn_binder'] == "mn_binder") ? "checked" : ""; ?> value="mn_binder"/> INSURANCE BINDER (MN RESIDENTS)
					</li>
					<li>
						<input type="checkbox" name="mn_drivers" <?php echo ($info['mn_drivers'] == "mn_drivers") ? "checked" : ""; ?> value="mn_drivers"/> DRIVERS LICENSE (MN RESIDENTS)
					</li>
				</ul>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px; 0;">
			<strong style="float: left; width: 100%; font-size: 18px; margin: 10px 0;">FINANCED DEALS</strong>
			
			<div class="one-third" style="float: left; width: 30%;">
				<strong style="font-size: 14px;">EAGLEMARK</strong>
				<ul>
					<li>
						<input type="checkbox" name="approval" <?php echo ($info['approval'] == "approval") ? "checked" : ""; ?> value="approval"/> APPROVAL
					</li>
					<li>
						<input type="checkbox" name="pnsa_signed" <?php echo ($info['pnsa_signed'] == "pnsa_signed") ? "checked" : ""; ?> value="pnsa_signed"/> PNSA SIGNED
					</li>
					<li>
						<input type="checkbox" name="pnsa_insurance" <?php echo ($info['pnsa_insurance'] == "pnsa_insurance") ? "checked" : ""; ?> value="pnsa_insurance"/> INSURANCE IN PNSA
					</li>
					<li>
						<input type="checkbox" name="upload_bill" <?php echo ($info['upload_bill'] == "upload_bill") ? "checked" : ""; ?> value="upload_bill"/> UPLOAD BILL OF SALE
					</li>
					<li>
						<input type="checkbox" name="upload_title" <?php echo ($info['upload_title'] == "upload_title") ? "checked" : ""; ?> value="upload_title"/> UPLOAD TITLE APP
					</li>
					<li>
						<input type="checkbox" name="upload_drivers" <?php echo ($info['upload_drivers'] == "upload_drivers") ? "checked" : ""; ?> value="upload_drivers"/> UPLOAD DRIVERS LIC.
					</li>
				</ul>
			</div>
			
			<div class="one-third" style="float: left; width: 30%; margin-left: 4%;">
				<strong style="font-size: 14px;">CAPITAL CREDIT UNION</strong>
				<ul>
					<li>
						<input type="checkbox" name="credit_approval" <?php echo ($info['credit_approval'] == "credit_approval") ? "checked" : ""; ?> value="credit_approval"/> APPROVAL
					</li>
					<li>
						<input type="checkbox" name="credit_pnsa" <?php echo ($info['credit_pnsa'] == "credit_pnsa") ? "checked" : ""; ?> value="credit_pnsa"/> PNSA
					</li>
					<li>
						<input type="checkbox" name="app_membership" <?php echo ($info['app_membership'] == "app_membership") ? "checked" : ""; ?> value="app_membership"/> APP FOR MEMBERSHIP
					</li>
					<li>
						<input type="checkbox" name="customer_idenitity" <?php echo ($info['customer_idenitity'] == "customer_idenitity") ? "checked" : ""; ?> value="customer_idenitity"/> CUSTOMER IDENITITY
					</li>
					<li>
						<input type="checkbox" name="insurance_notice" <?php echo ($info['insurance_notice'] == "insurance_notice") ? "checked" : ""; ?> value="insurance_notice"/> INSURANCE NOTICE
					</li>
					<li>
						<input type="checkbox" name="auto_pay" <?php echo ($info['auto_pay'] == "auto_pay") ? "checked" : ""; ?> value="auto_pay"/> AUTO PAY
					</li>
					<li>
						<input type="checkbox" name="risk_based" <?php echo ($info['risk_based'] == "risk_based") ? "checked" : ""; ?> value="risk_based"/> RISK BASED
					</li>
					<li>
						<input type="checkbox" name="references" <?php echo ($info['references'] == "references") ? "checked" : ""; ?> value="references"/> REFERENCES
					</li>
					<li>
						<input type="checkbox" name="sale_bill" <?php echo ($info['sale_bill'] == "sale_bill") ? "checked" : ""; ?> value="sale_bill"/> BILL OF SALE 
					</li>
					<li>
						<input type="checkbox" name="license_drivers" <?php echo ($info['license_drivers'] == "license_drivers") ? "checked" : ""; ?> value="license_drivers"/> DRIVERS LICENSE
					</li>
				</ul>
			</div>
			
			<div class="one-third" style="float: right; width: 30%; ">
				<strong style="font-size: 14px;">FIRST PREMIER BANK</strong>
				<ul>
					<li>
						<input type="checkbox" name="premier_approval" <?php echo ($info['premier_approval'] == "premier_approval") ? "checked" : ""; ?> value="premier_approval"/> APPROVAL
					</li>
					<li>
						<input type="checkbox" name="premier_pnsa" <?php echo ($info['premier_pnsa'] == "premier_pnsa") ? "checked" : ""; ?> value="premier_pnsa"/> PNSA
					</li>
					<li>
						<input type="checkbox" name="premier_insurance" <?php echo ($info['premier_insurance'] == "premier_insurance") ? "checked" : ""; ?> value="premier_insurance"/> INSURANCE NOTICE
					</li>
					<li>
						<input type="checkbox" name="premier_bill" <?php echo ($info['premier_bill'] == "premier_bill") ? "checked" : ""; ?> value="premier_bill"/> BILL OF SALE 
					</li>
					<li>
						<input type="checkbox" name="premier_license" <?php echo ($info['premier_license'] == "premier_license") ? "checked" : ""; ?> value="premier_license"/> DRIVERS LICENSE
					</li>
				</ul>
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left; margin: 7px 0; border-bottom: 1px solid #000; padding-bottom: 20px; font-size: 14px; text-align: center;">
			<p style="margin: 20px 0 3px 0">
				<input type="checkbox" name="talon" <?php echo ($info['talon'] == "talon") ? "checked" : ""; ?> value="talon"/> LEIN HOLDER ENTERED IN TALON 
			</p>
			<p style="margin: 0 0 3px 0">
				<input type="checkbox" name="reserve_talon" <?php echo ($info['reserve_talon'] == "reserve_talon") ? "checked" : ""; ?> value="reserve_talon"/> BUY RATE AND RESERVE ENTERED INTO TALON
			</p>
			<p style="margin: 0 0 3px 0">
				<input type="checkbox" name="funding_packet" <?php echo ($info['funding_packet'] == "funding_packet") ? "checked" : ""; ?> value="funding_packet"/> FUNDING PACKET
			</p>
			<p style="margin: 0 0 3px 0">
				<input type="checkbox" name="compliance" <?php echo ($info['compliance'] == "compliance") ? "checked" : ""; ?> value="compliance"/> COMPLIANCE CHECK FOR ALL LOANS
			</p>
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