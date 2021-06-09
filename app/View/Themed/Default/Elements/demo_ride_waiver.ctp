<div class="page-break"></div>
<div class="wraper header"> 

		 <h2 style="text-align:center; text-decoration:underline;padding:20px;">AGREEMENT AND RELEASE OF LIABILITY</h2>
			 
				<div class="full">
				<span class="full">I(X) <input type="text" style="width:25%" class="text_captialize"  name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> date <input type="text" class="date_input_field" style="width:14%" name="filled_date" value="<?php echo isset($info['filled_data'])?$info['filled_data']:date('m/d/Y'); ?>" /> (the undersigned), wish to participate in the Ducati Hypermotard/Vectrix Scooter/Zap Scooter/Lance Scooter/Can Am Spyder Demo Rides organized by Del Amo Motorsports on <input type="text" style="width:14%" class="date_input_field" name="ride_date" value="<?php echo isset($info['ride_date'])?$info['ride_date']:''; ?>" /> - In return for my being permitted to do so, I voluntarily give this Release of Liability. I also agree to comply with the Del Amo Motorsports Motorcycle Ride Rules and Regulations and abide by all rules verbally set forth by the Del Amo representative.</span>			
                </div>
                <div class="full">
				<span class="full">I(x) <input type="text" style="width:25%" class="text_captializes"  name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> am aware that motorcycling can be dangerous. I could be injured, killed, have property damaged or be held responsible for harm to others. I am voluntarily participating in the Ducati Motorcycle Ride with knowledge of the dangers, and I accept all of the risks.  I am about to engage in motorcycling, an activity that is dangerous and could pose risks to my person and property. I acknowledge that I do so freely and voluntarily, on a personal basis, and that you have made no promises to me regarding my safety or the extent of the risk involved. I have given proof of a valid drivers license with motorcycle endorsement.</span>
                </div>
                <div class="full">
				<span class="full">I(x) <input type="text" style="width:25%"  name="name" class="text_captialize" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> also hereby RELEASE, WAIVE, DISCHARGE AND PROMISE NOT TO SUE the entities and persons listed below from any and all liability to me - in damages or otherwise - in connection with my participation in the Ride. This includes for any injury, death or property loss to me, and for any injury, death or property loss to others claimed to be my responsibility. This also includes for any indemnification, contribution, subrogation or exoneration that may be sought by me or through me. To the fullest extent permitted by law, this also includes if any such injury, death, loss of responsibility is cause or contributed to by the negligence or other wrongful conduct of any of the below- listed persons or entities. </span>
                </div>
                <div class="full">
                <span class="full">I(X) <input type="text" style="width:25%" class="text_captialize"  name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> date <input type="text" style="width:14%" class="date_input_field" name="filled_date1" value="<?php echo isset($info['filled_data1'])?$info['filled_data1']:date('m/d/Y'); ?>" /> further agree to DEFEND, INDEMNIFY AND HOLD the below listed persons and entities HARMLESS from and against all claims, demands, loses and expenses, included attorney fees, asserted or incurred by reason of such injury, death, loss or responsibility. This again includes if caused or contributed to by the negligence or other wrongful conduct of any such persons or entities. </span>
                </div>
                <div class="full">
                <span class="full">These persons and entities include: Del Amo Motorsports, Too Fast Inc., Ducati Motor Holding SpA, Ducati North America Inc.,Vectrix, Can Am BRP,Lance Powersports, ZAP INC, local dealer organizing the Ride, all organizations affiliated with them, all sponsors or contributors to the Ride, all governmental agencies involved or assisting with the Ride, all employees, officers, agents or volunteers of all the forgoing, and all other persons and entities otherwise involved in organizing, operating or assisting with the Ride. </span>
                </div>
                <div class="full">
                <span class="full">I(X) <input type="text" class="text_captialize" style="width:25%" name="name" value="<?php //echo isset($info['name'])?$info['name']:''; ?>" /> AM RESPONSIBLE FOR ANY DAMAGE TO THE MOTORCYCLE DUE TO RIDER NEGLIGENCE. DEL AMO MOTORSPORTS AND DUCATI WILL SEEK FULL PAYMENT FOR ANY AND ALL DAMAGE TO THE UNIT.</span>
                </div>
                
                <div class="full">
                <span class="full">I HAVE CAREFULLY READ THE ABOVE. I FULLY UNDERSTAND IT, AND I AM SIGNING OF MY OWN FREE WILL.</span>
                </div>
                <div class="full">
                <span class="six">Date</span>
                <input type="text" class="four date_input_field" name="filled_date2" value="<?php echo isset($info['filled_data2'])?$info['filled_data2']:date('m/d/Y'); ?>" />
                <span class="four">Signature</span>
                <input type="text" class="four" name="signature" value="<?php echo isset($info['signature'])?$info['signature']:''; ?>" />
                </div>
               
                <span class="span24">Full name</span>
                <input class="input71 text_captialize" type="text" name="name" value="<?php echo isset($info['name'])?$info['name']:''; ?>" />
                <span class="span24">Email</span>
                <input class="input71" type="text" name="email" value="<?php echo isset($info['email'])?$info['email']:''; ?>" />
                <span class="span24">Street Address</span>
                <input class="input71" type="text" name="address" value="<?php echo isset($info['address'])?$info['address']:''; ?>" />
                <span class="span24">Phone </span>
                <?php
				$phone_number1 = preg_replace('/[^0-9]+/', '', $info['mobile']); //Strip all non number characters
$cleaned1 = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone_number1);
				 ?>
                <input class="input71" type="text" name="mobile" value="<?php echo isset($info['mobile'])?$cleaned1:''; ?>" />
                <span class="span24">City, State, and Zip </span>
                <input class="input71" type="text" name="city_state"  value="<?php echo isset($info['city_state'])?$info['city_state']:''; ?>"  />
                <span class="span24">Drivers License and State </span>
                <input class="input71" type="text" name="dl_state"  value="<?php echo isset($info['dl_state'])?$info['dl_state']:''; ?>" />
                <br /> <br />
         <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
                 <div class="page-break"></div>
                 <br/> <br/>
               <h1 style="text-decoration:underline;text-align:center;padding-top:15px;">Del Amo Demo Ride Checklist </h1>
               <br /><br />
              
               <h4><strong>1) IS THIS A BUYING DECISION? IF SO, TWO FORMS OF ID AND TAKE COPY’S</strong></h4>
               <div class="full">
               <label><input type="checkbox" name ="california_licence" value="california_licence" <?php echo (isset($info['california_licence']) && $info['california_licence']=='california_licence')?'checked="checked"':'';  ?> />&nbsp;CALIFORNIA ISSUED DRIVERS LICENSE WITH MOTORCYCLE ENDORSEMENT</label><br />
                <label><input type="checkbox" name ="major_card" value="major_card" <?php echo (isset($info['major_card']) && $info['major_card']=='major_card')?'checked="checked"':'';  ?> />&nbsp;MAJOR CREDIT OR DEBIT CARD</label><br />
                
                 <label><input type="checkbox" name ="waiver_form_signed" value="waiver_form_signed" <?php echo (isset($info['waiver_form_signed']) && $info['waiver_form_signed']=='waiver_form_signed')?'checked="checked"':'';  ?> />&nbsp;DEMO WAIVER FORM INITIALED AND SIGNED AND FULLY COMPLETED</label><br />
                  <label><input type="checkbox" name ="explain_demo_route" value="explain_demo_route" <?php echo (isset($info['explain_demo_route']) && $info['explain_demo_route']=='explain_demo_route')?'checked="checked"':'';  ?> />&nbsp;FULLY EXPLAIN DEMO RIDE ROUTE</label><br />
                   <label><input type="checkbox" name ="pdi_walk_thorugh" value="pdi_walk_thorugh" <?php echo (isset($info['pdi_walk_thorugh']) && $info['pdi_walk_thorugh']=='pdi_walk_thorugh')?'checked="checked"':'';  ?> />&nbsp;COMPLETE PDI WALK THROUGH FOR CUSTOMER TO UNDERSTAND VEHICLE OPERATION </label><br />
                    <label><input type="checkbox" name ="manager_approval" value="manager_approval" <?php echo (isset($info['manager_approval']) && $info['manager_approval']=='manager_approval')?'checked="checked"':'';  ?> />&nbsp;MANAGERS APPROVAL</label>      
               </div> 
             
              <br/>
              <h4><strong>1) Test Ride Route</strong></h4>  
              <div class="full">
              <?php echo $this->Html->image(FULL_BASE_URL.'/app/webroot/img/route_map.png'); ?>
              </div> 
                <br />
              <span class="span24">Customer Initials </span>
                <input class="input71" type="text" name="customer_initials"  value="<?php //echo isset($info['dl_state'])?$info['dl_state']:''; ?>" /> 
                
			
			
		</div>
		<!---left1-->
		</br>
         <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>
		<!-- no print buttons end -->
	
		<!-- no print buttons -->
	<br/>	
		
	



