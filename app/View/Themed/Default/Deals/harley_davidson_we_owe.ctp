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
		input[type="text"]{ border-bottom: 0px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-top: 0px; border-right: 0px;}
		label{font-size: 14px; margin-bottom: 0px; font-weight: normal !important;}
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
		<h2 style="float: left; width: 100%; text-align: right; padding: 0 17%; box-sizing: border-box; margin: 6px 0 14px 0;">WE OWE</h2>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 38%;">
				<label>NAME</label>
				<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>STK.NO</label>
				<input type="text" name="stk_no" value="<?php echo isset($info['stk_no']) ? $info['stk_no'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label>NEW</label>
				<input type="text" name="new" value="<?php echo isset($info['new']) ? $info['new'] : ''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: right; width: 14%;">
				<label>USED</label>
				<input type="text" name="used" value="<?php echo isset($info['usedused']) ? $info['used'] : ''; ?>" style="width: 64%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 38%;">
				<label>ADDRESS</label>
				<input type="text" name="address" value="<?php echo isset($info['address']) ? $info['address'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>MAKE</label>
				<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 75%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 38%;">
				<label>CITY</label>
				<input type="text" name="city" value="<?php echo isset($info['city']) ? $info['city'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>STATE</label>
				<input type="text" name="state" value="<?php echo isset($info['state']) ? $info['state'] : ''; ?>" style="width: 76%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label>ZIP</label>
				<input type="text" name="zip" value="<?php echo isset($info['zip']) ? $info['zip'] : ''; ?>" style="width: 75%;">
			</div>
			<div class="form-field" style="float: right; width: 14%;">
				<label>MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 56%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>PHONE</label>
				<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>SERIAL NO.</label>
				<input type="text" name="serial_no" value="<?php echo isset($info['serial_no']) ? $info['serial_no'] : ''; ?>" style="width: 70%;">
			</div>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>SALESMAN</label>
				<input type="text" name="sperson" value="<?php echo isset($info['sperson']) ? $info['sperson'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>DEL. DATE</label>
				<input type="text" name="del_date" value="<?php echo isset($info['del_date']) ? $info['del_date'] : ''; ?>" style="width: 70%;">
			</div>
		</div>

		<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<th style="width: 10%;">QTY.</th>
				<th style="width: 52%;">NAME OF ITEM</th>
				<th style="width: 18%;">PART</th>
				<th style="width: 20%;">LABOR</th>
			</tr>
			<?php for($i=1; $i<=6; $i++) { ?>
				<tr>
					<td>
						<input type="text" name="qty<?php echo $i; ?>" value="<?php echo isset($info['qty'.$i]) ? $info['qty'.$i] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="name_item<?php echo $i; ?>" value="<?php echo isset($info['name_item'.$i]) ? $info['name_item'.$i] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part<?php echo $i; ?>" value="<?php echo isset($info['part'.$i]) ? $info['part'.$i] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor<?php echo $i; ?>" value="<?php echo isset($info['labor'.$i]) ? $info['labor'.$i] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
			<?php } ?>			
		</table>
		
		<p style="float: left; width: 100%; margin: 0; font-size: 14px;">I hereby accept this WE-OWE with the understanding that it is valid for only (30) THIRTY DAYS FROM DATE OF ISSUANCE, and that I must make an ADVANCE APPOINTMENT WITH THE SERVICE DEPARTMENT before the above work can be performed.</p>
		<p style="float: left; width: 100%; margin: 0; font-size: 14px;">(FOR APPOINTMENT CALL SERVICE DEPT.)</p>
		
		
		<div class="row" style="width: 32%; border-bottom: 1px solid #000; float: right; margin: 7px 0;">
			<div class="form-field" style="float: left; width: 100%;">
				<label>DATE</label>
				<input type="text" name="date" value="<?php echo date('Y-m-d'); ?>" style="width: 80%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0; border-bottom: 1px solid #000;">
			<div class="form-field" style="float: left; width: 68%;">
				<label>CUSTOMER</label>
				<input type="text" name="customer" value="<?php echo isset($info['customer']) ? $info['customer'] : ''; ?>" style="width: 80%;">
			</div>
			<div class="form-field" style="float: left; width: 30%;">
				<label>APPROVED</label>
				<input type="text" name="approved" value="<?php echo isset($info['approved']) ? $info['approved'] : ''; ?>" style="width: 70%;">
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