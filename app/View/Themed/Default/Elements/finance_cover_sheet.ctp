<div class="page-break"></div>
<style>
.fborder_bottom {
border-bottom:#000 1px solid;
margin-bottom:10px;

}
.fborder_bottom span{font-size:22px!important;}
</style>
<div class="wraper header"> 

		
			
				<div class="fborder_bottom">
				<span class="span24">Salesman :</span>
				<span class="span24"><?php echo isset($info['sperson'])?$info['sperson']:''; ?></span>			
			    <span class="span24" style="width:20%;">Customer Name :</span>
				<span class="span24"><?php echo isset($info['name'])?ucfirst($info['name']):$info['first_name'].' '.$info['last_name']; ?></span>
                </div>
			
              
                <div class="fborder_bottom">
                <span class="span24 " style="width:17%">Make & Model</span>
                <span class="span24 " style="width:48%"><?php echo isset($info['make_model'])?$info['make_model']:$info['make'].' '.$info['model']; ?></span>
                <span class="span24" style="width:16%">Down Payment</span>
                <span class="span24" style="width:15%%"></span>
                </div>
                         
               <span class="span24" style="width:72%"> <h2 style="text-align:center; text-decoration:underline;padding:10px;">FINANCE STATUS SHEET</h2></span><span class="span24 fborder_bottom" style="width:28%">Date &nbsp;&nbsp;<?php echo isset($info['sheet_date'])?$info['sheet_date']:date('m/d/Y'); ?> </span><br />
            	  <div class="fborder_bottom">
               	 	<span class="span24">Synchrony Yamaha</span>
             	 	<span class="input71">&nbsp;</span>
                  </div>
                <div class="fborder_bottom">  
                    <span class="span24">Cap One Yamaha  </span>
                    <span class="input71">&nbsp;</span>
                </div>
                 <div class="fborder_bottom">  
                    <span class="span24">Corp Yamaha </span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom">  
                    <span class="span24">Synchrony Kawasaki  </span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom"> 
                    <span class="span24">Cap One Kawasaki</span>
                     <span class="input71">&nbsp;</span>
                 </div>
                <div class="fborder_bottom">  
                    <span class="span24">Sheffield Kawasaki </span>
                     <span class="input71">&nbsp;</span>
                 </div>
                <div class="fborder_bottom">   
                    <span class="span24">West Lake</span>
                    <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                 </div>
                 <div class="fborder_bottom">    
                    <span class="span24">Sheffield Suzuki</span>
                   <span class="input71">&nbsp;</span>
               </div>
                <div class="fborder_bottom">    
                    <span class="span24">Cap One BRP</span>
                    <span class="input71">&nbsp;</span>
                </div>
                 <div class="fborder_bottom"> 
                    <span class="span24">Sheffield BRP</span>
                    <span class="input71">&nbsp;</span>
                </div>
                <div class="fborder_bottom"> 
                    <span class="span24">MB Financial </span>
                   <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                 </div>
                  <div class="fborder_bottom"> 
                    <span class="span24">LBS Financial  </span>
                  <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                </div>
                <div class="fborder_bottom"> 
                  <span class="span24">VW Credit  </span>
                 <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                </div>
                <div class="fborder_bottom"> 
                    <span class="span24">Freedom Road </span>
                   <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                </div>
               
                 <div class="fborder_bottom">
                     <span class="span24">Model </span>
                    <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                </div>
                <div class="fborder_bottom">
                    <span class="span24">Dwight </span>
                   <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                 </div>
                 <div class="fborder_bottom">
                    <span class="span24">A & L financial </span>
                   <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                  </div>
                 <div class="fborder_bottom">  
                     <span class="span24">Marine One </span>
                    <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
                 </div>
                 <div class="fborder_bottom">  
                    <span class="span24">Synchrony KTM </span>
                     <span class="input71">&nbsp;</span>
                </div>
                
              <div class="fborder_bottom">  
                <span class="span24">Other </span>
               <span class="input71" style="text-align:right;padding-right:15px;float:right;">See Below for Stips</span>
              </div>
                <div class="fborder_bottom">  
				 <h4 style="text-align:center;padding:10px">Stipulation Required for Loan Approval</h4>
             </div>
            <div class="full">
            <label class="label30"> <input type="checkbox" name="stipulation_1" value="Full coverage Insurance"  <?php echo (isset($info['stipulation_1'])&& $info['stipulation_1']=='Full coverage Insurance')?'checked="checked"':''; ?> />&nbsp; Full coverage Insurance</label>
            <label class="label20"> <input type="checkbox" name="stipulation_2" value="6 References"  <?php echo (isset($info['stipulation_2'])&& $info['stipulation_2']=='6 References')?'checked="checked"':''; ?> />&nbsp; 6 References</label>
            <label class="label20"> <input type="checkbox" name="stipulation_3" value="Proof of Income"  <?php echo (isset($info['stipulation_3'])&& $info['stipulation_3']=='Proof of Income')?'checked="checked"':''; ?>   />&nbsp; Proof of Income</label>
            <label class="label30"> <input type="checkbox" name="stipulation_4" value="Address Verification"  <?php echo (isset($info['stipulation_4'])&& $info['stipulation_4']=='Address Verification')?'checked="checked"':''; ?>  />&nbsp; Address Verification</label>
            <label class="label30"> <input type="checkbox" name="stipulation_5" value="Insurance Card"  <?php echo (isset($info['stipulation_5'])&& $info['stipulation_5']=='Insurance Card')?'checked="checked"':''; ?>  />&nbsp; Insurance Card</label>
            <label class="label20"> <input type="checkbox" name="stipulation_6" value="Driver License"  <?php echo (isset($info['stipulation_6'])&& $info['stipulation_6']=='Driver License')?'checked="checked"':''; ?>    />&nbsp; Driver’s License</label>
           	<label class="label20"> <input type="checkbox" name="stipulation_7" value="Voided Check"  <?php echo (isset($info['stipulation_7'])&& $info['stipulation_7']=='Voided Check')?'checked="checked"':''; ?>  />&nbsp; Voided Check </label>
            <label class="label30"> <input type="checkbox" name="stipulation_8" value="Bank Statements"  <?php echo (isset($info['stipulation_8'])&& $info['stipulation_8']=='Bank Statements')?'checked="checked"':''; ?>  />&nbsp; Bank Statements</label>
            <label class="label30"> <input type="checkbox" name="stipulation_9" value="Tax Returns"  <?php echo (isset($info['stipulation_9'])&& $info['stipulation_9']=='Tax Returns')?'checked="checked"':''; ?>   />&nbsp; Tax Returns</label>
            <label class="label20"> <input type="checkbox" name="stipulation_10" value="Sign Credit App"  <?php echo (isset($info['stipulation_10'])&& $info['stipulation_10']=='Sign Credit App')?'checked="checked"':''; ?>   />&nbsp; Sign Credit App</label>
            <label class="label20">&nbsp;</label>
            <label class="label30 fborder_bottom">Other</label>
            </div>
			
		</div>
	    <p align="center">Date / Time - <?php echo date('M d, Y h:i A'); ?></p>	