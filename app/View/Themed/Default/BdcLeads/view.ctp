<?php
$disabled = $_GET['disabled'];
?>
<div>
    <div class="row-fluid">
        <table class="table table-striped">
            <tr>
                <td colspan="2"><strong>Dealership:</br></strong>&nbsp;<?php echo $contact['Contact']['company']; ?></td>
                <td colspan="2"><strong>Dealer Number:</br></strong>&nbsp;#<?php echo $contact['Contact']['company_id']; ?></td>
                <td colspan="2" aheight="35"><strong>Log Originator:</br></strong>&nbsp;<?php echo $contact['Contact']['owner']; ?></td>
		<td colspan="2"><strong>Sale Person:</br></strong>&nbsp;&nbsp;<?php echo $contact['Contact']['sperson']; ?></td>
                <td colspan="2"><strong>Created:</br></strong>&nbsp;<?php echo $contact['Contact']['created_full_date']; ?></td>
                <td colspan="2"><strong>Modified:</br></strong>&nbsp;<?php echo $contact['Contact']['modified_full_date']; ?></td>
</tr>
<tr>
		<td colspan="2"><strong>Ref Num:</strong>&nbsp;&nbsp;<?php echo $contact['Contact']['id']; ?></td>
		<td colspan="2"><strong>Lead Type:</strong>&nbsp;<?php echo $contact['ContactStatus']['name']; ?></td>
		<td colspan="2"><strong>Sales Step:</strong>:&nbsp;<?php echo $contact['Contact']['sales_step']; ?></td>
                <td colspan="2"><strong>Status:</strong>&nbsp;<?php echo $contact['Contact']['status']; ?></td>
                <td colspan="2"><strong>Source:</strong>&nbsp;<?php echo $contact['Contact']['source']; ?></td>
                <td colspan="2"><strong>Lead Status:</strong>&nbsp;<?php echo $contact['Contact']['lead_status']; ?></td>
               </tr>
<tr>
                <td colspan="2"><strong>First Name:</strong>&nbsp;<?php echo $contact['Contact']['first_name']; ?></td>
                <td colspan="2"><strong>Last Name:</strong>&nbsp;<?php echo $contact['Contact']['last_name']; ?></td>
                <td colspan="2"><strong>Address:</strong>&nbsp<?php echo $contact['Contact']['address']; ?></td>
                <td colspan="2"><strong>City:</strong>&nbsp<?php echo $contact['Contact']['city']; ?></td>
                <td colspan="2"><strong>State</strong>:&nbsp<?php echo $contact['Contact']['state']; ?></td>
                <td colspan="2"><strong>Zip</strong>:&nbsp;<?php echo $contact['Contact']['zip']; ?></td>

	<tr>
	<?php
		$hphone = $contact['Contact']['phone'];
		//echo $hphone;

		$phone_number= preg_replace('/[^0-9]+/', '', $hphone); //Strip all non number characters
		$hcleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number) //Re Format it
		?>

		<?php
		$mphone = $contact['Contact']['mobile'];
		//echo $hphone;

		$phone_number= preg_replace('/[^0-9]+/', '', $mphone); //Strip all non number characters
		$mcleaned = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone_number) //Re Format it
		?>
		<td colspan="2"><strong>Home#</strong>:&nbsp;<?php echo $hcleaned; ?></td>
		                <td colspan="2"><strong>Cell#</strong>:&nbsp;<?php echo $mcleaned; ?></td>
		                <td colspan="2"><strong>Email</strong>:&nbsp;<?php echo $contact['Contact']['email']; ?></td>
		                <td colspan="2"><strong>Gender</strong>:&nbsp;<?php echo $contact['Contact']['gender']; ?></td>
				<td colspan="2"><strong>Best Time</strong>:&nbsp;<?php echo $contact['Contact']['best_time']; ?></td>
		                <td colspan="2"><strong>Buying Time</strong>:&nbsp;<?php echo $contact['Contact']['buying_time']; ?></td>
		</br>
            </tr>

    <tr>    <hr style="height:3px; border:none; color:#000; background-color:#000; text-align:center; margin: 0 0 0 auto;">
            </br>

            </tr>
            <tr>
                <td colspan="2"><strong>Unit Amount:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['unit_value'], 'USD'); ?></td>
                <td colspan="2"><strong>Condition</strong>:&nbsp;<?php echo $contact['Contact']['condition']; ?></td>
                <td colspan="2"><strong>Year:</strong>&nbsp;<?php echo $contact['Contact']['year']; ?></td>
                <td colspan="2"><strong>Make:</strong>&nbsp;<?php echo $contact['Contact']['make']; ?></td>
                <td colspan="2"><strong>Model:</strong>&nbsp;<?php echo $contact['Contact']['model']; ?></td>
                <td colspan="2"><strong>Type:</strong>&nbsp;<?php echo $contact['Contact']['type']; ?></td>

            </tr>
            <tr>

                <td colspan="2"><strong>Vin:</strong>&nbsp;<?php echo $contact['Contact']['vin']; ?></td>
                <td colspan="2"><strong>Miles:</strong>&nbsp;<?php echo $contact['Contact']['odometer']; ?></td>
                <td colspan="2"><strong>Color</strong>:&nbsp;<?php echo $contact['Contact']['unit_color']; ?>
		<td colspan="2"><strong>Engine:</strong>&nbsp;<?php echo $contact['Contact']['engine']; ?></td>
                <td colspan="2"><strong>Stock#</strong>&nbsp;<?php echo $contact['Contact']['stock_num']; ?></td>
                <td colspan="2" aheight="35"><strong>Unit Family</strong>:&nbsp;<?php echo $contact['Contact']['unit_family']; ?></td>
            </tr>
            <!--
            <tr>

            <td colspan="2"><strong>Doors:</strong>&nbsp;<?php echo $contact['Contact']['doors']; ?></td>
            <td colspan="2"><strong>Drivetrain</strong>:&nbsp;<?php echo $contact['Contact']['drivetrain']; ?></td>
            </tr>
            -->
            <tr>
                <td colspan="2"><strong>Trade Amount:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['trade_value'], 'USD'); ?></td>
                <td colspan="2"><strong>Condition/T:</strong>&nbsp;<?php echo $contact['Contact']['condition_trade']; ?></td>
                <td colspan="2"><strong>Year/T :</strong>&nbsp;<?php echo $contact['Contact']['year_trade']; ?></td>
                <td colspan="2"><strong>Make/T :</strong>&nbsp;<?php echo $contact['Contact']['make_trade']; ?></td>
                <td colspan="2"><strong>Model/T :</strong>&nbsp;<?php echo $contact['Contact']['model_trade']; ?></td>
                <td colspan="2"><strong>Type/T :</strong>&nbsp;<?php echo $contact['Contact']['type_trade']; ?></td>

            </tr>
            <tr>
                <td colspan="2"><strong>Miles/T :</strong>&nbsp;<?php echo $contact['Contact']['odometer_trade']; ?></td>
                <td colspan="2"><strong>Vin/T :</strong>&nbsp;<?php echo $contact['Contact']['vin_trade'] ;?></td>
                <td colspan="2"><strong>Color/T </strong>:&nbsp;<?php echo $contact['Contact']['usedunit_color']; ?></td>
                <td colspan="2"><strong>Engine/T:</strong>&nbsp;<?php echo $contact['Contact']['engine_trade']; ?></td>
                <td colspan="2"><strong>Stock#/T</strong>&nbsp;<?php echo $contact['Contact']['stock_num_trade']; ?></td>
                <td colspan="2" aheight="35"><strong>Unit Family/T</strong>:&nbsp;<?php echo $contact['Contact']['usedunit_family']; ?></td>
            </tr>
</tr>
<td colspan="12"><strong>Customer Notes:</strong>&nbsp;<?php echo $contact['Contact']['notes']; ?></td>
</tr>
            <!--
            <tr>

            <td colspan="2"><strong>Doors/T:</strong>&nbsp;<?php echo $contact['Contact']['doors_trade'];?></td>

            </tr>
            -->
<!--            <tr>

                <td colspan="2"><strong>Tax:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['tax_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Title:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['title_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Tag:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['tag_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Down:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['down_payment'], 'USD'); ?></td>
                <td colspan="2"><strong>Freight:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['freight_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Doc:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['doc_fee'], 'USD'); ?></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Prep:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['prep_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>PPM:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['ppm_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>ESP:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['esp_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Gap:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['gap_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Tire/Wheel:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['tire_wheel_fee'], 'USD'); ?>
                <td colspan="2"><strong>Lic/Reg:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['licreg_fee'], 'USD'); ?>
                </td>

            </tr>
            <tr><td colspan="2"><strong>VSC:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['vsc_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Parts:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['parts_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Service:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['service_fee'], 'USD'); ?></td>
                <td colspan="2"><strong>Financed:</strong>&nbsp;<?php echo $this->Number->currency($contact['Contact']['amount'], 'USD'); ?>
                <td colspan="2"><strong>Loan Apr:</strong>&nbsp;<?php echo $contact['Contact']['loan_apr']; ?>&nbsp;%
                <td colspan="2"><strong><strong>Term:</strong>&nbsp;<?php echo $contact['Contact']['loan_term']; ?>&nbsp;Years</td>
            </tr>
            <tr>
-->
                <td rowspan="12" colspan="12" valign="top">
                    <hr style="height:3px; border:none; color:#000; background-color:#000; text-align:center; margin: 0 0 0 auto;">
                    </br>

                    <?php echo $this->Html->link('All Leads', array('controller' => 'contacts', 'action' => 'index'), array('class' => 'btn btn-info')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php echo $this->Html->link('Dashboard', array('controller' => 'dashboards', 'action' => 'index'), array('class' => 'btn btn-info')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <a class="btn btn-success  <?php echo $disabled; ?>" role="button" href="/full_calendar/events/add?id=<?php echo $contact['Contact']['id'] ?>&fname=<?php echo $contact['Contact']['first_name'] ?>&lname=<?php echo $contact['Contact']['last_name'] ?>&email=<?php echo $contact['Contact']['email'] ?>&phone=<?php echo $contact['Contact']['phone'] ?>&mobile=<?php echo $contact['Contact']['mobile'] ?>">Set New Event</a>&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'edit', $contact['Contact']['id'])); ?>">Edit or Log Contact</a>&nbsp;&nbsp;&nbsp;&nbsp;
     <?php if (AuthComponent::user('group_id') < 3){ ?>
<a class="btn btn-success  <?php echo $disabled; ?>" role="button" href="/deals/add?&id=<?php echo $contact['Contact']['id'] ?>&fname=<?php echo $contact['Contact']['first_name'] ?>&lname=<?php echo $contact['Contact']['last_name'] ?>&email=<?php echo $contact['Contact']['email'] ?>&gender=<?php echo $contact['Contact']['gender'] ?>&phone=<?php echo $contact['Contact']['phone'] ?>&mobile=<?php echo $contact['Contact']['mobile'] ?>&address=<?php echo $contact['Contact']['address'] ?>&city=<?php echo $contact['Contact']['city'] ?>&state=<?php echo $contact['Contact']['state'] ?>&zip=<?php echo $contact['Contact']['zip'] ?>&condition=<?php echo $contact['Contact']['condition'] ?>&year=<?php echo $contact['Contact']['year'] ?>&make=<?php echo $contact['Contact']['make'] ?>&model=<?php echo $contact['Contact']['model'] ?>&type=<?php echo $contact['Contact']['type'] ?>&vin=<?php echo $contact['Contact']['vin'] ?>&miles=<?php echo $contact['Contact']['odometer'] ?>&stocknum=<?php echo $contact['Contact']['stock_num'] ?>&unitvalue=<?php echo $contact['Contact']['unit_value'] ?>&color=<?php echo $contact['Contact']['unit_color'] ?>&tradevalue=<?php echo $contact['Contact']['trade_value'] ?>&conditiont=<?php echo $contact['Contact']['condition_trade'] ?>&yeart=<?php echo $contact['Contact']['year_trade'] ?>&maket=<?php echo $contact['Contact']['make_trade'] ?>&modelt=<?php echo $contact['Contact']['model_trade'] ?>&typet=<?php echo $contact['Contact']['type_trade'] ?>&vint=<?php echo $contact['Contact']['vin_trade'] ?>&milest=<?php echo $contact['Contact']['odometer_trade'] ?>&colort=<?php echo $contact['Contact']['usedunit_color'] ?>&stocknumt=<?php echo $contact['Contact']['stock_num_trade'] ?>&cid=<?php echo $contact['Contact']['company_id'] ?>&dealer=<?php echo $contact['Contact']['company'] ?>&status=<?php echo $contact['Contact']['status'] ?>&source=<?php echo $contact['Contact']['source'] ?>">Worksheet</a>&nbsp;&nbsp;&nbsp;
  <?php } ?>
<a class="btn btn-success fancybox fancybox.iframe" href="<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'history', $contact['Contact']['id'])); ?>" id="history_btn">View History</a>
                </td>
            </tr>
        </table>
    </div>
</div>
</div>

<script>
$('document').ready(function(){
    $('#history_btn').fancybox({
        autoDimensions: false,
        height: 450,
        width: 1000
    });
});
</script>
