<?php include_once('../../header.php'); ?>

<?php
if(isset($_GET['input'])) 		{ $input_output = 'input';	}
else if(isset($_GET['output']))	{ $input_output = 'output';	}
else { alert_box('alert', get_lang('No Input-Output Value')); exit;	}
?>

<?php
$shelf = '';
if(isset($_POST['btn_submit']))
{
	$continue 		= true;
	$product_id		=	safety_filter($_POST['product_id']);
	$product_code	=	safety_filter($_POST['product_code']);
	$shelf			=	safety_filter($_POST['shelf']);
	$amount			=	safety_filter($_POST['amount']);
	
	if($product_id == '')
	{
		$query_product = mysql_query("SELECT * FROM $database->products WHERE status='publish' AND code='$product_code'");	
		while($list_product = mysql_fetch_assoc($query_product))
		{
			$product_id = $list_product['id'];
		}
	}
	
	if($product_id == ''){ $continue = false; alert_box('alert', get_lang('Product Not Found')); }
	
	if($continue == true)
	{
		if(product_amount($input_output, $product_id, $shelf, $amount))
		{
			alert_box('success', get_lang('Succesful'));
		}
	}
}
?>

<style>
#product_code			{ 	font-size:36px; height:60px;	}
#product_code:focus		{	border:1px solid #f00;			}
#shelf:focus			{	border:1px solid #f00;			}
#amount					{ 	font-size:36px; height:60px;	}
#amount:focus			{	border:1px solid #f00;			}
</style>
            
<form name="form_add" id="form_add" action="" method="POST">
<div class="row">
	<div class="twelve columns">
    	<fieldset>
			<legend><?php lang('Input-Output'); ?></legend>
            
            <div class="row">
            	<div class="ten columns">
                	<?php box_product_list('product_id', 'product_code'); ?>
                	<a href="#" class="button secondary small " data-reveal-id="box_product_list" data-animation="fadeAndPop" ><?php lang('Product List'); ?></a>
                </div>
                <div class="two columns">
                	<div class="row collapse">
                    	<div class="two mobile-one columns">
                        	<script> 
                            	function popup_barcode_print()
								{
									var shelf = document.getElementById('shelf').value; 
									if(shelf == '')
									{
										document.getElementById('shelf').focus();
									}
									else
									{
										window.open ('<?php echo url(''); ?>/include/class/barcode/barcode_show.php?barcode=' + shelf + '&print='+ true +'','mywindow','menubar=0,resizable=0,width=300,height=300');	
									}
								}
                            </script>
                        	<span class="prefix"><a href="#" onClick="popup_barcode_print();"><img src="<?php url('theme'); ?>/images/icon/16/print.png" title="<?php lang('Print'); ?>" style="margin-top:5px;" /></a></span>
                      	</div>
                      	<div class="ten mobile-three columns">
                        	<input type="text" name="shelf" id="shelf" maxlength="50" placeholder="<?php lang('Shelf'); ?>" value="<?php echo $shelf; ?>" />
                      	</div>
                	</div> <!-- /.row collapse -->
                </div>
            </div> <!-- /.row -->
            
            <div class="row">
            	<div class="ten columns">
                    <label for="product_code"><?php lang('Product Code'); ?></label>
                    <input type="text" name="product_code" id="product_code" class="required" maxlength="50" minlength="3" placeholder="<?php lang('Product Code'); ?>" />
                </div>
                <div class="two columns">
                	<label for="amount"><?php lang('Amount'); ?></label>
                    <input type="text" name="amount" id="amount" class="required number just_money" maxlength="11" minlength="1" phaceholder="<?php lang('Amont'); ?>" value="1" />
                </div>
           </div>
            
            <div class="row">
            	<div class="ten columns">
                	<div class="text-center">
                		<img src="<?php url('theme'); ?>/images/barcode_scaner.png" />
                    </div>
                </div>
                <div class="two columns">
                    <input type="hidden" name="product_id" id="product_id" value="" />
                    <?php if($input_output == 'input') : ?>
                        <input type="submit" name="btn_submit" id="btn_submit" class="button large full-width" value="&laquo; <?php lang('Input'); ?>" />
                    <?php elseif ($input_output == 'output') : ?>
                        <input type="submit" name="btn_submit" id="btn_submit" class="button large full-width" value="<?php lang('Output'); ?> &raquo;" />
                    <?php endif; ?>
            	</div>
            </div>
            <p></p>
    	</fieldset>    
    </div> <!-- /.four columns -->
</div> <!-- /.row -->


</form>

<script>
document.getElementById('product_code').focus();
</script>

<?php include_once('../../footer.php'); ?>