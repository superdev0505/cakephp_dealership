<?php foreach($contacts as $contact): ?>
<?php echo '"' . $contact['Contact']['first_name'] . '" , '; ?><?php echo '"' . $contact['Contact']['last_name'] . '" , '; ?><?php echo $contact['Contact']['contact_status_id']; ?><?php echo ' , ' . $contact['Contact']['company']; ?><?php echo ' , ' . $contact['Contact']['city']; ?><?php echo ' , ' . $contact['Contact']['phone']; ?><?php echo ' , ' . $contact['Contact']['email'] . "\r\n"; ?>
<?php endforeach; ?>