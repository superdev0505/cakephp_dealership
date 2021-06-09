<ul class="list-unstyled">
<?php foreach($used_vehicles as $used_vehicle){ ?>
	<li class="border-bottom">
		<a class="list_used_vehicle" id="<?php echo $used_vehicle['Inventory']['id'];  ?>" href="javascript:">
		<?php echo $used_vehicle['Inventory']['Condition'];  ?> 
		<?php echo $used_vehicle['Inventory']['Year'];  ?> 
		<?php echo $used_vehicle['Inventory']['Make'];  ?> 
		<?php echo $used_vehicle['Inventory']['Model'];  ?> 
		<?php echo $used_vehicle['Inventory']['Type'];  ?>
		<?php echo $used_vehicle['Inventory']['Color'];  ?>&nbsp;
                #<?php echo $used_vehicle['Inventory']['StockNum'];  ?>
          &nbsp;$<?php echo $used_vehicle['Inventory']['unit_value'];  ?>

</a>
	</li>
<?php } ?>
</ul>

<script>
$(function() {
	$("a.list_used_vehicle").click(function(){
		if(confirm('Are you sure you want to add this to vehicle?')){
			$.ajax({
				type: "GET",
				cache: false,
				 dataType: "json",
				url:  "/contacts/get_used_vehicle/"+$(this).attr('id'),
				success: function(data){
					$("#ContactUnitValue").val(data.Inventory.unit_value);
					$("#ContactStockNum").val(data.Inventory.StockNum);
					$("#ContactCondition").val(data.Inventory.Condition);
					$("#ContactYear").val(data.Inventory.Year);
					$("#ContactMake").val(data.Inventory.Make);
					$("#ContactModel").val(data.Inventory.Model);
					$("#ContactType").val(data.Inventory.Type);
					$("#ContactEngine").val(data.Inventory.engine);
					$("#ContactVin").val(data.Inventory.vin);
					$("#ContactOdometer").val(data.Inventory.odometer);
					$("#ContactUnitColor").val(data.Inventory.Color);
									
				}
			});
		}
	});

});
</script>