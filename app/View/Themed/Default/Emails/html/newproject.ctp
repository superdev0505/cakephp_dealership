<p>New To-do has been submitted with the following information</p>

<p>Assign To: <?php echo $assign_to; ?></p>
<p>Sevarity of To-do: <?php echo $sevarity; ?></p>
<p>Project Title : <?php echo $pname; ?></p>
<p>To-do Title : <?php echo $title; ?></p>
<p>To-do Description: <?php echo nl2br($description); ?></p>

<p>Time: <?php 
date_default_timezone_set("America/Los_Angeles");
echo date('m/d/Y g:i A'); 

?></p>