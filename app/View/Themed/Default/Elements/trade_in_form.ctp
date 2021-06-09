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
		
		<div class="row" style="float: left; width: 100%; margin: 30px 0 0					;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Category:</b></label>
				<input type="text" name="category" value="<?php echo isset($info['category'])?$info['category']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Year:</b></label>
				<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Manufacturer:</b></label>
				<input type="text" name="manufacture" value="<?php echo isset($info['manufacture'])?$info['manufacture']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Serial #:</b></label>
				<input type="text" name="serial_num" value="<?php echo isset($info['serial_num'])?$info['serial_num']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Model:</b></label>
				<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Stock #:</b></label>
				<input type="text" name="stock_num" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 50px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Hours:</b></label>
				<input type="text" name="hours" value="<?php echo isset($info['hours'])?$info['hours']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Conditions:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="condition" value="New" <?php echo ($info['condition'] == "New") ? "checked" : ""; ?> /> NEW/ <input type="checkbox" name="condition" value="Used" <?php echo ($info['condition'] == "Used") ? "checked" : ""; ?> /> USED</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Horsepower:</b></label>
				<input type="text" name="horsepower" value="<?php echo isset($info['horsepower'])?$info['horsepower']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Salvaged:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="salva_status" value="Yes" <?php echo ($info['salva_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="salva_status" value="No" <?php echo ($info['salva_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Drive:</b></label>
				<input type="text" name="drive" value="<?php echo isset($info['drive'])?$info['drive']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Radio:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="radio_status" value="Yes" <?php echo ($info['radio_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="radio_status" value="No" <?php echo ($info['radio_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Forward Speed:</b></label>
				<input type="text" name="forward" value="<?php echo isset($info['forward'])?$info['forward']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Air:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="air_status" value="Yes" <?php echo ($info['air_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="air_status" value="No" <?php echo ($info['air_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Reverse Speed:</b></label>
				<input type="text" name="reverse" value="<?php echo isset($info['reverse'])?$info['reverse']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Heat:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="heat_status" value="Yes" <?php echo ($info['heat_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="heat_status" value="No" <?php echo ($info['heat_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Loader:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="loader_status" value="Yes" <?php echo ($info['loader_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="loader_status" value="No" <?php echo ($info['loader_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>ROPS:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="rops_status" value="Yes" <?php echo ($info['rops_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="rops_status" value="No" <?php echo ($info['rops_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Loader Make:</b></label>
				<input type="text" name="loader_make" value="<?php echo isset($info['loader_make'])?$info['loader_make']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Three Point Hitch:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="hitch_status" value="Yes" <?php echo ($info['hitch_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="hitch_status" value="No" <?php echo ($info['hitch_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Loader Model:</b></label>
				<input type="text" name="loader_model" value="<?php echo isset($info['loader_model'])?$info['loader_model']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Differential Lock:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="lock_status" value="Yes" <?php echo ($info['lock_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="lock_status" value="No" <?php echo ($info['lock_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Backhoe:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="backhoe_status" value="Yes" <?php echo ($info['backhoe_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="backhoe_status" value="No" <?php echo ($info['backhoe_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Quick Hitch:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="quick_status" value="Yes" <?php echo ($info['quick_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="quick_status" value="No" <?php echo ($info['quick_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Backhoe Make:</b></label>
				<input type="text" name="backhoe_make" value="<?php echo isset($info['backhoe_make'])?$info['backhoe_make']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Transmission Type:</b></label>
				<input type="text" name="trans_type" value="<?php echo isset($info['trans_type'])?$info['trans_type']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Tires or Tracks:</b></label>
				<input type="text" name="tires_track" value="<?php echo isset($info['tires_track'])?$info['tires_track']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Front Weights:</b></label>
				<input type="text" name="front_weight" value="<?php echo isset($info['front_weight'])?$info['front_weight']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Track Size:</b></label>
				<input type="text" name="track_size" value="<?php echo isset($info['track_size'])?$info['track_size']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Rear Weights:</b></label>
				<input type="text" name="rear_weight" value="<?php echo isset($info['rear_weight'])?$info['rear_weight']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Track % Remaining:</b></label>
				<input type="text" name="remain" value="<?php echo isset($info['remain'])?$info['remain']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>PTO:</b></label>
				<input type="text" name="pto" value="<?php echo isset($info['pto'])?$info['pto']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Front Tire Type:</b></label>
				<input type="text" name="tire_type" value="<?php echo isset($info['tire_type'])?$info['tire_type']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Remote Hydraulics:</b></label>
				<input type="text" name="remote_hydra" value="<?php echo isset($info['remote_hydra'])?$info['remote_hydra']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Front Tire Size:</b></label>
				<input type="text" name="tire_size" value="<?php echo isset($info['tire_size'])?$info['tire_size']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Front Fenders:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="fender_status" value="Yes" <?php echo ($info['fender_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="fender_status" value="No" <?php echo ($info['fender_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Rear Tire Type::</b></label>
				<input type="text" name="rear_type" value="<?php echo isset($info['rear_type'])?$info['rear_type']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Ground Radar:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="ground_status" value="Yes" <?php echo ($info['ground_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="ground_status" value="No" <?php echo ($info['ground_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Rear Tire Size:</b></label>
				<input type="text" name="rear_size" value="<?php echo isset($info['rear_size'])?$info['rear_size']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>GPS:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="gps_status" value="Yes" <?php echo ($info['gps_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="gps_status" value="No" <?php echo ($info['gps_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Rear Tire % Remaining:</b></label>
				<input type="text" name="rear_remain" value="<?php echo isset($info['rear_remain'])?$info['rear_remain']:''; ?>" style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Warranty:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="warranty_status" value="Yes" <?php echo ($info['warranty_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="warranty_status" value="No" <?php echo ($info['warranty_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Canopy:</b></label>
				<input type="text" name="canopy" value="<?php echo isset($info['canopy'])?$info['canopy']:''; ?>"  style="width: 60%;">
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Warranty Exp. Date:</b></label>
				<input type="text" name="warranty_exp" value="<?php echo isset($info['warranty_exp'])?$info['warranty_exp']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Cab:</b></label>
				<span style="width: 60%; display: inline-block; text-align: center;">
					<label style="display: block;"><input type="checkbox" name="cab_status" value="Yes" <?php echo ($info['cab_status'] == "Yes") ? "checked" : ""; ?> /> Yes/ <input type="checkbox" name="cab_status" value="No" <?php echo ($info['cab_status'] == "No") ? "checked" : ""; ?> /> No</label>
				</span>
			</div>
			<div class="form-field" style="width: 48%; float: right;">
				<label style="width: 35%; display: inline-block;"><b>Fuel Type:</b></label>
				<input type="text" name="fuel_type" value="<?php echo isset($info['fuel_type'])?$info['fuel_type']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Retail Price:</b></label>
				<input type="text" name="retail_price" value="<?php echo isset($info['retail_price'])?$info['retail_price']:''; ?>" style="width: 60%;">
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0;">
			<div class="form-field" style="width: 48%; float: left;">
				<label style="width: 35%; display: inline-block;"><b>Equipment Status:</b></label>
				<input type="text" name="equip_status" value="<?php echo isset($info['equip_status'])?$info['equip_status']:''; ?>" style="width: 60%;">
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
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b style="vertical-align: top;">Pictures Taken:</b></label>
				<textarea id="picture_taken" name="term_notes" style="width: 87%; height: 60px; border: 0;"><?php echo isset($info['picture_taken'])?$info['picture_taken']:'' ?></textarea>
			</div>
		</div>
		
		<div class="row" style="float: left; width: 100%; margin: 7px 0 0; border: 1px solid #000; box-sizing: border-box; padding: 4px;">
			<div class="form-field" style="width: 100%; float: left;">
				<label><b style="vertical-align: top;">Notes:</b></label>
				<textarea id="note" name="note" style="width: 94%; height: 60px; border: 0;"><?php echo isset($info['note'])?$info['note']:'' ?></textarea>
			</div>
		</div>
		
	</div>
	<!-- worksheet end -->
		
		
		<!-- no print buttons -->
	<br/>
	