<p>New support ticket has been submitted with the following information</p>

<p>Dealer: <?php echo $dealer; ?>, <?php echo $d_phone; ?></p>
<p>Severity of support: <?php echo $sevarity; ?></p>

<p>Sales Person : <?php echo $s_name; ?> # <?php echo $s_id; ?>, <?php echo $s_email; ?></p>
<p>Direct Phone Number : <?php echo $direct_phone; ?></p>
<p>Title : <?php echo $title; ?></p>
<p>Description: <?php echo nl2br($description); ?></p>

<p>Time: <?php 
date_default_timezone_set("America/Los_Angeles");
echo date('m/d/Y g:i A'); 

?></p>