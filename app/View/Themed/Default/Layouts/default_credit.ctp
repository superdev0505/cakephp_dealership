<!DOCTYPE html>
   <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
@media all {
	.page-break	{ display: none; }
}

@media print {
	.page-break	{ display: block; page-break-before: always; }
}



@page {
    margin: 0;
}
@charset "utf-8";
/* CSS Document */

*{ margin:0; padding:0; outline:0; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000;}

body{ background:#fff; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#000;}
pre{ line-height:19px;}

.fl{ float:left !important;}
.fr{ float:right !important;}
.clear{ clear:both !important;}

.wrapper{ width:100%; display:table;}
.main{ width:1000px; margin:0 auto; background:none; overflow:hidden;}

.header{ width:1000px; float:left; padding:10px 0;}
.header .logo{ float:left; width:auto;}
.header .title{ width:auto; margin:65px auto 0; text-align:center; font-size:24px; font-family:Arial, Helvetica, sans-serif; text-indent:0px;}
.header .check{ float:right; width:283px; margin-top:30px; height:60px;}
.header .check label{ font-family:Arial, Helvetica, sans-serif; font-size:18px;}

.container{ width:996px; float:left; border:2px solid #000;}

.black-bg-heading{ background:#000; padding:5px 0; text-align:center; color:#fff;}

.input-wrapper{ float:left; padding:4px;}
.input-wrapper .input{ border:0; outline:0; width:100%; background:none;}

.table{ display:table; width:100%; border-top:1px solid #000; border-left:1px solid #000;}
.table td{ border-bottom:1px solid #000; border-right:1px solid #000; padding:5px 0 5px 10px;}

.wdt-100{ width:100px !important;}
.wdt-150{ width:150px !important;}
.wdt-180{ width:180px !important;}
.wdt-200{ width:200px !important;}
.wdt-210{ width:210px !important;}
.wdt-250{ width:250px !important;}


.border-bottom-1{ border-bottom:1px solid #000; display:block; overflow:hidden;}

.padding-0{ padding:0px !important;}
.padding-5{ padding:5px !important;}
.padding-10{ padding:10px !important;}

.padding-left-0{ padding-left:0px !important;}
.padding-left-5{ padding-left:5px !important;}
.padding-left-10{ padding-left:10px !important;}

.padding-right-0{ padding-right:0px !important;}
.padding-right-5{ padding-right:5px !important;}
.padding-right-10{ padding-right:10px !important;}

.padding-top-0{ padding-top:0px !important;}
.padding-top-5{ padding-top:5px !important;}
.padding-top-10{ padding-top:10px !important;}

.padding-bottom-0{ padding-bottom:0px !important;}
.padding-bottom-5{ padding-bottom:5px !important;}
.padding-bottom-10{ padding-bottom:10px !important;}

.mrg-0{ margin:0px !important;}
.mrg-5{ margin:5px !important;}
.mrg-10{ margin:10px !important;}

.mrg-left-0{ margin-left:0px !important;}
.mrg-left-5{ margin-left:5px !important;}
.mrg-left-10{ margin-left:10px !important;}

.mrg-right-0{ margin-right:0px !important;}
.mrg-right-5{ margin-right:5px !important;}
.mrg-right-10{margin-right:10px !important;}

.mrg-top-0{ margin-top:0px !important;}
.mrg-top-5{ margin-top:5px !important;}
.mrg-top-10{ margin-top:10px !important;}

.mrg-bottom-0{ margin-bottom:0px !important;}
.mrg-bottom-5{ margin-bottom:5px !important;}
.mrg-bottom-10{ margin-bottom:10px !important;}
</style>
    </head>
<?php
echo $this->fetch('content'); 
?>
</body>
</html>