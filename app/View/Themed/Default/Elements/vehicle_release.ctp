<div class="page-break"></div>


		<div class="wraper header"> 

		  <h2 style="text-align:center; text-decoration:underline;padding:20px;">Vehicle Release For Customer Purchase</h2>
           <h4 style="text-align:center;padding:20px;">This Form Must be Started by the Salesperson for Step1</h4>
           <h4 style="text-align:center;padding:20px;">Step 1</h4>
			 <span class="span24">Customer Name :</span>
                <input type="text" class="input71 text_captialize" name="name" value="<?php echo isset($info['name'])?$info['name']:$info['first_name'].' '.$info['last_name']; ?>"/>
                <br/>
				<div class="full">
				<span class="four">Date :</span>
				<input name="filled_data" type="text" class="four" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m/d/Y'); ?>"/>			
			    <span class="four" style="width:20%;">Stock Number :</span>
				<input name="stock_num" type="text" class="four" value="<?php echo isset($info['stock_num'])?$info['stock_num']:''; ?>" placeholder=""/>
				</div>
                <br />
               <div class="full">
				<span class="six" style="width:8%;">VIN # :</span>
				<input name="vin" type="text" class="six" style="width:22%;" value="<?php echo isset($info['vin'])?$info['vin']:''; ?>" placeholder=""/>			
			    <span class="six" style="width:9%">Model:</span>
				<input type="text" class="six" style="width:28%" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" />
                <span class="six" style="width:9%">Color:</span>
				<input  type="text" class="six" style="width:16%" name="color" value="<?php echo isset($info['color'])?$info['color']:''; ?>" />
				</div>
              
            	<span class="span60">Salesman has verified above VIN matches G/R & unit rolled to PDI</span>
                <input name="vin_initial" type="text" class="input12" value="<?php echo isset($info['vin_initial'])?$info['vin_initial']:''; ?>" placeholder="Intials"/>
                <input name="vin_prints" type="text" class="input20" value="<?php echo isset($info['vin_prints'])?$info['vin_prints']:''; ?>"  placeholder="Prints"/>
                <br />
                <h4 style="text-align:center;padding:20px;">Step 2 Finance</h4>
                <span class="span60">F & I verified above listed unit matches docs printed for customer</span>
                <input name="fi_intials" type="text" class="input12" value="<?php echo isset($info['fi_intials'])?$info['fi_intials']:''; ?>"  placeholder="Intials"/>
                <input name="fi_prints" type="text" class="input20" value="<?php echo isset($info['fi_prints'])?$info['fi_prints']:''; ?>" placeholder="Prints"/>
                <br />
                <h4 style="text-align:center;padding:20px;">Step 3 Pre Delivery</h4>
                <span class="span60">PDI has verified above listed unit is being released to customer and matches DMV temporary registration</span>
                <input name="dmv_initials" type="text" class="input12" value="<?php echo isset($info['dmv_initials'])?$info['dmv_initials']:''; ?>"  placeholder="Intials"/>
                <input name="dmv_prints" type="text" class="input20" value="<?php echo isset($info['dmv_prints'])?$info['dmv_prints']:''; ?>" placeholder="Prints"/>
                <br />
                <h4 style="text-align:center;padding:20px;">Step 4 Customer</h4>
                <span class="span60">Customer have verified the unit being received</span>
                <input name="unit_initials" type="text" class="input12" value="<?php echo isset($info['unit_initials'])?$info['unit_initials']:''; ?>" placeholder="Intials"/>
                <input name="unit_prints" type="text" class="input20" value="<?php echo isset($info['unit_prints'])?$info['unit_prints']:''; ?>" placeholder="Prints"/>
                <br />
               
                
			 <h4 style="text-align:center;padding:20px;">Instructions</h4>
            <span class="full">1. &nbsp;Form is filled out and VIN is verified off unit being sold to cutomer ,then form is turned into finance with customer. </span>
            <span class="full">2. &nbsp;Finance verifies unit on form is correct with Docs being signed by customer. </span>
            <span class="full">3. &nbsp;Form is then paper clipped to temporary registration and inserted upright in customer doc's folder then walked back too PDI by Salesman for PDI verification . </span>
            <span class="full">4. &nbsp;Cutomer is then assisted by PDI during walk thru and shown location of VIN and customer signoff that correct unit is being received. </span>
            <span class="full">5. &nbsp;Form is attached to get ready for filling. </span>
			
		</div>

	