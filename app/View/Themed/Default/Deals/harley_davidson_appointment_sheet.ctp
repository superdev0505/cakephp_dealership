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
			<h2 style="float: left; width: 100%; text-align: center; margin: 10px 0; margin: 19px 0; font-size: 20px;">SCHEDULED APPOINTMENT</h2>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>CUSTOMER</label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>PHONE#</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 85%;">
				</div>
			</div>

			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>DATE</label>
					<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 88%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>TIME</label>
					<input type="text" name="time" value="<?php echo date("h:i:sa"); ?>" style="width: 90%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>STOCK#</label>
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 84%;">
				</div>
				<div class="form-field" style="float: left; width: 20%;">
					<label>YEAR</label>
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 70%;">
				</div>
				<div class="form-field" style="float: right; width: 30%;">
					<label>MODEL</label>
					<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 79%;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>SALESMAN</label>
					<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 90.5%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>NOTES</label>
					<input type="text" name="notes1" value="<?php echo isset($info['notes1']) ? $info['notes1'] : ''; ?>" style="width: 94%; margin-bottom: 10px;">
					<input type="text" name="notes2" value="<?php echo isset($info['notes2']) ? $info['notes2'] : ''; ?>" style="width: 100%; margin-bottom: 10px;">
					<input type="text" name="notes3" value="<?php echo isset($info['notes3']) ? $info['notes3'] : ''; ?>" style="width: 100%; margin-bottom: 10px;">
				</div>
			</div>
		
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>SALESMANAGER</label>
					<input type="text" name="salesmanager" value="<?php echo isset($info['salesmanager']) ? $info['salesmanager'] : ''; ?>" style="width: 86%;">
				</div>
			</div>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 100%;">
					<label>NOTES</label>
					<input type="text" name="notes4" value="<?php echo isset($info['notes4']) ? $info['notes4'] : ''; ?>" style="width: 94%; margin-bottom: 10px;">
					<input type="text" name="notes5" value="<?php echo isset($info['notes5']) ? $info['notes5'] : ''; ?>" style="width: 100%; margin-bottom: 10px;">
					<input type="text" name="notes6" value="<?php echo isset($info['notes6']) ? $info['notes6'] : ''; ?>" style="width: 100%; margin-bottom: 10px;">
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