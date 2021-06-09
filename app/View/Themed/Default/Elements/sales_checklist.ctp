<div class="page-break"></div>
<div class="wraper header"> 
			
            <div class="full">
				
				<span class="half"></span>	
                 <span class="four" style="width:10%"></span>		
			    <span class="four" style="width:12%">Date :</span>
				<input name="filled_data" type="text" class="four" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('Y-m-d'); ?>"/>
               
				
			</div>
             
            
            
		  <h2 style="text-align:center; text-decoration:underline;padding:20px;">Salesperson Successful Day checklist</h2>
         
			 
				<div class="full">
                <span class="four">1. </span>
				<span class="four">Month Units Goals :</span>
				<input name="month_goals" type="text" class="four" value="<?php echo isset($info['month_goals'])?$info['month_goals']:''; ?>" />
                <span class="four">&nbsp;</span>			
			    <span class="four"></span>
				<span class="four">Current MTD Rolled :</span>
				<input type="text" class="four" name="mtd_rolled"  value="<?php echo isset($info['mtd_rolled'])?$info['mtd_rolled']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">Short form month Goals :</span>
				<input type="text" class="four"  name="short_month_goals"  value="<?php echo isset($info['short_month_goals'])?$info['short_month_goals']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">Working Days left :</span>
				<input type="text" class="four" name="working_days_left"  value="<?php echo isset($info['working_days_left'])?$info['working_days_left']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">Today Goal :</span>
				<input type="text" class="four" name="today_goals"  value="<?php echo isset($info['today_goals'])?$info['today_goals']:''; ?>" />
                <span class="four">&nbsp;</span>
                <span class="four"></span>
				<span class="four">End of Day actual Rolled :</span>
				<input type="text" class="four" name="actual_rolled"  value="<?php echo isset($info['actual_rolled'])?$info['actual_rolled']:''; ?>" />
                <span class="four">&nbsp;</span>
				</div>
                <br />
                <div class="full">
				<span class="half" style="width:52%">2. &nbsp;Complete all CRM follow up's</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="complete_follow_ups" value="Yes"  <?php echo (isset($info['complete_follow_ups'])&& $info['complete_follow_ups']=='Yes')?'checked="checked"':''; ?>   />&nbsp; Yes <input type="radio" name="complete_follow_ups" value="No"  <?php echo (isset($info['complete_follow_ups'])&& $info['complete_follow_ups']=='No')?'checked="checked"':''; ?>  />&nbsp; No</span>
                <span class="half" style="width:52%">3. &nbsp;Confirm and Update Appointments with Sales Manager</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="confirm_update" value="Yes"  <?php echo (isset($info['confirm_update'])&& $info['confirm_update']=='Yes')?'checked="checked"':''; ?>   />&nbsp; Yes <input type="radio" name="confirm_update" value="No"  <?php echo (isset($info['confirm_update'])&& $info['confirm_update']=='No')?'checked="checked"':''; ?>    />&nbsp; No</span>
               <span class="half" style="width:52%">4. &nbsp;Organize section and ensure 100% of the vehicle are tagged,cleaned & organized</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="organize_section" value="Yes"  <?php echo (isset($info['organize_section'])&& $info['organize_section']=='Yes')?'checked="checked"':''; ?>  />&nbsp; Yes <input type="radio" name="organize_section" value="No"  <?php echo (isset($info['organize_section'])&& $info['organize_section']=='No')?'checked="checked"':''; ?>   />&nbsp; No</span>
                <span class="half" style="width:52%">5. &nbsp;Complete Inventory walk (Know what we have both New & Used)</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="radio" name="complete_inventory" value="Yes"  <?php echo (isset($info['complete_inventory'])&& $info['complete_inventory']=='Yes')?'checked="checked"':''; ?>    />&nbsp; Yes <input type="radio" name="complete_inventory" value="No"  <?php echo (isset($info['complete_inventory'])&& $info['complete_inventory']=='No')?'checked="checked"':''; ?>  />&nbsp; No</span>
                <span class="half" style="width:52%">6. &nbsp;Are all units sold actuall off property(Did they roll?) If not what is outstanding?</span>
				 <span class="four" style="width:30%"><input type="text" class="input90" name="did_they_rolled"  value="<?php echo isset($info['did_they_rolled'])?$info['did_they_rolled']:''; ?>"   /></span>			
			    <span class="four" style="width:15%"><input type="radio" name="all_unit_sold" value="Yes"  <?php echo (isset($info['all_unit_sold'])&& $info['all_unit_sold']=='Yes')?'checked="checked"':''; ?>   />&nbsp; Yes <input type="radio"  name="all_unit_sold" value="No"  <?php echo (isset($info['all_unit_sold'])&& $info['all_unit_sold']=='No')?'checked="checked"':''; ?>    />&nbsp; No</span>
                 <span class="half" style="width:52%">A. &nbsp;How many logged "Contacts" for the day(Min Goal 5)</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="text" class="input90"  name="home_many_logged"  value="<?php echo isset($info['home_many_logged'])?$info['home_many_logged']:''; ?>"   /></span>
                 <span class="half" style="width:52%">B. &nbsp;How many  "Write-Ups" for the day(Min Goal 3)</span>
				 <span class="four" style="width:30%">&nbsp;</span>			
			    <span class="four" style="width:15%"><input type="text" class="input90" name="home_many_writeups"  value="<?php echo isset($info['home_many_writeups'])?$info['home_many_writeups']:''; ?>"     /></span>
                <span class="four" style="width:28%">C. &nbsp;Notes</span>			
			   <textarea class="four" style="width:68%" rows="4" name="notes"><?php echo isset($info['notes'])?$info['notes']:''; ?></textarea>
              </div>
              <div class="full">
               <span class="four" style="width:28%">D. &nbsp;What can I have done to Hit required goal (If Applicable)</span>			
			   <textarea class="four" style="width:68%" rows="4" name="what_can_done"><?php echo isset($info['what_can_done'])?$info['what_can_done']:''; ?></textarea>
                
                </div>
               
                
               
                
			
            
            <div class="full">
				<span class="four">Print Name :</span>
				<input name="name" type="text" class="four" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>" placeholder=""/>			
			    <span class="four" style="width:20%;">Date:</span>
				<input name="filled_data" type="text" class="four" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('Y-m-d'); ?>" placeholder=""/>
				</div>
          
			
		</div>
		<!---left1-->
		<br />
        <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
	
	<br />

	
