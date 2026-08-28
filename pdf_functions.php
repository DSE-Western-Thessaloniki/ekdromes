<?php
//----------------------------------------------------------------------
//	Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης
//----------------------------------------------------------------------

if (!ini_get('date.timezone')) //when not set:
	ini_set('date.timezone', 'Europe/Athens');//-this is required to suppress errors

require_once('newer_pdflib/tcpdf.php');// Include the main TCPDF library.

class MYPDF extends TCPDF 
{

//   public function Header()  //handle Page header
//	{
//		//if ($this->page==1) return;//no header for first page (=coverpage)
//		//if ($this->tocpage) return; // do nothing for TOC page
//		
//		//if ($this->page >= $this->last_page_number_hide_header_footer) return;
//	
//       // Logo
//       //$image_file = K_PATH_IMAGES.'logo_example.jpg';
//       //$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//  
//		$str= "
//
//<table style=\"width:100%;\">
//tr><td style=\"border: 1px solid black;\"><font style=\"font-size:65%\">ΑΜ:</font> $g_current_am <font style=\"font-size:65%\">ΟΝΟΜΑΤΕΠΩΝΥΜΟ:</font> $eponymo_onoma 
//font style=\"font-size:65%\">ΠΑΤΡΩΝΥΜΟ:</font> $g_current_onoma_patros <font style=\"font-size:65%\">ΕΙΔΙΚΟΤΗΤΑ:</font> $g_current_eidikotita <font style=\"font-size:65%\">ΑΦΜ:</font> $g_current_afm</td></tr>
// </table>
//;
//
//	$this->writeHTMLCell(0, 0,  //auto width and height
//	15, 10, //placement 
//	$str,0, //no border
//	0, //default
//	false, //background fill mode: no fill
//	true, '', //align in center
//	true);
//
//	}//header is done.

    // Page footer:
    public function Footer() 
	{
		if ($this->page==1) return;//no footer for first page (=coverpage)
//		if ($this->tocpage) return;//no footer for table of contents
		
		//if ($this->page >= $this->last_page_number_hide_header_footer) return;
		//global $g_footerdisable;
		//if ($g_footerdisable) return;//dont display page number (used when we are printing a specific person- not the whole book for all people)
		
        // Position at 10 mm from bottom
        //$this->SetY(-10);
        //// Set font
        ////$this->SetFont('helvetica', 'I', 8);

        //// Page number
		//$this->Cell(0, 0, 'Σελίδα '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(),0,0,'R');	
	}
}

function InitializepdfBook(&$pdf, $fontsize =10)
{
	//called for each school.
	//Initialize pdf for bebaiosi ethsion apodoxon:

	// set document information
	$pdf->SetCreator('creator');
	$pdf->SetAuthor('author');

	//no headers or footers
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);	

	// set margins
	$pdf->SetMargins(15, 15, 15);
					//PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT (top margin is below page header)
					
	// set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, 10); //10mm bottom margin to break the page

	// Set font
	// dejavusans is a UTF-8 Unicode font
	$pdf->SetFont('dejavusans', '', $fontsize, '', true);

	//$pdf->setCellHeightRatio(1.5);//space between lines, global setting.
	
	//global $g_pagecount;
	//$g_pagecount=0;//initialize page counter.(for each pdf file)
	
	//global $g_dateref; //holds the date/time of the document's production. all files produced by this process will have the same time signature.
	//if ($datetimesignature=='')	//use current time
	//	$g_dateref= date("mdHi");//month-day-hour-minute
	//else $g_dateref= $datetimesignature; //value is externally set.
	
	//ready to add pages by calling the appropriate fx	
	return;
	
	
	//Initialize pdf:

	// set document information
//	$pdf->SetCreator('creator');
//	$pdf->SetAuthor('author');


	// set header and footer fonts
//	$pdf->setHeaderFont(Array('dejavusans', '', 11));//-size 11
//	$pdf->setFooterFont(Array('dejavusans', '', 10));
	//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
//	$pdf->SetMargins(15, 30, 10);
					//PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT (top margin is below page header)
	
//	$pdf->SetHeaderMargin(5);//minimum distance between header and top page margin
//	$pdf->SetFooterMargin(5);//minimum distance between footer and bottom page margin

	// set auto page breaks
//	$pdf->SetAutoPageBreak(TRUE, 12); //12mm bottom margin to break the page (2mm over the page number)


	// ---------------------------------------------------------
	// add a page
//	$pdf->startPageGroup('1');	
//	$pdf->AddPage(); //-this will be the cover page
//	$onomasia_dde= 'ONOMA_YPHRESIAS';
//	$html_coverpage='';
	// Print text using writeHTML ($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
//	$pdf->writeHTML($html_coverpage,true, false, false, false, '');
	
	
}

function SavepdfBook(&$pdf,$filename,$outputdir)
{
	//Close and output PDF document(=save to disk).

	$outputdir = rtrim($outputdir, "\\");//trim outputdir of any trailing slashes(makes sure there is no '\' at the end of outputdir)
	$outputdir = rtrim($outputdir, "/");//trim outputdir of any trailing slashes(makes sure there is no '/' at the end of outputdir)
	
	//$filename= iconv('UTF-8','ISO-8859-7',$filename);//because it might contain greek? (NOT USED as server accepts UTF-8)

	$ds = DIRECTORY_SEPARATOR;

	//check if school directory exists and create it. Otherwise pdf output will fail.
	if (!file_exists( $outputdir.$ds ))
	{
		if (mkdir( $outputdir . $ds, 0777, true)==FALSE) {echo 'Σφάλμα! Δεν ήταν δυνατή η δημιουργία καταλόγου.<br>';return;}
	}

	$pdf->Output("$outputdir".$ds."$filename.pdf", 'F');
}

?>