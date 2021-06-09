<!-- Autoresponds table -->
<table class="table table-condensed table-striped table-primary table-vertical-center checkboxs js-table-sortable ui-sortable">
    <thead>
        <tr>
            <th>Ref#</th>
           <!-- <th >Rule Type</th> -->
            <th>Open/Close</th>
            <th>Lead Type</th>
			<th>Step</th>
			<th>Status</th>
			<th>Source</th>
			
        </tr>
    </thead>
    <tbody>
        <?php
		
        foreach($autoresponders['AutoresponderRule'] as $autoresponder) { 
          
        ?>
        <tr class="selectable" style="">
            <td ><?php echo $autoresponder['id']; ?></td>
			<!-- <td ><?php echo $autoresponder['rule_type']; ?></td> -->
            <td ><?php echo $autoresponder['search_lead_status']; ?></td>
			<td ><?php echo $ContactStatus[$autoresponder['search_contact_status_id']]; ?></td>
			<td ><?php echo $autoresponder['search_sales_step']; ?></td>
			<td ><?php echo $autoresponder['search_status']; ?></td>
			<td ><?php echo $autoresponder['search_source']; ?></td>
			
			
            
        </tr>
        <?php } ?>
    </tbody>
</table>