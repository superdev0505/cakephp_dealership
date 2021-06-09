<table class="table table-striped table-responsive swipe-horizontal table-condensed ">
    <thead>
    <tr class="bg-inverse">
        <th>Lead Change Report Group</th>
        <th class="text-right">Action</th>
    </tr>
</thead>
    <?php foreach($lead_change_alert_emails as $lead_change_alert_email){ ?>
    <tr>
        <td class="border-bottom innerAll">
            <?php echo $lead_change_alert_email['LeadChangeAlertEmail']['email']; ?>  
        </td>
        <td class="border-bottom innerAll text-right">
            <button data-alert-id = '<?php echo $lead_change_alert_email['LeadChangeAlertEmail']['id']; ?>' type="button" class="btn btn-xs btn-danger delete_lead_change_alert"><i class="fa fa-times"></i> Delete</button> 
        </td>
    </tr>
    <?php } ?>
</table>