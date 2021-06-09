<table class="table table-striped table-responsive swipe-horizontal table-condensed ">
    <thead>
        <tr >
            <th>Event Types</th>
            <th class="text-right">Action</th>
        </tr>
	</thead>
    <?php foreach($eventCustomTypes as $eventCustomType){ ?>
    <tr>
        <td class="border-bottom innerAll">
            <?php echo $eventCustomType['EventType']['name']; ?>
        </td>
        <td class="border-bottom innerAll text-right">
            <button data-alert-id = '<?php echo $eventCustomType['EventType']['id']; ?>' type="button" class="btn btn-xs btn-danger delete_custom_event_type"><i class="fa fa-times"></i> Delete</button>
        </td>
    </tr>
    <?php } ?>
</table>