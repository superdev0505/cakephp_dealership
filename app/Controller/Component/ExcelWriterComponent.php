<?php
/*
 * Class is used for save the data into microsoft excel format.
 */

Class ExcelWriterComponent extends Component {

	public $fp=null;
	public $error;
	public $state="CLOSED";
	public $newRow=false;

	/*
		* @Params : $file  : file name of excel file to be created.
		* @Return : On Success Valid File Pointer to file
		* 			On Failure return false
		*/

	public  function __construct($file="")
	{
		if($file)
			return $this->open($file);
		else
			return false;
	}

	/*
		* @Params : $file  : file name of excel file to be created.
		* 			if you are using file name with directory i.e. test/myFile.xls
		* 			then the directory must be existed on the system and have permissioned properly
		* 			to write the file.
		* @Return : On Success Valid File Pointer to file
		* 			On Failure return false
		*/
	public function open($file)
	{
		

		if(!empty($file))
		{
			
			$this->fp=@fopen($file,"wr");
		}
		else
		{
			$this->error="Usage : New ExcelWriter('fileName')";
			return false;
		}
		if($this->fp==false)
		{
			$this->error="Error: Unable to open/create File.You may not have permmsion to write the file.";
			return false;
		}
		$this->state="OPENED";
		fwrite($this->fp,$this->GetHeader());
		return $this->fp;
	}

	public function close()
	{
		if($this->state!="OPENED")
		{
			$this->error="Error : Please open the file.";
			return false;
		}
		if($this->newRow)
		{
			fwrite($this->fp,"</tr>");
			$this->newRow=false;
		}

		fwrite($this->fp,$this->GetFooter());
		fclose($this->fp);
		$this->state="CLOSED";
		return ;
	}
	/* @Params : Void
		*  @return : Void
		* This function write the header of Excel file.
		*/

	public function GetHeader()
	{
		$header = <<<EOH
				<html xmlns:o="urn:schemas-microsoft-com:office:office"
				xmlns:x="urn:schemas-microsoft-com:office:excel"
				xmlns="http://www.w3.org/TR/REC-html40">

				<head>
				<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
				<meta name=ProgId content=Excel.Sheet>
				<!--[if gte mso 9]><xml>
				 <o:DocumentProperties>
				  <o:LastAuthor>Sriram</o:LastAuthor>
				  <o:LastSaved>2005-01-02T07:46:23Z</o:LastSaved>
				  <o:Version>10.2625</o:Version>
				 </o:DocumentProperties>
				 <o:OfficeDocumentSettings>
				  <o:DownloadComponents/>
				 </o:OfficeDocumentSettings>
				</xml><![endif]-->
				<style>

				<!--table
					{mso-displayed-decimal-separator:"\.";
					mso-displayed-thousand-separator:"\,";}
				@page
					{margin:1.0in .75in 1.0in .75in;
					mso-header-margin:.5in;
					mso-footer-margin:.5in;}

				col
					{mso-width-source:auto;}
				br
					{mso-data-placement:same-cell;}

				.bgcolorblack{
					background-color:#000000;
				}
				.fontcolorwhite{
					color:#FFFFFF;
					}

				.comp_heading{

					font-family: Arial Black; font-weight: bold;font-size: 15px;

				}
				.normalfont{
					font-family: Verdana; font-size: 12px;
				}

				-->
				</style>
				<!--[if gte mso 9]><xml>
				 <x:ExcelWorkbook>
				  <x:ExcelWorksheets>
				   <x:ExcelWorksheet>
					<x:Name>Sheet1</x:Name>
					<x:WorksheetOptions>
					 <x:Selected/>
					 <x:ProtectContents>False</x:ProtectContents>
					 <x:ProtectObjects>False</x:ProtectObjects>
					 <x:ProtectScenarios>False</x:ProtectScenarios>
					</x:WorksheetOptions>
				   </x:ExcelWorksheet>
				  </x:ExcelWorksheets>
				  <x:WindowHeight>10005</x:WindowHeight>
				  <x:WindowWidth>10005</x:WindowWidth>
				  <x:WindowTopX>120</x:WindowTopX>
				  <x:WindowTopY>135</x:WindowTopY>
				  <x:ProtectStructure>False</x:ProtectStructure>
				  <x:ProtectWindows>False</x:ProtectWindows>
				 </x:ExcelWorkbook>
				</xml><![endif]-->
				</head>

				<body link=blue vlink=purple>
				<table x:str border=1 cellpadding=0 cellspacing=0>
EOH;
		return $header;
	}

	public function GetFooter()
	{
		return "</table></body></html>";
	}



	public function WriteHTML($html)
	{
		fwrite($this->fp,$html);
	}


	public function stream($str,$filename=false){

		$header = <<<EOH
				<html xmlns:o="urn:schemas-microsoft-com:office:office"
				xmlns:x="urn:schemas-microsoft-com:office:excel"
				xmlns="http://www.w3.org/TR/REC-html40">

				<head>
				<meta http-equiv=Content-Type content="text/html; charset=us-ascii">
				<meta name=ProgId content=Excel.Sheet>
				<!--[if gte mso 9]><xml>
				 <o:DocumentProperties>
				  <o:LastAuthor>Kuldip pujara</o:LastAuthor>
				  <o:LastSaved>2005-01-02T07:46:23Z</o:LastSaved>
				  <o:Version>10.2625</o:Version>
				 </o:DocumentProperties>
				 <o:OfficeDocumentSettings>
				  <o:DownloadComponents/>
				 </o:OfficeDocumentSettings>
				</xml><![endif]-->
				<style>

				<!--table
					{mso-displayed-decimal-separator:"\.";
					mso-displayed-thousand-separator:"\,";}
				@page
					{ margin: 0.25in;
					mso-header-margin:.5in;
					mso-footer-margin:.5in;}

				col
					{mso-width-source:auto;}
				br
					{mso-data-placement:same-cell;}

				.bgcolorblack{
					background-color:#000000;
				}
				.fontcolorwhite{
					color:#FFFFFF;
					}

				.comp_heading{

					font-family: Arial Black; font-weight: bold;font-size: 15px;

				}
				.normalfont{
					font-family: Verdana; font-size: 12px;
				}

				.page { background-color: white; padding: 20px; font-size: 0.7em; margin-bottom: 15px; margin-right: 5px;}
				.page table.header { width: 100%; font-size: 8pt; border-bottom: 1px solid black; }
				.page table.padding_header {padding-top: 25px; padding-left: 13px; padding-bottom: 5px;}


				.table_list{ width: 100%; border-top: 1px solid black; border-bottom: 1px solid black; font-size: 8pt; padding-top: 0px; margin-top: 1px; vertical-align: top; text-align: center; }
				.bold {font-weight: bold;}

				-->
				</style>
				<!--[if gte mso 9]><xml>
				 <x:ExcelWorkbook>
				  <x:ExcelWorksheets>
				   <x:ExcelWorksheet>
					<x:Name>Sheet1</x:Name>
					<x:WorksheetOptions>
					 <x:Selected/>
					 <x:ProtectContents>False</x:ProtectContents>
					 <x:ProtectObjects>False</x:ProtectObjects>
					 <x:ProtectScenarios>False</x:ProtectScenarios>
					</x:WorksheetOptions>
				   </x:ExcelWorksheet>
				  </x:ExcelWorksheets>
				  <x:WindowHeight>10005</x:WindowHeight>
				  <x:WindowWidth>10005</x:WindowWidth>
				  <x:WindowTopX>120</x:WindowTopX>
				  <x:WindowTopY>135</x:WindowTopY>
				  <x:ProtectStructure>False</x:ProtectStructure>
				  <x:ProtectWindows>False</x:ProtectWindows>
				 </x:ExcelWorkbook>
				</xml><![endif]-->
				</head>

				<body link=blue vlink=purple>

EOH;

		$final_file_string = $header.$str.'</body></html>';


		header("Cache-Control: private");

		//header("Content-type: application/pdf");
		header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-type: application/ms-excel");
	header("Content-Disposition: attachment; filename={$filename} "); 
    header("Content-Transfer-Encoding: binary ");

		//header("Content-Length: " . strlen($tmp));
		$fileName =  $filename?$filename:'file.xls';

		if  ( !isset($options["Attachment"]))
		$options["Attachment"] =  true;

		$attachment =   "attachment" ;

		header("Content-Disposition: $attachment; filename=\"$fileName\"");

		echo  $final_file_string;

		flush();
		exit;
	}

	public function htmltoxls($str,$filename=false){

		$strtohtml .= '<tr><td>'.$str.'</td></tr>';
		fwrite($this->fp,$strtohtml);
	}

}
?>