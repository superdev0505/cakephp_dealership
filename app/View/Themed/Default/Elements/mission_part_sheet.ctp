<div class="page-break"></div>
<?php echo $cid = AuthComponent::user('dealer_id'); ?>
<div class="wraper header"> 
			 <table width="100%" >
          <tr>
          <td width="50%" valign="top">
          
          <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mission_city_logo.jpeg'); ?>"  style="width:270px;height:190px;" />
          </td>
          <td width="50%" align="right" >
          	<label>Salesperson &nbsp; &nbsp; <input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" /></label>
            
          </td>
        
          </tr>
          <tr>
          <td><label style="width:100%">Customer Name &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" style="width:60%" /></label></td>
          
           <td width="50%" align="right" >
          	<label>Stock Number &nbsp; &nbsp; <input type="text" name="stock_num" value="<?php echo $info['stock_num']; ?>" /></label>
            
          </td>
          </tr>
          
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td width="18%" align="center"><label>PART NUMBER</label> </td>
          <td width="35%" align="center"><label>PART DESCRIPTION</label></td>
          <td width="13%" align="center"><label>QUANTITY</strong> </td>
          <td width="13%" align="center"><label>PRICE</label></td>
          <td width="21%" align="center"><label>CHECK IF IN-STOCK</label> </td>
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_1" value="<?php echo isset($info['part_number_1'])?$info['part_number_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_1" value="<?php echo isset($info['part_desc_1'])?$info['part_desc_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_1" value="<?php echo isset($info['quantity_1'])?$info['quantity_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_1" value="<?php echo isset($info['part_price_1'])?$info['part_price_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_1" value="<?php echo isset($info['part_stock_1'])?$info['part_stock_1']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_2" value="<?php echo isset($info['part_number_2'])?$info['part_number_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_2" value="<?php echo isset($info['part_desc_2'])?$info['part_desc_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_2" value="<?php echo isset($info['quantity_2'])?$info['quantity_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_2" value="<?php echo isset($info['part_price_2'])?$info['part_price_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_2" value="<?php echo isset($info['part_stock_2'])?$info['part_stock_2']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_3" value="<?php echo isset($info['part_number_3'])?$info['part_number_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_3" value="<?php echo isset($info['part_desc_3'])?$info['part_desc_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_3" value="<?php echo isset($info['quantity_3'])?$info['quantity_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_3" value="<?php echo isset($info['part_price_3'])?$info['part_price_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_3" value="<?php echo isset($info['part_stock_3'])?$info['part_stock_3']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_4" value="<?php echo isset($info['part_number_4'])?$info['part_number_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_4" value="<?php echo isset($info['part_desc_4'])?$info['part_desc_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_4" value="<?php echo isset($info['quantity_4'])?$info['quantity_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_4" value="<?php echo isset($info['part_price_4'])?$info['part_price_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_4" value="<?php echo isset($info['part_stock_4'])?$info['part_stock_4']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_5" value="<?php echo isset($info['part_number_5'])?$info['part_number_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_5" value="<?php echo isset($info['part_desc_5'])?$info['part_desc_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_5" value="<?php echo isset($info['quantity_5'])?$info['quantity_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_5" value="<?php echo isset($info['part_price_5'])?$info['part_price_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_5" value="<?php echo isset($info['part_stock_5'])?$info['part_stock_5']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_6" value="<?php echo isset($info['part_number_6'])?$info['part_number_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_6" value="<?php echo isset($info['part_desc_6'])?$info['part_desc_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_6" value="<?php echo isset($info['quantity_6'])?$info['quantity_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_6" value="<?php echo isset($info['part_price_6'])?$info['part_price_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_6" value="<?php echo isset($info['part_stock_6'])?$info['part_stock_6']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_7" value="<?php echo isset($info['part_number_7'])?$info['part_number_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_7" value="<?php echo isset($info['part_desc_7'])?$info['part_desc_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_7" value="<?php echo isset($info['quantity_7'])?$info['quantity_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_7" value="<?php echo isset($info['part_price_7'])?$info['part_price_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_7" value="<?php echo isset($info['part_stock_7'])?$info['part_stock_7']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_8" value="<?php echo isset($info['part_number_8'])?$info['part_number_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_8" value="<?php echo isset($info['part_desc_8'])?$info['part_desc_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_8" value="<?php echo isset($info['quantity_8'])?$info['quantity_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_8" value="<?php echo isset($info['part_price_8'])?$info['part_price_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_8" value="<?php echo isset($info['part_stock_8'])?$info['part_stock_8']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_9" value="<?php echo isset($info['part_number_9'])?$info['part_number_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_9" value="<?php echo isset($info['part_desc_9'])?$info['part_desc_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_9" value="<?php echo isset($info['quantity_9'])?$info['quantity_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_9" value="<?php echo isset($info['part_price_9'])?$info['part_price_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_9" value="<?php echo isset($info['part_stock_9'])?$info['part_stock_9']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_10" value="<?php echo isset($info['part_number_10'])?$info['part_number_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_10" value="<?php echo isset($info['part_desc_10'])?$info['part_desc_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_10" value="<?php echo isset($info['quantity_10'])?$info['quantity_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_10" value="<?php echo isset($info['part_price_10'])?$info['part_price_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_10" value="<?php echo isset($info['part_stock_10'])?$info['part_stock_10']:''; ?>" /></td>
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_11" value="<?php echo isset($info['part_number_11'])?$info['part_number_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_11" value="<?php echo isset($info['part_desc_1!'])?$info['part_desc_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_11" value="<?php echo isset($info['quantity_11'])?$info['quantity_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_11" value="<?php echo isset($info['part_price_11'])?$info['part_price_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_11" value="<?php echo isset($info['part_stock_11'])?$info['part_stock_11']:''; ?>" /></td>
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_12" value="<?php echo isset($info['part_number_12'])?$info['part_number_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_12" value="<?php echo isset($info['part_desc_12'])?$info['part_desc_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_12" value="<?php echo isset($info['quantity_12'])?$info['quantity_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_12" value="<?php echo isset($info['part_price_12'])?$info['part_price_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_12" value="<?php echo isset($info['part_stock_12'])?$info['part_stock_12']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_13" value="<?php echo isset($info['part_number_13'])?$info['part_number_13']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_13" value="<?php echo isset($info['part_desc_13'])?$info['part_desc_13']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_13" value="<?php echo isset($info['quantity_13'])?$info['quantity_13']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_13" value="<?php echo isset($info['part_price_13'])?$info['part_price_13']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_13" value="<?php echo isset($info['part_stock_13'])?$info['part_stock_13']:''; ?>" /></td>
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_14" value="<?php echo isset($info['part_number_14'])?$info['part_number_14']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_14" value="<?php echo isset($info['part_desc_14'])?$info['part_desc_14']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_14" value="<?php echo isset($info['quantity_14'])?$info['quantity_14']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_14" value="<?php echo isset($info['part_price_14'])?$info['part_price_14']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_14" value="<?php echo isset($info['part_stock_14'])?$info['part_stock_14']:''; ?>" /></td>
          </tr>
          
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_15" value="<?php echo isset($info['part_number_15'])?$info['part_number_15']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_15" value="<?php echo isset($info['part_desc_15'])?$info['part_desc_15']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_15" value="<?php echo isset($info['quantity_15'])?$info['quantity_15']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_price_15" value="<?php echo isset($info['part_price_15'])?$info['part_price_15']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_stock_15" value="<?php echo isset($info['part_stock_15'])?$info['part_stock_15']:''; ?>" /></td>
          </tr>
          </table>
		
			
				
			
		</div>