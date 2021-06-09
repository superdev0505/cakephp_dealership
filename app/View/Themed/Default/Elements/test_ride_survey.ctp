<div class="page-break"></div>
		<div class="wraper header"> 

		 
			 
				<div class="full">
				 <table width="100%">
                <tr>
                <td width="25%">Customer Name :</td>
                <td width="25%"><input  type="text" class="text_captialize"  style="width:100%;" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" />	</td>
                 <td width="25%">Date :</td>
                <td width="25%"><input name="filled_date" type="text" style="width:100%;" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m-d-Y'); ?>" /></td>
                </tr>
                <tr>
                <td width="25%">Email :</td>
                <td width="25%"><input  type="text"  style="width:100%;" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" /></td>
                <td width="25%">DL #:</td>
                <td width="25%"><input  type="text" style="width:100%;" name="dl_no" value="<?php echo isset($info['dl_no'])?$info['dl_no']:''; ?>" /></td>
                </tr>
                <tr>
                <td width="25%">Address :</td>
                <td colspan="3" ><input name="address" type="text" style="width:100%;"  value="<?php echo isset($info['address'])?$info['address']:''; ?>" /></td>
                </tr>
                </table>
               
				
                </div>
                <div class="full">
                 <span class="four">Cell Phone # :</span>
                 <?php
				 $phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']);
				 $cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1); //Re Format it
$phone_number2 = preg_replace('/[^0-9]+/', '', $info['phone']); //Strip all non number characters
$cleaned2 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number2);
				  ?>
				<input type="text" class="four"  name="mobile" value="<?php echo isset($info['mobile'])?$cleaned1:''; ?>" />			
			    <span class="four">Home Phone #:</span>
				<input type="text" class="four" name="phone" value="<?php echo isset($info['phone'])?$cleaned2:''; ?>" />
				</div>
                 <h2 style="text-align:center;padding:20px;">PRE TEST RIDE SURVEY QUESTIONS</h2>
                <br />
               <div class="full">
				<span class="two-three">How did you hear about us? </span>
				<input type="text" class="four" name="how_hear_us" value="<?php echo isset($info['how_hear_us'])?$info['how_hear_us']:''; ?>" />			
			    <span class="two-three">What have you ridden in the past?  </span>
				<input type="text" class="four" name="have_you_ridden" value="<?php echo isset($info['have_you_ridden'])?$info['have_you_ridden']:''; ?>" />
                <span class="two-three">What do you currently own?  </span>
				<input type="text" class="four" name="what_currently_own" value="<?php echo isset($info['what_currently_own'])?$info['what_currently_own']:''; ?>"/>
                 <span class="two-three">What have you owned in the past?    </span>
				<input type="text" class="four" name="what_past_own" value="<?php echo isset($info['what_past_own'])?$info['what_past_own']:''; ?>" />
                <span class="full">What do you like best about your current motorcycle?  </span>
				<input type="text" class="full" name="what_current_vehicle" value="<?php echo isset($info['what_current_vehicle'])?$info['what_current_vehicle']:''; ?>" />
                <span class="full">What would be the "1" thing you would change about your current bike?  </span>
				<input type="text" class="full" name="one_thing_change" value="<?php echo isset($info['one_thing_change'])?$info['one_thing_change']:''; ?>" />
                <span class="two-three">If you like the vehicle would you consider a purchase today?   </span>
				<span class="six"><input type="radio" name="consider_purchase" value="Yes" <?php echo (isset($info['consider_purchase'])&& $info['consider_purchase']=='Yes')?'checked="checked"':''; ?> />&nbsp; Yes <input type="radio" name="consider_purchase" value="No" <?php echo (isset($info['consider_purchase'])&& $info['consider_purchase']=='No')?'checked="checked"':''; ?> />&nbsp; No</span>
                <span class="full">If not, what time frame before you will be ready to buy?</span>
                <span class="six"><input type="radio" name="what_time_frame" value="Tomorrow" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='Tomorrow')?'checked="checked"':''; ?> />&nbsp;Tomorrow</span>
                <span class="six"><input type="radio" name="what_time_frame" value="1week" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='1week')?'checked="checked"':''; ?> />&nbsp;1 week</span>
                <span class="six"><input type="radio" name="what_time_frame" value="1month" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='1month')?'checked="checked"':''; ?> />&nbsp;1 month</span>
                <span class="four"><input type="radio" name="what_time_frame" value="3ormoremonths" <?php echo (isset($info['what_time_frame'])&& $info['what_time_frame']=='3ormoremonths')?'checked="checked"':''; ?> />&nbsp;3 or more months</span>
				</div>
              <h2 style="text-align:center;padding:20px;">POST TEST RIDE SURVEY QUESTIONS</h2>
              <h4 style="text-align:center;padding:20px;">Please rate your overall reaction to the test ride</h4>
              <div class="full">
              <span class="six"><input type="radio"  name="rate_overall" value="Loved" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Loved')?'checked="checked"':''; ?> />&nbsp;Loved It</span>
                <span class="six"><input type="radio" name="rate_overall" value="Liked" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Liked')?'checked="checked"':''; ?> />&nbsp;Liked It</span>
                <span class="six"><input type="radio" name="rate_overall" value="It_was_OK" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='It_was_OK')?'checked="checked"':''; ?> />&nbsp;It was OK </span>
                <span class="six"><input type="radio" name="rate_overall" value="Disliked_It" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Disliked_It')?'checked="checked"':''; ?> />&nbsp;Disliked It</span>
                <span class="six"><input type="radio" name="rate_overall" value="Hated_It" <?php echo (isset($info['rate_overall'])&& $info['rate_overall']=='Hated_It')?'checked="checked"':''; ?> />&nbsp;Hated It</span>
                <span class="full">What one thing did you like best about the motorcycle you just rode? </span>
                <input type="text" class="full" name="best_thing_like" value="<?php echo isset($info['best_thing_like'])?$info['best_thing_like']:''; ?>" />
                 <span class="full">How do you plan on purchasing the vehicle? </span>
                 <span class="six"><input type="radio" name="plan_purchasing" value="Cash" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Cash')?'checked="checked"':''; ?> />&nbsp;Cash</span>
                <span class="six"><input type="radio" name="plan_purchasing" value="Check" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Check')?'checked="checked"':''; ?> />&nbsp;Check</span>
                <span class="six"><input type="radio" name="plan_purchasing" value="Credit_Card" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Credit_Card')?'checked="checked"':''; ?> />&nbsp;Credit Card </span>
                <span class="four"><input type="radio" name="plan_purchasing" value="Financing" <?php echo (isset($info['plan_purchasing'])&& $info['plan_purchasing']=='Financing')?'checked="checked"':''; ?> />&nbsp;Financing</span>
                <span class="two-three">Overall how would you rate your experience? 1 thru 10  </span>
                <input type="text" class="four" name="overall_experience" value="<?php echo isset($info['overall_experience'])?$info['overall_experience']:''; ?>" />
              </div>
              	
               
               
               
                
			
			
		</div>
		<!---left1-->
		</br>
         <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>