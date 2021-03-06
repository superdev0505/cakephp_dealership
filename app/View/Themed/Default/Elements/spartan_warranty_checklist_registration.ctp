<div class="page-break"></div>
	<div class="wraper header">
		<h2 style="float: left; width: 100%; margin: 3px; font-size: 17px; text-align: center;"><b>SPARTAN SETUP/DELIVERY CHECKLIST & WARRANTY REGISTRATION</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0; border: 1px solid #000; box-sizing: border-box; padding: 7px">
			<div class="form-field" style="float: left; width: 12%;">
				<label style="padding-left: 3px;">YEAR</label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 54%;">
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<label style="padding-left: 3px;">MODEL</label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label style="padding-left: 3px;">ENGINE</label>
				<input type="text" name="engine" value="<?php echo isset($info['engine'])?$info['engine']:''; ?>" style="width: 78%;">
			</div>
			<div class="form-field" style="float: left; width: 35%;">
				<label style="padding-left: 3px;">PIN</label>
				<input type="text" name="pin" value="<?php echo isset($info['pin'])?$info['pin']:''; ?>" style="width: 89%;">
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 2px solid #000;">
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text" name="dealer" value="<?php echo $dealer; ?>" style="width: 100%;">
				<label><b>Dealer</b></label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0 1%;">
				<input type="text" name="dealer_address" value="<?php echo $d_address; ?>" style="width: 100%;">
				<label><b>Dealer Street Address</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%; margin-right: 1%;">
				<input type="text" name="city" value="<?php echo $d_city; ?>" style="width: 100%;">
				<label><b>City</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<input type="text" name="state" value="<?php echo $d_state; ?>" style="width: 100%;">
				<label><b>State</b></label>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 2px 0; font-size: 16px;"><b>ASSEMBLY / SERVICE / INSPECTION</b></h2>
		<p style="float: left; width: 100%; margin: 0; font-size: 14px;"><b>Assemble according to the assembly manual and any technical bulletin information that applies to the particular model. It is mandatory that EVERY Spartan
mower to be properly inspected and serviced at the dealer prior to being released to the customer. The technician should use this itemized instruction.</b></p>
		
		<div class="row" style="float: left; width: 100%;margin: 0;">
			<div class="left" style="float: left; width: 47%">
				<ul>
					<li>VISUALLY INSPECT FOR SHIPPING DAMAGE ??? NOTIFY SHIPPING COMPANY AND SPARTAN IMMEDIATELY IF<br>DAMAGE EXISTS</li>
					<li>CHECK THAT THE BRAKES WORKS PROPERLY.</li>
					<li>BATTERY - Charge battery(s) to full capacity according to Service Manual. Check water level and fill if necessary. Make sure the cables are properly tightened to the battery terminals.</li>
					<li>CONTROLS-Check for proper operation</li>
					<li>TIRES-Check for proper pressure</li>
					<li>LUG NUTS - Torque to specification</li>
					<li>CHECK ENGINE OIL LEVEL</li>
					<li>CHECK PARKER HYDRAULIC FLUID LEVEL</li>
					<li>ENGINE COOLANT (if equipped) - Inspect level. Fill if necessary. Check electric fan for proper operation.</li>
					<li>ROPS ??? Install ROPS and seat belt on models that don???t come installed from the factory</li>
					<li>DISPLAY/METERS/INDICATORS - Check all functions</li>
					<li>NUTS AND BOLTS - Visually check for loose or missing fasteners and replace and/or tighten to proper torque specification if necessary.</li>
					<li>DECK OPERATION ??? Check that the deck works properly.</li>	
				</ul>
			</div>
			
			<div class="right" style="float: right; width: 47%">
				<ul>
					<li>BELTS ??? Check for proper Drive and Deck belt tension.</li>
					<li>SERVICE BULLETINS-Check unit status and perform all applicable bulletin updates.</li>
					<li>CLEAN- Prepare for display.</li>
					<li>TEST DRIVE-Check for proper assembly, control operation, and overall operation as specified for the unit.</li>
					<li>AFTER TEST DRIVE- Check for fuel, oil, and coolant leaks.</li>
					<li><b>I HAVE PERFORMED THE PREDELIVERY ADJUSTMENTS AS SPECIFIED IN THE ASSEMBLY MANUAL, SERVICE SPECIFICATIONS AND ANY TECHNICAL BULLETINS APPLYING TO THIS MODEL.</b></li>
					<li><b>I HAVE REVIEWED THE CUSTOMER CHECKLIST AND UNDERSTAND THE POINTS PRESENTED.</b></li>
					<li><b>I HAVE VIEWED THE SAFETY OPERATION VIDEO AND UNDERSTAND MY RESPONSIBILTY TOWARDS THE SAFETY OF THE OCCUPANTS OF THIS VEHICLE.</b></li>
					<li><b>I HAVE VISUALLY INSPECTED THE UNIT AND FOUND NO DEFECTS.</b></li>
				</ul>
			</div>
		</div>
			
		<div class="row" style="float: left; width: 100%; margin: 0; padding-bottom: 7px; border-bottom: 2px solid #000;">		
			<h2 style="float: left; width: 30%; font-size: 18px; margin: 0;"><b>PREDEILERY INSPECTION BY:</b></h2>
			<div class="form-field" style="float: left; width: 25%;">
				<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$sales_person_name:''; ?>" style="width: 100%;">
				<label style="font-size: 12px;"><b>Dealer Representative Name</b></label>
			</div>
			<div class="form-field" style="float: left; width: 25%; margin: 0 1%;">
				<input type="text" name="sign" value="<?php echo isset($info['sign'])?$info['sign']:''; ?>" style="width: 100%;">
				<label style="font-size: 12px;"><b>Signature</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
				<label style="font-size: 12px;"><b>Inspection Date</b></label>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 2px 0; font-size: 16px;"><b>DELIVERY TO CUSTOMER</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="left" style="float: left; width: 47%">
				<li>EXPLAIN FEATURES & CONTROLS TO CUSTOMER</li>
				<li>TEST DRIVE ??? Show the proper way to operate the mower</li>
				<li>EXPLAIN THE IMPORTANCE OF ROPS AND SEAT BELT</li>
				<li>EXPLAIN WARRANTY TO CUSTOMER</li>
				<li>REVIEW SAFETY DECALS AND FEATURES</li>
			</div>
			
			<div class="right" style="float: right; width: 47%">
				<ul>					
					<li>OWNERS MANUAL ??? Explain the importance of reading for customer safety and service of vehicle. Explain periodic maintenance responsibilities</li>
					<li>REVIEW PROCEDURES AND LIMITATIONS</li>
					<li>BATTERY-Charge battery(s) to full capacity according to Service Manual. Check water level and fill if necessary.</li>
				</ul>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0; border-bottom: 2px solid #000; padding-bottom: 7px;">	
			<h2 style="float: left; width: 18%; font-size: 18px; margin: 0;"><b>COMPLETED BY:</b></h2>
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text" name="salesperson" value="<?php echo isset($info['salesperson']) ? $info['salesperson'] : $info['sperson']; ?>" style="width: 100%;">
				<label style="font-size: 12px;"><b>Dealer Representative Name</b></label>
			</div>
			<div class="form-field" style="float: left; width: 32%; margin: 0 1%;">
				<input type="text" name="dealer_sign" value="<?php echo isset($info['dealer_sign'])?$info['dealer_sign']:''; ?>" style="width: 100%;">
				<label style="font-size: 12px;"><b>Dealer Representative Signature</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
				<label style="font-size: 12px;"><b>Date</b></label>
			</div>
		</div>
		
		<h2 style="float: left; width: 100%; text-align: center; margin: 2px 0; font-size: 18px;"><b>CUSTOMER ACCEPTANCE AND WARRANTY REGISTRATION</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<ul>
				<li>I have reviewed and understand the warranty policies.</li>
				<li>I have inspected the mower and it meets my satisfaction.</li>
				<li>I understand the importance of reading and following the Owner???s Manual.</li>
				<li>I understand the importance of using and following all Safety Features outlined in the Owner???s Manual.</li>
				<li>I understand the importance of all operators following the operating procedures outlined in the owner???s manual.</li>
				<li>I understand the importance of performing a pre-drive inspection as outlined in the owner???s manual before EVERY operation.</li>
			</ul>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 10px;">
			<div class="form-field" style="float: left; width: 30%;">
				<input type="text" name="buyer" value="<?php echo isset($info['buyer']) ? $info['buyer'] : $info['first_name']." ".$info['last_name'] ?>" style="width: 100%;">
				<label><b>Buyers Name</b></label>
			</div>
			<div class="form-field" style="float: left; width: 30%; margin: 0 1%;">
				<input type="text" name="customer_sign" value="<?php echo isset($info['customer_sign'])?$info['customer_sign']:''; ?>" style="width: 100%;">
				<label><b>CUSTOMER ACCEPTANCE Signature</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%; margin-right: 1%;">
				<input type="text" name="date" value="<?php echo date('m/d/Y'); ?>" style="width: 100%;">
				<label><b>PURCHASE DATE</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%;">
				<input type="text" name="mobile" value="<?php echo isset($info['mobile'])?$info['mobile']:''; ?>" style="width: 100%;">
				<label><b>Contact Number</b></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 0 0 10px;">
			<div class="form-field" style="float: left; width: 40%;">
				<input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" style="width: 100%;">
				<label><b>Buyers Street Address</b></label>
			</div>
			<div class="form-field" style="float: left; width: 28%; margin: 0 1%;">
				<input type="text" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" style="width: 100%;">
				<label><b>City</b></label>
			</div>
			<div class="form-field" style="float: left; width: 18%; margin-right: 1%;">
				<input type="text" name="state" value="<?php echo isset($info['state'])?$info['state']:''; ?>" style="width: 100%;">
				<label><b>State</b></label>
			</div>
			<div class="form-field" style="float: left; width: 10%;">
				<input type="text" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" style="width: 100%;">
				<label><b>Zip</b></label>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%;">
			<div class="from-field" style="float: left; width: 100%;">
				<label style="font-size: 16px; margin-left: 12px;">Email Address:</label>
				<input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" style="width: 87%;">
			</div>
		</div>
		
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
	<br/>
	