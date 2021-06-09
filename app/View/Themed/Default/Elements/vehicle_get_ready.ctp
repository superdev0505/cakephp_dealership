<div class="page-break"></div>

<div class="wraper header"> 
			
            <div class="full">
				
				<span class="half"></span>			
			    <span class="four">Time Due :</span>
                <span class="four">
                <div class="bootstrap-timepicker">
				<input type="text" class="input-small time_input" name="time_due"  value="<?php echo isset($info['time_due'])?$info['time_due']:''; ?>" />
                </div>
                </span>
               
				<span class="half"></span>			
			    <span class="four">VSI Run By :</span>
				<input type="text" class="four" name="vsi_run_by"  value="<?php echo isset($info['vsi_run_by'])?$info['vsi_run_by']:''; ?>" />
                <span class="half"></span>			
			    <span class="four">Time In :</span>
                 <span class="four">
                <div class="bootstrap-timepicker">
				<input type="text" class="input-small time_input" name="time_in"  value="<?php echo isset($info['time_in'])?$info['time_in']:''; ?>" />
                 </div>
                </span>
                <span class="half"></span>			
			    <span class="four">RO # :</span>
				<input type="text" class="four" name="ro_no"  value="<?php echo isset($info['ro_no'])?$info['ro_no']:''; ?>" />
			</div>
             
            
            
		  <h2 style="text-align:center; text-decoration:underline;padding:20px;">Vehicle Get-Ready</h2>
           <span class="full">This form MUST be completed of the vehicle not the bike jacket. Any expense due to incorrect information will be responsibility of salesman signing this form</span>
            <div class="full">
            <label class="label20"> <input type="checkbox" name="pdi_1" value="New PDI"  <?php echo (isset($info['pdi_1'])&& $info['pdi_1']=='New PDI')?'checked="checked"':''; ?> />&nbsp; New PDI</label>
            <label class="label20"> <input type="checkbox" name="pdi_2" value="Used PDI"  <?php echo (isset($info['pdi_2'])&& $info['pdi_2']=='Used PDI')?'checked="checked"':''; ?>  />&nbsp; Used PDI</label>
            <label class="label30"><input type="checkbox" name="pdi_3" value="Certified Trade In"  <?php echo (isset($info['pdi_3'])&& $info['pdi_3']=='Certified Trade In')?'checked="checked"':''; ?> />&nbsp; Certified Trade In</label>
            <label class="label30"> <input type="checkbox" name="pdi_4" value="Pre-Purchase Inspection"  <?php echo (isset($info['pdi_4'])&& $info['pdi_4']=='Pre-Purchase Inspection')?'checked="checked"':''; ?>  />&nbsp; Pre-Purchase Inspection</label>
            </div>
			 
				<div class="full">
				<span class="four">Date :</span>
				<input type="text" class="four date_input" name="filled_date"  value="<?php echo isset($info['filled_date'])?$info['filled_date']:''; ?>" />			
			    <span class="four" style="width:20%;">Stock Number :</span>
				<input type="text" class="four" name="stock_no"  value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>"/>
				</div>
                <br />
                <div class="full">
				<span class="four">Promised Date :</span>
				<input type="text" class="four date_input" name="pro_date"  value="<?php echo isset($info['pro_date'])?$info['pro_date']:''; ?>" />			
			    <span class="four" style="width:20%;">Promised Time :</span>
                 <span class="four">
                <div class="bootstrap-timepicker">
				<input  type="text" class="input-small time_input" name="pro_time"  value="<?php echo isset($info['pro_time'])?$info['pro_time']:''; ?>" />
                </div>
                </span>
				</div>
                <br />
                <div class="full">
				<span class="four">Customer Name :</span>
				<input type="text" class="four text_captialize" name="name"   value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>"/>			
			    <span class="four" style="width:20%;">Deal No. :</span>
				<input  type="text" class="four" name="deal_id"  value="<?php echo isset($info['deal_id'])?$info['deal_id']:''; ?>"/>
				</div>
                <br />
               <div class="full">
				<span class="six">Date :</span>
				<input type="text" class="six date_input" name="filled_date"  value="<?php echo isset($info['filled_date'])?$info['filled_date']:''; ?>"/>			
			    <span class="six">Model :</span>
				<input type="text" class="six" style="width:50%"  name="model"  value="<?php echo isset($info['model'])?$info['model']:''; ?>"/>
               
                <span class="six" style="width:98%"><span style="width:10%;float:left">VIN</span> <input type="text" class="four" name="vin" style="width:45%"  value="<?php echo isset($info['vin'])?$info['vin']:''; ?>"/>
               <span class="six">Color :</span>
				<input type="text" class="six" style="width:23%" name="color"  value="<?php echo isset($info['color'])?$info['color']:''; ?>"/> 
                
                </span>
                
				</div>
             
                <br/>
                  <div class="full">
                <span class="four">Special Insructions :</span>
                <textarea class="two-three" style="width:70%" rows="7" name="special_inst"><?php echo isset($info['special_inst'])?$info['special_inst']:''; ?></textarea>
                 </div> 
                            
                <br />
               
                
			
            <span class="full"> <input type="checkbox" name="vehicle_released" value="Released"  <?php echo (isset($info['vehicle_released'])&& $info['vehicle_released']=='Released')?'checked="checked"':''; ?>  /> &nbsp;Vehicle released form attached to this Get Ready after completion </span>
            <div class="full">
				<span class="four">Salesman :</span>
				<input type="text" class="four" name="sperson"  value="<?php echo $info['sperson']; ?>"/>			
			    <span class="four" style="width:20%;">Team Leader:</span>
				<input type="text" class="four" name="team_leader"  value="<?php echo isset($info['team_leader'])?$info['team_leader']:''; ?>"/>
				</div>
          
			
		</div>
		<!---left1-->
	