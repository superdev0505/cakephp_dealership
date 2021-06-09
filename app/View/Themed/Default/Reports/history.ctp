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
<link rel="stylesheet" target="_blank" href="<?php echo $this->webroot; ?>js/datatables/media/css/jquery.dataTables.css" type="text/css" media="screen" />
<script src="<?php echo $this->webroot; ?>js/datatables/media/js/jquery.dataTables.min.js"></script>
<div style="float:right;padding:10px;font-weight:bold;"><a href="<?php echo $this->Html->url(array('controller' => 'reports', 'action' => 'export')); ?>" style="text-decoration:underline;">Export List As CSV</a></div>
<div style="clear:both;"></div>
<div style="text-align: center">
    <h2>Viewing Log for <?php echo $head; ?></h2>
</div>
<br/>
<table class="dataTable">
    <thead>
        <tr>
            <th>#Ref</th>
            <th>Name</th>
            <th>Email</th>
            <th>Cell</th>
            <th>Step</th>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Status</th>
            <th>Modified</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($history as $entry) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $entry['Contact']['first_name'].' '.$entry['Contact']['last_name']; ?></td>
                <td><?php echo $entry['Contact']['email']; ?></td>
		<td><?php echo $entry['Contact']['mobile']; ?></td>
                <td><?php echo $entry['Contact']['step']; ?></td>
                <td><?php echo $entry['Contact']['year']; ?></td>
		<td><?php echo $entry['Contact']['make']; ?></td>                
		<td><?php echo $entry['Contact']['model']; ?></td>
                <td><?php echo $entry['Contact']['type']; ?></td>
                <td><?php echo $entry['Contact']['status']; ?></td>
                <td><?php echo $entry['Contact']['modified']; ?></td>
            </tr>
        <?php $i++; } ?>
    </tbody>
</table>

<script>
    $('.dataTable').dataTable();
</script>