<div class="page-break"></div>
<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" >
	<style>body{ padding:0; margin:0 5%; font-family:Arial, Helvetica, sans-serif;}

		.unit_fm{ width:80%; border:none; background:none; font-size:16px; margin-left:20px;}
		.unit_fm2{ width:50%; border:none; background:none; font-size:16px; margin-left:20px;border:2px solid black;}

		.unit_fm4{ width:70%; border:none; background:none; font-size:16px; margin-left:20px;border:2px solid black;}
		
		#worksheet_container{				
				margin: 0 auto;
				width:90%;
			}
			
		@media print {
			#fixedfee_selection,.price_options,.noprint {
				display: none;
			}
			#worksheet_container{				
				margin-left: -40 !important;
				width:1000px !important;
			}
			
			.unit_fm{ width:40% !important; border:none; background:none; font-size:16px; margin-left:20px;}
			.unit_fm2{ width:50% !important; border:none; background:none; font-size:16px; margin-left:20px;border:2px solid black;}

			.unit_fm4{ width:40% !important; border:none; background:none; font-size:16px; margin-left:20px;border:2px solid black;}

		}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" style="border-bottom:solid 5px #166F44; border-top:solid 5px #166F44; padding:5px 0;">
		  <tr>
			<td style="color:#166F44; font-size:18px;">RIVWE VALLEY <br/> Power & Sport Inc</td>
			<td style="font-size:14px;">3399 so Service Drive<br /> RED WING MN 55066<br/> 651-388-7000. FEX 651-388-5887</td>
			<td style="font-size:14px;">3399 so Service Drive<br /> RED WING MN 55066<br/> 651-388-7000. FEX 651-388-5887</td>
		   <td style="font-size:14px;">3399 so Service Drive<br /> RED WING MN 55066<br/> 651-388-7000. FEX 651-388-5887</td>
		  </tr>
		</table>


		 <table width="100%" style="margin:10px 0 0 0;">
		  <tr style="background:#AFC3BC;">
			<td style="font-size:16px; font-weight:600; width:100%;">UNIT INFORMATION</td>
			</tr>
			</table>
			
			<table width="100%" style="margin:10px 0 0 0;">
			<tr>
			<td style=" font-size:15px; font-weight:600; width:100%;">UNIT 1<input name="unit_1" value="<?php echo isset($info['unit_1']) ? $info['unit_1'] : "" ?>" type="text" class="unit_fm" /></td>
			</tr>
			</table>
			
			 <table width="100%" style="margin:10px 0 0 0;">
			<tr>
			<td style=" font-size:15px; font-weight:600;">TYPE <input name="unit1_type" value="<?php echo isset($info['unit1_type']) ? $info['unit1_type'] : $info['category_trade'];?>"  type="text" class="unit_fm2" /></td>
			<td style=" font-size:15px; font-weight:600;">YEAR <input name="unit1_year" value="<?php echo isset($info['unit1_year']) ? $info['unit1_year'] : $info['year_trade']; ?>"  type="text" class="unit_fm2" /></td>
			<td style=" font-size:15px; font-weight:600;">MAKE <input name="unit1_make"  value="<?php echo isset($info['unit1_make']) ? $info['unit1_make'] : $info['make_trade']; ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		</table>

			<table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:50%;">MODEL <input name="unit1_model" value="<?php echo isset($info['unit1_model']) ? $info['unit1_model'] : $info['model_trade'];?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:50%;">VIN <input name="unit1_vin" value="<?php echo isset($info['unit1_vin']) ? $info['unit1_vin'] : $info['vin_trade']; ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:33%;">Hours / Miles <input name="unit1_hoursmilies" value="<?php echo isset($info['unit1_hoursmilies']) ? $info['unit1_hoursmilies'] : $info['odometer_trade']; ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:33%;">COLOR <input name="unit1_color" value="<?php echo isset($info['unit1_color']) ? $info['unit1_color'] : $info['usedunit_color']; ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:34%;">ENGINE SERIAL # <input name="unit1_engine" value="<?php echo isset($info['unit1_engine']) ? $info['unit1_engine'] : $info['engine_trade']; ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>


		  <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:100%; padding:0 0 0 30px;">ATTACHMENT <input name="unit1_attachment" value="<?php echo isset($info['unit1_attachment']) ? $info['unit1_attachment'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:33%;">LICENSE PLATE# <input name="unit1_lic" value="<?php echo isset($info['unit1_lic']) ? $info['unit1_lic'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:33%;">Expires <input name="unit1_expres" value="<?php echo isset($info['unit1_expres']) ? $info['unit1_expres'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:34%;">STATE <input name="unit1_state" value="<?php echo isset($info['unit1_state']) ? $info['unit1_state'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style="background:#000; font-weight:600; width:100%; height:7px; margin:0 5%;"></td>
			</tr>
		   </table>
		   
			
			<table width="100%" style="margin:10px 0 0 0;">
			<tr>
			<td style=" font-size:15px; font-weight:600; width:100%;">UNIT 2 <input name="unit2" value="<?php echo isset($info['unit2']) ? $info['unit2'] : "" ?>"  type="text" class="unit_fm" /></td>
			</tr>
			</table>
			
			 <table width="100%" style="margin:10px 0 0 0;">
			<tr>
			<td style=" font-size:15px; font-weight:600;">TYPE <input name="unit2_type" value="<?php echo isset($info['unit2_type']) ? $info['unit2_type'] : "" ?>"  type="text" class="unit_fm2" /></td>
			<td style=" font-size:15px; font-weight:600;">YEAR <input name="unit2_year" value="<?php echo isset($info['unit2_year']) ? $info['unit2_year'] : "" ?>"  type="text" class="unit_fm2" /></td>
			<td style=" font-size:15px; font-weight:600;">MAKE <input name="unit2_make" value="<?php echo isset($info['unit2_make']) ? $info['unit2_make'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		</table>

			<table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:50%;">MODEL <input name="unit2_model" value="<?php echo isset($info['unit2_model']) ? $info['unit2_model'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:50%;">VIN <input name="unit2_vin" value="<?php echo isset($info['unit2_vin']) ? $info['unit2_vin'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:33%;">Hours / Miles <input name="unit2_hoursimiles" value="<?php echo isset($info['unit2_hoursimiles']) ? $info['unit2_hoursimiles'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:33%;">COLOR <input name="unit2_color" value="<?php echo isset($info['unit2_color']) ? $info['unit2_color'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:34%;">ENGINE SERIAL # <input name="unit2_engine" value="<?php echo isset($info['unit2_engine']) ? $info['unit2_engine'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr> 
		   </table>


		  <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:100%; padding:0 0 0 30px;">ATTACHMENT <input name="unit2_attach" value="<?php echo isset($info['unit2_attach']) ? $info['unit2_attach'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:33%;">LICENSE PLATE# <input name="unit2_lic" value="<?php echo isset($info['unit2_lic']) ? $info['unit2_lic'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:33%;">Expires <input name="unit2_expres" value="<?php echo isset($info['unit2_expres']) ? $info['unit2_expres'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:34%;">STATE <input name="unit2_state"  value="<?php echo isset($info['unit2_state']) ? $info['unit2_state'] : "" ?>" type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style="background:#166F44; font-weight:600; width:100%; height:7px; margin:0 5%;"></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:-5px 0 0 0;">
			<tr style="background:#AFC3BC;">
			 <td style="font-size:16px; font-weight:600; width:100%;">PREVIOUS OWNER INFORMATION</td>
			</tr>
			</table>
			
			<table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:50%;">NAME <input name="owner_name" value="<?php echo isset($info['owner_name']) ? $info['owner_name'] : $info['first_name'].''.$info['last_name']; ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:50%;">ADDRESS <input name="owner_address" value="<?php echo isset($info['owner_address']) ? $info['owner_address'] : $info['address']; ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style=" font-size:15px; font-weight:600; width:33%;">CITY/ STATE/ ZIP. <input name="owner_city" value="<?php echo isset($info['owner_city']) ? $info['owner_city'] : $info['city'].','.$info['state'].','.$info['zip']; ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:33%;">MN <input name="owner_mn" type="text" value="<?php echo isset($info['owner_mn']) ? $info['owner_mn'] : "" ?>"  class="unit_fm2" /></td>
			   <td style=" font-size:15px; font-weight:600; width:34%;">PHONE <input name="owner_phone" value="<?php echo isset($info['owner_phone']) ? $info['owner_phone'] : $info['phone']; ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			 <tr>
			   <td style="background:#166F44; font-weight:600; width:100%; height:7px; margin:0 5%;"></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:-5px 0 0 0;">
			<tr style="background:#AFC3BC;">
			 <td style="font-size:16px; font-weight:600; width:100%;">BOOK VALUE</td>
			</tr>
		   </table>
			
		   <table width="49%" style="margin:10px 2% 0 0; background:#f1f1f1; float:left; ">
			 <tr>
			   <td style=" font-size:14px; font-weight:600; width:33%;">UNIT 1</td>
			   <td style=" font-size:14px; font-weight:600; width:33%;">NADA</td>
			   <td style=" font-size:14px; font-weight:600; width:34%;">CLYMER</td>
			</tr>
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">LOW BOOK</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; border-right:solid 2px #000; padding:5px 0;"><input name="low_book_nada" value="<?php echo isset($info['low_book_nada']) ? $info['low_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="low_book_clymer" value="<?php echo isset($info['low_book_clymer']) ? $info['low_book_clymer'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">HIGH BOOK</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; border-right:solid 2px #000; padding:5px 0;"><input name="high_book_nada" value="<?php echo isset($info['high_book_nada']) ? $info['high_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="high_book_clymer" type="text" value="<?php echo isset($info['high_book_clymer']) ? $info['high_book_clymer'] : "" ?>"  class="unit_fm2" /></td>
			</tr>
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">AVERAGE BOOK</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; border-right:solid 2px #000; padding:5px 0;"> <input name="average_book_nada" value="<?php echo isset($info['average_book_nada']) ? $info['average_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="average_book_clymer" value="<?php echo isset($info['average_book_clymer']) ? $info['average_book_clymer'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">RETAIL</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 5px #000; border-right:solid 2px #000; padding:5px 0;"><input name="retail_book_nada" value="<?php echo isset($info['retail_book_nada']) ? $info['retail_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 5px #000; padding:5px 0;"><input name="retail_book_clymer" value="<?php echo isset($info['retail_book_clymer']) ? $info['retail_book_clymer'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">AVG BOOKS</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; padding:5px 0;"><input name="avg_book_nada" value="<?php echo isset($info['avg_book_nada']) ? $info['avg_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="avg_book_clymer" value="<?php echo isset($info['avg_book_clymer']) ? $info['avg_book_clymer'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">NEW</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; padding:5px 0;"><input name="new_book_nada" value="<?php echo isset($info['new_book_nada']) ? $info['new_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="new_book_clymer" value="<?php echo isset($info['new_book_clymer']) ? $info['new_book_clymer'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">SELL</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; padding:5px 0;"><input name="sell_book_nada" value="<?php echo isset($info['sell_book_nada']) ? $info['sell_book_nada'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="sell_book_clymer" value="<?php echo isset($info['sell_book_clymer']) ? $info['sell_book_clymer'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="49%" style="margin:10px 0 0 0; background:#f1f1f1;">
			 <tr>
			   <td style=" font-size:14px; font-weight:600; width:33%;">UNIT 2</td>
			   <td style=" font-size:14px; font-weight:600; width:33%;">NADA</td>
			   <td style=" font-size:14px; font-weight:600; width:34%;">CLYMER</td>
			</tr>
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">LOW BOOK</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; border-right:solid 2px #000; padding:5px 0;"><input name="low_book_nada1" value="<?php echo isset($info['low_book_nada1']) ? $info['low_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="low_book_clymer1" type="text" value="<?php echo isset($info['low_book_clymer1']) ? $info['low_book_clymer1'] : "" ?>"  class="unit_fm2" /></td>
			</tr>
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">HIGH BOOK</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; border-right:solid 2px #000; padding:5px 0;"><input name="high_book_nada1" value="<?php echo isset($info['high_book_nada1']) ? $info['high_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="high_book_clymer1" value="<?php echo isset($info['high_book_clymer1']) ? $info['high_book_clymer1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">AVERAGE BOOK</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; border-right:solid 2px #000; padding:5px 0;"><input name="average_book_nada1" value="<?php echo isset($info['average_book_nada1']) ? $info['average_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="average_book_clymer1" value="<?php echo isset($info['average_book_clymer1']) ? $info['average_book_clymer1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">RETAIL</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 5px #000; border-right:solid 2px #000; padding:5px 0;"><input name="retail_book_nada1" value="<?php echo isset($info['retail_book_nada1']) ? $info['retail_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 5px #000; padding:5px 0;"><input name="retail_book_clymer1" type="text" value="<?php echo isset($info['retail_book_clymer1']) ? $info['retail_book_clymer1'] : "" ?>"  class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">AVG BOOKS</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; padding:5px 0;"><input name="avg_book_nada1" value="<?php echo isset($info['avg_book_nada1']) ? $info['avg_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="avg_book_clymer1" value="<?php echo isset($info['avg_book_clymer1']) ? $info['avg_book_clymer1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">NEW</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; padding:5px 0;"><input name="new_book_nada1" value="<?php echo isset($info['new_book_nada1']) ? $info['new_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="new_book_clymer1" value="<?php echo isset($info['new_book_clymer1']) ? $info['new_book_clymer1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			
			<tr>
			   <td style=" font-size:14px; font-weight:600; width:33%; padding:5px 0;">SELL</td>
			   <td style=" font-size:14px; font-weight:600; width:33%; border-bottom:solid 1px #000; padding:5px 0;"><input name="sell_book_nada1" value="<?php echo isset($info['sell_book_nada1']) ? $info['sell_book_nada1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			   <td style=" font-size:14px; font-weight:600; width:34%; border-bottom:solid 1px #000; padding:5px 0;"><input name="sell_book_clymer1" value="<?php echo isset($info['sell_book_clymer1']) ? $info['sell_book_clymer1'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
		   </table>
		   
		   <table width="100%" style="margin:10px 0 0 0; border:solid 3px #000;">
			<tr>
			<td style="font-size:16px; font-weight:600; background:#FF0000; border-right:solid 3px #000; padding:15px 15px; width:30%;">Manager Signature/ACV</td>
			<td style="font-size:16px; font-weight:600; width:70%;"></td>
			</tr>
			</table>
		   
		   <table width="100%" style="margin:10px 0 0 0;">
			<tr>
			<td style="font-size:16px; font-weight:600; width:100%;">COMMENTS <input name="comments" value="<?php echo isset($info['comments']) ? $info['comments'] : "" ?>"  type="text" class="unit_fm2" /></td>
			</tr>
			</table>			
			
			
			<table width="100%" style="margin:10px 0 0 0;">
			<tr>
			<td style="font-size:16px; font-weight:600; width:50%;">SALESPERSON  <input name="sperson_data" value="<?php echo isset($info['sperson_data']) ? $info['sperson_data'] : $info['sperson'] ?>"  type="text" class="unit_fm2" /></td>
			<td style="font-size:16px; font-weight:600; width:50%;">Date Taken In</td>
			</tr>
			</table>
		   
			<table style="border:solid 3px #000; width:100%;">
			
			<table width="59%" style="margin:10px 2% 0 0; float:left;">
			<tr>
			<td style="font-size:16px; font-weight:normal; width:100%; text-align:center;">WORK TO BE DONE</td>
			</tr>
			<tr>
			<td style="font-size:16px; font-weight:normal; width:100%; text-align:center; border-bottom:solid 1px #000; padding:15px 0;"></td>
			</tr>
			<tr>
			<td style="font-size:16px; font-weight:normal; width:100%; text-align:center; border-bottom:solid 1px #000; padding:15px 0;"></td>
			</tr>
			<tr>
			<td style="font-size:16px; font-weight:normal; width:100%; text-align:center; border-bottom:solid 1px #000; padding:15px 0;"></td>
			</tr>
			</table>
			
			<table width="39%" style="margin:10px 0 0 0;">
			<tr>
			<td style="font-size:16px; font-weight:normal; width:100%; text-align:center;">CHECK LIST</td>
			</tr>
			<tr>
			<td style="font-size:14px; font-weight:normal; width:100%; border-bottom:solid 1px #000; padding:5px 0;">KEY </td>
			</tr>
			<tr>
			<td style="font-size:14px; font-weight:normal; width:100%; border-bottom:solid 1px #000; padding:5px 0;">MANUAL </td>
			</tr>
			<tr>
			<td style="font-size:14px; font-weight:normal; width:100%; border-bottom:solid 1px #000; padding:5px 0;">TITLE/REG </td>
			</tr>
			<tr>
			<td style="font-size:14px; font-weight:normal; width:100%; border-bottom:solid 1px #000; padding:5px 0;">LIEN RELEASE</td>
			</tr>
			</table>
			
		   </table>
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>
</div>
