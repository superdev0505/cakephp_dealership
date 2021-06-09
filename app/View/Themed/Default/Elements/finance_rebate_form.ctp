<div class="page-break"></div>
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
		body {
	margin: 0 10%;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
}
.Finance_fm {
	width: 60%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
	margin: 0 10px;
}
.Finance_fm2 {
	width: 92%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
	margin: 0 10px;
}
.Finance_fm3 {
	width: 10%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
	margin: 0 10px;
}
.Finance_fm4 {
	width: 48%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
	margin: 0 10px;
}
.Finance_fm5 {
	width: 6%;
	border-bottom: solid 1px #000;
	border-top: none;
	border-right: none;
	border-left: none;
	margin: 0 10px;
}
@media print {
	body { margin:0px 0px; }
		#worksheet_container {width:94% !important;}
		#worksheet_wraper {width:94% !important;}	
	}
		
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:60%; padding:10px 0;">
	<img class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/finance_rebate.png'); ?>" alt="">
	</td>
    <td style="width:40%; padding:20px 0; text-align:center;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><input name="boat_show"   value="<?php echo isset($info["boat_show"]) ? $info['boat_show'] : ''?>"  type="text" class="Finance_fm" /></td>
        </tr>
        <tr>
          <td style="font-size:14px; color:#000; padding:10px 0;">Boat Show</td>
        </tr>
        <tr>
          <td><input name="customer_name"  value="<?php echo isset($info["customer_name"]) ? $info['customer_name'] : $info['first_name']." ".$info['last_name'];?>"  type="text" class="Finance_fm" /></td>
        </tr>
        <tr>
          <td style="font-size:14px; color:#000; padding:10px 0;">Customer</td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:20px; color:#000; font-weight:600; text-align:center; padding:40px 0 15px 0;">INCENTIVE, REBATE AND TITLE POLICY</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:16px; color:#000; padding:15px 0 15px 0;">All of our manufacturers offer rebates and incentives for sales that can be proven were sold and finalized at the boat show.</td>
  </tr>
  <tr>
    <td style="font-size:16px; color:#000; padding:15px 0 15px 0;">We understand that this is not always possible so we have negotiated with our manufacturers to extend the delivery of your purchase to no later than
      <input name="" type="text" class="Finance_fm3" />
      . </td>
  </tr>
  <tr>
    <td style="font-size:16px; color:#000; padding:15px 0 15px 0;">If funding is not arranged by the above date, River Valley risks losing all boat show incentives and rebates and therefore cannot guarantee that those savings can or will be passed on to you. </td>
  </tr>
  <tr>
    <td style="font-size:16px; color:#000; padding:15px 0 15px 0;">I agree with the above statement </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:35%; padding:10px 0;"><input name="" type="text" class="Finance_fm2" /></td>
    <td style="width:20%; padding:10px 0;"><input name="" type="text" class="Finance_fm2" /></td>
    <td style="width:55%; padding:10px 0;"><input name="" type="text" class="Finance_fm2" /></td>
  </tr>
  <tr>
    <td style="width:35%; padding:15px 0;"> Customer Signature </td>
    <td style="width:20%; text-align:center; padding:15px 0;"> Date </td>
    <td style="width:55%; text-align:center; padding:15px 0;"> River Valley Management </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:20px; color:#000; font-weight:600; text-align:center; padding:40px 0 15px 0;">TITLE POLICY</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:16px; color:#000; padding:15px 0 15px 0;">As important as it is that River Valley provides you with a clean and transferable title for your boat purchase, it is equally important that we receive a clean and transferable title for your trade, therefore we should expect to receive the title to your trade no later than
      <input name="" type="text" class="Finance_fm3" />
      or a surcharge not to exceed $150.00 will be assessed for duplicate title fees. </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="width:35%; padding:10px 0;"><input name="" type="text" class="Finance_fm2" /></td>
    <td style="width:20%; padding:10px 0;"><input name="" type="text" class="Finance_fm2" /></td>
    <td style="width:55%; padding:10px 0;"><input name="" type="text" class="Finance_fm2" /></td>
  </tr>
  <tr>
    <td style="width:35%; padding:15px 0 15px 10px;"> Customer Signature </td>
    <td style="width:20%; padding:15px 0 15px 10px;"> Date </td>
    <td style="width:55%; padding:15px 0 15px 10px;"> River Valley Management </td>
  </tr>
</table>
			</div>
	</div></div>
		<!-- no print buttons -->
	<br/>
	<div class="dontprint">
		<button type="button" id="btn_print"  class="btn btn-primary pull-right" style="margin-left:5px;" >Print</button>
		<button class="btn btn-inverse pull-right" style="margin-left:5px;"  data-dismiss="modal" type="button">Close</button>
		<button type="submit" id="btn_save_quote"  class="btn btn-success pull-right" style="margin-left:5px;">Submit</button>
	</div>
	
	<?php echo $this->Form->end(); ?>
</div>
