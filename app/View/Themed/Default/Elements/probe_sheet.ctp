<div class="page-break"></div>
		<div class="wraper header"> 
			<h2 style="text-align:center;padding:20px;">Probe Sheet</h2>
            <div class="full">
				<span class="six">CRM REF #</span>			
			   	<input name="contact_id" type="text" class="six" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" placeholder=""/>		
			</div>
            
             <div class="full">
				
				<span class="six">Date</span>			
			     <input name="filled_date" type="text" class="six" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m-d-Y'); ?>" placeholder=""/>
                 <span class="six">&nbsp;</span>	             
				<span class="six">Time</span>	
                <input name="filled_time" type="text" class="four" value="<?php echo isset($info['filled_time'])?$info['filled_data']:date('h:i A'); ?>" placeholder=""/>			    
			</div>
            <span class="span24">Sales Rep</span>
            <input type="text" class="input71" name="sperson" value="<?php echo $info['sperson']; ?>" />
             <br />
             <span class="span24">Guest Name</span>
            <input type="text" class="input71 text_captialize"  name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" />
             <br />
             <?php
				 $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']);
				 $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
				  ?>
             <span class="span24">Cell #</span>
             <input type="text" class="input20" name="mobile" value="<?php echo isset($info['mobile'])?$cleaned1:''; ?>" />
             <span class="span15">Home #</span>
            <input type="text" class="input35" name="phone" value="<?php echo isset($info['phone'])?$cleaned2:''; ?>" />
            <br />
            <span class="span24">Email Address</span>
            <input type="text" class="input71" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" />
            <br />
            <div class="full">
            <span class="six" style="width:5%">Unit</span>
            <span class="six" style="width:17%"><input type="radio" name="condition" value="New" <?php echo (isset($info['condition'])&& $info['condition']=='New')?'checked="checked"':''; ?>  /> &nbsp;New <br/><input type="radio" name="condition" value="Used"  <?php echo (isset($info['condition'])&& $info['condition']=='Used')?'checked="checked"':''; ?> /> &nbsp;Used</span><span class="six" style="width:7%">Year</span>
            <input type="text" class="six" style="width:9%" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>"  />
            <span class="six" style="width:6%">Make</span>
            <input type="text" class="four" name="make"  style="width:50%" value="<?php echo isset($info['make'])?$info['make']:''; ?>" />
           
            </div>
            <div class="full">
             
            <span class="six" style="width:7%">Model</span>
            <input type="text" class="four" style="width:52%"  name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" />
             <span class="six" style="width:7%">Color</span>
            <input type="text" class="four" style="width:30%" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" />
            
            </div>
            <br  />
            <span class="span15">City</span>
            <input type="text" class="input17" name="city" value="<?php echo isset($info['city'])?$info['city']:''; ?>" />
            <span class="span15">County</span>
            <input type="text" class="input17" name="county" value="<?php echo isset($info['county'])?$info['county']:''; ?>" />
              <span class="span15">Zip</span>
            <input type="text" class="input17" name="zip" value="<?php echo isset($info['zip'])?$info['zip']:''; ?>" />
            <br />
            <div class="full">
            <span class="four">Method of payment? </span>
            <span class="two-three"><input type="radio" name="payment_method" value="Cash"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Cash')?'checked="checked"':''; ?> /> &nbsp;Cash <input type="radio" name="payment_method" value="Check"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Check')?'checked="checked"':''; ?> /> &nbsp;Check <input type="radio" name="payment_method" value="Credit_Card"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Credit_Card')?'checked="checked"':''; ?> /> &nbsp;Credit Card <input type="radio" name="payment_method" value="Finance"  <?php echo (isset($info['payment_method'])&& $info['payment_method']=='Finance')?'checked="checked"':''; ?> /> &nbsp;Finance</span>
            </div>
            <div class="full">
            <span class="six">Source</span>
            <span class="two-three" style="width:81%"><input type="radio" name="source" value="FREE_WY"  <?php echo (isset($info['source'])&& $info['source']=='FREE_WY')?'checked="checked"':''; ?> />&nbsp;FREE WY &nbsp;<input type="radio" name="source" value="OUR_WEB"  <?php echo (isset($info['source'])&& $info['source']=='OUR_WEB')?'checked="checked"':''; ?> />&nbsp;OUR WEB &nbsp;<input type="radio" name="source" value="CT_ONLINE"  <?php echo (isset($info['source'])&& $info['source']=='CT_ONLINE')?'checked="checked"':''; ?> />&nbsp;CT ONLINE &nbsp;<input type="radio" name="source" value="CRAIGS"  <?php echo (isset($info['source'])&& $info['source']=='CRAIGS')?'checked="checked"':''; ?> /> &nbsp; CRAIGS &nbsp;<input type="radio" name="source" value="REFERAL"  <?php echo (isset($info['source'])&& $info['source']=='REFERAL')?'checked="checked"':''; ?> /> &nbsp; REFERAL &nbsp;<input type="radio" name="source" value="PREV_PURCHASE"  <?php echo (isset($info['source'])&& $info['source']=='PREV_PURCHASE')?'checked="checked"':''; ?>  />&nbsp;PREV PURCHASE &nbsp;<input type="radio" name="source" value="SEARCH_ENGINE"  <?php echo (isset($info['source'])&& $info['source']=='SEARCH_ENGINE')?'checked="checked"':''; ?> /> &nbsp; SEARCH ENGINE &nbsp;<input type="radio" name="source" value="NO_SOURCE"  <?php echo (isset($info['source'])&& $info['source']=='NO_SOURCE')?'checked="checked"':''; ?> />&nbsp; NO SOURCE &nbsp;<input type="radio" name="source" value="PERSONAL"  <?php echo (isset($info['source'])&& $info['source']=='PERSONAL')?'checked="checked"':''; ?> />&nbsp; PERSONAL &nbsp;<input type="radio" name="source" value="OTHER"  <?php echo (isset($info['source'])&& $info['source']=='OTHER')?'checked="checked"':''; ?> />&nbsp;OTHER&nbsp;</span>
            </div>
            <br />
            <span class="span24">Appointment Date</span>
            <input type="text" class="input20" id="appt_date" name="appt_date" value="<?php echo isset($info['appt_date'])?$info['appt_date']:''; ?>" />
            <span class="span15">Time</span>
            <span class="span24">
             <div class="bootstrap-timepicker">
  <input type="text" id="appt_time" name="appt_time" class="input-small" value="<?php echo isset($info['appt_time'])?$info['appt_time']:''; ?>" />
			 <i class="icon-time"></i>
			</div>
          </span>
            <br />
            <span class="span24" style="width:36%;text-decoration:underline">Have You Visited our 30,000sq ft showroom?</span>
            <input class="input71" type="text" style="width:59%;" name="have_you_visted" value="<?php echo isset($info['have_you_visted'])?$info['have_you_visted']:''; ?>" /> 
            <br/>
            <span class="span15">Trade</span>
            <input type="text" class="inpu20" style="width:30%" name="trade" value="<?php echo isset($info['model_trade'])?$info['model_trade']:''; ?>" />
            <span class="span15">Accessories</span>
            <input type="text" class="inpu20" style="width:34%" name="accessories" value="<?php echo isset($info['accessories'])?$info['accessories']:''; ?>" /> 
            <br /><br/>
            <span class="span24"  style="text-decoration:underline">Rapport building notes</span>
            <textarea class="input71" rows="2" name="rapport_notes"><?php echo isset($info['accessories'])?$info['rapport_notes']:''; ?></textarea>
            <br/><br/>
            <span class="span24">Objections</span>
            <textarea class="input71" rows="1" name="objections"><?php echo isset($info['objections'])?$info['objections']:''; ?></textarea>
            <br/>
            
       
           
            
           
			
                
               <br /> 
	         
              
              
                <br />
                
          
              
           
          
                 
             
     
    
          
			
		</div>
		<!---left1-->
		</br>
        <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>