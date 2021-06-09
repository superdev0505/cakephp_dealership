<div class="page-break"></div>
	<div class="wraper header">
		<div class="logo" style="width: 250px; margin: 0 auto;">
			<?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/logo11.jpg'); ?>
		</div>
		<div class="row" style="float: left; width: 100%; margin: 16px 0 0;">
			<ul>
				<li>1025 Harcourt Road Suite 400</li>
				<li>Mount Vernon, OH 43050</li>
				<li>(740) 392-3633</li>
				<li style="border: 0px;">Fax (740) 393-2539</li>
				<li>200 West Monroe Street</li>
				<li>Zanesville, OH 43701</li>
				<li>(740) 454-1289</li>
				<li style="border: 0px;">Fax (740) 454-6498</li> <br>
				<li>39737 Marietta Road</li>
				<li>Caldwell, OH 43724</li>
				<li>(740) 783-2450</li>
				<li style="border: 0px;">Fax (740) 783-4059</li>
			</ul>
		</div>
		
		<h2 style="float: left; width: 100%; font-size: 16px; margin: 10px 0 0; text-decoration: underline; text-align: center;"><b>BALERS</b></h2>
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 0					;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Category:</b></label>
				<input type="text" name="category" value="<?php echo isset($info['category']) ? $info['category'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Year:</b></label>
				<input type="text" name="year" value="<?php echo isset($info['year']) ? $info['year'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Manufacturer:</b></label>
				<input type="text" name="manufacturer" value="<?php echo isset($info['manufacturer']) ? $info['manufacturer'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Serial #:</b></label>
				<input type="text" name="vin" value="<?php echo isset($info['vin']) ? $info['vin'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Model:</b></label>
				<input type="text" name="model" value="<?php echo isset($info['model']) ? $info['model'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Stock #:</b></label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num']) ? $info['stock_num'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 50px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Hours:</b></label>
				<input type="text" name="hours" value="<?php echo isset($info['hours']) ? $info['hours'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Surface Wrap:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="surface_status" value="Yes" <?php echo ($info['surface_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="surface_status" value="No" <?php echo ($info['surface_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Number of Bales:</b></label>
				<input type="text" name="bales_num" value="<?php echo isset($info['bales_num']) ? $info['bales_num'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Monitor:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="monitor_status" value="Yes" <?php echo ($info['monitor_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="monitor_status" value="No" <?php echo ($info['monitor_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Bale Size (pounds):</b></label>
				<input type="text" name="bale_size" value="<?php echo isset($info['bale_size']) ? $info['bale_size'] : ''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>PTO:</b></label>
				<input type="text" name="pto" value="<?php echo isset($info['pto']) ? $info['pto'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Auto Tie:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="auto_status" value="Yes" <?php echo ($info['auto_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="auto_status" value="No" <?php echo ($info['auto_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Length (inches only):</b></label>
				<input type="text" name="length" value="<?php echo isset($info['length']) ? $info['length'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Auto Wrap:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="wrap_status" value="Yes" <?php echo ($info['wrap_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="wrap_status" value="No" <?php echo ($info['wrap_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Width (inches only):</b></label>
				<input type="text" name="width" value="<?php echo isset($info['width']) ? $info['width'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Bale Kicker:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="bale_status" value="Yes" <?php echo ($info['bale_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="bale_status" value="No" <?php echo ($info['bale_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Height (inches only):</b></label>
				<input type="text" name="height" value="<?php echo isset($info['height']) ? $info['height'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Twine:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="twine_status" value="Yes" <?php echo ($info['twine_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="twine_status" value="No" <?php echo ($info['twine_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Weight (pounds only):</b></label>
				<input type="text" name="weight" value="<?php echo isset($info['weight']) ? $info['weight'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Retail Price:</b></label>
				<input type="text" name="retail_price" value="<?php echo isset($info['retail_price']) ? $info['retail_price'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Equipment Status:</b></label>
				<input type="text" name="equip_status" value="<?php echo isset($info['equip_status']) ? $info['equip_status'] : ''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Pictures Taken:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="picture_status" value="Yes" <?php echo ($info['picture_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="picture_status" value="No" <?php echo ($info['picture_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 16px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b style="vertical-align: top;">Description:</b></label>
				<textarea id="description" name="description" style="width: 80%; height: 100px; border: 0;"><?php echo isset($info['description'])?$info['description']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b style="vertical-align: top;">Notes:</b></label>
				<textarea id="note" name="note" style="width: 80%; height: 100px; border: 0;"><?php echo isset($info['note'])?$info['note']:'' ?></textarea>
			</div>
		</div>
		
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
	<br/>
