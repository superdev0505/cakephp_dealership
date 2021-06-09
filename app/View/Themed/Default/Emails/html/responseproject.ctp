<p>To-do Status.</p>
<p>Project Title : <?php echo $pname; ?></p>
<p>To-do Title : <?php echo $title; ?></p>
<p>Date and Time : <?php echo date('d-m-Y H:i:s',  strtotime($created)); ?></p>
<p>To-do Description : <?php echo nl2br($description); ?></p>
<p>Developer Name : <?php echo $name; ?></p>
<p>Status: <?php echo $status; ?></p>
<p>Percentage: <?php echo $percentage.'%'; ?></p>
<p>Note: <?php echo $note; ?></p>