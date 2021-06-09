<p>New Project has been submitted with the following information</p>

<p>Project Title : <?php echo $pname; ?></p>
<p>Project Description: <?php echo nl2br($description); ?></p>

<p>Time: <?php 
date_default_timezone_set("America/Los_Angeles");
echo date('m/d/Y g:i A'); 

?></p>