
	<div class="wraper header">
		<div class="logo" style="width: 250px; margin: 0 auto;">
			
			 <?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/logo11.jpg'); ?>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 10px 0 0;">
			<ul>
				<li>1025 Harcourt Rd. STE 400</li>
				<li>Mount Vernon, OH 43050</li>
				<li>(740) 392-3633</li>
				<li style="border: 0px;">Fax (740) 393-2539</li>
				<li>200 W. Monroe St.</li>
				<li>Zanesville, OH 43701</li>
				<li>(740) 454-1289</li>
				<li style="border: 0px;">Fax (740) 454-6498</li>
			</ul>
		</div>
		
		<h2 style="width: 100%; float: left; text-align: center; margin: 10px 0; font-size: 18px;"><b>Deal Check List</b></h2>
		<div class="row" style="float: left; width: 100%; margin: 0;">
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "purchase") ? "checked" : ""; ?> value="purchase"/> Signed Purchase Order</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "contract") ? "checked" : ""; ?> value="contract"/> 3 Copies of Signed Contract</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "check") ? "checked" : ""; ?> value="check"/> Signed Check and Copy of Check</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "warranty") ? "checked" : ""; ?> value="warranty"/> Signed Warranty Paperwork</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "license") ? "checked" : ""; ?> value="license"/> Copy of Driver’s License</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "tax") ? "checked" : ""; ?> value="tax"/> Tax exempt card</span> 
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "protection") ? "checked" : ""; ?> value="protection"/> Purchase Protection Plan Offered</span>
				<span style="float: left; width: 100%; padding-left: 3%">o	Acceptance/Declination Form Signed</span>
			</div>
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "pin") ? "checked" : ""; ?> value="pin"/> PINS Used:</span>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin1" value="<?php echo isset($info['pin1'])?$info['pin1']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt1" value="<?php echo isset($info['amt1'])?$info['amt1']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin2" value="<?php echo isset($info['pin2'])?$info['pin2']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt2" value="<?php echo isset($info['amt2'])?$info['amt2']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin3" value="<?php echo isset($info['pin3'])?$info['pin3']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt3" value="<?php echo isset($info['amt3'])?$info['amt3']:''; ?>" style="width: 80%;">
					</div>
				</div>
				<div class="row" style="float: left; width: 100%; margin: 7px 0;">
					<div class="form-field" style="float: left; width: 30%; padding-left: 7%;">
						<label>PIN#</label>
						<input type="text" name="pin4" value="<?php echo isset($info['pin4'])?$info['pin4']:''; ?>" style="width: 78%;">
					</div>
					<div class="form-field" style="float: left; width: 30%; margin-left: 2%;">
						<label>Amt/%</label>
						<input type="text" name="amt4" value="<?php echo isset($info['amt4'])?$info['amt4']:''; ?>" style="width: 80%;">
					</div>
				</div>
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<span><input type="checkbox" name="deal_check" <?php echo ($info['deal_check'] == "trade") ? "checked" : ""; ?> value="trade"/> All trade information</span>
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Year, Make, Model </label>
				<input type="text" name="vehicle_info" value="<?php echo isset($info['vehicle_info'])?$info['vehicle_info']:$info['year']." ".$info['make']." ".$info['model']; ?>" style="width: 55%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Serial Number</label>
				<input type="text" name="serial_number" value="<?php echo isset($info['serial_number']) ? $info['serial_number'] : ''; ?>" style="width: 58%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Hours </label>
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 64%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Horsepower, Drive </label>
				<input type="text" name="horsepower" value="<?php echo isset($info['horsepower']) ? $info['horsepower'] : ''; ?>" style="width: 54.5%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Actual Cash Value of Trade </label>
				<input type="text" name="cash" value="<?php echo isset($info['cash']) ? $info['cash'] : ''; ?>" style="width: 48%;">
			</div>
			
			<div class="form-field" style="width: 100%; margin: 0; float: left; margin: 10px 0;">
				<label style="float: left; display: block; padding-left: 7%;">o	Payoff Information </label>
				<input type="text" name="payoff1" value="<?php echo isset($info['payoff1']) ? $info['payoff1'] : ''; ?>" style="width: 54.5%;">
				<input type="text" name="payoff2" class="payoff" value="<?php echo isset($info['payoff2']) ? $info['payoff2'] : ''; ?>" style="width: 68.5%; margin: 16px 0 0 0; margin-left: 80px;">
			</div>
			
			
		</div>
		
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
	<br/>
