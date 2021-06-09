<?php include_once('../../header.php'); ?>

<?php
	mysql_query("DELETE FROM $database->product_amount WHERE amount='0'");
	
	if(isset($_GET['product_id'])){ $product_id = safety_filter($_GET['product_id']);	}
?>

<table class="dataTable">
	<thead>
    	<tr>
        	<th width="1"></th>
            <th><?php lang('Product Code'); ?></th>
            <th><?php lang('Shelf'); ?></th>
            <th class="text-right"><?php lang('Amount'); ?></th>
        </tr>
	</thead>
    <tbody>
    <?php
	$amount_total = 0;
	if(isset($_GET['product_id'])){ $query_product_amount	=	mysql_query("SELECT * FROM $database->product_amount WHERE product_id='$product_id'"); }
	else { $query_product_amount	=	mysql_query("SELECT * FROM $database->product_amount"); }
	while($list_product_amount = mysql_fetch_assoc($query_product_amount))
	{
		$product_amount['id']			= $list_product_amount['id'];
		$product_amount['product_id'] 	= $list_product_amount['product_id'];
		$product_amount['shelf'] 		= $list_product_amount['shelf'];
		$product_amount['amount'] 		= $list_product_amount['amount'];
		
		echo '
		<tr>
			<td></td>
			<td><a href="'.get_url('page').'/product/product.php?product_id='.$product_amount['product_id'].'">'.get_product($product_amount['product_id'], 'code').'</a></td>
			<td>'.$product_amount['shelf'].'</td>
			<td class="text-right">'.$product_amount['amount'].'</td>
		</tr>
		';
		
		$amount_total = $amount_total + $product_amount['amount'];
	}
	?>
    </tbody>
    <?php if(isset($_GET['product_id'])) : ?>
    <tfoot>
    	<tr>
        	<th></th>
            <th></th>
            <th></th>
            <th class="text-right"><?php echo $amount_total; ?></th>
        </tr>
    </tfoot>
    <?php endif; ?>
</table>


<?php include_once('../../footer.php'); ?>