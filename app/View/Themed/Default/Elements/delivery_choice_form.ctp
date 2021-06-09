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
        margin: 0 7%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
    }
    .DeliveryChoices_fm {
        width: 60%;
        border-bottom: solid 1px #000;
        border-top: none;
        border-right: none;
        border-left: none;
        margin: 0 10px;
    }
    .DeliveryChoices_fm2 {
        width: 60%;
        border-bottom: solid 1px #000;
        border-top: none;
        border-right: none;
        border-left: none;
        margin: 0 10px;
    }
    .DeliveryChoices_fm3 {
        width: 30%;
        border-bottom: solid 1px #000;
        border-top: none;
        border-right: none;
        border-left: none;
        margin: 0 10px;
    }
    .DeliveryChoices_fm4 {
        width: 48%;
        border-bottom: solid 1px #000;
        border-top: none;
        border-right: none;
        border-left: none;
        margin: 0 10px;
    }
    .DeliveryChoices_fm5 {
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
		table{padding:0px 0 !important;font-size:10px !important;line-height:20px !important;}
		td{padding:0px 0 !important;font-size:10px !important;line-height:20px !important;}
	}
	</style>

	<div class="wraper header"> 
		
		
			<div class="row">
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:14px; color:#000; padding:10px 0;">
		<img width="100%" class="logo" src="<?php echo ('/app/webroot/files/dealer_name/dealer_logo/'.$cid.'/delivery_choice.png'); ?>" 
		alt="">
		</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="padding-top:20px;">
      <tr>
        <td style=" width:20%; font-size:16px; color:#000; padding:10px 0;"> Date
          <input name="date_data"   value="<?php echo isset($info["date_data"]) ? $info['date_data'] : date('Y-m-d h:i:s')?>"  type="text" class="DeliveryChoices_fm" /></td>
        <td style=" width:40%; font-size:16px; color:#000; padding:10px 0;"> Customer
          <input name="customer_name"   value="<?php echo isset($info["customer_name"]) ? $info['customer_name'] : $info['first_name']." ".$info['last_name'];?>"  type="text" class="DeliveryChoices_fm2" /></td>
        <td style=" width:40%; font-size:14px; color:#000;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-size:16px; color:#000; padding:10px 0;"> Boat
                <input name="boat"   value="<?php echo isset($info["boat"]) ? $info['boat'] : ''?>"  type="text" class="DeliveryChoices_fm2" /></td>
            </tr>
            <tr>
              <td style="font-size:16px; color:#000; padding:10px 0;"> Vin #
                <input name="vin_data"   value="<?php echo isset($info["vin_data"]) ? $info['vin_data'] : $info['vin'];?>"  type="text" class="DeliveryChoices_fm2" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:10px 0;"> Thank you for your marine purchase, welcome to the River Valley Family! </td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style=" width:45%;font-size:18px; color:#000;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-size:16px; color:#000; padding:10px 0;"> Date Delivered
                <input name="date_delivered" type="text" class="DeliveryChoices_fm" /></td>
            </tr>
            <tr>
              <td style="font-size:20px; color:#000; padding:10px 0; font-weight:600;"> METHOD OF DELIVERY FORM</td>
            </tr>
            <tr>
              <td style="font-size:20px; color:#000; padding:10px 0; font-weight:600;"> Products Purchased Summary:</td>
            </tr>
            <tr>
              <td style="font-size:17px; color:#000; padding:10px 0;"> Delivery Method:</td>
            </tr>
          </table></td>
        <td style=" width:55%; font-size:18px; color:#000; padding:10px 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-size:16px; color:#000; padding:10px 0;"> RVPS Employee signature
                <input name="" type="text" class="DeliveryChoices_fm" /></td>
            </tr>
            <tr>
              <td style="font-size:20px; color:#000; font-weight:600; padding:10px 0;"> Customer acceptance signature
                <input name="" type="text" class="DeliveryChoices_fm4" /></td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:17px; color:#000; padding:10px 0; line-height:30px;"><input name="" type="text" class="DeliveryChoices_fm5" />
          Free Pickup on       location    Tonka on trailer
          <input name="" type="text" class="DeliveryChoices_fm5" />
          Tonka in BB marina
          <input name="" type="text" class ="DeliveryChoices_fm5" />
          Red Wing
          <input name="" type="text" class="DeliveryChoices_fm5" />
          Rochester
          <input name="" type="text" class =       "DeliveryChoices_fm5" />
          <input name="" type="text" class="DeliveryChoices_fm5" />
          Free Use of River Valley Trailer (returned within 48hrs) </td>
      </tr>
      <tr>
        <td style="font-size:17px; color:#000; padding:10px 0; line-height:30px;"><input name="" type="text" class="DeliveryChoices_fm5" />
          Delivery to         location of customers choice:
          <input name="" type="text" class="DeliveryChoices_fm4" /></td>
      </tr>
      <tr>
        <td style="font-size:17px; color:#000; padding:10px 0;"><input name="" type="text" class="DeliveryChoices_fm5" />
          Fee Charged for delivery $1.00 per       mile $
          <input name="" type="text" class="DeliveryChoices_fm4" /></td>
      </tr>
      <tr>
        <td style="font-size:17px; color:#000; padding:10px 0;"><input name="" type="text" class="DeliveryChoices_fm5" />
          Purchase of VIP Hassle Free Package	Purchase price
          <input name="" type="text" class="DeliveryChoices_fm4" /></td>
      </tr>
      <tr>
        <td style="font-size:17px; color:#000; padding:10px 0;"> Spring/Summer Initial VIP
          <input name="" type="text" class="DeliveryChoices_fm3" />
          2nd Season VIP
          <input name="" type="text" class="DeliveryChoices_fm3" /></td>
      </tr>
      <tr>
        <td style="font-size:17px; color:#000; padding:10px 0;"><input name="" type="text" class="DeliveryChoices_fm5" />
          Other:  explain
          <input name="" type="text" class="DeliveryChoices_fm2" /></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:22px; color:#000; font-weight:600; padding:10px 0;"> VIP Hassle Free Package
          <input name="" type="text" class="DeliveryChoices_fm5" />
          Purchased
          <input name="" type="text" class="DeliveryChoices_fm5" />
          Declined</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;"> Our premier package:   For those customers who demand no hassles, no pressures, and no inconveniences.
          “Let us take your boating pleasure to a new level”.  Included in this package: </td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">-Initial spring/summer delivery of your boat to our marina,  your driveway, your cabin or your    slip.-Full tank of Fuel</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">-Customer DNR lettering(applied professionally by RVPS employee)</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">-Pickup of boat at end of season, to our secure maintenance & storage facility</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">-Complete end of season maintenance &winterization(RVPS picks up unit in fall)</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">-Winter storage at our secure facility</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">-Zero Deductible coverage</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">*Spring (following re-delivery is NOT included in VIP)we ask for a renewal of VIP package or return delivery fee</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">*Renewal rates are discounted (RVPS service team to provide pricing)</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">*Delivery fees are based on 100 miles from the location of purchase.  .50 per mile each way over 100 miles.</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">*Detail & acid wash extra:  Not included in VIP (pricing avail by service per footage basis)</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">*Re-Fuel to full fueling not included:   Charged at pump price on return in spring</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:25px 0 10px 0;">INITIAL SPRING/SUMMER Delivery:    To your driveway, cabin, dock or marina. </td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; width:60%; color:#000; padding:25px 0 10px 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">Miles est
                <input name="" type="text" class="DeliveryChoices_fm3" />
                x $1.00per mile </td>
            </tr>
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">Fueling
                <input name="" type="text" class="DeliveryChoices_fm3" />
                gallons </td>
            </tr>
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">License application applied w/customer letters </td>
            </tr>
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">Price collected from customer: </td>
            </tr>
          </table></td>
        <td style="font-size:18px; width:40%; color:#000; padding:25px 0 10px 0;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">$
                <input name="" type="text" class="DeliveryChoices_fm3" />
                Delivery Total </td>
            </tr>
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">$
                <input name="" type="text" class="DeliveryChoices_fm3" />
                Fuel Total </td>
            </tr>
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">$
                <input name="" type="text" class="DeliveryChoices_fm3" />
                License letter applied </td>
            </tr>
            <tr>
              <td style="font-size:18px; color:#000; padding:5px 0 5px 0;">$
                <input name="" type="text" class="DeliveryChoices_fm3" />
                Total collected </td>
            </tr>
          </table></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; color:#000; padding:2px 0;">Visa/Master  card #
          <input name="" type="text" class="DeliveryChoices_fm4" />
          Date/Exp
          <input name="" type="text" class="DeliveryChoices_fm5" />
          Code
          <input name="" type="text" class="DeliveryChoices_fm5" /></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="font-size:18px; width:70%; color:#000; padding:15px 0;"><input name="" type="text" class="DeliveryChoices_fm" />
          Customer Signature </td>
        <td style="font-size:18px; width:30%; color:#000; padding:15px 0;">Date Accepted
          <input name="" type="text" class="DeliveryChoices_fm3" /></td>
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
