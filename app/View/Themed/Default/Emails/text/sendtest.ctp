<p>TEST Message has been submitted with the following information</p>

<p>Project Title : <?php echo $pname; ?></p>
<p>Test Message : <?php echo nl2br($note); ?></p>
<p>Assign To : <?php echo $assignto; ?></p>

<p>Time: <?php 
date_default_timezone_set("America/Los_Angeles");
echo date('m/d/Y g:i A'); 

?></p>