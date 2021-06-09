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
			label{font-size: 13px; margin-bottom: 1px; font-weight: normal;}
			.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
			.top input{border: 0px;}
			th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000;}
			th{text-align: center; font-size: 15px;}
			table input[type="text"]{border-bottom: 0px;}
			td{padding: 1px 2px; }
			td input[type="text"]{text-align: center;}
			table{border-top: 1px solid #000; border-left: 1px solid #000;}
			.row{box-sizing: border-box;}
			.right input[type="text"]{border: 1px solid #000; border-bottom: 0px; float: right; color: royalblue; text-align: center; width: 48%;}
			.items-table th{ text-align: center; font-size: 13px;}
			.wraper.main input {padding: 0px;}
			.right label{font-weight: normal;}
			@media print { 
			.dontprint{display: none;} 
			.blue {color:royalblue !important;}
		}
		</style>

		<div class="wraper header"> 
			<!-- container start -->
			<h2 style="float: left; text-transform: uppercase; width: 100%; text-align: center; text-decoration: underline; color: #000;"><i>Parts & Service Request</i></h2>
			<h3 class="blue" style="float: left; color: royalblue; margin: 21px 0 5px; width: 100%; text-align: center; font-weight: bold;"><?php echo $info['sperson']; ?></h3>
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 60%;">
					<label>Customer:</label>
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : $info['first_name'].' '.$info['last_name']; ?>" style="width: 85%;">
				</div>
				<div class="form-field" style="float: right; width: 40%;">
					<label>Phone#</label>
					<input type="text" name="phone" value="<?php echo isset($info['phone']) ? $info['phone'] : ''; ?>" style="width: 85%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 50%;">
					<label>Today's Date:</label>
					<input type="text" name="date" value="<?php echo date("Y-m-d"); ?>" style="width: 80%;">
				</div>
				<div class="form-field" style="float: right; width: 50%;">
					<label>Delivery Date:</label>
					<input type="text" name="delivery_date" value="<?php echo isset($info['delivery_date']) ? $info['delivery_date'] : ''; ?>" style="width: 80%;">
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<div class="form-field" style="float: left; width: 15%;">
					<label>Year:</label>
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 68%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>Make:</label>
					<input type="text" name="make" value="<?php echo isset($info['make']) ? $info['make'] : ''; ?>" style="width: 75%;">
				</div>
				<div class="form-field" style="float: left; width: 25%;">
					<label>Model:</label>
					<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 75%;">
				</div>
				<div class="form-field" style="float: left; width: 17%;">
					<label>Stock:</label>
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:'';  ?>" style="width: 69%;">
				</div>
				<div class="form-field" style="float: right; width: 18%;">
					<label>Color:</label>
					<input type="text" name="unit_color" value="<?php echo isset($info['unit_color'])?$info['unit_color']:''; ?>" style="width: 72%;">
				</div>
			</div>
			
			<table cellpadding="0" cellspacing="0;" width="100%" style="margin: 20px 0 10px; float: left;">
				<tr>
					<th style="width: 15%;">Quantity</th>
					<th >Part Number</th>
					<th>Description</th>
					<th style="width: 15%;">CO / Inst</th>
				</tr>
				<?php $row_number = (in_array(AuthComponent::user('dealer_id'), $dealer_id_array)) ? 15 : 15; ?>
				<?php for($i=1; $i<= $row_number; $i++) { ?>
					<tr>
						<td><input type="text" name="qty<?php echo $i; ?>" value="<?php echo isset($info['qty'.$i]) ? $info['qty'.$i] : $info['quantity'.$i]; ?>" style="width: 100%;"></td>
						<td><input type="text" name="part_num<?php echo $i; ?>" value="<?php echo isset($info['part_num'.$i]) ? $info['part_num'.$i] : $info['part_number'.$i]; ?>" style="width: 100%;"></td>
						<td><input type="text" name="description<?php echo $i; ?>" value="<?php echo isset($info['description'.$i]) ? $info['description'.$i] : $info['description'.$i]; ?>" style="width: 100%;"></td>
						<td><input type="text" name="co_inst<?php echo $i; ?>" value="<?php echo isset($info['co_inst'.$i]) ? $info['co_inst'.$i] : $info['co_inst'.$i]; ?>" style="width: 100%;"></td>
					</tr>
				<?php } ?>
			</table>
			
			<div class="row" style="float: left; width: 100%; margin: 7px 0;">
				<p style="text-align: center; margin-bottom: 2px; font-size: 15px;">Special Notes</p>
				<textarea name="special_notes" style="width: 100%; border: 1px solid #000; height: 150px;"><?php echo isset($info['special_notes'])?$info['special_notes']:''; ?></textarea>
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