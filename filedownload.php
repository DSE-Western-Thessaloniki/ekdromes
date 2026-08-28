<?php
//----------------------------------------------------------------------
//	Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης
//----------------------------------------------------------------------
	session_start();
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] ||
	!isset($_SESSION["currentuser"]) || $_SESSION["currentuser"]==''
	) die(); 

if (!isset($_POST['id']) || !isset($_POST['whichfile']) || !isset($_POST['autogen'])) die();

$ds = DIRECTORY_SEPARATOR;  
$storeFolder = 'arxeia'.$ds. $_SESSION['ekdromes_currentYear'] .$ds. $_SESSION['kodikos_sxoleiou'];
// arxeia/2023_2024/9999999

if ($_POST['autogen']=='0') $targetFile =  $storeFolder.$ds. $_POST['id']. 'U_'. $_POST['whichfile'];
else
{
	$targetFile =  $storeFolder.$ds. $_POST['id']. 'F_'. $_POST['whichfile'];
	if ( !file_exists( $targetFile ) ) $targetFile =  $storeFolder.$ds. $_POST['id']. 'A_'. $_POST['whichfile'];
}

if ( !file_exists( $targetFile ) ) die();//file not found
else
{
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($_POST['whichfile']));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($targetFile));
    ob_clean();
    flush();
    readfile($targetFile);
    exit;	
}
?>