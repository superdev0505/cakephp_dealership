<div class="page-break"></div>
<?php echo $cid = AuthComponent::user('dealer_id'); ?>
<div class="wraper header"> 
			 <table width="100%" >
          <tr>
          <td width="50%" valign="top">
          
          <img src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/mission_city_logo.jpeg'); ?>"  style="width:270px;height:190px;" />
          </td>
          <td width="50%" align="right" >
          	<h1>SERVICE INVOICE</h1><br/><br/>
            <label style="width:100%;">Due Date:&nbsp; <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width:80%;" /> </label>
            <label style="width:100%;">Sales Notes &nbsp; <input type="text" name="notes" value="<?php echo isset($info['notes'])?$info['notes']:''; ?>" style="width:75%;" /></label>
          </td>
        
          </tr>
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td colspan="3" align="center"><strong>Customer</strong></td>
          </tr>
          
          <tr>
          <td colspan="2">
          <label style="width:100%;">Name &nbsp; <input type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" /></label>
           <label style="width:100%;">Address &nbsp; <input type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" /></label>
            <label style="width:100%;">Phone &nbsp; <input type="text" name="phone" value="<?php echo isset($info['phone'])?$info['phone']:''; ?>" /></label>
            
           <label style="width:100%;">Email &nbsp; <input type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" /></label>
            
          </td>
          
          <td align="center">
          	
            <label style="width:100%;">X <input type="text" name="customer_signature" style="width:95%;" /></label>
          <small style="text-align:center;">Customer Signature</small>
          	
          </td>         
          </tr>
          
          <tr>
          <td width="20%"><label style="width:100%;">Year &nbsp;<input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:75%;" /></label></td>
          <td width="35%"><label style="width:100%;">Make &nbsp;<input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:85%;" /></label></td>
          <td width="45%">
          <label style="width:100%;">Model &nbsp;<input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width:85%;" /></label>
          </td>
          </tr>
          
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td width="40%"><label style="width:100%;">Salesperson &nbsp;<input type="text" name="sperson" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" style="width:72%;" /></label></td>
          <td width="60%">
          <label style="width:100%;">VIN &nbsp;<input type="text" name="vin" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" style="width:85%;" /></label>
          </td>          
          </tr>
          
              <tr>
          <td width="40%"><label style="width:100%;">Job &nbsp;<input type="text" name="job_title" value="<?php echo isset($info['job_title'])?$info['job_title']:''; ?>" style="width:85%;" /></label></td>
          <td width="60%">
          <label style="width:100%;">Mile In/Out: &nbsp;<input type="text" name="miles_in_out" value="<?php echo isset($info['miles_in_out'])?$info['miles_in_out']:''; ?>" style="width:78%;" /></label>
          </td>          
          </tr>
          
          </table>
          
          <table width="100%" cellpadding="2" border="1">
          <tr>
          <td width="20%" align="center"><label>PART #</label> </td>
          <td width="60%" align="center"><label> DESCRIPTION</label></td>
          <td width="20%" align="center"><label>QUANTITY</strong> </td>
         
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_1" value="<?php echo isset($info['part_number_1'])?$info['part_number_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_1" value="<?php echo isset($info['part_desc_1'])?$info['part_desc_1']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_1" value="<?php echo isset($info['quantity_1'])?$info['quantity_1']:''; ?>" /></td>
         
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_2" value="<?php echo isset($info['part_number_2'])?$info['part_number_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_2" value="<?php echo isset($info['part_desc_2'])?$info['part_desc_2']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_2" value="<?php echo isset($info['quantity_2'])?$info['quantity_2']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_3" value="<?php echo isset($info['part_number_3'])?$info['part_number_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_3" value="<?php echo isset($info['part_desc_3'])?$info['part_desc_3']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_3" value="<?php echo isset($info['quantity_3'])?$info['quantity_3']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_4" value="<?php echo isset($info['part_number_4'])?$info['part_number_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_4" value="<?php echo isset($info['part_desc_4'])?$info['part_desc_4']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_4" value="<?php echo isset($info['quantity_4'])?$info['quantity_4']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_5" value="<?php echo isset($info['part_number_5'])?$info['part_number_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_5" value="<?php echo isset($info['part_desc_5'])?$info['part_desc_5']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_5" value="<?php echo isset($info['quantity_5'])?$info['quantity_5']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_6" value="<?php echo isset($info['part_number_6'])?$info['part_number_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_6" value="<?php echo isset($info['part_desc_6'])?$info['part_desc_6']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_6" value="<?php echo isset($info['quantity_6'])?$info['quantity_6']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_7" value="<?php echo isset($info['part_number_7'])?$info['part_number_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_7" value="<?php echo isset($info['part_desc_7'])?$info['part_desc_7']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_7" value="<?php echo isset($info['quantity_7'])?$info['quantity_7']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_8" value="<?php echo isset($info['part_number_8'])?$info['part_number_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_8" value="<?php echo isset($info['part_desc_8'])?$info['part_desc_8']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_8" value="<?php echo isset($info['quantity_8'])?$info['quantity_8']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_9" value="<?php echo isset($info['part_number_9'])?$info['part_number_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_9" value="<?php echo isset($info['part_desc_9'])?$info['part_desc_9']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_9" value="<?php echo isset($info['quantity_9'])?$info['quantity_9']:''; ?>" /></td>
          
          </tr>
          
           <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_10" value="<?php echo isset($info['part_number_10'])?$info['part_number_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_10" value="<?php echo isset($info['part_desc_10'])?$info['part_desc_10']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_10" value="<?php echo isset($info['quantity_10'])?$info['quantity_10']:''; ?>" /></td>
          
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_11" value="<?php echo isset($info['part_number_11'])?$info['part_number_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_11" value="<?php echo isset($info['part_desc_1!'])?$info['part_desc_11']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_11" value="<?php echo isset($info['quantity_11'])?$info['quantity_11']:''; ?>" /></td>
         
          </tr>
          
          <tr>
          <td align="center"><input type="text" style="width:95%" name="part_number_12" value="<?php echo isset($info['part_number_12'])?$info['part_number_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="part_desc_12" value="<?php echo isset($info['part_desc_12'])?$info['part_desc_12']:''; ?>" /></td>
          <td align="center"><input type="text" style="width:95%" name="quantity_12" value="<?php echo isset($info['quantity_12'])?$info['quantity_12']:''; ?>" /></td>
         
          </tr>
          
         
          
          
          <tr>
          <td colspan="3">
           <label style="width:100%;">Tech: &nbsp;<input type="text" name="service_tech" value="<?php echo isset($info['service_tech'])?$info['service_tech']:''; ?>" style="width:85%;" /></label>
          </td>
          </tr>
          
           <tr>
          <td colspan="3">
           <label style="width:100%;">Comments: &nbsp;<textarea style="width:85%;" name="comments"><?php echo isset($info['comments'])?$info['comments']:''; ?></textarea>
          </td>
          </tr>
          
          </table>
		
			
				
			
		</div>