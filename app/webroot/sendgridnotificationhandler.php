<?php
$fh = fopen('files/sendgridnotifications.log', 'a+');
if ( $fh )
{
// Dump body
fwrite($fh, print_r($HTTP_RAW_POST_DATA, true));
fclose($fh);
}

if ( $fh )
echo "ok";

$filename = "files/sendgridnotifications.log";
$handle = fopen($filename, "r");
$data = fread($handle, filesize($filename));
$decode = json_decode($data);
echo "<pre>";
print_r($decode);
fclose($fh);
die;

?>