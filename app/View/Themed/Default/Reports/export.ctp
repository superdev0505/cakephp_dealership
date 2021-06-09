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