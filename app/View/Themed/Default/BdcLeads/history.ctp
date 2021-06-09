<?php
echo $this->Html->css('bootstrap');
echo $this->Html->css('bootstrap-responsive.min');
echo $this->Html->css('font-awesome.min');
echo $this->Html->css('custom'); //costom css
echo $this->Html->css('styleless'); //dynamic css

echo $this->Html->css('start/jquery-ui');
//echo $this->Html->css('redmond/jquery-ui');
//echo $this->Html->css('cupertino/jquery-ui');
echo $this->Html->css('jquery-ui-timepicker-addon');

echo $this->Html->script('jquery');
echo $this->Html->script('bootstrap.min');

echo $this->Html->script('jquery.validate.min');
echo $this->Html->script('jquery-ui-1.9.2.custom.min');
echo $this->Html->script('jquery-ui-timepicker-addon');
?>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>js/datatables/media/css/jquery.dataTables.css" type="text/css" media="screen" />
<script src="<?php echo $this->webroot; ?>js/datatables/media/js/jquery.dataTables.min.js"></script>

<div style="text-align: center">
    <h2>Viewing History for <?php echo $contact_name; ?></h2>
</div>
<br/>
<table class="dataTable">
    <thead>
        <tr>
            <th>Sperson</th>
            <th>MGR Sign-off</th>
            <th>Comment</th>
            <th>Condition</th>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Status</th>
            <th>Created</th>
            <th>Modified</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($history as $entry) { ?>
            <tr>
                <td><?php echo $entry['History']['sperson']; ?></td>
                <td><?php echo $entry['History']['mgr_signoff']; ?></td>
		<td><?php echo $entry['History']['comment']; ?></td>
                <td><?php echo $entry['History']['cond']; ?></td>
                <td><?php echo $entry['History']['year']; ?></td>
		<td><?php echo $entry['History']['make']; ?></td>                
		<td><?php echo $entry['History']['model']; ?></td>
                <td><?php echo $entry['History']['type']; ?></td>
                <td><?php echo $entry['History']['status']; ?></td>
                <td><?php echo $entry['History']['created']; ?></td>
                <td><?php echo $entry['History']['modified']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $('.dataTable').dataTable();
</script>