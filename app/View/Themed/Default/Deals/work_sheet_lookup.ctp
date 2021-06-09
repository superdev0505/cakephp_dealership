<select class="form-control" id="select_oem_vehicle">
<option value="">Select</option>
<?php foreach($oem_vehicles as  $oem_vehicle){   ?>
<option value="<?php echo $oem_vehicle['InventoryOem']['id']  ?>"> 
		<?php echo $oem_vehicle['InventoryOem']['Condition'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Year'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Make'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Model'];  ?>, 
		<?php echo $oem_vehicle['InventoryOem']['Type'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Color'];  ?>
        &nbsp;$<?php echo $oem_vehicle['InventoryOem']['unit_value'];  ?>
	</option>
<?php }   ?>
</select>