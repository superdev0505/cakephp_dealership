<?php

$zone = AuthComponent::user('zone');
//echo $zone;

$dealer = AuthComponent::user('dealer');
//echo $dealer;
$cid = AuthComponent::user('dealer_id');

$d_address = AuthComponent::user('d_address');
//echo $daddress;

$sperson = AuthComponent::user('full_name');

$d_city = AuthComponent::user('d_city');
//echo $dcity;

$d_state = AuthComponent::user('d_state');
//echo $dstate;

$d_zip = AuthComponent::user('d_zip');
//echo $dzip;

$d_phone = AuthComponent::user('d_phone');
//echo $dphone;

$d_fax = AuthComponent::user('d_fax');
//echo $dfax;

$d_email = AuthComponent::user('d_email');
//echo $demail;

$d_website = AuthComponent::user('d_website');
//echo $dwebsite;

$date = new DateTime();
date_default_timezone_set($zone);
$expectedt = date('m/d/Y');
//echo $expectedt;

$date = new DateTime();
date_default_timezone_set($zone);
$datetimefullview = date('M d, Y g:i A');
//echo $datetimefullview;
//echo "<pre>";
//print_r($info);
?>

<div class="wraper main" id="worksheet_wraper"  style=" overflow: auto;"> 
	<?php echo $this->Form->create("CustomForm", array('type'=>'post','class'=>'apply-nolazy')); ?>
      <?php  if($edit){?>
    <input type="hidden" id="id" value="<?php echo isset($info['id'])?$info['id']:''; ?>" name="id" />
    <?php } ?>
    <input type="hidden" id="contact_id" value="<?php echo isset($info['contact_id'])?$info['contact_id']:''; ?>" name="contact_id">
    <input type="hidden" id="user_id" value="<?php echo isset($info['user_id'])?$info['user_id']:AuthComponent::user('id'); ?>" name="user_id">
    <input type="hidden" id="dealer_id" value="<?php echo isset($info['dealer_id'])?$info['dealer_id']:AuthComponent::user('dealer_id'); ?>" name="dealer_id">
    <input type="hidden" id="form_id" value="<?php echo isset($info['form_id'])? $info['form_id']:$form_info['CustomForm']['id']; ?>" name="form_id">
	<div id="worksheet_container" style="width:90%; margin:0 auto;">
	<style>

	.headline_span{text-decoration:underline;}		
	.sub_point{margin-left:30px!important;margin-top:5px;margin-bottom:10px;}
	.small_text{font-size:12px;}
	ul.point_list{list-style-type:square!important;}		
	@media print { 
		.small_text{font-size:10px;}
		.motor_1{height:120px;}
		.motor_2{height:155px;}
		input[type=text]{border:none;border-bottom:1px solid #000;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				
               <table width="100%" border="1">
               		<tr>
                    	<td colspan="4">
                        	<label style="width:100%;display:inline;">Customer &nbsp; <input type="text" name="name" value="<?php echo $info['first_name'].' '.$info['last_name']; ?>" style="width:65%;" /></label>
                        </td>
                        <td colspan="2"><label style="width:100%;display:inline;">SP &nbsp; <input type="text" name="sperson" value="<?php echo $info['sperson']; ?>" style="width:75%;" /></label></td>
                    	<td><label style="width:100%;display:inline;">Date &nbsp; <input type="text" name="submit_dt" value="<?php echo isset($info['submit_dt'])?$info['submit_dt']:$expectedt; ?>" style="width:65%;" /></label></td>
                    </tr>
                    <tr>
                        <td width="8%"><label>Unit</label></td>
                        <td width="20%"><label>Make</label></td>
                        <td width="26%"><label>Model</label></td>
                        <td width="10%"><label>Year</label></td>
                        <td width="8%"><label>New</label></td>
                        <td width="8%"><label>Used</label></td>
                         <td width="20%"><label>MSRP</label></td>
                                        
                    </tr>
                    <tr>
                    	<td>1</td>
                        <td><input type="text" name="make" value="<?php echo isset($info['make'])?$info['make']:''; ?>" style="width:90%" /></td>
                        <td><input type="text" name="model" value="<?php echo isset($info['model'])?$info['model']:''; ?>" style="width:90%" /></td>
                        <td><input type="text" name="year" value="<?php echo isset($info['year'])?$info['year']:''; ?>" style="width:90%" /></td>
                        <td align="center"><input type="radio" name="condition" value="New" <?php echo (isset($info['condition']) && $info['condition'] == 'New')?'checked':''; ?> /></td>
                        <td align="center"><input type="radio" name="condition" value="Used" <?php echo (isset($info['condition']) && $info['condition'] == 'Used')?'checked':''; ?> /></td>
                    	<td><input type="text" name="unit_value" value="<?php echo isset($info['unit_value'])?$info['unit_value']:''; ?>" style="width:90%" /></td>
                    
                    </tr>
                    <tr>
                    	<td>2</td>
                        <td><input type="text" name="make2" value="<?php echo isset($info['make2'])?$info['make2']:''; ?>" style="width:90%" /></td>
                        <td><input type="text" name="model2" value="<?php echo isset($info['model2'])?$info['model2']:''; ?>" style="width:90%" /></td>
                        <td><input type="text" name="year2" value="<?php echo isset($info['year2'])?$info['year2']:''; ?>" style="width:90%" /></td>
                        <td align="center"><input type="radio" name="condition2" value="New" <?php echo (isset($info['condition2']) && $info['condition2'] == 'New')?'checked':''; ?> /></td>
                        <td align="center"><input type="radio" name="condition2" value="Used" <?php echo (isset($info['condition2']) && $info['condition2'] == 'Used')?'checked':''; ?> /></td>
                    	<td><input type="text" name="unit_value2" value="<?php echo isset($info['unit_value2'])?$info['unit_value2']:''; ?>" style="width:90%" /></td>
                    
                    </tr>
                    <tr>
                    	<td>3</td>
                        <td><input type="text" name="make3" value="<?php echo isset($info['make3'])?$info['make3']:''; ?>" style="width:90%" /></td>
                        <td><input type="text" name="model3" value="<?php echo isset($info['model3'])?$info['model3']:''; ?>" style="width:90%" /></td>
                        <td><input type="text" name="year3" value="<?php echo isset($info['year3'])?$info['year3']:''; ?>" style="width:90%" /></td>
                        <td align="center"><input type="radio" name="condition3" value="New" <?php echo (isset($info['condition3']) && $info['condition3'] == 'New')?'checked':''; ?> /></td>
                        <td align="center"><input type="radio" name="condition3" value="Used" <?php echo (isset($info['condition3']) && $info['condition3'] == 'Used')?'checked':''; ?> /></td>
                    	<td><input type="text" name="unit_value3" value="<?php echo isset($info['unit_value3'])?$info['unit_value3']:''; ?>" style="width:90%" /></td>
                    
                    </tr>
               </table>
               <table width="100%" border="1">
               		<tr>
                    	<td width="40%;" rowspan="3">
                        	<label style="width:100%;float:left;">KAWASAKI REV / INS.</label><br/>
                            <label class="small_text" style="width:75%;float:left;">800-333-4774 / 800-255-6756</label>
                            <label class="small_text" style="width:25%;float:left;">INS.</label><br/>
                            <label class="small_text" style="width:30%;float:left;">MERCH#</label>
                            <label class="small_text"style="width:70%;float:left;">82743</label><br/>
                            <label class="small_text" style="width:30%;float:left;">ORG#</label>
                            <label class="small_text"style="width:45%;float:left;">800</label>
                            <label class="small_text" style="width:25%;float:left;">REV.</label><br/>
                            <label class="small_text"style="width:30%;float:left;">ASC#</label>
                            <label class="small_text" style="width:70%;float:left;">018</label>
                            
                        </td>
                        <td width="40%;" rowspan="3">
                        	  <label style="width:100%;float:left;">NO INS. REQ.</label><br/>
                              <span class="small_text" style="width:30%;float:left;">REF #</span>
                              <input type="text" name="r_ref_num" value="<?php echo isset($info['r_ref_num'])?$info['r_ref_num']:''; ?>" style="width:68%;float:left;" /><br/>
                              <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="credit_line" value="<?php echo isset($info['credit_line'])?$info['credit_line']:''; ?>" style="width:30%;float:left;" />
                              <span class="small_text" style="width:17%;float:left;">TIER</span>
                              <input type="text" name="tier" value="<?php echo isset($info['tier'])?$info['tier']:''; ?>" style="width:23%;float:left;" /><br/>
                              
                 			<span class="small_text" style="width:30%;float:left;">ACCT #</span>
                              <input type="text" name="acct_num" value="<?php echo isset($info['acct_num'])?$info['acct_num']:''; ?>" style="width:68%;float:left;" /><br/>
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="credit_line2" value="<?php echo isset($info['credit_line2'])?$info['credit_line2']:''; ?>" style="width:68%;float:left;" /> 
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="sent1" value="<?php echo isset($info['sent1'])?$info['sent1']:''; ?>" style="width:90%;" /> <br/>
                        <input type="text" name="sent2" value="<?php echo isset($info['sent2'])?$info['sent2']:''; ?>" style="width:90%;" /> 
                        
                        </td>
                        <td><input type="text" name="app1" value="<?php echo isset($info['app1'])?$info['app1']:''; ?>" style="width:90%;" /> <br/>
                        <input type="text" name="app1" value="<?php echo isset($info['app1'])?$info['app1']:''; ?>" style="width:90%;" /> 
                        
                        </td>
                        <td><input type="text" name="td1" value="<?php echo isset($info['td1'])?$info['td1']:''; ?>" style="width:90%;" /> <br/>
                        <input type="text" name="td1" value="<?php echo isset($info['td1'])?$info['td1']:''; ?>" style="width:90%;" /> 
                        
                        </td>
                    </tr>
                     <tr>
                    	<td><input type="text" name="sent3" value="<?php echo isset($info['sent3'])?$info['sent3']:''; ?>" style="width:90%;" /> <br/>
                        <input type="text" name="sent4" value="<?php echo isset($info['sent4'])?$info['sent4']:''; ?>" style="width:90%;" /> 
                        
                        </td>
                        <td><input type="text" name="app3" value="<?php echo isset($info['app3'])?$info['app3']:''; ?>" style="width:90%;" /> <br/>
                        <input type="text" name="app4" value="<?php echo isset($info['app4'])?$info['app4']:''; ?>" style="width:90%;" /> 
                        
                        </td>
                        <td><input type="text" name="td3" value="<?php echo isset($info['td3'])?$info['td3']:''; ?>" style="width:90%;" /> <br/>
                        <input type="text" name="td4" value="<?php echo isset($info['td4'])?$info['td4']:''; ?>" style="width:90%;" /> 
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">RMP-1 DRIVE CARD</label><br/>
                       
                            <label class="small_text" style="width:30%;float:left;">MERCH#</label>
                            <label class="small_text"style="width:70%;float:left;">6035512771000925</label><br/>
                            <label class="small_text"style="width:70%;float:left;">888-333-3775</label>
                            <label class="small_text" style="width:20%;float:left;">DEALER</label>
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">NO INS. REQ.  2 FORMS OF ID AND SIGN APP</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="credit_line5" value="<?php echo isset($info['credit_line5'])?$info['credit_line5']:''; ?>" style="width:68%;float:left;" /> 
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="1sent1" value="<?php echo isset($info['1sent1'])?$info['1sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="1sent1" value="<?php echo isset($info['1sent1'])?$info['1sent1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="1sent1" value="<?php echo isset($info['1sent1'])?$info['1sent1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                        <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">DESERT SCHOOLS</label><br/>
                       
                            <label class="small_text" style="width:100%;float:left;">602-433-5622</label>
                          <br/>
                            <label class="small_text"style="width:70%;float:left;">602-335-2475 - FAX</label>
                            <label class="small_text" style="width:20%;float:left;">DEALER</label>
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS. REQ./ MUST OPEN AN ACCT.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="1credit_line5" value="<?php echo isset($info['1credit_line5'])?$info['1credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                             <span class="small_text" style="width:30%;float:left;">TIER</span>
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="2sent1" value="<?php echo isset($info['2sent1'])?$info['2sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="2sent1" value="<?php echo isset($info['2sent1'])?$info['2sent1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="2sent1" value="<?php echo isset($info['2sent1'])?$info['2sent1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                     <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">HUGHES FEDERAL CREDIT UNION</label><br/>
                       
                            <label class="small_text" style="width:100%;float:left;">520-794-8341</label>
                          <br/>
                            <label class="small_text"style="width:70%;float:left;">520-292-9289 - FAX</label>
                            <label class="small_text" style="width:20%;float:left;">DECISION</label>
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS. REQ./ MUST OPEN AN ACCT.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="3credit_line5" value="<?php echo isset($info['3credit_line5'])?$info['3credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                            
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="4sent1" value="<?php echo isset($info['4sent1'])?$info['4sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="4app1" value="<?php echo isset($info['4app1'])?$info['4app1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="5td1" value="<?php echo isset($info['5td1'])?$info['5td1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                     <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">FIRST CREDIT UNION</label><br/>
                       
                            <label class="small_text" style="width:100%;float:left;">480-831-2769</label>
                          <br/>
                            <label class="small_text"style="width:70%;float:left;">480-786-2351-FAX</label>
                            <label class="small_text" style="width:20%;float:left;">DECISION</label>
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS. REQ./ MUST OPEN AN ACCT.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="2credit_line5" value="<?php echo isset($info['2credit_line5'])?$info['2credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                            
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="3sent1" value="<?php echo isset($info['3sent1'])?$info['3sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="3app1" value="<?php echo isset($info['3app1'])?$info['3app1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="3td1" value="<?php echo isset($info['3td1'])?$info['3td1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                     <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">VANTAGE WEST CREDIT UNION</label><br/>
                       
                            &nbsp;
                          <br/>
                            <label class="small_text"style="width:70%;float:left;">520-917-2427 - FAX</label>
                            <label class="small_text" style="width:20%;float:left;">DECISION</label>
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS. REQ./ MUST OPEN AN ACCT.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="3credit_line5" value="<?php echo isset($info['3credit_line5'])?$info['3credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                            
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="5sent1" value="<?php echo isset($info['5sent1'])?$info['5sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="5app1" value="<?php echo isset($info['5app1'])?$info['5app1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="5td1" value="<?php echo isset($info['5td1'])?$info['5td1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td width="40%;" rowspan="3">
                        	<label style="width:80%;float:left;">SHEFFIELD FINANCIAL</label><label style="width:20%;float:left;">125% MAX</label><br/>
                            <label class="small_text" style="width:100%;float:left;">800-438-8892 - PHONE</label><br/>
                            
                            <label class="small_text" style="width:75%;float:left;">800-438-8894 - FAX</label>
                            <label class="small_text" style="width:25%;float:left;">REV.</label><br/>
                            <label class="small_text"style="width:100%;float:left;">MERCH#</label><br/>
                            <label class="small_text"style="width:80%;float:left;">&nbsp;</label>
                            <label class="small_text"style="width:20%;float:left;">INSTAL</label>
                            
                        </td>
                        <td width="40%;" rowspan="3">
                        	  <label style="width:100%;float:left;">NO INS. REQ.</label><br/>
                              &nbsp;
                              <br/>
                              <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="credit_line" value="<?php echo isset($info['7credit_line'])?$info['7credit_line']:''; ?>" style="width:70%;float:left;" />
                             <br/>
                            	&nbsp;  
                 			<br/>
                            &nbsp;
                            <br/>
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="credit_line2" value="<?php echo isset($info['8credit_line2'])?$info['8credit_line2']:''; ?>" style="width:68%;float:left;" /> 
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td><input type="text" name="8sent1" value="<?php echo isset($info['8sent1'])?$info['8sent1']:''; ?>" style="width:90%;" /> <br/>
                        &nbsp;
                        
                        </td>
                        <td><input type="text" name="8app1" value="<?php echo isset($info['8app1'])?$info['8app1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="8td1" value="<?php echo isset($info['8td1'])?$info['8td1']:''; ?>" style="width:90%;" /> <br/>
                        &nbsp;
                        
                        </td>
                    </tr>
                     <tr>
                    	<td><input type="text" name="9sent3" value="<?php echo isset($info['9sent3'])?$info['9sent3']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp; 
                        
                        </td>
                        <td><input type="text" name="9app3" value="<?php echo isset($info['9app3'])?$info['9app3']:''; ?>" style="width:90%;" /> <br/>
                        &nbsp;
                        
                        </td>
                        <td><input type="text" name="9td3" value="<?php echo isset($info['9td3'])?$info['9td3']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">DWIGHT FINANCIAL</label><br/>
                       
                            <label class="small_text" style="width:100%;float:left;">602-789-0712</label>
                          <br/>
                            <label class="small_text"style="width:70%;float:left;">602-789-0794 - FAX</label>
                            <label class="small_text" style="width:20%;float:left;">DEALER</label>
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS REQ.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="21credit_line5" value="<?php echo isset($info['21credit_line5'])?$info['21credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                            
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="8sent1" value="<?php echo isset($info['8sent1'])?$info['8sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="8app1" value="<?php echo isset($info['8app1'])?$info['8app1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="8td1" value="<?php echo isset($info['8td1'])?$info['8td1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                   
                    
                     <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">AMERICAN GENERAL</label><br/>
                       
                            <label class="small_text" style="width:100%;float:left;">480-899-2350</label>
                          <br/>
                            <label class="small_text"style="width:100%;float:left;">489-899-0670  FAX</label>
                           
                            
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS REQ.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="22credit_line5" value="<?php echo isset($info['22credit_line5'])?$info['22credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                            
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="11sent1" value="<?php echo isset($info['11sent1'])?$info['11sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="11app1" value="<?php echo isset($info['11app1'])?$info['11app1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="11td1" value="<?php echo isset($info['11td1'])?$info['11td1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                    <tr>
                    	<td width="40%;" rowspan="2" valign="top">
                        	<label style="width:100%;float:left;">AL FINANCIAL</label><br/>
                       
                            <label class="small_text" style="width:100%;float:left;">602-678-0400</label>
                          <br/>
                            <label class="small_text"style="width:80%;float:left;">602-678-0202 - FAX</label>
                           
                            <label class="small_text"style="width:20%;float:left;">FAX APP</label>
                        </td>
                        <td width="40%;" rowspan="2" valign="top">
                        	  <label style="width:100%;float:left;">INS REQ.</label><br/>
                              
                             <span class="small_text" style="width:30%;float:left;">CREDIT LINE</span>
                              <input type="text" name="32credit_line5" value="<?php echo isset($info['32credit_line5'])?$info['32credit_line5']:''; ?>" style="width:68%;float:left;" /><br/>
                            
                 	             
                              
                                                    
                        </td>
                        <td width="7%;" >
                        <label>SENT</label>
                        </td>
                        <td width="7%;" >
                        <label>APP</label>
                        </td>
                        <td width="6%;" >
                        <label>TD</label>
                        </td>
                    </tr>
                    <tr>
                    	<td><input type="text" name="12sent1" value="<?php echo isset($info['12sent1'])?$info['12sent1']:''; ?>" style="width:90%;" /> <br/>
                       &nbsp;
                        
                        </td>
                        <td><input type="text" name="12app1" value="<?php echo isset($info['12app1'])?$info['12app1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                        <td><input type="text" name="12td1" value="<?php echo isset($info['12td1'])?$info['12td1']:''; ?>" style="width:90%;" /> <br/> &nbsp;
                        
                        </td>
                    </tr>
                    
                    
               </table>
                
                
              
                
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;">Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>

<script type="text/javascript">




$(document).ready(function(){

	//alert("please select a fee");	
	
	$(".date_input_field").bdatepicker();
	
	
	

	
	
	
		
	

	
	
	
	
	
	
	
	
	
	
	
		
	/*$('#est_payoff').on('change keyup paste',function(){
		
		//update_10days_payoff();
		//update_initial_investment();
		//if($("#doc").val()!=''&&$("freight").val()!='')
		//calculate_tax(tax_percent);
		//calculateMonthWisePayments();
	});*/
		
	
	
	
	

	
	/*
	if( $('#sell_price').val() != '' && $('#sell_price').val() > 0 ){
		downpayment = ($('#sell_price').val() / 100 ) * 25;
		$('#down_pay').val( downpayment.toFixed(2)  ) ;
	}
	*/
		
	
	$('#worksheet_wraper').stop().animate({
	  scrollTop: $("#worksheet_wraper")[0].scrollHeight
	}, 800);
	

	$("#worksheet_container").scrollTop(0);


	$("#btn_print").click(function(){
		$( "#worksheet_container" ).printThis();
	});
	
	$("#btn_back").click(function(){
		
	});


	//calculate();
	
	
     
});

	
	
	
	
	
</script>
</div>
