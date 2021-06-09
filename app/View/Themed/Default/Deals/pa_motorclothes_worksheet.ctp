<?php
//This Custom Form Mapped Author: Abha Sood Negi

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
	<div id="worksheet_container" style="width: 960px; margin:0 auto;font-size: 12px;">
	<style>

		.container{width: 960px; margin: 0 auto; font-size: 12px;}
	input[type="text"]{ border: 1px solid #000; height: auto; box-sizing: border-box; border-left: 0; border-right: 0; border-top: 0;}
	.one-half input[type="text"]{border-bottom: 1px solid #000; border-top: 0px; border-left: 0px; border-right: 0px; height: auto;}
	.top input{border: 0px;}
	th, td{border-bottom: 1px solid #000; font-weight: normal;  border-right: 1px solid #000;}
	table input[type="text"]{border-bottom: 0px;}
	td{padding: 5px 2px; }
	td input[type="text"]{text-align: center;}
	th{text-align: center; font-weight: bold; font-size: 16px;}
	.bg{background-color: #fff !important;}
	
	
	.upper input[type="text"], .p-a-motor input[type="text"]{border: 1px solid #000; padding: 5px;}
	
	
	.from-field {font-size: 12px;}
	.wraper.main input {padding: 0px;}
	.upper input[type="text"], .p-a-motor input[type="text"]{border: 1px solid #000; padding: 5px;}
	.asas{background-color: #fff !important;}
	@media print { 
	.dontprint{display: none;}
	
	}
	</style>

	<div class="wraper header"> 
		
		<!-- container start -->
		<h2 style="font-size: 16px; margin: 7px 0 5px; float: left; width: 100%; font-weight: bold;">P&A / MOTORCLOTHES WORKSHEET</h2>
		<div class="p-a-motor" style="float: left; width: 100%; border: 1px solid #000; padding: 10px; box-sizing: border-box;">
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="width: 49%; float: left;">
					<input type="text" name="name" value="<?php echo isset($info['name']) ? $info['name'] : ''; ?>" style="width: 100%;">
					<label>Name</label>
				</div>
				<div class="form-field" style="width: 49%; float: right;">
					<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 100%;">
					<label>Vin #</label>
				</div>
			</div>
			<div class="row" style="float: left; width: 100%; margin: 3px 0;">
				<div class="form-field" style="width: 14%; float: left;">
					<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 100%;">
					<label>Year</label>
				</div>
				<div class="form-field" style="width: 20%; float: left; margin: 0 2%;">
					<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 100%;">
					<label>Model</label>
				</div>
				<div class="form-field" style="width: 23%; float: left;">
					<input type="text" name="color" value="<?php echo isset($info['color']) ? $info['color'] : ''; ?>" style="width: 100%;">
					<label>Color</label>
				</div>
				<div class="form-field" style="width: 17%; float: left; margin: 0 2%;">
					<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 100%;">
					<label>Salesman</label>
				</div>
				<div class="form-field" style="width: 18%; float: right;">
					<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 100%;">
					<label>Stock Number</label>
				</div>
			</div>
		</div>
		
		<div class="row" style="width: 100%; float: left;  margin: 10px 0 3px;">
			<table width="100%" cellpadding="0" cellspacing="0" style="border-left: 1px solid #000; border-top: 1px solid #000;">
				<tr>
					<th style="width: 8%">QTY</th>
					<th style="width: 20%">PART NUMBER</th>
					<th style="width: 20%">PART DESCRIPTION</th>
					<th style="width: 10%">SPECIAL ORDER</th>
					<th style="width: 15%">PRICE</th>
					<th style="width: 15%">LABOR</th>
					<th style="width: 15%">INSTALL Y/N</th>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty" value="<?php echo isset($info['qty']) ? $info['qty'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number" value="<?php echo isset($info['part_number']) ? $info['part_number'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description" value="<?php echo isset($info['part_description']) ? $info['part_description'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order" value="<?php echo isset($info['special_order']) ? $info['special_order'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price" value="<?php echo isset($info['price']) ? $info['price'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor" value="<?php echo isset($info['labor']) ? $info['labor'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n" value="<?php echo isset($info['instal_y_n']) ? $info['instal_y_n'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty1" value="<?php echo isset($info['qty1']) ? $info['qty1'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number1" value="<?php echo isset($info['part_number1']) ? $info['part_number1'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description1" value="<?php echo isset($info['part_description1']) ? $info['part_description1'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order1" value="<?php echo isset($info['special_order1']) ? $info['special_order1'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price1" value="<?php echo isset($info['price1']) ? $info['price1'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor1" value="<?php echo isset($info['labor1']) ? $info['labor1'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n1" value="<?php echo isset($info['instal_y_n1']) ? $info['instal_y_n1'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty2" value="<?php echo isset($info['qty2']) ? $info['qty2'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number2" value="<?php echo isset($info['part_number2']) ? $info['part_number2'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description2" value="<?php echo isset($info['part_description2']) ? $info['part_description2'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order2" value="<?php echo isset($info['special_order2']) ? $info['special_order2'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price2" value="<?php echo isset($info['price2']) ? $info['price2'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor2" value="<?php echo isset($info['labor2']) ? $info['labor2'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n2" value="<?php echo isset($info['instal_y_n2']) ? $info['instal_y_n2'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty3" value="<?php echo isset($info['qty3']) ? $info['qty3'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number3" value="<?php echo isset($info['part_number3']) ? $info['part_number3'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description3" value="<?php echo isset($info['part_description3']) ? $info['part_description3'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order3" value="<?php echo isset($info['special_order3']) ? $info['special_order3'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price3" value="<?php echo isset($info['price3']) ? $info['price3'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor3" value="<?php echo isset($info['labor3']) ? $info['labor3'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n3" value="<?php echo isset($info['instal_y_n3']) ? $info['instal_y_n3'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty4" value="<?php echo isset($info['qty4']) ? $info['qty4'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number4" value="<?php echo isset($info['part_number4']) ? $info['part_number4'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description4" value="<?php echo isset($info['part_description4']) ? $info['part_description4'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order4" value="<?php echo isset($info['special_order4']) ? $info['special_order4'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price4" value="<?php echo isset($info['price4']) ? $info['price4'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor4" value="<?php echo isset($info['labor4']) ? $info['labor4'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n4" value="<?php echo isset($info['instal_y_n4']) ? $info['instal_y_n4'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty5" value="<?php echo isset($info['qty5']) ? $info['qty5'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number5" value="<?php echo isset($info['part_number5']) ? $info['part_number5'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description5" value="<?php echo isset($info['part_description5']) ? $info['part_description5'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order5" value="<?php echo isset($info['special_order5']) ? $info['special_order5'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price5" value="<?php echo isset($info['price5']) ? $info['price5'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor5" value="<?php echo isset($info['labor5']) ? $info['labor5'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n5" value="<?php echo isset($info['instal_y_n5']) ? $info['instal_y_n5'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty6" value="<?php echo isset($info['qty6']) ? $info['qty6'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number6" value="<?php echo isset($info['part_number6']) ? $info['part_number6'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description6" value="<?php echo isset($info['part_description6']) ? $info['part_description6'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order6" value="<?php echo isset($info['special_order6']) ? $info['special_order6'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price6" value="<?php echo isset($info['price6']) ? $info['price6'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor6" value="<?php echo isset($info['labor6']) ? $info['labor6'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n6" value="<?php echo isset($info['instal_y_n6']) ? $info['instal_y_n6'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty7" value="<?php echo isset($info['qty7']) ? $info['qty7'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number7" value="<?php echo isset($info['part_number7']) ? $info['part_number7'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description7" value="<?php echo isset($info['part_description7']) ? $info['part_description7'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order7" value="<?php echo isset($info['special_order7']) ? $info['special_order7'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price7" value="<?php echo isset($info['price7']) ? $info['price7'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor7" value="<?php echo isset($info['labor7']) ? $info['labor7'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n7" value="<?php echo isset($info['instal_y_n7']) ? $info['instal_y_n7'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty8" value="<?php echo isset($info['qty8']) ? $info['qty8'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number8" value="<?php echo isset($info['part_number8']) ? $info['part_number8'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description8" value="<?php echo isset($info['part_description8']) ? $info['part_description8'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order8" value="<?php echo isset($info['special_order8']) ? $info['special_order8'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price8" value="<?php echo isset($info['price8']) ? $info['price8'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor8" value="<?php echo isset($info['labor8']) ? $info['labor8'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n8" value="<?php echo isset($info['instal_y_n8']) ? $info['instal_y_n8'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty9" value="<?php echo isset($info['qty9']) ? $info['qty9'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number9" value="<?php echo isset($info['part_number9']) ? $info['part_number9'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description9" value="<?php echo isset($info['part_description9']) ? $info['part_description9'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order9" value="<?php echo isset($info['special_order9']) ? $info['special_order9'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price9" value="<?php echo isset($info['price9']) ? $info['price9'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor9" value="<?php echo isset($info['labor9']) ? $info['labor9'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n9" value="<?php echo isset($info['instal_y_n9']) ? $info['instal_y_n9'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty10" value="<?php echo isset($info['qty10']) ? $info['qty10'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number10" value="<?php echo isset($info['part_number10']) ? $info['part_number10'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description10" value="<?php echo isset($info['part_description10']) ? $info['part_description10'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order10" value="<?php echo isset($info['special_order10']) ? $info['special_order10'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price10" value="<?php echo isset($info['price10']) ? $info['price10'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor10" value="<?php echo isset($info['labor10']) ? $info['labor10'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n10" value="<?php echo isset($info['instal_y_n10']) ? $info['instal_y_n10'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty11" value="<?php echo isset($info['qty11']) ? $info['qty11'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number11" value="<?php echo isset($info['part_number11']) ? $info['part_number11'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description11" value="<?php echo isset($info['part_description11']) ? $info['part_description11'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order11" value="<?php echo isset($info['special_order11']) ? $info['special_order11'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price11" value="<?php echo isset($info['price11']) ? $info['price11'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor11" value="<?php echo isset($info['labor11']) ? $info['labor11'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n11" value="<?php echo isset($info['instal_y_n11']) ? $info['instal_y_n11'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty12" value="<?php echo isset($info['qty12']) ? $info['qty12'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number12" value="<?php echo isset($info['part_number12']) ? $info['part_number12'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description12" value="<?php echo isset($info['part_description12']) ? $info['part_description12'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order12" value="<?php echo isset($info['special_order12']) ? $info['special_order12'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price12" value="<?php echo isset($info['price12']) ? $info['price12'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor12" value="<?php echo isset($info['labor12']) ? $info['labor12'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n12" value="<?php echo isset($info['instal_y_n12']) ? $info['instal_y_n12'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty13" value="<?php echo isset($info['qty13']) ? $info['qty13'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number13" value="<?php echo isset($info['part_number13']) ? $info['part_number13'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description13" value="<?php echo isset($info['part_description13']) ? $info['part_description13'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order13" value="<?php echo isset($info['special_order13']) ? $info['special_order13'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price13" value="<?php echo isset($info['price13']) ? $info['price13'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor13" value="<?php echo isset($info['labor13']) ? $info['labor13'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n13" value="<?php echo isset($info['instal_y_n13']) ? $info['instal_y_n13'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty14" value="<?php echo isset($info['qty14']) ? $info['qty14'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number14" value="<?php echo isset($info['part_number14']) ? $info['part_number14'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description14" value="<?php echo isset($info['part_description14']) ? $info['part_description14'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order14" value="<?php echo isset($info['special_order14']) ? $info['special_order14'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price14" value="<?php echo isset($info['price14']) ? $info['price14'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor14" value="<?php echo isset($info['labor14']) ? $info['labor14'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n14" value="<?php echo isset($info['instal_y_n14']) ? $info['instal_y_n14'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty15" value="<?php echo isset($info['qty15']) ? $info['qty15'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number15" value="<?php echo isset($info['part_number15']) ? $info['part_number15'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description15" value="<?php echo isset($info['part_description15']) ? $info['part_description15'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order15" value="<?php echo isset($info['special_order15']) ? $info['special_order15'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price15" value="<?php echo isset($info['price15']) ? $info['price15'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor15" value="<?php echo isset($info['labor15']) ? $info['labor15'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n15" value="<?php echo isset($info['instal_y_n15']) ? $info['instal_y_n15'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty16" value="<?php echo isset($info['qty16']) ? $info['qty16'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number16" value="<?php echo isset($info['part_number16']) ? $info['part_number16'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description16" value="<?php echo isset($info['part_description16']) ? $info['part_description16'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order16" value="<?php echo isset($info['special_order16']) ? $info['special_order16'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price16" value="<?php echo isset($info['price16']) ? $info['price16'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor16" value="<?php echo isset($info['labor16']) ? $info['labor16'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n16" value="<?php echo isset($info['instal_y_n16']) ? $info['instal_y_n16'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty17" value="<?php echo isset($info['qty17']) ? $info['qty17'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number17" value="<?php echo isset($info['part_number17']) ? $info['part_number17'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description17" value="<?php echo isset($info['part_description17']) ? $info['part_description17'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order17" value="<?php echo isset($info['special_order17']) ? $info['special_order17'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price17" value="<?php echo isset($info['price17']) ? $info['price17'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor17" value="<?php echo isset($info['labor17']) ? $info['labor17'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n17" value="<?php echo isset($info['instal_y_n17']) ? $info['instal_y_n17'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty18" value="<?php echo isset($info['qty18']) ? $info['qty18'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number18" value="<?php echo isset($info['part_number18']) ? $info['part_number18'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description18" value="<?php echo isset($info['part_description18']) ? $info['part_description18'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order18" value="<?php echo isset($info['special_order18']) ? $info['special_order18'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price18" value="<?php echo isset($info['price18']) ? $info['price18'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor18" value="<?php echo isset($info['labor18']) ? $info['labor18'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n18" value="<?php echo isset($info['instal_y_n18']) ? $info['instal_y_n18'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="text" name="qty19" value="<?php echo isset($info['qty19']) ? $info['qty19'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_number19" value="<?php echo isset($info['part_number19']) ? $info['part_number19'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="part_description19" value="<?php echo isset($info['part_description19']) ? $info['part_description19'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="special_order19" value="<?php echo isset($info['special_order19']) ? $info['special_order19'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="price19" value="<?php echo isset($info['price19']) ? $info['price19'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="labor19" value="<?php echo isset($info['labor19']) ? $info['labo19r'] : ''; ?>" style="width: 100%;">
					</td>
					<td>
						<input type="text" name="instal_y_n19" value="<?php echo isset($info['instal_y_n19']) ? $info['instal_y_n19'] : ''; ?>" style="width: 100%;">
					</td>
				</tr>

			</table>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style=" position: relative; float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 3px 10px 10px;">
				<span class="bg" style="background-color: #ffff; padding: 0 4px; font-size: 14px; position: absolute; top: -10px; font-weight: bold;">Note</span>
				<input type="text" name="note" value="<?php echo isset($info['note']) ? $info['note'] : ''; ?>" style="width: 100%;">
				<input type="text" name="note1" value="<?php echo isset($info['note1']) ? $info['note1'] : ''; ?>" style="width: 100%;">
				<input type="text" name="note" value="<?php echo isset($info['note']) ? $info['note2'] : ''; ?>" style="width: 100%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0;">
			<div class="form-field" style=" position: relative; float: left; width: 100%; border: 1px solid #000; box-sizing: border-box; padding: 10px 10px 7px">
				<span class="bg" style="background-color: #ffff; font-size: 14px; padding: 0 4px; position: absolute; top: -10px; font-weight: bold;">Disclaimer</span>
				<p style="margin: 0px 0 10px; font-size: 14px;">In order to provide exceptional customer service, we ask you to revoew this worksheet for accuracy. Your parts or sales representative will notify you with any backorder, out of stock, or fitment problem. Your parts or sales representative will call you to schedule an installation date, once all parts have been received. Any take-off parts will call you to schedule an installation date, once all parts have been recevied. Any changes to this worksheet which occur after merchandise has been ordered will result n a 25% restocking fee. All take-off parts will be discarded after 5 business days once installation has been completed, unless claimed by the owner.</p>
				
				<div class="inner-row" style="float: left; width: 100%; margin: 0;">
					<div class="form-field" style="width: 29%; float: left;">
						<input type="text" name="parts_installation_date" value="<?php echo isset($info['parts_installation_date']) ? $info['parts_installation_date'] : ''; ?>" style="width: 100%;">
						<label style="margin-top: 5px;">Parts Installation Date</label>
					</div>
					<div class="form-field" style="width: 39%; float: left; margin: 0 2%">
						<input type="text" name="customer_signature" value="<?php echo isset($info['customer_signature']) ? $info['customer_signature'] : ''; ?>" style="width: 100%;">
						<label style="margin-top: 5px;">Customer Signature</label>
					</div>
					<div class="form-field" style="width: 28%; float: right;">
						<input type="text" name="date_input" value="<?php echo isset($info['date_input']) ? $info['date_input'] : ''; ?>" style="width: 100%;">
						<label style="margin-top: 5px;">Date</label>
					</div>
				</div>
				
				
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
