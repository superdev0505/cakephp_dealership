
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
$expectedt = date('Y-m-d H:i:s');
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
	<div id="worksheet_container" style="width:94%; margin:0 auto;">
	<style>
		
		body{ margin:0 auto; padding:0;  font-size:13px;}
		.norsask_farm{ width:60%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		.norsask_farm2{ width:100%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		.norsask_farm3{ width:70%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		.norsask_farm4{ width:46%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		.norsask_farm5{ width:24%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		.norsask_farm6{ width:95%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		.norsask_farm7{ width:10%; border-bottom:solid 1px #000; border-right:none; border-left:none; border-top:none; color:#000; font-size:14px; margin:1px 0;}
		input[type="text"]{border-bottom: 1px solid #000;}
		.second-page input[type="text"]{border: none; border-bottom: 1px solid #000;}
		.wraper.main input{padding: 1px; }
		.display tbody{width: 100%; display: block;}

		@media print { 
		.wraper.main input {padding: 0px !important; margin: 0px !important;}
		.display{display: block !important;}
		}
		
		
		</style>

		<div class="wraper header"> 
			<div class="row">
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:20%;"> 
			    <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/image_head.png'); ?>" alt=""></td>
			    <td style="width:60%; text-align:center;"> 
			    <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/middle-img.png'); ?>" alt="">
			    </td>
			    <td style="width:20%;"> 
			     <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/head_img2.png'); ?>" alt=""></td>
			  </tr>
			</table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td style="width:100%; font-size:20px; text-align:center; font-weight:600; padding-top:10px;"> CONSIGNMENT AGREEMENT </td>
			  </tr>
			</table>

			<table border="0" cellspacing="0" cellpadding="0" style="width: 90%; margin: 0 auto;">
			  <tr>
			    <td style="width: 100%; font-size: 14px; padding-top: 7px; padding-left: 2px;">This Consignment Agreement (the "Agreement") is made and effective as of <input name="Agreement" value="<?php echo isset($info['Agreement']) ? $info['Agreement'] : ''; ?>"   type="text" class="norsask_farm5" style="width: 22%"> <br> 20  <input name="yeardata" value="<?php echo isset($info['yeardata']) ? $info['yeardata'] : ''; ?>"   type="text" class="norsask_farm5" style="width: 7%;">
			    </td>
			  </tr>
			</table>

			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:15%; font-size:14px; font-weight:600; padding-top:16px; padding-left:2px; vertical-align:top;">  BETWEEN </td>
			    <td style="width:85%; font-size:14px; padding-top:20px; padding-left:15px; vertical-align:top; ">
			     
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			     <tr>
			    <td style="width: 100%; font-size: 14px; padding-top: 0; padding-left: 2px; line-height: 16px; vertical-align: top; padding-bottom: 0px;">  <strong>Norsask Farm Equipment Ltd.</strong>  ( the "Principal"), a corporation organized and existing under the laws of North Battleford of Saskatchewan, with its head office located at. </td>
			   </tr>
			   </table>
			   
			   <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			     <tr>
			    <td style="width: 100%; font-size: 14px; padding-top: 7px; padding-left: 2px; line-height: 16px; vertical-align: top;">  Highway 16 East & East Hill Road . ( PO Box 49 )  <br> North Battleford SK S9A 2X6 </td>   
			    </tr>
			   </table>
			    
			      </td>
			  </tr>
			</table>


			  <table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:15%; font-size:14px; font-weight:600; padding-top:16px; padding-left:2px; vertical-align:top;"> AND </td>
			    <td style="width:85%; font-size:14px; padding-top: 7px; padding-left:2px; vertical-align:top; ">
			     
			     <table width="100%" border="0" cellspacing="0" cellpadding="0">
			     <tr>
			    <td style="width:100%; font-size:14px; padding-top: 0px; padding-left:2px; line-height:16px; vertical-align:top; padding-bottom:0px;">  <input name="Consignee" value="<?php echo isset($info['Consignee']) ? $info['Consignee'] : ''; ?>"   type="text" class="norsask_farm5">  ( the " Consignee "), the individule under the laws of  <br> <input name="province" value="<?php echo isset($info['province']) ? $info['province'] : ''; ?>"   type="text" class="norsask_farm5">  in the province of <input name="Residing" value="<?php echo isset($info['Residing']) ? $info['Residing'] : ''; ?>"   type="text" class="norsask_farm5"> Residing at: </td>
			   </tr>
			   </table>
			   
			   <table width="100%" border="0" cellspacing="0" cellpadding="0">
			     <tr>
			    <td style="width:100%; font-size:14px; padding-top:3px; padding-left:2px; line-height:16px; vertical-align:top;">  <input name="ResidingAddress1" value="<?php echo isset($info['ResidingAddress1']) ? $info['ResidingAddress1'] : ''; ?>"   type="text" class="norsask_farm"style="width: 46%;">  </td>   
			    </tr>
			   </table>
			   
			    <table width="100%" border="0" cellspacing="0" cellpadding="0">
			     <tr>
			    <td style="width:100%; font-size:14px; padding-top:3px; padding-left:2px; line-height:16px; vertical-align:top;">  <input name="ResidingAddress2" value="<?php echo isset($info['ResidingAddress2']) ? $info['ResidingAddress2'] : ''; ?>"   type="text" class="norsask_farm" style="width: 46%;">  </td>   
			    </tr>
			   </table>
			    
			      </td>
			  </tr>
			</table>
			 
			 

			  <table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; font-weight:600; padding-left:2px; line-height:16px;">  In consideration of the terms and convenants of this agreement, and other valuable consideration the  parties agree as follows: </td>
			  </tr>
			</table> 

			   <table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:16px;">  1. There will be no charge to the Consigee for Norsask Farm Equipment Ltd. to adverties The below mentioned <br> vehicle or equipment.</td>
			  </tr>
			</table> 

			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:16px;">  2. The minimum advertised time by the principle will be 60 days or Unit Sold .</td>
			  </tr>
			</table> 

			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:16px;">  3. All reconditioning will be discussed prior to work commencing and all costs attached there to will be the responsibility of the Consignee. Repairs agreed to at the time of consignment  are listed below. Refer to <i>"Repairs , clean up maintenance or requied work to be Completed.</i></td>
			  </tr>
			</table> 


			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:16px;">  4. If applicable, the lineholder will be listed alongside the Consignee as a payee on the proceeds froms the purchase .</td>
			  </tr>
			  
			   <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:14px;"> Lien amount:$ <input name="LienAmount" value="<?php echo isset($info['LienAmount']) ? $info['LienAmount'] : ''; ?>"   type="text" class="norsask_farm5"></td>
			  </tr>
			  
			   <tr>
			    <td style="width:100%; font-size:14px; padding-top:0px; padding-left:2px; line-height:14px;">Lienholder information <input name="Lienholder" value="<?php echo isset($info['Lienholder']) ? $info['Lienholder'] : ''; ?>"   type="text" class="norsask_farm" style="width: 75%;"></td>
			  </tr>
			</table> 

			
			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:18px;"> Account/Loan number:$ <input name="Account" value="<?php echo isset($info['Account']) ? $info['Account'] : ''; ?>"   type="text" class="norsask_farm5" style="width: 74%;"></td>
			  </tr>
			  
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top: 7px; padding-left:2px; line-height:16px;">  5. The lowest agreed upon selling price Norsask Farm Equipment Ltd. will sell this vehicle/equipment for is $ <input name="Norsask" value="<?php echo isset($info['Norsask']) ? $info['Norsask'] : ''; ?>"   type="text" class="norsask_farm5"> The preferred listed Price by the Consignee is $ <input name="Price" value="<?php echo isset($info['Price']) ? $info['Price'] : ''; ?>"   type="text" class="norsask_farm5"> or fair market Value as approved by Norsask farm Equipment Ltd.</td>
			  </tr>
			 
			</table> 


			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:16px;">  6. Norsask Farm Equipment Ltd. does not assume any liabilities or warranties on the equipment or vehicle sold to the new purchaser.</td>
			  </tr>
			</table>

			<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 0 auto;">
			  <tr>
			    <td style="width:100%; font-size:14px; padding-top:7px; padding-left:2px; line-height:16px;"> 7. Norsask Farm Equipment Ltd. receives a flat rate of 5%from the total proceeds of the sale</td>
			  </tr>
			</table> 

			  <table class="display" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px; display: none; width: 100%;">
			  <tr style="width: 100%; display: block;">
			    <td style="width:100%; font-size:26px; font-weight:600; padding-top:7px; text-align:center; border-bottom:solid 2px #900; display: block;">" Building for the Future "</td>
			  </tr>
			</table> 
			 
			 
			  <table class="display" width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:20px; padding-bottom:15px; display: none; width: 100%;">
			  <tr >
			    <td style="width:20%;"> 
			    <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bootam-side.png'); ?>" alt="">
			   </td>
			    <td style="width:60%; text-align:center;"> 
			     <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/Husqvarna-logo.jpg'); ?>" style="height:62px;"  alt="">
			    </td>
			    <td style="width:20%;"> 
			     <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bootam_right.png'); ?>" alt="">
			    </td>
			  </tr>
			</table>	
			
 
			</div>
			
			<div class="second-page" style="float: left; width: 100%; ">
				<table class="display" width="100%" border="0" cellspacing="0" cellpadding="0" style="display: none;">
				  <tr>
					<td style="width:20%;"> 
					<img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/image_head.png'); ?>" alt=""></td>
					<td style="width:60%; text-align:center;"> 
					<img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/middle-img.png'); ?>" alt="">
					</td>
					<td style="width:20%;"> 
					 <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/head_img2.png'); ?>" alt=""></td>
				  </tr>
				</table>	
			
				<div class="second-page-content" style="width: 90%; margin: 0 auto;">
					<p style="float: left; width: 100%; text-decoration: underline; font-size:16px; margin: 22px 0 3px;">VEHICLE OR EQUIPMENT INFORMATION</p>
					<p style="float: left; width: 100%; margin: 18px 0 16px; font-size: 15px;">Unit# 1:</p>
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Serial Number:</label>
							<input type="text" name="serial_number" value="<?php echo isset($info['serial_number'])?$info['serial_number']:''; ?>" style="width: 50%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Year/Make/Model:</label>
							<input type="text" name="year_make_model" value="<?php echo isset($info['year_make_model'])?$info['year_make_model']:''; ?>" style="width: 46%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Hours/Mileage:</label>
							<input type="text" name="hours_mileage" value="<?php echo isset($info['hours_mileage'])?$info['hours_mileage']:''; ?>"  style="width: 50%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Warranty Status:</label>
							<input type="text" name="warranty_status" value="<?php echo isset($info['warranty_status'])?$info['warranty_status']:''; ?>" style="width: 50%;">
						</div>
					</div>
					
					<p style="float: left; width: 100%; margin: 12px 0 10px; font-size: 15px;">Unit# 2:</p>
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Serial Number:</label>
							<input type="text" name="serial_number2" value="<?php echo isset($info['serial_number2'])?$info['serial_number2']:''; ?>" style="width: 50%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Year/Make/Model:</label>
							<input type="text" name="year_make_model2" value="<?php echo isset($info['year_make_model2'])?$info['year_make_model2']:''; ?>" style="width: 46%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Hours/Mileage:</label>
							<input type="text" name="hours_mileage2" value="<?php echo isset($info['hours_mileage2'])?$info['hours_mileage2']:''; ?>" style="width: 50%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Warranty Status:</label>
							<input type="text" name="warranty_status2" value="<?php echo isset($info['warranty_status2'])?$info['warranty_status2']:''; ?>" style="width: 50%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 100%">
							<label style="margin: 22px 0 15px; display: block; ">Repairs, clean-up, maintenance or required work to be completed prior to selling:</label>
							<textarea name="repair_notes" style="width:100%;" rows="5"><?php echo isset($info['repair_notes'])?$info['repair_notes']:''; ?></textarea>
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 32%">
							<label style="font-size: 16px;">Dated this</label>
							<input type="text" name="submit_date" value="<?php echo isset($info['submit_date'])?$info['submit_date']:''; ?>" style="width: 38%;">
						</div>
						<div class="form-field" style="float: left; width: 48%">
							<label style="font-size: 16px;">day of</label>
							<input type="text" name="submit_month" value="<?php echo isset($info['submit_month'])?$info['submit_month']:''; ?>" style="width: 70%;">,
						</div>
						<div class="form-field" style="float: left; width: 18%">
							<label style="font-size: 16px;">20</label>
							<input type="text" name="submit_year" value="<?php echo isset($info['submit_year'])?$info['submit_year']:''; ?>" style="width: 40%;">.
						</div>
					</div>
					
					<p style="margin: 10px 0 6px 0; float: left; width: 100%;"><label>Name of Principal: </label> <span style="text-decoration: underline; font-size: 14px;">Norsask Farm Equipment Ltd.</span></p>
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>By:</label>
							<input type="text" name="submit_by" value="<?php echo isset($info['submit_by'])?$info['submit_by']:''; ?>" style="width: 87%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Witness:</label>
							<input type="text" name="witness" value="<?php echo isset($info['witness'])?$info['witness']:''; ?>" style="width: 77%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Name:</label>
							<input type="text" name="c_name1" value="<?php echo isset($info['c_name1'])?$info['c_name1']:''; ?>" style="width: 80%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Name:</label>
							<input type="text" name="c_name2" value="<?php echo isset($info['c_name2'])?$info['c_name2']:''; ?>" style="width: 80%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0 26px;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Title:</label>
							<input type="text" name="n_title" value="<?php echo isset($info['n_title'])?$info['n_title']:''; ?>" style="width: 83%;">
						</div>
					</div>
					
					
					<p style="margin: 12px 0 10px 0; float: left; width: 100%;">
						<label>Name of Consigee: </label>
						<input type="text" name="consignee_name" value="<?php echo isset($info['consignee_name'])?$info['consignee_name']:''; ?>" style="width: 42%;">
					</p>
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>By:</label>
							<input type="text" name="consignee_by" value="<?php echo isset($info['consignee_by'])?$info['consignee_by']:''; ?>" style="width: 87%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Witness:</label>
							<input type="text" name="co_witness" value="<?php echo isset($info['co_witness'])?$info['co_witness']:''; ?>" style="width: 77%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Name:</label>
							<input type="text" name="c_name3" value="<?php echo isset($info['c_name3'])?$info['c_name3']:''; ?>" style="width: 80%;">
						</div>
						<div class="form-field" style="float: right; width: 48%">
							<label>Name:</label>
							<input type="text" name="c_name4" value="<?php echo isset($info['c_name4'])?$info['c_name4']:''; ?>" style="width: 80%;">
						</div>
					</div>
					
					<div class="row" style="float: left; width: 100%; margin: 4px 0;">
						<div class="form-field" style="float: left; width: 48%">
							<label>Title:</label>
							<input type="text" name="c_title3" value="<?php echo isset($info['c_title3'])?$info['c_title3']:''; ?>" style="width: 83%;">
						</div>
					</div>
				</div>
			</div>
			
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px;">
			  <tr>
			    <td style="width:100%; font-size:26px; font-weight:600; padding-top:7px; text-align:center; border-bottom:solid 2px #900;">" Building for the Future "</td>
			  </tr>
			</table> 	
				
				
			 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:2px; padding-bottom:15px;">
			  <tr>
			    <td style="width:20%;"> 
			    <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bootam-side.png'); ?>" alt="">
			   </td>
			    <td style="width:60%; text-align:center;"> 
			     <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/Husqvarna-logo.jpg'); ?>" style="height:62px;" alt="">
			    </td>
			    <td style="width:20%;"> 
			     <img  class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/bootam_right.png'); ?>" alt="">
			    </td>
			  </tr>
			</table>	
				
				
		</div>
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
