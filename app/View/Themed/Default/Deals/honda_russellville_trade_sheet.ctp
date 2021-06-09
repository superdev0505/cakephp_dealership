<?php
//This Custom Form Mapped Author: Abha Sood Negi

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
	<div id="worksheet_container" style="width: 960px; margin:0 auto;font-size: 12px;">
	<style>
		.container{width: 960px; margin: 0 auto; font-size: 12px;}
		input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
		label{font-size: 14px; text-transform: uppercase; margin-bottom: 1px; font-weight: normal;}
		
		th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000;}
		td:last-child{border-right: 0px;}
		th{text-align: center; font-size: 15px;}
		table input[type="text"]{border-bottom: 0px;}
		td{font-size: 15px; padding: 7px 1%}
		td input[type="text"]{text-align: center;}
		table{border-top: 1px solid #000;}
		.wraper.main input {padding: 5px;}
		@media print { 
		.dontprint{display: none;} 
		.blue {color:royalblue !important;}
		.red {color:#ff0000 !important;}
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<h2 style="float: left; text-transform: uppercase; width: 100%; text-align: center; color: #000;">Trade  in Service Request</h2>
		<h3 class="blue" style="float: left; color: royalblue; margin: 0; width: 100%; text-align: center; font-weight: bold; margin: 20px 0 10px;"><?php echo $info['sperson']; ?></h3>
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Year:</label>
				<input type="text" name="year_trade" value="<?php echo isset($info['year_trade']) ? $info['year_trade'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Make:</label>
				<input type="text" name="make_trade" value="<?php echo isset($info['make_trade']) ? $info['make_trade'] : ''; ?>" style="width: 82%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Model:</label>
				<input type="text" name="model_trade" value="<?php echo isset($info['model_trade']) ? $info['model_trade'] : ''; ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 30%;">
				<label>Stock#</label>
				<input type="text" name="stock_num_trade" value="<?php echo isset($info['stock_num_trade'])?$info['stock_num_trade']:'';  ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Color:</label>
				<input type="text" name="usedunit_color" value="<?php echo isset($info['usedunit_color']) ? $info['usedunit_color'] : ''; ?>" style="width: 79%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label>Date:</label>
				<input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" style="width: 83%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style="float: left; width:100%;">
				<label>VIN</label>
				<input type="text" name="vin_trade" value="<?php echo isset($info['vin_trade']) ? $info['vin_trade'] : ''; ?>" style="width: 96%;">
			</div>
		</div>
	
		
		<h3 style="float: left; width: 100%; margin: 7px 0; text-align: center;">CHANGE OIL AND FILTER</h3>
		<h3 class="red" style="float: left; width: 100%; margin: 7px 0; text-align: center; color: #ff0000">CHECK FOR RECALL</h3>
		
		
		<table cellpadding="0" cellspacing="0;" width="100%" style="margin: 20px 0 10px; float: left;">
			<tr>
				<td style="width: 15%;">AIR FILTER</td>
				<td><input type="text" name="air_filter" value="<?php echo isset($info['air_filter']) ? $info['air_filter'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>BREAKS</td>
				<td><input type="text" name="breaks" value="<?php echo isset($info['breaks']) ? $info['breaks'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>TIRES</td>
				<td><input type="text" name="tires" value="<?php echo isset($info['tires']) ? $info['tires'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>SPARK PLUG</td>
				<td><input type="text" name="spark_plug" value="<?php echo isset($info['spark_plug']) ? $info['spark_plug'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>ADJUST VALUES</td>
				<td><input type="text" name="adjust_values" value="<?php echo isset($info['adjust_values']) ? $info['adjust_values'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>FINAL DRIVE</td>
				<td><input type="text" name="final_drive" value="<?php echo isset($info['final_drive']) ? $info['final_drive'] : ''; ?>" style="width: 100%;"></td>
			</tr>
			<tr>
				<td>OTHER</td>
				<td><textarea name="others" style="width: 100%; border: 0px; height: 100px;"><?php echo isset($info['others']) ? $info['others'] : ''; ?></textarea></td>
			</tr>
		</table>
		
		<p style="float: left; width: 100%; text-align: center; font-size: 18px; color: #000; margin-bottom: 20px;">PLEASE PROVIDE ESTIMATES TO BILL OR ROGER <br> FOR ANY FURTHER REPAIRS</p>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-filed" style="float: left; width: 100%;">
				<label style="font-size: 16px; color: #000;">MANAGEMENT APPROVAL:</label>
				<input type="text" name="mng_approval" value="<?php echo isset($info['mng_approval']) ? $info['mng_approval'] : ''; ?>" style="width: 77%;">
			</div>
		</div>
		<!-- container end -->
	
	</div>
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