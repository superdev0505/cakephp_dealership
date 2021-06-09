<!DOCTYPE html>
<body>
	<head>
		
Dear Dealer,

Please find below <?php if($bmw===true){ echo "BMW "; } ?> lead details as on (<?php echo date("F j, Y",strtotime($s_date))." to ".date("F j, Y",strtotime($e_date)); ?>)
<br/>
<br/>
<br/>

<?php
$style = 'style="background:#3695d5;color:white;border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
?>
<!-- Table -->
<table class="dynamicTable tableTools table table-bordered checkboxs" id="table-main" style="font-size:12px;width:100%;" border="0" cellpadding="0" cellspacing="0">
	<!-- Table heading -->
	<thead>
	<tr>
		<th <?php echo $style;?>>First Name</th>
		<th  <?php echo $style;?>>Last Name</th>
		<th <?php echo $style;?>>Email</th>
		<?php
		if($type=='SALES'){
		?>
			<th <?php echo $style;?>>Referrer URL</th>
			<!-- <th <?php echo $style;?>>BMW OEM customer?</th> -->
		<?php
		}
		?>
		<th <?php echo $style;?>>Created On</th>
		
	</tr>
	</thead>
	<?php
	$style='style="border: 1px solid #ddd;border-top: 1px solid #ddd;line-height: 1.42857;padding: 8px;vertical-align: top;"';
	
	foreach($send_contact_details as $details){
		$referrer_url = strtolower($details[$Index]['referrer_url']);
		if($bmw===true && trim(strtolower($details[$Index]['oem_bmw_location']))!='oem bmw customer' && strpos($referrer_url,'bmw')===false){
			continue; // filter only bmw
		}elseif($bmw===false && ( trim(strtolower($details[$Index]['oem_bmw_location']))=='oem bmw customer' || strpos($referrer_url,'bmw')!==false )){
			continue; // don't select bmw
		}
		if(!isset($details[$Index]['first_name']) && isset($details[$Index]['name'])){
			$tmpExplode = explode(" ",$details[$Index]['name']);
			$details[$Index]['first_name']  = $tmpExplode[0];
			$details[$Index]['last_name']  = $tmpExplode[count($tmpExplode)-1];
		}
		
		//Show "Showroom Form" in Referal URL if its BMW lead 
		if($bmw===true && trim($details[$Index]['referrer_url'])==''){
			$details[$Index]['referrer_url'] = 'Showroom Form';
		}
		
	?>
	
		<tr class="gradeA">
			<td <?php echo $style;?>><?php echo $details[$Index]['first_name'];?></td>
			<td <?php echo $style;?> ><?php echo $details[$Index]['last_name'];?></td>
			<td <?php echo $style;?> ><?php echo $details[$Index]['email'];?></td>
			<?php
			if($type=='SALES'){
				$referrer_url = strtolower($details[$Index]['referrer_url']);
			?>
				<td <?php echo $style;?> >&nbsp;<?php echo $details[$Index]['referrer_url'];?></td>
				<!-- <td <?php echo $style;?> >&nbsp;<?php echo (trim(strtolower($details[$Index]['oem_bmw_location']))=='oem bmw customer' || strpos($referrer_url,'bmw')!==false )? 'Yes':'No';?></td> -->
			<?php
			}
			?>
			<td <?php echo $style;?> ><?php echo date("m/d/Y",strtotime($details[$Index]['created']));?> <?php echo date("g:h A",strtotime($details[$Index]['created']));?></td>
			
		</tr>
	<?php
	}

	?>
		
		<!-- // Table body END -->
	</table>
			<!-- // Table END -->
	
	</body>
</html>