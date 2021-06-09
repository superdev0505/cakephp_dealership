<table class="table table-striped table-responsive swipe-horizontal table-condensed ">
    <thead>
    <tr class="bg-inverse">
        <th>Contact Report Alert Group</th>
        <th class="text-right">Action</th>
    </tr>
</thead>
    <?php foreach($all_emails as $email){ ?>
    <tr>
        <td class="border-bottom innerAll">
            <?php echo $email['ReportAlertEmail']['email']; ?>  
        </td>
        <td class="border-bottom innerAll text-right">
            <button data-id = '<?php echo $email['ReportAlertEmail']['id']; ?>' type="button" class="btn btn-xs btn-danger delete-contact-report-alert"><i class="fa fa-times"></i> Delete</button> 
        </td>
    </tr>
    <?php } ?>
</table>