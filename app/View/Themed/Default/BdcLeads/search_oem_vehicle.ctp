<ul class="list-unstyled">
<?php foreach($oem_vehicles as $oem_vehicle){ ?>
	<li class="border-bottom">
		<a class="list_oem_vehicle" id="<?php echo $oem_vehicle['InventoryOem']['id'];  ?>" href="javascript:">
		<?php echo $oem_vehicle['InventoryOem']['Condition'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Year'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Make'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Model'];  ?></br>
		<?php echo $oem_vehicle['InventoryOem']['Type'];  ?> 
		<?php echo $oem_vehicle['InventoryOem']['Color'];  ?>
                &nbsp;$<?php echo $oem_vehicle['InventoryOem']['unit_value'];  ?>
</a>
	</li>
<?php } ?>
</ul>
<script>
$(function() {
	$("a.list_oem_vehicle").click(function(){
		
		if(confirm('Are you sure you want to add this to vehicle?')){
			$.ajax({
				type: "GET",
				cache: false,
				 dataType: "json",
				url:  "/contacts/get_oem_vehicle/"+$(this).attr('id'),
				success: function(data){
					
					$("#ContactUnitValue").val(data.InventoryOem.unit_value);
					$("#ContactStockNum").val(data.InventoryOem.StockNum);
					$("#ContactCondition").val(data.InventoryOem.Condition);
					$("#ContactYear").val(data.InventoryOem.Year);
					$("#ContactMake").val(data.InventoryOem.Make);
					$("#ContactModel").val(data.InventoryOem.Model);
					$("#ContactType").val(data.InventoryOem.Type);
					$("#ContactEngine").val(data.InventoryOem.engine);
					$("#ContactVin").val(data.InventoryOem.vin);
					$("#ContactOdometer").val(data.InventoryOem.odometer);
					$("#ContactUnitColor").val(data.InventoryOem.Color);
				}
			});
		}
		
	});

});
</script>