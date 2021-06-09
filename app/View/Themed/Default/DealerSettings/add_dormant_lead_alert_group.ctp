<table class="table table-striped table-responsive swipe-horizontal table-condensed ">
    <thead>
    <tr >
        <th>Recipients</th>
        <th class="text-right">Action</th>
    </tr>
</thead>
    <?php foreach($dormantLeadAlert_recipients as $dormantLeadAlert_recipient){ ?>
    <tr>
        <td class="border-bottom innerAll">
            <?php echo $dormantLeadAlert_recipient; ?>
        </td>
        <td class="border-bottom innerAll text-right">
            <button data-alert-id = '<?php echo $dormantLeadAlert_recipient; ?>' type="button" class="btn btn-xs btn-danger delete_dormant_lead_alert"><i class="fa fa-times"></i> Delete</button>
        </td>
    </tr>
    <?php } ?>
</table>