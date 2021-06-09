<div class="page-break"></div>
<style>
@media print {
   
	.print_month
	{
		display:block;
	}
	.border_bottom{border:none;}
	.border_bottom{border-bottom:1px solid #000;}
	
}
</style>
<div class="wraper header"> 
			<h2 style="text-align:center;font-size:19px;padding:20px;">THIS FORM MUST BE 100% COMPLETED BEFORE IT WIIL BE PROCESSED!!</h2>
          
			<table cellpadding="5" width="100%" class="less-font">
            <tr>	
				<td colspan="4" style="border:1px solid #000;">VIN MATCHES TITLE/REGISTRATION?
                <div style="float:right;">			
			    <input type="radio" name="match_registration" value="Yes"  <?php echo (isset($info['match_registration'])&& $info['match_registration']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="match_registration" value="No"  <?php echo (isset($info['match_registration'])&& $info['match_registration']=='No')?'checked="checked"':''; ?>  />&nbsp; No</div></td>             
				<td width="15%" align="right">Date</td>	
                <td width="20%"><input name="filled_data" type="text" style="width:100%" class="six date_input border_bottom" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m/d/Y'); ?>"/></td>		
			<tr>
            <tr>
            <td style="width:15%">CUSTOMER NAME</td>
            <td colspan="3"> <input name="name" type="text" style="width:100%" class="three border_bottom" value="<?php echo isset($info['name'])?ucfirst($info['name']):ucfirst($info['first_name']).' '.ucfirst($info['last_name']); ?>"/></td>
            <td align="right">PHONE #</td>
            <td> 
            <?php
				 $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']);
				 $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it

				  ?>
             <input name="mobile" style="width:100%" type="text" class="four border_bottom" value="<?php echo isset($info['mobile'])? $cleaned1:''; ?>" />		</td>
            </tr>
            <tr>
            <td>YEAR &nbsp;&nbsp;  <input name="year_trade" style="width:50px; display:inline;" type="text" class="border_bottom" value="<?php echo isset($info['year_trade'])?$info['year_trade']:''; ?>"/></td>
            <td width="26%">MAKE &nbsp;&nbsp; <input name="make_trade" style="width:130px; display:inline;" type="text" class="border_bottom" value="<?php echo isset($info['make_trade'])?$info['make_trade']:''; ?>"/></td>
            <td colspan="2">
            MODEL &nbsp;&nbsp;<input name="model_trade" style="width:120px; display:inline;" type="text" class="border_bottom"value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>"/>	
            </td>
            <td colspan="2">COLOR &nbsp;&nbsp;
             <input name="usedunit_color" type="text" style="width:200px; display:inline;" class="border_bottom" value="<?php echo isset($info['usedunit_color'])?$info['usedunit_color']:''; ?>" placeholder=""/>		
            </td>            
            </tr>
            <tr>
            <td>VIN #</td><td colspan="5"> <input name="vin_trade" type="text" style="width:70%" class="input71 border_bottom" value="<?php echo isset($info['vin_trade'])?$info['vin_trade']:''; ?>" placeholder=""/> <sub>MUST BE 17 DIGITS MC/OHV</sub> </td>
            </tr>
            <tr>
            <td>ENGINE #</td>
            <td colspan="2"> <input name="engine_trade" type="text" style="width:100%" class="border_bottom" value="<?php echo isset($info['engine_trade'])?$info['engine_trade']:''; ?>" placeholder=""/></td>
            </tr>
            <tr>
            <td colspan="2">
            DOES VEHICLE HAVE PLATES ?
            <div style="float:right;"><input type="radio" name="vehicle_have_plates" value="Yes"  <?php echo (isset($info['vehicle_have_plates'])&& $info['vehicle_have_plates']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="vehicle_have_plates" value="No"  <?php echo (isset($info['vehicle_have_plates'])&& $info['vehicle_have_plates']=='No')?'checked="checked"':''; ?>  />&nbsp; No</div>
            </td>
            <td colspan="2">PLATE #&nbsp;&nbsp; <input type="text" style="width:60%;display:inline;" class="border_bottom" name="plate_no" value="<?php echo isset($info['plate_no'])?$info['plate_no']:''; ?>"  /></td>
            <td colspan="2">EXPIRES&nbsp;&nbsp; <input type="text" class="border_bottom" style="width:72%;display:inline;" name="expires" value="<?php echo isset($info['expires'])?$info['expires']:''; ?>"  /></td>
            
            </tr>
            <tr>
            <td>MILES</td>
            <td> <input  type="text" class="border_bottom" style="width:70%" name="miles" value="<?php echo isset($info['miles'])?$info['miles']:''; ?>" /></td>
            </tr>
            <tr>
            <td colspan="5">HAS THE UNIT EVER BEEN DROPPED OR INVOLVED IN AN ACCIDENT?</td>
            <td><input type="radio" name="involved_accident" value="Yes"  <?php echo (isset($info['involved_accident'])&& $info['involved_accident']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="involved_accident" value="No"  <?php echo (isset($info['involved_accident'])&& $info['involved_accident']=='No')?'checked="checked"':''; ?> />&nbsp; No</td>
            </tr>
            <tr>
            <td colspan="5">IF YES, WAS IT OVER $500 IN DAMAGE INCLUDING PARTS AND LABOR?</td>
            <td><input type="radio" name="damage_cost" value="Yes"  <?php echo (isset($info['damage_cost'])&& $info['damage_cost']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="damage_cost" value="No"  <?php echo (isset($info['damage_cost'])&& $info['damage_cost']=='No')?'checked="checked"':''; ?> />&nbsp; No</td>
            </tr>
            <tr>
            <td>EXPLAIN DETAILS:</td>
            <td colspan="4">
            <textarea style="width:100%" rows="4" name="explain_details"><?php echo isset($info['explain_details'])?$info['explain_details']:''; ?></textarea>
            </td>
            </tr>
     <tr>
     <td>PAYOFF</td>
     <td> <input  type="text" class="border_bottom" style="width:100%;" name="payoff" value="<?php echo isset($info['payoff'])?$info['payoff']:''; ?>" /></td>
     <td colspan="4">ACCOUNT # (SSN)&nbsp;&nbsp;<input name="account_no" type="text" class="border_bottom" style="width:200px;display:inline;" value="<?php echo isset($info['account_no'])?$info['account_no']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td colspan="2">PAYOFF DUE DATE&nbsp;&nbsp;
     <input name="payoff_due_date" type="text" style="width:130px;display:inline;;" class="border_bottom date_input" value="<?php echo isset($info['payoff_due_date'])?$info['payoff_due_date']:''; ?>" placeholder=""/></td>
      <td colspan="4">PAYOFF COMPANY &nbsp;&nbsp;<input name="payoff_company" type="text" class="border_bottom" style="width:250px;display:inline;" value="<?php echo isset($info['payoff_company'])?$info['payoff_company']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td colspan="6" >MAILING ADDRESS &nbsp;&nbsp;
    <input name="mail_address" type="text" style="width:250px;display:inline;" class="border_bottom" value="<?php echo isset($info['mail_address'])?$info['mail_address']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td colspan="2">AMOUNT DUE TO CUSTOMER
     <input name="amount_due" type="text" class="border_bottom" style="width:100px;display:inline;" value="<?php echo isset($info['amount_due'])?$info['amount_due']:''; ?>" placeholder=""/></td>
      <td colspan="2">Cost of Unit&nbsp;<input name="trade_value" type="text" style="width:100px;display:inline;" class="border_bottom" value="<?php echo isset($info['trade_value'])?$info['trade_value']:''; ?>" placeholder=""/>  </td>
     <td colspan="2">D.S.R.P&nbsp;&nbsp;<input name="d_s_r_p" type="text" style="width:140px;display:inline;" class="border_bottom" value="<?php echo isset($info['d_s_r_p'])?$info['d_s_r_p']:''; ?>" placeholder=""/></td>     
     </tr>
     <tr>
     <td colspan="3">REGISTERED OWNER &nbsp;&nbsp; <input name="reg_owner" type="text" class="border_bottom" style="width:200px;display:inline;" value="<?php echo isset($info['reg_owner'])?$info['reg_owner']:''; ?>" placeholder=""/></td>
     <td colspan="3">DEALER SALES REP &nbsp;&nbsp;<input name="sperson" type="text" style="width:200px;display:inline;" class="border_bottom" value="<?php echo isset($info['sperson'])?$info['sperson']:''; ?>" placeholder=""/></td>
     </tr>
     <tr>
     <td></td>
     </tr>
     <tr>
     <td colspan="6"><h3 style="text-align:center;font-size:19px;">CHECK OFF LIST</h3></td>
     </tr>
      <tr>
     <td colspan="6" align="center"><strong>**ALL FORMS MUST BE FILLED OUT AND SIGNED COMPLETELY**</strong><br/><br/></td>
     </tr>
     <tr>
     <td>Title</td>
     <td><input type="radio" name="trade_title" value="Yes"  <?php echo (isset($info['trade_title'])&& $info['trade_title']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="trade_title" value="No"  <?php echo (isset($info['trade_title'])&& $info['trade_title']=='No')?'checked="checked"':''; ?> />&nbsp; No</td>
     
     <td colspan="3"><strong>COPY OF DRIVER'S LICENSE</strong></td>
     </tr>
     <tr>
     <td><strong>REG 262</strong></td>
     <td colspan="3"><strong>A MUST FOR ALL UNITS!!</strong></td>     
     </tr>
     <tr>
     <td><strong>REG 227</strong></td>
     <td  colspan="5"><strong>IF NO TITLE PRESENT AND IS CLEAR OF LIENS (RUN KSR)</strong></td>
     </tr>
     <tr>
     <td colspan="6"><p>RELEASE OF LIABILITY (TOP PORTION OF TITLE) FILL IN DEALER PORTION/DATE/DOLLAR AMOUNT
AND RETURN TO THE CUSTOMER SO HE CAN SIGN AND SEND TO DMV. THIS IS THE CUSTOMERS
RESPONSIBILTY. IF YOU PROMISE THE CUSTOMER THAT WE WILL DO IT THEN YOU NEED TO
LET ME OR FINANCE KNOW THAT YOU MADE THIS PROMISE. THIS CAN BE DONE ONLINE, VERY SIMPLE.<br/>
http://www.dmv.ca.gov/portal/dmv/detail/online/nrl/welcome</p></td>
     </tr>
     
            
            
     </table>              
              
          
            
       
     
          
			
		</div>
		<!---left1-->
		</br>
       <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	