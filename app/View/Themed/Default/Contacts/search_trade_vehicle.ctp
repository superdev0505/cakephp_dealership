<ul class="list-unstyled">
<?php foreach($oem_vehicles as $oem_vehicle){ ?>
	<li class="border-bottom">
		<a class="list_trade_vehicle" id="<?php echo $oem_vehicle['InventoryOem']['id'];  ?>" href="javascript:">
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
	$("a.list_trade_vehicle").click(function(){
	
		if(confirm('Are you sure you want to add this to trade?')){
			$.ajax({
				type: "GET",
				cache: false,
				 dataType: "json",
				url:  "/contacts/get_oem_vehicle/"+$(this).attr('id'),
				success: function(data){
					
					$("#ContactTradeValue").val(data.InventoryOem.unit_value);
					$("#ContactStockNumTrade").val(data.InventoryOem.StockNum);
					$("#ContactConditionTrade").val(data.InventoryOem.Condition);
					$("#ContactYearTrade").val(data.InventoryOem.Year);
					$("#ContactMakeTrade").val(data.InventoryOem.Make);
					$("#ContactModelTrade").val(data.InventoryOem.Model);
					$("#ContactTypeTrade").val(data.InventoryOem.Type);
					//$("#ContactEngine").val(data.InventoryOem.engine);
					$("#ContactVinTrade").val(data.InventoryOem.vin);
					$("#ContactOdometerTrade").val(data.InventoryOem.odometer);
					$("#ContactUsedunitColor").val(data.InventoryOem.Color);
				}
			});
		}
		
		
	});

});
</script>