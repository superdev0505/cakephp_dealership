<p>Support Ticket Responding Message from DP360CRM.</p>
<p>Title : <?php echo $title; ?></p>
<p>Date and Time : <?php echo date('d-m-Y H:i:s',  strtotime($created)); ?></p>
<p>Description : <?php echo nl2br($description); ?></p>
<p>Email : <?php echo $email; ?></p>
<p>Dealer : <?php echo $dealer; ?></p>
<p>Dealer ID : <?php echo $dealer_id; ?></p>
<p>Status: <?php echo $status; ?></p>
<p>Percentage: <?php echo $percentage.'%'; ?></p>
<p>Note: <?php echo $note; ?></p>