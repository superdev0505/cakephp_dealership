<p>New Project has been submitted with the following information</p>

<p>Assign To: <?php echo $assign_to; ?></p>
<p>Sevarity of project: <?php echo $sevarity; ?></p>
<p>Title : <?php echo $title; ?></p>
<p>Description: <?php echo nl2br($description); ?></p>

<p>Time: <?php 
date_default_timezone_set("America/Los_Angeles");
echo date('m/d/Y g:i A'); 

?></p>